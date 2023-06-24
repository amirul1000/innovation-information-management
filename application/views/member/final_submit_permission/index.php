<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Final_submit_permission'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<!--<div class="float_left padding_10">
		<a href="<?php echo site_url('member/final_submit_permission/save'); ?>"
			class="btn btn-success">Add</a>
	</div>-->
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('member/final_submit_permission/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('member/final_submit_permission/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//--> 
   
<!--Data display of final_submit_permission-->     
<div style="overflow-x:auto;width:100%;">      
<table class="table table-striped table-bordered">
    <tr>
		<!--<th>Powner Users</th>-->
<th>Financial Year</th>
<th>Department</th>
<th>Allow Last Date</th>
<th>Submit Status</th>
<th>Resubmit Status</th>

		<th>Actions</th>
    </tr>
	<?php foreach($final_submit_permission as $c){ ?>
    <tr>
		<!--<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['powner_users_id']);
									   echo $dataArr['email'];?>
									</td>-->
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Financial_year_model');
									   $dataArr = $this->CI->Financial_year_model->get_financial_year($c['financial_year_id']);
									   echo $dataArr['financial_year_name'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Department_model');
									   $dataArr = $this->CI->Department_model->get_department($c['department_id']);
									   echo $dataArr['department'];?>
									</td>
<td><?php echo $c['allow_last_date']; ?></td>
<td><?php echo $c['submit_status']; ?></td>
<td><?php echo $c['resubmit_status']; ?></td>

		<td>
            <a href="<?php echo site_url('member/final_submit_permission/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('member/final_submit_permission/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('member/final_submit_permission/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
</div>
<!--End of Data display of final_submit_permission//--> 

<!--No data-->
<?php
	if(count($final_submit_permission)==0){
?>
 <div align="center"><h3>Data does not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
