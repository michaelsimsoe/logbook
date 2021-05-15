<x-dashboard-layout class="py-0">

    <header class="bg-gray-200 shadow mb-6">
        <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8 flex text-sm">
            <x-nav-link :href="route('standup.new')" :active="false" class="border-none mr-4">
                Ny standup
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Dagens
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Forrige
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Alle
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Innstillinger
            </x-nav-link>
        </div>
    </header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
    

        <div class="p-6 bg-white border-b border-gray-200 w-3/5">
            Ny standup
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-900">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('standup.store') }}" method="post"
                class="flex flex-col">
                @csrf
                <fieldset class="flex flex-col">
                    <label for="date">For dato</label>
                    <input name="date" type="date" value="{{ date('Y-m-d') }}">
                </fieldset>
                <fieldset class="flex flex-col">
                    <label for="done">Har gjort</label>
                    <textarea name="done" id="" cols="30" rows="10">{{ old('done') }}</textarea>
                </fieldset>
                <fieldset class="flex flex-col">
                    <label for="doing">Gjør</label>
                    <textarea name="doing" id="" cols="30" rows="10">{{ old('doing') }}</textarea>
                </fieldset>
                <fieldset class="flex flex-col">
                    <label for="challenges">Utfordringer eller blocker</label>
                    <textarea name="challenges" id="" cols="30" rows="10">{{ old('challenges') }}</textarea>
                </fieldset>
                <button type="submit">Lag ny</button>
            </form>
        </div>
        <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg md:flex flex-col  w-2/5 p-6">

            <header>
                <h3 class="text-lg">Forrige relevante dag</h3>
                <p>{{ $yesterday }}</p>
            </header>


            @if($notes)
                @foreach($notes as $note)
                    <x-notes.note-card open="" :note="$note" class=""></x-notes.note-card>
                    <hr class="my-2">
                @endforeach
            @endif

        </div>

    </div>
</x-dashboard-layout>