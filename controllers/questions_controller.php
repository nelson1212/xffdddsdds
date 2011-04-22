<?php
class QuestionsController extends AppController {

	var $name = 'Questions';
	var $components =array('Auth'=>array("redirect"=>false));
    //var $uses = array('Photo','Album');
	//var $components =array('Auth'=>array("redirect"=>false));
	
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
	function admin_index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

	function admin_add($id=null) {
		if (!empty($this->data)) {
			$this->Question->create();
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('La opción fue guardada correctamente', true));
				$this->redirect(array('action' => 'admin_view', 'controller'=>"polls", $this->data["Question"]["poll_id"]));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		$polls = $this->Question->Poll->find('list');
		$this->set(compact('polls',"id"));
	}

	
	function add($id=null) 
	{
		if (!empty($this->data)) {
				
			//debug($this->data); exit;
			
			$id=$this->data["Question"]["question"];	
			$num_opcion=$this->Question->query("select num_votos from questions where id=".$id);
			//debug($num_opcion); exit;
			$num_opcion=$num_opcion[0]["questions"]["num_votos"];
			$num_opcion=$num_opcion+1;
			//echo $num_opcion; exit;
			
			$this->Question->query("update questions set num_votos=".$num_opcion." where id=".$id);
		
			if ($this->Question->query("update questions set num_votos=".$num_opcion." where id=".$id)==1) {
				$this->Session->setFlash(__('La opción fue guardada correctamente', true));
				$this->redirect(array('action' => 'view', 'controller'=>"polls", $this->data["Question"]["poll_id"]));
			} else {
				$this->Session->setFlash(__('La opción fue guardada correctamente, por favor intenta de nuevo.', true));
			}
		}
	
		$polls = $this->Question->Poll->find('list');
		$this->set(compact('polls',"id"));
	}
	
	
	function admin_edit($id = null, $album=null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
			
		}
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('Opción editada', true));
				//echo $album; exit;
				$this->redirect(array('action' => 'admin_view', 'controller'=>"polls", $this->data["Question"]["poll_id"]));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			//echo $album; exit;
			$this->set("album");
			$this->data = $this->Question->read(null, $id);
		}
		$polls = $this->Question->Poll->find('list');
		$this->set(compact('polls', "album"));
		
	}

	function admin_delete($id = null, $album=null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__('Opción borrada', true));
			$this->redirect(array('action' => 'admin_view', 'controller'=>"polls", $album));
		}
		$this->Session->setFlash(__('Question was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>