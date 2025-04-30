<x-app-layout>
    @if (session()->has('success'))
        <div class="font-bold text-green-700 my-8">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('dashboard') }}" class="underline text-white">Retour</a>
        </div>
        <div class="mx-auto max-w-2xl lg:mx-0 mb-4 flex justify-end">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ $post->titre }}</h2>
        </div>
        <div class="image-container rounded-xl w-full">

            <img class="object-cover w-full rounded-md shadow-lg h-[500px]" src="{{ asset('storage/' . $post->image) }}"
                alt="" />
        </div>
        {{-- user --}}
        <div class="mx-auto mt-10 flex ">
            <div class="w-[40%] gap-16 flex flex-col">
                <div>
                    <h1 class="text-white font-bold text-xl underline">Createur</h1>
                    <p class="text-white ml-5">
                        {{ $user->name }}
                    </p>
                    <a href="mailto:{{ $user->email }}" class="text-white ml-5 hover:underline">{{ $user->email }}</a>

                </div>
                <div class="w-72">
                    <div class="mb-2 flex flex-col">
                        <b class="text-white font-bold text-xl underline">Description:</b>
                        <p class="text-white ml-5">{{ $post->description }}</p>
                    </div>
                </div>
            </div>
            {{-- post --}}
            <div class="flex flex-col gap-16 w-full">

                <div>
                    <b class="text-white font-bold text-xl underline">Contenu:</b>
                    <div class="col-md-8 mt-2">
                        <p class="break-words whitespace-pre-line text-white">{{ $post->contenue }}</p>

                    </div>

                </div>
                <div class="col-md-8 mt-2 flex justify-end hover:text-violet-800">
                    <a target="_blank" class="text-white underline" href="{{ $post->link }}">{{ $post->link }}</a>
                    {{-- <p class="break-words whitespace-pre-line text-white">{{ $post->link }}</p> --}}

                </div>
                <div class="mb-6">
                    <div class="mb-4">
                        <b class="text-white font-bold text-xl underline">Date de
                            publication :</b>
                        <i class="text-white">{{ $post->created_at->format('Y-m-d') }}</i>
                    </div>
                    @auth
                        @if ($post->user->id == Auth::user()->id)
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <a href="{{ route('blog.edit', $post) }}"
                                    class="py-2 px-4 bg-gray-800 font-bold rounded text-white">
                                    Modifier
                                </a>
                                <form action="{{ route('blog.destroy', $post) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="py-2 px-4 bg-red-500 font-bold rounded text-white">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
                <div class="w-full">
                    @livewire('star-rating', ['post' => $post])
                    <div class="container">
                        @auth
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('commentaires.store', $post->id) }}" method="post">
                                        @csrf
                                        <div class="flex flex-col mb-4">
                                            <label for="body" class="text-white font-bold text-xl underline">Ajouter un
                                                commentaire</label>
                                            <textarea name="body" id="body" rows="5"
                                                class="mt-2 p-2 rounded-lg border-2 border-slate-700 focus:border-orange-700 focus:outline-none"></textarea>
                                        </div>
                                        <button type="submit"
                                            class="bg-slate-700 text-white hover:bg-white hover:text-slate-700 font-bold py-2 px-4 rounded">Envoyer</button>
                                    </form>
                                </div>
                            </div>
                        @endauth

                        <div class="row my-12">
                            <div class="">
                                @if (!$comments->isEmpty())
                                    <h1 class="text-white font-bold text-xl underline">Commentaires pour
                                        "{{ $post->titre }}"</h1>
                                @else
                                    <h1 class="text-white font-bold text-xl underline">Aucun commentaire pour"{{ $post->titre }}"</h1>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-8 max-h-60 w-[43rem] overflow-y-auto mb-20">
                            @if (isset($comments))

                                @foreach ($comments as $commentaire)
                                    <div class="flex items-start mb-4 bg-slate-700 rounded-full p-5 space-x-3">
                                        <div class="flex-shrink-0 mt-5">
                                            @if ($commentaire->user->profile_photo_path)
                                                <img class="h-12 w-12 rounded-full object-cover"
                                                    src="{{ asset('storage/' . $commentaire->user->profile_photo_path) }}"
                                                    alt="">
                                            @else
                                                <img class="h-12 w-12 rounded-full object-cover"
                                                    src="{{ asset('img/default-placeholder.png') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="flex-grow-0 flex-shrink-0 w-3/4 md:w-3/4 lg:w-4/5 xl:w-4/5 ml-0">
                                            <p class="font-semibold text-white">{{ $commentaire->user->name }}</p>
                                            <div class="bg-slate-700 text-white">
                                                <p class="break-words whitespace-pre-line px-5">
                                                    {{ $commentaire->body }}</p>
                                                </p>
                                                @if ($commentaire->user->id == Auth::user()->id)
                                                    <form action="{{ route('commentaire.distroy', $commentaire->id) }}"
                                                        method="POST" class="flex justify-end ">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="text-red-500">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
