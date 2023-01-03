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
                        @if($user->avatar)
                            <img alt="Man" src="{{ '/'.$user->avatar }}" class="h-10 w-10 rounded-full object-cover"/>
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

    <section class="flex justify-center m-5">
        <div class="sm:mt-3 w-full">

            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->avatar)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-full mb-3" src="{{ '/'. $user->avatar }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateAvatar', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->avatar)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Upload avatar</label>
                        @endif
                        <input name="avatar" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update avatar
                        </button>
                    </div>
                </form>
                @if($user->avatar)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'avatar']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-avatar" type="hidden" name="type" value="avatar">
                            <button type="submit" class=" w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-red-600 bg-red-900 hover:text-red-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500 @else bg-gray-200 text-red-600 @endif">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->logotype)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img id="logo" class="rounded-lg mb-3" src="{{ '/'. $user->logotype }}" width="{{$user->logotype_size}}" alt="image description" style="
                                filter: drop-shadow({{$user->logotype_shadow_right}}px {{$user->logotype_shadow_bottom}}px {{$user->logotype_shadow_round}}px {{$user->logotype_shadow_color}});
                            ">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateLogotype', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->logotype)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="logotype">Upload logotype</label>
                        @endif
                        <input name="logotype" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="logotype-upload" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">Only PNG (MAX Size. 10mb).</p>
                    </div>

                        <div id="logo_properties" style="display: none;">
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype size</label>
                                <input id="steps-range" type="range" name="logotype_size" min="200" max="350" value="{{$user->logotype_size}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow right</label>
                                <input id="steps-range" type="range" name="logotype_shadow_right" min="0" max="40" value="{{$user->logotype_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow bottom</label>
                                <input id="steps-range" type="range" name="logotype_shadow_bottom" min="0" max="40" value="{{$user->logotype_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow blur</label>
                                <input id="steps-range" type="range" name="logotype_shadow_round" min="0" max="40" value="{{$user->logotype_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div>
                            <div class="mb-3 text-center">
                                <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Logotype shadow color</label>
                                <input value="{{$user->logotype_shadow_color}}" type="color" name="logotype_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                            </div>
                        </div>

                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update logotype
                        </button>
                    </div>
                </form>
                @if($user->logotype)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'logotype']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-logotype" type="hidden" name="type" value="logotype">
                            <button type="submit" class=" w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-red-600 bg-red-900 hover:text-red-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500 @else bg-gray-200 text-red-600 @endif">
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
                                    @if($user->avatar)
                                        <img class="w-32 rounded-full mb-3" src="{{ '/'. $user->avatar }}" alt="image description">
                                    @else
                                        <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">no avatar</label>
                                    @endif
                                </figure>
                                <input @if($user->avatar_vs_logotype == 'Avatar') checked @endif id="inline-radio" type="radio" value="Avatar" name="avatar_vs_logotype" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Avatar</label>
                            </div>
                            <div class="items-center mr-4">
                                <figure class="max-w-lg">
                                    @if($user->logotype)
                                        <img id="logo" class="w-32 rounded-lg mb-3" src="{{ '/'. $user->logotype }}" width="{{$user->logotype_size}}" alt="image description" style="filter: drop-shadow({{$user->logotype_shadow_right}}px {{$user->logotype_shadow_bottom}}px {{$user->logotype_shadow_round}}px {{$user->logotype_shadow_color}});">
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
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update background image
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->banner)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $user->banner }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateBackgroundImage', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->banner)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Upload background image</label>
                        @endif
                        <input name="banner" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="banner" id="banner" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="banner">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update background image
                        </button>
                    </div>
                </form>
                @if($user->banner)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'banner']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-avatar" type="hidden" name="type" value="avatar">
                            <button type="submit" class=" w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-red-600 bg-red-900 hover:text-red-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500 @else bg-gray-200 text-red-600 @endif">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($user->favicon)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $user->favicon }}" alt="image description">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateFavicon', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->favicon)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Upload favicon</label>
                        @endif
                        <input name="favicon" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="favicon" id="favicon" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="favicon">PNG, JPG or GIF (MAX Size. 5mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update favicon
                        </button>
                    </div>
                </form>
                @if($user->favicon)
                    <div class="mt-3">
                        <form action="{{ route('delUserAvatar', ['user' => $user->id, 'type' => 'favicon']) }}" method="POST"> @csrf @method('PATCH')
                            <input id="type-avatar" type="hidden" name="type" value="avatar">
                            <button type="submit" class=" w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-red-600 bg-red-900 hover:text-red-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500 @else bg-gray-200 text-red-600 @endif">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('updateColors', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background color</label>
                            <input value="{{$user->background_color}}" type="color" name="background_color" id="background_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Name color</label>
                            <input value="{{$user->name_color}}" type="color" name="name_color" id="name_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Description color</label>
                            <input value="{{$user->description_color}}" type="color" name="description_color" id="description_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Verify color</label>
                            <input value="{{$user->verify_color}}" type="color" name="verify_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Naviation color</label>
                            <input value="{{$user->navigation_color}}" type="color" name="navigation_color" id="verify_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('updateSocialBar', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <input type="hidden" name="background_color" value="{{$user->background_color}}">
                    <div class="mb-3 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Show social</label>
                        <select name="social_links_bar" id="social_links_bar" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($user->social_links_bar == '1') selected @endif value="{{1}}">On</option>
                            <option @if($user->social_links_bar == '0') selected @endif value="{{0}}">Off</option>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Position</label>
                        <select name="links_bar_position" id="links_bar_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($user->links_bar_position == 'top') selected @endif value="top">Top</option>
                            <option @if($user->links_bar_position == 'bottom') selected @endif value="bottom">Bottom</option>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons size</label>
                        <input id="steps-range" type="range" name="round_links_width" min="30" max="80" value="{{$user->round_links_width}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow right</label>
                        <input id="steps-range" type="range" name="round_links_shadow_right" min="0" max="40" value="{{$user->round_links_shadow_right}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow bottom</label>
                        <input id="steps-range" type="range" name="round_links_shadow_bottom" min="0" max="40" value="{{$user->round_links_shadow_bottom}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow blur</label>
                        <input id="steps-range" type="range" name="round_links_shadow_round" min="0" max="40" value="{{$user->round_links_shadow_round}}" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Icons shadow color</label>
                        <input value="{{$user->round_links_shadow_color}}" type="color" name="round_links_shadow_color" id="round_links_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-7 mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <form action="{{ route('updateChrryLogo', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Show logo CHRRY.ME</label>
                        <select name="show_logo" id="show_logo" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($user->show_logo == '1') selected @endif value="{{1}}">Показать</option>
                            <option @if($user->show_logo == '0') selected @endif value="{{0}}">Отключить</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 w-full inline-block rounded-lg px-12 py-2 text-sm font-medium @if($user->dayVsNight == 1) border border-indigo-600 bg-indigo-900 hover:text-indigo-600 focus:outline-none text-gray-300 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 @else bg-gray-200 text-indigo-600 @endif">
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

        @if($user->logotype)
            $('#logo_properties').show();
        @endif
    </script>

</x-app-layout>
