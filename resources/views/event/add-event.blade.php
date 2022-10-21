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
        .ts-control {
            border: 0;
            box-shadow: 0px 1px 10px 2px rgba(0, 0, 0, 0.2);
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
    @if ($message = Session::get('error'))
        <div class="row">
            <div class="col-12" style="padding: 0">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: red">
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
<div class="ms-2 me-2 mb-3 text-center">
    <div class="modal-body p-2">
        <form action="{{ route('addEvent', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" id="add-post">
            @csrf @method('POST')
            <input type="hidden" name="type" value="EVENT"> <!-- Тип ссылки -->
            <div class="mb-3"> <!-- Город -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Город проведения</label>
                <input class="form-control shadow" name="city" id="city" placeholder="Москва" style=" border: 0">
            </div>
            <div class="mb-3"> <!-- Локация -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Место проведения</label>
                <input class="form-control shadow" name="location" id="full_text" placeholder="Название места проведения мероприятия" style="border: 0">
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 255 символов</span>
            </div>
            <div class="mb-3"> <!-- Дата и время -->
                <div class="row">
                    <div class="col-7">
                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Дата</label>
                        <input id="startDate" name="date" class="form-control shadow" type="date" style="border: 0" />
                    </div>
                    <div class="col-5">
                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Время</label>
                        <input type="text" class="form-control shadow" name="time" id="timepicker" placeholder="21:30" maxlength="255" style="border: 0">
                    </div>
                </div>
            </div>
            <div class="mb-3"> <!-- Описание события -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Описание</label>
                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="3" name="description" id="full_text" style="border: 0"></textarea>
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 2500 символов</span>
            </div>
            <div class="mb-3"> <!-- Баннер события -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Афиша</label>
                <input type="file" class="form-control shadow" id="inputGroupFile022" name="banner" accept=".png, .jpg, .jpeg" style="border: 0">
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>
            </div>
            <div class="mb-3"> <!-- Покупка билетов -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на продажу билетов</label>
                <input class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="tickets" id="full_text" placeholder="" style="border: 0;">
            </div>
            <div class="mb-3"> <!-- Ссылка на видео -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_video')</label>
                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="2" name="video" id="video" style="border: 0;"></textarea>
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_video_description')</span>
            </div>
            <div class="mb-3"> <!-- Ссылка на любое медиа -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Плейлист</label>
                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="2" name="media" id="media" style="border: 0;"></textarea>
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Для добавления плейлиста, в это поле необходимо вставить его код</span>
            </div>

            <!-- Дизайн -->
            <hr>
            <div class="text-center">
                Дизайн мероприятия
            </div>
            <hr>

            <div class="mb-3 text-center" >
                <div class="ms-2 form-check" style="padding: 0">
                    <div class="form-check form-switch form-switch mb-3">
                        <input name="check_last_event" class="form-check-input" type="checkbox" value="penis" id="design-link-e">
                        <label class="form-check-label" for="flexCheckDefault">
                            @lang('app.last_style_2')
                        </label>
                    </div>
                </div>
                <label for="exampleInputEmail1" class="form-label " style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">Этот переключатель поможет вам скопировать дизайн последнего созданного вами мероприятия, что бы не нужно было самому заполнять ввсе параметры опять</label>
            </div>

            <div id="design-block-e">
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для города и локации</label>
                <div class="row mb-">
                    <div class="col-6">
                        <select id="select-beast-empty-post-location" data-placeholder="Поиск шрифта..."  autocomplete="off" name="location_font"></select>
                    </div>
                    <div class="col-3">
                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="location_font_size" style="border: 0; height: 35px;">
                            <option value="0.9">1</option>
                            <option value="1">2</option>
                            <option value="1.1">3</option>
                            <option value="1.2">4</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#050507" title="Choose your color" name="location_font_color" style="height: 35px; border: 0"><br>
                    </div>
                </div>
                <div class="mb-1 text-center">
                    <div class="form-check form-switch text-center">
                        <input name="bold_city" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Сделать название города жирным
                        </label>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <div class="form-check form-switch text-center">
                        <input name="bold_location" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Сделать место проведения жирным
                        </label>
                    </div>
                </div>
                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для города и локации</label>
                <div class="mb-3 text-center row">
                    <div class="col-12">
                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput"  title="Choose your color" name="location_text_shadow_color" style="height: 35px; border: 0"><br>
                    </div>
                    <div class="col-12">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Размытие тени</span>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_blur" value="0">
                    </div>
                    <div class="col-12">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_bottom" value="0">
                    </div>
                    <div class="col-12">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_right" value="0">
                    </div>
                </div>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для даты и времени</label>
                <div class="row mb-">
                    <div class="col-6">
                        <select id="select-beast-empty-post-date" data-placeholder="Поиск шрифта..."  autocomplete="off" name="date_font"></select>
                    </div>
                    <div class="col-3">
                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="date_font_size" style="border: 0; height: 35px;">
                            <option value="0.9">1</option>
                            <option value="1">2</option>
                            <option value="1.1">3</option>
                            <option value="1.2">4</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#050507" title="Choose your color" name="date_font_color" style="height: 35px; border: 0"><br>
                    </div>
                </div>
                <div class="mb-1 text-center">
                    <div class="form-check form-switch text-center">
                        <input name="bold_date" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Сделать дату жирным
                        </label>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <div class="form-check form-switch text-center">
                        <input name="bold_time" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Сделать время жирным
                        </label>
                    </div>
                </div>
                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для даты и времени</label>
                <div class="mb-3 text-center row">
                    <div class="col-12">
                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput"  title="Choose your color" name="date_text_shadow_color" style="height: 35px; border: 0"><br>
                    </div>
                    <div class="col-12">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Размытие тени</span>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_blur" value="0">
                    </div>
                    <div class="col-12">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_bottom" value="0">
                    </div>
                    <div class="col-12">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_right" value="0">
                    </div>
                </div>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Выбор фонового цвета и прозрачности</label>
                <div class="row mb-3">
                    <div class="col-3">
                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color_hex" style="height: 35px; border: 0">
                    </div>
                    <div class="col-9">
                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                    </div>
                </div>

                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_round')</label>
                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="event_round" value="25">
                </div>

                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для блока мероприятия</label>
                <div class="mb-3 mt-2 text-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio1" value="shadow-none" style="border: 0">
                                    <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio2" value="shadow-sm" style="border: 0">
                                    <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio3" value="shadow" style="border: 0">
                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio3" value="shadow-lg" style="border: 0">
                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <div>
                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="event_animation" style="border: 0">
                            <option selected>Выбрать анимацию...</option>
                            <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                            <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                        </select>
                    </div>
                    <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Анимация для мероприятия</label>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button id="post-btn" type="submit" class="btn btn-secondary" style="border: 0">Добавить</button>
            </div>
    </div>
    </form>
</div>
</body>
<script>
    new TomSelect('#select-beast-empty-post-location',{
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
                    '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#select-beast-empty-post-date',{
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
                    '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
</script>
</html>








