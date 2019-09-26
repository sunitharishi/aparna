<div style="width:100%; overflow:hidden;">
 <input type="hidden" name="id" value="<?php echo $report_id; ?>" />
 <input type="hidden" name="report_name" value="<?php echo $report_name; ?>" />
 <div style="width:20%; float:left;"><input type="checkbox" onchange="checkALL(this)" value="" class="checkboxClass"/> ALL</div>
 <?php
   if(count($sites)>0)
   {
    foreach($sites as $key=>$value)
    {
  ?>
  <div style="width:20%; float:left;">
  		<?php 
			if (in_array($key, $slist)) $checked='yes'; else $checked='no';
		 ?>
        <input type="checkbox" class="checkboxClass" value="<?php echo $key ?>" name="site[]" <?php if($checked=='yes') echo "checked='checked'"; ?>/> <?php echo $value; ?>
  </div>
  <?php 
    }
   }
 ?>
</div>
<div class="desibtn" style="margin-bottom:20px; text-align:center; width:100%; margin-top:25px;">
<button type="submit" class="btn btn-default">Upload file</button>
</div>