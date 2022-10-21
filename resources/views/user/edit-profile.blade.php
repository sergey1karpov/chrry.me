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
				<a href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
					<div class="col-12">
						<div class="block1 box-part text-center @if($user->dayVsNight) bg-dark @endif" style="margin: 0; background-color: #f26868">
							<div class="d-flex justify-content-center">
                                <div class="img" style="background-image: url({{$user->avatar}});"></div>
                            </div>
							<div class="title">
								<h4 class="mt-4 block1-text @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: #fefafa; font-weight: 600 ; margin-bottom: 0">{{ $user->name }}</h4>
							</div>
						</div>
					</div>
				</a>
			</div>

            <!-- БЛОК: Добавить ссылку -->
            <div class="row" style="margin-right: 0; margin-top:1px">
				<div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="block1 row d-flex justify-content-start @if($user->dayVsNight) bg-dark @endif" style="background-color: #f26868">
                        <div class="col-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="m-5" style="background-image: url(https://i.ibb.co/0YjgHJp/add-effect2.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
						</div>
						<div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="row">
								<div class="col-12">
									<h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: #fefafa; font-weight: 600 ;">Добавить ссылку</h4>
								</div>
								<div class="col-12">
									<h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: #fefafa; font-size: 0.7rem">Здесь вы можете добавить ссылки на внешний ресурс, управлять ими и отслеживать статистику по кликам</h4>
								</div>
							</div>
						</div>
                        <div class="collapse" id="collapseExample" style="padding: 0; border-radius: 0">
                            <div class="sub-block1 card card-body @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #f38864; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0; border-radius: 0;">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                        <div class="m-5" style="background-image: url(https://i.ibb.co/L1WBCWC/click-user.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                        <a href="{{ route('createLinkForm', ['id' => $user->id]) }}" style="border: 0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Создать</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавьте новую ссылку используя по максимум возможности кастомизации</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <hr style="margin: 0">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                        <div class="m-5" style="background-image: url(https://i.ibb.co/w67K8xY/controls.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                        <a href="{{ route('allLinks', ['id' => $user->id]) }}" style="border: 0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Управление ссылками</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Изменение и удаление ссылок, смена позиций, просмотр статистики по кликам</h4>
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

            <!-- БЛОК: Магазин -->
            @if($user->type == 'Market')
                <div class="row" style="margin-right: 0; margin-top:1px">
                    <div class="col-12" style="padding-right: 7px; padding: 0">
                        <div class="block1 row d-flex justify-content-start shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #f26868">
                            <div class="col-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExampleShop">
                                <div class="m-5" style="background-image: url(https://i.ibb.co/0cLpTTx/shopping-bag.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                            </div>
                            <div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExampleShop" role="button" aria-expanded="false" aria-controls="collapseExampleShop">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Магазин</h4>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавление\изменение товара, управление товарами, прием заказов</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExampleShop" style="padding: 0; border-radius: 0">
                                <div class="sub-block1 card card-body @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #f38864; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0; border-radius: 0">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 text-center" >
                                            <a href="{{ route('createProductForm', ['id' => $user->id]) }}">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4"  href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/yFYsThg/packaging.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center"  href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Добавить товар</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавьте товар или услугу и выберите способ продажи</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr style="margin: 0">
                                        <div class="col-12 text-center" >
                                            <a href="{{ route('allProducts', ['id' => $user->id]) }}">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4"  href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/4ZCq7w4/product.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Все товары</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Изменение и удаление товаров, просмотр статистики по кликам</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr style="margin: 0">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('orders', ['id' => $user->id]) }}">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/HX3jwS4/agreement.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Заказы</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Управляйте своими заказами</h4>
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
            @endif

            <!-- БЛОК: Афиша -->
            @if($user->type == 'Events')
                <div class="row" style="margin-right: 0; margin-top:1px">
                    <div class="col-12" style="padding-right: 7px; padding: 0">
                        <div class="block1 row d-flex justify-content-start shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #f26868">
                            <div class="col-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExampleShop">
                                <div class="m-5" style="background-image: url(https://i.ibb.co/mBScLGM/poster.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                            </div>
                            <div class="col-8 d-flex align-items-center" data-bs-toggle="collapse" href="#collapseExampleShop" role="button" aria-expanded="false" aria-controls="collapseExampleShop">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Афиша</h4>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавьте список своих мероприятий и поделитесь ссылкой на свою страницу с друзьями</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExampleShop" style="padding: 0; border-radius: 0">
                                <div class="sub-block1 card card-body @if($user->dayVsNight) bg-secondary  @endif" style="background-color: #f38864; border: 0; padding-left: 28px; padding-bottom: 0; padding-top: 0; border-radius: 0">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('createEventForm', ['id' => $user->id]) }}" style="border: 0">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/j87C6VH/add-calendar.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Создать</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Создайте новое мероприятие, загрузите афишу, выберите день, дату и поделитесь с друзьями</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr style="margin: 0">
                                        <div class="col-12 text-center" >
                                            <a href="{{ route('allEvents', ['id' => $user->id]) }}" style="border: 0">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/1772vHL/event.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Все мероприятия</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Изменение и удаление мероприятий</h4>
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
            @endif

            <!-- БЛОК: cтатистика профиля -->
			<div class="row" style="margin-right: 0; margin-top: 1px">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalStat" style="padding-left: 7px; padding: 0">
					<div class="block1 row shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #f26868">
						<div class="col-4">
							<div class="m-5" style="background-image: url(https://i.ibb.co/tXgvrWw/statistics-graph.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
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
			<div class="row" style="margin-right: 0; margin-top: 1px">
				<div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding-right: 7px; padding: 0">
					<div class="block1 row shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #f26868">
						<div class="col-4">
							<div class="m-5" style="background-image: url(https://i.ibb.co/7vrtV67/settings-1.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
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
			<div class="row" style=" margin-top: 1px">
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

            <!-- Модалка для статистики по профилю -->
            <div class="modal fade" id="exampleModalStat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1b1b1b">
                <div class="modal-dialog" style="margin: 0">
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
		  		<div class="modal-dialog" style="margin: 0">
				    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
				    	<div class="modal-header">
				        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.p_edit')</h5>
				        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
				      	<div class="modal-body" style="background-color: #f1f2f2">

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
							    	<input value="{{$user->name}}" type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="{{$user->name}}" maxlength="100" style="border: 0">
							    	<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_name_descr')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name_color')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->name_color}}" title="Choose your color" name="name_color" style="height: 35px; border: 0">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_n_def')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.page_adress')</label>
							  	<div class="input-group mb-3 text-center">
  									<span class="input-group-text shadow" id="basic-addon3" style="border: 0">chrry.me/</span>
  									<input placeholder="{{$user->slug}}" type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="basic-url" aria-describedby="basic-addon3" name="slug" description="{{$user->slug}}" maxlength="150" style="border: 0">
  									<span class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.page_adress_descr')</span>
								</div>
							  	<div class="mb-3 text-center">
							    	<label for="exampleFormControlTextarea1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.page_descr')</label>
				  					<textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="exampleFormControlTextarea1" rows="3" name="description" maxlength="150" style="border: 0">{{$user->description}}</textarea>
				  					<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_page_descr_descr')</span>
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_color_descr')</label>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->description_color}}" title="Choose your color" name="description_color" style="height: 35px; border: 0">
									<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_color_descr_def')</span>
							  	</div>
							  	@if($user->verify == 1)
								  	<label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.verif_icon_color')</label>
								  	<div class="mb-3 text-center d-flex justify-content-center">
										<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->verify_color}}" title="Choose your color" name="verify_color" style="height: 35px; border: 0">
										<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_v_i_c_def')</span>
								  	</div>
							  	@endif
							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_color')</label><br>
							  	<div class="mb-3 text-center d-flex justify-content-center">
									<input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->background_color}}" title="Choose your color" name="background_color" style="height: 35px; border: 0">
							  	</div>
							  	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_download_ava')</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="avatar" style="border: 0">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_download_ava_rules')</span>
								</div>
								<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_img')</label>
							  	<div class="input-group mb-3">
							  		<input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="banner" style="border: 0">
							  		<span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_background_img_descr')</span>
								</div>
                                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Загрузить фавикон</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="favicon" style="border: 0">
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Малюсенькая картинка, которая будет отображаться в верху браузера. Обычно её размер 32х32 пикселя</span>
                                </div>
                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_select_lang')</label>
                                    <select name="locale" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                                        <option selected>@lang('app.p_select')</option>
                                        <option @if($user->locale == 'ru') selected @endif value="ru">Русский</option>
                                        <option @if($user->locale == 'en') selected @endif value="en">English</option>
                                    </select>
                                </div>

                                <div id="link_bar">
                                    <div class=" mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Отображение бара с соц сетями</label>
                                        <select name="social_links_bar" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                                            <option @if($user->social_links_bar == '1') selected @endif value="{{1}}">Включить</option>
                                            <option @if($user->social_links_bar == '0') selected @endif value="{{0}}">Выключить</option>
                                        </select>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если у вас тип страницы "Ссылки", вы можете все свои ссылки с нашими иконками вынести в отдельный бар</span>
                                    </div>

                                    <div class=" mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Позиция бара с соц сетями</label>
                                        <select name="links_bar_position" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                                            <option @if($user->links_bar_position == 'top') selected @endif value="top">Вверху</option>
                                            <option @if($user->links_bar_position == 'bottom') selected @endif value="bottom">Внизу</option>
                                        </select>
                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать где отобразить бар с сылками, вверху или внизу</span>
                                    </div>
                                </div>

                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Показать логотип</label>
                                    <select name="show_logo" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                                        <option @if($user->show_logo == '1') selected @endif value="{{1}}">Показать</option>
                                        <option @if($user->show_logo == '0') selected @endif value="{{0}}">Отключить</option>
                                    </select>
                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Отображать наш логотип на странице или нет</span>
                                </div>

                                <div class=" mb-3">
                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тип страницы</label>
                                    <select id="type-profile" name="type" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                                        <option selected>Выберите тип страницы</option>
                                        <option @if($user->type == 'Links') selected @endif value="Links">Ссылки</option>
                                        <option @if($user->type == 'Events') selected @endif value="Events">Афиша</option>
                                        <option @if($user->type == 'Market') selected @endif value="Market">Магазин</option>
                                    </select>
                                </div>
                                <div id="event-block" style="display:none">
                                	<div class=" mb-3">
	                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Отображение иконок соц сетей</label>
	                                    <select name="show_social" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
	                                        <option selected>Показать иконки соц. сетей или нет</option>
	                                        <option @if($user->show_social == true) selected @endif value="1">Показать</option>
	                                        <option @if($user->show_social == false) selected @endif value="0">Нет</option>
	                                    </select>
	                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Будут отображаться только ссылки с иконками из нашей бд.</span>
	                                </div>
	                                <div class=" mb-3">
	                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Место положение иконок</label>
	                                    <select name="social" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
	                                        <option selected>Показать иконки соц. сетей или нет</option>
	                                        <option @if($user->social == 'TOP') selected @endif value="TOP">Вверху</option>
	                                        <option @if($user->social == 'DOWN') selected @endif value="DOWN">Внизу</option>
	                                    </select>
	                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вверху - между вашим именем и мероприятиями. Внизу - под мероприятиями</span>
	                                </div>
                                </div>
                                <div class="d-grid gap-2">
								  	<button type="submit" class="btn btn-secondary mb-1 mt-3" style="font-family: 'Rubik', sans-serif; border: 0; color: white">@lang('app.p_edit_prof')</button>
								</div>
							</form>
				      	</div>
				    </div>
		  		</div>
			</div>
    	</div>

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








