<div class="polls view">
<h2><?php  __('Encuesta');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- 
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['id']; ?>
			&nbsp;
		</dd>
	-->
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creador'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($poll['User']['email'], array('controller' => 'users', 'action' => 'view', $poll['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pregunta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha creación'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['created']; ?>
			&nbsp;
		</dd>
		<!-- 
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['modified']; ?>
			&nbsp;
		</dd>
		-->
		
		
	</dl>
<br>
	<div class="encuesta">
		<?php 
			for($i=0;$i<=count($resultado)-1; $i++){
				echo "<h3>".$resultado[$i]['pregunta']."</h3>";
				
				echo "Votos: ".$resultado[$i]['num_votos'];
				echo "</br>";
				echo "Porcentaje :<b>".$resultado[$i]['por']."</b>";
				echo "</br>";
				echo "<hr>";
				echo "</br>";
			}
		?>
		<b>Numero total de votos: <?php echo $total_votos; ?></b>
	</div>
</div>


