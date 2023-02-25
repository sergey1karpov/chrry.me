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

    @if(count($user->events) > 0)
        <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                <div class="">
                    <div class="group block">
                        <div class="card-block block rounded-xl @if($user->dayVsNight == 1) bg-[#0f0f0f] border-4 @endif border-[#0f0f0f] p-8 shadow-xl transition hover:border-red-600/50 hover:shadow-red-600/50 group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-red-600/50">
                            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl @if($user->dayVsNight == 1) text-gray-50 @else text-black @endif">Mass update</h1>
                            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">Use this feature if you want to change the design of all events at once</p>
                            <a href="{{ route('editAllEventsForm', ['user' => $user->id]) }}" type="" class="inline-block rounded border border-indigo-900 bg-indigo-900 px-9 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                UPDATE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="content-block text-white @if($user->dayVsNight == 1) bg-black @endif">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="text-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">

                @foreach($user->events as $event)
                    @php
                        $properties = (object) unserialize($event->properties)
                    @endphp
                    <div class="container mb-4">
                        <div class="{{$event->event_animation}}" style="
                            animation-duration: {{$event->animation_speed}}s;
                            border-radius: {{$properties->de_event_round}}px;
                            box-shadow: {{$properties->de_event_card_shadow_right}}px {{$properties->de_event_card_shadow_bottom}}px {{$properties->de_event_card_shadow_blur}}px {{$properties->de_event_card_shadow_color}};
                            @if($properties->de_event_card_shadow_right) margin-right: {{$properties->de_event_card_shadow_right}}px @endif
                        ">
                            @include('event.types.' . $user->eventSettings->close_card_type, ['event' => $event, 'properties' => (object) unserialize($event->properties)])
                        </div>
                    <div class="mb-5 mt-5 inline-flex rounded-lg shadow-sm" role="group">
                        <a href="{{ route('editEventForm', ['user' => $user->id, 'event' => $event->id]) }}" class="border-r w-20 px-5 py-1 text-sm font-medium text-gray-900 bg-white rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            Edit
                        </a>
                        <form action="{{ route('deleteEvent', ['user' => Auth::user()->id, 'event' => $event->id]) }}" method="POST"> @csrf @method('DELETE')
                            <button type="submit" class="w-20 px-5 py-1 text-sm font-medium text-gray-900 bg-white rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>


