<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->


                <!-- For Patient only -->
                @if(Auth::user()->user_type === 'student')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('medicalhistory')" :active="request()->routeIs('medicalhistory')">
                        {{ __('Medical History') }}
                    </x-nav-link>
                </div>
                @endif

                @if(Auth::user()->user_type === 'student')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('appointmentspage')" :active="request()->routeIs('appointmentspage')">
                        {{ __('Appointments') }}
                    </x-nav-link>
                </div>
                @endif

                @if(Auth::user()->user_type === 'student')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('user_requested_appointments')" :active="request()->routeIs('user_requested_appointments')">
                        {{ __('User Appointments') }}
                    </x-nav-link>
                </div>
                @endif

                <!-- For Super Admin only --->
                @if(Auth::user()->user_type === 'super-admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('account-list')" :active="request()->routeIs('account-list')">
                        {{ __('Account List') }}
                    </x-nav-link>
                </div>
                @endif
                @if(Auth::user()->user_type === 'super-admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('create-account')" :active="request()->routeIs('create-account')">
                        {{ __('Create New Account') }}
                    </x-nav-link>
                </div>
                @endif
                <!-- For Admin only --->
                @if(Auth::user()->user_type === 'admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('view-list-appointment-page')" :active="request()->routeIs('view-list-appointment-page')">
                        {{ __('View Appointments') }}
                    </x-nav-link>
                </div>
                @endif

                @if(Auth::user()->user_type === 'admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('create-appointment-page')" :active="request()->routeIs('create-appointment-page')">
                        {{ __('Create New Appointment') }}
                    </x-nav-link>
                </div>
                @endif
            </div>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 space-x-2">
                            @if(Auth::user()->user_type === 'super-admin')
                            <div class="text-xsm bg-yellow-500 text-white rounded-lg p-1 ">
                                Super Admin
                            </div>
                            @endif
                            @if(Auth::user()->user_type === 'admin')
                            <div class="text-xsm bg-red-500 text-white rounded-lg p-1 ">
                                Admin
                            </div>
                            @endif
                            @if(Auth::user()->user_type === 'student')
                            <div class="text-xsm bg-green-500 text-white rounded-lg p-1 ">
                                Student
                            </div>
                            @endif
                            @if(Auth::user()->user_type === 'doctor')
                            <div class="text-xsm bg-blue-500 text-white rounded-lg p-1 ">
                                Doctor
                            </div>
                            @endif
                            <div>{{ Auth::user()->first_name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.orzg/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        @if(Auth::user()->user_type === 'super-admin')
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('create-account')" :active="request()->routeIs('create-account')">
                {{ __('Create Account') }}
            </x-responsive-nav-link>
        </div>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->first_name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>