<x-app-layout>
    
    <div class="text-center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">🌟 {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="user_id" value="{{ $user->id }}" hidden>

                        <div class="space-y-12">
                            <div class="mb-4">

                                <label for="image" class="block text-sm font-medium leading-6 text-white">Image à la
                                    une</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2  focus-within:ring-inset focus-within:ring-indigo-600">
                                        <input type="file" name="image" id="image"
                                            class="text-white block flex-1 border-0 bg-transparent py-1.5 pl-3 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="title"
                                    class="block text-sm font-medium leading-6 text-white">Titre</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <input maxlength="20" type="text" name="titre" id="title"
                                            placeholder="Entrer le titre..."
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-white">Description</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <textarea name="description" id="description" placeholder="Votre Description..."
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            rows="6"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="content"
                                    class="block text-sm font-medium leading-6 text-white">Contenu</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <textarea name="contenue" id="content" placeholder="Votre contenu..."
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            rows="16"></textarea>
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
                                            placeholder="Entrer le Lien..."
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                {{-- <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900">Date
                                    de publication</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <input type="datetime-local" name="published_at" id="published_at"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            rows="16" value="" required>
                                    </div>
                                </div> --}}
                                <input type="datetime-local" name="published_at" value="{{ date('Y-m-d\TH:i') }}"
                                    hidden>


                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <a href="{{ route('dashboard') }}"
                                    class="rounded-md bg-slate-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Annuler</a>
                                <button type="submit"
                                    class="rounded-md bg-slate-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
