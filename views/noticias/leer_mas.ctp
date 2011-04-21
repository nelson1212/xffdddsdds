<?php
 //debug($noticia);
?>

<div id="content">
      <h2><?php echo $noticia["Noticia"]["title"] ?></h2>
     	 <?php if($noticia['Noticia']['image']) {
						echo $html->image("/img/noticias/".$noticia['Noticia']['image'], array("class"=>"img_a"));
					} ?>
      <?php echo $noticia["Noticia"]["content"] ?>
      
      <div id="comments">
        <h2>Commentarios</h2>
        <ul class="commentlist">
        	
        	<?php $z=0;  for($i=0; $i<=count($noticia["Comment"])-1;$i++) 
        	{ ?>
			<li class='<?php if($z==0){ echo "comment_odd"; $z=1;}else  {echo "comment_even"; $z=0;} ?>'><b><?php echo $noticia["Comment"][$i]["nombre"]; ?></b> comenta:
				<p><?php echo $noticia["Comment"][$i]["comment"]; ?> </p>
				<div class="submitdate">Fecha: <?php echo $noticia["Comment"][$i]["created"]; ?></div>
			</li>
		
          <?php } ?>
          
          
          
        </ul>
      </div>
      <br class="clear">
      
      
      <h2>Write A Comment</h2>
      <div id="respond">
        <form method="post" action="#">
          <p>
           <?php echo $this->Form->input('nombre', array("label"=>"Tu nombre")); ?>
            
          </p>
          <p>
            <?php echo $this->Form->input('correo', array("label"=>"Tu email")); ?>
            
          </p>
          
          <p>
            <?php echo $this->Form->input('correo', array("label"=>"Tu email")); ?>
           
          </p>
          <p>
            <textarea rows="10" cols="100%" id="comment" name="comment"></textarea>
            <label style="display:none;" for="comment"><small>Comment (required)</small></label>
          </p>
          <p>
            <input type="submit" value="Submit Form" id="submit" name="submit">
            &nbsp;
            <input type="reset" value="Reset Form" tabindex="5" id="reset" name="reset">
          </p>
        </form>
      </div>
    </div>
    
<!-- 
  <div class="article">
      <h2><?php echo $noticia["Noticia"]["title"] ?></h2>
      <div class="fotos_article">
      <?php if($noticia['Noticia']['image']) {
						echo $html->image("/img/noticias/".$noticia['Noticia']['image']);
					} ?>
	
      <p><?php echo $noticia["Noticia"]["content"] ?></p>
      </div>

 
<?php echo $this->Html->link("Regresar", array('controller' => 'noticias','action' => 'index')); ?>
<div class="respuesta">
	
	<?php if(count($noticia["Comment"])>0) { ?>
		<br>
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
 
-->