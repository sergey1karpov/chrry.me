<script>
    function onSubmit(token) {
        document.getElementById("reset-pass").submit();
    }
</script>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>

        <!-- Session Status -->
        <div class="text-center">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>

        <!-- Validation Errors -->
        <div class="text-center">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        <div class="mt-4">

            <div class="flex justify-center mb-10 ">
                <a href="http://chrry.me/" class="flex items-center mb-4">
                    <img src="https://i.ibb.co/bPydGXN/3.png" class="mr-3 h-15" alt="CHRRY.ME" />
                </a>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="text-center" id="reset-pass">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{--            <!-- Email Address -->--}}
                {{--            <div>--}}
                {{--                <x-label for="email" :value="__('Email')" style="font-family: 'Rubik', sans-serif;"/>--}}

                {{--                <x-input style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;" id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
                {{--            </div>--}}
                <!-- Email Address -->
                <div class="mt-4">
{{--                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Email address</label>--}}
                    <input type="email"
                           name="email"
                           id="email"
                           class="bg-gray-50 text-gray-300 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{$request->email}}"
                           required>
                </div>

                <!-- Password -->
                <div class="mt-4">
{{--                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Password</label>--}}
                    <input type="password"
                           name="password"
                           id="password"
                           class="bg-gray-50 text-gray-300 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="{{ __('main.new_pass') }}"
                           required>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
{{--                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Confirm Password</label>--}}
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           class="bg-gray-50 text-gray-300 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="{{ __('main.reg_re_pass') }}"
                           required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="g-recaptcha inline-block text-xl rounded-full bg-red-500 w-full py-2 text-sm font-bold text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-500"
                            data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA"
                            data-callback='onSubmit'
                            data-action='submit'>
                        {{ __('main.reset_pass') }}
                    </button>
                </div>
            </form>
        </div>

    </x-auth-card>
</x-guest-layout>



