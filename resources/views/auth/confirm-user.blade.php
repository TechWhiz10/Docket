<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        
        <form method="POST" action="{{ route('confirm-user') }}">
            @csrf
            <div>
                <x-label for="username" value="{{ __('User Name') }}" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>
            
            @isset ($error)
                <div>
                    <div class="mt-4 font-medium text-sm text-red-600">
                        {{ $error}}
                    </div>
                </div>
            @endisset
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your username?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Next') }}
                </x-button>
            </div>

            <div class="mt-4">
                <x-label for="sso">Sign-in via SSO:</x-label>
            </div>

            <div class="flex items center justify-between mt-4">
                <x-button class="bg-stone-500">{{ __('Google Workspace') }}</x-button>
                <x-button class="bg-stone-500">{{ __('Microsoft Account') }}</x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
