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
    
    <h1>Login</h1>
    <?php echo $this->tag->form(array('account/login', 'class' => 'login-form')); ?>
    <p>
        <label for="email">email</label>
        <?php echo $this->tag->textField(array('email')); ?>
    </p>
    <p>
        <label for="password">password:</label>
        <?php echo $this->tag->passwordfield('password'); ?>
    </p>
    <p>
        <div class="buttons_login">
        <a href="<?php echo $this->url->get('account/register'); ?>" class="waves-effect waves-light btn">registreer</a>
        <?php echo $this->tag->submitButton(array('login')); ?>
        <input type="hidden" name="<?php echo $this->security->getTokenKey(); ?>" value="<?php echo $this->security->getToken(); ?>">
        </div>
    </p>
    <?php echo $this->tag->endForm(); ?>
    <?php echo $this->flash->output(); ?>

</article>
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>