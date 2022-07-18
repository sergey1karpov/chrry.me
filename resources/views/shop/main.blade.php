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
            body{
                background-color: white;
            }
            .sale {
                flex-direction: row-reverse;
            }

            .card {
                width: fit-content;
            }

            .card-body {
                width: fit-content;
            }

            .btn {
                border-radius: 0;
                width: fit-content;
                background-color: #69F0AE;
                box-shadow: 0px 10px 10px #E0E0E0;
                z-index: 1;
                color: white;
                width: 100px;
                font-size: 14px;
                font-weight: 900;
            }

            .img-thumbnail {
                border: none;
            }

            .card {
                box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
                border-radius: 5px;
                padding-bottom: 10px;
            }

            .card-title {
                font-size: 14px;
                font-weight: 900;
            }

            .card-text {
                font-size: 14px;
                font-family: sans-serif;
                font-weight: 500;
            }
        </style>
    </head>
    <body class="h-100 text-center text-dark">
        <a href="{{ route('welcome') }}">
            <img src="https://i.ibb.co/LnHC78h/2.png" width="90" class="mt-3">
        </a>
        <div class='container-fluid'>
            <div class="card mx-auto col-md-3 col-10 mt-3 pt-4">
                <img class='mx-auto img-thumbnail' src="https://a.allegroimg.com/s1024/0cfdab/af3cbdca48cfbd5a6bee82a04514" width="auto" height="auto"/>
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title">Цифровой доступ</h5>
                    <p class="card-text">700р.</p>
                    <button type="button" class="btn btn-sm btn-light">Купить</button>
                </div>
            </div>
        </div>

    </body>
</html>
