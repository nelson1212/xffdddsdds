
<div class="actions">

	<h3>Menu principal</h3>
	
	<ul>
		<?php
		//debug($menus);
		echo '<li>'.$this->Html->link(__(('Gestión de noticias'), true), 
									array('controller' => 'noticias', 'action' => 'index')).'</li>';
									
			echo $this->Html->link(__(('- Agregar noticia'), true), 
									array('controller' => 'noticias', 'action' => 'add'));
			echo "<br>";					
									
			echo $this->Html->link(__(('- Ver noticias'), true), 
									array('controller' => 'noticias', 'action' => 'index'));
			echo "<br>";
									
			echo $this->Html->link(__(('- Nueva categoria'), true), 
									array('controller' => 'categories', 'action' => 'add'));
			echo "<br>";					
									
			echo $this->Html->link(__(('- Ver categorias'), true), 
									array('controller' => 'categories', 'action' => 'index'));
		
			echo "<br>";					
			echo "<br>";
			
		echo '<li>'.$this->Html->link(__(('Gestión de Albumes'), true), 
									array('controller' => 'albums', 'action' => 'index')).'</li>';
									
			echo $this->Html->link(__(('- Crear album'), true), 
									array('controller' => 'albums', 'action' => 'add'));
			echo "<br>";
			echo $this->Html->link(__(('- Ver albumes'), true), 
									array('controller' => 'albums', 'action' => 'index'));
			echo "<br>";					
			echo "<br>";						
									
	
			
		echo '<li>'.$this->Html->link(__(('Gestión de encuestas'), true), 
									array('controller' => 'polls', 'action' => 'index')).'</li>';
			  echo $this->Html->link(__(('- Nueva encuesta'), true), 
									array('controller' => 'polls', 'action' => 'add'));
			echo "<br>";
			echo $this->Html->link(__(('- Ver encuestas'), true), 
									array('controller' => 'polls', 'action' => 'index'));
			echo "<br>";					
			echo "<br>";
			
		echo '<li>'.$this->Html->link(__(('Gestión de usuarios'), true), 
									array('controller' => 'users', 'action' => 'index')).'</li>';
			  echo $this->Html->link(__(('- Crear usuario'), true), 
									array('controller' => 'users', 'action' => 'add'));
			echo "<br>";
			echo $this->Html->link(__(('- Usuarios '), true), 
									array('controller' => 'users', 'action' => 'index'));
			echo "<br>";					
			echo "<br>";
			
		?>	
		
	</ul>


</div>