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
            <x-nav-link :href="route('standup.all')" :active="false" class="border-none mr-4">
                Alle
            </x-nav-link>
            <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
                Innstillinger
            </x-nav-link>
        </div>
    </header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
    
        <div class="p-6 bg-white border-b border-gray-200 w-full mr-2">
            <h3>Standup for {{ $standup->date }}</h3>
            <div class="my-2">
                <h4 class="text-lg border-b border-gray-200">Har gjort</h4>
                <div class="ml-3 mt-2 p-4 shadow-sm rounded">
                    {!! Str::markdown($standup->done ) !!}
                </div>
            </div>
            <div class="my-2">
                <h4 class="text-lg border-b border-gray-200">Holder på med</h4>
                <div class="ml-3 mt-2 p-4 shadow-sm rounded">
                    {!! Str::markdown($standup->doing ) !!}
                </div>
            </div>
            <div class="my-2">
                <h4 class="text-lg border-b border-gray-200">Utfordringer og blokker</h4>
                <div class="ml-3 mt-2 p-4 shadow-sm rounded">
                    {!! Str::markdown($standup->challenges ) !!}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>