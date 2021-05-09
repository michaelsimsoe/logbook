<article {{ $attributes->merge(['class' => 'mt-4 p2 flex-col']) }}>

    <form action="{{ route('notes.destroy', ['note' => $note]) }}"
     method="POST">
        @csrf
        {{@method_field('delete')}}
        <div class="flex justify-between items-center">
            <h4><x-notes.type-badge :type="$note->noteType->name"></x-notes.type-badge>: {{ $note->title}}</h4>
            <button type="submit" class="text-lg text-red-500 rounded-lg p-2">x</button>
        </div>
    </form>
    <small>{{ $note->created_at->diffForHumans() }}</small>
    <x-notes.note-body :body="$note->body"></x-notes.note-body>
    <small><strong>TAGS:</strong>
        @foreach($note->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </small>
</article>