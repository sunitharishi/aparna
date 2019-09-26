<?php
	if(count($blocks)>0)
	{
?>
{!! Form::label('sub_location', 'Sub Location', ['class' => 'control-label']) !!}
<select name="sub_location" id="sub_location" class="form-control required">
		<option value="">Select Locations</option>
        <?php 
			foreach($blocks as $key=>$block) 
			{
		?>
        <option value="<?php echo $block['location_id'] ?>"><?php echo $block['location_name']; ?></option>
        <?php
			}
		 ?>
</select>
<?php
		
	}
?>
