<meta charset="UTF-8">

<h3><?=tr_en_bn('Predefined Template')?></h3>
<div id="spinner"></div>
 <?php
     if( $this->session->userdata('evaluator')==true){
    ?>
<a href="javascript:void();" id="id_1_btn"  onClick="showHide_div('id_1');"><i class="fa fa-minus"></i></a>
<div class="card" id="id_1">
   <div class="card-body">
         <?=tr_en_bn('Switch to')?> 
         <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" value="organization" onClick="setSwith(this.value);"
		  <?php if( $this->session->userdata('user_type')=='organization'){ echo "checked";}?> style="display:block;">
          <label class="form-check-label">
            &nbsp;&nbsp;&nbsp;&nbsp;Organization
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" value="admin"  onClick="setSwith(this.value);"
		  <?php if( $this->session->userdata('user_type')=='admin'){ echo "checked";}?>  style="display:block;">
          <label class="form-check-label">
           &nbsp;&nbsp;&nbsp;&nbsp;Admin
          </label>
        </div>
   </div>
</div> 
<?php
	}
?>	
<a href="javascript:void();" id="id_2_btn"  onClick="showHide_div('id_2');"><i class="fa fa-minus"></i></a>

<div class="card" id="id_2">
   <div class="card-body"> 
     <?php
     if( $this->session->userdata('user_type')=='admin'){
    ?>  
    <div class="form-group"> 
         <label for="Innovation Plan" class="col-md-8 control-label"><?=tr_en_bn('Department')?></label> 
         <div class="col-md-8"> 
        <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
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
        <select name="financial_year_id" id="financial_year_id" onChange="setTemplate(this.value)">
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
<!-- 
<script type="text/javascript">
			$(window).on('load', function() {
				$('#statusModal').modal('show');
			});
</script>
--> 
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
<div class="row fs">
	<div class="col-md-12" id="predefined_template">
        
    </div>
</div>  
<?php 
	if($this->session->userdata('financial_year_id')){
	  echo "<script>
	     $(document).ready(function () {
	     		setTemplate(".$this->session->userdata('financial_year_id').");
	     });
	  </script>";	
	}
?>	
<a href="#" id="toggle_fullscreen"><?=tr_en_bn('Toggle Fullscreen')?></a>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
function setSelecteddepartment(department_id){
	window.location.href = '<?php echo site_url('member/homecontroller/set_department/'); ?>'+department_id;
	
}

function setSelectedusers(users_id){
	window.location.href = '<?php echo site_url('member/homecontroller/set_users/'); ?>'+users_id;
	
}

function setSwith(user_type){
	window.location.href = '<?php echo site_url('member/homecontroller/set_switch/'); ?>'+user_type;
	
}

function setTemplate(id){	
   //hide date range
   <?php
     if( $this->session->userdata('user_type')=='admin'){
    ?>  
   if($("#department_id").val()==''){
	    toastr.options.timeOut = 3000;
		toastr.error("Please select a department");
		return false;
   }
   if($("#users_id").val()==''){
	   toastr.options.timeOut = 3000;
	   toastr.error("Please select a member");
	   return false;
   }
   <?php
	 }
   ?>
   
   $("#error").html('');
   $("#spinner").html('<img src="<?php echo base_url(); ?>public/images/indicator.gif" alt="Wait" />');	
	$.ajax({
				method: "POST",
				url: '<?=site_url('member/homecontroller/load_predefined_template')?>',
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
//$(document).ready(function () {
       
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
//});
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