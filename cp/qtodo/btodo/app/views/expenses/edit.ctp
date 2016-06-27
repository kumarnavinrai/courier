<?php echo $form->create('Expense');?>
<?php $sitename=Configure::read('Site.name'); ?>
<?php  echo $html->link(
					$html->image('arrow.png', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					$sitename,
					array('target'=>'_parent'), null, false
				);
			?>

<fieldset>
<legend>Add New Expense</legend>
<?php
echo $form->input('expensedesc');
echo $form->input('expamt');
echo $form->input('exdate');
?>
</fieldset>
<?php echo $form->end('Save');?>
<?php echo $html->link('Add Expense', array('action'=>'add')); ?>--<?php echo $html->link('List All Expense', array('action'=>'index')); ?>