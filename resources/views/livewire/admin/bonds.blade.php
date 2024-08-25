<div>
    <x-breadcrumb :title="'Bonds'" :items="['CBE Bonds', 'Administrator', 'Bonds']" :urls="['/dashboard', '#', '#']" />


    <livewire:admin.add-bond />
    <div class="grid lg:grid-cols-1 grid-cols-1 gap-6 mt-2">
        <div class="card">
            <div>
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quarter</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Month</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Issue Type</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Auction Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Maturity</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    <div>
                                        @foreach ($bonds as $bond)
                                        <tr
                                            @if($loop->first || $bond->bond_calendar_id != $bonds[$loop->index-1]->bond_calendar_id || $bond->quarter != $bonds[$loop->index-1]->quarter || $bond->auction_date != $bonds[$loop->index-1]->auction_date)
                                                class="bg-gray-100 dark:bg-gray-800"
                                            @else
                                                class="bg-gray-200 dark:bg-gray-700"
                                            @endif
                                        >
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ strtoupper($bond->quarter) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->month }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->issue_type }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->amount }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->auction_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $bond->redemption_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <div>
                                                    <button class="text-gray-600 dark:text-gray-400 fc-dropdown" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                                        <i class="mgc_more_2_fill text-xl"></i>
                                                    </button>

                                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2 absolute hidden" style="left: 1210px; top: 795px;">
                                                        <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="{{ route('bond.details',['bond_id' => $bond->id]) }}">
                                                            <i class="mgc_edit_line"></i> View
                                                        </a>
                                                        <div class="h-px bg-gray-200 dark:bg-gray-700 my-2 -mx-2"></div>
                                                        <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-danger hover:bg-danger/5" href="javascript:void(0)">
                                                            <i class="mgc_delete_line"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </div>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $bonds->links() }}
    </div>
</div>
