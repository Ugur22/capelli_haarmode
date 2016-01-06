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
                <li><a href="<?php echo $this->url->get('afspraak'); ?>">afspraak maken</a></li>
                <li><a href="<?php echo $this->url->get('afspraak/overzicht'); ?>">mijn afspraken</a></li>
                <li><a href="<?php echo $this->url->get('index/signout'); ?>">Logout</a></li>
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
<!--<h1><?php echo $this->dispatcher->getActionName(); ?></h1>-->
<article>
    
<h1>Mijn afspraken</h1>
    <div class="header">
        <a href="<?php echo $this->url->get('afspraak'); ?>" class="waves-effect waves-light btn"><i class="small material-icons">replay</i>maak
            een nieuwe afspraak</a>
    </div>
    <table class="highlight">
        <thead>
        <tr>
            <th>datum</th>
            <th>begintijd</th>
            <th>eindtijd</th>
            <th class="hide_row">medewerker</th>
            <th class="hide_row">behandeling</th>
            <th class="hide_row">prijs</th>
        </tr>
        </thead>
        <?php foreach ($afspraak as $af) { ?>
            <tr>
                <td><?php echo $this->escaper->escapeHtmlAttr($af->datum); ?></td>
                <td><?php echo $this->escaper->escapeHtmlAttr($af->begintijd); ?></td>
                <td><?php echo $this->escaper->escapeHtmlAttr($af->eindtijd); ?></td>
                <td class="hide_row"><?php echo $this->escaper->escapeHtmlAttr($af->gebruiker->voornaam); ?></td>
                <td class="hide_row"><?php echo $this->escaper->escapeHtmlAttr($af->behandeling->behandeling); ?></td>
                <td class="hide_row">€<?php echo $this->escaper->escapeHtmlAttr($af->behandeling->prijs); ?></td>
            </tr>
        <?php } ?>
    </table>

</article>
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>