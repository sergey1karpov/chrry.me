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
                    <div class="text-center">
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">
                            Toggle modal
                        </button>
                    </div>
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

{{--    @if($user->settings->banner)--}}
{{--        style="background: url({{ $user->settings->banner }}) no-repeat center center fixed; background-size: cover;"--}}
{{--    @elseif($user->settings->banner == null & $user->settings->background_color != null)--}}
{{--        style="background-color: {{$user->settings->background_color}};"--}}
{{--    @endif--}}

    <section class="flex justify-center ">
        <div class="sm:mt-3 w-full px-4">

            <div id="popup-modal" aria-hidden="true" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full">
                <div class="relative w-full max-w-md h-full md:h-auto">
                    <div id="banner-block" class="relative w-full h-full shadow"
{{--                         style="background: url({{ '../'.$user->settings->banner }}) no-repeat center center fixed; background-size: cover;"--}}
                        style=""
                    >
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                            <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>

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
                    <div class="mb-3 text-center">
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
                    <div class="mb-3 text-center">
                        @if(!$user->settings->logotype)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="logotype">{{ __('main.user_logo') }}</label>
                        @endif
                        <input name="logotype" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="logotype-upload" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">{{ __('main.user_logo_descr') }}</p>
                    </div>

                        <div id="logo_properties" style="display: none;">
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_size') }}</label>
                                <input id="steps-range" type="range" name="logotype_size" min="200" max="350" value="{{$user->settings->logotype_size}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_shadow_color') }}</label>
                                <input value="{{$user->settings->logotype_shadow_color}}" type="color" name="logotype_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_right') }}</label>
                                <input id="steps-range" type="range" name="logotype_shadow_right" min="-40" max="40" value="{{$user->settings->logotype_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_bottom') }}</label>
                                <input id="steps-range" type="range" name="logotype_shadow_bottom" min="-40" max="40" value="{{$user->settings->logotype_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_logo_blur') }}</label>
                                <input id="steps-range" type="range" name="logotype_shadow_round" min="0" max="40" value="{{$user->settings->logotype_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
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
                    <div class="mb-3 text-center">
                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_ava_vs_logo') }}</label>
                        <div class="flex justify-evenly items-end mt-2">
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->settings->avatar)
                                        <img class="w-32 rounded-full mb-3" src="{{ '/'. $user->settings->avatar }}" alt="image description">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_no_ava') }}</label>
                                    @endif
                                </figure>
                                <input @if($user->settings->avatar_vs_logotype == 'Avatar') checked @endif id="inline-radio" type="radio" value="Avatar" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('main.user_avatar') }}</label>
                            </div>
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->settings->logotype)
                                        <img id="logo" class="w-32 mb-3 h-auto max-w-full" src="{{ '/'. $user->settings->logotype }}" width="{{$user->settings->logotype_size}}" alt="image description">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">{{ __('main.user_no_logo') }}</label>
                                    @endif
                                </figure>
                                <input @if($user->settings->avatar_vs_logotype == 'Logotype') checked @endif id="inline-2-radio" type="radio" value="Logotype" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $user->settings->banner }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('uploadImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <div class="mb-3 text-center">
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
                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $user->settings->favicon }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('uploadImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <div class="mb-3 text-center">
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
                    <div class="mb-3 text-center">
                        <div class="flex justify-center">
                            @if($user->settings->verify_icon)
                                <img class="w-40 rounded mb-3" src="{{ '/'. $user->settings->verify_icon }}" alt="image description">
                            @endif
                        </div>
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Лого значка верификации</label>
                        <input type="hidden" name="image_type" value="verify_icon">
                        <input type="hidden" name="image_size" value="50">
                        <input name="verify_icon" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="banner" id="banner" type="file">
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

            <form action="{{ route('updateDesignSettings', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_font') }}</label>
                            <select id="select-font-name" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="name_font">
                                <option value="{{$user->settings->name_font}}" selected>{{$user->settings->name_font}}</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_color') }}</label>
                            <input value="{{$user->settings->name_color}}" type="color" name="name_color" id="name_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_font_size') }}</label>
                            <select name="name_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
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

                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Толщина шрифта</label>
                            <select name="name_bold" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->name_bold == false) selected @endif value="{{false}}">Стандартный размер</option>
                                <option @if($user->settings->name_bold == true) selected @endif value="{{true}}">Толстенький шрифт</option>
                            </select>
                        </div>

                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_color') }}</label>
                            <input value="{{$user->settings->name_font_shadow_color}}" type="color" name="name_font_shadow_color" id="" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_right') }}</label>
                            <input id="steps-range" type="range" name="name_font_shadow_right" value="{{$user->settings->name_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_bottom') }}</label>
                            <input id="steps-range" type="range" name="name_font_shadow_bottom" value="{{$user->settings->name_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name_shadow_blur') }}</label>
                            <input id="steps-range" type="range" name="name_font_shadow_blur" value="{{$user->settings->name_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                    </div>
                </div>
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_font') }}</label>
                            <select id="select-font-description" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="description_font">
                                <option value="{{$user->settings->description_font}}" selected>{{$user->settings->description_font}}</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_color') }}</label>
                            <input value="{{$user->settings->description_color}}" type="color" name="description_color" id="name_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_font_size') }}</label>
                            <select name="description_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
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

                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Толщина шрифта</label>
                            <select name="description_bold" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->description_bold == false) selected @endif value="{{false}}">Стандартный размер</option>
                                <option @if($user->settings->description_bold == true) selected @endif value="{{true}}">Толстенький шрифт</option>
                            </select>
                        </div>

                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_color') }}</label>
                            <input value="{{$user->settings->description_font_shadow_color}}" type="color" name="description_font_shadow_color" id="" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_right') }}</label>
                            <input id="steps-range" type="range" name="description_font_shadow_right" value="{{$user->settings->description_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_bottom') }}</label>
                            <input id="steps-range" type="range" name="description_font_shadow_bottom" value="{{$user->settings->description_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr_shadow_blur') }}</label>
                            <input id="steps-range" type="range" name="description_font_shadow_blur" value="{{$user->settings->description_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                        </div>
                    </div>
                </div>
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bg_color') }}</label>
                            <input value="{{$user->settings->background_color}}" type="color" name="background_color" id="background_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_verify_color') }}</label>
                            <input value="{{$user->settings->verify_color}}" type="color" name="verify_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_nav_color') }}</label>
                            <input value="{{$user->settings->navigation_color}}" type="color" name="navigation_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                    </div>
                </div>
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_show_social') }}</label>
                            <select name="social_links_bar" id="social_links_bar" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->social_links_bar == '1') selected @endif value="{{1}}">{{ __('main.user_two_factor_on') }}</option>
                                <option @if($user->settings->social_links_bar == '0') selected @endif value="{{0}}">{{ __('main.user_two_factor_off') }}</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_position') }}</label>
                            <select name="links_bar_position" id="links_bar_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->links_bar_position == 'top') selected @endif value="top">{{ __('main.user_bar_top') }}</option>
                                <option @if($user->settings->links_bar_position == 'bottom') selected @endif value="bottom">{{ __('main.user_bar_bottom') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_size') }}</label>
                            <input id="steps-range" type="range" name="round_links_width" min="30" max="80" value="{{$user->settings->round_links_width}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_color') }}</label>
                            <input value="{{$user->settings->round_links_shadow_color}}" type="color" name="round_links_shadow_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_right') }}</label>
                            <input id="steps-range" type="range" name="round_links_shadow_right" min="-40" max="40" value="{{$user->settings->round_links_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_bottom') }}</label>
                            <input id="steps-range" type="range" name="round_links_shadow_bottom" min="-40" max="40" value="{{$user->settings->round_links_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_bar_icon_blur') }}</label>
                            <input id="steps-range" type="range" name="round_links_shadow_round" min="0" max="40" value="{{$user->settings->round_links_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                    </div>
                </div>
                <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_show_logo') }}</label>
                            <select name="show_logo" id="show_logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->settings->show_logo == '1') selected @endif value="{{1}}">{{ __('main.user_show_logo_on') }}</option>
                                <option @if($user->settings->show_logo == '0') selected @endif value="{{0}}">{{ __('main.user_show_logo_off') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                @if($user->type == 'Events')
                    <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="mb-3 text-center">
                            <div class="mb-3 text-center">
                                <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Сбор подписчиков для мероприятий</label>
                                <select onchange="eventFollowers()" name="event_followers" id="event_followers" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                    <option @if($user->settings->event_followers == '1') selected @endif value="{{1}}">Сбор подписчиков включен</option>
                                    <option @if($user->settings->event_followers == '0' || $user->settings->event_followers == null) selected @endif value="{{0}}">Сбор подписчиков выключен</option>
                                </select>
                            </div>
                        </div>

                            <div id="follower-settings">
                                <div class="mb-3 text-center">
                                    <div class="mb-3 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Округлить углы кнопки</label>
                                        <select name="follow_block_border_radius" id="show_logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option @if($user->settings->follow_block_border_radius == 'null') selected @endif value="{{null}}">Округление отключено</option>
                                            <option @if($user->settings->follow_block_border_radius == 'rounded-t') selected @endif value="rounded-t">1</option>
                                            <option @if($user->settings->follow_block_border_radius == 'rounded-t-md') selected @endif value="rounded-t-md">2</option>
                                            <option @if($user->settings->follow_block_border_radius == 'rounded-t-lg') selected @endif value="rounded-t-lg">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет кнопки</label>
                                    <input value="{{$user->settings->follow_block_bg_color}}" type="color" name="follow_block_bg_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет тени кнопки</label>
                                    <input value="{{$user->settings->follow_btn_top_shadow_color}}" type="color" name="follow_btn_top_shadow_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в верх</label>
                                    <input id="steps-range" type="range" name="follow_btn_top_shadow_top" value="{{$user->settings->follow_btn_top_shadow_top}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Размытие тени</label>
                                    <input id="steps-range" type="range" name="follow_btn_top_shadow_blur" value="{{$user->settings->follow_btn_top_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Текст кнопки</label>
                                    <input value="{{$user->settings->follow_block_text}}" type="text" name="follow_block_text" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                </div>
                                <div class="mb-3 text-center">
                                    <div class="mb-3 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Размер текста</label>
                                        <select name="follow_block_text_size" id="show_logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option @if($user->settings->follow_block_text_size == 'text-xs') selected @endif value="text-xs">xs</option>
                                            <option @if($user->settings->follow_block_text_size == 'text-sm') selected @endif value="text-sm">sm</option>
                                            <option @if($user->settings->follow_block_text_size == 'text-base') selected @endif value="text-base">base</option>
                                            <option @if($user->settings->follow_block_text_size == 'text-lg') selected @endif value="text-lg">lg</option>
                                            <option @if($user->settings->follow_block_text_size == 'text-xl') selected @endif value="text-xl">xl</option>
                                            <option @if($user->settings->follow_block_text_size == 'text-2xl') selected @endif value="text-2xl">2xl</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Выберите шрифт</label>
                                    <select id="follow-block-font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="follow_block_font">
                                        <option value="{{$user->settings->follow_block_font}}" selected>{{$user->settings->follow_block_font}}</option>
                                    </select>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет текста</label>
                                    <input value="{{$user->settings->follow_block_font_color}}" type="color" name="follow_block_font_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Цвет тени текста</label>
                                    <input value="{{$user->settings->follow_block_font_shadow_color}}" type="color" name="follow_block_font_shadow_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в лево\право</label>
                                    <input id="steps-range" type="range" name="follow_block_font_shadow_right" value="{{$user->settings->follow_block_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Смещение в верх\вниз</label>
                                    <input id="steps-range" type="range" name="follow_block_font_shadow_bottom" value="{{$user->settings->follow_block_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Размытие</label>
                                    <input id="steps-range" type="range" name="follow_block_font_shadow_blur" value="{{$user->settings->follow_block_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                                </div>
                                <div class="mb-3 text-center">
                                    <div class="mb-3 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Вкл\Выкл благодарность за подписку</label>
                                        <select name="congratulation_on_off" id="show_logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option @if($user->settings->congratulation_on_off == 0) selected @endif value="{{false}}">Выключено</option>
                                            <option @if($user->settings->congratulation_on_off == 1) selected @endif value="{{true}}">Включено</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Текст благодарности после подписки</label>
                                    <textarea maxlength="150" style="border: none" id="message" name="congratulation_text" rows="2" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">{{$user->settings->congratulation_text}}</textarea>
                                </div>
                                <div class="mb-3 text-center">
                                    <div class="flex justify-center">
                                        @if($user->settings->congratulation_gif)
                                            <img class="w-40 rounded mb-3" src="{{ '/'. $user->settings->congratulation_gif }}" alt="image description">
                                        @endif
                                    </div>
                                    <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Gif после подписки</label>
                                    <input name="congratulation_gif" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="congratulation_gif" id="congratulation_gif" type="file">
                                </div>
                            </div>

                    </div>
                @endif
                <div class="mt-7 mx-auto max-w-screen-xl py-4  ">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                {{ __('main.user_upd_btn_profile') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <section>

    <script>


        function eventFollowers() {
            var val = $("#event_followers").val();
            if(val == 1) {
                $("#follower-settings").show();
                console.log('on')
            } else {
                $("#follower-settings").hide();
                console.log('off')
            }
        }

        var val = $("#event_followers").val();
        if(val == 1) {
            $("#follower-settings").show();
        } else {
            $("#follower-settings").hide();
        }
    </script>

    <script>
        var vidFileLength = $("#logotype-upload")[0].files.length; //если загрузчик пуст
        if(vidFileLength === 0){
            $('#logo_properties').hide();
        }

        $( document ).ready(function(){ //Если не пуст
            $('#logotype-upload').on('change', function(){
                $('#logo_properties').show();
            });
        });

        @if($user->settings->logotype)
            $('#logo_properties').show();
        @endif
    </script>

    <script>
        new TomSelect('#select-font-name',{
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
    </script>

        @if($user->type == 'Events')
    <script>
        new TomSelect('#follow-block-font',{
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
    </script>
        @endif


    <script>
        new TomSelect('#select-font-description',{
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
    </script>

    <script>
        //banner
        document.getElementById('banner').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('banner-block').style.background = "url(" + e.target.result + ") no-repeat center center fixed";
                    document.getElementById('banner-block').style.backgroundSize = "cover";
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>

</x-app-layout>

{{--background: url({{ '../'.$user->settings->banner }}) no-repeat center center fixed; background-size: cover;--}}
{{--e.target.result--}}
