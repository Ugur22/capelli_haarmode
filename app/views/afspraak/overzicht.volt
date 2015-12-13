<h1>Overzicht afspraken</h1>
<a href="{{ url("afspraak") }}" class="waves-effect waves-light btn"><i class="small material-icons">replay</i>maak een nieuwe afspraak</a>
<table class="highlight">
    <thead>
    <tr>
        <th>klant</th>
        <th>datum</th>
        <th>begintijd</th>
        <th>eindtijd</th>
        <th>medewerker</th>
        <th>behandeling</th>
        <th>prijs</th>
        <th>wijzig</th>
        <th>delete</th>
    </tr>
    </thead>
    {% for af in afspraak %}
        <tr>
            <td>Erik Van Dijk</td>
            <td>{{ af.datum }}</td>
            <td>{{ af.begintijd }}</td>
            <td>{{ af.begintijd }}</td>
            <td>{{ af.gebruiker.voornaam }}</td>
            <td>{{ af.behandeling.behandeling }}</td>
            <td>{{ af.behandeling.prijs }}</td>
            <td><a href="{{ url("user") }}"><i class="small material-icons">settings</i></a></td>
            <td><a href="{{ url("user") }}"><i class="small material-icons">delete</i></a></td>
        </tr>
    {% endfor %}
</table>

