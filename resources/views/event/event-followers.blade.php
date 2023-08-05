<x-app-layout :user="$user">

    @include('fonts.fonts')

    <header aria-label="Page Header" class="header-block @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center sm:justify-between sm:gap-4">
                <div class="flex flex-1 items-center justify-between gap-8 ">
                    <a href="{{ route('getAllEventCities', ['user' => $user->id, 'country' => $country->id]) }}" type="button" class="text-indigo-900 border border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
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


    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 flex justify-center">
        <div class="w-full max-w-md rounded-lg sm:p-8 @if($user->dayVsNight == 1) bg-black @endif dark:border-gray-700">
            <div class="flex items-center justify-between mb-5">
                <h5 class="text-4xl font-bold leading-none text-gray-900 dark:text-white"><span class="text-blue-600 dark:text-blue-500">{{ $city->name }}</span></h5>
            </div>
            <section class="flex justify-center mt-2 mb-4 w-full">
                <form class="w-full" action="{{ route('sortFollowers', ['user' => $user->id, 'country' => $country->id, 'city' => $city->id]) }}" method="GET">
                    <div date-rangepicker class="w-full">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input id="from" name="from" type="date" class="w-full bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:placeholder-gray-400 dark:focus:ring-blue-500" placeholder="{{ __('main.user_stat_from') }}">
                        </div>

                        <div class="relative mt-4">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input id="to" name="to" type="date" class="w-full bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:placeholder-gray-400 dark:focus:ring-blue-500" placeholder="{{ __('main.user_stat_end') }}">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Сортировать по дате
                        </button>
                    </div>
                </form>
            </section>
            <!-- Modal toggle -->
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="mt-2 w-full block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Экспорт данных
            </button>

            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                        <div class="p-2">
                            <form class="mt-4" action="{{ route('exportType', ['user' => $user->id, 'type' => 'EventFollowers']) }}" method="GET">
                                <input type="hidden" value="{{$user->id}}" name="user">
                                <input type="hidden" value="{{$country->id}}" name="country">
                                <input type="hidden" value="{{$city->id}}" name="city">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Формат документа</label>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Default select example" name="format" style="border: 0">
                                    <option value="xlsx">XLSX</option>
                                    <option selected value="csv">CSV</option>
                                    <option value="tsv">TSV</option>
                                    <option value="ods">ODS</option>
                                    <option value="xls">XLS</option>
                                </select>
                                <label for="first_name" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">За какой период нужны данные</label>
                                <div date-rangepicker class="">
                                    <div class="relative">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input id="from" name="fromSort" type="date" class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:placeholder-gray-400 dark:focus:ring-blue-500" placeholder="{{ __('main.user_stat_from') }}">
                                    </div>
                                    <div class="relative mt-2">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input id="to" name="toSort" type="date" class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full pl-10 p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-white @endif dark:placeholder-gray-400 dark:focus:ring-blue-500" placeholder="{{ __('main.user_stat_end') }}">
                                    </div>
                                </div>
                                <label for="first_name" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Какие поля включить в выборку</label>
                                <div class="form-check form-switch mb-2">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" role="switch" name="telephone" id="flexSwitchCheckDefault" style="border: 0">
                                    <label style="font-size: 0.9rem" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="flexSwitchCheckDefault">Телефон</label>
                                </div>
                                <div class="form-check form-switch mt-2 mb-2">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" role="switch" name="telegram" id="flexSwitchCheckDefault" style="border: 0">
                                    <label style="font-size: 0.9rem" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="flexSwitchCheckDefault">Telegram</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="w-full inline-block rounded border border-indigo-600 bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" type="submit">Экспорт</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($followers as $follower)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif truncate">
                                    Имя: {{ $follower->name }}
                                </p>
                                <p class="text-sm  truncate @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif">
                                    Email: {{ $follower->email }}
                                </p>
                                @if($follower->telegram)
                                    <p class="text-sm truncate @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif">
                                        Telegram: {{ $follower->telegram }}
                                    </p>
                                @endif
                                @if($follower->telephone)
                                    <p class="text-sm truncate @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif">
                                        Tel.: {{ $follower->telephone }}
                                    </p>
                                @endif
                            </div>
                            <div class="inline-flex items-center text-base font-semibold @if($user->dayVsNight == 1) text-white @else text-gray-800 @endif">
                                {{ Carbon\Carbon::parse($follower->created_at)->format('Y-m-d') }}
                            </div>
                        </div>
                    </li>
                    <hr class="h-px  bg-gray-200 border-0 dark:bg-gray-700">
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 flex justify-center">
        <div class="mt-3 flex justify-center w-full max-w-md rounded-lg sm:p-8 @if($user->dayVsNight == 1) bg-black @endif dark:border-gray-700">
            {{ $followers->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>




</x-app-layout>
