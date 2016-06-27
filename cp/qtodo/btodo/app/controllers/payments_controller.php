<?php
class PaymentsController extends AppController{
	var $name='Payments';
	var $helpers = array('Html', 'Form');
	
	
	var $paginate = array(
              'limit' => 20,
              'order' => array(
                'Payment.paydate' => 'desc'
                )
              );    
	
	
	
	function index()
	{
		
		$data = $this->paginate('Payment');
        $this->set('payments', $data);
		//$this->set('payments', $this->Payment->find('all'));
	}
	
	function searchpayment($id=NULL)
	{
		$re = $this->Payment->find('all',
										array(
								'conditions' => array('Payment.id' => $id),
								'limit'=>2
											)
										);
		$this->set('payments', $re);
	}
	
	
	
	function add() {
		if (!empty($this->data)) {
				$this->Payment->create();
					if ($this->Payment->save($this->data)) {
					$this->Session->setFlash('The Payment has been saved');
					$this->redirect(array('action'=>'index'), null, true);
				} else {
					$this->Session->setFlash('Payment not saved. Try again.');
				}
			}
		}
		
	function edit($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid Operation');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if (empty($this->data)) {
				$this->data = $this->Payment->find(array('id' => $id));
				} else {
				if ($this->Payment->save($this->data)) {
				$this->Session->setFlash('The Payment has been saved');
				$this->redirect(array('action'=>'index'), null, true);
				} else {
				$this->Session->setFlash('The Payment could not be saved.Please, try again.');
						}
					}
				}			
	
	function delete($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid id for Payment');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if ($this->Payment->del($id)) {
				$this->Session->setFlash('Payment #'.$id.' deleted');
				$this->redirect(array('action'=>'index'), null, true);
						}
					}
}//class brace
?>