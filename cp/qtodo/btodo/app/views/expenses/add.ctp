<?php echo $form->create('Expense');?>
<fieldset>
<legend>Add New Expense</legend>
<?php
echo $form->input('expensedesc');
echo $form->input('expamt');
echo $form->input('exdate');
?>
</fieldset>
<?php echo $form->end('Add Expense');?>
<?php echo $html->link('List All Task', array('action'=>'index')); ?>