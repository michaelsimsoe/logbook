<x-dashboard-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">

            <div class="p-6 bg-white border-b border-gray-200 flex-1">
                <x-notes.note-form :types="$types"></x-notes.note-form>
            </div>

            <div class="p-6 bg-white border-b border-gray-200 flex-1">
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
                        <x-notes.note-card :note="$note"></x-notes.note-card>
                        <hr class="my-2">
                    @endforeach

                </aside>
            </div>
        </div>
    </div>
</x-dashboard-layout>