<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	
	</title>
	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->script('jquery.js');
		
		echo $this->Html->css('jquery.lightbox-0.5.css');
		echo $this->Html->script('jquery.lightbox-0.5.js');
		/*echo $this->Html->css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css');
		echo $this->Html->css('jquery.fileupload-ui.css');
		echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js');
		echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js');*/
		
		echo $this->Html->script('box.js');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>
			<?php echo "ADMINISTRADOR DE CONTENIDOS"; ?>
			<div class="status_acount">
				<?php 
				if($this->params["action"]!="login"){
					echo $this->Html->link(__('Cerrar session', true), array('action' => 'logout', "controller"=>"users")); 
					}
				?>	
			<div>
			</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php //debug($this->params); ?>
			
			<?php 
			if($this->params["controller"]!="pages" && $this->params["action"]!="login") {
				echo $this->element('menu');  
			}
			?>
			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>