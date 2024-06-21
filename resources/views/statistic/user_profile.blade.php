<x-app-layout :user="$user">

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('editProfileForm', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>

                    <a type="button" class="group flex shrink-0 items-center rounded-lg transition" href="{{ route('userHomePage', ['user' => $user->slug]) }}">
                        <span class="sr-only">Menu</span>
                        @if($user->settings->avatar)
                            <img alt="Man" src="{{ '/'.$user->settings->avatar }}" class="h-10 w-10 rounded-full object-cover"/>
                        @else
                            <img alt="Man" src="https://camo.githubusercontent.com/eb6a385e0a1f0f787d72c0b0e0275bc4516a261b96a749f1cd1aa4cb8736daba/68747470733a2f2f612e736c61636b2d656467652e636f6d2f64663130642f696d672f617661746172732f6176615f303032322d3531322e706e67" class="h-10 w-10 rounded-full object-cover"/>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="text-center">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

    <section class="flex justify-center m-5">
        <div class="sm:mt-12 w-full">
            <form action="{{ route('profileFilterStatistic', ['user' => $user->id]) }}" method="GET">
                <input type="hidden" name="table" value="stats">
                <div date-rangepicker class="">
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input name="from" type="date" class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('main.link_stat_form') }}">
                    </div>
                    <div class="relative mt-6">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input name="to" type="date" class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('main.link_stat_to') }}">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="w-full inline-block rounded border border-indigo-600 bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        {{ __('main.user_stat_to') }}
                    </button>
                </div>
            </form>
        </div>
    </section>

    @if(Route::is('profileFilterStatistic'))
        <section class="flex justify-center m-5">
            <div class="sm:mt-12 w-full">
                <dl class="mx-auto max-w-screen-xl sm:px-6 lg:px-8">

                    <div class="flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif  @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">
                            {{ __('main.user_stat_period') }}                        </dt>
                        <dd class="text-2xl font-extrabold text-blue-600 md:text-5xl">
                            {{request()->get('from')}} - {{request()->get('to')}}
                        </dd>
                    </div>

                    <div class="mt-4 flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">
                            {{ __('main.user_views') }}
                        </dt>
                        <dd class="text-7xl font-extrabold text-blue-600 md:text-7xl">
                            {{count($stats['count'])}}
                        </dd>
                    </div>

                    <div class="mt-4 flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        @foreach($stats['city'] as $city)
                            <div class="flex justify-between">
                                <h1 class="order-last text-lg font-medium text-gray-500">
                                    {{$city->count}}
                                </h1>
                                <h1 class="text-lg font-extrabold text-blue-600">{{$city->city}}</h1>
                            </div>
                            <hr class="my-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach
                    </div>

                    <div class="mt-4 flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        @foreach($stats['country'] as $country)
                            <div class="flex justify-between">
                                <h1 class="order-last text-lg font-medium text-gray-500">
                                    {{$country->count}}
                                </h1>
                                <h1 class="text-lg font-extrabold text-blue-600">{{$country->country}}</h1>
                            </div>
                            <hr class="my-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach
                    </div>
                </dl>
            </div>
        </section>
    @endif

    <script>
        $('#from').on('click', function(){
            $(".datepicker-picker").show();
        });

        $('#from').on('changeDate', function(){
            $(".datepicker-picker").hide();
        });
        $('#to').on('click', function(){
            $(".datepicker-picker").show();
        });

        $('#to').on('changeDate', function(){
            $(".datepicker-picker").hide();
        });
    </script>

</x-app-layout>

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <title>Меню {{ $user->name }}</title>--}}

{{--    --}}{{-- Favicon --}}
{{--    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">--}}

{{--    <!-- Bootstrap 5 -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>--}}

{{--    <!-- Fonts for template -->--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">--}}
{{--    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}

{{--    <!-- JQuery -->--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

{{--    <!-- Users fonts -->--}}
{{--    @include('fonts.fonts')--}}

{{--    <!-- All styles -->--}}
{{--    <link href="{{asset('public/css/style.css')}}" rel="stylesheet" type="text/css" />--}}
{{--</head>--}}
{{--<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}

{{--<div class="container-fluid" style="padding: 0">--}}
{{--    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">--}}
{{--        <div class="container-fluid">--}}
{{--            <a style="border: none" class="mb-1" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">--}}
{{--                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">--}}
{{--            </a>--}}
{{--            <a class="" href="{{ route('userHomePage',  ['user' => $user->slug]) }}" style="text-decoration: none; border: 0; padding: 0">--}}
{{--                <div class="img-edit-profile" style="background-image: url({{'/'.$user->avatar}}); width: 25px; height: 25px; border-radius: 50%; margin-right: 0; background-position: center center; -wekit-background-size: cover; background-size: cover;background-repeat: no-repeat;"></div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}

{{--<div class="text-center mb-2 mt-2">--}}
{{--    <label for="exampleInputEmail1" class="form-label">Выберите за какой период показать статистику</label>--}}
{{--</div>--}}
{{--<form action="{{ route('filterStats', ['user' => $user->id]) }}" method="GET"> @csrf--}}
{{--    <input type="hidden" name="table" value="stats">--}}
{{--    <div class="row" style="margin: 0">--}}
{{--        <div class="col-6 d-flex justify-content-center" style="padding: 0">--}}
{{--            <div>--}}
{{--                <input id="startDate" name="from" class="form-control shadow" type="date" value="{{ Carbon\Carbon::today()->toDateString() }}" style="border: 0" />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-6 d-flex justify-content-center" style="padding: 0">--}}
{{--            <div>--}}
{{--                <input id="startDate" name="to" class="form-control shadow" type="date" value="{{ Carbon\Carbon::today()->toDateString() }}" style="border: 0" />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-12" style="padding: 0">--}}
{{--            <div class="d-grid m-4" style="padding: 0">--}}
{{--                <button class="btn btn-secondary" type="submit">Статистика</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</form>--}}

{{--@if(Route::is('filterStats'))--}}
{{--    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">--}}
{{--        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">Статистика за период</h1>--}}
{{--        <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem;">{{Carbon\Carbon::createFromFormat('Y-m-d', request()->get('from'))->format('d/m/Y')}} - {{Carbon\Carbon::createFromFormat('Y-m-d', request()->get('to'))->format('d/m/Y')}}</h1>--}}
{{--    </div>--}}
{{--    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">--}}
{{--        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">ПРОСМОТРЫ</h1>--}}
{{--        <h1 style="font-family: 'Inter', sans-serif; font-size: 3rem;">{{count($stats['count'])}}</h1>--}}
{{--    </div>--}}
{{--    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">--}}
{{--        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">ГОРОДА</h1>--}}
{{--        @foreach($stats['city'] as $city)--}}
{{--            <div class="d-flex justify-content-between p-2">--}}
{{--                <h1 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; margin: 0">{{$city->city}}</h1><span style="border-radius: 50px" class="badge bg-secondary">{{$city->count}}</span>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        <h1 class="mb-2" style="font-family: 'Inter', sans-serif; font-size: 1rem;"></h1>--}}
{{--    </div>--}}
{{--    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">--}}
{{--        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">СТРАНЫ</h1>--}}
{{--        @foreach($stats['country'] as $city)--}}
{{--            <div class="d-flex justify-content-between p-2">--}}
{{--                <h1 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; margin: 0">{{$city->country}}</h1><span style="border-radius: 50px" class="badge bg-secondary">{{$city->count}}</span>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        <h1 class="mb-2" style="font-family: 'Inter', sans-serif; font-size: 1rem;"></h1>--}}
{{--    </div>--}}
{{--@endif--}}

{{--</body>--}}
{{--</html>--}}






<!-- Base -->

{{--<a class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="/download">--}}
{{--    Download--}}
{{--</a>--}}

{{--<!-- Border -->--}}

{{--<a--}}
{{--    class="inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500"--}}
{{--    href="/download"--}}
{{-->--}}
{{--    Download--}}
{{--</a>--}}

{{--<section class="bg-white">--}}
{{--    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">--}}
{{--        <div class="mx-auto max-w-3xl text-center">--}}
{{--            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">--}}
{{--                Trusted by eCommerce Businesses--}}
{{--            </h2>--}}

{{--            <p class="mt-4 text-gray-500 sm:text-xl">--}}
{{--                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione dolores--}}
{{--                laborum labore provident impedit esse recusandae facere libero harum--}}
{{--                sequi.--}}
{{--            </p>--}}
{{--        </div>--}}

{{--        <div class="mt-8 sm:mt-12">--}}
{{--            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">--}}
{{--                <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">--}}
{{--                    <dt class="order-last text-lg font-medium text-gray-500">--}}
{{--                        Total Sales--}}
{{--                    </dt>--}}
{{--                    <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">--}}
{{--                        $4.8m--}}
{{--                    </dd>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">--}}
{{--                    <dt class="order-last text-lg font-medium text-gray-500">--}}
{{--                        Official Addons--}}
{{--                    </dt>--}}
{{--                    <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">24</dd>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">--}}
{{--                    <dt class="order-last text-lg font-medium text-gray-500">--}}
{{--                        Total Addons--}}
{{--                    </dt>--}}
{{--                    <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">86</dd>--}}
{{--                </div>--}}
{{--            </dl>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}


