{% extends "layouts/base.volt" %}
{% block content %}
<div class="page_title">
    <h1>Login</h1>
    </div>
    {{ form('account/login', "class":"login-form") }}
    <p>
        <label for="email">email/username</label>
        {{ text_field("email") }}
    </p>
    <p>
        <label for="password">password:</label>
        {{ passwordField("password") }}
    </p>
    <p>
        <div class="buttons_login">
        <a href="{{ url("account/register") }}" class="waves-effect waves-light btn">registreer</a>
        {{ submit_button('login') }}
        <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
        </div>
    </p>
    {{ end_form() }}
    {{ flash.output() }}
{% endblock %}
