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
                        @if($user->settings->avatar)
                            <img alt="Man" src="{{ '/'.$user->settings->avatar }}" class="h-10 w-10 rounded-full object-cover"/>
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
        <div class="mx-auto max-w-screen-xl sm:px-6 lg:px-8">
            <div class="">
                <div class="group block">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition ">
                        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl @if($user->dayVsNight == 1) text-gray-50 @else text-gray-900 @endif">{{ __('main.link_mass') }}</h1>
                        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">{{ __('main.link_mass_description') }}</p>
                        <a href="{{ route('editAllLinkForm', ['user' => $user->id]) }}" type="" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.link_mass_upd_btn') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($user->userLinks(true)) > 0)
        <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
            <div class="mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8">
                <div class="text-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.link_mass_pin') }}</label>
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                                @foreach($user->userLinks(true) as $link)
                                    @php
                                        $properties = unserialize($link->properties)
                                    @endphp
                                    <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                        <td>
                                            <div class="justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                                <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1" style="
                                                    animation-duration: {{$link->animation_speed}}s;
                                                    border-color: {{$properties['dl_border_color']}};
                                                    background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                    margin-top: 12px;
                                                    border-radius: {{$properties['dl_rounded']}}px;
                                                    background-position: center;
                                                    box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                    @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                    @if($properties['dl_link_block_shadow_bottom']) margin-bottom: {{$properties['dl_link_block_shadow_bottom']}}px @endif
                                                ">
                                                    <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                        <div class="col-span-1 flex items-center flex-none">
                                                            @if($link->icon)
                                                                <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                            @elseif($link->icon == false && $link->photo == true)
                                                                <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                            @else
                                                                <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                            @endif
                                                        </div>
                                                        <div class="col-span-10 text-center flex items-center">
                                                            <div class="ml-3 mr-3">
                                                                <h4 class="text-ellipsis" style="
                                                                    text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                    font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                    line-height: 1.5;
                                                                    font-weight: {{$properties['dl_font_bold']}};
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
                                                        <div id="up" class="col-span-1 flex items-center flex-none">
                                                            <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inline-flex rounded-b-lg shadow-sm mt-4" role="group">
                                                    <a href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        {{ __('main.link_stat') }}
                                                    </a>
                                                    <a href="{{ route('editLinkForm', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white border-l border-r border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        {{ __('main.link_edit') }}
                                                    </a>
                                                    <form action="{{ route('delLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST"> @csrf @method('DELETE')
                                                        <button type="submit" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                            {{ __('main.link_delete') }}
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
    @endif

    @if(count($user->userLinks(false)) > 0)
        <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
            <div class="mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8">
                <div class="text-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.link_mass_no_pin') }}</label>
                    <div class="group block">
                        <table class="table w-full">
                            <tbody>
                            @foreach($user->userLinks(false) as $link)
                                @php
                                    $properties = unserialize($link->properties)
                                @endphp
                                <tr data-index="{{$link->id}}" data-position="{{$link->position}}">
                                    <td>
                                        <div class="justify-center text-center" data-index="{{$link->id}}" data-position="{{$link->position}}">
                                            <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1" style="
                                                animation-duration: {{$link->animation_speed}}s;
                                                border-color: {{$properties['dl_border_color']}};
                                                background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                margin-top: 12px;
                                                border-radius: {{$properties['dl_rounded']}}px;
                                                background-position: center;
                                                box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                @if($properties['dl_link_block_shadow_bottom']) margin-bottom: {{$properties['dl_link_block_shadow_bottom']}}px @endif
                                            ">
                                                <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                    <div class="col-span-1 flex items-center flex-none">
                                                        @if($link->icon)
                                                            <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                        @elseif($link->icon == false && $link->photo == true)
                                                            <img class="mt-1 mb-1" src="{{$link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                        @else
                                                            <img class="mt-1 mb-1" src="https://emoji.discadia.com/emojis/914c0e06-428c-4c1d-bf2c-3393dc14987f.PNG" style="width:50px; height: 50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                        @endif
                                                    </div>
                                                    <div class="col-span-10 text-center flex items-center">
                                                        <div class="ml-3 mr-3">
                                                            <h4 class="text-ellipsis" style="
                                                                text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                line-height: 1.5;
                                                                font-weight: {{$properties['dl_font_bold']}};
                                                                font-size: {{$properties['dl_font_size']}}rem;
                                                                margin: 0;
                                                                color: {{$properties['dl_title_color']}};
{{--                                                                @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif--}}
                                                                @if($link->photo == '' && $link->icon == '')
                                                                    @if($properties['dl_text_shadow_bottom'])
                                                                        margin-top: 13px; margin-bottom: 13px;
                                                                    @else
                                                                        margin-top: 13px; margin-bottom: {{13 + $properties['dl_text_shadow_bottom']}}px;
                                                                    @endif
                                                                @endif
{{--                                                                @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif--}}
                                                                @if($properties['dl_text_shadow_right']) margin-right: {{$properties['dl_text_shadow_right']}}px; @endif
                                                                @if($properties['dl_link_block_shadow_right']) margin-left: {{$properties['dl_link_block_shadow_right']}}px @endif
                                                            ">{{$link->title}}</h4>
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
                                            <div class="inline-flex rounded-b-lg shadow-sm mt-4" role="group">
                                                <a href="{{ route('showClickLinkStatistic', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    {{ __('main.link_stat') }}
                                                </a>
                                                <a href="{{ route('editLinkForm', ['user' => $user->id, 'link' => $link->id]) }}" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white border-l border-r border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    {{ __('main.link_edit') }}
                                                </a>
                                                <form action="{{ route('delLink', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST"> @csrf @method('DELETE')
                                                    <button type="submit" class="w-20 px-4 py-1 text-sm font-medium text-gray-900 bg-white rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        {{ __('main.link_delete') }}
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
    @endif

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

</x-app-layout>








