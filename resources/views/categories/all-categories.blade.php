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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">

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
        .ts-control {
            border: 0;
            box-shadow: 0px 1px 10px 2px rgba(0, 0, 0, 0.2);
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
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: lightseagreen">
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

        <div class="ms-2 me-2 mb-3 text-center">

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add-category">Добавить категорию</button>
            </div>
            <div class="modal fade" id="add-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form class="" action="{{ route('createCategory', ['id' => $user->id]) }}" method="POST"> @csrf @method('POST')
                                <div class="mb-3 text-center">
                                    <label for="exampleInputEmail1" class="form-label">Название категории</label>
                                    <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Выберите подходящее название для вашей категории</div>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="exampleInputEmail1" class="form-label">Slug категории</label>
                                    <input required type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Короткое имя вашей категории без пробелов</div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="submit">Создать категорию</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <tbody>
                    @foreach($categories as $category)
                        <tr data-index="{{$category->id}}" data-position="{{$category->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                                <div class="mt-" data-index="{{$category->id}}" data-position="{{$category->position}}">
                                    <div class="card shadow" style="border: none;">
                                        <div class="row g-0" style="border-radius: 5px;">
                                            <div class="col-2 d-flex align-items-center" id="up">
                                                <img src="https://i.ibb.co/HdtH8Z5/dots-three-vertical.png" width="20">
                                            </div>
                                            <div class="col-8 text-center">
                                                <h1 style="font-family: 'Inter', sans-serif; font-size: 1rem; margin-top: 8px; margin-bottom: 8px;">{{$category->name}}</h1>
                                            </div>
                                            <div class="col-2 d-flex align-items-center">
                                                <div class="row">
                                                    <div class="col-6" style="padding-right: 0" data-bs-toggle="modal" data-bs-target="#editCat{{$category->id}}">
                                                        <img src="https://i.ibb.co/tQpXNcg/edit-1.png" width="20">
                                                    </div>
                                                    @if($category->slug != 'all')
                                                        <div class="col-6">
                                                            <form method="post" action="{{ route('deleteCategory', ['id' => $user->id, 'category' => $category->id]) }}"> @csrf @method('DELETE')
                                                                <button class="btn p-0" type="submit">
                                                                    <img src="https://i.ibb.co/7R29Bpj/remove.png" width="20">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="editCat{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="{{ route('editCategory', ['id' => $user->id, 'category' => $category->id]) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <div class="mb-3 text-center">
                                                <label for="exampleInputEmail1" class="form-label">Название категории</label>
                                                <input required type="text" value="{{$category->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">Выберите подходящее название для вашей категории</div>
                                            </div>
                                            <div class="mb-3 text-center">
                                                <label for="exampleInputEmail1" class="form-label">Slug категории</label>
                                                <input required pattern=".*\S+.*" title="This field is required" type="text" value="{{$category->slug}}" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">Короткое имя вашей категории без пробелов</div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-success" type="submit">Обновить категорию</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        @foreach($categories as $category)
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
                    var userId = {{$user->id}};
                    var positions = [];
                    $('.updated').each(function () {
                        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                        $(this).removeClass('updated');
                    });

                    $.ajax({
                        // url: userId + "/categories/sort",
                        url: "{{ route('sortCategory', ['id' => $user->id]) }}",
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
    </body>
</html>









