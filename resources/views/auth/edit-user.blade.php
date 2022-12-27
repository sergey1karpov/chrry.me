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
        <div class="text-center">
            <x-auth-validation-errors class="mb-5" :errors="$errors" />
        </div>

        <div class="m-4">

            <p class=" mt-3 mb-10 text-4xl font-black text-gray-900 text-dark">
                NFC Registration
                <span class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-red-500 relative inline-block">
                    <a href="{{ route('welcome') }}"><span class="relative text-white">CHRRY.ME</span></a>
                </span>
            </p>

            <form method="POST" action="{{ route('editNewUser', ['utag' => $user->utag]) }}" class="text-center" id="nfc">
                @csrf @method('PATCH')

                <!-- Name -->
                <div class="mt-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Profile name</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Elon Musk"
                           required>
                </div>

                <!-- Slug -->
                <div class="mt-4">
                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Slug</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 bg-gray-100 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            chrry.me/
                        </span>
                        <input type="text"
                               name="slug"
                               id="website-admin"
                               class="bg-gray-100 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="elonmusk">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Email address</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="elon.musk@starlink.com"
                           required>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="•••••••••"
                           required>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           class="bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-400 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="•••••••••"
                           required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="g-recaptcha w-full text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-2 font-medium rounded-lg text px-5 py-2.5 text-center mr-2 mb-2"
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










