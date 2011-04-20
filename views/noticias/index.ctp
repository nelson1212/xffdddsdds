	<?php
	$i = 0;
	//debug($noticias);
	foreach ($noticias as $noticia):
		
	?>
	<div class="articles"> 
        <h2><?php echo $noticia['Noticia']['title']; ?></h2>
        <?php if($noticia['Noticia']['thumb']) 
        { 
        	echo $html->image("/img/noticias/".$noticia['Noticia']['thumb'], array("class"=>"alinear"));
        } ?> 
        <p><?php echo $noticia['Noticia']['resumen']; ?></p>
 		<div class="clr"></div>
	        <p class="comentarios"><a href="#" class="com fr">Comentarios (<?php echo count($noticia["Comment"]); ?>)</a>
	        <div class="leer_mas"><?php echo $this->Html->link("Leer mas", array('controller' => 'noticias','action' => 'leerMas', $noticia['Noticia']['id'])); ?></div> 
     <div class="clr"> </div> 
    
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

