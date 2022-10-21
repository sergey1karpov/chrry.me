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
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">
@if (session('count'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="border-radius: 0">
        {{ session('count') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid justify-content-center text-center">
    @if(isset($errors))
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
</div>
<div class="container-fluid" style="padding: 0">
    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
        <div class="container-fluid">
            <a class="mb-1" href="{{ route('editProfileForm', ['id' => Auth::user()->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>
            </a>
        </div>
    </nav>
</div>
<div class="ms-3 me-3 mb-3 text-center">
    <form action="{{ route('addProduct', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
        @csrf @method('POST')
        <input type="hidden" name="user" value="{{$user->id}}">
        <div class="mb-3"> <!-- Название продукта -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Название товара\услуги</label>
            <input class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="title" id="title" placeholder="" style="border: 0" maxlength="100">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Максимум 100 символов</label>
        </div>
        <div class="mb-3"> <!-- Описание события -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Описание</label>
            <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" rows="3" name="description" id="full_text" style="border: 0" maxlength="255"></textarea>
            <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 12px">Краткое описание товара\услуги для карточки на главную. Максимум 255 символов</label>
        </div>
        <div class="mb-3"> <!-- Полное описание -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Развернутое описание</label>
            <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="3" name="full_description" id="count_products" style="border: 0" maxlength="2500"></textarea>
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Полное описание товара\услуги. Максимум 2500 символов</label>
        </div>
        <div class="mb-3"> <!-- Фото продукта -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Основное фото</label>
            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile022" name="main_photo" accept=".png, .jpg, .jpeg" style="border: 0">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Мы принимаем картинки jpeg, jpg, png формата.</label>
        </div>
        <div class="mb-3"> <!-- Дополнительные фото -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Дополнительные фото</label>
            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile022" name="additional_photos[]" accept=".png, .jpg, .jpeg"  multiple="multiple" style="border: 0">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Мы принимаем картинки jpeg, jpg, png формата.</label>
        </div>
        <div class="mb-3"> <!-- Описание события -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Цена за единицу товара</label>
            <input name="price" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" style="border: 0">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Стоимость товара\услуги в рублях</label>
        </div>

        {{-- Market buttons --}}
        <div class="mb-3"> <!-- Название продукта -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на товар</label>
            <input class="form-control mb-1 @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_shop" id="title" placeholder="Ozon, Wildberries и тд..." style="border: 0">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Разместите ссылку на ваш товар\услугу которая продаётся на другой площадке</label>

            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для ссылки на товар</label>
            <input class="form-control mt-2 @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_shop_text" id="title" placeholder="Купить на Ozon" style="border: 0">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Вы можете указать название для кнопки на ресурс с товаром</label>
        </div>
        <div class="mb-3"> <!-- Название продукта -->
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для кнопки заказа</label>
            <input class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_order_text" id="title" placeholder="Напишите мне для заказа" style="border: 0">
            <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Укажите название для кнопки, если собираетесь принимать заявки через наш сервис.</label>
        </div>

        <div class="mb-3 text-center" >
            <div class="ms-2 form-check" style="padding: 0">
                <div class="form-check form-switch mb-3">
                    <input name="visible" class="form-check-input @if($user->dayVsNight) bg-secondary @endif shadow" type="checkbox" value="{{true}}" id="design-link-e" style="border: 0">
                    <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Если хотите что бы после публикации ваш товар был видим для всех пользователей, щелкните тут</label>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-secondary">@lang('app.m_add_link')</button>
        </div>
</div>
</form>
</div>
</body>

</html>








