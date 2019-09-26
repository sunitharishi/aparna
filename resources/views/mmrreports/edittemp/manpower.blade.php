 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">

<style type="text/css">

	.mpdays
	{
		border:1px solid #666 !important;
	}

</style>

 



@extends('layouts.app')



@section('content')

<div class="col-sm-12 mmr-housekeeping-heading">

    <h3 class="page-title"><span class="mmr"> MAN POWER</span>

    </h3>

    <span class="pull-right mmr-back">

        <a href="/mmr/main?y=<?php echo $year; ?>&m=<?php echo $month; ?>&site=<?php echo $site; ?>">Back</a>

    </span>

</div>



<div class="col-sm-12">  
     <div class="showing-month-details form-group mmr-manpower-heading">
          <h3>{{ $sitename }}<span>{{  $monthname }} - {{ $year }} </span></h3>
     </div>
      <div class="manpower-form">
           <div class="manpower-inner">  
                {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storemanpower'], 'class' => 'for-labelling']) !!}
                {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}                
                {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}                
                {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}  
				<div class="row mmr-incident-editpage">
                     <div class="mmr-manpower-table">
                            <div class="col-sm-12">   
								@if(isset($manpowers) && count($manpowers) > 0)
                                  <table width="100%" border="1">
                                    <thead> 
                                        <tr>
                                            <th rowspan="2">S.no</th>
                                            <th rowspan="2">Particulars</th>
                                            <th colspan="4" style="text-align:center;">Shift</th>
                                            <th rowspan="2" style="text-align:center;">Manpower (Nos.)</th>
                                            <th rowspan="2">Man power Present days</th>
                                            <th rowspan="2">Man power%</th>
                                        </tr>
                                        <tr>
                                            <th width="50px">General</th>
                                            <th width="50px">A</th>
                                            <th width="50px">B</th>
                                            <th width="50px">C</th>
                                        </tr>
                                    </thead>
									<tbody>
											<?php 
												$i=0;
												$s = 0;
												$f = 0;
												$c = 0;
												$e = 0;
											?>
											@foreach($manpowers as $mkey => $mrs)
											<?php  
												if($mrs['mpdays']>0)
												{
													$manpowerpercentage3 = ($mrs['mpdays']/($mrs['mnos']*$ndays))*100;
													$manpowerpercentage3 = round($manpowerpercentage3);
												}
												else
												{
													$manpowerpercentage3 = "";
												}
												$i = $i+1;
											?>
											<?php 
												if($mrs['type']=='Full Time') { 
												if($f==0){
											?>
											<tr>
												<td colspan="9">
													<b>Full Time:</b>
												</td>
											</tr>
											<?php } ?>
											<?php if($mrs['general']!="" || $mrs['a']!="" || $mrs['b']!="" ||  $mrs['c']!="") { ?>
											<tr>
												<td>
													<?php echo $f+1; ?>
													<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
												</td>
												<td>
													<?php echo $mrs['title']; ?>
												</td>
												<td>
													<?php echo $mrs['general']; ?>
												</td>
												<td>
													<?php echo $mrs['a']; ?>
												</td>
												<td>
													<?php echo $mrs['b']; ?>
												</td>
												<td>
													<?php echo $mrs['c']; ?>
												</td>
												<td>
													<?php echo $mrs['mnos']; ?>
												</td>
												<td>
												 <input required value="<?php echo $mrs['mpdays']; ?>"  type="number" 
												 onchange="manpowerCalculate(this, <?php echo $mrs['mnos']; ?>,<?php echo $ndays; ?>,'<?php echo $i; ?>')" 
												 name="mpdays[]" class="form-control mpdays"/>
												</td>
												<td class="per_<?php echo $i; ?>">
													<?php if($manpowerpercentage3!="") {  ?><?php echo $manpowerpercentage3; ?>%<?php } ?>
												</td>
											</tr>
											<?php $f = $f+1; }}  ?>
											<?php 
												if($mrs['type']=='Club House') { 
												if($c==0){
											?>
											<tr>
												<td colspan="9">
													<b>Club House:</b>
												</td>
											</tr>
											<?php } ?>
											<?php if($mrs['general']!="" || $mrs['a']!="" || $mrs['b']!="" ||  $mrs['c']!="") { ?>
											<tr>
												<td>
													<?php echo $c+1; ?>
													<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
												</td>
												<td>
													<?php echo $mrs['title']; ?>
												</td>
												<td>
													<?php echo $mrs['general']; ?>
												</td>
												<td>
													<?php echo $mrs['a']; ?>
												</td>
												<td>
													<?php echo $mrs['b']; ?>
												</td>
												<td>
													<?php echo $mrs['c']; ?>
												</td>
												<td>
													<?php echo $mrs['mnos']; ?>
												</td>
												<td>
												 <input required value="<?php echo $mrs['mpdays']; ?>" type="number"
												 onchange="manpowerCalculate(this, <?php echo $mrs['mnos']; ?>,<?php echo $ndays; ?>,'<?php echo $i; ?>')" 
												 name="mpdays[]"class="form-control mpdays"/>
												</td>
												<td class="per_<?php echo $i; ?>">
													<?php if($manpowerpercentage3!="") {  ?><?php echo $manpowerpercentage3; ?>%<?php } ?>
												</td>
											</tr>
											<?php } ?>
											<?php $c = $c+1; }  ?>
											
											<?php 
												if($mrs['type']=='Excess') { 
												if($e==0){
											?>
											<tr>
												<td colspan="9">
													<b>Excess Manpower:</b>
												</td>
											</tr>
											<?php } ?>
											<?php if($mrs['general']!="" || $mrs['a']!="" || $mrs['b']!="" ||  $mrs['c']!="") { ?>
											<tr>
												<td>
													<?php echo $e+1; ?>
													<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
												</td>
												<td>
													<?php echo $mrs['title']; ?>
												</td>
												<td>
													<?php echo $mrs['general']; ?>
												</td>
												<td>
													<?php echo $mrs['a']; ?>
												</td>
												<td>
													<?php echo $mrs['b']; ?>
												</td>
												<td>
													<?php echo $mrs['c']; ?>
												</td>
												<td>
													<?php echo $mrs['mnos']; ?>
												</td>
												<td>
												 <input required value="<?php echo $mrs['mpdays']; ?>" type="number"
												 onchange="manpowerCalculate(this, <?php echo $mrs['mnos']; ?>,<?php echo $ndays; ?>,'<?php echo $i; ?>')" 
												 name="mpdays[]"class="form-control mpdays"/>
												</td>
												<td class="per_<?php echo $i; ?>">
													<?php if($manpowerpercentage3!="") {  ?><?php echo $manpowerpercentage3; ?>%<?php } ?>
												</td>
											</tr>
											<?php } ?>
											<?php $e = $e+1; }  ?>
											@endforeach
									</tbody>         
                                </table>
								@else
								<div style="text-align:center;"><b>Please set manpower in reportvalidation</b></div>
								@endif
                              </div>
                         </div>
                 </div>
				@if(isset($manpowers) && count($manpowers) > 0)
					<div class="col-sm-12 mmr-housekeeping-submission" style="text-align:center; margin:20px 0px;">
						{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
					</div>   
				@endif
			    {!! Form::close() !!}   
            </div>
      </div> 
</div> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
function manpowerCalculate(dis,mpower,ndays,key)
{
	var wdays = dis.value;
	var manpowerpercentage = "";
	manpowerpercentage = (wdays/(mpower*ndays))*100;
	manpowerpercentage = Math.round(manpowerpercentage);
	if(manpowerpercentage>100)
	{ 
		alert("Percentage reached more than 100");
		$(dis).val("");
		$(".per_"+key).html("");
	}
	else
	{
		$(".per_"+key).html(manpowerpercentage+"%");
	}
}
$( document ).ready(function() {

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

		  

		$("#divTxtpubadsy").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='category[]' class='form-control'/><input type='hidden' name='pbaid[]' value='0'></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='location[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='description[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='report_on[]' class='form-control example1'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='remarks[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='beforeimage[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='afterimage[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");

		  

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