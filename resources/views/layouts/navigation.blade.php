<nav x-data="{ open: false }" class="bg-[#0f172a] border-b border-slate-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('products.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')" class="text-slate-100 dark:text-slate-100 hover:text-emerald-400 font-bold">
        {{ __('Katalog Produk') }}
    </x-nav-link>
</div>
            </div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                           <button class="inline-flex items-center px-3 py-2 border border-slate-700 text-xs font-semibold rounded-lg text-slate-300 bg-slate-800/80 hover:bg-slate-700 hover:text-white focus:outline-none transition">
    <div>{{ Auth::user()->name }}</div>
    <div class="ms-1">
        <svg class="fill-current h-3.5 w-3.5" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
</button>
                        </x-slot>
                        <x-slot name="content">
    <div class="px-4 py-2 border-b border-slate-800/80 mb-1">
        <p class="text-[10px] text-slate-500 font-mono uppercase tracking-wider">Masuk Sebagai</p>
        <p class="text-xs font-bold text-slate-200 truncate">{{ Auth::user()->name }}</p>
        <span class="inline-block mt-1 text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-bold uppercase">
            {{ Auth::user()->role }}
        </span>
    </div>

    <x-dropdown-link :href="route('profile.edit')">
        {{ __('Pengaturan Profil') }}
    </x-dropdown-link>

    <!-- Authentication (Logout) -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();"
                class="text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 border-t border-slate-800/80 mt-1">
            {{ __('Keluar (Log Out)') }}
        </x-dropdown-link>
    </form>
</x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-4 font-mono text-xs">
                        <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500 font-semibold">Log in</a>
                        <a href="{{ route('register') }}" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-500 text-white rounded-lg transition font-bold">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                {{ __('Katalog Produk') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 py-2 space-y-2">
                    <a href="{{ route('login') }}" class="block text-sm text-gray-700 dark:text-gray-300 font-bold">Log in</a>
                    <a href="{{ route('register') }}" class="block text-sm text-emerald-500 font-bold">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>