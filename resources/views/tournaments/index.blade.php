<x-layout>

    <main id="tournaments-page">
        @if(Session::has('message'))
            <x-flash-message message="{{Session::get('message')}}" successOrerror="success"/>
        @elseif(Session::has('error'))
            <x-flash-message message="{{Session::get('error')}}" successOrerror="error"/>
        @endif

        <section>
            <h2>Tournaments</h2>

            <form method="GET" action="" id="search-from">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><img src="{{asset('./img/search.svg')}}" alt="search"></button>

                @auth
                    <a href="/tournaments/create" class="button-styled">Create tournament</a>
                @endauth

                <div id="radio-filter">
                    <div>
                        <input type="radio" id="all" name="filter-value" value="all" {{$requestFilterValue == "all" || $requestFilterValue == null ? "checked" : ""}}>
                        <label for="all">all</label>
                    </div>
                    <div>
                        <input type="radio" id="finished" name="filter-value" value="finished" {{$requestFilterValue == "finished" ? "checked" : ""}}>
                        <label for="finished">finished</label>
                    </div>
                    <div>
                        <input type="radio" id="ongoing" name="filter-value" value="ongoing" {{$requestFilterValue == "ongoing" ? "checked" : ""}}>
                        <label for="ongoing">ongoing</label>
                    </div>
                    <div>
                        <input type="radio" id="unstarted" name="filter-value" value="unstarted" {{$requestFilterValue == "unstarted" ? "checked" : ""}}>
                        <label for="unstarted">unstarted</label>
                    </div>
                    <div>
                        <input type="radio" id="unstarted" name="filter-value" value="approved" {{$requestFilterValue == "approved" ? "checked" : ""}}>
                        <label for="unstarted">approved</label>
                    </div>
                    <div>
                        <input type="radio" id="unstarted" name="filter-value" value="unapproved" {{$requestFilterValue == "unapproved" ? "checked" : ""}}>
                        <label for="unstarted">unapproved</label>
                    </div>
                </div>
            </form>

            <x-tournament-page.tournaments-list :tournaments="$tournaments" />

        </section>
    </main>

</x-layout>
