<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('editProfileForm', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
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

    <form action="{{ route('settingsEdit', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
        <section class="flex justify-center ">
            <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button" class="p-2 flex rounded-lg items-center justify-between w-full py-5 font-medium text-left text-gray-500 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                            <span>Card design</span>
                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-500 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center pt-2 pb-2">
                                                        <div class="row text-center">
                                                            <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-xl font-extrabold dark:text-white">
                                                                        Moscow,
                                                                    </h2>
                                                                    <h2 class="ml-2 text-xl font-extrabold dark:text-white">
                                                                        Crocus City Hall
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-lg font-extrabold dark:text-white">
                                                                        31.12.2023
                                                                    </h2>
                                                                    <h2 class="ml-2 text-lg font-extrabold dark:text-white">
                                                                        22:30
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->close_card_type == 1) checked @endif style="border: none" id="default-radio-1" type="radio" value="1" name="type_close_card" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">Default card</label>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-500 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center pt-2 pb-2">
                                                        <div class="row text-center">
                                                            <div class="col-12 text-center mt-3 mb-3" style="padding: 0">
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-3xl font-extrabold dark:text-white">
                                                                        Moscow,
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-2xl font-extrabold dark:text-white">
                                                                        Crocus City Hall
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-lg font-extrabold dark:text-white">
                                                                        31.12.2023
                                                                    </h2>
                                                                    <h2 class="ml-2 text-lg font-extrabold dark:text-white">
                                                                        22:30
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->close_card_type == 2) checked @endif style="border: none" id="default-radio-2" type="radio" value="2" name="type_close_card" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">Second type</label>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center">
                                                        <div href="#" class="relative block overflow-hidden rounded-xl bg-[url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/ItchyPoopzkidDeichbrand2015.jpg/1200px-ItchyPoopzkidDeichbrand2015.jpg)] bg-cover bg-center bg-no-repeat">
                                                            <div class="relative bg-black bg-opacity-40 p-8 pt-32 text-white">
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-2xl font-extrabold dark:text-white">
                                                                        Moscow,
                                                                    </h2>
                                                                    <h2 class="ml-2 text-2xl font-extrabold dark:text-white">
                                                                        Crocus City Hall
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap justify-center">
                                                                    <h2 class="text-lg font-extrabold dark:text-white">
                                                                        31.12.2023
                                                                    </h2>
                                                                    <h2 class="ml-2 text-lg font-extrabold dark:text-white">
                                                                        22:30
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->close_card_type == 3) checked @endif style="border: none" id="default-radio-1" type="radio" value="3" name="type_close_card" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">With image</label>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center">
                                                        <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg">
                                                            <img alt="Office" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/ItchyPoopzkidDeichbrand2015.jpg/1200px-ItchyPoopzkidDeichbrand2015.jpg" class="h-32 w-full object-cover"/>
                                                            <div class="bg-gray-900 p-4 sm:p-6">
                                                                <div class="flex flex-wrap justify-start">
                                                                    <h2 class="text-base font-medium text-white">
                                                                        31.12.2023,
                                                                    </h2>
                                                                    <h2 class="ml-2 text-base font-medium text-white">
                                                                        22:30
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap">
                                                                    <h2 class="mr-1 text-2xl font-extrabold text-white">
                                                                        Moscow,
                                                                    </h2>
                                                                    <h2 class="text-2xl font-extrabold text-white">
                                                                        Crocus City Hall
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->close_card_type == 4) checked @endif style="border: none" id="default-radio-1" type="radio" value="4" name="type_close_card" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">With image 2</label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex justify-center mt-4">
            <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-2">
                        <button type="button" class="p-2 flex rounded-lg items-center justify-between w-full py-5 font-medium text-left text-gray-500 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                            <span>Open card design</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center">
                                                        <div href="#" class="relative block overflow-hidden rounded-t-xl bg-[url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/ItchyPoopzkidDeichbrand2015.jpg/1200px-ItchyPoopzkidDeichbrand2015.jpg)] bg-cover bg-center bg-no-repeat">
                                                            <div class="relative bg-black bg-opacity-40 p-2 pt-44 text-white">
                                                                <div class="flex flex-wrap justify-start">
                                                                    <h2 class="text-2xl font-extrabold dark:text-white">
                                                                        Moscow,
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap justify-start">
                                                                    <h2 class="text-2xl font-extrabold dark:text-white">
                                                                        Crocus City Hall
                                                                    </h2>
                                                                </div>
                                                                <div class="flex flex-wrap justify-start">
                                                                    <h2 class="text-lg font-extrabold dark:text-white">
                                                                        31.12.2023
                                                                    </h2>
                                                                    <h2 class="ml-2 text-lg font-extrabold dark:text-white">
                                                                        22:30
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-start p-2">
                                                            <h2 class="text-4xl font-extrabold text-white">Some title</h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-start p-2">
                                                            <h2 style="white-space: pre-wrap;" class="text-lg font-normal text-white ">Some description on 2500 symbols</h2>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="w-full text-white bg-red-600 font-medium rounded-b-lg text-sm px-5 py-2.5">Tickets</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->open_card_type == 1) checked @endif style="border: none" id="default-radio-1" type="radio" value="1" name="open_card_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">Type 1</label>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center">
                                                        <div href="#" class="relative block overflow-hidden rounded-t-xl bg-[url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/ItchyPoopzkidDeichbrand2015.jpg/1200px-ItchyPoopzkidDeichbrand2015.jpg)] bg-cover bg-center bg-no-repeat">
                                                            <div class="relative bg-black bg-opacity-40 p-2 pt-56 text-white">

                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-start p-2">
                                                            <h2 class="text-4xl font-extrabold text-white">Some title</h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex flex-wrap justify-start pl-2 pr-2">
                                                            <h2 class="mr-2 text-2xl font-extrabold dark:text-white">Moscow</h2>
                                                            <h2 class="text-2xl font-extrabold dark:text-white">Crocus City Hall</h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-start pl-2 pr-2">
                                                            <h2 class="mr-2 text-lg font-extrabold dark:text-white">
                                                                31.12.2023
                                                            </h2>
                                                            <h2 class="text-lg font-extrabold dark:text-white">
                                                                22:30
                                                            </h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-start p-2">
                                                            <h2 style="white-space: pre-wrap;" class="text-lg font-normal text-white ">Some description on 2500 symbols</h2>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="w-full text-white bg-red-600 font-medium rounded-b-lg text-sm px-5 py-2.5">Tickets</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->open_card_type == 2) checked @endif style="border: none" id="default-radio-1" type="radio" value="2" name="open_card_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">Type 2</label>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="flex justify-center mt-4">
                            <div class="w-full mx-auto max-w-screen-xl rounded-lg">
                                <div id="design" class="w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                                    <div id="design" class="mb-3 w-full mx-auto max-w-screen-xl rounded-lg @if($user->dayVsNight == 1) bg-gray-900 @endif">
                                        <div class="container mt-2">
                                            <div class="col-lg-12 allalbums">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action text-center">
                                                        <div href="#" class="relative block overflow-hidden rounded-t-xl bg-[url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/ItchyPoopzkidDeichbrand2015.jpg/1200px-ItchyPoopzkidDeichbrand2015.jpg)] bg-cover bg-center bg-no-repeat">
                                                            <div class="relative bg-black bg-opacity-40 p-2 pt-56 text-white">

                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-between pl-2 pr-2">
                                                            <h2 class="mr-2 text-lg font-extrabold dark:text-white">
                                                                31.12.2023
                                                            </h2>
                                                            <h2 class="text-lg font-extrabold dark:text-white">
                                                                22:30
                                                            </h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex flex-wrap justify-start pl-2 pr-2">
                                                            <h2 class="mr-2 text-2xl font-extrabold dark:text-white">Moscow</h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex flex-wrap justify-start pl-2 pr-2">
                                                            <h2 class="text-2xl font-extrabold dark:text-white">Crocus City Hall</h2>
                                                        </div>
                                                        <div class="bg-gray-900 flex justify-start p-2">
                                                            <h2 style="white-space: pre-wrap;" class="text-lg font-normal text-white ">Some description on 2500 symbols</h2>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="w-full text-white bg-red-600 font-medium rounded-b-lg text-sm px-5 py-2.5">Tickets</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <input @if($user->eventSettings->open_card_type == 3) checked @endif style="border: none" id="default-radio-1" type="radio" value="3" name="open_card_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 @if($user->dayVsNight == 1) bg-gray-900 @else bg-gray-300 @endif dark:border-gray-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium @if($user->dayVsNight == 1) text-gray-50 @else text-gray-600 @endif">Type 3</label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex justify-center mb-8">
            <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 rounded-lg">
                <div class="mb-8">
                    <button type="submit" class="mt-5 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        Edit event profile
                    </button>
                </div>
            </div>
        </section>
    </form>

</x-app-layout>

