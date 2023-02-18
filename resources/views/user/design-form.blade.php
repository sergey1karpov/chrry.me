<x-app-layout :user="$user">

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

    <section class="flex justify-center m-5">
        <div class="sm:mt-3 w-full">

            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->avatar)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-full mb-3" src="{{ '/'. $user->settings->avatar }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateAvatar', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->settings->avatar)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Upload avatar</label>
                        @endif
                        <input name="avatar" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update avatar
                        </button>
                    </div>
                </form>
                @if($user->settings->avatar)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'avatar']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-avatar" type="hidden" name="type" value="avatar">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->logotype)
                    <div class="flex justify-center">
                        <figure class="max-w-lg m-5">
                            <img id="logo" class="rounded-lg mb-3" src="{{ '/'. $user->settings->logotype }}" width="{{$properties->du_logotype_size}}" alt="image description" style="
                                filter: drop-shadow({{$properties->du_logotype_shadow_right}}px {{$properties->du_logotype_shadow_bottom}}px {{$properties->du_logotype_shadow_round}}px {{$properties->du_logotype_shadow_color}});
                            ">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateLogotype', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->settings->logotype)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="logotype">Upload logotype</label>
                        @endif
                        <input name="logotype" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="logotype-upload" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">Only PNG (MAX Size. 10mb).</p>
                    </div>

                        <div id="logo_properties" style="display: none;">
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype size</label>
                                <input id="steps-range" type="range" name="du_logotype_size" min="200" max="350" value="{{$properties->du_logotype_size}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow right</label>
                                <input id="steps-range" type="range" name="du_logotype_shadow_right" min="0" max="40" value="{{$properties->du_logotype_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow bottom</label>
                                <input id="steps-range" type="range" name="du_logotype_shadow_bottom" min="0" max="40" value="{{$properties->du_logotype_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow blur</label>
                                <input id="steps-range" type="range" name="du_logotype_shadow_round" min="0" max="40" value="{{$properties->du_logotype_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow color</label>
                                <input value="{{$properties->du_logotype_shadow_color}}" type="color" name="du_logotype_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                        </div>

                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update logotype
                        </button>
                    </div>
                </form>
                @if($user->settings->logotype)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'logotype']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-logotype" type="hidden" name="type" value="logotype">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('updateAvatarVsLogotype', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Avatar or Logo on profile card</label>
                        <div class="flex justify-evenly items-end mt-2">
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->settings->avatar)
                                        <img class="w-32 rounded-full mb-3" src="{{ '/'. $user->settings->avatar }}" alt="image description">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">no avatar</label>
                                    @endif
                                </figure>
                                <input @if($user->avatar_vs_logotype == 'Avatar') checked @endif id="inline-radio" type="radio" value="Avatar" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Avatar</label>
                            </div>
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->settings->logotype)
                                        <img id="logo" class="w-32 rounded-lg mb-3" src="{{ '/'. $user->settings->logotype }}" width="{{$properties->du_logotype_size}}" alt="image description" style="filter: drop-shadow({{$properties->du_logotype_shadow_right}}px {{$properties->du_logotype_shadow_bottom}}px {{$properties->du_logotype_shadow_round}}px {{$properties->du_logotype_shadow_color}});">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">no logotype</label>
                                    @endif
                                </figure>
                                <input @if($user->avatar_vs_logotype == 'Logotype') checked @endif id="inline-2-radio" type="radio" value="Logotype" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Logotype</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Change
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->banner)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $user->settings->banner }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateBackgroundImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->settings->banner)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Upload background image</label>
                        @endif
                        <input name="banner" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="banner" id="banner" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="banner">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update background image
                        </button>
                    </div>
                </form>
                @if($user->settings->banner)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'banner']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-avatar" type="hidden" name="type" value="avatar">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->settings->favicon)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $user->settings->favicon }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateFavicon', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->settings->favicon)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Upload favicon</label>
                        @endif
                        <input name="favicon" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="favicon" id="favicon" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="favicon">PNG, JPG or GIF (MAX Size. 5mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update favicon
                        </button>
                    </div>
                </form>
                @if($user->settings->favicon)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'favicon']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-avatar" type="hidden" name="type" value="avatar">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('updateDesignSettings', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <input type="hidden" name="background_color" value="{{$user->background_color}}">
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background color</label>
                            <input value="{{$user->background_color}}" type="color" name="du_background_color" id="background_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Name color</label>
                            <input value="{{$user->name_color}}" type="color" name="du_name_color" id="name_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Description color</label>
                            <input value="{{$user->description_color}}" type="color" name="du_description_color" id="description_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Verify color</label>
                            <input value="{{$user->verify_color}}" type="color" name="du_verify_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Naviation color</label>
                            <input value="{{$user->navigation_color}}" type="color" name="du_navigation_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Show social</label>
                            <select name="du_social_links_bar" id="social_links_bar" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->social_links_bar == '1') selected @endif value="{{1}}">On</option>
                                <option @if($user->social_links_bar == '0') selected @endif value="{{0}}">Off</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Position</label>
                            <select name="du_links_bar_position" id="links_bar_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->links_bar_position == 'top') selected @endif value="top">Top</option>
                                <option @if($user->links_bar_position == 'bottom') selected @endif value="bottom">Bottom</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons size</label>
                            <input id="steps-range" type="range" name="du_round_links_width" min="30" max="80" value="{{$user->round_links_width}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow right</label>
                            <input id="steps-range" type="range" name="du_round_links_shadow_right" min="0" max="40" value="{{$user->round_links_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow bottom</label>
                            <input id="steps-range" type="range" name="du_round_links_shadow_bottom" min="0" max="40" value="{{$user->round_links_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow blur</label>
                            <input id="steps-range" type="range" name="du_round_links_shadow_round" min="0" max="40" value="{{$user->round_links_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow color</label>
                            <input value="{{$user->round_links_shadow_color}}" type="color" name="du_round_links_shadow_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Show logo CHRRY.ME</label>
                            <select name="du_show_logo" id="show_logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option @if($user->show_logo == '1') selected @endif value="{{1}}">Показать</option>
                                <option @if($user->show_logo == '0') selected @endif value="{{0}}">Отключить</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <section>

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

</x-app-layout>
