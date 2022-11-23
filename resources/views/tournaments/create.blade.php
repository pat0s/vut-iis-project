<x-layout>

    <main id="create-tournament-page">
        <section>

            <h2>Create tournament</h2>
            <form method="POST" action="/tournaments">
                @csrf

                <div class="item">
                    <label for="tournament_name">Tournament name</label>
                    <input type="text" name="tournament_name">
                    @error('tournament_name')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="item">
                    <label for="tournament-description">Description</label>
                    <textarea name="description" id="tournament-description" cols="50" rows="5"></textarea>
                    @error('description')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="item">
                    <label for="tournament-start-date">Start date</label>
                    <input type="datetime-local" name="start_date" id="tournament-start-date">
                    @error('start_date')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="item">
                    <label for="tournament-end-date">End date</label>
                    <input type="datetime-local" name="end_date" id="tournament-end-date">
                    @error('end_date')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="item">
                    <label for="tournament-pricepool">Pricepool</label>
                    <input type="text" name="pricepool" id="tournament-pricepool">
                    @error('pricepool')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="item">
                    <label for="tournament-number-of-participants">Number of participants</label>
                    <select id="tournament-number-of-participants" name="number_of_participants">
                        <option value="64">64</option>
                        <option value="32">32</option>
                        <option value="16">16</option>
                        <option value="8">8</option>
                        <option value="4">4</option>
                        <option value="2">2</option>
                    </select>
                    @error('number_of_participants')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="item">
                    <label for="tournament-sport">Sport</label>
                    <select id="tournament-sport" name="sport_id">
                        @foreach($sports as $sport)
                            <option value="{{$sport->sport_id}}">{{$sport->name}} ({{$sport->number_of_players}}v{{$sport->number_of_players}})</option>
                        @endforeach
                    </select>
                    @error('sport_id')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" id="submit-button" value="Create tournament">
            </form>

        </section>

    </main>

</x-layout>
