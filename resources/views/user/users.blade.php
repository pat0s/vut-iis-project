<x-layout>

    <main id="users-page">
        <section>
            <h2>Users</h2>

            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>
            </form>

            <x-user-page.users-list />

        </section>

    </main>


</x-layout>