<x-guest-layout>
    <h2>Teacher Rigester</h2>

    <form method="POST" action="{{ route("teacher.store") }}">
        @csrf
        <!-- Name Address -->
        <div>
            <x-input-label for="text" :value="__('Name')" />
            <x-text-input id="text" class="block mt-1 w-full" type="text" name="name" :value="old('text')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
