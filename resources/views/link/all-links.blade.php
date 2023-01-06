<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('editProfileForm', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>

{{--                    <form class="w-full">--}}
{{--                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>--}}
{{--                        <div class="relative">--}}
{{--                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">--}}
{{--                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>--}}
{{--                            </div>--}}
{{--                            <input type="search" id="default-search" style="border: none" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search links" required>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    <a type="button" class="group flex shrink-0 items-center rounded-lg transition" href="{{ route('userHomePage', ['user' => $user->slug]) }}">
                        <span class="sr-only">Menu</span>
                        @if($user->avatar)
                            <img alt="Man" src="{{ '/'.$user->avatar }}" class="rounded-full object-cover" style="width: 2.63rem; height: 2.63rem"/>
                        @else
                            <img alt="Man" src="https://camo.githubusercontent.com/eb6a385e0a1f0f787d72c0b0e0275bc4516a261b96a749f1cd1aa4cb8736daba/68747470733a2f2f612e736c61636b2d656467652e636f6d2f64663130642f696d672f617661746172732f6176615f303032322d3531322e706e67" class="h-10 w-10 rounded-full object-cover"/>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header>

    @if ($message = Session::get('success'))
        <div class="text-center flex justify-center">
            <div class="w-full text-center">
                <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                    <div id="alert-3" class="flex p-4 mb-4 text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="">
                <div class="group block">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-red-600/50 hover:shadow-red-600/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-red-600/50">
                        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl @if($user->dayVsNight == 1) text-gray-50 @else text-black @endif">Mass update</h1>
                        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">Use this feature if you want to change the design of all links at once</p>
                        <a href="{{ route('editAllLinkForm', ['user' => $user->id]) }}" type="" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            UPDATE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="text-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Pinned links</label>
                <div class="group block">
                    <table class="table w-full">
                        <tbody>
                            @foreach($user->userLinks(true) as $link)
                                <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                    <td>
                                        <div class="justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                            <div class="row card ms-1 me-1 {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center;">
                                                <div class="flex align-center justify-between mt-1" style="padding-left: 4px; padding-right: 4px">
                                                    <div class="col-span-1 flex items-center flex-none">
                                                        @if($link->icon)
                                                            <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                        @elseif($link->icon == false && $link->photo == true)
                                                            <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                        @else
                                                            <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">
                                                        @endif
                                                    </div>
                                                    <div class="col-span-10 text-center flex items-center">
                                                        <div class="ml-3 mr-3">
                                                            <h4 class="text-ellipsis" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                        </div>
                                                    </div>
                                                    <div id="up" class="col-span-1 flex items-center flex-none">
                                                        <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inline-flex rounded-b-lg shadow-sm" role="group">
                                                <a href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-bl-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    Statistic
                                                </a>
                                                <a href="{{ route('editLinkForm', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white border-l border-r border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    Edit
                                                </a>
                                                <form action="{{ route('delLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST"> @csrf @method('DELETE')
                                                    <button type="submit" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-br-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="text-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Pinned links</label>
                <div class="group block">
                    <table class="table w-full">
                        <tbody>
                        @foreach($user->userLinks(false) as $link)
                            <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                <td>
                                    <div class="justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                        <div class="row card ms-1 me-1 {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center;">
                                            <div class="flex align-center justify-between mt-1" style="padding-left: 4px; padding-right: 4px">
                                                <div class="col-span-1 flex items-center flex-none">
                                                    @if($link->icon)
                                                        <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @elseif($link->icon == false && $link->photo == true)
                                                        <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                                                    @else
                                                        <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$link->rounded}}px; opacity: 0;">
                                                    @endif
                                                </div>
                                                <div class="col-span-10 text-center flex items-center">
                                                    <div class="ml-3 mr-3">
                                                        <h4 class="text-ellipsis" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>
                                                    </div>
                                                </div>
                                                <div id="up" class="col-span-1 flex items-center flex-none">
                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inline-flex rounded-b-lg shadow-sm" role="group">
                                            <a href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-bl-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                Statistic
                                            </a>
                                            <a href="{{ route('editLinkForm', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white border-l border-r border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                Edit
                                            </a>
                                            <form action="{{ route('delLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST"> @csrf @method('DELETE')
                                                <button type="submit" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-br-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{--Закрепленные ссылки и посты--}}
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

</x-app-layout>


{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">--}}
{{--    <title>{{ $user->name }}</title>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}


{{--    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>--}}


{{--    @include('fonts.fonts')--}}

{{--    <style type="text/css">--}}
{{--        body{--}}
{{--            background: #f1f2f2;--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-attachment: fixed;--}}
{{--        }--}}
{{--        span{--}}
{{--            font-size:15px;--}}
{{--        }--}}
{{--        a{--}}
{{--            text-decoration:none;--}}
{{--            color: #0062cc;--}}
{{--            /* border-bottom:2px solid #0062cc; */--}}
{{--        }--}}
{{--        .box-part{--}}
{{--            background:#fcfcf9;--}}
{{--            border-radius:25;--}}
{{--            padding:20px 10px;--}}
{{--            margin:30px 0px;--}}
{{--            -webkit-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);--}}
{{--            -moz-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);--}}
{{--            box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.12);--}}
{{--        }--}}
{{--        .text{--}}
{{--            margin:20px 0px;--}}
{{--        }--}}
{{--        .img {--}}
{{--            width: 25px;--}}
{{--            height: 25px;--}}
{{--            border-radius: 50%;--}}
{{--            margin-right: 0;--}}
{{--            background-position: center center;--}}
{{--            -wekit-background-size: cover;--}}
{{--            background-size: cover;--}}
{{--            background-repeat: no-repeat;--}}
{{--        }--}}
{{--        .imgg {--}}
{{--            width: 25px;--}}
{{--            height: 25px;--}}
{{--            /* border-radius: 50%; */--}}
{{--            margin-right: 0;--}}
{{--            background-position: center center;--}}
{{--            -wekit-background-size: cover;--}}
{{--            background-size: cover;--}}
{{--            background-repeat: no-repeat;--}}
{{--        }--}}
{{--        .ts-control {--}}
{{--            border: 0;--}}
{{--            box-shadow: 0px 1px 10px 2px rgba(0, 0, 0, 0.2);--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}

{{--<div class="container-fluid justify-content-center text-center">--}}
{{--    @if ($errors->any())--}}
{{--        <div class="row">--}}
{{--            <div class="col-12" style="padding: 0">--}}
{{--                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: red">--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <div class="title">--}}
{{--                            <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$error}}</span>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if ($message = Session::get('error'))--}}
{{--        <div class="row">--}}
{{--            <div class="col-12" style="padding: 0">--}}
{{--                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: red">--}}
{{--                    <div class="title">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$message}}</span>--}}
{{--                    </div>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

{{--<div class="container-fluid" style="padding: 0">--}}
{{--    <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">--}}
{{--        <div class="container-fluid">--}}
{{--            <a class="mb-1" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">--}}
{{--                <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">--}}
{{--            </a>--}}
{{--            <form class="" action="{{ route('searchLink', ['user' => Auth::user()->id]) }}">--}}
{{--                <input class="form-control me-2 @if($user->dayVsNight) bg-secondary @endif" type="search" placeholder="Поиск ссылок..." aria-label="Search" name="search" style="height: 30px">--}}
{{--            </form>--}}
{{--            <a class="" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">--}}
{{--                <div class="img" style="background-image: url({{$user->avatar}});"></div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}

{{--<!-- Массовое изменение -->--}}
{{--<div class="container-fluid justify-content-center text-center">--}}
{{--    <div class="row">--}}
{{--        <div class="col-12" data-bs-toggle="modal" data-bs-target="#exampleModalLink" style="padding-right: 0; padding-left: 0">--}}
{{--            <div class="box-part text-center shadow-sm @if($user->dayVsNight) bg-secondary text-white-50 @endif" style="margin: 0; background-color: #feae72">--}}
{{--                <div class="title">--}}
{{--                    <h4 class="mt-2" style="font-family: 'Rubik', sans-serif; color: white">@lang('app.a_edit_links')</h4>--}}
{{--                </div>--}}
{{--                <div class="text mb-1">--}}
{{--                    <span style="font-family: 'Rubik', sans-serif; font-size: 75%; line-height: 16px; display:block; color: white">@lang('app.a_edit_links_descr')</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="modal fade bg-dark" id="exampleModalLink" tabindex="-1" aria-labelledby="exampleModalLink" aria-hidden="true">--}}
{{--        <div class="modal-dialog" style="margin: 0">--}}
{{--            <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2; border-radius: 0">--}}
{{--                <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}
{{--                    <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">@lang('app.a_edit_links')</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}
{{--                    <form action="{{ route('editAllLink', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf @method('PATCH')--}}
{{--                        <div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_title')</label>--}}
{{--                                <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="" title="Choose your color" name="title_color" style="height: 36px; border: 0">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="text-center row">--}}
{{--                                <div class="col-9">--}}
{{--                                    <select id="mass-edit" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>--}}
{{--                                </div>--}}
{{--                                <div class="col-3">--}}
{{--                                    <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="font_size" style="height: 34px; border: 0">--}}
{{--                                        <option value="0.9">1</option>--}}
{{--                                        <option value="1">2</option>--}}
{{--                                        <option value="1.1">3</option>--}}
{{--                                        <option value="1.2">4</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <label class="mb-3" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_back_color')</label>--}}
{{--                                <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                    <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="" title="Choose your color" name="background_color" style="height: 35px; border: 0">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3 text-center">--}}
{{--                                <div class="form-check form-switch text-center">--}}
{{--                                    <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">--}}
{{--                                    <label class="form-check-label" for="flexCheckDefault" style="font-family: 'Rubik', sans-serif;">--}}
{{--                                        Сделать текст ссылки жирным--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>--}}
{{--                            <div class="mb-3 text-center row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput"  title="Choose your color" name="text_shadow_color" style="height: 36px; border: 0"><br>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Четкость тени</span>--}}
{{--                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_blur" value="0">--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>--}}
{{--                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_bottom" value="0">--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг вправо</span>--}}
{{--                                    <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="0">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_trans')</label>--}}
{{--                            <div class="mb- text-center d-flex justify-content-between">--}}
{{--                                <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency">--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 mt-2 text-center">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-check form-check-inline">--}}
{{--                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" style="border: 0">--}}
{{--                                                <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-check form-check-inline">--}}
{{--                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" style="border: 0">--}}
{{--                                                <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 mt-2">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-check form-check-inline">--}}
{{--                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" style="border: 0">--}}
{{--                                                <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-check form-check-inline">--}}
{{--                                                <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" style="border: 0">--}}
{{--                                                <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.a_round')</label><br>--}}
{{--                                <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded">--}}
{{--                            </div>--}}
{{--                            <div class="grap-2 d-grid">--}}
{{--                                <button type="submit" class="btn btn-secondary" style="border: 0">Изменить</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- ЗАКРЕПЛЕННЫЕ  ссылки -->--}}
{{--<table class="table" style="margin-bottom: 0">--}}
{{--    <tbody>--}}
{{--    @foreach($user->userLinks(true) as $link)--}}
{{--        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">--}}
{{--                <div class="ms-2 me-2 justify-content-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="row card ms-1 me-1 {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center;">--}}
{{--                            <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px">--}}
{{--                                <div class="col-1">--}}
{{--                                    @if($link->type == 'POST')--}}
{{--                                        @if($link->photos)--}}
{{--                                            @foreach(unserialize($link->photos) as $key => $photo)--}}
{{--                                                @if($key == 0)--}}
{{--                                                    <img src="{{$photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                    @elseif($link->type != 'POST')--}}
{{--                                        @if($link->icon)--}}
{{--                                            <img src="{{$link->icon}}" style="width:50px;">--}}
{{--                                        @elseif($link->icon == false)--}}
{{--                                            <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                        @endif--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class=" col-10 text-center">--}}
{{--                                    <div class="me-5 ms-5">--}}
{{--                                        <h4 class="" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-1">--}}
{{--                                    <div id="up" class="imgg" style="background-image: url(https://cdn-icons-png.flaticon.com/512/238/238081.png);"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0; margin-right: 30px; margin-left: 30px">--}}
{{--                            <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black; border-bottom-left-radius: 5px;">--}}
{{--                                <a href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">--}}
{{--                                    <button href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f1f2f2; border: 0;">--}}
{{--                                        @lang('app.s_stats')--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalPost{{$link->id}}" @elseif($link->type != 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}" @endif>--}}
{{--                                <button class="btn-sm" style="background-color: #f1f2f2; border: 0;">--}}
{{--                                    @lang('app.a_edit')--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="col-4" style="background-color: #f1f2f2; border-bottom-right-radius: 5px;">--}}
{{--                                <form action="{{ route('delLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">--}}
{{--                                    @csrf @method('DELETE')--}}
{{--                                    <button class="btn-sm" style="background-color: #f0eeef; border: 0;">--}}
{{--                                        @lang('app.a_del')--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" style="margin: 0">--}}
{{--                                <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2; border-radius: 0">--}}
{{--                                    <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}
{{--                                        <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                    </div>--}}

{{--                                    <div id="pin-icon-alert{{$link->id}}" style="display: none;" class="ms-2 me-2 mt-2">--}}
{{--                                        <div class="alert alert-dark" role="alert">--}}
{{--                                            Иконка удалена--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    @if($link->icon == false)--}}
{{--                                        @if($link->photo)--}}
{{--                                            <div class="mb-3" id="photo-block{{$link->id}}">--}}
{{--                                                <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>--}}
{{--                                                <div class="row d-flex align-items-center justify-content-center">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12 mt-2">--}}
{{--                                                        <form action="{{ route('delPhoto', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">--}}
{{--                                                            @csrf @method('PATCH')--}}
{{--                                                            <input type="hidden" id="photoId{{$link->id}}" value="{{$link->id}}">--}}
{{--                                                            <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">--}}
{{--                                                            <input type="hidden" id="isPhoto{{$link->id}}" value="{{$link->photo}}">--}}
{{--                                                            <button id="delete-pin-photo{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @elseif($link->icon)--}}
{{--                                        <div id="icon-block{{$link->id}}" class="mb-3">--}}
{{--                                            <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_icon')</label><br>--}}
{{--                                            <div class="row d-flex align-items-center justify-content-center">--}}
{{--                                                <div class="col-12">--}}
{{--                                                    <img class="rounded-3" src="{{$link->icon}}" style="width:50px;">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-12 mt-2">--}}
{{--                                                    <form action="{{ route('delLinkIcon', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">--}}
{{--                                                        @csrf @method('PATCH')--}}
{{--                                                        <input type="hidden" id="linkId{{$link->id}}" value="{{$link->id}}">--}}
{{--                                                        <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">--}}
{{--                                                        <input type="hidden" id="isIcon{{$link->id}}" value="{{$link->icon}}">--}}
{{--                                                        <button id="delete-pin-icon{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                    <div class="modal-body @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">--}}
{{--                                        <form action="{{ route('editLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">--}}
{{--                                            @csrf @method('PATCH')--}}
{{--                                            <div>--}}
{{--                                                <input type="hidden" name="type" value="LINK"> <!-- Тип ссылки -->--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_title')</label>--}}
{{--                                                    <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="title" placeholder="" maxlength="100" value="{{$link->title}}" style="border: 0">--}}
{{--                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="text-center row">--}}
{{--                                                    <div class="col-9">--}}
{{--                                                        <select id="pinned-links{{$link->id}}" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-3">--}}
{{--                                                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="font_size" style="height: 35px; border: 0">--}}
{{--                                                            <option @if($link->font_size == 0.9) selected @endif value="0.9">1</option>--}}
{{--                                                            <option @if($link->font_size == 1) selected @endif value="1">2</option>--}}
{{--                                                            <option @if($link->font_size == 1.1) selected @endif value="1.1">3</option>--}}
{{--                                                            <option @if($link->font_size == 1.2) selected @endif value="1.2">4</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <label class="mb-3 mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>--}}
{{--                                                    <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="link" placeholder="http://..." value="{{$link->link}}" style="border: 0">--}}
{{--                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.a_edit_link')</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3 text-center">--}}
{{--                                                    <div class="form-check form-switch text-center">--}}
{{--                                                        <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" @if($link->bold == true) checked @endif style="border: 0">--}}
{{--                                                        <label class="form-check-label" for="flexCheckDefault" style="font-family: 'Rubik', sans-serif;">--}}
{{--                                                            Сделать текст ссылки жирным--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>--}}
{{--                                                <div class="mb-3 text-center row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput" value="{{$link->text_shadow_color}}" title="Choose your color" name="text_shadow_color" style="height: 35px; border: 0"><br>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Четкость тени</span>--}}
{{--                                                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_blur" value="{{$link->text_shadow_blur}}">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>--}}
{{--                                                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_bottom" value="{{$link->text_shadow_bottom}}">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг вправо</span>--}}
{{--                                                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="{{$link->text_shadow_right}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div id="icon-block{{$link->id}}">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_icon')</label>--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <select id="select-beast-empty{{$link->id}}" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon"></select>--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_icon_description')</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3" id="upload-icon{{$link->id}}">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>--}}
{{--                                                    <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile02" name="photo" style="border: 0">--}}
{{--                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_photo_description')</span>--}}
{{--                                                </div>--}}


{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>--}}
{{--                                                    <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->title_color_hex}}" title="Choose your color" name="title_color" style="height: 35px; border: 0">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>--}}
{{--                                                    <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 35px; border: 0">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>--}}
{{--                                                <div class="mb- text-center d-flex justify-content-between">--}}
{{--                                                    <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3 mt-2 text-center">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" @if($link->shadow == 'shadow-none') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" @if($link->shadow == 'shadow-sm') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12 mt-2">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" @if($link->shadow == 'shadow') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" @if($link->shadow == 'shadow-lg') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_round')</label>--}}
{{--                                                    <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                                        <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="{{$link->rounded}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3 text-center">--}}
{{--                                                    <div>--}}
{{--                                                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="animation" style="border: 0">--}}
{{--                                                            <option >Выбрать анимацию...</option>--}}
{{--                                                            <option class="animate__animated animate__pulse animate__infinite infinite" @if($link->animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>--}}
{{--                                                            <option class="animate__animated animate__headShake animate__infinite infinite" @if($link->animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                    <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="mb-3 text-center">--}}
{{--                                                    <div class="form-check form-switch text-center">--}}
{{--                                                        <input @if($link->pinned == 1) checked @endif name="pinned" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">--}}
{{--                                                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                                            Закрепите ссылку и она всегда будет вверху списка--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-grid grap-2">--}}
{{--                                                    <button type="submit" class="btn btn-secondary" style="border: 0">@lang('app.a_edit')</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--<!-- Ссылки -->--}}
{{--<table class="table">--}}
{{--    <tbody>--}}
{{--    @foreach($user->userLinks(false) as $link)--}}
{{--        <tr data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">--}}
{{--                <div class="ms-2 me-2 justify-content-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="row card ms-1 me-1 {{$link->shadow}}" style="background-color:rgba({{$link->background_color}}, {{$link->transparency}}); border: 0; margin-top: 12px; border-radius: {{$link->rounded}}px; background-position: center;">--}}
{{--                            <div class="d-flex align-items-center justify-content-start mt-1 mb-1" style="padding-left: 4px; padding-right: 4px">--}}
{{--                                <div class="col-1">--}}
{{--                                    @if($link->icon)--}}
{{--                                        <img src="{{$link->icon}}" style="width:50px;">--}}
{{--                                    @elseif($link->icon == false)--}}
{{--                                        <img src="{{$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class=" col-10 text-center">--}}
{{--                                    <div class="me-5 ms-5">--}}
{{--                                        <h4 class="" style="text-shadow:{{$link->text_shadow_right}}px {{$link->text_shadow_bottom}}px {{$link->text_shadow_blur}}px {{$link->text_shadow_color}} ;font-family: '{{$link->font}}', sans-serif; line-height: 1.5; font-size: {{$link->font_size}}rem; margin: 0;color: {{$link->title_color}}; @if($link->photo == '' && $link->photos == '') margin-top: 14px; margin-bottom: 14px @endif">@if($link->bold == true) <b> @endif{{$link->title}}@if($link->bold == true) </b> @endif</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-1">--}}
{{--                                    <div id="up" class="imgg" style="background-image: url(https://i.ibb.co/VLbJkrG/dots.png);"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex justify-content-between rounded-bottom rounded-3" style="padding: 0; margin-right: 30px; margin-left: 30px">--}}
{{--                            <div class="col-4 border-end " style="background-color: #f0eeef; box-shadow: 5px 0px 0px black; border-bottom-left-radius: 5px;">--}}
{{--                                <a href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" style="text-decoration: none; color: black">--}}
{{--                                    <button href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" class="btn-sm" style="background-color: #f1f2f2; border: 0;">--}}
{{--                                        @lang('app.s_stats')--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-4 border-end" style="background-color: #f0eeef; box-shadow: 5px 0px 0px black;" @if($link->type == 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalPost{{$link->id}}" @elseif($link->type != 'POST') data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{$link->id}}" @endif>--}}
{{--                                <button class="btn-sm" style="background-color: #f1f2f2; border: 0;">--}}
{{--                                    @lang('app.a_edit')--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="col-4" style="background-color: #f1f2f2; border-bottom-right-radius: 5px;">--}}
{{--                                <form action="{{ route('delLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">--}}
{{--                                    @csrf @method('DELETE')--}}
{{--                                    <button class="btn-sm" style="background-color: #f0eeef; border: 0;">--}}
{{--                                        @lang('app.a_del')--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="modal fade" id="exampleModalEdit{{$link->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" style="margin: 0">--}}
{{--                                <div class="modal-content @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2; border-radius: 0">--}}
{{--                                    <div class="modal-header @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}
{{--                                        <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;">Изменить ссылку</h5>--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                    </div>--}}

{{--                                    <div id="pin-icon-alert{{$link->id}}" style="display: none;" class="ms-2 me-2 mt-2">--}}
{{--                                        <div class="alert alert-dark" role="alert">--}}
{{--                                            Иконка удалена--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    @if($link->icon == false)--}}
{{--                                        @if($link->photo)--}}
{{--                                            <div class="mb-3" id="photo-block{{$link->id}}">--}}
{{--                                                <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_link')</label><br>--}}
{{--                                                <div class="row d-flex align-items-center justify-content-center">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <img class="rounded-3" src="{{$link->photo}}" style="width:50px;">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12 mt-2">--}}
{{--                                                        <form action="{{ route('delPhoto', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">--}}
{{--                                                            @csrf @method('PATCH')--}}
{{--                                                            <input type="hidden" id="photoId{{$link->id}}" value="{{$link->id}}">--}}
{{--                                                            <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">--}}
{{--                                                            <input type="hidden" id="isPhoto{{$link->id}}" value="{{$link->photo}}">--}}
{{--                                                            <button id="delete-pin-photo{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @elseif($link->icon)--}}
{{--                                        <div id="icon-block{{$link->id}}" class="mb-3">--}}
{{--                                            <label for="exampleInputEmail1" class="form-label mt-3" style="font-family: 'Rubik', sans-serif;">@lang('app.a_now_icon')</label><br>--}}
{{--                                            <div class="row d-flex align-items-center justify-content-center">--}}
{{--                                                <div class="col-12">--}}
{{--                                                    <img class="rounded-3" src="{{$link->icon}}" style="width:50px;">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-12 mt-2">--}}
{{--                                                    <form action="{{ route('delLinkIcon', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST">--}}
{{--                                                        @csrf @method('PATCH')--}}
{{--                                                        <input type="hidden" id="linkId{{$link->id}}" value="{{$link->id}}">--}}
{{--                                                        <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">--}}
{{--                                                        <input type="hidden" id="isIcon{{$link->id}}" value="{{$link->icon}}">--}}
{{--                                                        <button id="delete-pin-icon{{$link->id}}" class="btn btn-sm btn-danger">@lang('app.a_now_del')</button>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                    <div class="modal-body @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">--}}
{{--                                        <form action="{{ route('editLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data">--}}
{{--                                            @csrf @method('PATCH')--}}
{{--                                            <div>--}}
{{--                                                <input type="hidden" name="type" value="LINK"> <!-- Тип ссылки -->--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_title')</label>--}}
{{--                                                    <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="title" placeholder="Моя красивая ссылка" maxlength="100" value="{{$link->title}}" style="border: 0">--}}
{{--                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_text_link_span')</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="text-center row">--}}
{{--                                                    <div class="col-9">--}}
{{--                                                        <select id="empty-links{{$link->id}}" data-placeholder="Поиск шрифта..."  autocomplete="off" name="font"></select>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-3">--}}
{{--                                                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="font_size" style="border: 0; height: 35px">--}}
{{--                                                            <option @if($link->font_size == 0.9) selected @endif value="0.9">1</option>--}}
{{--                                                            <option @if($link->font_size == 1) selected @endif value="1">2</option>--}}
{{--                                                            <option @if($link->font_size == 1.1) selected @endif value="1.1">3</option>--}}
{{--                                                            <option @if($link->font_size == 1.2) selected @endif value="1.2">4</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <label class="mb-3 mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выбрать шрифт и его размер для текста вашей ссылки</label>--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_insert_link')</label>--}}
{{--                                                    <input type="text" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="link" placeholder="http://..." value="{{$link->link}}" style="border: 0">--}}
{{--                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.a_edit_link')</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3 text-center">--}}
{{--                                                    <div class="form-check form-switch text-center">--}}
{{--                                                        <input name="bold" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" @if($link->bold == true) checked @endif style="border: 0">--}}
{{--                                                        <label class="form-check-label" for="flexCheckDefault" style="font-family: 'Rubik', sans-serif;">--}}
{{--                                                            Сделать текст ссылки жирным--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для текста</label>--}}
{{--                                                <div class="mb-3 text-center row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput" value="{{$link->text_shadow_color}}" title="Choose your color" name="text_shadow_color" style="height: 35px; border: 0"><br>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Четкость тени</span>--}}
{{--                                                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_blur" value="{{$link->text_shadow_blur}}">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>--}}
{{--                                                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_bottom" value="{{$link->text_shadow_bottom}}">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>--}}
{{--                                                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="text_shadow_right" value="{{$link->text_shadow_right}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div id="icon-block{{$link->id}}">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_icon')</label>--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <select id="select-beast-empty{{$link->id}}" data-placeholder="Поиск иконки..."  autocomplete="off" name="icon"></select>--}}
{{--                                                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_icon_description')</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3" id="upload-icon{{$link->id}}">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.m_photo')</label>--}}
{{--                                                    <input type="file" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" id="inputGroupFile02" name="photo" style="border: 0">--}}
{{--                                                    <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.m_photo_description')</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_title_color')</label>--}}
{{--                                                    <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->title_color_hex}}" title="Choose your color" name="title_color" style="height: 35px; border: 0">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_background_color')</label>--}}
{{--                                                    <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="{{$link->background_color_hex}}" title="Choose your color" name="background_color" style="height: 35px; border: 0">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_transparency')</label>--}}
{{--                                                <div class="mb- text-center d-flex justify-content-center">--}}
{{--                                                    <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="{{$link->transparency}}">--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3 mt-2 text-center">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio1" value="shadow-none" @if($link->shadow == 'shadow-none') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio2" value="shadow-sm" @if($link->shadow == 'shadow-sm') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12 mt-2">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow" @if($link->shadow == 'shadow') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <div class="form-check form-check-inline">--}}
{{--                                                                    <input class="form-check-input shadow" type="radio" name="shadow" id="inlineRadio3" value="shadow-lg" @if($link->shadow == 'shadow-lg') checked @endif style="border: 0">--}}
{{--                                                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.m_round')</label>--}}
{{--                                                    <div class="mb-3 text-center d-flex justify-content-center">--}}
{{--                                                        <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="rounded" value="{{$link->rounded}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="mb-3 text-center">--}}
{{--                                                    <div>--}}
{{--                                                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="animation" style="border: 0">--}}
{{--                                                            <option >Выбрать анимацию...</option>--}}
{{--                                                            <option @if($link->animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>--}}
{{--                                                            <option @if($link->animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                    <label class="mt-1" style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Вы можете выделить свою ссылку от остальных выбрав одну из анимаций</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="mb-3 text-center">--}}
{{--                                                    <div class="form-check form-switch text-center">--}}
{{--                                                        <input name="pinned" class="form-check-input shadow" type="checkbox" value="{{true}}" id="flexCheckDefault" style="border: 0">--}}
{{--                                                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                                            Закрепите ссылку и она всегда будет вверху списка--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="grap-2 d-grid">--}}
{{--                                                    <button type="submit" class="btn btn-secondary" style="border: 0">@lang('app.a_edit')</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--@foreach($user->userLinks(false) as $link)--}}
{{--    <!-- Удалить иконку или фотку у закрепки -->--}}
{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}

{{--        var isPhoto = $("#isPhoto{{$link->id}}").val();--}}
{{--        if(isPhoto) {--}}
{{--            $("#icon-block{{$link->id}}").hide();--}}
{{--            $(document).ready(function () {--}}
{{--                $("body").on("click","#delete-pin-photo{{$link->id}}", function(e){--}}
{{--                    e.preventDefault();--}}

{{--                    var id = $("#userId{{$link->id}}").val();--}}
{{--                    var link = $("#photoId{{$link->id}}").val();--}}
{{--                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                    $.ajax({--}}
{{--                        url: "/"+id+"/add-link/"+link+"/delete-photo",--}}
{{--                        type: 'PATCH',--}}
{{--                        data: {_token: CSRF_TOKEN},--}}
{{--                        dataType: 'JSON',--}}
{{--                        success: function (){--}}
{{--                            $("#photo-block{{$link->id}}").hide();--}}
{{--                            $("#icon-block{{$link->id}}").show();--}}
{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").show('show'); }, 1000);--}}

{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}

{{--        var isIcon = $("#isIcon{{$link->id}}").val();--}}
{{--        if(isIcon) {--}}
{{--            $("#upload-icon{{$link->id}}").hide();--}}
{{--            $(document).ready(function () {--}}
{{--                $("body").on("click","#delete-pin-icon{{$link->id}}", function(e){--}}
{{--                    e.preventDefault();--}}

{{--                    var id = $("#userId{{$link->id}}").val();--}}
{{--                    var link = $("#linkId{{$link->id}}").val();--}}
{{--                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                    $.ajax({--}}
{{--                        url: "/"+id+"/add-link/"+link+"/delete-icon",--}}
{{--                        type: 'PATCH',--}}
{{--                        data: {_token: CSRF_TOKEN},--}}
{{--                        dataType: 'JSON',--}}
{{--                        success: function (){--}}
{{--                            $("#icon-block{{$link->id}}").hide();--}}
{{--                            $("#upload-icon{{$link->id}}").show();--}}
{{--                            $("#pin-icon-alert{{$link->id}}").show();--}}

{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}

{{--        $(document).ready(function () {--}}
{{--            $('table tbody').sortable({--}}
{{--                // delay:2000,--}}
{{--                handle:'#up',--}}
{{--                update: function (event, ui) {--}}
{{--                    $(this).children().each(function (index) {--}}
{{--                        if ($(this).attr('data-position') != (index+1)) {--}}
{{--                            $(this).attr('data-position', (index+1)).addClass('updated');--}}
{{--                        }--}}
{{--                    });--}}

{{--                    saveNewPositions();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        function saveNewPositions() {--}}
{{--            var userId = {{$user->id}};--}}
{{--            var positions = [];--}}
{{--            $('.updated').each(function () {--}}
{{--                positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);--}}
{{--                $(this).removeClass('updated');--}}
{{--            });--}}

{{--            $.ajax({--}}
{{--                // url: "id"+userId + "/links/sort",--}}
{{--                url: "{{ route('sortLink', ['user' => $user->id]) }}",--}}
{{--                method: 'POST',--}}
{{--                dataType: 'text',--}}
{{--                data: {--}}
{{--                    update: 1,--}}
{{--                    positions: positions--}}
{{--                }, success: function (response) {--}}
{{--                    console.log(response);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        new TomSelect('#select-beast-empty{{$link->id}}',{--}}
{{--            valueField: 'img',--}}
{{--            searchField: 'title',--}}
{{--            options: [--}}
{{--                    @foreach($allIconsInsideFolder as $icon)--}}
{{--                {id: {{$icon->getInode()}}, title: '{{$icon->getFilename()}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},--}}
{{--                @endforeach--}}
{{--            ],--}}
{{--            render: {--}}
{{--                option: function(data, escape) {--}}
{{--                    return  '<table>' +--}}
{{--                        '<tr>' +--}}
{{--                        '<img style="background-color: #DCDCDC" width="90" src="' + escape(data.img) + '">' +--}}
{{--                        '</tr>' +--}}
{{--                        '</table>';--}}
{{--                },--}}
{{--                item: function(data, escape) {--}}
{{--                    return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endforeach--}}

{{-- Закрепленные ссылки и посты--}}
{{--@foreach($user->userLinks(true) as $link)--}}
{{--    <!-- Удалить иконку или фотку у закрепки -->--}}
{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}

{{--        var isPhoto = $("#isPhoto{{$link->id}}").val();--}}
{{--        if(isPhoto) {--}}
{{--            $("#icon-block{{$link->id}}").hide();--}}
{{--            $(document).ready(function () {--}}
{{--                $("body").on("click","#delete-pin-photo{{$link->id}}", function(e){--}}
{{--                    e.preventDefault();--}}

{{--                    var id = $("#userId{{$link->id}}").val();--}}
{{--                    var link = $("#photoId{{$link->id}}").val();--}}
{{--                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                    $.ajax({--}}
{{--                        url: "/"+"id"+id+"/add-link/"+link+"/delete-photo",--}}
{{--                        type: 'PATCH',--}}
{{--                        data: {_token: CSRF_TOKEN},--}}
{{--                        dataType: 'JSON',--}}
{{--                        success: function (){--}}
{{--                            $("#photo-block{{$link->id}}").hide();--}}
{{--                            $("#icon-block{{$link->id}}").show();--}}
{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").show('show'); }, 1000);--}}

{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}

{{--        var isIcon = $("#isIcon{{$link->id}}").val();--}}
{{--        if(isIcon) {--}}
{{--            $("#upload-icon{{$link->id}}").hide();--}}
{{--            $(document).ready(function () {--}}
{{--                $("body").on("click","#delete-pin-icon{{$link->id}}", function(e){--}}
{{--                    e.preventDefault();--}}

{{--                    var id = $("#userId{{$link->id}}").val();--}}
{{--                    var link = $("#linkId{{$link->id}}").val();--}}
{{--                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                    $.ajax({--}}
{{--                        url: "/"+"id"+id+"/add-link/"+link+"/delete-icon",--}}
{{--                        type: 'PATCH',--}}
{{--                        data: {_token: CSRF_TOKEN},--}}
{{--                        dataType: 'JSON',--}}
{{--                        success: function (){--}}
{{--                            $("#icon-block{{$link->id}}").hide();--}}
{{--                            $("#upload-icon{{$link->id}}").show();--}}
{{--                            $("#pin-icon-alert{{$link->id}}").show();--}}

{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        new TomSelect('#select-beast-empty{{$link->id}}',{--}}
{{--            valueField: 'img',--}}
{{--            searchField: 'title',--}}
{{--            options: [--}}
{{--                    @foreach($allIconsInsideFolder as $icon)--}}
{{--                {id: {{$icon->getInode()}}, title: '{{$icon->getFilename()}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},--}}
{{--                @endforeach--}}
{{--            ],--}}
{{--            render: {--}}
{{--                option: function(data, escape) {--}}
{{--                    return  '<table>' +--}}
{{--                        '<tr>' +--}}
{{--                        '<img style="background-color: #DCDCDC" width="90" src="' + escape(data.img) + '">' +--}}
{{--                        '</tr>' +--}}
{{--                        '</table>';--}}
{{--                },--}}
{{--                item: function(data, escape) {--}}
{{--                    return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        new TomSelect('#pinned-links{{$link->id}}',{--}}
{{--            valueField: 'font',--}}
{{--            searchField: 'title',--}}
{{--            maxOptions: 150,--}}
{{--            options: [--}}
{{--                    @foreach($allFontsInFolder as $font)--}}
{{--                {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},--}}
{{--                @endforeach--}}
{{--            ],--}}
{{--            render: {--}}
{{--                option: function(data, escape) {--}}
{{--                    return  '<div>' +--}}
{{--                        '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +--}}
{{--                        '</div>';--}}
{{--                },--}}
{{--                item: function(data, escape) {--}}
{{--                    return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endforeach--}}

{{--@foreach($user->userLinks(false) as $link)--}}
{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}

{{--        var isPhoto = $("#isPhoto{{$link->id}}").val();--}}
{{--        if(isPhoto) {--}}
{{--            $("#icon-block{{$link->id}}").hide();--}}
{{--            $(document).ready(function () {--}}
{{--                $("body").on("click","#delete-pin-photo{{$link->id}}", function(e){--}}
{{--                    e.preventDefault();--}}

{{--                    var id = $("#userId{{$link->id}}").val();--}}
{{--                    var link = $("#photoId{{$link->id}}").val();--}}
{{--                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                    $.ajax({--}}
{{--                        url: "/"+"id"+id+"/add-link/"+link+"/delete-photo",--}}
{{--                        type: 'PATCH',--}}
{{--                        data: {_token: CSRF_TOKEN},--}}
{{--                        dataType: 'JSON',--}}
{{--                        success: function (){--}}
{{--                            $("#photo-block{{$link->id}}").hide();--}}
{{--                            $("#icon-block{{$link->id}}").show();--}}
{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").show('show'); }, 1000);--}}

{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}

{{--        var isIcon = $("#isIcon{{$link->id}}").val();--}}
{{--        if(isIcon) {--}}
{{--            $("#upload-icon{{$link->id}}").hide();--}}
{{--            $(document).ready(function () {--}}
{{--                $("body").on("click","#delete-pin-icon{{$link->id}}", function(e){--}}
{{--                    e.preventDefault();--}}

{{--                    var id = $("#userId{{$link->id}}").val();--}}
{{--                    var link = $("#linkId{{$link->id}}").val();--}}
{{--                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                    $.ajax({--}}
{{--                        url: "/"+"id"+id+"/add-link/"+link+"/delete-icon",--}}
{{--                        type: 'PATCH',--}}
{{--                        data: {_token: CSRF_TOKEN},--}}
{{--                        dataType: 'JSON',--}}
{{--                        success: function (){--}}
{{--                            $("#icon-block{{$link->id}}").hide();--}}
{{--                            $("#upload-icon{{$link->id}}").show();--}}
{{--                            $("#pin-icon-alert{{$link->id}}").show();--}}

{{--                            setTimeout(function() { $("#pin-icon-alert{{$link->id}}").hide('slow'); }, 2000);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        new TomSelect('#empty-links{{$link->id}}',{--}}
{{--            valueField: 'font',--}}
{{--            searchField: 'title',--}}
{{--            maxOptions: 150,--}}
{{--            options: [--}}
{{--                    @foreach($allFontsInFolder as $font)--}}
{{--                {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},--}}
{{--                @endforeach--}}
{{--            ],--}}
{{--            render: {--}}
{{--                option: function(data, escape) {--}}
{{--                    return  '<div>' +--}}
{{--                        '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +--}}
{{--                        '</div>';--}}
{{--                },--}}
{{--                item: function(data, escape) {--}}
{{--                    return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endforeach--}}
{{--<script>--}}
{{--    new TomSelect('#mass-edit',{--}}
{{--        valueField: 'font',--}}
{{--        searchField: 'title',--}}
{{--        maxOptions: 150,--}}
{{--        options: [--}}
{{--                @foreach($allFontsInFolder as $font)--}}
{{--            {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},--}}
{{--            @endforeach--}}
{{--        ],--}}
{{--        render: {--}}
{{--            option: function(data, escape) {--}}
{{--                return  '<div>' +--}}
{{--                    '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +--}}
{{--                    '</div>';--}}
{{--            },--}}
{{--            item: function(data, escape) {--}}
{{--                return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';--}}
{{--            }--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}









