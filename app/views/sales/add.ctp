<div class="sales form">
  <?php echo $this->Form->create('Sale');?>
  <fieldset>
    <legend>
      <?php __('Add Sale'); ?>
    </legend>
    <?php
      echo $this->Form->input('catalog_id');
      echo $this->Form->input('customer_id');
      echo $this->Form->input('cate');
    ?>
  </fieldset>
  <?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
  <h3>
    <?php __('Actions'); ?>
  </h3>
  <ul>
    <li>
      <?php echo $this->Html->link(__('List Sales', true), array('action' => 'index'));?>
    </li>
    <li>
      <?php echo $this->Html->link(__('List Catalogs', true), array('controller' => 'catalogs', 'action' => 'index')); ?>
    </li>
    <li>
      <?php echo $this->Html->link(__('New Catalog', true), array('controller' => 'catalogs', 'action' => 'add')); ?>
    </li>
    <li>
      <?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?>
    </li>
    <li>
      <?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?>
    </li>
  </ul>
</div>