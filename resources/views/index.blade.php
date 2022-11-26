<x-layout>
    <main id="main-page">

        @if(Session::has('message'))
            <x-flash-message message="{{Session::get('message')}}" successOrerror="success"/>
        @elseif(Session::has('error'))
            <x-flash-message message="{{Session::get('error')}}" successOrerror="error"/>
        @endif

        <section id="quote">
            <h1>
                Who doesn't play, doesn't win
            </h1>
            <a href="#tournaments">></a>
        </section>

        <x-main-page.tournament-list :tournaments="$tournaments"/>
    </main>

</x-layout>
