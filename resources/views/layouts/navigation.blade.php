<!-- Navbar Component -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">
                    <i class="fas fa-book"></i>
                    {{ config('app.name', 'Bookstore') }}
                </a>
            </div>

            <!-- Desktop Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('home')"  :active="request()->routeIs('home')">
                    Home
                </x-nav-link>
                <x-nav-link :href="route('top-authors')" :active="request()->routeIs('top-authors')">
                    Top Authors
                </x-nav-link>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" type="button"
                    class="text-gray-700 hover:text-blue-600">
                    <i class="fas fa-bars" x-show="!open"></i>
                    <i class="fas fa-times" x-show="open"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')"  :active="request()->routeIs('home')">
                Home
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('top-authors')" :active="request()->routeIs('top-authors')">
                Top Authors
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
