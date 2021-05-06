<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Loggbok</title>


    </head>
    <body class="bg-gray-50 h-screen w-screen">

        <header class="flex flex-row justify-between p-4 mb-4 bg-gray-200">
            <h1 class=""><a href="/">Loggbok</a></h1>
            <a href="#">Log ut</a>
        </header>

        <main class="grid grid-cols-3 md:max-w-xl lg:max-w-7xl mx-auto">

            <section class="col-span-2 border-2 p-4 rounded-sm">
                <h2 class="text-xl">Nytt notat</h2>
                <form action="" class="flex flex-col">
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
                            <input type="radio" name="type" id="type-learn" value="learn" class="mr-2 mt-1">
                            <label for="type-learn">Læring</label>
                        </div>
                        <div class="flex align-baseline">
                            <input type="radio" name="type" id="type-task" value="task" class="mr-2 mt-1">
                            <label for="type-task">Oppgave</label>
                        </div>
                    </div>
                    <button type="submit" class="bg-green-400 rounded p-2 mt-6">Legg til</button>
                </form>
            </section>

            <aside class="col-span-1 border-2 p-4 ml-2 rounded-sm">
                <header>
                    <h3 class="text-lg">Dagen idag</h3>
                    <p>7. mai 2021</p>
                </header>

                <div class="flex justify-between">
                    <a href="/">Alt</a>
                    <a href="/">Kun læring</a>
                    <a href="/">Kun oppgaver</a>
                </div>

                <article class="mt-4 p2">
                    <h4>Oppgave: Migrere noe</h4>
                    <small>09:30</small>
                    <p>Noe ble migrert.. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime esse similique modi perspiciatis recusandae aliquid vitae accusantium odit, dignissimos sapiente eius expedita! Dolore quaerat consequuntur magnam quod mollitia, laborum deleniti?</p>
                    <small>TAGS: db, sql, devops</small>
                </article>

                <article class="mt-4 p2">
                    <h4>Læring: Hvor er en ting i legacykoden</h4>
                    <small>10.00</small>
                    <p>Dette lørte jeg om dette greierne her. Her er noen screenshots og her er noen relevante lenker.</p>
                    <small>TAGS: db, sql, devops</small>
                </article>

            </aside>
        </main>
    </body>
</html>
