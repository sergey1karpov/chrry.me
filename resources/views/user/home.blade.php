<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $user->name }}</title>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">

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
		      	<div class="text-center mt-5">
			        <div class="d-flex justify-content-center">
                        <div class="img" style="background-image: url({{$user->avatar}});"></div>
                    </div>

			        <h2 class="mt-4" style="font-family: 'Manrope', sans-serif; font-size: 1.2rem; @if($user->name_color) color: {{$user->name_color}}; @endif ">
			        	{{ $user->name }}
			        	@if($user->verify == 1)
			        		<i class="bi bi-patch-check-fill" style="color: {{$user->verify_color}}"></i>
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
	  		<div class="container" style="padding-left:8px; padding-right:8px">

			  	<a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">
			  		<div class="row ms-1 me-1 card {{$link->rounded}} {{$link->shadow}}" style="background-color:{{$link->background_color}}{{$link->transparency}}; border: 0; margin-top: 12px;">
			  			<div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
			  				<div class="col-1">
			  					<img class="{{$link->rounded}}" src="{{$link->photo}}" style="width:50px;">
			  				</div>
			  				<div class=" col-10 text-center">
			  					<div class="me-5 ms-5">
			  						<h4 class="" style="font-family: 'Inter', sans-serif; line-height: 1.5; font-size: 0.9rem; margin: 0;color: {{$link->title_color}}">{{$link->title}}</h4>
			  					</div>
			  				</div>
			  				<div class="col-1">

			  				</div>
			  			</div>
				  	</div>
			  	</a>
			</div>
		@endforeach

        <div class="mt-3">
        </div>

    </body>
</html>







