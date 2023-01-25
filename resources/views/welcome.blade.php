<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>chrry.me</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="static bg-black h-screen flex items-center justify-center">

        <div class="absolute top-0 left-0 text-red-500 p-2 ml-1 " type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>

        <div id="drawer-example" class="fixed z-40 h-screen p-4 overflow-y-auto bg-[#0d0d0d] w-full dark:bg-[#0d0d0d] transition-transform left-0 top-0 -translate-x-full" tabindex="-1" aria-labelledby="drawer-label">
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-red-500 bg-transparent hover:bg-[#0d0d0d] hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-[#0d0d0d] dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="flex flex-col items-center justify-center h-screen">
                @if (Route::has('login'))
                    @auth
                        <div class="nav-item">
                            <a class="text-red-500" aria-current="page" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}">PROFILE</a>
                        </div>
                        <div class="nav-item">
                            <a class="text-red-500" aria-current="page" href="{{ route('editProfileForm',  ['user' => Auth::user()->id]) }}">HOME</a>
                        </div>
                        <div class="nav-item d-flex justify-content-center">
                            <form class="text-center" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="text-red-500">LOG OUT</button>
                            </form>
                        </div>
                    @else
                        <div class="nav-item">
                            <a class="text-red-500" aria-current="page" href="{{ route('login') }}">LOG IN</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="nav-item mt-2">
                                <a class="text-red-500" aria-current="page" href="{{ route('register') }}">REGISTER</a>
                            </div>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <div class="ml-2 mr-2 text-center">
            <img src="https://i.ibb.co/s2QGFBb/rrrrrrrrrrrrrrrrrrrrrrrrrr.png" class="img">
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
    </body>
</html>
