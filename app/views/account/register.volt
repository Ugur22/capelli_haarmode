{% extends "layouts/base.volt" %}
{% block content %}
    <h1><h1>registreer</h1></h1>
    {{ form('account/createAccount', "class":"login-form") }}
    <div class="input-field col s6">
        <label for="email">email</label>
        {{ text_field("email") }}
    </div>
    <div class="input-field col s6">
        <label for="username">username</label>
        {{ text_field("username") }}
    </div>
    <div class="input-field col s6">
        <label for="password">password:</label>
        {{ passwordField("password") }}
    </div>
    <div class="input-field col s6">
        <label for="confirm_password">herhaal password:</label>
        {{ passwordField("confirm_password") }}
    </div>
    <div class="input-field col s6">
        <label for="voornaam">voornaam</label>
        {{ text_field("voornaam") }}
    </div>
    <div class="input-field col s6">
        <label for="achternaam">achternaam</label>
        {{ text_field("achternaam") }}
    </div>
    <div class="input-field col s6">
        <label for="telefoonnummer">telefoonnummer</label>
        {{ text_field("telefoonnummer") }}
    </div>
    {{ submit_button('maak account') }}
    <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
    {{ end_form() }}
    {{ flash.output() }}
{% endblock %}