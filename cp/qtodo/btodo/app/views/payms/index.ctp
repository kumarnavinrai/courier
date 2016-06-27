<h2>Payment | Details</h2>
<?php echo $html->link('Add Task', array('action'=>'add')); ?>
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
			<th>Edit</th>
		</tr>
	<?php foreach ($payments as $pay): ?>
		<tr>
			<td>
				<?php echo $pay['Paym']['id'] ?>
			</td>
			<td>
				<?php echo $pay['Paym']['billno'] ?>
			</td>
			<td>
				<?php echo $pay['Paym']['totalamt'] ?>
			</td>
			<td>
				<?php echo $pay['Paym']['paidamt'] ?>
			</td>
			<td>
				<?php echo $pay['Paym']['obalance'] ?>
			</td>
			<td>
				<?php echo $pay['Paym']['paydate'] ?>
			</td>
			<td>
			<?php echo $html->link('Edit', array('action'=>'edit',$pay['Paym']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	
			