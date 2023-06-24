<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_plan'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of innovation_plan-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Users</th>
<th>Department</th>
<th>Predefined Objectives</th>
<th>Predefined Activities</th>
<th>Predefined Innovation Plan</th>
<th>Performance Indicators</th>
<th>Weight Of Plan</th>
<th>Half Yearly Evaluation</th>
<th>Half Yearly Evaluation Date</th>
<th>Half Yearly Evaluation Comments</th>
<th>Yearly Evaluation</th>
<th>Yearly Evaluation Date</th>
<th>Yearly Evaluation Comments</th>
<th>Final Evaluation</th>
<th>Final Evaluation Date</th>
<th>Final Evaluation Comments</th>
<th>Final Evaluator Users</th>
<th>Submission</th>
<th>Submitted Date</th>
<th>Completed Date</th>

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
<td><?php
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
									</td>
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
<td><?php echo $c['half_yearly_evaluation_date']; ?></td>
<td><?php echo $c['half_yearly_evaluation_comments']; ?></td>
<td><?php echo $c['yearly_evaluation']; ?></td>
<td><?php echo $c['yearly_evaluation_date']; ?></td>
<td><?php echo $c['yearly_evaluation_comments']; ?></td>
<td><?php echo $c['final_evaluation']; ?></td>
<td><?php echo $c['final_evaluation_date']; ?></td>
<td><?php echo $c['final_evaluation_comments']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['final_evaluator_users_id']);
									   echo $dataArr['email'];?>
									</td>
<td><?php echo $c['submission']; ?></td>
<td><?php echo $c['submitted_date']; ?></td>
<td><?php echo $c['completed_date']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of innovation_plan//--> 