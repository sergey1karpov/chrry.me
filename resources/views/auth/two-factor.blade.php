<script>
    function onSubmit(token) {
        document.getElementById("login-form").submit();
    }
</script>

<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>
        </x-slot>

        <!-- Session Status -->
        <div class="text-center">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>

        <!-- Validation Errors -->
        <div class="text-center">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        <div class="m-4">

            <p class=" mt-3 mb-10 text-4xl font-black text-gray-900 text-dark">
                Сonfirm your login
{{--                <span class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-red-500 relative inline-block">--}}
{{--                    <a href="{{ route('welcome') }}"><span class="relative text-white">CHRRY.ME</span></a>--}}
{{--                </span>--}}
            </p>

            <form method="POST" action="{{ route('hashCheck') }}" class="text-center" id="login-form"> @csrf

                <!-- Email Address -->
                <div class="mt-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-dark">
                        A code has been sent to your email, please enter it.</label>
                    <input type="text"
                           name="hash"
                           id="hash"
                           class="bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="*************"
                           required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="g-recaptcha w-full text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-2 font-medium rounded-lg text px-5 py-2.5 text-center mr-2 mb-2"
                            data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA"
                            data-callback='onSubmit'
                            data-action='submit'>
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>





