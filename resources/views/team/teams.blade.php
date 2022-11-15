<x-layout>

    <main id="teams-page">
        <section>
            <h2>Teams</h2>

            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            <a href="/team/create" class="button-styled">Create team</a>

            <x-team-page.teams-list />

        </section>

    </main>

</x-layout>