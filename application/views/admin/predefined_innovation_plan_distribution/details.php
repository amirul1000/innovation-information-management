<a  href="<?php echo site_url('admin/predefined_innovation_plan_distribution/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_innovation_plan_distribution'); ?></h5>
<!--Data display of predefined_innovation_plan_distribution with id--> 
<?php
	$c = $predefined_innovation_plan_distribution;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Predefined Innovation Plan</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_innovation_plan_model');
									   $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['predefined_innovation_plan_id']);
									   echo $dataArr['performance_indicators'];?>
									</td></tr>

<tr><td>Predefined Innovation Plan Value</td><td><?php echo $c['predefined_innovation_plan_value']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of predefined_innovation_plan_distribution with id//--> 