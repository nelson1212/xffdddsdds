<div class="polls view">
<h2><?php  __('Encuesta');?></h2>
<hr>
	<dl><?php  $i = 0; $class = ' class="altrow"';?>
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
		<br>
		<h3>Opciones</h3
			><hr>
			<ol type="a">
			
		
			<?php
				for($i=0; $i<=count($poll["Question"])-1; $i++) 
				{
					echo '<div class="opciones">';
						echo ($i+1)." - ".$poll["Question"][$i]["question"];
					echo '</div>';
					
					echo '<div class="opciones1">';
						echo $this->Html->link(__('Borrar', true), array("controller"=>"questions",'action' => 'admin_delete', $poll["Question"][$i]["id"]), null, sprintf(__('Are you sure you want to delete # %s?', true), $poll["Question"][$i]["question"]));
					echo '</div>';
					echo "<br>";
				}
			?>
		
			
			<ol>
	</dl>
	
	<div>
		<?php 
			if(count($poll["Question"])>=10)
			{
			   echo "<br>";
			   echo "Esta encuesta ya tiene el numero maximo de opciones, si quieres agregar una nueva opción, tienes que borrar una existente";
			}else {
		?>
		<div class="">
			<?php echo $this->Form->create('Question', array("controller"=>"questions", "action"=>"admin_add"));?>
				
			 	<br/>
			 			 	
				<?php
					echo $this->Form->input('question', array("label"=>"Agregar opción"));
					echo $this->Form->input('poll_id', array("type"=>"hidden", "value"=>$id));
				?>
				
			<?php echo $this->Form->end(__('Guardar', true));?>
		</div>
		<?php 
			
			}
		?>
	</div>
</div>


