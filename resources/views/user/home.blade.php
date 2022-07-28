<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $user->name }}</title>
        {{-- Animation animate.style --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

        {{-- Bootstrap 5 --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        {{-- Icon verification --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        {{-- Google fonts --}}
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">

        <script src="//cdn.jsdelivr.net/clipboard.js/latest/clipboard.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-embed-styles />

        <style type="text/css">
        	@if($user->banner)
	        	body {
			        background: url({{ $user->banner }}) no-repeat center center fixed;
			        background-size: cover;
				}
			@elseif($user->banner == null & $user->background_color != null)
				body {
					background-color: {{$user->background_color}};
				}
			@endif
			.img {
			    width: 100px;
			    height: 100px;
			    border-radius: 50%;
			    margin-right: 0;
			    background-position: center center;
			    -wekit-background-size: cover;
			    background-size: cover;
			    background-repeat: no-repeat;
			}
            .img-small {
			    width: 40px;
			    height: 40px;
			    border-radius: 50%;
			    margin-right: 0;
			    background-position: center center;
			    -wekit-background-size: cover;
			    background-size: cover;
			    background-repeat: no-repeat;
			}
            @font-face {
                font-family: Oi; /* Имя шрифта */
                src: url({{asset('public/fonts/Oi-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Rampart One; /* Имя шрифта */
                src: url({{asset('public/fonts/RampartOne-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Yomogi; /* Имя шрифта */
                src: url({{asset('public/fonts/Yomogi-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Yuji Syuku; /* Имя шрифта */
                src: url({{asset('public/fonts/YujiSyuku-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Zen Kurenaido; /* Имя шрифта */
                src: url({{asset('public/fonts/ZenKurenaido-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Comforter; /* Имя шрифта */
                src: url({{asset('public/fonts/Comforter-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Murecho; /* Имя шрифта */
                src: url({{asset('public/fonts/Murecho-VariableFont_wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Train One; /* Имя шрифта */
                src: url({{asset('public/fonts/TrainOne-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Alumni Sans; /* Имя шрифта */
                src: url({{asset('public/fonts/AlumniSans-VariableFont_wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: DotGothic16; /* Имя шрифта */
                src: url({{asset('public/fonts/DotGothic16-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Noto Sans Mono; /* Имя шрифта */
                src: url({{asset('public/fonts/NotoSansMono-VariableFont_wdth,wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Podkova; /* Имя шрифта */
                src: url({{asset('public/fonts/Podkova-VariableFont_wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Spectral SC; /* Имя шрифта */
                src: url({{asset('public/fonts/SpectralSC-ExtraLight.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: JetBrains Mono; /* Имя шрифта */
                src: url({{asset('public/fonts/JetBrainsMono-VariableFont_wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Roboto; /* Имя шрифта */
                src: url({{asset('public/fonts/Roboto-Light.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Open Sans; /* Имя шрифта */
                src: url({{asset('public/fonts/OpenSans-VariableFont_wdth,wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Montserrat; /* Имя шрифта */
                src: url({{asset('public/fonts/Montserrat-VariableFont_wght.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Noto Sans; /* Имя шрифта */
                src: url({{asset('public/fonts/NotoSans-Light.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Russo One; /* Имя шрифта */
                src: url({{asset('public/fonts/RussoOne-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Poiret One; /* Имя шрифта */
                src: url({{asset('public/fonts/PoiretOne-Regular.ttf')}}); /* Путь к файлу со шрифтом */
            }
        </style>

        @foreach($links as $link)
            <script type="text/javascript">

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function countRabbits{{$link->id}}() {

                    let guest = '{{$_SERVER['REMOTE_ADDR']}}';
                    let linkId = '{{$link->id}}';
                    let userId = '{{$user->id}}';

                    $.ajax({
                        url: userId+"/link",
                        type: 'POST',
                        data: { user_id: userId, link_id: linkId, guest_ip: guest, func: 'func_data' },
                        success: function(data){
                            console.log('GOOD');
                        },
                        error: function(){
                            console.log('ERROR');
                        }
                    })
                }
            </script>
        @endforeach

        @foreach($pinnedLinks as $link)
            <script type="text/javascript">

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function countRabbits{{$link->id}}() {

                    let guest = '{{$_SERVER['REMOTE_ADDR']}}';
                    let linkId = '{{$link->id}}';
                    let userId = '{{$user->id}}';

                    $.ajax({
                        url: userId+"/link",
                        type: 'POST',
                        data: { user_id: userId, link_id: linkId, guest_ip: guest, func: 'func_data' },
                        success: function(data){
                            console.log('GOOD');
                        },
                        error: function(){
                            console.log('ERROR');
                        }
                    })
                }
            </script>
        @endforeach

        @foreach($links as $link)
            <script>
                $(document).ready(function(){
                    var url = document.location.href;

                    if (url == 'http://chrry.me/{{$user->slug}}#post-{{$link->id}}') {
                        $("#post-{{$link->id}}").modal('show');
                    }
                });
            </script>
        @endforeach

        @foreach($pinnedLinks as $link)
            <script>
                $(document).ready(function(){
                    var url = document.location.href;

                    if (url == 'http://chrry.me/{{$user->slug}}#post-{{$link->id}}') {
                        $("#post-{{$link->id}}").modal('show');
                    }
                });
            </script>
        @endforeach

    </head>
    <body class="antialiased">

        <!-- Стрелка обратно в меню -->
    	@auth
            @if(Auth::user()->id == $user->id)
                <nav class="navbar navbar-expand-lg fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                            <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid mb-4" style="width:20px">
                        </a>
                    </div>
                </nav>
            @endif
        @endauth

        <!-- Карточка юзера -->
        <div class="container-fluid justify-content-center text-center">
	        <div class="d-flex justify-content-center text-center">
		      	<div class="text-center" style="margin-top: 25px">
			        <div class="d-flex justify-content-center">
                        <div class="img" style="background-image: url({{$user->avatar}});"></div>
                    </div>
			        <h2 class="mt-4" style="font-family: 'Manrope', sans-serif; font-size: 1.2rem; @if($user->name_color) color: {{$user->name_color}}; @endif ">
			        	{{ $user->name }}
			        	@if($user->verify == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->verify_color}}">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
			        	@endif
			        </h2>
			        @if($user->description)
			        	<p style="font-family: 'Manrope', sans-serif; font-size: 0.9rem; @if($user->description_color) color: {{$user->description_color}}; @endif">{{ $user->description }}</p>
			        @endif
                    @if($user->type == 'Events') 
                        @if($user->show_social == true)
                            @if($user->social == 'TOP')
                                @if(count($links) > 0)
                                    <nav class="navbar mt-2">
                                        <div class="container-fluid d-flex justify-content-center">
                                            @foreach($links as $link)
                                                @if($link->icon)
                                                    <img src="{{$link->icon}}" class="me-2 ms-2" style="width:40px;">
                                                @endif
                                            @endforeach
                                        </div>
                                    </nav>  
                                @endif
                            @endif    
                        @endif 
                    @endif       
		      	</div>
	    	</div>
	    </div>
        @if($user->type == 'Links')
            <!-- Закрепленные ссылки -->
            <table class="table" style="margin-bottom: 0">
                <tbody>
                    @foreach($pinnedLinks as $link)
                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                            <div class="container @if($link->animation) {{$link->animation}} @endif" style="padding-left:8px; padding-right:8px" @if($link->type == 'POST') id="post{{$link->id}}" data-bs-toggle="modal" data-bs-target="#post-{{$link->id}}" @endif>
                                <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->
                                @if($link->type != 'POST')<a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">@elseif($link->type == 'POST') <a style="text-decoration:none" onclick="countRabbits{{$link->id}}()"> @endif
                                    <div class="row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">
                                        <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
                                            <!-- Картинка -->
                                            <div class="col-1">
                                                @if($link->type == 'POST')
                                                    @if($link->photos)
                                                        @foreach(unserialize($link->photos) as $key => $photo)
                                                            @if($key == 0)
                                                                <img src="{{$photo}}" style="width:48px; border-radius: {{$link->rounded}}px;">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @elseif($link->type != 'POST')
                                                    @if($link->icon)
                                                        <img src="{{$link->icon}}" style="width:48px; border-radius: {{$link->rounded}}px;">
                                                    @elseif($link->icon == false)
                                                        <img src="{{$link->photo}}" style="width:48px; border-radius: {{$link->rounded}}px;">
                                                    @endif
                                                @endif
                                            </div>
                                            <!-- Текст ссылки -->
                                            <div class=" col-10 text-center">
                                                <div class="me-5 ms-5">

                                                    <h4 class="" style="font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">{{$link->title}}</h4>
                                                </div>
                                            </div>
                                            <!-- Пустой div -->
                                            <div class="col-1">
                                                @if(Auth::check())
                                                    @if(Auth::user()->id == $user->id)
                                                        <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">
                                                            <img src="https://cdn3.iconfinder.com/data/icons/office-outline-15/64/Office_Icon_Set_Outline-10-512.png" width="20">
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @if($link->type != 'POST')</a>@endif
                            </div>

                            <!-- Ссылка типа POST -->
                            @if($link->type == 'POST')
                                <div class="modal fade" id="post-{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="margin: 0">
                                        <div id="body{{$link->id}}" class="modal-content bg-light text-dark" style="border-radius: 0; border: 0;">
                                            <!-- Шапка -->
                                            <div class="modal-header p-1" style="border: 0;">
                                                <div class="col-1 d-flex justify-content-start">
                                                    <button id="back{{$link->id}}" style="border: 0; background-color: white; padding-left:4px; padding-right:4px" type="button" data-bs-dismiss="modal" aria-label="Close" class="mt-1 rounded-circle">
                                                        <img src="https://i.ibb.co/4NmvBx3/images-modified.png" class="img-fluid" style="width:20px; margin-bottom: 3px">
                                                    </button>
                                                </div>
                                                <div class="col-10 d-flex justify-content-center mt-2">
                                                    <div class="form-check form-switch">
                                                        <input id="theme{{$link->id}}" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        {{-- <label class="form-check-label" for="flexSwitchCheckDefault">Сменить тему</label> --}}
                                                    </div>
                                                </div>
                                                <div class="col-1 d-flex justify-content-end">
                                                    <button data-bs-toggle="modal" data-bs-target="#btn{{$link->id}}" style="border: 0; background-color: white; padding-left:4px; padding-right:4px" type="button" data-bs-dismiss="modal" aria-label="Close" class="mt-1 rounded-circle">
                                                        <img src="https://icon-library.com/images/three-dots-icon/three-dots-icon-26.jpg" class="img-fluid" style="width:20px; margin-bottom: 3px">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="ms-2 me-2 mb-2 mt-3">
                                                <h5 style="font-family: 'Jost', serif; font-size: 2.4rem; line-height: 1;" class="modal-title" id="exampleModalLabel">{{$link->title}}</h5>
                                                <div class="row mt-4">
                                                    <div class="col-8 d-flex align-items-start">
                                                        <h5 style="font-family: 'Jost', sans-serif; font-size: 1rem; line-height: 1;" class="modal-title" id="exampleModalLabel">
                                                            {{$user->name}}
                                                            @if($user->verify == 1)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->verify_color}}">
                                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                                </svg>
                                                            @endif
                                                        </h5>
                                                    </div>
                                                    <div class="col-4 d-flex justify-content-end align-items-end" style="margin-bottom: 3px">
                                                        <h5 data-bs-toggle="modal" data-bs-target="#data{{$link->id}}" style=" font-size: 0.8rem; line-height: 1;" class="modal-title" id="exampleModalLabel; color: #292828">{{Carbon\Carbon::parse($link->created_at)->diffForHumans()}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body" style="padding: 0;>

                                                <!-- Фотки -->
                                                @if($link->photos)
                                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner" >
                                                        @if($link->photos)
                                                            @foreach(unserialize($link->photos) as $key => $photo)
                                                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                    <img src="{{$photo}}" alt="Los Angeles" class="img-fluid d-block w-100">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    @if($link->photos)
                                                        @php
                                                            $photos = [];
                                                            foreach(unserialize($link->photos) as $photo) {
                                                                $photos[] = $photo;
                                                            }
                                                        @endphp
                                                    @endif
                                                    @if($link->photos)
                                                        @if(count($photos) > 1)
                                                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon"></span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon"></span>
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>

                                                <!-- Если фоток нет, то видео -->
                                                @if(!$link->photos)
                                                    @if($link->video)
                                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                                            <x-embed url="{{$link->video}}" aspect-ratio="4:3" />
                                                        </div>
                                                    @endif
                                                @endif

                                                <!-- Текст -->
                                                @if($link->full_text)
                                                    <div class="me-2 ms-2 mb-4" style="white-space: pre-line; line-height: 1.2;">
                                                        {{$link->full_text}}
                                                    </div>
                                                @endif

                                                <!-- Видео если есть фотки -->
                                                @if($link->photos)
                                                    @if($link->video)
                                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                                            <x-embed url="{{$link->video}}" aspect-ratio="4:3" />
                                                        </div>
                                                    @endif
                                                @endif

                                                <!-- Медиа -->
                                                @if($link->media)
                                                    <div class="">
                                                        {!!$link->media!!}
                                                    </div>
                                                @endif



                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Модалка для меню поста -->
                                <div class="modal fade" id="btn{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Jost', sans-serif; font-size: 1.3rem;">Копировать ссылку на пост</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <input class="mt-3" id="foo{{$link->id}}" value="http://chrry.me/{{$user->slug}}#post-{{$link->id}}">

                                                <!-- Trigger -->
                                                <button class="mb-3 post-btn{{$link->id}}" data-clipboard-target="#foo{{$link->id}}" style="border: 0; background-color: white">
                                                    <img class="mb-1" src="http://cdn.onlinewebfonts.com/svg/img_55411.png" alt="Copy to clipboard" width="20">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>


    	    <!-- Ссылки -->
            <table class="table">
                <tbody>
                    @foreach($links as $link)
                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                            <div class="container @if($link->animation) {{$link->animation}} @endif" style="padding-left:8px; padding-right:8px" @if($link->type == 'POST') id="post{{$link->id}}" data-bs-toggle="modal" data-bs-target="#post-{{$link->id}}" @endif>
                                <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->
                                @if($link->type != 'POST')<a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">@elseif($link->type == 'POST') <a style="text-decoration:none" onclick="countRabbits{{$link->id}}()"> @endif
                                    <div class="row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">
                                        <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
                                            <!-- Картинка -->
                                            <div class="col-1">
                                                @if($link->type == 'POST')
                                                    @if($link->photos)
                                                        @foreach(unserialize($link->photos) as $key => $photo)
                                                            @if($key == 0)
                                                                <img src="{{$photo}}" style="width:48px; border-radius: {{$link->rounded}}px;">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @elseif($link->type != 'POST')
                                                    @if($link->icon)
                                                        <img src="{{$link->icon}}" style="width:48px; border-radius: {{$link->rounded}}px;">
                                                    @elseif($link->icon == false)
                                                        <img src="{{$link->photo}}" style="width:48px; border-radius: {{$link->rounded}}px;">
                                                    @endif
                                                @endif
                                            </div>
                                            <!-- Текст ссылки -->
                                            <div class=" col-10 text-center">
                                                <div class="me-5 ms-5">
                                                    <h4 class="" style="font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">{{$link->title}}</h4>
                                                </div>
                                            </div>
                                            <!-- Пустой div -->
                                            <div class="col-1">
                                                @if(Auth::check())
                                                    @if(Auth::user()->id == $user->id)
                                                        <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">
                                                            <img src="https://i.ibb.co/VLbJkrG/dots.png" width="20">
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @if($link->type != 'POST')</a>@endif
                            </div>

                            <!-- Ссылка типа POST -->
                            @if($link->type == 'POST')
                                <div class="modal fade" id="post-{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="margin: 0;">
                                        <div id="body{{$link->id}}" class="modal-content bg-light text-dark" style="border-radius: 0; border: 0;">
                                            <!-- Шапка -->
                                            <div class="modal-header p-1" style="border: 0;">
                                                <div class="col-1 d-flex justify-content-start">
                                                    <button id="back{{$link->id}}" style="border: 0; background-color: white; padding-left:4px; padding-right:4px" type="button" data-bs-dismiss="modal" aria-label="Close" class="mt-1 rounded-circle">
                                                        <img src="https://i.ibb.co/4NmvBx3/images-modified.png" class="img-fluid" style="width:20px; margin-bottom: 3px">
                                                    </button>
                                                </div>
                                                <div class="col-10 d-flex justify-content-center mt-1">
                                                    <div class="form-check form-switch">
                                                        <input id="theme{{$link->id}}" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        {{-- <label class="form-check-label" for="flexSwitchCheckDefault">Сменить тему</label> --}}
                                                    </div>
                                                </div>
                                                <div class="col-1 d-flex justify-content-end">
                                                    <button data-bs-toggle="modal" data-bs-target="#btn{{$link->id}}" style="border: 0; background-color: white; padding-left:4px; padding-right:4px" type="button" data-bs-dismiss="modal" aria-label="Close" class="mt-1 rounded-circle">
                                                        <img src="https://icon-library.com/images/three-dots-icon/three-dots-icon-26.jpg" class="img-fluid" style="width:20px; margin-bottom: 3px">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="ms-2 me-2 mb-2 mt-3">
                                                <h5 style="font-family: 'Jost', serif; font-size: 2.4rem; line-height: 1;" class="modal-title" id="exampleModalLabel">{{$link->title}}</h5>
                                                <div class="row mt-4">
                                                    <div class="col-8 d-flex align-items-start">
                                                        <h5 style="font-family: 'Jost', sans-serif; font-size: 1rem; line-height: 1;" class="modal-title" id="exampleModalLabel">
                                                            {{$user->name}}
                                                            @if($user->verify == 1)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-patch-check-fill " viewBox="0 0 16 16" style="color: {{$user->verify_color}}; margin-top: px">
                                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                                </svg>
                                                            @endif
                                                        </h5>
                                                    </div>
                                                    <div class="col-4 d-flex justify-content-end align-items-end" style="margin-top: 3px">
                                                        <h5 data-bs-toggle="modal" data-bs-target="#data{{$link->id}}" style=" font-size: 0.8rem; line-height: 1;" class="modal-title" id="exampleModalLabel; color: #292828">{{Carbon\Carbon::parse($link->created_at)->diffForHumans()}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body" style="padding: 0;">

                                                <!-- Фотки -->
                                                @if($link->photos)
                                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner" >
                                                        @if($link->photos)
                                                            @foreach(unserialize($link->photos) as $key => $photo)
                                                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                    <img id="{{$link->id}}{{$key}}" src="{{$photo}}" alt="Los Angeles" class="img-fluid d-block w-100">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    @if($link->photos)
                                                        @php
                                                            $photos = [];
                                                            foreach(unserialize($link->photos) as $photo) {
                                                                $photos[] = $photo;
                                                            }
                                                        @endphp
                                                    @endif
                                                    @if($link->photos)
                                                        @if(count($photos) > 1)
                                                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon"></span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon"></span>
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>

                                                <!-- Если фоток нет, то видео -->
                                                @if(!$link->photos)
                                                    @if($link->video)
                                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                                            <x-embed url="{{$link->video}}" aspect-ratio="4:3" />
                                                        </div>
                                                    @endif
                                                @endif

                                                <!-- Текст -->
                                                @if($link->full_text)
                                                    <div class="me-2 ms-2 mb-4" style="white-space: pre-line; line-height: 1.2;">
                                                        {{$link->full_text}}
                                                    </div>
                                                @endif

                                                <!-- Видео если есть фотки -->
                                                @if($link->photos)
                                                    @if($link->video)
                                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                                            <x-embed url="{{$link->video}}" aspect-ratio="4:3" />
                                                        </div>
                                                    @endif
                                                @endif

                                                <!-- Медиа -->
                                                @if($link->media)
                                                    <div class="">
                                                        {!!$link->media!!}
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Модалка для меню поста -->
                                <div class="modal fade" id="btn{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Jost', sans-serif; font-size: 1.3rem;">Копировать ссылку на пост</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <input class="mt-3" id="foo{{$link->id}}" value="http://chrry.me/{{$user->slug}}#post-{{$link->id}}">

                                                <!-- Trigger -->
                                                <button class="mb-3 post-btn{{$link->id}}" data-clipboard-target="#foo{{$link->id}}" style="border: 0; background-color: white">
                                                    <img class="mb-1" src="http://cdn.onlinewebfonts.com/svg/img_55411.png" alt="Copy to clipboard" width="20">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @elseif($user->type == 'Events')
            <div class="mt-3">
                @foreach($events as $event)
                    <div class="container mt-2" data-bs-toggle="modal" data-bs-target="#eventModal{{$event->id}}">
                        <div class="col-lg-12 allalbums">
                            <ul class="list-group list-group-flush">
                                <li class="{{$event->event_animation}} list-group-item list-group-item-action text-center" style="background-color: rgba({{$event->background_color_rgba}}, {{$event->transparency}}); border-radius: {{$event->event_round}}px;">
                                    <div class="row text-center">
                                        <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                                            <a href="#" style="color: black; text-decoration: none">
                                                <p style="font-family: '{{$event->location_font}}', sans-serif; text-transform: uppercase; font-size: {{$event->location_font_size}}em; padding: 0; margin: 0; color: {{$event->location_font_color}}">{{$event->city}}, {{$event->location}}</p>
                                                <p style="font-family: '{{$event->date_font}}', sans-serif; font-size: {{$event->date_font_size}}rem; margin-bottom: 0; color: {{$event->date_font_color}};">{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}{{' @'.$event->time}}</p>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal fade" id="eventModal{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$event->city}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="padding: 0">
                                    <img src="{{$event->banner}}" class="img-fluid">
                                    <p class="mt-2 ms-2" style="font-size: 1.3em; padding: 0; margin: 0"><b>{{$event->city}}, {{$event->location}}</b></p>
                                    <p class="ms-2 mb-3" style="font-size: 1rem; margin-bottom: 0;"><b>{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}{{' @'.$event->time}}</b></p>

                                    @if($event->description)
                                        <p class="ms-2 mb-2 me-2" style="font-size: 1rem; margin-bottom: 0; white-space: pre-line; line-height: 1.2;">{{$event->description}}</p>
                                    @endif

                                    <!-- Видео если есть фотки -->
                                    @if($event->video)
                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                            <x-embed url="{{$event->video}}" aspect-ratio="4:3" />
                                        </div>
                                    @endif

                                    <!-- Медиа -->
                                    @if($event->media)
                                        <div class="">
                                            {!!$event->media!!}
                                        </div>
                                    @endif

                                    <div style="background-color: #E45545;" class="text-center">
                                        <a href="{{$event->tickets}}" style="text-decoration: none">
                                            <h5 class="ms-2 pt-3 pb-3" style="margin-bottom: 0; color: white">Купить билет</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
            @if($user->type == 'Events') 
                @if($user->show_social == true)
                    @if($user->social == 'DOWN')
                        @if(count($links) > 0)
                            <nav class="navbar mt-2">
                                <div class="container-fluid d-flex justify-content-center">
                                    @foreach($links as $link)
                                        @if($link->icon)
                                            <img src="{{$link->icon}}" class="me-2 ms-2" style="width:40px;">
                                        @endif
                                    @endforeach
                                </div>
                            </nav>  
                        @endif
                    @endif    
                @endif
            @endif    
        @endif    
        {{-- <div class="mt-5 mb-3 text-center ">
            <img src="https://i.ibb.co/LnHC78h/2.png" class="img-fluid" width="100">
        </div> --}}

    </body>
    @foreach($links as $link)
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#theme{{$link->id}}").click(function() {
                    var themeColor = $(this).is(':checked');
                    if(themeColor == true) {
                        $("#body{{$link->id}}").addClass('bg-dark').addClass('text-white-50').removeClass('bg-light').removeClass('text-dark');
                    } else {
                        $("#body{{$link->id}}").addClass('bg-light').addClass('text-dark').removeClass('bg-dark').removeClass('text-white-50');
                    }
                });
            });
        </script>
    @endforeach

    @foreach($pinnedLinks as $link)
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#theme{{$link->id}}").click(function() {
                    var themeColor = $(this).is(':checked');
                    if(themeColor == true) {
                        $("#body{{$link->id}}").addClass('bg-dark').addClass('text-white-50').removeClass('bg-light').removeClass('text-dark');
                    } else {
                        $("#body{{$link->id}}").addClass('bg-light').addClass('text-dark').removeClass('bg-dark').removeClass('text-white-50');
                    }
                });
            });
        </script>
    @endforeach

    @foreach($links as $link)
        <script type="text/javascript">
            var clipboard = new Clipboard('.post-btn{{$link->id}}');
            clipboard.on('success', function(e) {
                console.info('Действие:', e.action);
                console.info('Текст:', e.text);
                console.info('Триггер:', e.trigger);
                e.clearSelection();
            });
            clipboard.on('error', function(e) {
                console.error('Действие:', e.action);
                console.error('Триггер:', e.trigger);
            });
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
                        url: userId + "/ppp/sort",
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
    @endforeach

    @foreach($pinnedLinks as $link)
        <script type="text/javascript">
            var clipboard = new Clipboard('.post-btn{{$link->id}}');
            clipboard.on('success', function(e) {
                console.info('Действие:', e.action);
                console.info('Текст:', e.text);
                console.info('Триггер:', e.trigger);
                e.clearSelection();
            });
            clipboard.on('error', function(e) {
                console.error('Действие:', e.action);
                console.error('Триггер:', e.trigger);
            });
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
                        url: userId + "/ppp/sort",
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
    @endforeach

</html>








