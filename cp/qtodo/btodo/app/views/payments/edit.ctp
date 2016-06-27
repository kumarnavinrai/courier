<?php echo $form->create('Payment');?>
<?php $sitename=Configure::read('Site.name'); ?>
<?php  echo $html->link(
					$html->image('arrow.png', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					$sitename,
					array('target'=>'_parent'), null, false
				);
			?> __ <?php echo $html->link('List All EXPENSES', array('action'=>'index')); ?>

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
<?php echo $html->link('List All Task', array('action'=>'index')); ?>