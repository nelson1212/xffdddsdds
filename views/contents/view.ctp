<?php
 //debug($noticia);
?>

  <div class="article">
      <h2><?php echo $content['Content']['title']; ?><hr></h2>
   
      <div class="noticia"><?php echo $content["Content"]["content"] ?></div>

 <br>
<?php echo $this->Html->link("Regresar", array('controller' => 'noticias','action' => 'index')); ?>
 </div>

