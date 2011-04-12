<?php
 //debug($noticia);
?>

  <div class="article">
      <h2><?php echo $noticia["Noticia"]["title"] ?><hr></h2>
      <?php if($noticia['Noticia']['image']) {
						echo $html->image("/img/noticias/".$noticia['Noticia']['image']);
					} ?>
      <div class="noticia"><?php echo $noticia["Noticia"]["content"] ?></div>

 
<?php echo $this->Html->link("Regresar", array('controller' => 'noticias','action' => 'index')); ?>
<div class="respuesta">
	
	<?php if(count($noticia["Comment"])>0) { ?>
	<h2>Comentarios</h2>
	<ol class="comentarios">
		<?php for($i=0; $i<=count($noticia["Comment"])-1;$i++) { ?>
			<li><b><?php echo $noticia["Comment"][$i]["nombre"]; ?></b> comenta:
			<li><?php echo $noticia["Comment"][$i]["comment"]; ?> 
			<li>Fecha: <?php echo $noticia["Comment"][$i]["created"]; ?>
				<br><br>
		<?php } ?>
	</ol>	
	<?php } ?>
	
	<h2>Dejar un comentario</h2>
	<?php echo $this->Form->create('Comment', array("controller"=>"comments", "action"=>"add"));?>
			<?php
			echo $this->Form->input('noticia_id', array("type"=>"hidden", "value"=>$noticia["Noticia"]["id"]));
			echo $this->Form->input('nombre', array("label"=>"Tu nombre"));
			echo $this->Form->input('correo', array("label"=>"Tu email"));
			echo $this->Form->input('web', array("label"=>"Tu Web (opcional)"));
			echo $this->Form->textarea('comment', array("cols"=>45,"rows"=>8, "label"=>"Comentario"));
			echo $this->Form->input('recibir_comentarios', array("type"=>"checkbox","label"=>"Recibir comentarios de esta noticia"));
			echo $this->Form->input('recibir_email', array("type"=>"checkbox","label"=>"Recibir noticias en tu correo"));
			
		?>
	<?php echo $this->Form->end(__('Publicar comentario', true));?>	
</div> 
 </div>