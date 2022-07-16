<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        {{-- Шрифт для бля хедера --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

        <style type="text/css">
            html {
                height: 100%;
            }
            body {
                min-height: 100%;
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
    <body class="h-100 text-center text-dark">

        {{-- Section 1 --}}
        <div class="cover-container w-100 h-100 p-3 mx-auto section d-flex align-items-center justify-content-center" style="background-image: url('https://wallpaperaccess.com/full/1092107.jpg');">
            <main class="text-center">

                {{-- <nav class="nav nav-masthead justify-content-center float-md-end fixed-top mt-2">
                    @if (Route::has('login'))
                        @auth
                            <a class="nav-link " aria-current="page" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="font-family: 'Train One', cursive; color: white; text-shadow: 5px 5px 2px black; font-size: 1.5rem">home</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="#" style="font-family: 'Train One', cursive; color: white; text-shadow: 5px 5px 2px black; font-size: 1.5rem">login</a>
                        @endauth
                    @endif
                    <a class="nav-link" href="#" style="font-family: 'Train One', cursive; color: white; text-shadow: 5px 5px 2px black; font-size: 1.5rem">c.shop</a>
                    <a class="nav-link" href="#" style="font-family: 'Roboto', sans-serif; color: white; text-shadow: 5px 5px 2px black; font-size: 1.5rem">контакты</a>
                </nav> --}}
                <div class="row d-flex flex-row fixed-top ms-" style="margin-left: 10px;">
                    <div class="col-12 d-flex justify-content-start" style="padding: 0">
                        <button style="padding-left:0;padding-right:0" class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <img src="https://i.ibb.co/VLXNHxn/1.png" width="30">
                        </button>
                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header bg-light">
                                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                                    <img src="https://i.ibb.co/LnHC78h/2.png" width="90">
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav me-auto mb-lg-0">
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Профиль</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ route('editProfileForm',  ['id' => Auth::user()->id]) }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Настройки</a>
                                            </li>
                                            <li class="nav-item d-flex justify-content-center">
                                                <form class="text-center" method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button class="nav-link" style="border: 0; outline: none; background-color: white;font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Выйти</button>
                                                </form>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ route('login') }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Войти</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    {{-- <a class="nav-link text-muted" aria-current="page" href="{{ route('register') }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Регистрация</a> --}}
                                                </li>
                                            @endif
                                        @endauth
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12" style="padding: 0">
                        <img src="https://i.ibb.co/3TzQpM2/logo.png" class="img-fluid">
                    </div>
                </div>
            </main>
        </div>

        {{-- <div class="cover-container w-100 h-100 p-3 mx-auto flex-column section" style="background-image: url('https://i.ibb.co/r55R7G6/2.jpg')">


            <header class="mb-auto">
                <div>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link active" aria-current="page" href="#" style="font-family: 'Train One', cursive; color: white; text-shadow: 5px 5px 2px black; font-size: 1.3rem">faq</a>
                        <a class="nav-link" href="#" style="font-family: 'Train One', cursive; color: white; text-shadow: 5px 5px 2px black; font-size: 1.3rem">c.shop</a>
                        <a class="nav-link" href="#" style="font-family: 'Train One', cursive; color: white; text-shadow: 5px 5px 2px black; font-size: 1.3rem">contacts</a>
                    </nav>
                </div>
            </header>


            <main class="px-3">
                <img src="https://i.ibb.co/3TzQpM2/logo.png" style="width: 100%; height: auto;">
                <h1>Создай свою страницу мультиссылок</h1>
                <p class="lead">Все что вы создаете или продаёте, любая ваша информация и контакты, все доступно по одной простой ссылке</p>
                <p class="lead">
                    <a href="#" class="btn btn-sm btn-outline-light">Войти</a>
                </p>
            </main>


            <footer class="mt-auto text-white-50">
                <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
            </footer>

        </div> --}}

    </body>
</html>
