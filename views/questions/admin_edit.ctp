<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
 		<legend><?php __('Editar opción'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question',array("label"=>"Opción"));
		echo $this->Form->input('poll_id', array("type"=>"hidden", "value"=>$album));
		
		echo $this->Html->link(__('Regresar', true), array("controller"=>"polls",'action' => 'admin_view', $album));
	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
