<x-site-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-2xl mx-auto space-y-6" enctype="multipart/form-data">
        @csrf

        <x-page-heading>Register</x-page-heading>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-divider />

        {{-- Employer Name--}}
        <div class="mt-4">
            <x-input-label for="employer_name" :value="__('Employer Name')" />
            <x-text-input id="employer_name" type="text" name="employer_name" :value="old('employer_name')" required autocomplete="employer_name" />
            <x-input-error :messages="$errors->get('employer_name')" class="mt-2" />
        </div>

        {{-- Employer Logo--}}
        <div class="mt-4">
            <x-input-label for="employer_logo" :value="__('Employer Logo')" />
            <x-text-input id="employer_logo" type="file" name="logo" :value="old('employer_logo')" required autocomplete="employer_logo" accept=".png,.jpg,.webp"/>
            <x-input-error :messages="$errors->get('employer_logo')" class="mt-2" />
        </div>

        <div class="flex items-center justify-start mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>

            <a class="underline ms-4 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        </div>
    </form>
</x-site-layout>
