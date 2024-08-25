<div>
    <button class="btn bg-primary text-white" data-fc-type="modal" type="button">
        Add New
    </button>

    <div class="w-full h-full mt-5 fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden">
        <div class="sm:max-w-2xl fc-modal-open:opacity-100 duration-500 opacity-0 ease-out transition-all sm:w-full m-3 sm:mx-auto flex flex-col bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                    New Bond Holder
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                        data-fc-dismiss type="button">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="px-4 py-8 overflow-y-auto">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="col-span-2">
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Bond</label>
                            <select wire:model="bh_bond_id" class="form-select">
                                <option selected >{{ $selected_bond }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Holder</label>
                            <select wire:model="bh_holder_id" class="form-select">
                                @foreach ($users as $user)
                                @php
                                    $this->bh_holder_id = $user->id;
                                @endphp
                                <option selected value="{{ $user->id }}">{{ $user->name.' ('.$user->email.')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="inputEmail4" class="text-gray-800 text-sm font-medium inline-block mb-2">Auction Name</label>
                            <input type="email" class="form-input" wire:model="bh_auction_name" placeholder="Auction Name">
                        </div>
                        <div>
                            <label for="inputPassword4" class="text-gray-800 text-sm font-medium inline-block mb-2">Security Name</label>
                            <input type="text" class="form-input" wire:model="bh_security_name" >
                        </div>

                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Clean Price</label>
                            <input type="text" class="form-input" wire:model="bh_clean_price">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Settlement Date</label>
                            <input type="date" class="form-input" wire:model="bh_settlement_date">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Maturity Date</label>
                            <input type="date" class="form-input" wire:model="bh_maturity_date" value="{{ $bond->redemption_date }}">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Amount (SZL)</label>
                            <input type="text" class="form-input" wire:model="bh_amount">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Awarded Yield (%)</label>
                            <input type="text" class="form-input" wire:model="bh_awarded_yield" value="{{ $bond->coupon }}">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Interest</label>
                            <input type="text" class="form-input" wire:model="bh_interest" value="{{ $bond->coupon }}">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">All Inclusive Price</label>
                            <input type="text" class="form-input" wire:model="bh_all_inclusive_price">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Discount (SZL)</label>
                            <input type="text" class="form-input" wire:model="bh_discount">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Cost (SZL)</label>
                            <input type="text" class="form-input" wire:model="bh_cost">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Cost For Clean Price (SZL)</label>
                            <input type="text" class="form-input" wire:model="bh_cost_for_clean_price">
                        </div>
                        <div>
                            <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">Accrued Interest (SZL)</label>
                            <input type="text" class="form-input" wire:model="bh_accrued_interest" value="0.00">
                        </div>

                    </div>
                </form>
            </div>
            <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all" data-fc-dismiss type="button">Close</button>
                <button wire:click="save" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white" data-fc-dismiss href="javascript:void(0)">Save</button>
            </div>
        </div>
    </div>
</div>
