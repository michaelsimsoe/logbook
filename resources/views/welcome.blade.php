<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Loggbok</title>


    </head>
    <body class="bg-gray-50 h-screen w-screen">
        @include('layouts.navigation')
        <header class="flex flex-row justify-between p-4 mb-4 bg-gray-200 shadow-md ">
            <h1 class=""><a href="/">Loggbok</a></h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log out') }}
                </x-dropdown-link>

            </form>
        </header>

        <main class="grid grid-cols-3 md:max-w-xl lg:max-w-7xl mx-auto">

            <section class="col-span-2 shadow-md p-4 rounded-sm">
                <h2 class="text-xl">Nytt notat</h2>

                <form method="POST" action="/notes" class="flex flex-col">
                    @csrf
                    <div class="flex flex-col mt-2">
                        <label for="title">Tittel</label>
                        <input type="text" name="title" id="title">
                    </div>
                     <div class="flex flex-col" mt-2>
                        <label for="body">Hva vil du si?</label>
                        <textarea name="body" id="body" cols="30" rows="10"></textarea>
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="tags">Tags:</label>
                        <input type="text" name="tags" id="tags">
                    </div>
                    <div class="flex flex-col mt-2">
                        <p for="type">Type</p>
                        <div class="flex">
                            <input checked type="radio" name="type" id="type-learn" value="learn" class="mr-2 mt-1">
                            <label for="type-learn">Læring</label>
                        </div>
                        <div class="flex align-baseline">
                            <input type="radio" name="type" id="type-task" value="task" class="mr-2 mt-1">
                            <label for="type-task">Oppgave</label>
                        </div>
                    </div>
                    <button type="submit" class="bg-green-400 rounded p-2 mt-6 shadow">Legg til</button>
                </form>
            </section>

            <aside class="col-span-1 shadow-md p-4 ml-2 rounded-sm">
                <header>
                    <h3 class="text-lg">Dagen idag</h3>
                    <p>{{ date('d-m-Y') }}</p>
                </header>

                <div class="flex justify-between">
                    <a href="/">Alt</a>
                    <a href="/">Kun læring</a>
                    <a href="/">Kun oppgaver</a>
                </div>

                @foreach($notes as $note)
                    <article class="mt-4 p2">
                        <h4>{{ $note->type}}: {{ $note->title}}</h4>
                        <small>{{ $note->created_at->diffForHumans() }}</small>
                        <p>{{ $note->body }}</p>
                        <small>TAGS: {{ $note->tags }}</small>
                    </article>
                @endforeach

            </aside>
        </main>
    </body>
</html>
