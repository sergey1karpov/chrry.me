<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>chrry.me</title>
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
                /*background-color: #F8F9FB;*/
                background: rgb(255,0,0);
                background: linear-gradient(0deg, rgba(255,0,0,0.4458158263305322) 0%, rgba(255,255,255,1) 100%);
            }
            .btn-check:focus+.btn, .btn:focus {
                box-shadow: none;
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
        <div class="cover-container w-100 h-100 p-3 mx-auto section d-flex align-items-center justify-content-center" >
            <main class="text-center">

                <div class="row d-flex flex-row fixed-top ms-" style="margin-left: 10px;">
                    <div class="col-12 d-flex justify-content-start" style="padding: 0">
                        <button style="padding-left:0;padding-right:0" class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <img src="https://i.ibb.co/J3RSWtS/arrow-icon-banner-freeuse-stock-next-icon-vector-11553389091crmgqevjd3.png" width="17">
                        </button>
                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header bg-light">
                                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                                    <img src="https://i.ibb.co/ZSgV4Tn/2.png" width="90">
                                </h5>
                                <button style="padding-left:0;padding-right:0" class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                    <img src="https://i.ibb.co/hKFmVN0/arrow-icon-banner-freeuse-stock-next-icon-vector-11553389091crmgqevjd33.png" width="17">
                                </button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav me-auto mb-lg-0">
                                    <li class="nav-item">
                                        {{-- <a class="nav-link" aria-current="page" href="{{ route('shop') }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Магазин</a> --}}
                                    </li>
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Профиль</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ route('editProfileForm',  ['user' => Auth::user()->id]) }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Настройки</a>
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
                                                    <a class="nav-link" aria-current="page" href="{{ route('register') }}" style="font-family: 'Roboto', sans-serif; color: black;font-size: 1rem">Регистрация</a>
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
                        <img src="https://i.ibb.co/ZSgV4Tn/2.png" class="img-fluid">
                    </div>
                </div>
            </main>
        </div>

    </body>
</html>
