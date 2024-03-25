<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Folders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Folders
                    </h3>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.folders.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded flex items-center text-sm">
                            <i class="fas fa-folder-plus mr-1 text-xs"></i> Create Folder
                        </a>
                        <a href="{{ route('admin.files.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center text-sm">
                            <i class="fas fa-file-upload mr-1 text-xs"></i> Upload File
                        </a>
                    </div>
                </div>
                <!-- Folders Table -->
                <div class="mt-4 w-full">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created By
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($folders as $folder)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                                        {{ $folder->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                                        {{ $folder->user->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex items-center justify-center space-x-6">
                                                            <a href="{{ route('admin.folders.edit', $folder->id) }}"
                                                                class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                                                <i class="fas fa-edit mr-1"></i> Edit
                                                            </a>
                                                            <x-delete-button :action="route('admin.folders.destroy', $folder->id)"
                                                                button-text="{{ __('Delete') }}">
                                                                <i
                                                                    class="fas fa-trash-alt text-red-600 hover:text-red-900"></i>
                                                            </x-delete-button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3"
                                                        class="px-6 py-4 text-center text-sm text-gray-500">
                                                        No folders found. Would you like to <a
                                                            href="{{ route('admin.folders.create') }}"
                                                            class="text-indigo-600 hover:text-indigo-900">create
                                                            one</a>?
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Folders Table -->
            </div>
        </div>
    </div>
</x-app-layout>
