<x-app-layout :user="$user">

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

    <section class="flex justify-center m-5">
        <form action="{{ route('filterStatistic', ['user' => $user->id, 'link' => $link->id]) }}" method="GET"> @csrf
            <div date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input name="from" type="text" class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('main.link_stat_form') }}">
                </div>
                <span class="mx-4 text-gray-500">{{ __('main.link_stat_or') }}</span>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input name="to" type="text" class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('main.link_stat_to') }}">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="w-full inline-block rounded border border-indigo-600 bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                    {{ __('main.link_stat_btn') }}
                </button>
            </div>
        </form>
    </section>

    @if(Route::current()->getName() == 'filterStatistic')
        <section class="flex justify-center m-5">
            <div class="sm:mt-12 w-full">
                <dl class="mx-auto max-w-screen-xl sm:px-6 lg:px-8">

                    <div class="flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif  @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">
                            {{ __('main.link_stat_period') }}
                        </dt>
                        <dd class="text-2xl font-extrabold text-blue-600 md:text-5xl">
                            @if(request()->get('from') && request()->get('to'))
                                {{request()->get('from')}} - {{request()->get('to')}}
                            @else
                                {{ __('main.link_stat_today') }}
                            @endif
                        </dd>
                    </div>

                    <div class="mt-4 flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">
                            {{ __('main.link_stat_total') }}
                        </dt>
                        <dd class="text-7xl font-extrabold text-blue-600 md:text-7xl">
                            {{count($stats['count'])}}
                        </dd>
                    </div>

                    <div class="mt-4 flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        @foreach($stats['city'] as $city)
                            <div class="flex justify-between">
                                <h1 class="order-last text-lg font-medium text-gray-500">
                                    {{$city->count}}
                                </h1>
                                <h1 class="text-lg font-extrabold text-blue-600">{{$city->city}}</h1>
                            </div>
                            <hr class="my-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach
                    </div>

                    <div class="mt-4 flex flex-col rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif px-4 py-8 text-center">
                        @foreach($stats['country'] as $country)
                            <div class="flex justify-between">
                                <h1 class="order-last text-lg font-medium text-gray-500">
                                    {{$country->count}}
                                </h1>
                                <h1 class="text-lg font-extrabold text-blue-600">{{$country->country}}</h1>
                            </div>
                            <hr class="my-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach
                    </div>
                </dl>
            </div>
        </section>
    @endif


</x-app-layout>










