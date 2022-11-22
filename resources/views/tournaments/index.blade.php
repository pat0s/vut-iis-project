<x-layout>

    <main id="tournaments-page">
        <section>
            <h2>Tournaments</h2>

            <form method="GET" action="" id="search-from">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            @auth
            <a href="/tournaments/create" class="button-styled">Create tournament</a>
            @endauth

            <x-tournament-page.tournaments-list :tournaments="$tournaments" />

        </section>

    </main>

</x-layout>
