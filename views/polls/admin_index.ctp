<div class="polls index">
	<h2><?php __('Encuestas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		
			<th><?php //echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort("Creador", 'user_id');?></th>
			<th><?php echo $this->Paginator->sort("Pregunta",'question');?></th>
			<th><?php echo $this->Paginator->sort("Fecha creación",'created');?></th>
			<th><?php //echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	//debug($polls);
	foreach ($polls as $poll):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php //echo $poll['Poll']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($poll['User']['email'], array('controller' => 'users', 'action' => 'view', $poll['User']['id'])); ?>
		</td>
		<td><?php echo $poll['Poll']['question']; ?>&nbsp;</td>
		<td><?php echo $poll['Poll']['created']; ?>&nbsp;</td>
		<td><?php //echo $poll['Poll']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver opciones', true), array('action' => 'view', $poll['Poll']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $poll['Poll']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $poll['Poll']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $poll['Poll']['id'])); ?>
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
