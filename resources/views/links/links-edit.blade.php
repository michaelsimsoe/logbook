<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Linker
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">


                <div class="p-6 bg-white border-b border-gray-200 w-full flex flex-col">
                    <form action="{{ route('links.update', compact('link'))}}" method="POST" class="flex flex-col w-6/12 my-3">
                        @csrf
                        {{ method_field('PATCH') }} 
                        <div class="flex flex-col mb-3 ">
                            <label for="url">Url</label>
                            <input type="url" name="url" id="" class="rounded shadow" value="{{ $link->url }}">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="name">Navn</label>
                            <input type="text" name="name" id="" class="rounded shadow" value="{{ $link->name }}">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="description">Beskrivelse</label>
                            <textarea name="description" id="" cols="20" rows="5" class="rounded shadow">{{ $link->description }}</textarea>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="tags" class="mr-2">Tags:</label>
                            <input type="text" name="tags" id="tags" class="rounded" value="{{ $tagString }}">
                        </div>
                        <button type="submit" class="border bg-gray-400 rounded p-2">Endre lenke</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
