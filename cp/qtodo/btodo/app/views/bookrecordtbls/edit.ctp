<style type="text/css">
			/*demo page css*/
			/*body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}*/
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
#line1 {
	float: left;
	height: 100px;
	width: 920px;
	background-color: #E6E6E6;
	margin-top: 20px;
}
#line11 {
	float: left;
	height: 150px;
	width: 920px;
	background-color: #E6E6E6;
	margin-top: 20px;
}
#dtxt {
	float: left;
	height: 27px;
	width: 400px;
	text-align: left;
	padding-top: 6px;
	padding-left: 10px;
}
#ddivtxttxt {
	float: left;
	height: 25px;
	width: 400px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #036;
	text-decoration: none;
	text-align: right;
	padding-top: 5px;
	padding-right: 10px;
}
#line2 {
	float: left;
	height: 55px;
	width: 920px;
	margin-top: 10px;
	background-color: #E6E6E6;
}
#line2lbl {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #036;
	text-decoration: none;
	text-align: right;
	float: left;
	height: 22px;
	width: 400px;
	padding-top: 5px;
	padding-right: 10px;
}
#line2txt {
	float: left;
	height: 27px;
	width: 400px;
	text-align: left;
	padding-top: 5px;
	padding-left: 10px;
}
.btncss {
	color: #E6E6E6;
	background-color: #036;
	border: 1px solid #E5E5E5;
	height: auto;
	width: 150px;
}
.txtboxes {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #336;
	text-decoration: none;
	height: auto;
	width: 300px;
	border: 1px solid #B0B0B0;
}
#line2lbl a {
	color: #036;
	text-decoration: none;
}
#line2lbl a:hover {
	text-decoration: underline;
}
#bookdetail {
	float: left;
	height: auto;
	width: 920px;
	margin-top: 10px;
	background-color: #E6E6E6;
}
.bk {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #F00;
	text-decoration: none;
	text-align: center;
}
</style>
<?php echo $form->create('Bookrecordtbl');?>
<div id="wrap">
  <div id="mydiv">
    <div id="head"></div>
    <div id="line2">
      
      <div class="bk" id="line2txt">Book Issue Edit</div>
    </div>
    <div id="line1">
   
        <?php echo $form->input('date_of_book_issue',array('label'=>'Issue Date')); ?>
 
    </div>
    <div id="line2">
      
       
        <?php echo $form->input('start_cn_number',array('class'=>'txtboxes','label'=>'Start C/N Number')); ?>
      
    </div>
    <div id="line2">
            
        <?php echo $form->input('end_cn_number',array('class'=>'txtboxes','label'=>'End C/N Number')); ?>
     
    </div>
    <div id="line2">
     
        
        <?php echo $form->input('name',array('class'=>'txtboxes','label'=>'Name')); ?>
      
    </div>
    <div id="line2">
      
        
        <?php echo $form->input('address',array('class'=>'txtboxes','label'=>'Address')); ?>
     
    </div>
    <div id="line2">
      
        
        <?php echo $form->input('phone',array('class'=>'txtboxes','label'=>'Phone')); ?>
      
    </div>
    <div id="line2">
      
        
        <?php echo $form->input('email',array('class'=>'txtboxes','label'=>'Email')); ?>
      
    </div>
    <div id="line2">
      
        
       <?php echo $form->input('reason',array('class'=>'txtboxes','label'=>'Reason')); ?>
     
    </div>
    <div id="line11">
      
        
       <?php echo $form->input('comment',array('class'=>'txtboxes','label'=>'Comment')); ?>
 
    </div>
    <div id="line2">
      
        <?php echo $form->end('Save',array('class'=>'btncss','label'=>'Comment','value'=>'Save Changes'));?>
    </div>
    <div id="bookdetail">
    
    
    </div>
  </div>

</div>
