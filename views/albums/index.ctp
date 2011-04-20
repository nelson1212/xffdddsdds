<div class="albums index">
	<h2><?php __('Galeria de imagenes');?></h2>
	<table border="1" width="100%">
		<thead>
	<tr>
			<th><?php echo 'Titulo'; ?></th>
			<th><?php echo 'Descripción'; ?></th>
			<th><?php echo 'Ubicación'; ?></th>
			<th><?php echo 'Fecha creación'; ?></th>
			<th><?php echo 'Acciones'; ?></th>
			
	</tr>
	</thead>
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
	
		
		<td><?php echo $album['Album']['title']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['description']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['location']; ?>&nbsp;</td>
		
		<td><?php echo $album['Album']['created']; ?>&nbsp;</td>
	
		<td class="actions">
			<?php echo $this->Html->link(__('Ver fotos', true), array('controller'=>'Photos','action' => 'index', $album['Album']['id'])); ?>
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
