<x-dashboard-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">

            <div class="p-6 bg-white border-b border-gray-200 flex-1">
                <h2 class="text-lg">Notattyper</h2>
                <form action="/note_types" method="POST" class="flex">
                    @csrf
                    <input type="text" name="name" id="">
                    <button type="submit" class="border bg-gray-400 rounded p-2">Legg til type</button>
                </form>
                <ul class="mt-4">
                    @foreach($types as $type)
                        <li>{{ $type->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-dashboard-layout>
