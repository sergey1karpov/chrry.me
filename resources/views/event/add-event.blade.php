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
                                <input id="datepicker" name="date" datepicker type="text" style="border: none" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:placeholder-gray-400 dark:text-white" placeholder="Select date">
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Time</mark></label>
                            <input name="time" placeholder="21:00" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Banner</mark></label>
                            <input name="banner" accept=".jpg, .jpeg, .png, .gif" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                            <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">PNG, JPG, JPEG or GIF (MAX Size. 10mb).</p>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Description</label>
                            <textarea id="message" rows="4" name="description" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Title</label>
                            <input name="title" placeholder="Title for event card" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link to sell tickets</label>
                            <input name="tickets" placeholder="Link to sell tickets" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button text</label>
                            <input name="btn_text" placeholder="Title for event button" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
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
                                <div class="w-14 h-7 bg-gray-300 dark:peer-focus:ring-indigo-900 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-900"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">Copy design</mark></span>
                            </label>
                            <p class="mt-2 mb-6 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">If you use this switch, you won't need to customize the event design. All parameters will be copied from your last created or modified event.</p>
                        </div>
                    @endif

                    <div id="block-1" class="mb-3  text-center rounded-lg p-5 ">
                        <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Style options for the event card</p>
                    </div>

                    <div id="block-2" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-1">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                                    <span>Card. Field city</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_city_font" id="de_city_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <select name="de_city_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option value="0.8">1</option>
                                            <option value="0.9">2</option>
                                            <option value="1">3</option>
                                            <option value="1.1">4</option>
                                            <option value="1.2">5</option>
                                            <option selected value="1.3">6</option>
                                            <option value="1.4">7</option>
                                            <option value="1.5">8</option>
                                            <option value="1.7">9</option>
                                            <option value="1.9">10</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_city_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_city_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_city_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_city_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_city_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-3" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-2">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                                    <span>Card. Row location</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_location_font" id="de_location_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <select name="de_location_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option value="0.8">1</option>
                                            <option value="0.9">2</option>
                                            <option value="1">3</option>
                                            <option value="1.1">4</option>
                                            <option value="1.2">5</option>
                                            <option selected value="1.3">6</option>
                                            <option value="1.4">7</option>
                                            <option value="1.5">8</option>
                                            <option value="1.7">9</option>
                                            <option value="1.9">10</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_location_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_location_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_location_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_location_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_location_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-4" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-3">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                    <span>Card. Row date</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_date_font" id="de_date_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <select name="de_date_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option value="0.8">1</option>
                                            <option selected value="0.9">2</option>
                                            <option value="1">3</option>
                                            <option value="1.1">4</option>
                                            <option value="1.2">5</option>
                                            <option value="1.3">6</option>
                                            <option value="1.4">7</option>
                                            <option value="1.5">8</option>
                                            <option value="1.7">9</option>
                                            <option value="1.9">10</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_date_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_date_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_date_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_date_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_date_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Date format</label>
                                        <select name="de_date_format" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="1">31.12.2023</option>
                                            <option value="2">31.12</option>
                                            <option value="3">Dec. 31, 2023</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-5" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                                    <span>Card. Row time</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_time_font" id="de_time_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <select name="de_time_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option value="0.8">1</option>
                                            <option selected value="0.9">2</option>
                                            <option value="1">3</option>
                                            <option value="1.1">4</option>
                                            <option value="1.2">5</option>
                                            <option value="1.3">6</option>
                                            <option value="1.4">7</option>
                                            <option value="1.5">8</option>
                                            <option value="1.7">9</option>
                                            <option value="1.9">10</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_time_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_time_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_time_text_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_time_text_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_time_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Show\Hide time field</label>
                                        <select name="de_show_card_time" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="{{true}}">Show</option>
                                            <option value="{{false}}">Hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-6" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-5">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                                    <span>Card. Other Options</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background color</label>
                                        <input type="color" value="#ffffff" name="de_background_color_hex" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background transparency</label>
                                        <input id="steps-range" type="range" name="de_transparency" value="1.0" min="0" max="1" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border rounded</label>
                                        <input id="steps-range" type="range" name="de_event_round" value="5" min="1" max="50" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-10 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Card text position</label>
                                        <select name="de_text_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="justify-center">Center</option>
                                            <option value="justify-start">Left</option>
                                            <option value="justify-end">Right</option>
                                        </select>
                                    </div>

                                    <div class="mb-10 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Event shadow color</label>
                                        <input type="color" name="de_event_card_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-10 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Event shadow right</label>
                                        <input id="steps-range" type="range" name="de_event_card_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-10 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Event shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_event_card_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-10 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Event shadow blur</label>
                                        <input id="steps-range" type="range" name="de_event_card_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>

                                    @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
                                        <div class="mb-10 text-center">
                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border</label>
                                            <select name="de_border" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                <option selected value="border-0">None</option>
                                                <option value="border">Border 1</option>
                                                <option value="border-2">Border 2</option>
                                                <option value="border-4">Border 4</option>
                                                <option value="border-8">Border 8</option>
                                            </select>
                                        </div>
                                        <div class="mb-10 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border color</label>
                                            <input type="color" name="de_border_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                        </div>
                                    @endif
                                    <div class="mb-10 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Link animation</label>
                                        <select name="event_animation" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected>Select animation</option>
                                            <option value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                                            <option value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                                            <option value="animate__animated animate__bounce animate__infinite infinite" style="border: 0">Bounce</option>
                                            <option value="animate__animated animate__flash animate__infinite infinite" style="border: 0">Flash</option>
                                            <option value="animate__animated animate__swing animate__infinite infinite" style="border: 0">Swing</option>
                                            <option value="animate__animated animate__tada animate__infinite infinite" style="border: 0">TaDa!</option>
                                            <option value="animate__animated animate__heartBeat animate__infinite infinite" style="border: 0">HeartBeat</option>
                                        </select>
                                    </div>
                                    <div class="mb-10 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Speed animation</label>
                                        <select name="animation_speed" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected>None</option>
                                            <option value="1" style="border: 0">1 sec.</option>
                                            <option value="2" style="border: 0">2 sec.</option>
                                            <option value="3" style="border: 0">3 sec.</option>
                                            <option value="4" style="border: 0">4 sec.</option>
                                            <option value="5" style="border: 0">5 sec.</option>
                                        </select>
                                    </div>
                                    <div class=" text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Show\Hide modal window</label>
                                        <select name="de_show_modal" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="{{true}}">Show</option>
                                            <option value="{{false}}">Hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-7" class="mb-3 mt-20 text-center rounded-lg p-5 ">
                        <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Style options for the modal window event card</p>
                    </div>

                    <!-- Open Card -->
                    <div id="block-8" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                                    <span>Open card. Row city</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_city_font" id="de_oc_city_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <input id="steps-range" type="range" name="de_oc_city_font_size" value="1.5" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_oc_city_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_oc_city_font_shadow_color" id="de_oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_city_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_city_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_city_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-9" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">
                                    <span>Open card. Row location</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_location_font" id="de_oc_location_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <input id="steps-range" type="range" name="de_oc_location_font_size" value="1.5" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_oc_location_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_oc_location_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_location_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_location_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_location_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-10" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">
                                    <span>Open card. Row date</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-8" class="hidden" aria-labelledby="accordion-flush-heading-8">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_date_font" id="de_oc_date_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <input id="steps-range" type="range" name="de_oc_date_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_oc_date_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_oc_date_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_date_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_date_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_date_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-11" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-9" aria-expanded="false" aria-controls="accordion-flush-body-9">
                                    <span>Open card. Row time</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-9" class="hidden" aria-labelledby="accordion-flush-heading-9">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_time_font" id="de_oc_time_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <input id="steps-range" type="range" name="de_oc_time_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_oc_time_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_oc_time_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_time_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_time_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_time_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-12" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-10" aria-expanded="false" aria-controls="accordion-flush-body-10">
                                    <span>Open card. Row title</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-10" class="hidden" aria-labelledby="accordion-flush-heading-10">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-10 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Card text position</label>
                                        <select name="de_oc_title_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="justify-center">Center</option>
                                            <option value="justify-start">Left</option>
                                            <option value="justify-end">Right</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_title_font" id="de_oc_title_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <input id="steps-range" type="range" name="de_oc_title_font_size" value="3" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_oc_title_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_oc_title_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_title_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_title_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_title_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-13" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-11" aria-expanded="false" aria-controls="accordion-flush-body-11">
                                    <span>Open card. Row description</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-11" class="hidden" aria-labelledby="accordion-flush-heading-11">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-10 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Card text position</label>
                                        <select name="de_oc_description_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="justify-center">Center</option>
                                            <option value="justify-start">Left</option>
                                            <option value="justify-end">Right</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_description_font" id="de_oc_description_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                                        <input id="steps-range" type="range" name="de_oc_description_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                                        <input type="color" value="#000000" name="de_oc_description_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                                        <input type="color" name="de_oc_description_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_description_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_description_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_description_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="block-14" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-4">
                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-12" aria-expanded="false" aria-controls="accordion-flush-body-12">
                                    <span>Open card. Other settings and ticket button</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-12" class="hidden" aria-labelledby="accordion-flush-heading-12">
                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                    <div class="mb-10 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">City, location, date, time text position</label>
                                        <select name="de_oc_text_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            <option selected value="justify-center">Center</option>
                                            <option value="justify-start">Left</option>
                                            <option value="justify-end">Right</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Open card background color</label>
                                        <input type="color" value="#ffffff" name="de_oc_bg_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                                        <select name="de_oc_btn_text_font" id="de_oc_btn_text_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                            <option selected value="Garet">Garet default</option>
                                        </select>
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button font size</label>
                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_size" value="0.9" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button color</label>
                                        <input type="color" value="#ffffff" name="de_oc_btn_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button text color</label>
                                        <input type="color" value="#000000" name="de_oc_btn_text_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button text shadow color</label>
                                        <input type="color" name="de_oc_btn_text_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button text shadow right</label>
                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_shadow_right" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="mb-8 text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button text shadow bottom</label>
                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_shadow_bottom" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                    <div class="text-center">
                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Ticket button text shadow blur</label>
                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                    </div>
                                </div>
                            </div>
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
                    $('#block-1').hide();
                    $('#block-2').hide();
                    $('#block-3').hide();
                    $('#block-4').hide();
                    $('#block-5').hide();
                    $('#block-6').hide();
                    $('#block-7').hide();
                    $('#block-8').hide();
                    $('#block-9').hide();
                    $('#block-10').hide();
                    $('#block-11').hide();
                    $('#block-12').hide();
                    $('#block-13').hide();
                    $('#block-14').hide();
                }
                else {
                    switchStatus = $(this).is(':checked');
                    $('#block-1').show();
                    $('#block-2').show();
                    $('#block-3').show();
                    $('#block-4').show();
                    $('#block-5').show();
                    $('#block-6').show();
                    $('#block-7').show();
                    $('#block-8').show();
                    $('#block-9').show();
                    $('#block-10').show();
                    $('#block-11').show();
                    $('#block-12').show();
                    $('#block-13').show();
                    $('#block-14').show();
                }
            });
        });
    </script>

    <script>
        let fields = [
            'de_city_font',
            'de_location_font',
            'de_date_font',
            'de_time_font',
            'de_oc_city_font',
            'de_oc_location_font',
            'de_oc_date_font',
            'de_oc_time_font',
            'de_oc_title_font',
            'de_oc_description_font',
            'de_oc_btn_text_font',
        ];

        fields.forEach(function(field) {
            new TomSelect('#'+ field, {
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
            })
        })

        $('#datepicker').on('click', function(){
            $(".datepicker-picker").show();
        });

        $('#datepicker').on('changeDate', function(){
            $(".datepicker-picker").hide();
        });
    </script>


</x-app-layout>



