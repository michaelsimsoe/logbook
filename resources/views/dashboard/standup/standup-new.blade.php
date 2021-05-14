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
    

        <div class="p-6 bg-white border-b border-gray-200 w-full">
            Ny standup
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
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
                    <textarea name="done" id="" cols="30" rows="10"></textarea>
                </fieldset>
                <fieldset class="flex flex-col">
                    <label for="doing">Gjør</label>
                    <textarea name="doing" id="" cols="30" rows="10"></textarea>
                </fieldset>
                <fieldset class="flex flex-col">
                    <label for="challenges">Utfordringer eller blocker</label>
                    <textarea name="challenges" id="" cols="30" rows="10"></textarea>
                </fieldset>
                <button type="submit">Lag ny</button>
            </form>
        </div>

    </div>
</x-dashboard-layout>