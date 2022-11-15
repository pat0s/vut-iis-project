<x-layout>
    <main id="profile-page">
        <section>
            <h2>Mista MrDalo</h2>
            <div id="profile-picture">
                <img src="{{asset('img/DuckBlue.svg')}}" alt="">
            </div>
            
            <x-user-page.profile-info />
            
            <x-user-page.teams />

            <x-statistics
                :ID="1"
            />
        
        </section>
        
    
    
    </main>




</x-layout>