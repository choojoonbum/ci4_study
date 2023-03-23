<?php
echo $this->extend('layout/master');
echo $this->section('content');
echo form_open();
echo csrf_field();
?>
<h2 class="form-signin-heading">Please sign in</h2>
<div class="form-group <?php if($validation->hasError('email')) : ?>has-error<?php endif; ?>">
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required" autofocus value="<?= set_value('email') ?>">
    <div class="text-left"><?=$validation->getError('email')?></div>
</div>
<div class="form-group <?php if($validation->hasError('password')) : ?>has-error<?php endif; ?>">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required value="<?= set_value('password') ?>">
    <div class="text-left"><?=$validation->getError('password')?></div>
</div>
<div class="checkbox">
    <label>
        <input type="checkbox" value="remember-me"> Remember me
    </label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

<?= form_close() ?>

<?= $this->endSection() ?>