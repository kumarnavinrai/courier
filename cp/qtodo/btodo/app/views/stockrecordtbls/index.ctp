<?php $sitename=Configure::read('Site.name');  ?>
Showing Page <?php echo $paginator->counter(); ?>
<h2>| Stock  |</h2>
<?php echo $html->link('List All Stocks', array('action'=>'index')); ?>
 
<?php if(empty($book)): ?>
There is no expense in this list
<?php else: ?>
	<table>
    
		<tr>
			<th>Stock No</th>
            <th>Stock Date</th>
			<th>Start No.</th>
			<th>End No.</th>
			<th>Comment</th>
            <th>Actions</th>
            <th>Actions</th>
            <th>Actions</th>
		</tr>
	<?php foreach ($book as $disp): ?>
		<tr>
			<td>
				<?php echo $disp['Stockrecordtbl']['id']; ?>
			</td>
			<td>
				<?php echo $disp['Stockrecordtbl']['date_of_stock_en']; ?>
			</td>
			<td>
				<?php echo $disp['Stockrecordtbl']['start_cn']; ?>
			</td>
			<td>
				<?php echo $disp['Stockrecordtbl']['end_cn']; ?>
			</td>
            <td>
				<?php echo $disp['Stockrecordtbl']['comment']; ?>
			</td>
            <?php $sn=$disp['Stockrecordtbl']['start_cn']; $ln=$disp['Stockrecordtbl']['end_cn'];  ?>
			<td>
			<?php echo $html->link('Edit', array('action'=>'edit',$disp['Stockrecordtbl']['id'])); ?>
			</td>
			<td>
			<?php echo $html->link('Delete', array('action'=>'delete',$disp['Stockrecordtbl']['id']), null, 'Are you sure you want to delete this ?'); ?>
			</td>
            <td>
            <?php echo $html->link($html->image('cake.power1.gif', array('alt'=> __("Issue Stock", true), 'border'=>"0")),$sitename.'books/index.php?sn='.$sn.'&ln='.$ln,array('target'=>'_parent'), null, false); ?>
            </td>
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	
<?php echo $paginator->prev(); ?>
<?php echo $paginator->numbers(); ?>
<?php echo $paginator->next(); ?>

