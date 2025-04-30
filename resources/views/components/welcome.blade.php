<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    {{-- @if ($user->id == Auth::user()->id) --}}
    <div>
        <a href="{{ route('blog.create') }}"
            class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Ajouter un post
        </a>
    </div>
    {{-- @endif --}}
    {{-- recherche --}}
    <div class="flex items-center justify-center">
        @livewire('search')

    </div>
</div>

<div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-6">
    @foreach ($posts as $post)
    <div class="container mx-auto my-12 flex justify-center ">
            <a href="{{ route('blog.show', $post->id) }}">
                <div class="max-w-sm w-80 border-gray-200 rounded-lg card-container">
                        <img class="rounded-t-lg card-image" src="{{ asset('storage/'.$post->image) }}" alt="" />
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight card-title text-white">{{ $post->titre }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-white">{{ $post->description }}</p>
    
                    </div>
                </div>
            </a>
            </div>
    @endforeach
    
</div>
