<?php echo $form->create('Paym');?>
<fieldset>
<legend>Edit Task</legend>
<?php
echo $form->hidden('id');
echo $form->input('billno');
echo $form->input('totalamt');
echo $form->input('paidamt');
echo $form->input('obalance');
echo $form->input('paydate');
?>
</fieldset>
<?php echo $form->end('Save');?>