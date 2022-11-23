<x-layout>
    <main id="profile-page">
        @if(Session::has('message'))
            <x-flash-message message="{{Session::get('message')}}" successOrerror="success"/>
        @elseif(Session::has('error'))
            <x-flash-message message="{{Session::get('error')}}" successOrerror="error"/>
        @endif

        <section>
            <h2>{{$user->username}}</h2>
            <div id="profile-picture">
                <img src="{{$user->profile_image}}" alt="user-logo">
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
