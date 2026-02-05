<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT -->
            <div class="flex">

                <!-- Logo (renvoie vers HOME publique) -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-purple-600 tracking-tight">
                        OverStock
                    </a>
                </div>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">

                    {{-- Accueil public --}}
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Accueil
                    </x-nav-link>

                    {{-- Dashboard --}}
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    {{-- USER LINKS --}}
                    @if(auth()->user()->role === 'user')
                        <x-nav-link :href="route('offers.index')" :active="request()->routeIs('offers.*')">
                            Offres
                        </x-nav-link>

                        <x-nav-link :href="route('user.favorites')" :active="request()->routeIs('user.favorites')">
                            Favoris
                        </x-nav-link>
                    @endif

                    {{-- ADMIN LINK --}}
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                            Utilisateurs
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- RIGHT -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-6">

                {{-- Nom utilisateur --}}
                <span class="text-sm text-gray-600">
                    {{ Auth::user()->name }}
                </span>

                {{-- Bouton déconnexion --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm font-medium text-red-600 hover:text-red-800 transition">
                        Déconnexion
                    </button>
                </form>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('home')">
                Accueil
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            @if(auth()->user()->role === 'user')
                <x-responsive-nav-link :href="route('offers.index')">
                    Offres
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('user.favorites')">
                    Favoris
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.users.index')">
                    Utilisateurs
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- User info -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 text-sm text-gray-600">
                {{ Auth::user()->email }}
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <x-responsive-nav-link
                    :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Déconnexion
                </x-responsive-nav-link>
            </form>
        </div>

    </div>
</nav>