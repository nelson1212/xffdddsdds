<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Crear usuario'); ?></legend>
	<?php
		echo $this->Form->input('role_id', array("type"=>"hidden","label"=>"Rol"));
		echo $this->Form->input('first_name', array("label"=>"Nombre(s)"));
		echo $this->Form->input('last_name', array("label"=>"Apellido(s)"));
		echo $this->Form->input('email',array("label"=>"Email"));
		echo $this->Form->input('password', array("label"=>"Clave","value"=>$password));
		echo $this->Form->input('password2', array("label"=>"Confirmar clave"));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear', true));?>
</div>
