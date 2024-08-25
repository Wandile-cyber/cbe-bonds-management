<div>

    <x-breadcrumb :title="'Dashboard'" :items="['CBE Bonds', 'Dashboard']" :urls="['/dashboard', '#']" />

    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">

    <style>
        .anychart-credits{
            display: none;
        }
    </style>

@php
use Carbon\Carbon;

function formatToInteger($formattedNumber)
{
    $number = str_replace(",", "", $formattedNumber);
    $number = preg_replace("/\.[0-9]+$/", "", $number);
    $numberInt = (int) $number;
    return $numberInt;
}

function formatToString($number, $decimalPlaces = 2)
{
    $formattedNumber = number_format($number, $decimalPlaces, ".", ",");
    return $formattedNumber;
}
@endphp
<div class="grid 2xl:grid-cols-4 gap-6 mb-6">

    <div class="2xl:col-span-3">

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="col-span-1">
                <div class="card">
                    <div class="p-6" style="position: relative;">
                        <h4 class="card-title">Total Bonds</h4>

                        <div class="flex justify-center">
                            <h4 class="text-base mb-1 text-gray-600 dark:text-gray-400">{{ $bonds->count() }}</h4>
                        </div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 349px; height: 438px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="card">
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <h4 class="card-title">Government Bond Market</h4>
                        </div>

                        <div dir="ltr" class="mt-2" style="position: relative;">
                            <div style="height: 400px;" id="container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-1">
        <div class="card mb-6">
            <div class="px-6 py-5 flex justify-between items-center">
                <h4 class="header-title">Portfolio</h4>
            </div>
            <div class="px-4 py-2 bg-warning/20 text-warning" role="alert">
                <i class="mgc_folder_star_line me-1 text-lg align-baseline"></i> <b>{{ $bonds->count() }}</b> Total Bonds
            </div>


            <div class="p-6 space-y-3">
                @foreach ($bonds as $bond)
                @php
                      $settlementDate = Carbon::parse($bond->settlement_date);
                                        $maturityDate = Carbon::parse($bond->maturity_date);
                                        $currentDate = Carbon::now();

                                        $coupoon = $bond->awarded_yield * formatToInteger($bond->amount)/100;
                                        $half_coupon_permonth = $coupoon/2;

                                        // Calculate the number of May and November months between the settlement date and the maturity date
                                        $mayMonths = 0;
                                        $novemberMonths = 0;
                                        $mayMonthsToDate = 0;
                                        $novemberMonthsToDate = 0;
                                        $currentDate = $settlementDate->copy();
                                        while ($currentDate->lte($maturityDate)) {
                                            if ($currentDate->month == 5) {
                                                $mayMonths++;
                                                if ($currentDate->lte($currentDate)) {
                                                    $mayMonthsToDate++;
                                                }
                                            }
                                            if ($currentDate->month == 11) {
                                                $novemberMonths++;
                                                if ($currentDate->lte($currentDate)) {
                                                    $novemberMonthsToDate++;
                                                }
                                            }
                                            $currentDate->addMonth();
                                        }

                                        // Calculate the number of May and November months left until the maturity date
                                        $mayMonthsLeft = 0;
                                        $novemberMonthsLeft = 0;
                                        $currentDate = Carbon::now();
                                        while ($currentDate->lt($maturityDate)) {
                                            if ($currentDate->month == 5) {
                                                $mayMonthsLeft++;
                                            }
                                            if ($currentDate->month == 11) {
                                                $novemberMonthsLeft++;
                                            }
                                            $currentDate->addMonth();
                                        }

                                        // Duration from settlement date to maturity date
                                        $duration = ceil($settlementDate->diffInYears($maturityDate)) . ' years';

                                        // Time left to maturity
                                        $timeLeft = $maturityDate->diff(Carbon::now());
                                        $timeLeftString = '';
                                        if ($timeLeft->years > 0) {
                                            $timeLeftString .= $timeLeft->years . ' years, ';
                                        }
                                        if ($timeLeft->months > 0) {
                                            $timeLeftString .= $timeLeft->months . ' months, ';
                                        }
                                        if ($timeLeft->weeks > 0) {
                                            $timeLeftString .= $timeLeft->weeks . ' weeks, ';
                                        }
                                        if ($timeLeft->days > 0) {
                                            $timeLeftString .= $timeLeft->days . ' days';
                                        }

                                        $total_coupon_payment = $half_coupon_permonth*($mayMonths+$novemberMonths);
                                        $total_coupon_payment_todate = $half_coupon_permonth*($mayMonthsToDate+$novemberMonthsToDate);
                                        $total_coupon_payment_left = $half_coupon_permonth*($mayMonthsLeft+$novemberMonthsLeft);
                @endphp
                <div class="flex items-center border border-gray-200 dark:border-gray-700 rounded px-3 py-2">
                    <div class="flex-shrink-0 me-2">
                        <div class="w-12 h-12 flex justify-center items-center rounded-full text-warning bg-warning/25">
                            <i class="mgc_compass_line text-xl"></i>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h5 class="fw-semibold my-0">{{ $bond->auction_name }}</h5>
                        <p>E {{ $bond->amount.' at '.$bond->awarded_yield.'%' }}</p>
                        <p>{{ $mayMonthsLeft+$novemberMonthsLeft }} coupon payment left</p>
                    </div>
                    <div>
                        <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                            <i class="mgc_information_line text-xl"></i>
                        </button>
                        <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50" role="tooltip">
                            Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow=""></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>


<script>

    anychart.onDocumentReady(function () {
      // create data set on our data
      var dataSet = anychart.data.set(getData());

      // map data for the first series, take x from the zero column and value from the first column of data set
      var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

      // map data for the second series, take x from the zero column and value from the second column of data set
      var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });

      // map data for the third series, take x from the zero column and value from the third column of data set
      var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });
      var fourthSeriesData = dataSet.mapAs({ x: 0, value: 4 });

      // create line chart
      var chart = anychart.line();

      // turn on chart animation
      chart.animation(true);

      // set chart padding
      chart.padding([10, 20, 5, 20]);

      // turn on the crosshair
      chart.crosshair().enabled(true).yLabel(false).yStroke(null);

      // set tooltip mode to point
      chart.tooltip().positionMode('point');


      // set yAxis title
      chart.yAxis().title('Percentage Yield (%)');
      chart.xAxis().labels().padding(5);

      // create first series with mapped data
      var firstSeries = chart.line(firstSeriesData);
      firstSeries.name('3 Years');
      firstSeries.hovered().markers().enabled(true).type('circle').size(4);
      firstSeries
        .tooltip()
        .position('right')
        .anchor('left-center')
        .offsetX(5)
        .offsetY(5);

      // create second series with mapped data
      var secondSeries = chart.line(secondSeriesData);
      secondSeries.name('5 Years');
      secondSeries.hovered().markers().enabled(true).type('circle').size(4);
      secondSeries
        .tooltip()
        .position('right')
        .anchor('left-center')
        .offsetX(5)
        .offsetY(5);

      // create third series with mapped data
      var thirdSeries = chart.line(thirdSeriesData);
      thirdSeries.name('7 Years');
      thirdSeries.hovered().markers().enabled(true).type('circle').size(4);
      thirdSeries
        .tooltip()
        .position('right')
        .anchor('left-center')
        .offsetX(5)
        .offsetY(5);

        var fourthSeries = chart.line(fourthSeriesData);
        fourthSeries.name('10 Years');
        fourthSeries.hovered().markers().enabled(true).type('circle').size(4);
        fourthSeries
        .tooltip()
        .position('right')
        .anchor('left-center')
        .offsetX(5)
        .offsetY(5);

      // turn the legend on
      chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

      // set container id for the chart
      chart.container('container');
      // initiate chart drawing
      chart.draw();
    });

    function getData() {
      return [
        ['2023-01', 8.0, 8.5, 9.0, 10.5],
        ['2023-03', 8.0, 8.5, 9.0, 10.5],
        ['2023-05', 9.5,10,10.50, 11.0],
        ['2023-07', 9.5,10,10.50, 11.0],
        ['2023-09', 9.5,10,10.50, 11.0],
        ['2023-11', 9.5,10,10.50, 11.0],
        ['2024-01', 9.5,10,10.50, 11.05],
        ['2024-03', 9.5,10,10.50, 11.0],
        ['2024-05', 10.5, 11.0, 11.5, 12.0],
        ['2024-07', 10.5, 11.0, 11.5, 12.0],
        ['2024-09', 10.5, 11.0, 11.5, 12.0],
        ['2024-11', 10.5, 11.0, 11.5, 12.0],
        ['2025-01', 10.5, 11.0, 11.5, 12.0],
        ['2025-03', 10.5, 11.0, 11.5, 12.0],
      ];
    }

</script>
</div>
