<x-layout>

    <main id="create-team-page">
        <section>
            <h2>Create Team</h2>

            <form method="POST" action="/teams" enctype="multipart/form-data">
                @csrf

                <div id="left-box">
                    <div id="profile-picture">
                        <img src="{{asset('/img/DuckBlue.svg')}}" alt="">
                    </div>

                    <h3>Team Image</h3>
                    <input type="file" name="image" name="image">

                </div>

                <div id="right-box">
                    <section id="team-name-input">
                        <h3>Team name</h3>
                        <input type="text" name="team_name" value="{{old('team_name')}}">
                        @error('team_name')
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </section>

                    <x-team-page.create-page-team-members
                    :users="$users"/>
                </div>

                <button type="submit" id="submit-button">Create Team</button>
            </form>

        </section>
    </main>

</x-layout>
