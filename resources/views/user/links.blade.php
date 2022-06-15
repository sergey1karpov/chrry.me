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

        <style type="text/css">
        	body{
			    background: #f5f5f5;
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
			    width: 100px;
			    height: 100px;
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

            @auth
                <nav class="navbar navbar-expand-lg" style="height: 25px">
                    <div class="container-fluid" style="padding: 0">
                        <a class="navbar-brand" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                            <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid mb-4" style="width:20px; border: 0">
                        </a>
                    </div>
                </nav>
            @endauth

            @foreach($links as $link)
                <div class="mt-3 row card {{$link->rounded}} box-part2" style="background-color:{{$link->background_color}}; border: 2px solid {{$link->background_color}}; opacity: 0.9;">
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
                            <!-- Говно -->
                        </div>
                    </div>
                    <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0;">
                        {{-- <a href="{{ route('showClickStat', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black"> --}}
                        <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;">
                            <a href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">
                                <button href="{{ route('showClickLinkStatistic', ['id' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f0eeef; border: 0;">
                                    Статистика
                                </button>
                            </a>
                        </div>
                        {{-- </a> --}}
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
                                        <div class="mb-3 text-center d-flex justify-content-center">
                                            <input type="range" class="form-range" min="19" max="99" step="10" id="customRange2" name="transparency" value="{{$link->transparency}}">
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
            @endforeach

            <div class="row">
                <div>
                    {!! $links->links('vendor.pagination.default') !!}
                </div>
            </div>
        </div>
    </body>
</html>







