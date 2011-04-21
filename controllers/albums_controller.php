<?php
class AlbumsController extends AppController {

	var $name = 'Albums';
	//var $components = array('Flickr'); 
	function beforeFilter()
	{
		$this->Auth->allow("index", "add");
	}
	
	function index() {
		$this->layout="index";
		$this->Album->recursive = -1;
		$albums = $this->Album->find("all");
		$this->set('albums', $this->paginate());
	}
	
	function admin_index() {
		//$this->layout="index";
		$this->Album->recursive = -1;
		$albums = $this->Album->find("all");
		$this->set('albums', $this->paginate());
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Album invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('album', $this->Album->read(null, $id));
	}

	function admin_add() 
	{
		if (!empty($this->data)) 
		{
			$this->Album->create();
			$userId=$this->Session->read("Auth.User.id");
			$this->data['Album']['user_id']=$userId;
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('Agregar fotos al album', true));
				
				//Crear directorio de las fotos
				$directorio = WWW_ROOT."img".DS."fotos".DS.$this->Album->id;
				
				mkdir($directorio, 0777);
				//exit;
				$this->redirect(array('controller'=>'Photos','action' => 'add', $this->Album->id));
				
			} else {
				$this->Session->setFlash(__('El Album no puede ser borrado, intenta de nuevo.', true));
			}
		}
		$users = $this->Album->User->find('list');
		$this->set(compact('users')); 
		 
		 
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Album invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('El Album no fue guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Album no pudo ser guardado intenta de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
		$users = $this->Album->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) 
	{
		//debug($this->data); exit;
		if (!$id) {
			$this->Session->setFlash(__('ID invalido para borrar el album', true));
			$this->redirect(array('action'=>'index'));
		}else {
			//$photos = $this->Album->Photo->find("list", array("conditions"=>array("Photo.album_id"=>$id)));
			//$this->Album->Photo->delete()
			//debug($photos); exit;
		}

		
		if ($this->Album->delete($id, true)) {
			$this->Session->setFlash(__('Album borrado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El Album no fue borrado', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function lastAlbums()
	{
		//$albums=$this-Album->find("all", array())
	}
}
?>