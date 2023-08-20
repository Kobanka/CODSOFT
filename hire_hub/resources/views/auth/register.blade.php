<x-guest-layout>



    {{-- Registering For a Candidate --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- Choice of User Role --}}
        <div class="flex flex-col p-4 border-2 rounded border-gray-600 gap-y-3" id="query">
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-800">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="text-xl md:text-2xl text-ClearBlue font-bold text-center">Create An Account - Register as</h2>
            <div class="flex flex-col md:flex-row md:gap-x-5 gap-y-5 justify-center items-center">
                <input type="button" name="role" value="employer" id="employer" class="btn1 cursor-pointer">
                <input type="button" name="role" value="candidate" id="candidate" class="btn1 cursor-pointer">
            </div>
        </div>
        <div class="hidden" id="form">
            <input type="hidden" name="role" id="roleInput"> <!-- Hidden input field for role -->
                <!-- Name -->
            <div>
                {{-- Display either Full Name or Company Based on the button the user will click --}}
                <x-input-label for="name" :value="__('Full Name')" class="hidden" id="fname"/>
                <x-input-label for="name" :value="__('Company Name')" class="hidden" id="cname"/>
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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
