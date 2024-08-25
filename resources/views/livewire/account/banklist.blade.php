<div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
    <div class="card">
        <div>
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bank Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Branch Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acc #</th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($bank_accounts as $bank)
                                <tr :key="$bank->id">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray
                                    -900 dark:text-white">
                                    {{ $bank->bank_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500
                                    dark:text-gray-400">
                                    {{ $bank->branch_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500
                                    dark:text-gray-400">
                                    {{ $bank->account_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium
                                    text-gray-900 dark:text-white space-x-4">
                                        <livewire:account.bankedit :key="$bank->id.'be'" :account="$bank"/>
                                    </td>
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
