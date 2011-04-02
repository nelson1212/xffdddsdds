<div class="noticias index">
	<h2><?php __('Noticias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort("Titulo",'title');?></th>
			<th><?php echo $this->Paginator->sort("Categoria",'category_id');?></th>
			<th><?php echo $this->Paginator->sort("Usuario",'user_id');?></th>
			<th><?php echo $this->Paginator->sort("Creada",'created');?></th>
			<th><?php echo $this->Paginator->sort("Modificada",'modified');?></th>
			<th class="actions"><?php __('Acciones');?></th>
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
		<td><?php echo $noticia['Noticia']['title']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($noticia['Category']['description'], array('controller' => 'categories', 'action' => 'view', $noticia['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($noticia['User']['email'], array('controller' => 'users', 'action' => 'view', $noticia['User']['id'])); ?>
		</td>
		
		<td><?php echo $noticia['Noticia']['created']; ?>&nbsp;</td>
		<td><?php echo $noticia['Noticia']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $noticia['Noticia']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $noticia['Noticia']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $noticia['Noticia']['id']), null, sprintf(__('Estas seguro # %s?', true), $noticia['Noticia']['id'])); ?>
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
