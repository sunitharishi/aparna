 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="col-sm-12 mmr-housekeeping-heading major-incidents">

    <h3 class="page-title"><span class="mmr"> MAJOR INCIDENTS SUMMARY</span>
    </h3>
    <span class="pull-right mmr-back">
         <a href="/mmr/main?y=<?php echo $year; ?>&m=<?php echo $month; ?>&site=<?php echo $site; ?>">Back</a>
    </span>
</div>

<div class="col-sm-12">  
   <div class="showing-month-details form-group">
   		<h3> {{ $sitename }}
        	<span>{{  $monthname }} - {{ $year }}</span>
        </h3>
   </div>
   
   <div class="majorincidents-summaryform">
     <div class="majorincidents-summaryinner">
         {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storemajorincident'], 'class' => 'for-labelling']) !!}
            {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
            {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
           
 <div class="row mmr-housekeeping-editpage">
         <div class="col-sm-1 col-xs-1 incident-serialnumber">
             <label>S.No</label><br />
            
         </div>
           <div class="col-sm-2 col-xs-2">
             <label>Incident Name</label>
             
      </div>
          <div class="col-sm-1 col-xs-1 descriptionof-incident">
             <label>Description of Incident</label>
             
      </div>
      <div class="col-sm-1 col-xs-1">
             <label>Date</label>
             
      </div>
       <div class="col-sm-2 col-xs-2 mmr-actiontaken" >
             <label>Action Taken</label>
            
      </div>
       <div class="col-sm-1 col-xs-1" >
             <label>Status</label>
            
      </div>
        <div class="col-sm-2 col-xs-2" >
             <label>Before work completion</label>
      </div>
      <div class="col-sm-2 col-xs-2" >
             <label>After work completion </label>
      </div>
             
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div>
           
   <div class="">
        <?php $mgp = 0; if(count($pbasys) > 0) {
         $mgp = 0;
    foreach($pbasys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
     <div class="row">
     <div class="col-sm-1 col-xs-1 form-group incident-serialnumber">
        <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
    </div>
         <div class="col-sm-2 col-xs-2 form-group">
          <input type="hidden" name="pbaid[]" value="<?php echo  $dgcon['id']; ?>">
             <input type="text" class="form-control" name="incident_name[]"   value="<?php echo  $dgcon['incident_name']; ?>"/>
      </div>
        <div class="col-sm-1 col-xs-1 form-group descriptionof-incident">
             <input type="text" class="form-control" name="description[]" value="<?php echo  $dgcon['description']; ?>"  />
      </div>
         <div class="col-sm-1 col-xs-1 form-group">
             <input type="text" class="form-control example1" name="report_on[]" value="<?php echo  $dgcon['report_on']; ?>"  />
      </div>
       <div class="col-sm-2 col-xs-2 form-group mmr-actiontaken">
             <input type="text" class="form-control" name="action_taken[]" value="<?php echo  $dgcon['action_taken']; ?>"  />
      </div>
        <div class="col-sm-1 col-xs-1 form-group">
             <input type="text" class="form-control" name="status[]" value="<?php echo  $dgcon['status']; ?>"  />
      </div>
      <div class="col-sm-2 col-xs-2 form-group">
           <input type="file" class="form-control"  name="beforeimage[]" /><?php if(isset($dgcon['beforeimage'])) {  if($dgcon['beforeimage']) {?> <div id="beforeimage_delete_<?php echo  $dgcon['id']; ?>"><a href="<?php  echo url('/')."/hosekpact/tiny_".$dgcon['beforeimage']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'beforeimage','mmrmajorincidents','<?php echo $dgcon['beforeimage']; ?>')">Delete</a></div><?php } }?>
      </div>  
        <div class="col-sm-2 col-xs-2 form-group">
           <input type="file" class="form-control"  name="afterimage[]" /><?php if(isset($dgcon['afterimage'])) {  if($dgcon['afterimage']) {?><div id="afterimage_delete_<?php echo  $dgcon['id']; ?>"><a href="<?php  echo url('/')."/hosekpact/tiny_".$dgcon['afterimage']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'afterimage','mmrmajorincidents','<?php echo $dgcon['afterimage']; ?>')">Delete</a></div><?php } }?>
      </div>  
      
      
      </div>
         <?php } } else { ?>
          <div class="row">
          <div class="col-sm-1 col-xs-1 form-group incident-serialnumber">
            <span>1</span>
        </div>		
         <div class="col-sm-2 col-xs-2 form-group">
         <input type="hidden" name="pbaid[]" value="0">
             <input type="text" class="form-control" name="incident_name[]"/>
      </div>
        <div class="col-sm-1 col-xs-1 form-group descriptionof-incident">
             <input type="text" class="form-control" name="description[]" />
      </div>
         <div class="col-sm-1 col-xs-1 form-group">
             <input type="text" class="form-control" id="report_ondate" name="report_on[]" />
      </div>
       <div class="col-sm-2 col-xs-2 form-group mmr-actiontaken">
             <input type="text" class="form-control" name="action_taken[]" />
      </div>
        <div class="col-sm-1 col-xs-1 form-group">
             <input type="text" class="form-control" name="status[]" />
      </div>
      <div class="col-sm-2 col-xs-2 form-group">
           <input type="file" class="form-control"  name="beforeimage[]" />
      </div>
      <div class="col-sm-2 col-xs-2 form-group">
           <input type="file" class="form-control"  name="afterimage[]" />
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
 </div>    					 
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

function addpubadFormField() {
		var id = document.getElementById("pubadsy").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		  
		$("#divTxtpubadsy").append("<div class='row mmr-housekeeping-adding' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group incident-serialnumber'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='incident_name[]' class='form-control'/><input type='hidden' name='pbaid[]' value='0'></div><div class='col-sm-1 col-xs-1 form-group descriptionof-incident'><input type='text' name='description[]' class='form-control'/></div><div class='col-sm-1 col-xs-1 form-group'><input type='text' name='report_on[]' class='form-control example1'/></div><div class='col-sm-2 col-xs-2 form-group mmr-actiontaken'><input type='text' name='action_taken[]' class='form-control'/></div><div class='col-sm-1 col-xs-1 form-group'><input type='text' name='status[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='file' name='beforeimage[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='file' name='afterimage[]' class='form-control'/></div><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		  
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


  </script>
@include('partials.footer')
@stop 