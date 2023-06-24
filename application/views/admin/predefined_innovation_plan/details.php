<a  href="<?php echo site_url('admin/predefined_innovation_plan/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_innovation_plan'); ?></h5>
<!--Data display of predefined_innovation_plan with id--> 
<?php
	$c = $predefined_innovation_plan;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Predefined Activities</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_activities_model');
									   $dataArr = $this->CI->Predefined_activities_model->get_predefined_activities($c['predefined_activities_id']);
									   echo $dataArr['activities_name'];?>
									</td></tr>

<tr><td>Plan</td><td><?php echo $c['plan']; ?></td></tr>

<tr><td>Performance Indicators</td><td><?php echo $c['performance_indicators']; ?></td></tr>

<tr><td>Weight Of Plan</td><td><?php echo $c['weight_of_plan']; ?></td></tr>

<tr><td>Sl No</td><td><?php echo $c['sl_no']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of predefined_innovation_plan with id//--> 