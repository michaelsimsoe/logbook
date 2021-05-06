<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Logbok</title>


    </head>
    <body class="bg-gray-50">
        <header class="flex flex-row justify-between">
            <h1><a href="/">Logbok</a></h1>
            <a href="#">Log ut</a>
        </header>
        <main class="grid grid-cols-3">
            <section class="col-span-2">
                <h2>Nytt innslag</h2>
                <form action="" class="flex flex-col">
                    <div>
                        <label for="title">Tittel</label>
                        <input type="text" name="title" id="title">
                    </div>
                     <div>
                        <label for="body">Hva vil du si?</label>
                        <textarea name="body" id="body" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <label for="tags">Tags:</label>
                        <input type="text" name="tags" id="tags">
                    </div>
                    <div>
                        <p for="type">Type</p>
                        <label for="type-learn">Læring</label>
                        <input type="radio" name="type" id="type-learn" value="learn">
                        <label for="type-task">Oppgave</label>
                        <input type="radio" name="type" id="type-task" value="task">
                    </div>
                    <button type="submit">Legg til</button>
                </form>
            </section>
            <aside class="col-span-1">
                <h3>Dagen idag</h3>
                <p>7. mai 2021</p>
                <a href="/">Alt</a>
                <a href="/">Kun læring</a>
                <a href="/">Kun oppgaver</a>
                <article>
                    <h4>Oppgave: Migrere noe</h4>
                    <small>09:30</small>
                    <p>Noe ble migrert.. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime esse similique modi perspiciatis recusandae aliquid vitae accusantium odit, dignissimos sapiente eius expedita! Dolore quaerat consequuntur magnam quod mollitia, laborum deleniti?</p>
                    <small>TAGS: db, sql, devops</small>
                </article>
                <article>
                    <h4>Læring: Hvor er en ting i legacykoden</h4>
                    <small>10.00</small>
                    <p>Dette lørte jeg om dette greierne her. Her er noen screenshots og her er noen relevante lenker.</p>
                    <small>TAGS: db, sql, devops</small>
                </article>
            </aside>
        </main>
    </body>
</html>
