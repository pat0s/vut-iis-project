<x-layout>

    <main id="tournaments-page">
        <section>
            <h2>Tournaments</h2>

            <form method="GET" action="" id="search-from">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            <a href="/tournament/create" class="button-styled">Create tournament</a>

            <x-tournament-page.tournaments-list />

        </section>

    </main>

</x-layout>