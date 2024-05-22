<x-guest-layout>
    <form method="POST" action="{{ route('customer.register') }}">
        @csrf

        <div class="grid grid-cols-2 gap-5">
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
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')"/>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="grid grid-cols-2 gap-5 col-span-2">
                <div>
                    <x-input-label for="city" :value="__('City')"/>

                    <x-text-input id="city" class="block mt-1 w-full"
                                  type="text"
                                  name="city" required/>

                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="street" :value="__('Street')"/>

                    <x-text-input id="street" class="block mt-1 w-full"
                                  type="text"
                                  name="street" required/>

                    <x-input-error :messages="$errors->get('street')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="house_no" :value="__('House #')"/>

                    <x-text-input id="house_no" class="block mt-1 w-full"
                                  type="text"
                                  name="house_no" required/>

                    <x-input-error :messages="$errors->get('house_no')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="phone_no" :value="__('Pone')"/>

                    <x-text-input id="phone_no" class="block mt-1 w-full"
                                  type="number"
                                  name="phone_no" required/>

                    <x-input-error :messages="$errors->get('phone_no')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="age" :value="__('Age')"/>

                    <x-text-input id="age" class="block mt-1 w-full"
                                  type="number"
                                  name="age" required/>

                    <x-input-error :messages="$errors->get('age')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="gender" :value="__('Gender')"/>
                    <x-select-input
                        name="gender"
                        :options="['male' => 'Male', 'female' => 'Female']"
                        selected="{{ old('gender') }}"
                        placeholder="select gender"
                        required
                    />
                </div>
            </div>

            <div class="col-span-2">
                <x-input-label for="nationality" :value="__('Nationality')"/>
                <x-select-input
                    name="nationality"
                    :options="['pakistani' => 'Pakistani', 'other' => 'Other']"
                    selected="{{ old('nationality') }}"
                    placeholder="select nationality"
                    required
                />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('customer.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
