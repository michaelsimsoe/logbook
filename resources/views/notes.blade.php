<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Alle notater
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">

                <div class="p-6 bg-white border-b border-gray-200 w-full">
                    <ul>
                        @foreach($notes as $note)
                            <li></li>
                            <article class="flex">
                                <h4 class="mr-3">
                                    <x-notes.type-badge :type="$note->noteType->name"></x-notes.type-badge>
                                    <a href="{{ route('notes.single', ['note' => $note]) }}">{{ $note->title}}</a>
                                </h4>
                                @foreach($note->tags as $tag)
                                    <x-notes.note-tag :name="$tag->name"></x-notes.note-tag>
                                @endforeach
                                <form action="{{ route('notes.destroy', ['note' => $note]) }}"
                                method="POST" class="ml-auto">
                                    @csrf
                                    {{@method_field('delete')}}
                                    <button type="submit" class="text-lg text-red-500 hover:text-red-900 rounded-lg">x</button>
                                </form>
                            </article>
                            @unless($loop->last)
                                <hr class="my-4">
                            @endunless
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
