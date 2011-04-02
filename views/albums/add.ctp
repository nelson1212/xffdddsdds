<div class="albums form">
<?php echo $this->Form->create('Album', array("type"=>"file"));?>
	<fieldset>
 		<legend><?php __('Crear album de fotos'); ?></legend>
	<?php
		echo $this->Form->input('nombre', array('label'=>'Titulo'));
		echo $this->Form->input('description', array('label'=>'Descripción'));
		echo $this->Form->input('location', array('label'=>'Localización ej: Quibdó, Calí, Mi casa, etc'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
