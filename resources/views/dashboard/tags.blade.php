<x-dashboard-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">

            <div class="p-6 bg-white border-b border-gray-200 flex-1">
                    @foreach($tags as $tag)
                        <article class="my-2 flex">
                            <x-notes.note-tag :id="$tag->id" :name="$tag->name "></x-notes.note-tag>
                            <div>Har {{ \App\Models\Note::getNotesWithId($tag->id)->count() }} tilknyttede <a href="{{ route('notes', ['tag' => $tag->id]) }}">notater</a></div>
                        </article>
                        @unless($loop->last)
                            <hr class="my-4">
                        @endunless

                    @endforeach
            </div>
        </div>
    </div>
</x-dashboard-layout>
