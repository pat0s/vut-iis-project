<x-layout>

    <main id="create-team-page">
        <section>
            <h2>Create Team</h2>

            <form method="POST" action="">
                @csrf

                <div id="left-box">
                    <div id="profile-picture">
                        <img src="{{asset('/img/DuckBlue.svg')}}" alt="">
                    </div>

                    <h3>Image URL</h3>
                    <input type="text" name="image-url">

                </div>

                <div id="right-box">
                    <section id="team-name-input">
                        <h3>Team name</h3>
                        <input type="text" name="team-name">
                    </section>

                    <x-team-page.team-members 
                        :useFlag="2"
                    />

                </div>

                <button type="submit" id="submit-button">Create Team</button>

            </form>

        </section>

    </main>

</x-layout>