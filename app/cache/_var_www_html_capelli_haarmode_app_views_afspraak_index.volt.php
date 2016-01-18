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
    
    <div class="page_title">
<h1>Maak een afspraak</h1>
    </div>
<?php echo $this->tag->form(array('afspraak/toevoegen')); ?>
<p>
    <label for="datum">datum</label>
    <?php echo $this->tag->textField(array('datum', 'class' => 'datepicker', 'placeholder' => 'klik hier om een datum te kiezen')); ?>
</p>
<p>
    <label for="begintijd">begintijd:</label>
    <?php echo $this->tag->textField(array('begintijd', 'class' => 'timepicker', 'placeholder' => 'klik hier om een tijd te kiezen')); ?>
</p>
<p>
    <label for="behandeling">behandeling</label>
       <div class="input-field col s12 m6">
    <select name="behandeling_id" class="select">
     <option value="" disabled selected> kies een behandeling</option>
        <?php foreach ($behandeling as $b) { ?>
            <option value="<?php echo $b->id; ?>"><?php echo $this->escaper->escapeHtml(Phalcon\Text::upper($b->behandeling)); ?> <span> - €<?php echo $b->prijs; ?></span></option>
        <?php } ?>
    </select>
    </div>
</p>
<p>
    <label for="medewerker">medewerker</label>
     <div class="input-field col s12 m6">
    <select name="gebruiker_id" class="select">
     <option value="" disabled selected> kies een medewerker</option>
        <?php foreach ($gebruiker as $af) { ?>
            <?php if ($af->rol == 'admin') { ?>
                <option value="<?php echo $af->id; ?>"><?php echo $this->escaper->escapeHtml(Phalcon\Text::upper($af->voornaam)); ?></option>
            <?php } ?>
        <?php } ?>
    </select>
    </div>
</p>
<p>
    <?php echo $this->tag->submitButton(array('bevestig')); ?>
<span><?php echo $this->flash->output(); ?></span>
</p>
<?php echo $this->tag->endForm(); ?>
    
</article>
<!-- outputs JS scripts -->
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>