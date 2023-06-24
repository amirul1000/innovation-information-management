<a  href="<?php echo site_url('admin/predefined_innovation_plan_column_data/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_innovation_plan_column_data'); ?></h5>
<!--Data display of predefined_innovation_plan_column_data with id--> 
<?php
	$c = $predefined_innovation_plan_column_data;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Predefined Objectives Column</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_objectives_column_model');
									   $dataArr = $this->CI->Predefined_objectives_column_model->get_predefined_objectives_column($c['predefined_objectives_column_id']);
									   echo $dataArr['column_name'];?>
									</td></tr>

<tr><td>Predefined Innovation Plan</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_innovation_plan_model');
									   $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['predefined_innovation_plan_id']);
									   echo $dataArr['plan'];?>
									</td></tr>

<tr><td>Column Data</td><td><?php echo $c['column_data']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of predefined_innovation_plan_column_data with id//--> 