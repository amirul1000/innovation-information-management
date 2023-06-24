<?php
	foreach($respoc as $c){
?>
  <div class="form-group"> 
  <label for="Sl No" class="col-md-12 control-label"><?php echo $c['column_name'];?> <?php echo $c['in_percent'];?></label> 
  <div class="col-md-12"> 
   <input type="hidden" name="predefined_objectives_column_id[]" value="<?php echo $c['id'];?>" id="predefined_objectives_column_id_<?php echo $c['id'];?>">
   <input type="text" name="column_data[]" value="" class="form-control" id="column_data_<?php echo $c['id'];?>" /> 
  </div> 
   </div>
<?php
		}
?>			