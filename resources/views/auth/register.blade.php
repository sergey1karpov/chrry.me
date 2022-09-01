<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>chrry.me</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">
        <style type="text/css">
            html {
                height: 100%;
            }
            body {
                min-height: 100%;
                background-color: #F8F9FB;
            }
            .section {
                height: 100vh; /* высота секции равна высоте области просмотра */
            }
            @font-face {
                font-family: FuturisVolumeC; /* Имя шрифта */
                src: url({{asset('public/font/FuturisVolumeC.ttf')}}); /* Путь к файлу со шрифтом */
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="section d-flex align-items-center justify-content-center ms-4 me-4">
            <div class="" >
                <div class="text-center">
                    <a href="{{ route('welcome') }}">
                        <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-12">
                    <x-guest-layout>
                        <x-auth-card>
                            <x-slot name="logo">
                                {{-- <a href="/">
                                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                </a> --}}
                            </x-slot>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('register') }}" class="text-center">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-label for="name" :value="__('Имя профиля')" style="font-family: 'Rubik', sans-serif;"/>

                                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;" />
                                </div>

                                <!-- Name -->
                                <div class="mt-4">
                                    <x-label for="name" :value="__('Адрес страницы')" style="font-family: 'Rubik', sans-serif;"/>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon3" style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0; background-color: white;">chrry.me/</span>
                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="slug" :value="old('slug')" required style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="email" :value="__('Ваша почта')" style="font-family: 'Rubik', sans-serif;"/>

                                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;"/>
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Пароль')" style="font-family: 'Rubik', sans-serif;"/>

                                    <x-input id="password" class="form-control"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;"/>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-label for="password_confirmation" :value="__('Повторите пароль')" style="font-family: 'Rubik', sans-serif;"/>

                                    <x-input id="password_confirmation" class="form-control"
                                                    type="password"
                                                    name="password_confirmation" required style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;"/>
                                </div>

                                <div class="flex items-center justify-content-center mt-4">

                                    <div class="d-grid ">
                                        <x-button class="btn" style="font-family: 'Rubik', sans-serif; border: 0; background-color: #e83100; color: white;">
                                            {{ __('Регистрация') }}
                                        </x-button>
                                    </div>

                                </div>
                            </form>
                        </x-auth-card>
                    </x-guest-layout>
                </div>

                <div class="mb-4 mt-4 text-sm text-gray-600 text-center" style="font-family: 'Overpass Mono', monospace;">
                    <h1 class="display mb-3" style="font-size:1.1rem; font-family: 'Rubik', sans-serif;">Для быстрой регистрации можете использовать одну из соц. сетей</h1>
                    <a href="{{route('auth', ['social' => 'vk'])}}"><img src="https://cdn-icons-png.flaticon.com/512/145/145813.png" width="50"></a>
                    <a href="{{route('auth', ['social' => 'yandex'])}}"><img src="https://monobit.ru/wp-content/uploads/2021/03/TtYT-Do9haj2FSn2BgK4u_7Rbm-Q2Q9huE1o4dPa74q9NUayDMm0_QVInoQWklXdWw-1.png" width="50"></a>
                </div>
            </div>
        </div>
    </body>
</html>

