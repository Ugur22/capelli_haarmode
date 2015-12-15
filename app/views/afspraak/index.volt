<h1>Maak een afspraak</h1>
{{ form('afspraak/toevoegen') }}
<p>
    <label for="datum">datum</label>
    {{ text_field("datum","class":"datepicker") }}
</p>
<p>
    <label for="begintijd">begintijd:</label>
    {{ text_field("begintijd","class":"timepicker") }}
</p>
<p>
    <label for="behandeling">behandeling</label>
    <select name="behandeling_id" class="select">
        {% for b in behandeling %}
            <option value="{{ b.id }}">{{ b.behandeling }}</option>
        {% endfor %}
    </select>
</p>
<p>
    <label for="medewerker">medewerker</label>
    <select name="gebruiker_id" class="select">
        {% for af in gebruiker %}
            {% if af.role == 1 %}
                <option value="{{ af.id }}">{{ af.voornaam }}</option>
            {% endif %}
        {% endfor %}
    </select>
</p>
<p>
    {{ submit_button('bevestig') }}
</p>
</form>