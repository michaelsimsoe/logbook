<x-dashboard-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">

        <div class="p-6 bg-white border-b border-gray-200 w-3/5 mr-2">
            <x-notes.note-form :types="$types"></x-notes.note-form>
        </div>

        <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg md:flex flex-col  w-2/5 p-6">

            <header>
                <h3 class="text-lg">Dagen idag</h3>
                <p>{{ date('d-m-Y') }}</p>
            </header>


            
            @foreach($notes as $note)
                <x-notes.note-card open="" :note="$note" class=""></x-notes.note-card>
                <hr class="my-2">
            @endforeach

        </div>
    </div>
</x-dashboard-layout>