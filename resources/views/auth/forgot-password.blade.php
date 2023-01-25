<script>
    function onSubmit(token) {
        document.getElementById("recover-form").submit();
    }
</script>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>

{{--        <div class="mb-4 mt-4 text-sm text-gray-600 text-center" style="font-family: 'Overpass Mono', monospace;">--}}
{{--            <h1 class="display" style="font-size:1.1rem; font-family: 'Rubik', sans-serif;">Для восстановления пароля введите свой email, и мы отправим вам на почту ссылку для его восстановления</h1>--}}
{{--        </div>--}}

        <!-- Session Status -->
        <div class="text-center">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>

        <!-- Validation Errors -->
        <div class="text-center">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        <div class="m-4">

            <div class="flex justify-center mb-10">
                <a href="http://chrry.me/" class="flex items-center mb-4">
                    <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="mr-3 h-15" alt="CHRRY.ME" />
                </a>
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="text-center" id="recover-form">
                @csrf

                <!-- Email Address -->
                <div class="mt-5">
{{--                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Email address</label>--}}
                    <input type="email"
                           name="email"
                           id="email"
                           class="bg-gray-900 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Email"
                           required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="g-recaptcha w-full text-white bg-gradient-to-r from-red-500 to-red-800 hover:bg-gradient-to-bl focus:ring-2 font-medium rounded-lg text px-5 py-2.5 text-center mr-2"
                            data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA"
                            data-callback='onSubmit'
                            data-action='submit'>
                        {{ __('Recover') }}
                    </button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>


