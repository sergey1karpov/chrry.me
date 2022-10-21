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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

        {{-- Animation animate.style --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

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
			.box-part{
			    background:#fcfcf9;
			    border-radius:25;
			    padding:20px 10px;
			    margin:30px 0px;
			    -webkit-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);
				-moz-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);
				box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);
			}
			.text{
			    margin:20px 0px;
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
            .imgg {
			    width: 25px;
			    height: 25px;
			    /* border-radius: 50%; */
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

        <div class="container-fluid" style="padding: 0">
            <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                <div class="container-fluid">
                    <a class="mb-1" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
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

        <!-- Массовое изменение -->
        <div class="container-fluid justify-content-center text-center">
            <div class="row">
                <div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalLink" style="padding-right: 0; padding-left: 0">
					<div class="box-part text-center shadow-sm @if($user->dayVsNight) bg-secondary text-white-50 @endif" style="margin: 0; background-color: #feae72">
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: white">@lang('app.a_edit_links')</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">@lang('app.a_edit_links_descr')</span>
						</div>
					</div>
				</div>
            </div>
            <div class="modal fade bg-dark" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLink" aria-hidden="true">
                <div class="modal-dialog" style="margin: 0">
                    <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2; border-radius: 0">
                        <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.a_edit_links')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body @if($user->dayVsNight) bg-dark text-white-50 @endif">
                            <form action="{{ route('editAllLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('PATCH')
                                <div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_title')</label>
                                        <div class="mb-3 text-center d-flex justify-content-center">
                                            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="" title="Choose your color" name="title_color" style="height: 36px; border: 0">
                                        </div>
                                    </div>
                                    <div class="text-center row">
                                        <div class="col-9">
                                            <select id="mass-edit" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="font_size" style="height: 34px; border: 0">
                                                <option value="0.9">1</option>
                                                <option value="1">2</option>
                                                <option value="1.1">3</option>
                                                <option value="1.2">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_back_color')</label>
                                        <div class="mb-3 text-center d-flex justify-content-center">
                                            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="" title="Choose your color" name="background_color" style="height: 35px; border: 0">
                                        </div>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <div class="form-check form-switch text-center">
                                            <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">
                                            <label class="form-check-label" for="flexCheckDefault" style="font-family: 'Rubik', sans-serif;">
                                                Сделать текст ссылки жирным
                                            </label>
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>
                                    <div class="mb-3 text-center row">
                                        <div class="col-12">
                                            <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput"  title="Choose your color" name="text_shadow_color" style="height: 36px; border: 0"><br>
                                        </div>
                                        <div class="col-12">
                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Четкость тени</span>
                                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_blur" value="0">
                                        </div>
                                        <div class="col-12">
                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_bottom" value="0">
                                        </div>
                                        <div class="col-12">
                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг вправо</span>
                                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="0">
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_trans')</label>
                                    <div class="mb- text-center d-flex justify-content-between">
                                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency">
                                    </div>
                                    <div class="mb-3 mt-2 text-center">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" style="border: 0">
                                                        <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" style="border: 0">
                                                        <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" style="border: 0">
                                                        <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" style="border: 0">
                                                        <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_round')</label><br>
                                        <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded">
                                    </div>
                                    <div class="grap-2 d-grid">
                                        <button type="submit" class="btn btn-secondary" style="border: 0">Изменить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ЗАКРЕПЛЕННЫЕ  ссылки -->
        <table class="table" style="margin-bottom: 0">
            <tbody>
                @foreach($pinnedLinks as $link)
                    <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                        <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                            <div class="ms-2 me-2 justify-content-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                <div class="col-12">
                                    <div class="row card ms-1 me-1 {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center;">
                                        <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px">
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
                                                        <img src="{{$link->icon}}" style="width:50px;">
                                                    @elseif($link->icon == false)
                                                        <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class=" col-10 text-center">
                                                <div class="me-5 ms-5">
                                                    <h4 class="" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div id="up" class="imgg" style="background-image: url(https://cdn-icons-png.flaticon.com/512/238/238081.png);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0; margin-right: 30px; margin-left: 30px">
                                        <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black; border-bottom-left-radius: 5px;">
                                            <a href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">
                                                <button href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                                    @lang('app.s_stats')
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalPost{{$link->id}}" @elseif($link->type != 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}" @endif>
                                            <button class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                                @lang('app.a_edit')
                                            </button>
                                        </div>
                                        <div class="col-4" style="background-color: #f1f2f2; border-bottom-right-radius: 5px;">
                                            <form action="{{ route('delLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                                    @lang('app.a_del')
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="margin: 0">
                                            <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2; border-radius: 0">
                                                <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                                    <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div id="pin-icon-alert{{$link->id}}" style="display: none;" class="ms-2 me-2 mt-2">
                                                    <div class="alert alert-dark" role="alert">
                                                        Иконка удалена
                                                    </div>
                                                </div>

                                                @if($link->icon == false)
                                                    @if($link->photo)
                                                        <div class="mb-3" id="photo-block{{$link->id}}">
                                                            <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>
                                                            <div class="row d-flex align-items-center justify-content-center">
                                                                <div class="col-12">
                                                                    <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <form action="{{ route('delPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                        @csrf @method('PATCH')
                                                                        <input type="hidden" id="photoId{{$link->id}}" value="{{$link->id}}">
                                                                        <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">
                                                                        <input type="hidden" id="isPhoto{{$link->id}}" value="{{$link->photo}}">
                                                                        <button id="delete-pin-photo{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @elseif($link->icon)
                                                    <div id="icon-block{{$link->id}}" class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_icon')</label><br>
                                                        <div class="row d-flex align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <img class="rounded-3" src="{{$link->icon}}" style="width:50px;">
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <form action="{{ route('delLinkIcon', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                    @csrf @method('PATCH')
                                                                    <input type="hidden" id="linkId{{$link->id}}" value="{{$link->id}}">
                                                                    <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">
                                                                    <input type="hidden" id="isIcon{{$link->id}}" value="{{$link->icon}}">
                                                                    <button id="delete-pin-icon{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="modal-body @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                                                    <form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf @method('PATCH')
                                                        <div>
                                                            <input type="hidden" name="type" value="LINK"> <!-- Тип ссылки -->
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_title')</label>
                                                                <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="title" placeholder="" maxlength="100" value="{{$link->title}}" style="border: 0">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>
                                                            </div>
                                                            <div class="text-center row">
                                                                <div class="col-9">
                                                                    <select id="pinned-links{{$link->id}}" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="font_size" style="height: 35px; border: 0">
                                                                        <option @if($link->font_size == 0.9) selected @endif value="0.9">1</option>
                                                                        <option @if($link->font_size == 1) selected @endif value="1">2</option>
                                                                        <option @if($link->font_size == 1.1) selected @endif value="1.1">3</option>
                                                                        <option @if($link->font_size == 1.2) selected @endif value="1.2">4</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <label class="mb-3 mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>
                                                                <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="link" placeholder="http://..." value="{{$link->link}}" style="border: 0">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.a_edit_link')</span>
                                                            </div>

                                                            <div class="mb-3 text-center">
                                                                <div class="form-check form-switch text-center">
                                                                    <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" @if($link->bold == true) checked @endif style="border: 0">
                                                                    <label class="form-check-label" for="flexCheckDefault" style="font-family: 'Rubik', sans-serif;">
                                                                        Сделать текст ссылки жирным
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>
                                                            <div class="mb-3 text-center row">
                                                                <div class="col-12">
                                                                    <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput" value="{{$link->text_shadow_color}}" title="Choose your color" name="text_shadow_color" style="height: 35px; border: 0"><br>
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
                                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг вправо</span>
                                                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="{{$link->text_shadow_right}}">
                                                                </div>
                                                            </div>

                                                            <div id="icon-block{{$link->id}}">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_icon')</label>
                                                                <div class="mb-3">
                                                                    <select id="select-beast-empty{{$link->id}}" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon"></select>
                                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_icon_description')</span>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3" id="upload-icon{{$link->id}}">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>
                                                                <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile02" name="photo" style="border: 0">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_photo_description')</span>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>
                                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->title_color_hex}}" title="Choose your color" name="title_color" style="height: 35px; border: 0">
                                                                </div>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>
                                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 35px; border: 0">
                                                                </div>
                                                            </div>


                                                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>
                                                            <div class="mb- text-center d-flex justify-content-between">
                                                                <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">
                                                            </div>

                                                            <div class="mb-3 mt-2 text-center">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" @if($link->shadow == 'shadow-none') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" @if($link->shadow == 'shadow-sm') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" @if($link->shadow == 'shadow') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" @if($link->shadow == 'shadow-lg') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                                    <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="animation" style="border: 0">
                                                                        <option >Выбрать анимацию...</option>
                                                                        <option class="animate__animated animate__pulse animate__infinite infinite" @if($link->animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                                        <option class="animate__animated animate__headShake animate__infinite infinite" @if($link->animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                                                    </select>
                                                                </div>
                                                                <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                                                            </div>
                                                            <div class="mb-3 text-center">
                                                                <div class="form-check form-switch text-center">
                                                                    <input @if($link->pinned == 1) checked @endif name="pinned" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Закрепите ссылку и она всегда будет вверху списка
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="d-grid grap-2">
                                                                <button type="submit" class="btn btn-secondary" style="border: 0">@lang('app.a_edit')</button>
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
                @endforeach
            </tbody>
        </table>

        <!-- Ссылки -->
        <table class="table">
            <tbody>
                @foreach($links as $link)
                    <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                        <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                            <div class="ms-2 me-2 justify-content-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                <div class="col-12">
                                    <div class="row card ms-1 me-1 {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center;">
                                        <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px">
                                            <div class="col-1">
                                                @if($link->icon)
                                                    <img src="{{$link->icon}}" style="width:50px;">
                                                @elseif($link->icon == false)
                                                    <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                @endif
                                            </div>
                                            <div class=" col-10 text-center">
                                                <div class="me-5 ms-5">
                                                    <h4 class="" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0; margin-right: 30px; margin-left: 30px">
                                        <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black; border-bottom-left-radius: 5px;">
                                            <a href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">
                                                <button href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                                    @lang('app.s_stats')
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalPost{{$link->id}}" @elseif($link->type != 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}" @endif>
                                            <button class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                                @lang('app.a_edit')
                                            </button>
                                        </div>
                                        <div class="col-4" style="background-color: #f1f2f2; border-bottom-right-radius: 5px;">
                                            <form action="{{ route('delLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                                    @lang('app.a_del')
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="margin: 0">
                                            <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2; border-radius: 0">
                                                <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                                    <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div id="pin-icon-alert{{$link->id}}" style="display: none;" class="ms-2 me-2 mt-2">
                                                    <div class="alert alert-dark" role="alert">
                                                        Иконка удалена
                                                    </div>
                                                </div>

                                                @if($link->icon == false)
                                                    @if($link->photo)
                                                        <div class="mb-3" id="photo-block{{$link->id}}">
                                                            <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>
                                                            <div class="row d-flex align-items-center justify-content-center">
                                                                <div class="col-12">
                                                                    <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <form action="{{ route('delPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                        @csrf @method('PATCH')
                                                                        <input type="hidden" id="photoId{{$link->id}}" value="{{$link->id}}">
                                                                        <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">
                                                                        <input type="hidden" id="isPhoto{{$link->id}}" value="{{$link->photo}}">
                                                                        <button id="delete-pin-photo{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @elseif($link->icon)
                                                    <div id="icon-block{{$link->id}}" class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_icon')</label><br>
                                                        <div class="row d-flex align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <img class="rounded-3" src="{{$link->icon}}" style="width:50px;">
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <form action="{{ route('delLinkIcon', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                    @csrf @method('PATCH')
                                                                    <input type="hidden" id="linkId{{$link->id}}" value="{{$link->id}}">
                                                                    <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">
                                                                    <input type="hidden" id="isIcon{{$link->id}}" value="{{$link->icon}}">
                                                                    <button id="delete-pin-icon{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="modal-body @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
                                                    <form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf @method('PATCH')
                                                        <div>
                                                            <input type="hidden" name="type" value="LINK"> <!-- Тип ссылки -->
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_title')</label>
                                                                <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="title" placeholder="Моя красивая ссылка" maxlength="100" value="{{$link->title}}" style="border: 0">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>
                                                            </div>
                                                            <div class="text-center row">
                                                                <div class="col-9">
                                                                    <select id="empty-links{{$link->id}}" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="font_size" style="border: 0; height: 35px">
                                                                        <option @if($link->font_size == 0.9) selected @endif value="0.9">1</option>
                                                                        <option @if($link->font_size == 1) selected @endif value="1">2</option>
                                                                        <option @if($link->font_size == 1.1) selected @endif value="1.1">3</option>
                                                                        <option @if($link->font_size == 1.2) selected @endif value="1.2">4</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <label class="mb-3 mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>
                                                                <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="link" placeholder="http://..." value="{{$link->link}}" style="border: 0">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.a_edit_link')</span>
                                                            </div>

                                                            <div class="mb-3 text-center">
                                                                <div class="form-check form-switch text-center">
                                                                    <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" @if($link->bold == true) checked @endif style="border: 0">
                                                                    <label class="form-check-label" for="flexCheckDefault" style="font-family: 'Rubik', sans-serif;">
                                                                        Сделать текст ссылки жирным
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>
                                                            <div class="mb-3 text-center row">
                                                                <div class="col-12">
                                                                    <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput" value="{{$link->text_shadow_color}}" title="Choose your color" name="text_shadow_color" style="height: 35px; border: 0"><br>
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

                                                            <div id="icon-block{{$link->id}}">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_icon')</label>
                                                                <div class="mb-3">
                                                                    <select id="select-beast-empty{{$link->id}}" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon"></select>
                                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_icon_description')</span>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3" id="upload-icon{{$link->id}}">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>
                                                                <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile02" name="photo" style="border: 0">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_photo_description')</span>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>
                                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->title_color_hex}}" title="Choose your color" name="title_color" style="height: 35px; border: 0">
                                                                </div>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>
                                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 35px; border: 0">
                                                                </div>
                                                            </div>


                                                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>
                                                            <div class="mb- text-center d-flex justify-content-center">
                                                                <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">
                                                            </div>

                                                            <div class="mb-3 mt-2 text-center">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" @if($link->shadow == 'shadow-none') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" @if($link->shadow == 'shadow-sm') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" @if($link->shadow == 'shadow') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" @if($link->shadow == 'shadow-lg') checked @endif style="border: 0">
                                                                                <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                                    <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="animation" style="border: 0">
                                                                        <option >Выбрать анимацию...</option>
                                                                        <option @if($link->animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                                        <option @if($link->animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                                                    </select>
                                                                </div>
                                                                <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                                                            </div>
                                                            <div class="mb-3 text-center">
                                                                <div class="form-check form-switch text-center">
                                                                    <input name="pinned" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Закрепите ссылку и она всегда будет вверху списка
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="grap-2 d-grid">
                                                                <button type="submit" class="btn btn-secondary" style="border: 0">@lang('app.a_edit')</button>
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
                @endforeach
            </tbody>
        </table>

        @foreach($links as $link)
            <!-- Удалить иконку или фотку у закрепки -->
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var isPhoto = $("#isPhoto{{$link->id}}").val();
                if(isPhoto) {
                    $("#icon-block{{$link->id}}").hide();
                    $(document).ready(function () {
                        $("body").on("click","#delete-pin-photo{{$link->id}}", function(e){
                            e.preventDefault();

                            var id = $("#userId{{$link->id}}").val();
                            var link = $("#photoId{{$link->id}}").val();
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: "/"+id+"/add-link/"+link+"/delete-photo",
                                type: 'PATCH',
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (){
                                    $("#photo-block{{$link->id}}").hide();
                                    $("#icon-block{{$link->id}}").show();
                                    setTimeout(function() { $("#pin-icon-alert{{$link->id}}").show('show'); }, 1000);

                                    setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);
                                },
                            });
                        });
                    });
                }

                var isIcon = $("#isIcon{{$link->id}}").val();
                if(isIcon) {
                    $("#upload-icon{{$link->id}}").hide();
                    $(document).ready(function () {
                        $("body").on("click","#delete-pin-icon{{$link->id}}", function(e){
                            e.preventDefault();

                            var id = $("#userId{{$link->id}}").val();
                            var link = $("#linkId{{$link->id}}").val();
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: "/"+id+"/add-link/"+link+"/delete-icon",
                                type: 'PATCH',
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (){
                                    $("#icon-block{{$link->id}}").hide();
                                    $("#upload-icon{{$link->id}}").show();
                                    $("#pin-icon-alert{{$link->id}}").show();

                                    setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);
                                },
                            });
                        });
                    });
                }
            </script>
            <script type="text/javascript">
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

                $(document).ready(function () {
                    $('table tbody').sortable({
                        // delay:2000,
                        handle:'#up',
                        update: function (event, ui) {
                            $(this).children().each(function (index) {
                                    if ($(this).attr('data-position') != (index+1)) {
                                        $(this).attr('data-position', (index+1)).addClass('updated');
                                    }
                            });

                            saveNewPositions();
                        }
                    });
                });

                function saveNewPositions() {
                    var userId = {{$user->id}};
                    var positions = [];
                    $('.updated').each(function () {
                        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                        $(this).removeClass('updated');
                    });

                    $.ajax({
                        url: "ppp/sort",
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            update: 1,
                            positions: positions
                        }, success: function (response) {
                                console.log(response);
                        }
                    });
                }
            </script>

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
                                            '<img style="background-color: #DCDCDC" width="90" src="' + escape(data.img) + '">' +
                                        '</tr>' +
                                    '</table>';
                        },
                        item: function(data, escape) {
                            return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                        }
                    }
                });
            </script>
        @endforeach

        {{-- Закрепленные ссылки и посты--}}
        @foreach($pinnedLinks as $link)
            <!-- Удалить иконку или фотку у закрепки -->
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var isPhoto = $("#isPhoto{{$link->id}}").val();
                if(isPhoto) {
                    $("#icon-block{{$link->id}}").hide();
                    $(document).ready(function () {
                        $("body").on("click","#delete-pin-photo{{$link->id}}", function(e){
                            e.preventDefault();

                            var id = $("#userId{{$link->id}}").val();
                            var link = $("#photoId{{$link->id}}").val();
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: "/"+id+"/add-link/"+link+"/delete-photo",
                                type: 'PATCH',
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (){
                                    $("#photo-block{{$link->id}}").hide();
                                    $("#icon-block{{$link->id}}").show();
                                    setTimeout(function() { $("#pin-icon-alert{{$link->id}}").show('show'); }, 1000);

                                    setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);
                                },
                            });
                        });
                    });
                }

                var isIcon = $("#isIcon{{$link->id}}").val();
                if(isIcon) {
                    $("#upload-icon{{$link->id}}").hide();
                    $(document).ready(function () {
                        $("body").on("click","#delete-pin-icon{{$link->id}}", function(e){
                            e.preventDefault();

                            var id = $("#userId{{$link->id}}").val();
                            var link = $("#linkId{{$link->id}}").val();
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: "/"+id+"/add-link/"+link+"/delete-icon",
                                type: 'PATCH',
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (){
                                    $("#icon-block{{$link->id}}").hide();
                                    $("#upload-icon{{$link->id}}").show();
                                    $("#pin-icon-alert{{$link->id}}").show();

                                    setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);
                                },
                            });
                        });
                    });
                }
            </script>

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
                                            '<img style="background-color: #DCDCDC" width="90" src="' + escape(data.img) + '">' +
                                        '</tr>' +
                                    '</table>';
                        },
                        item: function(data, escape) {
                            return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                        }
                    }
                });
            </script>
            <script>
                new TomSelect('#pinned-links{{$link->id}}',{
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
        @endforeach
        @foreach($links as $link)
            <script>
                new TomSelect('#empty-links{{$link->id}}',{
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
        @endforeach
        <script>
            new TomSelect('#mass-edit',{
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
    </body>
</html>








