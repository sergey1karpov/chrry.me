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

    {{--OWL--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @include('fonts.fonts')

    {{--Shop--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    @include('fonts.fonts')
    <style type="text/css">
        body {
            background-color: {{ $designProduct['dp_bg_color']}};
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
        .btn-check:focus+.btn, .btn:focus {
            box-shadow: none;
        }
        .accordion-button:focus {
            z-index: 3;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: none;
        }
    </style>
</head>
<body class="antialiased">
<nav class="fixed-top" style="margin-top: 12px; margin-right: 12px; margin-left: 12px">
    <div class="row d-d-flex justify-content-between">
        <div class="col-2 d-flex justify-content-center" style="padding: 0">
            @auth
                @if(Auth::user()->id == $user->id)
                    <div>
                        <a class="btn  d-flex align-content-center" href="{{ route('userHomePage', ['user' => $user->slug]) }}">
                            <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">arrow_back_ios_new</span>
                        </a>
                    </div>
                @endif
            @endauth
        </div>
        <div class="col-2 d-flex justify-content-center" style="padding: 0">
            @if($user->type == 'Market')
                <div>
                    <button type="button" class="btn  d-flex align-content-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="border: 0">
                        <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">linear_scale</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</nav>
@if($user->type == 'Market')
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header text-center" style="background-color: {{$user->marketSettings->canvas_color}}">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1.2rem; color: {{$user->marketSettings->canvas_font_color}}">Меню</h5>
            <button type="button" class="btn d-flex align-content-center" data-bs-dismiss="offcanvas" aria-label="Close" style="border: 0">
                <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">close</span>
            </button>
        </div>
        <div class="offcanvas-body text-center" style="max-width: none; background-color: {{$user->marketSettings->canvas_color}}">
            @if($user->marketSettings->show_search)
                @if($user->marketSettings->search_position == 'on_canvas' || $user->marketSettings->search_position == 'main_and_canvas')
                    <div class="d-flex justify-content-center mb-5">
                        <div class="col-12 d-flex justify-content-center align-items-center" >
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
        </div>
    </div>
@endif
<div class="text-black" style="padding: 0;">

    @if($product->additional_photos)
        @php
            $adds_ph = unserialize($product->additional_photos);
            array_unshift($adds_ph, $product->main_photo);
        @endphp
        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($adds_ph as $key => $ph)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <img src="../{{$ph}}" class="card-img-top" alt="Apple Computer" style="border-radius: 0" />
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="../{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: 0" />
                </div>
            </div>
        </div>
    @endif
    <div class="card-body" style="padding: 0">
        <div class="">
            <h5 class="card-title mb-3 mt-2 me-2 ms-2 {{$designProduct['dp_title_position']}}" style="
                font-family: '{{ $designProduct['dp_title_font'] ?? 'Inter'}}', sans-serif;
                font-size: {{ $designProduct['dp_title_font_size'] }}rem;
                color: {{ $designProduct['dp_title_font_color'] }};
                text-shadow: {{ $designProduct['dp_title_font_shadow_right'] }}px {{ $designProduct['dp_title_font_shadow_bottom'] }}px {{ $designProduct['dp_title_font_shadow_blur'] }}px {{ $designProduct['dp_title_font_shadow_color'] }};
            ">{{$product->title}}</h5>
            <p class="mb-4 me-2 ms-2 {{$designProduct['dp_description_position']}}" style="
                white-space: pre-wrap;
                font-family: '{{ $designProduct['dp_description_font'] ?? 'Inter'}}', sans-serif;
                font-size: {{ $designProduct['dp_description_font_size'] }}rem;
                color: {{ $designProduct['dp_description_font_color']}};
                text-shadow: {{ $designProduct['dp_description_font_shadow_right'] }}px {{ $designProduct['dp_description_font_shadow_bottom'] }}px {{ $designProduct['dp_description_font_shadow_blur'] }}px {{ $designProduct['dp_description_font_shadow_color'] }};
            ">{{$product->description}}</p>
            @if($product->full_description)
                <p class="mb-4 me-2 ms-2 {{$designProduct['dp_full_description_position']}}" style="
                                white-space: pre-wrap;
                                font-family: '{{ $designProduct['dp_full_description_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_full_description_font_size'] }}rem;
                                color: {{ $designProduct['dp_full_description_font_color']}};
                                text-shadow: {{ $designProduct['dp_full_description_font_shadow_right'] }}px {{ $designProduct['dp_full_description_font_shadow_bottom'] }}px {{ $designProduct['dp_full_description_font_shadow_blur'] }}px {{ $designProduct['dp_full_description_font_shadow_color'] }};
                                ">{{$product->full_description}}</p>
            @endif
        </div>
        <div class="me-2 ms-2 d-flex justify-content-between total font-weight-bold mt-5">
            <span style="
                                font-family: '{{ $designProduct['dp_price_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_price_font_size'] }}rem;
                                color: {{ $designProduct['dp_price_font_color']}};
                                text-shadow: {{ $designProduct['dp_price_font_shadow_right'] }}px {{ $designProduct['dp_price_font_shadow_bottom'] }}px {{ $designProduct['dp_price_font_shadow_blur'] }}px {{ $designProduct['dp_price_font_shadow_color'] }};
                            ">Цена</span><span style="
                                font-family: '{{ $designProduct['dp_price_font'] ?? 'Inter'}}', sans-serif;
                                font-size: {{ $designProduct['dp_price_font_size'] }}rem;
                                color: {{ $designProduct['dp_price_font_color'] }};
                                text-shadow: {{ $designProduct['dp_price_font_shadow_right'] }}px {{ $designProduct['dp_price_font_shadow_bottom'] }}px {{ $designProduct['dp_price_font_shadow_blur'] }}px {{ $designProduct['dp_price_font_shadow_color'] }};
                                "><b>{{$product->price}}</b> рублей</span>
        </div>
    </div>
</div>
</div>
<div class="d-grid gap-2 mt-3 me-2 ms-2 mb-2">
    @if($product->link_to_shop)
        <a class="btn btn-primary" href="{{$product->link_to_shop}}" style="
            background-color: {{ $designProduct['dp_btn_color_remote'] }};
            border-radius: {{ $designProduct['dp_btn_radius_remote'] }}px;
            border: none;
        ">
            <h1 style="
                margin-bottom: 0;
                color: {{ $designProduct['dp_btn_text_color_remote'] }};
                font-size: {{ $designProduct['dp_btn_text_size_remote'] }}rem;
                font-family: '{{ $designProduct['dp_btn_text_font_remote'] ?? 'Inter'}}', sans-serif;
                text-shadow:  {{ $designProduct['dp_btn_text_shadow_right_remote'] }}px {{ $designProduct['dp_btn_text_shadow_bottom_remote'] }}px {{ $designProduct['dp_btn_text_shadow_blur_remote'] }}px {{ $designProduct['dp_btn_text_shadow_color_remote'] }};
            ">{{$product->link_to_shop_text}}</h1>
        </a>
    @endif
    @if($product->link_to_order_text)
        <a class="btn btn-primary" href="{{ route('showProductOrderForm', ['user' => $user->slug, 'product' => $product->id]) }}" style="
            background-color: {{ $designProduct['dp_btn_color_chrry'] }};
            border-radius: {{ $designProduct['dp_btn_radius_chrry'] }}px;
            border: none;
        ">
            <h1 style="
                margin-bottom: 0;
                color: {{ $designProduct['dp_btn_text_color_chrry'] }};
                font-size: {{ $designProduct['dp_btn_text_size_chrry'] }}rem;
                font-family: '{{ $designProduct['dp_btn_text_font_chrry'] ?? 'Inter'}}', sans-serif;
                text-shadow:  {{ $designProduct['dp_btn_text_shadow_right_chrry'] }}px {{ $designProduct['dp_btn_text_shadow_bottom_chrry'] }}px {{ $designProduct['dp_btn_text_shadow_blur_chrry'] }}px {{ $designProduct['dp_btn_text_shadow_color_chrry'] }};
            ">{{$product->link_to_order_text}}</h1>
        </a>
    @endif
</div>
</body>
</html>








