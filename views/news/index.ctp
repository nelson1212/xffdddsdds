<div class="news index">
	<h2><?php __('Noticias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort("Categoria",'category_id');?></th>
			<th><?php echo $this->Paginator->sort("Usuario",'user_id');?></th>
			<th><?php echo $this->Paginator->sort("Titulo",'title');?></th>
			<th><?php echo $this->Paginator->sort("Creado",'created');?></th>
			<th><?php echo $this->Paginator->sort("Modificado", 'modified');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	//debug($news);
	foreach ($news as $news):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td>
			<?php echo $this->Html->link($news['Category']['description'], array('controller' => 'categories', 'action' => 'view', $news['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($news['User']['email'], array('controller' => 'users', 'action' => 'view', $news['User']['id'])); ?>
		</td>
		<td><?php echo $news['News']['title']; ?>&nbsp;</td>

		<td><?php echo $news['News']['created']; ?>&nbsp;</td>
		<td><?php echo $news['News']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $news['News']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $news['News']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $news['News']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['id'])); ?>
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
