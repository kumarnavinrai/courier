<?php 
class CdataController extends AppController{
	var $name='Cdata';
	var $helpers = array('Html', 'Form');
	//var $scaffold;
	
	function index()
	{
		
	}
	
	function edit($id = null) {
				if (!$id) {
				$this->Session->setFlash('Invalid Operation');
				$this->redirect(array('action'=>'index'), null, true);
						}
				if (empty($this->data)) {
				$this->data = $this->Cdata->find(array('id' => $id));
				} else {
				if ($this->Cdata->save($this->data)) {
				$this->Session->setFlash('The ---- has been saved');
				$this->redirect(array('action'=>'index'), null, true);
				} else {
				$this->Session->setFlash('The ---- could not be saved.Please, try again.');
						}
					}
				}			
	

}////class ends here
?>