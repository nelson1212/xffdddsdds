<?php
class PollsController extends AppController {

	var $name = 'Polls';

	function index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid poll', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('poll', $this->Poll->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Poll->create();
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The poll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Poll->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid poll', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The poll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Poll->read(null, $id);
		}
		$users = $this->Poll->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for poll', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Poll->delete($id)) {
			$this->Session->setFlash(__('Poll deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Poll was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid poll', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('poll', $this->Poll->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Poll->create();
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The poll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Poll->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid poll', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The poll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Poll->read(null, $id);
		}
		$users = $this->Poll->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for poll', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Poll->delete($id)) {
			$this->Session->setFlash(__('Poll deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Poll was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>