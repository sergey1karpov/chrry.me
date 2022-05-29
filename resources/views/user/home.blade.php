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
    </head>
    <body class="antialiased">
    	@auth
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                    <img src="https://i.ibb.co/x7FjC42/menu.png" class="img-fluid mb-4" style="width:27px">
                </a>   
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: 0">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li><a href="#" class="nav-link link-dark" style="font-family: 'Overpass Mono', monospace;">Блог</a></li>
                        <li><a href="#" class="nav-link link-dark" style="font-family: 'Overpass Mono', monospace;">Инструкция</a></li>
                        <li><a href="#" class="nav-link link-dark" style="font-family: 'Overpass Mono', monospace;">О Нас</a></li>
                        <li><a href="#" class="nav-link link-dark" style="font-family: 'Overpass Mono', monospace;">Контакты</a></li>
                        @if (Route::has('login'))
                            @auth
                                {{-- <li class="nav-item">
                                    <a class="nav-link text-muted" aria-current="page" href="{{ route('editProfileForm',  ['id' => Auth::user()->id]) }}" style="font-family: 'Overpass Mono', monospace;">Изменить профиль</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-muted" aria-current="page" href="{{ route('showAddLinkForm',  ['id' => Auth::user()->id]) }}" style="font-family: 'Overpass Mono', monospace;">Добавить ссылки</a>
                                </li> --}}
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="nav-link text-muted" style="font-family: 'Overpass Mono', monospace; border: 0; outline: none; background-color:white;">Выйти</button>   
                                    </form>
                                </li>
                            @else 
                                <li class="nav-item">
                                    <a class="nav-link text-muted" aria-current="page" href="{{ route('login') }}" style="font-family: 'Overpass Mono', monospace;">Войти</a>
                                </li>   
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-muted" aria-current="page" href="{{ route('register') }}" style="font-family: 'Overpass Mono', monospace;">Регистрация</a>
                                    </li> 
                                @endif
                            @endauth
                        @endif                
                    </ul>
                </div>
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
			        	<p style="font-family: 'Rubik', sans-serif; font-size: 0.9rem; @if($user->description_color) color: {{$user->description_color}}; @endif">{{ $user->description }}</p>
			        @endif	
		      	</div><!-- /.col-lg-4 -->
	    	</div>
	    </div>	

	    <!-- Links -->
	    @foreach($links as $link)
	  		<div class="container" style="padding-left:8px; padding-right:8px">

			  	<a href="{{$link->link}}" style="text-decoration:none">
			  		<div class="row ms-1 me-1 card rounded-3 mt-2" style="background-color:{{$link->background_color}}; border: 2px solid {{$link->background_color}};">
			  			<div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">
			  				<div class="col-1">
			  					<img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
			  				</div>
			  				<div class=" col-10 text-center">
			  					<div class="me-5 ms-5">
			  						<h4 class="" style="font-family: 'Inter', sans-serif; line-height: 1.5; font-size: 1rem; margin: 0;color: {{$link->title_color}}">{{$link->title}}</h4>
			  					</div>
			  				</div>
			  				<div class="col-1">
			  					
			  				</div>
			  			</div>			  		
				  	</div>
			  	</a>

			  	{{-- @auth
			  		@if(Auth::user()->id == $user->id)
			  			<div class="row">
					  		<div class="col-6">
					  			<button data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}">Изменить</button>
					  		</div>
					  		<div class="col-6">
					  			<form action="{{ route('delLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
					  				@csrf @method('DELETE')
					  				<button>Delete</button>
					  			</form>
					  		</div>
					  	</div>
			  		@endif
			  	@endauth --}}

			</div>

			@auth
				@if(Auth::user()->id == $user->id)
					<div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  		<div class="modal-dialog">
						    <div class="modal-content">
						    	<div class="modal-header">
						        	<h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>
						        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      	</div>
						      	текущее фото
								    <div>
								    	<img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
								    	<form action="{{ route('delLinkPhoto', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">
								    		@csrf @method('PATCH')
								    		<button>Del img</button>
								    	</form>
								    </div>
						      	<div class="modal-body">
						        	<form action="{{ route('editLink', ['id' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">
						        		@csrf @method('PATCH')
						        			<div class="mb-3">
										    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Заголовок</label>
										    	<input type="text" class="form-control" name="title" placeholder="Моя красивая ссылка" value="{{$link->title}}">
										    </div>	
										    <div class="mb-3">
										    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Вставьте ссылку</label>
										    	<input type="text" class="form-control" name="link" placeholder="http://..." value="{{$link->link}}">
										    </div>	
										    <div class="mb-3">
											    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Цвет заголовка</label>
											    <select class="form-select" aria-label="Default select example" name="title_color">
											  		<option style="font-family: 'Rubik', sans-serif;">Выберите один из цветов</option>
											  		<option value="white" style="font-family: 'Rubik', sans-serif;">Белый</option>
											  		<option value="#f8f9fb" style="font-family: 'Rubik', sans-serif; background-color: #f8f9fb;">White-light</option>
											  		<option value="black" style="font-family: 'Rubik', sans-serif; background-color: black; color: white;">Черный</option>
											  		<option value="#353a40" style="font-family: 'Rubik', sans-serif; background-color: #353a40; color: white;">Dark-light</option>
											  		<option value="#0ca1b7" style="font-family: 'Rubik', sans-serif; background-color: #0ca1b7; color: white;">Голубой</option>
											  		<option value="#ffc43a" style="font-family: 'Rubik', sans-serif; background-color: #ffc43a; color: white;">Желтый</option>
											  		<option value="#de3346" style="font-family: 'Rubik', sans-serif; background-color: #de3346; color: white">Красный</option>
											  		<option value="#1faa4f" style="font-family: 'Rubik', sans-serif; background-color: #1faa4f; color: white">Зеленый</option>
											  		<option value="#6c757c" style="font-family: 'Rubik', sans-serif; background-color: #6c757c; color: white;">Серый</option>
											  		<option value="#0473f9" style="font-family: 'Rubik', sans-serif; background-color: #0473f9; color: white">Синий</option>
												</select>
											</div>
											<div class="mb-3">	
										    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Фоновый цвет</label>
										    	<select class="form-select" aria-label="Default select example" name="background_color">
											  		<option style="font-family: 'Rubik', sans-serif;">Выберите один из цветов</option>
											  		<option value="white" style="font-family: 'Rubik', sans-serif;">Белый</option>
											  		<option value="#f8f9fb" style="font-family: 'Rubik', sans-serif; background-color: #f8f9fb;">White-light</option>
											  		<option value="black" style="font-family: 'Rubik', sans-serif; background-color: black; color: white;">Черный</option>
											  		<option value="#353a40" style="font-family: 'Rubik', sans-serif; background-color: #353a40; color: white;">Dark-light</option>
											  		<option value="#0ca1b7" style="font-family: 'Rubik', sans-serif; background-color: #0ca1b7; color: white;">Голубой</option>
											  		<option value="#ffc43a" style="font-family: 'Rubik', sans-serif; background-color: #ffc43a; color: white;">Желтый</option>
											  		<option value="#de3346" style="font-family: 'Rubik', sans-serif; background-color: #de3346; color: white">Красный</option>
											  		<option value="#1faa4f" style="font-family: 'Rubik', sans-serif; background-color: #1faa4f; color: white">Зеленый</option>
											  		<option value="#6c757c" style="font-family: 'Rubik', sans-serif; background-color: #6c757c; color: white;">Серый</option>
											  		<option value="#0473f9" style="font-family: 'Rubik', sans-serif; background-color: #0473f9; color: white">Синий</option>
												</select>
										    </div>	
										    <div class="mb-3">	
										    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Фото</label>
										    	<input type="file" class="form-control" id="inputGroupFile02" name="photo">
										    </div>	

										    <div class="mb-3">	
										    	<label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* - Поля не обязательны для заполнения</label>
										    </div>
										    <button type="submit" class="btn btn-primary">Submit</button>
		  								</div>
						        	</form>
						      	</div>
						    </div>
				  		</div>
					</div>
				@endif	
			@endauth
		@endforeach

    </body>
</html>






{{-- <div class="container">
			  	<div class="row ms-1 me-1 card rounded-3 mt-3" style="background-color:{{$link->background_color}}">
		  			<div class="d-flex justify-content-start mt-2 mb-2" style="padding-left: 8px;">
		  				<div class="me-2 col-2">
		  					<img class="rounded-3" src="{{$link->photo}}" style="width:50px;">
		  				</div>
		  				<div class="me-3 col-9 text-center">
		  					<h4 class="mt-2" style="font-family: 'Rubik', sans-serif; font-size: 1rem; margin: 0; color: {{$link->title_color}}">{{$link->title}}</h4>
		  				</div>
		  			</div>		  		  		
			  	</div>
			</div>	 --}}	

			{{-- align-items-center --}}