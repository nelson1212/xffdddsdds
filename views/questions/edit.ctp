<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
 		<legend><?php __('Edit Question'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question');
		echo $this->Form->input('poll_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Question.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Polls', true), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll', true), array('controller' => 'polls', 'action' => 'add')); ?> </li>
	</ul>
</div>