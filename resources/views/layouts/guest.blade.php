<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>chrry.me</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/2s30L2z/fav.png">
</head>

<body>
    <div class="font-sans text-gray-900" style="background-image: linear-gradient(to right, #c6ffdd, #fbd786, #f7797d);">
        {{ $slot }}
    </div>
</body>

</html>
