<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>chrry.me</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
    </head>
    <body class="relative">

        <div class="fixed ">
            <div class="flex justify-between items-center p-5 text-red-500">
                <div type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
                    <img src="https://media2.giphy.com/media/rsAkNotMJddREuK8il/200w.webp?cid=790b76113ivgwitjg21x2v9wmhq8atv7qggmsiypu6c3nn8f&rid=200w.webp&ct=s" class="img" width="40">
                </div>
{{--                <div>--}}
{{--                    <img src="https://i.ibb.co/HBYTmyj/2.png" class="img" width="65">--}}
{{--                </div>--}}
            </div>
        </div>

        <div id="drawer-example" class="fixed z-40 h-screen p-4 overflow-y-auto bg-[#0d0d0d] w-full bg-red-800 transition-transform left-0 top-0 -translate-x-full" tabindex="-1" aria-labelledby="drawer-label">
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-white bg-transparent hover:bg-[#0d0d0d] hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-[#0d0d0d] dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="flex flex-col items-center justify-center h-screen">
                @if (Route::has('login'))
                    @auth
                        <div class="nav-item">
                            <a class="text-white text-base font-medium" aria-current="page" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}">{{Auth::user()->slug}}</a>
                        </div>
                        <div class="nav-item">
                            <a class="text-white text-base font-medium" aria-current="page" href="{{ route('editProfileForm',  ['user' => Auth::user()->id]) }}">Домой</a>
                        </div>
                        <div class="nav-item d-flex justify-content-center">
                            <form class="text-center" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="text-white text-base font-medium">Выход</button>
                            </form>
                        </div>
                    @else
                        <div class="nav-item">
                            <a class="text-red-500" aria-current="page" href="{{ route('login') }}">Войти</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="nav-item mt-2">
                                <a class="text-red-500" aria-current="page" href="{{ route('register') }}">Регистрация</a>
                            </div>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <div class="py-24 flex items-center min-h-screen justify-center bg-orange-300">
            <div class="mx-auto max-w-[43rem]">
                <div class="text-start">
                    <p class="flex justify-start">
                        <img src="https://i.ibb.co/HBYTmyj/2.png" class="img ml-5" width="100">
                    </p>
                    <h1 class="mt-3 ml-5 mr-5 text-[48px] font-bold leading-[4rem] tracking-tight text-white" style="line-height: 1.05; letter-spacing: -0.02em; font-family: 'Open Sans', sans-serif;">Засуньте все свои ссылки в одно место..</h1>
                    <p class="mt-6 ml-5 mr-5 text-lg font-medium leading-relaxed text-gray-100 opacity-85" style="line-height: 1.05; letter-spacing: -0.04em;">Создайте сервис мультиссылок или афишу со своим уникальным дизайном. Отслеживайте статистику по просмотрам профиля и кликам. Вкусно кушайте!</p>
                </div>

                <div class="mt-6 ml-5 flex items-center justify-start gap-4">
                    <a class="inline-block text-lg rounded-full bg-red-500 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-500" href="{{ route('register') }}">
                        Регистрация. Это бесплатно!
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-full overflow-x-hidden bg-[#FCC7D1]">
            <div class="mx-auto max-w-[43rem]">
                <div class="text-start">
                    <h1 class="mt-6 ml-5 mr-5 text-[2.5rem] font-bold leading-[4rem] tracking-tight text-[#3A273B]" style="line-height: 1.05; letter-spacing: -0.02em; font-family: 'Open Sans', sans-serif;">Ссылки</h1>
                    <p class="mt-6 ml-5 mr-5 text-lg font-medium leading-relaxed opacity-85 text-[#3A273B]" style="line-height: 1.05; letter-spacing: -0.04em;">Вы можете добавить более 50 ссылок. В качестве изображения загружайте обычные картинки, гифки или иконки из нашей коллекции. Широкие возможности кастомизации ссылок. Отслеживайте каждый уникальный клик по вашей ссылке</p>
                </div>

                <navigation>
                    <div class="text-center mb-2 mt-10">


                                <div class="flex justify-center">
                                    <img src="https://i.ibb.co/3k2SWbt/giphy-1-1.gif" class="w-32 rounded-full mt-3">
                                </div>

                            <h2 class="mt-5 flex justify-center items-center" style="font-family: 'Rubik', sans-serif; font-weight: 600 ; font-size: 20px; color: white; ">
                                Jack Black

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ml-2 mt-1 bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: dodgerblue">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                    </svg>

                            </h2>

                    </div>
                </navigation>

                <div class="mx-auto max-w-screen-xl px-4 pt-4 sm:px-6 lg:px-8 mt-6">
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                            <tr data-index="" data-position="">
                                <td>
                                    <div class="justify-center text-center" data-index="" data-position="">
                                        <form method="POST" action="">
                                            <div class="animate__animated animate__pulse animate__infinite infinite border-4 shadow-lg border-white row card ms-1 me-1" style="animation-duration: 2s; background-color: rgba(255, 255, 128, .5); border-radius: 50px; background-position: center;">
                                                <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                    <div class="col-span-1 flex items-center flex-none">
                                                        <img class="mt-1 mb-1" src="https://www.edigitalagency.com.au/wp-content/uploads/OnlyFans-logo-symbol-icon-png-blue-background.png" style="width:50px; border-radius: 50px;">
                                                    </div>
                                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                        <div class="col-span-10 text-center flex items-center">
                                                            <div class="ml-3 mr-3">
                                                                <h4 class="drop-shadow-md text-xl font-extrabold text-ellipsis text-white" style="margin: 0;">OnlyFans</h4>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                        <div href="" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mx-auto max-w-screen-xl px-4 pt-4 sm:px-6 lg:px-8">
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                            <tr data-index="" data-position="">
                                <td>
                                    <div class="justify-center text-center" data-index="" data-position="">
                                        <form method="POST" action="">
                                            <div class="border-4 shadow-lg border-white row card ms-1 me-1" style="animation-duration: 2s; background-color: rgba(255, 255, 128, .5); border-radius: 50px; background-position: center;">
                                                <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                    <div class="col-span-1 flex items-center flex-none">
                                                        <img class="mt-1 mb-1" src="https://i.ibb.co/hR3QVPJ/pornhub-intro-download-1.gif" style="width:50px; border-radius: 50px;">
                                                    </div>
                                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                        <div class="col-span-10 text-center flex items-center">
                                                            <div class="ml-3 mr-3">
                                                                <h4 class="drop-shadow-md text-xl font-extrabold text-ellipsis text-white" style="margin: 0;">My VLog</h4>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                        <div href="" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mx-auto max-w-screen-xl px-4 pt-4 sm:px-6 lg:px-8">
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                            <tr data-index="" data-position="">
                                <td>
                                    <div class="justify-center text-center" data-index="" data-position="">
                                        <form method="POST" action="">
                                            <div class="border-4 shadow-lg border-white row card ms-1 me-1" style="animation-duration: 2s; background-color: rgba(255, 255, 128, .5); border-radius: 50px; background-position: center;">
                                                <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                    <div class="col-span-1 flex items-center flex-none">
                                                        <img class="mt-1 mb-1" src="https://media4.giphy.com/media/ZcdZ7ldgeIhfesqA6E/200w.webp?cid=ecf05e47kwt7wvd89m0ogesd93vw2zp17alvrzgs6kxr8cl6&rid=200w.webp&ct=s" style="width:50px; border-radius: 50px;">
                                                    </div>
                                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                        <div class="col-span-10 text-center flex items-center">
                                                            <div class="ml-3 mr-3">
                                                                <h4 class="drop-shadow-md text-xl font-extrabold text-ellipsis text-white" style="margin: 0;">Telegram</h4>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                        <div href="" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-10 mx-auto max-w-screen-xl px-4 pt-4 sm:px-6 lg:px-8">
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                            <tr data-index="" data-position="">
                                <td>
                                    <div class="justify-center text-center" data-index="" data-position="">
                                        <form method="POST" action="">
                                            <div class="border-4 shadow-lg border-white row card ms-1 me-1" style="animation-duration: 2s; background-color: rgba(255, 255, 128, .5); border-radius: 50px; background-position: center;">
                                                <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                    <div class="col-span-1 flex items-center flex-none">
                                                        <img class="mt-1 mb-1" src="https://media1.giphy.com/media/qwLObm1ctXSN2UptC6/giphy.gif?cid=790b7611c229f6c040343965a39b315874cb98f6643c1df6&rid=giphy.gif&ct=s" style="width:50px; border-radius: 50px;">
                                                    </div>
                                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                        <div class="col-span-10 text-center flex items-center">
                                                            <div class="ml-3 mr-3">
                                                                <h4 class="drop-shadow-md text-xl font-extrabold text-ellipsis text-white" style="margin: 0;">Instagram</h4>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                        <div href="" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex flex-col w-full overflow-x-hidden bg-[#FEE3A2]">
            <div class="mx-auto max-w-[43rem]">
                <div class="text-start">
                    <h1 class="mt-6 ml-5 mr-5 text-[2.5rem] font-bold leading-[4rem] tracking-tight text-[#538736]" style="line-height: 1.05; letter-spacing: -0.02em; font-family: 'Open Sans', sans-serif;">Афиша</h1>
                    <p class="mt-6 ml-5 mr-5 text-lg font-medium leading-relaxed text-[#538736] opacity-85" style="line-height: 1.05; letter-spacing: -0.04em;">Идеальное решение для музыкантов. Создайте список своих событий, придайте им уникальный дизайн и поделитесь ссылкой на профиль со своими фанами. </p>
                </div>

                <div class="px-5 col-lg-12 allalbums mt-8 drop-shadow-md animate__animated animate__pulse animate__infinite infinite" style="animation-duration: 2s;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action text-center">
                            <article class="overflow-hidden shadow transition " style="border-radius: 15px;">
                                <img alt="Office" src="https://thisis-images.scdn.co/37i9dQZF1DZ06evO46wsnu-default.jpg" class="h-32 w-full object-cover"/>
                                <div class="p-4 sm:p-6" style="background-color: white;">
                                    <div class="flex flex-wrap text-center">
                                        <h2 class="text-base font-medium text-gray-900 mr-2" style=" ">
                                            Dec 25, 2023
                                        </h2>
                                        <h2 class="text-base font-medium text-gray-900" style="">
                                            20:00
                                        </h2>
                                    </div>
                                    <div class="flex flex-wrap text-center">
                                        <h2 class="mr-2 text-2xl font-extrabold text-gray-900" style="">
                                            MOSCOW,
                                        </h2>
                                        <h2 class="text-2xl font-extrabold text-gray-900" style="">
                                            16TONS
                                        </h2>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </ul>
                </div>

                <div class="px-5 mb-10 mt-8 col-lg-12 allalbums drop-shadow-md">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action text-center" style="border-radius: 15px;">
                            <div href="#" class="relative block overflow-hidden bg-[url(https://www.castlerock.ru/upload/iblock/734/734255d58e2a6bb1e411c59970002214.jpg)] bg-cover bg-center bg-no-repeat" style="border-radius: 15px;">
                                <div class="relative bg-black bg-opacity-40 p-8 pt-32 text-white">
                                    <div class="flex flex-wrap text-center">
                                        <h2 class="text-2xl mr-2 font-extrabold dark:text-white drop-shadow-sm" style="">
                                            SPB,
                                        </h2>
                                        <h2 class="text-2xl font-extrabold dark:text-white drop-shadow-sm" style="">
                                            GIGANT HALL
                                        </h2>
                                    </div>
                                    <div class="flex flex-wrap text-center">
                                        <h2 class="text-lg font-extrabold dark:text-white mr-2 drop-shadow-sm" style="">
                                            Dec 26, 2023
                                        </h2>
                                        <h2 class="text-lg font-extrabold dark:text-white drop-shadow-sm" style="">
                                            20:00
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <footer class="sticky top-[100vh] footer-block p-5 shadow md:px-6 md:py-8 navbar-fixed-bottom" style="background-color: rgba(0, 0, 0);">
            <div class="">
                <div class="flex justify-center">
                    <a href="http://chrry.me/" class="flex items-center mb-4">
                        <img src="https://i.ibb.co/HBYTmyj/2.png" class="mr-3 h-6" alt="CHRRY.ME Logo" />
                    </a>
                </div>
                <div class="flex justify-center">
                    <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">About us</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6">FAQ</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Contacts</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}"> @csrf
                                <button type="submit">
                                    <span href="#" class="hover:underline">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="flex justify-center">
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="http://chrry.me/" class="hover:underline">CHRRY.ME™</a>. All Rights Reserved.</span>
            </div>
        </footer>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
    </body>
</html>









