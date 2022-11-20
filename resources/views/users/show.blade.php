<x-layout>
    <main id="profile-page">
        <section>
            <h2>{{$user->username}}</h2>
            <div id="profile-picture">
                <img src="{{asset('img/DuckBlue.svg')}}" alt="">
            </div>

            <x-user-page.profile-info
                :user="$user"
                :profileOwner="$profileOwner"
            />

            <x-user-page.teams
                :profileOwner="$profileOwner"
                :teams="$teams"
            />

            <x-statistics
                :ID="1"
            />

            @auth
                @if(in_array(auth()->user()->role_id, [2,3]))
                    <x-user-page.admin-section
                        :user="$user"
                    />
                @endif
            @endauth
        </section>
    </main>
</x-layout>
