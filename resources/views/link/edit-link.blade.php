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

    <section class="flex justify-center ">
        <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">
            <div id="design" class="px-4 py-4 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl @if($user->dayVsNight == 1) text-white @else text-black @endif">Now your <span class="text-indigo-600 dark:text-indigo-500">link</span> looks like this</h1>
                <div class="{{$link->animation}} {{$properties->dl_border}} row card ms-1 me-1" style="
                    animation-duration: {{$link->animation_speed}}s;
                    border-color: {{$properties->dl_border_color}};
                    background-color:rgba({{$properties->dl_background_color}}, {{$properties->dl_transparency}});
                    margin-top: 12px;
                    border-radius: {{$properties->dl_rounded}}px;
                    background-position: center;
                    box-shadow: {{$properties->dl_link_block_shadow_right}}px {{$properties->dl_link_block_shadow_bottom}}px {{$properties->dl_link_block_shadow_blur}}px {{$properties->dl_link_block_shadow_color}};
                    @if($properties->dl_link_block_shadow_right) margin-right: {{$properties->dl_link_block_shadow_right}}px; @endif
                    @if($properties->dl_text_shadow_bottom) margin-bottom: {{$properties->dl_text_shadow_bottom}}px; @endif
                ">
                    <div class="flex align-center justify-between " style="padding-left: 4px; padding-right: 4px">
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
                                <h4 class="text-ellipsis" style="
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
            </div>
        </div>
    </section>

    <section class="flex justify-center mt-8">
        <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">
            <div id="design" class="px-4 py-4 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($link->photo)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="mt-1 mb-1" src="{{'../../'.$link->photo}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updatePhoto', ['user' => $user->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-3 text-center">
                        @if(!$user->photo)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Update photo</label>
                        @endif
                        <input name="photo" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="favicon" id="favicon" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="favicon">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update photo
                        </button>
                    </div>
                </form>
                @if($link->photo)
                    <div class="mt-3">
                        <form action="{{ route('delPhoto', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" id="photoId{{$link->id}}" value="{{$link->id}}">
                            <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">
                            <input type="hidden" id="isPhoto{{$link->id}}" value="{{$link->photo}}">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="flex justify-center mt-8">
        <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">
            <div id="design" class="px-4 py-4 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                @if($link->icon)
                    <div class="flex justify-center">
                        <figure class="max-w-lg">
                            <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$link->rounded}}px;">
                        </figure>
                    </div>
                @endif
                <form action="{{ route('updateIcon', ['user' => $user->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <div class="mb-6 text-center">
                        @if(!$user->icon)
                            <label class="mt-1 text-sm font-medium leading-relaxed text-indigo-600" for="avatar">Update icon</label>
                        @endif
                        <select id="select-beast-empty" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off" name="icon"></select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update icon
                        </button>
                    </div>
                </form>
                @if($link->icon)
                    <div class="mt-3">
                        <form action="{{ route('delLinkIcon', ['user' => Auth::user()->id, 'link' => $link->id]) }}" method="POST"> @csrf @method('PATCH')
                            <input type="hidden" id="linkId{{$link->id}}" value="{{$link->id}}">
                            <input type="hidden" id="userId{{$link->id}}" value="{{$user->id}}">
                            <input type="hidden" id="isIcon{{$link->id}}" value="{{$link->icon}}">
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <form action="{{ route('editLink', ['user' => $user->id, 'link' => $link->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
        <section class="flex justify-center mt-8">
            <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">
                <div id="design" class="px-4 py-4 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-6 text-center">
                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Text link</mark></label>
                        <input name="title" value="{{$link->title}}" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Link</mark></label>
                        <input name="link" value="{{$link->link}}" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                </div>
            </div>
        </section>
        <section class="flex justify-center mt-8">
            <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">
                <div id="design" class="px-4 py-4 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Text color</label>
                        <input type="color" name="dl_title_color" id="title_color" value="{{$properties->dl_title_color}}" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style</label>
                        <select id="select-font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search..."  autocomplete="off" name="dl_font">
                            <option value="{{$properties->dl_font}}" selected>{{$properties->dl_font}}</option>
                        </select>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size</label>
                        <select name="dl_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
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
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background color</label>
                        <input type="color" name="dl_background_color" id="background_color" value="{{$properties->dl_background_color_hex}}" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Text shadow color</label>
                        <input type="color" name="dl_text_shadow_color" value="{{$properties->dl_text_shadow_color}}" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Text shadow right</label>
                        <input id="steps-range" type="range" name="dl_text_shadow_right" value="{{$properties->dl_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Text shadow bottom</label>
                        <input id="steps-range" type="range" name="dl_text_shadow_bottom" value="{{$properties->dl_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Text shadow blur</label>
                        <input id="steps-range" type="range" name="dl_text_shadow_blur" value="{{$properties->dl_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background transparency</label>
                        <input id="steps-range" type="range" name="dl_transparency" min="0.0" max="1.0" step="0.1" value="{{$properties->dl_transparency}}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                    </div>



                    <div class="mb-10 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link shadow color</label>
                        <input type="color" value="{{$properties->dl_link_block_shadow_color}}" name="dl_link_block_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-10 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link shadow right</label>
                        <input id="steps-range" type="range" name="dl_link_block_shadow_right" value="{{$properties->dl_link_block_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-10 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link shadow bottom</label>
                        <input id="steps-range" type="range" name="dl_link_block_shadow_bottom" value="{{$properties->dl_link_block_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-10 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link shadow blur</label>
                        <input id="steps-range" type="range" name="dl_link_block_shadow_blur" value="{{$properties->dl_link_block_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>



                    <div class="mb-3 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Rounded borders</label>
                        <input id="steps-range" type="range" name="dl_rounded" min="1" max="50" step="1" value="{{$properties->dl_rounded}}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif">
                    </div>
                    <div class="mb-10 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border</label>
                        <select name="dl_border" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($properties->dl_border == 'border-0') selected @endif value="border-0">None</option>
                            <option @if($properties->dl_border == 'border') selected @endif value="border">Border 1</option>
                            <option @if($properties->dl_border == 'border-2') selected @endif value="border-2">Border 2</option>
                            <option @if($properties->dl_border == 'border-4') selected @endif value="border-4">Border 4</option>
                            <option @if($properties->dl_border == 'border-8') selected @endif value="border-8">Border 8</option>
                        </select>
                    </div>
                    <div class="mb-10 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border color</label>
                        <input type="color" value="{{$properties->dl_border_color}}" name="dl_border_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link animation</label>
                        <select name="animation" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($link->animation == 'None') selected @endif>None</option>
                            <option @if($link->animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                            <option @if($link->animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                            <option @if($link->animation == 'animate__animated animate__bounce animate__infinite infinite') selected @endif value="animate__animated animate__bounce animate__infinite infinite" style="border: 0">Bounce</option>
                            <option @if($link->animation == 'animate__animated animate__flash animate__infinite infinite') selected @endif value="animate__animated animate__flash animate__infinite infinite" style="border: 0">Flash</option>
                            <option @if($link->animation == 'animate__animated animate__swing animate__infinite infinite') selected @endif value="animate__animated animate__swing animate__infinite infinite" style="border: 0">Swing</option>
                            <option @if($link->animation == 'animate__animated animate__tada animate__infinite infinite') selected @endif value="animate__animated animate__tada animate__infinite infinite" style="border: 0">TaDa!</option>
                            <option @if($link->animation == 'animate__animated animate__heartBeat animate__infinite infinite') selected @endif value="animate__animated animate__heartBeat animate__infinite infinite" style="border: 0">HeartBeat</option>
                        </select>
                    </div>
                    <div class="mb-10 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Speed animation</label>
                        <select name="animation_speed" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($link->animation_speed == 'None') selected @endif >None</option>
                            <option @if($link->animation_speed == '1') selected @endif value="1" style="border: 0">1 sec.</option>
                            <option @if($link->animation_speed == '2') selected @endif value="2" style="border: 0">2 sec.</option>
                            <option @if($link->animation_speed == '3') selected @endif value="3" style="border: 0">3 sec.</option>
                            <option @if($link->animation_speed == '4') selected @endif value="4" style="border: 0">4 sec.</option>
                            <option @if($link->animation_speed == '5') selected @endif value="5" style="border: 0">5 sec.</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-center mb-6 text-center rounded-lg p-1 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input name="pinned" type="checkbox" @if($link->pinned == 1) checked @endif class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Pinned link</span>
                        </label>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update link
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script>
        new TomSelect('#select-beast-empty',{
            valueField: 'img',
            searchField: 'title',
            options: [
                    @foreach($allIconsInsideFolder as $icon)
                {id: {{$icon->getInode()}}, title: '{{substr($icon->getFilename(), 0, strrpos($icon->getFilename(),'.'))}}', img: '{{'http://links/public/images/social/'.$icon->getFilename()}}'},
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
    </script>

    <script>
        new TomSelect('#select-font',{
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

</x-app-layout>
