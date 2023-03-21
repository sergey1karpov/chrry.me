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
                    <a class="text-white text-2xl font-medium" aria-current="page" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}">{{Auth::user()->slug}}</a>
                </div>
                <div class="nav-item">
                    <a class="text-white text-2xl font-medium" aria-current="page" href="{{ route('editProfileForm',  ['user' => Auth::user()->id]) }}">Settings</a>
                </div>
                <div class="nav-item d-flex justify-content-center">
                    <form class="text-center" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-white text-2xl font-medium">Exit</button>
                    </form>
                </div>
            @else
                <div class="nav-item">
                    <a class="text-white text-2xl font-medium" aria-current="page" href="{{ route('login') }}">LogIn</a>
                </div>
                @if (Route::has('register'))
                    <div class="nav-item mt-2">
                        <a class="text-white text-2xl font-medium" aria-current="page" href="{{ route('register') }}">Register</a>
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
            <h1 class="mt-3 ml-5 mr-5 text-[48px] font-bold leading-[4rem] tracking-tight text-white" style="line-height: 1.05; letter-spacing: -0.02em; font-family: 'Open Sans', sans-serif;">Правила пользования нашим сервисом</h1>
            <h2 class="mt-6 ml-5 mr-5 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white" style="line-height: 1.05; letter-spacing: -0.04em;">На самом деле как таковых правил нет. Нам все равно как вы будете использовать наш сервис и куда будут вести ваши ссылки.</h2>
            {{--            <p class="mt-6 ml-5 mr-5 text-lg font-medium leading-relaxed text-gray-100 opacity-85" style="line-height: 1.05; letter-spacing: -0.04em;">Попробуйте написать нам на почту <span class="text-blue-600 dark:text-blue-500">support@chrry.me</span></p>--}}
        </div>
    </div>
</div>

<footer class="sticky top-[100vh] p-4 bg-white  shadow md:px-6 md:py-8 navbar-fixed-bottom" style="background-color: rgb(0, 0, 0);">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="http://chrry.me/" class="flex items-center mb-4 sm:mb-0">
            <img src="https://i.ibb.co/HBYTmyj/2.png" class="h-8 mr-3" alt="Chrry.me" />
            {{--                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>--}}
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
                <a href="{{route('about')}}" class="mr-4 hover:underline md:mr-6 ">О нас</a>
            </li>
            <li>
                <a href="{{route('rules')}}" class="mr-4 hover:underline md:mr-6">Правила</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">Блог</a>
            </li>
            <li>
                <a href="{{route('contacts')}}" class="mr-4 hover:underline md:mr-6 text-sm font-semibold">Контакты</a>
            </li>
        </ul>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 3 <a href="http://chrry.me/" class="hover:underline">Chrry.me™</a>. Все права пока еще не защищены.</span>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
</body>
</html>









