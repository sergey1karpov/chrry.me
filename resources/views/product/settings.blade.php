<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

    <!-- Date JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Time -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/js/moment.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    @include('fonts.fonts')
    <style type="text/css">
        body{
            background: #f1f2f2;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        span{
            font-size:15px;
        }
        a{
            text-decoration:none;
            color: #0062cc;
        }
        .img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 0;
            background-position: center center;
            -wekit-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">
@if (session('count'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="border-radius: 0">
        {{ session('count') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid justify-content-center text-center">
    @if(isset($errors))
        @if ($errors->any())
            <div class="row">
                <div class="col-12" style="padding: 0">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: red">
                        @foreach ($errors->all() as $error)
                            <div class="title">
                                <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$error}}</span>
                            </div>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
    @endif
    @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-12" style="padding: 0">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: lightseagreen">
                    <div class="title">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$message}}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="container-fluid" style="padding: 0">
    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
        <div class="container-fluid">
            <a class="mb-1" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>
            </a>
        </div>
    </nav>
</div>
<div class="ms-3 me-3 mb-3 text-center">
    <form action="{{route('marketSettingsPatch', ['id' => $user->id])}}" method="POST"> @csrf @method('PATCH')

        <div class="row">

            <hr>

            <label class="form-check-label mb-2" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                Выберите раскладку товарных карточек на витрине
            </label>
            <div class="col-6 mb-3">
                <img src="https://i.ibb.co/nwPqYmK/two.png" width="60">
                <div class="form-check d-flex justify-content-center mt-2">
                    <input class="form-check-input shadow" type="radio" value="two" id="flexCheckDefault" name="cards_style" style="border: 0" @if($user->marketSettings->cards_style == 'two') checked @endif>
                </div>
            </div>
            <div class="col-6">
                <img src="https://i.ibb.co/gvJ6f4n/one.png" width="60">
                <div class="form-check d-flex justify-content-center mt-2">
                    <input class="form-check-input shadow" type="radio" value="one" id="flexCheckChecked" name="cards_style" style="border: 0" @if($user->marketSettings->cards_style == 'one') checked @endif>
                </div>
            </div>

            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                Округление углов карточки
            </label>
            <div class="mb-3 text-center d-flex justify-content-center">
                <input type="range" class="form-range" min="1" max="100" step="1" name="card_round" id="customRange3" value="{{$user->marketSettings->card_round}}">
            </div>

            <div class="mb-1 text-center mt-2" >
                <div class="ms-2 form-check" style="padding: 0">
                    <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                        Включить тень для карточки товара
                    </label>
                    <div class="form-check form-switch mb-3 d-flex justify-content-center">
                        <input name="cards_shadow" class="form-check-input @if($user->dayVsNight) bg-secondary @endif shadow" type="checkbox" value="{{true}}" id="design-link-e" style="border: 0" @if($user->marketSettings->cards_shadow) checked @endif>
                    </div>
                </div>
            </div>

            <hr>

            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                Цвет для названия товара
            </label>
            <div class="mb-3 text-center d-flex justify-content-center">
                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$user->marketSettings->color_title}}" name="color_title" style="height: 35px; border: 0">
            </div>
            <div class="mb-1 text-center mt-2" >
                <div class="ms-2 form-check" style="padding: 0">
                    <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                        Тень для названия товара
                    </label>
                    <div class="form-check form-switch mb-3 d-flex justify-content-center">
                        <input name="title_shadow" class="form-check-input @if($user->dayVsNight) bg-secondary @endif shadow" type="checkbox" value="{{true}}" id="design-link-e" style="border: 0" @if($user->marketSettings->title_shadow) checked @endif>
                    </div>
                </div>
            </div>
            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                Размер шрифта для названия товара
            </label>
            <div class="mb-3 text-center d-flex justify-content-center">
                <input type="range" class="form-range" min="0.9" max="1.3" step="0.1" name="title_font_size" id="customRange3" value="{{$user->marketSettings->title_font_size}}">
            </div>

            <hr>

            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                Цвет для цены товара
            </label>
            <div class="mb-3 text-center d-flex justify-content-center">
                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$user->marketSettings->color_price}}" name="color_price" style="height: 35px; border: 0">
            </div>
            <div class="mb-1 text-center mt-2" >
                <div class="ms-2 form-check" style="padding: 0">
                    <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                        Тень для цены продукта
                    </label>
                    <div class="form-check form-switch mb-3 d-flex justify-content-center">
                        <input name="price_shadow" class="form-check-input @if($user->dayVsNight) bg-secondary @endif shadow" type="checkbox" value="{{true}}" id="design-link-e" style="border: 0" @if($user->marketSettings->price_shadow) checked @endif>
                    </div>
                </div>
            </div>
            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
                Размер шрифта для цены товара
            </label>
            <div class="mb-3 text-center d-flex justify-content-center">
                <input type="range" class="form-range" min="0.9" max="1.3" step="0.1" name="price_font_size" id="customRange3" value="{{$user->marketSettings->price_font_size}}">
            </div>

            <hr>

            <div class="d-grid gap-2 mt-2">
                <button class="btn btn-secondary" type="submit">Изменить настройки</button>
            </div>

        </div>


    </form>
</div>
</body>

</html>








