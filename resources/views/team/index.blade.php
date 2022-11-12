<x-layout>

    <main id="create-team-page">
        <section>
            <h2>Create Team</h2>

            <form method="POST" action="">
                @csrf

                <div id="left-box">
                    <div id="profile-picture">
                        <img src="{{asset('/img/DuckBlue.svg')}}" alt="">
                    </div>

                    <h3>Image URL</h3>
                    <input type="text" name="image-url">

                </div>

                <div id="right-box">
                    <section id="team-name-input">
                        <h3>Team name</h3>
                        <input type="text" name="team-name">
                    </section>

                    <section id="team-members">
                        <h3>Members</h3>
                        <ul>
                            <li>
                                <a href="./profile.html">
                                    Mista MrDalo
                                </a>
                                <a href=""><img src="./img/Star.svg" alt="Trash"></a>
                            </li>
                            <li>
                                <a href="./profile.html">
                                    Mista Pat0s
                                </a>
                                <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                            </li>
                            <li>
                                <a href="./profile.html">
                                    Mista Sek1no
                                </a>
                                <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                            </li>
                            <li>
                                <a href="./profile.html">
                                    Mista Anton van der Tonislav
                                </a>
                                <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                            </li>
                            <li>
                                <a href="./profile.html">
                                    Mista LOva
                                </a>
                                <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                            </li>
                        </ul>
                        <button type="button"><p>+</p></button>
                    </section>
                </div>

                <button type="submit" id="submit-button">Create Team</button>

            </form>

        </section>

    </main>

</x-layout>