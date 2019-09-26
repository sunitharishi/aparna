 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="col-sm-12 mmr-housekeeping-heading">
    <h3 class="page-title"><span class="mmr"> Pest Control </span>
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
         {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storemmrpetmonthly'], 'class' => 'for-labelling']) !!}
            {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
            {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
           
 <div class="row mmr-housekeeping-editpage">
                 <div class="col-sm-1 col-xs-1">
                     <label>S.No</label><br />
                    
                 </div>
				   <div class="col-sm-2 col-xs-2">
                     <label>Type</label>
                     
              </div>
              <div class="col-sm-2 col-xs-2">
                     <label>Location</label>
                     
              </div>
              <div class="col-sm-2 col-xs-2">
                     <label>Date</label>
                     
              </div>
              <div class="col-sm-3 col-xs-3">
                     <label>Description</label>
                     
              </div>
			  <div class="col-sm-2 col-xs-2" >
                     <label>Image</label>
              </div>
              
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div>
           
           <div class="">
			    <?php $mgp = 0; if(count($pbasys) > 0) {
				 $mgp = 0;
				 
			foreach($pbasys as $dgcon) { ?>
             <div class="row">
			 <div class="col-sm-1 col-xs-1 form-group">
                <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
            </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                  <input type="hidden" name="pbaid[]" value="<?php echo  $dgcon['id']; ?>">
                   <select class="form-control" name="type[]">
                    <option value="">Select Type</option>
                    <option value="Fogging" <?php if($dgcon['type']=='Fogging') echo "selected='selected'"; ?>>Fogging</option>
                    <option value="Spraying" <?php if($dgcon['type']=='Spraying') echo "selected='selected'"; ?>>Spraying</option>
                    <option value="Rodent" <?php if($dgcon['type']=='Rodent') echo "selected='selected'"; ?>>Rodent</option>
                    <option value="Honeybee" <?php if($dgcon['type']=='Honeybee') echo "selected='selected'"; ?>>Honeybee</option>
                </select>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" name="location[]"   value="<?php echo  $dgcon['location']; ?>"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" name="report_date[]"   value="<?php echo  $dgcon['report_date']; ?>"/>
              </div>
              
               <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="description[]"   value="<?php echo  $dgcon['description']; ?>"/>
              </div>			  
			  <div class="col-sm-2 col-xs-2 form-group">
				   <input type="file" class="form-control"  name="before_image[]" /><?php if(isset($dgcon['before_image'])) {  if($dgcon['before_image']) {?> <div id="beforeimage_delete_<?php echo  $dgcon['id']; ?>"><a href="<?php  echo url('/')."/hosekpact/tiny_".$dgcon['before_image']; ?>" target="_blank">View</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $dgcon['id']; ?>,'','pets','<?php echo $dgcon['before_image']; ?>')">Delete</a></div><?php } }?>
			  </div>
			  
              </div>
			     <?php } } else { ?>
                  <div class="row">
				  <div class="col-sm-1 col-xs-1 form-group">
                	<span>1</span>
                </div>	
               <div class="col-sm-2 col-xs-2 form-group">
				 <input type="hidden" name="pbaid[]" value="0">
                 <select class="form-control" name="type[]">
                    <option value="">Select Type</option>
                    <option value="Fogging">Fogging</option>
                    <option value="Spraying">Spraying</option>
                    <option value="Rodent">Rodent</option>
                    <option value="Honeybee">Honeybee</option>
                </select>
              </div>	
				 <div class="col-sm-2 col-xs-2 form-group">
                 <input type="text" class="form-control" name="location[]"/>
              </div>
               <div class="col-sm-2 col-xs-2 form-group">
                 <input type="text" class="form-control" name="report_date[]"/>
              </div>
               <div class="col-sm-3 col-xs-3 form-group">
                 <input type="text" class="form-control" name="description[]"/>
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                   <input type="file" class="form-control"  name="before_image[]" />
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
		  
		$("#divTxtpubadsy").append("<div class='row mmr-housekeeping-adding' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='hidden' name='pbaid[]' value='0'><select class='form-control' name='type[]'><option value=''>Select Type</option><option value='Fogging'>Fogging</option><option value='Spraying'>Spraying</option><option value='Rodent'>Rodent</option><option value='Honeybee'>Honeybee</option></select></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='location[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='report_date[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='description[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='file' name='before_image[]' class='form-control'/></div><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		  
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