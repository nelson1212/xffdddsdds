<div class="noticias index">
	<h2><?php __('Noticias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($noticias as $noticia):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $noticia['Noticia']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($noticia['Category']['id'], array('controller' => 'categories', 'action' => 'view', $noticia['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($noticia['User']['id'], array('controller' => 'users', 'action' => 'view', $noticia['User']['id'])); ?>
		</td>
		<td><?php echo $noticia['Noticia']['title']; ?>&nbsp;</td>
		<td><?php echo $noticia['Noticia']['content']; ?>&nbsp;</td>
		<td><?php echo $noticia['Noticia']['image']; ?>&nbsp;</td>
		<td><?php echo $noticia['Noticia']['created']; ?>&nbsp;</td>
		<td><?php echo $noticia['Noticia']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $noticia['Noticia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $noticia['Noticia']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $noticia['Noticia']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $noticia['Noticia']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Noticia', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments', true), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>