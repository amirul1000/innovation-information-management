<a  href="<?php echo site_url('admin/innovation_plan/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_plan'); ?></h5>
<!--Data display of innovation_plan with id--> 
<?php
	$c = $innovation_plan;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Department</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Department_model');
									   $dataArr = $this->CI->Department_model->get_department($c['department_id']);
									   echo $dataArr['department'];?>
									</td></tr>

<tr><td>Predefined Objectives</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_objectives_model');
									   $dataArr = $this->CI->Predefined_objectives_model->get_predefined_objectives($c['predefined_objectives_id']);
									   echo $dataArr['sl_no'];?>
									</td></tr>

<tr><td>Predefined Activities</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_activities_model');
									   $dataArr = $this->CI->Predefined_activities_model->get_predefined_activities($c['predefined_activities_id']);
									   echo $dataArr['activities_name'];?>
									</td></tr>

<tr><td>Predefined Innovation Plan</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_innovation_plan_model');
									   $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['predefined_innovation_plan_id']);
									   echo $dataArr['plan'];?>
									</td></tr>

<tr><td>Performance Indicators</td><td><?php echo $c['performance_indicators']; ?></td></tr>

<tr><td>Weight Of Plan</td><td><?php echo $c['weight_of_plan']; ?></td></tr>

<tr><td>Half Yearly Evaluation</td><td><?php echo $c['half_yearly_evaluation']; ?></td></tr>

<tr><td>Half Yearly Evaluation Date</td><td><?php echo $c['half_yearly_evaluation_date']; ?></td></tr>

<tr><td>Half Yearly Evaluation Comments</td><td><?php echo $c['half_yearly_evaluation_comments']; ?></td></tr>

<tr><td>Yearly Evaluation</td><td><?php echo $c['yearly_evaluation']; ?></td></tr>

<tr><td>Yearly Evaluation Date</td><td><?php echo $c['yearly_evaluation_date']; ?></td></tr>

<tr><td>Yearly Evaluation Comments</td><td><?php echo $c['yearly_evaluation_comments']; ?></td></tr>

<tr><td>Final Evaluation</td><td><?php echo $c['final_evaluation']; ?></td></tr>

<tr><td>Final Evaluation Date</td><td><?php echo $c['final_evaluation_date']; ?></td></tr>

<tr><td>Final Evaluation Comments</td><td><?php echo $c['final_evaluation_comments']; ?></td></tr>

<tr><td>Final Evaluator Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['final_evaluator_users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Submission</td><td><?php echo $c['submission']; ?></td></tr>

<tr><td>Submitted Date</td><td><?php echo $c['submitted_date']; ?></td></tr>

<tr><td>Completed Date</td><td><?php echo $c['completed_date']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of innovation_plan with id//--> 