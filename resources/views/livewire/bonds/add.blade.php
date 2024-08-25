<div>
    <button class="btn bg-primary text-white" data-fc-type="modal" type="button">
        Add New
    </button>

    <div class="fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden w-full h-full min-h-full items-center fc-modal-open:flex">
        <div class="fc-modal-open:opacity-100 duration-500 opacity-0 ease-out transition-[opacity] sm:max-w-lg sm:w-full sm:mx-auto  flex-col bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                    New Bonds
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                        data-fc-dismiss type="button">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="px-4 py-8 overflow-y-auto">
                <form>
                    <div class="mb-3">
                        <label for="bankName1" class="text-gray-800 text-sm font-medium inline-block mb-2">Bank Name</label>
                        <input type="text" wire:model="bank_name" class="form-input" id="bankName1" aria-describedby="emailHelp" placeholder="Enter Bank Name">
                    </div>
                    <div class="mb-3">
                        <label for="branchName" class="text-gray-800 text-sm font-medium inline-block mb-2">Branch Name</label>
                        <input type="text" wire:model="branch_name" class="form-input" id="branchName" aria-describedby="emailHelp" placeholder="Enter Branch Name">
                    </div>
                    <div class="mb-3">
                        <label for="branchCode1" class="text-gray-800 text-sm font-medium inline-block mb-2">Branch Code</label>
                        <input type="text" wire:model="branch_code" class="form-input" id="branchCode1" placeholder="Enter Branch Code">
                    </div>
                    <div class="mb-3">
                        <label for="accountNumber1" class="text-gray-800 text-sm font-medium inline-block mb-2">Account Number</label>
                        <input type="text" wire:model="account_number" class="form-input" id="accountNumber1" placeholder="Enter Account Number">
                    </div>
                </form>
            </div>
            <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all" data-fc-dismiss type="button">Close</button>
                <button wire:click="addBankAccount" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white" data-fc-dismiss href="javascript:void(0)">Save</button>
            </div>
        </div>
    </div>
</div>
