<?php 
class Expense extends AppModel{
	var $name='Expense';
	
	var $validate = array(
		'expensedesc' => array(
		 VALID_NOT_EMPTY,
		 array( 'rule' => 'alphaNumeric',
		 		'message' => 'Can not be empty an should be alpha numeric')
						),
		'expamt' => array( VALID_NOT_EMPTY,
		array('rule' => 'numeric',
		'message' => 'Can not be empty and should be numeric')
						),
		'exdate' => array( VALID_NOT_EMPTY,
		array('rule' => array('custom', '/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/'),
		'message' => 'Can not be empty should be in DD-MM-YYYY format')
						)
											
					);
	
}//class brace ends
?>