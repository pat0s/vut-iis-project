<x-layout>

    <main id="create-tournament-page">
        <section>

            <h2>Create tournament</h2>

            <form method="POST" action="">
                <label class="item" for="tournament-name">Tournament name</label>
                <input class="item" type="text" name="tournament-name">
                
                <label class="item" for="tournament-description">Description</label>
                <textarea class="item" name="tournament-description" id="tournament-description" cols="50" rows="5"></textarea>
                
                <label class="item" for="tournament-start-date">Start date</label>
                <input class="item" type="datetime-local" name="tournament-start-date" id="tournament-start-date">
                
                <label class="item" for="tournament-end-date">End date</label>
                <input class="item" type="datetime-local" name="tournament-end-date" id="tournament-end-date">
                
                <label class="item" for="tournament-pricepool">Pricepool</label>
                <input class="item" type="text" name="tournament-pricepool" id="tournament-pricepool">
                
                <label class="item" for="tournament-number-of-participants">Number of participants</label>
                <select class="item" id="tournament-number-of-participants" name="tournament-number-of-participants">
                    <option value="64">64</option>
                    <option value="32">32</option>
                    <option value="16">16</option>
                    <option value="8">8</option>
                    <option value="4">4</option>
                    <option value="2">2</option>
                </select>
                
                <label class="item" for="tournament-sport">Sport</label>
                <select class="item" id="tournament-sport" name="tournament-sport">
                    <option value="tenis-1">tenis (1v1)</option>
                    <option value="futbal-5">futbal (5v5)</option>
                    <option value="CSGO-5">CSGO (5v5)</option>
                    <option value="sipky-1">sipky (1v1)</option>
                    <option value="stolnifutbal-2">stolni futbal (2v2)</option>
                </select>

                {{-- <span class="item" id="label-for-switch"> Individual participants</span>
                <label class="switch item" for="tournament-for-teams">

                        <input type="checkbox" name="tournament-for-teams" id="tournament-for-teams" onclick="window.switchButtonHandler()">
                        <span class="slider round" id="switch-round-button"></span>
                </label> --}}

                <input type="submit" id="submit-button" value="Create tournament">
            </form>

        </section>
        
    </main>

</x-layout>