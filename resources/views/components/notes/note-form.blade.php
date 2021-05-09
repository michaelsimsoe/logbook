<h2 class="text-xl">Nytt notat</h2>

<form method="POST" action="/notes" class="flex flex-col">
    @csrf
    <div class="flex flex-col mt-2">
        <label for="title">Tittel</label>
        <input type="text" name="title" id="title" class="rounded">
    </div>

    <div class="flex flex-col mt-4">
        <textarea name="body" id="body" cols="30" rows="10" class="rounded"></textarea>
    </div>

    <div class="flex flex-row mt-4 content-center">
        <label for="tags" class="self-center mr-2">Tags:</label>
        <input type="text" name="tags" id="tags" class="rounded">
    </div>

    <div class="flex flex-col mt-4">
        <p for="type">Type</p>
        <div class="flex">
            @foreach($types as $type)
                <div class="flex mr-4">
                    <input checked type="radio" name="type" value="{{$type->id}}" class="mr-2 mt-1">
                    <label for="type-learn">{{$type->name}}</label>
                </div>    
            @endforeach
        </div>
    </div>
    
    <button type="submit" class="bg-green-400 rounded p-2 mt-6 shadow">Legg til</button>
</form>