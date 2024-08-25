<div>
    <div class="flex-grow p-6">

        <x-breadcrumb :title="'Profile'" :items="['CBE Bonds', 'My Account', 'Profile']" :urls="['/dashboard', '#', '#']" />

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Details</h4>
                    </div>

                    <div class="p-6">
                        <div>
                            <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                                <div>
                                    <label for="fullname1" class="text-gray-800 text-sm font-medium inline-block mb-2">Full Name</label>
                                    <input type="text" wire:model.live="name" class="form-input" id="fullname1"  placeholder="Name">
                                </div>
                                <div>
                                    <label for="email1" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                                    <input type="text" wire:model.live="email" class="form-input" id="email1" placeholder="Email">
                                </div>

                                <div>
                                    <label for="fullname1" class="text-gray-800 text-sm font-medium inline-block mb-2">ID Number</label>
                                    <input type="text" wire:model.live="id_number" class="form-input" id="fullname1"  placeholder="ID Number">
                                </div>
                                <div>
                                    <label for="nationality" class="text-gray-800 text-sm font-medium inline-block mb-2">Nationality</label>
                                    <input type="text" wire:model.live="nationality" class="form-input" id="nationality" placeholder="Nationality">
                                </div>

                                <div>
                                    <label for="nok" class="text-gray-800 text-sm font-medium inline-block mb-2">Next of kin</label>
                                    <input type="text" wire:model.live="next_of_kin" class="form-input" id="nok"  placeholder="Next of Kin">
                                </div>
                                <div>
                                    <label for="nokt" class="text-gray-800 text-sm font-medium inline-block mb-2">Next of kin Telephone</label>
                                    <input type="text" wire:model.live="next_of_kin_telephone" class="form-input" id="nokt" placeholder="Next of Kin Telephone">
                                </div>

                                <div>
                                    <label for="postalAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Postal Address</label>
                                    <input type="text" wire:model.live="postal_address" class="form-input" id="postalAddress"  placeholder="Posal Address">
                                </div>
                                <div>
                                    <label for="Telephone" class="text-gray-800 text-sm font-medium inline-block mb-2">Telephone</label>
                                    <input type="text" wire:model.live="telephone" class="form-input" id="Telephone" placeholder="Telephone">
                                </div>

                                <div>
                                    <label for="Celphone" class="text-gray-800 text-sm font-medium inline-block mb-2">Cellphone</label>
                                    <input type="text" wire:model.live="cellphone" class="form-input" id="Celphone"  placeholder="Cellphone">
                                </div>
                                <div>
                                    <label for="Fax" class="text-gray-800 text-sm font-medium inline-block mb-2">Fax</label>
                                    <input type="text" wire:model.live="fax" class="form-input" id="Fax" placeholder="Fax">
                                </div>

                                <div>
                                    <label for="occupation" class="text-gray-800 text-sm font-medium inline-block mb-2">Occupations</label>
                                    <input type="text" wire:model.live="occupation" class="form-input" id="occupation"  placeholder="Occupation">
                                </div>
                            </div>

                            <div class="flex items-center gap-2 my-3">
                            </div>

                            <button wire:click="updateAccount" type="submit" class="btn bg-primary text-white">Save</button>

                            <div class="mb-6 overflow-x-auto">
                                <h4 class="card-title my-3">Bank Accounts</h4>
                                <livewire:account.bank />
                                <div class="overflow-x-auto">
                                <livewire:account.banklist />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Security</h6>
                    </div>
                    <div class="table overflow-hidden w-full">
                        <div class="divide-y divide-gray-300 dark:divide-gray-700 overflow-auto w-full max-w-full">
                            <div class="p-1">
                                <livewire:account.password />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
