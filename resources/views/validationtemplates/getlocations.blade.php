<?php 
	foreach($blockLocations as $skey=>$assets)
	{
?>
	<label for="<?php echo $skey; ?>">
		   <input type="checkbox" name="ride_machines[]" id="<?php echo $skey; ?>" value="<?php echo $skey ?>"/> <?php echo $assets; ?>
	</label>
<?php } ?>	