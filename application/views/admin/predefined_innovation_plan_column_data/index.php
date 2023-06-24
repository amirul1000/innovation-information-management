<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_innovation_plan_column_data'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/predefined_innovation_plan_column_data/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/predefined_innovation_plan_column_data/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/predefined_innovation_plan_column_data/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of predefined_innovation_plan_column_data-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Predefined Objectives Column</th>
<th>Predefined Innovation Plan</th>
<th>Column Data</th>

		<th>Actions</th>
    </tr>
	<?php foreach($predefined_innovation_plan_column_data as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_objectives_column_model');
									   $dataArr = $this->CI->Predefined_objectives_column_model->get_predefined_objectives_column($c['predefined_objectives_column_id']);
									   echo $dataArr['column_name'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Predefined_innovation_plan_model');
									   $dataArr = $this->CI->Predefined_innovation_plan_model->get_predefined_innovation_plan($c['predefined_innovation_plan_id']);
									   echo $dataArr['plan'];?>
									</td>
<td><?php echo $c['column_data']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/predefined_innovation_plan_column_data/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/predefined_innovation_plan_column_data/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/predefined_innovation_plan_column_data/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of predefined_innovation_plan_column_data//--> 

<!--No data-->
<?php
	if(count($predefined_innovation_plan_column_data)==0){
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
