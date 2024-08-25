<div>
    <x-breadcrumb :title="'Calendar'" :items="['CBE Bonds', 'Bonds', 'Bond Calendar']" :urls="['/dashboard', '#', '#']" />

    <div class="grid lg:grid-cols-1 grid-cols-1 gap-6 mt-2">
        <div class="card">
            <div>
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($bonds as $bondalendar)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $bondalendar->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            <div class="p-2 border border-gray-200 dark:border-gray-700 rounded mb-2">
                                                <div class="flex items-center">
                                                    <div class="h-9 w-9 rounded flex justify-center items-center text-primary bg-primary/20 me-3">
                                                        <i class="mgc_file_new_line text-xl"></i>
                                                    </div>
                                                    <div class="">
                                                        <a href="{{ asset('storage/'.$bondalendar->document_file) }}" target="_blank" class="text-sm font-medium">{{ $bondalendar->document_file }}</a>
                                                    </div>
                                                    <div>
                                                        <a href="{{ asset('storage/'.$bondalendar->document_file) }}" target="_blank" class="p-2"><i class="mgc_download_line text-xl"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">Delete</a>
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
</div>
