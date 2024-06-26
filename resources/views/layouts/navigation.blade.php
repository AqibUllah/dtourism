<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if(auth()->guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                        </a>
                    @elseif(auth()->guard('customer')->check())
                        <a href="{{ route('customer.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                        </a>
                    @elseif(auth()->guard('hotelmanager')->check())
                        <a href="{{ route('hotel_manager.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                        </a>
                    @elseif(auth()->guard('transporter')->check())
                        <a href="{{ route('transporter.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                        </a>
                    @else
                        <a href="{{ route('tour_guide.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                        </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(auth()->guard('admin')->check())
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.vehicles.create')"
                                    :active="request()->routeIs('admin.vehicles.create')">
                            {{ __('Vehicle') }}
                        </x-nav-link>
                    @elseif(auth()->guard('hotelmanager')->check())
                        <x-nav-link :href="route('hotel_manager.dashboard')"
                                    :active="request()->routeIs('hotel_manager.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('hotel_manager.hotels.index')"
                                    :active="request()->routeIs('hotel_manager.hotels.*')">
                            {{ __('Hotels') }}
                        </x-nav-link>
                    @elseif(auth()->guard('customer')->check())
                        <x-nav-link :href="route('customer.dashboard')"
                                    :active="request()->routeIs('customer.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('customer.bookings.create')"
                                    :active="request()->routeIs('customer.bookings.create')">
                            {{ __('Booking') }}
                        </x-nav-link>
                    @elseif(auth()->guard('transporter')->check())
                        <x-nav-link :href="route('transporter.dashboard')"
                                    :active="request()->routeIs('transporter.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('transporter.vehicles.index')"
                                    :active="request()->routeIs('transporter.vehicles.*')">
                            {{ __('Vehicles') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('tour_guide.dashboard')"
                                    :active="request()->routeIs('tour_guide.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @if(auth()->guard('admin')->check())
                                <div>{{ Auth::guard('admin')->user()->name }}</div>
                            @elseif(auth()->guard('customer')->check())
                                <div>{{ Auth::guard('customer')->user()->name }}</div>
                            @elseif(auth()->guard('hotelmanager')->check())
                                <div>{{ Auth::guard('hotelmanager')->user()->name }}</div>
                            @elseif(auth()->guard('transporter')->check())
                                <div>{{ Auth::guard('transporter')->user()->name }}</div>
                            @else
                                <div>{{ Auth::guard('tour_guide')->user()->name }}</div>
                            @endif
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(auth()->guard('admin')->check())
                            <x-dropdown-link :href="route('admin.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        @elseif(auth()->guard('hotelmanager')->check())
                            <x-dropdown-link :href="route('hotel_manager.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        @elseif(auth()->guard('transporter')->check())
                            <x-dropdown-link :href="route('transporter.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        @elseif(auth()->guard('customer')->check())
                            <x-dropdown-link :href="route('customer.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('tour_guide.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        @endif


                        <!-- Authentication -->
                        @if(auth()->guard('admin')->check())
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('admin.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @elseif(auth()->guard('transporter')->check())
                            <form method="POST" action="{{ route('transporter.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('transporter.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @elseif(auth()->guard('hotelmanager')->check())
                            <form method="POST" action="{{ route('hotel_manager.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('hotel_manager.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @elseif(auth()->guard('customer')->check())
                            <form method="POST" action="{{ route('customer.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('customer.logout')"
                                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <form method="POST" action="{{ route('tour_guide.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('tour_guide.logout')"
                                                 onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            @if(auth()->guard('admin')->check())
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @elseif(auth()->guard('customer')->check())
                <x-responsive-nav-link :href="route('customer.dashboard')"
                                       :active="request()->routeIs('customer.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @elseif(auth()->guard('hotelmanager')->check())
                <x-responsive-nav-link :href="route('hotel_manager.dashboard')"
                                       :active="request()->routeIs('hotel_manager.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @elseif(auth()->guard('transporter')->check())
                <x-responsive-nav-link :href="route('transporter.dashboard')"
                                       :active="request()->routeIs('transporter.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('tour_guide.dashboard')"
                                       :active="request()->routeIs('tour_guide.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @if(auth()->guard('admin')->check())
                    <div class="font-medium text-base text-gray-800">{{ Auth::guard('admin')->user()->name }}</div>
                @elseif(auth()->guard('customer')->check())
                    <div class="font-medium text-sm text-gray-500">{{ Auth::guard('customer')->user()->email }}</div>
                @elseif(auth()->guard('hotelmanager')->check())
                    <div
                        class="font-medium text-sm text-gray-500">{{ Auth::guard('hotelmanager')->user()->email }}</div>
                @elseif(auth()->guard('transporter')->check())
                    <div class="font-medium text-sm text-gray-500">{{ Auth::guard('transporter')->user()->email }}</div>
                @else
                    <div class="font-medium text-sm text-gray-500">{{ Auth::guard('tour_guide')->user()->email }}</div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                @if(auth()->guard('admin')->check())
                    <x-responsive-nav-link :href="route('admin.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @elseif(auth()->guard('customer')->check())
                    <x-responsive-nav-link :href="route('customer.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @elseif(auth()->guard('hotelmanager')->check())
                    <x-responsive-nav-link :href="route('hotel_manager.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @elseif(auth()->guard('transporter')->check())
                    <x-responsive-nav-link :href="route('transporter.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('tour_guide.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                @if(auth()->guard('admin')->check())
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('admin.logout')"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @elseif(auth()->guard('transporter')->check())
                    <form method="POST" action="{{ route('transporter.logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('transporter.logout')"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @elseif(auth()->guard('hotelmanager')->check())
                    <form method="POST" action="{{ route('hotel_manager.logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('hotel_manager.logout')"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @elseif(auth()->guard('customer')->check())
                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('customer.logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <form method="POST" action="{{ route('tour_guide.logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('tour_guide.logout')"
                                               onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>
