<div class="photos form">
<?php echo $this->Form->create('Photo', array("type"=>"file"));?>
	<fieldset>
 		<legend><?php __('Agregar fotos'); ?></legend>
	<?php
			//debug($albumID);
			echo $this->Form->input('foto1', array("label"=>"","type"=>"file"));
			echo $this->Form->input('foto2', array("label"=>"","type"=>"file"));
			echo $this->Form->input('foto3', array("label"=>"","type"=>"file"));
			echo $this->Form->input('foto4', array("label"=>"","type"=>"file"));
			echo $this->Form->input('foto5', array("label"=>"","type"=>"file"));
		    echo $this->Form->input('Album.album_id', array('type'=>'hidden', 'value'=>$albumID[0]));
	?>

	</fieldset>
	<?php echo $this->Form->end(__('Guardar', true));?>
</form>
</div>
