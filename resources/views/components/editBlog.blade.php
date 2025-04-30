<x-app-layout>
    <div class="py-7">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('blog.show', $post) }}" class="underline text-white hover:text-indigo-500">Retour</a>
            </div>
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center">{{ $post->titre }}</h2>
            </div>
            <div class="mx-auto mt-10 max-w-2xl">
                <div class="mb-8">
                    <img class="object-cover w-full h-64 rounded-md shadow-lg"
                        src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
                <div class="mb-8">
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-500 px-4 py-2 rounded-md mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('blog.update', $post) }}">
                    @csrf
                    @method('PUT')
                    <input type="number" name="user_id" value="{{ $post->user_id }}" hidden>

                    <div class="space-y-6">
                        <div>
                            <label for="image" class="block text-sm font-medium text-white">Image à la une</label>
                            <div class="mt-2">
                                <input type="file" name="image" id="image"
                                    class="py-2 text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                        </div>
                        <div>
                            <label for="titre" class="block text-sm font-medium text-white">Titre</label>
                            <div class="mt-2">
                                <input value="{{ old('titre', $post->titre) }}" maxlength="20" type="text"
                                    name="titre" id="titre"
                                    class="py-2 text-white bg-transparent border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-white">Description</label>
                            <div class="mt-2">
                                <textarea name="description" id="description"
                                    class="py-2 text-white bg-transparent border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    rows="6">{{ old('description', $post->description) }}</textarea>
                            </div>
                        </div>
                        <div>
                            <label for="contenue" class="block text-sm font-medium text-white">Contenu</label>
                            <div class="mt-2">
                                <textarea name="contenue" id="contenue"
                                    class="py-2 text-white bg-transparent border border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    rows="16">{{ old('contenue', $post->contenue) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="link"
                            class="block text-sm font-medium leading-6 text-white">Lien</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                <input type="text" name="link" id="link"
                                    placeholder="Entrer le Lien..." value="{{ old('link', $post->link) }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex items-center justify-end gap-x-6">
                        <a href="{{ route('blog.show', $post) }}" type="button"
                            class="py-2 px-4 bg-gray-800 font-bold rounded text-white">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
