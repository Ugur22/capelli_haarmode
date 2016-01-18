{% extends "layouts/beheer.volt" %}
{% block content %}
<div class="page_title">
<h1>Overzicht afspraken</h1>
    </div>
<table class="highlight">
    <thead>
    <tr>
        <th>klant</th>
        <th>datum</th>
        <th class="hide_row">begintijd</th>
        <th class="hide_row">eindtijd</th>
        <th>medewerker</th>
        <th class="hide_row">behandeling</th>
        <th class="hide_row">prijs</th>
        <th>details</th>
        <th>delete</th>
    </tr>
    </thead>
    {% for af in afspraak %}
        <tr>
            <td>{{ af.klant | escape_attr}}</td>
            <td>{{ af.datum| escape_attr }}</td>
            <td class="hide_row">{{ af.begintijd | escape_attr }}</td>
            <td class="hide_row">{{ af.eindtijd | escape_attr }}</td>
            <td>{{ af.gebruiker.voornaam | escape_attr }}</td>
            <td class="hide_row">{{ af.behandeling.behandeling | escape_attr }}</td>
            <td class="hide_row">€{{ af.behandeling.prijs | escape_attr }}</td>
            <td><a href="{{ url("admin/detail/" ~ af.id | escape_attr) }}"><i class="small material-icons">info</i></a></td>
            <td><a href="{{ url("admin/verwijder/" ~ af.id | escape_attr) }}"><i class="small material-icons">delete</i></a></td>
        </tr>
    {% endfor %}
</table>
{% endblock %}

