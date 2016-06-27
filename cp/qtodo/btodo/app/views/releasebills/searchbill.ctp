<h2>| Release Bill Edit |</h2>
<?php echo $html->link('Add', array('action'=>'add')); ?>-- <?php $sitename=Configure::read('Site.name'); ?>
<?php  echo $html->link(
					$html->image('arrow.png', array('alt'=> __("Go Back To Main Site", true), 'border'=>"0")),
					$sitename,
					array('target'=>'_parent'), null, false
				);
			?> __ <?php echo $html->link('List All', array('action'=>'index')); ?>
<?php if(empty($rele)): ?>
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
	<?php foreach ($rele as $disp): ?>
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