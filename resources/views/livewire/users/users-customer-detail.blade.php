<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('User List') }}
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

<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="p-6 lg:p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex items-center">
                <img class="h-16 w-16 rounded-full object-cover" src="/{{ $customer->avatar }}" alt="{{ $customer->first_name }}" />
                <div class="ml-5 flex flex-col items-start">
                    <div class="font-semibold text-xl">{{ $customer->first_name . ' ' . $customer->last_name }}</div>
                    <div class="">(This User is also an Agent)</div>
                </div>
            </div>
            <div class="mt-5">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mr-2">
                        <button class="inline-block py-2 px-4 rounded-t-lg {{ $tab == config('constants.USER_CUSTOMER_TAB_INFO') ? 'text-blue-600 bg-gray active' : 'hover:text-gray-600 hover:bg-gray-50' }}" wire:click="selectTab({{ config('constants.USER_CUSTOMER_TAB_INFO') }})">INFO</button>
                    </li>
                    <li class="">
                        <button class="inline-block py-2 px-4 rounded-t-lg {{ $tab == config('constants.USER_CUSTOMER_TAB_SITE') ? 'text-blue-600 bg-gray active' : 'hover:text-gray-600 hover:bg-gray-50' }}" wire:click="selectTab({{ config('constants.USER_CUSTOMER_TAB_SITE') }})">SITE</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-5">
            @if ($tab == config('constants.USER_CUSTOMER_TAB_INFO'))
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-7 h-50 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold">Subscription Reminders</h1>
                    </div>
                    <p class="mt-3">No items with an end date</p>
                </div>
                <div class="col-span-5 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold">Asset Overview</h1>
                    </div>
                    <div class="grid grid-cols-3 gap-2 mt-5">
                        <div class="col-span-1 text-center">
                            <p>Mac Assets</p>
                            <h1 class="text-2xl font-bold mt-5">1</h1>
                        </div>
                        <div class="col-span-1 text-center">
                            <p>Total Assets</p>
                            <h1 class="text-2xl font-bold mt-5">2</h1>
                        </div>
                        <div class="col-span-1 text-center">
                            <p>Windows Assets</p>
                            <h1 class="text-2xl font-bold mt-5">1</h1>
                        </div>
                    </div>
                </div>
                <div class="col-span-7 grid grid-cols-2 gap-x-2 gap-y-8 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="col-span-1 h-40">
                        <h1 class="text-2xl font-bold mb-5">Primary Contact</h1>
                        <div class="flex items-start">
                            <img class="h-10 w-10 rounded-full object-cover" src="/default.png" alt="Default" />
                            <div class="ml-5 flex flex-col">
                                <h1 class="text-xl">Micheal Scott</h1>
                                <a href="mailto:micheal.scott@dundermifflin.com" class="py-3 text-blue-500">micheal.scott@dundermifflin.com</a>
                                <a href="tel:+3135113423" class="text-blue-500">3135113423</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 h-40">
                        <h1 class="text-2xl font-bold mb-5">Technican Group</h1>
                        <p>Level 1 Support</p>
                        <p>Escalation Team</p>
                    </div>
                    <div class="col-span-1 h-40">
                        <h1 class="text-2xl font-bold mb-5">Secondary Contact</h1>
                        <p>NA</p>
                    </div>
                    <div class="col-span-1 h-40">
                        <h1 class="text-2xl font-bold mb-5">Email Domains</h1>
                        <p>NA</p>
                    </div>
                </div>
                <div class="col-span-5">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold">Tickets Status Tracker</h1>
                        </div>
                        <div class="grid grid-cols-8 gap-2 mt-5 justify-items-center items-center">
                            <div class="col-span-2 text-center">
                                <p>Closed Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">2</h1>
                            </div>
                            <div class="col-span-2 text-center">
                                <p>Open Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">3</h1>
                            </div>
                            <div class="col-span-2 text-center">
                                <p>Resolved Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">1</h1>
                            </div>
                            <div class="col-span-2 text-center">
                                <p>Tickets Overdue</p>
                                <h1 class="text-3xl font-bold mt-5">2</h1>
                            </div>
                            <div class="col-span-2 col-start-4 text-center self-center my-5">
                                <p>Unassigned Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">0</h1>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mt-5">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold">Tickets Status Tracker</h1>
                        </div>
                        <div class="grid grid-cols-3 gap-2 mt-5">
                            <div class="col-span-1 text-center">
                                <p>Closed Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">2</h1>
                            </div>
                            <div class="col-span-1 text-center">
                                <p>Open Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">3</h1>
                            </div>
                            <div class="col-span-1 text-center">
                                <p>Resolved Tickets</p>
                                <h1 class="text-3xl font-bold mt-5">1</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($tab == config('constants.USER_CUSTOMER_TAB_SITE'))
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-6 px-6">
                <div class="flex justify-between items-center py-4">
                    <h1 class="text-3xl font-medium">Site and business hours</h1>
                    <button class="bg-black text-white font-bold py-2 px-4 rounded-lg my-3 flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Edit / Add_Plus_Square">
                                    <path id="Vector" d="M8 12H12M12 12H16M12 12V16M12 12V8M4 16.8002V7.2002C4 6.08009 4 5.51962 4.21799 5.0918C4.40973 4.71547 4.71547 4.40973 5.0918 4.21799C5.51962 4 6.08009 4 7.2002 4H16.8002C17.9203 4 18.4801 4 18.9079 4.21799C19.2842 4.40973 19.5905 4.71547 19.7822 5.0918C20.0002 5.51962 20.0002 6.07967 20.0002 7.19978V16.7998C20.0002 17.9199 20.0002 18.48 19.7822 18.9078C19.5905 19.2841 19.2842 19.5905 18.9079 19.7822C18.4805 20 17.9215 20 16.8036 20H7.19691C6.07899 20 5.5192 20 5.0918 19.7822C4.71547 19.5905 4.40973 19.2842 4.21799 18.9079C4 18.4801 4 17.9203 4 16.8002Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </g>
                        </svg>
                        <p class="text-lg font-light ml-1">Site</p>
                    </button>
                </div>
                <div class="border-t border-gray-200"></div>
                <div class="flex justify-between items-center py-5">
                    <h1 class="text-2xl font-bold">New York</h1>
                    <div class="flex items-center">
                        <button class="border border-meta-9 p-3 shadow-xl rounded-lg">
                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                    fill="" />
                                <path
                                    d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                    fill="" />
                                <path
                                    d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                    fill="" />
                                <path
                                    d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                    fill="" />
                            </svg>
                        </button>
                        <button class="border border-meta-9 p-3 shadow-xl rounded-lg ml-5">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M15.4998 5.49994L18.3282 8.32837M3 20.9997L3.04745 20.6675C3.21536 19.4922 3.29932 18.9045 3.49029 18.3558C3.65975 17.8689 3.89124 17.4059 4.17906 16.9783C4.50341 16.4963 4.92319 16.0765 5.76274 15.237L17.4107 3.58896C18.1918 2.80791 19.4581 2.80791 20.2392 3.58896C21.0202 4.37001 21.0202 5.63634 20.2392 6.41739L8.37744 18.2791C7.61579 19.0408 7.23497 19.4216 6.8012 19.7244C6.41618 19.9932 6.00093 20.2159 5.56398 20.3879C5.07171 20.5817 4.54375 20.6882 3.48793 20.9012L3 20.9997Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-3 mt-5 pb-10">
                    <div class="col-span-1">
                        <div class="">
                            <h1 class="text-xl font-bold mb-7">Site information</h1>
                            <p class="text-sm">Contact number</p>
                        </div>
                        <div class="mt-3">
                            <h1 class="text-xl font-bold mb-7">NA</h1>
                            <p class="text-sm">Address</p>
                        </div>
                        <div class="mt-3">
                            <h1 class="text-xl font-bold mb-7">NA</h1>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="">
                            <h1 class="text-xl font-bold mb-7">Site business hours</h1>
                            <p class="text-sm">Timezone is</p>
                        </div>
                        <div class="mt-3">
                            <h1 class="text-xl font-bold mb-7">Asia/Kolkata</h1>
                            <p class="text-sm">Client working hours</p>
                        </div>
                        <div class="mt-3">
                            <h1 class="text-xl font-bold mb-7">Working 24*7</h1>
                            <p class="text-sm">Holiday list</p>
                        </div>
                        <div class="mt-3">
                            <h1 class="text-xl font-bold mb-7">NA</h1>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <h1 class="text-xl font-bold mb-4">Download the agent</h1>
                        <div class="w-full border rounded-lg mb-10 p-4">
                            <div class="flex items-center">
                                <div class="">
                                    <svg width="32" height="32" enable-background="new 0 0 24 24" id="Layer_1" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g>
                                            <polygon fill="#009ADA" points="12,11 23,11 23,1 12,2  "/>
                                            <polygon fill="#009ADA" points="10,11 10,2.1818237 1,3 1,11  "/>
                                            <polygon fill="#FFFFFF" opacity="0.2" points="12,2 12,2.25 23,1.25 23,1  "/>
                                            <rect height="0.25" opacity="0.1" width="11" x="12" y="10.75"/>
                                            <polygon fill="#FFFFFF" opacity="0.2" points="1,3 1,3.25 10,2.4318237 10,2.1818237  "/>
                                            <rect height="0.25" opacity="0.1" width="9" x="1" y="10.75"/>
                                            <polygon fill="#009ADA" points="12,13 23,13 23,23 12,22  "/>
                                            <polygon fill="#009ADA" points="10,13 10,21.8181763 1,21 1,13  "/>
                                            <polygon opacity="0.1" points="12,22 12,21.75 23,22.75 23,23  "/>
                                            <rect fill="#FFFFFF" height="0.25" opacity="0.2" width="11" x="12" y="13"/>
                                            <polygon opacity="0.1" points="1,21 1,20.75 10,21.5681763 10,21.8181763  "/>
                                            <rect fill="#FFFFFF" height="0.25" opacity="0.2" width="9" x="1" y="13"/>
                                            <linearGradient gradientUnits="userSpaceOnUse" id="SVGID_1_" x1="-0.0995096" x2="25.6315994" y1="5.3579059" y2="17.3565197">
                                                <stop offset="0" style="stop-color:#FFFFFF;stop-opacity:0.2"/>
                                                <stop offset="1" style="stop-color:#FFFFFF;stop-opacity:0"/>
                                            </linearGradient>
                                            <path d="M12,2v9h11V1L12,2z M1,11h9V2.1818237L1,3V11z M12,22l11,1V13H12V22z M1,21l9,0.8181763V13H1V21z" fill="url(#SVGID_1_)"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p>Windows agent</p>
                                    <p class="text-sm">Supported OS from Windows 10 or higher</p>
                                </div>
                            </div>
                            <div class="flex items-center py-6">
                                <a href="" class="underline text-blue-500" download>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M7.33199 16.3154C6.94146 15.9248 6.3083 15.9248 5.91777 16.3154C5.52725 16.7059 5.52725 17.339 5.91777 17.7296L10.5834 22.3952C11.3644 23.1762 12.6308 23.1762 13.4118 22.3952L18.0802 17.7267C18.4707 17.3362 18.4707 16.703 18.0802 16.3125C17.6897 15.922 17.0565 15.922 16.666 16.3125L13 19.9786V2.0001C13 1.44781 12.5523 1.0001 12 1.0001C11.4477 1.0001 11 1.44781 11 2.0001V19.9833L7.33199 16.3154Z" fill="#3B82F6"></path>
                                        </g>
                                    </svg>
                                </a>
                                <a href="" class="ml-2 underline text-blue-500" download>windows_x64.msi</a>
                            </div>
                        </div>
                        <div class="w-full border rounded-lg mb-6 p-4">
                            <div class="flex items-center">
                                <div class="">
                                    <svg width="32" height="32" enable-background="new 0 0 512 512" id="Layer_1" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g>
                                            <path d="M185.7,127.4c10.2-0.2,27.4,6.3,44.3,13.2c27.7,11.1,32,11.6,59.7,0.2c16.4-6.7,33.1-12.2,50.8-14   c27.2-2.8,52.2,3.6,75.5,17.6c11.5,7,21.7,15.4,29.9,26.1c2.8,3.6,2.9,5.6-1.3,8.4c-46.5,30.6-63.2,91.7-39,142.3   c11.3,23.6,29.2,40.7,52.6,52c3.7,1.8,4.3,3.4,2.9,7.2c-11.8,32.8-28.5,62.7-50.6,89.6c-5.3,6.4-10.7,12.7-16.7,18.6   c-18.2,18.1-39.4,23.6-64.2,16.9c-10.8-2.9-20.9-7.7-31.4-11.3c-28.2-9.8-55.1-4.6-81.6,6.7c-9.6,4.1-19.5,6.7-29.8,7.8   c-14.9,1.6-27.9-3.5-39.1-13.1c-22.3-19-39.5-42.2-54.1-67.5c-15.8-27.3-26.8-56.5-34.1-87.1c-6.9-28.9-9.8-58.1-6.5-87.7   c3-27.3,11.3-52.9,27.7-75.1C104.5,146,136.4,128.3,185.7,127.4z" fill="#6C6C6C"/>
                                            <path d="M255.9,110.4c1.4-36.4,18.4-64.2,47.3-85.3C318.1,14.1,335,7.9,353.1,4.6c3.9-0.7,4.9,0.4,4.9,4.2   c0.3,41.6-16.9,74.4-50.1,98.6c-13.4,9.8-29.3,14-46.1,13.8c-4.5,0-6.5-1.2-5.9-5.9C256.1,113.7,255.9,112,255.9,110.4z" fill="#6D6D6D"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p>Mac agent</p>
                                    <p class="text-sm">Supported OS from Mac OS 10.15 or higher</p>
                                </div>
                            </div>
                            <div class="flex items-center py-6">
                                <a href="" class="underline text-blue-500" download>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M7.33199 16.3154C6.94146 15.9248 6.3083 15.9248 5.91777 16.3154C5.52725 16.7059 5.52725 17.339 5.91777 17.7296L10.5834 22.3952C11.3644 23.1762 12.6308 23.1762 13.4118 22.3952L18.0802 17.7267C18.4707 17.3362 18.4707 16.703 18.0802 16.3125C17.6897 15.922 17.0565 15.922 16.666 16.3125L13 19.9786V2.0001C13 1.44781 12.5523 1.0001 12 1.0001C11.4477 1.0001 11 1.44781 11 2.0001V19.9833L7.33199 16.3154Z" fill="#3B82F6"></path>
                                        </g>
                                    </svg>
                                </a>
                                <a href="" class="ml-2 underline text-blue-500" download>Macos_amd64.pkg</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200"></div>
                <div class="flex justify-between items-center py-8">
                    <h1 class="text-3xl font-medium">Scranton HQ</h1>
                    <button class="border border-meta-9 p-3 shadow-xl rounded-lg ml-5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M15.4998 5.49994L18.3282 8.32837M3 20.9997L3.04745 20.6675C3.21536 19.4922 3.29932 18.9045 3.49029 18.3558C3.65975 17.8689 3.89124 17.4059 4.17906 16.9783C4.50341 16.4963 4.92319 16.0765 5.76274 15.237L17.4107 3.58896C18.1918 2.80791 19.4581 2.80791 20.2392 3.58896C21.0202 4.37001 21.0202 5.63634 20.2392 6.41739L8.37744 18.2791C7.61579 19.0408 7.23497 19.4216 6.8012 19.7244C6.41618 19.9932 6.00093 20.2159 5.56398 20.3879C5.07171 20.5817 4.54375 20.6882 3.48793 20.9012L3 20.9997Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
