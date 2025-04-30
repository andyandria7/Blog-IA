@extends('layouts.master')
@section('title')
    Contenue
@endsection
@section('content')
<div class="flex justify-center items-center">
    @livewire('search')
</div>
<video autoplay muted loop id="myVideo" class="video-background">
    <source src="{{ asset('images/Colorful Matrix Code Live Wallpaper.mp4') }}" type="video/mp4">
    {{-- <source src="{{ asset('images/3129957-uhd_3840_2160_25fps.mp4') }}" type="video/mp4"> --}}
</video>
    <section class="">
        <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-6">
            @foreach ($posts as $post)
                <div class="container mx-auto my-12 flex justify-center items-center">
                    @auth
                        <a href="{{ route('blog.show', $post->id) }}">

                        @endauth
                        <div class="max-w-sm w-80 border-gray-200 rounded-lg card-container">
                            <img class="rounded-t-lg card-image" src="{{ asset('storage/' . $post->image) }}" alt="" />
                            <div class="p-5">
                                {{-- <a href="#"> --}}
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight card-title text-white">
                                        {{ $post->titre }}</h5>
                                {{-- </a> --}}
                                <p class="mb-3 font-normal text-white overflow-hidden text-ellipsis whitespace-nowrap w-[250px]">{{ $post->description }}</p>

                            </div>
                        </div>
                        @auth

                        </a>
                    @endauth
                </div>
            @endforeach

        </div>

    </section>
@endsection
