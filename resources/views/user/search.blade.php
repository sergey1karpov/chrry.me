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

        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

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

        </style>

        <meta name="csrf-token" content="{{ csrf_token() }}">
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

        @auth
            <div class="container-fluid" style="padding: 0">
                <nav class="navbar navbar-expand-lg " style="background-color: #f1f2f2">
                    <div class="container-fluid">
                        <a class="mb-1" href="{{ route('allLinks', ['id' => Auth::user()->id]) }}">
                            <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                        </a>
                        <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                            <div class="img" style="background-image: url({{$user->avatar}});"></div>
                        </a>
                    </div>
                </nav>
            </div>
        @endauth

        <div class="container-fluid justify-content-center text-center" style="padding-left: 0; padding-right: 0">



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
                                            <h4 class="" style="font-family: 'Open Sans', sans-serif; line-height: 1.5; font-size: 1rem; color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">{{$link->title}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);"></div>
                                    </div>
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
                                <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalPost{{$link->id}}" @elseif($link->type != 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}" @endif>
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
                            <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        @if($link->icon == false)
                                            @if($link->photo)
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">Текущее изображение</label><br>
                                                    <div class="row d-flex align-items-center justify-content-center">
                                                        <div class="col-12">
                                                            <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <form action="{{ route('delLinkPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                                @csrf @method('PATCH')
                                                                <button class="btn btn-sm btn-danger">Удалить</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($link->icon)
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">Текущая иконка</label><br>
                                                <div class="row d-flex align-items-center justify-content-center">
                                                    <div class="col-12">
                                                        <img class="rounded-3" src="{{$link->icon}}" style="width:50px;">
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <form action="{{ route('delLinkIcon', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-sm btn-danger">Удалить</button>
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
                                                        <input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" maxlength="50" value="{{$link->title}}">
                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать до 50 символов</span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Вставьте ссылку</label>
                                                        <input type="text" class="form-control" name="link" placeholder="http://..." value="{{$link->link}}">
                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Измените хорошую ссылку</span>
                                                    </div>

                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Иконка</label>
                                                    <div class="mb-3">
                                                        <select id="select-beast-empty{{$link->id}}" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon">
                                                            <option value="">None</option>
                                                            <option value="4">telegram</option>
                                                            <option value="1">vkontakte</option>
                                                            <option value="3">facebook</option>
                                                            <option value="5">viber</option>
                                                            <option value="6">wechat</option>
                                                            <option value="7">instagram</option>
                                                            <option value="8">odnoclasniki</option>
                                                            <option value="9">averro</option>
                                                        </select>
                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать иконку из нашей базы для своей ссылки</span>
                                                    </div>
                                                    @if($link->icon == false)
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
                                                            <input type="file" class="form-control" id="inputGroupFile02" name="photo">
                                                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если иконка вам не подходит, загрузите своё изображение. Мы принимаем картинки jpeg, jpg, png, gif формата.</span>
                                                        </div>
                                                    @endif

                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Текущий цвет заголовка</label>
                                                        <div class="mb-3 text-center d-flex justify-content-center">
                                                            <input type="color" class="form-control " id="exampleColorInput" value="{{$link->title_color_hex}}" title="Choose your color" name="title_color" style="height: 40px;">
                                                        </div>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Текущий фоновый цвет</label>
                                                        <div class="mb-3 text-center d-flex justify-content-center">
                                                            <input type="color" class="form-control " id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 40px;">
                                                        </div>
                                                    </div>


                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                                                    <div class="mb- text-center d-flex justify-content-center">
                                                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">
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
                                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление углов карточки и фото</label>
                                                        <div class="mb-3 text-center d-flex justify-content-center">
                                                            <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="{{$link->rounded}}">
                                                        </div>
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
            @if($link->type == 'POST')
            <div class="modal fade" id="exampleModalPost{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog">
                <div class="modal-content text-center" style="background-color: #FBF6EA">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Редактировать пост</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @if($link->photos)
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">Текущее изображение</label><br>
                                <div class="">
                                    <div class="col-12">
                                        @foreach(unserialize($link->photos) as $photo)
                                            <img class="rounded-3 mt-2" src="{{$photo}}" style="width:50px;">
                                        @endforeach
                                    </div>
                                    <div class="col-12 mt-2">
                                        <form action="{{ route('delPostPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="btn btn-sm btn-danger">Открепить изображения</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="modal-body">
                            <form action="{{ route('editPost', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('PATCH')
                                <input type="hidden" value="POST" name="type"> <!-- Тип ссылки -->
                                <div class="mb-3"> <!-- Заголовок -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Заголовок</label>
                                    <input type="text" class="form-control" name="title" maxlength="50" value="{{$link->title}}">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать до 50 символов</span>
                                </div>
                                <div class="mb-3"> <!-- Полный текст -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="full_text">{{$link->full_text}}</textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Свободный текст</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на источник -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Ссылка</label>
                                    <input type="text" class="form-control" name="link" value="{{$link->link}}">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если есть ссылка на внешний ресурс, вставьте её сюда</span>
                                </div>
                                <div class="mb-3"> <!-- Фотографии -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="photos[]" accept=".png, .jpg, .jpeg" multiple>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата. Вы можете загрузить до 10 изображений</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на видео -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Ссылка на видео</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="video">{{$link->video}}</textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если хотите прикрепить видео, вставьте сюда ссылку на youtube, vimeo или что то другое...</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на любое медиа -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Ссылка на медиа</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="media">{{$link->media}}</textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Поле для кода. Сюда можно вставить код для плейлиста ВК, Яндекса и много чего</span>
                                </div>

                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор цвета на заголовок -->
                                    <input type="color" class="form-control" id="exampleColorInput" value="{{$link->title_color}}" title="Choose your color" name="title_color" style="height: 40px;"><br>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Черный по умолчанию</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Фоновый цвет</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор цвета на фон -->
                                    <input type="color" class="form-control " id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 40px;">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Белый по умолчанию</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор прозрачности фона -->
                                    <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень для ссылки</label>
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
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление углов карточки и фото</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="{{$link->rounded}}">
                                </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Изменить пост</button>
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
                        {id: 1, title: 'Без иконки', img: ''},
                        {id: 2, title: 'Behance', img: '{{ asset('public/images/social/Behance.png') }}'},
                        {id: 3, title: 'Facebook', img: '{{ asset('public/images/social/Facebook.png') }}'},
                        {id: 4, title: 'Instagram',  img: '{{ asset('public/images/social/Instagram.png') }}'},
                        {id: 5, title: 'LinkedIn',  img: '{{ asset('public/images/social/LinkedIn.png') }}'},
                        {id: 6, title: 'Ok',  img: '{{ asset('public/images/social/Ok.png') }}'},
                        {id: 7, title: 'Pinterest',  img: '{{ asset('public/images/social/Pinterest.png') }}'},
                        {id: 8, title: 'Skype',  img: '{{ asset('public/images/social/Skype.png') }}'},
                        {id: 9, title: 'Snapchat',  img: '{{ asset('public/images/social/Snapchat.png') }}'},
                        {id: 10, title: 'SoundCloud', img: '{{ asset('public/images/social/SoundCloud.png') }}'},
                        {id: 11, title: 'Spotify', img: '{{ asset('public/images/social/Spotify.png') }}'},
                        {id: 12, title: 'Telegram',  img: '{{ asset('public/images/social/Telegram.png') }}'},
                        {id: 13, title: 'TikTok',  img: '{{ asset('public/images/social/TikTok.png') }}'},
                        {id: 14, title: 'Tumblr',  img: '{{ asset('public/images/social/Tumblr.png') }}'},
                        {id: 15, title: 'Twitch',  img: '{{ asset('public/images/social/Twitch.png') }}'},
                        {id: 16, title: 'Twitter',  img: '{{ asset('public/images/social/Twitter.png') }}'},
                        {id: 17, title: 'Viber',  img: '{{ asset('public/images/social/Viber.png') }}'},
                        {id: 18, title: 'Vimeo',  img: '{{ asset('public/images/social/Vimeo.png') }}'},
                        {id: 19, title: 'VK', img: '{{ asset('public/images/social/VK.png') }}'},
                        {id: 20, title: 'WeChat', img: '{{ asset('public/images/social/WeChat.png') }}'},
                        {id: 21, title: 'WhatsApp',  img: '{{ asset('public/images/social/WhatsApp.png') }}'},
                        {id: 22, title: 'YouTube',  img: '{{ asset('public/images/social/YouTube.png') }}'},

                        {id: 23, title: 'Behance Black', img: '{{ asset('public/images/social/Behance_black.png') }}'},
                        {id: 24, title: 'Facebook Black', img: '{{ asset('public/images/social/Facebook_black.png') }}'},
                        {id: 25, title: 'Instagram Black',  img: '{{ asset('public/images/social/Instagram_black.png') }}'},
                        {id: 26, title: 'LinkedIn Black',  img: '{{ asset('public/images/social/LinkedIn_black.png') }}'},
                        {id: 27, title: 'Ok Black',  img: '{{ asset('public/images/social/Ok_black.png') }}'},
                        {id: 28, title: 'Pinterest Black',  img: '{{ asset('public/images/social/Pinterest_black.png') }}'},
                        {id: 29, title: 'Skype Black',  img: '{{ asset('public/images/social/Skype_black.png') }}'},
                        {id: 30, title: 'Snapchat Black',  img: '{{ asset('public/images/social/Snapchat_black.png') }}'},
                        {id: 31, title: 'SoundCloud Black', img: '{{ asset('public/images/social/SoundCloud_black.png') }}'},
                        {id: 32, title: 'Spotify Black', img: '{{ asset('public/images/social/Spotify_black.png') }}'},
                        {id: 33, title: 'Telegram Black',  img: '{{ asset('public/images/social/Telegram_black.png') }}'},
                        {id: 34, title: 'TikTok Black',  img: '{{ asset('public/images/social/TikTok_black.png') }}'},
                        {id: 35, title: 'Tumblr Black',  img: '{{ asset('public/images/social/Tumblr_black.png') }}'},
                        {id: 36, title: 'Twitch Black',  img: '{{ asset('public/images/social/Twitch_black.png') }}'},
                        {id: 37, title: 'Twitter Black',  img: '{{ asset('public/images/social/Twitter_black.png') }}'},
                        {id: 38, title: 'Viber Black',  img: '{{ asset('public/images/social/Viber_black.png') }}'},
                        {id: 39, title: 'Vimeo Black',  img: '{{ asset('public/images/social/Vimeo_black.png') }}'},
                        {id: 40, title: 'VK Black', img: '{{ asset('public/images/social/VK_black.png') }}'},
                        {id: 41, title: 'WeChat Black', img: '{{ asset('public/images/social/WeChat_black.png') }}'},
                        {id: 42, title: 'WhatsApp Black',  img: '{{ asset('public/images/social/WhatsApp_black.png') }}'},
                        {id: 43, title: 'YouTube Black',  img: '{{ asset('public/images/social/YouTube_black.png') }}'},

                        {id: 44, title: 'Behance White', img: '{{ asset('public/images/social/Behance_white.png') }}'},
                        {id: 45, title: 'Facebook White', img: '{{ asset('public/images/social/Facebook_white.png') }}'},
                        {id: 46, title: 'Instagram White',  img: '{{ asset('public/images/social/Instagram_white.png') }}'},
                        {id: 47, title: 'LinkedIn White',  img: '{{ asset('public/images/social/LinkedIn_white.png') }}'},
                        {id: 48, title: 'Ok White',  img: '{{ asset('public/images/social/Ok_white.png') }}'},
                        {id: 49, title: 'Pinterest White',  img: '{{ asset('public/images/social/Pinterest_white.png') }}'},
                        {id: 50, title: 'Skype White',  img: '{{ asset('public/images/social/Skype_white.png') }}'},
                        {id: 51, title: 'Snapchat White',  img: '{{ asset('public/images/social/Snapchat_white.png') }}'},
                        {id: 52, title: 'SoundCloud White', img: '{{ asset('public/images/social/SoundCloud_white.png') }}'},
                        {id: 53, title: 'Spotify White', img: '{{ asset('public/images/social/Spotify_white.png') }}'},
                        {id: 54, title: 'Telegram White',  img: '{{ asset('public/images/social/Telegram_white.png') }}'},
                        {id: 55, title: 'TikTok White',  img: '{{ asset('public/images/social/TikTok_white.png') }}'},
                        {id: 56, title: 'Tumblr White',  img: '{{ asset('public/images/social/Tumblr_white.png') }}'},
                        {id: 57, title: 'Twitch White',  img: '{{ asset('public/images/social/Twitch_white.png') }}'},
                        {id: 58, title: 'Twitter White',  img: '{{ asset('public/images/social/Twitter_white.png') }}'},
                        {id: 59, title: 'Viber White',  img: '{{ asset('public/images/social/Viber_white.png') }}'},
                        {id: 60, title: 'Vimeo White',  img: '{{ asset('public/images/social/Vimeo_white.png') }}'},
                        {id: 61, title: 'VK White', img: '{{ asset('public/images/social/VK_white.png') }}'},
                        {id: 62, title: 'WeChat White', img: '{{ asset('public/images/social/WeChat_white.png') }}'},
                        {id: 63, title: 'WhatsApp White',  img: '{{ asset('public/images/social/WhatsApp_white.png') }}'},
                        {id: 64, title: 'YouTube White',  img: '{{ asset('public/images/social/YouTube_white.png') }}'},
                    ],
                    render: {
                        option: function(data, escape) {
                            return '<div>' +
                                    '<img style="margin-right: 16px" width="30" src="' + escape(data.img) + '">' +
                                    '<span class="title">' + escape(data.title) + '</span>' +
                                '</div>';
                        },
                        item: function(data, escape) {
                            return  '<img style="margin-right: 16px" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                        }
                    }
                });
            </script>
        @endforeach
    </body>
</html>







