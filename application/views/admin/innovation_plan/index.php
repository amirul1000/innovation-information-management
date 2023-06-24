<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_plan'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/innovation_plan/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/innovation_plan/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/innovation_plan/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//--> 
   
<!--Data display of innovation_plan-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Users</th>
<!--<th>Department</th>
<th>Predefined Objectives</th>
<th>Predefined Activities</th>-->
<th>Predefined Innovation Plan</th>
<th>Performance Indicators</th>
<th>Weight Of Plan</th>
<th>Half Yearly Evaluation</th>
<!--<th>Half Yearly Evaluation Date</th>
<th>Half Yearly Evaluation Comments</th>-->
<th>Yearly Evaluation</th>
<!--<th>Yearly Evaluation Date</th>
<th>Yearly Evaluation Comments</th>-->
<th>Final Evaluation</th>
<!--<th>Final Evaluation Date</th>
<th>Final Evaluation Comments</th>-->
<th>Submission</th>
<th>Submitted Date</th>
<th>Completed Date</th>

		<th>Actions</th>
    </tr>
	<?php foreach($innovation_plan as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td>
<!--<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Department_model');
									   $dataArr = $this->CI->Department_model->get_department($c['department_id']);
									   echo $dataArr['department'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_objectives_model');
									   $dataArr = $this->CI->Predefined_objectives_model->get_predefined_objectives($c['predefined_objectives_id']);
									   echo $dataArr['sl_no'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_activities_model');
									   $dataArr = $this->CI->Predefined_activities_model->get_predefined_activities($c['predefined_activities_id']);
									   echo $dataArr['activities_name'];?>
									</td>-->
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_innovation_plan_model');
									   $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['predefined_innovation_plan_id']);
									   echo $dataArr['plan'];?>
									</td>
<td><?php echo $c['performance_indicators']; ?></td>
<td><?php echo $c['weight_of_plan']; ?></td>
<td><?php echo $c['half_yearly_evaluation']; ?></td>
<!--<td><?php echo $c['half_yearly_evaluation_date']; ?></td>
<td><?php echo $c['half_yearly_evaluation_comments']; ?></td>-->
<td><?php echo $c['yearly_evaluation']; ?></td>
<!--<td><?php echo $c['yearly_evaluation_date']; ?></td>
<td><?php echo $c['yearly_evaluation_comments']; ?></td>-->
<td><?php echo $c['final_evaluation']; ?></td>
<!--<td><?php echo $c['final_evaluation_date']; ?></td>
<td><?php echo $c['final_evaluation_comments']; ?></td>-->
<td><?php echo $c['submission']; ?></td>
<td><?php echo $c['submitted_date']; ?></td>
<td><?php echo $c['completed_date']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/innovation_plan/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/innovation_plan/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/innovation_plan/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of innovation_plan//--> 

<!--No data-->
<?php
	if(count($innovation_plan)==0){
?>
 <div align="center"><h3>Data does not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
