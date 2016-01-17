<!DOCTYPE html>
<html>
<head>
    <!-- outputs unique title of every page -->
    {{ get_title() }}
    <!-- sets viewport to scale to mobile device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="http://www.clicinterieurconcepten.nl/img/morebyme-50x50.jpg"/>
    <!-- outputs CSS files -->
    {{ this.assets.outputCss('header')  }}
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <base href="index">
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <span class="brand-logo right">Capelli Haarmode</span>
            <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <li><a   href="{{ url("index") }}">home</a></li>
                <li id="about"><a href="{{ url("overons") }}">over ons</a></li>
                <li><a href="{{ url("contact") }}">contact</a></li>
                <li><a href="{{ url("account") }}">Login</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{ url("index") }}">home</a></li>
                <li><a href="{{ url("overons") }}">over ons</a></li>
                <li><a href="{{ url("contact") }}">contact</a></li>
                <li><a href="{{ url("account") }}">Login</a></li>
            </ul>
        </div>
    </nav>
</div>
<article>
    <!-- outputs the view  -->
    {% block content %}
    {% endblock %}
</article>
<!-- outputs JS scripts -->
{{ this.assets.outputJs('footer') }}
</body>
</html>