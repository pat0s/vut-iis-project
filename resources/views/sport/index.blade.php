<x-layout>
    <main id="sport-page">
        <section>
            <h2>Sports</h2>

            <form method="GET" action="" id="search-from">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            <button id="plus-btn" onclick="window.createSportButtonHandler()"><p>+</p></button>


            <form method="POST" action="/sport/create" id="create-form" class="hidden-element">
                    @csrf
                <div>
                    <label for="name">Sport name</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="number_of_players">Members in team</label>
                    <input type="number" min="1" max="20" name="number_of_players">
                </div>

                <button type="submit" class="button-styled">Create sport</button>

            </form>

            <x-sport-page.sports-list :sports="$sports"/>

        </section>

    </main>

</x-layout>