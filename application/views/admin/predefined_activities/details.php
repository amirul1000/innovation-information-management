<a  href="<?php echo site_url('admin/predefined_activities/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_activities'); ?></h5>
<!--Data display of predefined_activities with id--> 
<?php
	$c = $predefined_activities;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Predefined Objectives</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_objectives_model');
									   $dataArr = $this->CI->Predefined_objectives_model->get_predefined_objectives($c['predefined_objectives_id']);
									   echo $dataArr['sl_no'];?>
									</td></tr>

<tr><td>Activities Name</td><td><?php echo $c['activities_name']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>Sl No</td><td><?php echo $c['sl_no']; ?></td></tr>

<tr><td>Order No</td><td><?php echo $c['order_no']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of predefined_activities with id//--> 