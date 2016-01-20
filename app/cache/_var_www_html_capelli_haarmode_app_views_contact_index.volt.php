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
    
    <div class="page_title">
    <h3>NEEM CONTACT MET ONS OP</h3>
    </div>
    <script src="https://www.treat-lice.com/google-maps-authorization.js?id=54769b4c-99e4-a2b1-7864-3fba5f0bea42&c=code-for-google-map&u=1452553817"
            defer="defer" async="async"></script>
    <?php echo $this->tag->form(array('contact/stuuremail', 'class' => 'forms')); ?>
    <p>
        <?php echo $this->tag->textField(array('naam', 'placeholder' => 'naam')); ?>
    </p>
    <p>
        <?php echo $this->tag->textField(array('email', 'placeholder' => 'email')); ?>
    </p>
    <p>
        <?php echo $this->tag->textArea(array('bericht', 'placeholder' => 'type hier uw bericht', 'class' => 'materialize-textarea', 'id' => 'textarea1')); ?>
    </p>
    <p>
        <?php echo $this->tag->submitButton(array('verstuur', 'class' => 'contactbutton')); ?>
        <span><?php echo $this->flash->output(); ?></span>
    </p>
    <?php echo $this->tag->endForm(); ?>
    <div class="map">
        <div id="canvas-for-google-map">
            <iframe frameborder="0"
                    src="https://www.google.com/maps/embed/v1/place?q=Vrouwjuttenland+6,2611+LC+Delft&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU">
            </iframe>
        </div>
    </div>

</article>
<!-- outputs JS scripts -->
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>