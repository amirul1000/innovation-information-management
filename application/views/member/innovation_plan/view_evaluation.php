<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script src="<?php echo base_url('public/Simple-Ajax-Uploader/SimpleAjaxUploader.js')?>"></script>
 <link rel="stylesheet" href="<?php echo base_url('public/Simple-Ajax-Uploader/assets/css/styles.css')?>">
 <style>
 .progress {
    margin-bottom:0;
    margin-top:6px;
    margin-left:10px;
}

.btn.focus {
    outline:thin dotted #333;
    outline:5px auto -webkit-focus-ring-color;
    outline-offset:-2px;
}

.btn.hover {
    color:#ffffff;
    background-color:#3276b1;
    border-color:#285e8e;
}

.progress.active .progress-bar, .progress-bar.active {
    -webkit-animation: progress-bar-stripes 2s linear infinite;
    -o-animation: progress-bar-stripes 2s linear infinite;
    animation: progress-bar-stripes 2s linear infinite;
}
.progress > .progress-bar-success {
    background-color: #45b6af;
}
.progress-striped .progress-bar-success {
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: -o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
}
.progress-striped .progress-bar, .progress-bar-striped {
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: -o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    -webkit-background-size: 40px 40px;
    background-size: 40px 40px;
}
.progress-bar-success {
    background-color: #5cb85c;
}
.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #428bca;
    -webkit-box-shadow: inset 0 -1px 0 rgb(0 0 0 / 15%);
    box-shadow: inset 0 -1px 0 rgb(0 0 0 / 15%);
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
}

.show{
	  display:block;
  }
.hide{
	   display:none;
  }

 </style>
<a  href="<?php echo site_url('member/innovation_plan/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo tr_en_bn(str_replace('_',' ','Innovation_plan')); ?></h5>
<!--Data display of innovation_plan with id--> 
<!--<a href="javascript:void();" id="id_1_btn"  onClick="showHide('id_1');"><i class="fa fa-plus"></i></a>-->
 
 <a href="javascript:void(0)" class="clickMe" onClick="showhideClass();"><i class="fa fa-plus"></i></a>
 
  <?php
	$c = isset($innovation_plan[0])?$innovation_plan[0]:'';
  ?> 
<div class="card">  <!--id="id_1" style="display:block;"-->
   <div class="card-body">   
			<?php
			  if(isset($innovation_plan[0])){
			?>
               <div class="form-group">
                <script type="text/javascript">
					$( document ).ready(function() {
					
					 google.charts.load('current', {'packages':['corechart']});
					  google.charts.setOnLoadCallback(drawChart);
				
					  function drawChart() {
				
						var data1 = google.visualization.arrayToDataTable([
						  ['Task', '<?=tr_en_bn('Evaluation')?>',{ role: 'style' }],
						  ['<?=tr_en_bn('Weight Of Plan')?>',     <?php echo isset($c['weight_of_plan'])?$c['weight_of_plan']:0?>,'green'],
						  ['<?=tr_en_bn('Half Yearly Evaluation')?>',      <?php echo isset($c['half_yearly_evaluation'])?$c['half_yearly_evaluation']:0?>,'blue'],
						  ['<?=tr_en_bn('Yearly Evaluation')?>',      <?php echo isset($c['yearly_evaluation'])?$c['yearly_evaluation']:0; ?>,'magenta'],
						  ['<?=tr_en_bn('Final Evaluation')?>',      <?php echo isset($c['final_evaluation'])?$c['final_evaluation']:0; ?>,'yellow'],
						]);
				
						var options1 = {
						  title: '<?=tr_en_bn('Evaluation')?>'
						};
				
						var chart1 = new google.visualization.BarChart(document.getElementById('chart'));
				
						chart1.draw(data1, options1);
						
						
					
					  }
					  });
				</script>
                <div id="chart" style="width: 900px; height: 300px;"></div>
                
                </div>
                <div class="form-group sh hide">
                <label for="Department" class="col-md-12 control-label"><strong><?=tr_en_bn('Users')?></strong></label>
                <div class="col-md-12"><?php
                   $this->CI =& get_instance();
                   $this->CI->load->database();	
                   $this->CI->load->model('Users_model');
                   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
                   echo $dataArr['first_name'].' '.$dataArr['last_name'].' '.$dataArr['email'];?>
                </div>
                </div>

				<div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Department')?></strong></label>
                <div class="col-md-8"><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Department_model');
									   $dataArr = $this->CI->Department_model->get_department($c['department_id']);
									   echo $dataArr['department'];?>
									</div>
                                    </div>

				<div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Predefined Objectives')?></strong></label>
                <div class="col-md-8"><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_objectives_model');
									   $dataArr = $this->CI->Predefined_objectives_model->get_predefined_objectives($c['predefined_objectives_id']);
									   echo '['.eng_to_bengali_number($dataArr['sl_no']).']'.$dataArr['objectives_name'];?>
									</div></div>

				<div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Predefined Activities')?></strong></label>
                <div class="col-md-8"><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_activities_model');
									   $dataArr = $this->CI->Predefined_activities_model->get_predefined_activities($c['predefined_activities_id']);
									   echo '['.eng_to_bengali_number($dataArr['sl_no']).']'.$dataArr['activities_name'];?>
									</div></div>

                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Predefined Innovation Plan')?></strong></label>
                <div class="col-md-8"><?php
                                                       $this->CI =& get_instance();
                                                       $this->CI->load->database();	
                                                       $this->CI->load->model('Predefined_innovation_plan_model');
                                                       $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['predefined_innovation_plan_id']);
                                                       echo '['.eng_to_bengali_number($dataArr['sl_no']).']'.$dataArr['plan'];?>
                                                    </div></div>
                
                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Performance Indicators')?></strong></label>
                <div class="col-md-8"><?php echo $c['performance_indicators']; ?></div></div>
                
                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Weight Of Plan')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['weight_of_plan']); ?></div></div>
                
                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Half Yearly Evaluation')?></strong></label>
                <div class="col-md-8"><?php echo eng_to_bengali_number($c['half_yearly_evaluation']); ?>                
                </div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Half Yearly Evaluation Date')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['half_yearly_evaluation_date']); ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Half Yearly Evaluation Comments')?></strong></label><div class="col-md-8"><?php echo $c['half_yearly_evaluation_comments']; ?></div></div>
                
                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Yearly Evaluation')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['yearly_evaluation']); ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Yearly Evaluation Date')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['yearly_evaluation_date']); ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Yearly Evaluation Comments')?></strong></label><div class="col-md-8"><?php echo $c['yearly_evaluation_comments']; ?></div></div>
                
                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Final Evaluation')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['final_evaluation']); ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Final Evaluation Date')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['final_evaluation_date']); ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Final Evaluation Comments')?></strong></label><div class="col-md-8"><?php echo $c['final_evaluation_comments']; ?></div></div>
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Final Evaluator Users')?></strong></label><div class="col-md-8"><?php
                                                       $this->CI =& get_instance();
                                                       $this->CI->load->database();	
                                                       $this->CI->load->model('Users_model');
                                                       $dataArr = $this->CI->Users_model->get_users($c['final_evaluator_users_id']);
                                                       echo $dataArr['first_name'].' '.$dataArr['last_name'].' '.$dataArr['email'];?>
                                                    </div></div>
                <div class="form-group">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Submission')?></strong></label><div class="col-md-8"><?php echo $c['submission']; ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Submitted Date')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['submitted_date']); ?></div></div>
                
               <div class="form-group sh hide">
               <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Completed Date')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['completed_date']); ?></div></div>
               <div class="form-group">
               <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Attached')?></strong></label><div class="col-md-8"><?php 
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
                            
                                ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Created At')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['created_at']); ?></div></div>
                
                <div class="form-group sh hide">
                <label for="Department" class="col-md-6 control-label"><strong><?=tr_en_bn('Updated At')?></strong></label><div class="col-md-8"><?php echo eng_to_bengali_number($c['updated_at']); ?></div></div>


			
           <?php
			  }else{
			?>  
            No data has been submitted
            <?php
			  }
			?>   
</div>
</div>

<div class="card">
   <div class="card-body"> 
<table class="table table-striped table-bordered">  
<tr><td><?=tr_en_bn('Plan')?></td><td><?php echo $respip[0]['plan']; ?></td></tr>

<tr><td><?=tr_en_bn('Performance Indicators')?></td><td><?php echo $respip[0]['performance_indicators']; ?></td></tr>

<tr><td><?=tr_en_bn('Weight Of Plan')?></td><td><?php echo eng_to_bengali_number($respip[0]['weight_of_plan']); ?></td></tr>
<?php
	  if($this->session->userdata('user_type')=='organization'){
	?>
<tr><td><?=tr_en_bn('Documents')?></td>
<td>
     <div class="row">   
         <?php 
             $enumArr = $this->customlib->getEnumFieldValues('documents','document_file_type'); 			
              for($i=0;$i<count($enumArr);$i++) 
              { 
           ?> 
        <div class="col-md-6">    
		<div class="form-group"> 
          <label for="File Picture" class="col-md-4 control-label"><b><?=ucwords($enumArr[$i])?></b></label> 
          <div class="col-md-8"> 
                   <div class="row" style="padding-top:10px;">
                    <div class="col-xs-2">
                      <input type="file" id="uploadBtn<?=$i?>"  value="Choose File">
                    </div>
                    <div class="col-xs-10">
                    
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                      </div>
                      
                      <div id="progressOuter<?=$i?>" class="progress progress-striped active" style="display:none;">
                         <div id="progressBar<?=$i?>" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="row" style="padding-top:10px;">
                    <div class="col-xs-10">
                      <div id="msgBox<?=$i?>">
                      </div>
                    </div>
                  </div>
          </div> 
          <script>
				function escapeTags( str ) {
				  return String( str )
						   .replace( /&/g, '&amp;' )
						   .replace( /"/g, '&quot;' )
						   .replace( /'/g, '&#39;' )
						   .replace( /</g, '&lt;' )
						   .replace( />/g, '&gt;' );
				}
				
				$(document).ready(function() {
				 
				  var btn<?=$i?> = document.getElementById('uploadBtn<?=$i?>'),
					  progressBar<?=$i?> = document.getElementById('progressBar<?=$i?>'),
					  progressOuter<?=$i?> = document.getElementById('progressOuter<?=$i?>'),
					  msgBox<?=$i?> = document.getElementById('msgBox<?=$i?>');
				
				  var uploader<?=$i?> = new ss.SimpleUpload({
						button: btn<?=$i?>,
						url: '<?=site_url('member/innovation_plan/upload_file')?>',
						sessionProgressUrl: '<?php echo base_url('public/Simple-Ajax-Uploader/code/sessionProgress.php')?>',
						//name: 'uploadfile',
						name:'file_<?=$enumArr[$i]?>', 
						multipart: true,
						hoverClass: 'hover',
						focusClass: 'focus',
						responseType: 'json',
						startXHR: function() {
							progressOuter<?=$i?>.style.display = 'block'; // make progress bar visible           
							this.setProgressBar( progressBar<?=$i?> );           
						},
						onSubmit: function() {
							msgBox<?=$i?>.innerHTML = ''; // empty the message box
							btn<?=$i?>.innerHTML = 'Uploading...'; // change button text to "Uploading..."
						  },
						onComplete: function( filename, response ) {
							//btn.innerHTML = 'Choose Another File';
							$("#uploadBtn<?=$i?>").removeAttr('required');
							btn<?=$i?>.innerHTML = 'Choose File';
							progressOuter<?=$i?>.style.display = 'none'; // hide progress bar when upload is completed
				
							if ( !response ) {
								msgBox<?=$i?>.innerHTML = 'Unable to upload file';
								return;
							}
				
							if ( response.success === true ) {
								msgBox<?=$i?>.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
				
							} else {
								if ( response.msg )  {
									msgBox<?=$i?>.innerHTML = escapeTags( response.msg );
				
								} else {
									msgBox<?=$i?>.innerHTML = 'An error occurred and the upload failed.';
								}
							}
						  },
						onError: function() {
							progressOuter<?=$i?>.style.display = 'none';
							msgBox<?=$i?>.innerHTML = 'Unable to upload file';
						  }
					});
					
				  
				});
			</script>
        </div>
       </div>
         <?php 
              } 
         ?>
       </div>
</td>
</tr>
<?php
	  }
?>	  
<?php
	 // if($this->session->userdata('user_type')=='organization'){
	?>
<tr><td><?=tr_en_bn('Year')?></td><td>
     <input type="radio" name="predefined_year_type" value="half_yearly"  style="display:block;float:left;"><span style="float:left;"><?=tr_en_bn('Half Year')?></span><br>
     <input type="radio" name="predefined_year_type" value="full_yearly"  style="display:block;float:left;"><span style="float:left;"><?=tr_en_bn('Full Year')?></span><br>
    
</td></tr>
<?php
	 // }
?>	  
<tr><td><?=tr_en_bn('Evaluation')?></td><td>
       <?php
			foreach($respoc as $c){
				
			$this->db->order_by('id', 'desc');
			$this->db->where('predefined_objectives_column_id', $c['id']);
			$this->db->where('predefined_innovation_plan_id', $id);
			$respipcd = $this->db->get('predefined_innovation_plan_column_data')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}	
				
				
		?>
         <input type="radio" name="predefined_objectives_column" value="<?php echo $c['in_percent'];?>" style="display:block;float:left;">
          <span style="float:left;"><?php echo $c['column_name'];?> <?php echo eng_to_bengali_number($c['in_percent']);?>% [<?=isset($respipcd[0]['column_data'])?eng_to_bengali_number($respipcd[0]['column_data']):''?>]</span><br>
       
        <?php
			}
	    ?>		

</td></tr>
<tr><td><?=tr_en_bn('Comments')?></td><td><textarea name="comments" id="comments" class="form-control" rows="4"/></textarea></td></tr>

</table>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"  <?php if(empty($innovation_plan[0])&& $_SESSION['user_type']=='admin'){echo "disabled";}?>   onClick="add_evaluation();">Save</button>
          <?php if(empty($innovation_plan[0])&& $_SESSION['user_type']=='admin'){echo "Admin can review when Organization will evaluate.";}?>
	</div>
</div>
</div>
</div>
<!--End of Data display of innovation_plan with id//--> 
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
function add_evaluation(){
	predefined_year_type ='';
	predefined_objectives_column = '';
	<?php
	  if(true){//$this->session->userdata('user_type')=='organization'
	?>
	year_type = false;
	$('input[name=predefined_year_type]').each(function() {
	   if ($(this).is(":checked")) {
		   year_type = true;
		   predefined_year_type = $(this).val();
	   }
	});
	
	
	if( year_type == false){
		toastr.options.timeOut = 3000;
		toastr.error("Type of Year is a required field");
		return false;
	}
	<?php
	  }
	?>  
	objectives_column = false;
	$('input[name=predefined_objectives_column]').each(function() {
	   if ($(this).is(":checked")) {
		   objectives_column = true;
		   predefined_objectives_column = $(this).val();
	   }
	});
	if( objectives_column == false){
		toastr.options.timeOut = 3000;
		toastr.error("Evaluation is a required field");
		return false;
	}
	
	$.ajax({
			method: "POST",
			url: '<?=site_url('member/innovation_plan/add_evaluation')?>',
			data: { 
					'predefined_objectives_id':'<?php echo $arr_objectives[0]['id']; ?>',
					'predefined_activities_id':'<?php echo $arr_activities[0]['id']; ?>',
					'predefined_innovation_plan_id':'<?php echo $arr_plan[0]['id']; ?>',
					'performance_indicators':'<?php echo $respip[0]['performance_indicators']; ?>',
					'weight_of_plan':'<?php echo $respip[0]['weight_of_plan']; ?>',
					'comments':$("#comments").val(),
					'predefined_year_type':predefined_year_type,
					'predefined_objectives_column':predefined_objectives_column,
				  },
			timeout: 10000,
			async : true,  
			success: function(data) {
				   console.log(data);
				   
				   obj = eval(data);
				   if(obj[0]['status'] == "success")
					 {
						toastr.options.timeOut = 3000;
						toastr.success(obj[0].msg);
						window.location.href = "<?=site_url('member/innovation_plan/index')?>";
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

 function showHide(id) {
		  var x = document.getElementById(id);
		  if (x.style.display === "none") {
			x.style.display = "block";
			$("#"+id+'_btn').html('<i class="fa fa-minus"></i>');
		  } else {
			x.style.display = "none";
			$("#"+id+'_btn').html('<i class="fa fa-plus"></i>');
		  }
		}
  function showhideClass(){
                if($(".sh").hasClass('show')){
					$(".sh").removeClass('show');
					$(".sh").addClass('hide');
					$('.clickMe').html('<i class="fa fa-plus"></i>');
				}
				else if($(".sh").hasClass('hide')){
					$(".sh").removeClass('hide');
					$(".sh").addClass('show');
					$('.clickMe').html('<i class="fa fa-minus"></i>');
				} 
		  }		
</script>