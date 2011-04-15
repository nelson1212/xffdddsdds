<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>EFIR - Escuela de formación integral los Rosales</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
        echo $this->Html->css('style');
		

		echo $this->Html->css('jquery.cleditor');
		echo $this->Html->css('jquery.lightbox-0.5.css');
		echo $this->Html->script('jquery.js');
	
		echo $this->Html->script('jquery.lightbox-0.5.js');

		echo $this->Html->script('box.js');
		
		echo $scripts_for_layout;
?>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html"><span></span> <small></small></a></h1>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"> <li class="active"><?php echo $this->Html->link("Inicio", array('controller' => 'noticias','action' => 'index')); ?></li></li>
          <li><li ><?php echo $this->Html->link("Visión", array('controller' => 'contents','action' => 'view', 4)); ?></li></li>
          <li><li ><?php echo $this->Html->link("Misión", array('controller' => 'contents','action' => 'view', 1)); ?></li></li>
          <li><a href="blog.html">Servicios</a></li>
          <li><a href="contact.html">Contactenos</a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="hbg"><?php echo $html->image("/img/images1/header_images.jpg", array("width"=>"430", "height"=>"315","alt"=>"","class"=>"fl")); ?>
        <div class="info fl">
          <h2>Escuela de formación integral los Rosales</h2>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      	
      	<?php echo $content_for_layout; ?>
        
    
      </div>
      <div class="sidebar">
        <div class="gadget">
          <div class="search">
            <form method="get" id="search" action="#">
              <span>
              <input type="text" value="Search..." name="s" id="s" />
              <input name="searchsubmit" type="image" src="images/search.gif" value="Go" id="searchsubmit" class="btn"  />
              </span>
            </form>
            <div class="clr"></div>
          </div>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Menu</span> principal</h2><hr>
          <div class="clr"></div>
          <ul class="sb_menu">
          	
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
        <div class="gadget">
          <h2 class="star"><span>Encuesta</span></h2><hr>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="http://www.dreamtemplate.com">DreamTemplate</a><br />
              Over 6,000+ Premium Web Templates</li>
            <li><a href="http://www.templatesold.com/">TemplateSOLD</a><br />
              Premium WordPress &amp; Joomla Themes</li>
            <li><a href="http://www.imhosted.com">ImHosted.com</a><br />
              Affordable Web Hosting Provider</li>
            <li><a href="http://www.myvectorstore.com">MyVectorStore</a><br />
              Royalty Free Stock Icons</li>
            <li><a href="http://www.evrsoft.com">Evrsoft</a><br />
              Website Builder Software &amp; Tools</li>
            <li><a href="http://www.csshub.com/">CSS Hub</a><br />
              Premium CSS Templates</li>
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Visitas</span></h2><hr>
          <div class="clr"></div>
          <div class="testi">
            <p><span class="q"> <?php echo $html->image("/img/images1/qoute_1.gif", array("width"=>"20", "height"=>"15")); ?>
            	</span> We can let circumstances rule us, or we can take charge and rule our lives from within. <span class="q"><img src="images/qoute_2.gif" width="20" height="15" alt="" /></span></p>
            <p class="title"><strong>Earl Nightingale</strong></p>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="#"><img src="images/pic_1.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_2.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_3.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_4.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_5.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_6.jpg" width="58" height="58" alt="" /></a> </div>
      <div class="col c2">
        <h2><span>Lorem Ipsum</span></h2>
        <p>Lorem ipsum dolor<br />
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
      </div>
      <div class="col c3">
        <h2><span>About</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. llorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum. <a href="#">Learn more...</a></p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">MyWebSite</a>.</p>
      <p class="rf">Layout by I <a href="http://www.iwebsitetemplate.com/">Website Templates</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>