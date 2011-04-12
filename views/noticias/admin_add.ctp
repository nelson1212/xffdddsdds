<div class="noticias form">
<?php echo $this->Form->create('Noticia', array("type"=>"file"));?>
	<fieldset>
 		<legend><?php __('Agregar nueva noticia'); ?></legend>
	<?php
		echo $this->Form->input('category_id', array("label"=>"Categoria"));
		echo $this->Form->input('user_id',  array('value'=>$userId, "type"=>"hidden"));
		echo $this->Form->input('title', array("maxlength"=>"150","id"=>"titulo", "label"=>"Titulo"));
		echo $this->Form->input('resumen' , array("maxlength"=>"500","label"=>"Resumen", "id"=>"resumen"));
		echo $this->Form->input('content' , array("label"=>"Contenido"));
		echo $this->Form->input('image' , array("type"=>"file","label"=>"Imagen (opcional)"));
		echo $this->Form->input('thumb' , array("type"=>"hidden"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
