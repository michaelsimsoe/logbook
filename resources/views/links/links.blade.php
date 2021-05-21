<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Linker
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex w-full">


                <div class="p-6 bg-white border-b border-gray-200 w-full flex flex-col">
                    <form action="{{ route('links.store')}}" method="POST" class="flex flex-col w-6/12 my-3">
                        @csrf
                        <h3 class="text-lg mb-3">Legg til ny lenke</h3>
                        <div class="flex flex-col mb-3 ">
                            <label for="url">Url</label>
                            <input type="url" name="url" id="" class="rounded shadow">
                        </div>
                        <div class="flex flex-col mb-3 ">
                            <label for="name">Navn</label>
                            <input type="text" name="name" id="" class="rounded shadow">
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="description">Beskrivelse</label>
                            <input type="text" name="description" id="" class="rounded shadow">
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="tags" class="self-center mr-2">Tags:</label>
                            <input type="text" name="tags" id="tags" class="rounded">
                        </div>
                        <button type="submit" class="border bg-gray-400 rounded p-2">Legg til link</button>
                    </form>
                    <h3 class="text-lg mb-2 mt-4">Alle lenker</h3>
                    @foreach($links as $link)
                        <div class="flex items-center mb-2">
                            <a href="{{ route('links.show', ['link' => $link])}}" class="flex flex-col">
                                <span>
                                    {{ $link->name ? $link->name : $link->url }}
                                </span>
                                <span class="text-xs text-gray-500"> {{ $link->created_at }}</span>
                            </a>
                            @if($link->description)
                                <p title="{{ $link->description }}" class="ml-3 text-sm text-gray-400 self-start mt-1">{{ Str::limit($link->description, 30, '...') }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
