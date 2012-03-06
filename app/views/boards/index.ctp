<h1>
  掲示板
</h1>
<br />
<a href="/boards/add">※ 投稿する</a>
<br />
<br />
<?= $paginator->first('<<', array()) ?>
| <?= $paginator->prev('<', array()) ?>
| <?= $paginator->numbers(
    array('before' => $paginator->hasPrev() ? $paginator->first('<<') . '.' : '',
          'after' => $paginator->hasNext() ? '.' . $paginator->last('>>') : '',
          'modulus' => 4,
          'separator' => '.')
 )?>
| <?= $paginator->next('>', array()) ?>
| <?= $paginator->last('>>', array()) ?>
<table>
  <tr>
    <th>
      <?= $paginator->sort('投稿順', 'id') ?>
    </th>
    <th>
      <?= $paginator->sort('タイトル', 'title') ?>
    </th>
    <th>
      <?= $paginator->sort('内容', 'content') ?>
    </th>
  </tr>
  <?php foreach($data as $record): ?>
    <?= $html->tableCells($record['Board'],
                          array('style' => 'color:#000099; background-color:#ddddff'),
                          array('style' => 'color:#006600; background-color:#ddffdd'),
                          false
                          )?>
  <?php endforeach; ?>
</table>
