<x-guest-layout>
    <form method="POST" action="{{ route('tour_guide.register') }}">
        @csrf

        <div class="grid grid-cols-2 md:grid-cols-2 gap-6">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')"/>
                <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="phone"/>
                <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
            </div>

            <!-- Age -->
            <div>
                <x-input-label for="age" :value="__('Age')"/>
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autocomplete="age"/>
                <x-input-error :messages="$errors->get('age')" class="mt-2"/>
            </div>

            <!-- City -->
            <div>
                <x-input-label for="city" :value="__('City')"/>
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city"/>
                <x-input-error :messages="$errors->get('city')" class="mt-2"/>
            </div>

            <!-- Street -->
            <div>
                <x-input-label for="street" :value="__('Street')"/>
                <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autocomplete="street"/>
                <x-input-error :messages="$errors->get('street')" class="mt-2"/>
            </div>

            <!-- House Number -->
            <div>
                <x-input-label for="house_no" :value="__('House #')"/>
                <x-text-input id="house_no" class="block mt-1 w-full" type="text" name="house_no" :value="old('house_no')" required autocomplete="house_no"/>
                <x-input-error :messages="$errors->get('house_no')" class="mt-2"/>
            </div>

            <!-- Gender -->
            <div>
                <x-input-label for="gender" :value="__('Gender')"/>
                <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autocomplete="gender"/>
                <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
            </div>

            <!-- Nationality -->
            <div>
                <x-input-label for="nationality" :value="__('Nationality')"/>
                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('nationality')" required autocomplete="nationality"/>
                <x-input-error :messages="$errors->get('nationality')" class="mt-2"/>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('tour_guide.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
