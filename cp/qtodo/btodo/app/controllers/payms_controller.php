<?php
class PaymsController extends AppController{
	var $name='Payms';
	var $helpers = array('Html', 'Form');
	
	function index()
	{
		$this->set('payments', $this->Paym->find('all'));
	}
	
			
		function add() {
			if (!empty($this->data)) {
					$this->Paym->create();
			if ($this->Paym->save($this->data)) {
					$this->Session->setFlash('The Task has been saved');
					$this->redirect(array('action'=>'index'), null, true);
				} else {
			$this->Session->setFlash('Task not saved. Try again.');
						}
					}
				}
		function edit($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid Task');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if (empty($this->data)) {
				$this->data = $this->Paym->find(array('id' => $id));
				} else {
				if ($this->Paym->save($this->data)) {
				$this->Session->setFlash('The Task has been saved');
				$this->redirect(array('action'=>'index'), null, true);
				} else {
				$this->Session->setFlash('The Task could not be saved.Please, try again.');
						}
					}
				}		
	
	
	
}//class brace
?>