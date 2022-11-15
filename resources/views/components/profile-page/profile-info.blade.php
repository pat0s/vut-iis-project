<div id="profile-info">
    @error('update-error')
        <p style="color:red;">{{$message}}</p>
    @enderror

    <form method="POST" action="{{'/user/'. $user->person_id .'/edit'}}" id="profile-edit-form">
        @csrf

        <table>
            <tr>
                <td>User name:</td>
                <td><p class="form-p-tag">{{$user->username}}</p><input type="text" name="username" value="{{$user->username}}" class="form-input-tag hidden-element"> </td>
            </tr>
            @error('username')
                <p style="color:red;">{{$message}}</p>
            @enderror

            <tr>
                <td>E-mail:</td>
                <td><p class="form-p-tag">{{$user->email}}</p><input type="email" name="email" value="{{$user->email}}" class="form-input-tag hidden-element"> </td>
            </tr>
            @error('email')
                <p style="color:red;">{{$message}}</p>
            @enderror

            <tr>
                <td>Firt name:</td>
                <td><p class="form-p-tag">{{$user->first_name}}</p><input type="text" name="first_name" value="{{$user->first_name}}" class="form-input-tag hidden-element"> </td>
            </tr>
            @error('first_name')
                <p style="color:red;">{{$message}}</p>
            @enderror

            <tr>
                <td>Surname:</td>
                <td><p class="form-p-tag">{{$user->surname}}</p><input type="text" name="surname" value="{{$user->surname}}" class="form-input-tag hidden-element"> </td>
            </tr>
            @error('surname')
                <p style="color:red;">{{$message}}</p>
            @enderror

            <tr>
                <td>Image URL</td>
                <td><p class="form-p-tag">{{$user->image_url}}</p><input type="text" name="image_url" value="{{$user->image_url}}" class="form-input-tag hidden-element"> </td>
            </tr>
            @error('image_url')
                <p style="color:red;">{{$message}}</p>
            @enderror

        </table>

        @if($profileOwner)
            <a href=""> </a>
            <button class="button-styled" type="button" id="edit-button" onclick="window.buttonPressedProfile()">
                Edit profile
            </button>

            <button class="button-styled hidden-element" type="submit" id="submit-button">
                Submit
            </button>
            <button class="button-styled hidden-element" type="button" id="cancel-button" onclick="window.buttonPressedProfile()">
                Cancel
            </button>
        @endif
    </form>

    @if($profileOwner)
        <button class="button-styled">
            Change password
        </button>
    @endif
</div>
