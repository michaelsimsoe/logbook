<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Loggbok
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">

                <div class="p-6 bg-white border-b border-gray-200 flex-1">
                    <x-note-form></x-note-form>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 flex-1">
                    <x-todays-notes :notes="$notes"></x-todays-notes>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
        </div>
    </div>
</x-app-layout>
