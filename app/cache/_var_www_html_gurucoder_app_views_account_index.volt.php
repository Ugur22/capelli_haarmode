<h1>Login</h1>
<?php echo $this->tag->form(array('account/login', 'class' => 'login-form')); ?>
<p>
    <label for="username">username</label>
    <?php echo $this->tag->textField(array('username')); ?>
</p>
<p>
    <label for="password">password:</label>
    <?php echo $this->tag->passwordfield('password'); ?>
</p>
<p>
    <?php echo $this->tag->submitButton(array('login')); ?>
</p>
<?php echo $this->tag->endForm(); ?>