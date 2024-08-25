<div>
    <div class="divide-y divide-gray-300 dark:divide-gray-700 overflow-auto w-full max-w-full">
        <div class="p-6">
                <div class="mb-3">
                    <label for="currentPassword1" class="text-gray-800 text-sm font-medium inline-block mb-2">Current Password</label>
                    <input type="password" wire:model.live="current_password" class="form-input" id="currentPassword1" aria-describedby="emailHelp" placeholder="Enter Current Password">
                    @error('current_password')
                    <div class="bg-danger/25 text-danger text-sm rounded-md p-2" role="alert">
                        <span class="font-bold"></span> {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="newpassword1" class="text-gray-800 text-sm font-medium inline-block mb-2">New Password</label>
                    <input type="password" wire:model.live="new_password" class="form-input" id="newpassword1" aria-describedby="emailHelp" placeholder="Enter New Password">
                    @error('new_password')
                        <div class="bg-danger/25 text-danger text-sm rounded-md p-2" role="alert">
                            <span class="font-bold"></span> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmPassword1" class="text-gray-800 text-sm font-medium inline-block mb-2">Confirm Password</label>
                    <input type="password" wire:model.live="confirm_password" class="form-input" id="confirmPassword1" placeholder="Confirm Password">
                    @error('confirm_password')
                        <div class="bg-danger/25 text-danger text-sm rounded-md p-2" role="alert">
                            <span class="font-bold"></span> {{ $message }}
                        </div>
                    @enderror
                </div>
                <button wire:click="updatePassword" class="btn bg-primary text-white">Submit</button>
        </div>
    </div>
</div>
