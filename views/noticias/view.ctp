<div class="noticias view">
<h2><?php  __('Noticia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($noticia['Category']['description'], array('controller' => 'categories', 'action' => 'view', $noticia['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($noticia['User']['email'], array('controller' => 'users', 'action' => 'view', $noticia['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contenido'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Imagen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		
			<?php //echo "img/fotos/noticias/".$noticia['Noticia']['image'];
			if(!empty($noticia['Noticia']['image'])) {
				$directorio = WWW_ROOT."img/noticias/";
			    $directorio = str_replace("\\", "/", $directorio);
				list($width, $height, $type, $attr) = getimagesize($directorio.$noticia['Noticia']['image']);
				if($height>$width){
					echo $html->image("noticias/".$noticia['Noticia']['image'], array("width"=>"120","height"=>"190")); 
				}else {
					echo $html->image("noticias/".$noticia['Noticia']['image'], array("width"=>"190","height"=>"120")); 
				}
					
			}else{
				echo "Sin imagen";
			}
			?>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modificada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $noticia['Noticia']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
