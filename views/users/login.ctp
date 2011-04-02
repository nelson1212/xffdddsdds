
<?php
	echo $session->flash('auth');
	
	?>
	<div class="login">
	<fieldset>
		<legend>Iniciar sesión</legend>
	<?php
	   echo $form->create("User", array("action"=>"login"));
		echo $form->input("username", array("label"=>"Usuario"));
		echo $form->input("password", array("label"=>"Clave"));
	?>
	
	<?php
	
	echo $form->end("Ingresar");

	echo $html->link("Recuperar contraseña", array("controller"=>"users", "action"=>"remenberPassword"));
	?>
</div>
</fieldset>
