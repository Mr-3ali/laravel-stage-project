<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Files
                        </h3>
                        <a href="{{ route('admin.files.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center text-sm">
                            <i class="fas fa-upload mr-1 text-xs"></i> Upload File
                        </a>
                    </div>
                    <div class="mt-4 grid grid-cols-5 gap-4">
                        @forelse ($files as $file)
                            <div class="border rounded-lg p-4 flex flex-col items-center justify-between space-y-2">
                                <i class="fas fa-file-alt fa-2x text-gray-500"></i>
                                <div class="text-sm text-center">
                                    <p>{{ $file->title }}</p>
                                    <p class="text-xs text-gray-600">{{ $file->type }}</p>
                                    <p class="text-xs text-gray-600">{{ $file->folder->name ?? 'No Folder' }}</p>
                                </div>
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.files.edit', $file->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <x-delete-button :action="route('admin.files.destroy', $file->id)">
                                        <i class="fas fa-trash-alt text-red-600 hover:text-red-900"></i>
                                    </x-delete-button>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-5 text-center text-gray-500">
                                No files found. <a href="{{ route('admin.files.create') }}" class="text-blue-600 hover:text-blue-800">Upload a new file?</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>