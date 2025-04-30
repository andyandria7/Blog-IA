<div class="w-[50%]">
    <div class="bg-slate-500 rounded-full text-center" x-data="{ open: true }">
        <div class="bg-white items-center justify-between w-full flex rounded-full shadow-lg sticky" style="top: 5px">
            <div>
                <div x-on:click="@this.resetText()" class="p-2 mr-1 rounded-full hover:bg-gray-100 cursor-pointer">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <input x-on:click="open = true; @this.resetIndex()" x-on:click.away="open = false" wire:model="query"
                wire:keydown.enter.prevent="showPost" wire:keydown.arrow-down.prevent="incrementIndex"
                wire:keydown.arrow-up.prevent="decrementIndex" x-on:keydown.backspace="resetIndex"
                class="font-bold rounded-full w-full py-3 pl-4 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline lg:text-sm text-xs"
                type="text" placeholder="Search...">

            <div class="bg-gray-600 p-1 hover:bg-blue-400 cursor-pointer mx-2 rounded-full"
                x-on:click="@this.showPost()">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="absolute bg-transparent border-violet-600 rounded-3xl w-80 z-40" x-show="open">
            @if (strlen($this->query) > 1)
                <div>
                    @if (count($this->postResults) > 0)
                        @foreach ($this->postResults as $index => $result)
                            <div class="flex ml-9 p-2 space-x-3">
                                <div class="w-14 py-2">
                                    @if ($result->image)
                                        <img class="aspect-video object-cover"
                                            src="{{ asset('storage/'.$result->image) }}" alt="">
                                    @else
                                        <img class="aspect-video object-cover"
                                            src="{{ asset('img/default-placeholder.png') }}" alt="">
                                    @endif
                                </div>
                                <p x-on:click="@this.showPost()"
                                    class="py-1 font-bold {{ $index == $selectedIndex ? 'text-black' : '' }}">
                                    {{ $result->title }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <span class="py-1 font-bold text-blue-900">Pas de résultats pour "{{ $query }}"</span>
                    @endif

                </div>
            @endif
        </div>
    </div>
</div>
