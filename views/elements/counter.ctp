<div class="visitas">
<?php
//IP
	$ip = $_SERVER['REMOTE_ADDR'];
	App::import('Model', 'Counter');
	$contador = new Counter();
	$consulta =  $contador->query("select ip, TIMEDIFF(NOW(), 
								created) as diferencia, created, num_visitas from counters where ip='$ip'");
	
	//debug($consulta);
	
	if(!empty($consulta)){
		$tiempo=$consulta[0][0]["diferencia"]; //Difenrencia entre la fecha de visita y la fecha actual
		$num_visitas=$consulta[0]["counters"]["num_visitas"];
		$horas_t=substr($tiempo,0,2); //Número de horas transcurridas
		$tiemRes = 5; //Varible de tiempo en horas para restringir la visita
	}
	
	/*Contamos el número de registros obtenidos en la consulta anterior, si el numero
	* obtenido es igual a cero es porque dicho visitante es nuevo en el sito
	* entonces agregamos su ip a la base de datos junto con un 1 y la fecha actual */
	
	//echo count($consulta); exit;

	if (count($consulta)==0)
	{
		$contador->query("insert into counters(ip, num_visitas, created) values('$ip', 1, NOW())");	
	}

		/* Si el número de registros obtenidos es mayor a cero es porque dicho visitante ha vuelto a ingresar al
		* sitio, y si su tiempo transcurrido es mayor a 5 horas desde la primera vez que ingreso
		* entonces actualizamos su número de votos agregando sumando 1 al valor actual,
		* tambien actualizamos la fecha de su ultimo ingreso a la fecha actual
		* */

	//Si la ip existe y han transcurrido 5hrs

	elseif (count($consulta) > 0 && $horas_t > $tiemRes)
	{
		$contador->query("update counters set created=NOW(), num_visitas='$num_visitas'+1 where ip='$ip'");
	}
	
	$consulta="";
	$consulta=$contador->query("select SUM(num_visitas) as num_visitas from counters"); //Obtenemos la suma de todas las visitas
	
		echo "<b>".$consulta[0][0]["num_visitas"]."</b>";
?>	
</div>
<p class="readmore">
<?php echo $this->Html->link("Ver detalles »", array('controller' => 'polls','action' => 'view')); echo "<br />";?>
</p>

