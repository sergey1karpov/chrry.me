<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Меню {{ $user->name }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    <!-- Fonts for template -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Users fonts -->
    @include('fonts.fonts')

    <!-- All styles -->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet" type="text/css" />
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
            <a style="border: none" class="mb-1" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">
                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">
            </a>
            <a class="" href="{{ route('userHomePage',  ['user' => $user->slug]) }}" style="text-decoration: none; border: 0; padding: 0">
                <div class="img-edit-profile" style="background-image: url({{'/'.$user->avatar}}); width: 25px; height: 25px; border-radius: 50%; margin-right: 0; background-position: center center; -wekit-background-size: cover; background-size: cover;background-repeat: no-repeat;"></div>
            </a>
        </div>
    </nav>
</div>
<div class="ms-3 me-3 mb-3 text-center">

    @if($user->avatar)
        <div class="">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12">
                    <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'avatar']) }}" method="POST">
                        @csrf @method('PATCH')
                        <input id="type-avatar" type="hidden" name="type" value="avatar">
                        <div class="d-grid gap-2">
                            <button data-id="{{$user->id}}" id="delete-avatar" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">@lang('app.p_ava_del')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if($user->banner)
        <div class="">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12">
                    <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'banner']) }}" method="POST">
                        @csrf @method('PATCH')
                        <input id="type-banner" type="hidden" name="type" value="banner">
                        <div class="d-grid gap-2">
                            <button data-id="{{$user->id}}" id="delete-banner" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить фоновое изображение</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if($user->favicon)
        <div class="" >
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12">
                    <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'favicon']) }}" method="POST">
                        @csrf @method('PATCH')
                        <input id="type" type="hidden" name="type" value="favicon">
                        <div class="d-grid gap-2">
                            <button data-id="{{$user->id}}" id="delete-favicon" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить фавикон</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if(isset($user->logotype))
        <div class="mb-3">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12">
                    <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'logotype']) }}" method="POST">
                        @csrf @method('PATCH')
                        <input id="type" type="hidden" name="type" value="logotype">
                        <div class="d-grid gap-2">
                            <button data-id="{{$user->id}}" id="delete-logotype" type="submit" class="btn-sm btn-danger mb-3 mt-3" style="font-family: 'Rubik', sans-serif; ">Удалить логотип</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <form action="{{ route('editUserProfile', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" class="text-center">
        @csrf @method('PATCH')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name')</label>
            <input value="{{$user->name}}" type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="{{$user->name}}" maxlength="100" style="border: 0">
            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_name_descr')</span>
        </div>
        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_name_color')</label>
        <div class="mb-3 text-center d-flex justify-content-center">
            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->name_color}}" title="Choose your color" name="name_color" style="height: 35px; border: 0">
            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_n_def')</span>
        </div>
        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.page_adress')</label>
        <div class="input-group mb-3 text-center">
            <span class="input-group-text shadow" id="basic-addon3" style="border: 0">chrry.me/</span>
            <input placeholder="{{$user->slug}}" type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="basic-url" aria-describedby="basic-addon3" name="slug" description="{{$user->slug}}" maxlength="150" style="border: 0">
            <span class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.page_adress_descr')</span>
        </div>
        <div class="mb-3 text-center">
            <label for="exampleFormControlTextarea1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.page_descr')</label>
            <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="exampleFormControlTextarea1" rows="3" name="description" maxlength="150" style="border: 0">{{$user->description}}</textarea>
            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_page_descr_descr')</span>
        </div>
        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_color_descr')</label>
        <div class="mb-3 text-center d-flex justify-content-center">
            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->description_color}}" title="Choose your color" name="description_color" style="height: 35px; border: 0">
            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_color_descr_def')</span>
        </div>
        @if($user->verify == 1)
            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.verif_icon_color')</label>
            <div class="mb-3 text-center d-flex justify-content-center">
                <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->verify_color}}" title="Choose your color" name="verify_color" style="height: 35px; border: 0">
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_v_i_c_def')</span>
            </div>
        @endif
        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_color')</label><br>
        <div class="mb-3 text-center d-flex justify-content-center">
            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->background_color}}" title="Choose your color" name="background_color" style="height: 35px; border: 0">
        </div>

        @if(isset($user->avatar))
            <div class="mb-3">
                <img src="{{'../'.$user->avatar}}" class="img-fluid rounded" width="250">
            </div>
        @endif

        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_download_ava')</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="avatar" style="border: 0">
            <span class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_download_ava_rules')</span>
        </div>

        <hr>

        @if(isset($user->logotype))
            <div class="mb-3">
                <img src="{{'../'.$user->logotype}}" class="img-fluid" width="250" style="
                                filter: drop-shadow({{$user->logotype_shadow_right}}px {{$user->logotype_shadow_bottom}}px {{$user->logotype_shadow_round}}px {{$user->logotype_shadow_color}});
                            ">
            </div>
        @endif

        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Загрузить логотип</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="logotype" style="border: 0">
            <span class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете загрузить свой логотип, который будет отображаться вместо круглого аватара и имени профиля. Что бы вернуться к аватару, просто удалите логотип. Пока принимаем только PNG</span>
        </div>

        @if(isset($user->logotype))
        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Размер логотипа</label>
        <div class="input-group mb-3">
            <input type="range" class="form-range" min="200" max="350" step="1" id="customRange3" name="logotype_size" value="{{$user->logotype_size}}">
        </div>

        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тень вправо</label>
        <div class="input-group mb-3">
            <input type="range" class="form-range" min="0" max="40" step="1" id="customRange3" name="logotype_shadow_right" value="{{$user->logotype_shadow_right}}">
        </div>

        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тень вниз</label>
        <div class="input-group mb-3">
            <input type="range" class="form-range" min="0" max="40" step="1" id="customRange3" name="logotype_shadow_bottom" value="{{$user->logotype_shadow_bottom}}">
        </div>

        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тень радиус</label>
        <div class="input-group mb-3">
            <input type="range" class="form-range" min="0" max="40" step="1" id="customRange3" name="logotype_shadow_round" value="{{$user->logotype_shadow_round}}">
        </div>

        <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет тени</label>
        <div class="mb-3 text-center d-flex justify-content-center">
            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->logotype_shadow_color}}" title="Choose your color" name="logotype_shadow_color" style="height: 35px; border: 0">
        </div>
        @endif

        <hr>

        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_background_img')</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="banner" style="border: 0">
            <span class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_background_img_descr')</span>
        </div>
        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Загрузить фавикон</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="favicon" style="border: 0">
            <span class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Малюсенькая картинка, которая будет отображаться в верху браузера. Обычно её размер 32х32 пикселя</span>
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_select_lang')</label>
            <select name="locale" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                <option selected>@lang('app.p_select')</option>
                <option @if($user->locale == 'ru') selected @endif value="ru">Русский</option>
                <option @if($user->locale == 'en') selected @endif value="en">English</option>
            </select>
        </div>

        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Показать логотип CHRRY.ME</label>
            <select name="show_logo" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                <option @if($user->show_logo == '1') selected @endif value="{{1}}">Показать</option>
                <option @if($user->show_logo == '0') selected @endif value="{{0}}">Отключить</option>
            </select>
            <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Отображать наш логотип на странице или нет</span>
        </div>

        <label class="form-check-label mb-1" for="flexCheckChecked" style="font-family: 'Rubik', sans-serif;">
            Цвет для навигационных кнопок
        </label>
        <div class="mb-3 text-center d-flex justify-content-center">
            <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" value="{{$user->navigation_color}}" name="navigation_color" style="height: 35px; border: 0">
        </div>

        <div>
            <div class=" mb-3">
                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Отображение бара с соц сетями</label>
                <select id="social_links_bar" name="social_links_bar" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                    <option @if($user->social_links_bar == '1') selected @endif value="{{1}}">Включить</option>
                    <option @if($user->social_links_bar == '0') selected @endif value="{{0}}">Выключить</option>
                </select>
                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Если у вас тип страницы "Ссылки", вы можете все свои ссылки с нашими иконками вынести в отдельный бар</span>
            </div>

            <div id="social_links_bar_settings">
                <div class=" mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Позиция бара с соц сетями</label>
                    <select name="links_bar_position" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                        <option @if($user->links_bar_position == 'top') selected @endif value="top">Вверху</option>
                        <option @if($user->links_bar_position == 'bottom') selected @endif value="bottom">Внизу</option>
                    </select>
                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать где отобразить бар с сылками, вверху или внизу</span>
                </div>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Размер иконок</label>
                <div class="input-group mb-3">
                    <input type="range" class="form-range" min="40" max="70" step="1" id="customRange3" name="round_links_width" value="{{$user->round_links_width}}">
                </div>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тень вправо</label>
                <div class="input-group mb-3">
                    <input type="range" class="form-range" min="0" max="40" step="1" id="customRange3" name="round_links_shadow_right" value="{{$user->round_links_shadow_right}}">
                </div>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тень вниз</label>
                <div class="input-group mb-3">
                    <input type="range" class="form-range" min="0" max="40" step="1" id="customRange3" name="round_links_shadow_bottom" value="{{$user->round_links_shadow_bottom}}">
                </div>

                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тень радиус</label>
                <div class="input-group mb-3">
                    <input type="range" class="form-range" min="0" max="40" step="1" id="customRange3" name="round_links_shadow_round" value="{{$user->round_links_shadow_round}}">
                </div>

                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Цвет тени</label>
                <div class="mb-3 text-center d-flex justify-content-center">
                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$user->round_links_shadow_color}}" title="Choose your color" name="round_links_shadow_color" style="height: 35px; border: 0">
                </div>
            </div>
        </div>

        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Тип страницы</label>
            <select id="type-profile" name="type" class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" style="border: 0">
                <option selected>Выберите тип страницы</option>
                <option @if($user->type == 'Links') selected @endif value="Links">Ссылки</option>
                <option @if($user->type == 'Events') selected @endif value="Events">Афиша</option>
                <option @if($user->type == 'Market') selected @endif value="Market">Магазин</option>
            </select>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-secondary mb-1 mt-3" style="font-family: 'Rubik', sans-serif; border: 0; color: white">@lang('app.p_edit_prof')</button>
        </div>
    </form>
</div>
</body>
<script>
    //Hide upload field if icon selected
    $( document ).ready(function() {
        $('#select-beast-empty').change(function(){
            $('#pp').html($(this).val());
            if($(this).val() != '') {
                $('#download-file').hide();
            }
            if($(this).val() == '') {
                $('#download-file').show();
            }
        });
    });

    $( document ).ready(function() {
        var type = $('#social_links_bar').val();
        if(type == 1) {
            $('#social_links_bar_settings').show();
        }
        if(type == 0) {
            $('#social_links_bar_settings').hide();
        }

        $('#social_links_bar').change(function(){
            $('#pp').html($(this).val());
            if($(this).val() == 0) {
                $('#social_links_bar_settings').hide();
            }
            if($(this).val() == 1) {
                $('#social_links_bar_settings').show();
            }
        });
    });

</script>
</html>








