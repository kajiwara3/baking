<h1>編集フォーム</h1>
<br />
<a href="/boards/index">一覧にもどる</a>
<br /><br />
<?= $form->create(null, array('type' => 'post', 'action' => '')) ?>
  <?= $form->hidden('Board.id'); ?>
  <?= $form->hidden('Board.personal_id'); ?>
  <?= $form->hidden('Personal.id'); ?>
  <?= $form->hidden('Personal.name'); ?>

  名前：<?= $data['Personal']['name'] ?>
  <br /><br />
  パスワード：<?= $form->password('Personal.password') ?>
  <?= $form->error('Personal.password') ?>
  タイトル：<?= $form->text('Board.title') ?>
  <?= $form->error('Board.title') ?>
  内容：<?= $form->textarea('Board.content') ?>
  <?= $form->error('Board.content') ?>
<?= $form->end('送信') ?>
<br />