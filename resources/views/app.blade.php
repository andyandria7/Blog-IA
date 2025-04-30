@extends('layouts.master')
@section('title')
    Ai Blog
@endsection
@section('content')
    <section>
        <video autoplay muted loop id="myVideo" class="video-background">
            {{-- <source src="{{ asset('images/Colorful Matrix Code Live Wallpaper.mp4') }}" type="video/mp4"> --}}
            <source src="{{ asset('images/3129957-uhd_3840_2160_25fps.mp4') }}" type="video/mp4">
        </video>
        <div class="container mx-auto my-9 flex justify-center items-center">
            <div class="img1 rounded-3xl flex justify-center items-center w-11/12" data-taos-offset="400">
                <div class="mx-10 pt-[10vh] md:pt-[30vh] lg:pt-[25vh] mb-5 text-white">
                    <button
                        class="py-2 px-5 font-semibold rounded-full btn focus:outline-none focus:ring focus:ring-opacity-75 shadow-[0px_10px_30px_-5px_rgba(0,0,0,0.8)] my-6 text-white animation1"
                        data-taos-offset="300">
                        <a href="{{ route('dashboard') }}">Commencer</a></button>
                    <h1 class="font-bold text-[1rem] md:text-[1.25rem] lg:text-[1.5rem] animate-fade-in-up texteAnimation">
                        L'exploration des multiples facettes de l'intelligence artificielle</h1>
                    <h1 class=" text-[1rem] md:text-[1.25rem] lg:text-[1.5rem] animate-fade-in-up">Bienvenue sur notre blog dédié à l'exploration fascinante des différents types d'intelligence artificielle.
                    </h1>
                    <p class="text-[0.875rem] md:text-[1rem] lg:text-[1.125rem] animate-fade-in-up delay-300">Nous démystifions les technologies de pointe, leurs applications variées et leur impact croissant sur notre quotidien. Que vous soyez novice ou expert en la matière, nous vous invitons à plonger avec nous dans le monde de l'IA, à découvrir ses innovations, à comprendre ses enjeux et à envisager son avenir prometteur."</p>
                </div>
            </div>
        </div>



        <article class="md:container mx-auto md:px-28">
            <div data-aos="fade-right">
                <h1 class="font-bold text-[6vh]">Postes en vedette</h1>
            </div>
            <div class="w-full mt-11 flex items-center justify-center">
                <div data-aos="fade-up"
                    class="tab h-[400px] overflow-y-hidden flex flex-nowrap justify-start overflow-x-auto scroll-smooth custom-scrollbar">
                    <input type="radio" name="slide" id="c1" checked class="hidden">
                    <label onclick="speakText('Chat GPT est un agent conversationnel à intelligence artificielle ou « chatbot »')" for="c1"
                        class="min-w-[50%] md:w-[80px] md:min-w-0 rounded-2xl bg-cover cursor-pointer overflow-hidden m-2.5 flex items-end transition duration-[600ms] ease-[cubic-bezier(.28,-0.03,0,.99)] shadow-[0px_10px_30px_-5px_rgba(0,0,0,0.8)]">
                        <div class="text-white flex flex-nowrap">
                            <div
                                class="bg-[#223] text-white rounded-full w-[50px] flex justify-center items-center m-[15px]">
                                1</div>
                            <div
                                class="flex justify-center flex-col overflow-hidden h-[80px] md:w-[300px] w-full opacity-0 translate-y-[30px] transition-all duration-[300ms] delay-[300ms] ease">
                                <h4 class="uppercase text-[23px] font-bold text-white">ChatGTP</h4>
                                <p
                                    class="text-white text-[20px] pt-[5px] font-bold hover:underline transition duration-300 ease-in-out overflow-hidden text-ellipsis whitespace-nowrap">
                                    ChatGPT est un agent conversationnel à intelligence artificielle ou « chatbot »
                                </p>
                            </div>
                        </div>
                    </label>


                    <input type="radio" name="slide" id="c2" class="hidden">
                    <label onclick="speakText('Bard AI de Google est un outil de chatbot doté de capacités d\'intelligence artificielle.')" for="c2"
                        class=" min-w-[50%] md:w-[80px] md:min-w-0 rounded-2xl bg-cover cursor-pointer overflow-hidden m-2.5 flex items-end transition duration-[600ms] ease-[cubic-bezier(.28,-0.03,0,.99)] shadow-[0px_10px_30px_-5px_rgba(0,0,0,0.8)]">
                        <div class="text-white flex flex-nowrap">
                            <div
                                class="bg-[#223] text-white rounded-full w-[50px] flex justify-center items-center m-[15px]">
                                2</div>
                            <div
                                class="flex justify-center flex-col overflow-hidden h-[80px] md:w-[300px] w-full opacity-0 translate-y-[30px] transition-all duration-[300ms] delay-[300ms] ease">
                                <h4 class="uppercase text-[23px] font-bold text-white">Bard IA</h4>
                                <p
                                    class="text-white text-[20px] pt-[5px] font-bold hover:underline transition duration-300 ease-in-out overflow-hidden text-ellipsis whitespace-nowrap">
                                    Bard AI de Google est un outil de chatbot doté de capacités d'intelligence artificielle.
                                </p>

                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c3" class="hidden">
                    <label onclick="speakText('Écrire 100 fois plus vite, et mieux. Économisez des centaines d\'heures grâce à votre assistant d\'écriture, Plume Ai.')" for="c3"
                        class=" min-w-[50%] md:w-[80px] md:min-w-0 rounded-2xl bg-cover cursor-pointer overflow-hidden m-2.5 flex items-end transition duration-[600ms] ease-[cubic-bezier(.28,-0.03,0,.99)] shadow-[0px_10px_30px_-5px_rgba(0,0,0,0.8)]">
                        <div class="text-white flex flex-nowrap">
                            <div
                                class="bg-[#223] text-white rounded-full w-[50px] flex justify-center items-center m-[15px]">
                                3</div>
                            <div
                                class="flex justify-center flex-col overflow-hidden h-[80px] md:w-[300px] w-full opacity-0 translate-y-[30px] transition-all duration-[300ms] delay-[300ms] ease">
                                <h4 class="uppercase text-[23px] font-bold text-white">Plume IA</h4>
                                <p
                                    class="text-white text-[20px] pt-[5px] font-bold hover:underline transition duration-300 ease-in-out overflow-hidden text-ellipsis whitespace-nowrap">
                                    Écrire 100x plus vite, et mieux. Économisez des centaines d'heures grâce à votre assistant d'écriture, Plume Ai.
                                </p>
                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c4" class="hidden">
                    <label onclick="speakText('Tirez le meilleur parti de votre temps en ligne avec Copilot dans Edge.')" for="c4"
                        class=" min-w-[50%] md:w-[80px] md:min-w-0 rounded-2xl bg-cover cursor-pointer overflow-hidden m-2.5 flex items-end transition duration-[600ms] ease-[cubic-bezier(.28,-0.03,0,.99)] shadow-[0px_10px_30px_-5px_rgba(0,0,0,0.8)]">
                        <div class="text-white flex flex-nowrap">
                            <div
                                class="bg-[#223] text-white rounded-full w-[50px] flex justify-center items-center m-[15px]">
                                4</div>
                            <div
                                class="flex justify-center flex-col overflow-hidden h-[80px] md:w-[300px] w-full opacity-0 translate-y-[30px] transition-all duration-[300ms] delay-[300ms] ease">
                                <h4 class="uppercase text-[23px] font-bold text-white">Copilot</h4>
                                <p
                                    class="text-white text-[20px] pt-[5px] font-bold hover:underline transition duration-300 ease-in-out overflow-hidden text-ellipsis whitespace-nowrap">
                                    Tirez le meilleur parti de votre temps en ligne avec Copilot dans Edge.
                                </p>

                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </article>

        <article class="">
            <div class="flex justify-between md:container mx-auto px-28 my-20">
                <div data-aos="fade-right">

                    <h1 class="font-bold text-[6vh]">Post récents</h1>
                </div>
                <div data-aos="fade-left">
                    <a href="{{ route('blog.index') }}" class="underline">Voir tout</a>

                </div>
            </div>
            <div class="tab grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-6">
                @foreach ($posts as $post)
                    
                <div class="animation-show container mx-auto my-12 flex justify-center items-center">
                    <div class="max-w-sm w-80 border-gray-200 rounded-lg card-container">
                        <img class="rounded-t-lg card-image" src="{{ asset('storage/' . $post->image) }}"
                            alt="" />
                        <div class="p-5">
                            {{-- <a href="#"> --}}
                                <h5 class="mb-2 text-2xl font-bold tracking-tight card-title">{{ $post->titre }}</h5>
                            {{-- </a> --}}
                            <p class="mb-3 font-normal overflow-hidden text-ellipsis whitespace-nowrap w-[250px]">{{ $post->description }}</p>

                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>

        </article>
    </section>
@endsection
<script>
    function speakText(text) {
        if ('speechSynthesis' in window) {
            var utterance = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(utterance);
        } else {
            alert("Votre navigateur ne supporte pas l'API Web Speech.");
        }
    }
    </script>
