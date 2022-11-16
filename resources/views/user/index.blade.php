<x-layout>
    <main id="profile-page">
        <section>
            <h2>Mista MrDalo</h2>
            <div id="profile-picture">
                <img src="{{asset('img/DuckBlue.svg')}}" alt="">
            </div>

            <x-profile-page.profile-info :user="$user" :profileOwner="$profileOwner"/>

            <x-profile-page.teams :profileOwner="$profileOwner" :teams="$teams"/>

            <x-statistics
                :ID="1"
            />

        </section>



    </main>




</x-layout>
