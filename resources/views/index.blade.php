<x-layout>
    <main id="main-page">

        {{-- @guest --}}
            
        <section id="quote">
            <h1>
                Who doesn't play, doesn't win
            </h1>
            <a href="#tournament-list">></a>
        </section>
        {{-- @endguest --}}

        <x-main-page.tournament-list />
    
    </main>

</x-layout>