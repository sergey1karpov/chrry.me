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
            <form action="{{ route('addLink', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                @csrf @method('POST')
                <input type="hidden" name="type" value="LINK">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">*@lang('app.m_text_link')</label>
                    <input type="text" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow" name="title" placeholder="" maxlength="100" style="border: 0">
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">*@lang('app.m_insert_link')</label>
                    <input type="text" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow" name="link" style="border: 0">
                </div>
                <div class="mb-3" id="download-file">
                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>
                    <input type="file" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow" id="inputGroupFile02" name="photo" accept=".jpg, .jpeg, .png, .gif" style="border: 0">
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете прикрепить для своей ссылки любое изображение или гифку</span>
                </div>
                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Прикрепить иконку</label>
                <div class="mb-3 ">
                    <select id="select-beast-empty" data-placeholder="Начните вводить название..."  autocomplete="off" name="icon"></select>
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если не хотите загружать картинку, можете выбрать иконку из нашей базы. Просто начните вводить нужное вам название, но будьте осторожны, размер иконок может не соответствовать размерам ссылок</span>
                </div>

                <hr>
                <div class="text-center">
                    Дизайн ссылки
                </div>
                <hr>

                <div class="mb-3 text-center" >
                    <div class="ms-2 form-check" style="padding: 0">
                        <div class="form-check form-switch mb-3">
                            <input name="check_last_link" class="form-check-input shadow" type="checkbox" value="penis" id="design-link" style="border: 0">
                            <label class="form-check-label" for="flexCheckDefault">
                                @lang('app.last_style_2')
                            </label>
                        </div>
                    </div>
                    <label for="exampleInputEmail1" class="form-label " style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">Этот переключатель поможет вам скопировать дизайн вашей последней созданной ссылки, что бы не нужно было самому заполнять ввсе параметры опять</label>
                </div>
                <div id="design-block">
                    <div class="text-center row">
                        <div class="col-9">
                            <select id="select-beast-empty-font" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>
                        </div>
                        <div class="col-3">
                            <select class="block-input @if($user->dayVsNight) bg-secondary @endif form-select shadow" aria-label="Default select example" name="font_size" style="border: 0; height: 34px">
                                <option value="0.9">1</option>
                                <option value="1">2</option>
                                <option value="1.1">3</option>
                                <option value="1.2">4</option>
                            </select>
                        </div>
                    </div>
                    <label class="mb-3 mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>

                    <div class="mb-3 text-center">
                        <div class="form-check form-switch text-center">
                            <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">
                            <label class="form-check-label" for="flexCheckDefault">Сделать текст ссылки жирным</label>
                        </div>
                    </div>

                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>
                    <div class="mb-3 text-center d-flex justify-content-center">
                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput" value="#050507" title="Choose your color" name="title_color" style="height: 40px; border: 0"><br>
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_title_color_description')</span>
                    </div>

                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>
                    <div class="mb-3 text-center row">
                        <div class="col-12">
                            <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput" value="#050507" title="Choose your color" name="text_shadow_color" style="height: 40px; border: 0"><br>
                        </div>
                        <div class="col-12">
                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Четкость тени</span>
                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_blur" value="0">
                        </div>
                        <div class="col-12">
                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>
                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_bottom" value="0">
                        </div>
                        <div class="col-12">
                            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг вправо</span>
                            <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="0">
                        </div>
                    </div>

                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>
                    <div class="mb-3 text-center d-flex justify-content-center">
                        <input type="color" class="form-control block-input @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color" style="height: 40px; border: 0">
                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_background_color_description')</span>
                    </div>
                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>
                    <div class="mb-3 text-center d-flex justify-content-center">
                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">
                    </div>
                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_shadow')</label>
                    <div class="mb-3 text-center">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" style="border: 0">
                                        <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" style="border: 0">
                                        <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" style="border: 0">
                                        <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" style="border: 0">
                                        <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_round')</label>
                    <div class="mb-3 text-center d-flex justify-content-center">
                        <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="10">
                    </div>

                    <div class="mb-3 text-center">
                        <div>
                            <select class="block-input @if($user->dayVsNight) bg-secondary @endif form-select shadow" aria-label="Default select example" name="animation" style="border: 0">
                                <option selected>Выбрать анимацию...</option>
                                <option value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                                <option value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                            </select>
                        </div>
                        <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <div class="form-check form-switch text-center">
                        <input name="pinned" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">
                        <label class="form-check-label" for="flexCheckDefault">
                            Закрепите ссылку и она всегда будет вверху списка
                        </label>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-secondary shadow" style="border: 0">@lang('app.m_add_link')</button>
                </div>
            </form>
        </div>
    </body>
    <script>
        new TomSelect('#select-beast-empty',{
            valueField: 'img',
            searchField: 'title',
            options: [
                    @foreach($allIconsInsideFolder as $icon)
                {id: {{$icon->getInode()}}, title: '{{substr($icon->getFilename(), 0, strrpos($icon->getFilename(),'.'))}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},
                @endforeach
            ],
            render: {
                option: function(data, escape) {
                    return  '<table>' +
                        '<tr>' +
                        '<img style="background-color: #DCDCDC" width="90" src="' + escape(data.img) + '">' +
                        '<h6>' + escape(data.title) + '</h6' +
                        '</tr>' +
                        '</table>';

                },
                item: function(data, escape) {
                    return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                }
            }
        });
    </script>

    {{-- Fonts select loader for Links--}}
    <script>
        new TomSelect('#select-beast-empty-font',{
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
                        '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                }
            }
        });
    </script>
</html>







