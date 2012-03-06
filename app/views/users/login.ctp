<?php echo ($session->check('Message.auth')) ? $session->flash('auth') : ''; ?>
<?= $form->create('User', array('action' => 'login')) ?>
  <?= $form->input('username') ?>
  <?= $form->input('password') ?>
<?= $form->end('Login') ?>
