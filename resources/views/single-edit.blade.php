<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Endre
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">

                <div class="p-6 bg-white border-b border-gray-200 w-full">

                    <h2 class="text-xl">Endre notat</h2>

                    <form method="POST" action="/notes/{{ $note->id }}" class="flex flex-col">
                        @csrf
                        {{@method_field('patch')}}
                        <div class="flex flex-col mt-2">
                            <label for="title">Tittel</label>
                            <input type="text" name="title" id="title" class="rounded" value="{{ $note->title }}">
                        </div>

                        <div class="flex flex-col mt-4">
                            <textarea name="body" id="body" cols="30" rows="10" class="rounded">{{ $note->body }}</textarea>
                        </div>

                        <div class="flex flex-row mt-4 content-center">
                            <label for="tags" class="self-center mr-2">Tags:</label>
                            <input type="text" name="tags" id="tags" class="rounded" value="{{ $tags }}">
                        </div>

                        <div class="flex flex-col mt-4">
                            <p for="type">Type</p>
                            <div class="flex">
                                @foreach($types as $type)
                                    <div class="flex mr-4">
                                        <input {{ $note->note_types_id == $type->id ? 'checked' : ''}} type="radio" name="type" value="{{$type->id}}" class="mr-2 mt-1">
                                        <label for="type-learn">{{$type->name}}</label>
                                    </div>    
                                @endforeach
                            </div>
                        </div>
                        
                        <button type="submit" class="bg-green-400 rounded p-2 mt-6 shadow">Legg til</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
