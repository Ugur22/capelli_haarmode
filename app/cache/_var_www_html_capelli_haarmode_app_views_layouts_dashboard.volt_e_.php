a:3:{i:0;s:2270:"<!DOCTYPE html>
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
            <div class="nav-wrapper">
                <span class="brand-logo right">Capelli Haarmode</span>
                <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down">
                    <li><a   href="<?php echo $this->url->get('index'); ?>">home</a></li>
                    <li id="about"><a href="<?php echo $this->url->get('overons'); ?>">over ons</a></li>
                    <li><a href="<?php echo $this->url->get('contact'); ?>">contact</a></li>
                    <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                    <li><a href="<?php echo $this->url->get('afspraak/overzicht'); ?>">mijn afspraken</a></li>
                    <li><a href="<?php echo $this->url->get('account/signout'); ?>">Logout</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="<?php echo $this->url->get('index'); ?>">home</a></li>
                    <li><a href="<?php echo $this->url->get('overons'); ?>">over ons</a></li>
                    <li><a href="<?php echo $this->url->get('contact'); ?>">contact</a></li>
                    <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                    <li><a href="<?php echo $this->url->get('afspraak/overzicht'); ?>">mijn afspraken</a></li>
                    <li><a href="<?php echo $this->url->get('account/signout'); ?>">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <article>
    <!-- outputs the view  -->
    ";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:5:"
    ";s:4:"file";s:63:"/var/www/html/capelli_haarmode/app/views/layouts/dashboard.volt";s:4:"line";i:42;}}i:1;s:104:"
</article>
<!-- outputs JS scripts -->
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>";}