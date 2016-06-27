<?php echo $form->create('Payment');?>
<?php $sitename=Configure::read('Site.name'); ?>
<?php  echo $html->link(
					$html->image('arrow.png', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					$sitename,
					array('target'=>'_parent'), null, false
				);
			?> __ <?php echo $html->link('List All', array('action'=>'index')); ?>
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
<?php echo $html->link('List All', array('action'=>'index')); ?>