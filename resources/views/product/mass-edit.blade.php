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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

    <!-- Date JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

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

    <div class="container-fluid" style="padding: 0">
        <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
            <div class="container-fluid">
                <a class="mb-1" href="{{ route('allProducts', ['user' => Auth::user()->id]) }}">
                    <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                </a>
                <a class="" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                    <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>
                </a>
            </div>
        </nav>
    </div>

    <div class="d-grid gap-2 m-3">
        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary" type="button">Как выглядит карточка продукта сейчас</button>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin: 0">
            <div class="modal-content" style="border-radius: 0; border: none">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-family: 'Inter', sans-serif;">Карточка продукта</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 0; background-color: {{ $designProduct['dp_bg_color']}}">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://i.ibb.co/J5jNsZG/d1.jpg" class="card-img-top" alt="Apple Computer" style="border-radius: 0" />
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.ibb.co/Hrj9yRj/d2.jpg" class="card-img-top" alt="Apple Computer" style="border-radius: 0" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="">
                            <h5 class="card-title mb-3 mt-2 me-2 ms-2 {{$designProduct['dp_title_position']}}" style="
                                font-family: '{{ $designProduct['dp_title_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_title_font_size'] }}rem;
                                color: {{ $designProduct['dp_title_font_color'] }};
                                text-shadow: {{ $designProduct['dp_title_font_shadow_right'] }}px {{ $designProduct['dp_title_font_shadow_bottom'] }}px {{ $designProduct['dp_title_font_shadow_blur'] }}px {{ $designProduct['dp_title_font_shadow_color'] }};
                            ">Lorem ipsum dolor sit amet</h5>
                            <p class="mb-4 me-2 ms-2 {{$designProduct['dp_description_position']}}" style="
                                white-space: pre-wrap;
                                font-family: '{{ $designProduct['dp_description_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_description_font_size'] }}rem;
                                color: {{ $designProduct['dp_description_font_color']}};
                                text-shadow: {{ $designProduct['dp_description_font_shadow_right'] }}px {{ $designProduct['dp_description_font_shadow_bottom'] }}px {{ $designProduct['dp_description_font_shadow_blur'] }}px {{ $designProduct['dp_description_font_shadow_color'] }};
                            ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget ipsum sit amet augue mattis congue</p>
                            <p class="mb-4 me-2 ms-2 {{$designProduct['dp_full_description_position']}}" style="
                                white-space: pre-wrap;
                                font-family: '{{ $designProduct['dp_full_description_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_full_description_font_size'] }}rem;
                                color: {{ $designProduct['dp_full_description_font_color']}};
                                text-shadow: {{ $designProduct['dp_full_description_font_shadow_right'] }}px {{ $designProduct['dp_full_description_font_shadow_bottom'] }}px {{ $designProduct['dp_full_description_font_shadow_blur'] }}px {{ $designProduct['dp_full_description_font_shadow_color'] }};
                                ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget ipsum sit amet augue mattis congue. Nullam vulputate, elit vitae finibus consequat, nulla tortor vestibulum enim, ut tincidunt lorem urna sed mauris.

Cras dapibus diam at velit efficitur ullamcorper. Curabitur eu placerat neque, eu pretium quam. Fusce pretium eget ante et iaculis. Ut sed volutpat dolor, vitae tincidunt enim. Nulla non vestibulum elit, sodales placerat augue.
                            </p>
                        </div>
                        <div class="me-2 ms-2 d-flex justify-content-between total font-weight-bold mt-5">
                            <span style="
                                font-family: '{{ $designProduct['dp_price_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_price_font_size'] }}rem;
                                color: {{ $designProduct['dp_price_font_color']}};
                                text-shadow: {{ $designProduct['dp_price_font_shadow_right'] }}px {{ $designProduct['dp_price_font_shadow_bottom'] }}px {{ $designProduct['dp_price_font_shadow_blur'] }}px {{ $designProduct['dp_price_font_shadow_color'] }};
                            ">Цена</span><span style="
                                font-family: '{{ $designProduct['dp_price_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_price_font_size'] }}rem;
                                color: {{ $designProduct['dp_price_font_color'] }};
                                text-shadow: {{ $designProduct['dp_price_font_shadow_right'] }}px {{ $designProduct['dp_price_font_shadow_bottom'] }}px {{ $designProduct['dp_price_font_shadow_blur'] }}px {{ $designProduct['dp_price_font_shadow_color'] }};
                                "><b>15550</b> рублей</span>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3 me-2 ms-2 mb-2" style="background-color: {{ $designProduct['dp_bg_color'] }}">
                        <a class="btn" href="#" style="
                            background-color: {{ $designProduct['dp_btn_color_remote'] }};
                            border-radius: {{ $designProduct['dp_btn_radius_remote'] }}px;
                        ">
                            <h1 style="
                                margin-bottom: 0;
                                color: {{ $designProduct['dp_btn_text_color_remote'] }};
                                font-size: {{ $designProduct['dp_btn_text_size_remote'] }}rem;
                                font-family: '{{ $designProduct['dp_btn_text_font_remote'] ?? 'Inter'}}', sans-serif;
                                text-shadow:  {{ $designProduct['dp_btn_text_shadow_right_remote'] }}px {{ $designProduct['dp_btn_text_shadow_bottom_remote'] }}px {{ $designProduct['dp_btn_text_shadow_blur_remote'] }}px {{ $designProduct['dp_btn_text_shadow_color_remote'] }};
                            ">
                                Заказать на сайте
                            </h1>
                        </a>
                        <a class="btn" href="#" style="
                            background-color: {{ $designProduct['dp_btn_color_chrry'] }};
                            border-radius: {{ $designProduct['dp_btn_radius_chrry'] }}px;
                        ">
                            <h1 style="
                                margin-bottom: 0;
                                color: {{ $designProduct['dp_btn_text_color_chrry'] }};
                                font-size: {{ $designProduct['dp_btn_text_size_chrry'] }}rem;
                                font-family: '{{ $designProduct['dp_btn_text_font_chrry'] ?? 'Inter'}}', sans-serif;
                                text-shadow:  {{ $designProduct['dp_btn_text_shadow_right_chrry'] }}px {{ $designProduct['dp_btn_text_shadow_bottom_chrry'] }}px {{ $designProduct['dp_btn_text_shadow_blur_chrry'] }}px {{ $designProduct['dp_btn_text_shadow_color_chrry'] }};
                            ">
                                Заказать
                            </h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ms-3 me-3">
        <form action="{{ route('massUpdate', ['user' => $user->id]) }}" method="POST"> @csrf @method('PATCH')
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет фона карточки</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_bg_color" style="height: 35px; border: 0" value="{{$designProduct['dp_bg_color']}}">
                </div>
            </div>

            <hr>
            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн заголовка</label>
            <hr>

            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для заголовка</label>
                <div class="col-12">
                    <select id="title_font" data-placeholder="Поиск шрифта для заголовка"  autocomplete="off" name="dp_title_font"></select>
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для заголовка</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_size']}}" name="dp_title_font_size">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_title_font_color" value="{{$designProduct['dp_title_font_color']}}" style="height: 35px; border: 0">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Располложение заголовка</label>
                <select name="dp_title_position" class="form-select shadow" aria-label="Default select example" style="border: 0">
                    <option @if($designProduct['dp_title_position'] == 'text-start') selected @endif value="text-start">По левой стороне</option>
                    <option @if($designProduct['dp_title_position'] == 'text-end') selected @endif value="text-end">По правой</option>
                    <option @if($designProduct['dp_title_position'] == 'text-center') selected @endif value="text-center">По центру</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени заголовка</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_title_font_shadow_color']}}" name="dp_title_font_shadow_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_shadow_right']}}" name="dp_title_font_shadow_right">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_shadow_bottom']}}" name="dp_title_font_shadow_bottom">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_shadow_blur']}}" name="dp_title_font_shadow_blur">
                </div>
            </div>

            <hr>
            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн короткого описания</label>
            <hr>

            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для короткого описания</label>
                <div class="col-12">
                    <select id="description_font" data-placeholder="Поиск шрифта для короткого описания"  autocomplete="off" value="{{$designProduct['dp_description_font']}}" name="dp_description_font"></select>
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для короткого описания</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_size']}}" name="dp_description_font_size">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет короткого описания</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_description_font_color']}}" name="dp_description_font_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Располложение заголовка</label>
                <select name="dp_description_position" class="form-select shadow" aria-label="Default select example" style="border: 0">
                    <option @if($designProduct['dp_description_position'] == 'text-start') selected @endif value="text-start">По левой стороне</option>
                    <option @if($designProduct['dp_description_position'] == 'text-end') selected @endif value="text-end">По правой</option>
                    <option @if($designProduct['dp_description_position'] == 'text-center') selected @endif value="text-center">По центру</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени короткого описания</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_description_font_shadow_color']}}" name="dp_description_font_shadow_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_shadow_right']}}" name="dp_description_font_shadow_right">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_shadow_bottom']}}" name="dp_description_font_shadow_bottom">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_shadow_blur']}}" name="dp_description_font_shadow_blur">
                </div>
            </div>

            <hr>
            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн полного описания</label>
            <hr>

            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для полного описания</label>
                <div class="col-12">
                    <select id="full_description_font" data-placeholder="Поиск шрифта для полного описания"  autocomplete="off" name="dp_full_description_font"></select>
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для полного описания</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_size']}}" name="dp_full_description_font_size">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет полного описания</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_full_description_font_color']}}" name="dp_full_description_font_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Располложение заголовка</label>
                <select name="dp_full_description_position" class="form-select shadow" aria-label="Default select example" style="border: 0">
                    <option @if($designProduct['dp_full_description_position'] == 'text-start') selected @endif value="text-start">По левой стороне</option>
                    <option @if($designProduct['dp_full_description_position'] == 'text-end') selected @endif value="text-end">По правой</option>
                    <option @if($designProduct['dp_full_description_position'] == 'text-center') selected @endif value="text-center">По центру</option>
                </select>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени полного описания</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_full_description_font_shadow_color']}}" name="dp_full_description_font_shadow_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_shadow_right']}}" name="dp_full_description_font_shadow_right">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_shadow_bottom']}}" name="dp_full_description_font_shadow_bottom">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_shadow_blur']}}" name="dp_full_description_font_shadow_blur">
                </div>
            </div>

            <hr>
            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн цены</label>
            <hr>

            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для цены</label>
                <div class="col-12">
                    <select id="price_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_price_font"></select>
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для цены</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_size']}}" name="dp_price_font_size">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет цены</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_price_font_color']}}" name="dp_price_font_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени цены</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_price_font_shadow_color']}}" name="dp_price_font_shadow_color" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_shadow_right']}}" name="dp_price_font_shadow_right">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_shadow_bottom']}}" name="dp_price_font_shadow_bottom">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_shadow_blur']}}" name="dp_price_font_shadow_blur">
                </div>
            </div>

            <hr>
            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн кнопки на внешний ресурс</label>
            <hr>
            <!-- -->
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на внешний ресурс</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_color_remote" value="{{$designProduct['dp_btn_color_remote']}}" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет текста кнопки на внешний ресурс</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_color_remote" value="{{$designProduct['dp_btn_text_color_remote']}}" style="height: 35px; border: 0">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для кнопки</label>
                <div class="col-12">
                    <select id="btn_outher_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_btn_text_font_remote"></select>
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для кнопки</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_size_remote']}}" name="dp_btn_text_size_remote">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление кнопки на внешний ресурс</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="dp_btn_radius_remote" value="{{$designProduct['dp_btn_radius_remote']}}">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени текста кнопки на внешний ресурс</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_shadow_color_remote" value="{{$designProduct['dp_btn_text_shadow_color_remote']}}" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_right_remote']}}" name="dp_btn_text_shadow_right_remote">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_bottom_remote']}}" name="dp_btn_text_shadow_bottom_remote">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_blur_remote']}}" name="dp_btn_text_shadow_blur_remote">
                </div>
            </div>
            <!-- -->
            <hr>
            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн кнопки на страницу заказа</label>
            <hr>

            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на страницу заказа</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_btn_color_chrry']}}" name="dp_btn_color_chrry" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет текста кнопки на страницу заказа</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_btn_text_color_chrry']}}" name="dp_btn_text_color_chrry" style="height: 35px; border: 0">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для кнопки</label>
                <div class="col-12">
                    <select id="btn_chrry_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_btn_text_font_chrry"></select>
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для кнопки</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_size_chrry']}}" name="dp_btn_text_size_chrry">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление кнопки на страницу заказа</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="dp_btn_radius_chrry" value="{{$designProduct['dp_btn_radius_chrry']}}">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени текста кнопки на страницу заказа</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_shadow_color_chrry" value="{{$designProduct['dp_btn_text_shadow_color_chrry']}}" style="height: 35px; border: 0">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_right_chrry']}}" name="dp_btn_text_shadow_right_chrry">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_bottom_chrry']}}" name="dp_btn_text_shadow_bottom_chrry">
                </div>
            </div>
            <div class=" mb-3">
                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_blur_chrry']}}" name="dp_btn_text_shadow_blur_chrry">
                </div>
            </div>
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-secondary">Изменить</button>
            </div>
        </form>
    </div>

</body>
<script>
    new TomSelect('#btn_chrry_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#btn_outher_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#title_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#description_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#full_description_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#price_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
</script>
</html>








