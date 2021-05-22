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
                    <form action="{{ route('words.update', compact('word'))}}" method="POST" class="flex flex-col w-6/12 my-3">
                        @csrf
                        {{ method_field('PATCH') }} 
                        <div class="flex flex-col mb-3 ">
                            <label for="url">Ord</label>
                            <input type="text" name="word" id="" class="rounded shadow" value="{{ $word->word }}">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="name">Oversettelse</label>
                            <input type="text" name="meaning" id="" class="rounded shadow" value="{{ $word->meaning }}">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="description">Beskrivelse</label>
                            <textarea name="description" id="" cols="20" rows="5" class="rounded shadow">{{ $word->description }}</textarea>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="tags" class="mr-2">Tags:</label>
                            <input type="text" name="tags" id="tags" class="rounded" value="{{ $tagString }}">
                        </div>
                        <button type="submit" class="border bg-gray-400 rounded p-2">Endre ord</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
