@props(['notes'])
<aside class="col-span-1 shadow-md p-4 ml-2 rounded-sm">
    <header>
        <h3 class="text-lg">Dagen idag</h3>
        <p>{{ date('d-m-Y') }}</p>
    </header>

    <div class="flex justify-between">
        <a href="/">Alt</a>
        <a href="/">Kun læring</a>
        <a href="/">Kun oppgaver</a>
    </div>

    

    @foreach($notes as $note)
        <article class="mt-4 p2">
            <h4><x-notes.type-badge :type="$note->type"></x-notes.type-badge>: {{ $note->title}}</h4>
            <small>{{ $note->created_at->diffForHumans() }}</small>
            <p>{{ $note->body }}</p>
            <small>TAGS: {{ $note->tags }}</small>
        </article>
    @endforeach

</aside>