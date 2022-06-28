<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $user->name }}</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap" rel="stylesheet">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">

		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-embed-styles />

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
        </style>
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
    </head>
    <body class="antialiased">

    	@auth
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                    <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid mb-4" style="width:20px">
                </a>

            </div>
        </nav>
        @endauth

        <div class="container-fluid justify-content-center text-center">
	        <div class="d-flex justify-content-center text-center">
		      	<div class="text-center" style="margin-top: 25px">
			        <div class="d-flex justify-content-center">
                        <div class="img" style="background-image: url({{$user->avatar}});"></div>
                    </div>

			        <h2 class="mt-4" style="font-family: 'Manrope', sans-serif; font-size: 1.2rem; @if($user->name_color) color: {{$user->name_color}}; @endif ">
			        	{{ $user->name }}
			        	@if($user->verify == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->verify_color}}">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
			        	@endif
			        </h2>
			        @if($user->description)
			        	<p style="font-family: 'Manrope', sans-serif; font-size: 0.9rem; @if($user->description_color) color: {{$user->description_color}}; @endif">{{ $user->description }}</p>
			        @endif
		      	</div><!-- /.col-lg-4 -->
	    	</div>
	    </div>

	    <!-- Links -->

	    @foreach($links as $link)
	  		<div class="container mt-3" style="padding-left:8px; padding-right:8px" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModal{{$link->id}}" @endif>
			  	@if($link->type != 'POST')<a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">@elseif($link->type == 'POST') <a style="text-decoration:none" onclick="countRabbits{{$link->id}}()"> @endif
			  		<div class="row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center">
			  			<div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
			  				<div class="col-1">
                                @if($link->type == 'POST')
                                    @if($link->photos)
                                        @foreach(unserialize($link->photos) as $key => $photo)
                                            @if($key == 0)
                                                <img src="{{$photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                            @endif
                                        @endforeach
                                    @endif
                                @elseif($link->type != 'POST')
                                    <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                @endif
			  				</div>
			  				<div class=" col-10 text-center">
			  					<div class="me-5 ms-5">
			  						<h4 class="" style="font-family: 'Inter', sans-serif; line-height: 1.5; font-size: 0.9rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">{{$link->title}}</h4>
			  					</div>
			  				</div>
			  				<div class="col-1">

			  				</div>
			  			</div>
				  	</div>
                @if($link->type != 'POST')</a>@endif
			</div>
            @if($link->type == 'POST')
                <div class="modal fade" id="exampleModal{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$link->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding: 0;>

                                @if($link->photos)
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">

                                        </div>

                                    </div>
                                @endif
                                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                                    <div class="carousel-inner">
                                        @if($link->photos)
                                            @foreach(unserialize($link->photos) as $key => $photo)
                                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                    <img src="{{$photo}}" alt="Los Angeles" class="img-fluid d-block w-100">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>

                                @if(!$link->photos)
                                    @if($link->video)
                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                            <x-embed url="{{$link->video}}" aspect-ratio="4:3" />
                                        </div>
                                    @endif
                                @endif
                                @if($link->full_text)
                                    <div class="me-2 ms-2 mb-4" style="white-space: pre-line; line-height: 1.2;">
                                        {{$link->full_text}}
                                    </div>
                                @endif
                                @if($link->link)
                                    <div class="mt-2 me-2 ms-2">
                                        <a href="{{$link->full_text}}">{{$link->title}}</a>
                                    </div>
                                @endif
                                @if($link->photos)
                                    @if($link->video)
                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">
                                            <x-embed url="{{$link->video}}" aspect-ratio="4:3" />
                                        </div>
                                    @endif
                                @endif
                                @if($link->media)
                                    <div class="">
                                        {!!$link->media!!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
		@endforeach

        <div class="mt-3">
        </div>

    </body>
</html>








