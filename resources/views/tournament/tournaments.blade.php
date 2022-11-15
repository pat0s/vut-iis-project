<x-layout>

    <main id="teams-page">
        <section>
            <h2>Tournaments</h2>

            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            <a href="/tournament/create" class="button-styled">Create tournament</a>

            <x-team-page.tournament-list />

        </section>

    </main>

</x-layout>