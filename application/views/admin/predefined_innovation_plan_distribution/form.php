<a  href="<?php echo site_url('admin/predefined_innovation_plan_distribution/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Predefined_innovation_plan_distribution'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/predefined_innovation_plan_distribution/save/'.$predefined_innovation_plan_distribution['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($predefined_innovation_plan_distribution['predefined_innovation_plan_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['performance_indicators']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Predefined Innovation Plan Value" class="col-md-4 control-label">Predefined Innovation Plan Value</label> 
          <div class="col-md-8"> 
           <input type="text" name="predefined_innovation_plan_value" value="<?php echo ($this->input->post('predefined_innovation_plan_value') ? $this->input->post('predefined_innovation_plan_value') : $predefined_innovation_plan_distribution['predefined_innovation_plan_value']); ?>" class="form-control" id="predefined_innovation_plan_value" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($predefined_innovation_plan_distribution['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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