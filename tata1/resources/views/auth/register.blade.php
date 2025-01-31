<x-guest-layout>
    <!-- Navbar -->
    <nav class="fixed top-0 inset-x-0 bg-green-700 dark:bg-gray-900 p-4 shadow-lg z-50">
        <div class="flex items-center justify-between max-w-6xl mx-auto px-4">
            <!-- Brand Name or Logo -->
            <a href="/" class="text-2xl font-bold text-white">tATa</a>

            <!-- Navbar Buttons with Circular Borders -->
            <div class="space-x-4 flex items-center">
                <a href="/" class="text-white hover:text-gray-200 dark:hover:text-gray-400 px-4 py-2 rounded-full border border-white">
                    Home
                </a>
                <a href="{{ route('register') }}" class="text-white hover:text-gray-200 dark:hover:text-gray-400 px-4 py-2 rounded-full border border-white">
                    Signup
                </a>
            </div>
        </div>
    </nav>

    <!-- Full-Screen Background Image with Overlay -->
    <div class="fixed inset-0 flex items-center justify-center p-8 bg-gray-900 bg-opacity-50">
        <div class="w-full h-full bg-cover bg-center rounded-lg overflow-hidden p-4" style="background-image: url('/images/logingreen.jpg');">
            
            <!-- Centered Register Card -->
            <div class="relative z-10 flex items-center justify-center h-screen">
                <div class="w-full max-w-md bg-white bg-opacity-10 dark:bg-gray-800 dark:bg-opacity-80 shadow-lg rounded-lg p-8 border border-gray-300 dark:border-white">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

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
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
