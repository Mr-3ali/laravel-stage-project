<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fas fa-home mr-2"></i>{{ __('Home Page') }}
                </x-nav-link>
            </div>

            <div class="flex items-center">
                <!-- User Name -->

                <div class="text-sm font-medium text-gray-800">
                    <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-500 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
