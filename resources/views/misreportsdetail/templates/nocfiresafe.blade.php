<style type="text/css">
		.error
		{
			border:2px solid #FF0000;
		}
</style>
<?php 
if($noc_cn >0) 
{
?>
{!! Form::open(['method' => 'POST', 'route' => ['misreports.storenocfiresafe'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
<input type="hidden" name="user_id" value="1" />
<input type="hidden" name="year" value="<?php echo $report_year; ?>" />
<input type="hidden"  name="month" value="<?php echo $report_month; ?>" />
<input type="hidden" name="site" value="<?php echo $site; ?>" />
<div class="report-validation-blockslist" style="width:50%; margin:0px auto;">
	 <div class="blockable"> <div class="title12"><b>Blocks Information</b></div>
	 <div class="dividerssd" style="overflow:hidden;">      
		   <div class="col-sm-4 reportvalidation-blockname">
				<label>Block Name</label>
		   </div>
		   <div class="col-sm-4 worst-of-worst name-changed">
				<label>Name Changed to Society</label>
		   </div>
		   <div class="col-sm-4 valid-upto">
			   <label>Valid up to</label>
		   </div>	
	</div>
	<?php   
		foreach($noc_info as $key=>$noc) 
		{ 
	?>
	
		<div class="col-xs-4 nameofthebloadk">
			<b><?php echo  $noc->blockname; ?></b>
			<?php if($updatedval=='yes') { ?>
			<input type="hidden" name="ids[]" value="<?php echo $noc->id; ?>" />
			<?php } else {  ?>
			<input type="hidden" name="ids[]" value="" />
			<?php } ?>
			<input type="hidden" class="ereq" name="blockname[]" value="<?php echo $noc->blockname; ?>" />
		</div> 
		<div class="col-xs-4 socitynamechages">
			<select name="name_change_socity[]" class="ereq" class="form-control">
					<option value="Yes" <?php if( $noc->name_change_socity =='Yes') echo "selected='selected'"; ?>>Yes</option>
					<option value="No" <?php if( $noc->name_change_socity =='No') echo "selected='selected'"; ?>>No</option>
					<option value="N/A" <?php if( $noc->name_change_socity =='N/A') echo "selected='selected'"; ?>>N/A</option>
			</select>
		</div>
		<div class="col-xs-4 decalrewar"> 
			 <div>
				 <input type="radio"  checked="checked" value="date" name="validate_<?php echo $noc->id; ?>" onchange="selectvalid123(<?php echo $noc->id; ?>);">Date
				 <input type="radio" name="validate_<?php echo $noc->id; ?>" value="other" onchange="disselectvalid123(<?php echo $noc->id; ?>);">Other 
			 </div>
		     <div id="div_<?php echo $noc->id; ?>">
			 	 <input type="text" class="ereq" name="valid_upto[]" value="<?php echo  $noc->valid_upto; ?>" /> 
			</div>
		</div>
	<?php } ?>		
	</div>
	<div style="text-align:center;">{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}</div>
	{!! Form::close() !!}
</div>	
<?php }
else { 
$blockarr = array("1"=>"A","2"=>"B","3"=>"C","4"=>"D","5"=>"E","6"=>"F","7"=>"G","8"=>"H","9"=>"I","10"=>"J","11"=>"K","12"=>"L","13"=>"M","14"=>"N","15"=>"O","16"=>"P","17"=>"Q","18"=>"R"); ?>
{!! Form::open(['method' => 'POST', 'route' => ['misreports.storenocfiresafe'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
<input type="hidden" name="user_id" value="1" />
<input type="hidden" name="year" value="<?php echo $report_year; ?>" />
<input type="hidden"  name="month" value="<?php echo $report_month; ?>" />
<input type="hidden" name="site" value="<?php echo $site; ?>" />
<div class="report-validation-blockslist" style="width:50%; margin:0px auto;">
	 <div class="blockable"> <div class="title12"><b>Blocks Information</b></div>
	 <div class="dividerssd" style="overflow:hidden;">      
		   <div class="col-sm-4 reportvalidation-blockname">
				<label>Block Name</label>
		   </div>
		   <div class="col-sm-4 worst-of-worst name-changed">
				<label>Name Changed to Society</label>
		   </div>
		   <div class="col-sm-4 valid-upto">
			   <label>Valid up to</label>
		   </div>	
	</div>
	<?php   
		$cn = $num_of_blocks_text; 
		if( (int)  $cn > 0) { 
		for($i = 1; $i <= $cn; $i++) 
		{ 
	?>
		<div class="col-xs-4 nameofthebloadk">
			<b>Block - <?php echo  $blockarr[$i]; ?> </b>
			<input type="hidden" name="ids[]" value="" />
			<input type="hidden" class="ereq" name="blockname[]" value="Block - <?php echo  $blockarr[$i]; ?>" />
		</div> 
		<div class="col-xs-4 socitynamechages">
			<select name="name_change_socity[]" class="ereq" class="form-control">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="N/A">N/A</option>
			</select>
		</div>
		<div class="col-xs-4 decalrewar"> 
			 <div>
				 <input type="radio"  checked="checked" value="date" name="validate_<?php echo $i; ?>" onchange="selectvalid123(<?php echo $i; ?>);">Date
				 <input type="radio" name="validate_<?php echo $i; ?>" value="other" onchange="disselectvalid123(<?php echo $i; ?>);">Other 
			 </div>
		     <div id="div_<?php echo $i; ?>"> 
			 	 {!! Form::text('valid_upto[]', '', ['class' => 'form-control ereq resetval', 'placeholder' => '', 'id'=> 'dateval_'.$i]) !!} 
			</div>
		</div>
	<?php }} $i = (int) $cn+1;?>
		<div>
			Clubhouse
            <input type="hidden" name="ids[]" value="" />
			<input type="radio"  checked="checked" class="radioBtnClass" onchange="sclub(<?php echo $cn+1; ?>,'Yes');" name="statusclub" value="Yes"/>Yes
			<input type="radio"  name="statusclub" class="radioBtnClass" onchange="sclub(<?php echo $cn+1; ?>,'No');" value="No"/>No
		</div>
		<div class="clubhouse_dispaly">
			<div class="col-xs-4 nameofthebloadk">
				<b>Club House</b>
				<input type="hidden" class="ereq blockname" name="blockname[]" value="Club House" />
			</div> 
			<div class="col-xs-4 socitynamechages">
				<select name="name_change_socity[]" class="ereq form-control">
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						<option value="N/A">N/A</option>
				</select>
			</div>
			<div class="col-xs-4 decalrewar"> 
				 <div>
					 <input type="radio"  checked="checked" value="date" name="validate_<?php echo $cn+1; ?>" onchange="selectvalid123(<?php echo $cn+1; ?>);">Date
					 <input type="radio" name="validate_<?php echo $cn+1; ?>" value="other" onchange="disselectvalid123(<?php echo $cn+1; ?>);">Other 
				 </div>
				 <div id="div_<?php echo $i; ?>"> 
					 {!! Form::text('valid_upto[]', '', ['class' => 'form-control ereq resetval', 'placeholder' => '', 'id'=> 'dateval_'.$i]) !!} 
				</div>
			</div>
		</div>
	</div>
	<div style="text-align:center;">{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}</div>
	{!! Form::close() !!}
</div>
<script type="text/jscript">
		
	function sclub()
	{
		console.log("sdfsdf");
	}
</script>
<?php } ?>
