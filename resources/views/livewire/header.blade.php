    <header class="w-full p-4 px-5 sm:px-10 flex items-center justify-between">
        <a href="">
            <img class="h-20 w-auto rounded-full lft"
                src="{{ asset('images/freepik-duotone-code-technology-logo-20240530162645SFat.png') }}" alt="Logo">
        </a>

        <button class="inline-block sm:hidden z-50" wire:click="toggleMenu" aria-label="Hamburger Menu">
            <div class="w-6 cursor-pointer transition-all ease duration-300">
                <div class="relative">
                    <label class="burger" for="burger">
                        <span
                            class="color absolute top-0 inline-block w-full h-0.5 {{ $mode === 'light' ? 'bg-dark' : 'bg-white' }} rounded transition-all ease duration-200"
                            style="{{ $menuOpen ? 'transform: rotate(-50deg) translateY(24px) translateX(-24px);' : 'transform: rotate(0deg)' }}"
                            id="hamburger-top"></span>
                        <span
                            class="color absolute top-0 inline-block w-full h-0.5 {{ $mode === 'light' ? 'bg-dark' : 'bg-white' }} rounded transition-all ease duration-200"
                            style="{{ $menuOpen ? 'opacity: 0' : 'opacity: 1' }}" id="hamburger-middle"></span>
                        <span
                            class="color absolute top-0 inline-block w-full h-0.5 {{ $mode === 'light' ? 'bg-dark' : 'text-white' }} rounded transition-all ease duration-200"
                            style="{{ $menuOpen ? 'transform: rotate(45deg) translateY(-20px) translateX(-16px);' : 'transform: rotate(0deg)' }}"
                            id="hamburger-bottom"></span>
                    </label>
                </div>
            </div>
        </button>


        <nav class="w-max py-3 px-6 sm:px-8 border border-solid {{ $mode === 'light' ? 'border-dark' : 'border-light' }} rounded-full font-medium capitalize items-center flex sm:hidden fixed top-6 right-1/2 translate-x-1/2 {{ $mode === 'light' ? 'bg-light' : 'bg-dark' }}/80 backdrop-blur-sm z-50 transition-all ease duration-300"
            style="{{ $menuOpen ? 'top: 1rem' : 'top: -5rem' }}">
            <a href="{{ route('index') }}" class="mr-2 hover:scale-125 transition-all ease duration-200">Accueil</a>
            <a href="{{ route('blog.index') }}" class="mx-2 hover:scale-125 transition-all ease duration-200">Blog</a>
            <a href="" class="mx-2 hover:scale-125 transition-all ease duration-200">Contact</a>

        </nav>

        <nav
            class="w-max py-3 px-8 border border-solid {{ $mode === 'light' ? 'border-dark' : 'border-light' }} rounded-full font-medium capitalize items-center hidden sm:flex fixed top-6 right-1/2 translate-x-1/2 {{ $mode === 'light' ? 'bg-light' : 'bg-dark' }}/80 backdrop-blur-sm z-50 up">
            <a href="{{ route('index') }}" class="mr-2 hover:scale-125 transition-all ease duration-200">Accueil</a>
            <a href="{{ route('blog.index') }}" class="mx-2 hover:scale-125 transition-all ease duration-200">Blog</a>
            <a href="{{ route('contacte') }}" class="mx-2 hover:scale-125 transition-all ease duration-200">Contact</a>
            <select name="background" id="background-select"
                class="hidden theme text-tansparent ease ml-2 flex items-center justify-center rounded-full bg-transparent ">
                {{-- <option value="light">☀️</option> --}}
                <option value="dark"></option>
                {{-- <option value="color">🌈</option> --}}
            </select>

        </nav>

        <div class="hidden sm:flex items-center">
            @guest
                <a href="{{ route('login') }}" rel="noopener noreferrer" class="mr-10 inline-block w-6 h-6 rht"
                    aria-label="Reach out to me via LinkedIn">
                    <h3 class="hover:scale-125 transition-all ease duration-200 hover:underline">Connexion</h3>
                </a>
                <a href="{{ route('register') }}" rel="noopener noreferrer" class="mx-12 inline-block w-6 h-6 mr-10 rht1"
                    aria-label="Reach out to me via Twitter">
                    <h3 class="hover:scale-125 transition-all ease duration-200 hover:underline">Inscription</h3>
                </a>
            @endguest
            @auth
                <div x-data="{ open: false }">
                    @if (isset(Auth::user()->profile_photo_path))
                    <img class="h-20 w-20 rounded-full rht1 cursor-pointer" @click="open = ! open"
                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Logo">
                    @else
                    <img class="h-20 w-20 rounded-full rht1 cursor-pointer" @click="open = ! open"
                        src="{{ asset('img/default-placeholder.png') }}" alt="Logo">
                    @endif
                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-7 flex flex-col p-3 bg-stone-900 rounded-lg text-center">
                        <a href="{{ route('dashboard') }}"
                            class="hover:scale-125 transition-all ease duration-200 hover:underline ">Profil</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a href="{{ route('logout') }}" class="hover:scale-125 transition-all ease duration-200 hover:underline "
                                         @click.prevent="$root.submit();"> 
                                    {{ __('Déconnection') }}
                                </a>
                            </form>
                    </div>
                </div>
            @endauth
        </div>
    </header>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname === '/') {
                const selectElement = document.getElementById('background-select');
                selectElement.value = 'dark';
                selectElement.dispatchEvent(new Event('change'));
            }
        });
    </script>
