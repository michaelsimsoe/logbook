<x-dashboard-layout class="py-0">

    <header class="bg-gray-200 shadow mb-6">
        <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8 flex text-sm">
            <x-nav-link :href="route('standup.new')" :active="false" class="border-none mr-4">
                Ny standup
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Dagens
            </x-nav-link>
            <x-nav-link :href="route('standup.last')" :active="false" class="border-none mr-4">
                Forrige
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Alle
            </x-nav-link>
            <x-nav-link :href="route('standup-setting.index')"  :active="false" class="border-none mr-4">
                Innstillinger
            </x-nav-link>
        </div>
    </header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
    

        <div class="p-6 bg-white border-b border-gray-200 w-3/5">
            Endre standup
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-900">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('standup.edit', ['standup' => $standup]) }}" method="POST"
                class="flex flex-col">
                @csrf
                {{ method_field('PATCH') }} 
                <fieldset class="flex flex-col">
                    <label for="date">For dato</label>
                    <input name="date" type="date" value="{{ $standup->date }}" class="rounded shadow-md border-gray-400">
                </fieldset>
                <fieldset class="flex flex-col mt-2">
                    <label for="done">Har gjort</label>
                    <textarea name="done" id="" cols="30" rows="10" class="rounded shadow-md border-gray-400">{{ $standup->done }}</textarea>
                </fieldset>
                <fieldset class="flex flex-col mt-2">
                    <label for="doing">Gjør</label>
                    <textarea name="doing" id="" cols="30" rows="10" class="rounded shadow-md border-gray-400">{{ $standup->doing }}</textarea>
                </fieldset>
                <fieldset class="flex flex-col mt-2">
                    <label for="challenges">Utfordringer eller blocker</label>
                    <textarea name="challenges" id="" cols="30" rows="10" class="rounded shadow-md border-gray-400">{{ $standup->challenges }}</textarea>
                </fieldset>
                <button type="submit" class="bg-green-400 rounded p-2 mt-6 shadow hover:bg-green-600 active:shadow-none">Lag ny</button>
            </form>
        </div>

    </div>
</x-dashboard-layout>