<h2>| Release Bill Edit |</h2>
<?php $sitename=Configure::read('Site.name');  ?>
Showing Page <?php echo $paginator->counter(); ?>
<?php  ?>--<?php echo $html->link('List All Bills', array('action'=>'index')); ?>
--<?php echo $html->link('Go Back To Main Site',$sitename); ?>
<?php if(empty($relea)): ?>
There is no task in this list
<?php else: ?>
	<table>
		<tr>
			<th>BILL NO</th>
			<th>CUSTOMER CODE</th>
			<th>FROM DATE</th>
			<th>TO DATE</th>
            <th>AMOUNT</th>
			<th>PAID OR NOT</th>
			<th>BILL AMT</th>
			<th>EDIT</th>
			<th>DELETE</th>
		</tr>
	<?php foreach ($relea as $disp): ?>
		<tr>
			<td>
				<?php echo $disp['Releasebill']['id'] ?>
			</td>
			<td>
				<?php echo $disp['Releasebill']['cucode'] ?>
			</td>
			<td>
				<?php echo $disp['Releasebill']['fd'] ?>
			</td>
			<td>
				<?php echo $disp['Releasebill']['td'] ?>
			</td>
			<td>
				<?php echo $disp['Releasebill']['ba'] ?>
			</td>
			<td>
				<?php echo $disp['Releasebill']['paid'] ?>
			</td>
            <td>
				<?php echo $disp['Releasebill']['billam'] ?>
			</td>
			<td>
			<?php echo $html->link('Edit', array('action'=>'edit',$disp['Releasebill']['id'])); ?>
			</td>
			<td>
			<?php echo $html->link('Delete', array('action'=>'delete',$disp['Releasebill']['id']), null, 'Are you sure you want to delete this task?'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	
<?php echo $paginator->prev(); ?>
<?php echo $paginator->numbers(); ?>
<?php echo $paginator->next(); ?>