{% extends "layouts/beheer.volt" %}
{% block content %}
    <div class="page_title">
        <h1>Details</h1>
    </div>
    {{ form('admin/wijzig') }}
    {% for af in afspraak %}
        <p>
            <label for="datum">datum</label>
            {{ text_field("datum","class":"datepicker", "value":af.datum | escape_attr ) }}
        </p>
        <p>
            <label for="begintijd">begintijd:</label>
            {{ text_field("begintijd","class":"timepicker" , "value":af.begintijd | escape_attr) }}
        </p>
        {{ hidden_field("id", "value":af.id | escape_attr) }}
    {% endfor %}
    <p>
        <label for="behandeling">behandeling</label>
    <div class="input-field col s12 m6">
        <select name="behandeling_id" class="select">
            <option value=""> kies een behandeling</option>
            {% for b in behandeling %}
                <option {% for af in afspraak %} {% if af.behandeling.id == b.id %} selected  {% endif %} {% endfor %}
                        value="{{ b.id | escape_attr }}">{{ b.behandeling | escape_attr }}</option>
            {% endfor %}
        </select>
    </div>
    </p>
    <p>
        <label for="medewerker">medewerker</label>
    <div class="input-field col s12 m6">
        <select name="gebruiker_id" class="select">
            <option value=""> kies een medewerker</option>
            {% for af in gebruiker %}
                {% if af.rol == "admin" %}
                    <option {% for afs in afspraak %} {% if afs.gebruiker.id == af.id %} selected  {% endif %} {% endfor %}
                            value="{{ af.id | escape_attr }}">{{ af.voornaam | escape_attr }}</option>
                {% endif %}
            {% endfor %}
        </select>
    </div>
    </p>
    <p>
        {{ submit_button('bevestig') }}
        <span>{{ flash.output() }}</span>
    </p>
    {{ end_form() }}
{% endblock %}