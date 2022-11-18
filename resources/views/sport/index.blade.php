<x-layout>

    <main id="sport-page">
        <section>
            <h2>Sports</h2>

            <form method="GET" action="" id="search-from">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>


            <form method="POST" action="" id="create-form">
                <label for="sport-name">Sport name</label>
                <input type="text" name="sport-name">
                <label for="team-member-number">Members in team</label>
                <input type="number" min="1" max="20" name="team-member-number">

                <button type="submit" class="button-styled">Create sport</button>

            </form>

            <x-user-page.users-list />

        </section>

    </main>

</x-layout>