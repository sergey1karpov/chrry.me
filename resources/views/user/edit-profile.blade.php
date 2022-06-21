<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
			  border-bottom:2px solid #0062cc;
			}
			.box{
			    padding:60px 0px;
			}

			.box-part{
			    background:#fcfcf9;
			    border-radius:25;
			    padding:30px 20px;
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
			    width: 85px;
			    height: 85px;
			    border-radius: 50%;
			    margin-right: 0;
			    background-position: center center;
			    -wekit-background-size: cover;
			    background-size: cover;
			    background-repeat: no-repeat;
			}
			.imgg {
			    width: 60px;
			    height: 60px;
			    border-radius: 50%;
			    margin-right: 0;
			    background-position: center center;
			    -wekit-background-size: cover;
			    background-size: cover;
			    background-repeat: no-repeat;
			}
        </style>
    </head>
    <body class="antialiased">
    	<div class="container-fluid justify-content-center text-center">

            {{-- <div id="piechart_3d" style="width: 900px; height: 500px;"></div> --}}

    		<!-- Отображение валидационных ошибок -->
			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			<!-- Ссылка на профиль -->
			<div class="row">
				<a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
					<div class="col-12">
						<div class="box-part text-center shadow" style="margin: 0; background-color: #ffe0db">
							<div class="d-flex justify-content-center">
                                <div class="img" style="background-image: url({{$user->avatar}});"></div>
                            </div>
							<div class="title">
								<h4 class="mt-3" style="font-family: 'Rubik', sans-serif; color: #464646; font-weight: 600 ;">{{ $user->name }}</h4>
							</div>
							<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: #464646;">Вы можете посмотреть как выглядит ваш профиль после его кастомизации и добавления ссылок</span>
						</div>
						</div>
					</div>
				</a>
			</div>
			{{-- <div class="row" style="margin-right: 0">
				<a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
					<div class="col-12">
						<div class="row" style="background-color: #ffe0db">
							<div class="col-4">
								<div class="img m-5" style="background-image: url({{$user->avatar}});"></div>
							</div>
							<div class="col-8 d-flex align-items-center">
								<div class="row">
									<div class="col-12">
										<h4 class="mt-4 ms-3 text-start" style="font-family: 'Rubik', sans-serif; color: #1d1d1d; font-weight: 600 ;">{{ $user->name }}</h4>
									</div>
									<div class="col-12">
										<h4 class="mb-3 ms-3 text-start" style="font-family: 'Rubik', sans-serif; color: #1d1d1d; font-size: 0.8rem">{{ '@'.$user->slug }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div> --}}

            <!-- Добавление ссылок -->
			{{-- <div class="row" >
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalLink" style="padding-right: 7px; padding: 0">
					<div class="box-part text-center shadow-sm " style="margin: 0; background-color: #ffbdb3">
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: white">Добавить ссылку</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">Вы можете разместить неограниченное кол-во ссылок на своей странице. Прикрепить к ним изображение, добавить описание, цвет тд.</span>
						</div>
					</div>
				</div>
            </div> --}}
			<div class="row" style="margin-right: 0">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalLink" style="padding-right: 7px; padding: 0">
					<div class="row d-flex justify-content-start shadow" style="background-color: #ffbdb3">
						<div class="col-4">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/SvCxHnG/zzzzz.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center">
							<div class="row">
								<div class="col-12">
									<h4 class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Добавить ссылку</h4>
								</div>
								<div class="col-12">
									<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Вы можете разместить неограниченное кол-во ссылок на своей странице. Прикрепить к ним изображение, добавить описание, цвет тд.</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            {{-- <div class="row" >
                <div class="col-12" style="padding-left: 7px; padding: 0">
                    <a href="{{ route('allLinks', ['id' => Auth::user()->id]) }}" style="color:black; text-decoration: none; border-bottom: 0">
                        <div class="box-part text-center shadow-sm " style="margin: 0; background-color: #fe948d">
                            <div class="title">
                                <h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: white">Все ссылки</h4>
                            </div>
                            <div class="text mb-1">
                                <span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">Тут вы можете редактировать и удалять свои ссылки, а так же просматривать статистику кликов по ним</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}
			<div class="row" style="margin-right: 0">
				<a class="" href="{{ route('allLinks', ['id' => Auth::user()->id]) }}" style="text-decoration: none; border: 0; padding: 0">
					<div class="col-12">
						<div class="row shadow" style="background-color: #fe948d">
							<div class="col-4">
								<div class="imgg m-5" style="background-image: url(https://i.ibb.co/k4ykGnT/xxxxx.png);"></div>
							</div>
							<div class="col-8 d-flex align-items-center">
								<div class="row">
									<div class="col-12">
										<h4 class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Все ссылки</h4>
									</div>
									<div class="col-12">
										<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Тут вы можете редактировать и удалять свои ссылки, а так же просматривать статистику кликов по ним</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

            {{-- <div class="row" >
                <div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalStat" style="padding-left: 7px; padding: 0">
					<div class="box-part shadow-sm" style="margin: 0; background-color: #fe7968">
                        <div class="d-flex justify-content-center text-center">
                            <div class="text-center img" style="background-image: url(https://i.ibb.co/y4SNFP9/statistic-loop.gif); height: 50px; width: 50px"></div>
                        </div>
						<div class="title">
							<h4 class="mt-3" style="font-family: 'Rubik', sans-serif; color: white">Статистика профиля</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">Кол-во просмотров профиля, геолокация по городам и странам </span>
						</div>
					</div>
				</div>
            </div> --}}
			<div class="row" style="margin-right: 0">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalStat" style="padding-left: 7px; padding: 0">
					<div class="row shadow" style="background-color: #fe7968">
						<div class="col-4">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/djxLR3S/ccccc.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center">
							<div class="row">
								<div class="col-12">
									<h4 class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Статистика профиля</h4>
								</div>
								<div class="col-12">
									<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Кол-во просмотров профиля, геолокация по городам и странам</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            {{-- <div class="row" >
                <div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding-right: 7px; padding: 0">
					<div class="box-part text-center shadow-sm " style="margin: 0; background-color: #ec4f43">
                        <div class="d-flex justify-content-center text-center">
                            <div class="text-center img" style="background-image: url(https://i.ibb.co/dQPJY0d/recurring-settings.gif); height: 50px; width: 50px"></div>
                        </div>
						<div class="title">
							<h4 class="mt-3" style="font-family: 'Rubik', sans-serif; color: white">Настройки</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">Здесь вы можете редактировать свой профиль. Изменить имя, адрес, описание страницы. Так же загрузить ааватар и фоновое изображение</span>
						</div>
					</div>
				</div>
            </div> --}}
			<div class="row" style="margin-right: 0">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding-right: 7px; padding: 0">
					<div class="row shadow" style="background-color: #ec4f43">
						<div class="col-4">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/3vmRBDy/vvvvvvvv.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center">
							<div class="row">
								<div class="col-12">
									<h4 class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Настройки</h4>
								</div>
								<div class="col-12">
									<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Здесь вы можете редактировать свой профиль. Изменить имя, адрес, описание страницы. Так же загрузить ааватар и фоновое изображение</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row" >
                <div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding-right: 7px; padding: 0">
					<div class="box-part text-center shadow-sm " style="margin: 0; background-color: white">
                        <div class="d-flex justify-content-center text-center">
                            <form method="POST" action="{{ route('logout') }}">
								@csrf
								<button class="nav-link text-muted mt-2" style="padding:  0; border: 0; outline: none; background-color:white;">
									<h4 style="font-family: 'Rubik', sans-serif; font-size: 1rem">Выход</h4>
								</button>
							</form>
                        </div>
					</div>
				</div>
            </div>

			</div>

            {{-- @if (session()->has('message'))
                <div class="row" style="margin-top: 12px; margin-left: 6px; margin-right: 6px">
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif --}}

			<div class="modal fade" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  		<div class="modal-dialog">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить ссылку</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">
				        <form action="{{ route('addLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
			        		@csrf @method('POST')
		        			<div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Заголовок</label>
						    	<input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" maxlength="150">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать от 3 букв до 150 символов</span>
						    </div>
						    <div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Вставьте ссылку</label>
						    	<input type="text" class="form-control" name="link">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сюда вставьте хорошую ссылку</span>
						    </div>

						    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
						  	<div class="mb-3 text-center d-flex justify-content-center">
								<input type="color" class="form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="title_color" style="height: 40px;"><br>
								<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Черный по умолчанию</span>
						  	</div>

						  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Фоновый цвет</label>
						  	<div class="mb-3 text-center d-flex justify-content-center">
								<input type="color" class="form-control " id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color" style="height: 40px;">
								<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Белый по умолчанию</span>
						  	</div>

                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="19" max="99" step="10" id="customRange2" name="transparency">
                            </div>

                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень</label>
						  	<div class="mb-3 text-center d-flex justify-content-center">
								<div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shadow" id="inlineRadio1" value="shadow-none">
                                    <label class="form-check-label" for="inlineRadio1">none</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm">
                                    <label class="form-check-label" for="inlineRadio2">sm</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow">
                                    <label class="form-check-label" for="inlineRadio3">md</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg">
                                    <label class="form-check-label" for="inlineRadio3">lg</label>
                                </div>
						  	</div>

                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление углов карточки и фото</label>
						  	<div class="mb-3 text-center d-flex justify-content-center">
								<div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio1" value="rounded-0">
                                    <label class="form-check-label" for="inlineRadio1">none</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio2" value="rounded-1">
                                    <label class="form-check-label" for="inlineRadio2">sm</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-2">
                                    <label class="form-check-label" for="inlineRadio3">md</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rounded" id="inlineRadio3" value="rounded-3">
                                    <label class="form-check-label" for="inlineRadio3">lg</label>
                                </div>
						  	</div>

						    <div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
						    	<input type="file" class="form-control" id="inputGroupFile02" name="photo">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png, gif формата, размерои до 3мб. Хотя можете обойтись и без изображения, но зачем если можно?</span>
						    </div>

						    <button type="submit" class="btn btn-primary">Добавить</button>
							</div>
				        </form>
				    </div>
				</div>
		  	</div>

            <!-- Статистика профиля -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModalStat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Статистика </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Просмотры профиля за сутки
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($day['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
										<ul class="list-group mb-3">
											@foreach($day['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">Страны</h1>
										<ul class="list-group mb-3">
											@foreach($day['uniqueCountry'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Просмотры профиля за месяц
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($month['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
										<ul class="list-group mb-3">
											@foreach($month['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">Страны</h1>
										<ul class="list-group mb-3">
											@foreach($month['uniqueCountry'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                         Статистика за год
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($year['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
										<ul class="list-group mb-3">
											@foreach($year['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">Страны</h1>
										<ul class="list-group mb-3">
											@foreach($year['uniqueCountry'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Вся статистика просмотров профиля
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($all['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">Просмотры профиля</h1>
										<ul class="list-group mb-3">
											@foreach($all['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">Страны</h1>
										<ul class="list-group mb-3">
											@foreach($all['uniqueCountry'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

			<!-- Редактировать профиль -->
			{{-- <div class="row" style="margin-top: 12px">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
					<div class="box-part text-center rounded-3" style="margin: 0">
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif;">Настройки</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block">Здесь вы можете редактировать свой профиль. Изменить имя, адрес, описание страницы. Так же загрузить ааватар и фоновое изображение</span>
						</div>
					</div>
				</div>
			</div> --}}
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  		<div class="modal-dialog">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Редактировать профиль</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">

				      		@if($user->avatar)
				      		<div class="mb-3">
				      			<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Текущий аватар</label><br>
				      			<div class="row d-flex align-items-center justify-content-center">
				      				<div class="col-4">
				      					<img src="{{$user->avatar}}" class="img-fluid" width="70px">
				      				</div>
				      				<div class="col-8">
				      					<form action="{{ route('delUserAvatar', ['id' => $user->id]) }}" method="POST">
				      						@csrf @method('PATCH')
						      				<button type="submit" class="btn btn-light mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить аватар</button>
						      			</form>
				      				</div>
				      			</div>
				      		</div>
				      		@endif

				      		@if($user->banner)
				      		<div class="mb-3">
				      			<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Текущее фоновое изображение</label><br>
				      			<div class="row d-flex align-items-center justify-content-center">
				      				<div class="col-4">
				      					<img src="{{$user->banner}}" class="img-fluid" width="70px">
				      				</div>
				      				<div class="col-8">
				      					<form action="{{ route('delUserBanner', ['id' => $user->id]) }}" method="POST">
				      						@csrf @method('PATCH')
						      				<button type="submit" class="btn btn-light mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить фон</button>
						      			</form>
				      				</div>
				      			</div>
				      		</div>
				      		@endif

				        	<form action="{{ route('editUserProfile', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
					        	@csrf @method('PATCH')
							  	<div class="mb-3">
							    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Имя</label>
							    	<input value="{{$user->name}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="{{$user->name}}" maxlength="100">
							    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Имя у нас содержит от 5 символов до 100</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет имени страницы</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control " id="exampleColorInput" value="{{$user->name_color}}" title="Choose your color" name="name_color" style="height: 40px;">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Черный по умолчанию</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Адрес страницы</label>
							  	<div class="input-group mb-3">
  									<span class="input-group-text" id="basic-addon3">chrry.me/</span>
  									<input placeholder="{{$user->slug}}" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="slug" description="{{$user->slug}}" maxlength="150">
  									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Адрес страницы содержит от 5 символов до 150</span>
								</div>
							  	<div class="mb-3">
							    	<label for="exampleFormControlTextarea1" class="form-label" style="font-family: 'Rubik', sans-serif;">Описание страницы</label>
				  					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" maxlength="150">{{$user->description}}</textarea>
				  					<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание не обязательно, но можно заполнить до 150 символов</span>
							  	</div>

							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет описания страницы</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control " id="exampleColorInput" value="{{$user->description_color}}" title="Choose your color" name="description_color" style="height: 40px;">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Черный по умолчанию</span>
							  	</div>

							  	@if($user->verify == 1)
								  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет иконки верификации</label>
								  	<div class="mb-3 text-center d-flex justify-content-center">
										<input type="color" class="form-control " id="exampleColorInput" value="{{$user->verify_color}}" title="Choose your color" name="verify_color" style="height: 40px;">
										<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Черный по умолчанию</span>
								  	</div>
							  	@endif

							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Цвет фона</label><br>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif; font-size:0.7rem">Если не хотите использовать фоновое изображение, можете выбрать фоновый цвет.</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control " id="exampleColorInput" value="{{$user->background_color}}" title="Choose your color" name="background_color" style="height: 40px;">
							  	</div>

							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Загрузите аватар</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="avatar">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png, gif формата, размерои до 3мб. Хотя можете обойтись и без изображения, но зачем если можно?</span>
								</div>

								<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Загрузите фоновое изображение</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="banner">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png, gif формата, размерои до 3мб. Хотя можете обойтись и без изображения, но зачем если можно?</span>
								</div>
								{{-- <div class="mb-3">
							    	<label for="exampleFormControlTextarea1" class="form-label" style="font-family: 'Rubik', sans-serif;">Выбор языка</label>
				  					<select class="form-select" aria-label="Default select example" name="locale">
									  	<option selected>Open this select menu</option>
									  	<option value="ru">Русский</option>
									  	<option value="en">English</option>
									  	<option value="es">Spanish</option>
									</select>
							  	</div> --}}

							  	<button type="submit" class="btn btn-dark mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Изменить</button>
							</form>
				      	</div>
				    </div>
		  		</div>
			</div>

		  	{{-- <!-- Управление ссылками -->
		  	<div class="row mb-3" style="margin-top: 12px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="box-part text-center rounded-3" style="margin: 0">
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif;">Управление ссылками</h4>
						</div>
						<div class="text mb-3">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block">Изменить или удалить вашу ссылку</span>
						</div>
					</div>
				</div>
			</div> --}}



			<!-- Футер -->
			{{-- <footer class="footer nav">
		      	<div class="container mb-3 mt-2 d-flex justify-content-around ">
		      		<div>
		      			<form method="POST" action="{{ route('logout') }}">
	                        @csrf
	                        <button class="nav-link text-muted mt-2" style="padding:  0; border: 0; outline: none; background-color:#ECECE2;">
	                        	<h4 style="font-family: 'Rubik', sans-serif; font-size: 1rem">Выход</h4>
	                        </button>
	                    </form>
		      		</div>
		      	</div>
		    </footer> --}}
    	</div>
    </body>
</html>









