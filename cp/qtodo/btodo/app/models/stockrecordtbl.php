<?php 
class Stockrecordtbl extends AppModel{
	var $name='Stockrecordtbl';
	
	var $validate = array(
		'date_of_stock_en' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'start_cn' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						),
		'end_cn' => array(
		'rule' => VALID_NOT_EMPTY,
		'message' => 'Can not be empty'
						)
					);
	
}//class brace ends
?>