<a  href="<?php echo site_url('admin/department/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Department'); ?></h5>
<!--Data display of department with id--> 
<?php
	$c = $department;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Department</td><td><?php echo $c['department']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>


</table>
<!--End of Data display of department with id//--> 