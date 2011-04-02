<?php

class AppController extends Controller {
		
	var $components=array("Session","Auth");	


	function beforeFilter()
	{
		$this->Auth->loginError = "Nombre de usuario o contraseña incorrectos";
		$this->Auth->authError = "This error shows up with the user tries to access a part of the website that is protected.";
		$this->Auth->loginAction = array("controller"=>"noticias", "action"=>"index");
		$this->Auth->loginRedirect = array("controller"=>"users", "action"=>"index");
		$this->Auth->logoutRedirect = array("controller"=>"users", "action"=>"login");
		$this->Auth->allow("*");
	}	

}
