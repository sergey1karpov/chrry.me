<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
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
			  border-bottom:2px solid #0062cc;
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
    </head>
    <body class="antialiased">
    	<div class="container-fluid justify-content-center text-center">

    		<!-- Отображение валидационных ошибок -->
			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			<!-- Ссылка на профиль -->
			<div class="row" style="margin-top: 12px">
				<a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; ">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="box-part text-center rounded-3" style="margin: 0;">
							<div class="d-flex justify-content-center">
                                <div class="img" style="background-image: url({{$user->avatar}});"></div>
                            </div>
	                        {{-- <img class="mb-1 rounded-circle" src="{{ $user->avatar }}"> --}}
							<div class="title">
								<h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: black; ">Посмотреть профиль</h4>
							</div>
							<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: black">Вы можете посмотреть как выглядит ваш профиль после его кастомизации и добавления ссылок</span>
						</div>
						</div>
					</div>
				</a>
			</div>

			<!-- Редактировать профиль -->
			<div class="row" style="margin-top: 12px">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
					<div class="box-part text-center rounded-3" style="margin: 0">
                        {{-- <img src="https://i.ibb.co/tx0Bgz9/1111.png" class="img-fluid mb-2" width="40px">	 --}}
						<div class="title">
							{{-- <h4 class="mt-2" style="font-family: 'Rubik', sans-serif;">Настройки</h4> --}}
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif;">Настройки</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block">Здесь вы можете редактировать свой профиль. Изменить имя, адрес, описание страницы. Так же загрузить ааватар и фоновое изображение</span>
						</div>
					</div>
				</div>
			</div>
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
  									<span class="input-group-text" id="basic-addon3">bord.link/</span>
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

			<!-- Добавление ссылок -->
			<div class="row" style="margin-top: 12px">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-bs-toggle="modal" data-bs-target="#exampleModalLink">
					<div class="box-part text-center rounded-3" style="margin: 0">
                        {{-- <img src="https://i.ibb.co/74YMCMB/333.png" class="img-fluid mb-2" width="40px"> --}}
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif;">Добавить ссылку</h4>
						</div>
						<div class="text mb-1">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block">Вы можете разместить до 15 ссылок на своей странице. Прикрепить им изображение, добавить описание и цвет</span>
						</div>
					</div>
				</div>
			</div>
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

		  	<!-- Управление ссылками -->
		  	<div class="row mb-3" style="margin-top: 12px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="box-part text-center rounded-3" style="margin: 0">
						<div class="title">
							<h4 class="mt-2" style="font-family: 'Rubik', sans-serif;">Управление ссылками</h4>
						</div>
						<div class="text mb-3">
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block">Изменить или удалить вашу ссылку</span>
						</div>
						@foreach($links as $link)
					    	<div class="row card rounded-3 box-part2" style="background-color:{{$link->background_color}}; border: 2px solid {{$link->background_color}}; opacity: 0.9;">
					  			<div class="d-flex align-items-center justify-content-start mt-2 mb-2" style="padding-left: 4px; padding-right: 4px;">
					  				<div class="col-1">
					  					<img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
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
					  			<div class="d-flex justify-content-between border-bottom rounded-bottom rounded-3" style="padding: 0;">
							  		<div class="col-6" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}">
							  			<button class="btn-sm" style="background-color: #f0eeef; border: 0;">
							  				Изменить
							  			</button>
							  		</div>
							  		<div class="col-6" style="background-color: #f0eeef; ">
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
					</div>
				</div>
			</div>

			<!-- Футер -->
			<footer class="footer nav">
		      	<div class="container mb-3 mt-2 d-flex justify-content-around">
		      		{{-- <div class="d-flex align-items-center">
		      			<h4 class="text-muted" style="font-family: 'Rubik', sans-serif; font-size: 1rem;">О нас</h4>
		      		</div>
		      		<div class="d-flex align-items-center">
		      			<h4 class="text-muted" style="font-family: 'Rubik', sans-serif; font-size: 1rem">Блог</h4>
		      		</div> --}}
		      		<div>
		      			<form method="POST" action="{{ route('logout') }}">
	                        @csrf
	                        <button class="nav-link text-muted" style="padding:  0; border: 0; outline: none; background-color:#f5f5f5;">
	                        	<h4 style="font-family: 'Rubik', sans-serif; font-size: 1rem">Выход</h4>
	                        </button>
	                    </form>
		      		</div>
		      	</div>
		    </footer>
    	</div>
    </body>
</html>









