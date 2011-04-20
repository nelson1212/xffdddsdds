<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>EFIR - Escuela de formación integral los rosales</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<?php
        //echo $this->Html->css('style');
//		 echo $this->Html->css('rotator_style');

		echo $this->Html->css('jquery.cleditor');
		echo $this->Html->css('jquery.lightbox-0.5.css');
		echo $this->Html->css("school-education/layout.css");
		
		
		echo $this->Html->script('jquery.js');
	
		echo $this->Html->script('jquery.lightbox-0.5.js');

		echo $this->Html->script('box.js');
		
		echo $this->Html->script('ImageDrawer.js');
		echo $this->Html->script('ImageDrawer.Grid.js');
		echo $this->Html->script('ImageDrawer.Expand.js');
		echo $this->Html->script('rotador.js');
		
		
		echo $this->Html->script("school-education/jquery-1.4.1.min.js");
		echo $this->Html->script("school-education/jquery.slidepanel.setup.js");
		echo $this->Html->script("school-education/jquery.cycle.min.js");
		echo $this->Html->script("school-education/jquery.cycle.setup.js");

		echo $scripts_for_layout;
?>


</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Nullamlacus dui ipsum</h2>
        <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
      <div class="topbox">
        <h2>Teachers Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="teachername" id="teachername" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="teacherpass" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />
              &nbsp;
              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>Pupils Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Pupils Login Form</legend>
            <label for="pupilname">Username:
              <input type="text" name="pupilname" id="pupilname" value="" />
            </label>
            <label for="pupilpass">Password:
              <input type="password" name="pupilpass" id="pupilpass" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="pupillogin" id="pupillogin" value="Login" />
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
  
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="#">EFIR</a></h1>
      <p>Escuela de formación integral los rosales</p>
    </div>
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.html">Inició</a></li>
        <li><a href="style-demo.html">Misión</a></li>
        <li><a href="full-width.html">Visión</a></li>
        <li><a href="#">Quienes somos</a></li>
        <li class="last"><a href="#">Imagenes</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="featured_slide">
    <div class="featured_box"><a href="#"><?php echo $html->image("rotador/imagen1.jpg"); ?></a>
    </div>
    
    <div class="featured_box"><a href="#"><?php echo $html->image("rotador/imagen2.jpg"); ?></a>
    </div>
    
    <div class="featured_box"><a href="#"><?php echo $html->image("rotador/imagen3.jpg"); ?></a>
    </div>
    <!-- 
    
    <div class="featured_box"><a href="#"><?php echo $html->image("rotador/imagen3.jpg"); ?></a>
    </div>
    
    <div class="featured_box"><a href="#"><?php echo $html->image("rotador/imagen1.jpg"); ?></a>
    </div>
    
    
    <div class="featured_box"><a href="#"><?php echo $html->image("rotador/imagen4.jpg"); ?></a>
    </div>
   -->
  </div>
</div>


<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
    	
    	<?php if($this->params["url"]["url"]=="noticias") { ?>
      <div class="column2">
        <ul>
          <li>
            <h2>Misión</h2>
            <?php echo $html->image("/img/school-education/mision.jpg", array("class"=>"imgholder")); ?>
            <p><?php echo $this->element('vision'); ?></p>
            <p class="readmore"><a href="#">Continuar leyendo &raquo;</a></p>
          </li>
          
          <li class="last">
            <h2>Visión</h2>
            <?php echo $html->image("/img/school-education/vision.jpg", array("class"=>"imgholder")); ?>
            <p><?php echo $this->element('vision'); ?></p>
            <p class="readmore"><a href="#">Continuar leyendo &raquo;</a></p>
          </li>
        </ul>
        <br class="clear" />
      </div>
      <?php } ?>
      
      
      <div class="column2">
        <?php echo $content_for_layout; ?>
     </div>
    </div>
    
    <div id="column">
      <div class="subnav">
        <h2>Menu principal</h2>
        <ul>
          <li class="active"><?php echo $this->Html->link("Inicio", array('controller' => 'noticias','action' => 'index')); ?></li>
					
            <li class="active"><?php echo $this->Html->link("Historia", array('controller' => 'contents','action' => 'view', 2)); ?></li>
            
            <li class="active"><?php echo $this->Html->link("Quienes somos", array('controller' => 'contents','action' => 'view', 3)); ?></li>
            
            <li class="active"><?php echo $this->Html->link("Visión", array('controller' => 'contents','action' => 'view', 4)); ?></li>
            
            <li class="active"><?php echo $this->Html->link("Misión", array('controller' => 'contents','action' => 'view', 1)); ?></li>
            
            <li class="active"><?php echo $this->Html->link("Principios", array('controller' => 'contents','action' => 'view', 5)); ?></li>
            
			<li class="active"><?php echo $this->Html->link("Ejes tematicos", array('controller' => 'contents','action' => 'view', 6)); ?></li>
			
			<li class="active"><?php echo $this->Html->link("Logros", array('controller' => 'contents','action' => 'view', 7)); ?></li>

           <li class="active"><?php echo $this->Html->link("Expectativas", array('controller' => 'contents','action' => 'view', 8)); ?></li>
           
           <li class="active"><?php echo $this->Html->link("Días de trabajo", array('controller' => 'contents','action' => 'view', 9)); ?></li>
           
           <li class="active"><?php echo $this->Html->link("Experiencias", array('controller' => 'contents','action' => 'view', 10)); ?></li>
			
			<li class="active"><?php echo $this->Html->link("Imagenes", array('controller' => 'albums','action' => 'index')); ?></li>
			
			<li class="active"><?php echo $this->Html->link("Espacios de formación", array('controller' => 'contents','action' => 'view', 11)); ?></li>
        </ul>
      </div>
    
      <div id="featured">
        <ul>
          <li>
            <h2>Encuesta</h2>
           
			
	            <p ><?php echo $this->element('poll'); ?></p>
	           
           	
          </li>
        </ul>
      </div>
      
        <div id="featured">
        <ul>
          <li>
            <h2>Visitas</h2>
           
           	
            <p ><?php echo $this->element('counter'); ?></p>
            
           
          </li>
        </ul>
      </div>
      
   <!--   
      <div class="holder">
        <h2>Lorem ipsum dolor</h2>
        <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.</p>
        <ul>
          <li><a href="#">Lorem ipsum dolor sit</a></li>
          <li>Etiam vel sapien et</li>
          <li><a href="#">Etiam vel sapien et</a></li>
        </ul>
        <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed. Condimentumsantincidunt dui mattis magna intesque purus orci augue lor nibh.</p>
        <p class="readmore"><a href="#">Continue Reading »</a></p>
      </div>
    </div>
    
    -->
    

    <br class="clear" />
  </div>
</div>


<!-- ####################################################################################################### -->
<!-- 
<div class="wrapper col4">
  <div id="footer">
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
-->
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2011 - Todos los derechos reservados, <a href="www.efirchoco.org">EFIR - Escuela de formación integral los rosales</a></p>
    <p class="fl_right">Sitio desarrolloado por <a href="www.tecnoydes.com" title="">TecnoDes</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
