<div class="polls form">
<?php echo $this->Form->create('Poll');?>
	<fieldset>
 		<legend><?php __('Add Poll'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('question', array('label'=>"Contenido de la encuesta"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
