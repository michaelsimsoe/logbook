<article class="mt-4 p2">
    <h4><x-notes.type-badge :type="$note->type"></x-notes.type-badge>: {{ $note->title}}</h4>
    <small>{{ $note->created_at->diffForHumans() }}</small>
    <x-notes.note-body :body="$note->body"></x-notes.note-body>
    <small>TAGS: {{ $note->tags }}</small>
</article>