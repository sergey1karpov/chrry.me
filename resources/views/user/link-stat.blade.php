<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <body class="antialiased" style="background-color: #f1f2f2">

    	@auth
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('allLinks', ['id' => Auth::user()->id]) }}" style="color: black">
                    <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid mb-4" style="width:20px">

                </a>
            </div>
        </nav>
        @endauth

        <div class="container-fluid">
            <div class="col-12 text-center">

                <h1 class="mb-3" style="font-size: 1.2rem">Статистика за день</h1>
                <h1 class="display-4" style="margin: 0">{{count($day['stat'])}}</h1>
                <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные клики</h1>
                {{-- <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по городам</h1> --}}
                <ul class="list-group mb-4">
                    @foreach($day['uniqueCity'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1; border-color: #f1f2f2">
                            <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                    @endforeach
                </ul>
                <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по странам</h1>
                <ul class="list-group mb-4">
                    @foreach($day['uniqueCountry'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff; border-color: #f1f2f2">
                            <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                            <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item" style="background-color: #f1f2f2">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #E7EEE7">
                            Статистика за месяц
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <h1 class="mb-3 mt-3" style="font-size: 1.2rem">Статистика за месяц</h1>
                            <h1 class="display-4" style="margin: 0">{{count($month['stat'])}}</h1>
                            <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные клики</h1>
                            {{-- <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по городам</h1> --}}
                            <ul class="list-group mb-4">
                                @foreach($month['uniqueCity'] as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1; border-color: #f1f2f2">
                                        <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                                        <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по странам</h1>
                            <ul class="list-group mb-4">
                                @foreach($month['uniqueCountry'] as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff; border-color: #f1f2f2">
                                        <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                                        <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item" style="background-color: #f1f2f2">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="background-color: #FEAE73; color: white">
                            Статистика за год
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <h1 class="mb-3 mt-3" style="font-size: 1.2rem">Статистика за год</h1>
                            <h1 class="display-4" style="margin: 0">{{count($year['stat'])}}</h1>
                            <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные клики</h1>
                            {{-- <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по городам</h1> --}}
                            <ul class="list-group mb-4">
                                @foreach($year['uniqueCity'] as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1; border-color: #f1f2f2">
                                        <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                                        <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по странам</h1>
                            <ul class="list-group mb-4">
                                @foreach($year['uniqueCountry'] as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff; border-color: #f1f2f2">
                                        <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->country}}</h1>
                                        <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item" style="background-color: #f1f2f2">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="background-color: #D64E52; color: white; ">
                            Статистика за все время
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <h1 class="mb-3 mt-3" style="font-size: 1.2rem">Статистика за все время</h1>
                            <h1 class="display-4" style="margin: 0">{{count($all['stat'])}}</h1>
                            <h1 class="display-4 mb-4" style="font-size: 1rem">Уникальные клики</h1>
                            {{-- <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по городам</h1> --}}
                            <ul class="list-group mb-4">
                                @foreach($all['uniqueCity'] as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #dcdbe1; border-color: #f1f2f2">
                                        <h1 style="font-size: 1rem; color: #303032; margin: 0">{{$c->city}}</h1>
                                        <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <h1 class="display-4 mb-3" style="font-size: 1rem">Клики по странам</h1>
                            <ul class="list-group mb-4">
                                @foreach($all['uniqueCountry'] as $c)
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0; background-color: #e3e8ff; border-color: #f1f2f2">
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

        {{-- <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Просмотры профиля за сутки
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                    <h1 class="display-4" style="margin: 0">{{count($day['stat'])}}</h1>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
                    <ul class="list-group mb-3">
                        @foreach($day['uniqueCity'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->city}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4" style="font-size: 1rem">Страны</h1>
                    <ul class="list-group mb-3">
                        @foreach($day['uniqueCountry'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->country}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Просмотры профиля за месяц
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                    <h1 class="display-4" style="margin: 0">{{count($month['stat'])}}</h1>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
                    <ul class="list-group mb-3">
                        @foreach($month['uniqueCity'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->city}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4" style="font-size: 1rem">Страны</h1>
                    <ul class="list-group mb-3">
                        @foreach($month['uniqueCountry'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->country}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     Статистика за год
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                    <h1 class="display-4" style="margin: 0">{{count($year['stat'])}}</h1>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
                    <ul class="list-group mb-3">
                        @foreach($year['uniqueCity'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->city}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4" style="font-size: 1rem">Страны</h1>
                    <ul class="list-group mb-3">
                        @foreach($year['uniqueCountry'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->country}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Вся статистика просмотров профиля
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                    <h1 class="display-4" style="margin: 0">{{count($all['stat'])}}</h1>
                    <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
                    <ul class="list-group mb-3">
                        @foreach($all['uniqueCity'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->city}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <h1 class="display-4" style="font-size: 1rem">Страны</h1>
                    <ul class="list-group mb-3">
                        @foreach($all['uniqueCountry'] as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
                            {{$c->country}}
                              <span class="badge bg-light" style="color: black">{{$c->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> --}}

    </body>
</html>








