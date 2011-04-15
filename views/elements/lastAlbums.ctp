
	<ul>
		<?php
	
		$polls = $this->requestAction('polls/getLastPoll'); 

		foreach($polls["Poll"] as $poll => $value){
			if($poll=="question"){
				echo $value;
			}
		}
		echo "<br>";	
		
		for($i=0; $i<=count($polls["Question"])-1; $i++) {
				echo "<div class='opciones'>";
				
					echo '<input type="radio" name="opcion" value=$polls["Question"][$i]["id"]/>'.$polls["Question"][$i]["question"];
				
				echo "</div>";
			}
		?>	
		
	</ul>

