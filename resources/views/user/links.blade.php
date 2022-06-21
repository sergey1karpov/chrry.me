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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js



        "></script>

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

        </style>

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="antialiased">

        <div class="container-fluid" style="padding: 0">
            <nav class="navbar navbar-expand-lg " style="background-color: #f1f2f2">
                <div class="container-fluid">
                    <a class="mb-1" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                        <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                    </a>
                    <form class="" action="{{ route('searchLink', ['id' => Auth::user()->id]) }}">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" name="search" style="height: 30px">
                    </form>
                    <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                        <div class="img" style="background-image: url({{$user->avatar}});"></div>
                    </a>
                </div>
            </nav>
        </div>

        <div class="container-fluid justify-content-center text-center">

            @auth

                {{-- <nav class="navbar navbar-expand-lg" style="height: 25px">
                    <div class="container-fluid" style="padding: 0">
                        <a class="navbar-brand" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                            <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid mb-4" style="width:20px; border: 0">
                        </a>
                    </div>
                </nav> --}}

            @endauth

            <div class="row" style="margin-top: px" >
                <div class="col-12 mb-" data-bs-toggle="modal" data-bs-target="#exampleModalLink" style="padding-right: 12px;">
					<div class="box-part text-center shadow-sm " style="margin: 0; background-color: #feae72">
                        {{-- <img src="https://i.ibb.co/74YMCMB/333.png" class="img-fluid mb-2" width="40px"> --}}
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: white">Изменение ссылок</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">Воспользовавшись этой функцией, вы придадите всем вашим ссылкам единый дизайн</span>
						</div>
					</div>
				</div>
            </div>

            <div class="modal fade" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLink" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
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
                                    <div class="mb-3 text-center d-flex justify-content-center">
                                        <input class="me-2 form-check-input" type="checkbox" value="false" id="flexCheckIndeterminate" name="withoutTransparency">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            Убрать прозрачность
                                        </label>
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

                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <table>
                <tbody>
                        @foreach($links as $link)
                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">зацеп
                        <div class="row card {{$link->rounded}} {{$link->shadow}}" style="background-color:{{$link->background_color}}{{$link->transparency}}; border: 0; margin-top: 12px; margin-left: 1px; margin-right: 1px">
                            <div class="d-flex align-items-center justify-content-start mt-2 mb-2" style="padding-left: 4px; padding-right: 4px;">
                                <div class="col-1">
                                    <img class="{{$link->rounded}}" src="{{$link->photo}}" style="width:50px;">
                                </div>
                                <div class=" col-10 text-center">
                                    <div class="me-4 ms-4">
                                        <h4 class="" style="font-family: 'Open Sans', sans-serif; line-height: 1.5; font-size: 1rem; color: {{$link->title_color}}">{{$link->title}}</h4>
                                    </div>
                                </div>
                                <div class="col-1">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0;">

                                <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;">
                                    <a href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">
                                        <button href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                            Статистика
                                        </button>
                                    </a>
                                </div>

                                <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}">
                                    <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                        Изменить
                                    </button>
                                </div>
                                <div class="col-4" style="background-color: #f0eeef; ">
                                    <form action="{{ route('delLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    @if($link->photo)
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">Текущее изображение</label><br>
                                            <div class="row d-flex align-items-center justify-content-center">
                                                <div class="col-4">
                                                    <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
                                                </div>
                                                <div class="col-8">
                                                    <form action="{{ route('delLinkPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <button class="btn btn-light">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="modal-body">
                                        <form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf @method('PATCH')
                                            <div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Заголовок</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" maxlength="150" value="{{$link->title}}">
                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать от 3 букв до 150 символов</span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Вставьте ссылку</label>
                                                    <input type="text" class="form-control" name="link" placeholder="http://..." value="{{$link->link}}">
                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Измените хорошую ссылку</span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Текущий цвет заголовка</label>
                                                    <div class="mb-3 text-center d-flex justify-content-center">
                                                        <input type="color" class="form-control " id="exampleColorInput" value="{{$link->title_color}}" title="Choose your color" name="title_color" style="height: 40px;">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Текущий фоновый цвет</label>
                                                    <div class="mb-3 text-center d-flex justify-content-center">
                                                        <input type="color" class="form-control " id="exampleColorInput" value="{{$link->background_color}}" title="Choose your color" name="background_color" style="height: 40px;">
                                                    </div>
                                                </div>

                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                                                <div class="mb- text-center d-flex justify-content-center">
                                                    <input type="range" class="form-range" min="19" max="99" step="10" id="customRange2" name="transparency" value="{{$link->transparency}}"><br>
                                                </div>
                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                    <input class="me-2 form-check-input" type="checkbox" value="false" id="flexCheckIndeterminate" name="withoutTransparency">
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Убрать прозрачность
                                                    </label>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень</label><br>
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
                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление углов блоков и фото</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rounded" id="inlineRadio1" value="rounded-0" @if($link->rounded == 'rounded-0') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio1">none</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rounded" id="inlineRadio2" value="rounded-1" @if($link->rounded == 'rounded-1') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">sm</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-2" @if($link->rounded == 'rounded-2') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio3">md</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-3" @if($link->rounded == 'rounded-3') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio3">lg</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
                                                    <input type="file" class="form-control" id="inputGroupFile02" name="photo">
                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png, gif формата, размерои до 3мб. Хотя можете обойтись и без изображения, но зачем если можно?</span>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Изменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}



        </div>

        <table class="table">
            <tbody>
                @foreach($links as $link)
                    <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                        <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                            <div class="container-fluid justify-content-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                <div class="col-12">
                                    <div class="row card {{$link->rounded}} {{$link->shadow}}" style="background-color:{{$link->background_color}}{{$link->transparency}}; border: 0; margin-top: 12px; margin-left: 1px; margin-right: 1px">
                                        <div class="d-flex align-items-center justify-content-start mt-2 mb-2" style="padding-left: 4px; padding-right: 4px;">
                                            <div class="col-1">
                                                <img id="hyi" class="{{$link->rounded}}" src="{{$link->photo}}" style="width:50px;">
                                            </div>
                                            <div class=" col-10 text-center">
                                                <div class="me-4 ms-4">
                                                    <h4 class="" style="font-family: 'Open Sans', sans-serif; line-height: 1.5; font-size: 1rem; color: {{$link->title_color}}">{{$link->title}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0;">

                                            <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;">
                                                <a href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">
                                                    <button href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                                        Статистика
                                                    </button>
                                                </a>
                                            </div>

                                            <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}">
                                                <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                                    Изменить
                                                </button>
                                            </div>
                                            <div class="col-4" style="background-color: #f0eeef; ">
                                                <form action="{{ route('delLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                                        Удалить
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                @if($link->photo)
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">Текущее изображение</label><br>
                                                        <div class="row d-flex align-items-center justify-content-center">
                                                            <div class="col-4">
                                                                <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
                                                            </div>
                                                            <div class="col-8">
                                                                <form action="{{ route('delLinkPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                    @csrf @method('PATCH')
                                                                    <button class="btn btn-light">Удалить</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="modal-body">
                                                    <form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf @method('PATCH')
                                                        <div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Заголовок</label>
                                                                <input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" maxlength="150" value="{{$link->title}}">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать от 3 букв до 150 символов</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Вставьте ссылку</label>
                                                                <input type="text" class="form-control" name="link" placeholder="http://..." value="{{$link->link}}">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Измените хорошую ссылку</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Текущий цвет заголовка</label>
                                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                                    <input type="color" class="form-control " id="exampleColorInput" value="{{$link->title_color}}" title="Choose your color" name="title_color" style="height: 40px;">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Текущий фоновый цвет</label>
                                                                <div class="mb-3 text-center d-flex justify-content-center">
                                                                    <input type="color" class="form-control " id="exampleColorInput" value="{{$link->background_color}}" title="Choose your color" name="background_color" style="height: 40px;">
                                                                </div>
                                                            </div>

                                                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                                                            <div class="mb- text-center d-flex justify-content-center">
                                                                <input type="range" class="form-range" min="19" max="99" step="10" id="customRange2" name="transparency" value="{{$link->transparency}}"><br>
                                                            </div>
                                                            <div class="mb-3 text-center d-flex justify-content-center">
                                                                <input class="me-2 form-check-input" type="checkbox" value="false" id="flexCheckIndeterminate" name="withoutTransparency">
                                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                                    Убрать прозрачность
                                                                </label>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень</label><br>
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
                                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление углов блоков и фото</label><br>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio1" value="rounded-0" @if($link->rounded == 'rounded-0') checked @endif>
                                                                    <label class="form-check-label" for="inlineRadio1">none</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio2" value="rounded-1" @if($link->rounded == 'rounded-1') checked @endif>
                                                                    <label class="form-check-label" for="inlineRadio2">sm</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-2" @if($link->rounded == 'rounded-2') checked @endif>
                                                                    <label class="form-check-label" for="inlineRadio3">md</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-3" @if($link->rounded == 'rounded-3') checked @endif>
                                                                    <label class="form-check-label" for="inlineRadio3">lg</label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
                                                                <input type="file" class="form-control" id="inputGroupFile02" name="photo">
                                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png, gif формата, размерои до 3мб. Хотя можете обойтись и без изображения, но зачем если можно?</span>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Изменить</button>
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
        @endforeach
    </body>
</html>








