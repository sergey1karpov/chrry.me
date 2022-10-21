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
<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif" >
<div class="container-fluid" style="padding: 0">
    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">
        <div class="container-fluid">
            <a class="mb-1" href="{{ route('editProfileForm', ['id' => $user->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <a class="" href="{{ route('editProfileForm',  ['id' => $user->id]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img" style="background-image: url({{$user->avatar}});"></div>
            </a>
        </div>
    </nav>
</div>

<div class="me-2 ms-2 rounded">
    @foreach($orders as $order)
        <div class="card mb-2 ms-2 me-2 shadow position-relative mt-3" style="border: none;" data-bs-toggle="modal" data-bs-target="#order{{$order->id}}">
            @if(!$order->processed)
            <span class="position-absolute top-100 start-50 translate-middle badge rounded-pill bg-success shadow">Новый заказ <span class="visually-hidden">непрочитанные сообщения</span></span>
            @elseif($order->processed)
                <span class="position-absolute top-100 start-50 translate-middle badge rounded-pill bg-secondary shadow">Заказ обработан <span class="visually-hidden">непрочитанные сообщения</span></span>
            @endif
            <div class="row g-0" style="border-radius: 5px;">
                <div class="col-3">
                    <img src="{{$order->main_photo}}" width="100" class="img-fluid" id="up" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                </div>
                <div class="col-9 @if($user->dayVsNight) bg-secondary @endif">
                    <div class="card-body p-2">
                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 15px"><b>Название:</b> {{$order->title}}</h5>
                        <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Заказ от:</b> {{$order->created_at}}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="order{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin: 0">
                <div class="block-modal modal-content text-center @if($user->dayVsNight) bg-dark text-white-50 @endif shadow" style="border: 0; border-radius: 0">
                    <div class="modal-body " style="border-radius: 0">
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

                            <div class="d-flex justify-content-between">
                                <small>tel.</small>
                                <small>{{$order->client_phone}}</small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small>email</small>
                                <small>{{$order->client_email}}</small>
                            </div>

                            <div class="mt-4 mb-4">
                                <p class="theme-color mb-3">Стоимость заказа</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Цена</span>
                                <span class="text-muted">{{$order->price}} руб.</span>
                            </div>
                            <div class="text-center mt-5">
                                <form action="{{ route('orderProcessing', ['id' => $user->id, 'order' => $order->id]) }}" method="POST"> @csrf @method('POST')
                                    <input type="hidden" value="{{true}}" name="processed">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-secondary">Подтвердить заказ</button>
                                        <label style="font-size: 0.8rem">Свяжитесь с заказчиком удобным для вас сбособом и обговорите детали сделки</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="me-2 ms-2 text-center">

</div>

</body>
</html>








