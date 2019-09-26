<input type="hidden" name="id" id="id" value="<?php echo $audit_res['id']; ?>" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">  
      <div class="col-xs-12 form-group"> 
        <div class="snag-reports-edit">
		 <div class="col-sm-6 form-group">
		     <label>Category</label><br>
		     {!! Form::select('categories', $categories, $catid, ['class' => 'form-control pms-auditreport', 'id' => 'category', 'required']) !!}
		 </div>
		 <div class="col-sm-6 form-group">
		      <label>Upload Image</label><br>
		     <input type="file" class="form-control"  name="imagepath" /><?php if(isset($audit_res['imagepath'])) {  if($audit_res['imagepath']) {?> <a href="/uploads/snag/<?php echo $audit_res['imagepath']; ?>" target="_blank">View</a> <?php } }?>
		 </div>
		 <div class="col-sm-6">
		     <label>Observation</label><br>
		     <textarea name="observation" id="observation"  style="width:100%; height:50px;"><?php echo $audit_res['observation']; ?></textarea>
		 </div>
		 <div class="col-sm-6 form-group">
		     <label>Location</label><br>
		     <textarea name="location" id="location" style="width:100%; height:50px;"><?php echo $audit_res['location']; ?></textarea>
		 </div>
		 <div class="col-sm-6 form-group">
		      <label>Snag Report Date</label><br>
		     <input type="text" id="example1" name="reporton" value="<?php echo date("d-m-Y",strtotime($audit_res['reporton']));?>" class="hasDatePicker form-control">
		 </div>
		 <div class="col-sm-6 form-group">
		     <label>Timeline given by projects team</label><br>
		     <input type="text" id="example2" name="timeline" value="<?php if($audit_res['timeline']!="") echo date("d-m-Y",strtotime($audit_res['timeline']));?>" class="hasDatePicker form-control">
		 </div>	
		 <div class="col-sm-6 form-group status" style="height:auto !important;">
		    <label>Status</label><br>
		    <input type="radio" name="status" value="1" id="status" <?php if($audit_res['status']==1) echo "checked='checked'"; ?>> Open
			<input type="radio" name="status" value="2" id="status" <?php if($audit_res['status']==2) echo "checked='checked'"; ?>> Inprogress
			<input type="radio" name="status" value="0" id="status" <?php if($audit_res['status']==0) echo "checked='checked'"; ?>> Closed
		 </div>	
         <div class="col-sm-6 form-group">
		      <label>Remarks</label><br>
		     <textarea name="remarks" id="remarks" style="width:100%; height:50px;"></textarea>
		 </div> 
		 <div class="col-sm-6 form-group">
		     <label>Recommendations</label><br>
             <input type="radio" value="image" name="rectype" <?php if($audit_res['rectype']=="image") echo "checked='checked'"; ?>/> Image
             <input type="radio" value="text" name="rectype" <?php if($audit_res['rectype']=="text") echo "checked='checked'"; ?>/> Text
             <div class="image" style="display:<?php if($audit_res['rectype']=="image") echo "block"; else echo "none;" ?>;">
		     	  <input type="file" class="form-control"  name="recimagepath" /><?php if(isset($audit_res['recimagepath'])) {  if($audit_res['recimagepath']) {?> <a href="/uploads/snag/rec/<?php echo $audit_res['recimagepath']; ?>" target="_blank">View</a> <?php } }?>
             </div>
             <div class="text" style="display:<?php if($audit_res['rectype']=="text") echo "block"; else echo "none;" ?>;">		     	
                <textarea name="recommendations" id="recommendations" style="width:100%; height:50px;"><?php echo $audit_res['recommendation']; ?></textarea>
             </div>
		 </div>
		 </div>
	   </div>
	   
	   <div class="col-sm-12">
	       <div class="snag-edit-submit">
			   {!! Form::button('Update', ['class' => 'btn btn-danger', 'onclick'=>'subform()']) !!}
	       </div>
	   </div>
	</div>
    <script type="text/javascript">
		function subform()
		{
			var catid = $("#category").val();
			var observation = $("#observation").val();
			var location = $("#location").val();
			var example1 = $("#example1").val();
			var example2 = $("#example2").val();
			var status = $("#status").val();
			var token = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
			
				type:'POST',
				url: '/storesnag',
				dataType: 'JSON',
				data: {
					"_method": 'POST',
					"_token": token,
					"catid": catid,
					"observation": observation,
					"location": location,
					"example1": example1,
					"example2": example2,
					"status": status,
				},
				success:function(data){
					console.log('success');
					console.log(data);
				},
				error:function(){
			
				},
			});
		}
		$( document ).ready(function() {
		   $('#example1').datepicker({ dateFormat: "dd-mm-yy" });
		   $('#example2').datepicker({ dateFormat: "dd-mm-yy" });
			   $("input[name$='rectype']").click(function() {
				var inputValue = $(this).attr("value");
				if(inputValue=='image')
				{
					$(".image").show();
					$(".text").hide();
				}
				else
				{
					$(".image").hide();
					$(".text").show();
				}
			});
		});

    </script>
