<?php 
class Payment extends AppModel{
	var $name='Payment';
	
	var $validate = array(
		'billno' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'totalamt' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'paidamt' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'obalance' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'paydate' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						)				
					);
}// class pay
?>