<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (Auth::user()->role == USER_ROLE_STAFF_C_LEVEL || Auth::user()->role == USER_ROLE_STAFF_MANAGEMENT)
                    <management-dashboard />
                @elseif (Auth::user()->role == USER_ROLE_STAFF_DEPARTMENT_MANAGER || Auth::user()->role == USER_ROLE_STAFF_TEAM_MANAGER || Auth::user()->role == USER_ROLE_STAFF_STAFF)
                    <sales-dashboard />
                @elseif (Auth::user()->role == USER_ROLE_CUSTOMER_MANAGEMENT || Auth::user()->role == USER_ROLE_CUSTOMER_MANAGER || Auth::user()->role == USER_ROLE_CUSTOMER_STAFF)
                    <service-desk-dashboard />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
