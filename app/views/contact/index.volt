{% extends "layouts/base.volt" %}
{% block content %}
    <h1>Contact</h1>
    <ul class="contact">
        <li>Capelli Haarmode</li>
        <li> Adres: Vrouwjuttenland 6</li>
        <li>Postcode: 2611 LC DELFT</li>
        <li>tel: 015 2136747</li>
    </ul>
    <div class="map">
        <div id="canvas-for-google-map">
            <iframe frameborder="0"
                    src="https://www.google.com/maps/embed/v1/place?q=Vrouwjuttenland+6,2611+LC+Delft&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU">
            </iframe>
        </div>
    </div>
    <script src="https://www.treat-lice.com/google-maps-authorization.js?id=54769b4c-99e4-a2b1-7864-3fba5f0bea42&c=code-for-google-map&u=1452553817"
            defer="defer" async="async"></script>
    {{ form('contact/stuuremail') }}
    <p>
        {{  text_field("naam","placeholder":"naam") }}
    </p>
    <p>
        {{  text_field("email","placeholder":"email") }}
    </p>
    <p>
        {{  text_area("bericht","placeholder":"type hier uw bericht", "class":"materialize-textarea", "id":"textarea1") }}
    </p>
    <p>
        {{ submit_button('verstuur', "class":"contactbutton") }}
        <span>{{ flash.output() }}</span>
    </p>
    {{ end_form() }}
{% endblock %}