<h1>Maak een afspraak</h1>
<?php echo $this->tag->form(array('afspraak/toevoegen')); ?>
<p>
    <label for="datum">datum</label>
    <?php echo $this->tag->textField(array('datum', 'class' => 'datepicker')); ?>
</p>
<p>
    <label for="begintijd">begintijd:</label>
    <?php echo $this->tag->textField(array('begintijd', 'class' => 'timepicker')); ?>
</p>
<p>
    <label for="behandeling">behandeling</label>
    <select name="behandeling_id" class="select">
        <?php foreach ($behandeling as $b) { ?>
            <option value="<?php echo $b->id; ?>"><?php echo $b->behandeling; ?></option>
        <?php } ?>
    </select>
</p>
<p>
    <label for="medewerker">medewerker</label>
    <select name="gebruiker_id" class="select">
        <?php foreach ($gebruiker as $af) { ?>
            <?php if ($af->role == 1) { ?>
                <option value="<?php echo $af->id; ?>"><?php echo $af->voornaam; ?></option>
            <?php } ?>
        <?php } ?>
    </select>
</p>
<p>
    <?php echo $this->tag->submitButton(array('bevestig')); ?>
</p>
</form>