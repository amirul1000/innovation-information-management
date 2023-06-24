<?php
	foreach($respoc as $c){
?>
  <div class="form-group"> 
  <label for="Sl No" class="col-md-12 control-label"><?php echo $c['column_name'];?> <?php echo eng_to_bengali_number($c['in_percent']);?>%</label> 
  <div class="col-md-12"> 
   <input type="hidden" name="predefined_objectives_column_id[]" value="<?php echo $c['id'];?>" id="predefined_objectives_column_id_<?php echo $c['id'];?>">
   <input type="text" name="column_data[]" value="" class="form-control ein" id="column_data_<?php echo $c['id'];?>" /> 
  </div> 
   </div>
<?php
		}
?>			

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
