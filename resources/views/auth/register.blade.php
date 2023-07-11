<script>
    function onSubmit(token) {
        document.getElementById("register-form").submit();
    }
</script>

<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>

        <!-- Validation Errors -->
        @if (isset($errors))
            <div class="text-center">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
        @endif

        <div class="m-4">

            <div class="flex justify-center mb-10 ">
                <a href="http://chrry.me/" class="flex items-center mb-4">
                    <img src="https://i.ibb.co/bPydGXN/3.png" class="mr-3 h-15" alt="CHRRY.ME" />
                </a>
            </div>

            <form method="POST" action="{{ route('register') }}" class="text-center" id="register-form"> @csrf

                <!-- Name -->
                <div class="mt-5">
                    {{--                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Profile name</label> --}}
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('main.reg_name') }}" required>
                </div>

                <!-- Slug -->
                <div class="mt-4">
                    {{--                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Slug</label> --}}
                    <div class="flex">
                        <span
                            class="inline-flex rounded-l-full bg-gray-50 text-gray-500 text-sm focus:ring-blue-500 focus:border-blue-500 block p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            chrry.me/
                        </span>
                        <input type="text" name="slug" id="website-admin"
                            class="bg-gray-50 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500 text-sm rounded-r-full w-full "
                            placeholder="{{ __('main.reg_slug') }}">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    {{--                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Email address</label> --}}
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Email" required>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    {{--                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Password</label> --}}
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('main.reg_pass') }}" required>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    {{--                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 text-dark">Confirm Password</label> --}}
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="bg-gray-50 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:placeholder-gray-500 text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('main.reg_re_pass') }}" required>
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="g-recaptcha inline-block text-xl rounded-full bg-red-500 w-full py-2 text-sm font-bold text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-500 "
                        data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA" data-callback='onSubmit'
                        data-action='submit'>
                        {{ __('main.reg_create') }}
                    </button>
                </div>

                <div class="mt-4">
                    <a type="submit" href="{{ route('OAuth', ['social' => 'google']) }}"
                        class="g-recaptcha inline-block text-xl rounded-full bg-blue-500 w-full py-2 text-sm font-bold text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500 ">
                        {{ __('main.reg_create_google') }}
                    </a>
                </div>

                <div class="mt-4">
                    <a type="submit" href="{{ route('OAuth', ['social' => 'vk']) }}"
                       class="g-recaptcha inline-block text-xl rounded-full bg-blue-400 w-full py-2 text-sm font-bold text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500 ">
                        Войти через VK
                    </a>
                </div>

                <div class="mt-4">
                    <a type="submit" href="{{ route('OAuth', ['social' => 'yandex']) }}"
                       class="g-recaptcha inline-block text-xl rounded-full bg-red-500 w-full py-2 text-sm font-bold text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500 ">
                        Войти через Yandex
                    </a>
                </div>

                <div class="mt-4 flex justify-center">
                    <h1 class="font-sans text-sm text-gray-600 hover:text-gray-900">
                        {{ __('main.reg_already') }}</h1><a
                        class="ml-1 font-sans underline text-sm text-red-500 hover:text-gray-900"
                        href="{{ route('login') }}">
                        {{ __('main.reg_log') }}
                    </a>
                </div>
            </form>
        </div>

    </x-auth-card>
</x-guest-layout>


{{-- <div class="mb-4 mt-4 text-sm text-gray-600 text-center" style="font-family: 'Overpass Mono', monospace;"> --}}
{{--    <h1 class="display mb-3" style="font-size:1.1rem; font-family: 'Rubik', sans-serif;">Для быстрой регистрации можете использовать одну из соц. сетей</h1> --}}
{{--    <a href="{{route('auth', ['social' => 'vk'])}}"><img src="https://cdn-icons-png.flaticon.com/512/145/145813.png" width="50"></a> --}}
{{--    <a href="{{route('auth', ['social' => 'yandex'])}}"><img src="https://monobit.ru/wp-content/uploads/2021/03/TtYT-Do9haj2FSn2BgK4u_7Rbm-Q2Q9huE1o4dPa74q9NUayDMm0_QVInoQWklXdWw-1.png" width="50"></a> --}}
{{-- </div> --}}
