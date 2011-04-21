<div class="Photos index">
	<h2><?php  echo 'Album '.$titulo; ?></h2>
   <?php 
  
   
	if(empty($photos)){
		echo "Este album no posee fotos, agrega algunas ";
		echo $this->Html->link(__('Agregar fotos', true), array("controller"=>"photos", 'action' => 'add', $albumId));
		return;
	}else {
		 echo $html->link(__("Agregar mas fotos a este album", true), array("controller"=>"Photos", "action"=>"admin_add", $albumId));
	   	 echo "</br>";
	   	 echo "</br>";
	}
	?>
<div id="gallery">	
<?php
	$i = 0;
	//debug($photos);
	foreach ($photos as $photo)
	{
		$ruta = "/webroot/img/fotos/".$directorio."/".$photo['Photo']['name'];
		$ruta = str_replace("\\", "/", $ruta);
			
		if($i % 2 == 0)
		{
			echo "<div class='fotos'>";
			echo "<a href='http://localhost/efir2011/img/fotos/".$directorio."/".$photo['Photo']['name']."' >";
				echo $html->image("/img/fotos/".$directorio."/".$photo['Photo']['thumb']);
			echo "</a>";
			echo "</div>";
		}
		else 
		{
			echo "<div class='fotos'>";
			echo "<a href=".$ruta.">";
				echo $html->image("/img/fotos/".$directorio."/".$photo['Photo']['thumb']);
				echo "</a>";
			echo "</div>";
		}
	}
 $i++;
 
 
   
?>
	
</div>


	<div class="paging">
		
		<?php if(!empty($photos)){ ?>
		</br>
		<?php  echo $html->link(__("Agregar mas fotos a este album", true), array("controller"=>"Photos", "action"=>"admin_add", $albumId));
		   echo "</br>";
		   }
		?>
			<p>
				
				</br>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

		</br>

		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

