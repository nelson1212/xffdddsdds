<div class="photos form">
<?php echo $this->Form->create('Photo', array("controller"=>"Photos", "action"=>"admin_add","type"=>"file"));?>
	<fieldset>
 		<legend><?php __('Agregar fotos'); ?></legend>
 			
	<?php
			echo $this->Form->input('foto1', array("label"=>"Selecciona una foto","type"=>"file"));
			echo $this->Form->input('foto2', array("label"=>"Selecciona una foto","type"=>"file"));
			echo $this->Form->input('foto3', array("label"=>"Selecciona una foto","type"=>"file"));
			echo $this->Form->input('foto4', array("label"=>"Selecciona una foto","type"=>"file"));
			echo $this->Form->input('foto5', array("label"=>"Selecciona una foto","type"=>"file")); 
		    echo $this->Form->input('Album.album_id', array('type'=>'hidden', 'value'=>$albumID));
	?>

	</fieldset>
	<?php echo $this->Form->end(__('Guardar', true));?>
</form>
</div>
