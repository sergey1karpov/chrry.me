<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('editProfileForm', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
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
                            <span class="font-medium">Ссылка добавлена!</span> Добавьте еще одну ссылку или перейдите на <a href="{{ route('userHomePage', ['user' => $user->slug]) }}" class="font-semibold underline hover:text-green-800 dark:hover:text-green-900"><span class="font-medium">главную страницу</span></a>.
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

{{--    <div id="sticky-banner" tabindex="-1" class="fixed top-0 left-0 z-50 flex justify-between w-full p-4 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">--}}
{{--        --}}
{{--    </div>--}}

    <div class="w-full mx-auto max-w-screen-xl lg:px-8 sm:px-8 z-50" style="position: sticky; top: 0;">
        <div id="matureBlock" class="rounded-b-lg mt-1 bg-white mx-auto max-w-screen-xl px-4 pt-4 pb-4 sm:px-6 lg:px-8">
            <div class="group block">
                <table class="table w-full">
                    <tbody>
                    <tr data-index="" data-position="">
                        <td>
                            <div id="block" class="justify-center text-center" data-index="" data-position="">
                                <form method="POST" action="">
                                    <div class="row card ms-1 me-1" id="background"
                                         style="
                                                    animation-duration: 2s;
                                                    background-position: center;
                                                    margin-right: 5px;
                                                ">
                                        <div class="flex align-center justify-between"
                                             style="padding-left: 4px; padding-right: 4px">
                                            <div class="col-span-1 flex items-center flex-none">
                                                <img class="mt-1 mb-1"
                                                     src=""
                                                     id="avatar-user"
                                                     style="width:50px; border-radius: 10px;">
                                            </div>
                                            <button type="submit"
                                                    style="
                                                        border: 0;
                                                        padding: 0;
                                                        background-color: rgba(0, 125, 215, 0);
                                                    ">
                                                <div class="col-span-10 text-center flex items-center">
                                                    <div class="ml-3 mr-3">
                                                        <h4 id="title-text" class="drop-shadow-md text-ellipsis"
                                                            style="margin: 0 0 0 5px;">
                                                        </h4>
                                                    </div>
                                                </div>
                                            </button>
                                            <div class="col-span-1 flex items-center flex-none"
                                                 style="opacity: 0">
                                                <div href=""
                                                     class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5"
                                                         stroke="currentColor" class="w-7 h-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
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

    <section class="flex justify-center ">
        <div class="w-full">

            <div class="mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 mb-10">
                <form action="{{ route('addLink', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <input type="hidden" name="type" value="LINK">

                    <div class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.link_text') }}</mark></label>
                            <input name="title" placeholder="My link" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.link_url') }}</mark></label>
                            <input name="link" placeholder="https://my-site.com/" maxlength="100" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_img') }}</label>
                            <input name="photo" accept=".jpg, .jpeg, .png, .gif" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                            <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">{{ __('main.link_img_size') }}</p>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_icon') }}</label>
                            <select onchange="fun1()" id="select-beast-empty" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off" name="icon"></select>
                        </div>
                    </div>

                    @if(count($user->links) > 0)
                        <div class="mb-10 mt-10 text-center rounded-lg p-5">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="check_last_link" id="check_last_link" type="checkbox" class="sr-only peer">
                                <div class="w-14 h-7 bg-gray-200 dark:peer-focus:ring-indigo-900 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-900"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.link_copy') }}</mark></span>
                            </label>
                            <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{ __('main.link_copy_description') }}</p>
                        </div>
                    @endif

                    <div id="design" class="@if(count($user->links) == 0) mt-4 @endif w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_font') }}</label>
                            <select onchange="font()" name="dl_font" id="select-beast-empty-font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off"></select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_size') }}</label>
                            <select onchange="fontSize()" name="dl_font_size" id="font-size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option value="0.8">1</option>
                                <option value="0.9">2</option>
                                <option selected value="1">3</option>
                                <option value="1.1">4</option>
                                <option value="1.2">5</option>
                                <option value="1.3">6</option>
                                <option value="1.4">7</option>
                                <option value="1.5">8</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_color') }}</label>
                            <input onchange="textColor()" type="color" name="dl_title_color" id="name_color" value="" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_color_shadow') }}</label>
                            <input onchange="textShadow()" type="color" name="dl_text_shadow_color" id="text-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_right') }}</label>
                            <input onchange="textShadow()" id="text-shadow-color-right" type="range" name="dl_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_bottom') }}</label>
                            <input onchange="textShadow()" id="text-shadow-color-bottom" type="range" name="dl_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_blur') }}</label>
                            <input onchange="textShadow()" id="text-shadow-color-blur" type="range" name="dl_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_bg_color') }}</label>
                            <input onchange="backgroundColor()" type="color" name="dl_background_color" value="#ffffff" id="bg-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_bg_trans') }}</label>
                            <input onchange="backgroundColor()" id="bg-transparency" type="range" name="dl_transparency" min="0.0" max="1.0" step="0.1" value="0.9" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color') }}</label>
                            <input onchange="linkShadow()" type="color" name="dl_link_block_shadow_color" id="link-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color_r') }}</label>
                            <input onchange="linkShadow()" id="link-shadow-color-right" type="range" name="dl_link_block_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color_b') }}</label>
                            <input onchange="linkShadow()" id="link-shadow-color-bottom" type="range" name="dl_link_block_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_shadow_color_blur') }}</label>
                            <input onchange="linkShadow()" id="link-shadow-color-blur" type="range" name="dl_link_block_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_border') }}</label>
                            <input onchange="borderRound()" id="border-round" type="range" name="dl_rounded" min="1" max="50" step="1" value="10" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_border_size') }}</label>
                            <select onchange="borderBoth()" name="dl_border" id="border-both" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option selected value="border-0">0</option>
                                <option value="border">1</option>
                                <option value="border-2">2</option>
                                <option value="border-4">4</option>
                                <option value="border-8">8</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_border_color') }}</label>
                            <input onchange="borderColor()" type="color" name="dl_border_color" id="border-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_animation') }}</label>
                            <select onchange="animationLink()" name="animation" id="animation" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option selected>None</option>
                                <option value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                                <option value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                                <option value="animate__animated animate__bounce animate__infinite infinite" style="border: 0">Bounce</option>
                                <option value="animate__animated animate__flash animate__infinite infinite" style="border: 0">Flash</option>
                                <option value="animate__animated animate__swing animate__infinite infinite" style="border: 0">Swing</option>
                                <option value="animate__animated animate__tada animate__infinite infinite" style="border: 0">TaDa!</option>
                                <option value="animate__animated animate__heartBeat animate__infinite infinite" style="border: 0">HeartBeat</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_animation_speed') }}</label>
                            <select onchange="animationSpeed()" name="animation_speed" id="animation_speed" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option selected>None</option>
                                <option value="1" style="border: 0">1 sec.</option>
                                <option value="2" style="border: 0">2 sec.</option>
                                <option value="3" style="border: 0">3 sec.</option>
                                <option value="4" style="border: 0">4 sec.</option>
                                <option value="5" style="border: 0">5 sec.</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-center mb-5 text-center rounded-lg p-1 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="pinned" type="checkbox" value="{{true}}" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_pin') }}</span>
                            </label>
                        </div>

                    </div>

                    <div class="mt-5">
                        <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.link_create') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    <section>

    <script>

        //Copy last link design block
        $( document ).ready(function(){
            $('#check_last_link').on('change', function(){
                if ($(this).is(':checked')) {
                    switchStatus = $(this).is(':checked');
                    $('#design').hide()
                }
                else {
                    switchStatus = $(this).is(':checked');
                    $('#design').show()
                }
            });
        });

        //Select icon
        new TomSelect('#select-beast-empty',{
            valueField: 'img',
            searchField: 'title',
            options: [
                @foreach($allIconsInsideFolder as $icon)
                    {id: {{$icon->getInode()}}, title: '{{substr($icon->getFilename(), 0, strrpos($icon->getFilename(),'.'))}}', img: '{{env('APP_URL') . '/public/images/social/'.$icon->getFilename()}}'},
                @endforeach
            ],
            render: {
                option: function(data, escape) {
                    return  `
                        <div style="display: inline-block;">
                            <div><img style="background-color: #DCDCDC" width="90" src="${data.img}"></div>
                        </div>
                    `;
                },
                item: function(data, escape) {
                    return  '<img style="margin-right: 16px; background-color: #DCDCDC" width="30" src="' + escape(data.img) + '">' + '<span class="title">' + escape(data.title) + '</span>';
                }
            }
        });

        //Select font
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
                        '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                }
            }
        });

        //Title
        $('#title').keyup(function() {
            var val = $('#title').val();
            $('#title-text').html(val);
        });

        //Avatar
        document.getElementById('avatar').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('avatar-user').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        //icon
        function fun1() {
            var icon = document.getElementById('select-beast-empty').value;
            document.getElementById('avatar-user').setAttribute('src', icon);
        }

        //font
        function font() {
            var font = document.getElementById('select-beast-empty-font').value;
            document.getElementById('title-text').style.fontFamily = font;
        }

        //font-size
        function fontSize() {
            var fontSize = document.getElementById('font-size').value;
            document.getElementById('title-text').style.fontSize = fontSize + 'rem';
        }

        //text-color
        function textColor() {
            var textColor = document.getElementById('name_color').value;
            document.getElementById('title-text').style.color = textColor;
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
        document.getElementById('background').style.backgroundColor = '#8e939c';
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

        //animation
        function animationLink() {
            var animation = document.getElementById('animation').value;
            document.getElementById('block').className = animation;
        }

        //animation speed
        function animationSpeed() {
            var animationSpeed = document.getElementById('animation_speed').value;
            document.getElementById('block').style.animationDuration = animationSpeed + 's';
        }

        //bg color
        $( document ).ready(function() {
            $("#switch-bg").click(function() {
                var type = $(this).is(':checked');
                if(type) {
                    $("#matureBlock").removeClass('bg-white').addClass('bg-black');
                } else {
                    $("#matureBlock").removeClass('bg-black').addClass('bg-white');
                }
            })
        });

    </script>

</x-app-layout>




