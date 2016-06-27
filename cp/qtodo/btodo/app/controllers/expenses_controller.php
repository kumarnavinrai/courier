<?php 
class ExpensesController extends AppController{
	var $name='Expenses';
	var $helpers = array('Html', 'Form');
	
	
	var $paginate = array(
              'limit' => 15,
              'order' => array(
                'Expense.exdate' => 'desc'
                )
              );    
	
	
	
	function index()
	{
		$data = $this->paginate('Expense');
        $this->set('exp', $data);
		//$this->set('exp', $this->Expense->find('all'));
	}
	
	
	function searchexp($id=NULL)
	{
		$rel = $this->Expense->find('all',
										array(
								'conditions' => array('Expense.id' => $id),
								'limit'=>2
											)
										);
		$this->set('exp', $rel);
	}
	
	function add() {
		if (!empty($this->data)) {
				$this->Expense->create();
					if ($this->Expense->save($this->data)) {
					$this->Session->setFlash('The ---- has been saved');
					$this->redirect(array('action'=>'index'), null, true);
				} else {
					$this->Session->setFlash('----- not saved. Try again.');
				}
			}
		}
	
	function edit($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid Operation');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if (empty($this->data)) {
				$this->data = $this->Expense->find(array('id' => $id));
				} else {
				if ($this->Expense->save($this->data)) {
				$this->Session->setFlash('The ---- has been saved');
				$this->redirect(array('action'=>'index'), null, true);
				} else {
				$this->Session->setFlash('The ---- could not be saved.Please, try again.');
						}
					}
				}			
	
	function delete($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid id for ------');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if ($this->Expense->del($id)) {
				$this->Session->setFlash('Expense #'.$id.' deleted');
				$this->redirect(array('action'=>'index'), null, true);
						}
					}

}//class brace
?>