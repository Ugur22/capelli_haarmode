<!DOCTYPE html>
<html>
<head>
    <!-- outputs unique title of every page -->
    <?php echo $this->tag->getTitle(); ?>
    <!-- sets viewport to scale to mobile device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="http://www.clicinterieurconcepten.nl/img/morebyme-50x50.jpg"/>
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
                <li><a href="<?php echo $this->url->get('admin/overzicht'); ?>">admin</a></li>
                <li><a href="<?php echo $this->url->get('account/signout'); ?>">Logout</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="<?php echo $this->url->get('admin/overzicht'); ?>">admin</a></li>
                <li><a href="<?php echo $this->url->get('account/signout'); ?>">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<article>
    <!-- outputs the view  -->
    
<h1>Overzicht afspraken</h1>
<div class="header">
</div>
<table class="highlight">
    <thead>
    <tr>
        <th>klant</th>
        <th>datum</th>
        <th class="hide_row">begintijd</th>
        <th class="hide_row">eindtijd</th>
        <th>medewerker</th>
        <th class="hide_row">behandeling</th>
        <th class="hide_row">prijs</th>
        <th>details</th>
        <th>delete</th>
    </tr>
    </thead>
    <?php foreach ($afspraak as $af) { ?>
        <tr>
            <td><?php echo $this->escaper->escapeHtmlAttr($af->klant); ?></td>
            <td><?php echo $this->escaper->escapeHtmlAttr($af->datum); ?></td>
            <td class="hide_row"><?php echo $this->escaper->escapeHtmlAttr($af->begintijd); ?></td>
            <td class="hide_row"><?php echo $this->escaper->escapeHtmlAttr($af->eindtijd); ?></td>
            <td><?php echo $this->escaper->escapeHtmlAttr($af->gebruiker->voornaam); ?></td>
            <td class="hide_row"><?php echo $this->escaper->escapeHtmlAttr($af->behandeling->behandeling); ?></td>
            <td class="hide_row">€<?php echo $this->escaper->escapeHtmlAttr($af->behandeling->prijs); ?></td>
            <td><a href="<?php echo $this->url->get('admin/detail/' . $this->escaper->escapeHtmlAttr($af->id)); ?>"><i class="small material-icons">info</i></a></td>
            <td><a href="<?php echo $this->url->get('admin/verwijder/' . $this->escaper->escapeHtmlAttr($af->id)); ?>"><i class="small material-icons">delete</i></a></td>
        </tr>
    <?php } ?>
</table>

</article>
<!-- outputs JS scripts -->
<?php echo $this->assets->outputJs('footer'); ?>
</body>
</html>