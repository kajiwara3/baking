<?php var_dump($sales) ?>]
<br />
<?php echo $this->Html->link('もどる', array('action' => 'add')); ?>
  <?php echo $this->Form->create('Sale', array('controller' => 'Sales', 'action' => 'add_commit'));?>

  <?php echo $this->Form->end(__('追加する', true));?>
