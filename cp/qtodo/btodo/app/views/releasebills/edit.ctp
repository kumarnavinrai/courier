<?php echo $form->create('Releasebill');?>
<?php $sitename=Configure::read('Site.name'); ?>
<?php  echo $html->link(
					$html->image('arrow.png', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					$sitename,
					array('target'=>'_parent'), null, false
				);
			?> __ <?php echo $html->link('List All', array('action'=>'index')); ?>
<fieldset>
<legend>Edit Task</legend>
<?php
echo $form->input('cucode');
echo $form->input('fd');
echo $form->input('td');
echo $form->input('ba');
echo $form->input('paid');
echo $form->input('billam');
?>
</fieldset>
<?php echo $form->end('Save');?>
<?php echo $html->link('Add Task', array('action'=>'add')); ?>--<?php echo $html->link('List All Task', array('action'=>'index')); ?>