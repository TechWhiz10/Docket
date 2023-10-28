<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Customer List') }}
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
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
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
    <div class="mx-auto sm:px-8 lg:px-30">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form>
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="flex items-center justify-between py-4 px-12">
                    <h1 class="text-3xl">Create new Client</h1>
                    <div class="flex items-center">
                        <button class="text-blue-500">Cancel</button>
                        <button wire:click.prevent="store()" class="text-white rounded-lg bg-black py-2 px-3 ml-5">Save</button>
                    </div>
                </div>
                <div class="border-t border-gray-200"></div>
                <div class="grid grid-cols-2 gap-x-48 gap-y-8 p-12">
                    <div class="col-span-2 mb-10">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-medium mb-4">Client info</h1>
                            <div class="w-40">
                                <select wire:change="changeStage()" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="stage">
                                    <option value="{{ config('constants.USER_STAGE_ACTIVE') }}">Active</option>
                                    <option value="{{ config('constants.USER_STAGE_INACTIVE') }}">Inactive</option>
                                    <option value="{{ config('constants.USER_STAGE_PROSPECT') }}">Prospect</option>
                                </select>
                                @if ($stage == config('constants.USER_STAGE_ACTIVE'))
                                <select wire:change="changeStatus()" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3" wire:model="status">
                                    <option value="{{ config('constants.USER_STATUS_PAID') }}">Paid</option>
                                    <option value="{{ config('constants.USER_STATUS_UNPAID') }}">Unpaid</option>
                                </select>
                                @elseif ($stage == config('constants.USER_STAGE_PROSPECT'))
                                <select wire:change="changeStatus()" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3" wire:model="status">
                                    <option value="{{ config('constants.USER_STATUS_LOST') }}">Lost</option>
                                    <option value="{{ config('constants.USER_STATUS_NEGOTIATION') }}">Negotiation</option>
                                    <option value="{{ config('constants.USER_STATUS_NEW') }}">New</option>
                                    <option value="{{ config('constants.USER_STATUS_WON') }}">Won</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="border-0 rounded-lg w-40 h-30 flex items-center justify-center">
                                @if ($customer_logo)
                                <img class="absolute w-36 h-28 rounded" src="{{ $customer_logo->temporaryUrl() }}" />
                                @endif
                                <div class="flex items-center justify-center w-full h-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" wire:model="customer_logo" />
                                    </label>
                                </div>
                                {{-- <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="customer_logo"> --}}
                            </div>
                            <div class="ml-10">
                                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Client name</label>
                                <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-2xl text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Enter client name" wire:model="customer_name" required>
                                @error('customer_name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mb-10">
                        <h1 class="text-xl font-medium mb-4">Primary contact</h1>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">First name</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Enter first name" wire:model="first_name" required>
                            @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Last name</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Enter last name" wire:model="last_name" required>
                            @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Enter email" wire:model="email" required>
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="" wire:model="phone">
                            @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-span-1 mb-10"></div>
                    <div class="col-span-1 mb-10">
                        <h1 class="text-xl font-medium mb-4">Site info</h1>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Site name</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Enter site name" wire:model="site_name" required>
                            @error('site_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Contact number</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Enter the contact number" wire:model="contact_number">
                            @error('contact_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-span-1 mb-10">
                        <h1 class="text-xl font-medium mb-4">Business hours</h1>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Timezone</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Choose timezone" wire:model="timezone">
                            @error('timezone') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-span-1 mb-10">
                        <h1 class="text-xl font-medium mb-4">Associated domains</h1>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Email domains</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Type value and press enter" wire:model="domains">
                            @error('domains') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-span-1 mb-10">
                        <h1 class="text-xl font-medium mb-4">Access Control</h1>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Account manager</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Select account manager" wire:model="account_manager">
                            @error('account_manager') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Technician groups</label>
                            <input type="text" class="appearance-none border-0 border-b w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0" id="exampleFormControlInput1" placeholder="Select..." wire:model="technician_groups">
                            @error('technician_groups') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-span-1">
                        <h1 class="text-xl font-medium mb-20">Additional properties</h1>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
