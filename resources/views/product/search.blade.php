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

    @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-12" style="padding: 0">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: #469597">
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
            <form class="" action="{{ route('searchProducts', ['id' => Auth::user()->id]) }}">
                <input class="form-control me-2" type="search" placeholder="Поиск товаров" aria-label="Search" name="search" style="height: 30px">
            </form>
            <a class="" href="{{ route('userHomePage',  ['slug' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img" style="background-image: url({{$user->avatar}});"></div>
            </a>
        </div>
    </nav>
</div>

<div class="text-center ms-3 ml-3 mt-2 mb-2">
    <label style="font-family: 'Rubik', sans-serif; font-size: 12px">Если хотите поменять продукты местами, дотроньтесь до изображения нужного вам продукта и перенесите его на нужную позицию</label>
</div>

<table class="table">
    <tbody>
    @foreach($products as $product)
        <tr data-index="{{$product->id}}" data-position="{{$product->position}}">
            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">

                <div class="mt-">
                    <div class="card mb-2 ms-2 me-2 shadow" style="border: none;">
                        <div class="row g-0" style="border-radius: 5px;">
                            <div class="col-3">
                                <img src="{{'../'.$product->main_photo}}" width="100" class="img-fluid" id="up" style="border-top-left-radius: 5px;">
                            </div>
                            <div class="col-9 @if($user->dayVsNight) bg-secondary @endif">
                                <div class="card-body p-2">
                                    <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="font-family: 'Rubik', sans-serif; font-size: 15px"><b>Название:</b> {{$product->title}}</h5>
                                    <h5 class="card-title @if($user->dayVsNight) text-white-50 @endif" style="margin-bottom: 0; font-family: 'Rubik', sans-serif; font-size: 13px"><b>Создано:</b> {{$product->created_at}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between" style="padding: 0; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
                            <div class="col-4 border-end text-center" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black; border-bottom-left-radius: 5px;">
                                <a href="#" style="text-decoration: none; color: black">
                                    <button href="#" class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                        Статистика
                                    </button>
                                </a>
                            </div>
                            <div class="col-4 border-end text-center" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;">
                                <a href="{{route('showProduct', ['id' => $user->id, 'product' => $product->id])}}">
                                    <button class="btn-sm" style="background-color: #f1f2f2; border: 0;">
                                        Изменить
                                    </button>
                                </a>
                            </div>
                            <div class="col-4 text-center" style="background-color: #FD5D5B; border-bottom-right-radius: 5px;">
                                <form action="{{ route('deleteProduct', ['id' => $user->id, 'product' => $product->id]) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn-sm" style="background-color: #FD5D5B; border: 0;">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

@foreach($products as $product)
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('table tbody').sortable({
                handle:'#up',
                update: function (event, ui) {
                    $(this).children().each(function (index) {
                        if ($(this).attr('data-position') != (index+1)) {
                            $(this).attr('data-position', (index+1)).addClass('updated');
                        }
                    });

                    saveNewPositions();
                }
            });
        });

        function saveNewPositions() {
            var positions = [];
            $('.updated').each(function () {
                positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                $(this).removeClass('updated');
            });

            $.ajax({
                url: "product/sort",
                method: 'POST',
                dataType: 'text',
                data: {
                    update: 1,
                    positions: positions
                }, success: function (response) {
                    console.log(response);
                }
            });
        }
    </script>
@endforeach

</html>








