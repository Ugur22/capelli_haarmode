{% extends "layouts/base.volt" %}
{% block content %}
    <div class="page_title">
        <h1>registreer
        </h1>
    </div>
    {{ form('account/createAccount', "class":"login-form") }}
    <div class="input-field col s6">
        <label for="email">email</label>
        {{ text_field("email","value":this.request.getPost('email')) }}
    </div>
    <div class="input-field col s6">
        <label for="username">username</label>
        {{ text_field("username","value":this.request.getPost('username')) }}
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
        {{ text_field("voornaam","value":this.request.getPost('voornaam')) }}
    </div>
    <div class="input-field col s6">
        <label for="tussenvoegsel">tussenvoegsel</label>
        {{ text_field("tussenvoegsel","value":this.request.getPost('tussenvoegsel')) }}
    </div>
    <div class="input-field col s6">
        <label for="achternaam">achternaam</label>
        {{ text_field("achternaam","value":this.request.getPost('achternaam')) }}
    </div>
    <div class="input-field col s6">
        <label for="telefoonnummer">telefoonnummer</label>
        {{ text_field("telefoonnummer","value":this.request.getPost('telefoonnummer')) }}
    </div>
    <span class="submit">{{ submit_button('maak account') }}</span>
    <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
    {{ end_form() }}
    {{ flash.output() }}
{% endblock %}