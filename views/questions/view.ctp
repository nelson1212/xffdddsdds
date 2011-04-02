<div class="questions view">
<h2><?php  __('Question');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Poll'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($question['Poll']['id'], array('controller' => 'polls', 'action' => 'view', $question['Poll']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question', true), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Question', true), array('action' => 'delete', $question['Question']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls', true), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll', true), array('controller' => 'polls', 'action' => 'add')); ?> </li>
	</ul>
</div>
