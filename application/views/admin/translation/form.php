<a  href="<?php echo site_url('admin/translation/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Translation'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/translation/save/'.$translation['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="En" class="col-md-4 control-label">En</label> 
          <div class="col-md-8"> 
           <input type="text" name="en" value="<?php echo ($this->input->post('en') ? $this->input->post('en') : $translation['en']); ?>" class="form-control" id="en" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Bn" class="col-md-4 control-label">Bn</label> 
          <div class="col-md-8"> 
           <input type="text" name="bn" value="<?php echo ($this->input->post('bn') ? $this->input->post('bn') : $translation['bn']); ?>" class="form-control" id="bn" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($translation['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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