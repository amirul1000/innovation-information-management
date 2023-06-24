<a  href="<?php echo site_url('member/final_submit_permission/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Final_submit_permission'); ?></h5>
<!--Data display of final_submit_permission with id--> 
<?php
	$c = $final_submit_permission;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Powner Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['powner_users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Financial Year</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Financial_year_model');
									   $dataArr = $this->CI->Financial_year_model->get_financial_year($c['financial_year_id']);
									   echo $dataArr['financial_year_name'];?>
									</td></tr>

<tr><td>Department</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Department_model');
									   $dataArr = $this->CI->Department_model->get_department($c['department_id']);
									   echo $dataArr['department'];?>
									</td></tr>

<tr><td>Allow Last Date</td><td><?php echo $c['allow_last_date']; ?></td></tr>

<tr><td>Submit Status</td><td><?php echo $c['submit_status']; ?></td></tr>

<tr><td>Resubmit Status</td><td><?php echo $c['resubmit_status']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of final_submit_permission with id//--> 