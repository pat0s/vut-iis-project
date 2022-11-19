<x-layout>

    <main id="teams-page">
        <section>
            <h2>Teams</h2>

            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search" value="{{old('search')}}">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            @auth
                <a href="/teams/create" class="button-styled">Create team</a>
            @endauth

            <x-team-page.teams-list :teams="$teams"/>

        </section>
    </main>

</x-layout>
