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
                    <!-- User Selection -->
                    <form method="GET" action="{{ route('admin.assign-folders') }}">
                        <div>
                            <label for="user_id" class="block font-medium text-sm text-gray-700">{{ __('Select User') }}</label>
                            <select name="user_id" id="user_id" class="block mt-1 w-full" onchange="this.form.submit()">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $selectedUserId == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <!-- Folders Assignment -->
                    @if(isset($selectedUserId) && $selectedUserId)
                        <form method="POST" action="{{ route('admin.folders.assign.store') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $selectedUserId }}">

                            <div class="mt-4">
                                <label for="folder_ids" class="block font-medium text-sm text-gray-700">{{ __('Select Folders') }}</label>
                                <div class="mt-1 w-full">
                                    @foreach ($folders as $folder)
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" name="folder_ids[]" id="folder_{{ $folder->id }}" value="{{ $folder->id }}" {{ in_array($folder->id, $selectedUserFolders) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <label for="folder_{{ $folder->id }}" class="ml-2 block text-sm text-gray-900">
                                                {{ $folder->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Assign') }}
                                </x-primary-button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
