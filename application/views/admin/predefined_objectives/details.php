<a  href="<?php echo site_url('admin/predefined_objectives/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_objectives'); ?></h5>
<!--Data display of predefined_objectives with id--> 
<?php
	$c = $predefined_objectives;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Financial Year</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Financial_year_model');
									   $dataArr = $this->CI->Financial_year_model->get_financial_year($c['financial_year_id']);
									   echo $dataArr['financial_year_name'];?>
									</td></tr>

<tr><td>Sl No</td><td><?php echo $c['sl_no']; ?></td></tr>

<tr><td>Objectives Name</td><td><?php echo $c['objectives_name']; ?></td></tr>

<tr><td>Weight Of Objectives</td><td><?php echo $c['weight_of_objectives']; ?></td></tr>


</table>
<!--End of Data display of predefined_objectives with id//--> 