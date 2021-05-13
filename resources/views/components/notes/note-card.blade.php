<article {{ $attributes->merge(['class' => 'mt-4 p2 flex-col']) }}>

    <form action="{{ route('notes.destroy', ['note' => $note]) }}"
     method="POST">
        @csrf
        {{@method_field('delete')}}
        <div class="flex justify-between items-center border-b border-gray-400">
            <h4 ><x-notes.type-badge :type="$note->noteType->name"></x-notes.type-badge> <a href="{{ route('notes.single', ['note' => $note]) }}">{{ $note->title}}</a></h4>
            <button type="submit" class="text-lg text-red-500 hover:text-red-900 rounded-lg p-2">x</button>
        </div>

    </form>

    <small>{{ $note->created_at->diffForHumans() }}</small>

    <x-notes.note-body :body="$note->body"></x-notes.note-body>
    <div class="mt-2 "><strong>TAGS:</strong>
        @foreach($note->tags as $tag)
            <x-notes.note-tag :id="$tag->id" :name="$tag->name"></x-notes.note-tag>
        @endforeach
    </div>
    <small class="mt-4 block text-gray-400 hover:text-gray-600"><a href="{{ route('notes.edit', ['note' => $note]) }}">Endre</a></small>
</article>