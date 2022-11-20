<x-layout>
    <main id="main-page">

        <section id="quote">
            <h1>
                Who doesn't play, doesn't win
            </h1>
            <a href="#tournaments">></a>
        </section>

        <x-main-page.tournament-list />
        <x-flash-message message="User logged succesfully" successOrerror="success"/>
    
    </main>

</x-layout>