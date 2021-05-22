<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ordbok
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">


                <div class="p-6 bg-white border-b border-gray-200 w-full flex flex-col">
                    <form action="{{ route('words.store')}}" method="POST" class="flex flex-col w-6/12 my-3">
                        @csrf
                        <h3 class="text-lg mb-3">Legg til nytt ord</h3>
                        <div class="flex flex-col mb-3 ">
                            <label for="url">Ord</label>
                            <input type="text" name="word" id="" class="rounded shadow">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="name">Oversettelse</label>
                            <input type="text" name="meaning" id="" class="rounded shadow">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="description">Beskrivelse</label>
                            <textarea name="description" id="" cols="30" rows="5" class="rounded shadow"></textarea>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="tags" class="mr-2">Tags:</label>
                            <input type="text" name="tags" id="tags" class="rounded">
                        </div>
                        <button type="submit" class="border bg-gray-400 rounded p-2">Legg til ord</button>
                    </form>
                    <h3 class="text-lg mb-2 mt-4">Alle ord</h3>
                    @foreach($words as $word)
                        <div class="flex flex-col mb-2">
                            <a href="{{ route('words.show', ['word' => $word])}}" class="flex flex-col">
                                <div>
                                    <span>
                                        {{ $word->word  }}
                                    </span>
                                    -
                                    <span>
                                        {{ $word->meaning  }}
                                    </span>
                                </div>
                            </a>
                            @if($word->description)
                                <p title="{{ $word->description }}" class="text-gray-700 mt-1">{{ $word->description }}</p>
                            @endif
                            <div class="items-center">
                                @foreach($word->tags as $tag)
                                    <x-tag :taggableType="$word->getTable()" :id="$tag->id" :name="$tag->name"></x-tag>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
