<h1>投稿フォーム</h1>
<br />
<a href="/boards/index">一覧にもどる</a>
<br /><br />
<?= $form->create(null, array('type' => 'post', 'action' => '')) ?>
  名前：<?= $form->text('Personal.name') ?><br />
  <?= $form->error('Personal.name') ?><br />
  パスワード：<?= $form->password('Personal.password') ?><br />
  <?= $form->error('Personal.password') ?><br />
  内容：<?= $form->textarea('Board.content') ?><br />
  <?= $form->error('Personal.content') ?><br />
<?= $form->end('送信') ?>
<br /><br />
