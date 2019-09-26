 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="col-sm-12 mmr-housekeeping-heading">
    <h3 class="page-title"><span class="mmr"> Warranty</span>
    </h3>
    <span class="pull-right mmr-back">
        <a href="/mmr/main?y=<?php echo $year; ?>&m=<?php echo $month; ?>&site=<?php echo $site; ?>">Back</a>
    </span>
</div>

<div class="col-sm-12 mmrviolations-editpage">  
   <div class="showing-month-details form-group">
   	  <h3> {{ $sitename }}
      		<span>{{  $monthname }} - {{ $year }} </span>
      </h3>
   </div>
         {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storewarantymmmrmonthly'], 'class' => 'for-labelling']) !!}
            {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
            {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
            {!! Form::hidden('type','hkcm', ['class' => 'larev', 'placeholder' => '']) !!}
              
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
        <div class="warranty-responsive">
           <div class="warranty-amctracker">
 			<div class="row mmr-housekeeping-editpage warranty-edit">
                 <div class="col-sm-1 col-xs-1 sno">
                     <label>S.No</label>
                 </div>
                <div class="col-sm-2 col-xs-2 asset" >
                         <label>Asset Description</label>
                </div>
                <div class="col-sm-2 col-xs-2 asset" >
                         <label>Capacity / Qty</label>
                </div>
                <div class="col-sm-2 col-xs-2 asset" >
                     <label>Location</label>
                </div>
                 <div class="col-sm-2 col-xs-2 asset" >
                         <label>Vendor Name</label>
                </div>
                <div class="col-sm-2 col-xs-2 asset" >
                     <label>PO / WO no. &nbsp; Date</label>
                </div>
                 <div class="col-sm-2 col-xs-2 asset" >
                     <label>Warranty Period From</label>
                </div>
                 <div class="col-sm-2 col-xs-2 asset" >
                     <label>Warranty Period To</label>
                </div>
                
                 <div class="col-sm-2 col-xs-2 asset" >
                     <label>AMC Period From</label>
                </div>
                 <div class="col-sm-2 col-xs-2 asset" >
                     <label>AMC Period To</label>
                </div>
                <div class="col-sm-2 col-xs-2 asset" >
                     <label>AMC</label>
                </div>
                 <div class="col-sm-2 col-xs-2 asset" >
                     <label>Remarks</label>
                </div>
           </div>
           
           <div class="">
			    <?php $mgp = 0; if(count($pbasys) > 0) {
				 $mgp = 0;
			foreach($pbasys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>"; exit;?>
             <div class="row">
			 <div class="col-sm-1 col-xs-1 form-group sno">
                <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
            </div>
			
			   <div class="col-sm-2 col-xs-2 form-group asset">
			   	 <input type="hidden" name="pbaid[]" value="<?php echo  $dgcon['id']; ?>">
                  <input type="text" class="form-control" name="asset_description[]" required value="<?php echo  $dgcon['asset_description']; ?>"/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="capacity_qty[]"   value="<?php echo  $dgcon['capacity_qty']; ?>"/>
              </div>
              
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="location[]"    value="<?php echo  $dgcon['location']; ?>"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="vendor_name[]"    value="<?php echo  $dgcon['vendor_name']; ?>"/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="PO/WO[]"    value="<?php echo  $dgcon['PO/WO']; ?>"/>
              </div>
              
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="warranty_from[]"    value="<?php echo  $dgcon['warranty_from']; ?>"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="warranty_to[]"    value="<?php echo  $dgcon['warranty_to']; ?>"/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="amc_from[]"    value="<?php echo  $dgcon['amc_from']; ?>"/>
              </div>
              
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="amc_to[]"    value="<?php echo  $dgcon['amc_to']; ?>"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="amc_status[]"   value="<?php echo  $dgcon['amc_status']; ?>"/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="remarks[]"    value="<?php echo  $dgcon['remarks']; ?>"/>
              </div>
              
              
             
			    
              </div>
			     <?php } } else { ?>
                  <div class="row">
				  <div class="col-sm-1 col-xs-1 form-group sno">
                	<span>1</span>
                </div>	
			   <div class="col-sm-2 col-xs-2 form-group asset">
			   	  <input type="hidden" name="pbaid[]" value="">
                  <input type="text" class="form-control" name="asset_description[]"   value=""/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="capacity_qty[]"   value=""/>
              </div>
              
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="location[]"   value=""/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="vendor_name[]"   value=""/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="PO/WO[]"   value=""/>
              </div>
              
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="warranty_from[]"   value="" id="warranty_from"/>
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="warranty_to[]"   value="" id="warranty_to"/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="amc_from[]"   value="" id="amc_from"/>
              </div>
              
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="amc_to[]"   value="" id="amc_to" />
              </div>
              
               <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="amc_status[]"   value=""/>
              </div>
              
              <div class="col-sm-2 col-xs-2 form-group asset">
                  <input type="text" class="form-control" name="remarks[]"   value=""/>
              </div>
              
                  </div>   
                
                <?php } ?> 
				  <?php if($mgp > 0){  $pubadsy=$mgp - 1; } else {$pubadsy = 0;} ?>
                      <input type="hidden" id="pubadsy" value="<?php echo ++$pubadsy; ?>">
		  
          
           </div> 
          
		   
		    <div id="divTxtpubadsy"> 

                       	</div>    
           </div>

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
		  
		$("#divTxtpubadsy").append("<div class='row' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group sno'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='hidden' name='pbaid[]' value=''><input type='text' class='form-control' name='asset_description[]'   value=''/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='capacity_qty[]'   value=''/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='location[]'   value=''/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='vendor_name[]'   value=''/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='PO/WO[]'   value=''/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='warranty_from[]'   value='' id='warranty_from'/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='warranty_to[]'   value='' id='warranty_to'/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='amc_from[]'   value='' id='amc_from'/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='amc_to[]'   value='' id='amc_to' /></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='amc_status[]'   value=''/></div><div class='col-sm-2 col-xs-2 form-group asset'><input type='text' class='form-control' name='remarks[]'   value=''/></div><a href='#' onClick='removepublicaddFormField(\'#row' + id + '\'); return false;' class='remove removerla'>X</a></div>");
		  
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
			$('#amc_from').datepicker({ dateFormat: "dd-mm-yy" });
			$('#amc_from').datepicker({ dateFormat: "dd-mm-yy" });
			$('#warranty_to').datepicker({ dateFormat: "dd-mm-yy" });
			$('#warranty_from').datepicker({ dateFormat: "dd-mm-yy" });
        });
    </script>
@include('partials.footer')
@stop 