<div class="albums form">
<?php echo $this->Form->create('Album');?>
	<fieldset>
 		<legend><?php __('Editar Album'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('user_id');
		echo $this->Form->input('title', array("label"=>"Titulo"));
		echo $this->Form->input('description', array("label"=>"Descripción"));
		echo $this->Form->input('location', array("label"=>"Ubicación"));
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
