<x-guest-layout>
    @push('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endpush
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="firstname" value="{{ __('First name') }}" />
                <x-jet-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <div class="row" style="display: flex">
                    <x-jet-input id="password" class="block mt-1 w-full pwd"  type="password" name="password" required autocomplete="new-password" />
                    <span class="input-group-btn" >
                    <button id="reveal" type="button"><img src="/pictures/eye.png"/></button>
                    </span>
                </div>
               </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <div class="row" style="display: flex">
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full pwd"  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <span class="input-group-btn" >
                    <button id="reveal2" type="button"><img src="/pictures/eye.png"/></button>
                    </span>
                </div>
                {{-- <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" /> --}}
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
