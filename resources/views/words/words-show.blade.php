<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ordbok
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">
                <a href="{{ route('words.index') }}" class="m-6 flex flow-row text-gray-700 hover:text-gray-900">&#x21e6; Tilbake</a>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex">
                        <span class="bold mr-2">{{ $word->word }}:</span>
                        <span class="text-gray-700 italic">{{ $word->meaning }}</span>
                    </div>
                    <p class="text-gray-600">{{ $word->description }}</p>
                    <div class="flex flex-row justify-between">
                        <a href="{{ route('words.edit', compact('word'))}}" class="text-sm text-gray-600 mt-4">Endre</a>
                        <form action="{{ route('words.destroy', ['word' => $word]) }}"
                        method="POST">
                            @csrf
                            {{@method_field('delete')}}
                            <button type="submit" class="text-lg text-red-500 hover:text-red-900 rounded-lg p-2">x</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
