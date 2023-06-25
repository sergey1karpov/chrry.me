<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$user->seo->title ?? $user->name}}</title>
    @if(isset($user->seo->description))
        <meta name="description" content="{{ $user->seo->description }}" />
    @endif

    @if(isset($user->seo->keywords))
        <meta name="keywords" content="{{ implode(', ', unserialize($user->seo->keywords)) }}" />
    @endif

    <link rel="icon" type="image/x-icon" href="{{$user->settings->favicon}}">

    <!-- Tailwind Css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <!-- Flowbite DatePicker-->
    <script src="https://unpkg.com/flowbite@1.5.5/dist/datepicker.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Tom Select -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

    <!-- Animation animate.style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Yandex social -->
    <script src="https://yastatic.net/share2/share.js"></script>

    @if($user->yandex_metrika != 0 || $user->yandex_metrika != null)
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();
                for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym({{$user->yandex_metrika}}, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/93937293" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    @endif

    @include('fonts.fonts')

    <x-embed-styles />

    <style type="text/css">
        @if($user->settings->banner)
	        	body {
            background: url({{ $user->settings->banner }}) no-repeat center center fixed;
            background-size: cover;
        }
        @elseif($user->settings->banner == null & $user->settings->background_color != null)
				body {
            background-color: {{$user->settings->background_color}};
        }
        @endif
        .ya-share2 {
            width: 38px;
            height: 38px;
        }
        .ts-control {
            padding: 1rem;
            border-radius: 0.5rem;
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity));
            font-size: .875rem;
            line-height: 1.25rem;
        }
        .ts-dropdown, .ts-control, .ts-control input {
            color: #303030;
            font-family: inherit;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-smoothing: inherit;
        }
    </style>
</head>
<body class="relative flex flex-col min-h-screen">

    <header aria-label="Page Header" class="header-block">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    @auth
                        @if(Auth::user()->id == $user->id)
                            <a href="{{ route('editProfileForm', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                @if($user->type == 'Events')
                    @if($user->settings->event_followers == '1')
{{--                        <div class="flex flex-1 items-center justify-end gap-8" style="display: none">--}}
{{--                            <span class="material-symbols-outlined" data-drawer-backdrop="false" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe" data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]" aria-controls="drawer-swipe">ios_share</span>--}}
{{--                        </div>--}}
                    @endif
                @endif
{{--                <button type="button" data-modal-toggle="popup-modal-shared" class="text-indigo-100 bg-white border border-white hover:bg-gray-100 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-white dark:text-gray-100 dark:hover:text-white dark:focus:ring-gray-100">--}}
{{--                    <svg class="w-4 h-4 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
                <div class="ya-share2" data-image="{{$user->settings->logotype}}" data-curtain data-limit="0" data-more-button-type="short" data-services="vkontakte,telegram,twitter,viber,whatsapp,skype,tumblr,linkedin,digg,reddit"></div>
            </div>
        </div>
    </header>

    <div id="popup-modal-shared" aria-hidden="true" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto flex items-center">
            <div class="relative w-full bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal-shared">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="p-6 text-center mt-5">
                    <div class="flex items-center justify-between py-2">
                        <textarea id="text_for_copy" rows="1" readonly class="block mr-2 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{url()->full()}}</textarea>
                        <button type="button" id="copy_btn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Копировать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <navigation>
        <div class="mx-auto max-w-screen-xl px-4 pb-4 sm:px-6 lg:px-8 text-center">
            @if($user->settings->avatar_vs_logotype == 'Logotype')
                <div class="flex justify-center mb-3 mt-3">
                    <img src="{{$user->settings->logotype}}" class="" width="{{$user->settings->logotype_size}}" style="
                        filter: drop-shadow({{$user->settings->logotype_shadow_right}}px {{$user->settings->logotype_shadow_bottom}}px {{$user->settings->logotype_shadow_round}}px {{$user->settings->logotype_shadow_color}});
                        @if($user->settings->logotype_shadow_right) margin-right:{{$user->settings->logotype_shadow_right}}px; @endif
                    ">
                </div>
                @if(!$user->settings->logotype)
                    <h2 class="mt-4 flex justify-center items-center" style="
                        font-family: {{ $user->settings->name_font ?? 'Rubik' }}, sans-serif;
                        text-shadow:{{$user->settings->name_font_shadow_right ?? 0}}px {{$user->settings->name_font_shadow_bottom ?? 0}}px {{$user->settings->name_font_shadow_blur ?? 0}}px {{$user->settings->name_font_shadow_color ?? '#464646'}} ;
                        font-size: {{ $user->settings->name_font_size ?? 1}}rem;
                        color: {{ $user->settings->name_color ?? '#464646'}};
                    ">
                        @if($user->settings->name_bold == true)
                            <b>{{ $user->name }}</b>
                        @else
                            {{ $user->name }}
                        @endif
                    @if($user->verify == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ml-3 mt-1 bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->settings->verify_color}}">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                        @endif
                    </h2>
                @endif
            @else
                @if($user->settings->avatar)
                    <div class="flex justify-center mt-10">
                        <img src="{{$user->settings->avatar}}" class="rounded-full" style="width: 100px; height: 100px">
                    </div>
                @endif
                <h2 class="mt-4 flex justify-center items-center" style="
                    font-family: {{ $user->settings->name_font ?? 'Rubik' }}, sans-serif;
                    text-shadow:{{$user->settings->name_font_shadow_right ?? 0}}px {{$user->settings->name_font_shadow_bottom ?? 0}}px {{$user->settings->name_font_shadow_blur ?? 0}}px {{$user->settings->name_font_shadow_color ?? '#464646'}} ;
                    font-size: {{ $user->settings->name_font_size ?? 1}}rem;
                    color: {{ $user->settings->name_color ?? '#464646'}};
                ">
                    @if($user->settings->name_bold == true)
                        <b>{{ $user->name }}</b>
                    @else
                        {{ $user->name }}
                    @endif
                    @if($user->verify == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ml-4 mt-1 bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->settings->verify_color}}">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                    @endif
                </h2>
                @if($user->description)
                    <p class="mt-1" style="
                        line-height: 1.4;
                        font-family: {{ $user->settings->description_font ?? 'Rubik' }}, sans-serif;
                        text-shadow:{{$user->settings->description_font_shadow_right ?? 0}}px {{$user->settings->description_font_shadow_bottom ?? 0}}px {{$user->settings->description_font_shadow_blur ?? 0}}px {{$user->settings->description_font_shadow_color ?? '#464646'}} ;
                        font-size: {{ $user->settings->description_font_size ?? 0.9}}rem;
                        color: {{ $user->settings->description_color ?? '#464646'}};
{{--                        @if($user->settings->description_font_shadow_right) margin-right: {{$user->settings->description_font_shadow_right}}px @endif--}}
                    ">
                        @if($user->settings->description_bold == true)
                            <b>{{ $user->description }}</b>
                        @else
                            {{ $user->description }}
                        @endif
                    </p>
                @endif
            @endif
        </div>
    </navigation>

    <top-links-bar>
        <div class="flex justify-evenly mb-5">
            @if($user->settings->social_links_bar == 1)
                @if($user->settings->links_bar_position == 'top')
                    @if(count($user->userLinks(false)) > 0)
                        <nav class="navbar mt-2">
                            <div class="flex flex-wrap justify-center">
                                @foreach($user->userLinksInBar($user) as $link)
                                    @if($link->icon)
                                        <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf
                                            <input type="hidden" name="link_id" value="{{$link->id}}">
                                            <input type="hidden" name="link_url" value="{{$link->link}}">
                                            <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                <img src="{{$link->icon}}" class="ml-2 mr-2 mt-3 " style="width:{{ $user->settings->round_links_width }}px; filter: drop-shadow({{ $user->settings->round_links_shadow_right }}px {{ $user->settings->round_links_shadow_bottom }}px {{ $user->settings->round_links_shadow_round }}px {{ $user->settings->round_links_shadow_color }})">
                                            </button>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </nav>
                    @endif
                @endif
            @endif
        </div>
    </top-links-bar>

    @if($user->type == 'Links')
        <links>
            @if($user->settings->social_links_bar == 0)
                @if(count($user->userLinks(false)) > 0)
                    <div class="mx-auto max-w-screen-xl px-4 pt-4 sm:px-6 lg:px-8">
                        <div class="group block">
                            <table class="table w-full">
                                <tbody>
                                @foreach($user->userLinks(true) as $link)
                                    @php
                                        $properties = unserialize($link->properties)
                                    @endphp
                                    <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                        <td>
                                            <div class="mb-5 justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                                <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf
                                                    <input type="hidden" name="link_id" value="{{$link->id}}">
                                                    <input type="hidden" name="link_url" value="{{$link->link}}">
                                                    <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1" style="
                                                        animation-duration: {{$link->animation_speed}}s;
                                                        border-color: {{$properties['dl_border_color']}};
                                                        background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                        border-radius: {{$properties['dl_rounded']}}px;
                                                        background-position: center;
                                                        box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                        @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                        @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif
                                                    ">
                                                        <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                            <div class="col-span-1 flex items-center flex-none">
                                                                @if($link->icon)
                                                                    <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @elseif($link->icon == false && $link->photo == true)
                                                                    <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @else
                                                                    <img class="mt-1 mb-1" src="https://emoji.discadia.com/emojis/914c0e06-428c-4c1d-bf2c-3393dc14987f.PNG" style="width:50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                                @endif
                                                            </div>
                                                            <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                                <div class="col-span-10 text-center flex items-center">
                                                                    <div class="ml-3 mr-3">
                                                                        <h4 class="text-ellipsis" style="
                                                                            text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                            font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                            line-height: 1.5;
                                                                            font-size: {{$properties['dl_font_size']}}rem;
                                                                            margin: 0;
                                                                            color: {{$properties['dl_title_color']}};
{{--                                                                        @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif--}}
                                                                            @if($link->photo == '' && $link->icon == '')
                                                                                @if($properties['dl_text_shadow_bottom'])
                                                                                    margin-top: 13px; margin-bottom: 13px;
                                                                                @else
                                                                                    margin-top: 13px; margin-bottom: {{13 + $properties['dl_text_shadow_bottom']}}px;
                                                                                @endif
                                                                            @endif
{{--                                                                        @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif--}}
                                                                            @if($properties['dl_text_shadow_right']) margin-right: {{$properties['dl_text_shadow_right']}}px; @endif
                                                                            @if($properties['dl_link_block_shadow_right']) margin-left: {{$properties['dl_link_block_shadow_right']}}px @endif
                                                                        ">{{$link->title}}</h4>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            @if(Auth::check())
                                                                @if(Auth::user()->id == $user->id)
                                                                    <div id="up" class="col-span-1 flex items-center flex-none">
                                                                        <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                        <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @if(count($user->userLinks(false)) > 0)
                    <div class="mx-auto max-w-screen-xl px-4 pb-4 sm:px-6 lg:px-8">
                        <div class="group block">
                            <table class="table w-full">
                                <tbody>
                                @foreach($user->userLinks(false) as $link)
                                    @php
                                        $properties = unserialize($link->properties)
                                    @endphp
                                    <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                        <td>
                                            <div class="mb-5 justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                                <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf
                                                    <input type="hidden" name="link_id" value="{{$link->id}}">
                                                    <input type="hidden" name="link_url" value="{{$link->link}}">
                                                    <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1" style="
                                                        animation-duration: {{$link->animation_speed}}s;
                                                        border-color: {{$properties['dl_border_color']}};
                                                        background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                        border-radius: {{$properties['dl_rounded']}}px;
                                                        background-position: center;
                                                        box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                        @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                        @if($properties['dl_link_block_shadow_bottom']) margin-bottom: {{$properties['dl_link_block_shadow_bottom']}}px; @endif
                                                    ">
                                                        <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                            <div class="col-span-1 flex items-center flex-none">
                                                                @if($link->icon)
                                                                    <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @elseif($link->icon == false && $link->photo == true)
                                                                    <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @else
                                                                    <img class="mt-1 mb-1" src="https://emoji.discadia.com/emojis/914c0e06-428c-4c1d-bf2c-3393dc14987f.PNG" style="width:50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                                @endif
                                                            </div>
                                                            <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                                <div class="col-span-10 text-center flex items-center">
                                                                    <div class="ml-3 mr-3">
                                                                        <h4 class="text-ellipsis" style="
                                                                            text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                            font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                            line-height: 1.5;
                                                                            font-size: {{$properties['dl_font_size']}}rem;
                                                                            margin: 0;
                                                                            color: {{$properties['dl_title_color']}};
{{--                                                                            @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif--}}
                                                                            @if($link->photo == '' && $link->icon == '')
                                                                                @if($properties['dl_text_shadow_bottom'])
                                                                                    margin-top: 13px; margin-bottom: 13px;
                                                                                @else
                                                                                    margin-top: 13px; margin-bottom: {{13 + $properties['dl_text_shadow_bottom']}}px;
                                                                                @endif
                                                                            @endif
{{--                                                                            @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif--}}
                                                                            @if($properties['dl_text_shadow_right']) margin-right: {{$properties['dl_text_shadow_right']}}px; @endif
                                                                            @if($properties['dl_link_block_shadow_right']) margin-left: {{$properties['dl_link_block_shadow_right']}}px @endif
                                                                        ">{{$link->title}}</h4>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            @if(Auth::check())
                                                                @if(Auth::user()->id == $user->id)
                                                                    <div id="up" class="col-span-1 flex items-center flex-none">
                                                                        <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                        <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @elseif($user->settings->social_links_bar == 1)
                <div class="mx-auto max-w-screen-xl px-4 pb-4 sm:px-6 lg:px-8  mt-5">
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                            @foreach($user->userLinksWithoutBar() as $link)
                                @php
                                    $properties = unserialize($link->properties)
                                @endphp
                                <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                    <td>
                                        <div class="mb-5 justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                            <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf
                                                <input type="hidden" name="link_id" value="{{$link->id}}">
                                                <input type="hidden" name="link_url" value="{{$link->link}}">
                                                <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1 " style="
                                                        animation-duration: {{$link->animation_speed}}s;
                                                        border-color: {{$properties['dl_border_color']}};
                                                        background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                        border-radius: {{$properties['dl_rounded']}}px;
                                                        background-position: center;
                                                        box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                        @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                        @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif
                                                    ">
                                                    <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                        <div class="col-span-1 flex items-center flex-none">
                                                            @if($link->icon)
                                                                <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                            @elseif($link->icon == false && $link->photo == true)
                                                                <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                            @elseif($link->icon == false && $link->photo == false)
                                                               <img class="mt-1 mb-1" src="https://emoji.discadia.com/emojis/914c0e06-428c-4c1d-bf2c-3393dc14987f.PNG" style="width:50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                            @endif
                                                        </div>
                                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                            <div class="col-span-10 text-center flex items-center">
                                                                <div class="ml-3 mr-3">
                                                                    <h4 class="text-ellipsis" style="
                                                                        text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                        font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                        line-height: 1.5;
                                                                        font-size: {{$properties['dl_font_size']}}rem;
                                                                        margin: 0;
                                                                        color: {{$properties['dl_title_color']}};
{{--                                                                    @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif--}}
                                                                        @if($link->photo == '' && $link->icon == '')
                                                                            @if($properties['dl_text_shadow_bottom'])
                                                                                margin-top: 13px; margin-bottom: 13px;
                                                                            @else
                                                                                margin-top: 13px; margin-bottom: {{13 + $properties['dl_text_shadow_bottom']}}px;
                                                                            @endif
                                                                        @endif
{{--                                                                    @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif--}}
                                                                        @if($properties['dl_text_shadow_right']) margin-right: {{$properties['dl_text_shadow_right']}}px; @endif
                                                                        @if($properties['dl_link_block_shadow_right']) margin-left: {{$properties['dl_link_block_shadow_right']}}px @endif
                                                                    ">{{$link->title}}</h4>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        @if(Auth::check())
                                                            @if(Auth::user()->id == $user->id)
                                                                <div id="up" class="col-span-1 flex items-center flex-none">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </links>
    @endif

    @if($user->type == 'Events')
        <events>
            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                @foreach($user->events as $event)

                    @php
                        $properties = (object) unserialize($event->properties)
                    @endphp

                    @if($properties->de_show_modal == 0)<a href="{{$event->tickets}}">@endif
                        <div class="container pl-1 pr-1 mb-5" @if($properties->de_show_modal == 1) data-modal-target="popup-modal{{$event->id}}" data-modal-toggle="popup-modal{{$event->id}}" type="button" @endif>
                            <div style="
                                @if($properties->de_event_card_shadow_right) margin-right: {{$properties->de_event_card_shadow_right}}px @endif
                            ">
                                @include('event.types.' . $user->eventSettings->close_card_type, ['event' => $event, 'properties' => (object) unserialize($event->properties)])
                            </div>
                        </div>
                    @if($properties->de_show_modal == 0)</a>@endif

                    <div id="popup-modal{{$event->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                        <div class="relative p-2 w-full max-w-md h-full md:h-auto">
                            <!-- modal card element -->
                            @include('event.open-cart.' . $user->eventSettings->open_card_type, ['event' => $event])
                        </div>
                    </div>

                @endforeach
            </div>
        </events>
    @endif

    <bottom-links-bar>
        <div class="flex justify-evenly mb-20">
            @if($user->settings->social_links_bar == 1)
                @if($user->settings->links_bar_position == 'bottom')
                    @if(count($user->userLinks(false)) > 0)
                        <nav class="navbar mt-2">
                            <div class="flex flex-wrap justify-center">
                                @foreach($user->userLinksInBar($user) as $link)
                                    @if($link->icon)
                                        <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf
                                            <input type="hidden" name="link_id" value="{{$link->id}}">
                                            <input type="hidden" name="link_url" value="{{$link->link}}">
                                            <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                <img src="{{$link->icon}}" class="ml-2 mr-2 mt-3 " style="width:{{ $user->settings->round_links_width }}px; filter: drop-shadow({{ $user->settings->round_links_shadow_right }}px {{ $user->settings->round_links_shadow_bottom }}px {{ $user->settings->round_links_shadow_round }}px {{ $user->settings->round_links_shadow_color }})">
                                            </button>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </nav>
                    @endif
                @endif
            @endif
        </div>
    </bottom-links-bar>

    <!-- Modal toggle -->
{{--    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">--}}
{{--        Toggle modal--}}
{{--    </button>--}}

{{--    <div id="popup-modal" aria-hidden="true" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">--}}
{{--        <div class="relative p-4 w-full max-w-md h-full md:h-auto">--}}
{{--            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
{{--                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">--}}
{{--                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                </button>--}}
{{--                <div class="p-6 text-center">--}}
{{--                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
{{--                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>--}}
{{--                    <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">--}}
{{--                        Yes, I'm sure--}}
{{--                    </button>--}}
{{--                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @if($user->type == 'Events')
        @if($user->settings->event_followers == '1')

{{--        <footer type="button" data-modal-toggle="popup-modal" class="{{$user->settings->follow_block_border_radius}} flex justify-center fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-gray-200 shadow dark:border-gray-600" style="background-color: {{$user->settings->follow_block_bg_color}}; box-shadow: 0px -{{$user->settings->follow_btn_top_shadow_top}}px {{$user->settings->follow_btn_top_shadow_blur}}px 0px {{$user->settings->follow_btn_top_shadow_color}}">--}}
{{--            <h1 style="--}}
{{--                font-family: {{$user->settings->follow_block_font}};--}}
{{--                color: {{$user->settings->follow_block_font_color}};--}}
{{--                text-shadow:{{$user->settings->follow_block_font_shadow_right}}px {{$user->settings->follow_block_font_shadow_bottom}}px {{$user->settings->follow_block_font_shadow_blur}}px {{$user->settings->follow_block_font_shadow_color}};--}}
{{--            " class="{{$user->settings->follow_block_text_size}}">{{$user->settings->follow_block_text}}</h1>--}}
{{--        </footer>--}}

        <footer type="button" data-drawer-backdrop="false" data-drawer-target="drawer-bottom-example" data-drawer-show="drawer-bottom-example" data-drawer-placement="bottom" aria-controls="drawer-bottom-example" class="{{$user->settings->follow_block_border_radius}} flex justify-center fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-gray-200 shadow dark:border-gray-600" style="background-color: {{$user->settings->follow_block_bg_color}}; box-shadow: 0px -{{$user->settings->follow_btn_top_shadow_top}}px {{$user->settings->follow_btn_top_shadow_blur}}px 0px {{$user->settings->follow_btn_top_shadow_color}}">
            <h1 style="
                        font-family: {{$user->settings->follow_block_font}};
                        color: {{$user->settings->follow_block_font_color}};
                        text-shadow:{{$user->settings->follow_block_font_shadow_right}}px {{$user->settings->follow_block_font_shadow_bottom}}px {{$user->settings->follow_block_font_shadow_blur}}px {{$user->settings->follow_block_font_shadow_color}};
                    " class="{{$user->settings->follow_block_text_size}}">{{$user->settings->follow_block_text}}</h1>
        </footer>

        <div id="drawer-bottom-example" class="{{$user->settings->follow_block_border_radius}} fixed bottom-0 left-0 right-0 z-40 w-full p-4 bg-white dark:bg-white overflow-y-auto transition-transform translate-y-full" tabindex="-1" aria-labelledby="drawer-bottom-label">
            <h5 id="drawer-bottom-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>{{$user->settings->follow_block_text}}</h5>
            <button id="closeFollow" type="button" data-drawer-hide="drawer-bottom-example" aria-controls="drawer-bottom-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="text-center">
                <div class="gap-4">
                    <div class="mx-auto max-w-screen-xl  sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-lg text-center">
                            <h1 class="text-2xl font-bold sm:text-3xl">{{$user->name}}</h1>
                            <p class="mt-4 text-gray-500 text-sm">
                                Как только в вашем городе появится мероприятие с участием {{$user->name}}
                                мы сразу же оповестим вас об этом отправив письмо на почту
                            </p>
                        </div>
                        <div class="" id="followAlert">
                            <div class="alert-danger px-6 py-4 bg-yellow-50 rounded-lg text-red-600" style="display: none">
                            </div>
                        </div>
                        <form action="{{ route('createFollow') }}" method="POST" class="mx-auto mb-0 mt-8 max-w-md space-y-4"> @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                            <input type="hidden" name="page_type" id="page_type" value="{{$user->type}}">
                            <div>
                                <div class="relative">
                                    <select style="border: none" name="city_id" id="select-city" class="mt-1 bg-gray-50 text-gray-900 text-2xl shadow-sm rounded block w-full shadow-sm dark:placeholder-gray-400 " autocomplete="off"></select>
                                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="text" name="name" id="nameFollow" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Ваше имя" />
                                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="relative">
                                    <input name="email" id="emailFollow" type="email" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Введите email" />
                                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="relative">
                                    <input name="telephone" id="telephoneFollow" type="text" class="w-full bg-gray-100 rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Номер телефона"/>
                                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="relative">
                                    <input name="telegram" id="telegramFollow" type="text" class="w-full bg-gray-100 rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Телеграм"/>
                                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
{{--                                <p class="text-sm text-gray-500">--}}
{{--                                    No account?--}}
{{--                                    <a class="underline" href="">Sign up</a>--}}
{{--                                </p>--}}
                                <button id="eventFollowBtn" type="submit" class="w-full inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                                    Подписаться
                                </button>
                            </div>
                        </form>
                    </div>
{{--                    <div class="mb-3 " id="followAlert">--}}
{{--                        <div class="alert alert-danger mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" style="display:none" role="alert"></div>--}}
{{--                    </div>--}}
{{--                    <p class="text-left text-xs font-medium text-gray-500 dark:text-gray-400 mb-3"><span class="bg-green-100 text-green-800 font-medium  px-1 py-0.5 rounded dark:bg-green-900 dark:text-white">Заполните обязательные поля</span>--}}
{{--                        и как только в вашем городе появится какое нибудь событие с участием {{$user->name}} мы вас сразу же оповестим вас об этом отправив письмо на почту, или {{$user->name}} отправит вам уведомление в Telegram или SMS--}}
{{--                    </p>--}}
{{--                    <form action="{{ route('createFollow') }}" method="POST"> @csrf--}}
{{--                        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">--}}
{{--                        <input type="hidden" name="page_type" id="page_type" value="{{$user->type}}">--}}
{{--                        <div class="mb-3" id="city">--}}
{{--                            <span style="border: none" class="bg-green-100 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-white">Город</span>--}}
{{--                            <select style="border: none" name="city_id" id="select-city" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off"></select>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <span style="border: none" class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-white">Имя</span>--}}
{{--                            <input style="border: none" name="name" type="text" id="nameFollow" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded focus:ring-blue-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500" placeholder="John" required>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <span style="border: none" class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-white">Email</span>--}}
{{--                            <input style="border: none" name="email" type="email" id="emailFollow" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label style="border: none" for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер телефона</label>--}}
{{--                            <input style="border: none" name="telephone" type="text" id="telephoneFollow" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="88005553535" >--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label style="border: none" for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telegram</label>--}}
{{--                            <input style="border: none" name="telegram" type="text" id="telegramFollow" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://t.me/sergey1karpov" >--}}
{{--                        </div>--}}
{{--                        <button style="border: none" id="eventFollowBtn" type="submit" class="w-full mt-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Подписаться</button>--}}
{{--                    </form>--}}
                </div>
            </div>

        </div>

{{--        <div id="popup-modal" aria-hidden="true" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">--}}
{{--            <div class="relative p-4 w-full max-w-md h-full md:h-auto flex items-center">--}}
{{--                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
{{--                    <button id="closeFollow" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">--}}
{{--                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                    </button>--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="gap-4 p-4">--}}
{{--                            <div class="mb-3 mt-8" id="followAlert">--}}
{{--                                <div class="alert alert-danger mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" style="display:none" role="alert"></div>--}}
{{--                            </div>--}}
{{--                            <p class="mt-8 text-left text-xs font-medium text-gray-500 dark:text-gray-400 mb-3"><span class="bg-green-100 text-green-800 font-medium  px-1 py-0.5 rounded dark:bg-green-900 dark:text-white">Заполните обязательные поля</span>--}}
{{--                                и как только в вашем городе появится какое нибудь событие с участием {{$user->name}} мы вас сразу же оповестим вас об этом отправив письмо на почту, или {{$user->name}} отправит вам уведомление в Telegram или SMS--}}
{{--                            </p>--}}
{{--                            <form action="{{ route('createFollow') }}" method="POST"> @csrf--}}
{{--                                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">--}}
{{--                                <input type="hidden" name="page_type" id="page_type" value="{{$user->type}}">--}}
{{--                                <div class="mb-3" id="city">--}}
{{--                                    <span style="border: none" class="bg-green-100 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-white">Город</span>--}}
{{--                                    <select style="border: none" name="city_id" id="select-city" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off"></select>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <span style="border: none" class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-white">Имя</span>--}}
{{--                                    <input style="border: none" name="name" type="text" id="nameFollow" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded focus:ring-blue-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500" placeholder="John" required>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <span style="border: none" class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-white">Email</span>--}}
{{--                                    <input style="border: none" name="email" type="email" id="emailFollow" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label style="border: none" for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер телефона</label>--}}
{{--                                    <input style="border: none" name="telephone" type="text" id="telephoneFollow" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="88005553535" >--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label style="border: none" for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telegram</label>--}}
{{--                                    <input style="border: none" name="telegram" type="text" id="telegramFollow" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://t.me/sergey1karpov" >--}}
{{--                                </div>--}}
{{--                                <button style="border: none" id="eventFollowBtn" type="submit" class="w-full mt-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Подписаться</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <button data-modal-backdrop="false" id="followModalBtn" style="display: none" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
            Toggle login modal
        </button>

        <div id="authentication-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto items-center flex">
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700 w-full">
                    <div class="flex justify-end p-2">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                        <div class="text-center">
                            @if($user->settings->congratulation_on_off)
                                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                                    {{$user->settings->congratulation_text}}
                                </h1>
                                @if($user->settings->congratulation_gif)
                                    <div class="flex justify-center">
                                        <img class="w-full rounded mb-3" src="{{$user->settings->congratulation_gif }}" alt="image description">
                                    </div>
                                @endif
                            @else
                                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                                    Подписка на @if($user->type == 'Events') мероприятия @endif
                                    <span class="text-blue-600 dark:text-blue-500">{{$user->name}}</span>
                                    успешно оформлена!
                                </h1>
                            @endif
                        </div>
                    </div>
{{--                    <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">--}}
{{--                        <button data-modal-toggle="authentication-modal" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ЯсноПонятно!</button>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        @endif
    @endif

    @if($user->settings->show_logo == true)
        <footer class="sticky top-[100vh] footer-block mt-20 p-2  md:px-6 md:py-8 navbar-fixed-bottom @if($user->settings->event_followers == '1') mb-20 @else mb-4 @endif" >
            <div class="flex justify-center items-center">
                <div class="flex justify-center items-center">
                    <a href="https://chrry.me/" class="flex items-center">
                        <img src="https://i.ibb.co/bPydGXN/3.png" class="mr-3 h-4" alt="CHRRY.ME Logo"/>
                    </a>
                </div>
            </div>
        </footer>
    @endif

    <script type="text/javascript">

        var copyTextareaBtn = document.querySelector('#copy_btn');
        copyTextareaBtn.addEventListener('click', function(event) {
            var copyTextarea = document.querySelector('#text_for_copy');
            copyTextarea.focus();
            copyTextarea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $('#eventFollowBtn').click(function(e){
                e.preventDefault();

                let user = $('#user_id').val();
                let name = $('#nameFollow').val();
                let email = $('#emailFollow').val();
                let city = $('#select-city').val();
                let telephone = $('#telephoneFollow').val();
                let telegram = $('#telegramFollow').val();
                let page_type = $('#page_type').val();
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('createFollow') }}",
                    method: 'post',
                    data: {user_id:user, city_id:city, name:name, email:email, telephone:telephone, telegram:telegram, _token:token, page_type:page_type},
                    success: function(data) {
                        if(data.errors != null) {

                            let newHTML = '';

                            $.each(data.errors, function(key, value){
                                newHTML += `<p class="mt-1 text-base font-bold">${value}</p>`
                            });

                            $('.alert-danger').show();
                            $('.alert-danger').html(newHTML);
                        } else {
                            $("#closeFollow").click();
                            $('.alert-danger').hide();
                            $('.alert-danger').remove();
                            $("#followModalBtn").click();
                        }
                    },
                    error: function(reject) {
                        console.log('bad');
                    },
                    complete: function() {
                        $('#user_id').val('');
                        $('#nameFollow').val('');
                        $('#emailFollow').val('');
                        $('#select-city').val('');
                        $('#telephoneFollow').val('');
                        $('#telegramFollow').val('');
                    }
                });
            });
        });
    </script>

    @foreach($user->userLinks(true) as $link)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $('table tbody').sortable({
                    // delay:2000,
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
                    // url: "id"+userId + "/links/sort",
                    url: "{{ route('sortLink', ['user' => $user->id]) }}",
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
    @foreach($user->userLinks(false) as $link)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $('table tbody').sortable({
                    // delay:2000,
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
                    // url: "id"+userId + "/links/sort",
                    url: "{{ route('sortLink', ['user' => $user->id]) }}",
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

    @if($user->type == 'Events')
        @if($user->settings->event_followers)
            <script>
                const tom = new TomSelect('#select-city',{
                    valueField: 'id',
                    searchField: 'name',
                    maxOptions: 5,
                    options: [
                        @foreach($cities as $city)
                            {id: {{$city->id}}, name: '{{$city->name}}'},
                        @endforeach
                    ],
                    render: {
                        option: function(data, escape) {
                            return  '<h4 class="font-medium" style="font-size: 1.5rem;">' + escape(data.name) + '</h4>';
                        },
                        item: function(data, escape) {
                            return  '<h4 class="font-medium" style="font-size: 1.5rem;">' + escape(data.name) + '</h4>';
                        }
                    }
                });

                tom.settings.placeholder = 'Выберите город';
                tom.inputState();
            </script>
        @endif
    @endif

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>
</html>

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <title>{{ $user->name }}</title>--}}
{{--         Animation animate.style--}}
{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">--}}

{{--         Favicon--}}
{{--        <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">--}}

{{--         Bootstrap 5--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}

{{--         Icon verification--}}
{{--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">--}}

{{--         Google fonts--}}
{{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">--}}

{{--        <script src="//cdn.jsdelivr.net/clipboard.js/latest/clipboard.min.js"></script>--}}

{{--        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>--}}
{{--        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>--}}

{{--        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>--}}

{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <x-embed-styles />--}}

{{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">--}}

{{--        OWL--}}
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}

{{--        @include('fonts.fonts')--}}

{{--        Shop--}}
{{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--        <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">--}}

{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />--}}

{{--        <style type="text/css">--}}
{{--        	@if($user->banner)--}}
{{--	        	body {--}}
{{--			        background: url({{ $user->banner }}) no-repeat center center fixed;--}}
{{--			        background-size: cover;--}}
{{--				}--}}
{{--			@elseif($user->banner == null & $user->background_color != null)--}}
{{--				body {--}}
{{--					background-color: {{$user->background_color}};--}}
{{--				}--}}
{{--			@endif--}}
{{--			.img {--}}
{{--			    width: 100px;--}}
{{--			    height: 100px;--}}
{{--			    border-radius: 50%;--}}
{{--			    margin-right: 0;--}}
{{--			    background-position: center center;--}}
{{--			    -wekit-background-size: cover;--}}
{{--			    background-size: cover;--}}
{{--			    background-repeat: no-repeat;--}}
{{--			}--}}
{{--            span{--}}
{{--                font-size:15px;--}}
{{--            }--}}
{{--            a{--}}
{{--                text-decoration:none;--}}
{{--                color: #0062cc;--}}
{{--                /* border-bottom:2px solid #0062cc; */--}}
{{--            }--}}
{{--            .box-part{--}}
{{--                background:#fcfcf9;--}}
{{--                border-radius:25;--}}
{{--                padding:20px 10px;--}}
{{--                margin:30px 0px;--}}
{{--                -webkit-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);--}}
{{--                -moz-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);--}}
{{--                box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);--}}
{{--            }--}}
{{--            .text{--}}
{{--                margin:20px 0px;--}}
{{--            }--}}
{{--            .p-text {--}}
{{--                white-space: nowrap;--}}
{{--                overflow: hidden;--}}
{{--                max-width: 400px;--}}
{{--                position: relative;--}}
{{--            }--}}

{{--            .p-text::after {--}}
{{--                content: '';--}}
{{--                position: absolute;--}}
{{--                top: 0;--}}
{{--                right: 0;--}}
{{--                width: 70px;--}}
{{--                height: 100%;--}}
{{--                /*background: linear-gradient(to right, rgba(255, 255, 255, .2) 0%, rgba(255, 255, 255, 1) 100%);*/--}}
{{--                background: linear-gradient(to right, rgba({{$user->background_color_rgb}}, .2) 0%, rgba({{$user->background_color_rgb}}, 1) 100%);--}}
{{--                pointer-events: none;--}}
{{--            }--}}
{{--            .btn-check:focus+.btn, .btn:focus {--}}
{{--                box-shadow: none;--}}
{{--            }--}}
{{--            .accordion-button:focus {--}}
{{--                box-shadow: none;--}}
{{--            }--}}
{{--            .accordion-collapse {--}}
{{--                border-radius: 10px;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </head>--}}
{{--    <body class="antialiased">--}}

{{--        <!-- ---------------------- -->--}}
{{--        <!-- Стрелка обратно в меню -->--}}
{{--        <!-- ---------------------- -->--}}

{{--        <nav class="fixed-top" style="margin-top: 12px; margin-right: 12px; margin-left: 12px">--}}
{{--            <div class="row d-d-flex justify-content-between">--}}
{{--                <div class="col-2 d-flex justify-content-center" style="padding: 0">--}}
{{--                    @auth--}}
{{--                        @if(Auth::user()->id == $user->id)--}}
{{--                            <div>--}}
{{--                                <a class="btn  d-flex align-content-center" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">--}}
{{--                                    <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">admin_panel_settings</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--                <div class="col-2 d-flex justify-content-center" style="padding: 0">--}}
{{--                    @if($user->type == 'Market')--}}
{{--                        <div>--}}
{{--                            <button type="button" class="btn  d-flex align-content-center" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="border: 0">--}}
{{--                                <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">linear_scale</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--        @if($user->type == 'Market')--}}
{{--            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">--}}
{{--                <div class="offcanvas-header text-center" style="background-color: {{$user->marketSettings->canvas_color}}">--}}
{{--                    <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1.2rem; color: {{$user->marketSettings->canvas_font_color}}">Меню</h5>--}}
{{--                    <button type="button" class="btn d-flex align-content-center" data-bs-dismiss="offcanvas" aria-label="Close" style="border: 0">--}}
{{--                        <span class="material-symbols-outlined" style="border: 0; color: {{$user->navigation_color}}">close</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="offcanvas-body text-center" style="max-width: none; background-color: {{$user->marketSettings->canvas_color}}">--}}
{{--                    @if($user->marketSettings->show_search)--}}
{{--                        @if($user->marketSettings->search_position == 'on_canvas' || $user->marketSettings->search_position == 'main_and_canvas')--}}
{{--                            <div class="d-flex justify-content-center mb-5">--}}
{{--                                <div class="col-12 d-flex justify-content-center align-items-center" >--}}
{{--                                    <form class="" action="{{ route('fullTextSearch', ['user' => $user->slug]) }}" style="width: 100%">--}}
{{--                                        <input class="form-control me-2 shadow" type="search" name="search" placeholder="Поиск..." aria-label="Search" style="border: 0">--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endif--}}
{{--                    @foreach($user->productCategories as $category)--}}
{{--                        <a href="{{ route('showProductsInCategory', ['user' => $user->slug, 'categorySlug' => $category->slug]) }}" style="color: {{$user->marketSettings->canvas_font_color}}">--}}
{{--                            <h5 class="offcanvas-title mt-2" id="offcanvasExampleLabel" style="font-family: 'Inter', sans-serif; font-size: 1rem;">{{$category->name}}</h5>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                    <div class="accordion accordion-flush mt-5" id="accordionFlushExample">--}}
{{--                        <label class="mb-3" style="font-family: 'Inter', sans-serif; font-size: 1rem; color: {{$user->navigation_color}}">Правила продавца</label>--}}
{{--                        <div class="accordion-item" style="border-radius: 10px">--}}
{{--                            <h2 class="accordion-header rounded" id="flush-headingOne">--}}
{{--                                <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">--}}
{{--                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Оплата товара</h1>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="flush-collapseOne" class="accordion-collapse collapse rounded-4" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">--}}
{{--                                <div class="accordion-body rounded-4 text-start " style="white-space: pre-wrap;">--}}
{{--                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->payment_rules }}</h1>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="accordion-item" style="border-radius: 10px">--}}
{{--                            <h2 class="accordion-header" id="flush-headingTwo">--}}
{{--                                <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">--}}
{{--                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Информация о доставке</h1>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">--}}
{{--                                <div class="accordion-body text-start " style="white-space: pre-wrap;">--}}
{{--                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->delivery_rules }}</h1>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="accordion-item" style="border-radius: 10px">--}}
{{--                            <h2 class="accordion-header" id="flush-headingThree">--}}
{{--                                <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">--}}
{{--                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Информация о возврате товара</h1>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">--}}
{{--                                <div class="accordion-body text-start " style="white-space: pre-wrap;">--}}
{{--                                    <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->refund_rules }}</h1>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if($user->marketSettings->other_rules)--}}
{{--                            <div class="accordion-item" style="border-radius: 10px">--}}
{{--                                <h2 class="accordion-header" id="flush-headingFour">--}}
{{--                                    <button style="padding-top:8px; padding-bottom:8px; background-color: {{ $user->marketSettings->canvas_color }}; border: 0; text-decoration: none" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">--}}
{{--                                        <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0; color: {{$user->marketSettings->canvas_font_color}}">Общая информация о правилах магазина</h1>--}}
{{--                                    </button>--}}
{{--                                </h2>--}}
{{--                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">--}}
{{--                                    <div class="accordion-body text-start " style="white-space: pre-wrap;">--}}
{{--                                        <h1 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; margin: 0">{{ $user->marketSettings->other_rules }}</h1>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                        @if($user->type == 'Market')--}}
{{--                            @if($user->marketSettings->show_social)--}}
{{--                                @if(count($user->userLinks(false)) > 0)--}}
{{--                                    <nav class="navbar mt-2 mb-2">--}}
{{--                                        <div class="container-fluid d-flex justify-content-center">--}}
{{--                                            @foreach($user->userLinks(false) as $link)--}}
{{--                                                @if($link->icon)--}}
{{--                                                    <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf--}}
{{--                                                        <input type="hidden" name="link_id" value="{{$link->id}}">--}}
{{--                                                        <input type="hidden" name="link_url" value="{{$link->link}}">--}}
{{--                                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                                            <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="--}}
{{--                                                            width:{{ $user->round_links_width }}px;--}}
{{--                                                            filter: drop-shadow({{ $user->round_links_shadow_right }}px {{ $user->round_links_shadow_bottom }}px {{ $user->round_links_shadow_round }}px {{ $user->round_links_shadow_color }})--}}
{{--                                                        ">--}}
{{--                                                        </button>--}}
{{--                                                    </form>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </nav>--}}
{{--                                @endif--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <!-- ---------------------- -->--}}
{{--        <!-- Карточка юзера -->--}}
{{--        <!-- ---------------------- -->--}}

{{--        <div class="container-fluid justify-content-center text-center mb-2">--}}

{{--            @if ($message = Session::get('success'))--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12" style="padding: 0; border-radius: 0">--}}
{{--                        <div class="alert alert-success" role="alert" style="margin: 0; border: 0; background-color: #00CC66; border-radius: 0">--}}
{{--                            <h4 class="alert-heading mb-3">Отправлено!</h4>--}}
{{--                            <p style="font-family: 'Rubik', sans-serif; font-size: 100%; line-height: 16px; display:block; color: white;">{{$message}}</p>--}}
{{--                            <hr>--}}
{{--                            <p class="mb-0" style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">В скором времени продавец обработает вашу заявку и ответит вам по одному из контактов, который вы указали в заявке.</p>--}}
{{--                            <button type="button" class="btn-close mt-3" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--	        <div class="d-flex justify-content-center text-center">--}}
{{--		      	<div class="text-center" style="margin-top: 25px">--}}

{{--                    @if($user->avatar_vs_logotype == 'Logotype')--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <img src="{{$user->logotype}}" class="img-fluid" width="{{$user->logotype_size}}" style="--}}
{{--                                filter: drop-shadow({{$user->logotype_shadow_right}}px {{$user->logotype_shadow_bottom}}px {{$user->logotype_shadow_round}}px {{$user->logotype_shadow_color}});--}}
{{--                            ">--}}
{{--                        </div>--}}
{{--                        @if(!$user->logotype)--}}
{{--                            <h2 class="mt-4" style="font-family: 'Rubik', sans-serif; color: #464646; font-weight: 600 ; font-size: 20px; @if($user->name_color) color: {{$user->name_color}}; @endif ">--}}
{{--                                {{ $user->name }}--}}
{{--                                @if($user->verify == 1)--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->verify_color}}">--}}
{{--                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>--}}
{{--                                    </svg>--}}
{{--                                @endif--}}
{{--                            </h2>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        @if($user->avatar)--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <div class="img" style="background-image: url({{$user->avatar}});"></div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <h2 class="mt-4" style="font-family: 'Rubik', sans-serif; color: #464646; font-weight: 600 ; font-size: 20px; @if($user->name_color) color: {{$user->name_color}}; @endif ">--}}
{{--                            {{ $user->name }}--}}
{{--                            @if($user->verify == 1)--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill mb-1" viewBox="0 0 16 16" style="color: {{$user->verify_color}}">--}}
{{--                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>--}}
{{--                                </svg>--}}
{{--                            @endif--}}
{{--                        </h2>--}}
{{--                        @if($user->description)--}}
{{--                            <p style="font-family: 'Rubik', sans-serif; font-size: 0.9rem; @if($user->description_color) color: {{$user->description_color}}; @endif">{{ $user->description }}</p>--}}
{{--                        @endif--}}
{{--                    @endif--}}
{{--                        @if($user->social_links_bar == 1)--}}
{{--                            @if($user->links_bar_position == 'top')--}}
{{--                                @if(count($user->userLinks(false)) > 0)--}}
{{--                                    <nav class="navbar mt-2">--}}
{{--                                        <div class="container-fluid d-flex justify-content-center">--}}
{{--                                            @foreach($user->userLinks(false) as $link)--}}
{{--                                                @if($link->icon)--}}
{{--                                                    <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf--}}
{{--                                                        <input type="hidden" name="link_id" value="{{$link->id}}">--}}
{{--                                                        <input type="hidden" name="link_url" value="{{$link->link}}">--}}
{{--                                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                                            <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="--}}
{{--                                                            width:{{ $user->round_links_width }}px;--}}
{{--                                                            filter: drop-shadow({{ $user->round_links_shadow_right }}px {{ $user->round_links_shadow_bottom }}px {{ $user->round_links_shadow_round }}px {{ $user->round_links_shadow_color }})--}}
{{--                                                        ">--}}
{{--                                                        </button>--}}
{{--                                                    </form>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </nav>--}}
{{--                                @endif--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--		      	</div>--}}
{{--	    	</div>--}}
{{--	    </div>--}}
{{--        <!-- ---------------------- -->--}}
{{--        <!-- Контент -->--}}
{{--        <!-- ---------------------- -->--}}
{{--        @if($user->type == 'Links')--}}

{{--            <!-- ---------------------- -->--}}
{{--            <!-- Закрепленные ссылки -->--}}
{{--            <!-- ---------------------- -->--}}
{{--            <table class="table" style="margin-bottom: 0">--}}
{{--                <tbody>--}}
{{--                    @foreach($user->userLinks(true) as $link)--}}
{{--                        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">--}}
{{--                                <div class="container" style="padding-left:8px; padding-right:8px">--}}
{{--                                    <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf--}}
{{--                                        <input type="hidden" name="link_id" value="{{$link->id}}">--}}
{{--                                        <input type="hidden" name="link_url" value="{{$link->link}}">--}}
{{--                                        <div class="@if($link->animation) {{$link->animation}} @endif row ms-1 me-1 card {{$link->shadow}}" style="--}}
{{--                                            background-color:rgba({{$link->background_color}}, {{$link->transparency}});--}}
{{--                                            border: 0;--}}
{{--                                            margin-top: 8px;--}}
{{--                                            border-radius: {{$link->rounded}}px;--}}
{{--                                            background-position: center--}}
{{--                                        ">--}}
{{--                                            <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">--}}
{{--                                                <!-- Картинка -->--}}
{{--                                                <div class="col-1">--}}
{{--                                                    @if($link->icon)--}}
{{--                                                        <img src="{{$link->icon}}" style="width:50px;">--}}
{{--                                                    @elseif($link->photo)--}}
{{--                                                        <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                                    @else--}}
{{--                                                        <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                                <!-- Текст ссылки -->--}}
{{--                                                <div class=" col-10 text-center">--}}
{{--                                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                                        <div class="me-5 ms-5">--}}
{{--                                                            <h4 style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{ $link->font ?? 'Inter' }}', sans-serif; line-height: 1.3; font-size: {{$link->font_size}}rem; margin-top: 2px; margin-bottom: 0; color: {{$link->title_color}};">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <!-- Пустой div -->--}}
{{--                                                <div class="col-1">--}}
{{--                                                    @if(Auth::check())--}}
{{--                                                        @if(Auth::user()->id == $user->id)--}}
{{--                                                            <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">--}}
{{--                                                                <img src="https://cdn3.iconfinder.com/data/icons/office-outline-15/64/Office_Icon_Set_Outline-10-512.png" width="20">--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                    @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <!-- ---------------------- -->--}}
{{--            <!-- Обычные ссылки -->--}}
{{--            <!-- ---------------------- -->--}}
{{--            @if($user->social_links_bar == 0)--}}
{{--                <table class="table">--}}
{{--                    <tbody>--}}
{{--                        @foreach($user->userLinks(false) as $link)--}}
{{--                            <tr data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--                                <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">--}}
{{--                                    <div class="container" style="padding-left:8px; padding-right:8px">--}}
{{--                                        <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->--}}
{{--                                        <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf--}}
{{--                                            <input type="hidden" name="link_id" value="{{$link->id}}">--}}
{{--                                            <input type="hidden" name="link_url" value="{{$link->link}}">--}}
{{--                                            <div class="@if($link->animation) {{$link->animation}} @endif row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">--}}
{{--                                                <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">--}}
{{--                                                    <!-- Картинка -->--}}
{{--                                                    <div class="col-1">--}}
{{--                                                        @if($link->icon)--}}
{{--                                                            <img src="{{$link->icon}}" style="width:50px;">--}}
{{--                                                        @elseif($link->photo)--}}
{{--                                                            <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                                        @else--}}
{{--                                                            <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Текст ссылки -->--}}
{{--                                                    <div class="col-10 text-center d-flex align-items-center justify-content-center">--}}
{{--                                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                                            <div class="me-5 ms-5">--}}
{{--                                                                <h4 style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{ $link->font ?? 'Inter' }}', sans-serif; line-height: 1.3; font-size: {{$link->font_size}}rem; margin-top: 2px; margin-bottom: 0; color: {{$link->title_color}};">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>--}}
{{--                                                            </div>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Пустой div -->--}}
{{--                                                    <div class="col-1">--}}
{{--                                                        @if(Auth::check())--}}
{{--                                                            @if(Auth::user()->id == $user->id)--}}
{{--                                                                <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">--}}
{{--                                                                    <img src="https://i.ibb.co/VLbJkrG/dots.png" width="20">--}}
{{--                                                                </div>--}}
{{--                                                            @endif--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            @elseif($user->social_links_bar == 1)--}}
{{--                <table class="table">--}}
{{--                    <tbody>--}}
{{--                        @foreach($user->userLinksWithoutBar() as $link)--}}
{{--                            <tr data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--                                <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">--}}
{{--                                    <div class="container" style="padding-left:8px; padding-right:8px">--}}
{{--                                        <!-- Если тип ссылки POST ссылка не работает\не кликабельно -->--}}
{{--                                        <a href="{{$link->link}}" style="text-decoration:none" onclick="countRabbits{{$link->id}}()">--}}
{{--                                            <div class="@if($link->animation) {{$link->animation}} @endif row ms-1 me-1 card {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 8px; border-radius: {{$link->rounded}}px; background-position: center">--}}
{{--                                                <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px;">--}}
{{--                                                    <!-- Картинка -->--}}
{{--                                                    <div class="col-1">--}}
{{--                                                        @if($link->icon)--}}
{{--                                                            <img src="{{$link->icon}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                                        @elseif($link->photo)--}}
{{--                                                            <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                                        @else--}}
{{--                                                            <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Текст ссылки -->--}}
{{--                                                    <div class="col-10 text-center d-flex align-items-center justify-content-center">--}}
{{--                                                        <div class="me-5 ms-5">--}}
{{--                                                            <h4 style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.3; font-size: {{$link->font_size}}rem; margin-top: 2px; margin-bottom: 0; color: {{$link->title_color}};">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Пустой div -->--}}
{{--                                                    <div class="col-1">--}}
{{--                                                        @if(Auth::check())--}}
{{--                                                            @if(Auth::user()->id == $user->id)--}}
{{--                                                                <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);">--}}
{{--                                                                    <img src="https://i.ibb.co/VLbJkrG/dots.png" width="20">--}}
{{--                                                                </div>--}}
{{--                                                            @endif--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            @endif--}}
{{--        <!-- ---------------------- -->--}}
{{--        <!-- Мероприятия -->--}}
{{--        <!-- ---------------------- -->--}}
{{--        @elseif($user->type == 'Events')--}}
{{--            <div class="mt-4">--}}
{{--                @foreach($user->events as $event)--}}
{{--                    <div class="container mt-2" data-bs-toggle="modal" data-bs-target="#eventModal{{$event->id}}">--}}
{{--                        <div class="col-lg-12 allalbums">--}}
{{--                            <ul class="list-group list-group-flush">--}}
{{--                                <li class="{{$event->event_animation}} {{$event->block_shadow}} list-group-item list-group-item-action text-center" style="background-color: rgba({{$event->background_color_rgba}}, {{$event->transparency}}); border-radius: {{$event->event_round}}px;">--}}
{{--                                    <div class="row text-center">--}}
{{--                                        <div class="col-12 text-center mt-3 mb-3" style="padding: 0">--}}
{{--                                            <a href="#" style="color: black; text-decoration: none">--}}
{{--                                                <p style="text-shadow:{{$event->location_text_shadow_right}}px {{$event->location_text_shadow_bottom}}px {{$event->location_text_shadow_blur}}px {{$event->location_text_shadow_color}} ;font-family: '{{$event->location_font}}', sans-serif; text-transform: uppercase; font-size: {{$event->location_font_size}}em; padding: 0; margin: 0; color: {{$event->location_font_color}}">@if($event->bold_city == true)<b>@endif{{$event->city}}@if($event->bold_city == true)</b>@endif, @if($event->bold_location == true)<b>@endif{{$event->location}}@if($event->bold_location == true)</b>@endif</p>--}}
{{--                                                <p style="text-shadow:{{$event->date_text_shadow_right}}px {{$event->date_text_shadow_bottom}}px {{$event->date_text_shadow_blur}}px {{$event->date_text_shadow_color}} ;font-family: '{{$event->date_font}}', sans-serif; font-size: {{$event->date_font_size}}rem; margin-bottom: 0; color: {{$event->date_font_color}};">@if($event->bold_date == true)<b>@endif{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}@if($event->bold_date == true)</b>@endif @if($event->bold_time == true)<b>@endif{{' @'.$event->time}}@if($event->bold_time == true)</b>@endif</p>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal fade" id="eventModal{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h5 class="modal-title" id="exampleModalLabel">{{$event->city}}</h5>--}}
{{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body" style="padding: 0">--}}
{{--                                    <img src="{{$event->banner}}" class="img-fluid">--}}
{{--                                    <p class="mt-2 ms-2" style="font-size: 1.3em; padding: 0; margin: 0"><b>{{$event->city}}, {{$event->location}}</b></p>--}}
{{--                                    <p class="ms-2 mb-3" style="font-size: 1rem; margin-bottom: 0;"><b>{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}{{' @'.$event->time}}</b></p>--}}

{{--                                    @if($event->description)--}}
{{--                                        <p class="ms-2 mb-2 me-2" style="font-size: 1rem; margin-bottom: 0; white-space: pre-line; line-height: 1.2;">{{$event->description}}</p>--}}
{{--                                    @endif--}}

{{--                                    <!-- Видео если есть фотки -->--}}
{{--                                    @if($event->video)--}}
{{--                                        <div class="embed-responsive embed-responsive-16by9 mt-2 ">--}}
{{--                                            <x-embed url="{{$event->video}}" aspect-ratio="4:3" />--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                    <!-- Медиа -->--}}
{{--                                    @if($event->media)--}}
{{--                                        <div class="">--}}
{{--                                            {!!$event->media!!}--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                    @if($event->tickets)--}}
{{--                                    <div style="background-color: #E45545;" class="text-center">--}}
{{--                                        <a href="{{$event->tickets}}" style="text-decoration: none">--}}
{{--                                            <h5 class="ms-2 pt-3 pb-3" style="margin-bottom: 0; color: white">Купить билет</h5>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div class="mb-3"></div>--}}

{{--        <!-- ---------------------- -->--}}
{{--        <!-- Магазин -->--}}
{{--        <!-- ---------------------- -->--}}
{{--        @elseif($user->type == 'Market')--}}

{{--            <!--Чек показать поиск или нет-->--}}
{{--            @if($user->marketSettings->show_search)--}}
{{--                @if($user->marketSettings->search_position == 'on_main' || $user->marketSettings->search_position == 'main_and_canvas')--}}
{{--                    <div class="d-flex justify-content-center">--}}
{{--                        <div class="col-12 d-flex justify-content-center align-items-center" style="padding-right: 12px; padding-left: 12px">--}}
{{--                            <form class="" action="{{ route('fullTextSearch', ['user' => $user->slug]) }}" style="width: 100%">--}}
{{--                                <input class="form-control me-2 shadow" type="search" name="search" placeholder="Поиск..." aria-label="Search" style="border: 0">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endif--}}

{{--            <div class="mt-3">--}}
{{--                @if(isset($user->marketSettings->cards_style))--}}
{{--                    @if($user->marketSettings->cards_style == 'one')--}}
{{--                        @foreach($user->userProducts() as $product)--}}
{{--                            <div class="container mt-2">--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-8 col-lg-6 col-xl-4">--}}
{{--                                        <form id="submit-prod" method="POST" action="{{ route('productStats', ['user' => $user->id]) }}"> @csrf--}}
{{--                                            <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                                            <div class="text-black mb-3" style="border: 0; border-radius: 10px;">--}}
{{--                                                <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                                    <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: {{$user->marketSettings->card_round}}px; @if($user->marketSettings->cards_shadow) box-shadow: 0px 5px 5px -5px rgba(0, 0, 0, 0.6); @endif" />--}}
{{--                                                </button>--}}
{{--                                                <div class="card-body mt-2" style="padding: 0">--}}
{{--                                                    <div class="text-start">--}}
{{--                                                        <p class="mb-1" style="--}}
{{--                                                            @if($user->marketSettings->title_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif--}}
{{--                                                            white-space: nowrap;--}}
{{--                                                            overflow: hidden;--}}
{{--                                                            text-overflow: ellipsis;--}}
{{--                                                            font-family: 'Roboto Flex', sans-serif;--}}
{{--                                                            font-size: {{$user->marketSettings->title_font_size}}rem;--}}
{{--                                                            @if($user->marketSettings->color_title) color: {{$user->marketSettings->color_title}}; @endif"--}}
{{--                                                        >{{$product->title}}</p>--}}
{{--                                                        <p style="--}}
{{--                                                            @if($user->marketSettings->price_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif--}}
{{--                                                            margin: 0; font-family: 'Roboto Flex', sans-serif;--}}
{{--                                                            font-size: {{$user->marketSettings->price_font_size}}rem;--}}
{{--                                                            @if($user->marketSettings->color_price) color: {{$user->marketSettings->color_price}}; @endif"--}}
{{--                                                        ><b>₽ {{$product->price}}</b></p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @elseif($user->marketSettings->cards_style == 'two')--}}
{{--                        <div class="row ms-1 me-1" style="margin: 0">--}}
{{--                            @foreach($user->userProducts() as $product)--}}
{{--                                <div class="col-6 p-2" style="padding: 0">--}}
{{--                                    <div class="container mt-2" style="padding: 0">--}}
{{--                                        <div class="row justify-content-center" onclick="productStats{{$product->id}}()">--}}
{{--                                            <div class="col-md-8 col-lg-6 col-xl-4">--}}
{{--                                                <form id="submit-prod" method="POST" action="{{ route('productStats', ['user' => $user->id]) }}"> @csrf--}}
{{--                                                    <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                                                    <div class="text-black mb-3" style="border: 0; border-radius: 10px;">--}}
{{--                                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                                            <img src="{{$product->main_photo}}" class="card-img-top" alt="Apple Computer" style="border-radius: {{$user->marketSettings->card_round}}px; @if($user->marketSettings->cards_shadow) box-shadow: 0px 5px 5px -5px rgba(0, 0, 0, 0.6); @endif" />--}}
{{--                                                        </button>--}}
{{--                                                        <div class="card-body mt-2" style="padding: 0">--}}
{{--                                                            <div class="text-start">--}}
{{--                                                                <p class="mb-1" style="--}}
{{--                                                        @if($user->marketSettings->title_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif--}}
{{--                                                        white-space: nowrap;--}}
{{--                                                        overflow: hidden;--}}
{{--                                                        text-overflow: ellipsis;--}}
{{--                                                        font-family: 'Roboto Flex', sans-serif;--}}
{{--                                                        font-size: {{$user->marketSettings->title_font_size}}rem;--}}
{{--                                                        @if($user->marketSettings->color_title) color: {{$user->marketSettings->color_title}}; @endif"--}}
{{--                                                                >{{$product->title}}</p>--}}
{{--                                                                <p style="--}}
{{--                                                        @if($user->marketSettings->price_shadow) text-shadow: 1px 1px 1px rgba(0, 0, 0, 1); @endif--}}
{{--                                                        margin: 0; font-family: 'Roboto Flex', sans-serif;--}}
{{--                                                        font-size: {{$user->marketSettings->price_font_size}}rem;--}}
{{--                                                        @if($user->marketSettings->color_price) color: {{$user->marketSettings->color_price}}; @endif"--}}
{{--                                                                ><b>₽ {{$product->price}}</b></p>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if(count($user->userProducts()) == 20)--}}
{{--                        <div class="d-grid gap-2" style="padding-right: 12px; padding-left: 12px">--}}
{{--                            <a class="btn shadow" style="background-color: {{$user->navigation_color}}; font-family: 'Inter', sans-serif; font-size: 1rem; border: 0" href="{{ route('showProductsInCategory', ['user' => $user->slug, 'categorySlug' => 'all']) }}">--}}
{{--                                Загрузить еще--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    @if(Auth::check())--}}
{{--                        <div class="mt-5 mb-5 me-3 ms-3 text-center">--}}
{{--                            <p>Для первого запуска витрины, её необходимо настроить. </p>--}}
{{--                            <div class="d-grid gap-2">--}}
{{--                                <a href="{{ route('marketSettingsForm', ['id' => $user->id]) }}">--}}
{{--                                    <button class="btn btn-primary" type="button" style="border: 0">Настройки витрины</button>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <!-- ---------------------- -->--}}
{{--        <!-- Соц сети для типа Links -->--}}
{{--        <!-- ---------------------- -->--}}
{{--        @if($user->social_links_bar == 1)--}}
{{--            @if($user->links_bar_position == 'bottom')--}}
{{--                @if(count($user->userLinks(false)) > 0)--}}
{{--                    <nav class="navbar mt-5 mb-4">--}}
{{--                        <div class="container-fluid d-flex justify-content-center">--}}
{{--                            @foreach($user->userLinks(false) as $link)--}}
{{--                                @if($link->icon)--}}
{{--                                    <form method="POST" action="{{ route('clickLinkStatistic', ['user' => $user->id]) }}"> @csrf--}}
{{--                                        <input type="hidden" name="link_id" value="{{$link->id}}">--}}
{{--                                        <input type="hidden" name="link_url" value="{{$link->link}}">--}}
{{--                                        <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">--}}
{{--                                            <img src="{{$link->icon}}" class="me-2 ms-2 mt-3" style="--}}
{{--                                                        width:{{ $user->round_links_width }}px;--}}
{{--                                                        filter: drop-shadow({{ $user->round_links_shadow_right }}px {{ $user->round_links_shadow_bottom }}px {{ $user->round_links_shadow_round }}px {{ $user->round_links_shadow_color }})--}}
{{--                                                    ">--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </nav>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--        @endif--}}

{{--        @if($user->show_logo == true)--}}
{{--            <div class="container-fluid justify-content-center text-center mb-4 " style="margin-top: 70px">--}}
{{--                <div class="d-flex justify-content-center text-center">--}}
{{--                    <div class="text-center" style="margin-top: 25px">--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <a href="{{ route('welcome') }}" style="border-bottom: none">--}}
{{--                                <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="img-fluid" width="100">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </body>--}}

{{--    @foreach($user->userLinks(false) as $link)--}}
{{--        <script type="text/javascript">--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}

{{--            $(document).ready(function () {--}}
{{--                $('table tbody').sortable({--}}
{{--                    // delay:2000,--}}
{{--                    handle:'#up',--}}
{{--                    update: function (event, ui) {--}}
{{--                        $(this).children().each(function (index) {--}}
{{--                                if ($(this).attr('data-position') != (index+1)) {--}}
{{--                                    $(this).attr('data-position', (index+1)).addClass('updated');--}}
{{--                                }--}}
{{--                        });--}}

{{--                        saveNewPositions();--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            function saveNewPositions() {--}}
{{--                var userId = {{$user->id}};--}}
{{--                var positions = [];--}}
{{--                $('.updated').each(function () {--}}
{{--                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);--}}
{{--                    $(this).removeClass('updated');--}}
{{--                });--}}

{{--                $.ajax({--}}
{{--                    url: "{{ route('sortLink', ['user' => $user->id]) }}",--}}
{{--                    method: 'POST',--}}
{{--                    dataType: 'text',--}}
{{--                    data: {--}}
{{--                        update: 1,--}}
{{--                        positions: positions--}}
{{--                    }, success: function (response) {--}}
{{--                            console.log(response);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endforeach--}}

{{--    @foreach($user->userLinksWithoutBar() as $link)--}}
{{--        <script type="text/javascript">--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}

{{--            $(document).ready(function () {--}}
{{--                $('table tbody').sortable({--}}
{{--                    // delay:2000,--}}
{{--                    handle:'#up',--}}
{{--                    update: function (event, ui) {--}}
{{--                        $(this).children().each(function (index) {--}}
{{--                            if ($(this).attr('data-position') != (index+1)) {--}}
{{--                                $(this).attr('data-position', (index+1)).addClass('updated');--}}
{{--                            }--}}
{{--                        });--}}

{{--                        saveNewPositions();--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            function saveNewPositions() {--}}
{{--                var userId = {{$user->id}};--}}
{{--                var positions = [];--}}
{{--                $('.updated').each(function () {--}}
{{--                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);--}}
{{--                    $(this).removeClass('updated');--}}
{{--                });--}}

{{--                $.ajax({--}}
{{--                    url: "{{ route('sortLink', ['user' => $user->id]) }}",--}}
{{--                    method: 'POST',--}}
{{--                    dataType: 'text',--}}
{{--                    data: {--}}
{{--                        update: 1,--}}
{{--                        positions: positions--}}
{{--                    }, success: function (response) {--}}
{{--                        console.log(response);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endforeach--}}

{{--    @foreach($user->userLinks(true) as $link)--}}
{{--        <script type="text/javascript">--}}
{{--            $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--            });--}}

{{--            $(document).ready(function () {--}}
{{--                $('table tbody').sortable({--}}
{{--                    // delay:2000,--}}
{{--                    handle:'#up',--}}
{{--                    update: function (event, ui) {--}}
{{--                        $(this).children().each(function (index) {--}}
{{--                                if ($(this).attr('data-position') != (index+1)) {--}}
{{--                                    $(this).attr('data-position', (index+1)).addClass('updated');--}}
{{--                                }--}}
{{--                        });--}}

{{--                        saveNewPositions();--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            function saveNewPositions() {--}}
{{--                var userId = {{$user->id}};--}}
{{--                var positions = [];--}}
{{--                $('.updated').each(function () {--}}
{{--                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);--}}
{{--                    $(this).removeClass('updated');--}}
{{--                });--}}

{{--                $.ajax({--}}
{{--                    url: "{{ route('sortLink', ['user' => $user->id]) }}",--}}
{{--                    method: 'POST',--}}
{{--                    dataType: 'text',--}}
{{--                    data: {--}}
{{--                        update: 1,--}}
{{--                        positions: positions--}}
{{--                    }, success: function (response) {--}}
{{--                            console.log(response);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endforeach--}}

{{--</html>--}}








