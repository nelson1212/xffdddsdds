<div class="encuesta">
<?php
	
$polls = $this->requestAction('polls/getLastPoll'); 
echo $this->Form->create('Question', array("controller"=>"question", "action"=>"add"));

		foreach($polls["Poll"] as $poll => $value){
			
			if($poll=="question"){
				echo "<p><b>".$value."</b></p>";
				echo "<br />";
			} if($poll=="id"){
				$pollId=$value;
				echo $this->Form->input("poll_id", array("type"=>"hidden", "value"=>$value));
			}
		}

 
	for($i=0; $i<=count($polls["Question"])-1; $i++) 
	{
	  ?>
		<p><input type="radio" name='data[Question][question]' value='<?php echo $polls["Question"][$i]["id"]; ?>' >	<?php echo $polls["Question"][$i]["question"]; ?></input></p>	   

			   
<?php
					
	}
	echo "<br />";
	?>
	
	
<?php echo $this->Form->end(__('Votar', true)); ?>	
</div>
<p class="readmore">
<?php echo $this->Html->link("Ver resulados »", array('controller' => 'polls','action' => 'view', $pollId)); echo "<br />";?>
</p>

	
