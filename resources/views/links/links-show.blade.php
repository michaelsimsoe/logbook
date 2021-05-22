<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Linker
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">
                <a href="{{ route('links.index') }}" class="m-6 flex flow-row text-gray-700 hover:text-gray-900">&#x21e6; Tilbake</a>
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <h3 class="text-lg border-b border-gray-600 mb-4">{{ $link->name }}</h3>
                    <a href="{{ $link->url }}" class="italic font-gray-500 mb-2">{{ $link->url }}</a>
                    <p>{{ $link->description }}</p>
                    <div class="flex flex-row justify-between">
                        <a href="{{ route('links.edit', compact('link'))}}" class="text-sm text-gray-600 mt-4">Endre</a>
                        <form action="{{ route('links.destroy', ['link' => $link]) }}"
                        method="POST">
                            @csrf
                            {{@method_field('delete')}}
                            <button type="submit" class="text-lg text-red-500 hover:text-red-900 rounded-lg p-2">x</button>
                        </form>
                    </div>
                    <div class="items-center">
                        @foreach($link->tags as $tag)
                            <x-tag :taggableType="$link->getTable()" :id="$tag->id" :name="$tag->name"></x-tag>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
