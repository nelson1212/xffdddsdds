<div class="news form">
<?php echo $this->Form->create('News');?>
	<fieldset>
 		<legend><?php __('Agregar noticia'); ?></legend>
	<?php
		echo $this->Form->input('category_id',array('label'=>'Categoria', "options"=>$categories));
		echo $this->Form->input('user_id', array('value'=>$userId, "type"=>"hidden"));
		echo $this->Form->input('title', array('label'=>'Titulo'));
		echo $this->Form->input('content', array('label'=>'Contenido'));
		echo $this->Form->input('image', array("label"=>"Imagen","type"=>"file"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
