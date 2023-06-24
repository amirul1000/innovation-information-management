<a  href="<?php echo site_url('admin/financial_year/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Financial_year'); ?></h5>
<!--Data display of financial_year with id--> 
<?php
	$c = $financial_year;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Financial Year Name</td><td><?php echo $c['financial_year_name']; ?></td></tr>

<tr><td>Status</td><td><?php echo $c['status']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of financial_year with id//--> 