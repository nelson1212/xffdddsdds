<div class="contents index">
	<h2><?php __('Contenidos del sitio');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<!-- ><th><?php echo $this->Paginator->sort('user_id');?></th> -->
			<th><?php echo $this->Paginator->sort("Titulo",'title');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($contents as $content):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		
		<!--  <td>
			<?php echo $this->Html->link($content['User']['id'], array('controller' => 'users', 'action' => 'view', $content['User']['id'])); ?>
		</td> -->
		<td><?php echo $content['Content']['title']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $content['Content']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $content['Content']['id'])); ?>
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
