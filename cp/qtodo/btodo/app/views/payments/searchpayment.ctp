<h2>Payment | Details</h2>
<?php $sitename=Configure::read('Site.name'); ?>
<?php  echo $html->link(
					$html->image('arrow.png', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					$sitename,
					array('target'=>'_parent'), null, false
				);
			?> __ <?php echo $html->link('List All', array('action'=>'index')); ?>
<?php if(empty($payments)): ?>
There is no task in this list
<?php else: ?>
	<table>
		<tr>
			<th>ID</th>
			<th>BILL NO</th>
			<th>TOT AMOUNT</th>
			<th>PAID AMT</th>
			<th>BALANCE</th>
			<th>DATE</th>
			<th>EDIT</th>
			<th>DELETE</th>
		</tr>
	<?php foreach ($payments as $pay): ?>
		<tr>
			<td>
				<?php echo $pay['Payment']['id'] ?>
			</td>
			<td>
				<?php echo $pay['Payment']['billno'] ?>
			</td>
			<td>
				<?php echo $pay['Payment']['totalamt'] ?>
			</td>
			<td>
				<?php echo $pay['Payment']['paidamt'] ?>
			</td>
			<td>
				<?php echo $pay['Payment']['obalance'] ?>
			</td>
			<td>
				<?php echo $pay['Payment']['paydate'] ?>
			</td>
			<td>
			<?php echo $html->link('Edit', array('action'=>'edit',$pay['Payment']['id'])); ?>
			</td>
			<td>
			<?php echo $html->link('Delete', array('action'=>'delete',$pay['Payment']['id']), null, 'Are you sure you want to delete this task?'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	
			