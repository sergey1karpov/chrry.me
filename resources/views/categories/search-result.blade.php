<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }}</title>
    {{-- Animation animate.style --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">

    {{-- Bootstrap 5 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    {{-- Icon verification --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/clipboard.js/latest/clipboard.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-embed-styles />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">

    @include('fonts.fonts')

    {{--Shop--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style type="text/css">
        @if($user->banner)
	        	body {
            background: url({{ $user->banner }}) no-repeat center center fixed;
            background-size: cover;
        }
        @elseif($user->banner == null & $user->background_color != null)
				body {
            background-color: {{$user->background_color}};
        }
        @endif
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
        span{
            font-size:15px;
        }
        a{
            text-decoration:none;
            color: #0062cc;
            /* border-bottom:2px solid #0062cc; */
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
        .text{
            margin:20px 0px;
        }
        .p-text {
            white-space: nowrap;
            overflow: hidden;
            max-width: 400px;
            position: relative;
        }

        .p-text::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 70px;
            height: 100%;
            /*background: linear-gradient(to right, rgba(255, 255, 255, .2) 0%, rgba(255, 255, 255, 1) 100%);*/
            background: linear-gradient(to right, rgba({{$user->background_color_rgb}}, .2) 0%, rgba({{$user->background_color_rgb}}, 1) 100%);
            pointer-events: none;
        }
        .ts-control {
            border: 0;
            box-shadow: 0px 1px 10px 2px rgba(0, 0, 0, 0.2);
        }
         .material-symbols-outlined {
             font-variation-settings:
                 'FILL' 0,
                 'wght' 400,
                 'GRAD' 0,
                 'opsz' 48
         }
        .btn-check:focus+.btn, .btn:focus {
            box-shadow: none;
        }
        .accordion-button:focus {
            box-shadow: none;
        }
        .accordion-collapse {
            border-radius: 10px;
        }
    </style>
</head>
<body class="antialiased">

{{--Menu off-canvas--}}
<nav class="fixed-top" style="margin-top: 12px; margin-right: 12px; margin-left: 12px">
    <div class="row">
        <div class="col-10" style="padding-right: 0">
            <div class="accordion accordion-flush " id="accordionFlushExample" style="border-radius: 25px;">
                <div class="accordion-item" style="border-radius: 25px;">
                    <h2 class="accordion-header rounded" id="flush-headingOne" style="border-radius: 25px;">
                        <button class="p-2 accordion-button collapsed shadow rounded" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="border: 0; border-radius: 25px;">
                            @if(isset($productCategory->name))
                                Фильтровать "{{$productCategory->name ?? null}}"
                            @endif
                            @if(isset($search))
                                Фильтровать запрос "{{$search ?? null}}"
                            @endif
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            @if(isset($categorySlug))
                                <form action="{{ route('categoryFilter', ['user' => $user->slug]) }}">
                            @elseif(!isset($categorySlug))
                                <form action="{{ route('fullTextFilter', ['user' => $user->slug]) }}">
                            @endif

                                <input type="hidden" name="searchValue" value="{{$search ?? null}}">
                                <input type="hidden" name="categorySlug" value="{{$categorySlug ?? null}}">

                                <div class="row" style="margin: 0">
                                    @if(!isset($categorySlug))
                                        <div class="col-12 mb-2" style="padding: 0">
                                            <select class="form-select shadow" aria-label="Default select example" style="border: 0" name="category">
                                                @if(request()->category)
                                                    <option checked>{{request()->category}}</option>
                                                @endif
                                                @if(request()->category != 'Все товары') <option style="background-color: antiquewhite">Все товары</option> @endif
                                                @foreach($user->productCategories as $k => $c)
                                                    <option style="background-color: antiquewhite">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-12" style="padding: 0">
                                        <div class="mb-2 d-flex">
                                            <input type="text" name="min" class="form-control shadow" placeholder="от" style="border: 0; margin-right: 4px" value="{{request()->min}}">
                                            <input type="text" name="max" class="form-control shadow" placeholder="до" style="border: 0; margin-left: 4px" value="{{request()->max}}">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2" style="padding: 0">
                                        <select class="form-select shadow" aria-label="Default select example" style="border: 0" name="date_pub">
                                            <option @if(request()->date_pub == 'Новые') selected @endif>Новые</option>
                                            <option @if(request()->date_pub == 'Старые') selected @endif>Старые</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-2" style="padding: 0">
                                        <div class="d-grid gap-2">
                                            <button class="btn shadow" type="submit" style="background-color: white">Фильтровать</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 d-flex justify-content-center" style="padding: 0">
            @if($user->type == 'Market')
                <div>
                    <button type="button" class="btn d-flex align-content-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="border: 0">
                        <span class="material-symbols-outlined" style="color: {{$user->navigation_color}}">linear_scale</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</nav>

@if($user->type == 'Market')
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header text-center" style="background-color: {{$user->marketSettings->canvas_color}}">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1.2rem;color: {{$user->marketSettings->canvas_font_color}}">Категории товаров</h5>
            <button type="button" class="btn d-flex align-content-center" data-bs-dismiss="offcanvas" aria-label="Close" style="border: 0">
                <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">close</span>
            </button>
        </div>
        <div class="offcanvas-body text-center" style="max-width: none; background-color: {{$user->marketSettings->canvas_color}}">
            @if($user->marketSettings->show_search)
                @if($user->marketSettings->search_position == 'on_canvas' || $user->marketSettings->search_position == 'main_and_canvas')
                    <div class="d-flex justify-content-center mb-5">
                        <div class="col-12 d-flex justify-content-center align-items-center" style="padding-right: 12px; padding-left: 12px">
                            <form class="" action="{{ route('fullTextSearch', ['user' => $user->slug]) }}" style="width: 100%">
                                <input class="form-control me-2 shadow" type="search" name="search" placeholder="Поиск..." aria-label="Search" style="border: 0">
                            </form>
                        </div>
                    </div>
                @endif
            @endif
            @foreach($user->productCategories as $category)
                <a href="{{ route('showProductsInCategory', ['user' => $user->slug, 'categorySlug' => $category->slug]) }}" style="color: {{$user->marketSettings->canvas_font_color}}">
                    <h5 class="offcanvas-title mt-2" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1rem;">{{$category->name}}</h5>
                </a>
            @endforeach
                <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                    <label class="mb-3" style="font-family: 'Inter', sans-serif; font-size: 1rem; color: {{$user->navigation_color}}">Правила продавца</label>
                    <div class="accordion-item" style="border-radius: 10px">
                        <h2 class="accordion-header rounded" id="flush-headingOne">
                            <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Оплата товара</h1>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse rounded-4" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body rounded-4 text-start " style="white-space: pre-wrap;">
                                <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->payment_rules }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="border-radius: 10px">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Информация о доставке</h1>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start " style="white-space: pre-wrap;">
                                <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->delivery_rules }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="border-radius: 10px">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Информация о возврате товара</h1>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start " style="white-space: pre-wrap;">
                                <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->refund_rules }}</h1>
                            </div>
                        </div>
                    </div>
                    @if($user->marketSettings->other_rules)
                        <div class="accordion-item" style="border-radius: 10px">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Общая информация о правилах магазина</h1>
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body text-start " style="white-space: pre-wrap;">
                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->other_rules }}</h1>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if($user->type == 'Market')
                    @if($user->marketSettings->show_social)
                        @if(count($user->userLinks(false)) > 0)
                            <nav class="navbar mt-2 mb-2">
                                <div class="container-fluid d-flex justify-content-center">
                                    @foreach($user->userLinks(false) as $link)
                                        @if($link->icon)
                                            <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf
                                                <input type="hidden" name="link_id" value="{{$link->id}}">
                                                <input type="hidden" name="link_url" value="{{$link->link}}">
                                                <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                    <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                            width:{{ $user->round_links_width }}px;
                                                            filter: drop-shadow({{ $user->round_links_shadow_right }}px {{ $user->round_links_shadow_bottom }}px {{ $user->round_links_shadow_round }}px {{ $user->round_links_shadow_color }})
                                                        ">
                                                </button>
                                            </form>
                                        @endif
                                    @endforeach
                                </div>
                            </nav>
                        @endif
                    @endif
                @endif
            <div class="offcanvas-body text-center fixed-bottom " style="max-width: none">
                <a href="{{ route('userHomePage', ['user' => $user->slug]) }}" style="font-family: 'Inter', sans-serif; font-size: 2rem; text-decoration: none; color: #080808">
                    <span class="material-symbols-outlined" style="font-size: 25px; color: {{$user->navigation_color}}">home</span>
                </a>
            </div>
        </div>
    </div>
@endif

@if($user->type == 'Market')
    <div style="margin-top: 60px">
        @if($products->count() == 0)
            <div class="text-center ms-2 me-2">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        <h1 style="font-family: 'Roboto Flex', sans-serif; font-size: 1.2rem">По вашему запросу ничего не найдено. Измените параметры фильтров поиска</h1>
                    </div>
                </div>
            </div>
        @endif

        @if(isset($user->marketSettings->cards_style))
            @if($user->marketSettings->cards_style == 'one')
                @foreach($products as $product)
                    <div class="container mt-2">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <form id="submit-prod" method="POST" action="{{ route('productStats', ['user' => $user->id]) }}"> @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="text-black mb-3" style="border: 0; border-radius: 10px;">
                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                            <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: {{$user->marketSettings->card_round}}px; @if($user->marketSettings->cards_shadow) box-shadow: 0px 5px 5px -5px rgba(0, 0, 0, 0.6); @endif" />
                                        </button>
                                        <div class="card-body mt-2" style="padding: 0">
                                            <div class="text-start">
                                                <p class="mb-1" style="
                                                                @if($user->marketSettings->title_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif
                                                                white-space: nowrap;
                                                                overflow: hidden;
                                                                text-overflow: ellipsis;
                                                                font-family: 'Roboto Flex', sans-serif;
                                                                font-size: {{$user->marketSettings->title_font_size}}rem;
                                                                @if($user->marketSettings->color_title) color: {{$user->marketSettings->color_title}}; @endif"
                                                >{{$product->title}}</p>
                                                <p style="
                                                                @if($user->marketSettings->price_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif
                                                                margin: 0; font-family: 'Roboto Flex', sans-serif;
                                                                font-size: {{$user->marketSettings->price_font_size}}rem;
                                                                @if($user->marketSettings->color_price) color: {{$user->marketSettings->color_price}}; @endif"
                                                ><b>₽ {{$product->price}}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif($user->marketSettings->cards_style == 'two')
                <div class="row ms-1 me-1" style="margin: 0">
                    @foreach($products as $product)
                        <div class="col-6 p-2" style="padding: 0">
                            <div class="container mt-2" style="padding: 0">
                                <div class="row justify-content-center" onclick="productStats{{$product->id}}()">
                                    <div class="col-md-8 col-lg-6 col-xl-4">
                                        <form id="submit-prod" method="POST" action="{{ route('productStats', ['user' => $user->id]) }}"> @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="text-black mb-3" style="border: 0; border-radius: 10px;">
                                                <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                    <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: {{$user->marketSettings->card_round}}px; @if($user->marketSettings->cards_shadow) box-shadow: 0px 5px 5px -5px rgba(0, 0, 0, 0.6); @endif" />
                                                </button>
                                                <div class="card-body mt-2" style="padding: 0">
                                                    <div class="text-start">
                                                        <p class="mb-1" style="
                                                                @if($user->marketSettings->title_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif
                                                                white-space: nowrap;
                                                                overflow: hidden;
                                                                text-overflow: ellipsis;
                                                                font-family: 'Roboto Flex', sans-serif;
                                                                font-size: {{$user->marketSettings->title_font_size}}rem;
                                                                @if($user->marketSettings->color_title) color: {{$user->marketSettings->color_title}}; @endif"
                                                        >{{$product->title}}</p>
                                                        <p style="
                                                                @if($user->marketSettings->price_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif
                                                                margin: 0; font-family: 'Roboto Flex', sans-serif;
                                                                font-size: {{$user->marketSettings->price_font_size}}rem;
                                                                @if($user->marketSettings->color_price) color: {{$user->marketSettings->color_price}}; @endif"
                                                        ><b>₽ {{$product->price}}</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="mb-2 mt-3 d-flex justify-content-center">
                {{$products->links('vendor.pagination.default', ['user' => $user])}}
            </div>
        @else
            @if(Auth::check())
                <div class="mt-5 mb-5 me-3 ms-3 text-center">
                    <p>Для первого запуска витрины, её необходимо настроить. </p>
                    <div class="d-grid gap-2">
                        <a href="{{ route('marketSettingsForm', ['id' => $user->id]) }}">
                            <button class="btn btn-primary" type="button" style="border: 0">Настройки витрины</button>
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endif

@if($user->type == 'Market')
    @if($user->show_social == true)
        @if($user->social == 'DOWN')
            @if(count($user->userLinksInBar($user)) > 0)
                <nav class="navbar mt-4">
                    <div class="container-fluid d-flex justify-content-center">
                        @foreach($user->userLinksInBar($user) as $link)
                            @if($link->icon)
                                <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                    <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                    width:{{ $user->round_links_width }}px;
                                                    filter: drop-shadow({{ $user->round_links_shadow_right }}px {{ $user->round_links_shadow_bottom }}px {{ $user->round_links_shadow_round }}px {{ $user->round_links_shadow_color }})
                                                ">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </nav>
            @endif
        @endif
    @endif
@endif

@if($user->show_logo == true)
    <div class="container-fluid justify-content-center text-center mb-4 " style="margin-top: 70px">
        <div class="d-flex justify-content-center text-center">
            <div class="text-center" style="margin-top: 25px">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('welcome') }}" style="border-bottom: none">
                        <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="img-fluid" width="100">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
</body>

</html>








