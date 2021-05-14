<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-6">
            Loggbok
        </h2>

        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="border-none mr-4">
            Notat
        </x-nav-link>

        <x-nav-link :href="route('standup')" :active="false" class="border-none mr-4">
            Standup
        </x-nav-link>

        <x-nav-link :href="route('note_types')" :active="request()->routeIs('note_types')" class="border-none mr-4">
            Typer
        </x-nav-link>

        <x-nav-link :href="route('tags')" :active="request()->routeIs('tags')" class="border-none mr-4">
            Tagger
        </x-nav-link>
    </x-slot>

    <div {{ $attributes->merge(['class' => 'py-12']) }}>
        {{ $slot }}
    </div>
</x-app-layout>
