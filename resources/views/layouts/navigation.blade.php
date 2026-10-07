<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 text-slate-800 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo-trimmed.png') }}" alt="PCBA Logo" class="h-9 w-auto">
                        <div class="hidden md:block leading-tight text-left">
                            <div class="text-sm font-black tracking-wider text-slate-900">PCBA <span class="text-orange-600">PIPAVAV</span></div>
                            <div class="text-[10px] text-slate-500 font-semibold uppercase tracking-widest">Member Portal</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-8 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-semibold {{ request()->routeIs('dashboard') ? 'text-orange-600 border-b-2 border-orange-600' : 'text-slate-600 hover:text-slate-900' }} transition">
                        <i class="bi bi-speedometer2 me-1.5"></i> Dashboard
                    </a>
                    <a href="{{ route('membership.search') }}" class="inline-flex items-center px-1 pt-1 text-sm font-semibold {{ request()->routeIs('membership.search') ? 'text-orange-600 border-b-2 border-orange-600' : 'text-slate-600 hover:text-slate-900' }} transition">
                        <i class="bi bi-search me-1.5"></i> Member Directory
                    </a>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-sm font-semibold text-slate-500 hover:text-slate-800 transition">
                        <i class="bi bi-box-arrow-up-right me-1.5 text-xs"></i> Public Portal
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Regulatory status pill -->
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 me-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                    Reg 20 Active
                </span>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-slate-200 text-sm leading-4 font-medium rounded-lg text-slate-700 bg-slate-50 hover:bg-slate-100 hover:text-slate-900 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-orange-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-slate-800">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-1.5">
                                <svg class="fill-current h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs text-slate-500 border-b border-slate-100">
                            Signed in as<br>
                            <span class="font-bold text-slate-800">{{ Auth::user()->email }}</span>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="bi bi-person-fill-gear me-2"></i> {{ __('Edit Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('cfs-passes')">
                            <i class="bi bi-card-list me-2"></i> {{ __('CFS Passes') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('contacts.index')">
                            <i class="bi bi-people-fill me-2"></i> {{ __('Contact Manager') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('password.change')">
                            <i class="bi bi-key-fill me-2"></i> {{ __('Change Password') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('home')">
                            <i class="bi bi-globe me-2"></i> {{ __('Return to Website') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="text-red-600 hover:text-red-700"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-slate-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-slate-800">
                <i class="bi bi-speedometer2 me-2"></i> {{ __('Member Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('membership.search')" class="text-slate-700">
                <i class="bi bi-search me-2"></i> {{ __('Member Directory') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')" class="text-slate-700">
                <i class="bi bi-globe me-2"></i> {{ __('Public Portal') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-slate-200">
            <div class="px-4">
                <div class="font-medium text-base text-slate-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-slate-700">
                    <i class="bi bi-person-gear me-2"></i> {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-600 hover:text-red-700"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
