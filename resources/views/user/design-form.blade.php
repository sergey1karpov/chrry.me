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
                    <!-- drawer init and toggle -->
{{--                    <div class="text-center">--}}
{{--                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">--}}
{{--                            Как выглядит страница--}}
{{--                        </button>--}}
{{--                    </div>--}}
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

    <div class="w-full mx-auto max-w-screen-xl lg:px-8 sm:px-8 z-50" style="position: sticky; top: 0;">
        <div  class="rounded-b-lg mx-auto max-w-screen-xl ">
            <div class="group block">
                <div class="w-full mx-auto max-w-screen-xl z-50" style="position: sticky; top: 0;">
                    <div  class="rounded-b-lg mt-1 mx-auto max-w-screen-xl ">
                        <div class="text-center">
                            <button class="w-full block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">
                                Как выглядит страница
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    @include('user.demo', ['user' => $user])

    <section class="flex justify-center ">
        <div class="sm:mt-3 w-full ">

            <!-- UPD Avatar -->
            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->avatar)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-full mb-3" src="{{ '/'. $user->settings->avatar }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('uploadImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <div class="mb-6 text-center">
                        @if(!$user->settings->avatar)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_ava') }}</label>
                        @endif
                        <input type="hidden" name="image_type" value="avatar">
                        <input type="hidden" name="image_size" value="500">
                        <input name="avatar" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">{{ __('main.user_ava_descr') }}</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.user_ava_btn') }}
                        </button>
                    </div>
                </form>
                @if($user->settings->avatar)
                    <div class="mt-3">
                        <form action="{{ route('deleteImage', ['user' => $user->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" name="image_type" value="avatar">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                {{ __('main.link_delete') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <!-- UPD Avatar end -->

            <!-- UPD Logotype -->
            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->logotype)
                    <div class="flex justify-center">
                        <img src="{{'/'.$user->settings->logotype}}" class="pl-2 pr-2 mt-5 mb-8" width="{{$user->settings->logotype_size}}" style="filter: drop-shadow({{$user->settings->logotype_shadow_right}}px {{$user->settings->logotype_shadow_bottom}}px {{$user->settings->logotype_shadow_round}}px {{$user->settings->logotype_shadow_color}}); @if($user->settings->logotype_shadow_right) margin-right:{{$user->settings->logotype_shadow_right}}px; @endif">
                    </div>
                @endif
                <form action="{{ route('updateLogotype', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-6 text-center">
                        @if(!$user->settings->logotype)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="logotype">{{ __('main.user_logo') }}</label>
                        @endif
                        <input name="logotype" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="logotype-upload" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">{{ __('main.user_logo_descr') }}</p>
                    </div>
                        <div id="logo_properties" style="display: none;">
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_size') }}</label>
                                <span id="logo-size-value" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="logoSize()" id="logo-size" type="range" name="logotype_size" min="200" max="350" value="{{$user->settings->logotype_size}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_shadow_color') }}</label>
                                <input onchange="logoColorShadow()" value="{{$user->settings->logotype_shadow_color}}" type="color" name="logotype_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_right') }}</label>
                                <span id="logotype_shadow_color_right_value" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="logoColorShadow()" id="logotype_shadow_color_right" type="range" name="logotype_shadow_right" min="-40" max="40" value="{{$user->settings->logotype_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_bottom') }}</label>
                                <span id="logotype_shadow_color_bottom_value" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="logoColorShadow()" id="logotype_shadow_color_bottom" type="range" name="logotype_shadow_bottom" min="-40" max="40" value="{{$user->settings->logotype_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_blur') }}</label>
                                <span id="logotype_shadow_color_blur_value" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="logoColorShadow()" id="logotype_shadow_color_blur" type="range" name="logotype_shadow_round" min="0" max="40" value="{{$user->settings->logotype_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                        </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.user_logo_btn') }}
                        </button>
                    </div>
                </form>
                @if($user->settings->logotype)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'logotype']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-logotype" type="hidden" name="type" value="logotype">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                {{ __('main.link_delete') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <!-- UPD Logotype end -->

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('updateAvatarVsLogotype', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-6 text-center">
                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_ava_vs_logo') }}</label>
                        <div class="flex justify-evenly items-end mt-2">
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->settings->avatar)
                                        <img class="w-32 rounded-full mb-6" src="{{ '/'. $user->settings->avatar }}" alt="image description">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_no_ava') }}</label>
                                    @endif
                                </figure>
                                <input onchange="typeImg('avatar')" @if($user->settings->avatar_vs_logotype == 'avatar') checked @endif id="imgType" type="radio" value="avatar" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('main.user_avatar') }}</label>
                            </div>
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->settings->logotype)
                                        <img id="logo" class="w-32 mb-6 h-auto max-w-full" src="{{ '/'. $user->settings->logotype }}" width="{{$user->settings->logotype_size}}" alt="image description">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_no_logo') }}</label>
                                    @endif
                                </figure>
                                <input onchange="typeImg('logotype')" @if($user->settings->avatar_vs_logotype == 'logotype') checked @endif id="imgType" type="radio" value="logotype" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('main.user_logotype') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.user_ava_vs_logo_btn') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- UPD Background image -->
            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->banner)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-lg mb-6" src="{{ '/'. $user->settings->banner }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('uploadImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <div class="mb-6 text-center">
                        @if(!$user->settings->banner)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_bg') }}</label>
                        @endif
                        <input type="hidden" name="image_type" value="banner">
                        <input type="hidden" name="image_size" value="2000">
                        <input name="banner" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="banner" id="banner" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif">{{ __('main.user_bg_descr') }}</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.user_bg_btn') }}
                        </button>
                    </div>
                </form>
                @if($user->settings->banner)
                    <div class="mt-3">
                        <form action="{{ route('deleteImage', ['user' => $user->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" name="image_type" value="banner">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                {{ __('main.link_delete') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <!-- UPD Background image end -->

            <!-- UPD Favicon -->
            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->favicon)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-lg mb-6" src="{{ '/'. $user->settings->favicon }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('uploadImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <div class="mb-6 text-center">
                        @if(!$user->settings->favicon)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_fav') }}</label>
                        @endif
                        <input type="hidden" name="image_type" value="favicon">
                        <input type="hidden" name="image_size" value="40">
                        <input name="favicon" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="favicon" id="favicon" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="favicon">PNG, JPG (Макс. размер 10мб)</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            {{ __('main.user_fav_btn') }}
                        </button>
                    </div>
                </form>
                @if($user->settings->favicon)
                    <div class="mt-3">
                        <form action="{{ route('deleteImage', ['user' => $user->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" name="image_type" value="favicon">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                {{ __('main.link_delete') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <!-- UPD Favicon end -->

            <!-- UPD Verify icon -->
            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('uploadImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <div class="mb-6 text-center">
                        <div class="flex justify-center">
                            @if($user->settings->verify_icon)
                                <img class="w-40 rounded mb-6" src="{{ '/'. $user->settings->verify_icon }}" alt="image description">
                            @endif
                        </div>
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Лого значка верификации</label>
                        <input type="hidden" name="image_type" value="verify_icon">
                        <input type="hidden" name="image_size" value="50">
                        <input name="verify_icon" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="banner" id="verify-icon" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif">PNG, JPG, GIF (Макс. размер 10мб)</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Загрузить значек
                        </button>
                    </div>
                </form>
                @if($user->settings->verify_icon)
                    <div class="mt-3">
                        <form action="{{ route('deleteImage', ['user' => $user->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" name="image_type" value="verify_icon">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Удалить значек
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <!-- UPD Verify icon end -->

            <!-- Form -->
            <form action="{{ route('updateDesignSettings', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-6 text-center">
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_font') }}</label>
                            <select onchange="fontName()" id="select-font-name" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="name_font">
                                <option value="{{$user->settings->name_font}}" selected>{{$user->settings->name_font}}</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_color') }}</label>
                            <input onchange="nameColor()" value="{{$user->settings->name_color}}" type="color" name="name_color" id="name_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_font_size') }}</label>
                            <select onchange="nameSize()" name="name_font_size" id="name-size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->name_font_size == 0.8) selected @endif value="0.8">1</option>
                                <option @if($user->settings->name_font_size == 0.9) selected @endif value="0.9">2</option>
                                <option @if($user->settings->name_font_size == 1) selected @endif value="1">3</option>
                                <option @if($user->settings->name_font_size == 1.1) selected @endif value="1.1">4</option>
                                <option @if($user->settings->name_font_size == 1.2) selected @endif value="1.2">5</option>
                                <option @if($user->settings->name_font_size == 1.3) selected @endif value="1.3">6</option>
                                <option @if($user->settings->name_font_size == 1.4) selected @endif value="1.4">7</option>
                                <option @if($user->settings->name_font_size == 1.5) selected @endif value="1.5">8</option>
                                <option @if($user->settings->name_font_size == 1.6) selected @endif value="1.6">9</option>
                                <option @if($user->settings->name_font_size == 1.7) selected @endif value="1.7">10</option>
                            </select>
                        </div>

                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Толщина шрифта</label>
                            <select onchange="nameBold()" name="name_bold" id="name-bold" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->name_bold == false) selected @endif value="{{false}}">Стандартный размер</option>
                                <option @if($user->settings->name_bold == true) selected @endif value="{{true}}">Толстенький шрифт</option>
                            </select>
                        </div>

                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_color') }}</label>
                            <input onchange="nameShadow()" value="{{$user->settings->name_font_shadow_color}}" type="color" name="name_font_shadow_color" id="name-shadow" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_right') }}</label>
                            <span id="name-size-value-r" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="nameShadow()" id="name-shadow-right" type="range" name="name_font_shadow_right" value="{{$user->settings->name_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_bottom') }}</label>
                            <span id="name-size-value-b" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="nameShadow()" id="name-shadow-bottom" type="range" name="name_font_shadow_bottom" value="{{$user->settings->name_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_blur') }}</label>
                            <span id="name-size-value-bl" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="nameShadow()" id="name-shadow-blur" type="range" name="name_font_shadow_blur" value="{{$user->settings->name_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                    </div>
                </div>
                @if($user->description)
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-6 text-center">
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_font') }}</label>
                            <select onchange="fontDescr()" id="select-font-description" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="description_font">
                                <option value="{{$user->settings->description_font}}" selected>{{$user->settings->description_font}}</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_color') }}</label>
                            <input onchange="descrColor()" value="{{$user->settings->description_color}}" type="color" name="description_color" id="description_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_font_size') }}</label>
                            <select onchange="descrSize()" name="description_font_size" id="descr-size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->description_font_size == 0.8) selected @endif value="0.8">1</option>
                                <option @if($user->settings->description_font_size == 0.9) selected @endif value="0.9">2</option>
                                <option @if($user->settings->description_font_size == 1) selected @endif value="1">3</option>
                                <option @if($user->settings->description_font_size == 1.1) selected @endif value="1.1">4</option>
                                <option @if($user->settings->description_font_size == 1.2) selected @endif value="1.2">5</option>
                                <option @if($user->settings->description_font_size == 1.3) selected @endif value="1.3">6</option>
                                <option @if($user->settings->description_font_size == 1.4) selected @endif value="1.4">7</option>
                                <option @if($user->settings->description_font_size == 1.5) selected @endif value="1.5">8</option>
                                <option @if($user->settings->description_font_size == 1.6) selected @endif value="1.6">9</option>
                                <option @if($user->settings->description_font_size == 1.7) selected @endif value="1.7">10</option>
                            </select>
                        </div>

                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Толщина шрифта</label>
                            <select onchange="descrBold()" name="description_bold" id="descr-bold" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->description_bold == false) selected @endif value="{{false}}">Стандартный размер</option>
                                <option @if($user->settings->description_bold == true) selected @endif value="{{true}}">Толстенький шрифт</option>
                            </select>
                        </div>

                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_color') }}</label>
                            <input onchange="descrShadow()" value="{{$user->settings->description_font_shadow_color}}" type="color" name="description_font_shadow_color" id="descr-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_right') }}</label>
                            <span id="descr-size-value-r" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="descrShadow()" id="descr-shadow-right" type="range" name="description_font_shadow_right" value="{{$user->settings->description_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_bottom') }}</label>
                            <span id="descr-size-value-b" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="descrShadow()" id="descr-shadow-bottom" type="range" name="description_font_shadow_bottom" value="{{$user->settings->description_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_blur') }}</label>
                            <span id="descr-size-value-bt" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="descrShadow()" id="descr-shadow-blur" type="range" name="description_font_shadow_blur" value="{{$user->settings->description_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                    </div>
                </div>
                @endif
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-6 text-center">
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bg_color') }}</label>
                            <input onchange="backgroundColor()" value="{{$user->settings->background_color}}" type="color" name="background_color" id="bg-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_verify_color') }}</label>
                            <input onchange="verifyColor()" value="{{$user->settings->verify_color}}" type="color" name="verify_color" id="verify-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_nav_color') }}</label>
                            <input value="{{$user->settings->navigation_color}}" type="color" name="navigation_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                    </div>
                </div>
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-6 text-center">
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_show_social') }}</label>
                            <select onchange="linkBar()" name="social_links_bar" id="social_links_bar" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->social_links_bar == '1') selected @endif value="{{1}}">{{ __('main.user_two_factor_on') }}</option>
                                <option @if($user->settings->social_links_bar == '0') selected @endif value="{{0}}">{{ __('main.user_two_factor_off') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6 text-center" id="bar" style="display: none">
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_position') }}</label>
                            <select onchange="linkBar()" name="links_bar_position" id="links_bar_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->links_bar_position == 'top') selected @endif value="top">{{ __('main.user_bar_top') }}</option>
                                <option @if($user->settings->links_bar_position == 'bottom') selected @endif value="bottom">{{ __('main.user_bar_bottom') }}</option>
                            </select>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_size') }}</label>
                            <span id="icon-size-def" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="iconSize()" id="round-links-width" type="range" name="round_links_width" min="30" max="80" value="{{$user->settings->round_links_width}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_color') }}</label>
                            <input onchange="barShadow()" value="{{$user->settings->round_links_shadow_color}}" type="color" name="round_links_shadow_color" id="bar-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_right') }}</label>
                            <span id="icon-size-right" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="barShadow()" id="bar-shadow-right" type="range" name="round_links_shadow_right" min="-40" max="40" value="{{$user->settings->round_links_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_bottom') }}</label>
                            <span id="icon-size-bottom" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="barShadow()" id="bar-shadow-bottom" type="range" name="round_links_shadow_bottom" min="-40" max="40" value="{{$user->settings->round_links_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_blur') }}</label>
                            <span id="icon-size-blur" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                            <input onchange="barShadow()" id="bar-shadow-blur" type="range" name="round_links_shadow_round" min="0" max="40" value="{{$user->settings->round_links_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                    </div>
                </div>
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-6 text-center">
                        <div class="mb-6 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_show_logo') }}</label>
                            <select onchange="showChrry()" name="show_logo" id="show-logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->show_logo == '1') selected @endif value="{{1}}">{{ __('main.user_show_logo_on') }}</option>
                                <option @if($user->settings->show_logo == '0') selected @endif value="{{0}}">{{ __('main.user_show_logo_off') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                @if($user->type == 'Events')
                    <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="mb-6 text-center">
                            <div class="mb-6 text-center">
                                <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Сбор подписчиков для мероприятий</label>
                                <select onchange="eventFollowers()" name="event_followers" id="event_followers" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                    <option @if($user->settings->event_followers == '1') selected @endif value="{{1}}">Сбор подписчиков включен</option>
                                    <option @if($user->settings->event_followers == '0' || $user->settings->event_followers == null) selected @endif value="{{0}}">Сбор подписчиков выключен</option>
                                </select>
                            </div>
                        </div>
                        <div id="follower-settings">
                            <div class="mb-6 text-center">
                                <div class="mb-6 text-center">
                                    <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Округлить углы кнопки</label>
                                    <select onchange="drawerRadius()" name="follow_block_border_radius" id="drawer-radius" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        <option @if($user->settings->follow_block_border_radius == 'null-rounded') selected @endif value="null-rounded">Округление отключено</option>
                                        <option @if($user->settings->follow_block_border_radius == 'rounded') selected @endif value="rounded">1</option>
                                        <option @if($user->settings->follow_block_border_radius == 'rounded-md') selected @endif value="rounded-md">2</option>
                                        <option @if($user->settings->follow_block_border_radius == 'rounded-lg') selected @endif value="rounded-lg">3</option>
                                        <option @if($user->settings->follow_block_border_radius == 'rounded-full') selected @endif value="rounded-full">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет кнопки</label>
                                <input onchange="drawerBtnColor()" value="{{$user->settings->follow_block_bg_color}}" type="color" name="follow_block_bg_color" id="drawer-btn-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет тени кнопки</label>
                                <input onchange="shadowDrawerBtn()" value="{{$user->settings->follow_btn_top_shadow_color}}" type="color" name="follow_btn_top_shadow_color" id="drawer-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в право\лево</label>
                                <span id="drawer-shadow-right-def" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="shadowDrawerBtn()" id="drawer-shadow-right" type="range" name="follow_btn_top_shadow_right" value="{{$user->settings->follow_btn_top_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в верх\низ</label>
                                <span id="drawer-shadow-top-def" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="shadowDrawerBtn()" id="drawer-shadow-top" type="range" name="follow_btn_top_shadow_top" value="{{$user->settings->follow_btn_top_shadow_top}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Размытие тени</label>
                                <span id="drawer-shadow-blur-def" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="shadowDrawerBtn()" id="drawer-shadow-blur" type="range" name="follow_btn_top_shadow_blur" value="{{$user->settings->follow_btn_top_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Толщина обводки</label>
                                <select onchange="eventFollowBtnWidth()" name="follow_border" id="border-both-event" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                    <option @if($user->settings->follow_border == 'border-0') selected @endif value="border-0">0</option>
                                    <option @if($user->settings->follow_border == 'border') selected @endif value="border">1</option>
                                    <option @if($user->settings->follow_border == 'border-2') selected @endif value="border-2">2</option>
                                    <option @if($user->settings->follow_border == 'border-4') selected @endif value="border-4">4</option>
                                    <option @if($user->settings->follow_border == 'border-8') selected @endif value="border-8">8</option>
                                </select>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет обводки</label>
                                <input onchange="eventbtnBorderColor()" value="{{$user->settings->follow_border_color}}" type="color" name="follow_border_color" id="border-color-drawer" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_animation') }}</label>
                                <select onchange="followAnimation()" name="follow_border_animation" id="follow-animation" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                    <option @if($user->settings->follow_border_animation == 'None') selected @endif>None</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__bounce animate__infinite infinite') selected @endif value="animate__animated animate__bounce animate__infinite infinite" style="border: 0">Bounce</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__flash animate__infinite infinite') selected @endif value="animate__animated animate__flash animate__infinite infinite" style="border: 0">Flash</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__swing animate__infinite infinite') selected @endif value="animate__animated animate__swing animate__infinite infinite" style="border: 0">Swing</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__tada animate__infinite infinite') selected @endif value="animate__animated animate__tada animate__infinite infinite" style="border: 0">TaDa!</option>
                                    <option @if($user->settings->follow_border_animation == 'animate__animated animate__heartBeat animate__infinite infinite') selected @endif value="animate__animated animate__heartBeat animate__infinite infinite" style="border: 0">HeartBeat</option>
                                </select>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.link_animation_speed') }}</label>
                                <select onchange="animationSpeed()" name="follow_border_animation_speed" id="follow_border_animation_speed" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                    <option @if($user->settings->follow_border_animation_speed == 'None') selected @endif >None</option>
                                    <option @if($user->settings->follow_border_animation_speed == '1') selected @endif value="1" style="border: 0">1 sec.</option>
                                    <option @if($user->settings->follow_border_animation_speed == '2') selected @endif value="2" style="border: 0">2 sec.</option>
                                    <option @if($user->settings->follow_border_animation_speed == '3') selected @endif value="3" style="border: 0">3 sec.</option>
                                    <option @if($user->settings->follow_border_animation_speed == '4') selected @endif value="4" style="border: 0">4 sec.</option>
                                    <option @if($user->settings->follow_border_animation_speed == '5') selected @endif value="5" style="border: 0">5 sec.</option>
                                </select>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Текст кнопки</label>
                                <input value="{{$user->settings->follow_block_text}}" type="text" name="follow_block_text" id="drawer-btn-text" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            </div>
                            <div class="mb-6 text-center">
                                <div class="mb-6 text-center">
                                    <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Размер текста</label>
                                    <select onchange="drawerTextSize()" name="follow_block_text_size" id="drawer-text-size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        <option @if($user->settings->follow_block_text_size == 'text-xs') selected @endif value="text-xs">xs</option>
                                        <option @if($user->settings->follow_block_text_size == 'text-sm') selected @endif value="text-sm">sm</option>
                                        <option @if($user->settings->follow_block_text_size == 'text-base') selected @endif value="text-base">base</option>
                                        <option @if($user->settings->follow_block_text_size == 'text-lg') selected @endif value="text-lg">lg</option>
                                        <option @if($user->settings->follow_block_text_size == 'text-xl') selected @endif value="text-xl">xl</option>
                                        <option @if($user->settings->follow_block_text_size == 'text-2xl') selected @endif value="text-2xl">2xl</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Выберите шрифт</label>
                                <select onchange="fontDrawer()" id="follow-block-font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="follow_block_font">
                                    <option value="{{$user->settings->follow_block_font}}" selected>{{$user->settings->follow_block_font}}</option>
                                </select>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет текста</label>
                                <input onchange="drawerTextColor()" value="{{$user->settings->follow_block_font_color}}" type="color" name="follow_block_font_color" id="drawer-text-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет тени текста</label>
                                <input onchange="drawerTextBtnShadow()" value="{{$user->settings->follow_block_font_shadow_color}}" type="color" name="follow_block_font_shadow_color" id="drawer-text-btn-shadow-color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в лево\право</label>
                                <span id="drawer-text-btn-r" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="drawerTextBtnShadow()" id="drawer-text-btn-shadow-right" type="range" name="follow_block_font_shadow_right" value="{{$user->settings->follow_block_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в верх\вниз</label>
                                <span id="drawer-text-btn-b" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="drawerTextBtnShadow()" id="drawer-text-btn-shadow-bottom" type="range" name="follow_block_font_shadow_bottom" value="{{$user->settings->follow_block_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                            </div>
                            <div class="mb-6 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Размытие</label>
                                <span id="drawer-text-btn-bl" class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"></span>
                                <input onchange="drawerTextBtnShadow()" id="drawer-text-btn-shadow-blur" type="range" name="follow_block_font_shadow_blur" value="{{$user->settings->follow_block_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                            </div>
                            <div class="mb-6 text-center">
                                <div class="mb-6 text-center">
                                    <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Вкл\Выкл благодарность за подписку</label>
                                    <select onchange="congDefOff()" name="congratulation_on_off" id="show_logo_gif" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        <option @if($user->settings->congratulation_on_off == 0) selected @endif value="{{false}}">Выключено</option>
                                        <option @if($user->settings->congratulation_on_off == 1) selected @endif value="{{true}}">Включено</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 text-center">
                                <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Текст благодарности после подписки</label>
                                <textarea maxlength="150" style="border: none" id="cong-message" name="congratulation_text" rows="2" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">{{$user->settings->congratulation_text}}</textarea>
                            </div>
                            <div class="mb-6 text-center">
                                <div class="flex justify-center">
                                    @if($user->settings->congratulation_gif)
                                        <img class="w-40 rounded mb-6" src="{{ '/'. $user->settings->congratulation_gif }}" alt="image description">
                                    @endif
                                </div>
                                <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Gif после подписки</label>
                                <input name="congratulation_gif" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="congratulation_gif" id="congratulation_gif" type="file">
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mt-7 mx-auto max-w-screen-xl py-4  ">
                    <div class="mb-6 text-center">
                        <div class="mb-6 text-center ml-2 mr-2">
                            <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                {{ __('main.user_upd_btn_profile') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <section>

    @include('scripts.design-form', ['user' => $user])

</x-app-layout>
