<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Меню {{ $user->name }}</title>

        {{-- Favicon --}}
        <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

        <!-- Fonts for template -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- JS Select for socials-->
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Date JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

        <!-- Time -->
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script src="{{asset('public/js/moment.js')}}" type="text/javascript"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

        <!-- Users fonts -->
        @include('fonts.fonts')

        <!-- All styles -->
        <link href="{{asset('public/css/style.css')}}" rel="stylesheet" type="text/css" />

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

            <nav class="navbar fixed-top">
                <div class="container-fluid">
                    <div class="form-check form-switch">
                        <input data-id="{{$user->id}}" id="theme" name="theme" class="form-check-input" type="checkbox" @if($user->dayVsNight == true) checked @endif>
                    </div>
                </div>
            </nav>

			<!-- БЛОК: Ссылка на профиль -->
			<div class="row">
				<a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
					<div class="col-12">
						<div class="block1 box-part text-center shadow @if($user->dayVsNight) bg-dark @endif" style="margin: 0; background-color: #ffe0db">
							<div class="d-flex justify-content-center">
                                <div class="img" style="background-image: url({{$user->avatar}});"></div>
                            </div>
							<div class="title">
								<h4 class="mt-3 block1-text @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: #464646; font-weight: 600 ;">{{ $user->name }}</h4>
							</div>
							<div class="text mb-1">
							    <span class="block1-text @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: #464646;">@lang('app.profile_link')</span>
						    </div>
						</div>
					</div>
				</a>
			</div>

            <!-- БЛОК: Добавить ссылку -->
            <div class="row" style="margin-right: 0">
				<div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="block1 row d-flex justify-content-start shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #ffbdb3">
						<div class="col-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/SvCxHnG/zzzzz.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="row">
								<div class="col-12">
									<h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.add_link')</h4>
								</div>
								<div class="col-12">
									<h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">В этом разделе можно добавить мультиссылку или мероприятие.</h4>
								</div>
							</div>
						</div>
                        <div class="collapse" id="collapseExample" style="padding: 0; border-radius: 0">
                            <div class="sub-block1 card card-body @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #ffbdb3; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0; border-radius: 0">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalLink">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="block1-text mt-4 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.link')</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="block1-text mb-3 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Самая простая мультиссылка на внешний ресурс.</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalEvent">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="block1-text mt-4 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Мероприятие</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="block1-text mb-3 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавьте свое мероприятие. Для отображения мероприятий нужно поменять тип страницы на "Афиша"</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalProduct">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="block1-text mt-4 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Продукт</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="block1-text mb-3 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавьте товар в свой магазин</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            <!-- БЛОК: Заказы -->
            @if($user->type == 'Market')
                <div class="row" style="margin-right: 0">
                    <div class="col-12" style="padding-right: 7px; padding: 0">
                        <a href="{{ route('orders', ['id' => $user->id]) }}">
                            <div class="block1 row shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #ec4f43">
                                <div class="col-4">
                                    <div class="imgg m-5" style="background-image: url(https://i.ibb.co/3vmRBDy/vvvvvvvv.png);"></div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Заказы {{count($user->orders)}}</h4>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">В этом разделе находятся все ваши заказы</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif

			<!-- БЛОК: Все материалы -->
            <div class="row" style="margin-right: 0">
				<div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="block1 row d-flex justify-content-start shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #fe948d">
						<div class="col-4" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/k4ykGnT/xxxxx.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
							<div class="row">
								<div class="col-12">
									<h4  class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Все материалы</h4>
								</div>
								<div class="col-12">
									<h4  class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">В этом разделе находятся все созданные вами мультиссылки и мероприятия. Здесь вы можете их редактировать, удалять, менять местами и смотреть статистику по кликам</h4>
								</div>
							</div>
						</div>
                        <div class="collapse" id="collapseExample1" style="padding: 0; border-radius: 0">
                            <div class="sub-block1 card card-body @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #fe948d; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0; border-radius: 0">

                            	<div class="row d-flex justify-content-center">
                            		<div class="col-6 text-center">
                            			<div class="row" >
											<a href="{{ route('allLinks', ['id' => Auth::user()->id]) }}" style="text-decoration: none; border: 0; padding: 0">
												<div class="col-12">
													<div class="sub-block1 row @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #fe948d; height: 130px; margin: 0;">
														<div class="col-12 ">
															<div class="row">
																<div class="col-12">
																	<h4 class="block1-text mt-4 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Ссылки</h4>
																</div>
																<div class="col-12">
																	<h4 class="block1-text mb- text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Редактирование, удаление, смена позиций и просмотр статистики по ссылкам</h4>
																</div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
                            		</div>
                            		<div class="col-6 text-center">
                            			<div class="row" >
											<a href="{{ route('allEvents', ['id' => Auth::user()->id]) }}" style="text-decoration: none; border: 0; padding: 0">
												<div class="col-12">
													<div class="sub-block1 row @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #fe948d; height: 130px; margin: 0;">
														<div class="col-12 ">
															<div class="row">
																<div class="col-12">
																	<h4 class="block1-text mt-4 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Мероприятия</h4>
																</div>
																<div class="col-12">
																	<h4 class="block1-text text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Редактирование и удаление созданных вами мероприятий</h4>
																</div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
                            		</div>
                                    <div class="col-6 text-center">
                                        <div class="row" >
                                            <a href="{{ route('allProducts', ['id' => Auth::user()->id]) }}" style="text-decoration: none; border: 0; padding: 0">
                                                <div class="col-12">
                                                    <div class="sub-block1 row @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #fe948d; height: 130px; margin: 0;">
                                                        <div class="col-12 ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h4 class="block1-text mt-4 text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Продукты</h4>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h4 class="block1-text text-center @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Редактирование, удаление и статистика по вашим товарам</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            	</div>

                            </div>
                        </div>
					</div>
				</div>
			</div>

            <!-- БЛОК: cтатистика профиля -->
			<div class="row" style="margin-right: 0">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalStat" style="padding-left: 7px; padding: 0">
					<div class="block1 row shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #fe7968">
						<div class="col-4">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/djxLR3S/ccccc.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center">
							<div class="row">
								<div class="col-12">
									<h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.stats')</h4>
								</div>
								<div class="col-12">
									<h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Статистика по просмотрам вашего профиля. Геолокация по городам и странам</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- БЛОК: Настройки -->
			<div class="row" style="margin-right: 0">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding-right: 7px; padding: 0">
					<div class="block1 row shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #ec4f43">
						<div class="col-4">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/3vmRBDy/vvvvvvvv.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center">
							<div class="row">
								<div class="col-12">
									<h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.settings')</h4>
								</div>
								<div class="col-12">
									<h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">@lang('app.settings_description')</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- БЛОК: Выход -->
			<div class="row" >
                <div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="block1 box-part text-center shadow-sm @if($user->dayVsNight) bg-dark @endif" style="margin: 0; background-color: white; padding-top: 10px; padding-bottom: 10px">
                        <div class="d-flex justify-content-between text-center">
                            <form method="POST" action="{{ route('logout') }}">
								@csrf
								<button class="block1 nav-link text-muted mt-2 @if($user->dayVsNight) bg-dark @endif" style="padding:  0; border: 0; outline: none; background-color:white;">
									<h4 class="@if($user->dayVsNight) text-white @endif" style="font-family: 'Rubik', sans-serif; font-size: 1rem">@lang('app.exit')</h4>
								</button>
							</form>
                            <div class="text-center d-flex align-items-center">
                                <a href="{{ route('welcome') }}" style="border-bottom: none">
                                    <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="img-fluid" width="110">
                                </a>
                            </div>
                        </div>
					</div>
				</div>
            </div>

            <!-- Модалка для добавления ссылок -->
			<div class="modal fade" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
		  		<div class="modal-dialog">
				    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
				    	<div class="modal-header">
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить ссылку</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">
				        <form action="{{ route('addLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
			        		@csrf @method('POST')
                            <input type="hidden" name="type" value="LINK">
		        			<div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">@lang('app.m_text_link')</label>
						    	<input type="text" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" name="title" placeholder="" maxlength="100" style="border-radius: 0">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>
						    </div>
						    <div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>
						    	<input type="text" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" name="link" style="border-radius: 0">
						    </div>
                            <div class="mb-3" id="download-file">
                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>
                                <input type="file" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" id="inputGroupFile02" name="photo" accept=".jpg, .jpeg, .png, .gif" style="border-radius: 0">
                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете прикрепить для своей ссылки любое изображение или гифку</span>
                            </div>
                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прикрепить иконку</label>
                            <div class="mb-3 ">
                                <select id="select-beast-empty" data-placeholder="Начните вводить название..."  autocomplete="off" name="icon"></select>
                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если не хотите загружать картинку, можете выбрать иконку из нашей базы. Просто начните вводить нужное вам название, но будьте осторожны, размер иконок может не соответствовать размерам ссылок</span>
                            </div>

                            <hr>
                                <div class="text-center">
                                    Дизайн ссылки
                                </div>
                            <hr>

                            <div class="mb-3 text-center" >
                                <div class="ms-2 form-check" style="padding: 0">
                                    <div class="form-check form-switch mb-3">
                                        <input name="check_last_link" class="form-check-input " type="checkbox" value="penis" id="design-link">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            @lang('app.last_style_2')
                                        </label>
                                    </div>
                                </div>
                                <label for="exampleInputEmail1" class="form-label " style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">Этот переключатель поможет вам скопировать дизайн вашей последней созданной ссылки, что бы не нужно было самому заполнять ввсе параметры опять</label>
                            </div>
                            <div id="design-block">
                                <div class="text-center row">
                                    <div class="col-9">
                                        <select id="select-beast-empty-font" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                    </div>
                                    <div class="col-3">
                                        <select class="block-input @if($user->dayVsNight) bg-secondary @endif form-select" aria-label="Default select example" name="font_size" style="border-radius: 0; height: 35px">
                                            <option value="0.9">1</option>
                                            <option value="1">2</option>
                                            <option value="1.1">3</option>
                                            <option value="1.2">4</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>

                                <div class="mb-3 text-center">
                                    <div class="form-check text-center">
                                        <input name="bold" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Сделать текст ссылки жирным
                                        </label>
                                    </div>
                                </div>

                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="title_color" style="height: 40px; border-radius: 0"><br>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_title_color_description')</span>
                                </div>

                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>
                                <div class="mb-3 text-center row">
                                    <div class="col-12">
                                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="text_shadow_color" style="height: 40px; border-radius: 0"><br>
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

                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control block-input @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color" style="height: 40px; border-radius: 0">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_background_color_description')</span>
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                                </div>
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_shadow')</label>
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
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_round')</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="10">
                                </div>

                                <div class="mb-3 text-center">
                                    <div>
                                        <select class="block-input @if($user->dayVsNight) bg-secondary @endif form-select" aria-label="Default select example" name="animation" style="border-radius: 0">
                                            <option selected>Выбрать анимацию...</option>
                                            <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                            <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                        </select>
                                    </div>
                                    <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <div class="form-check text-center">
                                    <input name="pinned" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Закрепите ссылку и она всегда будет вверху списка
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-secondary" style="border-radius: 0">@lang('app.m_add_link')</button>
                              </div>
							</div>
				        </form>
				    </div>
				</div>
		  	</div>

            <!-- Модалка для добавления мероприятия -->
            <div class="modal fade" id="exampleModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b" id="add-post-modal">
                <div class="modal-dialog">

                    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить событие</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-post-modal"></button>
                            </div>
                            <div class="modal-body p-2">
                                <form action="{{ route('addEvent', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" id="add-post">
                                    @csrf @method('POST')
                                    <span class="mb-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Поля выделенные зеленым цветом обязательны к заполнению</span>
                                    <input type="hidden" name="type" value="EVENT"> <!-- Тип ссылки -->
                                    <div class="mb-1"> <!-- Город -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Город проведения</label>
                                        <input class="form-control" name="city" id="city" placeholder="Москва" style="background-color: #9bd77e; border-radius: 0">
                                    </div>
                                    <div class="mb-1"> <!-- Локация -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Место проведения</label>
                                        <input class="form-control" name="location" id="full_text" placeholder="Название места проведения мероприятия" style="background-color: #9bd77e; border-radius: 0">
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 255 символов</span>
                                    </div>
                                    <div class="mb-3"> <!-- Дата и время -->
                                    	<div class="row">
                                    		<div class="col-7">
                                    			<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Дата</label>
												<input id="startDate" name="date" class="form-control" type="date" style="background-color: #9bd77e; border-radius: 0" />
                                    		</div>
                                    		<div class="col-5">
                                    			<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Время</label>
                                        		<input type="text" class="form-control" name="time" id="timepicker" placeholder="21:30" maxlength="255" style="background-color: #9bd77e; border-radius: 0">
                                    		</div>
                                    	</div>
                                    </div>
                                    <div class="mb-3"> <!-- Описание события -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Описание</label>
                                        <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif "  rows="3" name="description" id="full_text" style="border-radius: 0"></textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 2500 символов</span>
                                    </div>
                                    <div class="mb-3"> <!-- Баннер события -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Афиша</label>
                                        <input type="file" class="form-control" id="inputGroupFile022" name="banner" accept=".png, .jpg, .jpeg" style="background-color: #9bd77e; border-radius: 0">
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>
                                    </div>
                                    <div class="mb-3"> <!-- Покупка билетов -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на продажу билетов</label>
                                        <input class="form-control @if($user->dayVsNight) bg-secondary @endif " name="tickets" id="full_text" placeholder="" style="border-radius: 0;">
                                    </div>
                                    <div class="mb-3"> <!-- Ссылка на видео -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_video')</label>
                                        <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif "  rows="2" name="video" id="video" style="border-radius: 0"></textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_video_description')</span>
                                    </div>
                                    <div class="mb-3"> <!-- Ссылка на любое медиа -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Плейлист</label>
                                        <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif "  rows="2" name="media" id="media" style="border-radius: 0"></textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Для добавления плейлиста, в это поле необходимо вставить его код</span>
                                    </div>

                                    <!-- Дизайн -->
                                    <hr>
                                        <div class="text-center">
                                            Дизайн мероприятия
                                        </div>
                                    <hr>

                                    <div class="mb-3 text-center" >
                                        <div class="ms-2 form-check" style="padding: 0">
                                            <div class="form-check form-switch mb-3">
                                                <input name="check_last_event" class="form-check-input" type="checkbox" value="penis" id="design-link-e">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    @lang('app.last_style_2')
                                                </label>
                                            </div>
                                        </div>
                                        <label for="exampleInputEmail1" class="form-label " style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">Этот переключатель поможет вам скопировать дизайн последнего созданного вами мероприятия, что бы не нужно было самому заполнять ввсе параметры опять</label>
                                    </div>

                                    <div id="design-block-e">
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для города и локации</label>
                                        <div class="row mb-">
                                            <div class="col-6">
                                                <select id="select-beast-empty-post-location" data-placeholder="Поиск шрифта..."  autocomplete="off" name="location_font"></select>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" name="location_font_size" style="border-radius: 0; height: 35px;">
                                                    <option value="0.9">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1.1">3</option>
                                                    <option value="1.2">4</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="#050507" title="Choose your color" name="location_font_color" style="height: 35px; border-radius: 0"><br>
                                            </div>
                                        </div>
                                        <div class="mb-1 text-center">
                                            <div class="form-check text-center">
                                                <input name="bold_city" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Сделать название города жирным
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <div class="form-check text-center">
                                                <input name="bold_location" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Сделать место проведения жирным
                                                </label>
                                            </div>
                                        </div>
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для города и локации</label>
                                        <div class="mb-3 text-center row">
                                            <div class="col-12">
                                                <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" id="exampleColorInput"  title="Choose your color" name="location_text_shadow_color" style="height: 40px; border-radius: 0"><br>
                                            </div>
                                            <div class="col-12">
                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Размытие тени</span>
                                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_blur" value="0">
                                            </div>
                                            <div class="col-12">
                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_bottom" value="0">
                                            </div>
                                            <div class="col-12">
                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>
                                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_right" value="0">
                                            </div>
                                        </div>

                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для даты и времени</label>
                                        <div class="row mb-">
                                            <div class="col-6">
                                                <select id="select-beast-empty-post-date" data-placeholder="Поиск шрифта..."  autocomplete="off" name="date_font"></select>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" name="date_font_size" style="border-radius: 0; height: 35px;">
                                                    <option value="0.9">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1.1">3</option>
                                                    <option value="1.2">4</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="#050507" title="Choose your color" name="date_font_color" style="height: 35px; border-radius: 0"><br>
                                            </div>
                                        </div>
                                        <div class="mb-1 text-center">
                                            <div class="form-check text-center">
                                                <input name="bold_date" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Сделать дату жирным
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <div class="form-check text-center">
                                                <input name="bold_time" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Сделать время жирным
                                                </label>
                                            </div>
                                        </div>
                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для даты и времени</label>
                                        <div class="mb-3 text-center row">
                                            <div class="col-12">
                                                <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control" id="exampleColorInput"  title="Choose your color" name="date_text_shadow_color" style="height: 40px; border-radius: 0"><br>
                                            </div>
                                            <div class="col-12">
                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Размытие тени</span>
                                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_blur" value="0">
                                            </div>
                                            <div class="col-12">
                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_bottom" value="0">
                                            </div>
                                            <div class="col-12">
                                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>
                                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_right" value="0">
                                            </div>
                                        </div>

                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Выбор фонового цвета и прозрачности</label>
                                        <div class="row mb-3">
                                            <div class="col-3">
                                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color_hex" style="height: 40px; border-radius: 0">
                                            </div>
                                            <div class="col-9">
                                                <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                                            </div>
                                        </div>

                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_round')</label>
                                        <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->
                                            <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="event_round" value="25">
                                        </div>

                                        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для блока мероприятия</label>
                                        <div class="mb-3 text-center d-flex justify-content-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="block_shadow" id="inlineRadio1" value="shadow-none">
                                                <label class="form-check-label" for="inlineRadio1">none</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="block_shadow" id="inlineRadio2" value="shadow-sm">
                                                <label class="form-check-label" for="inlineRadio2">sm</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="block_shadow" id="inlineRadio3" value="shadow">
                                                <label class="form-check-label" for="inlineRadio3">md</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="block_shadow" id="inlineRadio3" value="shadow-lg">
                                                <label class="form-check-label" for="inlineRadio3">lg</label>
                                            </div>
                                        </div>

                                        <div class="mb-3 text-center">
                                            <div>
                                                <select class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" name="event_animation" style="border-radius: 0">
                                                    <option selected>Выбрать анимацию...</option>
                                                    <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                    <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                                </select>
                                            </div>
                                            <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Анимация для мероприятия</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button id="post-btn" type="submit" class="btn btn-secondary" style="border-radius: 0">Добавить</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
            </div>

            <!-- Модалка для добавления продуктов -->
            <div class="modal fade" id="exampleModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog">
                    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить продукт</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addProduct', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf @method('POST')
                                <input type="hidden" name="user" value="{{$user->id}}">
                                <div class="mb-1"> <!-- Название продукта -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Название продукта</label>
                                    <input class="form-control" name="title" id="title" placeholder="Прокладки женские" style="background-color: #9bd77e; border-radius: 0">
                                </div>
                                <div class="mb-3"> <!-- Описание события -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Описание</label>
                                    <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif "  rows="3" name="description" id="full_text" style="border-radius: 0"></textarea>
                                </div>
                                <div class="mb-3"> <!-- Полное описание -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Развернутое описание</label>
                                    <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif "  rows="3" name="full_description" id="count_products" style="border-radius: 0"></textarea>
                                </div>
                                <div class="mb-3"> <!-- Фото продукта -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Основное фото</label>
                                    <input type="file" class="form-control" id="inputGroupFile022" name="main_photo" accept=".png, .jpg, .jpeg" style="background-color: #9bd77e; border-radius: 0">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>
                                </div>
                                <div class="mb-3"> <!-- Дополнительные фото -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Дополнительные фото</label>
                                    <input type="file" class="form-control" id="inputGroupFile022" name="additional_photos[]" accept=".png, .jpg, .jpeg" style="border-radius: 0" multiple="multiple">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>
                                </div>
{{--                                <div class="mb-3"> <!-- Кол-во товаров в наличии -->--}}
{{--                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Кол-во товаров в наличии</label>--}}
{{--                                    <input name="count_products" class="form-control" style="background-color: #9bd77e; border-radius: 0">--}}
{{--                                </div>--}}
                                <div class="mb-3"> <!-- Описание события -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Цена за единицу товара</label>
                                    <input name="price" class="form-control" style="background-color: #9bd77e; border-radius: 0">
                                </div>
                                <div class="mb-3 text-center" >
                                    <div class="ms-2 form-check" style="padding: 0">
                                        <div class="form-check form-switch mb-3">
                                            <input name="visible" class="form-check-input" type="checkbox" value="{{true}}" id="design-link-e">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Сделать продукт видимым для всех
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Market buttons --}}
                                <div class="mb-3"> <!-- Название продукта -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на товар</label>
                                    <input class="form-control mb-1" name="link_to_shop" id="title" placeholder="Ozon, Wildberries и тд..." style="border-radius: 0">

                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для ссылки на товар</label>
                                    <input class="form-control" name="link_to_shop_text" id="title" placeholder="Купить на Ozon" style="border-radius: 0">
                                </div>
                                <div class="mb-3"> <!-- Название продукта -->
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для кнопки заказа</label>
                                    <input class="form-control" name="link_to_order_text" id="title" placeholder="Напишите мне для заказа" style="border-radius: 0">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Покупать заполняет форму и заявка на товар\услугу появится в вашем личном кабинете</span>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-secondary" style="border-radius: 0">@lang('app.m_add_link')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Модалка для статистики по профилю -->
            <div class="modal fade" id="exampleModalStat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog ">
                    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                    <div class="block-modal modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <h5 class="modal-title" id="exampleModalLabel">Просмотры профиля</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div class="block-modal accordion @if($user->dayVsNight) bg-dark text-white-50 @endif" id="accordionExample">
                            <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="block-modal accordion-button @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        @lang('app.s_day')
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                        <h1 class="display-4" style="margin: 0">{{count($day['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($day['uniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($day['uniqueCountry'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="block-modal accordion-button collapsed @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        @lang('app.s_month')
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                        <h1 class="display-4" style="margin: 0">{{count($month['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($month['uniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($month['uniqueCountry'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="block-modal accordion-button collapsed @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        @lang('app.s_year')
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                        <h1 class="display-4" style="margin: 0">{{count($year['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($year['uniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($year['uniqueCountry'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->country}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="block-modal accordion-button collapsed @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        @lang('app.s_all')
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                        <h1 class="display-4" style="margin: 0">{{count($all['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($all['uniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($all['uniqueCountry'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
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
				    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
				    	<div class="modal-header">
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.p_edit')</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">

				      		@if($user->avatar)
                                <div class="" id="delete-favicon-avatar">
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-12">
                                            <form action="{{ route('delUserAvatar', ['id' => $user->id]) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input id="type-avatar" type="hidden" name="type" value="avatar">
                                                <div class="d-grid gap-2">
                                                    <button data-id="{{$user->id}}" id="delete-avatar" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_ava_del')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
				      		@endif
				      		@if($user->banner)
                                <div class="" id="delete-favicon-banner">
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-12">
                                            <form action="{{ route('delUserAvatar', ['id' => $user->id]) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input id="type-banner" type="hidden" name="type" value="banner">
                                                <div class="d-grid gap-2">
                                                    <button data-id="{{$user->id}}" id="delete-banner" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить фоновое изображение</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
				      		@endif
                            @if($user->favicon)
                                <div class="mb-3" id="delete-favicon-block">
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-12">
                                            <form action="{{ route('delUserAvatar', ['id' => $user->id]) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input id="type" type="hidden" name="type" value="favicon">
                                                <div class="d-grid gap-2">
                                                    <button data-id="{{$user->id}}" id="delete-favicon" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить фавикон</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
				        	<form action="{{ route('editUserProfile', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" class="text-center">
					        	@csrf @method('PATCH')
							  	<div class="mb-3">
							    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name')</label>
							    	<input value="{{$user->name}}" type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="{{$user->name}}" maxlength="100" style="border-radius: 0">
							    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_name_descr')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name_color')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="{{$user->name_color}}" title="Choose your color" name="name_color" style="height: 40px; border-radius: 0">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_n_def')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.page_adress')</label>
							  	<div class="input-group mb-3 text-center">
  									<span class="input-group-text" id="basic-addon3">chrry.me/</span>
  									<input placeholder="{{$user->slug}}" type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="basic-url" aria-describedby="basic-addon3" name="slug" description="{{$user->slug}}" maxlength="150" style="border-radius: 0">
  									<label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.page_adress_descr')</label>
								</div>
							  	<div class="mb-3 text-center">
							    	<label for="exampleFormControlTextarea1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.page_descr')</label>
				  					<textarea class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleFormControlTextarea1" rows="3" name="description" maxlength="150" style="border-radius: 0">{{$user->description}}</textarea>
				  					<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_page_descr_descr')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_color_descr')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="{{$user->description_color}}" title="Choose your color" name="description_color" style="height: 40px; border-radius: 0">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_color_descr_def')</span>
							  	</div>
							  	@if($user->verify == 1)
								  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.verif_icon_color')</label>
								  	<div class="mb-3 text-center d-flex justify-content-center">
										<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="{{$user->verify_color}}" title="Choose your color" name="verify_color" style="height: 40px; border-radius: 0">
										<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_v_i_c_def')</span>
								  	</div>
							  	@endif
							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_color')</label><br>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif; font-size:0.7rem">@lang('app.p_background_color')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="exampleColorInput" value="{{$user->background_color}}" title="Choose your color" name="background_color" style="height: 40px; border-radius: 0">
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_download_ava')</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="avatar" style="border-radius: 0">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_download_ava_rules')</span>
								</div>
								<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_img')</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="banner" style="border-radius: 0">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_background_img_descr')</span>
								</div>
                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Загрузить фавикон</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif " id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="favicon" style="border-radius: 0">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Малюсенькая картинка, которая будет отображаться в верху браузера. Обычно её размер 32х32 пикселя</span>
                                </div>
                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_select_lang')</label>
                                    <select name="locale" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
                                        <option selected>@lang('app.p_select')</option>
                                        <option @if($user->locale == 'ru') selected @endif value="ru">Русский</option>
                                        <option @if($user->locale == 'en') selected @endif value="en">English</option>
                                    </select>
                                </div>

                                <div id="link_bar">
                                    <div class=" mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Отображение бара с соц сетями</label>
                                        <select name="social_links_bar" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
                                            <option @if($user->social_links_bar == '1') selected @endif value="{{1}}">Включить</option>
                                            <option @if($user->social_links_bar == '0') selected @endif value="{{0}}">Выключить</option>
                                        </select>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если у вас тип страницы "Ссылки", вы можете все свои ссылки с нашими иконками вынести в отдельный бар</span>
                                    </div>

                                    <div class=" mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Позиция бара с соц сетями</label>
                                        <select name="links_bar_position" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
                                            <option @if($user->links_bar_position == 'top') selected @endif value="top">Вверху</option>
                                            <option @if($user->links_bar_position == 'bottom') selected @endif value="bottom">Внизу</option>
                                        </select>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать где отобразить бар с сылками, вверху или внизу</span>
                                    </div>
                                </div>

                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Показать логотип</label>
                                    <select name="show_logo" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
                                        <option @if($user->show_logo == '1') selected @endif value="{{1}}">Показать</option>
                                        <option @if($user->show_logo == '0') selected @endif value="{{0}}">Отключить</option>
                                    </select>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Отображать наш логотип на странице или нет</span>
                                </div>

                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тип страницы</label>
                                    <select id="type-profile" name="type" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
                                        <option selected>Выберите тип страницы</option>
                                        <option @if($user->type == 'Links') selected @endif value="Links">Ссылки</option>
                                        <option @if($user->type == 'Events') selected @endif value="Events">Афиша</option>
                                        <option @if($user->type == 'Market') selected @endif value="Market">Магазин</option>
                                    </select>
                                </div>
                                <div id="event-block" style="display:none">
                                	<div class=" mb-3">
	                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Отображение иконок соц сетей</label>
	                                    <select name="show_social" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
	                                        <option selected>Показать иконки соц. сетей или нет</option>
	                                        <option @if($user->show_social == true) selected @endif value="1">Показать</option>
	                                        <option @if($user->show_social == false) selected @endif value="0">Нет</option>
	                                    </select>
	                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Будут отображаться только ссылки с иконками из нашей бд.</span>
	                                </div>
	                                <div class=" mb-3">
	                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Место положение иконок</label>
	                                    <select name="social" class="form-select @if($user->dayVsNight) bg-secondary @endif " aria-label="Default select example" style="border-radius: 0">
	                                        <option selected>Показать иконки соц. сетей или нет</option>
	                                        <option @if($user->social == 'TOP') selected @endif value="TOP">Вверху</option>
	                                        <option @if($user->social == 'DOWN') selected @endif value="DOWN">Внизу</option>
	                                    </select>
	                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вверху - между вашим именем и мероприятиями. Внизу - под мероприятиями</span>
	                                </div>
                                </div>
                                <div class="d-grid gap-2">
								  	<button type="submit" class="btn btn-secondary mb-1 mt-3" style="font-family: 'Rubik', sans-serif; border-radius: 0; color: white">@lang('app.p_edit_prof')</button>
								</div>
							</form>
				      	</div>
				    </div>
		  		</div>
			</div>
    	</div>



        <!-- ХЗ блять че это? -->
{{--        <script>--}}
{{--            $(function(){--}}
{{--                $("input[type='submit']").click(function(){--}}
{{--                    var $fileUpload = $("input[type='file']");--}}
{{--                    if (parseInt($fileUpload.get(0).files.length)>2){--}}
{{--                    alert("You can only upload a maximum of 2 files");--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}

        <!-- Icons select loader -->
        <script>
            new TomSelect('#select-beast-empty',{
                valueField: 'img',
                searchField: 'title',
                options: [
                    @foreach($allIconsInsideFolder as $icon)
                        {id: {{$icon->getInode()}}, title: '{{substr($icon->getFilename(), 0, strrpos($icon->getFilename(),'.'))}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},
                    @endforeach
                ],
                render: {
                    option: function(data, escape) {
                        return  '<table>' +
                                    '<tr>' +
                                        '<img style="background-color: #DCDCDC" width="90" src="' + escape(data.img) + '">' +
                                        '<h6>' + escape(data.title) + '</h6' +
                                    '</tr>' +
                                '</table>';

                    },
                    item: function(data, escape) {
                        return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                    }
                }
            });
        </script>

        {{-- Fonts select loader for Links--}}
        <script>
            new TomSelect('#select-beast-empty-font',{
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

        {{-- Fonts select loader for Events--}}
        <script>
            new TomSelect('#select-beast-empty-post-location',{
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
            new TomSelect('#select-beast-empty-post-date',{
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

        <script>
        	//Hide upload field if icon selected
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

            //Select page type
            $( document ).ready(function() {
            	var type = $('#type-profile').val();
            	if(type == 'Links') {
            		$('#event-block').hide();
            	}
            	if(type == 'Events' || type == 'Market') {
            		$('#event-block').show();
            	}
                $('#type-profile').change(function(){
                    $('#pp').html($(this).val());
                    if($(this).val() == 'Events' || $(this).val() == 'Market') {
                        $('#event-block').show();
                    }
                    if($(this).val() == 'Links') {
                        $('#event-block').hide();
                    }
                });
            });

            // $( document ).ready(function() {
            //     var type = $('#type-profile').val();
            //     if(type == 'Events') {
            //         $('#link_bar').hide();
            //     }
            //     if(type == 'Links') {
            //         $('#link_bar').show();
            //     }
            //     $('#type-profile').change(function(){
            //         $('#pp').html($(this).val());
            //         if($(this).val() == 'Events') {
            //             $('#link_bar').hide();
            //         }
            //         if($(this).val() == 'Links') {
            //             $('#link_bar').show();
            //         }
            //     });
            // });

        </script>

        <script>
	        $('#timepicker').timepicker({
	            uiLibrary: 'bootstrap5'
	        });
    	</script>

        <!-- Delete favicon -->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function () {
                $("body").on("click","#delete-favicon", function(e){
                    e.preventDefault();
                    var type = $("#type").val();
                    var id = $(this).data('id');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/"+id+"/edit-profile/del-avatar",
                        type: 'PATCH',
                        data: {_token: CSRF_TOKEN, type: type},
                        dataType: 'JSON',
                        success: function (){
                            $("#delete-favicon-block").hide();
                        },
                    });
                });
            });
        </script>

        <!-- Delete banner -->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function () {
                $("body").on("click","#delete-banner", function(e){
                    e.preventDefault();
                    var type = $("#type-banner").val();
                    var id = $(this).data('id');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/"+id+"/edit-profile/del-avatar",
                        type: 'PATCH',
                        data: {_token: CSRF_TOKEN, type: type},
                        dataType: 'JSON',
                        success: function (){
                            $("#delete-favicon-banner").hide();
                        },
                    });
                });
            });
        </script>

        <!-- Delete avatar -->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function () {
                $("body").on("click","#delete-avatar", function(e){
                    e.preventDefault();
                    var type = $("#type-avatar").val();
                    var id = $(this).data('id');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/"+id+"/edit-profile/del-avatar",
                        type: 'PATCH',
                        data: {_token: CSRF_TOKEN, type: type},
                        dataType: 'JSON',
                        success: function (){
                            $("#delete-favicon-avatar").hide();
                        },
                    });
                });
            });
        </script>

        <script type="text/javascript">
            //theme color switch
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $( document ).ready(function() {
                $("#theme").click(function() {
                    var type = $(this).is(':checked');
                    var id = $(this).data('id');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/"+id+"/edit-profile/change-theme",
                        type: 'PATCH',
                        data: {_token: CSRF_TOKEN, type: type},
                        dataType: 'HTML',
                        success: function (){

                            if(type == true) {
                                $(".block1").addClass('bg-dark');
                                $(".block1-text").addClass('text-white-50');
                                $(".sub-block1").addClass('bg-secondary');
                                $(".block-modal").addClass('bg-dark').addClass('text-white-50');
                                $(".block-input").addClass('bg-secondary');
                            } else {
                                $(".block1").removeClass('bg-dark');
                                $(".block1-text").removeClass('text-white-50');
                                $(".sub-block1").removeClass('bg-secondary');
                                $(".block-modal").removeClass('bg-dark').removeClass('text-white-50');
                                $(".block-input").removeClass('bg-secondary');
                            }

                        },
                    });
                });
            });

            // Дизайн последней ссылки блок
            $( document ).ready(function() {
                $("#design-link").click(function() {
                    var type = $(this).is(':checked');
                    if(type == true) {
                        $("#design-block").hide();
                    } else {
                        $("#design-block").show();
                    }
                });
            });

            $( document ).ready(function() {
                $("#design-link-e").click(function() {
                    var type = $(this).is(':checked');
                    if(type == true) {
                        $("#design-block-e").hide();
                    } else {
                        $("#design-block-e").show();
                    }
                });
            });
        </script>

    </body>
</html>








