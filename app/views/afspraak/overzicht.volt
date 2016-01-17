{% extends "layouts/dashboard.volt" %}
{% block content %}
<h1>Mijn afspraken</h1>
    <div class="header">
        <a href="{{ url("afspraak") }}" class="waves-effect waves-light btn"><i class="small material-icons">replay</i>maak een nieuwe afspraak</a>
    </div>
    <table class="highlight">
        <thead>
        <tr>
            <th>datum</th>
            <th>begintijd</th>
            <th>eindtijd</th>
            <th class="hide_row">medewerker</th>
            <th class="hide_row">behandeling</th>
            <th class="hide_row">prijs</th>
        </tr>
        </thead>
        {% for af in afspraak %}
            <tr>
                <td>{{ af.datum | escape_attr}}</td>
                <td>{{ af.begintijd | escape_attr}}</td>
                <td>{{ af.eindtijd | escape_attr}}</td>
                <td class="hide_row">{{ af.gebruiker.voornaam | escape_attr| upper}}</td>
                <td class="hide_row">{{ af.behandeling.behandeling | escape_attr|upper}}</td>
                <td class="hide_row">€{{ af.behandeling.prijs | escape_attr}}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}