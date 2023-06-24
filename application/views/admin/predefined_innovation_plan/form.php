<a  href="<?php echo site_url('admin/predefined_innovation_plan/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Predefined_innovation_plan'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/predefined_innovation_plan/save/'.$predefined_innovation_plan['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($predefined_innovation_plan['predefined_activities_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['activities_name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                        <label for="Plan" class="col-md-4 control-label">Plan</label> 
          <div class="col-md-8"> 
           <textarea  name="plan"  id="plan"  class="form-control" rows="4"/><?php echo ($this->input->post('plan') ? $this->input->post('plan') : $predefined_innovation_plan['plan']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Performance Indicators" class="col-md-4 control-label">Performance Indicators</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('predefined_innovation_plan','performance_indicators'); 
           ?> 
           <select name="performance_indicators"  id="performance_indicators"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($predefined_innovation_plan['performance_indicators']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>
<div class="form-group"> 
          <label for="Weight Of Plan" class="col-md-4 control-label">Weight Of Plan</label> 
          <div class="col-md-8"> 
           <input type="text" name="weight_of_plan" value="<?php echo ($this->input->post('weight_of_plan') ? $this->input->post('weight_of_plan') : $predefined_innovation_plan['weight_of_plan']); ?>" class="form-control" id="weight_of_plan" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Sl No" class="col-md-4 control-label">Sl No</label> 
          <div class="col-md-8"> 
           <input type="text" name="sl_no" value="<?php echo ($this->input->post('sl_no') ? $this->input->post('sl_no') : $predefined_innovation_plan['sl_no']); ?>" class="form-control" id="sl_no" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($predefined_innovation_plan['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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