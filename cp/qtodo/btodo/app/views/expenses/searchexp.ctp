<h2>| Expenses Edit |</h2>
<?php  ?> <?php echo $html->link('List All EXPENSES', array('action'=>'index')); ?>
--<?php echo $html->link(
					$html->image('cake.power1.gif', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					'http://localhost/cp/',
					array('target'=>'_parent'), null, false
				);
			?>
<?php if(empty($exp)): ?>
There is no expense in this list
<?php else: ?>
	<table>
		<tr>
			<th>EXPENSE NO</th>
			<th>EXPENSE DESCRIPTION</th>
			<th>EXPENSE AMOUNT</th>
			<th>EXPENSE DATE</th>
            <th>EDIT</th>
			<th>DELETE</th>
		</tr>
	<?php foreach ($exp as $disp): ?>
		<tr>
			<td>
				<?php echo $disp['Expense']['id'] ?>
			</td>
			<td>
				<?php echo $disp['Expense']['expensedesc'] ?>
			</td>
			<td>
				<?php echo $disp['Expense']['expamt'] ?>
			</td>
			<td>
				<?php echo $disp['Expense']['exdate'] ?>
			</td>
			<td>
			<?php echo $html->link('Edit', array('action'=>'edit',$disp['Expense']['id'])); ?>
			</td>
			<td>
			<?php echo $html->link('Delete', array('action'=>'delete',$disp['Expense']['id']), null, 'Are you sure you want to delete this ?'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	