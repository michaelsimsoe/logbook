@props(['value'])
<h2 class="text-xl">Nytt notat</h2>

<form method="POST" action="/notes" class="flex flex-col">
    @csrf
    <div class="flex flex-col mt-2">
        <label for="title">Tittel</label>
        <input type="text" name="title" id="title">
    </div>
        <div class="flex flex-col" mt-2>
        <label for="body">Hva vil du si?</label>
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
    </div>
    <div class="flex flex-col mt-2">
        <label for="tags">Tags:</label>
        <input type="text" name="tags" id="tags">
    </div>
    <div class="flex flex-col mt-2">
        <p for="type">Type</p>
        <div class="flex">
            <input checked type="radio" name="type" id="type-learn" value="learn" class="mr-2 mt-1">
            <label for="type-learn">Læring</label>
        </div>
        <div class="flex align-baseline">
            <input type="radio" name="type" id="type-task" value="task" class="mr-2 mt-1">
            <label for="type-task">Oppgave</label>
        </div>
    </div>
    <button type="submit" class="bg-green-400 rounded p-2 mt-6 shadow">Legg til</button>
</form>