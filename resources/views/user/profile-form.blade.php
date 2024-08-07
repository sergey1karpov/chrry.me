<x-app-layout :user="$user">

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

    <section class="flex justify-center">
        <div class="sm:mt-12 w-full">

            <div class="w-full mx-auto max-w-screen-xl lg:px-8 sm:px-8 z-50" style="position: sticky; top: 0;">
                <div  class="rounded-b-lg mx-auto max-w-screen-xl ">
                    <div class="group block">
                        <div class="w-full mx-auto max-w-screen-xl z-50" style="position: sticky; top: 0;">
                            <div  class="rounded-b-lg mt-1 mx-auto max-w-screen-xl ">
                                <div class="group block bg-gray-800">
                                    <div class="border-b border-gray-200 dark:border-gray-700">
                                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                            <li class="mr-2" role="presentation">
                                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Основные</button>
                                            </li>
                                            <li class="mr-2" role="presentation">
                                                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Пароль</button>
                                            </li>
                                            <li class="mr-2" role="presentation">
                                                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Безопасность</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="myTabContent">
                            <div class="hidden p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mx-auto max-w-screen-xl sm:px-6 lg:px-8">
                                    <form action="{{ route('editUserProfile', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                                        <div class="mb-6 text-center">
                                            <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_name') }}</label>
                                            <input value="{{$user->name}}" type="text" name="name" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="slug" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_slug') }}</label>
                                            <input value="{{$user->slug}}" type="text" name="slug" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="description" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_descr') }}</label>
                                            <textarea rows="4" name="description" id="description" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">{{$user->description}}</textarea>
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="locale" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_locale') }}</label>
                                            <select name="locale" id="locale" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                <option @if($user->locale == 'ru') selected @endif value="ru">Русский</option>
                                                <option @if($user->locale == 'en') selected @endif value="en">English</option>
                                            </select>
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="email" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Email</label>
                                            <input value="{{$user->email}}" type="email" name="email" id="email" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="type" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_page_type') }}</label>
                                            <select name="type" id="type" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                <option @if($user->type == 'Links') selected @endif value="Links">{{ __('main.user_page_links') }}</option>
                                                <option @if($user->type == 'Events') selected @endif value="Events">{{ __('main.user_page_events') }}</option>
                                                {{--                            <option @if($user->type == 'Market') selected @endif value="Market">Market</option>--}}
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="mt-2  w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                                {{ __('main.user_upd_btn') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="hidden p-4" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="mx-auto max-w-screen-xl sm:px-6 lg:px-8">
                                    <form action="{{ route('updatePassword', ['user' => $user->id]) }}" method="post"> @csrf @method('PATCH')
                                        <div class="mb-6 text-center">
                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_old_pass') }}</label>
                                            <input placeholder="********" type="password" name="old_password" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_new_pass') }}</label>
                                            <input placeholder="********" type="password" name="password" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        </div>
                                        <div class="mb-6 text-center">
                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_re_new_pass') }}</label>
                                            <input placeholder="********" type="password" name="password_confirmation" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="mt-2  w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                                {{ __('main.user_upd_pass_btn') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="hidden p-4" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="mx-auto max-w-screen-xl sm:px-6 lg:px-8 ">
                                    <form action="{{ route('updateTwoFactorAuth', ['user' => $user->id]) }}" method="post"> @csrf @method('PATCH')
                                        <div class="mb-6 text-center">
                                            <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">{{ __('main.user_two_factor') }}</label>
                                            <select name="two_factor_auth" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                <option @if($user->two_factor_auth == 1) selected @endif value="1">{{ __('main.user_two_factor_on') }}</option>
                                                <option @if($user->two_factor_auth == 0) selected @endif value="0">{{ __('main.user_two_factor_off') }}</option>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="mt-2  w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                                {{ __('main.user_two_factor_btn') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


































        </div>
    <section>

</x-app-layout>
