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

        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

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
			  /* border-bottom:2px solid #0062cc; */
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

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">

        <div class="container-fluid justify-content-center text-center">
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

        @auth
            <div class="container-fluid " style="padding: 0">
                <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                    <div class="container-fluid">
                        <a class="mb-1" href="{{ route('allLinks', ['id' => Auth::user()->id]) }}">
                            <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                        </a>
                        <form class="" action="{{ route('searchLink', ['id' => Auth::user()->id]) }}">
                            <input class="form-control me-2 @if($user->dayVsNight) bg-secondary @endif" type="search" placeholder="Поиск ссылок" aria-label="Search" name="search" style="height: 30px">
                        </form>
                        <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                            <div class="img" style="background-image: url({{$user->avatar}});"></div>
                        </a>
                    </div>
                </nav>
            </div>
        @endauth

        <div class="container-fluid justify-content-center text-center " style="padding-left: 0; padding-right: 0">

            <div class="modal fade" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLink" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылки</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{ route('editAllLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('PATCH')
                                <div>


                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
                                        <div class="mb-3 text-center d-flex justify-content-center">
                                            <input type="color" class="form-control " id="exampleColorInput" value="" title="Choose your color" name="title_color" style="height: 40px;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Фоновый цвет</label>
                                        <div class="mb-3 text-center d-flex justify-content-center">
                                            <input type="color" class="form-control " id="exampleColorInput" value="" title="Choose your color" name="background_color" style="height: 40px;">
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                                    <div class="mb- text-center d-flex justify-content-center">
                                        <input type="range" class="form-range" min="19" max="99" step="10" id="customRange2" name="transparency" value=""><br>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio1" value="shadow-none">
                                            <label class="form-check-label" for="inlineRadio1">none</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" >
                                            <label class="form-check-label" for="inlineRadio2">sm</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow" >
                                            <label class="form-check-label" for="inlineRadio3">md</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" >
                                            <label class="form-check-label" for="inlineRadio3">lg</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление углов блоков и фото</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rounded" id="inlineRadio1" value="rounded-0" >
                                            <label class="form-check-label" for="inlineRadio1">none</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rounded" id="inlineRadio2" value="rounded-1" >
                                            <label class="form-check-label" for="inlineRadio2">sm</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-2" >
                                            <label class="form-check-label" for="inlineRadio3">md</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-3" >
                                            <label class="form-check-label" for="inlineRadio3">lg</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <div>
                                            <select class="form-select" aria-label="Default select example" name="animation">
                                                <option selected>Выбрать анимацию...</option>
                                                <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                            </select>
                                        </div>
                                        <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <div class="form-check text-center">
                                            <input name="pinned" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Закрепите ссылку и она всегда будет вверху списка
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($links as $link)
            <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                    <div class="container-fluid justify-content-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                        <div class="col-12">
                            <div class="row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center">
                                <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
                                    <div class="col-1">
                                        @if($link->type == 'POST')
                                            @if($link->photos)
                                                @foreach(unserialize($link->photos) as $key => $photo)
                                                    @if($key == 0)
                                                        <img src="{{$photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @endif
                                                @endforeach
                                            @endif
                                        @elseif($link->type != 'POST')
                                            @if($link->icon)
                                                <img src="{{$link->icon}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                            @elseif($link->icon == false)
                                                <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                            @endif
                                        @endif
                                    </div>
                                    <div class=" col-10 text-center">
                                        <div class="me-4 ms-4">
                                            <h4 class="" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">{{$link->title}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between rounded-bottom rounded-3 ms-4 me-4" style="padding: 0;">
                                <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;">
                                    <a href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">
                                        <button href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                            @lang('app.s_stats')
                                        </button>
                                    </a>
                                </div>
                                <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalPost{{$link->id}}" @elseif($link->type != 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}" @endif>
                                    <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                        @lang('app.p_edit_prof')
                                    </button>
                                </div>
                                <div class="col-4" style="background-color: #f0eeef; ">
                                    <form action="{{ route('delLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                            @lang('app.a_del')
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                        <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.a_edit_link')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        @if($link->icon == false)
                                            @if($link->photo)
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>
                                                    <div class="row d-flex align-items-center justify-content-center">
                                                        <div class="col-12">
                                                            <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <form action="{{ route('delPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                @csrf @method('PATCH')
                                                                <input type="hidden" name="type" value="LINK">
                                                                <button class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($link->icon)
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_icon')</label><br>
                                                <div class="row d-flex align-items-center justify-content-center">
                                                    <div class="col-12">
                                                        <img class="rounded-3" src="{{$link->icon}}" style="width:50px;">
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <form action="{{ route('delLinkIcon', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="modal-body">
                                            <form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf @method('PATCH')
                                                <div>
                                                    <input type="hidden" name="type" value="LINK"> <!-- Тип ссылки -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_title')</label>
                                                        <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif" name="title" placeholder="Моя красивая ссылка" maxlength="50" value="{{$link->title}}" style="border-radius: 0">
                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>
                                                    </div>
                                                    <div class="text-center row">
                                                        <div class="col-9">
                                                            <select id="empty-links{{$link->id}}" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                                        </div>
                                                        <div class="col-3">
                                                            <select class="form-select @if($user->dayVsNight) bg-secondary @endif" aria-label="Default select example" name="font_size" style="height: 35px; border-radius: 0">
                                                                <option @if($link->font_size == 0.9) selected @endif value="0.9">1</option>
                                                                <option @if($link->font_size == 1) selected @endif value="1">2</option>
                                                                <option @if($link->font_size == 1.1) selected @endif value="1.1">3</option>
                                                                <option @if($link->font_size == 1.2) selected @endif value="1.2">4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>
                                                        <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif" name="link" placeholder="http://..." value="{{$link->link}}" style="border-radius: 0">
                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.a_edit_link')</span>
                                                    </div>
                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>
                                                    <div class="mb-3 text-center row">
                                                        <div class="col-12">
                                                            <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" id="exampleColorInput" value="{{$link->text_shadow_color}}" title="Choose your color" name="text_shadow_color" style="height: 40px; border-radius: 0"><br>
                                                        </div>
                                                        <div class="col-12">
                                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Четкость тени</span>
                                                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_blur" value="{{$link->text_shadow_blur}}">
                                                        </div>
                                                        <div class="col-12">
                                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                                                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_bottom" value="{{$link->text_shadow_bottom}}">
                                                        </div>
                                                        <div class="col-12">
                                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>
                                                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="{{$link->text_shadow_right}}">
                                                        </div>
                                                    </div>

                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_icon')</label>
                                                    <div class="mb-3">
                                                        <select id="select-beast-empty{{$link->id}}" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon">
                                                        </select>
                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_icon_description')</span>
                                                    </div>
                                                    @if($link->icon == false)
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>
                                                            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif" id="inputGroupFile02" name="photo" style="border-radius: 0">
                                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_photo_description')</span>
                                                        </div>
                                                    @endif

                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>
                                                        <div class="mb-3 text-center d-flex justify-content-center">
                                                            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif" id="exampleColorInput" value="{{$link->title_color_hex}}" title="Choose your color" name="title_color" style="height: 40px; border-radius: 0">
                                                        </div>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>
                                                        <div class="mb-3 text-center d-flex justify-content-center">
                                                            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif" id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 40px; border-radius: 0">
                                                        </div>
                                                    </div>


                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>
                                                    <div class="mb- text-center d-flex justify-content-center">
                                                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_shadow')</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" @if($link->shadow == 'shadow-none') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio1">none</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" @if($link->shadow == 'shadow-sm') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio2">sm</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow" @if($link->shadow == 'shadow') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio3">md</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" @if($link->shadow == 'shadow-lg') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio3">lg</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_round')</label>
                                                        <div class="mb-3 text-center d-flex justify-content-center">
                                                            <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="{{$link->rounded}}">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 text-center">
                                                        <div>
                                                            <select class="form-select @if($user->dayVsNight) bg-secondary @endif" aria-label="Default select example" name="animation" style="border-radius: 0">
                                                                <option selected>Выбрать анимацию...</option>
                                                                <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                                <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                                            </select>
                                                        </div>
                                                        <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                                                    </div>
                                                    <div class="mb-3 text-center">
                                                        <div class="form-check text-center">
                                                            <input @if($link->pinned == 1) checked @endif name="pinned" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Закрепите ссылку и она всегда будет вверху списка
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="grap-2 d-grid">
                                                    <button type="submit" class="btn btn-secondary" style="border-radius: 0">@lang('app.a_edit')</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @if($link->type == 'POST')
            <div class="modal fade" id="exampleModalPost{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog">
                <div class="modal-content text-center" style="background-color: #FBF6EA">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.a_edit_post')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @if($link->photos)
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>
                                <div class="">
                                    <div class="col-12">
                                        @foreach(unserialize($link->photos) as $photo)
                                            <img class="rounded-3 mt-2" src="{{$photo}}" style="width:50px;">
                                        @endforeach
                                    </div>
                                    <div class="col-12 mt-2">
                                        <form action="{{ route('delPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="type" value="POST">
                                            <button class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="modal-body">
                            <form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('PATCH')
                                <input type="hidden" value="POST" name="type"> <!-- Тип ссылки -->
                                <div class="mb-3"> <!-- Заголовок -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_title')</label>
                                    <input type="text" class="form-control" name="title" maxlength="100" value="{{$link->title}}">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_title_description')</span>
                                </div>
                                <div class="text-center row">
                                    <div class="col-9">
                                        <select id="empty-posts{{$link->id}}" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example" name="font_size">
                                            <option @if($link->font_size == 0.9) selected @endif value="0.9">1</option>
                                            <option @if($link->font_size == 1) selected @endif value="1">2</option>
                                            <option @if($link->font_size == 1.1) selected @endif value="1.1">3</option>
                                            <option @if($link->font_size == 1.2) selected @endif value="1.2">4</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>
                                <div class="mb-3"> <!-- Полный текст -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_text')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="full_text">{{$link->full_text}}</textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_free_text')</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на источник -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_link')</label>
                                    <input type="text" class="form-control" name="link" value="{{$link->link}}">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_description_link')</span>
                                </div>
                                <div class="mb-3"> <!-- Фотографии -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_photos')</label>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="photos[]" accept=".png, .jpg, .jpeg" multiple>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_photos_description')</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на видео -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_video')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="video">{{$link->video}}</textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_video_description')</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на любое медиа -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_media')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="media">{{$link->media}}</textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_media_description')</span>
                                </div>

                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;"@lang('app.p_title_color')</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор цвета на заголовок -->
                                    <input type="color" class="form-control" id="exampleColorInput" value="{{$link->title_color}}" title="Choose your color" name="title_color" style="height: 40px;"><br>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_title_color_def')</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_color')</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор цвета на фон -->
                                    <input type="color" class="form-control " id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 40px;">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_background_color_def')</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_transparency')</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор прозрачности фона -->
                                    <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_shadow')</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добавить тень -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" @if($link->shadow == 'shadow-none') checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">none</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" @if($link->shadow == 'shadow-sm') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">sm</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow" @if($link->shadow == 'shadow') checked @endif>
                                        <label class="form-check-label" for="inlineRadio3">md</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" @if($link->shadow == 'shadow-lg') checked @endif>
                                        <label class="form-check-label" for="inlineRadio3">lg</label>
                                    </div>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_round')</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="{{$link->rounded}}">
                                </div>
                                <div class="mb-3 text-center">
                                    <div>
                                        <select class="form-select" aria-label="Default select example" name="animation">
                                            <option selected>Выбрать анимацию...</option>
                                            <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                            <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                        </select>
                                    </div>
                                    <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                                </div>
                                <div class="mb-3 text-center">
                                    <div class="form-check text-center">
                                        <input @if($link->pinned == 1) checked @endif name="pinned" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Закрепите ссылку и она всегда будет вверху списка
                                        </label>
                                    </div>
                                </div>
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">@lang('app.p_edit_prof')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            @endif
            @endforeach
        </div>
        @foreach($links as $link)
            <script>
                new TomSelect('#select-beast-empty{{$link->id}}',{
                    valueField: 'img',
                    searchField: 'title',
                    options: [
                        @foreach($allIconsInsideFolder as $icon)
                            {id: {{$icon->getInode()}}, title: '{{$icon->getFilename()}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},
                        @endforeach
                    ],
                    render: {
                        option: function(data, escape) {
                            return  '<table>' +
                                    '<tr>' +
                                        '<img  width="90" src="' + escape(data.img) + '">' +
                                    '</tr>' +
                                '</table>';
                        },
                        item: function(data, escape) {
                            return  '<img style="margin-right: 16px" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                        }
                    }
                });
            </script>
            <script>
                new TomSelect('#empty-links{{$link->id}}',{
                    valueField: 'font',
                    searchField: 'title',
                    maxOptions: 100,
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
        @endforeach
    </body>
</html>







