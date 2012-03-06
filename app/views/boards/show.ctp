<h1>掲示板</h1>
<br />
<a href="/boards/index">一覧にもどる</a>
<br /><br />
<table>
  <tr>
    <th>
      投稿者
    </th>
    <td>
      <?= $data[0]['Personal']['name'] ?>
    </td>
  </tr>
  <tr>
    <th>
      タイトル
    </th>
    <td>
      <?= $data[0]['Board']['title'] ?>
    </td>
  </tr>
  <tr>
    <th>
      内容
    </th>
    <td>
      <?= $data[0]['Board']['content'] ?>
    </td>
  </tr>
</table>
<br />
<a href="/boards/edit/$data[0]['Personal']['id']">※この投稿を編集する</a>
