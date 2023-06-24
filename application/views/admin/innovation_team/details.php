<a  href="<?php echo site_url('admin/innovation_team/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_team'); ?></h5>
<!--Data display of innovation_team with id--> 
<?php
	$c = $innovation_team;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Owner Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['owner_users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Department</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Department_model');
									   $dataArr = $this->CI->Department_model->get_department($c['department_id']);
									   echo $dataArr['department'];?>
									</td></tr>

<tr><td>Email</td><td><?php echo $c['email']; ?></td></tr>

<tr><td>Password</td><td><?php echo $c['password']; ?></td></tr>

<tr><td>First Name</td><td><?php echo $c['first_name']; ?></td></tr>

<tr><td>Last Name</td><td><?php echo $c['last_name']; ?></td></tr>

<tr><td>File Picture</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['file_picture'])&&file_exists(APPPATH.'../public/'.$c['file_picture']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['file_picture']?>" class="picture_50x50">
										  <?php
											}
											else
											{
										?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg" class="picture_50x50">
										<?php		
											}
										  ?>	
										</td></tr>

<tr><td>Phone No</td><td><?php echo $c['phone_no']; ?></td></tr>

<tr><td>Company</td><td><?php echo $c['company']; ?></td></tr>

<tr><td>Address</td><td><?php echo $c['address']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>

<tr><td>User Type</td><td><?php echo $c['user_type']; ?></td></tr>

<tr><td>Status</td><td><?php echo $c['status']; ?></td></tr>


</table>
<!--End of Data display of innovation_team with id//--> 