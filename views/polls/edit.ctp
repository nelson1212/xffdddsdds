<div class="polls form">
<?php echo $this->Form->create('Poll');?>
	<fieldset>
 		<legend><?php __('Edit Poll'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
