<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Folder') }}
        </h2>
    </x-slot>
    
    @if (session('info'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="relative bg-gray-100 border border-gray-400 text-gray-700 px-4 py-3 rounded-lg shadow-sm transition duration-500 ease-in-out transform text-center"
            role="alert">
            <strong class="font-bold">Notice:</strong>
            <span class="block sm:inline">{{ session('info') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" x-on:click="show = false">
                <svg class="fill-current h-6 w-6 text-gray-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1 1 0 000-1.414L10.413 10l3.935-3.935a1 1 0 00-1.414-1.414L9 8.586 5.065 4.651a1 1 0 10-1.414 1.414L7.586 10l-3.935 3.935a1 1 0 001.414 1.414L9 11.414l3.935 3.935a1 1 0 001.414 0z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('admin.folders.store') }}">
                        @csrf
                        <div>
                            <label for="name"
                                class="block font-medium text-sm text-gray-700">{{ __('Folder Name') }}</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" required
                                autofocus />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
