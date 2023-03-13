<script>
    function onSubmit(token) {
        document.getElementById("nfc").submit();
    }
</script>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>
        </x-slot>

        <!-- Validation Errors -->
        @if (isset($errors))
            <div class="text-center">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
        @endif

        <div class="m-4">

            <div class="flex justify-center mb-10">
                <a href="http://chrry.me/" class="flex items-center mb-4">
                    <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="mr-3 h-15" alt="CHRRY.ME" />
                </a>
            </div>

            <form method="POST" action="{{ route('editNewUser', ['utag' => $user->utag]) }}" class="text-center" id="nfc">
                @csrf @method('PATCH')

                <!-- Name -->
                <div class="mt-5">
{{--                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Profile name</label>--}}
                    <input type="text"
                           name="name"
                           id="name"
                           class="bg-gray-900 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Name"
                           required>
                </div>

                <!-- Slug -->
                <div class="mt-4">
                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Slug</label>
                    <div class="flex">
                        <span class="inline-flex rounded-l-lg bg-gray-900 text-gray-500 text-sm focus:ring-blue-500 focus:border-blue-500 block p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            chrry.me/
                        </span>
                        <input type="text"
                               name="slug"
                               id="website-admin"
                               class="bg-gray-900 text-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500 text-sm rounded-r-lg w-full"
                               placeholder="Slug">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Email address</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="bg-gray-900 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Email"
                           required>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="bg-gray-900 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Password"
                           required>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           class="bg-gray-900 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Repeat password"
                           required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="g-recaptcha w-full text-white bg-gradient-to-r from-red-500 to-red-800 hover:bg-gradient-to-bl focus:ring-2 font-medium rounded-lg text px-5 py-2.5 text-center mr-2"
                            data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA"
                            data-callback='onSubmit'
                            data-action='submit'>
                        {{ __('Create account') }}
                    </button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>










