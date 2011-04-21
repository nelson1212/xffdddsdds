<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components=array("Auth");
	
	
	function beforeRender()
	{
	    
		
	}
	
	public function login()
	{
		parent::beforeFilter();
        $this->Auth->allow('add');
	  
	  
		/*if ( !empty($this->data) )
		{
			$this->User->recursive = 0;
			$user=$this->data['User']['usuario'];
			$clave=$this->data['User']['clave'];
			
			$infoUser=$this->User->find("first", 
									array("conditions"=>array("User.username"=>$user,"User.password"=>$clave)));
			
			if($infoUser){
				$this ->Session->write("actualUser", $infoUser);
				$this->redirect(array('action' => 'index', 'controller'=>"users"));
			}else {
				$this ->Session->write("actualUser", "");
				$this->Session->setFlash(__('Nombre de usuario o contraseña incorrectos', true));
			}
		}*/
	}
	
	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}

	
	function admin_index() {	
	   	
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		$password="";
		
		
		if (!empty($this->data)) 
		{
			
		
			$password=$this->data["User"]["password"];			
			$this->data["User"]["username"]=$this->data["User"]["email"];
			$this->data["User"]["password"]=$this->Auth->password($this->data['User']['password']);
	
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('El usuario fue creado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$roles = $this->User->Role->find('list', array("fields"=>array("id","description")));
				$this->Session->setFlash(__('El usuario no pudo ser creado, por favor intenta de nuevo', true));
				$this->set('roles','password');
			}
		}
		$roles = $this->User->Role->find('list', array("fields"=>array("id","description")));
		$this->set(compact('roles',"password"));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}



	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>