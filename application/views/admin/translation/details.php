<a  href="<?php echo site_url('admin/translation/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Translation'); ?></h5>
<!--Data display of translation with id--> 
<?php
	$c = $translation;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>En</td><td><?php echo $c['en']; ?></td></tr>

<tr><td>Bn</td><td><?php echo $c['bn']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of translation with id//--> 