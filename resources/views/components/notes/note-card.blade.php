<article class="mt-4 p2">
    <form action="{{ route('notes.destroy', ['note' => $note]) }}"
     method="POST">
        @csrf
        {{@method_field('delete')}}
        <button type="submit">Delete</button>
    </form>
    <h4><x-notes.type-badge :type="$note->noteType->name"></x-notes.type-badge>: {{ $note->title}}</h4>
    <small>{{ $note->created_at->diffForHumans() }}</small>
    <x-notes.note-body :body="$note->body"></x-notes.note-body>
    <small><strong>TAGS:</strong>
        @foreach($note->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </small>
</article>