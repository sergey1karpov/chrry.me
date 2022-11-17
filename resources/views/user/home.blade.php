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

        <!-- ---------------------- -->
        <!-- Стрелка обратно в меню -->
        <!-- ---------------------- -->

        <nav class="fixed-top" style="margin-top: 12px; margin-right: 12px; margin-left: 12px">
            <div class="row d-d-flex justify-content-between">
                <div class="col-2 d-flex justify-content-center" style="padding: 0">
                    @auth
                        @if(Auth::user()->id == $user->id)
                            <div>
                                <a class="btn  d-flex align-content-center" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                                    <span class="material-symbols-outlined" style="border: 0; color: {{$user->marketSettings->btn_color}}">admin_panel_settings</span>
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
                <div class="col-2 d-flex justify-content-center" style="padding: 0">
                    @if($user->type == 'Market')
                        <div>
                            <button type="button" class="btn  d-flex align-content-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="border: 0">
                                <span class="material-symbols-outlined" style="border: 0; color: {{$user->marketSettings->btn_color}}">linear_scale</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        @if($user->type == 'Market')
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header text-center" style="background-color: {{$user->marketSettings->canvas_color}}">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1.2rem; color: {{$user->marketSettings->canvas_font_color}}">Категории товаров</h5>
                    <button type="button" class="btn d-flex align-content-center" data-bs-dismiss="offcanvas" aria-label="Close" style="border: 0">
                        <span class="material-symbols-outlined" style="border: 0; color: {{$user->marketSettings->btn_color}}">close</span>
                    </button>
                </div>
                <div class="offcanvas-body text-center" style="max-width: none; background-color: {{$user->marketSettings->canvas_color}}">
                    @if($user->marketSettings->show_search)
                        @if($user->marketSettings->search_position == 'on_canvas' || $user->marketSettings->search_position == 'main_and_canvas')
                            <div class="d-flex justify-content-center mb-5">
                                <div class="col-12 d-flex justify-content-center align-items-center" style="padding-right: 12px; padding-left: 12px">
                                    <form class="" action="{{ route('fullTextSearch', ['slug' => $user->slug]) }}" style="width: 100%">
                                        <input class="form-control me-2 shadow" type="search" name="search" placeholder="Поиск..." aria-label="Search" style="border: 0">
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endif
                    @foreach($categories as $category)
                        <a href="{{ route('showProductsInCategory', ['slug' => $user->slug, 'categorySlug' => $category->slug]) }}" style="color: {{$user->marketSettings->canvas_font_color}}">
                            <h5 class="offcanvas-title mt-2" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1rem;">{{$category->name}}</h5>
                        </a>
                    @endforeach
                </div>
                <div class="offcanvas-body text-center fixed-bottom" style="max-width: none; background-color: {{$user->marketSettings->canvas_color}}">
                    @if($user->type == 'Market')
                        @if($user->marketSettings->show_social)
                            @if(count($links) > 0)
                                <nav class="navbar mt-2 mb-2">
                                    <div class="container-fluid d-flex justify-content-center">
                                        @foreach($links as $link)
                                            @if($link->icon)
                                                <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                                    <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                        width:{{ $user->userSettings->round_links_width }}px;
                                                        filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
                                                    ">
                                                </a>
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

        <!-- ---------------------- -->
        <!-- Карточка юзера -->
        <!-- ---------------------- -->

        <div class="container-fluid justify-content-center text-center mb-2">

            @if ($message = Session::get('success'))
                <div class="row">
                    <div class="col-12" style="padding: 0">
                        <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin: 0;">
                            <div class="title">
                                <span style="font-family: 'Rubik', sans-serif; font-size: 100%; line-height: 16px; display:block; color: white;">{{$message}}</span>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif

	        <div class="d-flex justify-content-center text-center">
		      	<div class="text-center" style="margin-top: 25px">

                    @if(isset($user->userSettings->logotype))
                        <div class="d-flex justify-content-center">
                            <img src="{{$user->userSettings->logotype}}" class="img-fluid" width="{{$user->userSettings->logotype_size}}" style="
                                filter: drop-shadow({{$user->userSettings->logotype_shadow_right}}px {{$user->userSettings->logotype_shadow_bottom}}px {{$user->userSettings->logotype_shadow_round}}px {{$user->userSettings->logotype_shadow_color}});
                            ">
                        </div>
                    @else
                        @if($user->avatar)
                            <div class="d-flex justify-content-center">
                                <div class="img" style="background-image: url({{$user->avatar}});"></div>
                            </div>
                        @endif
                        <h2 class="mt-4" style="font-family: 'Rubik', sans-serif; color: #464646; font-weight: 600 ; font-size: 20px; @if($user->name_color) color: {{$user->name_color}}; @endif ">
                            {{ $user->name }}
                            @if($user->verify == 1)
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->verify_color}}">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                </svg>
                            @endif
                        </h2>
                        @if($user->description)
                            <p style="font-family: 'Rubik', sans-serif; font-size: 0.9rem; @if($user->description_color) color: {{$user->description_color}}; @endif">{{ $user->description }}</p>
                        @endif
                    @endif

                    @if($user->type == 'Events')
                        @if($user->show_social == true)
                            @if($user->social == 'TOP')
                                @if(count($links) > 0)
                                    <nav class="navbar mt-2">
                                        <div class="container-fluid d-flex justify-content-center">
                                            @foreach($links as $link)
                                                @if($link->icon)
                                                    <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                                        <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                            width:{{ $user->userSettings->round_links_width }}px;
                                                            filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
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

                    @if($user->type == 'Market')
                        @if($user->show_social == true)
                            @if($user->social == 'TOP')
                                @if(count($links) > 0)
                                    <nav class="navbar mt-2 mb-2">
                                        <div class="container-fluid d-flex justify-content-center">
                                            @foreach($user->userLinksInBar($user) as $link)
                                                @if($link->icon)
                                                    <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                                        <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                            width:{{ $user->userSettings->round_links_width }}px;
                                                            filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
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

                    @if($user->type == 'Links')
                        @if($user->social_links_bar == 1)
                            @if($user->links_bar_position == 'top')
                                @if(count($links) > 0)
                                    <nav class="navbar mt-2">
                                        <div class="container-fluid d-flex justify-content-center">
                                            @foreach($links as $link)
                                                @if($link->icon)
                                                    <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                                        <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                            width:{{ $user->userSettings->round_links_width }}px;
                                                            filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
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

		      	</div>
	    	</div>
	    </div>


        <!-- ---------------------- -->
        <!-- Контент -->
        <!-- ---------------------- -->

        @if($user->type == 'Links')

            <!-- ---------------------- -->
            <!-- Закрепленные ссылки -->
            <!-- ---------------------- -->
            <table class="table" style="margin-bottom: 0">
                <tbody>
                    @foreach($pinnedLinks as $link)
                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                                <div class="container" style="padding-left:8px; padding-right:8px">
                                    <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->
                                    @if($link->type != 'POST')<a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">@elseif($link->type == 'POST') <a style="text-decoration:none" onclick="countRabbits{{$link->id}}()"> @endif
                                        <div class="@if($link->animation) {{$link->animation}} @endif row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">
                                            <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
                                                <!-- Картинка -->
                                                <div class="col-1">
                                                    @if($link->icon)
                                                        <img src="{{$link->icon}}" style="width:50px;">
                                                    @elseif($link->photo)
                                                        <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @else
                                                        <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">
                                                    @endif
                                                </div>
                                                <!-- Текст ссылки -->
                                                <div class=" col-10 text-center">
                                                    <div class="me-5 ms-5">
                                                        <h4 style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{ $link->font ?? 'Inter' }}', sans-serif; line-height: 1.3; font-size: {{$link->font_size}}rem; margin-top: 2px; margin-bottom: 0; color: {{$link->title_color}};">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                    </div>
                                                </div>
                                                <!-- Пустой div -->
                                                <div class="col-1">
                                                    @if(Auth::check())
                                                        @if(Auth::user()->id == $user->id)
                                                            <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">
                                                                <img src="https://cdn3.iconfinder.com/data/icons/office-outline-15/64/Office_Icon_Set_Outline-10-512.png" width="20">
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @if($link->type != 'POST')</a>@endif
                                </div>
                    @endforeach
                </tbody>
            </table>
            <!-- ---------------------- -->
            <!-- Обычные ссылки -->
            <!-- ---------------------- -->
            @if($user->social_links_bar == 0)
                <table class="table">
                    <tbody>
                    @foreach($links as $link)
                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                                <div class="container" style="padding-left:8px; padding-right:8px">
                                    <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->
                                    <a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">
                                        <div class="@if($link->animation) {{$link->animation}} @endif row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">
                                            <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
                                                <!-- Картинка -->
                                                <div class="col-1">
                                                    @if($link->icon)
                                                        <img src="{{$link->icon}}" style="width:50px;">
                                                    @elseif($link->photo)
                                                        <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @else
                                                        <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">
                                                    @endif
                                                </div>
                                                <!-- Текст ссылки -->
                                                <div class="col-10 text-center d-flex align-items-center justify-content-center">
                                                    <div class="me-5 ms-5">
                                                        <h4 style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{ $link->font ?? 'Inter' }}', sans-serif; line-height: 1.3; font-size: {{$link->font_size}}rem; margin-top: 2px; margin-bottom: 0; color: {{$link->title_color}};">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                    </div>
                                                </div>
                                                <!-- Пустой div -->
                                                <div class="col-1">
                                                    @if(Auth::check())
                                                        @if(Auth::user()->id == $user->id)
                                                            <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">
                                                                <img src="https://i.ibb.co/VLbJkrG/dots.png" width="20">
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @elseif($user->social_links_bar == 1)
                <table class="table">
                    <tbody>
                    @foreach($linksWithoutBar as $link)
                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                                <div class="container" style="padding-left:8px; padding-right:8px">
                                    <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->
                                    <a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">
                                        <div class="@if($link->animation) {{$link->animation}} @endif row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">
                                            <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
                                                <!-- Картинка -->
                                                <div class="col-1">
                                                    @if($link->icon)
                                                        <img src="{{$link->icon}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @elseif($link->photo)
                                                        <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @else
                                                        <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">
                                                    @endif
                                                </div>
                                                <!-- Текст ссылки -->
                                                <div class="col-10 text-center d-flex align-items-center justify-content-center">
                                                    <div class="me-5 ms-5">
                                                        <h4 style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.3; font-size: {{$link->font_size}}rem; margin-top: 2px; margin-bottom: 0; color: {{$link->title_color}};">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                    </div>
                                                </div>
                                                <!-- Пустой div -->
                                                <div class="col-1">
                                                    @if(Auth::check())
                                                        @if(Auth::user()->id == $user->id)
                                                            <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">
                                                                <img src="https://i.ibb.co/VLbJkrG/dots.png" width="20">
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        <!-- ---------------------- -->
        <!-- Мероприятия -->
        <!-- ---------------------- -->
        @elseif($user->type == 'Events')
            <div class="mt-3">
                @foreach($events as $event)
                    <div class="container mt-2" data-bs-toggle="modal" data-bs-target="#eventModal{{$event->id}}">
                        <div class="col-lg-12 allalbums">
                            <ul class="list-group list-group-flush">
                                <li class="{{$event->event_animation}} {{$event->block_shadow}} list-group-item list-group-item-action text-center" style="background-color: rgba({{$event->background_color_rgba}}, {{$event->transparency}}); border-radius: {{$event->event_round}}px;">
                                    <div class="row text-center">
                                        <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                                            <a href="#" style="color: black; text-decoration: none">
                                                <p style="text-shadow:{{$event->location_text_shadow_right}}px {{$event->location_text_shadow_bottom}}px {{$event->location_text_shadow_blur}}px {{$event->location_text_shadow_color}} ;font-family: '{{$event->location_font}}', sans-serif; text-transform: uppercase; font-size: {{$event->location_font_size}}em; padding: 0; margin: 0; color: {{$event->location_font_color}}">@if($event->bold_city == true)<b>@endif{{$event->city}}@if($event->bold_city == true)</b>@endif, @if($event->bold_location == true)<b>@endif{{$event->location}}@if($event->bold_location == true)</b>@endif</p>
                                                <p style="text-shadow:{{$event->date_text_shadow_right}}px {{$event->date_text_shadow_bottom}}px {{$event->date_text_shadow_blur}}px {{$event->date_text_shadow_color}} ;font-family: '{{$event->date_font}}', sans-serif; font-size: {{$event->date_font_size}}rem; margin-bottom: 0; color: {{$event->date_font_color}};">@if($event->bold_date == true)<b>@endif{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}@if($event->bold_date == true)</b>@endif @if($event->bold_time == true)<b>@endif{{' @'.$event->time}}@if($event->bold_time == true)</b>@endif</p>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal fade" id="eventModal{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$event->city}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="padding: 0">
                                    <img src="{{$event->banner}}" class="img-fluid">
                                    <p class="mt-2 ms-2" style="font-size: 1.3em; padding: 0; margin: 0"><b>{{$event->city}}, {{$event->location}}</b></p>
                                    <p class="ms-2 mb-3" style="font-size: 1rem; margin-bottom: 0;"><b>{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}{{' @'.$event->time}}</b></p>

                                    @if($event->description)
                                        <p class="ms-2 mb-2 me-2" style="font-size: 1rem; margin-bottom: 0; white-space: pre-line; line-height: 1.2;">{{$event->description}}</p>
                                    @endif

                                    <!-- Видео если есть фотки -->
                                    @if($event->video)
                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                            <x-embed url="{{$event->video}}" aspect-ratio="4:3" />
                                        </div>
                                    @endif

                                    <!-- Медиа -->
                                    @if($event->media)
                                        <div class="">
                                            {!!$event->media!!}
                                        </div>
                                    @endif

                                    @if($event->tickets)
                                    <div style="background-color: #E45545;" class="text-center">
                                        <a href="{{$event->tickets}}" style="text-decoration: none">
                                            <h5 class="ms-2 pt-3 pb-3" style="margin-bottom: 0; color: white">Купить билет</h5>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- ---------------------- -->
            <!-- Соц сети для типа Events -->
            <!-- ---------------------- -->
            @if($user->type == 'Events')
                @if($user->show_social == true)
                    @if($user->social == 'DOWN')
                        @if(count($links) > 0)
                            <nav class="navbar mt-4">
                                <div class="container-fluid d-flex justify-content-center">
                                    @foreach($links as $link)
                                        @if($link->icon)
                                            <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                                <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                    width:{{ $user->userSettings->round_links_width }}px;
                                                    filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
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
            <div class="mb-3"></div>

        <!-- ---------------------- -->
        <!-- Магазин -->
        <!-- ---------------------- -->
        @elseif($user->type == 'Market')

            <!--Чек показать поиск или нет-->
            @if($user->marketSettings->show_search)
                @if($user->marketSettings->search_position == 'on_main' || $user->marketSettings->search_position == 'main_and_canvas')
                    <div class="d-flex justify-content-center">
                        <div class="col-12 d-flex justify-content-center align-items-center" style="padding-right: 12px; padding-left: 12px">
                            <form class="" action="{{ route('fullTextSearch', ['slug' => $user->slug]) }}" style="width: 100%">
                                <input class="form-control me-2 shadow" type="search" name="search" placeholder="Поиск..." aria-label="Search" style="border: 0">
                            </form>
                        </div>
                    </div>
                @endif
            @endif

            <div class="mt-3">
                @if(isset($user->marketSettings->cards_style))
                    @if($user->marketSettings->cards_style == 'one')
                        @foreach($products as $product)

                            <section data-bs-toggle="modal" data-bs-target="#productModal{{$product->id}}" onclick="productStats{{$product->id}}()">
                                <div class="container mt-2">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 col-lg-6 col-xl-4">
                                            <div class="text-black mb-3" style="border: 0; border-radius: 10px;">
                                                <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: {{$user->marketSettings->card_round}}px; @if($user->marketSettings->cards_shadow) box-shadow: 0px 5px 5px -5px rgba(0, 0, 0, 0.6); @endif" />
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
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="modal fade" id="productModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="margin: 0; border-radius: 0">
                                    <div class="modal-content" style="border-radius: 0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$product->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-2">
                                            <div class="card text-black" style="border:none">

                                                @if($product->additional_photos)
                                                    @php
                                                        $adds_ph = unserialize($product->additional_photos);
                                                        array_unshift($adds_ph, $product->main_photo);
                                                    @endphp
                                                    <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach($adds_ph as $key => $ph)
                                                                <div class="carousel-item @if($key == 0) active @endif">
                                                                    <img src="{{$ph}}" class="card-img-top" alt="Apple Computer" />
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
                                                                <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" />
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
                                                    <div class="text-center">
                                                        <h5 class="card-title mt-2">{{$product->title}}</h5>
                                                        <p class="text-muted mb-4" style="white-space: pre-wrap;">{{$product->description}}</p>
                                                        @if($product->full_description)
                                                            <p class="mb-4" style="white-space: pre-wrap;">{{$product->full_description}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-between total font-weight-bold mt-5">
                                                        <span>Цена</span><span><b>{{$product->price}}</b> рублей</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 mt-3">
                                                @if($product->link_to_shop)
                                                    <a class="btn btn-primary" href="{{$product->link_to_shop}}">
                                                        {{$product->link_to_shop_text}}
                                                    </a>
                                                @endif
                                                @if($product->link_to_order_text)
                                                    <a class="btn btn-primary" href="{{ route('showProductDetails', ['slug' => $user->slug, 'product' => $product->id]) }}">
                                                        {{$product->link_to_order_text}}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif($user->marketSettings->cards_style == 'two')
                        <div class="row ms-1 me-1" style="margin: 0">
                            @foreach($products as $product)
                                <div class="col-6 p-2" style="padding: 0">
                                    <section data-bs-toggle="modal" data-bs-target="#productModal{{$product->id}}">
                                        <div class="container mt-2" style="padding: 0">
                                            <div class="row justify-content-center" onclick="productStats{{$product->id}}()">
                                                <div class="col-md-8 col-lg-6 col-xl-4">
                                                    <div class="text-black mb-3" style="border: 0; border-radius: 10px;">
                                                        <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: {{$user->marketSettings->card_round}}px; @if($user->marketSettings->cards_shadow) box-shadow: 0px 5px 5px -5px rgba(0, 0, 0, 0.6); @endif" />
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
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="modal fade" id="productModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding: 0">
                                    <div class="modal-dialog" style="margin: 0; border-radius: 0">
                                        <div class="modal-content" style="border-radius: 0">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$product->title}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-2">
                                                <div class="card text-black" style="border:none">

                                                    @if($product->additional_photos)
                                                        @php
                                                            $adds_ph = unserialize($product->additional_photos);
                                                            array_unshift($adds_ph, $product->main_photo);
                                                        @endphp
                                                        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                @foreach($adds_ph as $key => $ph)
                                                                    <div class="carousel-item @if($key == 0) active @endif">
                                                                        <img src="{{$ph}}" class="card-img-top" alt="Apple Computer" />
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
                                                                    <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" />
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
                                                        <div class="text-center">
                                                            <h5 class="card-title mt-2">{{$product->title}}</h5>
                                                            <p class="text-muted mb-4" style="white-space: pre-wrap;">{{$product->description}}</p>
                                                            @if($product->full_description)
                                                                <p class="mb-4" style="white-space: pre-wrap;">{{$product->full_description}}</p>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-between total font-weight-bold mt-5">
                                                            <span>Цена</span><span><b>{{$product->price}}</b> рублей</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid gap-2 mt-3">
                                                    @if($product->link_to_shop)
                                                        <a class="btn btn-primary" href="{{$product->link_to_shop}}">
                                                            {{$product->link_to_shop_text}}
                                                        </a>
                                                    @endif
                                                    @if($product->link_to_order_text)
                                                        <a class="btn btn-primary" href="{{ route('showProductDetails', ['slug' => $user->slug, 'product' => $product->id]) }}">
                                                            {{$product->link_to_order_text}}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
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
            @if($user->type == 'Market')
                @if($user->show_social == true)
                    @if($user->social == 'DOWN')
                        @if(count($links) > 0)
                            <nav class="navbar mt-4">
                                <div class="container-fluid d-flex justify-content-center">
                                    @foreach($user->userLinksInBar($user) as $link)
                                        @if($link->icon)
                                            <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                                <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                    width:{{ $user->userSettings->round_links_width }}px;
                                                    filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
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
        @endif
        <!-- ---------------------- -->
        <!-- Соц сети для типа Links -->
        <!-- ---------------------- -->
        @if($user->type == 'Links')
            @if($user->social_links_bar == 1)
                @if($user->links_bar_position == 'bottom')
                    @if(count($links) > 0)
                        <nav class="navbar mt-5 mb-4">
                            <div class="container-fluid d-flex justify-content-center">
                                @foreach($links as $link)
                                    @if($link->icon)
                                        <a href="{{$link->link}}" onclick="countRabbits{{$link->id}}()">
                                            <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="
                                                width:{{ $user->userSettings->round_links_width }}px;
                                                filter: drop-shadow({{ $user->userSettings->round_links_shadow_right }}px {{ $user->userSettings->round_links_shadow_bottom }}px {{ $user->userSettings->round_links_shadow_round }}px {{ $user->userSettings->round_links_shadow_color }})
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

    @foreach($links as $link)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $('table tbody').sortable({
                    // delay:2000,
                    handle:'#up',
                    update: function (event, ui) {
                        $(this).children().each(function (index) {
                                if ($(this).attr('data-position') != (index+1)) {
                                    $(this).attr('data-position', (index+1)).addClass('updated');
                                }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var userId = {{$user->id}};
                var positions = [];
                $('.updated').each(function () {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: userId + "/ppp/sort",
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    }, success: function (response) {
                            console.log(response);
                    }
                });
            }
        </script>
    @endforeach

    @foreach($linksWithoutBar as $link)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $('table tbody').sortable({
                    // delay:2000,
                    handle:'#up',
                    update: function (event, ui) {
                        $(this).children().each(function (index) {
                            if ($(this).attr('data-position') != (index+1)) {
                                $(this).attr('data-position', (index+1)).addClass('updated');
                            }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var userId = {{$user->id}};
                var positions = [];
                $('.updated').each(function () {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: userId + "/ppp/sort",
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    }, success: function (response) {
                        console.log(response);
                    }
                });
            }
        </script>
    @endforeach

    @foreach($pinnedLinks as $link)
        <script type="text/javascript">
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $(document).ready(function () {
                $('table tbody').sortable({
                    // delay:2000,
                    handle:'#up',
                    update: function (event, ui) {
                        $(this).children().each(function (index) {
                                if ($(this).attr('data-position') != (index+1)) {
                                    $(this).attr('data-position', (index+1)).addClass('updated');
                                }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var userId = {{$user->id}};
                var positions = [];
                $('.updated').each(function () {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: userId + "/ppp/sort",
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    }, success: function (response) {
                            console.log(response);
                    }
                });
            }
        </script>
    @endforeach

    @foreach($links as $link)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function countRabbits{{$link->id}}() {
                let guest = '{{$_SERVER['REMOTE_ADDR']}}';
                let linkId = '{{$link->id}}';
                let userId = '{{$user->id}}';
                $.ajax({
                    url: userId+"/link",
                    type: 'POST',
                    data: { user_id: userId, link_id: linkId, guest_ip: guest, func: 'func_data' },
                    success: function(data){
                        console.log('GOOD');
                    },
                    error: function(){
                        console.log('ERROR');
                    }
                })
            }
        </script>
    @endforeach

    @foreach($pinnedLinks as $link)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function countRabbits{{$link->id}}() {
                let guest = '{{$_SERVER['REMOTE_ADDR']}}';
                let linkId = '{{$link->id}}';
                let userId = '{{$user->id}}';
                $.ajax({
                    url: userId+"/link",
                    type: 'POST',
                    data: { user_id: userId, link_id: linkId, guest_ip: guest, func: 'func_data' },
                    success: function(data){
                        console.log('GOOD');
                    },
                    error: function(){
                        console.log('ERROR');
                    }
                })
            }
        </script>
    @endforeach

    @foreach($products as $product)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function productStats{{$product->id}}() {
                let guest = '{{$_SERVER['REMOTE_ADDR']}}';
                let productId = '{{$product->id}}';
                let userId = '{{$user->id}}';
                $.ajax({
                    url: userId+"/product-stats",
                    type: 'POST',
                    data: { user_id: userId, product_id: productId, guest_ip: guest, func: 'stat_product' },
                    success: function(data){
                        console.log('GOOD');
                    },
                    error: function(){
                        console.log('ERROR');
                    }
                })
            }
        </script>
    @endforeach

</html>








