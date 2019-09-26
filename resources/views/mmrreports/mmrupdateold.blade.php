 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="mmrreportupdate-heading">
    <h3 class="page-title"><span class="mmr"> MMR</span>
    </h3>
    <span class="pull-right mmr-back">
        <a href="/mmr/main">Back</a>
    </span>
</div>

<div class="row mmr-dropdown">  
    <div class="row form-group"> 
        <div class="mmrupdate-page">
            {!! Form::open(['method' => 'POST', 'route' => ['mmr.storeeditform'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
            {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
            {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
                <div class="col-sm-3 form-group">
                    <select name="mmr_type" id="mmr_type" onchange="getmmreditform(this.value)" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1">EB Power</option>
                        <option value="2">Water Consumption</option>
                    </select>
                 </div>
            <div id="validresponse">
            </div>
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

$('#example1').datepicker({ dateFormat: "dd-mm-yy" });

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


  </script>
@include('partials.footer')
@stop 