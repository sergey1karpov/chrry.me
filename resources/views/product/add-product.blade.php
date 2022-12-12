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
                <a class="mb-1" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">
                    <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
                </a>
                <a class="" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                    <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>
                </a>
            </div>
        </nav>
    </div>

    <div class="ms-3 me-3 mb-3 text-center">
        <form action="{{ route('addProduct', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
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

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Выберите категорию</label>
                <select class="form-select shadow" aria-label="Default select example" style="border: 0" name="product_categories_id">
                    @foreach($user->productCategories as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                <label class="mt-2" style="font-family: 'Rubik', sans-serif; font-size: 12px">По умолчанию все товары попадают в категорию "Все товары". Что бы изменить или добавить новую категорию перейдите <a href="{{ route('allCategories', ['user' => $user->id]) }}">сюда</a></label>
            </div>

            {{-- Market buttons --}}
            <hr>
                <div class="mb-3"> <!-- Название продукта -->
                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на товар</label>
                    <input class="form-control mb-1 @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_shop" id="title" placeholder="Ozon, Wildberries и тд..." style="border: 0">
                    <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Разместите ссылку на ваш товар\услугу которая продаётся на другой площадке</label>

                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Текст для ссылки на товар</label>
                    <input class="form-control mt-2 @if($user->dayVsNight) bg-secondary @endif shadow" name="link_to_shop_text" id="title" placeholder="Купить на Ozon" style="border: 0">
                    <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Вы можете указать название для кнопки на ресурс с товаром</label>
                </div>
            <hr>

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

            <div class="mb-3 text-center" style="background-color: orangered">
                <div class="ms-2 form-check" style="padding: 0">
                    <div class="form-check form-switch mb-3">
                        <input name="copy_styles" class="form-check-input @if($user->dayVsNight) bg-secondary @endif shadow" type="checkbox" value="{{true}}" id="design-link-e" style="border: 0">
                        <label style="font-family: 'Rubik', sans-serif; font-size: 12px; color: #FFFFFF">Если использовать этот переключатель, то при создании нового продукта, вам не нужно будет
                        заново устанавливать все параметры стиля. Они автоматически скопируются с вашего последнего продукта.</label>
                    </div>
                </div>
            </div>

            <hr>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button style="border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Параметры дизайна карточки продукта
                            </button>
                        </h2>
                        <div style="background-color: #f1f2f2" id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет фона карточки</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_card_bg_color" style="height: 35px; border: 0">
                                </div>
                            </div>

                            <hr>
                            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн заголовка</label>
                            <hr>

                            <div class="mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для заголовка</label>
                                <div class="col-12">
                                    <select id="title_font" data-placeholder="Поиск шрифта для заголовка"  autocomplete="off" name="dp_title_font"></select>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для заголовка</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="1" name="dp_title_font_size">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет заголовка</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_title_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени заголовка</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_title_shadow_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_title_shadow_right">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_title_shadow_bottom">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_title_shadow_blur">
                                </div>
                            </div>

                            <hr>
                                <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн короткого описания</label>
                            <hr>

                            <div class="mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для короткого описания</label>
                                <div class="col-12">
                                    <select id="description_font" data-placeholder="Поиск шрифта для короткого описания"  autocomplete="off" name="dp_description_font"></select>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для короткого описания</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="1" name="dp_description_font_size">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет короткого описания</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_description_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени короткого описания</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_description_shadow_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_description_shadow_right">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_description_shadow_bottom">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_description_shadow_blur">
                                </div>
                            </div>

                            <hr>
                            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн полного описания</label>
                            <hr>

                            <div class="mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для полного описания</label>
                                <div class="col-12">
                                    <select id="full_description_font" data-placeholder="Поиск шрифта для полного описания"  autocomplete="off" name="dp_full_description_font"></select>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для полного описания</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="1" name="dp_full_description_font_size">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет полного описания</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_full_description_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени полного описания</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_full_description_shadow_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_full_description_shadow_right">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_full_description_shadow_bottom">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_full_description_shadow_blur">
                                </div>
                            </div>

                            <hr>
                            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн цены</label>
                            <hr>

                            <div class="mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Выбор шрифта для цены</label>
                                <div class="col-12">
                                    <select id="price_font" data-placeholder="Поиск шрифта для цены"  autocomplete="off" name="dp_price_font"></select>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Размер шрифта для цены</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0.8" max="4" step="0.1" id="customRange3" style="height: 35px; border: 0" value="1" name="dp_price_font_size">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет цены</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_price_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени цены</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_price_shadow_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_price_shadow_right">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_price_shadow_bottom">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_price_shadow_blur">
                                </div>
                            </div>

                            <hr>
                            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн кнопки на внешний ресурс</label>
                            <hr>

                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на внешний ресурс</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_bg_color_outher" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на внешний ресурс</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_color_outher" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление кнопки на внешний ресурс</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="dp_btn_rounded_outher" value="1">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени кнопки на внешний ресурс</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_rounded_outher_shadow_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_btn_rounded_outher_shadow_right">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_btn_rounded_outher_shadow_bottom">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_btn_rounded_outher_shadow_blur">
                                </div>
                            </div>

                            <hr>
                            <label class="form-check-label" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Дизайн кнопки на страницу заказа</label>
                            <hr>

                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на страницу заказа</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_bg_color_chrry" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет кнопки на страницу заказа</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_text_color_chrry" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Округление кнопки на страницу заказа</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="dp_btn_rounded_chrry" value="1">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Цвет тени кнопки на страницу заказа</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" name="dp_btn_rounded_chrry_shadow_color" style="height: 35px; border: 0">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в право</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_btn_rounded_chrry_shadow_right">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Смещение тени в низ</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_btn_rounded_chrry_shadow_bottom">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Четкость тени</label>
                                <div class="mb-3 text-center d-flex justify-content-center">
                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3" style="height: 35px; border: 0" value="0" name="dp_btn_rounded_chrry_shadow_blur">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <label class="form-check-label mb-2 mt-3" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem">В настройках магазина вы навернека уже описывали правила своего магазина. Но иногда бывает нужно написать правила
                для конкретного товара. Можете использовать эти поля</label>

                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button style="border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rules" aria-expanded="false" aria-controls="flush-collapseOne">
                                Правила магазина
                            </button>
                        </h2>
                        <div style="background-color: #f1f2f2" id="flush-rules" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                            <div class="form-group mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Информация о доставке</label>
                                <textarea class="form-control" name="product_delivery_info" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Информация об оплате</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="product_payment_info" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Информация о возвратах\обменах</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="product_refund_info" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">Любая общая информация</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="product_other_info" rows="3"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary">@lang('app.m_add_link')</button>
            </div>
        </form>
    </div>

</body>
<script>
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








