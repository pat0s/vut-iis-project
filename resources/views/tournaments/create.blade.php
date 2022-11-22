<x-layout>

    <main id="create-tournament-page">
        <section>

            <h2>Create tournament</h2>

            <form method="POST" action="/tournaments">
                @csrf

                <div>
                    <label class="item" for="tournament_name">Tournament name</label>
                    <input class="item" type="text" name="tournament_name">
                    @error('tournament_name')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
{{--                <label class="item" for="tournament-name">Tournament name</label>--}}
{{--                <input class="item" type="text" name="tournament_name">--}}
{{--                @error('tournament_name')--}}
{{--                    <p style="color:red;">Penis</p>--}}
{{--                @enderror--}}

                <div>
                    <label class="item" for="tournament-description">Description</label>
                    <textarea class="item" name="description" id="tournament-description" cols="50" rows="5"></textarea>
                    @error('description')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

{{--                <label class="item" for="tournament-description">Description</label>--}}
{{--                <textarea class="item" name="tournament_description" id="tournament-description" cols="50" rows="5"></textarea>--}}

                <div>
                    <label class="item" for="tournament-start-date">Start date</label>
                    <input class="item" type="datetime-local" name="start_date" id="tournament-start-date">
                    @error('start_date')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
{{--                <label class="item" for="tournament-start-date">Start date</label>--}}
{{--                <input class="item" type="datetime-local" name="tournament_start_date" id="tournament-start-date">--}}

                <div>
                    <label class="item" for="tournament-end-date">End date</label>
                    <input class="item" type="datetime-local" name="end_date" id="tournament-end-date">
                    @error('end_date')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
{{--                <label class="item" for="tournament-end-date">End date</label>--}}
{{--                <input class="item" type="datetime-local" name="tournament_end_date" id="tournament-end-date">--}}

                <div>
                    <label class="item" for="tournament-pricepool">Pricepool</label>
                    <input class="item" type="text" name="pricepool" id="tournament-pricepool">
                    @error('pricepool')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
{{--                <label class="item" for="tournament-pricepool">Pricepool</label>--}}
{{--                <input class="item" type="text" name="tournament_pricepool" id="tournament-pricepool">--}}

                <div>
                    <label class="item" for="tournament-number-of-participants">Number of participants</label>
                    <select class="item" id="tournament-number-of-participants" name="number_of_participants">
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
{{--                <label class="item" for="tournament-number-of-participants">Number of participants</label>--}}
{{--                <select class="item" id="tournament-number-of-participants" name="tournament_number_of_participants">--}}
{{--                    <option value="64">64</option>--}}
{{--                    <option value="32">32</option>--}}
{{--                    <option value="16">16</option>--}}
{{--                    <option value="8">8</option>--}}
{{--                    <option value="4">4</option>--}}
{{--                    <option value="2">2</option>--}}
{{--                </select>--}}

                <div>
                    <label class="item" for="tournament-sport">Sport</label>
                    <select class="item" id="tournament-sport" name="sport_id">
                        @foreach($sports as $sport)
                            <option value="{{$sport->sport_id}}">{{$sport->name}} ({{$sport->number_of_players}}v{{$sport->number_of_players}})</option>
                        @endforeach
                    </select>
                    @error('sport_id')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
{{--                <label class="item" for="tournament-sport">Sport</label>--}}
{{--                <select class="item" id="tournament-sport" name="tournament_sport">--}}
{{--                    @foreach($sports as $sport)--}}
{{--                    <option value="{{$sport->name}}">{{$sport->name}} ({{$sport->number_of_players}}v{{$sport->number_of_players}})</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

                {{-- <span class="item" id="label-for-switch"> Individual participants</span>
                <label class="switch item" for="tournament-for-teams">

                        <input type="checkbox" name="tournament-for-teams" id="tournament-for-teams" onclick="window.switchButtonHandler()">
                        <span class="slider round" id="switch-round-button"></span>
                </label> --}}

{{--                <button type="submit" id="submit-button">Create Tournament</button>--}}
                <input type="submit" id="submit-button" value="Create tournament">
            </form>

        </section>

    </main>

</x-layout>
