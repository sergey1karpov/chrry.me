<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('allLinks', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>

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

    <div class="text-center">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

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

    <section class="flex justify-center z-50" style="position: sticky; top: 0;">
        <div class="w-full mx-auto max-w-screen-xl  lg:px-8 sm:px-8">
            <div id="matureBlock" class="px-4 py-4 mb-4 w-full mx-auto max-w-screen-xl rounded-b-lg bg-white">
{{--                <h1 id="matureBlockText" class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl text-black">{{ __('main.link_mass_upd') }}</h1>--}}
                <div class="{{$properties->dl_border}} row card ms-1 me-1" id="background" style="
                    animation-duration: {{$link->animation_speed}}s;
                    border-color: {{$properties->dl_border_color}};
                    background-color:rgba({{$properties->dl_background_color}}, {{$properties->dl_transparency}});
                    margin-top: 12px;
                    border-radius: {{$properties->dl_rounded}}px;
                    background-position: center;
                    box-shadow: {{$properties->dl_link_block_shadow_right}}px {{$properties->dl_link_block_shadow_bottom}}px {{$properties->dl_link_block_shadow_blur}}px {{$properties->dl_link_block_shadow_color}};
                    @if($properties->dl_link_block_shadow_right) margin-right: {{$properties->dl_link_block_shadow_right}}px; @endif
                    @if($properties->dl_link_block_shadow_bottom) margin-bottom: {{$properties->dl_link_block_shadow_bottom}}px; @endif
                ">
                    <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                        <div class="col-span-1 flex items-center flex-none">
                            <div class="col-span-1 flex items-center flex-none">
                                @if($link->icon)
                                    <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties->dl_rounded}}px;">
                                @elseif($link->icon == false && $link->photo == true)
                                    <img class="mt-1 mb-1" src="{{'../../'.$link->photo}}" style="width:50px; border-radius: {{$properties->dl_rounded}}px;">
                                @else
                                    <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$properties->dl_rounded}}px; opacity: 0;">
                                @endif
                            </div>
                        </div>
                        <div class="col-span-10 text-center flex items-center">
                            <div class="ml-3 mr-3">
                                <h4 class="text-ellipsis" id="title-text" style="
                                    text-shadow:{{$properties->dl_text_shadow_right}}px {{$properties->dl_text_shadow_bottom}}px {{$properties->dl_text_shadow_blur}}px {{$properties->dl_text_shadow_color}};
                                    font-family: '{{$properties->dl_font}}', sans-serif;
                                    line-height: 1.5;
                                    font-size: {{$properties->dl_font_size}}rem;
                                    margin: 0;
                                    color: {{$properties->dl_title_color}};
                                    @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif
                                    @if($properties->dl_text_shadow_bottom) margin-bottom: {{$properties->dl_text_shadow_bottom}}px; @endif
                                    @if($properties->dl_text_shadow_right) margin-right: {{$properties->dl_text_shadow_right}}px; @endif
                                    @if($properties->dl_link_block_shadow_right) margin-left: {{$properties->dl_link_block_shadow_right}}px @endif
                                ">{{$link->title}}</h4>
                            </div>
                        </div>
                        <div id="up" class="col-span-1 flex items-center flex-none">
                            <img src="https://digiltable.com/wp-content/uploads/edd/2021/09/Sexy-lady-logo-Pornhub-logo.png" style="width:50px; border-radius: {{$properties->dl_rounded}}px; opacity: 0;">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center mt-4">
                    <div class="mt-1 mr-3">
                        <span class="material-symbols-outlined" style="color: white">wb_sunny</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="{{true}}" class="sr-only peer" id="switch-bg">
                        <div class="w-11 h-6 bg-gray-200  rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                    </label>
                    <div class="mt-1 ml-3">
                        <span class="material-symbols-outlined">dark_mode</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flex justify-center ">
        <div class="w-full mx-auto max-w-screen-xl lg:px-8 sm:px-8">
            <div id="design" class="px-4 py-4 mb-8 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('editAllLink', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-6 text-center">
                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_font') }}</label>
                        <select onchange="font()" id="mass-edit" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off" name="dl_font">
                            <option value="{{$properties->dl_font}}" selected>{{$properties->dl_font}}</option>
                        </select>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_color') }}</label>
                        <input onchange="textColor()" type="color" name="dl_title_color" id="name_color" value="{{$properties->dl_title_color}}" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0c0c0c] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_size') }}</label>
                        <select onchange="fontSize()" name="dl_font_size" id="font-size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($properties->dl_font_size == 0.8) selected @endif value="0.8">1</option>
                            <option @if($properties->dl_font_size == 0.9) selected @endif value="0.9">2</option>
                            <option @if($properties->dl_font_size == 1) selected @endif value="1">3</option>
                            <option @if($properties->dl_font_size == 1.1) selected @endif value="1.1">4</option>
                            <option @if($properties->dl_font_size == 1.2) selected @endif value="1.2">5</option>
                            <option @if($properties->dl_font_size == 1.3) selected @endif value="1.3">6</option>
                            <option @if($properties->dl_font_size == 1.4) selected @endif value="1.4">7</option>
                            <option @if($properties->dl_font_size == 1.5) selected @endif value="1.5">8</option>
                        </select>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_color_shadow') }}</label>
                        <input onchange="textShadow()" type="color" name="dl_text_shadow_color" value="{{$properties->dl_text_shadow_color}}" id="text-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_right') }}</label>
                        <input onchange="textShadow()" id="text-shadow-color-right" type="range" name="dl_text_shadow_right" value="{{$properties->dl_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_bottom') }}</label>
                        <input onchange="textShadow()" id="text-shadow-color-bottom" type="range" name="dl_text_shadow_bottom" value="{{$properties->dl_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_blur') }}</label>
                        <input onchange="textShadow()" id="text-shadow-color-blur" type="range" name="dl_text_shadow_blur" value="{{$properties->dl_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_bg_color') }}</label>
                        <input onchange="backgroundColor()" type="color" name="dl_background_color" id="bg-color" value="{{$properties->dl_background_color_hex}}" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0c0c0c] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_bg_trans') }}</label>
                        <input onchange="backgroundColor()" id="bg-transparency" type="range" name="dl_transparency" min="0.0" max="1.0" step="0.1" value="{{$properties->dl_transparency}}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color') }}</label>
                        <input onchange="linkShadow()" type="color" value="{{$properties->dl_link_block_shadow_color}}" name="dl_link_block_shadow_color" id="link-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color_r') }}</label>
                        <input onchange="linkShadow()" id="link-shadow-color-right" type="range" name="dl_link_block_shadow_right" value="{{$properties->dl_link_block_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color_b') }}</label>
                        <input onchange="linkShadow()" id="link-shadow-color-bottom" type="range" name="dl_link_block_shadow_bottom" value="{{$properties->dl_link_block_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color_blur') }}</label>
                        <input onchange="linkShadow()" id="link-shadow-color-blur" type="range" name="dl_link_block_shadow_blur" value="{{$properties->dl_link_block_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_border') }}</label>
                        <input onchange="borderRound()" id="border-round" type="range" name="dl_rounded" min="1" max="50" step="1" value="{{$properties->dl_rounded}}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_border_size') }}</label>
                        <select onchange="borderBoth()" name="dl_border" id="border-both" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($properties->dl_border == 'border-0') selected @endif value="border-0">0</option>
                            <option @if($properties->dl_border == 'border') selected @endif value="border">1</option>
                            <option @if($properties->dl_border == 'border-2') selected @endif value="border-2">2</option>
                            <option @if($properties->dl_border == 'border-4') selected @endif value="border-4">4</option>
                            <option @if($properties->dl_border == 'border-8') selected @endif value="border-8">8</option>
                        </select>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_border_color') }}</label>
                        <input onchange="borderColor()" type="color" value="{{$properties->dl_border_color}}" name="dl_border_color" id="border-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.link_mass_upd_btn_all') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>



    <script>
        new TomSelect('#mass-edit',{
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

        //font
        function font() {
            var font = document.getElementById('mass-edit').value;
            console.log(font);
            document.getElementById('title-text').style.fontFamily = font;
        }

        //text-color
        function textColor() {
            var textColor = document.getElementById('name_color').value;
            document.getElementById('title-text').style.color = textColor;
        }

        //font-size
        function fontSize() {
            var fontSize = document.getElementById('font-size').value;
            document.getElementById('title-text').style.fontSize = fontSize + 'rem';
        }

        //text-shadow
        function textShadow() {
            var textShadowColor = document.getElementById('text-shadow-color').value;
            var right = document.getElementById('text-shadow-color-right').value;
            var bottom = document.getElementById('text-shadow-color-bottom').value;
            var blur = document.getElementById('text-shadow-color-blur').value;

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('title-text').style.textShadow = textShadow;
        }

        //bg-color
        function backgroundColor() {
            var bgColor = document.getElementById('bg-color').value;
            var transparency = document.getElementById('bg-transparency').value;

            let hex = bgColor.replace('#', '');
            if (hex.length === 3) {
                hex = `${hex[0]}${hex[0]}${hex[1]}${hex[1]}${hex[2]}${hex[2]}`;
            }

            const r = parseInt(hex.substring(0, 2), 16);
            const g = parseInt(hex.substring(2, 4), 16);
            const b = parseInt(hex.substring(4, 6), 16);

            var rgb = 'rgb(' + r+',' + ' ' + g+',' + ' ' + b+',' + ' ' + Number(transparency) + ')';
            document.getElementById('background').style.backgroundColor = rgb;
        }

        //link-shadow
        function linkShadow() {
            var shadowColor = document.getElementById('link-shadow-color').value;
            var right = document.getElementById('link-shadow-color-right').value;
            var bottom = document.getElementById('link-shadow-color-bottom').value;
            var blur = document.getElementById('link-shadow-color-blur').value;

            var shadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + shadowColor;
            document.getElementById('background').style.boxShadow = shadow;
        }

        //border round
        function borderRound() {
            var borderRadius = document.getElementById('border-round').value;
            document.getElementById('background').style.borderRadius = borderRadius + 'px';
        }

        //border
        function borderBoth() {
            var borderBoth = document.getElementById('border-both').value;
            document.getElementById('background').className = borderBoth;
        }

        //border color
        function borderColor() {
            var borderColor = document.getElementById('border-color').value;
            document.getElementById('background').style.borderColor = borderColor;
        }

        //bg color
        $( document ).ready(function() {
            $("#switch-bg").click(function() {
                var type = $(this).is(':checked');
                if(type) {
                    $("#matureBlock").removeClass('bg-white').addClass('bg-black');
                    $("#matureBlockText").removeClass('text-black').addClass('text-white');
                } else {
                    $("#matureBlock").removeClass('bg-black').addClass('bg-white');
                    $("#matureBlockText").removeClass('text-white').addClass('text-black');
                }
            })
        });
    </script>

</x-app-layout>
