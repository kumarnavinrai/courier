<?php 
class Bookrecordtbl extends AppModel{
	var $name='Bookrecordtbl';
	
	var $validate = array(
		'date_of_book_issue' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'start_cn_number' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'end_cn_number' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'name' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'address' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'phone' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'email' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						)				
					);
	
}//class brace ends
?>