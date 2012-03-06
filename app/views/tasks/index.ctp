<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="/js/activity-indicator.js"></script>
<link rel="stylesheet" href="db_ajax.css" type="text/css">
<h2>Tasks</h2>

<?= $form->create('Task', array('default'=>false)) ?>
<?= $form->input('title') ?>
<div id="load">
  <?= $form->submit('Add') ?>
</div>
<?= $form->end() ?>

<ul id="tasks">
  <?php foreach($tasks as $task) { ?>
    <li>
      <?= h($task['Task']['title']); ?>
    </li>
  <?php } ?>
</ul>
<script language="JavaScript">
$(function() {
    $("#TaskIndexForm").submit(function() {
       $('#load').activity();
        $(".submit").hide();
        $.post('/tasks/ajax_add', {
            title: $("#TaskTitle").val()
        }, function(rs) {
            $('#load').activity(false);
            $(".submit").show();
            $("#tasks").prepend(rs);
            $("#TaskTitle").val('').focus();
        });
    });
});
</script>