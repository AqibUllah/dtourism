<x-guest-layout>
    <form method="POST" action="{{ route('tour_guide.register') }}" enctype="multipart/form-data">
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
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required
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
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                              name="password_confirmation" required
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')"/>
                <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')"
                              required autocomplete="phone"/>
                <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
            </div>

            <!-- Age -->
            <div>
                <x-input-label for="age" :value="__('Age')"/>
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required
                              autocomplete="age"/>
                <x-input-error :messages="$errors->get('age')" class="mt-2"/>
            </div>

            <!-- City -->
            <div class="grid grid-cols-3 md:grid-cols-3 gap-x-3 col-span-2">

                <div>
                    <x-input-label for="city" :value="__('City')"/>
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                                  required autocomplete="city"/>
                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                </div>

                <!-- Street -->
                <div>
                    <x-input-label for="street" :value="__('Street')"/>
                    <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')"
                                  required autocomplete="street"/>
                    <x-input-error :messages="$errors->get('street')" class="mt-2"/>
                </div>

                <!-- House Number -->
                <div>
                    <x-input-label for="house_no" :value="__('House #')"/>
                    <x-text-input id="house_no" class="block mt-1 w-full" type="text" name="house_no"
                                  :value="old('house_no')" required autocomplete="house_no"/>
                    <x-input-error :messages="$errors->get('house_no')" class="mt-2"/>
                </div>
            </div>

            <!-- Language - Specialization - Price Per 3 Hours -->
            <div class="grid grid-cols-3 md:grid-cols-3 gap-x-3 col-span-2">

                <div>
                    <x-input-label for="language" :value="__('Language')"/>
                    <x-text-input id="language" class="block mt-1 w-full" type="text" name="language" :value="old('language')"
                                  required autocomplete="language"/>
                    <x-input-error :messages="$errors->get('language')" class="mt-2"/>
                </div>

                <!-- Street -->
                <div>
                    <x-input-label for="specialization" :value="__('Specialization')"/>
                    <x-text-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')"
                                  required autocomplete="specialization"/>
                    <x-input-error :messages="$errors->get('specialization')" class="mt-2"/>
                </div>

                <!-- House Number -->
                <div>
                    <x-input-label for="price_per_3_hours" :value="__('Price per 3 hours')"/>
                    <x-text-input id="price_per_3_hours" class="block mt-1 w-full" type="text" name="price_per_3_hours"
                                  :value="old('price_per_3_hours')" required autocomplete="price_per_3_hours"/>
                    <x-input-error :messages="$errors->get('price_per_3_hours')" class="mt-2"/>
                </div>
            </div>


            <!-- Gender -->
            <div>
                <x-input-label for="gender" :value="__('Gender')"/>
                <x-select-input
                    name="gender"
                    :options="['male' => 'Male', 'female' => 'Female']"
                    placeholder="select gender"
                    selected="{{ old('gender') }}"
                    required
                />
                <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
            </div>

            <!-- Nationality -->
            <div>
                <x-input-label for="nationality" :value="__('Nationality')"/>
                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality"
                              :value="old('nationality')" required autocomplete="nationality"/>
                <x-input-error :messages="$errors->get('nationality')" class="mt-2"/>
            </div>

            <div>
                <x-input-label for="image" class="mt-2" value="{{ __('Tour Guide Image') }}" />
                <x-text-input type="file" class="form-control w-full mt-1" id="image" name="image" accept="image/jpg, image/jpeg, image/png" />
                <x-input-error clss="mb-4" :messages="$errors->get('image')" class="mt-1 mb-4" />
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
