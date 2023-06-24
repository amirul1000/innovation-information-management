<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<h5 class="font-20 mt-15 mb-1"><?php echo tr_en_bn(str_replace('_',' ','Innovation_plan')); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
		
		$this->CI = & get_instance();
		$this->CI->load->database();
	   $this->CI->db->where('powner_users_id', get_user_owner());
	   $this->CI->db->where('financial_year_id', $this->session->userdata('financial_year_id'));
	   $this->CI->db->where('department_id', $this->session->userdata('department_id'));
       $resfinalsub = $this->CI->db->get('final_submit_permission')->result_array();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
	
	
?>

<a href="javascript:void();" id="id_2_btn"  onClick="showHide_div('id_2');"><i class="fa fa-minus"></i></a>
 
<div class="card" id="id_2">
   <div class="card-body">   
   <?php
    if( $this->session->userdata('user_type')=='admin'){
   ?>
    <div class="form-group"> 
         <label for="Innovation Plan" class="col-md-8 control-label"><?=tr_en_bn('Organization')?></label> 
         <div class="col-md-8"> 
        <?php
       
		$this->CI->db->from('users');
		$this->CI->db->distinct();
		$this->CI->db->select('department.*');
        $this->CI->db->order_by('department', 'asc');
		$this->CI->db->join('department','department.id=users.department_id','left');
		$this->CI->db->where('owner_users_id', $this->session->userdata('id'));
        $resdepartment = $this->CI->db->get()->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
        ?>        
        <select name="department_id" id="department_id" onChange="setSelecteddepartment(this.value);">
              <option value="">Select</option>
              <?php
				for ($i = 0; $i < count($resdepartment); $i ++) {
					?>
					 <option value="<?=$resdepartment[$i]['id']?>" <?php if($this->session->userdata('selected_department_id')==$resdepartment[$i]['id']){echo "selected";}?>><?=$resdepartment[$i]['department']?></option>
				  <?php
				}
				?>
        </select>
	</div>
  </div>
  
  <div class="form-group"> 
         <label for="Innovation Plan" class="col-md-8 control-label"><?=tr_en_bn('Member')?></label> 
         <div class="col-md-8"> 
        <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->db->order_by('first_name', 'asc');
		$this->CI->db->where('department_id',$this->session->userdata('selected_department_id'));
		if( $this->session->userdata('evaluator')==true){
			$this->CI->db->where('owner_users_id', $this->session->userdata('id'));
		}
        $resusers = $this->CI->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
        ?>        
        <select name="users_id" id="users_id" onChange="setSelectedusers(this.value);">
              <option value="">Select</option>
              <?php
				for ($i = 0; $i < count($resusers); $i ++) {
					?>
					 <option value="<?=$resusers[$i]['id']?>" <?php if($this->session->userdata('selected_users_id')==$resusers[$i]['id']){echo "selected";}?>><?=$resusers[$i]['first_name']?> <?=$resusers[$i]['last_name']?></option>
				  <?php
				}
				?>
        </select>
	</div>
  </div>
  <?php
	}
  ?>	
  <div class="form-group"> 
         <label for="Innovation Plan" class="col-md-8 control-label"><?=tr_en_bn('Financial year')?></label> 
         <div class="col-md-8"> 
        <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->db->order_by('financial_year_name', 'asc');
        $resfinancial_year = $this->CI->db->get('financial_year')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
        ?>        
        <select name="financial_year_id" id="financial_year_id" onChange="setYear(this.value)">
              <option value="">Select</option>
              <?php
				for ($i = 0; $i < count($resfinancial_year); $i ++) {
					?>
					 <option value="<?=$resfinancial_year[$i]['id']?>" <?php if($this->session->userdata('financial_year_id')==$resfinancial_year[$i]['id']){echo "selected";}?>><?=$resfinancial_year[$i]['financial_year_name']?></option>
				  <?php
				}
				?>
        </select>
	</div>
</div>
</div>
</div>

<div class="row h">
    <div class="col-md-3">
      <?php
	    $this->load->helper('utility'); 
		$respinplan = get_plan($this->session->userdata('financial_year_id'));
		$this->load->helper('utility'); 
		$total_weight = get_total_weight($this->session->userdata('financial_year_id'));
	  ?>
      Total Plan : <?=eng_to_bengali_number(count($respinplan))?> <br> 
      Total Plan Weight:<?php echo eng_to_bengali_number($total_weight);?> <br> 
      Total Submitted : <?=eng_to_bengali_number(count($innovation_plan))?>
    </div>
    <div  class="col-md-9">
       <div id="chart" style="width: auto; height: 300px;"></div>
    </div>
</div>
<style>
 .no-data{
	 color:red;
 }
 .half-data{
	 color:magenta;
 }
 .full-data{
	 color:yellow;
 }
 .data{
	 color:green;
 }
</style>
<div> 
   <fieldset>
      1.<label class="no-data">pending</label>->
      2.<label class="half-data">half year submitted</label>->
      3.<label class="full-data">full year submitted</label>->
      4.<label  class="data">completed</label>
  </fieldset>
</div>   
<!--Data display of innovation_plan-->       
<table class="table table-striped table-bordered h">
    <tr>
		<!--<th>Users</th>
        <th>Department</th>
        <th>Predefined Objectives</th>
        <th>Predefined Activities</th>-->
        <th><?=tr_en_bn('Predefined Innovation Plan')?></th>
        <th><?=tr_en_bn('Performance Indicators')?></th>
        <th><?=tr_en_bn('Weight Of Plan')?></th>
        <th><?=tr_en_bn('Half Yearly Evaluation')?></th>
		<th><?=tr_en_bn('Half Yearly Final Evaluation')?></th>  
        <th><?=tr_en_bn('Yearly Evaluation')?></th>
        <th><?=tr_en_bn('Final Evaluation')?></th>
        <th><?=tr_en_bn('Submission')?></th>
        <th><?=tr_en_bn('Attached')?></th>
		<th><?=tr_en_bn('Actions')?></th>
    </tr>
	<?php 
	$total_weight_of_plan = 0;
	$total_half_yearly_evaluation =0;
	$total_half_yearly_final_evaluation =0; 
	$total_yearly_evaluation =0;
	$total_final_evaluation =0;
	
	foreach($innovation_plan as $c){ 
	
	    $total_weight_of_plan =  $total_weight_of_plan+$c['weight_of_plan'];
		$total_half_yearly_evaluation =$total_half_yearly_evaluation+$c['half_yearly_evaluation'];
		$total_half_yearly_final_evaluation =$total_half_yearly_final_evaluation+$c['half_yearly_final_evaluation'];
		$total_yearly_evaluation =$total_yearly_evaluation+$c['yearly_evaluation'];
		$total_final_evaluation =$total_final_evaluation+$c['final_evaluation'];
	?>
    <tr>
		<!--<td><?php
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
			   echo $dataArr['objectives_name'];?>
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
			   echo '['.eng_to_bengali_number($dataArr['sl_no']).']'.$dataArr['plan'];?>
			</td>
            <td><?php echo $c['performance_indicators']; ?></td>
            <td><?php echo eng_to_bengali_number($c['weight_of_plan']); ?></td>
            <td><?php echo eng_to_bengali_number($c['half_yearly_evaluation']); ?></td>
			<td><?php echo eng_to_bengali_number($c['half_yearly_final_evaluation']); ?></td>
            <td><?php echo eng_to_bengali_number($c['yearly_evaluation']); ?></td>
            <td><?php echo eng_to_bengali_number($c['final_evaluation']); ?></td>
            <td><?php echo $c['submission']; ?></td>
            <td><?php 
			        $this->db->order_by('id', 'desc');
					$this->db->where('innovation_plan_id', $c['id']);
					$resdoc = $this->db->get('documents')->result_array();
					$db_error = $this->db->error();
					if (!empty($db_error['code'])){
						echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
						exit;
					}
					foreach($resdoc as $doc){						
					?>	
			        <a href="<?php echo base_url().'public/'.$doc['file_picture']?>" target="_blank"><i class="fa fa-download"></i><?=$doc['document_file_type']?></a><br>
                    <?php 
					}
			
			    ?>
             </td>

		<td>
            <?php
			        $css ='no-data';	
					$title ='pending';				
					if($c['submission']==''){
						$css ='no-data';
					}
					else if($c['submission']=='half year submitted'){
						$css ='half-data';
						$title ='half year submitted';
					}else if($c['submission']=='full year submitted'){
						$css ='full-data';
						$title ='full year submitted';
					}else if($c['submission']=='completed'){
						$css ='data';
						$title ='completed';
					}
				
			?>
            <?php
			  if(count($resfinalsub)==0 || $resfinalsub[0]['resubmit_status']=='accept' || $_SESSION['user_type']=='admin'){
		     ?>
            <a href="<?php echo site_url('member/innovation_plan/details/'.$c['id']); ?>"  title="<?=$title?>" class="action-icon"> <i class="zmdi zmdi-eye <?=$css?>"></i></a>
            <a href="<?php echo site_url('member/innovation_plan/view_evaluation/'.$c['predefined_innovation_plan_id']); ?>"  title="<?=$title?>" class="action-icon"> <i class="zmdi zmdi-edit <?=$css?>"></i></a>
            <!--<a href="<?php echo site_url('member/innovation_plan/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>-->
            <a href="<?php echo site_url('member/innovation_plan/remove/'.$c['id']); ?>"  title="<?=$title?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete <?=$css?>"></i></a>
            <?php
			  }
			?>  
        </td>
    </tr>
	<?php } ?>
    
      
    <?php
    	foreach($innovation_plan_no_sub as $c){
	?>
    <tr style="background:#FFEFEA;">
            <td><?php
			   $this->CI =& get_instance();
			   $this->CI->load->database();	
			   $this->CI->load->model('Predefined_innovation_plan_model');
			   $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['id']);
			   echo '['.eng_to_bengali_number($dataArr['sl_no']).']'.$dataArr['plan'];?>
			</td>
            <td><?php echo $c['performance_indicators']; ?></td>
            <td><strike><?php echo eng_to_bengali_number($c['weight_of_plan']); ?></strike></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
            <td>pending</td>
            <td>
             </td>
		<td>
		      <?php  if($_SESSION['user_type']=='organization' && (count($resfinalsub)==0 || $resfinalsub[0]['resubmit_status']=='accept')){?>
            <a href="<?php echo site_url('member/innovation_plan/view_evaluation/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-edit  no-data"></i></a>
			  <?php
			     }
			  ?>
		 </td>
    </tr>
	<?php } ?>
    
    
    
    
    
    <?php
	  $this->load->helper('utility'); 
	  $column = get_column($this->session->userdata('financial_year_id'));
	 /* echo "<pre>";
	  print_r($column);
	   echo "</pre>";*/
	  $total_half_yearly_evaluation_column_name ='';
	  $total_yearly_evaluation_column_name ='';
	  $total_final_evaluation_column_name ='';
	  $total_yearly_evaluation_ministry_column_name ='';
	  $total_yearly_evaluation_cabinet_column_name ='';
	  
	  $total_half_yearly_evaluation_percent = $total_half_yearly_evaluation*(100/$total_weight);
	  $total_yearly_evaluation_percent = $total_yearly_evaluation*(100/$total_weight);
	  $total_final_evaluation_percent = $total_final_evaluation*(100/$total_weight);
	  
	  for($j=0;$j<count($column)-1;$j++){
		  $equal = (float)$column[$j]['in_percent'];
		  $greater = (float)$column[$j]['in_percent'];
		  $less = (float)$column[$j+1]['in_percent'];
		  if($j==count($column)){
		   $less = 0;
		  }
		  //1
		  if($total_half_yearly_evaluation_percent==$equal){
			$total_half_yearly_evaluation_column_name =  $column[$j]['column_name'].' '.eng_to_bengali_number($column[$j]['in_percent']).'%'; 
		  }
		  else  if($total_half_yearly_evaluation_percent<$greater && 
		          $total_half_yearly_evaluation_percent>=$less){
			    $total_half_yearly_evaluation_column_name =  $column[$j+1]['column_name'].' '.eng_to_bengali_number($column[$j+1]['in_percent']).'%'; 
		  }
		  //2
		  if($total_yearly_evaluation_percent==$equal){
			$total_yearly_evaluation_column_name =  $column[$j]['column_name'].' '.eng_to_bengali_number($column[$j]['in_percent']).'%'; 
		  }
		  else  if($total_yearly_evaluation_percent<$greater && 
		          $total_yearly_evaluation_percent>=$less){
			    $total_yearly_evaluation_column_name =  $column[$j+1]['column_name'].' '.eng_to_bengali_number($column[$j+1]['in_percent']).'%'; 
		  }
		  //3
		  if($total_final_evaluation_percent==$equal){
			$total_final_evaluation_column_name =  $column[$j]['column_name'].' '.eng_to_bengali_number($column[$j]['in_percent']).'%';  
		  }
		  else  if($total_final_evaluation_percent<$greater && 
		          $total_final_evaluation_percent>=$less){
			    $total_final_evaluation_column_name =  $column[$j+1]['column_name'].' '.eng_to_bengali_number($column[$j+1]['in_percent']).'%'; 
		  }
	  }
	 
	
	?>
    <tr>
		
        <td></td>
        <td>Total</td>
        <td><?=eng_to_bengali_number($total_weight_of_plan)?></td>
        <td>
		    <?=eng_to_bengali_number($total_half_yearly_evaluation)?></td>  
        <td><?=eng_to_bengali_number($total_half_yearly_final_evaluation)?></td>  			
        <td><?=eng_to_bengali_number($total_yearly_evaluation)?></td>       
        <td><?=eng_to_bengali_number($total_final_evaluation)?></td>
		<td></td>
    </tr>
    <tr>
        <td></td>
        <td>Grade</td>
        <td><?=eng_to_bengali_number($column[0]['in_percent'])?>%(<?=eng_to_bengali_number($total_weight)?>)</td>
        <td><?=$total_half_yearly_evaluation_column_name?>
		    </td>
		<td><!--Set data--></td>	
        <td><?=$total_yearly_evaluation_column_name?></td>        
        <td><?=$total_final_evaluation_column_name?></td>
        <td><?=$total_yearly_evaluation_ministry_column_name?></td>
        <td><?=$total_yearly_evaluation_cabinet_column_name?></td>
		<td></td>
    </tr>
</table>
<!--End of Data display of innovation_plan//--> 
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
            <?php echo form_open_multipart('member/innovation_plan/final_submit',array("class"=>"form-horizontal")); ?>
          
          
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="id" value="<?=$resfinalsub[0]['id']?>">
                        <button type="submit" class="btn btn-info"><?php if(count($resfinalsub)==0 || $resfinalsub[0]['resubmit_status']=='accept'){?> Final Submit <?php }else{ ?>Request Resubmit<?php } ?></button>
                    </div>
                </div>
          
          
		    <?php echo form_close(); ?>
            
        </div>
   </div>
</div>        
<!--No data-->
<?php
	//if(count($innovation_plan)==0){
?>
 <!--<div align="center"><h3>Data does not exists</h3></div>-->
<?php
	//}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	//echo $link;
?>
<!--End of Pagination//-->
<script>
  function setSelecteddepartment(department_id){
	window.location.href = '<?php echo site_url('member/innovation_plan/set_department/'); ?>'+department_id;
	
   }

	function setSelectedusers(users_id){
		window.location.href = '<?php echo site_url('member/innovation_plan/set_users/'); ?>'+users_id;
		
	}
 
  function setYear(financial_year_id){
    window.location.href = '<?php echo site_url('member/innovation_plan/set_financial_year/'); ?>'+financial_year_id;
  }
  function showHide_div(id) {
		  var x = document.getElementById(id);
		  if (x.style.display === "none") {
			x.style.display = "block";
			$("#"+id+'_btn').html('<i class="fa fa-minus"></i>');
		  } else {
			x.style.display = "none";
			$("#"+id+'_btn').html('<i class="fa fa-plus"></i>');
		  }
		}	
<?php
    if( $this->session->userdata('user_type')=='admin'){
   ?>		
$(document).ready(function() { 
 if($("#department_id").val()==''){
	    toastr.options.timeOut = 3000;
		toastr.error("Please select a department");
		$(".h").hide();
		return false;
   }
   if($("#users_id").val()==''){
	   toastr.options.timeOut = 3000;
	   toastr.error("Please select a member");
	   $(".h").hide();
	   return false;
   }
});
<?php
	}
?>	
</script>
 <script type="text/javascript">
$( document ).ready(function() {

 google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

	var data1 = google.visualization.arrayToDataTable([
	  ['Task', '<?=tr_en_bn('Evaluation')?>',{ role: 'style' }],
	  ['<?=tr_en_bn('Weight Of Plan')?>',     <?php echo isset($total_weight)?$total_weight:0?>,'green'],
	  ['<?=tr_en_bn('Half Yearly Evaluation')?>',      <?php echo isset($total_half_yearly_evaluation)?$total_half_yearly_evaluation:0?>,'blue'],
	  ['<?=tr_en_bn('Yearly Evaluation')?>',      <?php echo isset($total_yearly_evaluation)?$total_yearly_evaluation:0; ?>,'magenta'],
	  ['<?=tr_en_bn('Final Evaluation')?>',      <?php echo isset($total_final_evaluation)?$total_final_evaluation:0; ?>,'yellow'],
	]);

	var options1 = {
	  title: '<?=tr_en_bn('Evaluation')?>'
	};

	var chart1 = new google.visualization.BarChart(document.getElementById('chart'));

	chart1.draw(data1, options1);
	
	

  }
  });
</script>