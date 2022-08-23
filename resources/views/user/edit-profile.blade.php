<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $user->name }}</title>

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
			    width: 100px;
			    height: 100px;
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
            .loader{
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                background: url('https://flevix.com/wp-content/uploads/2019/07/Box-Loading-1-1.gif') no-repeat 50% 50%;
            }
            @font-face {
                font-family: Oi; /* Имя шрифта */
                src: url({{asset('public/fonts/Oi.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: RampartOne; /* Имя шрифта */
                src: url({{asset('public/fonts/RampartOne.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Yomogi; /* Имя шрифта */
                src: url({{asset('public/fonts/Yomogi.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: YujiSyuku; /* Имя шрифта */
                src: url({{asset('public/fonts/YujiSyuku.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: ZenKurenaido; /* Имя шрифта */
                src: url({{asset('public/fonts/ZenKurenaido.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Comforter; /* Имя шрифта */
                src: url({{asset('public/fonts/Comforter.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Murecho; /* Имя шрифта */
                src: url({{asset('public/fonts/Murecho.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: TrainOne; /* Имя шрифта */
                src: url({{asset('public/fonts/TrainOne.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: AlumniSans; /* Имя шрифта */
                src: url({{asset('public/fonts/AlumniSans.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: DotGothic16; /* Имя шрифта */
                src: url({{asset('public/fonts/DotGothic16.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: NotoSansMono; /* Имя шрифта */
                src: url({{asset('public/fonts/NotoSansMono.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Podkova; /* Имя шрифта */
                src: url({{asset('public/fonts/Podkova.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: SpectralSC; /* Имя шрифта */
                src: url({{asset('public/fonts/SpectralSC.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: JetBrainsMono; /* Имя шрифта */
                src: url({{asset('public/fonts/JetBrainsMono.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Roboto; /* Имя шрифта */
                src: url({{asset('public/fonts/Roboto.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: OpenSans; /* Имя шрифта */
                src: url({{asset('public/fonts/OpenSans.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: Montserrat; /* Имя шрифта */
                src: url({{asset('public/fonts/Montserrat.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: NotoSans; /* Имя шрифта */
                src: url({{asset('public/fonts/NotoSans.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: RussoOne; /* Имя шрифта */
                src: url({{asset('public/fonts/RussoOne.ttf')}}); /* Путь к файлу со шрифтом */
            }
            @font-face {
                font-family: PoiretOne; /* Имя шрифта */
                src: url({{asset('public/fonts/PoiretOne.ttf')}}); /* Путь к файлу со шрифтом */
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
							<span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: #464646;">@lang('app.profile_link')</span>
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
									<h4  class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.add_link')</h4>
								</div>
								<div class="col-12">
									<h4  class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">@lang('app.add_link_description')</h4>
								</div>
							</div>
						</div>
                        <div class="collapse" id="collapseExample" style="padding: 0">
                            <div class="card card-body" style="background-color: #ffbdb3; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalLink">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="mt-4 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.link')</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="mb-3 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">@lang('app.link_description')</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModalEvent">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="mt-4 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Мероприятие</h4>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="mb-3 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавите свое мероприятие</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>	






			<!-- БЛОК: Все материалы -->
            <div class="row" style="margin-right: 0">
				<div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="row d-flex justify-content-start shadow" style="background-color: #fe948d">
						<div class="col-4" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/k4ykGnT/xxxxx.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
							<div class="row">
								<div class="col-12">
									<h4  class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Все материалы</h4>
								</div>
								<div class="col-12">
									<h4  class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Здесь находятся все ваши ссылки, посты и мероприятия. В соответствующем разделе вы можете изменять их и удалять</h4>
								</div>
							</div>
						</div>
                        <div class="collapse" id="collapseExample1" style="padding: 0">
                            <div class="card card-body" style="background-color: #fe948d; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0">

                            	<div class="row d-flex justify-content-center">
                            		<div class="col-6 text-center">
                            			<div class="row" >
											<a href="{{ route('allLinks', ['id' => Auth::user()->id]) }}" style="text-decoration: none; border: 0; padding: 0">
												<div class="col-12">
													<div class="row " style="background-color: #fe948d; height: 150px; margin: 0;">
														<div class="col-12 d-flex align-items-center">
															<div class="row">
																<div class="col-12">
																	<h4 class="mt-4 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Ссылки</h4>
																</div>
																<div class="col-12">
																	<h4 class="mb-3 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Редактирование, удаление и просмотр статистики</h4>
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
													<div class="row " style="background-color: #fe948d; height: 150px; margin: 0;">
														<div class="col-12 d-flex align-items-center">
															<div class="row">
																<div class="col-12">
																	<h4 class="mt-4 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Мероприятия</h4>
																</div>
																<div class="col-12">
																	<h4 class="mb-3 text-center" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Редактирование и удаление мероприятий</h4>
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
					<div class="row shadow" style="background-color: #fe7968">
						<div class="col-4">
							<div class="imgg m-5" style="background-image: url(https://i.ibb.co/djxLR3S/ccccc.png);"></div>
						</div>
						<div class="col-8 d-flex align-items-center">
							<div class="row">
								<div class="col-12">
									<h4 class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.stats')</h4>
								</div>
								<div class="col-12">
									<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">@lang('app.stats_description')</h4>
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
									<h4 class="mt-4 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.settings')</h4>
								</div>
								<div class="col-12">
									<h4 class="mb-3 text-start" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">@lang('app.settings_description')</h4>
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
									<h4 style="font-family: 'Rubik', sans-serif; font-size: 1rem">@lang('app.exit')</h4>
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
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.m_add_link')</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">
				        <form action="{{ route('addLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
			        		@csrf @method('POST')
                            <input type="hidden" name="type" value="LINK">
		        			<div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">@lang('app.m_text_link')</label>
						    	<input type="text" class="form-control" name="title" placeholder="" maxlength="50">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>
						    </div>
                            <div class="text-center row">
                                <div class="col-9">
                                    <select id="select-beast-empty-font" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" aria-label="Default select example" name="font_size">
                                        <option value="0.9">1</option>
                                        <option value="1">2</option>
                                        <option value="1.1">3</option>
                                        <option value="1.2">4</option>
                                    </select>
                                </div>
                            </div>
                            <label class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>
						    <div class="mb-3">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>
						    	<input type="text" class="form-control" name="link">
						    </div>
                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_icon')</label>
                            <div class="mb-3 row">
                                <select id="select-beast-empty" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon"></select>
                                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_icon_description')</span>
                            </div>
                            <div class="mb-3" id="download-file">
						    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>
						    	<input type="file" class="form-control" id="inputGroupFile02" name="photo" accept=".jpg, .jpeg, .png, .gif">
						    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_photo_description')</span>
						    </div>
                            <label style="background-color: #ffbdb3" for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">@lang('app.last_style_1')</label>
                            <div class="mb-4 text-center" style="background-color: #ffbdb3">
                                <div class="form-check" style="background-color: #ffbdb3">
                                    <input name="check_last_link" class="form-check-input" type="checkbox" value="penis" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        @lang('app.last_style_2')
                                    </label>
                                </div>
                            </div>
						    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>
						  	<div class="mb-3 text-center d-flex justify-content-center">
								<input type="color" class="form-control" id="exampleColorInput" value="#050507" title="Choose your color" name="title_color" style="height: 40px;"><br>
								<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_title_color_description')</span>
						  	</div>
						  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>
						  	<div class="mb-3 text-center d-flex justify-content-center">
								<input type="color" class="form-control " id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color" style="height: 40px;">
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
                                <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="25">
                            </div>

                            <div class="mb-3 text-center">
                                <div>
                                    <select class="form-select" aria-label="Default select example" name="animation">
                                        <option selected>Выбрать анимацию...</option>
                                        <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                        <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                    </select>
                                </div>
                                <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
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
                                <button type="submit" class="btn btn-primary">@lang('app.m_add_link')</button>
                              </div>
							</div>
				        </form>
				    </div>
				</div>
		  	</div>

            <!-- Модалка для добавления мероприятия -->
            <div class="modal fade" id="exampleModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b" id="add-post-modal">
                <div class="modal-dialog">

                        <div class="modal-content text-center" style="background-color: white">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Добавить событие</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-post-modal"></button>
                            </div>
                            <div class="modal-body p-2">
                                <form action="{{ route('addEvent', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" id="add-post">
                                    @csrf @method('POST')
                                    <span class="mb-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Поля выделенные зеленым цветом обязательны к заполнению</span>
                                    <input type="hidden" name="type" value="EVENT"> <!-- Тип ссылки -->
                                    <div class="mb-3"> <!-- Город -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Город проведения</label>
                                        <input class="form-control" name="city" id="city" placeholder="Москва" style="background-color: #9bd77e">
                                    </div>
                                    <div class="mb-3"> <!-- Локация -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Место проведения</label>
                                        <input class="form-control" name="location" id="full_text" placeholder="Название места проведения мероприятия" style="background-color: #9bd77e">
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 255 символов</span>
                                    </div>
                                    <div class="mb-3"> <!-- Дата и время -->
                                    	<div class="row">
                                    		<div class="col-7">
                                    			<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Дата</label>
												<input id="startDate" name="date" class="form-control" type="date" style="background-color: #9bd77e" />
                                    		</div>
                                    		<div class="col-5">
                                    			<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Время</label>
                                        		<input type="text" class="form-control" name="time" id="timepicker" placeholder="21:30" maxlength="255" style="background-color: #9bd77e">
                                    		</div>
                                    	</div>
                                    </div>
                                    <div class="mb-3"> <!-- Описание события -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Описание</label>
                                        <textarea class="form-control"  rows="3" name="description" id="full_text"></textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 2500 символов</span>
                                    </div>
                                    <div class="mb-3"> <!-- Баннер события -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Афиша</label>
                                        <input type="file" class="form-control" id="inputGroupFile022" name="banner" accept=".png, .jpg, .jpeg" style="background-color: #9bd77e">
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>
                                    </div>
                                    <div class="mb-3"> <!-- Покупка билетов -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на продажу билетов</label>
                                        <input class="form-control" name="tickets" id="full_text" placeholder="">
                                    </div>
                                    <div class="mb-3"> <!-- Ссылка на видео -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_video')</label>
                                        <textarea class="form-control"  rows="2" name="video" id="video"></textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_video_description')</span>
                                    </div>
                                    <div class="mb-3"> <!-- Ссылка на любое медиа -->
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Плейлист</label>
                                        <textarea class="form-control"  rows="2" name="media" id="media"></textarea>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Для добавления плейлиста, в это поле необходимо вставить его код</span>
                                    </div>

                                    <!-- Дизайн -->
                                    <hr>
                                    <label for="exampleInputEmail1" class="form-label mt-2 mb-2" style="font-family: 'Rubik', sans-serif;">Дизайн</label>
                                    <label style="background-color: #ffbdb3" for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">Поставив здесь галочку, вам не нужно будет дальше заполнять форму и выбирать стиль, тк будет использован стиль вашего последнего мероприятия.</label>
                                    <div class="mb-4 text-center" style="background-color: #ffbdb3">
                                        <div class="form-check" style="background-color: #ffbdb3">
                                            <input name="check_last_event" class="form-check-input" type="checkbox" value="penis" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Использовать дизайн последнего мероприятия
                                            </label>
                                        </div>
                                    </div>
                                    <hr>

                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для города и локации</label>
                                    <div class="row mb-3">
                                    	<div class="col-6">
                                            <select id="select-beast-empty-post-location" data-placeholder="Поиск шрифта..."  autocomplete="off" name="location_font"></select>
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
                                            <select id="select-beast-empty-post-date" data-placeholder="Поиск шрифта..."  autocomplete="off" name="date_font"></select>
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

                                    <div class="mb-3 text-center">
                                        <div>
                                            <select class="form-select" aria-label="Default select example" name="event_animation">
                                                <option selected>Выбрать анимацию...</option>
                                                <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>
                                                <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>
                                            </select>
                                        </div>
                                        <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Анимация для мероприятия</label>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button id="post-btn" type="submit" class="btn btn-primary">Добавить</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">@lang('app.s_stats')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        @lang('app.s_day')
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($day['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($day['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
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
                                        @lang('app.s_month')
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($month['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($month['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
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
                                        @lang('app.s_year')
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($year['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($year['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
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
                                        @lang('app.s_all')
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-center">
                                        <h1 class="display-4" style="margin: 0">{{count($all['stat'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($all['uniqueCity'] as $c)
											<li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
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
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.p_edit')</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body">
				      		@if($user->avatar)
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_ava')</label><br>
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-4">
                                            <img src="{{$user->avatar}}" class="img-fluid" width="70px">
                                        </div>
                                        <div class="col-8">
                                            <form action="{{ route('delUserAvatar', ['id' => $user->id]) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="type" value="avatar">
                                                <button type="submit" class="btn btn-light mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_ava_del')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
				      		@endif
				      		@if($user->banner)
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_photo')</label><br>
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-4">
                                            <img src="{{$user->banner}}" class="img-fluid" width="70px">
                                        </div>
                                        <div class="col-8">
                                            <form action="{{ route('delUserAvatar', ['id' => $user->id]) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="type" value="banner">
                                                <button type="submit" class="btn btn-light mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_photo_del')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
				      		@endif
				        	<form action="{{ route('editUserProfile', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" class="text-center">
					        	@csrf @method('PATCH')
							  	<div class="mb-3">
							    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name')</label>
							    	<input value="{{$user->name}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="{{$user->name}}" maxlength="100">
							    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_name_descr')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name_color')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control " id="exampleColorInput" value="{{$user->name_color}}" title="Choose your color" name="name_color" style="height: 40px;">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_n_def')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.page_adress')</label>
							  	<div class="input-group mb-3 text-center">
  									<span class="input-group-text" id="basic-addon3">chrry.me/</span>
  									<input placeholder="{{$user->slug}}" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="slug" description="{{$user->slug}}" maxlength="150">
  									<label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.page_adress_descr')</label>
								</div>
							  	<div class="mb-3 text-center">
							    	<label for="exampleFormControlTextarea1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.page_descr')</label>
				  					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" maxlength="150">{{$user->description}}</textarea>
				  					<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_page_descr_descr')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_color_descr')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control " id="exampleColorInput" value="{{$user->description_color}}" title="Choose your color" name="description_color" style="height: 40px;">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_color_descr_def')</span>
							  	</div>
							  	@if($user->verify == 1)
								  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.verif_icon_color')</label>
								  	<div class="mb-3 text-center d-flex justify-content-center">
										<input type="color" class="form-control " id="exampleColorInput" value="{{$user->verify_color}}" title="Choose your color" name="verify_color" style="height: 40px;">
										<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_v_i_c_def')</span>
								  	</div>
							  	@endif
							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_color')</label><br>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif; font-size:0.7rem">@lang('app.p_background_color')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control " id="exampleColorInput" value="{{$user->background_color}}" title="Choose your color" name="background_color" style="height: 40px;">
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_download_ava')</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="avatar">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_download_ava_rules')</span>
								</div>
								<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_img')</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="banner">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_background_img_descr')</span>
								</div>
                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_select_lang')</label>
                                    <select name="locale" class="form-select" aria-label="Default select example">
                                        <option selected>@lang('app.p_select')</option>
                                        <option @if($user->locale == 'ru') selected @endif value="ru">Русский</option>
                                        <option @if($user->locale == 'en') selected @endif value="en">English</option>
                                    </select>
                                </div>
                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тип страницы</label>
                                    <select id="type" name="type" class="form-select" aria-label="Default select example">
                                        <option selected>Выберите тип страницы</option>
                                        <option @if($user->type == 'Links') selected @endif value="Links">Ссылки</option>
                                        <option @if($user->type == 'Events') selected @endif value="Events">Афиша</option>
                                    </select>
                                </div>
                                <div id="event-block" style="display:none">
                                	<div class=" mb-3">
	                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Отображение иконок соц сетей</label>
	                                    <select name="show_social" class="form-select" aria-label="Default select example">
	                                        <option selected>Показать иконки соц. сетей или нет</option>
	                                        <option @if($user->show_social == true) selected @endif value="1">Показать</option>
	                                        <option @if($user->show_social == false) selected @endif value="0">Нет</option>
	                                    </select>
	                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Будут отображаться только ссылки с иконками из нашей бд.</span>
	                                </div>
	                                <div class=" mb-3">
	                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Место положение иконок</label>
	                                    <select name="social" class="form-select" aria-label="Default select example">
	                                        <option selected>Показать иконки соц. сетей или нет</option>
	                                        <option @if($user->social == 'TOP') selected @endif value="TOP">Вверху</option>
	                                        <option @if($user->social == 'DOWN') selected @endif value="DOWN">Внизу</option>
	                                    </select>
	                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вверху - между вашим именем и мероприятиями. Внизу - под мероприятиями</span>
	                                </div>
                                </div>
                                <div class="d-grid gap-2">
								  	<button type="submit" class="btn btn-dark mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_edit_prof')</button>
								</div>
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
                maxOptions: 3,
                options: [
                    @foreach($allIconsInsideFolder as $icon)
                        {id: {{$icon->getInode()}}, title: '{{$icon->getFilename()}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},
                    @endforeach
                ],
                render: {
                    option: function(data, escape) {
                        return  '<table>' +
                                    '<tr>' +
                                        '<img  width="90" src="' + escape(data.img) + '">' +
                                    '</tr>' +
                                '</table>';
                    },
                    item: function(data, escape) {
                        return  '<img style="margin-right: 16px" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                    }
                }
            });
        </script>

        {{-- Подгрузка шрифтов к LINK--}}
        <script>
            new TomSelect('#select-beast-empty-font',{
                valueField: 'font',
                searchField: 'title',
                options: [
                    @foreach($allFontsInFolder as $font)
                        {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
                    @endforeach
                ],
                render: {
                    option: function(data, escape) {
                        return  '<div>' +
                                    '<span style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                                '</div>';
                    },
                    item: function(data, escape) {
                        return  '<h4 style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                    }
                }
            });
        </script>

        {{-- Подгрузка шрифтов к POST--}}
        <script>
            new TomSelect('#select-beast-empty-post',{
                valueField: 'font',
                searchField: 'title',
                options: [
                    @foreach($allFontsInFolder as $font)
                        {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
                    @endforeach
                ],
                render: {
                    option: function(data, escape) {
                        return  '<div>' +
                                    '<span style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                                '</div>';
                    },
                    item: function(data, escape) {
                        return  '<h4 style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                    }
                }
            });
        </script>

        {{-- Подгрузка шрифтов к EVENT--}}
        <script>
            new TomSelect('#select-beast-empty-post-location',{
                valueField: 'font',
                searchField: 'title',
                options: [
                    @foreach($allFontsInFolder as $font)
                        {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
                    @endforeach
                ],
                render: {
                    option: function(data, escape) {
                        return  '<div>' +
                                    '<span style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                                '</div>';
                    },
                    item: function(data, escape) {
                        return  '<h4 style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                    }
                }
            });
            new TomSelect('#select-beast-empty-post-date',{
                valueField: 'font',
                searchField: 'title',
                options: [
                    @foreach($allFontsInFolder as $font)
                        {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
                    @endforeach
                ],
                render: {
                    option: function(data, escape) {
                        return  '<div>' +
                                    '<span style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                                '</div>';
                    },
                    item: function(data, escape) {
                        return  '<h4 style="font-size: 1.3rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                    }
                }
            });
        </script>

        <script>
        	<!-- Скрипт скрыть поле если выбрана иконка -->
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

            <!-- Скрипт скрыть блок -->
            $( document ).ready(function() {
            	var type = $('#type').val();
            	if(type == 'Links') {
            		$('#event-block').hide();
            	}
            	if(type == 'Events') {
            		$('#event-block').show();
            	}
                $('#type').change(function(){
                    $('#pp').html($(this).val());
                    if($(this).val() == 'Events') {
                        $('#event-block').show();
                    }
                    if($(this).val() == 'Links') {
                        $('#event-block').hide();
                    }
                });
            });
        </script>

        <!-- Прелоадер -->
        <script>
            $( document ).ready(function() {
                $('#post-btn').click(function(){
                    $('#in-pogress').show();
                });
            });
        </script>

        <script>
	        $('#timepicker').timepicker({
	            uiLibrary: 'bootstrap5'
	        });
    	</script>

    </body>
</html>









