<a  href="<?php echo site_url('admin/predefined_objectives_column/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Predefined_objectives_column'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/predefined_objectives_column/save/'.$predefined_objectives_column['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Financial Year" class="col-md-4 control-label">Financial Year</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Financial_year_model'); 
             $dataArr = $this->CI->Financial_year_model->get_all_financial_year(); 
          ?> 
          <select name="financial_year_id"  id="financial_year_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($predefined_objectives_column['financial_year_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['financial_year_name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Column Name" class="col-md-4 control-label">Column Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="column_name" value="<?php echo ($this->input->post('column_name') ? $this->input->post('column_name') : $predefined_objectives_column['column_name']); ?>" class="form-control" id="column_name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="In Percent" class="col-md-4 control-label">In Percent (%)</label> 
          <div class="col-md-8"> 
           <input type="text" name="in_percent" value="<?php echo ($this->input->post('in_percent') ? $this->input->post('in_percent') : $predefined_objectives_column['in_percent']); ?>" class="form-control ein" id="in_percent" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Order No" class="col-md-4 control-label">Order No</label> 
          <div class="col-md-8"> 
           <input type="text" name="order_no" value="<?php echo ($this->input->post('order_no') ? $this->input->post('order_no') : $predefined_objectives_column['order_no']); ?>" class="form-control ein" id="order_no" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($predefined_objectives_column['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
$(document).ready(function() { 
$('.ein').on('focus', function() {
        var $this = $(this); 
        $this.bind('keyup blur', function() {
       if($(this).val().match(/[^a-zA-Z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~( ){n}]/g)){ 
           // Pop alert
           alert('Invalid Character usage. Please Use English characters only.');
           //Replace all the invalid characters with empty string
           $(this).val($(this).val().replace(/[^a-zA-Z0-9!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~( ){n}]/g, ''))
                return false;
             }                      
        });                        
    });
	});
</script>
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