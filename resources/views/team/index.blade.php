<x-layout>

    <main id="team-page">
        <section>
            <h2>Yteckari</h2>
            <div id="profile-picture">
                <img src="{{asset('/img/DuckBlue.svg')}}" alt="">
            </div>
           
            <x-team-page.team-members />
            
            <x-team-page.tournament-list />

            <x-statistics
                :ID="1"
            />
            
        </section>
        
    
    
    </main>

</x-layout>