<?php 
class CustomergrouptblsController extends AppController{
	var $name='Customergrouptbls';
	var $helpers = array('Html', 'Form');
///////////////////////////////////////////////////////////////////
function index()
	{
		$this->set('abc', $this->Customergrouptbl->find('all'));
	}
	
	
	
	
	
	function add() {
		if (!empty($this->data)) {
				$this->Customergrouptbl->create();
					if ($this->Customergrouptbl->save($this->data)) {
					$this->Session->setFlash('The Group has been saved');
					$this->redirect(array('action'=>'index'), null, true);
				} else {
					$this->Session->setFlash('Group not saved. Try again.');
				}
			}
		}
		
	
	
	function delete($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid id for Group');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if ($this->Customergrouptbl->del($id)) {
				$this->Session->setFlash('Group #'.$id.' deleted');
				$this->redirect(array('action'=>'index'), null, true);
						}
					}




//////////////////////////////////////////////////////////////////////

}
?>