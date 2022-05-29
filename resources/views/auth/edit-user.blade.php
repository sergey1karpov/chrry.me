{{-- <form method="POST" action="{{ route('editNewUser', ['utag' => $user->utag]) }}">
	@csrf @method('PATCH')
	slug
	<input type="text" name="slug"><br>

	name
	<input type="text" name="name"><br>

	email
	<input type="text" name="email"><br>

	pass
	<input type="text" name="password"><br>
	<button>Регистр</button>
</form>


 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
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

        <style type="text/css">
        	body{
			    background: #f5f5f5;
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
			    padding:20px 10px;
			    margin:30px 0px;
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
        </style>
    </head>
    <body class="antialiased align-items-center">
        <div class="container-fluid justify-content-center align-items-center text-center">
        	<x-guest-layout>
	            <x-auth-card>
	                <x-slot name="logo">
	                    <a href="/">
	                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
	                    </a>
	                </x-slot>

	                <!-- Validation Errors -->
	                <x-auth-validation-errors class="mb-5" :errors="$errors" />

	                <h1 class="mb-4" style="font-family: 'Rubik', sans-serif; font-size: 1.3rem;">Регистрация</h1>

	                <form method="POST" action="{{ route('editNewUser', ['utag' => $user->utag]) }}" class="text-center">
	                    @csrf @method('PATCH')

	                    <!-- Name -->
	                    <div>
	                        <x-label for="name" :value="__('Имя профиля')" style="font-family: 'Rubik', sans-serif;"/>

	                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
	                    </div>

	                    <div class="mt-4">
	                        <x-label for="name" :value="__('Адрес страницы')" style="font-family: 'Rubik', sans-serif;"/>
							<div class="input-group mb-3">
  								<span class="input-group-text" id="basic-addon3">bord.link/</span>
  								<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="slug" :value="old('slug')" required autofocus>
							</div>
	                    </div>

	                    <!-- Email Address -->
	                    <div class="mt-4">
	                        <x-label for="email" :value="__('Ваша почта')" style="font-family: 'Rubik', sans-serif;"/>

	                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
	                    </div>

	                    <!-- Password -->
	                    <div class="mt-4">
	                        <x-label for="password" :value="__('Пароль')" style="font-family: 'Rubik', sans-serif;"/>

	                        <x-input id="password" class="block mt-1 w-full"
	                                        type="password"
	                                        name="password"
	                                        required autocomplete="new-password" />
	                    </div>

	                    <!-- Confirm Password -->
	                    <div class="mt-4">
	                        <x-label for="password_confirmation" :value="__('Повторите пароль')" style="font-family: 'Rubik', sans-serif;"/>

	                        <x-input id="password_confirmation" class="block mt-1 w-full"
	                                        type="password"
	                                        name="password_confirmation" required />
	                    </div>

	                    <div class="flex items-center justify-content-center mt-4">

	                        <x-button class="ml-4" style="font-family: 'Rubik', sans-serif;">
	                            {{ __('Register') }}
	                        </x-button>
	                    </div>
	                </form>
	            </x-auth-card>
	        </x-guest-layout>
        </div>
    </body>
</html>









