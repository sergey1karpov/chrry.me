<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Меню {{ $user->name }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    <!-- Fonts for template -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Users fonts -->
    @include('fonts.fonts')

    <!-- All styles -->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">

<div class="container-fluid" style="padding: 0">
    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
        <div class="container-fluid">
            <a style="border: none" class="mb-1" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <a class="" href="{{ route('userHomePage',  ['user' => $user->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img-edit-profile" style="background-image: url({{'/'.$user->avatar}}); width: 25px; height: 25px; border-radius: 50%; margin-right: 0; background-position: center center; -wekit-background-size: cover; background-size: cover;background-repeat: no-repeat;"></div>
            </a>
        </div>
    </nav>
</div>

<div class="text-center mb-2 mt-2">
    <label for="exampleInputEmail1" class="form-label">Выберите за какой период показать статистику</label>
</div>
<form action="{{ route('filterStats', ['user' => $user->id]) }}" method="GET"> @csrf
    <input type="hidden" name="table" value="stats">
    <div class="row" style="margin: 0">
        <div class="col-6 d-flex justify-content-center" style="padding: 0">
            <div>
                <input id="startDate" name="from" class="form-control shadow" type="date" value="{{ Carbon\Carbon::today()->toDateString() }}" style="border: 0" />
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center" style="padding: 0">
            <div>
                <input id="startDate" name="to" class="form-control shadow" type="date" value="{{ Carbon\Carbon::today()->toDateString() }}" style="border: 0" />
            </div>
        </div>
        <div class="col-12" style="padding: 0">
            <div class="d-grid m-4" style="padding: 0">
                <button class="btn btn-secondary" type="submit">Статистика</button>
            </div>
        </div>
    </div>
</form>

@if(Route::is('filterStats'))
    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">
        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">Статистика за период</h1>
        <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem;">{{Carbon\Carbon::createFromFormat('Y-m-d', request()->get('from'))->format('d/m/Y')}} - {{Carbon\Carbon::createFromFormat('Y-m-d', request()->get('to'))->format('d/m/Y')}}</h1>
    </div>
    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">
        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">ПРОСМОТРЫ</h1>
        <h1 style="font-family: 'Inter', sans-serif; font-size: 3rem;">{{count($stats['count'])}}</h1>
    </div>
    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">
        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">ГОРОДА</h1>
        @foreach($stats['city'] as $city)
            <div class="d-flex justify-content-between p-2">
                <h1 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; margin: 0">{{$city->city}}</h1><span style="border-radius: 50px" class="badge bg-secondary">{{$city->count}}</span>
            </div>
        @endforeach
        <h1 class="mb-2" style="font-family: 'Inter', sans-serif; font-size: 1rem;"></h1>
    </div>
    <div class="text-center card m-5 shadow @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border: none">
        <h1 class="mt-3" style="font-family: 'Inter', sans-serif; font-size: 1rem;">СТРАНЫ</h1>
        @foreach($stats['country'] as $city)
            <div class="d-flex justify-content-between p-2">
                <h1 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; margin: 0">{{$city->country}}</h1><span style="border-radius: 50px" class="badge bg-secondary">{{$city->count}}</span>
            </div>
        @endforeach
        <h1 class="mb-2" style="font-family: 'Inter', sans-serif; font-size: 1rem;"></h1>
    </div>
@endif

</body>
</html>








