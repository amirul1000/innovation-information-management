<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_objectives'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/predefined_objectives/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/predefined_objectives/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/predefined_objectives/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of predefined_objectives-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Financial Year</th>
<th>Sl No</th>
<th>Objectives Name</th>
<th>Weight Of Objectives</th>

		<th>Actions</th>
    </tr>
	<?php foreach($predefined_objectives as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Financial_year_model');
									   $dataArr = $this->CI->Financial_year_model->get_financial_year($c['financial_year_id']);
									   echo $dataArr['financial_year_name'];?>
									</td>
<td><?php echo $c['sl_no']; ?></td>
<td><?php echo $c['objectives_name']; ?></td>
<td><?php echo $c['weight_of_objectives']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/predefined_objectives/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/predefined_objectives/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/predefined_objectives/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of predefined_objectives//--> 

<!--No data-->
<?php
	if(count($predefined_objectives)==0){
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
