<a  href="<?php echo site_url('admin/innovation_plan/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Innovation_plan'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/innovation_plan/save/'.$innovation_plan['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Users" class="col-md-4 control-label">Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="users_id"  id="users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($innovation_plan['users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Department" class="col-md-4 control-label">Department</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Department_model'); 
             $dataArr = $this->CI->Department_model->get_all_department(); 
          ?> 
          <select name="department_id"  id="department_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($innovation_plan['department_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['department']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Predefined Objectives" class="col-md-4 control-label">Predefined Objectives</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Predefined_objectives_model'); 
             $dataArr = $this->CI->Predefined_objectives_model->get_all_predefined_objectives(); 
          ?> 
          <select name="predefined_objectives_id"  id="predefined_objectives_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($innovation_plan['predefined_objectives_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['sl_no']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Predefined Activities" class="col-md-4 control-label">Predefined Activities</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Predefined_activities_model'); 
             $dataArr = $this->CI->Predefined_activities_model->get_all_predefined_activities(); 
          ?> 
          <select name="predefined_activities_id"  id="predefined_activities_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($innovation_plan['predefined_activities_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['activities_name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Predefined Innovation Plan" class="col-md-4 control-label">Predefined Innovation Plan</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Predefined_innovation_plan_model'); 
             $dataArr = $this->CI->Predefined_innovation_plan_model->get_all_predefined_innovation_plan(); 
          ?> 
          <select name="predefined_innovation_plan_id"  id="predefined_innovation_plan_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($innovation_plan['predefined_innovation_plan_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['plan']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Performance Indicators" class="col-md-4 control-label">Performance Indicators</label> 
          <div class="col-md-8"> 
           <input type="text" name="performance_indicators" value="<?php echo ($this->input->post('performance_indicators') ? $this->input->post('performance_indicators') : $innovation_plan['performance_indicators']); ?>" class="form-control" id="performance_indicators" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Weight Of Plan" class="col-md-4 control-label">Weight Of Plan</label> 
          <div class="col-md-8"> 
           <input type="text" name="weight_of_plan" value="<?php echo ($this->input->post('weight_of_plan') ? $this->input->post('weight_of_plan') : $innovation_plan['weight_of_plan']); ?>" class="form-control" id="weight_of_plan" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Half Yearly Evaluation" class="col-md-4 control-label">Half Yearly Evaluation</label> 
          <div class="col-md-8"> 
           <input type="text" name="half_yearly_evaluation" value="<?php echo ($this->input->post('half_yearly_evaluation') ? $this->input->post('half_yearly_evaluation') : $innovation_plan['half_yearly_evaluation']); ?>" class="form-control" id="half_yearly_evaluation" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Half Yearly Evaluation Date" class="col-md-4 control-label">Half Yearly Evaluation Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="half_yearly_evaluation_date"  id="half_yearly_evaluation_date"  value="<?php echo ($this->input->post('half_yearly_evaluation_date') ? $this->input->post('half_yearly_evaluation_date') : $innovation_plan['half_yearly_evaluation_date']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Half Yearly Evaluation Comments" class="col-md-4 control-label">Half Yearly Evaluation Comments</label> 
          <div class="col-md-8"> 
           <textarea  name="half_yearly_evaluation_comments"  id="half_yearly_evaluation_comments"  class="form-control" rows="4"/><?php echo ($this->input->post('half_yearly_evaluation_comments') ? $this->input->post('half_yearly_evaluation_comments') : $innovation_plan['half_yearly_evaluation_comments']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Yearly Evaluation" class="col-md-4 control-label">Yearly Evaluation</label> 
          <div class="col-md-8"> 
           <input type="text" name="yearly_evaluation" value="<?php echo ($this->input->post('yearly_evaluation') ? $this->input->post('yearly_evaluation') : $innovation_plan['yearly_evaluation']); ?>" class="form-control" id="yearly_evaluation" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Yearly Evaluation Date" class="col-md-4 control-label">Yearly Evaluation Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="yearly_evaluation_date"  id="yearly_evaluation_date"  value="<?php echo ($this->input->post('yearly_evaluation_date') ? $this->input->post('yearly_evaluation_date') : $innovation_plan['yearly_evaluation_date']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Yearly Evaluation Comments" class="col-md-4 control-label">Yearly Evaluation Comments</label> 
          <div class="col-md-8"> 
           <textarea  name="yearly_evaluation_comments"  id="yearly_evaluation_comments"  class="form-control" rows="4"/><?php echo ($this->input->post('yearly_evaluation_comments') ? $this->input->post('yearly_evaluation_comments') : $innovation_plan['yearly_evaluation_comments']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Final Evaluation" class="col-md-4 control-label">Final Evaluation</label> 
          <div class="col-md-8"> 
           <input type="text" name="final_evaluation" value="<?php echo ($this->input->post('final_evaluation') ? $this->input->post('final_evaluation') : $innovation_plan['final_evaluation']); ?>" class="form-control" id="final_evaluation" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Final Evaluation Date" class="col-md-4 control-label">Final Evaluation Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="final_evaluation_date"  id="final_evaluation_date"  value="<?php echo ($this->input->post('final_evaluation_date') ? $this->input->post('final_evaluation_date') : $innovation_plan['final_evaluation_date']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Final Evaluation Comments" class="col-md-4 control-label">Final Evaluation Comments</label> 
          <div class="col-md-8"> 
           <textarea  name="final_evaluation_comments"  id="final_evaluation_comments"  class="form-control" rows="4"/><?php echo ($this->input->post('final_evaluation_comments') ? $this->input->post('final_evaluation_comments') : $innovation_plan['final_evaluation_comments']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
                                    <label for="Final Evaluator Users" class="col-md-4 control-label">Final Evaluator Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="final_evaluator_users_id"  id="final_evaluator_users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($innovation_plan['final_evaluator_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                        <label for="Submission" class="col-md-4 control-label">Submission</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('innovation_plan','submission'); 
           ?> 
           <select name="submission"  id="submission"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($innovation_plan['submission']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>
<div class="form-group"> 
                                       <label for="Submitted Date" class="col-md-4 control-label">Submitted Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="submitted_date"  id="submitted_date"  value="<?php echo ($this->input->post('submitted_date') ? $this->input->post('submitted_date') : $innovation_plan['submitted_date']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Completed Date" class="col-md-4 control-label">Completed Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="completed_date"  id="completed_date"  value="<?php echo ($this->input->post('completed_date') ? $this->input->post('completed_date') : $innovation_plan['completed_date']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($innovation_plan['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			