<div class="h-screen flex flex-col justify-center items-center  bg-black">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md  px-6 py-4 bg-black overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
