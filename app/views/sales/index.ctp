<div class="sales index">
	<h2><?php __('Sales');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('catalog_id');?></th>
			<th><?php echo $this->Paginator->sort('customer_id');?></th>
			<th><?php echo $this->Paginator->sort('cate');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sales as $sale):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $sale['Sale']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sale['Catalog']['name'], array('controller' => 'catalogs', 'action' => 'view', $sale['Catalog']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sale['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $sale['Customer']['id'])); ?>
		</td>
		<td><?php echo $sale['Sale']['cate']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $sale['Sale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $sale['Sale']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $sale['Sale']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sale['Sale']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sale', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Catalogs', true), array('controller' => 'catalogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog', true), array('controller' => 'catalogs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>