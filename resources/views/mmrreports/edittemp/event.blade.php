 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="col-sm-12 mmr-housekeeping-heading">
    <h3 class="page-title"><span class="mmr"> Events</span>
    </h3>
    <span class="pull-right mmr-back">
         <a href="/mmr/main?y=<?php echo $year; ?>&m=<?php echo $month; ?>&site=<?php echo $site; ?>">Back</a>
    </span>
</div>

<div class="col-sm-12 mmrreports-valueadds">  
   <div class="showing-month-details form-group">
   	  <h3> {{ $sitename }}
      		<span>{{  $monthname }} - {{ $year }} </span>
      </h3>
   </div>
         {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storemmreventmonth'], 'class' => 'for-labelling']) !!}
            {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
            {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
           
 			<div class="row mmr-housekeeping-editpage">
				   <div class="col-sm-1 col-xs-1">
                     <label>Type</label>
              </div>
              <div class="col-sm-2 col-xs-2">
                     <label>Location</label>
                     
              </div>
              <div class="col-sm-1 col-xs-1">
                     <label>Date</label>
                     
              </div>
              <div class="col-sm-2 col-xs-2">
                     <label>Description</label>
                     
              </div>
			  <div class="col-sm-6 col-xs-6">
				  <div class="col-sm-3 col-xs-3" >
						 <label>Image1</label>
				  </div>
				  <div class="col-sm-3 col-xs-3" >
						 <label>Image2</label>
				  </div>
				  <div class="col-sm-3 col-xs-3" >
						 <label>Image3</label>
				  </div>
				  <div class="col-sm-3 col-xs-3" >
						 <label>Image4</label>
				  </div>
              </div>
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div>
           
           <div class="">
			    <?php $mgp = 0; if(count($pbasys) > 0) {
				 $mgp = 0;
				 
			foreach($pbasys as $dgcon) { ?>
             <div class="row">
            <div class="col-sm-1 col-xs-1 form-group">
                 <input type="hidden" name="pbaid[]" value="<?php echo  $dgcon['id']; ?>">
				 <input type="text" class="form-control" required name="type[]"   value="<?php echo  $dgcon['type']; ?>"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" required name="location[]"   value="<?php echo  $dgcon['location']; ?>"/>
              </div>
              
               <div class="col-sm-1 col-xs-1 form-group">
                     <input type="text" class="form-control" required id="report_ondate" name="report_date[]"   value="<?php echo  $dgcon['report_date']; ?>"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" required name="description[]"   value="<?php echo  $dgcon['description']; ?>"/>
              </div>
			  <div class="col-sm-6 col-xs-6 form-group">
				   <div class="col-sm-3 col-xs-3 form-group">					   
					   <input type="file" class="form-control"  name="before_image1[]" /><?php if(isset($dgcon['before_image1'])) {  if($dgcon['before_image1']) {?> <div id="before_image1_delete_<?php echo  $dgcon['id']; ?>"><a href="/<?php echo $dgcon['before_image1']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'before_image1','events','<?php echo $dgcon['before_image1']; ?>')">Delete</a></div><?php } }?>
				  </div>
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control"  name="before_image2[]" /><?php if(isset($dgcon['before_image2'])) {  if($dgcon['before_image2']) {?> <div id="before_image2_delete_<?php echo  $dgcon['id']; ?>"><a href="/<?php echo $dgcon['before_image2']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'before_image2','events','<?php echo $dgcon['before_image2']; ?>')">Delete</a></div><?php } }?>
				  </div>
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control"  name="before_image3[]" /><?php if(isset($dgcon['before_image3'])) {  if($dgcon['before_image3']) {?> <div id="before_image3_delete_<?php echo  $dgcon['id']; ?>"><a href="/<?php echo $dgcon['before_image3']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'before_image3','events','<?php echo $dgcon['before_image3']; ?>')">Delete</a></div><?php } }?>
				  </div>
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control"  name="before_image4[]" /><?php if(isset($dgcon['before_image4'])) {  if($dgcon['before_image4']) {?> <div id="before_image4_delete_<?php echo  $dgcon['id']; ?>"><a href="/<?php echo $dgcon['before_image4']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'before_image4','events','<?php echo $dgcon['before_image4']; ?>')">Delete</a></div><?php } }?>
				  </div>
			  </div>
			  
              </div>
			     <?php } } else { ?>
               <div class="row">
               <div class="col-sm-1 col-xs-1 form-group">
				 <input type="hidden" name="pbaid[]" value="0">
				 <input type="text" class="form-control" required name="type[]"/>
              </div>	
				 <div class="col-sm-2 col-xs-2 form-group">
                 <input type="text" class="form-control"required name="location[]"/>
              </div>
               <div class="col-sm-1 col-xs-1 form-group">
                 <input type="text" class="form-control" required id="report_ondate" name="report_date[]"/>
              </div>
               <div class="col-sm-2 col-xs-2 form-group">
                 <input type="text" class="form-control" required name="description[]"/>
              </div>
			  <div class="col-sm-6 col-xs-6 form-group">
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control" required  name="before_image1[]" />
				  </div>
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control"  name="before_image2[]" />
				  </div>
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control"  name="before_image3[]" />
				  </div>
				  <div class="col-sm-3 col-xs-3 form-group">
					   <input type="file" class="form-control"  name="before_image4[]" />
				  </div>
			  </div>
            </div>   
                
             <?php } ?> 
				  <?php if($mgp > 0){  $pubadsy=$mgp - 1; } else {$pubadsy = 0;} ?>
                      <input type="hidden" id="pubadsy" value="<?php echo ++$pubadsy; ?>">
		  
          
           </div> 
		   
		    <div id="divTxtpubadsy"> 

                       	</div>    




<div class="col-sm-12 mmr-housekeeping-submission">
{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
</div>                
  {!! Form::close() !!}                    
	  					 
</div> 
					   
					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

//STATUS REPORTS

var year = $("#mis_year").val();
var month = $("#mis_month").val();
 $('#reasontext').summernote({

              height:300,

            });

$('.example1').datepicker({ dateFormat: "dd-mm-yy" });
 $('#report_ondate').datepicker({ dateFormat: "dd-mm-yy" });

$( "#eb_poweredit" ).click(function() {
		var year = $("#year").val();
		var month = $("#month").val();
		var site = $("#site").val();
		
		if(year == "" || month == "" || site == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;
		} else {
		window.location.href = "/editmmr/1/"+year+"/"+month+"/"+site; 
		
		}
	});
	
	
	$( "#download_mis" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		var site = $("#site").val();
		
		if(year == "" || month == "" || site == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/mmr/main";  
		} else {
		window.location.href = "/downloadoverallmmr/"+year+"/"+month+"/"+site; 
		}
	});
	
	
	$( "#get_editview" ).click(function() {
	    var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		var site = $("#site").val();
		
		if(year == "" || month == "" || site == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/mmr/main";  
		} else {
		window.location.href = "/updatemmr/"+year+"/"+month+"/"+site; 
		}
		
	});
 
});


function getmmreditform(val){

var year = $("#year").val();
var month = $("#month").val();
var site = $("#site").val();
var mmr_type = $("#mmr_type").val();

if(val == ""){} else { 
      $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('mmr.mmreditform') }}',
				data: { year: year, month: month, site: site, mmr_type: mmr_type},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
				  $('#reasontext').summernote({

              height:300,

            });
				 
				}  
        });
   
}
}


function addpubadFormField() {
		var id = document.getElementById("pubadsy").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		  
		$("#divTxtpubadsy").append("<div class='row mmr-housekeeping-adding' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group'><input type='hidden' name='pbaid[]' value='0'><input type='text' name='type[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='location[]' class='form-control'/></div><div class='col-sm-1 col-xs-1 form-group'><input type='text' id='report_ondate' name='report_date[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='description[]' class='form-control'/></div><div class='col-sm-6 col-xs-6 form-group'><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='before_image1[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='before_image2[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='before_image3[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='before_image4[]' class='form-control'/></div></div><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		  
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("pubadsy").value = id;	
		$('.example1').datepicker({ dateFormat: "dd-mm-yy" });

	} 
	  
	
	function removepublicaddFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("pubadsy").value;

		id = (id - 1);

		document.getElementById("pubadsy").value = id;

	}

	function deleteImage(id,type,tablename,filename)
	{
		var r = confirm("Are you sure you want to delete this image?");	
		if (r == true) {
			$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('mmr.deleteppmImage') }}',
			data: { imageId: id, type: type, tablename: tablename, fileName: filename},
			success: function( response ) {
				$("#"+type+"_delete_"+id).remove();
			}  
		 });
		 
		} else {
		  return false;
		}
	}
  </script>
@include('partials.footer')
@stop 