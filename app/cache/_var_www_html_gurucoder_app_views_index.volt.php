<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="http://www.clicinterieurconcepten.nl/img/morebyme-50x50.jpg"/>
    <?= $this->assets->outputCss('header') ?>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <title>Capelli Haarmode</title>
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
                <li id="about"><a href="<?php echo $this->url->get('user'); ?>">over ons</a>
                </li>
                <li><a href="<?php echo $this->url->get('user'); ?>">contact</a></li>
                <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                <li><a href="<?php echo $this->url->get('afspraak/overzicht'); ?>">admin</a></li>
                <li><a href="<?php echo $this->url->get('user'); ?>">Login</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="<?php echo $this->url->get('index'); ?>">home</a></li>
                <li><a href="<?php echo $this->url->get('user'); ?>">over ons</a></li>
                <li><a href="<?php echo $this->url->get('user'); ?>">contact</a></li>
                <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                <li><a href="<?php echo $this->url->get('afspraak/overzicht'); ?>">admin</a></li>
                <li><a href="<?php echo $this->url->get('user'); ?>">Login</a></li>
            </ul>
        </div>
    </nav>
</div>
<article>
    <?php echo $this->getContent(); ?>
</article>
<?php $this->assets->outputJs('footer') ?>
</body>
</html>