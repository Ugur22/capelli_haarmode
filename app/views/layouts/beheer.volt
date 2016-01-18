<!DOCTYPE html>
<html>
<head>
    <!-- outputs unique title of every page -->
    {{ get_title() }}
    <!-- sets viewport to scale to mobile device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="img/capelli_logo.png"/>
    <!-- outputs CSS files -->
    {{ this.assets.outputCss('header') }}
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <base href="index">
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper"><span class="brand-logo right">Capelli Haarmode</span>
            <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <li><a href="{{ url("admin/overzicht") }}">admin</a></li>
                <li><a href="{{ url("account/signout") }}">Logout</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{ url("admin/overzicht") }}">admin</a></li>
                <li><a href="{{ url("account/signout") }}">Logout</a></li>
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