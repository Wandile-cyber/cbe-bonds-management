<div>
    <x-breadcrumb :title="'Portfolio'" :items="['CBE Bonds', 'My Portfolio', 'Portfolio']" :urls="['/dashboard', '#', '#']" />

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

    <div class="grid lg:grid-cols-1 grid-cols-1 gap-6 mt-2">
        <div class="card">
            <div>
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Auction Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Yield</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Expected Coupon Payment(in-total-withFV)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Expected Coupon Payment(in-total-withoutFV)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Coupon Payments(to-date)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payments Left(from-date)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Settlement Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Maturity Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Duration</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time left</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
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
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $bond->auction_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->awarded_yield }}%</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">E {{ $bond->amount }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">E {{ formatToString($total_coupon_payment+formatToInteger($bond->amount)) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">E {{ formatToString($total_coupon_payment) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">E {{ formatToString($total_coupon_payment_todate) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">E {{ formatToString($total_coupon_payment_left) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->settlement_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->maturity_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $duration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $timeLeftString }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="relative space-y-12 pb-6">
        <!-- Center Border Line -->
        <div class="absolute border-s-2 border border-gray-300 h-full top-0 start-10 md:start-1/2 -translate-x-1/2 rtl:translate-x-1/2 -z-10 dark:border-white/10"></div>

        @php
            $earliestDate = $bonds->min('settlement_date');
            $latestDate = $bonds->max('maturity_date');
            $currentYear = Carbon::parse($earliestDate)->year;
        @endphp

        @while (Carbon::parse($latestDate)->year >= $currentYear)
            <div class="timeline-item">
                <div class="h-10 w-20 flex justify-center bg-primary text-white md:mx-auto rounded items-center">
                    {{ $currentYear }}
                </div>
            </div>

            @foreach ($bonds as $bond)
                @if (Carbon::parse($bond->settlement_date)->year <= $currentYear && Carbon::parse($bond->maturity_date)->year >= $currentYear)
                    @php
                         $mayPayment = 0;
                         $novPayment = 0;
                         $bondValue = 0;

                         $coupoon = $bond->awarded_yield * formatToInteger($bond->amount)/100;
                         $half_coupon_permonth = $coupoon/2;
                    @endphp

                    @if (Carbon::parse($bond->settlement_date)->year == $currentYear)
                        @if (Carbon::parse($bond->settlement_date)->month < Carbon::parse($currentYear.'-05-31')->month)
                            @php
                                $mayPayment += $half_coupon_permonth;
                            @endphp
                        @endif

                        @if (Carbon::parse($bond->settlement_date)->month < Carbon::parse($currentYear.'-11-31')->month)
                            @php
                                $novPayment += $half_coupon_permonth;
                            @endphp
                        @endif
                    @else
                            @php
                                $mayPayment += $half_coupon_permonth;
                                $novPayment += $half_coupon_permonth;
                            @endphp
                    @endif

                    @if (Carbon::parse($bond->maturity_date)->year == $currentYear)
                        @php
                            $bondValue = $bond->amount;
                            $mayPayment += formatToInteger($bondValue);
                        @endphp
                    @endif

                @endif
            @endforeach
            <div class="md:text-end text-start">
                <div class="absolute start-10 md:start-1/2 -translate-x-1/2 rtl:translate-x-1/2 mt-6">
                    <div class="w-5 h-5 flex justify-center items-center rounded-full bg-gray-300 dark:bg-slate-700">
                        <i class="mgc_stop_circle_line text-sm"></i>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="md:col-span-1 col-span-2">
                        <div class="relative md:me-10 md:ms-0 ms-20">
                            <div class="card p-5">
                                <h4 class="mb-2 text-base">E {{ formatToString($mayPayment) }}</h4>
                                <p class="mb-2 text-gray-500 dark:text-gray-200"><small>31 May {{ $currentYear }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-start">
                <div class="absolute start-10 md:start-1/2 -translate-x-1/2 rtl:translate-x-1/2 mt-6">
                    <div class="w-5 h-5 flex justify-center items-center rounded-full bg-gray-300 dark:bg-slate-700">
                        <i class="mgc_stop_circle_line text-sm"></i>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="md:col-start-2 col-span-2">
                        <div class="relative md:ms-10 ms-20">
                            <div class="card p-5">
                                <h4 class="mb-2 text-base">E {{ formatToString($novPayment) }}</h4>
                                <p class="mb-2 text-gray-500 dark:text-gray-200"><small>31 November {{ $currentYear }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $currentYear++;
            @endphp
        @endwhile
    </div>
</div>
