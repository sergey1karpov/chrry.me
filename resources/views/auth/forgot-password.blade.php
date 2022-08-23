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
            <div>
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

                            <div class="mb-4 mt-4 text-sm text-gray-600 text-center" style="font-family: 'Overpass Mono', monospace;">
                                <h1 class="display" style="font-size:1.1rem; font-family: 'Rubik', sans-serif;">Для восстановления пароля введите свой email, и мы отправим вам на почту ссылку для его восстановления</h1>
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('password.email') }}" class="text-center">
                                @csrf

                                <!-- Email Address -->
                                <div>
                                    <x-label for="email" :value="__('Email')" style="font-family: 'Rubik', sans-serif;"/>

                                    <x-input style="border-radius: 0px; border-top: 0; border-left: 0; border-right: 0;" id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <div class="flex items-center justify-content-center mt-4">
                                    <div class="d-grid ">
                                        <button class="btn" style="font-family: 'Rubik', sans-serif; border: 0; background-color: #e83100; color: white;">
                                            {{ __('Отправить') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </x-auth-card>
                    </x-guest-layout>
                </div>
            </div>
        </div>
    </body>
</html>

