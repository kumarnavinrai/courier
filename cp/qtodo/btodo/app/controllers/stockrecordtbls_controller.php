<?php 
class StockrecordtblsController extends AppController{
	var $name='Stockrecordtbls';
	var $helpers = array('Html', 'Form');
	
	var $paginate = array(
              'limit' => 20,
              'order' => array(
                'Stockrecordtbl.date_of_stock_en' => 'desc'
                )
              );     
	
	
	function index()
	{
		$data = $this->paginate('Stockrecordtbl');
        $this->set('book', $data);
		//$this->set('book', $this->Stockrecordtbl->find('all'));
	}
	
	
	function searchexp($id=NULL)
	{
		$rel = $this->Stockrecordtbl->find('all',
										array(
								'conditions' => array('Stockrecordtbl.id' => $id),
								'limit'=>2
											)
										);
		$this->set('book', $rel);
	}
	
	
	
	function edit($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid Operation');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if (empty($this->data)) {
				$this->data = $this->Stockrecordtbl->find(array('id' => $id));
				} else {
				if ($this->Stockrecordtbl->save($this->data)) {
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
				if ($this->Stockrecordtbl->del($id)) {
				$this->Session->setFlash('Issue #'.$id.' deleted');
				$this->redirect(array('action'=>'index'), null, true);
						}
					}

}//class brace
?>