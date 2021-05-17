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

    <small>{{ $note->created_at->diffForHumans() }}  ({{ $note->created_at->format('l j F Y') }})</small>

    <x-notes.note-body :body="$note->body"></x-notes.note-body>
    <div class="mt-2 "><strong>TAGS:</strong>
        @foreach($note->tags as $tag)
            <x-notes.note-tag :id="$tag->id" :name="$tag->name"></x-notes.note-tag>
        @endforeach
    </div>
    <small class="mt-4 block text-gray-400 hover:text-gray-600"><a href="{{ route('notes.edit', ['note' => $note]) }}">Endre</a></small>
    
    <form action="{{ route('comment.store', ['note' => $note] ) }}" method="POST"
        class="flex flex-col">
        @csrf
        <textarea name="body" id="" cols="30" rows="2" class="rounded shadow-md focus:ring-0 focus:border-2 focus:border-gray-600"></textarea>
        <button type="submit" class="bg-gray-200 my-2 self-end p-2 text-xs rounded shadow hover:bg-gray-300 active:bg-gray-400">Legg til</button>
    </form>
    <div class="mt-2 pt-1 border-t border-gray-400">
        <p>Notatet har {{ $note->comments->count().($note->comments->count() == 1 ? ' kommentar' : ' kommentarer')}}</p>
        @if($note->comments->count() > 0)
            <details class="ml-3" {{ $attributes['open'] == 'open' ? $attributes->merge(['open']) : '' }}>
                <summary><small>Se kommentar</small></summary>
                @foreach($note->comments as $comment)
                    <article class="border border-gray-400 shadow mt-2 p-4 pt-2 rounded">
                        <small class="text-xs mb-2">Lagt til {{$comment->created_at->diffForHumans() }}</small>
                        <div>{!! Str::markdown($comment->body) !!}</div>
                    </article>
                @endforeach
            </details>
        @endif
    </div>
</article>