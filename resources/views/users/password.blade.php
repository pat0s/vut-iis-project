<x-layout>

    <main id="change-password-page">
        <h2>Change password</h2>
        <section>

                <form method="POST" action="/password/update">
                    @csrf

                    <input type="password" placeholder="Old password*" name="old_password"/>
                    @error('old_password')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                    <input type="password" placeholder="New password*" name="new_password"/>
                    @error('new_password')
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                    <input type="password" placeholder="Repeat new password*" name="new_password_confirmation"/>
                    @error('new_password_confirmation')
                        <p style="color:red;">{{$message}}</p>
                    @enderror

                    <div id="form-buttons">
                        <button type="submit" name="submit-button">Change password</button>
                        <a href="/users/{{auth()->user()->person_id}}" class="button-styled">Cancel</a>
                    </div>
                </form>

        </section>
    </main>


</x-layout>
