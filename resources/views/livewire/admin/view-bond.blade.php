<div>
    <x-breadcrumb :title="'Bond Details'" :items="['CBE Bonds', 'Administrator', 'Bonds']" :urls="['/dashboard', '#', '#']" />

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bond Details</h4>
                </div>
                <livewire:partials.message />
                <div class="p-6">
                    <div>
                            <form wire:submit="updateBond">
                                <div class="grid lg:grid-cols-3 gap-6">
                                    <div>
                                        <label for="example-select" class="text-gray-800 text-sm font-medium inline-block mb-2">Calender Year</label>
                                        <select class="form-select" wire:model="bond_calender_id" id="example-select">
                                            <option selected value="4">BOND ISSUANCE CALENDAR FOR THE FINANCIAL YEAR 2024/25</option>
                                            <option value="3">BOND ISSUANCE CALENDAR FOR THE FINANCIAL YEAR 2023/24</option>
                                            <option value="2">BOND ISSUANCE CALENDAR FOR THE FINANCIAL YEAR 2022/23</option>
                                            <option value="1">BOND ISSUANCE CALENDAR FOR THE FINANCIAL YEAR 2021/22</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="example-select" class="text-gray-800 text-sm font-medium inline-block mb-2">Quarter</label>
                                        <select class="form-select" wire:model="quarter" id="example-select">
                                            <option selected value="q1">Q1</option>
                                            <option value="q2">Q2</option>
                                            <option value="q3">Q3</option>
                                            <option value="q4">Q4</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="month-select" class="text-gray-800 text-sm font-medium inline-block mb-2">Month</label>
                                        <select class="form-select" wire:model="month" id="month-select">
                                            <option selected value="Jan">January</option>
                                            <option value="Feb">February</option>
                                            <option value="Mar">March</option>
                                            <option value="Apr">April</option>
                                            <option value="May">May</option>
                                            <option value="Jun">June</option>
                                            <option value="Jul">July</option>
                                            <option value="Aug">August</option>
                                            <option value="Sep">September</option>
                                            <option value="Oct">October</option>
                                            <option value="Nov">November</option>
                                            <option value="Dec">December</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="issuer" class="text-gray-800 text-sm font-medium inline-block mb-2">Issuer</label>
                                        <input type="Text" id="issuer" wire:model="issuer" class="form-input" placeholder="Issuer">
                                    </div>

                                    <div>
                                        <label for="issuer-type" class="text-gray-800 text-sm font-medium inline-block mb-2">Issuer Type</label>
                                        <input type="text" id="issuer-type" wire:model="issue_type" class="form-input" placeholder="Issuer Type">
                                    </div>

                                    <div>
                                        <label for="amount" class="text-gray-800 text-sm font-medium inline-block mb-2">Amount (E)</label>
                                        <input type="text" id="amount" wire:model="amount" class="form-input" placeholder="Amount value">
                                    </div>

                                    <div>
                                        <label for="example-palaceholder" class="text-gray-800 text-sm font-medium inline-block mb-2">Greenshoe / Overallotment Option</label>
                                        <input type="text" id="example-palaceholder" wire:model="greenshoe_overallotment_option" class="form-input" placeholder="placeholder">
                                    </div>

                                    <div>
                                        <label for="example-disable" class="text-gray-800 text-sm font-medium inline-block mb-2">Procedure for bidding</label>
                                        <input type="text" class="form-input" id="example-disable" wire:model="procedure_for_bidding" placeholder="Procedure for bidding">
                                    </div>

                                    <div>
                                        <label for="example-date" class="text-gray-800 text-sm font-medium inline-block mb-2">Auction Date</label>
                                        <input class="form-input" id="example-date" type="date" wire:model="auction_date">
                                    </div>

                                    <div>
                                        <label for="example-month" class="text-gray-800 text-sm font-medium inline-block mb-2">Settlement Date</label>
                                        <input class="form-input" id="example-month" type="date" wire:model="settlement_date">
                                    </div>

                                    <div>
                                        <label for="example-time" class="text-gray-800 text-sm font-medium inline-block mb-2">Form of issuance</label>
                                        <input class="form-input" id="example-time" type="text" wire:model="form_of_issuance">
                                    </div>

                                    <div>
                                        <label for="example-week" class="text-gray-800 text-sm font-medium inline-block mb-2">Auction Results</label>
                                        <input class="form-input" id="example-week" type="text" wire:model="auction_results">
                                    </div>

                                    <div>
                                        <label for="example-number" class="text-gray-800 text-sm font-medium inline-block mb-2">Yield</label>
                                        <input class="form-input" id="example-number" type="text" wire:model="yield">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Minimum bid size</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="minimum_bid_size" placeholder="1000">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Minimum bid size (Individual)</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="minimum_bid_size_individual" placeholder="1000">
                                    </div>

                                    <div>
                                        <label for="month-select" class="text-gray-800 text-sm font-medium inline-block mb-2">Interest payment date</label>
                                        <select class="form-select" wire:model="interest_payment_date" id="month-select">
                                            <option selected value="May/November">May/November</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Coupon</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="coupon">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Day count convention</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="day_count_convention">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Tax</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="tax">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Currency</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="currency">
                                    </div>
                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Redemption date</label>
                                        <input class="form-input h-10" id="example-color" type="date" wire:model="redemption_date">
                                    </div>
                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Listing</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="listing">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Trading</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="trading">
                                    </div>

                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Defaulters</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="defaulters">
                                    </div>
                                    <div>
                                        <label for="example-color" class="text-gray-800 text-sm font-medium inline-block mb-2">Document file</label>
                                        <input class="form-input h-10" id="example-color" type="text" wire:model="document_file">
                                    </div>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none">
                                        Update
                                    </button>
                                </div>
                            </form>

                        <div class="mt-6">
                            <h6 class="text-gray-800 font-medium mb-3">Files</h6>

                            <div class="grid md:grid-cols-4 gap-3">
                                <div class="p-2 border border-gray-200 dark:border-gray-700 rounded mb-2">
                                    <div class="flex items-center">
                                        <div class="h-9 w-9 rounded flex justify-center items-center text-primary bg-primary/20 me-3">
                                            <i class="mgc_file_new_line text-xl"></i>
                                        </div>
                                        <div class="">
                                            <a target="_blank" href="{{ url('assets/bonds/'.$document_file) }}"class="text-sm font-medium">Document File</a>
                                        </div>
                                        <div>
                                            <a target="_blank" href="{{ url('assets/bonds/'.$document_file) }}" class="p-2"><i class="mgc_download_line text-xl"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Bond Holders</h6>
                </div>

                <div class="table overflow-hidden w-full">
                    <div class="divide-y divide-gray-300 dark:divide-gray-700 overflow-auto w-full max-w-full">
                        <div class="p-3">
                            <livewire:admin.add-bondholder :bond="$bond"/>
                        </div>
                        @foreach ($bond_holders as $bond_holder)
                        <div class="p-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-grow truncate">
                                    <div class="font-medium text-gray-900 dark:text-gray-300">{{ $bond_holder->holder->name }}</div>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $bond_holder->holder->email }}</p>
                                </div>
                                <div class="ms-auto">
                                    <div>
                                        <button class="text-gray-600 dark:text-gray-400 fc-dropdown" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                            <i class="mgc_more_1_fill text-xl"></i>
                                        </button>

                                        <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2 absolute hidden" style="left: 1068px; top: 170px;">
                                            <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-danger hover:bg-danger/5" href="{{ route('holder.delete',['id' => $bond_holder->id]) }}" wire:confirm="Are you sure you want to delete?" >
                                                <i class="mgc_delete_line"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
