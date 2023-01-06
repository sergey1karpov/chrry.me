<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$attributes['user']['name']}}</title>

        <!-- Tailwind Css -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Flowbite -->
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />

        <!-- Flowbite DatePicker-->
        <script src="https://unpkg.com/flowbite@1.5.5/dist/datepicker.js"></script>

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Tom Select -->
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

        <!-- Animation animate.style -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <style>
            .ts-dropdown-content {
                /*align-items: flex-start;*/
                /*flex-wrap: nowrap;*/
                /*height: 100%;*/
            }
        </style>

    </head>
    <body class="body-block font-sans antialiased @if($attributes['user']['dayVsNight'] == 1) bg-black @endif">

        <div class="content-block min-h-screen @if($attributes['user']['dayVsNight'] == 1) bg-black @endif">
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="footer-block mt-5 p-5 shadow md:px-6 md:py-8 navbar-fixed-bottom @if($attributes['user']['dayVsNight'] == 1) bg-black @endif">
            <div class="">
                <div class="flex justify-center">
                    <a href="https://flowbite.com/" class="flex items-center mb-4">
                        <img src="https://i.ibb.co/3dJD25v/new-logo.png" class="mr-3 h-6" alt="Flowbite Logo" />
                    </a>
                </div>
                <div class="flex justify-center">
                    <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}"> @csrf
                                <button type="submit">
                                    <span href="#" class="hover:underline">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="flex justify-center">
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
            </div>
        </footer>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $( document ).ready(function() {
                $("#theme").click(function() {
                    var type = $(this).is(':checked');
                    var id = $(this).data('id');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/"+"id"+id+"/profile/change-theme",
                        type: 'PATCH',
                        data: {_token: CSRF_TOKEN, type: type},
                        dataType: 'HTML',
                        success: function (){
                            if(type) { //Add night mode
                                console.log('Sleep');
                                $(".body-block").addClass('bg-black');
                                $(".text-block").addClass('text-white');
                                $(".text-block2").removeClass('text-black');
                                $(".header-block").addClass('bg-black');
                                $(".footer-block").addClass('bg-black');
                                $(".content-block").addClass('bg-black');
                                $(".switch-text").addClass('text-gray-300');
                                $(".switch-text").html('Light on');
                                $(".btn-block").addClass('dark:border-white').addClass('dark:text-white');
                                $(".card-block").addClass('bg-[#0f0f0f] border-4')
                            } else { //Add day mode
                                console.log('Wake up!');
                                $(".body-block").removeClass('bg-black');
                                $(".text-block").removeClass('text-white');
                                $(".text-block2").addClass('text-black');
                                $(".header-block").removeClass('bg-black');
                                $(".footer-block").removeClass('bg-black');
                                $(".content-block").removeClass('bg-black');
                                $(".switch-text").removeClass('text-gray-300');
                                $(".switch-text").html('Light off');
                                $(".btn-block").removeClass('dark:border-white').removeClass('dark:text-white');
                                $(".card-block").removeClass('bg-[#0f0f0f] border-4')
                            }
                        },
                    });
                });
            });
        </script>

        <!-- Flowbite -->
        <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

    </body>
</html>

{{--border-4 border-black group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#000]--}}
