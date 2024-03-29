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
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-5 gap-4">
                        @forelse ($folders as $folder)
                            <div class="border rounded-lg p-4 flex flex-col items-center justify-between space-y-2">
                                <i class="fas fa-folder fa-2x text-yellow-500"></i>
                                <div class="text-sm text-center">
                                    <p>{{ $folder->name }}</p>
                                    <p class="text-xs text-gray-600">Created by: {{ $folder->user->name }}</p>
                                </div>
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.folders.edit', $folder->id) }}"
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <x-delete-button :action="route('admin.folders.destroy', $folder->id)" button-text="{{ __('Delete') }}">
                                        <i class="fas fa-trash-alt text-red-600 hover:text-red-900"></i>
                                    </x-delete-button>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-5 text-center">
                                No folders found. <a href="{{ route('admin.folders.create') }}" class="text-blue-600 hover:text-blue-800">Create one</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
