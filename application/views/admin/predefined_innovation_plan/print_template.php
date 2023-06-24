<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_innovation_plan'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of predefined_innovation_plan-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Predefined Activities</th>
<th>Plan</th>
<th>Performance Indicators</th>
<th>Weight Of Plan</th>
<th>Sl No</th>

    </tr>
	<?php foreach($predefined_innovation_plan as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_activities_model');
									   $dataArr = $this->CI->Predefined_activities_model->get_predefined_activities($c['predefined_activities_id']);
									   echo $dataArr['activities_name'];?>
									</td>
<td><?php echo $c['plan']; ?></td>
<td><?php echo $c['performance_indicators']; ?></td>
<td><?php echo $c['weight_of_plan']; ?></td>
<td><?php echo $c['sl_no']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of predefined_innovation_plan//--> 