<?php
class AlbumsController extends AppController {

	var $name = 'Albums';
	//var $components = array('Flickr'); 
	function beforeFilter()
	{
		$this->Auth->allow("index", "add");
	}
	
	function index() {
		$this->Album->recursive = -1;
		$albums = $this->Album->find("all");
		$this->set('albums', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('album', $this->Album->read(null, $id));
	}

	function add() 
	{
		//debug($this->data);
		//$photo=$this->data['Album']['foto']['tmp_name'];
		
		if (!empty($this->data)) 
		{
			$this->Album->create();
			$userId=$this->Session->read("Auth.User.id");
			$this->data['Album']['user_id']=$userId;
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('Agregar fotos al album', true));
				
				//Crear directorio de las fotos
				$directorio = WWW_ROOT."img\\fotos\\".$this->Album->id;
				mkdir($directorio, 0777);
				//exit;
				$this->redirect(array('controller'=>'Photos','action' => 'add', $this->Album->id));
				
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Album->User->find('list');
		$this->set(compact('users')); 
		 
		 
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
		$users = $this->Album->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Album->delete($id)) {
			$this->Session->setFlash(__('Album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Album was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>