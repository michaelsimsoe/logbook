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
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Innstillinger
            </x-nav-link>
        </div>
    </header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
    
        <div class="p-6 bg-white border-b border-gray-200 w-full mr-2">
            <h3>Alle standups</h3>
            @foreach($standups as $standup)
                <div class="text-gray-600 hover:text-gray-800 flex items-center">
                    <a href="{{ route('standup.show', ['standup' => $standup]) }}">{{ $standup->date }}</a>
                    <a href="{{ route('standup.edit', ['standup' => $standup]) }}" class="ml-4 text-sm block text-gray-400 hover:text-gray-600">Endre</a>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>