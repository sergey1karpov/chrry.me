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
        <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 shadow-lg rounded-lg">
            <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl @if($user->dayVsNight == 1) text-white @else text-black @endif">Now your last <span class="text-indigo-600 dark:text-indigo-500">event</span> looks like this</h1>

                <div class="container mt-2">
                    <div class="col-lg-12 allalbums">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action text-center pt-2 pb-2" style="background-color: rgba({{$event->background_color_rgba}}, {{$event->transparency}}); border-radius: {{$event->event_round}}px;">
                                <div class="row text-center">
                                    <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                                        <a href="#" style="color: black; text-decoration: none">
                                            <p style="text-shadow:{{$event->location_text_shadow_right}}px {{$event->location_text_shadow_bottom}}px {{$event->location_text_shadow_blur}}px {{$event->location_text_shadow_color}} ;font-family: '{{$event->location_font}}', sans-serif; text-transform: uppercase; font-size: {{$event->location_font_size}}em; padding: 0; margin: 0; color: {{$event->location_font_color}}">@if($event->bold_city == true)<b>@endif{{$event->city}}@if($event->bold_city == true)</b>@endif, @if($event->bold_location == true)<b>@endif{{$event->location}}@if($event->bold_location == true)</b>@endif</p>
                                            <p style="text-shadow:{{$event->date_text_shadow_right}}px {{$event->date_text_shadow_bottom}}px {{$event->date_text_shadow_blur}}px {{$event->date_text_shadow_color}} ;font-family: '{{$event->date_font}}', sans-serif; font-size: {{$event->date_font_size}}rem; margin-bottom: 0; color: {{$event->date_font_color}};">@if($event->bold_date == true)<b>@endif{{\Carbon\Carbon::parse($event->date)->format('d.m.Y')}}@if($event->bold_date == true)</b>@endif @if($event->bold_time == true)<b>@endif{{' @'.$event->time}}@if($event->bold_time == true)</b>@endif</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flex justify-center mt-8 mb-8">
        <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 shadow-lg rounded-lg">
            <form action="{{ route('editAllEvent', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')

                <div id="design" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="text-center mb-10">
                        <label for="title" class="mb-6 text font-medium leading-relaxed text-indigo-600">Styles for city and location</label>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                        <select name="location_font" id="select-beast-empty-post-location" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                            <option selected value="{{$event->location_font}}">{{$event->location_font}}</option>
                        </select>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                        <select name="location_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($event->location_font_size == 0.8) selected @endif value="0.8">1</option>
                            <option @if($event->location_font_size == 0.9) selected @endif value="0.9">2</option>
                            <option @if($event->location_font_size == 1) selected @endif value="1">3</option>
                            <option @if($event->location_font_size == 1.1) selected @endif value="1.1">4</option>
                            <option @if($event->location_font_size == 1.2) selected @endif value="1.2">5</option>
                        </select>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                        <input type="color" value="{{$event->location_font_color}}" name="location_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="flex items-center justify-evenly mb-6 text-center rounded-lg p-1 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="col-span-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input @if($event->bold_city == 1) checked @endif name="bold_city" type="checkbox" value="{{true}}" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold city</span>
                            </label>
                        </div>
                        <div class="col-span-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input @if($event->bold_location == 1) checked @endif name="bold_location" type="checkbox" value="{{true}}" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold location</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                        <input type="color" value="{{$event->location_text_shadow_color}}" name="location_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                        <input id="steps-range" type="range" name="location_text_shadow_right" value="{{$event->location_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                        <input id="steps-range" type="range" name="location_text_shadow_bottom" value="{{$event->location_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                        <input id="steps-range" type="range" name="location_text_shadow_blur" value="{{$event->location_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                </div>

                <div id="design-2" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="text-center mb-10">
                        <label for="title" class="mb-6 text font-medium leading-relaxed text-indigo-600">Styles for date and time</label>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="title" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font style </label>
                        <select name="date_font" id="select-beast-empty-post-date" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 " data-placeholder="Search font..."  autocomplete="off">
                            <option selected value="{{$event->date_font}}">{{$event->date_font}}</option>
                        </select>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font size </label>
                        <select name="date_font_size" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($event->date_font_size == 0.8) selected @endif value="0.8">1</option>
                            <option @if($event->date_font_size == 0.9) selected @endif value="0.9">2</option>
                            <option @if($event->date_font_size == 1) selected @endif value="1">3</option>
                            <option @if($event->date_font_size == 1.1) selected @endif value="1.1">4</option>
                            <option @if($event->date_font_size == 1.2) selected @endif value="1.2">5</option>
                        </select>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Font color</label>
                        <input type="color" value="{{$event->date_font_color}}" name="date_font_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="flex items-center justify-evenly mb-6 text-center rounded-lg p-1 @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                        <div class="col-span-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input @if($event->bold_date == 1) checked @endif name="bold_date" type="checkbox" value="{{true}}" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold date</span>
                            </label>
                        </div>
                        <div class="col-span-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input @if($event->bold_time == 1) checked @endif name="bold_time" type="checkbox" value="{{true}}" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer @if($user->dayVsNight == 1) dark:bg-gray-700 @endif peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 mt-1 text-sm font-medium leading-relaxed text-indigo-600">Bold time</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow color</label>
                        <input value="{{$event->date_text_shadow_color}}" type="color" name="date_text_shadow_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow right</label>
                        <input id="steps-range" type="range" name="date_text_shadow_right" value="{{$event->date_text_shadow_right}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow bottom</label>
                        <input id="steps-range" type="range" name="date_text_shadow_bottom" value="{{$event->date_text_shadow_bottom}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Shadow blur</label>
                        <input id="steps-range" type="range" name="date_text_shadow_blur" value="{{$event->date_text_shadow_blur}}" min="0" max="10" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                </div>

                <div id="design-3" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background color</label>
                        <input value="{{$event->background_color_hex}}" type="color" name="background_color_hex" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Background transparency</label>
                        <input id="steps-range" type="range" name="transparency" value="{{$event->transparency}}" min="0" max="1" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-8 text-center">
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Border rounded</label>
                        <input id="steps-range" type="range" name="event_round" value="{{$event->event_round}}" min="1" max="50" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    </div>
                    <div class="mb-10 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Event shadow</label>
                        <select name="block_shadow" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($event->block_shadow == 'shadow-none') selected @endif value="shadow-none">None</option>
                            <option @if($event->block_shadow == 'shadow-sm') selected @endif value="shadow-sm">1</option>
                            <option @if($event->block_shadow == 'shadow-md') selected @endif value="shadow-md">2</option>
                            <option @if($event->block_shadow == 'shadow-lg') selected @endif value="shadow-lg">3</option>
                            <option @if($event->block_shadow == 'shadow-xl') selected @endif value="shadow-xl">4</option>
                            <option @if($event->block_shadow == 'shadow-2xl') selected @endif value="shadow-2xl">5</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        Update all
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
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
