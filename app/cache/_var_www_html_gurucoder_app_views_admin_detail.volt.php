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
    
<h1>Details</h1>
<?php echo $this->tag->form(array('admin/wijzig')); ?>
    <?php foreach ($afspraak as $af) { ?>
<p>
    <label for="datum">datum</label>
    <?php echo $this->tag->textField(array('datum', 'class' => 'datepicker', 'value' => $af->datum)); ?>
</p>
<p>
    <label for="begintijd">begintijd:</label>
    <?php echo $this->tag->textField(array('begintijd', 'class' => 'timepicker', 'value' => $af->begintijd)); ?>
</p>
<?php echo $this->tag->hiddenField(array('id', 'value' => $af->id)); ?>
   <?php } ?>
<p>
    <label for="behandeling">behandeling</label>
       <div class="input-field col s12 m6">
    <select name="behandeling_id" class="select">
     <option value="" disabled selected> kies een behandeling</option>
        <?php foreach ($behandeling as $b) { ?>
            <option value="<?php echo $b->id; ?>"><?php echo $b->behandeling; ?></option>
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
                <option value="<?php echo $af->id; ?>"><?php echo $af->voornaam; ?></option>
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
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>