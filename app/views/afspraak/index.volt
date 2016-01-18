{% extends "layouts/dashboard.volt" %}
{% block content %}
    <div class="page_title">
<h1>Maak een afspraak</h1>
    </div>
{{ form('afspraak/toevoegen') }}
<p>
    <label for="datum">datum</label>
    {{  text_field("datum","class":"datepicker","placeholder":"klik hier om een datum te kiezen") }}
</p>
<p>
    <label for="begintijd">begintijd:</label>
    {{ text_field("begintijd","class":"timepicker","placeholder":"klik hier om een tijd te kiezen") }}
</p>
<p>
    <label for="behandeling">behandeling</label>
       <div class="input-field col s12 m6">
    <select name="behandeling_id" class="select">
     <option value="" disabled selected> kies een behandeling</option>
        {% for b in behandeling %}
            <option value="{{ b.id }}">{{ b.behandeling|upper|escape }} <span> - €{{ b.prijs }}</span></option>
        {% endfor %}
    </select>
    </div>
</p>
<p>
    <label for="medewerker">medewerker</label>
     <div class="input-field col s12 m6">
    <select name="gebruiker_id" class="select">
     <option value="" disabled selected> kies een medewerker</option>
        {% for af in gebruiker %}
            {% if af.rol == "admin" %}
                <option value="{{ af.id }}">{{ af.voornaam|upper|escape }}</option>
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