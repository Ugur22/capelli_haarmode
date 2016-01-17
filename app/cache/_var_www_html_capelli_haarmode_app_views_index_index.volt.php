<!DOCTYPE html>
<html>
<head>
    <?php echo $this->tag->getTitle(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="http://www.clicinterieurconcepten.nl/img/morebyme-50x50.jpg"/>
    <?php echo $this->assets->outputCss('header'); ?>
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
<!--<h1><?php echo $this->dispatcher->getActionName(); ?></h1>-->
<article>
    
<section id="#home">
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
<section id="producten">
    <article>
        <h1>Producten</h1>
    </article>
</section >
<section id="behandeling">
    <article>
        <h1>behandelingen</h1>
    </article>
</section >

</article>
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>