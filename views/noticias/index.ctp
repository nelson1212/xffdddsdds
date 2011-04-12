<div class="noticias index">
	<?php
	$i = 0;
	foreach ($noticias as $noticia):
		
	?>
		<div class="article">
			<h2><span><?php echo $noticia['Noticia']['title']; ?></span></h2>
			<p class="post-data">Publicada: <span class="date"><?php echo $noticia['Noticia']['created']; ?></span> &nbsp;|&nbsp; Por: <?php echo $noticia['User']['email']; ?></p>
            <div class="clr"></div>
            
			<div align="justify">
				<div>
					<?php if($noticia['Noticia']['thumb']) {
						echo $html->image("/img/noticias/".$noticia['Noticia']['thumb']);
					} ?>
				</div>
			
			<p><?php echo $noticia['Noticia']['resumen']; ?></p></div>	
	        <p class="spec"><a href="#" class="com fr">Comentarios (3)</a>
	        <?php echo $this->Html->link("Leer mas", array('controller' => 'noticias','action' => 'leerMas', $noticia['Noticia']['id'])); ?> 
           <div class="clr"></div>
	</div>

<?php endforeach; ?>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<span>
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
