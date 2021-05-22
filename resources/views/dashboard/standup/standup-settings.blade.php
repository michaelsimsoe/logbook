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
            <x-nav-link :href="route('standup-setting.index')" :active="false" class="border-none mr-4">
                Innstillinger
            </x-nav-link>
        </div>
    </header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
    
        <div class="p-6 bg-white border-b border-gray-200 w-full">
            <h3 class="text-lg">Standupinnstillinger</h3>
            <form action="{{ $settings ? route('standup-setting.update', [$settings['id']] ) : route('standup-setting.store') }}" method="POST">
                @csrf
                @if($settings)
                    {{ method_field('PATCH') }} 
                @endif
                <fieldset class="flex flex-col">
                    <label for="wakatime-api">Wakatime API:</label>
                    <input name="wakatime-api" type="text" value="{{ $settings ? $settings['wakatime-api'] : ''}}"
                        class="rounded shadow-md border-gray-400">
                </fieldset>
                <button type="submit">Lagre</button>
            </form>
        </div>


    </div>
</x-dashboard-layout>