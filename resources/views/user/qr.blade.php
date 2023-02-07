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

    <div class="m-5 flex justify-center drop-shadow-lg">
        @if($user->qrCode)
        <img src="{{'/'.$user->qrCode->code}}" width="300">
        @endif
    </div>
    <div class="m-5 flex justify-center drop-shadow-lg">
        @if($user->qrCode)
            <a class="font-semibold text-gray-900 underline dark:text-indigo-600 decoration-indigo-600" href="{{ route('qrDownload', ['user' => $user->id]) }}">Download QrCode (PNG)</a>
        @endif
    </div>

    <section class="flex justify-center m-5">
        <div class="sm:mt-12 w-full">
            <div class="mx-auto max-w-screen-xl sm:px-6 lg:px-8 mt-20 mb-20">
                @if($user->qrCode->logotype)
                    <div class="flex justify-center mb-10">
                        <img src="{{ '/'.$user->qrCode->logotype }}" width="200">
                    </div>
                @endif
                <form action="{{ route('uploadLogotype', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data"> @csrf
                    <div class="mb-3 text-center">
                        <input name="logo" class="mt-3 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full @if($user->dayVsNight == 1) bg-gray-900 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file">
                        <p class="mt-1 text-sm @if($user->dayVsNight == 1) text-gray-500 @else text-gray-500 @endif" id="avatar">Only PNG (MAX Size. 10mb).</p>
                    </div>
                    <button type="submit" class="mt-3 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        Upload file
                    </button>
                </form>
                @if($user->qrCode->logotype)
                    <div class="mt-3">
                        <form action="{{ route('dropQrLogotype', ['user' => $user->id, 'type' => 'avatar']) }}" method="POST"> @csrf @method('PATCH')
                            <button type="submit" class="border border-red-600 w-full inline-block rounded-lg bg-red-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="flex justify-center m-5">
        <div class="sm:mt-12 w-full">
            <div class="mx-auto max-w-screen-xl sm:px-6 lg:px-8 mt-20 mb-20">
                <form action="{{ route('generateQrCode', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data"> @csrf
                    <div class="mb-6 text-center">
                        <label for="type" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Color type</label>
                        <select name="qr_type" id="type" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option selected value="colors">Colors</option>
                            <option value="gradient">Gradient</option>
                        </select>
                    </div>
                    <div id="gradient">
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Start red</label>
                            <input id="steps-range" type="range" name="startRed" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Start green</label>
                            <input id="steps-range" type="range" name="startGreen" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Start blue</label>
                            <input id="steps-range" type="range" name="startBlue" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">End red</label>
                            <input id="steps-range" type="range" name="endRed" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">End green</label>
                            <input id="steps-range" type="range" name="endGreen" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-8 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">End blue</label>
                            <input id="steps-range" type="range" name="endBlue" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                        </div>
                        <div class="mb-6 text-center">
                            <label for="type" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Gradient type</label>
                            <select name="gr_type" id="type" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                <option selected value="vertical">Vertical</option>
                                <option value="horizontal">Horizontal</option>
                                <option value="diagonal">Diagonal</option>
                                <option value="inverse_diagonal">Inverse diagonal</option>
                                <option value="radial">Radial</option>
                            </select>
                        </div>
                    </div>
                    <div id="colors">
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Qr background color</label>
                            <input type="color" value="#ffffff" name="qr_bg_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Qr color</label>
                            <input type="color" value="#000000" name="qr_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                        </div>
                        <div id="block-14" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-1">
                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                                        <span>Eye 1 color settings</span>
                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                        <div class="mb-3 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Qr background color</label>
                                            <input type="color" value="#000000" name="eye_1_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Red</label>
                                            <input id="steps-range" type="range" name="eye_1_outterRed" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Green</label>
                                            <input id="steps-range" type="range" name="eye_1_outterGreen" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Blue</label>
                                            <input id="steps-range" type="range" name="eye_1_outterBlue" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="block-14" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-2">
                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                                        <span>Eye 2 color settings</span>
                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                        <div class="mb-3 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Qr background color</label>
                                            <input type="color" value="#000000" name="eye_2_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Red</label>
                                            <input id="steps-range" type="range" name="eye_2_outterRed" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Green</label>
                                            <input id="steps-range" type="range" name="eye_2_outterGreen" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Blue</label>
                                            <input id="steps-range" type="range" name="eye_2_outterBlue" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="block-14" class="mb-8 w-full mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 shadow-lg rounded-lg @if($user->dayVsNight == 1) bg-[#0f0f0f] @endif">
                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-3">
                                    <button type="button" class="rounded-lg flex items-center justify-between w-full px-2 py-5 font-medium text-left text-gray-500  border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                        <span>Eye 3 color settings</span>
                                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                                    <div class="py-2 font-light border-gray-200 dark:border-gray-700">
                                        <div class="mb-3 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Qr background color</label>
                                            <input type="color" value="#000000" name="eye_3_color" id="logotype_shadow_color" class="h-11 mt-1 block w-full @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm" style="border-radius: 50%">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Red</label>
                                            <input id="steps-range" type="range" name="eye_3_outterRed" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Green</label>
                                            <input id="steps-range" type="range" name="eye_3_outterGreen" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                        <div class="mb-8 text-center">
                                            <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Blue</label>
                                            <input id="steps-range" type="range" name="eye_3_outterBlue" value="0" min="0" max="255" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <label for="type" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Qr style</label>
                        <select name="qr_style" id="type" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                            <option selected value="square">Square</option>
                            <option value="round">Round</option>
                        </select>
                    </div>
                    @if($user->qrCode->logotype)
                        <label for="steps-range" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Size logo</label>
                        <input id="steps-range" type="range" name="logo_size" min="0.1" max="0.9" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer @if($user->dayVsNight == 1) dark:bg-gray-900 @endif">
                    @endif
                    <button type="submit" class="mt-8 border border-indigo-600 w-full inline-block rounded-lg bg-indigo-900 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        Generate QrCode
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script>
        var qr_type = $("#type").val();

        if(qr_type == 'colors') {
            $("#gradient").hide();
            $("#colors").show();
        }

        if(qr_type == 'gradient') {
            $("#gradient").show();
            $("#colors").hide();
        }

        $('#type').change(function(){
            $('#pp').html($(this).val());
            if($(this).val() == 'colors') {
                $("#gradient").hide();
                $("#colors").show();
            }
            if($(this).val() == 'gradient') {
                $("#gradient").show();
                $("#colors").hide();
            }
        });
    </script>

</x-app-layout>
