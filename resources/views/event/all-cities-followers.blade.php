<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 pt-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('getAllEventFollowers', ['user' => $user->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
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

    @foreach($cities as $city)
        <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
            <div class="mx-auto max-w-screen-xl mt-4 sm:px-6 lg:px-8">
                <a href="{{ route('getAllCityFollowers', ['user' => $user->id, 'country' => $city->country_id, 'city' => $city->city_id]) }}" class="block w-full p-6 rounded-lg shadow @if($user->dayVsNight == 1) bg-[#0f0f0f] @else bg-gray-300 @endif">
                    <div class="flex flex-col items-center justify-center">
                        <h5 class="mb-2 text-3xl font-bold tracking-tight @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif">{{$city->name}}</h5>
                        <dd class="@if($user->dayVsNight == 1) text-white @else text-gray-700 @endif">Всего подписчиков:</dd>
                        <dt class="text-3xl font-extrabold @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif"><span class="text-blue-600 dark:text-blue-500">{{$city->countFollowers}}</span></dt>
                    </div>
                </a>
            </div>
        </section>
    @endforeach

</x-app-layout>


