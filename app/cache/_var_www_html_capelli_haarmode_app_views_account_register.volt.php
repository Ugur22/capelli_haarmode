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
        <h1>registreer
        </h1>
    </div>
    <?php echo $this->tag->form(array('account/createAccount', 'class' => 'login-form')); ?>
    <div class="input-field col s6">
        <label for="email">email</label>
        <?php echo $this->tag->textField(array('email', 'value' => $this->request->getPost('email'))); ?>
    </div>
    <div class="input-field col s6">
        <label for="username">username</label>
        <?php echo $this->tag->textField(array('username', 'value' => $this->request->getPost('username'))); ?>
    </div>
    <div class="input-field col s6">
        <label for="password">password:</label>
        <?php echo $this->tag->passwordfield('password'); ?>
    </div>
    <div class="input-field col s6">
        <label for="confirm_password">herhaal password:</label>
        <?php echo $this->tag->passwordfield('confirm_password'); ?>
    </div>
    <div class="input-field col s6">
        <label for="voornaam">voornaam</label>
        <?php echo $this->tag->textField(array('voornaam', 'value' => $this->request->getPost('voornaam'))); ?>
    </div>
    <div class="input-field col s6">
        <label for="tussenvoegsel">tussenvoegsel</label>
        <?php echo $this->tag->textField(array('tussenvoegsel', 'value' => $this->request->getPost('tussenvoegsel'))); ?>
    </div>
    <div class="input-field col s6">
        <label for="achternaam">achternaam</label>
        <?php echo $this->tag->textField(array('achternaam', 'value' => $this->request->getPost('achternaam'))); ?>
    </div>
    <div class="input-field col s6">
        <label for="telefoonnummer">telefoonnummer</label>
        <?php echo $this->tag->textField(array('telefoonnummer', 'value' => $this->request->getPost('telefoonnummer'))); ?>
    </div>
    <span class="submit"><?php echo $this->tag->submitButton(array('maak account')); ?></span>
    <input type="hidden" name="<?php echo $this->security->getTokenKey(); ?>" value="<?php echo $this->security->getToken(); ?>">
    <?php echo $this->tag->endForm(); ?>
    <?php echo $this->flash->output(); ?>

</article>
<!-- outputs JS scripts -->
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>