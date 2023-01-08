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
        <div class="w-full">

            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 mb-10">
                <form action="{{ route('addEvent', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('POST')
                    <input type="hidden" name="type" value="EVENT">

                    <div class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">City</mark></label>
                            <input name="city" placeholder="Tokio" maxlength="100" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Location</mark></label>
                            <input name="location" placeholder="1 OAK Tokyo" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Event date</mark></label>
                            <div class="relative mt-1">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input name="date" datepicker type="text" style="border: none" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:placeholder-gray-400 dark:text-white" placeholder="Select date">
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Time</mark></label>
                            <input name="time" placeholder="21:00" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Description</mark></label>
                            <textarea id="message" rows="4" name="description" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Banner</mark></label>
                            <input name="banner" accept=".jpg, .jpeg, .png, .gif" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                            <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link to sell tickets</label>
                            <input name="tickets" placeholder="Link to sell tickets" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link to video</label>
                            <textarea id="message" rows="2" name="video" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link to any media</label>
                            <textarea id="message" rows="2" name="media" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                        </div>
                    </div>

                    @if(count($user->events) != 0)
                        <div class="mb-16 mt-20 text-center rounded-lg p-5 ">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="check_last_event" id="check_last_event" value="penis" type="checkbox" class="sr-only peer">
                                <div class="w-14 h-7 bg-gray-200 dark:peer-focus:ring-indigo-900 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-900"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Copy design</mark></span>
                            </label>
                            <p class="mt-2 mb-6 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">If you use this switch, you won't need to customize the event design. All parameters will be copied from your last created or modified event.</p>
                        </div>
                    @endif

                    <div id="design" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="text-center mb-10">
                            <label for="title" class="mb-6 text font-medium leading-relaxed text-indigo-600">Styles for city and location</label>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                            <select name="location_font" id="select-beast-empty-post-location" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off"></select>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                            <select name="location_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option value="0.8">1</option>
                                <option value="0.9">2</option>
                                <option value="1">3</option>
                                <option value="1.1">4</option>
                                <option value="1.2">5</option>
                            </select>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                            <input type="color" value="#ffffff" name="location_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="flex items-center justify-evenly mb-6 text-center rounded-lg p-1 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                            <div class="col-span-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input name="bold_city" type="checkbox" value="{{true}}" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold city</span>
                                </label>
                            </div>
                            <div class="col-span-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input name="bold_location" type="checkbox" value="{{true}}" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold location</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                            <input type="color" name="location_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                            <input id="steps-range" type="range" name="location_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                            <input id="steps-range" type="range" name="location_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                            <input id="steps-range" type="range" name="location_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                    </div>

                    <div id="design-2" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="text-center mb-10">
                            <label for="title" class="mb-6 text font-medium leading-relaxed text-indigo-600">Styles for date and time</label>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                            <select name="date_font" id="select-beast-empty-post-date" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off"></select>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                            <select name="date_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option value="0.8">1</option>
                                <option value="0.9">2</option>
                                <option value="1">3</option>
                                <option value="1.1">4</option>
                                <option value="1.2">5</option>
                            </select>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                            <input type="color" value="#ffffff" name="date_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="flex items-center justify-evenly mb-6 text-center rounded-lg p-1 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                            <div class="col-span-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input name="bold_date" type="checkbox" value="{{true}}" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold date</span>
                                </label>
                            </div>
                            <div class="col-span-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input name="bold_time" type="checkbox" value="{{true}}" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold time</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                            <input type="color" name="date_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                            <input id="steps-range" type="range" name="date_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                            <input id="steps-range" type="range" name="date_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                            <input id="steps-range" type="range" name="date_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                    </div>

                    <div id="design-3" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background color</label>
                            <input type="color" name="background_color_hex" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background transparency</label>
                            <input id="steps-range" type="range" name="transparency" value="1.0" min="0" max="1" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border rounded</label>
                            <input id="steps-range" type="range" name="event_round" value="5" min="1" max="50" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-10 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Event shadow</label>
                            <select name="block_shadow" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option selected value="shadow-none">None</option>
                                <option value="shadow-sm">1</option>
                                <option value="shadow-md">2</option>
                                <option value="shadow-lg">3</option>
                                <option value="shadow-xl">4</option>
                                <option value="shadow-2xl">5</option>
                            </select>
                        </div>
                        <div class="mb-10 text-center">
                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link animation</label>
                            <select name="event_animation" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option selected>Select animation</option>
                                <option value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                                <option value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Create event
                        </button>
                    </div>
                </form>
            </div>

        </div>
    <section>

    <script>
        $( document ).ready(function(){
            $('#check_last_event').on('change', function(){
                if ($(this).is(':checked')) {
                    switchStatus = $(this).is(':checked');
                    $('#design').hide();
                    $('#design-2').hide();
                    $('#design-3').hide();
                }
                else {
                    switchStatus = $(this).is(':checked');
                    $('#design').show();
                    $('#design-2').show();
                    $('#design-3').show();
                }
            });
        });

        new TomSelect('#select-beast-empty-post-location',{
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
    </script>
    <script>
        new TomSelect('#select-beast-empty-post-date',{
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
    </script>

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

{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap" rel="stylesheet">--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">--}}

{{--    --}}{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>--}}

{{--    <!-- Date JQuery -->--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>--}}

{{--    <!-- Time -->--}}
{{--    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="{{asset('public/js/moment.js')}}" type="text/javascript"></script>--}}
{{--    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>--}}

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
{{--        .ts-control {--}}
{{--            border: 0;--}}
{{--            box-shadow: 0px 1px 10px 2px rgba(0, 0, 0, 0.2);--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}
{{--@if (session('count'))--}}
{{--    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="border-radius: 0">--}}
{{--        {{ session('count') }}--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--@endif--}}
{{--<div class="container-fluid justify-content-center text-center">--}}
{{--    @if(isset($errors))--}}
{{--        @if ($errors->any())--}}
{{--            <div class="row">--}}
{{--                <div class="col-12" style="padding: 0">--}}
{{--                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: red">--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <div class="title">--}}
{{--                                <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$error}}</span>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
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
{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="row">--}}
{{--            <div class="col-12" style="padding: 0">--}}
{{--                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: lightseagreen">--}}
{{--                    <div class="title">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$message}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="title mt-2">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">Добавьте еще одно мероприятие или перейдите на <a href="{{ route('userHomePage', ['user' => $user->slug]) }}">главную страницу</a></span>--}}
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
{{--            <a class="" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">--}}
{{--                <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}
{{--<div class="ms-2 me-2 mb-3 text-center">--}}
{{--    <div class="modal-body p-2">--}}
{{--        <form action="{{ route('addEvent', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" id="add-post">--}}
{{--            @csrf @method('POST')--}}
{{--            <input type="hidden" name="type" value="EVENT"> <!-- Тип ссылки -->--}}
{{--            <div class="mb-3"> <!-- Город -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Город проведения</label>--}}
{{--                <input class="form-control shadow" name="city" id="city" placeholder="Москва" style=" border: 0">--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Локация -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Место проведения</label>--}}
{{--                <input class="form-control shadow" name="location" id="full_text" placeholder="Название места проведения мероприятия" style="border: 0">--}}
{{--                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 255 символов</span>--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Дата и время -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-7">--}}
{{--                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Дата</label>--}}
{{--                        <input id="startDate" name="date" class="form-control shadow" type="date" style="border: 0" />--}}
{{--                    </div>--}}
{{--                    <div class="col-5">--}}
{{--                        <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Время</label>--}}
{{--                        <input type="text" class="form-control shadow" name="time" id="timepicker" placeholder="21:30" maxlength="255" style="border: 0">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Описание события -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">* Описание</label>--}}
{{--                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="3" name="description" id="full_text" style="border: 0"></textarea>--}}
{{--                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Описание содержит до 2500 символов</span>--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Баннер события -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">* Афиша</label>--}}
{{--                <input type="file" class="form-control shadow" id="inputGroupFile022" name="banner" accept=".png, .jpg, .jpeg" style="border: 0">--}}
{{--                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Мы принимаем картинки jpeg, jpg, png формата.</span>--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Покупка билетов -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif; ">Ссылка на продажу билетов</label>--}}
{{--                <input class="form-control @if($user->dayVsNight) bg-secondary @endif shadow" name="tickets" id="full_text" placeholder="" style="border: 0;">--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Ссылка на видео -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">@lang('app.p_video')</label>--}}
{{--                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="2" name="video" id="video" style="border: 0;"></textarea>--}}
{{--                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">@lang('app.p_video_description')</span>--}}
{{--            </div>--}}
{{--            <div class="mb-3"> <!-- Ссылка на любое медиа -->--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Плейлист</label>--}}
{{--                <textarea class="form-control @if($user->dayVsNight) bg-secondary @endif shadow"  rows="2" name="media" id="media" style="border: 0;"></textarea>--}}
{{--                <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Для добавления плейлиста, в это поле необходимо вставить его код</span>--}}
{{--            </div>--}}

{{--            <!-- Дизайн -->--}}
{{--            <hr>--}}
{{--            <div class="text-center">--}}
{{--                Дизайн мероприятия--}}
{{--            </div>--}}
{{--            <hr>--}}

{{--            <div class="mb-3 text-center" >--}}
{{--                <div class="ms-2 form-check" style="padding: 0">--}}
{{--                    <div class="form-check form-switch form-switch mb-3">--}}
{{--                        <input name="check_last_event" class="form-check-input" type="checkbox" value="penis" id="design-link-e">--}}
{{--                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                            @lang('app.last_style_2')--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <label for="exampleInputEmail1" class="form-label " style="font-family: 'Rubik', sans-serif; font-size: 0.7rem">Этот переключатель поможет вам скопировать дизайн последнего созданного вами мероприятия, что бы не нужно было самому заполнять ввсе параметры опять</label>--}}
{{--            </div>--}}

{{--            <div id="design-block-e">--}}
{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для города и локации</label>--}}
{{--                <div class="row mb-">--}}
{{--                    <div class="col-6">--}}
{{--                        <select id="select-beast-empty-post-location" data-placeholder="Поиск шрифта..."  autocomplete="off" name="location_font"></select>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="location_font_size" style="border: 0; height: 35px;">--}}
{{--                            <option value="0.9">1</option>--}}
{{--                            <option value="1">2</option>--}}
{{--                            <option value="1.1">3</option>--}}
{{--                            <option value="1.2">4</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#050507" title="Choose your color" name="location_font_color" style="height: 35px; border: 0"><br>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mb-1 text-center">--}}
{{--                    <div class="form-check form-switch text-center">--}}
{{--                        <input name="bold_city" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">--}}
{{--                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                            Сделать название города жирным--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mb-3 text-center">--}}
{{--                    <div class="form-check form-switch text-center">--}}
{{--                        <input name="bold_location" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">--}}
{{--                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                            Сделать место проведения жирным--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для города и локации</label>--}}
{{--                <div class="mb-3 text-center row">--}}
{{--                    <div class="col-12">--}}
{{--                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput"  title="Choose your color" name="location_text_shadow_color" style="height: 35px; border: 0"><br>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Размытие тени</span>--}}
{{--                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_blur" value="0">--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>--}}
{{--                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_bottom" value="0">--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>--}}
{{--                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="location_text_shadow_right" value="0">--}}
{{--                    </div>--}}
{{--                </div>--}}






{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Шрифт, размер шрифта и цвет для даты и времени</label>--}}
{{--                <div class="row mb-">--}}
{{--                    <div class="col-6">--}}
{{--                        <select id="select-beast-empty-post-date" data-placeholder="Поиск шрифта..."  autocomplete="off" name="date_font"></select>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="date_font_size" style="border: 0; height: 35px;">--}}
{{--                            <option value="0.9">1</option>--}}
{{--                            <option value="1">2</option>--}}
{{--                            <option value="1.1">3</option>--}}
{{--                            <option value="1.2">4</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#050507" title="Choose your color" name="date_font_color" style="height: 35px; border: 0"><br>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mb-1 text-center">--}}
{{--                    <div class="form-check form-switch text-center">--}}
{{--                        <input name="bold_date" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">--}}
{{--                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                            Сделать дату жирным--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mb-3 text-center">--}}
{{--                    <div class="form-check form-switch text-center">--}}
{{--                        <input name="bold_time" class="form-check-input" type="checkbox" value="{{true}}" id="flexCheckDefault">--}}
{{--                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                            Сделать время жирным--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для даты и времени</label>--}}
{{--                <div class="mb-3 text-center row">--}}
{{--                    <div class="col-12">--}}
{{--                        <input type="color" class="block-input @if($user->dayVsNight) bg-secondary @endif form-control shadow p-1" id="exampleColorInput"  title="Choose your color" name="date_text_shadow_color" style="height: 35px; border: 0"><br>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Размытие тени</span>--}}
{{--                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_blur" value="0">--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Смещение вниз</span>--}}
{{--                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_bottom" value="0">--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <span style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Сдвиг в право</span>--}}
{{--                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange2" name="date_text_shadow_right" value="0">--}}
{{--                    </div>--}}
{{--                </div>--}}






{{--                <label for="exampleInputEmail1" class="form-label" style="font-family: 'Rubik', sans-serif;">Выбор фонового цвета и прозрачности</label>--}}
{{--                <div class="row mb-3">--}}
{{--                    <div class="col-3">--}}
{{--                        <input type="color" class="form-control @if($user->dayVsNight) bg-secondary @endif shadow p-1" id="exampleColorInput" value="#ECECE2" title="Choose your color" name="background_color_hex" style="height: 35px; border: 0">--}}
{{--                    </div>--}}
{{--                    <div class="col-9">--}}
{{--                        <input type="range" class="form-range" min="0.0" max="1.0" step="0.1" id="customRange2" name="transparency" value="1.0">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">@lang('app.p_round')</label>--}}
{{--                <div class="mb-3 text-center d-flex justify-content-center"> <!-- Добивить округление углов -->--}}
{{--                    <input type="range" class="form-range" min="1" max="50" step="1" id="customRange2" name="event_round" value="25">--}}
{{--                </div>--}}

{{--                <label for="exampleInputEmail1" class="form-label mb-2" style="font-family: 'Rubik', sans-serif;">Тень для блока мероприятия</label>--}}
{{--                <div class="mb-3 mt-2 text-center">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio1" value="shadow-none" style="border: 0">--}}
{{--                                    <label class="form-check-label" for="inlineRadio1" style="font-size: 0.8rem">Без тени</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio2" value="shadow-sm" style="border: 0">--}}
{{--                                    <label class="form-check-label" for="inlineRadio2" style="font-size: 0.8rem">Маленькая</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mt-2">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio3" value="shadow" style="border: 0">--}}
{{--                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Средняя</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input shadow" type="radio" name="block_shadow" id="inlineRadio3" value="shadow-lg" style="border: 0">--}}
{{--                                    <label class="form-check-label" for="inlineRadio3" style="font-size: 0.8rem">Большая</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="mb-3 text-center">--}}
{{--                    <div>--}}
{{--                        <select class="form-select @if($user->dayVsNight) bg-secondary @endif shadow" aria-label="Default select example" name="event_animation" style="border: 0">--}}
{{--                            <option selected>Выбрать анимацию...</option>--}}
{{--                            <option value="animate__animated animate__pulse animate__infinite infinite">Pulse</option>--}}
{{--                            <option value="animate__animated animate__headShake animate__infinite infinite">Head Shake</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <label style="font-family: 'Rubik', sans-serif; font-size: 0.8rem;">Анимация для мероприятия</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="d-grid gap-2">--}}
{{--                <button id="post-btn" type="submit" class="btn btn-secondary" style="border: 0">Добавить</button>--}}
{{--            </div>--}}
{{--    </div>--}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}
{{--<script>--}}
{{--    new TomSelect('#select-beast-empty-post-location',{--}}
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
{{--    new TomSelect('#select-beast-empty-post-date',{--}}
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
{{--</html>--}}








