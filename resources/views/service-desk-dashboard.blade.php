<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service Desk Dashboard') }}
        </h2>
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <!-- Settings Dropdown -->
            <div class="ml-3 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->first_name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->first_name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
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
    </x-slot>

    <div class="py-12 px-12">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-3 xl:grid-cols-6">
            <div class="rounded-xl hover:border hover:border-stroke hover:bg-white py-12 px-7.5 hover:shadow-xl text-center">
                <h1 class="text-lg">Open Tickets</h1>
                <h1 class="text-4xl font-bold mt-3 mb-10">12</h1>
            </div>
            <div class="rounded-xl hover:border hover:border-stroke hover:bg-white py-12 px-7.5 hover:shadow-xl text-center">
                <h1 class="text-lg">Tickets on SLA Hold</h1>
                <h1 class="text-4xl font-bold mt-3 mb-10">13</h1>
            </div>
            <div class="rounded-xl hover:border hover:border-stroke hover:bg-white py-12 px-7.5 hover:shadow-xl text-center">
                <h1 class="text-lg">P1 Incidents</h1>
                <h1 class="text-4xl font-bold mt-3 mb-10">3</h1>
            </div>
            <div class="rounded-xl hover:border hover:border-stroke hover:bg-white py-12 px-7.5 hover:shadow-xl text-center">
                <h1 class="text-lg">Unassigned Tickets</h1>
                <h1 class="text-4xl font-bold mt-3 mb-10">4</h1>
            </div>
            <div class="rounded-xl hover:border hover:border-stroke hover:bg-white py-12 px-7.5 hover:shadow-xl text-center">
                <h1 class="text-lg">Stale Tickets</h1>
                <h1 class="text-4xl font-bold mt-3 mb-10">11</h1>
            </div>
            <div class="rounded-xl hover:border hover:border-stroke hover:bg-white py-12 px-7.5 hover:shadow-xl text-center">
                <h1 class="text-lg">Resolved Today</h1>
                <h1 class="text-4xl font-bold mt-3 mb-10">0</h1>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
            <div class="col-span-1">
                <div class="">
                    <x-service-desk-chart-one />
                </div>
                <div class="">
                    <x-service-desk-chart-two />
                </div>
            </div>
            <div class="col-span-2 gap-y-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="col-span-1">
                        <x-service-desk-chart-three />
                    </div>
                    <div class="col-span-1">
                        <x-service-desk-chart-four />
                    </div>
                </div>
                <div class="">
                    <x-service-desk-table-one />
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="col-span-1">
                        <x-service-desk-chart-five />
                    </div>
                    <div class="col-span-1">
                        <x-service-desk-chart-six />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
