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
        .btn-check:focus+.btn, .btn:focus {
            box-shadow: none;
        }
    </style>
</head>
<body class="antialiased">
<div class="text-black" style="border:none">

    @if($product->additional_photos)
        @php
            $adds_ph = unserialize($product->additional_photos);
            array_unshift($adds_ph, $product->main_photo);
        @endphp
        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($adds_ph as $key => $ph)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <img src="../{{$ph}}" class="card-img-top" alt="Apple Computer" />
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$product->id}}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$product->id}}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="../{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$product->id}}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$product->id}}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif
    <div class="card-body" style="padding: 0">
        <div class="">
            <h5 class="card-title mb-3 mt-2 me-2 ms-2">{{$product->title}}</h5>
            <p class="text-muted mb-4 me-2 ms-2" style="white-space: pre-wrap;">{{$product->description}}</p>
            @if($product->full_description)
                <p class="mb-4 me-2 ms-2" style="white-space: pre-wrap;">{{$product->full_description}}</p>
            @endif
        </div>
        <div class="me-2 ms-2 d-flex justify-content-between total font-weight-bold mt-5">
            <span>Цена</span><span><b>{{$product->price}}</b> рублей</span>
        </div>
    </div>
</div>
<div class="d-grid gap-2 mt-3 me-2 ms-2 mb-2">
    @if($product->link_to_shop)
        <a class="btn btn-primary" href="{{$product->link_to_shop}}">
            {{$product->link_to_shop_text}}
        </a>
    @endif
    @if($product->link_to_order_text)
        <a class="btn btn-primary" href="{{ route('showProductOrderForm', ['user' => $user->slug, 'product' => $product->id]) }}">
            {{$product->link_to_order_text}}
        </a>
    @endif
</div>
</body>
</html>








