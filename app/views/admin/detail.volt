{% extends "layouts/dashboard.volt" %}
{% block content %}
<h1>Details</h1>
{{ form('admin/wijzig') }}
    {% for af in afspraak %}
<p>
    <label for="datum">datum</label>
    {{  text_field("datum","class":"datepicker", "value":af.datum ) }}
</p>
<p>
    <label for="begintijd">begintijd:</label>
    {{ text_field("begintijd","class":"timepicker" , "value":af.begintijd) }}
</p>
{{ hidden_field("id", "value":af.id) }}
   {% endfor %}
<p>
    <label for="behandeling">behandeling</label>
       <div class="input-field col s12 m6">
    <select name="behandeling_id" class="select">
     <option value="" disabled selected> kies een behandeling</option>
        {% for b in behandeling %}
            <option value="{{ b.id }}">{{ b.behandeling }}</option>
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
                <option value="{{ af.id }}">{{ af.voornaam }}</option>
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