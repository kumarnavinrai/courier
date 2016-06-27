<?php echo $form->create('Cdata');?>
<fieldset>
<legend>Edit Customer</legend>
Cname 	Cadd 	Cemail 	Ccode 	Cphone 	Id 	
<?php
echo $form->input('cucode');
echo $form->input('cname');
echo $form->input('cadd');
echo $form->input('cemail');
echo $form->input('ccode');
echo $form->input('cphone');
?>
</fieldset>
<?php echo $form->end('Save');?>
