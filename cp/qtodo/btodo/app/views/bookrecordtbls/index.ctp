<?php $sitename=Configure::read('Site.name');  ?>
Showing Page <?php echo $paginator->counter(); ?>
<h2>| Book Issue |</h2>
<?php echo $html->link('List All Issued Books', array('action'=>'index')); ?>
 
<?php if(empty($book)): ?>
There is no expense in this list
<?php else: ?>
	<table>
    
		<tr>
           
            <th>Actions</th>
            <th>Actions</th>
            <th>Actions</th>
			<th>Issue No</th>
            <th>Issue Date</th>
			<th>Start No.</th>
			<th>End No.</th>
			<th>Name</th>
            <th>Address</th>
			<th>Phone</th>
            <th>Email</th>
            <th>Reason</th>
			<th>Comment</th>
            
		</tr>
	<?php foreach ($book as $disp): ?>
		<tr>
        <?php $sn=$disp['Bookrecordtbl']['start_cn_number']; $ln=$disp['Bookrecordtbl']['end_cn_number']; $idate=$disp['Bookrecordtbl']['date_of_book_issue']; ?>
			<td>
			<?php echo $html->link('Edit', array('action'=>'edit',$disp['Bookrecordtbl']['id'])); ?>
			</td>
			<td>
			<?php echo $html->link('Delete', array('action'=>'delete',$disp['Bookrecordtbl']['id']), null, 'Are you sure you want to delete this ?'); ?>
			</td>
            <td>
            <?php echo $html->link($html->image('cake.power1.gif', array('alt'=> __("Check Book", true), 'border'=>"0")),$sitename.'booksearch/checkb.php?sn='.$sn.'&ln='.$ln.'&sd='.$idate,array('target'=>'_parent'), null, false); ?>
            </td>
			<td>
				<?php echo $disp['Bookrecordtbl']['id']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['date_of_book_issue']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['start_cn_number']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['end_cn_number']; ?>
			</td>
            <td>
				<?php echo $disp['Bookrecordtbl']['name']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['address']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['phone']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['email']; ?>
			</td>
            <td>
				<?php echo $disp['Bookrecordtbl']['reason']; ?>
			</td>
			<td>
				<?php echo $disp['Bookrecordtbl']['comment']; ?>
			</td>
            
		</tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>	
<?php echo $paginator->prev(); ?>
<?php echo $paginator->numbers(); ?>
<?php echo $paginator->next(); ?>

