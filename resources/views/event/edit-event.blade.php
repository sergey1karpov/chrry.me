<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('allEvents', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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

    <div class="text-center">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

{{--    <section class="flex justify-center ">--}}
{{--        <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">--}}
{{--            <div id="design" class="px-4 py-4 mb-8 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl @if($user->dayVsNight == 1) text-white @else text-black @endif">{{ __('main.event_now') }}</h1>--}}
{{--                <div class="container mt-2">--}}
{{--                    @if($properties->de_show_modal == 0)<a href="{{$event->tickets}}">@endif--}}
{{--                        <div class="w-full col-lg-12 allalbums {{$event->event_animation}}" @if($properties->de_show_modal == 1) data-modal-target="default" data-modal-toggle="popup-modal" type="button" @endif style="--}}
{{--                            animation-duration: {{$event->animation_speed}}s;--}}
{{--                            border-radius: {{$properties->de_event_round}}px;--}}
{{--                            box-shadow: {{$properties->de_event_card_shadow_right}}px {{$properties->de_event_card_shadow_bottom}}px {{$properties->de_event_card_shadow_blur}}px {{$properties->de_event_card_shadow_color}};--}}
{{--                            @if($properties->de_event_card_shadow_right) margin-right: {{$properties->de_event_card_shadow_right}}px @endif--}}
{{--                        ">--}}
{{--                            @include('event.types.' . $user->eventSettings->close_card_type, ['event' => $event])--}}
{{--                        </div>--}}
{{--                    @if($properties->de_show_modal == 0)</a>@endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

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
                                    <form action="{{ route('editEvent', ['user' => $user->id, 'event' => $event->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')

                                        <div class="mb-8 w-full mx-auto max-w-screen-xl px-4 shadow-lg @if($user->dayVsNight == 1) bg-black @endif">
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_city') }}</mark></label>
                                                <select onchange="city()" style="border: none" name="city_id" id="select-city" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Начните вводить название..."  autocomplete="off">
                                                    <option value="{{$event->city_id}}" selected>{{$event->city}}</option>
                                                </select>
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_location') }}</mark></label>
                                                <input value="{{$event->location}}" required name="location" placeholder="1 OAK Tokyo" maxlength="100" id="location" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_date') }}</mark></label>
                                                <div class="relative mt-1">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                    <input value="{{Carbon\Carbon::parse($event->date)->format('Y-m-d')}}" id="datepicker" name="date" type="date" style="border: none" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:placeholder-gray-400 dark:text-white" placeholder="Select date">
                                                </div>
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_time') }}</mark></label>
                                                <input required name="time" value="{{$event->time}}" maxlength="100" id="time" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            </div>

                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_banner') }}</mark></label>
                                                <div class="flex justify-center mt-2 mb-2">
                                                    <img class="h-auto max-w-full rounded-lg" src="{{'../../'.$event->banner}}" >
                                                </div>
                                                <input name="banner" accept=".jpg, .jpeg, .png, .gif" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                                                <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">{{ __('main.event_banner_descr') }}</p>
                                            </div>

                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_descr') }}</mark></label>
                                                <textarea required id="description" maxlength="2500" rows="4" name="description" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    {{$event->description}}
                                                </textarea>
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_title') }}</mark></label>
                                                <input value="{{$event->title}}" required name="title" placeholder="Title for event card" maxlength="255" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_tickets') }}</mark></label>
                                                <input value="{{$event->tickets}}" required name="tickets" id="ticket_link" placeholder="Link to sell tickets"  style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_tickets_btn_text') }}</mark></label>
                                                <input value="{{$event->btn_text}}" required name="btn_text" id="ticket_link_text" placeholder="Title for event button" maxlength="50"  style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                            </div>
                                            <div class="mb-6 text-center">
                                                <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_video') }}</label>
                                                <textarea id="video" rows="2" name="video" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                                                    {{$event->video}}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div id="block-1" class="mb-3  text-center rounded-lg p-5 ">
                                            <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{ __('main.event_styles') }}</p>
                                        </div>

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
                                                                <option value="{{$properties->de_city_font}}" selected>{{$properties->de_city_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontSizeClose()" name="de_city_font_size" id="de_city_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_city_font_size == 0.8) selected @endif value="0.8">1</option>
                                                                <option @if($properties->de_city_font_size == 0.9) selected @endif value="0.9">2</option>
                                                                <option @if($properties->de_city_font_size == 1) selected @endif value="1">3</option>
                                                                <option @if($properties->de_city_font_size == 1.1) selected @endif value="1.1">4</option>
                                                                <option @if($properties->de_city_font_size == 1.2) selected @endif value="1.2">5</option>
                                                                <option @if($properties->de_city_font_size == 1.3) selected @endif value="1.3">6</option>
                                                                <option @if($properties->de_city_font_size == 1.4) selected @endif value="1.4">7</option>
                                                                <option @if($properties->de_city_font_size == 1.5) selected @endif value="1.5">8</option>
                                                                <option @if($properties->de_city_font_size == 1.7) selected @endif value="1.7">9</option>
                                                                <option @if($properties->de_city_font_size == 1.9) selected @endif value="1.9">10</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorClose()" value="{{$properties->de_city_font_color}}" type="color" name="de_city_font_color" id="de_city_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowClose()" type="color" value="{{$properties->de_city_text_shadow_color}}" name="de_city_text_shadow_color" id="de_city_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowClose()" id="de_city_text_shadow_right" type="range" name="de_city_text_shadow_right" value="{{$properties->de_city_text_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowClose()" id="de_city_text_shadow_bottom" type="range" name="de_city_text_shadow_bottom" value="{{$properties->de_city_text_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowClose()" id="de_city_text_shadow_blur" type="range" name="de_city_text_shadow_blur" value="{{$properties->de_city_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option value="{{$properties->de_location_font}}" selected>{{$properties->de_location_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontSizeCloseLocation()" name="de_location_font_size" id="de_location_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_location_font_size == 0.8) selected @endif value="0.8">1</option>
                                                                <option @if($properties->de_location_font_size == 0.9) selected @endif value="0.9">2</option>
                                                                <option @if($properties->de_location_font_size == 1) selected @endif value="1">3</option>
                                                                <option @if($properties->de_location_font_size == 1.1) selected @endif value="1.1">4</option>
                                                                <option @if($properties->de_location_font_size == 1.2) selected @endif value="1.2">5</option>
                                                                <option @if($properties->de_location_font_size == 1.3) selected @endif value="1.3">6</option>
                                                                <option @if($properties->de_location_font_size == 1.4) selected @endif value="1.4">7</option>
                                                                <option @if($properties->de_location_font_size == 1.5) selected @endif value="1.5">8</option>
                                                                <option @if($properties->de_location_font_size == 1.7) selected @endif value="1.7">9</option>
                                                                <option @if($properties->de_location_font_size == 1.9) selected @endif value="1.9">10</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorCloseLocation()" type="color" value="{{$properties->de_location_font_color}}" name="de_location_font_color" id="de_location_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowCloseLocation()" type="color" value="{{$properties->de_location_text_shadow_color}}" name="de_location_text_shadow_color" id="de_location_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowCloseLocation()" id="de_location_text_shadow_right" type="range" name="de_location_text_shadow_right" value="{{$properties->de_location_text_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowCloseLocation()" id="de_location_text_shadow_bottom" type="range" name="de_location_text_shadow_bottom" value="{{$properties->de_location_text_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowCloseLocation()" id="de_location_text_shadow_blur" type="range" name="de_location_text_shadow_blur" value="{{$properties->de_location_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option value="{{$properties->de_date_font}}" selected>{{$properties->de_date_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontCloseDateSize()" name="de_date_font_size" id="de_date_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_date_font_size == 0.8) selected @endif value="0.8">1</option>
                                                                <option @if($properties->de_date_font_size == 0.9) selected @endif value="0.9">2</option>
                                                                <option @if($properties->de_date_font_size == 1) selected @endif value="1">3</option>
                                                                <option @if($properties->de_date_font_size == 1.1) selected @endif value="1.1">4</option>
                                                                <option @if($properties->de_date_font_size == 1.2) selected @endif value="1.2">5</option>
                                                                <option @if($properties->de_date_font_size == 1.3) selected @endif value="1.3">6</option>
                                                                <option @if($properties->de_date_font_size == 1.4) selected @endif value="1.4">7</option>
                                                                <option @if($properties->de_date_font_size == 1.5) selected @endif value="1.5">8</option>
                                                                <option @if($properties->de_date_font_size == 1.7) selected @endif value="1.7">9</option>
                                                                <option @if($properties->de_date_font_size == 1.9) selected @endif value="1.9">10</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorCloseDate()" value="{{$properties->de_date_font_color}}" type="color" name="de_date_font_color" id="de_date_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowCloseDate()" type="color" value="{{$properties->de_date_text_shadow_color}}" name="de_date_text_shadow_color" id="de_date_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowCloseDate()" id="de_date_text_shadow_right" type="range" name="de_date_text_shadow_right" value="{{$properties->de_date_text_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowCloseDate()" id="de_date_text_shadow_bottom" type="range" name="de_date_text_shadow_bottom" value="{{$properties->de_date_text_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowCloseDate()" id="de_date_text_shadow_blur" type="range" name="de_date_text_shadow_blur" value="{{$properties->de_date_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_date_format') }}</label>
                                                            <select onchange="closeDateType()" name="de_date_format" id="de_date_format" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_date_format == 1) selected @endif value="1">31.12.2023</option>
                                                                <option @if($properties->de_date_format == 2) selected @endif value="2">31.12</option>
                                                                <option @if($properties->de_date_format == 3) selected @endif value="3">Dec. 31, 2023</option>
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
                                                                <option value="{{$properties->de_time_font}}" selected>{{$properties->de_time_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <select onchange="fontCloseTimeSize()" name="de_time_font_size" id="de_time_font_size" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_time_font_size == 0.8) selected @endif value="0.8">1</option>
                                                                <option @if($properties->de_time_font_size == 0.9) selected @endif value="0.9">2</option>
                                                                <option @if($properties->de_time_font_size == 1) selected @endif value="1">3</option>
                                                                <option @if($properties->de_time_font_size == 1.1) selected @endif value="1.1">4</option>
                                                                <option @if($properties->de_time_font_size == 1.2) selected @endif value="1.2">5</option>
                                                                <option @if($properties->de_time_font_size == 1.3) selected @endif value="1.3">6</option>
                                                                <option @if($properties->de_time_font_size == 1.4) selected @endif value="1.4">7</option>
                                                                <option @if($properties->de_time_font_size == 1.5) selected @endif value="1.5">8</option>
                                                                <option @if($properties->de_time_font_size == 1.7) selected @endif value="1.7">9</option>
                                                                <option @if($properties->de_time_font_size == 1.9) selected @endif value="1.9">10</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="fontColorCloseTime()" type="color" value="{{$properties->de_time_font_color}}" name="de_time_font_color" id="de_time_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="textShadowCloseTime()" type="color" value="{{$properties->de_time_text_shadow_color}}" name="de_time_text_shadow_color" id="de_time_text_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="textShadowCloseTime()" id="de_time_text_shadow_right" type="range" name="de_time_text_shadow_right" value="{{$properties->de_time_text_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="textShadowCloseTime()" id="de_time_text_shadow_bottom" type="range" name="de_time_text_shadow_bottom" value="{{$properties->de_time_text_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="textShadowCloseTime()" id="de_time_text_shadow_blur" type="range" name="de_time_text_shadow_blur" value="{{$properties->de_time_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_show_time') }}</label>
                                                            <select onchange="timeShow()" name="de_show_card_time" id="de_show_card_time" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_show_card_time == 1) selected @endif value="{{true}}">{{ __('main.event_time_show') }}</option>
                                                                <option @if($properties->de_show_card_time == 0) selected @endif value="{{false}}">{{ __('main.event_time_hide') }}</option>
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
                                                            <input onchange="bgCloseColor()" type="color" value="{{$properties->de_background_color_hex}}" name="de_background_color_hex" id="de_background_color_hex" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_trans') }}</label>
                                                            <input onchange="bgCloseColor()" id="de_transparency" type="range" name="de_transparency" value="{{$properties->de_transparency}}" min="0" max="1" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border') }}</label>
                                                            <input onchange="bgRound()" id="de_event_round" type="range" name="de_event_round" value="{{$properties->de_event_round}}" min="0" max="50" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>
                                                            <select onchange="textPosition()" name="de_text_position" id="de_text_position" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_text_position == 'justify-center') selected @endif value="justify-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option @if($properties->de_text_position == 'justify-start') selected @endif value="justify-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option @if($properties->de_text_position == 'justify-end') selected @endif value="justify-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="cardShadow()" type="color" value="{{$properties->de_event_card_shadow_color}}" name="de_event_card_shadow_color" id="de_event_card_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="cardShadow()" id="de_event_card_shadow_right" type="range" name="de_event_card_shadow_right" value="{{$properties->de_event_card_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="cardShadow()" id="de_event_card_shadow_bottom" type="range" name="de_event_card_shadow_bottom" value="{{$properties->de_event_card_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="cardShadow()" id="de_event_card_shadow_blur" type="range" name="de_event_card_shadow_blur" value="{{$properties->de_event_card_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>

                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border_on_off') }}</label>
                                                            <select onchange="border()" name="de_border" id="de_border" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_border == 'border-0') selected @endif value="border-0">0</option>
                                                                <option @if($properties->de_border == 'border') selected @endif value="border">1</option>
                                                                <option @if($properties->de_border == 'border-2') selected @endif value="border-2">2</option>
                                                                <option @if($properties->de_border == 'border-4') selected @endif value="border-4">4</option>
                                                                <option @if($properties->de_border == 'border-8') selected @endif value="border-8">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border_color') }}</label>
                                                            <input onchange="borderColor()" type="color" value="{{$properties->de_border_color}}" name="de_border_color" id="de_border_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>

                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_animation') }}</label>
                                                            <select onchange="animation()" name="event_animation" id="event_animation" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($event->event_animation == '') selected @endif >Select animation</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__bounce animate__infinite infinite') selected @endif value="animate__animated animate__bounce animate__infinite infinite" style="border: 0">Bounce</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__flash animate__infinite infinite') selected @endif value="animate__animated animate__flash animate__infinite infinite" style="border: 0">Flash</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__swing animate__infinite infinite') selected @endif value="animate__animated animate__swing animate__infinite infinite" style="border: 0">Swing</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__tada animate__infinite infinite') selected @endif value="animate__animated animate__tada animate__infinite infinite" style="border: 0">TaDa!</option>
                                                                <option @if($event->event_animation == 'animate__animated animate__heartBeat animate__infinite infinite') selected @endif value="animate__animated animate__heartBeat animate__infinite infinite" style="border: 0">HeartBeat</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-10 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_speed_animation') }}</label>
                                                            <select onchange="animationSpeed()" name="animation_speed" id="animation_speed" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($event->animation_speed == '') selected @endif >None</option>
                                                                <option @if($event->animation_speed == 1) selected @endif value="1" style="border: 0">1 sec.</option>
                                                                <option @if($event->animation_speed == 2) selected @endif value="2" style="border: 0">2 sec.</option>
                                                                <option @if($event->animation_speed == 3) selected @endif value="3" style="border: 0">3 sec.</option>
                                                                <option @if($event->animation_speed == 4) selected @endif value="4" style="border: 0">4 sec.</option>
                                                                <option @if($event->animation_speed == 5) selected @endif value="5" style="border: 0">5 sec.</option>
                                                            </select>
                                                        </div>
                                                        <div class=" text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_modal') }}</label>
                                                            <select name="de_show_modal" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                                <option @if($properties->de_show_modal == 1) selected @endif value="{{true}}">{{ __('main.event_time_show') }}</option>
                                                                <option @if($properties->de_show_modal == 0) selected @endif value="{{false}}">{{ __('main.event_time_hide') }}</option>
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
                                                                <option value="{{$properties->de_oc_city_font}}" selected>{{$properties->de_oc_city_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openCityFontSize()" id="de_oc_city_font_size" type="range" name="de_oc_city_font_size" value="{{$properties->de_oc_city_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openCityFontColor()" type="color" value="{{$properties->de_oc_city_font_color}}" name="de_oc_city_font_color" id="de_oc_city_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openCityFontShadow()" type="color" value="{{$properties->de_oc_city_font_shadow_color}}" name="de_oc_city_font_shadow_color" id="de_oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openCityFontShadow()" id="de_oc_city_font_shadow_right" type="range" name="de_oc_city_font_shadow_right" value="{{$properties->de_oc_city_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openCityFontShadow()" id="de_oc_city_font_shadow_bottom" type="range" name="de_oc_city_font_shadow_bottom" value="{{$properties->de_oc_city_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openCityFontShadow()" id="de_oc_city_font_shadow_blur" type="range" name="de_oc_city_font_shadow_blur" value="{{$properties->de_oc_city_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option value="{{$properties->de_oc_location_font}}" selected>{{$properties->de_oc_location_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openLocationFontSize()" id="de_oc_location_font_size" type="range" name="de_oc_location_font_size" value="{{$properties->de_oc_location_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openLocationFontColor()" type="color" value="{{$properties->de_oc_location_font_color}}" name="de_oc_location_font_color" id="de_oc_location_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openLocationFontShadow()" type="color" value="{{$properties->de_oc_location_font_shadow_color}}" name="de_oc_location_font_shadow_color" id="de_oc_location_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openLocationFontShadow()" id="de_oc_location_font_shadow_right" type="range" name="de_oc_location_font_shadow_right" value="{{$properties->de_oc_location_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openLocationFontShadow()" id="de_oc_location_font_shadow_bottom" type="range" name="de_oc_location_font_shadow_bottom" value="{{$properties->de_oc_location_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openLocationFontShadow()" id="de_oc_location_font_shadow_blur" type="range" name="de_oc_location_font_shadow_blur" value="{{$properties->de_oc_location_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option value="{{$properties->de_oc_date_font}}" selected>{{$properties->de_oc_date_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openDateFontSize()" id="de_oc_date_font_size" type="range" name="de_oc_date_font_size" value="{{$properties->de_oc_date_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openDateFontColor()" type="color" name="de_oc_date_font_color" value="{{$properties->de_oc_date_font_color}}" id="de_oc_date_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openDateFontShadow()" type="color" value="{{$properties->de_oc_date_font_shadow_color}}" name="de_oc_date_font_shadow_color" id="de_oc_date_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openDateFontShadow()" id="de_oc_date_font_shadow_right" type="range" name="de_oc_date_font_shadow_right" value="{{$properties->de_oc_date_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openDateFontShadow()" id="de_oc_date_font_shadow_bottom" type="range" name="de_oc_date_font_shadow_bottom" value="{{$properties->de_oc_date_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openDateFontShadow()" id="de_oc_date_font_shadow_blur" type="range" name="de_oc_date_font_shadow_blur" value="{{$properties->de_oc_date_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option value="{{$properties->de_oc_time_font}}" selected>{{$properties->de_oc_time_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openTimeFontSize()" id="de_oc_time_font_size" type="range" name="de_oc_time_font_size" value="{{$properties->de_oc_time_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openTimeFontColor()" type="color" value="{{$properties->de_oc_time_font_color}}" name="de_oc_time_font_color" id="de_oc_time_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openTimeFontShadow()" type="color" value="{{$properties->de_oc_time_font_shadow_color}}" name="de_oc_time_font_shadow_color" id="de_oc_time_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openTimeFontShadow()" id="de_oc_time_font_shadow_right" type="range" name="de_oc_time_font_shadow_right" value="{{$properties->de_oc_time_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openTimeFontShadow()" id="de_oc_time_font_shadow_bottom" type="range" name="de_oc_time_font_shadow_bottom" value="{{$properties->de_oc_time_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openTimeFontShadow()" id="de_oc_time_font_shadow_blur" type="range" name="de_oc_time_font_shadow_blur" value="{{$properties->de_oc_time_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option @if($properties->de_oc_title_position == 'text-center') selected @endif value="text-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option @if($properties->de_oc_title_position == 'text-start') selected @endif value="text-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option @if($properties->de_oc_title_position == 'text-end') selected @endif value="text-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openTitleFont()" name="de_oc_title_font" id="de_oc_title_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                                                <option value="{{$properties->de_oc_title_font}}" selected>{{$properties->de_oc_title_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openTitleFontSize()" id="de_oc_title_font_size" type="range" name="de_oc_title_font_size" value="{{$properties->de_oc_title_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openTitleFontColor()" type="color" value="{{$properties->de_oc_title_font_color}}" name="de_oc_title_font_color" id="de_oc_title_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openTitleFontShadow()" type="color" value="{{$properties->de_oc_title_font_shadow_color}}" name="de_oc_title_font_shadow_color" id="de_oc_title_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openTitleFontShadow()" id="de_oc_title_font_shadow_right" type="range" name="de_oc_title_font_shadow_right" value="{{$properties->de_oc_title_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openTitleFontShadow()" id="de_oc_title_font_shadow_bottom" type="range" name="de_oc_title_font_shadow_bottom" value="{{$properties->de_oc_title_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openTitleFontShadow()" id="de_oc_title_font_shadow_blur" type="range" name="de_oc_title_font_shadow_blur" value="{{$properties->de_oc_title_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option @if($properties->de_oc_description_position == 'text-center') selected @endif value="text-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option @if($properties->de_oc_description_position == 'text-start') selected @endif value="text-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option @if($properties->de_oc_description_position == 'text-end') selected @endif value="text-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>
                                                            <select onchange="openDescrFont()" name="de_oc_description_font" id="de_oc_description_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                                                <option value="{{$properties->de_oc_description_font}}" selected>{{$properties->de_oc_description_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openDescrFontSize()" id="de_oc_description_font_size" type="range" name="de_oc_description_font_size" value="{{$properties->de_oc_description_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>
                                                            <input onchange="openDescrFontColor()" type="color" value="{{$properties->de_oc_description_font_color}}" name="de_oc_description_font_color" id="de_oc_description_font_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>
                                                            <input onchange="openDescrFontShadow()" type="color" value="{{$properties->de_oc_description_font_shadow_color}}" name="de_oc_description_font_shadow_color" id="de_oc_description_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openDescrFontShadow()" id="de_oc_description_font_shadow_right" type="range" name="de_oc_description_font_shadow_right" value="{{$properties->de_oc_description_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openDescrFontShadow()" id="de_oc_description_font_shadow_bottom" type="range" name="de_oc_description_font_shadow_bottom" value="{{$properties->de_oc_description_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openDescrFontShadow()" id="de_oc_description_font_shadow_blur" type="range" name="de_oc_description_font_shadow_blur" value="{{$properties->de_oc_description_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
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
                                                                <option @if($properties->de_oc_text_position == 'justify-center') selected @endif value="justify-center">{{ __('main.event_card_other_position_c') }}</option>
                                                                <option @if($properties->de_oc_text_position == 'justify-start') selected @endif value="justify-start">{{ __('main.event_card_other_position_l') }}</option>
                                                                <option @if($properties->de_oc_text_position == 'justify-end') selected @endif value="justify-end">{{ __('main.event_card_other_position_r') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_color') }}</label>
                                                            <input onchange="openOtherBgColor()" type="color" value="{{$properties->de_oc_bg_color}}" name="de_oc_bg_color" id="de_oc_bg_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_font') }}</label>
                                                            <select onchange="openBtnFont()" name="de_oc_btn_text_font" id="de_oc_btn_text_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                                                                <option value="{{$properties->de_oc_btn_text_font}}" selected>{{$properties->de_oc_btn_text_font}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>
                                                            <input onchange="openBtnFontSize()" id="de_oc_btn_text_font_size" type="range" name="de_oc_btn_text_font_size" value="{{$properties->de_oc_btn_text_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_color') }}</label>
                                                            <input onchange="openBgFontColor()" type="color" value="{{$properties->de_oc_btn_color}}" name="de_oc_btn_color" id="de_oc_btn_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_text_color') }}</label>
                                                            <input onchange="openBtnFontColor()" type="color" value="{{$properties->de_oc_btn_text_color}}" name="de_oc_btn_text_color" id="de_oc_btn_text_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_text_shadow_color') }}</label>
                                                            <input onchange="openBtnFontShadow()" type="color" value="{{$properties->de_oc_btn_text_font_shadow_color}}" name="de_oc_btn_text_font_shadow_color" id="de_oc_btn_text_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>
                                                            <input onchange="openBtnFontShadow()" id="de_oc_btn_text_font_shadow_right" type="range" name="de_oc_btn_text_font_shadow_right" value="{{$properties->de_oc_btn_text_font_shadow_right}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="mb-8 text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>
                                                            <input onchange="openBtnFontShadow()" id="de_oc_btn_text_font_shadow_bottom" type="range" name="de_oc_btn_text_font_shadow_bottom" value="{{$properties->de_oc_btn_text_font_shadow_bottom}}" min="-10" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                        <div class="text-center">
                                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>
                                                            <input onchange="openBtnFontShadow()" id="de_oc_btn_text_font_shadow_blur" type="range" name="de_oc_btn_text_font_shadow_blur" value="{{$properties->de_oc_btn_text_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 px-4 mb-5">
                                            <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                                {{ __('main.user_upd_btn_profile') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <section>
                    </div>
                    <div class="hidden p-4 matureBlock bg-white" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="group block" id="matureBlock">

                            @include('event.types.' . $user->eventSettings->close_card_type, ['event' => $event, 'properties' => (object) unserialize($event->properties)])

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
                    <div class="hidden p-4 matureBlock2 bg-white" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="group block">

                            @include('event.open-cart.' . $user->eventSettings->open_card_type, ['event' => $event])

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

        let cityName;
        new TomSelect('#select-city',{
            valueField: 'id',
            searchField: 'name',
            maxOptions: 1,
            options: [
                    @foreach($cities as $city)
                {id: {{$city->id}}, name: '{{$city->name}}'},
                @endforeach
            ],
            render: {
                option: function(data, escape) {
                    cityName = data.name;
                    $('#city-field').html(cityName);
                    $('#open-city-field').html(cityName);
                    return  '<h4 class="font-medium" style="font-size: 1.5rem;">' + escape(data.name) + '</h4>';
                },
                item: function(data, escape) {
                    return  '<h4 class="font-medium" style="font-size: 1.5rem;">' + escape(data.name) + '</h4>';
                }
            },
        });

        $('#datepicker').on('click', function(){
            $(".datepicker-picker").show();
        });

        $('#datepicker').on('changeDate', function(){
            $(".datepicker-picker").hide();
        });

        //bg color
        $( document ).ready(function() {
            $("#switch-bg").click(function() {
                var type = $(this).is(':checked');
                if(type) {
                    $(".matureBlock").removeClass('bg-white bg-black').addClass('bg-black');
                } else {
                    $(".matureBlock").removeClass('bg-black bg-white').addClass('bg-white');
                }
            })
        });

        $( document ).ready(function() {
            $("#switch-bg2").click(function() {
                var type = $(this).is(':checked');
                if(type) {
                    $(".matureBlock2").removeClass('bg-white bg-black').addClass('bg-black');
                } else {
                    $(".matureBlock2").removeClass('bg-black bg-white').addClass('bg-white');
                }
            })
        });

        //font
        function city() {
            var cityId = document.getElementById('select-city').value;
        }

        //location open-location-field
        $('#location').keyup(function() {
            var val = $('#location').val();
            $('#open-location-field').html(val);
            $('#location-field').html(val);
        });

        // date . . .
        let dateFiled;
        $('#datepicker').on('change', function() {
            var date = $('#datepicker').val();
            str = date.replace(/-/g, ".");
            let parts = date.split("-");
            let newStr = parts[2] + "." + parts[1] + "." + parts[0];

            $('#open-date-field').html(newStr);
            $('#date-field').html(newStr);

            dateFiled = newStr;
        })

        //time
        $('#time').keyup(function() {
            var val = $('#time').val();
            $('#open-time-field').html(val);
            $('#time-field').html(val);
        });

        //banner
        document.getElementById('avatar').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    @if($user->eventSettings->close_card_type == 4)
                    document.getElementById('avatar-user').setAttribute('src', e.target.result);
                    $("#block-4-img").addClass("bg-[url(" + e.target.result + ")]");
                    @elseif($user->eventSettings->close_card_type == 3)
                    $("#block-3-img").addClass("bg-[url(" + e.target.result + ")]");
                    $("#block-4-img").addClass("bg-[url(" + e.target.result + ")]");
                    @elseif($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
                    $("#block-4-img").addClass("bg-[url(" + e.target.result + ")]");
                    @endif
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        //description
        $('#description').keyup(function() {
            var val = $('#description').val();
            let limit = 100;
            let shortStr = val.substring(0, limit);
            if (val.length > limit) {
                shortStr += '...';
            }
            $('#description-field').html(shortStr);
        });

        //title
        $('#title').keyup(function() {
            var val = $('#title').val();
            $('#title-field').html(val);
        });

        //ticket link
        $('#ticket_link_text').keyup(function() {
            var val = $('#ticket_link_text').val();
            $('#ticket-link-text-field').html(val);
        });

        //video
        $('#video').keyup(function() {
            var video = $('#video').val();
            str = video.replace("watch?v=", "embed/");
            str += "?controls=0";
            console.log(str);

            $('#video-block').html(
                `
                    <iframe
                        width="100%"
                        height="100%"
                        src="` + str + `"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                `
            );
        });

        //++++++++++++++++++++++++++++++ City
        //city font close
        function fontClose() {
            var font = document.getElementById('de_city_font').value;
            document.getElementById('open-city-field').style.fontFamily = font;
        }
        //city font size close
        function fontSizeClose() {
            var fontSize = document.getElementById('de_city_font_size').value;
            document.getElementById('open-city-field').style.fontSize = fontSize + 'rem';
        }
        //city font color close
        function fontColorClose() {
            var textColor = document.getElementById('de_city_font_color').value;
            document.getElementById('open-city-field').style.color = textColor;
        }
        //city font text-shadow
        function textShadowClose() {
            var textShadowColor = document.getElementById('de_city_text_shadow_color').value;
            var right = document.getElementById('de_city_text_shadow_right').value;
            var bottom = document.getElementById('de_city_text_shadow_bottom').value;
            var blur = document.getElementById('de_city_text_shadow_blur').value;

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('open-city-field').style.textShadow = textShadow;
        }
        //++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++ Location
        //location font close
        function fontCloseLocation() {
            var font = document.getElementById('de_location_font').value;
            document.getElementById('open-location-field').style.fontFamily = font;
        }
        //location font size close
        function fontSizeCloseLocation() {
            var fontSize = document.getElementById('de_location_font_size').value;
            document.getElementById('open-location-field').style.fontSize = fontSize + 'rem';
        }
        //location font color close
        function fontColorCloseLocation() {
            var textColor = document.getElementById('de_location_font_color').value;
            document.getElementById('open-location-field').style.color = textColor;
        }
        //location font text-shadow
        function textShadowCloseLocation() {
            var textShadowColor = document.getElementById('de_location_text_shadow_color').value;
            var right = document.getElementById('de_location_text_shadow_right').value;
            var bottom = document.getElementById('de_location_text_shadow_bottom').value;
            var blur = document.getElementById('de_location_text_shadow_blur').value;

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('open-location-field').style.textShadow = textShadow;
        }
        //++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++ Date
        //date font close
        function fontCloseDate() {
            var font = document.getElementById('de_date_font').value;
            document.getElementById('open-date-field').style.fontFamily = font;
        }
        //date font size close
        function fontCloseDateSize() {
            var fontSize = document.getElementById('de_date_font_size').value;
            document.getElementById('open-date-field').style.fontSize = fontSize + 'rem';
        }
        //date font color close
        function fontColorCloseDate() {
            var textColor = document.getElementById('de_date_font_color').value;
            document.getElementById('open-date-field').style.color = textColor;
        }
        //date font text-shadow
        function textShadowCloseDate() {
            var textShadowColor = document.getElementById('de_date_text_shadow_color').value;
            var right = document.getElementById('de_date_text_shadow_right').value;
            var bottom = document.getElementById('de_date_text_shadow_bottom').value;
            var blur = document.getElementById('de_date_text_shadow_blur').value;

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('open-date-field').style.textShadow = textShadow;
        }
        //data type

        var date = $('#datepicker').val();
        str = date.replace(/-/g, ".");
        let parts = date.split("-");
        let newDate = parts[2] + "." + parts[1] + "." + parts[0];

        function closeDateType() {
            var type = document.getElementById('de_date_format').value;
            if(type == 1) { //31.12.2015
                $('#open-date-field').html(newDate);
            } else if(type == 2) { //31.12
                let dateArr = newDate.split(".");
                let formattedDate = dateArr[0] + "." + dateArr[1];
                $('#open-date-field').html(formattedDate);
            } else if(type == 3) { //Dec. 31, 2015
                let dateArr = newDate.split(".");
                console.log(dateArr[1])
                switch (dateArr[1]) {
                    case '01':
                        $('#open-date-field').html('Jan. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '02':
                        $('#open-date-field').html('Feb. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '03':
                        $('#open-date-field').html('Mar. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '04':
                        $('#open-date-field').html('Apr. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '05':
                        $('#open-date-field').html('May ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '06':
                        $('#open-date-field').html('Jun. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '07':
                        $('#open-date-field').html('Jul. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '08':
                        $('#open-date-field').html('Aug. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '09':
                        $('#open-date-field').html('Sep. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '10':
                        $('#open-date-field').html('Oct. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '11':
                        $('#open-date-field').html('Nov. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                    case '12':
                        $('#open-date-field').html('Dec. ' + dateArr[0] + ', ' + dateArr[2]);
                        break;
                }
            }
        }
        //++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++ Time
        //time font close
        function fontCloseTime() {
            var font = document.getElementById('de_time_font').value;
            document.getElementById('open-time-field').style.fontFamily = font;
        }
        //time font size close
        function fontCloseTimeSize() {
            var fontSize = document.getElementById('de_time_font_size').value;
            document.getElementById('open-time-field').style.fontSize = fontSize + 'rem';
        }
        //time font color close
        function fontColorCloseTime() {
            var textColor = document.getElementById('de_time_font_color').value;
            document.getElementById('open-time-field').style.color = textColor;
        }
        //time font text-shadow
        function textShadowCloseTime() {
            var textShadowColor = document.getElementById('de_time_text_shadow_color').value;
            var right = document.getElementById('de_time_text_shadow_right').value;
            var bottom = document.getElementById('de_time_text_shadow_bottom').value;
            var blur = document.getElementById('de_time_text_shadow_blur').value;

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('open-time-field').style.textShadow = textShadow;
        }
        //show time
        var show = {{$properties->de_show_card_time}};
        if(show == 1) {
            $("#open-time-field").show()
        } else {
            $("#open-time-field").hide()
        }
        function timeShow() {
            var time = document.getElementById('de_show_card_time').value;
            if(time == 1) {
                $("#open-time-field").show()
            } else {
                $("#open-time-field").hide()
            }
        }
        //++++++++++++++++++++++++++++++ Other settings Close
        function bgCloseColor() {
            var bgColor = document.getElementById('de_background_color_hex').value;
            var transparency = document.getElementById('de_transparency').value;

            let hex = bgColor.replace('#', '');
            if (hex.length === 3) {
                hex = `${hex[0]}${hex[0]}${hex[1]}${hex[1]}${hex[2]}${hex[2]}`;
            }

            const r = parseInt(hex.substring(0, 2), 16);
            const g = parseInt(hex.substring(2, 4), 16);
            const b = parseInt(hex.substring(4, 6), 16);

            var rgb = 'rgb(' + r+',' + ' ' + g+',' + ' ' + b+',' + ' ' + Number(transparency) + ')';
            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            document.getElementById('bg-block').style.backgroundColor = rgb;
            @endif
            @if($user->eventSettings->close_card_type == 4)
            document.getElementById('bg-4').style.backgroundColor = rgb;
            @endif
        }
        //border round
        function bgRound() {
            var radius = document.getElementById('de_event_round').value;
            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            document.getElementById('bg-block').style.borderRadius = radius + 'px';
            @elseif($user->eventSettings->close_card_type == 3)
            document.getElementById('block-3-img').style.borderRadius = radius + 'px';
            @elseif($user->eventSettings->close_card_type == 4)
            document.getElementById('bg-round-card').style.borderRadius = radius + 'px';
            @endif
        }
        //text-position
        function textPosition() {
            var position = document.getElementById('de_text_position').value;
            @if($user->eventSettings->close_card_type == 1)
            $("#card-1-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
            $("#card-1-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
            @elseif($user->eventSettings->close_card_type == 2)
            $("#card-2-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
            $("#card-2-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
            $("#card-2-position-3").removeClass('justify-center justify-start justify-end').addClass(position);
            @elseif($user->eventSettings->close_card_type == 3)
            $("#card-3-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
            $("#card-3-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
            @elseif($user->eventSettings->close_card_type == 4)
            $("#card-4-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
            $("#card-4-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
            @endif
        }
        //card shadow
        function cardShadow() {
            var color = document.getElementById('de_event_card_shadow_color').value;
            var r = document.getElementById('de_event_card_shadow_right').value;
            var b = document.getElementById('de_event_card_shadow_bottom').value;
            var bl = document.getElementById('de_event_card_shadow_blur').value;

            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;

            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            document.getElementById('bg-block').style.boxShadow = cardColor;
            @elseif($user->eventSettings->close_card_type == 3)
            document.getElementById('block-3-img').style.boxShadow = cardColor;
            @elseif($user->eventSettings->close_card_type == 4)
            document.getElementById('bg-round-card').style.boxShadow = cardColor;
            @endif
        }
        //border color
        function borderColor() {
            var borderColor = document.getElementById('de_border_color').value;
            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            document.getElementById('bg-block').style.borderColor = borderColor;
            @elseif($user->eventSettings->close_card_type == 3)
            document.getElementById('block-3-img').style.borderColor = borderColor;
            @elseif($user->eventSettings->close_card_type == 4)
            document.getElementById('bg-round-card').style.borderColor = borderColor;
            @endif
        }
        //border
        function border() {
            var border = document.getElementById('de_border').value;
            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            $("#bg-block").removeClass('border border-2 border-4 border-8').addClass(border);
            @elseif($user->eventSettings->close_card_type == 3)
            $("#block-3-img").removeClass('border border-2 border-4 border-8').addClass(border);
            @elseif($user->eventSettings->close_card_type == 4)
            $("#bg-round-card").removeClass('border border-2 border-4 border-8').addClass(border);
            @endif
        }
        //animation
        function animation() {
            var animation = document.getElementById('event_animation').value;
            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            $("#bg-block").removeClass('animate__animated animate__infinite infinite animate__pulse animate__headShake animate__bounce animate__flash animate__swing animate__tada animate__heartBeat').addClass(animation);
            @elseif($user->eventSettings->close_card_type == 3 || $user->eventSettings->close_card_type == 4)
            // document.getElementById('anim-3').className = animation;
            $("#bg-block").removeClass('animate__animated animate__infinite infinite animate__pulse animate__headShake animate__bounce animate__flash animate__swing animate__tada animate__heartBeat').addClass(animation);
            @endif
        }
        //animation speed
        function animationSpeed() {
            var speed = document.getElementById('animation_speed').value;
            @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
            document.getElementById('bg-block').style.animationDuration = speed + 's';
            @elseif($user->eventSettings->close_card_type == 3 || $user->eventSettings->close_card_type == 4)
            // document.getElementById('anim-3').style.animationDuration = speed + 's';
            document.getElementById('bg-block').style.animationDuration = speed + 's';
            @endif
        }
        ///////////////////////////////////////////////////////////
        ///////////Open Card //////////
        ///////////////////////////////////////////////////////////
        //open city font
        function openCityFont() {
            var font = document.getElementById('de_oc_city_font').value;
            document.getElementById('city-field').style.fontFamily = font;
        }
        //open city font size
        function openCityFontSize() {
            var size = document.getElementById('de_oc_city_font_size').value;
            document.getElementById('city-field').style.fontSize = size + 'rem';
        }
        //font color
        function openCityFontColor() {
            var color = document.getElementById('de_oc_city_font_color').value;
            document.getElementById('city-field').style.color = color;
        }
        //font shadow
        function openCityFontShadow() {
            var color = document.getElementById('de_oc_city_font_shadow_color').value;
            var r = document.getElementById('de_oc_city_font_shadow_right').value;
            var b = document.getElementById('de_oc_city_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_city_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('city-field').style.textShadow = cardColor;
        }

        //open location font
        function openLocationFont() {
            var font = document.getElementById('de_oc_location_font').value;
            document.getElementById('location-field').style.fontFamily = font;
        }
        //open location font size
        function openLocationFontSize() {
            var size = document.getElementById('de_oc_location_font_size').value;
            document.getElementById('location-field').style.fontSize = size + 'rem';
        }
        //open location font color
        function openLocationFontColor() {
            var color = document.getElementById('de_oc_location_font_color').value;
            document.getElementById('location-field').style.color = color;
        }
        //open location font shadow
        function openLocationFontShadow() {
            var color = document.getElementById('de_oc_location_font_shadow_color').value;
            var r = document.getElementById('de_oc_location_font_shadow_right').value;
            var b = document.getElementById('de_oc_location_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_location_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('location-field').style.textShadow = cardColor;
        }

        //open date font
        function openDateFont() {
            var font = document.getElementById('de_oc_date_font').value;
            document.getElementById('date-field').style.fontFamily = font;
        }
        //open date font size
        function openDateFontSize() {
            var size = document.getElementById('de_oc_date_font_size').value;
            document.getElementById('date-field').style.fontSize = size + 'rem';
        }
        //open date font color
        function openDateFontColor() {
            var color = document.getElementById('de_oc_date_font_color').value;
            document.getElementById('date-field').style.color = color;
        }
        //open date font shadow
        function openDateFontShadow() {
            var color = document.getElementById('de_oc_date_font_shadow_color').value;
            var r = document.getElementById('de_oc_date_font_shadow_right').value;
            var b = document.getElementById('de_oc_date_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_date_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('date-field').style.textShadow = cardColor;
        }

        //open time font
        function openTimeFont() {
            var font = document.getElementById('de_oc_time_font').value;
            document.getElementById('time-field').style.fontFamily = font;
        }
        //open time font size
        function openTimeFontSize() {
            var size = document.getElementById('de_oc_time_font_size').value;
            document.getElementById('time-field').style.fontSize = size + 'rem';
        }
        //open time font color
        function openTimeFontColor() {
            var color = document.getElementById('de_oc_time_font_color').value;
            document.getElementById('time-field').style.color = color;
        }
        //open time font shadow
        function openTimeFontShadow() {
            var color = document.getElementById('de_oc_time_font_shadow_color').value;
            var r = document.getElementById('de_oc_time_font_shadow_right').value;
            var b = document.getElementById('de_oc_time_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_time_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('time-field').style.textShadow = cardColor;
        }

        //open title position
        function titlePosition() {
            var position = document.getElementById('de_oc_title_position').value;
            $('#title-position').removeClass('text-center text-end text-start').addClass(position);
        }
        //open title font
        function openTitleFont() {
            var font = document.getElementById('de_oc_title_font').value;
            document.getElementById('title-field').style.fontFamily = font;
        }
        //open title font size

        function openTitleFontSize() {
            var size = document.getElementById('de_oc_title_font_size').value;
            document.getElementById('title-field').style.fontSize = size + 'rem';
        }

        //open title font color
        function openTitleFontColor() {
            var color = document.getElementById('de_oc_title_font_color').value;
            document.getElementById('title-field').style.color = color;
        }
        //open title font shadow
        function openTitleFontShadow() {
            var color = document.getElementById('de_oc_title_font_shadow_color').value;
            var r = document.getElementById('de_oc_title_font_shadow_right').value;
            var b = document.getElementById('de_oc_title_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_title_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('title-field').style.textShadow = cardColor;
        }

        //open descr position
        function descrPosition() {
            var position = document.getElementById('de_oc_description_position').value;
            $('#descr-position').removeClass('text-center text-end text-start').addClass(position);
        }
        //open descr font
        function openDescrFont() {
            var font = document.getElementById('de_oc_description_font').value;
            document.getElementById('description-field').style.fontFamily = font;
        }
        //open descr font size
        function openDescrFontSize() {
            var size = document.getElementById('de_oc_description_font_size').value;
            document.getElementById('description-field').style.fontSize = size + 'rem';
        }
        //open descr font color
        function openDescrFontColor() {
            var color = document.getElementById('de_oc_description_font_color').value;
            document.getElementById('description-field').style.color = color;
        }
        //open descr font shadow
        function openDescrFontShadow() {
            var color = document.getElementById('de_oc_description_font_shadow_color').value;
            var r = document.getElementById('de_oc_description_font_shadow_right').value;
            var b = document.getElementById('de_oc_description_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_description_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('description-field').style.textShadow = cardColor;
        }

        //open other position
        function otherPosition() {
            var position = document.getElementById('de_oc_text_position').value;
            @if($user->eventSettings->open_card_type == 1)
            $('#pos-1-1').removeClass('justify-center justify-end justify-start').addClass(position);
            $('#pos-1-2').removeClass('justify-center justify-end justify-start').addClass(position);
            $('#pos-1-3').removeClass('justify-center justify-end justify-start').addClass(position);
            @elseif($user->eventSettings->open_card_type == 2)
            $('#pos-2-1').removeClass('justify-center justify-end justify-start').addClass(position);
            $('#pos-2-2').removeClass('justify-center justify-end justify-start').addClass(position);
            @elseif($user->eventSettings->open_card_type == 3)
            // $('#pos-3-1').removeClass('justify-center justify-end justify-start').addClass(position);
            $('#pos-3-2').removeClass('justify-center justify-end justify-start').addClass(position);
            $('#pos-3-3').removeClass('justify-center justify-end justify-start').addClass(position);
            @endif
        }
        //bg color
        function openOtherBgColor() {
            var color = document.getElementById('de_oc_bg_color').value;
            @if($user->eventSettings->open_card_type == 1)
            document.getElementById('title-position').style.backgroundColor = color;
            document.getElementById('descr-position').style.backgroundColor = color;
            @elseif($user->eventSettings->open_card_type == 2)
            document.getElementById('title-position').style.backgroundColor = color;
            document.getElementById('pos-2-1').style.backgroundColor = color;
            document.getElementById('pos-2-2').style.backgroundColor = color;
            document.getElementById('descr-position').style.backgroundColor = color;
            @elseif($user->eventSettings->open_card_type == 3)
            document.getElementById('pos-3-1').style.backgroundColor = color;
            document.getElementById('pos-3-2').style.backgroundColor = color;
            document.getElementById('pos-3-3').style.backgroundColor = color;
            document.getElementById('descr-position').style.backgroundColor = color;
            @endif
        }
        //open btn font
        function openBtnFont() {
            var font = document.getElementById('de_oc_btn_text_font').value;
            document.getElementById('ticket-link-text-field').style.fontFamily = font;
        }
        //open btn font size
        function openBtnFontSize() {
            var size = document.getElementById('de_oc_btn_text_font_size').value;
            document.getElementById('ticket-link-text-field').style.fontSize = size + 'rem';
        }
        //open btn color
        function openBgFontColor() {
            var color = document.getElementById('de_oc_btn_color').value;
            document.getElementById('ticket-link-text-field').style.backgroundColor = color;
        }
        //open btn font color
        function openBtnFontColor() {
            var color = document.getElementById('de_oc_btn_text_color').value;
            document.getElementById('ticket-link-text-field').style.color = color;
        }
        //open btn font shadow
        function openBtnFontShadow() {
            var color = document.getElementById('de_oc_btn_text_font_shadow_color').value;
            var r = document.getElementById('de_oc_btn_text_font_shadow_right').value;
            var b = document.getElementById('de_oc_btn_text_font_shadow_bottom').value;
            var bl = document.getElementById('de_oc_btn_text_font_shadow_blur').value;
            var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
            document.getElementById('ticket-link-text-field').style.textShadow = cardColor;
        }
    </script>

{{--    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">--}}
{{--        <div class="relative p-2 w-full max-w-md h-full md:h-auto">--}}
{{--            <!-- modal card element -->--}}
{{--            @include('event.open-cart.' . $user->eventSettings->open_card_type, ['event' => $event])--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <section class="flex justify-center">--}}
{{--        <div class="w-full mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">--}}
{{--            <div id="design" class=" px-4 py-4 mb-8 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                @if($user->avatar)--}}
{{--                    <div class="flex justify-center">--}}
{{--                        <figure class="max-w-lg">--}}
{{--                            <img class="w-full rounded-lg mb-3" src="{{ '/'. $event->banner }}" alt="image description">--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <form action="{{ route('editEventBanner', ['user' => $user->id, 'event' => $event->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')--}}
{{--                    <div class="mb-3 text-center">--}}
{{--                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_banner') }}</mark></label>--}}
{{--                        <input name="banner" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">--}}
{{--                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">{{ __('main.event_banner_descr') }}</p>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3">--}}
{{--                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">--}}
{{--                            {{ __('main.event_upd_banner') }}--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">--}}
{{--        <div class="mx-auto max-w-screen-xl px-4 lg:px-8 sm:px-8">--}}

{{--                <form action="{{ route('editEvent', ['user' => $user->id, 'event' => $event->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')--}}
{{--                    <div class="px-4 py-4 mb-8 w-full mx-auto max-w-screen-xl shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_city') }}</mark></label>--}}
{{--                            <input value="{{$event->city}}" name="city" maxlength="100" style="border: none" class="mt-1 bg-gray-50 text-gray-500 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_location') }}</mark></label>--}}
{{--                            <input value="{{$event->location}}" name="location" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-500 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_date') }}</mark></label>--}}
{{--                            <div class="relative mt-1">--}}
{{--                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">--}}
{{--                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>--}}
{{--                                </div>--}}
{{--                                <input id="datepicker" name="date" value="{{ Carbon\Carbon::parse($event->date)->format('m/d/Y') }}" datepicker type="text" style="border: none" class="bg-gray-50 text-gray-500 text-sm rounded-lg block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif " placeholder="Select date">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600"><mark class="px-2 text-white bg-indigo-900 rounded dark:bg-indigo-900">{{ __('main.event_time') }}</mark></label>--}}
{{--                            <input name="time" value="{{$event->time}}" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-500 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_descr') }}</label>--}}
{{--                            <textarea id="message" rows="4" name="description" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$event->description}}</textarea>--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_title') }}</label>--}}
{{--                            <input name="title" value="{{$event->title}}" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-500 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_tickets') }}</label>--}}
{{--                            <input name="tickets" value="{{$event->tickets}}" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-500 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_tickets_btn_text') }}</label>--}}
{{--                            <input name="btn_text" value="{{$event->btn_text}}" placeholder="Title for event button" maxlength="100" id="title" style="border: none" class="mt-1 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_video') }}</label>--}}
{{--                            <textarea id="message" rows="2" name="video" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$event->video}}</textarea>--}}
{{--                        </div>--}}
{{--                        <div class="mb-6 text-center">--}}
{{--                            <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_media') }}</label>--}}
{{--                            <textarea id="message" rows="2" name="media" style="border: none" class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-blue-500 focus:border-blue-500 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$event->media}}</textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="block-1" class="mb-3  text-center rounded-lg p-5 ">--}}
{{--                        <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{ __('main.event_styles') }}</p>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-1">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">--}}
{{--                                    <span>{{ __('main.event_card_city') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">--}}
{{--                                <div id="design" class="py-4 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_city_font" id="de_city_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_city_font}}">{{$properties->de_city_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <select name="de_city_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-600 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_city_font_size == 0.8) selected @endif value="0.8">1</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 0.9) selected @endif value="0.9">2</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1) selected @endif value="1">3</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.1) selected @endif value="1.1">4</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.2) selected @endif value="1.2">5</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.3) selected @endif value="1.3">6</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.4) selected @endif value="1.4">7</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.5) selected @endif value="1.5">8</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.7) selected @endif value="1.7">9</option>--}}
{{--                                            <option @if($properties->de_city_font_size == 1.9) selected @endif value="1.9">10</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_city_font_color}}" name="de_city_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_city_text_shadow_color}}" name="de_city_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_city_text_shadow_right" value="{{$properties->de_city_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_city_text_shadow_bottom" value="{{$properties->de_city_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_city_text_shadow_blur" value="{{$properties->de_city_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-2">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">--}}
{{--                                    <span>{{ __('main.event_card_location') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">--}}
{{--                                <div id="design" class="py-4 mt-8 mb-8 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_location_font" id="de_location_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_location_font}}">{{$properties->de_location_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <select name="de_location_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_location_font_size == 0.8) selected @endif value="0.8">1</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 0.9) selected @endif value="0.9">2</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1) selected @endif value="1">3</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.1) selected @endif value="1.1">4</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.2) selected @endif value="1.2">5</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.3) selected @endif value="1.3">6</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.4) selected @endif value="1.4">7</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.5) selected @endif value="1.5">8</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.7) selected @endif value="1.7">9</option>--}}
{{--                                            <option @if($properties->de_location_font_size == 1.9) selected @endif value="1.9">10</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_location_font_color}}" name="de_location_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_location_text_shadow_color}}" name="de_location_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_location_text_shadow_right" value="{{$properties->de_location_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_location_text_shadow_bottom" value="{{$properties->de_location_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_location_text_shadow_blur" value="{{$properties->de_location_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-3">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">--}}
{{--                                    <span>{{ __('main.event_card_date') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">--}}
{{--                                <div id="design-2" class="pt-4 pb-4 mt-8 mb-8 w-full mx-auto max-w-screen-xl sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_date_font" id="de_date_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_date_font}}">{{$properties->de_date_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <select name="de_date_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_date_font_size == 0.8) selected @endif value="0.8">1</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 0.9) selected @endif value="0.9">2</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1) selected @endif value="1">3</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.1) selected @endif value="1.1">4</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.2) selected @endif value="1.2">5</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.3) selected @endif value="1.3">6</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.4) selected @endif value="1.4">7</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.5) selected @endif value="1.5">8</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.7) selected @endif value="1.7">9</option>--}}
{{--                                            <option @if($properties->de_date_font_size == 1.9) selected @endif value="1.9">10</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_date_font_color}}" name="de_date_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input value="{{$properties->de_date_text_shadow_color}}" type="color" name="de_date_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_date_text_shadow_right" value="{{$properties->de_date_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_date_text_shadow_bottom" value="{{$properties->de_date_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_date_text_shadow_blur" value="{{$properties->de_date_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_date_format') }}</label>--}}
{{--                                        <select name="de_date_format" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_date_format == 1) selected @endif value="1">31.12.2023</option>--}}
{{--                                            <option @if($properties->de_date_format == 2) selected @endif value="2">31.12</option>--}}
{{--                                            <option @if($properties->de_date_format == 3) selected @endif value="3">Dec. 31, 2023</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-4">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">--}}
{{--                                    <span>{{ __('main.event_card_time') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">--}}
{{--                                <div id="design-2" class="pt-4 pb-4 mt-8 mb-8 w-full mx-auto max-w-screen-xl sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_time_font" id="de_time_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_time_font}}">{{$properties->de_time_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <select name="de_time_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_time_font_size == 0.8) selected @endif value="0.8">1</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 0.9) selected @endif value="0.9">2</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1) selected @endif value="1">3</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.1) selected @endif value="1.1">4</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.2) selected @endif value="1.2">5</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.3) selected @endif value="1.3">6</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.4) selected @endif value="1.4">7</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.5) selected @endif value="1.5">8</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.7) selected @endif value="1.7">9</option>--}}
{{--                                            <option @if($properties->de_time_font_size == 1.9) selected @endif value="1.9">10</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_time_font_color}}" name="de_time_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input value="{{$properties->de_time_text_shadow_color}}" type="color" name="de_time_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_time_text_shadow_right" value="{{$properties->de_time_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_time_text_shadow_bottom" value="{{$properties->de_time_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_time_text_shadow_blur" value="{{$properties->de_time_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_show_time') }}</label>--}}
{{--                                        <select name="de_show_card_time" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_show_card_time == 1) selected @endif value="{{true}}">{{ __('main.event_time_show') }}</option>--}}
{{--                                            <option @if($properties->de_show_card_time == 0) selected @endif value="{{false}}">{{ __('main.event_time_hide') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-5">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">--}}
{{--                                    <span>{{ __('main.event_card_other') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">--}}
{{--                                <div id="design-3" class="pt-4 pb-4 mt-8 mb-8 w-full mx-auto max-w-screen-xl  sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_color') }}</label>--}}
{{--                                        <input value="{{$properties->de_background_color_hex}}" type="color" name="de_background_color_hex" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_trans') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_transparency" value="{{$properties->de_transparency}}" min="0" max="1" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_event_round" value="{{$properties->de_event_round}}" min="1" max="50" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>--}}
{{--                                        <select name="de_text_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_text_position == 'justify-center') selected @endif value="justify-center">{{ __('main.event_card_other_position_c') }}</option>--}}
{{--                                            <option @if($properties->de_text_position == 'justify-start') selected @endif value="justify-start">{{ __('main.event_card_other_position_l') }}</option>--}}
{{--                                            <option @if($properties->de_text_position == 'justify-end') selected @endif value="justify-end">{{ __('main.event_card_other_position_r') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_event_card_shadow_color}}" name="de_event_card_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_event_card_shadow_right" value="{{$properties->de_event_card_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_event_card_shadow_bottom" value="{{$properties->de_event_card_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_event_card_shadow_blur" value="{{$properties->de_event_card_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}

{{--                                    @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)--}}
{{--                                        <div class="mb-10 text-center">--}}
{{--                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border_on_off') }}</label>--}}
{{--                                            <select name="de_border" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                                @if(isset($properties->de_border))--}}
{{--                                                    <option @if($properties->de_border == 'border-0') selected @endif value="border-0">0</option>--}}
{{--                                                    <option @if($properties->de_border == 'border') selected @endif value="border">1</option>--}}
{{--                                                    <option @if($properties->de_border == 'border-2') selected @endif value="border-2">2</option>--}}
{{--                                                    <option @if($properties->de_border == 'border-4') selected @endif value="border-4">4</option>--}}
{{--                                                    <option @if($properties->de_border == 'border-8') selected @endif value="border-8">8</option>--}}
{{--                                                @else--}}
{{--                                                    <option value="border-0">0</option>--}}
{{--                                                    <option selected value="border">1</option>--}}
{{--                                                    <option value="border-2">2</option>--}}
{{--                                                    <option value="border-4">4</option>--}}
{{--                                                    <option value="border-8">8</option>--}}
{{--                                                @endif--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="mb-10 text-center">--}}
{{--                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_border_color') }}</label>--}}
{{--                                            @if(isset($properties->de_border_color))--}}
{{--                                                <input type="color" value="{{$properties->de_border_color}}" name="de_border_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                            @else--}}
{{--                                                <input type="color" value="#000000" name="de_border_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_animation') }}</label>--}}
{{--                                        <select name="event_animation" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($event->event_animation == 'Select animation') selected @endif>Select animation</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__pulse animate__infinite infinite') selected @endif value="animate__animated animate__pulse animate__infinite infinite" style="border: 0">Pulse</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__headShake animate__infinite infinite') selected @endif value="animate__animated animate__headShake animate__infinite infinite" style="border: 0">Head Shake</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__bounce animate__infinite infinite') selected @endif value="animate__animated animate__bounce animate__infinite infinite" style="border: 0">Bounce</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__flash animate__infinite infinite') selected @endif value="animate__animated animate__flash animate__infinite infinite" style="border: 0">Flash</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__swing animate__infinite infinite') selected @endif value="animate__animated animate__swing animate__infinite infinite" style="border: 0">Swing</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__tada animate__infinite infinite') selected @endif value="animate__animated animate__tada animate__infinite infinite" style="border: 0">TaDa!</option>--}}
{{--                                            <option @if($event->event_animation == 'animate__animated animate__heartBeat animate__infinite infinite') selected @endif value="animate__animated animate__heartBeat animate__infinite infinite" style="border: 0">HeartBeat</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_speed_animation') }}</label>--}}
{{--                                        <select name="animation_speed" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($event->animation_speed == 'None') selected @endif>None</option>--}}
{{--                                            <option @if($event->animation_speed == '1') selected @endif value="1" style="border: 0">1 sec.</option>--}}
{{--                                            <option @if($event->animation_speed == '2') selected @endif value="2" style="border: 0">2 sec.</option>--}}
{{--                                            <option @if($event->animation_speed == '3') selected @endif value="3" style="border: 0">3 sec.</option>--}}
{{--                                            <option @if($event->animation_speed == '4') selected @endif value="4" style="border: 0">4 sec.</option>--}}
{{--                                            <option @if($event->animation_speed == '5') selected @endif value="5" style="border: 0">5 sec.</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_modal') }}</label>--}}
{{--                                        <select name="de_show_modal" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_show_modal == 1) selected @endif value="{{true}}">{{ __('main.event_time_show') }}</option>--}}
{{--                                            <option @if($properties->de_show_modal == 0) selected @endif value="{{false}}">{{ __('main.event_time_hide') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="block-7" class="mb-3  text-center rounded-lg p-5 ">--}}
{{--                        <p class="mt-2 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{ __('main.event_modal') }}</p>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-6">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">--}}
{{--                                    <span>{{ __('main.event_modal_city') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_oc_city_font" id="de_oc_city_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_city_font}}">{{$properties->de_oc_city_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }} </label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_city_font_size" value="{{$properties->de_oc_city_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_city_font_color}}" name="de_oc_city_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" name="de_oc_city_font_shadow_color" value="{{$properties->de_oc_city_font_shadow_color}}" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_city_font_shadow_right" value="{{$properties->de_oc_city_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_city_font_shadow_bottom" value="{{$properties->de_oc_city_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_city_font_shadow_blur" value="{{$properties->de_oc_city_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-7">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">--}}
{{--                                    <span>{{ __('main.event_modal_location') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_oc_location_font" id="de_oc_location_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_location_font}}">{{$properties->de_oc_location_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_location_font_size" value="{{$properties->de_oc_location_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_location_font_color}}" name="de_oc_location_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" name="de_oc_location_font_shadow_color" value="{{$properties->de_oc_location_font_shadow_color}}" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_location_font_shadow_right" value="{{$properties->de_oc_location_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_location_font_shadow_bottom" value="{{$properties->de_oc_location_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_location_font_shadow_blur" value="{{$properties->de_oc_location_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-8">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">--}}
{{--                                    <span>{{ __('main.event_modal_date') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-8" class="hidden" aria-labelledby="accordion-flush-heading-8">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_oc_date_font" id="de_oc_date_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_date_font}}">{{$properties->de_oc_date_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_date_font_size" value="{{$properties->de_oc_date_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_date_font_color}}" name="de_oc_date_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" name="de_oc_date_font_shadow_color" value="{{$properties->de_oc_date_font_shadow_color}}" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_date_font_shadow_right" value="{{$properties->de_oc_date_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_date_font_shadow_bottom" value="{{$properties->de_oc_date_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_date_font_shadow_blur" value="{{$properties->de_oc_date_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-9">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-9" aria-expanded="false" aria-controls="accordion-flush-body-9">--}}
{{--                                    <span>{{ __('main.event_modal_time') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-9" class="hidden" aria-labelledby="accordion-flush-heading-9">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_oc_time_font" id="de_oc_time_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_time_font}}">{{$properties->de_oc_time_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_time_font_size" value="{{$properties->de_oc_time_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_time_font_color}}" name="de_oc_time_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" name="de_oc_time_font_shadow_color" value="{{$properties->de_oc_time_font_shadow_color}}" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_time_font_shadow_right" value="{{$properties->de_oc_time_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_time_font_shadow_bottom" value="{{$properties->de_oc_time_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_time_font_shadow_blur" value="{{$properties->de_oc_time_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-10">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-10" aria-expanded="false" aria-controls="accordion-flush-body-10">--}}
{{--                                    <span>{{ __('main.event_modal_title') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-10" class="hidden" aria-labelledby="accordion-flush-heading-10">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>--}}
{{--                                        <select name="de_oc_title_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_oc_title_position == 'justify-center') selected @endif value="justify-center">{{ __('main.event_card_other_position_c') }}</option>--}}
{{--                                            <option @if($properties->de_oc_title_position == 'justify-start') selected @endif value="justify-start">{{ __('main.event_card_other_position_l') }}</option>--}}
{{--                                            <option @if($properties->de_oc_title_position == 'justify-end') selected @endif value="justify-end">{{ __('main.event_card_other_position_r') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_oc_title_font" id="de_oc_title_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_title_font}}">{{$properties->de_oc_title_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_title_font_size" value="{{$properties->de_oc_title_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_title_font_color}}" name="de_oc_title_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" name="de_oc_title_font_shadow_color" value="{{$properties->de_oc_title_font_shadow_color}}" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_title_font_shadow_right" value="{{$properties->de_oc_title_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_title_font_shadow_bottom" value="{{$properties->de_oc_title_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_title_font_shadow_blur" value="{{$properties->de_oc_title_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-11">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-11" aria-expanded="false" aria-controls="accordion-flush-body-11">--}}
{{--                                    <span>{{ __('main.event_modal_descr') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-11" class="hidden" aria-labelledby="accordion-flush-heading-11">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_position') }}</label>--}}
{{--                                        <select name="de_oc_description_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_oc_description_position == 'justify-center') selected @endif value="justify-center">{{ __('main.event_card_other_position_c') }}</option>--}}
{{--                                            <option @if($properties->de_oc_description_position == 'justify-start') selected @endif value="justify-start">{{ __('main.event_card_other_position_l') }}</option>--}}
{{--                                            <option @if($properties->de_oc_description_position == 'justify-end') selected @endif value="justify-end">{{ __('main.event_card_other_position_r') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font') }}</label>--}}
{{--                                        <select name="de_oc_description_font" id="de_oc_description_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_description_font}}">{{$properties->de_oc_description_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_description_font_size" value="{{$properties->de_oc_description_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_description_font_color}}" name="de_oc_description_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_color') }}</label>--}}
{{--                                        <input type="color" name="de_oc_description_font_shadow_color" value="{{$properties->de_oc_description_font_shadow_color}}" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_description_font_shadow_right" value="{{$properties->de_oc_description_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_description_font_shadow_bottom" value="{{$properties->de_oc_description_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_description_font_shadow_blur" value="{{$properties->de_oc_description_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="design1" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">--}}
{{--                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">--}}
{{--                            <h2 id="accordion-flush-heading-12">--}}
{{--                                <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-1 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-12" aria-expanded="false" aria-controls="accordion-flush-body-12">--}}
{{--                                    <span>{{ __('main.event_modal_other') }}</span>--}}
{{--                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="accordion-flush-body-12" class="hidden" aria-labelledby="accordion-flush-heading-12">--}}
{{--                                <div class="py-2 font-light border-gray-200 dark:border-gray-700">--}}
{{--                                    <div class="mb-10 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_position') }}</label>--}}
{{--                                        <select name="de_oc_text_position" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                            <option @if($properties->de_oc_text_position == 'justify-center') selected @endif value="justify-center">{{ __('main.event_card_other_position_c') }}</option>--}}
{{--                                            <option @if($properties->de_oc_text_position == 'justify-start') selected @endif value="justify-start">{{ __('main.event_card_other_position_l') }}</option>--}}
{{--                                            <option @if($properties->de_oc_text_position == 'justify-end') selected @endif value="justify-end">{{ __('main.event_card_other_position_r') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_other_bg_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_bg_color}}" name="de_oc_bg_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-6 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_font') }}</label>--}}
{{--                                        <input name="oc_btn_text" value="{{$event->oc_btn_text}}" placeholder="Title for event button" maxlength="100" id="title" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) dark:bg-gray-900 text-gray-500 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_font') }}</label>--}}
{{--                                        <select name="de_oc_btn_text_font" id="de_oc_btn_text_font" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">--}}
{{--                                            <option selected value="{{$properties->de_oc_btn_text_font}}">{{$properties->de_oc_btn_text_font}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_size') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_size" value="{{$properties->de_oc_btn_text_font_size}}" min="0.8" max="3.2" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_btn_color}}" name="de_oc_btn_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_text_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_btn_text_color}}" name="de_oc_btn_text_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_modal_other_ticket_btn_text_shadow_color') }}</label>--}}
{{--                                        <input type="color" value="{{$properties->de_oc_btn_text_font_shadow_color}}" name="de_oc_btn_text_font_shadow_color" id="oc_city_font_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_right') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_shadow_right" value="{{$properties->de_oc_btn_text_font_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_bottom') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_shadow_bottom" value="{{$properties->de_oc_btn_text_font_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-8 text-center">--}}
{{--                                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.event_card_font_shadow_blur') }}</label>--}}
{{--                                        <input id="steps-range" type="range" name="de_oc_btn_text_font_shadow_blur" value="{{$properties->de_oc_btn_text_font_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="mt-5">--}}
{{--                        <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">--}}
{{--                            {{ __('main.user_upd_btn_profile') }}--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}


{{--        </div>--}}
{{--    </section>--}}

{{--    <script>--}}
{{--        let fields = [--}}
{{--            'de_city_font',--}}
{{--            'de_location_font',--}}
{{--            'de_date_font',--}}
{{--            'de_time_font',--}}
{{--            'de_oc_city_font',--}}
{{--            'de_oc_location_font',--}}
{{--            'de_oc_date_font',--}}
{{--            'de_oc_time_font',--}}
{{--            'de_oc_title_font',--}}
{{--            'de_oc_description_font',--}}
{{--            'de_oc_btn_text_font',--}}
{{--        ];--}}

{{--        fields.forEach(function(field) {--}}
{{--            new TomSelect('#'+ field, {--}}
{{--                valueField: 'font',--}}
{{--                searchField: 'title',--}}
{{--                maxOptions: 150,--}}
{{--                options: [--}}
{{--                        @foreach($allFontsInFolder as $font)--}}
{{--                    {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},--}}
{{--                    @endforeach--}}
{{--                ],--}}
{{--                render: {--}}
{{--                    option: function(data, escape) {--}}
{{--                        return  '<div>' +--}}
{{--                            '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +--}}
{{--                            '</div>';--}}
{{--                    },--}}
{{--                    item: function(data, escape) {--}}
{{--                        return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}

{{--        $('#datepicker').on('click', function(){--}}
{{--            $(".datepicker-picker").show();--}}
{{--        });--}}

{{--        $('#datepicker').on('changeDate', function(){--}}
{{--            $(".datepicker-picker").hide();--}}
{{--        });--}}
{{--    </script>--}}

</x-app-layout>
