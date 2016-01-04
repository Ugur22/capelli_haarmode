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
    
<h1>Over ons</h1>
<section id="overons">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor
        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor
        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor
        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum</p>
</section>
<!--
<ul class="collapsible popout" data-collapsible="accordion">
<?php foreach ($user as $video) { ?>
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_drama</i><a href="video/<?php echo $video->permalink; ?>"><?php echo $video->name; ?></a></div>
            <div class="collapsible-body"><?php echo $video->embedCode; ?></div>
        </li>
<?php } ?>
</ul>
-->

</article>
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>