<h1>Login</h1>
{{ form('account/login', "class":"login-form") }}
<p>
    <label for="username">username</label>
    {{ text_field("username") }}
</p>
<p>
    <label for="password">password:</label>
    {{ passwordField("password") }}
</p>
<p>
    {{ submit_button('login') }}
</p>
{{ end_form() }}