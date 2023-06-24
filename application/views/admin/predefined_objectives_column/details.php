<a  href="<?php echo site_url('admin/predefined_objectives_column/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_objectives_column'); ?></h5>
<!--Data display of predefined_objectives_column with id--> 
<?php
	$c = $predefined_objectives_column;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Financial Year</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Financial_year_model');
									   $dataArr = $this->CI->Financial_year_model->get_financial_year($c['financial_year_id']);
									   echo $dataArr['financial_year_name'];?>
									</td></tr>

<tr><td>Column Name</td><td><?php echo $c['column_name']; ?></td></tr>

<tr><td>In Percent</td><td><?php echo $c['in_percent']; ?></td></tr>

<tr><td>Order No</td><td><?php echo $c['order_no']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of predefined_objectives_column with id//--> 