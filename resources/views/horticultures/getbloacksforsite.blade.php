<?php
	if(count($blocks)>0)
	{
?>
{!! Form::label('block_id', 'Location', ['class' => 'control-label']) !!}
<select name="block_id" id="block_id" class="form-control required"  onchange="sublocation(this.value)">
		<option value="">Select Block</option>
        <?php 
			foreach($blocks as $key=>$block) 
			{
		?>
        <option value="<?php echo $block['block_id'] ?>"><?php echo $block['block_name']; ?></option>
        <?php
			}
		 ?>
</select>
<?php
		
	}
?>
