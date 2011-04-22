<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	var $components =array('Auth'=>array("redirect"=>false));
	
	function beforeFilter(){
		$this->Auth->autoRedirect=false;
		$rol=$this->Session->read("Auth.User.role_id");
		
		if($rol==2){
			$this->Auth->allow("index");	
		}else if ($rol==1) {
			$this->Auth->allow("*");
		}else {
			$this->Auth->allow("index");
		}	
	}
	function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid comment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			
			//debug($this->data); exit;
			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('Tu comentario fue agregado', true));
				$this->redirect(array("controller"=>"noticias",'action' => 'leerMas', $this->data['Comment']["noticia_id"]));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
			}
		}
		$news = $this->Comment->Noticia->find('list');
		$users = $this->Comment->User->find('list');
		$albums = $this->Comment->Album->find('list');
		$photos = $this->Comment->Photo->find('list');
		$this->set(compact('news', 'users', 'albums', 'photos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid comment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Comment->read(null, $id);
		}
		$news = $this->Comment->Noticia->find('list');
		$users = $this->Comment->User->find('list');
		$albums = $this->Comment->Album->find('list');
		$photos = $this->Comment->Photo->find('list');
		$this->set(compact('news', 'users', 'albums', 'photos'));
	}

	function admin_delete($id = null, $noticia=null) {
		if (!$id) {
			$this->Session->setFlash(__('Comentario invalido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Comment->delete($id, true)) {
			$this->Session->setFlash(__('Comenario borrado', true));
			$this->redirect(array('action'=>'admin_view', "controller"=>"Noticias", $noticia));
		}
		$this->Session->setFlash(__('El comentario no fue borrado', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>