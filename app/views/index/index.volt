{% extends "layouts/base.volt" %}
{% block content %}
    <section id="home">
        <section class="parallax-container">
            <article>
                <div class="header">
                    <h1>Knippen zonder wachten!</h1>
                    <a href="{{ url("afspraak") }}" class="waves-effect waves-light btn">maak afspraak</a>
                    <h3>Openingstijden</h3>
                </div>
                <ul>
                    <li> maandag - gesloten</li>
                    <li> Dinsdag - 09:00 t/m 18:00</li>
                    <li> Woensdag - 09:00 t/m 18:00</li>
                    <li>Donderdag - 09:00 t/m 18:00</li>
                    <li>Vrijdag - 09:00 t/m 18:00</li>
                    <li>Zaterdag - 09:00 t/m 16:00</li>
                    <li>Zondag - gesloten</li>
                </ul>
            </article>
        </section>
    </section>
    <section id="producten">
        <div class="row container">
            <article>
                <h1>Producten</h1>
                <ul class="row" id="holder_product">
                    {% for p in product %}
                        <li class="col s12 m7">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">{{ p.naam }}</span>
                                    <p>{{ p.beschrijving }}</p>
                                    <div class="card-image">
                                        <img src="../img/{{ p.img }}">
                                    </div>
                                </div>
                                <div class="card-action">
                                </div>
                            </div>
                        </li>
                    {% endfor %}
                </ul>
            </article>
        </div>
    </section>
    <section class="parallax-container">
        <div class="parallax"><img src="img/foto.jpg"></div>
    </section>
    <section id="behandeling">
        <article>
            <h1>Prijzenlijst</h1>
            <ul class="row" id="holder">
                {% for b in behandeling %}
                    <li>
                        <span class="card-title">{{ b.behandeling }} &euro;{{ b.prijs }}</span></li>
                {% endfor %}
                <h2>Dinsdag tot en met Donderdag:</h2>
                <ul>
                    <li>Kinderen knippen t/m 12 jaar &euro;18,50,- </li>
                    <li>studenten  korting Dames: &euro; 21,50,-</li>
                    <li>studenten  korting Heren: &euro; 21,-</li>
                    <li></li>
                </ul>
            </ul>
        </article>
    </section>
    </body>
{% endblock %}
