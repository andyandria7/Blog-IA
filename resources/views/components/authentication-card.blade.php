<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
    <video autoplay muted loop id="myVideo" class="video-background w-full" style="position: fixed;">
        {{-- <source src="{{ asset('images/Colorful Matrix Code Live Wallpaper.mp4') }}" type="video/mp4"> --}}
        <source src="{{ asset('images/Free stock video - Connections futuristic 3d geometry structure (loop).mp4') }}" type="video/mp4">
    </video>
    <div class="z-10">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 dark:bg-slate-500 shadow-md overflow-hidden sm:rounded-lg z-10">
        {{ $slot }}
    </div>
</div>
