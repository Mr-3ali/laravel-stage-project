<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Folders to Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.folders.assign.store') }}">
                        @csrf

                        <!-- User Selection -->
                        <div>
                            <label for="user_id" class="block font-medium text-sm text-gray-700">{{ __('Select User') }}</label>
                            <select name="user_id" id="user_id" class="block mt-1 w-full">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Folders Selection -->
                        <div class="mt-4">
                            <label for="folder_ids" class="block font-medium text-sm text-gray-700">{{ __('Select Folders') }}</label>
                            <select name="folder_ids[]" id="folder_ids" class="block mt-1 w-full" multiple>
                                @foreach ($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Assign') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
