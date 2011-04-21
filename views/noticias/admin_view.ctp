<div class="noticias view">
<h2><?php  __('Noticia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($noticia['Category']['description'], array('controller' => 'categories', 'action' => 'view', $noticia['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creador'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($noticia['User']['email'], array('controller' => 'users', 'action' => 'view', $noticia['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Noticia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<div align="justify"><?php echo $noticia['Noticia']['content']; ?></div>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Imagen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			if(!empty($noticia['Noticia']['image'])){
				//echo $noticia['Noticia']['image']; 
				echo $html->image("noticias/".$noticia['Noticia']['image']);
			} else {
			 	echo "No tiene imagen";
			}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['created']; ?>
			&nbsp;
		</dd>
		
	</dl>
	<br>
	<?php 
		if(count($noticia["Comment"])>0){
			
	?>
	<h3>Comentarios</h3>
	<hr>
		<?php 
		//debug($noticia);
		for($i=0; $i<=count($noticia["Comment"])-1; $i++){
			echo "<br>";
			echo "<b>".$noticia["Comment"][$i]["nombre"]."</b> dice:";
			echo "<br>";
			echo "<br>";
			echo "<p align='justify'>".$noticia["Comment"][$i]["comment"]."</p>";
			echo "<br>";
			echo "<b>Fecha </b>".$noticia["Comment"][$i]["created"];
			echo "<br>";
			echo "<br>";
			
			echo $this->Html->link(__('Borrar comentario', true), array('action' => 'admin_delete', "controller"=>"Comments", $noticia['Comment'][$i]['id'], $noticia["Noticia"]["id"]), null, sprintf(__('Estas seguro ?', true), $noticia['Comment'][$i]['id']));
			echo "<br>";
			echo "<br>";
			echo "<hr>";
		}
		}
		?>
		
</div>




