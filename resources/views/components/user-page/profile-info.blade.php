<div id="profile-info">
    <form method="POST" action="" id="profile-edit-form">
        @csrf

        
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
                <td><p class="form-p-tag">https://developer.mozilla.org/en-US/docs/Web/CSS/justify-self</p><input type="text" name="surname" value="https://developer.mozilla.org/en-US/docs/Web/CSS/justify-self" class="form-input-tag hidden-element"> </td>
            </tr>
        </table>
        <button class="button-styled" type="button" id="edit-button" onclick="window.buttonPressedProfile()">
            Edit profile
        </button>
        
        <button class="button-styled hidden-element" type="submit" id="submit-button" onclick="window.buttonPressedProfile()">
            Submit edit
        </button>
        <button class="button-styled hidden-element" type="button" id="cancel-button" onclick="window.buttonPressedProfile()">
            Cancel edit
        </button>
    </form>

    <button class="button-styled">
        Change password
    </button>
</div>