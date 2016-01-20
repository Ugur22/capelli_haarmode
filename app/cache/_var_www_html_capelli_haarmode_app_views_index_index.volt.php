<!DOCTYPE html>
<html>
<head>
    <!-- outputs unique title of every page -->
    <?php echo $this->tag->getTitle(); ?>
    <!-- sets viewport to scale to mobile device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="img/capelli_logo.png"/>
    <!-- outputs CSS files -->
    <?php echo $this->assets->outputCss('header'); ?>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <base href="index">
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper"><span class="brand-logo right">Capelli Haarmode</span>
            <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <li><a   href="<?php echo $this->url->get('index'); ?>">home</a></li>
                <li id="about"><a href="<?php echo $this->url->get('overons'); ?>">over ons</a></li>
                <li><a href="<?php echo $this->url->get('contact'); ?>">contact</a></li>
                <li><a href="<?php echo $this->url->get('account'); ?>">Login</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="<?php echo $this->url->get('index'); ?>">home</a></li>
                <li><a href="<?php echo $this->url->get('overons'); ?>">over ons</a></li>
                <li><a href="<?php echo $this->url->get('contact'); ?>">contact</a></li>
                <li><a href="<?php echo $this->url->get('account'); ?>">Login</a></li>
            </ul>
        </div>
    </nav>
</div>
<article>
    <!-- outputs the view  -->
    
    <section id="home">
        <section class="parallax-container">
            <article>
                <div class="header">
                    <h1>Knippen zonder wachten!</h1>
                    <a href="<?php echo $this->url->get('afspraak'); ?>" class="waves-effect waves-light btn">maak afspraak</a>
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
                    <?php foreach ($product as $p) { ?>
                        <li class="col s12 m7">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title"><?php echo $p->naam; ?></span>
                                    <p><?php echo $p->beschrijving; ?></p>
                                    <div class="card-image">
                                        <img src="img/<?php echo $p->img; ?>">
                                    </div>
                                </div>
                                <div class="card-action">
                                </div>
                            </div>
                        </li>
                    <?php } ?>
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
                <?php foreach ($behandeling as $b) { ?>
                    <li>
                        <span class="card-title"><?php echo $b->behandeling; ?> &euro;<?php echo $b->prijs; ?></span></li>
                <?php } ?>
                <h3>Dinsdag tot en met Donderdag:</h3>
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

</article>
<!-- outputs JS scripts -->
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>