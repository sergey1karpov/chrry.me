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
        .accordion-button:focus {
            box-shadow: none;
        }
    </style>
</head>
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">

{{--@if (session('count'))--}}
{{--    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="border-radius: 0">--}}
{{--        {{ session('count') }}--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--@endif--}}

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

    @if ($message = Session::get('count'))
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
            <a class="mb-1" href="{{ route('allProducts', ['user' => Auth::user()->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <form class="" action="{{ route('searchProducts', ['user' => Auth::user()->id]) }}">
                <input class="form-control me-2" type="search" placeholder="Поиск товаров" aria-label="Search" name="search" style="height: 30px">
            </form>
            <a class="" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>
            </a>
        </div>
    </nav>
</div>
<div class="mt-3 ms-3 me-3 mb-3 ">
    <div class="text-center">
        <label for="exampleInputEmail1" class="form-label mb-3" style="font-family: 'Rubik', sans-serif; ">Прикрепленные к товару изображения</label>
        @if($product->additional_photos)
            <div class="row" style="margin: 0">
                @foreach(unserialize($product->additional_photos) as $ph)
                    <div class="col mb-2">
                        <img class="rounded shadow" src="{{'/'.$ph}}" width="100">
                        <form action="{{ route('deleteAdditionalPhoto', ['user' => $user->id, 'product' => $product->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" value="{{$ph}}" name="photo">
                            <button class="btn-sm" style="background-color: rgba(28,28,28,0); border: none">
                                <img class="shadow" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Delete-button.svg/862px-Delete-button.svg.png" width="15">
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="text-center">
        <form action="{{ route('editProduct', ['user' => $user->id, 'product' => $product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <input type="hidden" name="user" value="{{$user->id}}">
            <div class="mb-3"> <!-- Название продукта -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Название товара\услуги</label>
                <input class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="title" id="title" placeholder="" style="border: 0" maxlength="100" value="{{$product->title}}">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Максимум 100 символов</label>
            </div>
            <div class="mb-3"> <!-- Описание события -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Описание</label>
                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="3" name="description" id="full_text" style="border: 0" maxlength="255">{{$product->description}}</textarea>
                <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 12px">Краткое описание товара\услуги для карточки на главную. Максимум 255 символов</label>
            </div>
            <div class="mb-3"> <!-- Полное описание -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Развернутое описание</label>
                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="3" name="full_description" id="count_products" style="border: 0" maxlength="2500">{{$product->full_description}}</textarea>
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Полное описание товара\услуги. Максимум 2500 символов</label>
            </div>
            <div class="mb-3"> <!-- Фото продукта -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Основное фото</label>
                <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile022" name="main_photo" accept=".png, .jpg, .jpeg" style="border: 0">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Мы принимаем картинки jpeg, jpg, png формата.</label>
            </div>
            <div class="mb-2"> <!-- Дополнительные фото -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Дополнительные фото</label>
                <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile022" name="additional_photos[]" accept=".png, .jpg, .jpeg"  multiple="multiple" style="border: 0">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Мы принимаем картинки jpeg, jpg, png формата.</label>
            </div>
            <div class="mb-3"> <!-- Описание события -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Цена за единицу товара</label>
                <input name="price" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" style="border: 0" value="{{$product->price}}">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Стоимость товара\услуги в рублях</label>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Выберите категорию</label>
                <select class="form-select shadow" aria-label="Default select example" style="border: 0" name="product_categories_id">
                    <option selected value="{{$product->category->id}}">{{$product->category->name}}</option>
                    @foreach($categories as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                <label class="mt-2" style="font-family: 'Rubik', sans-serif; font-size: 12px">По умолчанию все товары попадают в категорию "Все товары". Что бы изменить или добавить новую категорию перейдите <a href="{{ route('allCategories', ['user' => $user->id]) }}">сюда</a></label>
            </div>

            {{-- Market buttons --}}
            <div class="mb-3"> <!-- Название продукта -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на товар</label>
                <input class="form-control mb-1 @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_shop" id="title" placeholder="Ozon, Wildberries и тд..." style="border: 0" value="{{$product->link_to_shop}}">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Разместите ссылку на ваш товар\услугу которая продаётся на другой площадке</label>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для ссылки на товар</label>
                <input class="form-control mt-2 @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_shop_text" id="title" placeholder="Купить на Ozon" style="border: 0" value="{{$product->link_to_shop_text}}">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Вы можете указать название для кнопки на ресурс с товаром</label>
            </div>
            <div class="mb-3"> <!-- Название продукта -->
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для кнопки заказа</label>
                <input class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_order_text" id="title" placeholder="Напишите мне для заказа" style="border: 0" value="{{$product->link_to_order_text}}">
                <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Укажите название для кнопки, если собираетесь принимать заявки через наш сервис.</label>
            </div>

            <div class="mb-3 text-center" >
                <div class="ms-2 form-check" style="padding: 0">
                    <div class="form-check form-switch mb-3">
                        <input @if($product->visible == true) checked @endif name="visible" class="form-check-input @if($user->dayVsNight) bg-secondary @endif shadow" type="checkbox" value="{{true}}" id="design-link-e">
                        <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Если хотите что бы после публикации ваш товар был видим для всех пользователей, щелкните тут</label>
                    </div>
                </div>
            </div>

            <hr>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header @if($user->dayVsNight) bg-secondary @endif" id="flush-headingOne">
                        <button style="border: 0; text-decoration: none" class="accordion-button collapsed @if($user->dayVsNight) bg-secondary @endif" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Параметры дизайна карточки продукта
                        </button>
                    </h2>
                    <div style="background-color: #f1f2f2" id="flush-collapseOne" class="accordion-collapse collapse @if($user->dayVsNight) bg-dark text-white-50 @endif" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет фона карточки</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_bg_color" style="height: 35px; border: 0" value="{{$designProduct['dp_bg_color']}}">
                            </div>
                        </div>

                        <hr>
                        <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн заголовка</label>
                        <hr>

                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для заголовка</label>
                            <div class="col-12">
                                <select id="title_font" data-placeholder="Поиск шрифта для заголовка"  autocomplete="off" name="dp_title_font">
                                    <option selected>{{$designProduct['dp_title_font']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для заголовка</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_size']}}" name="dp_title_font_size">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_title_font_color" value="{{$designProduct['dp_title_font_color']}}" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Располложение заголовка</label>
                            <select name="dp_title_position" class="form-select shadow" aria-label="Default select example" style="border: 0">
                                <option @if($designProduct['dp_title_position'] == 'text-start') selected @endif value="text-start">По левой стороне</option>
                                <option @if($designProduct['dp_title_position'] == 'text-end') selected @endif value="text-end">По правой</option>
                                <option @if($designProduct['dp_title_position'] == 'text-center') selected @endif value="text-center">По центру</option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени заголовка</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_title_font_shadow_color']}}" name="dp_title_font_shadow_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_shadow_right']}}" name="dp_title_font_shadow_right">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_shadow_bottom']}}" name="dp_title_font_shadow_bottom">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_title_font_shadow_blur']}}" name="dp_title_font_shadow_blur">
                            </div>
                        </div>

                        <hr>
                        <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн короткого описания</label>
                        <hr>

                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для короткого описания</label>
                            <div class="col-12">
                                <select id="description_font" data-placeholder="Поиск шрифта для короткого описания"  autocomplete="off" name="dp_description_font">
                                    <option selected>{{$designProduct['dp_description_font']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для короткого описания</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_size']}}" name="dp_description_font_size">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет короткого описания</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_description_font_color']}}" name="dp_description_font_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Располложение заголовка</label>
                            <select name="dp_description_position" class="form-select shadow" aria-label="Default select example" style="border: 0">
                                <option @if($designProduct['dp_description_position'] == 'text-start') selected @endif value="text-start">По левой стороне</option>
                                <option @if($designProduct['dp_description_position'] == 'text-end') selected @endif value="text-end">По правой</option>
                                <option @if($designProduct['dp_description_position'] == 'text-center') selected @endif value="text-center">По центру</option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени короткого описания</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_description_font_shadow_color']}}" name="dp_description_font_shadow_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_shadow_right']}}" name="dp_description_font_shadow_right">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_shadow_bottom']}}" name="dp_description_font_shadow_bottom">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_description_font_shadow_blur']}}" name="dp_description_font_shadow_blur">
                            </div>
                        </div>

                        <hr>
                        <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн полного описания</label>
                        <hr>

                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для полного описания</label>
                            <div class="col-12">
                                <select id="full_description_font" data-placeholder="Поиск шрифта для полного описания"  autocomplete="off" name="dp_full_description_font">
                                    <option selected>{{$designProduct['dp_full_description_font']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для полного описания</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_size']}}" name="dp_full_description_font_size">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет полного описания</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_full_description_font_color']}}" name="dp_full_description_font_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Располложение заголовка</label>
                            <select name="dp_full_description_position" class="form-select shadow" aria-label="Default select example" style="border: 0">
                                <option @if($designProduct['dp_full_description_position'] == 'text-start') selected @endif value="text-start">По левой стороне</option>
                                <option @if($designProduct['dp_full_description_position'] == 'text-end') selected @endif value="text-end">По правой</option>
                                <option @if($designProduct['dp_full_description_position'] == 'text-center') selected @endif value="text-center">По центру</option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени полного описания</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_full_description_font_shadow_color']}}" name="dp_full_description_font_shadow_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_shadow_right']}}" name="dp_full_description_font_shadow_right">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_shadow_bottom']}}" name="dp_full_description_font_shadow_bottom">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_full_description_font_shadow_blur']}}" name="dp_full_description_font_shadow_blur">
                            </div>
                        </div>

                        <hr>
                        <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн цены</label>
                        <hr>

                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для цены</label>
                            <div class="col-12">
                                <select id="price_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_price_font">
                                    <option selected>{{$designProduct['dp_price_font']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для цены</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_size']}}" name="dp_price_font_size">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет цены</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_price_font_color']}}" name="dp_price_font_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени цены</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_price_font_shadow_color']}}" name="dp_price_font_shadow_color" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_shadow_right']}}" name="dp_price_font_shadow_right">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_shadow_bottom']}}" name="dp_price_font_shadow_bottom">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_price_font_shadow_blur']}}" name="dp_price_font_shadow_blur">
                            </div>
                        </div>

                        <hr>
                        <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн кнопки на внешний ресурс</label>
                        <hr>
                        <!-- -->
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на внешний ресурс</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_color_remote" value="{{$designProduct['dp_btn_color_remote']}}" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет текста кнопки на внешний ресурс</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_color_remote" value="{{$designProduct['dp_btn_text_color_remote']}}" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для кнопки</label>
                            <div class="col-12">
                                <select id="btn_outher_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_btn_text_font_remote">
                                    <option selected>{{$designProduct['dp_btn_text_font_remote']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для кнопки</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_size_remote']}}" name="dp_btn_text_size_remote">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление кнопки на внешний ресурс</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="dp_btn_radius_remote" value="{{$designProduct['dp_btn_radius_remote']}}">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени текста кнопки на внешний ресурс</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_shadow_color_remote" value="{{$designProduct['dp_btn_text_shadow_color_remote']}}" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_right_remote']}}" name="dp_btn_text_shadow_right_remote">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_bottom_remote']}}" name="dp_btn_text_shadow_bottom_remote">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_blur_remote']}}" name="dp_btn_text_shadow_blur_remote">
                            </div>
                        </div>
                        <!-- -->
                        <hr>
                        <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн кнопки на страницу заказа</label>
                        <hr>

                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на страницу заказа</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_btn_color_chrry']}}" name="dp_btn_color_chrry" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет текста кнопки на страницу заказа</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$designProduct['dp_btn_text_color_chrry']}}" name="dp_btn_text_color_chrry" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для кнопки</label>
                            <div class="col-12">
                                <select id="btn_chrry_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_btn_text_font_chrry">
                                    <option selected>{{$designProduct['dp_btn_text_font_chrry']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для кнопки</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_size_chrry']}}" name="dp_btn_text_size_chrry">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление кнопки на страницу заказа</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="dp_btn_radius_chrry" value="{{$designProduct['dp_btn_radius_chrry']}}">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени текста кнопки на страницу заказа</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_shadow_color_chrry" value="{{$designProduct['dp_btn_text_shadow_color_chrry']}}" style="height: 35px; border: 0">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_right_chrry']}}" name="dp_btn_text_shadow_right_chrry">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_bottom_chrry']}}" name="dp_btn_text_shadow_bottom_chrry">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                            <div class="mb-3 text-center d-flex justify-content-center">
                                <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="{{$designProduct['dp_btn_text_shadow_blur_chrry']}}" name="dp_btn_text_shadow_blur_chrry">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary">Изменить</button>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    new TomSelect('#btn_chrry_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#btn_outher_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#title_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#description_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#full_description_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
    new TomSelect('#price_font',{
        valueField: 'font',
        searchField: 'title',
        maxOptions: 150,
        options: [
                @foreach($allFontsInFolder as $font)
            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
            @endforeach
        ],
        render: {
            option: function(data, escape) {
                return  '<div>' +
                    '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });
</script>
</html>








