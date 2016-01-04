a:3:{i:0;s:1507:"<!DOCTYPE html>
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
                <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                <li><a href="<?php echo $this->url->get('admin/overzicht'); ?>">admin</a></li>
                <li><a href="<?php echo $this->url->get('index/signout'); ?>">Logout</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                <li><a href="<?php echo $this->url->get('admin/overzicht'); ?>">admin</a></li>
                <li><a href="<?php echo $this->url->get('account/signout'); ?>">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<!--<h1><?php echo $this->dispatcher->getActionName(); ?></h1>-->
<article>
    ";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:5:"
    ";s:4:"file";s:56:"/var/www/html/gurucoder/app/views/layouts/dashboard.volt";s:4:"line";i:33;}}i:1;s:76:"
</article>
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>";}