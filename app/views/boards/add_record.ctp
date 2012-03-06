<h1>
  送信フォームサンプル
</h1>
<?= $form->create(null, array('type' => 'post', 'action' => './addRecord')) ?>
  <?= $form->text('Board.name') ?>
  <?= $form->error('Board.name') ?>

  <?= $form->text('Board.title') ?>
  <?= $form->error('Board.title') ?>

  <?= $form->text('Board.content') ?>
  <?= $form->error('Board.content') ?>

  <?= $form->submit('送信') ?>
<?= $form->end() ?>
