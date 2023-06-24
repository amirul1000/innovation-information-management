<style>
.table td{
	vertical-align:top !important;
}
.table td, .table th{
	padding: .0rem !important;
}
</style>

<!--End of Data display of predefined_objectives//--> 
<style>
.div-table {
  display: table;         
  width: 200%; 
  border: 1px solid #666666;         
  border-spacing: 1px; /* cellspacing:poor IE support for  this */
}
.div-table-row {
  display: table-row;
  width: auto;
  clear: both;
}
.div-table-col {
  float: left; /* fix for  buggy browsers */
  display: table-column;         
  width: 110px; 
  padding:3px;
}

.large-col{
	width: 200px !important; 
}
 

.show{
	  display:block;
  }
.hide{
	   display:none;
  }
  
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
 
.scroll {
	margin: 4px, 4px;
	padding: 4px;
  
	width: 1200px;
	overflow-x: auto;
	//overflow-y: hidden;
	//white-space: nowrap;
}
  .headerbar{
      background: #FFEFEA !important; //#4B9FB9 #640326
      color: #ffffff !important;
      position: relative;
      margin-bottom: 1.5em;
      margin-right: -2.5em;
      margin-left: -2.5em;
      box-shadow: 5px 5px 5px #d9d9d9;
  }
  
   .even{
      background: white !important; //#4B9FB9 #640326
      color: #ffffff !important;
      position: relative;
      margin-bottom: 1.5em;
      margin-right: -2.5em;
      margin-left: -2.5em;
      box-shadow: 5px 5px 5px #d9d9d9;
  }
  
  .odd{
      background: #F0F8FF !important; //#4B9FB9 #640326
      color: #ffffff !important;
      position: relative;
      margin-bottom: 1.5em;
      margin-right: -2.5em;
      margin-left: -2.5em;
      box-shadow: 5px 5px 5px #d9d9d9;
  }
  
  .even1{
      background: #EFEFEF; //#4B9FB9 #640326
      color: #ffffff !important;
      position: relative;
      margin-bottom: 1.5em;
      margin-right: -2.5em;
      margin-left: -2.5em;
      box-shadow: 5px 5px 5px #d9d9d9;
  }
  
  .odd1{
      background: #FFFFFF !important; //#4B9FB9 #640326
      color: #ffffff !important;
      position: relative;
      margin-bottom: 1.5em;
      margin-right: -2.5em;
      margin-left: -2.5em;
      box-shadow: 5px 5px 5px #d9d9d9;
  }
@media only screen and (max-width: 600px) {
	
}
</style>


<?php
  	$this->db->order_by('order_no', 'asc');
	$this->db->where('financial_year_id', $this->input->post('id'));
	$respoc = $this->db->get('predefined_objectives_column')->result_array();
	$db_error = $this->db->error();
	if (!empty($db_error['code'])){
		echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
		exit;
	}
	
	$total_objectives_column = isset($respoc)?count($respoc):0;
			
?>
<!--Data display of predefined_objectives--> 
<div class="scroll">      
<div class="div-table">
    <div class="div-table-row headerbar"> 
        <div class="div-table-col sh show"><strong>ক্রম</strong></div>
        <div class="div-table-col large-col sh show"><strong>কর্ম সম্পাদন ক্ষেত্র </strong></div>
        <div class="div-table-col sh show"><strong>মান </strong></div>
        <div class="div-table-col large-col sh show"><strong>কার্যক্রম</strong></div>
        <div class="div-table-col large-col"><a href="javascript:void(0)" class="clickMe" onClick="showhide();"><<</a><strong> কর্ম  সম্পাদন সূচক</strong></div>
        <div class="div-table-col"><strong>একক</strong></div>
        <div class="div-table-col"><strong>কার্য  সম্পাদনের সূচকের মান</strong></div>
        <?php		   
			foreach($respoc as $c){
		?>
        <div class="div-table-col"><strong>
          <?php echo $c['column_name'];?> <br>
          <?php echo eng_to_bengali_number($c['in_percent']);?>%</strong>
        </div>
        <?php
			}
	    ?>		
    </div>
	<?php
		  $colspan = $total_objectives_column+5;
		  $width1 = 100*$colspan; 
		  $color1 = -1;
	?>
	<?php foreach($respo as $c){ ?>
    
    <?php
		   
			$color1_cls ='even';
				$color1++;
				if($color1%2==0){
					$color1_cls ='even';
				}
				else{
					$color1_cls ='odd';
				}
		?>
    <div class="div-table-row <?=$color1_cls?>">
        <div class="div-table-col sh show"><?php echo $c['sl_no']; ?></div>
        <div class="div-table-col large-col sh show"><?php echo $c['objectives_name']; ?></div>
        <div class="div-table-col sh show"><?php echo eng_to_bengali_number($c['weight_of_objectives']); ?>
        </div>
        
        <div  class="div-table-col" style="width:<?=$width1?>px;"> 
             <div   class="div-table">
                <?php
				    $this->db->order_by('order_no', 'asc');
					$this->db->where('predefined_objectives_id', $c['id']);
					$respa = $this->db->get('predefined_activities')->result_array();
					$db_error = $this->db->error();
					if (!empty($db_error['code'])){
						echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
						exit;
					}
					$colspan = $total_objectives_column+4;
					$width2 = 100*$colspan;
					$color2 = 0;
					foreach($respa as $a){
						$color2_cls ='even1';
						$color2++;
						if($color2%2==0){
							$color2_cls ='even1';
						}
						else{
							$color2_cls ='odd1';
						} 
					
				?>    
                <div class="div-table-row <?=$color2_cls?>">
                   <div   class="div-table-col large-col sh show">[<?=eng_to_bengali_number($a['sl_no'])?>]<?php echo $a['activities_name'];  ?>
                   </div>
                   <div   class="div-table-col"  style="width:<?=$width2?>px;">
                     <div  class="div-table">
                        <?php
						$this->db->order_by('sl_no', 'asc');
						$this->db->where('predefined_activities_id', $a['id']);
						$respip = $this->db->get('predefined_innovation_plan')->result_array();
						$db_error = $this->db->error();
						if (!empty($db_error['code'])){
							echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
							exit;
						}
						
						foreach($respip as $c1){
						?>
                      
                        <div class="div-table-row">
                              <div  class="div-table-col large-col">[<?=eng_to_bengali_number($c1['sl_no'])?>]<?=$c1['plan']?></div>
                              <div  class="div-table-col"><?=$c1['performance_indicators']?></div>
                              <div  class="div-table-col"><?=eng_to_bengali_number($c1['weight_of_plan'])?></div>
                              <?php
							  foreach($respoc as $c2){
								    $this->db->order_by('id', 'desc');
									$this->db->where('predefined_objectives_column_id', $c2['id']);
									$this->db->where('predefined_innovation_plan_id', $c1['id']);
									$respipcd = $this->db->get('predefined_innovation_plan_column_data')->result_array();
									$db_error = $this->db->error();
									if (!empty($db_error['code'])){
										echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
										exit;
									}
							  ?>
                              <div  class="div-table-col">
                                 <?=isset($respipcd[0]['column_data'])?eng_to_bengali_number($respipcd[0]['column_data']):''?>
                              </div>
                              <?php
							  }
							  ?>
                              
                              <div  class="div-table-col">
                                 <?php
								    $this->db->order_by('id', 'desc');
									$this->db->where('department_id', $this->session->userdata('selected_department_id'));
									$this->db->where('users_id', $this->session->userdata('selected_users_id'));
									$this->db->where('predefined_innovation_plan_id',$c1['id']);
									$resip = $this->db->get('innovation_plan')->result_array();
									$db_error = $this->db->error();
									if (!empty($db_error['code'])){
										echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
										exit;
									}
									$css ='no-data';
									$title ='pending';
									if(count($resip)>0){
										if($resip[0]['submission']==''){
											$css ='no-data';
										}
										else if($resip[0]['submission']=='half year submitted'){
											$css ='half-data';
											$title ='half year submitted';
										}else if($resip[0]['submission']=='full year submitted'){
											$css ='full-data';
											$title ='full year submitted';
										}else if($resip[0]['submission']=='completed'){
											$css ='data';
											$title ='completed';
										}
									}
								 ?> 
                                 <a href="<?php echo site_url('member/innovation_plan/view_evaluation/'.$c1['id']); ?>" title="<?=$title?>"><i class="zmdi zmdi-eye <?=$css?>"></i></a>
                              </div>
                              
                         </div>
                        <?php
						}
						?> 
                         
                      </div>
                    </div> 
                  </div>
               
                
                <?php
					}
				?>
               </div>
         </div>
     </div>
	<?php } ?>
</div>
</div>




