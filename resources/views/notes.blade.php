<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Alle notater
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">

                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($notes as $note)
                        <x-notes.note-card :note="$note"></x-notes.note-card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
