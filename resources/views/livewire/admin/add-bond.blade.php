<div>
    <button class="btn bg-primary text-white" data-fc-type="modal" type="button">
        Add New
    </button>

    <div class="w-full h-full mt-5 fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden overflow-y-auto">
        <div class="sm:max-w-7xl fc-modal-open:opacity-100 duration-500 opacity-0 ease-out transition-all sm:w-full m-3 sm:mx-auto flex flex-col bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                    New Bond
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                        data-fc-dismiss type="button">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="px-4 py-8">
                <form>
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
                </form>
            </div>
            <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all" data-fc-dismiss type="button">Close</button>
                <button wire:click="createBond" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white" data-fc-dismiss href="javascript:void(0)">Save</button>
            </div>
        </div>
    </div>
</div>
