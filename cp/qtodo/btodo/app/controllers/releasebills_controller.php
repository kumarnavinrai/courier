<?php 
class ReleasebillsController extends AppController{
	var $name='Releasebills';
	var $helpers = array('Html', 'Form');
	
	var $paginate = array(
              'limit' => 15,
              'order' => array(
                'Releasebill.fd' => 'desc'
                )
              );    
	
	
	
	function index()
	{
		$data = $this->paginate('Releasebill');
        $this->set('relea', $data);
		//$this->set('relea', $this->Releasebill->find('all'));
	}
	
	
	function searchbill($id=NULL)
	{
		$rel = $this->Releasebill->find('all',
										array(
								'conditions' => array('Releasebill.id' => $id),
								'limit'=>2
											)
										);
		$this->set('rele', $rel);
	}
	
	function add() {
		if (!empty($this->data)) {
				$this->Releasebill->create();
					if ($this->Releasebill->save($this->data)) {
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
				$this->data = $this->Releasebill->find(array('id' => $id));
				} else {
				if ($this->Releasebill->save($this->data)) {
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
				if ($this->Releasebill->del($id)) {
				$this->Session->setFlash('Releasebill #'.$id.' deleted');
				$this->redirect(array('action'=>'index'), null, true);
						}
					}
}//class brace
?>