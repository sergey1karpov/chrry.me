<div id="popup-modal" aria-hidden="true" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full">
    <div class="relative w-full max-w-md h-full md:h-auto">
        <div id="banner-block" class="relative w-full @if($user->type == 'Links') h-full @elseif($user->type == 'Event') h-auto @endif shadow"
             @if($user->settings->banner)
                 style="background: url({{ '../'.$user->settings->banner }}) no-repeat center center fixed; background-size: cover;"
             @elseif($user->settings->background_color)
                 style="background-color: {{$user->settings->background_color ?? 'red'}};"
            @endif
        >
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>

            <div id="default-block">
                @if($user->settings->avatar_vs_logotype == 'avatar')
                    <div class="flex justify-center">
                        <img src="{{'../' . $user->settings->avatar}}" class="rounded-full mt-10" style="width: 96px; height: 96px">
                    </div>
                @elseif($user->settings->avatar_vs_logotype == 'logotype')
                    <div class="flex justify-center">
                        <img id="logo" src="{{'../' . $user->settings->logotype}}" class="mt-20" width="{{$user->settings->logotype_size}}" style="
                        filter: drop-shadow({{$user->settings->logotype_shadow_right}}px {{$user->settings->logotype_shadow_bottom}}px {{$user->settings->logotype_shadow_round}}px {{$user->settings->logotype_shadow_color}});
                        @if($user->settings->logotype_shadow_right) margin-right:{{$user->settings->logotype_shadow_right}}px; @endif
                    ">
                    </div>
                @else

                @endif
            </div>

            <div class="flex justify-center" id="def-ava" style="display:none;">
                <img src="{{'../' . $user->settings->avatar}}" class="rounded-full mt-10" style="width: 96px; height: 96px">
            </div>
            <div class="flex justify-center" id="def-logo" style="display:none;">
                <img id="logo" src="{{'../' . $user->settings->logotype}}" class="mt-20" width="{{$user->settings->logotype_size}}" style="
                        filter: drop-shadow({{$user->settings->logotype_shadow_right}}px {{$user->settings->logotype_shadow_bottom}}px {{$user->settings->logotype_shadow_round}}px {{$user->settings->logotype_shadow_color}});
                        @if($user->settings->logotype_shadow_right) margin-right:{{$user->settings->logotype_shadow_right}}px; @endif
                    ">
            </div>

            <div id="ava-block" style="display:none;">
                <div class="flex justify-center">
                    <img id="ava-img" class="rounded-full mt-10" style="width: 96px; height: 96px">
                </div>
            </div>

            <div id="logo-block" style="display:none;">
                <div class="flex justify-center">
                    <img id="logo-img" class="mb-3 mt-20" width="{{$user->settings->logotype_size}}" style="
                        filter: drop-shadow({{$user->settings->logotype_shadow_right}}px {{$user->settings->logotype_shadow_bottom}}px {{$user->settings->logotype_shadow_round}}px {{$user->settings->logotype_shadow_color}});
                        @if($user->settings->logotype_shadow_right) margin-right:{{$user->settings->logotype_shadow_right}}px; @endif
                    ">
                </div>
            </div>

            <h2 style="
                        font-family: {{ $user->settings->name_font ?? 'Rubik' }}, sans-serif;
                        text-shadow:{{$user->settings->name_font_shadow_right ?? 0}}px {{$user->settings->name_font_shadow_bottom ?? 0}}px {{$user->settings->name_font_shadow_blur ?? 0}}px {{$user->settings->name_font_shadow_color ?? '#464646'}} ;
                        font-size: {{ $user->settings->name_font_size ?? 1}}rem;
                        color: {{ $user->settings->name_color ?? '#464646'}};
                        display: none;
                    " id="user-name" class="mt-4 flex justify-center items-center">
                {{ $user->name }}
                <div id="verify-block" style="display: none">
                    <div id="verify-upload">
                        <img id="verify" src="{{$user->settings->verify_icon}}" class="ml-2 mt-1" style="width: 20px; height: 20px">
                    </div>
                    <div id="verify-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="ml-2 mt-1 bi bi-patch-check-fill " viewBox="0 0 16 16" id="v-icon" style="color: {{$user->settings->verify_color}}">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                    </div>
                </div>
            </h2>

            <div class="text-center">
                <h2 id="user-description" class="mt-1 mr-5 ml-5" style="
                        line-height: 1.4;
                        font-family: {{ $user->settings->description_font ?? 'Rubik' }}, sans-serif;
                        text-shadow:{{$user->settings->description_font_shadow_right ?? 0}}px {{$user->settings->description_font_shadow_bottom ?? 0}}px {{$user->settings->description_font_shadow_blur ?? 0}}px {{$user->settings->description_font_shadow_color ?? '#464646'}} ;
                        font-size: {{ $user->settings->description_font_size ?? 0.9}}rem;
                        color: {{ $user->settings->description_color ?? '#464646'}};
{{--                        @if($user->settings->description_font_shadow_right) margin-right: {{$user->settings->description_font_shadow_right}}px @endif--}}
                    ">
                    {{ $user->description }}
                </h2>
            </div>

            <div class="flex justify-evenly mb-5 mt-5" id="top-bar" style="display: none">
                <nav class="navbar mt-2">
                    <div class="flex flex-wrap justify-center">
                        @foreach($user->userLinksInBar($user) as $link)
                            @if($link->icon)
                                <div>
                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                        <img src="{{$link->icon}}" class="ml-2 mr-2 mt-3 " id="iconTop" style="width:{{ $user->settings->round_links_width }}px; filter: drop-shadow({{ $user->settings->round_links_shadow_right }}px {{ $user->settings->round_links_shadow_bottom }}px {{ $user->settings->round_links_shadow_round }}px {{ $user->settings->round_links_shadow_color }})">
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>

            @if($user->type == 'Links')
                <div id="links-bar">
                    <div class="mx-auto mt-10 max-w-screen-xl px-4 pb-4 sm:px-6 lg:px-8" id="block-with-links" style="display: none">
                        <div class="group block">
                            <table class="table w-full">
                                <tbody>
                                @foreach($user->demoUserLinks(false) as $link)
                                    @php
                                        $properties = unserialize($link->properties)
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="mb-5 justify-center text-center">
                                                <div>
                                                    <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1" style="
                                                        animation-duration: {{$link->animation_speed}}s;
                                                        border-color: {{$properties['dl_border_color']}};
                                                        background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                        border-radius: {{$properties['dl_rounded']}}px;
                                                        background-position: center;
                                                        box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                        @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                        @if($properties['dl_link_block_shadow_bottom']) margin-bottom: {{$properties['dl_link_block_shadow_bottom']}}px; @endif
                                                    ">
                                                        <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                            <div class="col-span-1 flex items-center flex-none">
                                                                @if($link->icon)
                                                                    <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @elseif($link->icon == false && $link->photo == true)
                                                                    <img class="mt-1 mb-1" src="{{'../'. $link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @else
                                                                    <img class="mt-1 mb-1" src="https://emoji.discadia.com/emojis/914c0e06-428c-4c1d-bf2c-3393dc14987f.PNG" style="width:50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                                @endif
                                                            </div>
                                                            <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                                <div class="col-span-10 text-center flex items-center">
                                                                    <div class="ml-3 mr-3">
                                                                        <h4 class="text-ellipsis" style="
                                                                            text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                            font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                            line-height: 1.5;
                                                                            font-weight: {{$properties['dl_font_bold']}};
                                                                            font-size: {{$properties['dl_font_size']}}rem;
                                                                            margin: 0;
                                                                            color: {{$properties['dl_title_color']}};
                                                                            @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif
                                                                            @if($link->photo == '' && $link->icon == '')
                                                                                @if($properties['dl_text_shadow_bottom'])
                                                                                    margin-top: 13px; margin-bottom: 13px;
                                                                                @else
                                                                                    margin-top: 13px; margin-bottom: {{13 + $properties['dl_text_shadow_bottom']}}px;
                                                                                @endif
                                                                            @endif
                                                                            @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif
                                                                            @if($properties['dl_text_shadow_right']) margin-right: {{$properties['dl_text_shadow_right']}}px; @endif
                                                                            @if($properties['dl_link_block_shadow_right']) margin-left: {{$properties['dl_link_block_shadow_right']}}px @endif
                                                                        ">{{$link->title}}</h4>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            @if(Auth::check())
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mx-auto mt-10 max-w-screen-xl px-4 pb-4 sm:px-6 lg:px-8" id="block-withOut-links" style="display: none">
                        <div class="group block">
                            <table class="table w-full">
                                <tbody>
                                @foreach($user->demoUserLinks(true) as $link)
                                    @php
                                        $properties = unserialize($link->properties)
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="mb-5 justify-center text-center">
                                                <div>
                                                    <div class="{{$link->animation}} {{$properties['dl_border']}} row card ms-1 me-1" style="
                                                        animation-duration: {{$link->animation_speed}}s;
                                                        border-color: {{$properties['dl_border_color']}};
                                                        background-color:rgba({{$properties['dl_background_color']}}, {{$properties['dl_transparency']}});
                                                        border-radius: {{$properties['dl_rounded']}}px;
                                                        background-position: center;
                                                        box-shadow: {{$properties['dl_link_block_shadow_right']}}px {{$properties['dl_link_block_shadow_bottom']}}px {{$properties['dl_link_block_shadow_blur']}}px {{$properties['dl_link_block_shadow_color']}};
                                                        @if($properties['dl_link_block_shadow_right']) margin-right: {{$properties['dl_link_block_shadow_right']}}px; @endif
                                                        @if($properties['dl_link_block_shadow_bottom']) margin-bottom: {{$properties['dl_link_block_shadow_bottom']}}px; @endif
                                                    ">
                                                        <div class="flex align-center justify-between" style="padding-left: 4px; padding-right: 4px">
                                                            <div class="col-span-1 flex items-center flex-none">
                                                                @if($link->icon)
                                                                    <img class="mt-1 mb-1" src="{{$link->icon}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @elseif($link->icon == false && $link->photo == true)
                                                                    <img class="mt-1 mb-1" src="{{'../'. $link->photo}}" style="width:50px; border-radius: {{$properties['dl_rounded']}}px;">
                                                                @else
                                                                    <img class="mt-1 mb-1" src="https://emoji.discadia.com/emojis/914c0e06-428c-4c1d-bf2c-3393dc14987f.PNG" style="width:50px; border-radius: {{$properties['dl_rounded']}}px; opacity: 0;">
                                                                @endif
                                                            </div>
                                                            <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                                                <div class="col-span-10 text-center flex items-center">
                                                                    <div class="ml-3 mr-3">
                                                                        <h4 class="text-ellipsis" style="
                                                                            text-shadow:{{$properties['dl_text_shadow_right']}}px {{$properties['dl_text_shadow_bottom']}}px {{$properties['dl_text_shadow_blur']}}px {{$properties['dl_text_shadow_color']}};
                                                                            font-family: '{{$properties['dl_font']}}', sans-serif;
                                                                            line-height: 1.5;
                                                                            font-weight: {{$properties['dl_font_bold']}};
                                                                            font-size: {{$properties['dl_font_size']}}rem;
                                                                            margin: 0;
                                                                            color: {{$properties['dl_title_color']}};
{{--                                                                            @if($link->photo == '' && $link->icon == '') margin-top: 14px; margin-bottom: 14px; @endif--}}
                                                                            @if($link->photo == '' && $link->icon == '')
                                                                                @if($properties['dl_text_shadow_bottom'])
                                                                                    margin-top: 13px; margin-bottom: 13px;
                                                                                @else
                                                                                    margin-top: 13px; margin-bottom: {{13 + $properties['dl_text_shadow_bottom']}}px;
                                                                                @endif
                                                                            @endif
{{--                                                                            @if($properties['dl_text_shadow_bottom']) margin-bottom: {{$properties['dl_text_shadow_bottom']}}px; @endif--}}
                                                                            @if($properties['dl_text_shadow_right']) margin-right: {{$properties['dl_text_shadow_right']}}px; @endif
                                                                            @if($properties['dl_link_block_shadow_right']) margin-left: {{$properties['dl_link_block_shadow_right']}}px @endif
                                                                        ">{{$link->title}}</h4>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                            @if(Auth::check())
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-span-1 flex items-center flex-none" style="opacity: 0">
                                                                    <div href="{{ route('editProfileForm', ['user' => $user->id]) }}" class="text-indigo-900  border-indigo-900 hover:bg-indigo-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-indigo-900 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-900 dark:text-indigo-900 dark:hover:text-white dark:focus:ring-indigo-900">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @elseif($user->type == 'Events')
                <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                    @foreach($user->demoUserEvents() as $event)

                        @php
                            $properties = (object) unserialize($event->properties)
                        @endphp

                        <div class="container pl-1 pr-1 " >
                            <div style="
                            @if($properties->de_event_card_shadow_right) margin-right: {{$properties->de_event_card_shadow_right}}px @endif
                        ">
                                @include('event.types.' . $user->eventSettings->close_card_type, ['event' => $event, 'properties' => (object) unserialize($event->properties)])
                            </div>
                        </div>

                    @endforeach
                </div>
            @endif

            <div class="flex justify-evenly mb-5 mt-5" id="bottom-bar" style="display: none">
                <nav class="navbar mt-2">
                    <div class="flex flex-wrap justify-center">
                        @foreach($user->userLinksInBar($user) as $link)
                            @if($link->icon)
                                <div>
                                    <button type="submit" style="border: 0; padding: 0; background-color: rgba(0, 125, 215, 0);">
                                        <img src="{{$link->icon}}" class="ml-2 mr-2 mt-3 " id="iconBottom" style="width:{{ $user->settings->round_links_width }}px; filter: drop-shadow({{ $user->settings->round_links_shadow_right }}px {{ $user->settings->round_links_shadow_bottom }}px {{ $user->settings->round_links_shadow_round }}px {{ $user->settings->round_links_shadow_color }})">
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>

            <footer id="footer" style="display: none" class="sticky top-[100vh] footer-block mt-20 p-2  md:px-6 md:py-8 navbar-fixed-bottom @if($user->settings->event_followers == '1') mb-20 @else mb-4 @endif" >
                <div class="flex justify-center items-center">
                    <div class="flex justify-center items-center">
                        <a href="https://chrry.me/" class="flex items-center">
                            <img src="https://i.ibb.co/bPydGXN/3.png" class="h-4" alt="CHRRY.ME Logo"/>
                        </a>
                    </div>
                </div>
            </footer>

            <div id="drawer-btn" class="mx-auto max-w-screen-xl px-4 pb-4 sm:px-6 lg:px-8 text-center" data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button">
                <div class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bottom-2 left-1/2 flex items-center">
                    <div id="eventModalBtn" class="{{$user->settings->follow_block_border_radius}} w-full p-4 text-sm text-gray-800 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 ml-4 mr-4 flex justify-center items-center" role="alert" style="
                    background-color: {{$user->settings->follow_block_bg_color}};
                    box-shadow: {{$user->settings->follow_btn_top_shadow_right}}px {{$user->settings->follow_btn_top_shadow_top}}px {{$user->settings->follow_btn_top_shadow_blur}}px {{$user->settings->follow_btn_top_shadow_color}};
                    animation-duration: {{$user->settings->follow_border_animation_speed}}s;
                    border-color: {{$user->settings->follow_border_color}};
                    ">
                        <h1 id="drawer-text" style="
                        font-family: {{$user->settings->follow_block_font}};
                        color: {{$user->settings->follow_block_font_color}};
                        text-shadow:{{$user->settings->follow_block_font_shadow_right}}px {{$user->settings->follow_block_font_shadow_bottom}}px {{$user->settings->follow_block_font_shadow_blur}}px {{$user->settings->follow_block_font_shadow_color}};
                    " class="{{$user->settings->follow_block_text_size}}">{{$user->settings->follow_block_text}}</h1>
                    </div>
                </div>
            </div>

            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 rounded-t dark:border-gray-600 text-center">
                            <button id="closeFollowModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-3">
                            <div class="mx-auto max-w-lg text-center">
                                <h1 class="text-sm font-bold sm:text-3xl">Подписка на</h1>
                                <h1 class="text-2xl font-bold sm:text-3xl">{{$user->name}}</h1>
                                <p class="mt-4 text-gray-500 text-sm">
                                    Как только в вашем городе появится мероприятие с участием {{$user->name}}
                                    мы сразу же оповестим вас об этом отправив письмо на почту
                                </p>
                            </div>
                            <div class="" id="followAlert">
                                <div class="alert-danger px-6 py-4 bg-yellow-50 rounded-lg text-red-600" style="display: none">
                                </div>
                            </div>
                            <div class="mx-auto mb-0 mt-8 max-w-md space-y-4">
                                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                <input type="hidden" name="page_type" id="page_type" value="{{$user->type}}">
                                <div>
                                    <div class="relative">
                                        <input type="text" name="name" id="nameFollow" class="w-full rounded-lg border-gray-200 p-2 pe-12 text-sm shadow-sm" placeholder="Город" />
                                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input type="text" name="name" id="nameFollow" class="w-full rounded-lg border-gray-200 p-2 pe-12 text-sm shadow-sm" placeholder="Ваше имя" />
                                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input name="email" id="emailFollow" type="email" class="w-full rounded-lg border-gray-200 p-2 pe-12 text-sm shadow-sm" placeholder="Введите email" />
                                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input name="telephone" id="telephoneFollow" type="text" class="w-full bg-gray-100 rounded-lg border-gray-200 p-2 pe-12 text-sm shadow-sm" placeholder="Номер телефона"/>
                                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <input name="telegram" id="telegramFollow" type="text" class="w-full bg-gray-100 rounded-lg border-gray-200 p-2 pe-12 text-sm shadow-sm" placeholder="Телеграм"/>
                                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <button id="eventFollowBtn" class="w-full inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                                        Подписаться
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button  id="followModalBtn" style="display: none" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                Toggle login modal
            </button>

            <div id="authentication-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto items-center flex">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative w-full">
                        <div class="flex justify-end p-2">
                            <button id="" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <div class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                            <div class="text-center">

                                <h1 id="cong-text" class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-black" style="display: none">
                                    {{$user->settings->congratulation_text}}
                                </h1>

                                <div id="cong-gif" class="flex justify-center" style="display: none">
                                    <img id="gif-cong" class="w-full rounded mb-3" src="{{'../'.$user->settings->congratulation_gif }}">
                                </div>

                                <h1 id="cong-text-def" class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-black" style="display: none">
                                    Подписка на @if($user->type == 'Events') мероприятия @endif
                                    <span class="text-blue-600 dark:text-blue-500">{{$user->name}}</span>
                                    успешно оформлена!
                                </h1>
                            </div>
                        </div>
                        {{--                    <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">--}}
                        {{--                        <button data-modal-toggle="authentication-modal" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ЯсноПонятно!</button>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
