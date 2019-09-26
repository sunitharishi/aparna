<input type="hidden" name="id" id="id" value="<?php echo $audit_res['id']; ?>" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">  
      <div class="col-xs-12 form-group" style="text-align:left;"> 
        <div class="snag-reports-edit">
		 <div class="col-sm-6 form-group">
		     <label>Category</label><br>
		     {!! Form::select('categories', $categories, $catid, ['class' => 'form-control pms-auditreport', 'id' => 'ecat', 'required']) !!}
		 </div>
		 <div class="col-sm-6 form-group">
		     <label>Location</label><br>
		     <textarea name="location" id="location" class="form-control" style="width:100%; height:50px;"><?php echo $audit_res['location']; ?></textarea>
		 </div>
		 <div class="col-sm-6">
		     <label>Observation</label><br>
		     <textarea name="observation" id="observation" class="form-control"  style="width:100%; height:50px;"><?php echo $audit_res['observation']; ?></textarea>
		 </div>
         <div class="col-sm-6 form-group">
		      <label>Remarks</label><br>
		     <textarea name="remarks" id="remarks" class="form-control" style="width:100%; height:50px;"></textarea>
		 </div> 
		 <div class="col-sm-4 form-group">
		      <label>Snag Report Date</label><br>
		     <input type="text" id="example1" autocomplete="off" name="reporton" value="<?php echo date("d-m-Y",strtotime($audit_res['reporton']));?>" class="hasDatePicker form-control">
		 </div>
		 <div class="col-sm-4 form-group">
		     <label>Timeline given by projects team</label><br>
			 <?php 
			 	$year = date('Y',strtotime($audit_res['timeline']));	
				if($year =='1970' || $year=='0000' || $year=='0001' || $year=='-0001') $timeline2 = "";
				else  $timeline2 = date("d-m-Y",strtotime($audit_res['timeline'])); 
			 ?>
		     <input type="text" id="example2" name="timeline" autocomplete="off" value="<?php echo $timeline2;?>" class="hasDatePicker form-control">
		 </div>	
		 <div class="col-sm-4 form-group status" style="height:auto !important;">
		    <label>Status</label><br>
		    <input type="radio" name="status" value="1" id="status" <?php if($audit_res['status']==1) echo "checked='checked'"; ?>> Open
			<input type="radio" name="status" value="2" id="status" <?php if($audit_res['status']==2) echo "checked='checked'"; ?>> Inprogress
			<input type="radio" name="status" value="0" id="status" <?php if($audit_res['status']==0) echo "checked='checked'"; ?>> Closed
		 </div>	
		 <div class="col-sm-6 form-group">
		     <label>Recommendations</label><br>
             <input type="radio" value="image" name="rectype" <?php if($audit_res['rectype']=="image") echo "checked='checked'"; ?>/> Image
             <input type="radio" value="text" name="rectype" <?php if($audit_res['rectype']=="text") echo "checked='checked'"; ?>/> Text
             <div class="image" style="display:<?php if($audit_res['rectype']=="image") echo "block"; else echo "none;" ?>;">
				  <form method="POST" action="{{ action('AuditReportsController@rfileStore') }}" enctype="multipart/form-data">
						<div class="form-group">
							<input value="<?php echo $audit_res['id']; ?>" id="snag_id" type="hidden" name="snag_id" class="form-control">
							<input value="" type="hidden" id="rec_image_path" name="rec_image_path" class="form-control">
							<span style="display:flex;"><input name="recimagepath" type="file" class="form-control"><input type="submit"  value="Upload" class="btn btn-primary"></span>
							<div class="progress" style="margin:0px;">
								<div class="bar"></div >
								<div class="percent" style="text-align:right; color:red;">0%</div >
							</div><?php /*?><?php if(isset($audit_res['recimagepath'])) {  if($audit_res['recimagepath']) {?> <a href="/uploads/snag/rec/<?php echo $audit_res['recimagepath']; ?>" target="_blank">View</a> <?php } }?><?php */?>
							
						</div>
					</form>  
             </div>
             <div class="text" style="display:<?php if($audit_res['rectype']=="text") echo "block"; else echo "none;" ?>;">		     	
                <textarea name="recommendations" class="form-control" id="recommendations" style="width:100%; height:50px;"><?php echo $audit_res['recommendation']; ?></textarea>
             </div>
		 </div>
		 
		 <div class="col-sm-6 form-group">
		    <label>Upload Image</label><br>
			<div class="row class-ctration">
                <div class="col-sm-12 form-group arrowma-catteach">
                    <form method="POST" action="{{ action('AuditReportsController@fileStore') }}" enctype="multipart/form-data">
						<div class="form-group">
							<input value="<?php echo $audit_res['id']; ?>" type="hidden" name="snag_id" class="form-control">
							<input value="" type="hidden" id="image_path" name="image_path" class="form-control">
							<span style="display:flex;"><input name="imagepath" type="file" class="form-control"><input type="submit"  value="Upload" class="btn btn-primary"></span>
							<div class="progress" style="margin:0px;">
								<div class="bar"></div >
								<div class="percent" style="text-align:right; color:red;">0%</div >
							</div>                  
		                    <?php /*?><?php if(isset($audit_res['imagepath'])) {  if($audit_res['imagepath']) {?> <a href="/uploads/snag/<?php echo $audit_res['imagepath']; ?>" target="_blank">View</a> <?php } }?><?php */?>
							
						</div>
					</form>
                </div>
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
	<?php /*?><script type="text/javascript">
		$(function() {
			$(document).ready(function()
			{
				var bar = $('.bar');
				var percent = $('.percent');
	
			   $('form').ajaxForm({
					beforeSend: function() {
						var percentVal = '0%';
						bar.width(percentVal)
						percent.html(percentVal);
					},
					uploadProgress: function(event, position, total, percentComplete) {
						var percentVal = percentComplete + '%';
						bar.width(percentVal)
						percent.html(percentVal);
					},
					complete: function(xhr) {
						alert('File Uploaded Successfully');
						//window.location.href = "/fileupload";
					}
				  });
			   }); 
		 });
	</script><?php */?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script> 
    <script type="text/javascript">
		function subform()
		{
			var id = $("#id").val();
			var catid = $("#ecat").val();
			var observation = $("#observation").val();
			var location = $("#location").val();
			var example1 = $("#example1").val();
			var example2 = $("#example2").val();
			var status = $("input[name='status']:checked"). val();
			var token = $('meta[name="csrf-token"]').attr('content');
			var rectype = $("input[name='rectype']:checked"). val();
			var recommendations = "";
			console.log(rectype);
			if(rectype=='text')  recommendations = $("#recommendations").val();
			else if(rectype=='image') {
				 recommendations = "/uploads/snag/rec/";
				 recommendations += $("#rec_image_path").val();
			}
			else recommendations = "";
			
			var snag_image = "/uploads/snag/rec/";
			snag_image += $("#image_path").val();
			
			console.log(recommendations);
			$.ajax({
			
				type:'POST',
				url: '/storesnag',
				dataType: "json",
				data: {
					"_method": 'POST',
					"_token": token,
					"catid": catid,
					"id": id,
					"observation": observation,
					"location": location,
					"reporton": example1,
					"timeline": example2,
					"snag_image": snag_image,
					"status": status,
					"rectype": rectype,
					"recommendations": recommendations
				},
				success:function(data){
					alert("Snag Updated Successfully");
					$('#editSnag').modal('hide');
					$(".category_col"+id).text(data['category']);
					$(".observation_col"+id).text(data['observation']);
					$(".snagimage_col"+id).html(data['snagimage']);
					$(".location_col"+id).text(data['location']);
					$(".reporton_col"+id).text(data['reporton']);
					$(".timeline_col"+id).text(data['timeline']);
					$(".status_col"+id).text(data['status']);
					if(data['rectype']=='text') $(".recommendation_col"+id).text(data['recommendation']);
					if(data['rectype']=='image') $(".recommendation_col"+id).html(data['recommendation']);
				},
				error:function(){
			
				},
			});
		}
		/*$( document ).ready(function() {
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
		});*/

    </script>
