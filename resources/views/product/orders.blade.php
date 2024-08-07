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
        .bb {
            padding: 5px;
            width: 100%;
        }
        .btn-group-sm>.btn, .btn-sm {
            border-radius: 0;
        }
        .page-link {
            border: 0;
            box-shadow: 2px 0px 5px -5px rgba(0, 0, 0, 0.6);
        }
        .pagination {
            box-shadow: 0px 5px 5px -5px rgba(34, 60, 80, 0.6);
        }
        .page-link {
            color: #474745;
            padding: 10px 15px;
        }
    </style>
</head>
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif" >

<div class="container-fluid" style="padding: 0; margin-top: 1px">
    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
        <div class="container-fluid">
            <a class="mb-1" href="{{ route('editProfileForm', ['user' => $user->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <div class="d-grid gap-2">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="shadow rounded" type="button" style="padding:5px; border: 0; color: white; background-color: #2F96B4; font-family: 'Inter', sans-serif; font-size: 0.8rem;">
                    Как работать с заказами?
                </button>
            </div>
            <a class="" href="{{ route('editProfileForm',  ['user' => $user->id]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img" style="background-image: url({{$user->avatar}});"></div>
            </a>
        </div>
    </nav>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <label class="mt-2" style="font-size: 0.9rem"><b>1.</b> Для начала работы с системой, откройте карточку нового заказа и ознакомьтесь с ним</label>

                <label class="mt-4" style="font-size: 0.9rem"><b>2.</b> Внимательно прочитайте сообщение от заказчика, свяжитесь с ним по одному из контактов который он оставил и обсудите заказ</label>

                <label class="mt-4" style="font-size: 0.9rem"><b>3.</b> Далее решите, берете ли вы заказ в работу или нет и нажмите на соответствующие кнопки</label>
                <label class="mt-1" style="font-size: 0.9rem"><b>3.1</b> Если вы отклоните заказ, то он будет удален. Если примете, то он попадет в раздел "В работе"</label>

                <label class="mt-4" style="font-size: 0.9rem"><b>4.</b> Если принимаете заказ, приступите к его выполнению</label>

                <label class="mt-4" style="font-size: 0.9rem"><b>5.</b> После того как заказ будет выполнен, нажмите на кнопку "Выполнить заказ"</label>

                <label class="mt-4" style="font-size: 0.9rem"><b>6.</b> Заказ попдет в враздел "Обработанно" и он там будет находиться всегда</label>
                <label class="mt-4" style="font-size: 0.9rem"><b>7.</b> Ко всему заказчик попадет в вашу "Клиентскую базу" которую можно будет скачать в одном из предложанных форматоф и работать с ней, делать рассылки и тд.</label>
            </div>
        </div>
    </div>
</div>

<div class="mt-2 mb- me-3 ms-3 d-flex justify-content-between">
    <div class="col-4">
        <a class="btn-sm btn-secondary text-center bb" type="button" style="border: none; font-family: 'Inter', sans-serif; font-size: 0.8rem; border: 0; border-top-left-radius: 3px; border-bottom-left-radius: 3px;" href="{{ route('orders', ['user' => $user->id]) }}">
            Новое
            <span class="badge" style="border: 0; margin-left: 1px; background-color: mediumseagreen">
                {{count($user->orders->where('order_status', \App\Models\Order::NEW_ORDER))}}
            </span>
        </a>
    </div>
    <div class="col-4">
        <a class="btn-sm btn-success text-center bb" type="button" style="font-family: 'Inter', sans-serif; font-size: 0.8rem; border: 0; border-radius: 0px;" href="{{ route('ordersInWork', ['user' => $user->id]) }}">
            В работе
            @if(count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER)) > 0)
                <span class="badge" style="border: 0; margin-left: 1px; background-color: orangered">
                    {{count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER))}}
                </span>
            @endif
        </a>
    </div>
    <div class="col-4">
        <a class="btn-sm btn-secondary text-center bb" type="button" style="font-family: 'Inter', sans-serif; font-size: 0.8rem; border: 0; border-top-right-radius: 3px; border-bottom-right-radius: 3px;" href="{{ route('ordersProcessed', ['user' => $user->id]) }}">
            Обработанно
            <span class="badge" style="border: 0; margin-left: 1px; background-color: grey">
                {{count($user->orders->where('order_status', \App\Models\Order::PROCESSED_ORDER))}}
            </span>
        </a>
    </div>
</div>

@if(Route::current()->getName() == 'ordersProcessed' || Route::current()->getName() == 'ordersSearch')
    <div class="mt-3 mb-2 me-3 ms-3">
        <div class="col-12 text-center">
            @include('product.orders-filter', ['user' => $user])
        </div>
    </div>
@endif

<div class="me-2 ms-2 rounded">
    @foreach($orders as $order)
        <div class="card mb-2 ms-2 me-2 shadow position-relative mt-3" style="border: none;" data-bs-toggle="modal" data-bs-target="#order{{$order->id}}">
            @if($order->order_status == \App\Models\Order::NEW_ORDER)
                <span class="position-absolute top-100 start-50 translate-middle badge rounded-pill bg-info shadow">Новый заказ <span class="visually-hidden">непрочитанные сообщения</span></span>
            @elseif($order->order_status == \App\Models\Order::IN_WORK_ORDER)
                <span class="position-absolute top-100 start-50 translate-middle badge rounded-pill bg-success shadow">Заказ в работе <span class="visually-hidden">непрочитанные сообщения</span></span>
            @elseif($order->order_status == \App\Models\Order::PROCESSED_ORDER)
                <span class="position-absolute top-100 start-50 translate-middle badge rounded-pill bg-secondary shadow">Заказ обработан <span class="visually-hidden">непрочитанные сообщения</span></span>
            @endif
            <div class="row g-0" style="border-radius: 5px;">
                <div class="col-3">
                    @if(Route::current()->getName() == 'ordersSearch')
                        <img src="{{'../'.$order->product->main_photo}}" width="100" class="img-fluid" id="up" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                    @else
                        <img src="{{'../'.$order->main_photo}}" width="100" class="img-fluid" id="up" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                    @endif
                </div>
                <div class="col-9 @if($user->dayVsNight) bg-secondary @endif">
                    <div class="card-body p-2">
                        @if(Route::current()->getName() == 'ordersSearch')
                            <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 15px"><b>Название:</b> {{$order->product->title}}</h5>
                        @else
                            <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 15px"><b>Название:</b> {{$order->title}}</h5>
                        @endif
                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ от:</b> {{$order->created_at}}</h5>
                        @if($order->updated_at)
                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Принято в работу:</b> {{$order->updated_at}}</h5>
                        @endif
                        @if($order->processed_at)
                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ выполнен:</b> {{$order->processed_at}}</h5>
                        @endif
                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ:</b> #{{$order->id}}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="order{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin: 0">
                <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif shadow" style="border: 0; border-radius: 0">
                    <div class="modal-body " style="border-radius: 0">
                        <a href="{{ route('showProductDetails', ['user' => $user->slug, 'product' => $order->product_id]) }}" style="text-decoration: none; color: black">
                            <div class="row g-0 shadow mb-3" style="border-radius: 5px;">
                                <div class="col-3">
                                    @if(Route::current()->getName() == 'ordersSearch')
                                        <img src="{{'../'.$order->product->main_photo}}" width="100" class="img-fluid" id="up" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                                    @else
                                        <img src="{{'../'.$order->main_photo}}" width="100" class="img-fluid" id="up" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                                    @endif
                                </div>
                                <div class="col-9 @if($user->dayVsNight) bg-secondary @endif">
                                    <div class="card-body p-2">
                                        @if(Route::current()->getName() == 'ordersSearch')
                                            <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 15px"><b>Название:</b> {{$order->product->title}}</h5>
                                        @else
                                            <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 15px"><b>Название:</b> {{$order->title}}</h5>
                                        @endif
                                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ от:</b> {{$order->created_at}}</h5>
                                        @if($order->updated_at)
                                            <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Принято в работу:</b> {{$order->updated_at}}</h5>
                                        @endif
                                        @if($order->processed_at)
                                            <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ выполнен:</b> {{$order->processed_at}}</h5>
                                        @endif
                                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ:</b> #{{$order->id}}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                        <div class="p-1">
                            <h5 class="text-uppercase">{{$order->client_name}}</h5>

                            <div class="mt-4 mb-4">
                                <p class="theme-color mb-3">Письмо от заказчика</p>
                                <p class="text-start" style="white-space: pre-wrap; font-size: 0.8rem">{{$order->client_text}}</p>
                            </div>

                            <div class="mt-4 mb-4">
                                <p class="theme-color mb-3">Контактные данные заказчика</p>
                            </div>

                            @if($order->client_phone)
                                <div class="d-flex justify-content-between">
                                    <small>Телефон</small>
                                    <small>{{$order->client_phone}}</small>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <small>Почта</small>
                                <small>{{$order->client_email}}</small>
                            </div>
                            @if($order->client_telegram)
                                <div class="d-flex justify-content-between">
                                    <small>Telegram</small>
                                    <small>{{$order->client_telegram}}</small>
                                </div>
                            @endif
                            @if($order->client_viber)
                                <div class="d-flex justify-content-between">
                                    <small>Viber</small>
                                    <small>{{$order->client_viber}}</small>
                                </div>
                            @endif
                            @if($order->client_whatsapp)
                                <div class="d-flex justify-content-between">
                                    <small>WhatsApp</small>
                                    <small>{{$order->client_whatsapp}}</small>
                                </div>
                            @endif

                            <div class="mt-4 mb-4">
                                <p class="theme-color mb-3">Стоимость заказа</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Цена</span>
                                @if(Route::current()->getName() == 'ordersSearch')
                                    <span class="text-muted">{{$order->product->price}} руб.</span>
                                @else
                                    <span class="text-muted">{{$order->price}} руб.</span>
                                @endif
                            </div>

                            <div class="text-center mt-5">
                                @if($order->order_status == \App\Models\Order::NEW_ORDER)
                                    <form action="{{ route('changeStatusToInWork', ['user' => $user->id, 'order' => $order->id]) }}" method="post">
                                        @csrf @method('PATCH')
                                @elseif($order->order_status == \App\Models\Order::IN_WORK_ORDER)
                                    <form action="{{ route('changeStatusToInProcessed', ['user' => $user->id, 'order' => $order->id]) }}" method="post">
                                        @csrf @method('PATCH')
                                @elseif($order->order_status == \App\Models\Order::IN_WORK_ORDER)
                                    <form action="#" method="">
                                @endif
                                    <input type="hidden" value="{{true}}" name="processed">
                                    <div class="d-grid gap-2">
                                        @if($order->order_status == \App\Models\Order::NEW_ORDER)
                                            <button type="submit" class="btn btn-success">Взять в работу</button>
                                        @elseif($order->order_status == \App\Models\Order::IN_WORK_ORDER)
                                            <button type="submit" class="btn btn-secondary">Выполнить заказ</button>
                                        @elseif($order->order_status == \App\Models\Order::PROCESSED_ORDER)

                                        @endif
                                    </div>
                                </form>
                            </div>
                            @if($order->order_status == \App\Models\Order::NEW_ORDER)
                                <div class="text-center mt-2">
                                    <form action="{{ route('ordersReject', ['user' => $user->id, 'order' => $order->id]) }}" method="post"> @csrf @method('DELETE')
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-danger">Отменить заказ</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-5 mb-3 me-2 ms-2 text-center d-flex justify-content-center">
    {{$orders->links()}}
</div>

</body>
</html>




