<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

    <!-- Date JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Time -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/js/moment.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("order-form").submit();
        }
    </script>

    @include('fonts.fonts')
    <style type="text/css">
        body{
            background: #f1f2f2;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        span{
            font-size:15px;
        }
        a{
            text-decoration:none;
            color: #0062cc;
        }
        .img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 0;
            background-position: center center;
            -wekit-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
        }

    </style>
</head>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <p class="form-text">{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif

    <body class="antialiased">

        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('userHomePage', ['slug' => $user->slug]) }}">
                    <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid mb-4" style="width:20px">
                </a>
            </div>
        </nav>

        <div class="mt-5 mb-4 rounded text-center">
            <p class="card-text" style="font-family: 'Inter', sans-serif; font-size: 1rem;">Заполните форму для заказа товара\услуги</p>
        </div>

        <div class="me-3 ms-3 rounded">
            <div class="card mb-3 rounded shadow" style="max-width: 540px; border: 0">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="{{$product->main_photo}}" class="img-fluid rounded-start" width="150">
                    </div>
                    <div class="col-8">
                        <div class="card-body m-2" style="padding: 0">
                            <h5 style="font-family: 'Inter', sans-serif; font-size: 0.9rem;" class="card-title">{{$product->title}}</h5>
                            <h5 style="font-family: 'Inter', sans-serif; font-size: 0.8rem;" class="card-title">{{$product->price}} руб.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="me-3 ms-3 mt-4 mb-5 text-center">
            <form action="{{route('sendOrder', ['id' => $user->id, 'product' => $product->id])}}" method="POST" id="order-form"> @CSRF @method('POST')
                <div class="mb-3">
                    <input type="text" name="client_name" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 0">
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Укажите ваше Имя\Фамилию\Отчество если есть</span>
                </div>
                <div class="mb-3">
                    <input type="email" name="client_email" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 0">
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Укажите свой Email</span>
                </div>
                <div class="mb-3">
                    <input type="text" name="client_phone" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 0">
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Номер телефона для связи</span>
                </div>

                <p class="card-text" style="font-family: 'Inter', sans-serif; font-size: 0.8rem;">Если не хотите указывать свой номер телефона, укажите ваши контакты в одном из месседжеров</p>

                <div class="input-group">
                    <div class="input-group-prepend shadow" style="border: 0; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                        <span class="input-group-text" id="basic-addon1" style="border: none; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                            <img src="https://i.ibb.co/7gyNXdV/telegram-plane.png" width="30">
                        </span>
                    </div>
                    <input type="text" name="client_telegram" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 0">
                </div>
                <span class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Telegram</span>

                <div class="input-group">
                    <div class="input-group-prepend shadow" style="border: 0; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                        <span class="input-group-text" id="basic-addon1" style="border: none; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                            <img src="https://i.ibb.co/wd9PJCy/viber.png" width="30">
                        </span>
                    </div>
                    <input type="text" name="client_viber" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 0">
                </div>
                <span class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Viber</span>

                <div class="input-group">
                    <div class="input-group-prepend shadow" style="border: 0; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                        <span class="input-group-text" id="basic-addon1" style="border: none; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                            <img src="https://i.ibb.co/8NQqVvH/whatsapp.png" width="30">
                        </span>
                    </div>
                    <input type="text" name="client_whatsapp" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" style="border: 0">
                </div>
                <span class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">WhatsApp</span>

                <div class="mb-3 mt-2">
                    <textarea name="client_text" class="form-control shadow" rows="3" style="border: 0">Здравствуйте!</textarea>
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Напишите какую нибудь заметку для продавца</span>
                </div>
                <div class="d-grid gap-2">
                    <button class="g-recaptcha btn btn-info shadow"
                            data-sitekey="6LdjE5siAAAAAFns6LrPthCLLu4niq3WG_coMFJA"
                            data-callback='onSubmit'
                            data-action='submit'
                    type="submit" style="border: 0">Отправить</button>
                </div>
            </form>
        </div>
    </body>
</html>








