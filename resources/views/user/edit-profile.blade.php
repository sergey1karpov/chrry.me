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
                        <input data-id="{{$user->id}}" id="theme" name="theme" class="form-check-input shadow" type="checkbox" @if($user->dayVsNight == true) checked @endif style="border: 0">
                    </div>
                </div>
            </nav>

			<!-- БЛОК: Ссылка на профиль -->
			<div class="row">
				<a href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">

                    @if(isset($user->userSettings->logotype))
                        <div class="d-flex justify-content-center block1 box-part text-center @if($user->dayVsNight) bg-dark @endif" style="margin: 0; background-color: #f26868">
                            <img src="{{$user->userSettings->logotype}}" class="img-fluid" width="{{$user->userSettings->logotype_size}}" style="
                                filter: drop-shadow({{$user->userSettings->logotype_shadow_right}}px {{$user->userSettings->logotype_shadow_bottom}}px {{$user->userSettings->logotype_shadow_round}}px {{$user->userSettings->logotype_shadow_color}});
                            ">
                        </div>
                    @else
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
                    @endif
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
                                        <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">
                                            Магазин
                                        </h4>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Добавление\изменение товара, управление товарами, прием заказов</h4>
                                    </div>
                                    <div class="col-12 text-start">
                                        @if(count($user->orders->where('order_status', \App\Models\Order::NEW_ORDER)) != 0)
                                            <h1 style="color: white; font-family: 'Inter', sans-serif; font-size: 0.8rem;" class="@if($user->dayVsNight) text-white-50 @endif">
                                                Новых заявок: <span class="badge" style="border: 0; margin-left: 1px; background-color: mediumseagreen">{{count($user->orders->where('order_status', \App\Models\Order::NEW_ORDER))}}</span>
                                            </h1>
                                        @endif
                                        @if(count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER)) != 0)
                                            <h1 style="color: white; font-family: 'Inter', sans-serif; font-size: 0.8rem;" class="@if($user->dayVsNight) text-white-50 @endif">
                                                Заявки в работе: <span class="badge" style="border: 0; margin-left: 1px; background-color: dodgerblue">{{count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER))}}</span>
                                            </h1>
                                        @endif
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
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Заказы
                                                                </h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Управляйте своими заказами</h4>
                                                            </div>
                                                            <div class="col-12 text-start">
                                                                @if(count($user->orders->where('order_status', \App\Models\Order::NEW_ORDER)) != 0)
                                                                    <h1 style="color: white; font-family: 'Inter', sans-serif; font-size: 0.8rem;" class="@if($user->dayVsNight) text-white-50 @endif">
                                                                        Новых заявок: <span class="badge" style="border: 0; margin-left: 1px; background-color: mediumseagreen">{{count($user->orders->where('order_status', \App\Models\Order::NEW_ORDER))}}</span>
                                                                    </h1>
                                                                @endif
                                                                @if(count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER)) != 0)
                                                                    <h1 style="color: white; font-family: 'Inter', sans-serif; font-size: 0.8rem;" class="@if($user->dayVsNight) text-white-50 @endif">
                                                                        Заявки в работе: <span class="badge" style="border: 0; margin-left: 1px; background-color: dodgerblue">{{count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER))}}</span>
                                                                    </h1>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr style="margin: 0">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('marketSettingsForm', ['id' => $user->id]) }}">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/7Y1wz8p/settings-2.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Настройки</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Управление вашей витриной, изменение внешнего вида и другие настройки</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr style="margin: 0">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('allCategories', ['id' => $user->id]) }}">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-4" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="m-5" style="background-image: url(https://i.ibb.co/RCxVWyr/category.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
                                                    </div>
                                                    <div class="col-8 d-flex align-items-center" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding-left: 0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">Категории</h4>
                                                            </div>
                                                            <div class="col-12">
                                                                <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">Воспользуйтесь данным функционалом если хотите подключить категории для своих товаров</h4>
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
				<div class="col-12" style="padding-right: 7px; padding: 0">
					<div class="block1 row shadow @if($user->dayVsNight) bg-dark @endif" style="background-color: #f26868">
						<div class="col-4">
							<div class="m-5" style="background-image: url(https://i.ibb.co/7vrtV67/settings-1.png); width: 60px;height: 60px;margin-right: 0;background-position: center center;-wekit-background-size: cover;background-size: cover;background-repeat: no-repeat;"></div>
						</div>
                        <div class="col-8 d-flex align-items-center">
                            <a href="{{ route('profileSettingsForm', ['id' => $user->id]) }}" style="border: 0">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="block1-text mt-4 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-weight: 600 ;">@lang('app.settings')</h4>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="block1-text mb-3 text-start @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; color: white; font-size: 0.7rem">@lang('app.settings_description')</h4>
                                    </div>
                                </div>
                            </a>
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
                    <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif" style="border-radius: 0">
                    <div class="block-modal modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">
                        <h5 class="modal-title" id="exampleModalLabel">Просмотры профиля</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div class="block-modal accordion @if($user->dayVsNight) bg-dark text-white-50 @endif" id="accordionExample" >
                            <div class="block-modal accordion-item @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="block-modal accordion-button @if($user->dayVsNight) bg-dark text-white-50 @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        @lang('app.s_day')
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="block-modal accordion-body text-center @if($user->dayVsNight) bg-dark text-white-50 @endif">
                                        <h1 class="display-4" style="margin: 0">{{count($stat['dayStatistic'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['dayStatistic']['dayUniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['dayStatistic']['dayUniqueCountry'] as $c)
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
                                        <h1 class="display-4" style="margin: 0">{{count($stat['monthStatistic'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['monthStatistic']['monthUniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['monthStatistic']['monthUniqueCountry'] as $c)
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
                                        <h1 class="display-4" style="margin: 0">{{count($stat['yearStatistic'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['yearStatistic']['yearUniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['yearStatistic']['yearUniqueCountry'] as $c)
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
                                        <h1 class="display-4" style="margin: 0">{{count($stat['allTimeStatistic'])}}</h1>
                                        <h1 class="display-4 mb-3" style="font-size: 1rem">@lang('app.s_profile_show')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['allTimeStatistic']['allUniqueCity'] as $c)
											<li class="block-input list-group-item d-flex justify-content-between align-items-center @if($user->dayVsNight) bg-secondary @endif" style="border-top: 0; border-left: 0; border-right: 0; border-radius: 0">
												{{$c->city}}
											  	<span class="badge bg-light" style="color: black">{{$c->count}}</span>
											</li>
											@endforeach
										</ul>
										<h1 class="display-4" style="font-size: 1rem">@lang('app.s_countries')</h1>
										<ul class="list-group mb-3">
											@foreach($stat['allTimeStatistic']['allUniqueCountry'] as $c)
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
                        url: "/"+"id"+id+"/edit-profile/change-theme",
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








