<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Users Management -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">Users Management</h3>
                    <p>Manage your application's users.</p>
                    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-users"></i> Manage Users
                    </a>
                </div>

                <!-- Files Management -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">Files Management</h3>
                    <p>Manage the files within your application.</p>
                    <a href="{{ route('admin.files.index') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-file"></i> Manage Files
                    </a>
                </div>

                <!-- Folders Management -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">Folders Management</h3>
                    <p>Organize and manage your folders.</p>
                    <a href="{{ route('admin.folders.index') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-folder"></i> Manage Folders
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
