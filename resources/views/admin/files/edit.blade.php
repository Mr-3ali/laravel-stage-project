<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-800 leading-tight">
            {{ __('Edit File') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.files.update', $file->id) }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('File Title') }}</label>
                            <input id="title" name="title" type="text" value="{{ old('title', $file->title) }}" required class="mt-1 block w-full" />
                        </div>

                        <div>
                            <label for="folder_id" class="block font-medium text-sm text-gray-700">{{ __('Folder') }}</label>
                            <select id="folder_id" name="folder_id" required class="mt-1 block w-full">
                                @foreach ($folders as $folder)
                                    <option value="{{ $folder->id }}" @if ($folder->id == $file->folder_id) selected @endif>
                                        {{ $folder->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
