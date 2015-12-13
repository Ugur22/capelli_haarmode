<h1>Overzicht afspraken</h1>
<a href="<?php echo $this->url->get('afspraak'); ?>" class="waves-effect waves-light btn"><i class="small material-icons">replay</i>maak een nieuwe afspraak</a>
<table class="highlight">
    <thead>
    <tr>
        <th>klant</th>
        <th>datum</th>
        <th>begintijd</th>
        <th>eindtijd</th>
        <th>medewerker</th>
        <th>behandeling</th>
        <th>prijs</th>
        <th>wijzig</th>
        <th>delete</th>
    </tr>
    </thead>
    <?php foreach ($afspraak as $af) { ?>
        <tr>
            <td>Erik Van Dijk</td>
            <td><?php echo $af->datum; ?></td>
            <td><?php echo $af->begintijd; ?></td>
            <td><?php echo $af->begintijd; ?></td>
            <td><?php echo $af->gebruiker->voornaam; ?></td>
            <td><?php echo $af->behandeling->behandeling; ?></td>
            <td><?php echo $af->behandeling->prijs; ?></td>
            <td><a href="<?php echo $this->url->get('user'); ?>"><i class="small material-icons">settings</i></a></td>
            <td><a href="<?php echo $this->url->get('user'); ?>"><i class="small material-icons">delete</i></a></td>
        </tr>
    <?php } ?>
</table>

