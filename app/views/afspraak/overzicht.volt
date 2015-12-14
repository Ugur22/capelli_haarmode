<h1>Overzicht afspraken</h1>
<div class="header">
    <a href="{{ url("afspraak") }}" class="waves-effect waves-light btn"><i class="small material-icons">replay</i>maak
        een nieuwe afspraak</a>
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
        <th class="hide_row">wijzig</th>
        <th class="hide_row">delete</th>
    </tr>
    </thead>
    {% for af in afspraak %}
        <tr>
            <td>Erik Van Dijk</td>
            <td>{{ af.datum }}</td>
            <td class="hide_row">{{ af.begintijd }}</td>
            <td class="hide_row">{{ af.begintijd }}</td>
            <td>{{ af.gebruiker.voornaam }}</td>
            <td class="hide_row">{{ af.behandeling.behandeling }}</td>
            <td class="hide_row">{{ af.behandeling.prijs }}</td>
            <td class="hide_row"><a href="{{ url("user") }}"><i class="small material-icons">settings</i></a></td>
            <td class="hide_row"><a href="{{ url("user") }}"><i class="small material-icons">delete</i></a></td>
        </tr>
    {% endfor %}
</table>

