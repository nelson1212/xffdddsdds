<?php $javascript->link('/js/ckeditor/ckeditor', false);?>
<div class="noticias form">
<?php echo $this->Form->create('Noticia');?>
	<fieldset>
 		<legend><?php __('Editar Noticia'); ?></legend>
	<?php
	//debug($this->data);
		echo $this->Form->input('id');
		echo $this->Form->input('category_id', array("label"=>"Categoria"));
		echo $this->Form->input('user_id',array("type"=>"hidden","value"=>$this->Session->read("Auth.User.id")));
		echo $this->Form->input('title', array("maxlength"=>"150","id"=>"titulo", "label"=>"Titulo"));
		echo $this->Form->input('resumen' , array("maxlength"=>"500","label"=>"Resumen", "id"=>"resumen"));
		echo $form->textarea("content", array('class'=>'ckeditor',"label"=>"contenido"));
		echo $this->Form->input('image' , array("type"=>"file","label"=>"Imagen (opcional)"));
		echo $this->Form->input('thumb' , array("type"=>"hidden"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
