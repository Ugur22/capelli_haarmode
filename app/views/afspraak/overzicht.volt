{% extends "layouts/dashboard.volt" %}
{% block content %}
<h1>Mijn afspraken</h1>
    <div class="header">
        <a href="{{ url("afspraak") }}" class="waves-effect waves-light btn"><i class="small material-icons">replay</i>maak
            een nieuwe afspraak</a>
    </div>
    <table class="highlight">
        <thead>
        <tr>
<<<<<<< HEAD
            <td>Busra Karadeniz</td>
            <td>{{ af.datum }}</td>
            <td class="hide_row">{{ af.begintijd }}</td>
            <td class="hide_row">{{ af.eindtijd }}</td>
            <td>{{ af.gebruiker.voornaam }}</td>
            <td class="hide_row">{{ af.behandeling.behandeling }}</td>
            <td class="hide_row">€{{ af.behandeling.prijs }}</td>
            <td class="hide_row"><a href="{{ url("user") }}"><i class="small material-icons">settings</i></a></td>
            <td class="hide_row"><a href="{{ url("user") }}"><i class="small material-icons">delete</i></a></td>
=======
            <th>datum</th>
            <th>begintijd</th>
            <th>eindtijd</th>
            <th class="hide_row">medewerker</th>
            <th class="hide_row">behandeling</th>
            <th class="hide_row">prijs</th>
>>>>>>> 0a74381cbca4aca4c4d14c302d58834b1f5e86cb
        </tr>
        </thead>
        {% for af in afspraak %}
            <tr>
                <td>{{ af.datum | escape_attr}}</td>
                <td>{{ af.begintijd | escape_attr}}</td>
                <td>{{ af.eindtijd | escape_attr}}</td>
                <td class="hide_row">{{ af.gebruiker.voornaam | escape_attr}}</td>
                <td class="hide_row">{{ af.behandeling.behandeling | escape_attr}}</td>
                <td class="hide_row">€{{ af.behandeling.prijs | escape_attr}}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}