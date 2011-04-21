<div class="albums index">
	<h2><?php __('Albums');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('Creador');?></th>
			<th><?php echo $this->Paginator->sort('Titulo');?></th>
			<th><?php echo $this->Paginator->sort('Descripción');?></th>
			<th><?php echo $this->Paginator->sort('Ubicación');?></th>
			<th><?php echo $this->Paginator->sort('Creado');?></th>
			<th><?php echo $this->Paginator->sort('Acciones');?></th>
			
	</tr>
	<?php
	$i = 0;
	//debug($albums);
	foreach ($albums as $album):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	
		<td><?php echo $album['Album']['user_id']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['title']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['description']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['location']; ?>&nbsp;</td>
		
		<td><?php echo $album['Album']['created']; ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Agregar fotos', true), array('controller'=>"Photos",'action' => 'add', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Ver fotos', true), array('controller'=>'Photos','action' => 'index', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'admin_delete', $album['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['Album']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
