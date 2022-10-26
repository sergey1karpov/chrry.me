<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">
    <title>{{ $user->name }}</title>
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">

@auth
    <div class="container-fluid" style="padding: 0">
        <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
            <div class="container-fluid">
                <a class="mb-1" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                    <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                </a>
                <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                    <div class="img" style="background-image: url({{$user->avatar}});"></div>
                </a>
            </div>
        </nav>
    </div>
@endauth

<div class="container-fluid">
    <div class="col-12 text-center">

        <h1 class="mb-3" style="font-size: 1.2rem">Просмотры за день</h1>
        <h1 class="display-4" style="margin: 0">{{count($stats['one_day_view'])}}</h1>
        <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные просмотры за день</h1>
        <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по городам</h1>
        <ul class="list-group mb-4">
            @foreach($stats['one_day_city_view'] as $c)
                <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1; ">
                    <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                    <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                </li>
            @endforeach
        </ul>
        <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по странам</h1>
        <ul class="list-group mb-4">
            @foreach($stats['one_day_country_view'] as $c)
                <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff;">
                    <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                    <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                </li>
            @endforeach
        </ul>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed @if($user->dayVsNight) bg-secondary text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #E7EEE7">
                        @lang('app.month_stat')
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <h1 class="mb-3 mt-3" style="font-size: 1.2rem">Просмотры за месяц</h1>
                    <h1 class="display-4" style="margin: 0">{{count($stats['one_month_view'])}}</h1>
                    <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные просмотры за месяц</h1>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по городам</h1>
                    <ul class="list-group mb-4">
                        @foreach($stats['one_month_city_view'] as $c)
                            <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1;">
                                <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                                <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по странам</h1>
                    <ul class="list-group mb-4">
                        @foreach($stats['one_month_country_view'] as $c)
                            <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff;">
                                <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                                <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="background-color: #FEAE73; color: white">
                        @lang('app.year_stat')
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <h1 class="mb-3 mt-3" style="font-size: 1.2rem">Просмотры за год</h1>
                    <h1 class="display-4" style="margin: 0">{{count($stats['one_year_view'])}}</h1>
                    <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные просмотры за год</h1>
                     <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по городам</h1>
                    <ul class="list-group mb-4">
                        @foreach($stats['one_year_city_view'] as $c)
                            <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1; ">
                                <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                                <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по странам</h1>
                    <ul class="list-group mb-4">
                        @foreach($stats['one_year_country_view'] as $c)
                            <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff;">
                                <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                                <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="background-color: #D64E52; color: white; ">
                        @lang('app.all_day_stat')
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <h1 class="mb-3 mt-3" style="font-size: 1.2rem">Всего просмотров</h1>
                    <h1 class="display-4" style="margin: 0">{{count($stats['all_view'])}}</h1>
                    <h1 class="display-4 mb-4" style="font-size: 1rem">Всего уникальных просмотров</h1>
                     <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по городам</h1>
                    <ul class="list-group mb-4">
                        @foreach($stats['all_city'] as $c)
                            <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1;">
                                <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                                <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры по странам</h1>
                    <ul class="list-group mb-4">
                        @foreach($stats['all_country'] as $c)
                            <li class="@if($user->dayVsNight) bg-secondary @endif list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff;">
                                <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                                <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>







    </div>
</div>

</body>
</html>








