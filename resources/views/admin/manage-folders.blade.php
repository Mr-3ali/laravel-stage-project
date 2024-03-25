<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Folders to User: ') . $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.assign-folders', $user->id) }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($folders as $folder)
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                                    <label for="folder_{{ $folder->id }}" class="flex items-center">
                                        <input id="folder_{{ $folder->id }}" type="checkbox" name="folders[]" value="{{ $folder->id }}"
                                            {{ in_array($folder->id, $userFolders) ? 'checked' : '' }} class="mr-2">
                                        {{ $folder->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                {{ __('Assign Folders') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
