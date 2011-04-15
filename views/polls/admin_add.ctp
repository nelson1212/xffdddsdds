<div class="polls form">
<?php echo $this->Form->create('Poll');?>
	<fieldset>
 		<legend><?php __('Crear encuesta'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array("type"=>"hidden","value"=>$this->Session->read("Auth.User.id")));
		echo $this->Form->input('question', array('label'=>"Pregunta"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
