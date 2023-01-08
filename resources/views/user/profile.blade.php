<x-app-layout :user="$user">

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8">
                    <div class="flex gap-4 mb-1">
                        <label class="inline-flex relative items-center mr-5 cursor-pointer">
                            <input data-id="{{$user->id}}" name="theme" type="checkbox" id="theme" class="sr-only peer form-check-input" @if($user->dayVsNight == 1) checked @endif style="border: none">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                            <span class="switch-text ml-3 text-sm font-medium @if($user->dayVsNight == 1) text-gray-300 @endif">
                                @if($user->dayVsNight == 1) Light on @else Light off @endif
                            </span>
                        </label>
                    </div>
                    <div>
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
            <div class="mt-4">
                <h1 class="text-block mt-4 text-3xl font-bold flex @if($user->dayVsNight == 1) text-white @endif">
                    {{$user->name}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ml-3 mt-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                </h1>
            </div>
        </div>
    </header>

    <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">

            <div class="">

                <div class="group block">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-red-600/50 hover:shadow-red-600/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-red-600/50">
                        <span class="inline-block rounded bg-indigo-900 p-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-3xl font-bold @if($user->dayVsNight == 1) text-white @else text-black @endif text-block2">Link</h2>
                        <p class="mt-1 text-lg font-medium leading-relaxed text-gray-500">
                            Create and manage your links
                        </p>
                        <div class="inline-flex rounded-md mt-4" role="group">
                            <a href="{{ route('createLinkForm', ['user' => $user->id]) }}" type="submit" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                CREATE
                            </a>
                            <a href="{{ route('allLinks', ['user' => $user->id]) }}" type="submit" class="ml-3 inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                MANAGE
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group block mt-7">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-blue-500/50 hover:shadow-blue-500/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-blue-500/50">
                        <span class="inline-block rounded bg-indigo-900 p-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-3xl font-bold @if($user->dayVsNight == 1) text-white @else text-black @endif text-block2">Event</h2>
                        <p class="mt-1 text-lg font-medium leading-relaxed text-gray-500">
                            Create and manage your events
                        </p>
                        <div class="inline-flex rounded-md mt-4" role="group">
                            <a href="{{ route('createEventForm', ['user' => $user->id]) }}" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                CREATE
                            </a>
                            <a href="{{ route('allEvents', ['user' => $user->id]) }}" class="ml-3 inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                MANAGE
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group block mt-7">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-pink-500/50 hover:shadow-pink-500/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-pink-500/50">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="inline-block rounded bg-indigo-900 p-2 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <button class="text-lg font-medium inline-flex items-center justify-center w-11 h-11 mr-2 text-pink-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-pink-800">
                                    {{count($user->orders->where('order_status', \App\Models\Order::NEW_ORDER))}}
                                </button>
                                <button class="text-lg font-medium inline-flex items-center justify-center w-11 h-11 mr-2 text-pink-100 transition-colors duration-150 bg-blue-500 rounded-full focus:shadow-outline hover:bg-pink-800">
                                    {{count($user->orders->where('order_status', \App\Models\Order::IN_WORK_ORDER))}}
                                </button>
                                <button class="text-lg font-medium inline-flex items-center justify-center w-11 h-11 text-pink-100 transition-colors duration-150 bg-slate-500 rounded-full focus:shadow-outline hover:bg-pink-800">
                                    {{count($user->orders->where('order_status', \App\Models\Order::PROCESSED_ORDER))}}
                                </button>
                            </div>
                        </div>
                        <h2 class="mt-4 text-3xl font-bold @if($user->dayVsNight == 1) text-white @else text-black @endif text-block2">Market</h2>
                        <p class="mt-1 text-lg font-medium leading-relaxed text-gray-500">
                            Create a new product, work with orders and build your customer base
                        </p>
                        <div class="inline-flex rounded-md mt-4" role="group">
                            <a href="{{ route('createProductForm', ['user' => $user->id]) }}" type="submit" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                CREATE
                            </a>
                            <a href="{{ route('allProducts', ['user' => $user->id]) }}" type="submit" class="ml-3 inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                PRODUCTS
                            </a>
                        </div>
                        <div class="inline-flex rounded-md mt-3" role="group">
                            <a href="{{ route('orders', ['user' => $user->id]) }}" type="submit" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                ORDERS
                            </a>
                            <a href="{{ route('allCategories', ['user' => $user->id]) }}" type="submit" class="ml-3 inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                CATEGORIES
                            </a>
                        </div>
                        <div class="inline-flex rounded-md mt-3" role="group">
                            <a href="{{ route('marketSettingsForm', ['user' => $user->id]) }}" type="submit" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                MARKET SETTINGS
                            </a>
                        </div>
                    </div>
                </div>

                <a class="group block mt-7" href="{{ route('getStats', ['user' => $user->id]) }}">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-purple-500/50 hover:shadow-purple-500/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-purple-500/50">
                        <span class="inline-block rounded bg-indigo-900 p-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-3xl font-bold @if($user->dayVsNight == 1) text-white @else text-black @endif text-block2">Statistic</h2>
                        <p class="mt-1 text-lg font-medium leading-relaxed text-gray-500">
                            View the statistics of visits to your profile
                        </p>
                        <p class="mt-3 text-sm font-medium leading-relaxed @if($user->dayVsNight == 1) text-white @else text-black @endif text-block2">Today views: 25</p>
                    </div>
                </a>

                <div class="group block mt-7">
                    <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-indigo-500/50 hover:shadow-indigo-500/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-indigo-500/50">
                        <span class="inline-block rounded bg-indigo-900 p-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <h2 class="mt-4 text-3xl font-bold @if($user->dayVsNight == 1) text-white @else text-black @endif text-block2">Settings</h2>
                        <p class="mt-1 text-lg font-medium leading-relaxed text-gray-500">
                            Change page type, design and security settings
                        </p>
                        <div class="inline-flex rounded-md mt-4" role="group">
                            <a href="{{ route('profileSettingsForm', ['user' => $user->id]) }}" type="submit" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                SETTINGS
                            </a>
                            <a href="{{ route('designSettingsForm', ['user' => $user->id]) }}" type="submit" class="ml-3 inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                DESIGN
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-app-layout>


