<x-layout>
    <main id="profile-page">
        <section>
            <h2>Mista MrDalo</h2>
            <div id="profile-picture">
                <img src="./img/DuckBlue.svg" alt="">
            </div>
            <div id="profile-info">
                <form action="" id="profile-edit-form">
                    <table>
                        <tr>
                            <td>User name:</td>
                            <td><p class="form-p-tag">Mista MrDalo</p><input type="text" name="username" value="Mista MrDalo" class="form-input-tag hidden-element"> </td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td><p class="form-p-tag">mistamrdalo@gmail.com</p><input type="text" name="email" value="mistamrdalo@gmail.com" class="form-input-tag hidden-element"> </td>
                        </tr>
                        <tr>
                            <td>Firt name:</td>
                            <td><p class="form-p-tag">Dalibor</p><input type="text" name="firstname" value="Dalibor" class="form-input-tag hidden-element"> </td>
                        </tr>
                        <tr>
                            <td>Surname:</td>
                            <td><p class="form-p-tag">Králik</p><input type="text" name="surname" value="Králik" class="form-input-tag hidden-element"> </td>
                        </tr>
                        <tr>
                            <td>Image URL</td>
                            <td><p class="form-p-tag">https://developer.mozilla.org/en-US/docs/Web/CSS/justify-self</p><input type="text" name="surname" value="Králik" class="form-input-tag hidden-element"> </td>
                        </tr>
                    </table>
                    <button class="button-styled" type="button" id="edit-button" onclick="buttonPressed()">
                        Edit profile
                    </button>
                    
                    <button class="button-styled hidden-element" type="submit" id="submit-button" onclick="buttonPressed()">
                        Submit edit
                    </button>
                    <button class="button-styled hidden-element" type="button" id="cancel-button" onclick="buttonPressed()">
                        Cancel edit
                    </button>
                </form>

                <button class="button-styled">
                    Change password
                </button>
            </div>
            
            <section id="teams">
                <h3>Teams</h3>
                <button class="button-styled">
                    Create Team
                </button>
                <ul>
                    <li>
                        <a href="./team.html">
                            Incredible team
                        </a>
                        <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                    </li>
                    <li>
                        <a href="./team.html">
                            Incredible team
                        </a>
                        <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                    </li>
                    <li>
                        <a href="./team.html">
                            Incredible team
                        </a>
                        <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                    </li>
                    <li>
                        <a href="./team.html">
                            Incredible team
                        </a>
                        <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                    </li>
                    <li>
                        <a href="./team.html">
                            Incredible team
                        </a>
                        <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                    </li>
                    <li>
                        <a href="./team.html">
                            Incredible team
                        </a>
                        <a href=""><img src="./img/Trash.svg" alt="Trash"></a>
                    </li>
                </ul>
            </section>
            <section id="statistic">
                <h3>Statistics</h3>
                <div id="statistic-table">
                    <h4>Tournaments</h4>
                    <ul>
                        <li><p>First place:</p> <p>3</p></li>
                        <li><p>Second place:</p> <p>8</p></li>
                    </ul>
                    <h4>Matches</h4>
                    <ul>
                        <li><p>Wins:</p> <p>1</p></li>
                        <li><p>Loses:</p> <p>5</p></li>
                    </ul>
                </div>
                
            </section>
        </section>
        
    
    
    </main>




</x-layout>