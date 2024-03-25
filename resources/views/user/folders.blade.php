<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Folders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($folders as $folder)
                        <div class="flex flex-col items-center text-center">
                            <a href="{{ route('user.files', $folder->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-folder text-blue-500 text-5xl"></i>
                                <div>{{ $folder->name }}</div>
                            </a>
                        </div>
                    @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>