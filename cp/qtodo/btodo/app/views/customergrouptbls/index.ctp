<h2>Group | Details</h2>
<?php if(empty($abc)): ?>
There is no task in this list
<?php else: ?>
	<table>
		<tr>
			<th>ID</th>
			<th>Group</th>
			<th>DELETE</th>
		</tr>
	<?php foreach ($abc as $pay): ?>
		<tr>
			<td>
				<?php echo $pay['Customergrouptbl']['id'] ?>
			</td>
			<td>
				<?php echo $pay['Customergrouptbl']['cust_group'] ?>
			</td>
			<td>
			<?php echo $html->link('Delete', array('action'=>'delete',$pay['Customergrouptbl']['id']), null, 'Are you sure you want to delete this task?'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	
			