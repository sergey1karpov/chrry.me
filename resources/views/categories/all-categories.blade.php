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

    <div class="text-center ml-4 mr-4">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

    <section class="flex justify-center mb-8">
        <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 rounded-lg">
            <div class="mb-8">
                <button data-modal-target="default" data-modal-toggle="popup-modal" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create new category
                </button>
            </div>
        </div>
    </section>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
        <div class="relative p-2 w-full max-w-md h-full md:h-auto">
            <!-- modal card element -->
            <div class="relative bg-white rounded-lg shadow" style="background-color: black" data-clickAway="true">
                <div href="#" class="relative block overflow-hidden rounded-lg bg-cover bg-center bg-no-repeat">
                    <div class="relative @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @else bg-gray-200 @endif p-2 text-white">
                        <button type="button" class="absolute top-0 right-0 top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div class="mt-5">
                            <form class="" action="{{ route('createCategory', ['user' => $user->id]) }}" method="POST"> @csrf @method('POST')
                                <div class="mb-6 text-center">
                                    <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Category name</label>
                                    <input placeholder="Polo shirts" name="name" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-800 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                </div>
                                <div class="mb-6 text-center">
                                    <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Category slug</label>
                                    <input placeholder="polo_shirts or polo-shirts" name="slug" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-800 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                </div>
                                <button data-modal-target="default" data-modal-toggle="popup-modal" type="submit" class="mt-5 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Create
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="flex justify-center mb-8">
        <div class="w-full mx-auto max-w-screen-xl ml-4 mr-4 sm:px-6 lg:px-8 rounded-lg">
            <table class="table w-full ">
                <tbody>
                    @foreach($categories as $category)
                        <tr data-index="{{$category->id}}" data-position="{{$category->position}}">
                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">
                                <div class="mt-" data-index="{{$category->id}}" data-position="{{$category->position}}">
                                    <div class="mt-1 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <div id="up">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    {{$category->name}}
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <button data-modal-target="default" data-modal-toggle="popup-modal{{$category->id}}" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </button>
                                                <button data-modal-target="default" data-modal-toggle="delete-modal{{$category->id}}" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div id="popup-modal{{$category->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                            <div class="relative p-2 w-full max-w-md h-full md:h-auto">
                                <!-- modal card element -->
                                <div class="relative bg-white rounded-lg shadow" style="background-color: black" data-clickAway="true">
                                    <div href="#" class="relative block overflow-hidden rounded-lg bg-cover bg-center bg-no-repeat">
                                        <div class="relative @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @else bg-gray-200 @endif p-2 text-white">
                                            <button type="button" class="absolute top-0 right-0 top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{$category->id}}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <div class="mt-5">
                                                <form action="{{ route('editCategory', ['user' => $user->id, 'category' => $category->id]) }}" method="POST"> @csrf @method('PATCH')
                                                    <div class="mb-6 text-center">
                                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Category name</label>
                                                        <input value="{{$category->name}}" name="name" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-800 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                    </div>
                                                    <div class="mb-6 text-center">
                                                        <label for="pass" class="mt-1 text-sm font-medium leading-relaxed text-indigo-600">Category slug</label>
                                                        <input value="{{$category->slug}}" placeholder="polo_shirts or polo-shirts" name="slug" id="name" style="border: none" class="mt-1 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 @if($user->dayVsNight == 1) bg-gray-800 dark:text-gray-400 @endif shadow-sm dark:placeholder-gray-400 ">
                                                    </div>
                                                    <button data-modal-target="default" data-modal-toggle="popup-modal" type="submit" class="mt-5 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="delete-modal{{$category->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                            <div class="relative p-2 w-full max-w-md h-full md:h-auto">
                                <!-- modal card element -->
                                <div class="relative bg-white rounded-lg shadow" style="background-color: black" data-clickAway="true">
                                    <div href="#" class="relative block overflow-hidden rounded-lg bg-cover bg-center bg-no-repeat">
                                        <div class="relative @if($user->dayVsNight == 1) bg-[#0f0f0f] dark:text-gray-400 @else bg-gray-200 @endif p-2 text-white">
                                            <button type="button" class="absolute top-0 right-0 top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="delete-modal{{$category->id}}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <div class="mt-5">
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 @if($user->dayVsNight == 1) dark:text-gray-200 @else dark:text-gray-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">If you delete this category, then all the products that are in it will also be deleted.</h3>
                                                    <form method="post" action="{{ route('deleteCategory', ['user' => $user->id, 'category' => $category->id]) }}"> @csrf @method('DELETE')
                                                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                    <button data-modal-toggle="delete-modal{{$category->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    @foreach($categories as $category)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $('table tbody').sortable({
                    handle:'#up',
                    update: function (event, ui) {
                        $(this).children().each(function (index) {
                            if ($(this).attr('data-position') != (index+1)) {
                                $(this).attr('data-position', (index+1)).addClass('updated');
                            }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var userId = {{$user->id}};
                var positions = [];
                $('.updated').each(function () {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    // url: userId + "/categories/sort",
                    url: "{{ route('sortCategory', ['user' => $user->id]) }}",
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    }, success: function (response) {
                        console.log(response);
                    }
                });
            }
        </script>
    @endforeach

</x-app-layout>



{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link rel="icon" type="image/x-icon" href="{{$user->favicon}}">--}}
{{--    <title>{{ $user->name }}</title>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}

{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap" rel="stylesheet">--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600&display=swap" rel="stylesheet">--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">--}}

{{--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>--}}

{{--    <!-- Date JQuery -->--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>--}}

{{--    <!-- Time -->--}}
{{--    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="{{asset('public/js/moment.js')}}" type="text/javascript"></script>--}}
{{--    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>--}}

{{--    @include('fonts.fonts')--}}
{{--    <style type="text/css">--}}
{{--        body{--}}
{{--            background: #f1f2f2;--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-attachment: fixed;--}}
{{--        }--}}
{{--        span{--}}
{{--            font-size:15px;--}}
{{--        }--}}
{{--        a{--}}
{{--            text-decoration:none;--}}
{{--            color: #0062cc;--}}
{{--        }--}}
{{--        .img {--}}
{{--            width: 25px;--}}
{{--            height: 25px;--}}
{{--            border-radius: 50%;--}}
{{--            margin-right: 0;--}}
{{--            background-position: center center;--}}
{{--            -wekit-background-size: cover;--}}
{{--            background-size: cover;--}}
{{--            background-repeat: no-repeat;--}}
{{--        }--}}
{{--        .ts-control {--}}
{{--            border: 0;--}}
{{--            box-shadow: 0px 1px 10px 2px rgba(0, 0, 0, 0.2);--}}
{{--        }--}}
{{--        .btn-check:focus+.btn, .btn:focus {--}}
{{--            outline: 0;--}}
{{--            box-shadow: none;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--    <body class="antialiased @if($user->dayVsNight) bg-dark text-white-50 @endif">--}}
{{--        @if (session('count'))--}}
{{--            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="border-radius: 0">--}}
{{--                {{ session('count') }}--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="container-fluid justify-content-center text-center">--}}
{{--            @if ($message = Session::get('error'))--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12" style="padding: 0">--}}
{{--                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: red">--}}
{{--                            <div class="title">--}}
{{--                                <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$message}}</span>--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if ($message = Session::get('success'))--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12" style="padding: 0">--}}
{{--                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0; background-color: lightseagreen">--}}
{{--                            <div class="title">--}}
{{--                                <span style="font-family: 'Rubik', sans-serif; font-size: 80%; line-height: 16px; display:block; color: white;">- {{$message}}</span>--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="container-fluid" style="padding: 0">--}}
{{--            <nav class="navbar navbar-expand-lg @if($user->dayVsNight) bg-dark text-white-50 @endif" style="background-color: #f1f2f2">--}}
{{--                <div class="container-fluid">--}}
{{--                    <a class="mb-1" href="{{ route('editProfileForm', ['user' => Auth::user()->id]) }}">--}}
{{--                        <img src="https://i.ibb.co/DM6hKmk/bbbbbbbbbbb.png" class="img-fluid" style="width:20px; border: 0">--}}
{{--                    </a>--}}
{{--                    <a class="" href="{{ route('userHomePage',  ['user' => Auth::user()->slug]) }}" style="text-decoration: none; border: 0; padding: 0">--}}
{{--                        <div class="img" style="background-image: url({{'/'.$user->avatar}});"></div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </div>--}}

{{--        <div class="ms-2 me-2 mb-3 text-center">--}}

{{--            <div class="d-grid gap-2">--}}
{{--                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add-category">Добавить категорию</button>--}}
{{--            </div>--}}
{{--            <div class="modal fade" id="add-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-body">--}}
{{--                            <form class="" action="{{ route('createCategory', ['user' => $user->id]) }}" method="POST"> @csrf @method('POST')--}}
{{--                                <div class="mb-3 text-center">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Название категории</label>--}}
{{--                                    <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                    <div id="emailHelp" class="form-text">Выберите подходящее название для вашей категории</div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3 text-center">--}}
{{--                                    <label for="exampleInputEmail1" class="form-label">Slug категории</label>--}}
{{--                                    <input required type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                    <div id="emailHelp" class="form-text">Короткое имя вашей категории без пробелов</div>--}}
{{--                                </div>--}}
{{--                                <div class="d-grid gap-2">--}}
{{--                                    <button class="btn btn-success" type="submit">Создать категорию</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <table class="table">--}}
{{--                <tbody>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <tr data-index="{{$category->id}}" data-position="{{$category->position}}">--}}
{{--                            <td style="padding-left: 0; padding-right: 0; padding-bottom: 0; border: 0">--}}
{{--                                <div class="mt-" data-index="{{$category->id}}" data-position="{{$category->position}}">--}}
{{--                                    <div class="card shadow" style="border: none;">--}}
{{--                                        <div class="row g-0" style="border-radius: 5px;">--}}
{{--                                            <div class="col-2 d-flex align-items-center" id="up">--}}
{{--                                                <img src="https://i.ibb.co/HdtH8Z5/dots-three-vertical.png" width="20">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-8 text-center">--}}
{{--                                                <h1 style="font-family: 'Inter', sans-serif; font-size: 1rem; margin-top: 8px; margin-bottom: 8px;">{{$category->name}}</h1>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-2 d-flex align-items-center">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-6" style="padding-right: 0" data-bs-toggle="modal" data-bs-target="#editCat{{$category->id}}">--}}
{{--                                                        <img src="https://i.ibb.co/tQpXNcg/edit-1.png" width="20">--}}
{{--                                                    </div>--}}
{{--                                                    @if($category->slug != 'all')--}}
{{--                                                        <div class="col-6">--}}
{{--                                                            <button style="border: 0" class="btn p-0" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">--}}
{{--                                                                <img src="https://i.ibb.co/7R29Bpj/remove.png" width="20">--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-body text-center">--}}
{{--                                        <p style="font-family: 'Inter', sans-serif; font-size: 1rem;">При удалении категории удалятся все продукты, которые в ней находятся!</p>--}}
{{--                                        <p style="font-family: 'Inter', sans-serif; font-size: 1rem;">Приятного удаления!</p>--}}
{{--                                        <img src="https://static.vecteezy.com/system/resources/previews/012/042/288/original/danger-sign-icon-transparent-background-free-png.png" width="300">--}}
{{--                                    </div>--}}
{{--                                    <div class="p-2">--}}
{{--                                        <form method="post" action="{{ route('deleteCategory', ['user' => $user->id, 'category' => $category->id]) }}"> @csrf @method('DELETE')--}}
{{--                                            <div class="d-grid gap-2">--}}
{{--                                                <button class="btn btn-danger" type="submit">Удалить</button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal fade" id="editCat{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <form action="{{ route('editCategory', ['user' => $user->id, 'category' => $category->id]) }}" method="POST">--}}
{{--                                            @csrf @method('PATCH')--}}
{{--                                            <div class="mb-3 text-center">--}}
{{--                                                <label for="exampleInputEmail1" class="form-label">Название категории</label>--}}
{{--                                                <input required type="text" value="{{$category->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                                <div id="emailHelp" class="form-text">Выберите подходящее название для вашей категории</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-3 text-center">--}}
{{--                                                <label for="exampleInputEmail1" class="form-label">Slug категории</label>--}}
{{--                                                <input required pattern=".*\S+.*" title="This field is required" type="text" value="{{$category->slug}}" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">--}}
{{--                                                <div id="emailHelp" class="form-text">Короткое имя вашей категории без пробелов</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="d-grid gap-2">--}}
{{--                                                <button class="btn btn-success" type="submit">Обновить категорию</button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        @foreach($categories as $category)--}}
{{--            <script type="text/javascript">--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}

{{--                $(document).ready(function () {--}}
{{--                    $('table tbody').sortable({--}}
{{--                        handle:'#up',--}}
{{--                        update: function (event, ui) {--}}
{{--                            $(this).children().each(function (index) {--}}
{{--                                if ($(this).attr('data-position') != (index+1)) {--}}
{{--                                    $(this).attr('data-position', (index+1)).addClass('updated');--}}
{{--                                }--}}
{{--                            });--}}

{{--                            saveNewPositions();--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}

{{--                function saveNewPositions() {--}}
{{--                    var userId = {{$user->id}};--}}
{{--                    var positions = [];--}}
{{--                    $('.updated').each(function () {--}}
{{--                        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);--}}
{{--                        $(this).removeClass('updated');--}}
{{--                    });--}}

{{--                    $.ajax({--}}
{{--                        // url: userId + "/categories/sort",--}}
{{--                        url: "{{ route('sortCategory', ['user' => $user->id]) }}",--}}
{{--                        method: 'POST',--}}
{{--                        dataType: 'text',--}}
{{--                        data: {--}}
{{--                            update: 1,--}}
{{--                            positions: positions--}}
{{--                        }, success: function (response) {--}}
{{--                            console.log(response);--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            </script>--}}
{{--        @endforeach--}}
{{--    </body>--}}
{{--</html>--}}









