 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="col-sm-12 mmr-housekeeping-heading">
    <h3 class="page-title"><span class="mmr"> HK Critical Machinery</span>
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
         {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storehkcmmmrmonthly'], 'class' => 'for-labelling']) !!}
            {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
            {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
            {!! Form::hidden('type','hkcm', ['class' => 'larev', 'placeholder' => '']) !!}
           
 <div class="row mmr-housekeeping-editpage">
                 <div class="col-sm-1 col-xs-1">
                     <label>S.No</label>
                 </div>
                 <div class="col-sm-3 col-xs-3">
                     <label>Name of equipment</label>
              	</div>
                <div class="col-sm-1 col-xs-1" >
                         <label>QTY</label>
                </div>
                <div class="col-sm-4 col-xs-4" >
                         <label>Purpose of use</label>
                </div>
                <div class="col-sm-3 col-xs-3" >
                     <label>Availability of equipment</label>
                </div>
            
              
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div>
           
           <div class="">
			    <?php $mgp = 0; if(count($pbasys) > 0) {
				 $mgp = 0;
			foreach($pbasys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>"; exit;?>
             <div class="row">
			 <div class="col-sm-1 col-xs-1 form-group">
                <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
            </div>
            <div class="col-sm-3 col-xs-3 form-group">
                  <input type="hidden" name="pbaid[]" value="<?php echo  $dgcon['id']; ?>">
                 <input type="text" class="form-control" name="eqp_name[]"   value="<?php echo  $dgcon['eqp_name']; ?>"/>
              </div>
			
			   <div class="col-sm-1 col-xs-1 form-group">
                  <input type="text" class="form-control" name="qty[]"   value="<?php echo  $dgcon['qty']; ?>"/>
              </div>
              
              <div class="col-sm-3 col-xs-3 form-group">
                  <input type="text" class="form-control" name="purpose_of_use[]"   value="<?php echo  $dgcon['purpose_of_use']; ?>"/>
              </div>
              
              
              <div class="col-sm-4 col-xs-4 form-group">
                  <input type="text" class="form-control" name="availability[]"   value="<?php echo  $dgcon['availability']; ?>"/>
              </div>
			    
              </div>
			     <?php } } else { ?>
                  <div class="row">
				  <div class="col-sm-1 col-xs-1 form-group">
                	<span>1</span>
                </div>		
				 <div class="col-sm-3 col-xs-3 form-group">
                  <input type="hidden" name="pbaid[]" value="0">
                 <input type="text" class="form-control" name="eqp_name[]"/>
              </div>
			
			    <div class="col-sm-1 col-xs-1 form-group">
                  <input type="text" class="form-control" name="qty[]"/>
              </div>
              
              <div class="col-sm-3 col-xs-3 form-group">
                  <input type="text" class="form-control" name="purpose_of_use[]"/>
              </div>
              
              
              <div class="col-sm-4 col-xs-4 form-group">
                  <input type="text" class="form-control" name="availability[]"/>
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
		  
		$("#divTxtpubadsy").append("<div class='row mmr-housekeeping-adding' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='hidden' name='pbaid[]' value='0'><input type='text' class='form-control' name='eqp_name[]'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' class='form-control' name='qty[]'/></div><div class='col-sm-1 col-xs-1 form-group'><input type='text' class='form-control' name='purpose_of_use[]'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='text' class='form-control' name='availability[]'/></div><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		  
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