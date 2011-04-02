<?php
    class AuhtenticationComponent extends Object
    {
    	var $msg;
		
    	function login($user="", $password="",$model)
		{
			$this->User->recursive = 0;
			$infoUser=$this->User->find("first", 
									array("conditions"=>array("User.username"=>$user,"User.password"=>$clave)));
			if($infoUser){
				$this ->Session->write("actualUser", $infoUser);
			}else {
				$this ->Session->write("actualUser", "");
			}
		}
		
		function msg($msg)
		{
			
		}
    }
?>