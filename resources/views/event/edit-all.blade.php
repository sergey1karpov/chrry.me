<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('allEvents', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
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

    <div class="w-full mx-auto max-w-screen-xl lg:px-8 sm:px-8 z-50" style="position: sticky; top: 0;">
        <div  class="rounded-b-lg mx-auto max-w-screen-xl ">
            <div class="group block">
                <div class="w-full mx-auto max-w-screen-xl z-50" style="position: sticky; top: 0;">
                    <div  class="rounded-b-lg mt-1 mx-auto max-w-screen-xl ">
                        <div class="group block bg-gray-800">
                            <div class="border-b border-gray-200 dark:border-gray-700">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Form</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Card</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Modal card</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="myTabContent">
                    <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <section class="flex justify-center ">
                            <div class="w-full">

                                <div class="mx-auto max-w-screen-xl">
                                    <form action="{{ route('editAllEvent', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                                        <input type="hidden" name="type" value="EVENT">

                                        <div id="block-2" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-1">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                                                        <span>{{ __('main.event_card_city') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-1" class="hidden px-4" aria-labelledby="accordion-flush-heading-1">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="fontClose()" name="de_city_font" id="de_city_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontSizeClose()" name="de_city_font_size" id="de_city_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="0.8">1</option>
                                                                <option value="0.9">2</option>
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
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorClose()" type="color" name="de_city_font_color" id="de_city_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowClose()" type="color" name="de_city_text_shadow_color" id="de_city_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowClose()" id="de_city_text_shadow_right" type="range" name="de_city_text_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowClose()" id="de_city_text_shadow_bottom" type="range" name="de_city_text_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowClose()" id="de_city_text_shadow_blur" type="range" name="de_city_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-3" class=" w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg  @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-2">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                                                        <span>{{ __('main.event_card_location') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-2" class="hidden px-4" aria-labelledby="accordion-flush-heading-2">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="fontCloseLocation()" name="de_location_font" id="de_location_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontSizeCloseLocation()" name="de_location_font_size" id="de_location_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="0.8">1</option>
                                                                <option value="0.9">2</option>
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
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorCloseLocation()" type="color" name="de_location_font_color" id="de_location_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowCloseLocation()" type="color" name="de_location_text_shadow_color" id="de_location_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowCloseLocation()" id="de_location_text_shadow_right" type="range" name="de_location_text_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowCloseLocation()" id="de_location_text_shadow_bottom" type="range" name="de_location_text_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowCloseLocation()" id="de_location_text_shadow_blur" type="range" name="de_location_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-4" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-3">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                                        <span>{{ __('main.event_card_date') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-3" class="hidden px-4" aria-labelledby="accordion-flush-heading-3">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="fontCloseDate()" name="de_date_font" id="de_date_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontCloseDateSize()" name="de_date_font_size" id="de_date_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="0.8">1</option>
                                                                <option value="0.9">2</option>
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
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorCloseDate()" type="color" name="de_date_font_color" id="de_date_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowCloseDate()" type="color" name="de_date_text_shadow_color" id="de_date_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowCloseDate()" id="de_date_text_shadow_right" type="range" name="de_date_text_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowCloseDate()" id="de_date_text_shadow_bottom" type="range" name="de_date_text_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowCloseDate()" id="de_date_text_shadow_blur" type="range" name="de_date_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_date_format') }}</label>
                                                            <select onchange="closeDateType()" name="de_date_format" id="de_date_format" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="1">31.12.2023</option>
                                                                <option value="2">31.12</option>
                                                                <option value="3">Dec. 31, 2023</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-5" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg  @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                                                        <span>{{ __('main.event_card_time') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-4" class="hidden px-4" aria-labelledby="accordion-flush-heading-4">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="fontCloseTime()" name="de_time_font" id="de_time_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontCloseTimeSize()" name="de_time_font_size" id="de_time_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="0.8">1</option>
                                                                <option value="0.9">2</option>
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
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorCloseTime()" type="color" name="de_time_font_color" id="de_time_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowCloseTime()" type="color" name="de_time_text_shadow_color" id="de_time_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowCloseTime()" id="de_time_text_shadow_right" type="range" name="de_time_text_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowCloseTime()" id="de_time_text_shadow_bottom" type="range" name="de_time_text_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowCloseTime()" id="de_time_text_shadow_blur" type="range" name="de_time_text_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_show_time') }}</label>
                                                            <select onchange="timeShow()" name="de_show_card_time" id="de_show_card_time" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="{{true}}">{{ __('main.event_time_show') }}</option>
                                                                <option value="{{false}}">{{ __('main.event_time_hide') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-6" class="w-full mx-auto max-w-screen-x py-4 sm:px-6 lg:px-8 shadow-lg  @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-5">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                                                        <span>{{ __('main.event_card_other') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-5" class="hidden px-4" aria-labelledby="accordion-flush-heading-5">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_color') }}</label>
                                                            <input onchange="bgCloseColor()" type="color" value="#ffffff" name="de_background_color_hex" id="de_background_color_hex" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_trans') }}</label>
                                                            <input onchange="bgCloseColor()" id="de_transparency" type="range" name="de_transparency" value="1.0" min="0" max="1" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border') }}</label>
                                                            <input onchange="bgRound()" id="de_event_round" type="range" name="de_event_round" value="0" min="0" max="50" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>
                                                            <select onchange="textPosition()" name="de_text_position" id="de_text_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="justify-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option value="justify-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option value="justify-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="cardShadow()" type="color" name="de_event_card_shadow_color" id="de_event_card_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="cardShadow()" id="de_event_card_shadow_right" type="range" name="de_event_card_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="cardShadow()" id="de_event_card_shadow_bottom" type="range" name="de_event_card_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="cardShadow()" id="de_event_card_shadow_blur" type="range" name="de_event_card_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border_on_off') }}</label>
                                                            <select onchange="border()" name="de_border" id="de_border" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="border-0">0</option>
                                                                <option value="border">1</option>
                                                                <option value="border-2">2</option>
                                                                <option value="border-4">4</option>
                                                                <option value="border-8">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border_color') }}</label>
                                                            <input onchange="borderColor()" type="color" name="de_border_color" id="de_border_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class=" text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_modal') }}</label>
                                                            <select name="de_show_modal" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option selected value="{{true}}">{{ __('main.event_time_show') }}</option>
                                                                <option value="{{false}}">{{ __('main.event_time_hide') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-7" class=" mt-3 text-center rounded-lg p-5 ">
                                            <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{ __('main.event_modal') }}</p>
                                        </div>

                                        <!-- Open Card -->
                                        <div id="block-8" class="mt-8 w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                                                        <span>{{ __('main.event_modal_city') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-6" class="hidden px-4" aria-labelledby="accordion-flush-heading-6">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openCityFont()" name="de_oc_city_font" id="de_oc_city_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openCityFontSize()" id="de_oc_city_font_size" type="range" name="de_oc_city_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openCityFontColor()" type="color" name="de_oc_city_font_color" id="de_oc_city_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openCityFontShadow()" type="color" name="de_oc_city_font_shadow_color" id="de_oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openCityFontShadow()" id="de_oc_city_font_shadow_right" type="range" name="de_oc_city_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openCityFontShadow()" id="de_oc_city_font_shadow_bottom" type="range" name="de_oc_city_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openCityFontShadow()" id="de_oc_city_font_shadow_blur" type="range" name="de_oc_city_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-9" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">
                                                        <span>{{ __('main.event_modal_location') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-7" class="hidden px-4" aria-labelledby="accordion-flush-heading-7">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openLocationFont()" name="de_oc_location_font" id="de_oc_location_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openLocationFontSize()" id="de_oc_location_font_size" type="range" name="de_oc_location_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openLocationFontColor()" type="color" name="de_oc_location_font_color" id="de_oc_location_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openLocationFontShadow()" type="color" name="de_oc_location_font_shadow_color" id="de_oc_location_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openLocationFontShadow()" id="de_oc_location_font_shadow_right" type="range" name="de_oc_location_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openLocationFontShadow()" id="de_oc_location_font_shadow_bottom" type="range" name="de_oc_location_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openLocationFontShadow()" id="de_oc_location_font_shadow_blur" type="range" name="de_oc_location_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-10" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">
                                                        <span>{{ __('main.event_modal_date') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-8" class="hidden px-4" aria-labelledby="accordion-flush-heading-8">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openDateFont()" name="de_oc_date_font" id="de_oc_date_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openDateFontSize()" id="de_oc_date_font_size" type="range" name="de_oc_date_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openDateFontColor()" type="color" name="de_oc_date_font_color" id="de_oc_date_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openDateFontShadow()" type="color" name="de_oc_date_font_shadow_color" id="de_oc_date_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openDateFontShadow()" id="de_oc_date_font_shadow_right" type="range" name="de_oc_date_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openDateFontShadow()" id="de_oc_date_font_shadow_bottom" type="range" name="de_oc_date_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openDateFontShadow()" id="de_oc_date_font_shadow_blur" type="range" name="de_oc_date_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-11" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-9" aria-expanded="false" aria-controls="accordion-flush-body-9">
                                                        <span>{{ __('main.event_modal_time') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-9" class="hidden px-4" aria-labelledby="accordion-flush-heading-9">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openTimeFont()" name="de_oc_time_font" id="de_oc_time_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openTimeFontSize()" id="de_oc_time_font_size" type="range" name="de_oc_time_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openTimeFontColor()" type="color" name="de_oc_time_font_color" id="de_oc_time_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openTimeFontShadow()" type="color" name="de_oc_time_font_shadow_color" id="de_oc_time_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openTimeFontShadow()" id="de_oc_time_font_shadow_right" type="range" name="de_oc_time_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openTimeFontShadow()" id="de_oc_time_font_shadow_bottom" type="range" name="de_oc_time_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openTimeFontShadow()" id="de_oc_time_font_shadow_blur" type="range" name="de_oc_time_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-12" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-10" aria-expanded="false" aria-controls="accordion-flush-body-10">
                                                        <span>{{ __('main.event_modal_title') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-10" class="hidden px-4" aria-labelledby="accordion-flush-heading-10">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>
                                                            <select onchange="titlePosition()" name="de_oc_title_position" id="de_oc_title_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option value="text-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option selected value="text-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option value="text-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openTitleFont()" name="de_oc_title_font" id="de_oc_title_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openTitleFontSize()" id="de_oc_title_font_size" type="range" name="de_oc_title_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openTitleFontColor()" type="color" name="de_oc_title_font_color" id="de_oc_title_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openTitleFontShadow()" type="color" name="de_oc_title_font_shadow_color" id="de_oc_title_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openTitleFontShadow()" id="de_oc_title_font_shadow_right" type="range" name="de_oc_title_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openTitleFontShadow()" id="de_oc_title_font_shadow_bottom" type="range" name="de_oc_title_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openTitleFontShadow()" id="de_oc_title_font_shadow_blur" type="range" name="de_oc_title_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-13" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-11" aria-expanded="false" aria-controls="accordion-flush-body-11">
                                                        <span>{{ __('main.event_modal_descr') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-11" class="hidden px-4" aria-labelledby="accordion-flush-heading-11">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>
                                                            <select onchange="descrPosition()" name="de_oc_description_position" id="de_oc_description_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option value="text-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option selected value="text-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option value="text-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openDescrFont()" name="de_oc_description_font" id="de_oc_description_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openDescrFontSize()" id="de_oc_description_font_size" type="range" name="de_oc_description_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openDescrFontColor()" type="color" name="de_oc_description_font_color" id="de_oc_description_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openDescrFontShadow()" type="color" name="de_oc_description_font_shadow_color" id="de_oc_description_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openDescrFontShadow()" id="de_oc_description_font_shadow_right" type="range" name="de_oc_description_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openDescrFontShadow()" id="de_oc_description_font_shadow_bottom" type="range" name="de_oc_description_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openDescrFontShadow()" id="de_oc_description_font_shadow_blur" type="range" name="de_oc_description_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="block-14" class="w-full mx-auto max-w-screen-xl py-4 sm:px-6 lg:px-8 shadow-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                <h2 id="accordion-flush-heading-4">
                                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-12" aria-expanded="false" aria-controls="accordion-flush-body-12">
                                                        <span>{{ __('main.event_modal_other') }}</span>
                                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-flush-body-12" class="hidden px-4" aria-labelledby="accordion-flush-heading-12">
                                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_position') }}</label>
                                                            <select onchange="otherPosition()" name="de_oc_text_position" id="de_oc_text_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option value="justify-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option selected value="justify-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option value="justify-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_color') }}</label>
                                                            <input onchange="openOtherBgColor()" type="color" value="#ffffff" name="de_oc_bg_color" id="de_oc_bg_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_font') }}</label>
                                                            <select onchange="openBtnFont()" name="de_oc_btn_text_font" id="de_oc_btn_text_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">

                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openBtnFontSize()" id="de_oc_btn_text_font_size" type="range" name="de_oc_btn_text_font_size" value="0.8" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_color') }}</label>
                                                            <input onchange="openBgFontColor()" type="color" value="#ffffff" name="de_oc_btn_color" id="de_oc_btn_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_text_color') }}</label>
                                                            <input onchange="openBtnFontColor()" type="color" name="de_oc_btn_text_color" id="de_oc_btn_text_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_text_shadow_color') }}</label>
                                                            <input onchange="openBtnFontShadow()" type="color" name="de_oc_btn_text_font_shadow_color" id="de_oc_btn_text_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openBtnFontShadow()" id="de_oc_btn_text_font_shadow_right" type="range" name="de_oc_btn_text_font_shadow_right" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openBtnFontShadow()" id="de_oc_btn_text_font_shadow_bottom" type="range" name="de_oc_btn_text_font_shadow_bottom" value="0" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openBtnFontShadow()" id="de_oc_btn_text_font_shadow_blur" type="range" name="de_oc_btn_text_font_shadow_blur" value="0" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 px-4 mb-5">
                                            <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                                {{ __('main.event_mass_upd') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <section>
                    </div>
                    <div class="hidden p-4 matureBlock bg-white" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="group block" id="matureBlock">

                            @include('event.types.' . $user->eventSettings->close_card_type, ['event' => (object) $event, 'properties' => (object) $properties])

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
                        <div class="flex p-4 mt-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 " role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Измените все свои мероприятия сразу</span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                    <li>В карточке отображаются данные вашего последнего созданного мероприятия для удобства</li>
                                    <li>Изменения касаются только стилей карточек</li>
                                    <li>Данные (город, дата, время и т.д) не изменяются</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4 matureBlock2 bg-white" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="group block">

                            @include('event.open-cart.' . $user->eventSettings->open_card_type, ['event' => (object) $event, 'properties' => (object) $properties])

                        </div>
                        <div class="flex justify-center items-center mt-4">
                            <div class="mt-1 mr-3">
                                <span class="material-symbols-outlined" style="color: white">wb_sunny</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="{{true}}" class="sr-only peer" id="switch-bg2">
                                <div class="w-11 h-6 bg-gray-200  rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                            </label>
                            <div class="mt-1 ml-3">
                                <span class="material-symbols-outlined">dark_mode</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('scripts.edit-all-events')

</x-app-layout>
