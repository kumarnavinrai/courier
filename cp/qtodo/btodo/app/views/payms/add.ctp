<?php echo $form->create('Paym');?>
<fieldset>
<legend>Add New Payment</legend>
<?php
echo $form->input('billno');
echo $form->input('totalamt');
echo $form->input('paidamt');
echo $form->input('obalance');
echo $form->input('paydate');
?>
</fieldset>
<?php echo $form->end('Add Payment');?>