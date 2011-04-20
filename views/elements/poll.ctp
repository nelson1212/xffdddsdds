<?php
	
$polls = $this->requestAction('polls/getLastPoll'); 
echo $this->Form->create('Question', array("controller"=>"question", "action"=>"add"));

//debug($polls); exit;
		foreach($polls["Poll"] as $poll => $value){
			
			if($poll=="question"){
				echo "<p>".$value."</p>";
			} if($poll=="id"){
				$pollId=$value;
				echo $this->Form->input("poll_id", array("type"=>"hidden", "value"=>$value));
			}
		}

 
	for($i=0; $i<=count($polls["Question"])-1; $i++) 
	{
	  ?>
		<p><input type="radio" name='data[Question][question]' value='<?php echo $polls["Question"][$i]["id"]; ?>' >	<?php echo $polls["Question"][$i]["question"]; ?></input></p>	   

<p>				   
<?php
					
	}
echo $this->Form->end(__('Votar', true));
?>	
<?php echo $this->Html->link("Ver resulados", array('controller' => 'polls','action' => 'view', $pollId)); ?>
</p>
				
	
