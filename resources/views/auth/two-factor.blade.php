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

        @if ($message = Session::get('bad_code'))
            <div class="text-center flex justify-center">
                <div class="w-full text-center">
                    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                        <div id="alert-3" class="flex p-4 mb-4 text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                                <span class="font-medium">{{ __('main.auth_error') }}</span></a>.
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-green-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="m-4">

            <div class="flex justify-center mb-10 ">
                <a href="http://chrry.me/" class="flex items-center mb-4">
                    <img src="https://i.ibb.co/bPydGXN/3.png" class="mr-3 h-15" alt="CHRRY.ME" />
                </a>
            </div>

            <form method="POST" action="{{ route('hashCheck') }}" class="text-center" id="login-form"> @csrf

                <!-- Email Address -->
                <div class="mt-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-500 text-dark">
                        {{ __('main.auth_code') }}</label>
                    <input type="text"
                           name="hash"
                           id="hash"
                           class="bg-gray-50 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="*************"
                           required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="g-recaptcha inline-block text-xl rounded-full bg-red-500 w-full py-2 text-sm font-bold text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-500"
                            data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA"
                            data-callback='onSubmit'
                            data-action='submit'>
                        {{ __('main.reg_log') }}
                    </button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>





