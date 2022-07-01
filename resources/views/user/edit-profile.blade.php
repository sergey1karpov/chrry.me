<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- Подгрузка соц сетей для ссылок-->
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

            <!-- Отображение валидационных ошибок -->
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

			<!-- БЛОК: Ссылка на профиль -->
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

            <!-- БЛОК: Добавить ссылку или пост -->
            <div class="row" style="margin-right: 0">
				<div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="row d-flex justify-content-start shadow" style="background-color: #ffbdb3">
						<div class="col-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/SvCxHnG/zzzzz.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="row">
								<div class="col-12">
									<h4  class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Добавить ссылку</h4>
								</div>
								<div class="col-12">
									<h4  class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Вы можете добавить как обычную ссылку, так и её более развернутый вариант в виде поста</h4>
								</div>
							</div>
						</div>
                        <div class="collapse" id="collapseExample" style="padding: 0">
                            <div class="card card-body" style="background-color: #ffbdb3; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalLink">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="mt-4 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Ссылка</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="mb-3 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Самая простая ссылка на внешний ресурс. Фото, заголовок и сама ссылка</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalPost">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="mt-4 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Пост</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="mb-3 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Более развернутая ссылка с фото галереей и увеличенным кол-вом символов для текста</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            <!-- БЛОК: Все ссылки -->
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
										<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Тут вы можете редактировать и удалять свои ссылки и посты, а так же просматривать статистику кликов по ним</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

            <!-- БЛОК: татистика профиля -->
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

            <!-- БЛОК: Настройки -->
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

            <!-- БЛОК: Выход -->
			<div class="row" >
                <div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="box-part text-center shadow-sm " style="margin: 0; background-color: white; padding-top: 10px; padding-bottom: 10px">
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

            <!-- Модалка для добавления ссылок -->
			<div class="modal fade" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
		  		<div class="modal-dialog">
				    <div class="modal-content text-center" style="background-color: #FBF6EA">
				    	<div class="modal-header">
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить ссылку</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">
				        <form action="{{ route('addLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
			        		@csrf @method('POST')
		        			<div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст ссылки</label>
						    	<input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" maxlength="50">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать до 50 символов</span>
						    </div>
						    <div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Вставьте ссылку</label>
						    	<input type="text" class="form-control" name="link">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сюда вставьте хорошую ссылку</span>
						    </div>
                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Иконка</label>
                            <div class="mb-3">
                                <select id="select-beast-empty" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon">
                                </select>
                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать иконку из нашей базы для своей ссылки</span>
                            </div>
                            <div class="mb-3" id="download-file">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
						    	<input type="file" class="form-control" id="inputGroupFile02" name="photo" accept=".jpg, .jpeg, .png, .gif">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если иконка вам не подходит, загрузите своё изображение. Мы принимаем картинки jpeg, jpg, png, gif формата.</span>
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
                                <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                            </div>
                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень для ссылки</label>
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
                                <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="25">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                              </div>
							</div>
				        </form>
				    </div>
				</div>
		  	</div>

            <!-- Модалка для добавления поста -->
            <div class="modal fade" id="exampleModalPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog">
                  <div class="modal-content text-center" style="background-color: #FBF6EA">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить пост</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addPost', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('POST')
                                <input type="hidden" value="POST" name="type"> <!-- Тип ссылки -->
                                <div class="mb-3"> <!-- Заголовок -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Заголовок</label>
                                    <input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" maxlength="100">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Заголовок может содержать до 100 символов</span>
                                </div>
                                <div class="mb-3"> <!-- Полный текст -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="full_text"></textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Свободный текст</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на источник -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Ссылка</label>
                                    <input type="text" class="form-control" name="link">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если есть ссылка на внешний ресурс, вставьте её сюда</span>
                                </div>
                                <div class="mb-3"> <!-- Фотографии -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Фото</label>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="photos[]" accept=".png, .jpg, .jpeg" multiple>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата. Вы можете загрузить до 10 изображений</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на видео -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Ссылка на видео</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="video"></textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если хотите прикрепить видео, вставьте сюда ссылку на youtube, vimeo или что то другое...</span>
                                </div>
                                <div class="mb-3"> <!-- Ссылка на любое медиа -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Ссылка на медиа</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="media"></textarea>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Поле для кода. Сюда можно вставить код для плейлиста ВК, Яндекса и много чего</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор цвета на заголовок -->
                                    <input type="color" class="form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="title_color" style="height: 40px;"><br>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Черный по умолчанию</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Фоновый цвет</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор цвета на фон -->
                                    <input type="color" class="form-control " id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color" style="height: 40px;">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Белый по умолчанию</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прозрачность фона</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- выбор прозрачности фона -->
                                    <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Добавить тень для ссылки</label>
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добавить тень -->
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
                                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="25">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Добавить пост</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Модалка для статистики по профилю -->
            <div class="modal fade" id="exampleModalStat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog">
                    <div class="modal-content text-center" style="background-color: #FBF6EA">
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

			<!-- Модалка для редактирования профиля -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
		  		<div class="modal-dialog">
				    <div class="modal-content text-center" style="background-color: #FBF6EA">
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
							  	<button type="submit" class="btn btn-dark mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Изменить</button>
							</form>
				      	</div>
				    </div>
		  		</div>
			</div>
    	</div>

        <!-- ХЗ блять че это? -->
        <script>
            $(function(){
                $("input[type='submit']").click(function(){
                    var $fileUpload = $("input[type='file']");
                    if (parseInt($fileUpload.get(0).files.length)>2){
                    alert("You can only upload a maximum of 2 files");
                    }
                });
            });​
        </script>

        <!-- Скрипт подгрузки иконок соц сетей -->
        <script>
			new TomSelect('#select-beast-empty',{
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

        <!-- Скрипт скрыть поле если выбрана иконка -->
        <script>
            $( document ).ready(function() {
                $('#select-beast-empty').change(function(){
                    $('#pp').html($(this).val());
                    if($(this).val() != '') {
                        $('#download-file').hide();
                    }
                    if($(this).val() == '') {
                        $('#download-file').show();
                    }
                });
            });
        </script>
    </body>
</html>









