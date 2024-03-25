{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload New File') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.files.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('File Title') }}</label>
                            <input type="text" name="title" id="title" class="block mt-1 w-full" required autofocus>
                        </div>

                        <!-- Folder Selection -->
                        <div class="mt-4">
                            <label for="folder_id" class="block font-medium text-sm text-gray-700">{{ __('Folder') }}</label>
                            <select name="folder_id" id="folder_id" class="block mt-1 w-full">
                                @foreach ($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- File Upload Field -->
                        <div class="mt-4">
                            <label for="path" class="block font-medium text-sm text-gray-700">{{ __('File') }}</label>
                            <input type="file" name="path" id="path" class="block mt-1 w-full">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload New File') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        title: '',
        file: null,
        fileError: '',
        validate() {
            this.fileError = '';
            if (!this.file) {
                this.fileError = 'Please select a file to upload.';
                return false;
            }
            if (this.file.type !== 'application/pdf') {
                this.fileError = 'Only PDF files are allowed.';
                return false;
            }
            if (this.file.size > 10240 * 1024) { // 10 MB in bytes
                this.fileError = 'The file size must be less than 10 MB.';
                return false;
            }
            return true;
        }
    }" @submit.prevent="validate() ? $refs.form.submit() : false">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form x-ref="form" method="POST" action="{{ route('admin.files.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('File Title') }}</label>
                            <input type="text" name="title" id="title" class="block mt-1 w-full" x-model="title" required autofocus>
                        </div>

                        <!-- Folder Selection -->
                        <div class="mt-4">
                            <label for="folder_id" class="block font-medium text-sm text-gray-700">{{ __('Folder') }}</label>
                            <select name="folder_id" id="folder_id" class="block mt-1 w-full">
                                @foreach ($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- File Upload Field -->
                        <div class="mt-4">
                            <label for="path" class="block font-medium text-sm text-gray-700">{{ __('File') }}</label>
                            <input type="file" name="path" id="path" class="block mt-1 w-full" x-on:change="file = $event.target.files[0]" required>
                            <span x-text="fileError" class="text-red-500 text-xs"></span>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>