<div class="noticias form">
<?php echo $this->Form->create('Noticia', array("type"=>"file"));?>
	<fieldset>
 		<legend><?php __('Editar Noticia'); ?></legend>
	<?php
		$noticia=$this->data;
		echo $this->Form->input('id');
		echo $this->Form->input('category_id', array("label"=>"Categoriia","options"=>$categories));
		echo $this->Form->input('title', array("label"=>"Titulo"));
		echo $this->Form->input('content',array("label"=>"Contenido"));
		echo $this->Form->input('image', array("type"=>"file", "label"=>"Nueva imagen (opcional)"));
		
		if(!empty($noticia['Noticia']['image'])) {
			echo $html->image("noticias/".$noticia['Noticia']['image']); 
		} else {
			echo "Sin imagen";
		}
			
		echo $this->Form->input('Original.imagen', array("type"=>"hidden", "value"=>$noticia['Noticia']["image"]));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
