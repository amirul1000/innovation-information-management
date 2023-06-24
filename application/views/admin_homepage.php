<meta charset="UTF-8">

<h3><?=tr_en_bn('Predefined Template')?></h3>
<div id="spinner"></div>
<div class="row">
	<div class="col-md-12">
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
        <?=tr_en_bn('Financial year')?>
        <select name="financial_year_id" id="financial_year_id" onChange="setTemplate(this.value)">
              <option value="">Select</option>
              <?php
				for ($i = 0; $i < count($resfinancial_year); $i ++) {
					?>
					 <option value="<?=$resfinancial_year[$i]['id']?>"  <?php if($this->session->userdata('financial_year_id')==$resfinancial_year[$i]['id']){echo "selected";}?>><?=$resfinancial_year[$i]['financial_year_name']?></option>
				  <?php
				}
				?>
        </select>
	</div>
</div>
<!-- 
<script type="text/javascript">
			$(window).on('load', function() {
				$('#statusModal').modal('show');
			});
</script>
-->           

<div class="row fs">
	<div class="col-md-12" id="predefined_template">
        
    </div>
</div>   
 
<?php
$this->CI =& get_instance(); 
$this->CI->load->database();  
$this->CI->load->model('Predefined_objectives_model'); 
$predefined_objectives = $this->CI->Predefined_objectives_model->get_predefined_objectives(0);
?> 
<div class="modal fade" id="objectives"  data-backdrop="static" data-keyboard="false"
                    tabindex="-1" role="dialog" aria-labelledby="detailLabel"
                    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">কর্ম সম্পাদন ক্ষেত্র</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <!--Form to save data-->
                    <div class="modal-body"  style="text-align:center;">
                          <div class="card">
                           <div class="card-body">
                        			<div class="form-group"> 
                                      <label for="Sl No" class="col-md-12 control-label">Sl No</label> 
                                      <div class="col-md-12"> 
                                       <input type="text" name="sl_no" value="<?php echo ($this->input->post('sl_no') ? $this->input->post('sl_no') : $predefined_objectives['sl_no']); ?>" class="form-control ein" id="sl_no" /> 
                                      </div> 
                                   </div>
                        			<div class="form-group"> 
                                      <label for="Objectives Name" class="col-md-12 control-label">Objectives Name</label> 
                                      <div class="col-md-12"> 
                                       <input type="text" name="objectives_name" value="<?php echo ($this->input->post('objectives_name') ? $this->input->post('objectives_name') : $predefined_objectives['objectives_name']); ?>" class="form-control" id="objectives_name" /> 
                                      </div> 
                                   </div>
                       			  <div class="form-group"> 
                                      <label for="Weight Of Objectives" class="col-md-12 control-label">Weight Of Objectives</label> 
                                      <div class="col-md-12"> 
                                       <input type="text" name="weight_of_objectives" value="<?php echo ($this->input->post('weight_of_objectives') ? $this->input->post('weight_of_objectives') : $predefined_objectives['weight_of_objectives']); ?>" class="form-control ein" id="weight_of_objectives" /> 
                                      </div> 
                                   </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-success" onClick="add_objectives();"><?php if(empty($predefined_objectives['id'])){?>Save<?php }else{?>Update<?php } ?></button>
                                            <button type="submit" class="btn btn-danger" id="objectives_delete"  onClick="delete_objectives();">Delete</button>
                                        </div>
                                    </div>
                         
                          </div>
                        </div>  
                    </div>
                   <!--End of Form to save data//-->
            </div>
        </div>
</div>



<?php
$this->CI =& get_instance(); 
$this->CI->load->database();  
$this->CI->load->model('Predefined_activities_model'); 
$predefined_activities = $this->CI->Predefined_activities_model->get_predefined_activities(0);
?> 
<div class="modal fade" id="activitiesModal"   data-backdrop="static" data-keyboard="false"
                    tabindex="-1" role="dialog" aria-labelledby="detailLabel"
                    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">কার্যক্রম</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <!--Form to save data-->
                     <div class="card">
                         <div class="card-body">    
       
							<div class="form-group"> 
                                        <label for="Activities Name" class="col-md-12 control-label">Activities Name</label> 
                              <div class="col-md-12"> 
                               <textarea  name="activities_name"  id="activities_name"  class="form-control" rows="4"/><?php echo ($this->input->post('activities_name') ? $this->input->post('activities_name') : $predefined_activities['activities_name']); ?></textarea> 
                            </div> 
                            </div>
							<div class="form-group"> 
                                        <label for="Description" class="col-md-12 control-label">Description</label> 
                              <div class="col-md-12"> 
                               <textarea  name="description"  id="description"  class="form-control" rows="4"/><?php echo ($this->input->post('description') ? $this->input->post('description') : $predefined_activities['description']); ?></textarea> 
                              </div> 
                               </div>
							<div class="form-group"> 
                              <label for="Sl No" class="col-md-12 control-label">Sl No</label> 
                              <div class="col-md-12"> 
                               <input type="text" name="sl_no" value="<?php echo ($this->input->post('sl_no') ? $this->input->post('sl_no') : $predefined_activities['sl_no']); ?>" class="form-control ein" id="a_sl_no" /> 
                              </div> 
                               </div>
							<div class="form-group"> 
                              <label for="Order No" class="col-md-12 control-label">Order No</label> 
                              <div class="col-md-12"> 
                               <input type="text" name="order_no" value="<?php echo ($this->input->post('order_no') ? $this->input->post('order_no') : $predefined_activities['order_no']); ?>" class="form-control ein" id="order_no" /> 
                              </div> 
                               </div>
                               <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <input type="hidden" name="predefined_objectives_id" id="predefined_objectives_id">
                                        <button type="submit" class="btn btn-success" onClick="add_activities();"><?php if(empty($predefined_activities['id'])){?>Save<?php }else{?>Update<?php } ?></button>
                                        <button type="submit" class="btn btn-danger" id="objectives_delete"  onClick="delete_activities();">Delete</button>

                                    </div>
                                </div>

   							</div>
                     </div>

                   <!--End of Form to save data//-->
            </div>
        </div>
</div>


<?php
$this->CI =& get_instance(); 
$this->CI->load->database();  
$this->CI->load->model('Predefined_innovation_plan_model'); 
$predefined_innovation_plan = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan(0);
?> 
<div class="modal fade" id="innovationPlanModal"   data-backdrop="static" data-keyboard="false"
                    tabindex="-1" role="dialog" aria-labelledby="detailLabel"
                    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">কর্ম সম্পাদন সূচক</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <!--Form to save data-->
                     <div class="card">
                       <div class="card-body"> 
                          <form name="plan_data" id="plan_data" onSubmit="return false;"> 
                           <div class="form-group"> 
                                        <label for="Plan" class="col-md-12 control-label">Plan</label> 
                          <div class="col-md-12"> 
                           <textarea  name="plan"  id="plan"  class="form-control" rows="4"/><?php echo ($this->input->post('plan') ? $this->input->post('plan') : $predefined_innovation_plan['plan']); ?></textarea> 
                          </div> 
                           </div>
                           <div class="form-group"> 
                                <label for="Performance Indicators" class="col-md-12 control-label">Performance Indicators</label> 
                              <div class="col-md-12"> 
                               <?php 
                                 $enumArr = $this->customlib->getEnumFieldValues('predefined_innovation_plan','performance_indicators'); 
                               ?> 
                               <select name="performance_indicators"  id="performance_indicators" onChange="set_indicator(this.value);"  class="form-control"/> 
                                 <option value="">--Select--</option> 
                                 <?php 
                                  for($i=0;$i<count($enumArr);$i++) 
                                  { 
                                 ?> 
                                 <option value="<?=$enumArr[$i]?>" <?php if($predefined_innovation_plan['performance_indicators']==$enumArr[$i]){ echo "selected";} ?>><?=$enumArr[$i]?></option> 
                                 <?php 
                                  } 
                                 ?> 
                               </select> 
                              </div> 
                                </div>
                             <div class="form-group"> 
                              <label for="Weight Of Plan" class="col-md-12 control-label">Weight Of Plan</label> 
                              <div class="col-md-12"> 
                               <input type="text" name="weight_of_plan" value="<?php echo ($this->input->post('weight_of_plan') ? $this->input->post('weight_of_plan') : $predefined_innovation_plan['weight_of_plan']); ?>" class="form-control ein" id="weight_of_plan" /> 
                              </div> 
                               </div>
                            <div class="form-group"> 
                              <label for="Sl No" class="col-md-12 control-label">Sl No</label> 
                              <div class="col-md-12"> 
                               <input type="text" name="sl_no" value="<?php echo ($this->input->post('sl_no') ? $this->input->post('sl_no') : $predefined_innovation_plan['sl_no']); ?>" class="form-control ein" id="p_sl_no" /> 
                              </div> 
                               </div>
                              <span id="column_data">
                              
                              </span>
                         <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <input type="hidden" name="predefined_activities_id" id="predefined_activities_id">
                                <button type="submit" class="btn btn-success" onClick="add_plan()"><?php if(empty($predefined_innovation_plan['id'])){?>Save<?php }else{?>Update<?php } ?></button>
                                <button type="submit" class="btn btn-danger" id="objectives_delete"  onClick="delete_plan();">Delete</button>
                            </div>
                        </div>
                        </form>
                       </div>
                    </div>
                   <!--End of Form to save data//-->
            </div>
        </div>
</div>
<a href="#" id="toggle_fullscreen"><?=tr_en_bn('Toggle Fullscreen')?></a>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<?php 
	if($this->session->userdata('financial_year_id')){
	  echo "<script>
	     $(document).ready(function () {
	     		setTemplate(".$this->session->userdata('financial_year_id').");
	     });
	  </script>";	
	}
?>	
<script>
function setTemplate(id){	
   //hide date range
   $('#date_div').hide(); 
   $("#error").html('');
   $("#spinner").html('<img src="<?php echo base_url(); ?>public/images/indicator.gif" alt="Wait" />');	
	$.ajax({
				method: "POST",
				url: '<?=site_url('admin/homecontroller/load_predefined_template')?>',
				data: { 
						id:id
					  },
			    //dataType: 'text/html',
				timeout: 10000,
				async : true,  
				success: function(data) {
					   $("#predefined_template").html(data);	 
					   $("#spinner").html(''); 
					},
				 error: function (jqXHR, exception) { 
					  if(jqXHR.status==0)
					  {
						alert(JSON.stringify(jqXHR));
					  }
				 }	
			});
}
var edit_id = 0;
var load_content = '0';
var plan_data='';
/////////Start of Objectives////////////////
$(document).on('click', '[data-dismiss="modal"]', function(e){
	   edit_id = 0; 
	   var $t = $(this),
       target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

	  $(target)
		.find("input,textarea,select")
		   .val('')
		   .end()
		.find("input[type=checkbox], input[type=radio]")
		   .prop("checked", "")
		   .end();
	 setTemplate( $("#financial_year_id").val());
	  
	});
	
	
function  objectives_edit_view(id){
	     edit_id = id;
		 $.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/load_objectives')?>",
		  data:{
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {	
			  obj = JSON.parse(data);
			  			  
			 $("#sl_no").val(obj[0]['sl_no']);
			 $("#objectives_name").val(obj[0]['objectives_name']);
			 $("#weight_of_objectives").val(obj[0]['weight_of_objectives']); 
			 
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	$('#objectives').modal('show');
}
function add_objectives(){
	financial_year_id = $("#financial_year_id").val();
	sl_no = $("#sl_no").val();
	objectives_name = $("#objectives_name").val();
	weight_of_objectives = $("#weight_of_objectives").val();
	
	if(financial_year_id==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("Financial year is a required field");
	 return false;
	}
	
	if(sl_no==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("Sl no is a required field");
	 return false;
	}
	
	if(objectives_name==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("Objectives name is a required field");
	 return false;
	}
	
	if(weight_of_objectives==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("Weight of objectives is a required field");
	 return false;
	}
	
	 $.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/save_objectives')?>",
		  data:{
					financial_year_id : $("#financial_year_id").val(),
					sl_no : $("#sl_no").val(),
					objectives_name : $("#objectives_name").val(),
					weight_of_objectives : $("#weight_of_objectives").val(),
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {	
			  obj = JSON.parse(data);  
			  
			  if(obj[0].status=='success'){
				  edit_id = 0;
				  toastr.options.timeOut = 3000;
				  toastr.success(obj[0].msg);
				  setTemplate( $("#financial_year_id").val());
				  $('#objectives').modal('hide');
				  
				 $("#sl_no").val('');
				 $("#objectives_name").val('');
				 $("#weight_of_objectives").val(''); 
				  
			  }
			  else{
				  toastr.options.timeOut = 3000;
				  toastr.error("Objectives creation has been failed");
			  }
	
	
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	
}

function delete_objectives(){
	if(edit_id==0){
		toastr.options.timeOut = 3000;
		toastr.error("Click on pen icon to delete item");
		return false;
	}
	$.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/delete_objectives')?>",
		  data:{
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
			  obj = JSON.parse(data);
			  if(obj[0].status=='success'){
				  edit_id = 0;
				  toastr.options.timeOut = 3000;
				  toastr.success(obj[0].msg);
				  setTemplate( $("#financial_year_id").val());
				  $('#objectives').modal('hide');
				  
				  $("#sl_no").val('');
				  $("#objectives_name").val('');
				  $("#weight_of_objectives").val(''); 
				  
			  }
			  else{
				  toastr.options.timeOut = 3000;
				  toastr.error("Objectives creation has been failed");
			  }
			 
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	
}
/////////End of Objectives////////////////


/////////Start of Activities////////////////

function openModalActivities(id){
	$("#predefined_objectives_id").val(id);
	$('#activitiesModal').modal('show');
	
}
function  activities_edit_view(id){
	     edit_id = id;
		 $.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/load_activities')?>",
		  data:{
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {	
			  obj = JSON.parse(data);
			  
			 $("#predefined_objectives_id").val(obj[0]['predefined_objectives_id']);
			 $("#activities_name").val(obj[0]['activities_name']);
			 $("#description").val(obj[0]['description']);
			 $("#a_sl_no").val(obj[0]['sl_no']);
			 $("#order_no").val(obj[0]['order_no']);
			 
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	$('#activitiesModal').modal('show');
}
function add_activities(){
	predefined_objectives_id = $("#predefined_objectives_id").val();
	activities_name = $("#activities_name").val();
	description = $("#description").val();
	sl_no = $("#a_sl_no").val();
	order_no = $("#order_no").val();
	
	if(activities_name==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("activities name is a required field");
	 return false;
	}
	
	if(sl_no==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("sl no is a required field");
	 return false;
	}
	
	if(order_no==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("order no is a required field");
	 return false;
	}
	
	$.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/save_activities')?>",
		  data:{
					predefined_objectives_id : $("#predefined_objectives_id").val(),
					activities_name : $("#activities_name").val(),
					description : $("#description").val(),
					sl_no : $("#a_sl_no").val(),
					order_no : $("#order_no").val(),
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
			  obj = JSON.parse(data);  
			  
			  if(obj[0].status=='success'){
				  edit_id = 0;
				  
				  toastr.options.timeOut = 3000;
				  toastr.success(obj[0].msg);
				  setTemplate( $("#financial_year_id").val());
				  $('#activitiesModal').modal('hide');
				  
				 $("#predefined_objectives_id").val('');
				 $("#activities_name").val('');
				 $("#description").val('');
				 $("#a_sl_no").val('');
				 $("#order_no").val('');
				  
			  }
			  else{
				  toastr.options.timeOut = 3000;
				  toastr.error("Activities creation has been failed");
			  }
	
	
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	
}

function delete_activities(){
	if(edit_id==0){
		toastr.options.timeOut = 3000;
		toastr.error("Click on pen icon to delete item");
		return false;
	}
	$.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/delete_activities')?>",
		  data:{
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
			  obj = JSON.parse(data);
			  if(obj[0].status=='success'){
				  edit_id = 0;
				  toastr.options.timeOut = 3000;
				  toastr.success(obj[0].msg);
				  setTemplate( $("#financial_year_id").val());
				  $('#activitiesModal').modal('hide');
				  
				  $("#predefined_objectives_id").val('');
				  $("#activities_name").val('');
				  $("#description").val('');
				  $("#a_sl_no").val('');
				  $("#order_no").val('');
				  
			  }
			  else{
				  toastr.options.timeOut = 3000;
				  toastr.error("Activities creation has been failed");
			  }
			 
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
}



/////////End of Activities////////////////


/////////Start of Plan////////////////

function openModalPlan(id){
	$("#predefined_activities_id").val(id);
	
	$.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/set_coulmn_data')?>",
		  data:{
					id : $("#financial_year_id").val(),
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
			    load_content = '1';
			    $("#column_data").html(data); 
			    $('#innovationPlanModal').modal('show');
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	
}


function  plan_edit_view(id){
		 
	  var t= setInterval(()=>{
      if(load_content=='0'){
		   openModalPlan(id);
		 }
		else{
			
		//load	
		 
	     edit_id = id;
		 $.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/load_plan')?>",
		  data:{
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
		       
			  obj = JSON.parse(data);
			  
			  plan = obj['plan'];
			  plan_data = obj['plan_data']; 
			  
			  
			$("#predefined_activities_id").val(plan[0]['predefined_activities_id']);
			$("#plan").val(plan[0]['plan']);
			$("#performance_indicators").val(plan[0]['performance_indicators']);
			$("#weight_of_plan").val(plan[0]['weight_of_plan']);
			$("#p_sl_no").val(plan[0]['sl_no']);
			
			for(var i=0;i<plan_data.length;i++){
				//$("#predefined_objectives_column_id_"+).val();
				$("#column_data_"+plan_data[i]['predefined_objectives_column_id']).val(plan_data[i]['column_data']);
			}
			
			 
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	   
	   
	   
	      //clear time
		  	
	      clearInterval(t);
		  load_content = '0'; 
		}
	},100);   
	   
}
function add_plan(){
    const formData = new FormData(document.getElementById('plan_data'));
	arr_column_id = [];
	arr_column_data = [];
	for (const [key, value] of formData) {
	   if(key=="predefined_objectives_column_id[]"){
			arr_column_id.push(value);
	   }
	   
	   if(key=="column_data[]"){
			arr_column_data.push(value);
	   }
	}
	predefined_activities_id = $("#predefined_activities_id").val();
	plan = $("#plan").val();
	performance_indicators = $("#performance_indicators").val();
	weight_of_plan = $("#weight_of_plan").val();
	sl_no = $("#p_sl_no").val();
	
	if(performance_indicators==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("performance indicators is a required field");
	 return false;
	}
	
	if(weight_of_plan==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("weight of plan is a required field");
	 return false;
	}
	
	if(sl_no==''){
	 toastr.options.timeOut = 3000;
	 toastr.error("sl no is a required field");
	 return false;
	}
	
	$.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/save_plan')?>",
		  data:{
					predefined_activities_id : $("#predefined_activities_id").val(),
					plan : $("#plan").val(),
					performance_indicators : $("#performance_indicators").val(),
					weight_of_plan : $("#weight_of_plan").val(),
					sl_no : $("#p_sl_no").val(),
					predefined_objectives_column_id:JSON.stringify(arr_column_id),
					column_data:JSON.stringify(arr_column_data),
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
			  obj = JSON.parse(data);
			  if(obj[0].status=='success'){
				  toastr.options.timeOut = 3000;
				  toastr.success(obj[0].msg);
				  setTemplate( $("#financial_year_id").val());
				  $('#innovationPlanModal').modal('hide');
				  
				$("#predefined_activities_id").val('');
				$("#plan").val('');
				$("#performance_indicators").val('');
				$("#weight_of_plan").val('');
				$("#p_sl_no").val('');
				  
			  }
			  else{
				  toastr.options.timeOut = 3000;
				  toastr.error("innovation plan creation has been failed");
			  }
	
	
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
	
}

function delete_plan(){
	if(edit_id==0){
		toastr.options.timeOut = 3000;
		toastr.error("Click on pen icon to delete item");
		return false;
	}
	$.ajax({
		  method: "POST",
		  url: "<?=site_url('admin/homecontroller/delete_plan')?>",
		  data:{
					id :edit_id
			   },
		  //dataType: 'json',
		  timeout: 10000,
		  async : true,
		  success: function (data) {
			  obj = JSON.parse(data);
			  if(obj[0].status=='success'){
				  edit_id = 0;
				  toastr.options.timeOut = 3000;
				  toastr.success(obj[0].msg);
				  setTemplate( $("#financial_year_id").val());
				  $('#innovationPlanModal').modal('hide');
				  
				  $("#predefined_activities_id").val('');
				  $("#plan").val('');
				  $("#performance_indicators").val('');
				  $("#weight_of_plan").val('');
				  $("#p_sl_no").val('');
				  
			  }
			  else{
				  toastr.options.timeOut = 3000;
				  toastr.error("Activities creation has been failed");
			  }
			 
	   },
	   error: function (jqXHR, exception) { 
				  if(jqXHR.status==0)
				  {
					alert(JSON.stringify(jqXHR));
				  }
			  }
	   });
}

function set_indicator(indicator){
	if(indicator=="date"){
	   for(var i=0;i<plan_data.length;i++){
			$("#column_data_"+plan_data[i]['predefined_objectives_column_id']).addClass('datepicker');
		}
	}else{
		 for(var i=0;i<plan_data.length;i++){
			$("#column_data_"+plan_data[i]['predefined_objectives_column_id']).removeClass('datepicker');
		}
	}
}

function showhide(){
			if($(".sh").hasClass('show')){
				$(".sh").removeClass('show');
				$(".sh").addClass('hide');
				$('.clickMe').html('>>');
			}
			else if($(".sh").hasClass('hide')){
				$(".sh").removeClass('hide');
				$(".sh").addClass('show');
				$('.clickMe').html('<<');
			} 
	  }

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
	
	
$('#toggle_fullscreen').on('click', function(){
  // if already full screen; exit
  // else go fullscreen
  if (
    document.fullscreenElement ||
    document.webkitFullscreenElement ||
    document.mozFullScreenElement ||
    document.msFullscreenElement
  ) {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  } else {
    element = $('.fs').get(0);
    if (element.requestFullscreen) {
      element.requestFullscreen();
    } else if (element.mozRequestFullScreen) {
      element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) {
      element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    } else if (element.msRequestFullscreen) {
      element.msRequestFullscreen();
    }
  }
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
    
    