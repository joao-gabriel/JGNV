
<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('User', array('class' => 'form-signin')); ?>

<h2 class="form-signin-heading">Please sign in</h2>

<?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Username')); ?>
<?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Password')); ?>
<?php echo $this->Form->submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block', 'title' => 'Sign in')); ?>
<?php echo $this->Form->end(); ?>