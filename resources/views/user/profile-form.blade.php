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

    <section class="flex justify-center m-5">
        <div class="sm:mt-12 w-full">
            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                <form action="{{ route('editUserProfile', ['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data"> @csrf @method('PATCH')
                    <input type="hidden" name="background_color" value="{{$user->background_color}}">
                    <div class="mb-6 text-center">
                        <label for="name" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Name</label>
                        <input value="{{$user->name}}" type="text" name="name" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="slug" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Slug</label>
                        <input value="{{$user->slug}}" type="text" name="slug" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="description" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Description</label>
                        <textarea rows="4" name="description" id="description" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">{{$user->description}}</textarea>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="locale" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Select language</label>
                        <select name="locale" id="locale" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($user->locale == 'ru') selected @endif value="ru">Русский</option>
                            <option @if($user->locale == 'en') selected @endif value="en">English</option>
                        </select>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="email" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Email</label>
                        <input value="{{$user->email}}" type="email" name="email" id="email" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="type" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Page type</label>
                        <select name="type" id="type" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($user->type == 'Links') selected @endif value="Links">Links</option>
                            <option @if($user->type == 'Events') selected @endif value="Events">Events</option>
                            <option @if($user->type == 'Market') selected @endif value="Market">Market</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update profile
                        </button>
                    </div>
                </form>
            </div>

            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 mt-20">
                <form action="{{ route('updatePassword', ['user' => $user->id]) }}" method="post"> @csrf @method('PATCH')
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Old password</label>
                        <input placeholder="********" type="password" name="old_password" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">New password</label>
                        <input placeholder="********" type="password" name="password" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Re-New password</label>
                        <input placeholder="********" type="password" name="password_confirmation" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update password
                        </button>
                    </div>
                </form>
            </div>

            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 mt-20 mb-20">
                <form action="{{ route('updateTwoFactorAuth', ['user' => $user->id]) }}" method="post"> @csrf @method('PATCH')
                    <div class="mb-6 text-center">
                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Two-factor authentication</label>
                        <select name="two_factor_auth" id="two_factor_auth" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option @if($user->two_factor_auth == 1) selected @endif value="1">On</option>
                            <option @if($user->two_factor_auth == 0) selected @endif value="0">Off</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                            Update
                        </button>
                    </div>
                </form>
            </div>

        </div>
    <section>

{{--    <section class="flex justify-center m-5">--}}
{{--        <div class="sm:mt-12 w-full">--}}
{{--            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">--}}
{{--                <form>--}}
{{--                    <div class="mb-6 text-center">--}}
{{--                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Old password</label>--}}
{{--                        <input placeholder="********" type="password" name="name" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                    </div>--}}
{{--                    <div class="mb-6 text-center">--}}
{{--                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">New password</label>--}}
{{--                        <input placeholder="********" type="password" name="slug" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                    </div>--}}
{{--                    <div class="mb-6 text-center">--}}
{{--                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Re-New password</label>--}}
{{--                        <input placeholder="********" type="password" name="slug" id="slug" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">--}}
{{--                    </div>--}}
{{--                    <div class="mt-3">--}}
{{--                        <button type="submit" class="mt-2 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">--}}
{{--                            Update password--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    <section>--}}

</x-app-layout>
