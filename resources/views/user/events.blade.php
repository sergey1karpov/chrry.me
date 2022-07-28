<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
			.box{
			    padding:60px 0px;
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
			.box-part2{
			    background:#fcfcf9;
			    border-radius:25;
			    margin:8px 0px 0px 0px;
			    -webkit-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);
				-moz-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);
				box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);
			}
			.text{
			    margin:20px 0px;
			}

			.fa{
			     color:#4183D7;
			}
			.rounded-circle{
				width:80px;
				height:80px;
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
    </head>
    <body class="antialiased">

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
            <nav class="navbar navbar-expand-lg " style="background-color: #f1f2f2">
                <div class="container-fluid">
                    <a class="mb-1" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                        <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                    </a>
                    <form class="" action="{{ route('searchLink', ['id' => Auth::user()->id]) }}">
                        <input class="form-control me-2" type="search" placeholder="Поиск ссылок" aria-label="Search" name="search" style="height: 30px">
                    </form>
                    <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                        <div class="img" style="background-image: url({{$user->avatar}});"></div>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Массовое изменение -->
        <div class="container-fluid justify-content-center text-center">
            <div class="row" style="margin-top: px" >
                <div class="col-12 mt-" data-bs-toggle="modal" data-bs-target="#exampleModalLink" style="padding-right: 0; padding-left: 0">
					<div class="box-part text-center shadow-sm " style="margin: 0; background-color: #feae72">
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: white">Изменить все мероприятия</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">Изменить стиль всех мероприятий</span>
						</div>
					</div>
				</div>
            </div>
            <div class="modal fade" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLink" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить все мероприятия</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('editAllEvent', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('PATCH')
                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для города и локации</label>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <select class="form-select" aria-label="Default select example" name="location_font">
                                            <option value="Inter">Выбрать шрифт...</option>
                                            <option style="font-family: Russo One" value="Russo One">Russo One Font</option>
                                            <option style="font-family: Poiret One" value="Poiret One">Poiret One Font</option>
                                            <option style="font-family: Noto Sans" value="Noto Sans">Noto Sans Font</option>
                                            <option style="font-family: Montserrat" value="Montserrat">Montserrat Font</option>
                                            <option style="font-family: Open Sans" value="Open Sans">Open Sans Font</option>
                                            <option style="font-family: Roboto" value="Roboto">Roboto Font</option>
                                            <option style="font-family: JetBrains Mono" value="JetBrains Mono">JetBrains Mono Font</option>
                                            <option style="font-family: Spectral SC" value="Spectral SC">Spectral SC Font</option>
                                            <option style="font-family: Podkova" value="Podkova">Podkova Font</option>
                                            <option style="font-family: Noto Sans Mono" value="Noto Sans Mono">Noto Sans Mono Font</option>
                                            <option style="font-family: DotGothic16" value="DotGothic16">DotGothic16 Font</option>
                                            <option style="font-family: Alumni Sans" value="Alumni Sans">Alumni Sans Font</option>
                                            <option style="font-family: Murecho" value="Murecho">Murecho Font</option>
                                            <option style="font-family: Comforter" value="Comforter">Comforter Font</option>
                                            <option style="font-family: Zen Kurenaido" value="Zen Kurenaido">Zen Kurenaido Font</option>
                                            <option style="font-family: Yuji Syuku" value="Yuji Syuku">Yuji Syuku Font</option>
                                            <option style="font-family: Yomogi" value="Yomogi">Yomogi Font</option>
                                            <option style="font-family: Rampart One" value="Rampart One">Rampart One Font</option>
                                            <option style="font-family: Oi" value="Oi">Oi Font</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example" name="location_font_size">
                                            <option value="0.9">1</option>
                                            <option value="1">2</option>
                                            <option value="1.1">3</option>
                                            <option value="1.2">4</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="color" class="form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="location_font_color" style="height: 40px;"><br>
                                    </div>
                                </div>

                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для даты и времени</label>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <select class="form-select" aria-label="Default select example" name="date_font">
                                            <option value="Inter">Выбрать шрифт...</option>
                                            <option style="font-family: Russo One" value="Russo One">Russo One Font</option>
                                            <option style="font-family: Poiret One" value="Poiret One">Poiret One Font</option>
                                            <option style="font-family: Noto Sans" value="Noto Sans">Noto Sans Font</option>
                                            <option style="font-family: Montserrat" value="Montserrat">Montserrat Font</option>
                                            <option style="font-family: Open Sans" value="Open Sans">Open Sans Font</option>
                                            <option style="font-family: Roboto" value="Roboto">Roboto Font</option>
                                            <option style="font-family: JetBrains Mono" value="JetBrains Mono">JetBrains Mono Font</option>
                                            <option style="font-family: Spectral SC" value="Spectral SC">Spectral SC Font</option>
                                            <option style="font-family: Podkova" value="Podkova">Podkova Font</option>
                                            <option style="font-family: Noto Sans Mono" value="Noto Sans Mono">Noto Sans Mono Font</option>
                                            <option style="font-family: DotGothic16" value="DotGothic16">DotGothic16 Font</option>
                                            <option style="font-family: Alumni Sans" value="Alumni Sans">Alumni Sans Font</option>
                                            <option style="font-family: Murecho" value="Murecho">Murecho Font</option>
                                            <option style="font-family: Comforter" value="Comforter">Comforter Font</option>
                                            <option style="font-family: Zen Kurenaido" value="Zen Kurenaido">Zen Kurenaido Font</option>
                                            <option style="font-family: Yuji Syuku" value="Yuji Syuku">Yuji Syuku Font</option>
                                            <option style="font-family: Yomogi" value="Yomogi">Yomogi Font</option>
                                            <option style="font-family: Rampart One" value="Rampart One">Rampart One Font</option>
                                            <option style="font-family: Oi" value="Oi">Oi Font</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example" name="date_font_size">
                                            <option value="0.9">1</option>
                                            <option value="1">2</option>
                                            <option value="1.1">3</option>
                                            <option value="1.2">4</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="color" class="form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="date_font_color" style="height: 40px;"><br>
                                    </div>
                                </div>

                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Выбор фонового цвета и прозрачности</label>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <input type="color" class="form-control " id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color_hex" style="height: 40px;">
                                    </div>
                                    <div class="col-9">
                                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                                    </div>
                                </div>

                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_round')</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="event_round" value="25">
                                </div>

                                <div class="d-grid gap-2">
                                    <button id="post-btn" type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="mt-3">
            @foreach($events as $event)
                <div class="container mt-1">
                    <div class="col-lg-12 allalbums">
                        <ul class="list-group list-group-flush">
                            <li class="{{$event->event_animation}} list-group-item list-group-item-action text-center" style="background-color: rgba({{$event->background_color_rgba}}, {{$event->transparency}}); border-radius: {{$event->event_round}}px;">
                                <div class="row text-center">
                                    <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                                        <a href="#" style="color: black; text-decoration: none">
                                            <p style="font-family: '{{$event->location_font}}', sans-serif; text-transform: uppercase; font-size: {{$event->location_font_size}}em; padding: 0; margin: 0; color: {{$event->location_font_color}}"><b>{{$event->city}}, {{$event->location}}</b></p>
                                            <p style="font-family: '{{$event->date_font}}', sans-serif; font-size: {{$event->date_font_size}}rem; margin-bottom: 0; color: {{$event->date_font_color}};">{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}{{' @'.$event->time}}</p>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between rounded-bottom rounded-3">
                                        <div class="col-6 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" data-bs-toggle="modal" data-bs-target="#eventModal{{$event->id}}">
                                            <button class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                                Изменить
                                            </button>
                                        </div>
                                        <div class="col-6" style="background-color: #f1f2f2; ">
                                            <form action="{{ route('deleteEvent', ['id' => $user->id, 'event' => $event->id]) }}" method="POST"> @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm" style="background-color: #f1f2f2; border: 0;">Delete</button>
                                            </form>
                                        </div>
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
                                <h5 class="modal-title" id="exampleModalLabel">Изменить мероприятие</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            @if($event->banner)
                                <div class="mb-3 text-center">
                                    <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <img class="rounded-3" src="{{$event->banner}}" style="width:250px;">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <form action="{{ route('deleteBanner', ['id' => Auth::user()->id, 'event' => $event->id]) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="type" value="LINK">
                                                <button class="btn btn-sm btn-danger mt-2">@lang('app.a_now_del')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="modal-body text-center">
                                <form action="{{ route('editEvent', ['id' => $user->id, 'event' => $event->id]) }}" method="post" enctype="multipart/form-data" id="add-post">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="type" value="EVENT"> <!-- Тип ссылки -->
                                    <div class="mb-3"> <!-- Город -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Город проведения</label>
                                        <input class="form-control" name="city" id="city" placeholder="Москва" value="{{$event->city}}" style="background-color: #9bd77e">
                                    </div>
                                    <div class="mb-3"> <!-- Локация -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Место проведения</label>
                                        <input class="form-control" name="location" id="full_text" placeholder="Название места проведения мероприятия" value="{{$event->location}}" style="background-color: #9bd77e">
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 255 символов</span>
                                    </div>
                                    <div class="mb-3"> <!-- Дата и время -->
                                        <div class="row">
                                            <div class="col-7">
                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Дата</label>
                                                <input id="startDate" name="date" class="form-control" type="date" value="{{$event->date}}" style="background-color: #9bd77e"/>
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Время</label>
                                                <input type="text" class="form-control" name="time" id="timepicker{{$event->date}}" maxlength="255" value="{{$event->time}}" style="background-color: #9bd77e">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3"> <!-- Описание события -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Описание</label>
                                        <textarea class="form-control"  rows="3" name="description" id="full_text">{{$event->description}}</textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 2500 символов</span>
                                    </div>
                                    <div class="mb-3"> <!-- Баннер события -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Афиша</label>
                                        <input type="file" class="form-control" id="inputGroupFile022" name="banner" value="{{$event->banner}}" accept=".png, .jpg, .jpeg" style="background-color: #9bd77e">
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>
                                    </div>
                                    <div class="mb-3"> <!-- Покупка билетов -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на продажу билетов</label>
                                        <input class="form-control" name="tickets" id="full_text" placeholder="" value="{{$event->tickets}}">
                                    </div>
                                    <div class="mb-3"> <!-- Ссылка на видео -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_video')</label>
                                        <textarea class="form-control"  rows="2" name="video" id="video">{{$event->video}}</textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_video_description')</span>
                                    </div>
                                    <div class="mb-4"> <!-- Ссылка на любое медиа -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_media')</label>
                                        <textarea class="form-control"  rows="2" name="media" id="media">{{$event->media}}</textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_media_description')</span>
                                    </div>

                                    <hr>
                                        <label for="exampleInputEmail1" class="form-label mt-2 mb-2" style="font-family: 'Rubik', sans-serif;">Дизайн</label>
                                    <hr>

                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для города и локации</label>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <select class="form-select" aria-label="Default select example" name="location_font">
                                                <option @if($event->location_font == 'Inter') selected @endif value="Inter">Выбрать шрифт...</option>
                                                <option @if($event->location_font == 'Russo One') selected @endif style="font-family: Russo One" value="Russo One">Russo One Font</option>
                                                <option @if($event->location_font == 'Poiret One') selected @endif style="font-family: Poiret One" value="Poiret One">Poiret One Font</option>
                                                <option @if($event->location_font == 'Noto Sans') selected @endif style="font-family: Noto Sans" value="Noto Sans">Noto Sans Font</option>
                                                <option @if($event->location_font == 'Montserrat') selected @endif style="font-family: Montserrat" value="Montserrat">Montserrat Font</option>
                                                <option @if($event->location_font == 'Open Sans') selected @endif style="font-family: Open Sans" value="Open Sans">Open Sans Font</option>
                                                <option @if($event->location_font == 'Roboto') selected @endif style="font-family: Roboto" value="Roboto">Roboto Font</option>
                                                <option @if($event->location_font == 'JetBrains Mono') selected @endif style="font-family: JetBrains Mono" value="JetBrains Mono">JetBrains Mono Font</option>
                                                <option @if($event->location_font == 'Spectral SC') selected @endif style="font-family: Spectral SC" value="Spectral SC">Spectral SC Font</option>
                                                <option @if($event->location_font == 'Podkova') selected @endif style="font-family: Podkova" value="Podkova">Podkova Font</option>
                                                <option @if($event->location_font == 'Noto Sans Mono') selected @endif style="font-family: Noto Sans Mono" value="Noto Sans Mono">Noto Sans Mono Font</option>
                                                <option @if($event->location_font == 'DotGothic16') selected @endif style="font-family: DotGothic16" value="DotGothic16">DotGothic16 Font</option>
                                                <option @if($event->location_font == 'Alumni Sans') selected @endif style="font-family: Alumni Sans" value="Alumni Sans">Alumni Sans Font</option>
                                                <option @if($event->location_font == 'Murecho') selected @endif style="font-family: Murecho" value="Murecho">Murecho Font</option>
                                                <option @if($event->location_font == 'Comforter') selected @endif style="font-family: Comforter" value="Comforter">Comforter Font</option>
                                                <option @if($event->location_font == 'Zen Kurenaido') selected @endif style="font-family: Zen Kurenaido" value="Zen Kurenaido">Zen Kurenaido Font</option>
                                                <option @if($event->location_font == 'Yuji Syuku') selected @endif style="font-family: Yuji Syuku" value="Yuji Syuku">Yuji Syuku Font</option>
                                                <option @if($event->location_font == 'Yomogi') selected @endif style="font-family: Yomogi" value="Yomogi">Yomogi Font</option>
                                                <option @if($event->location_font == 'Rampart One') selected @endif style="font-family: Rampart One" value="Rampart One">Rampart One Font</option>
                                                <option @if($event->location_font == 'Oi') selected @endif style="font-family: Oi" value="Oi">Oi Font</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-select" aria-label="Default select example" name="location_font_size">
                                                <option @if($event->location_font_size == 0.9) selected @endif value="0.9">1</option>
                                                <option @if($event->location_font_size == 1) selected @endif value="1">2</option>
                                                <option @if($event->location_font_size == 1.1) selected @endif value="1.1">3</option>
                                                <option @if($event->location_font_size == 1.2) selected @endif value="1.2">4</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <input type="color" class="form-control" id="exampleColorInput" title="Choose your color" value="{{$event->location_font_color}}" name="location_font_color" style="height: 40px;"><br>
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для даты и времени</label>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <select class="form-select" aria-label="Default select example" name="date_font">
                                                <option @if($event->date_font == 'Inter') selected @endif value="Inter">Выбрать шрифт...</option>
                                                <option @if($event->date_font == 'Russo One') selected @endif style="font-family: Russo One" value="Russo One">Russo One Font</option>
                                                <option @if($event->date_font == 'Poiret One') selected @endif style="font-family: Poiret One" value="Poiret One">Poiret One Font</option>
                                                <option @if($event->date_font == 'Noto Sans') selected @endif style="font-family: Noto Sans" value="Noto Sans">Noto Sans Font</option>
                                                <option @if($event->date_font == 'Montserrat') selected @endif style="font-family: Montserrat" value="Montserrat">Montserrat Font</option>
                                                <option @if($event->date_font == 'Open Sans') selected @endif style="font-family: Open Sans" value="Open Sans">Open Sans Font</option>
                                                <option @if($event->date_font == 'Roboto') selected @endif style="font-family: Roboto" value="Roboto">Roboto Font</option>
                                                <option @if($event->date_font == 'JetBrains Mono') selected @endif style="font-family: JetBrains Mono" value="JetBrains Mono">JetBrains Mono Font</option>
                                                <option @if($event->date_font == 'Spectral SC') selected @endif style="font-family: Spectral SC" value="Spectral SC">Spectral SC Font</option>
                                                <option @if($event->date_font == 'Podkova') selected @endif style="font-family: Podkova" value="Podkova">Podkova Font</option>
                                                <option @if($event->date_font == 'Noto Sans Mono') selected @endif style="font-family: Noto Sans Mono" value="Noto Sans Mono">Noto Sans Mono Font</option>
                                                <option @if($event->date_font == 'DotGothic16') selected @endif style="font-family: DotGothic16" value="DotGothic16">DotGothic16 Font</option>
                                                <option @if($event->date_font == 'Alumni Sans') selected @endif style="font-family: Alumni Sans" value="Alumni Sans">Alumni Sans Font</option>
                                                <option @if($event->date_font == 'Murecho') selected @endif style="font-family: Murecho" value="Murecho">Murecho Font</option>
                                                <option @if($event->date_font == 'Comforter') selected @endif style="font-family: Comforter" value="Comforter">Comforter Font</option>
                                                <option @if($event->date_font == 'Zen Kurenaido') selected @endif style="font-family: Zen Kurenaido" value="Zen Kurenaido">Zen Kurenaido Font</option>
                                                <option @if($event->date_font == 'Yuji Syuku') selected @endif style="font-family: Yuji Syuku" value="Yuji Syuku">Yuji Syuku Font</option>
                                                <option @if($event->date_font == 'Yomogi') selected @endif style="font-family: Yomogi" value="Yomogi">Yomogi Font</option>
                                                <option @if($event->date_font == 'Rampart One') selected @endif style="font-family: Rampart One" value="Rampart One">Rampart One Font</option>
                                                <option @if($event->date_font == 'Oi') selected @endif style="font-family: Oi" value="Oi">Oi Font</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-select" aria-label="Default select example" name="date_font_size">
                                                <option @if($event->date_font_size == 0.9) selected @endif value="0.9">1</option>
                                                <option @if($event->date_font_size == 1) selected @endif value="1">2</option>
                                                <option @if($event->date_font_size == 1.1) selected @endif value="1.1">3</option>
                                                <option @if($event->date_font_size == 1.2) selected @endif value="1.2">4</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <input type="color" class="form-control" id="exampleColorInput" value="{{$event->date_font_color}}" title="Choose your color" name="date_font_color" style="height: 40px;"><br>
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Выбор фонового цвета и прозрачности</label>
                                    <div class="row mb-3">
                                        <div class="col-3">
                                            <input type="color" class="form-control " id="exampleColorInput" value="{{$event->background_color_hex}}" title="Choose your color" name="background_color_hex" style="height: 40px;">
                                        </div>
                                        <div class="col-9">
                                            <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" value="{{$event->transparency}}" name="transparency" value="1.0">
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_round')</label>
                                    <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                                        <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" value="{{$event->event_round}}" name="event_round" value="25">
                                    </div>

                                    <div class="mb-3 text-center">
                                        <div>
                                            <select class="form-select" aria-label="Default select example" name="event_animation">
                                                <option selected>Выбрать анимацию...</option>
                                                <option @if($event->event_animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                <option @if($event->event_animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                            </select>
                                        </div>
                                        <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Анимация для мероприятия</label>
                                    </div>
                                    
                                    
                                    <div class="d-grid gap-2">
                                        <button id="post-btn" type="submit" class="btn btn-primary">Изменить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @foreach($events as $event)
            <script>
                $('#timepicker{{$event->date}}').timepicker({
                    uiLibrary: 'bootstrap5'
                });
            </script>
        @endforeach
    </body>
</html>








