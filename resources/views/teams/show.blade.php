<x-layout>

    <main id="team-page">
        @if(Session::has('message'))
            <x-flash-message message="{{Session::get('message')}}" successOrerror="success"/>
        @elseif(Session::has('error'))
            <x-flash-message message="{{Session::get('error')}}" successOrerror="error"/>
        @endif

        <section>
            <h2>{{$team->team_name}}</h2>
            <div id="profile-picture">
                @if($team->logo_url)
                    <img src="{{$team->logo_url}}" alt="team-logo">
                @else
                    <img src="{{asset('/img/DuckBlue.svg')}}"" id="duck-image" alt="team-logo">
                @endif
            </div>

            <x-team-page.team-members
                :members="$members"
                :teamManager="$teamManager"
                :users="$users"
                :team="$team"
            />

            <x-team-page.tournament-list
                :tournaments="$tournaments"
            />

            <x-statistics
                :ID="1"
            />
        </section>
    </main>

</x-layout>
