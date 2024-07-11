<div class="box">
    <h4>Member Login / Sign up</h4>
    <form action="" method="post" name="login" id="login">
        @csrf
        <input name="client_id" type="hidden" value="" />
        <table>
            <tbody>
                <tr class="email">
                    <td class="label">
                        <label for="email">
                            Email:
                        </label>
                    </td>
                    <td class="input">
                        <input type="email" name="email" id="email" autocomplete="email" value="" required />
                    </td>
                </tr>

                <tr class="password">
                    <td class="label">
                        <label for="password">
                            Password:
                        </label>
                    </td>
                    <td class="input">
                        <input type="password" name="password" id="password" autocomplete="current-password" required />
                    </td>
                </tr>

                <tr class="remember">
                    <td></td>
                    <td>
                        <input type="checkbox" name="remember" id="checkbox" value="yes" />
                        <label for="checkbox">Remember my email</label>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="login_btn" name="action" value="login">Login</button>
                        <button type="button" class="signup_btn" name="action" value="signup" onclick="">Sign Up</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <a href="" class="forgot">Forgot your password?</a>
</div>
