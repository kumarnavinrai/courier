<?php 
class Releasebill extends AppModel{
	var $name='Releasebill';
	
	var $validate = array(
		'billno' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'cucode' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'fd' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'td' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'ba' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'paid' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'billam' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						)				
					);
	
}//class brace ends
?>