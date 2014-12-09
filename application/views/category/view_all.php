

<table cellpadding=0 cellspacing=10>
    <tr>
	<td>Category ID</td>
	<td>Category Name</td>
	<td></td>
	<td></td>
    </tr>
	<?php foreach ($category_list as $category):?>
		<tr>
		    <td><?php echo $category['category_id'];?></td>
		    <td><?php echo $category['category_name'];?></td>			
		    <td>
			<?php echo anchor("category/edit_category/".$category['category_id'], 'Update') ;?><br />                
		    </td>
		    <td>
			<?php echo anchor("category/delete_category/".$category['category_id'], 'Delete') ;?><br />                
		    </td>			
		</tr>
	<?php endforeach;?>
</table>
<p><?php echo anchor('category/create_category', 'Create Category')?> | <?php echo anchor('category/','View All');?></p>