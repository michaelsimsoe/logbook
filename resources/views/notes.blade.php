<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Alle notater
        </h2>
    </x-slot>

    @foreach($notes as $note)
        <article class="mt-4 p2">
            <h4><x-notes.type-badge :type="$note->type"></x-notes.type-badge>: {{ $note->title}}</h4>
            <small>{{ $note->created_at->diffForHumans() }}</small>
            <p>{{ $note->body }}</p>
            <small>TAGS: {{ $note->tags }}</small>
        </article>
    @endforeach
</x-app-layout>
