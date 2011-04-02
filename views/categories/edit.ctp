<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
 		<legend><?php __('Editar Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description',array("label"=>"Categoria"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
