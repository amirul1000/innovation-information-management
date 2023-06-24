<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<h5 class="font-20 mt-15 mb-1"><?php echo tr_en_bn(str_replace('_',' ','report_compare')); ?></h5>
<style>


</style>
<?php
  	echo $this->session->flashdata('msg');
	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>

<a href="javascript:void();" id="id_2_btn"  onClick="showHide_div('id_2');"><i class="fa fa-minus"></i></a>
 
<div class="card" id="id_2">
   <div class="card-body">   
   
    
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

 
<!--Data display of report_compare-->       

	<?php 
	$total_weight_of_plan = 0;
	$total_half_yearly_evaluation =0;
	$total_yearly_evaluation =0;
	$total_final_evaluation =0;
	
	foreach($report_compare as $c){ 
	
	    $total_weight_of_plan =  $total_weight_of_plan+$c['weight_of_plan'];
		$total_half_yearly_evaluation =$total_half_yearly_evaluation+$c['half_yearly_evaluation'];
		$total_yearly_evaluation =$total_yearly_evaluation+$c['yearly_evaluation'];
		$total_final_evaluation =$total_final_evaluation+$c['final_evaluation'];
	?>
   
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
	
<table border="1" cellspacing="3" cellpadding="3" align="center" padding="5" style="margin-left:auto;margin-right:auto; ">	
     <tr>
		
        <td><?=tr_en_bn('Organization')?></td>
        
        <td><?=tr_en_bn('Final Evaluation')?></td>
		<td></td>
    </tr>
	
   <?php

            $dept = array();
			foreach($department as $each){
				$dept[] = "'".$each['id']."'";
			}
			if(count($dept)==0){
				$dept[] = "'-1'";
			}


            $this->db->order_by('final_evaluation', 'asc');
			$this->db->select('sum(innovation_plan.final_evaluation) as final_evaluation,department.department');
			//$this->db->where('innovation_plan.department_id', $department[$i]['id']);
			$this->db->where('innovation_plan.department_id in ('.implode(',',$dept).')');
			$this->db->join('department', 'department.id = innovation_plan.department_id', 'left');
			
			$this->db->where('financial_year_id', $this->session->userdata('financial_year_id'));
			$this->db->join('predefined_innovation_plan', 'predefined_innovation_plan.id = innovation_plan.predefined_innovation_plan_id', 'left');
			$this->db->join('predefined_activities', 'predefined_activities.id = predefined_innovation_plan.predefined_activities_id', 'left');
			$this->db->join('predefined_objectives', 'predefined_objectives.id = predefined_activities.predefined_objectives_id', 'left');
			
			
			
			$this->db->from('innovation_plan');
			$this->db->group_by('department_id'); 
			$result = $this->db->get()->result_array();
			//echo $this->db->last_query();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			} 
			
			
			
     for($i=0;$i<count($result);$i++){
		 
		   
			
		 
   ?>

    <tr>
		
        <td><?=$result[$i]['department']?></td>
        
        <td><?=eng_to_bengali_number($result[$i]['final_evaluation'])?></td>
		<td></td>
    </tr>
	
	<?php
	 }
	 ?>
   
</table>
<!--End of Data display of report_compare//--> 

<!--No data-->
<?php
	if(count($report_compare)==0){
?>
 <!--<div align="center"><h3>Data does not exists</h3></div>-->
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	//echo $link;
?>
<!--End of Pagination//-->
<script>
  function setSelecteddepartment(department_id){
	window.location.href = '<?php echo site_url('member/report_compare/set_department/'); ?>'+department_id;
	
   }

	function setSelectedusers(users_id){
		window.location.href = '<?php echo site_url('member/report_compare/set_users/'); ?>'+users_id;
		
	}
 
  function setYear(financial_year_id){
    window.location.href = '<?php echo site_url('member/report_compare/set_financial_year/'); ?>'+financial_year_id;
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