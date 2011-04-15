<?php
class QuestionsController extends AppController {

	var $name = 'Questions';

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

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The question has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Question->read(null, $id);
		}
		$polls = $this->Question->Poll->find('list');
		$this->set(compact('polls'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action' => 'admin_view', 'controller'=>"polls", $id));
		}
		$this->Session->setFlash(__('Question was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>