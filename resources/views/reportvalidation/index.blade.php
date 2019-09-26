@extends('layouts.app')

@section('content')
    <h3 class="page-title vlaislsek">Report Validation</h3>

      {!! Form::open(['method' => 'POST', 'route' => ['reportvalidation.store'], 'id' => 'validform', 'onsubmit' =>"return fmsvalidation()"]) !!}
    <div class="panel panel-default settingsites">
       

        <div class="panel-body reportindes">
         
          <?php // echo "<pre>"; print_r($formfields);"</pre>";
		  
		//  echo $url."RRRRRRRRRR"; ?>
          
                   <div class="dlyrep-select reporttype">
					{!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('site', $sites_names, $siteselected, ['class' => 'form-control', 'id' => 'site_id']) !!}				
					</div>
                     
                    <div class="dlyrep-select reporttypelabel">
					{!! Form::label('dailycat1', 'Type:', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $client_statuses, $typeselected, ['class' => 'form-control', 'id' => 'rptype']) !!}				
					</div>
					
					<?php $year1 = Request::segment(4); 
						  if($year1) $year1 = $year1;
						  else $year1 = date('Y');
						  $month1 = Request::segment(5);
						  if($month1) $month1 = $month1;
						  else $month1 = date('m');
						  
						  $year = date('Y');						  
						  $month = date('m');
						  $dayval = date('d');
					?>
                    
                   <div class="reportvalidation-year-selection" style="display:<?php if(Request::segment(3)=='5') echo 'block'; else echo 'none';  ?>">
					<div class="yearlabel">Year:</div>
                    <div class="sleectvalisyear"><select name='valid_year' id="valid_year" class="form-control"> 
                         <option value="">Select Year</option>
						 <?php for($i=2018;$i<=2030;$i++){ ?>
						 <option value="<?php echo $i; ?>" <?php if($year1 == $i) echo 'Selected';?>><?php echo $i; ?></option>
						 <?php } ?>
					</select> </div>
                    </div>
					
					
                    <div class="reportvalidation-month-selection"  
					style="display:<?php if(Request::segment(3)=='5') echo 'block'; else echo 'none';  ?>">
						<div class="monthlabel">Month:</div> 
                      <div class="tantodec">
                       <select name='valid_month' id="valid_month" class="form-control">  
                         <option value="">Select Month</option>
						 <option value="1" <?php if($month1 == "1") echo 'Selected';?>>Jan</option>
						 <option value="2" <?php if($month1 == "2") echo 'Selected';?>>Feb</option>
						 <option value="3" <?php if($month1 == "3") echo 'Selected';?>>Mar</option>
						 <option value="4" <?php if($month1 == "4") echo 'Selected';?>>April</option>
						 <option value="5" <?php if($month1 == "5") echo 'Selected';?>>May</option>
						 <option value="6" <?php if($month1 == "6") echo 'Selected';?>>June</option>
						 <option value="7" <?php if($month1 == "7") echo 'Selected';?>>July</option>
						 <option value="8" <?php if($month1 == "8") echo 'Selected';?>>Aug</option>
						 <option value="9" <?php if($month1 == "9") echo 'Selected';?>>Sept</option>
						 <option value="10" <?php if($month1 == "10") echo 'Selected';?>>Oct</option>
						 <option value="11" <?php if($month1 == "11") echo 'Selected';?>>Nov</option>
						 <option value="12" <?php if($month1 == "12") echo 'Selected';?>>Dec</option>
					</select> 
					</div>
				 </div>
                    
                     @if($typecat == '1')
                     	@include('validationtemplates.firesaftytemplate')
                     @elseif($typecat == '2')
                     	@include('validationtemplates.fpmtemplate')
                     @elseif($typecat == '3')
                     	@include('validationtemplates.pmstemplate')
                     @elseif($typecat == '4')
                     	@include('validationtemplates.securirytemplate')
                      @elseif($typecat == '5')
                     	@include('reportvalidation.summary')
                        
                        @elseif($typecat == '6')
                     	@include('validationtemplates.hortitemplate')
                     @endif	
        
           
          
        </div>
    </div>
	{!! Form::close() !!}                    
@if($typecat == '5')
<style type="text/css">
		.modal-body table td
		{
			padding:5px;
		}
</style>
<div class="modal fade snag-modal" id="summary" role="dialog">
    <div class="modal-dialog" style="width:800px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Excess Manpower</h4>
        </div>
        <div class="modal-body" style="text-align: center; display:inline-block;">	
			 {!! Form::open(['method' => 'POST', 'route' => ['reportvalidation.excessmanpower'], 'class' => 'for-labelling']) !!}
			 <table width="100%" border="1" cellpadding="5px" cellspacing="5px">
					<input type="hidden" id="pubadsy" value="<?php if(isset($manpowers) && count($manpowers) > 0) echo count($manpowers); else echo "1"; ?>" />
					<input type="hidden" name="type" value="5"/>
					<input type="hidden" name="site" id="site" value="<?php echo $site; ?>"/>
					<input type="hidden" name="year" id="year" value="<?php echo Request::segment(4);; ?>"/>
					<input type="hidden" name="month" id="month" value="<?php echo Request::segment(5); ?>"/>
			 	 <thead> 
					<tr height="25px">
						<th>&nbsp;
							
						</th>
						<th>
							Particulars
						</th>
						<th>
							General
						</th>
						<th>
							A
						</th>
						<th>
							B
						</th>
						<th>
							C
						</th>
						<th>
							Manpower(Nos)
						</th>
						<th>
							<a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none;display:inline-block;width:auto; color:#003300;">+</a>
						</th>
					</tr>
                </thead>
                <tbody> 
					@if(isset($manpowers) && count($manpowers) > 0)
					@foreach($manpowers as $mkey => $mrs)
					<?php if($mrs['type']=='Excess') {  ?>
					<tr id="row_<?php echo $mrs['ids']; ?>">						
						<td>
							<?php if($updated=='Yes'){ ?>
							<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
							<?php } else { ?>
							<input type="hidden" name="ids[]" value="" />
							<?php } ?>
							<input type="hidden" name="types[]" value="Excess" />
							<input type="hidden" name="sorder[]" value="<?php echo $mrs['sorder']; ?>" />
						</td>
						<td>
							<input type="text" value="<?php echo $mrs['title']; ?>" name="title[]" />
						</td>
						<td>
							<input type="number"  style="width:90px;" value="<?php echo $mrs['general']; ?>" name="general[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="<?php echo $mrs['a']; ?>" name="a[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="<?php echo $mrs['b']; ?>" name="b[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="<?php echo $mrs['c']; ?>" name="c[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="<?php echo $mrs['mnos']; ?>" name="mnos[]" />
						</td>
						<td style="color:#FF0000;">
							<a href="javascript:void(0);" onclick="deleteExcess(<?php echo $mrs['ids']; ?>)">X</a>
						</td>
					</tr>
					<?php } ?>
					@endforeach
					@else
					<tr>
						<td>
							<input type="hidden" name="types[]" value="Excess" />
							<input type="hidden" name="sorder[]" value="<?php echo count($manpowers); ?>" />
						</td>
						<td>
							<input type="text" value="" name="title[]" />
						</td>
						<td>
							<input type="number"  style="width:90px;" value="" name="general[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="" name="a[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="" name="b[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="" name="c[]" />
						</td>
						<td>
							<input type="number" style="width:90px;" value="" name="mnos[]" />
						</td>
						<td style="color:#FF0000;">
							X
						</td>
					</tr>
					@endif 
                </tbody>
            </table>
			 <div class="updatebtn" style="text-align:center; margin-top:20px; float:none;">
                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!} 
           </div> 
		   {!! Form::close() !!}       
        </div>
      </div>
    </div>
  </div>
  @endif	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
function addpubadFormField() {
			var id = document.getElementById("pubadsy").value;
			$(".modal-body table").append("<tr id='row"+id+"'><td><input type='hidden' name='types[]' value='Excess' /><input type='hidden' name='sorder[]' value='"+id+"' /></td><td><input type='text' value='' name='title[]' /></td><td><input type='number'  style='width:90px;' value='' name='general[]' /></td><td><input type='number' style='width:90px;' value='' name='a[]' /></td><td><input type='number' style='width:90px;' value='' name='b[]' /></td><td><input type='number' style='width:90px;' value='' name='c[]' /></td><td><input type='number' style='width:90px;' value='' name='mnos[]' /></td><td><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></td></tr>");
			id = parseInt(id) + 1;
	
			console.log('id: ', id);
	
			document.getElementById("pubadsy").value = id;	
			$('.example1').datepicker({ dateFormat: "dd-mm-yy" });

	} 
	
	function deleteExcess(id)
	{
		var site = $("#site").val();
		var month = $("#month").val();
		var year = $("#year").val();
		var r = confirm("Are you sure you want to delete this record?");	
		if (r == true) {
			$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('mmr.deleteexcess') }}',
			data: { excessId: id, site: site, month: month, year: year},
			success: function( response ) 
			{
				$("#row_"+id).remove();
			}  
		 });
		 
		} else {
		  return false;
		}
	}
	
	function removepublicaddFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("pubadsy").value;

		id = (id - 1);

		document.getElementById("pubadsy").value = id;

	}
function fmsvalidation()
{
	var flag = 0;
	$("input.ereq,select.ereq").each(function(){
		var s = $(this).attr('name');
		if (($(this).val())== ""){
			console.log("One"+s);
			$(this).addClass("error");
			flag = flag+1;
		}
		else
		{
			$(this).removeClass("error");
		}  
	});
	if(flag>0) { 
		alert("All Fields Required");
		$("html, body").animate({ scrollTop: 0 }, "slow");
 		return false;
	}
	else {
		alert("Success");
		return true;
	}
}
$( document ).ready(function() {
  $( "#rptype" ).change(function() 
  {
 
   var val = $(this).val();
   if(val==5)
   {
   		$(".reportvalidation-year-selection").show();
		$(".reportvalidation-month-selection").show();
   }
   else
   {
   		$(".reportvalidation-year-selection").hide();
		$(".reportvalidation-month-selection").hide();
   }
  
   //var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
  // window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/"+val;
  // window.location.replace('getdailyreport/'+val);
	//alert("test");
	var site = "";
	var  rtype = "";
	site =   $("#site_id").val();
	rtype =   $("#rptype").val();
	var mon =   $("#valid_month").val();
	var yea =   $("#valid_year").val();
	//alert(site);
	if(site == ""){
	  alert("Please select Site");
	} else if(site != "" && rtype != ""){
	  var href = window.location.href;
	  window.location.href = "/reportdetailfrom/"+site+"/"+rtype+"/"+yea+"/"+mon; 
	}
	
	

  });
  
  $( "#site_id" ).change(function() 
  {
	var site = "";
	var  rtype = "";
	site =   $("#site_id").val();
	rtype =   $("#rptype").val();
    var mon =   $("#valid_month").val();
	var yea =   $("#valid_year").val();
	//alert(site);
	if(site == ""){
	  alert("Please select Site");
	}
	else if(rtype == ""){
	  alert("Please select Type");
	}
	 else if(site != "" && rtype != ""){
	  var href = window.location.href;
     // window.location.href = "/reportdetailfrom/"+site+"/"+rtype;  
	   window.location.href = "/reportdetailfrom/"+site+"/"+rtype+"/"+yea+"/"+mon;  
	  //alert("http://aparna.greaterkakinada.com/reportdetailfrom"+site+"/"+rtype);
	}
  });
  
  $("#valid_year").change(function() 
  {
	var site = "";
	var  rtype = "";
	site =   $("#site_id").val();
	rtype =   $("#rptype").val();
    var mon =   $("#valid_month").val();
	var yea =   $("#valid_year").val();
	//alert(site);
	if(site == ""){
	  //alert("Please select Site");
	} else if(site != "" && rtype != ""){
	  var href = window.location.href;
     // window.location.href = "/reportdetailfrom/"+site+"/"+rtype;  
	   window.location.href = "/reportdetailfrom/"+site+"/"+rtype+"/"+yea+"/"+mon;  
	  //alert("http://aparna.greaterkakinada.com/reportdetailfrom"+site+"/"+rtype);
	}
  });
  
  $( "#valid_month" ).change(function() 
  {
	var site = "";
	var  rtype = "";
	site =   $("#site_id").val();
	rtype =   $("#rptype").val();
    var mon =   $("#valid_month").val();
	var yea =   $("#valid_year").val();
	//alert(site);
	if(site == ""){
	  //alert("Please select Site");
	} else if(site != "" && rtype != ""){
	  var href = window.location.href;
     // window.location.href = "/reportdetailfrom/"+site+"/"+rtype;  
	   window.location.href = "/reportdetailfrom/"+site+"/"+rtype+"/"+yea+"/"+mon;  
	  //alert("http://aparna.greaterkakinada.com/reportdetailfrom"+site+"/"+rtype);
	}
  });
  
  /*$('select[name="sites"]').on('change', function(){    
    //alert($(this).val());   
	
	 var val = $(this).val();
	 
	  if(val == "") {
	  var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  
	   
	 } else {
 //  alert(val);
   var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://report.local/getdailyreportdetail";
      window.location.href = "http://aparna.greaterkakinada.com/getdailyreportdetail/"+val; 
	  }
  // window.location.replace('getdailyreport/'+val);
	//alert(id); 
});*/

    $("#resetall").click(function(){  
		//$('#validform').reset();
		//alert("clickedreset");
		//document.getElementById("validform").reset();
		$(".resetval").val("");
    }); 


}); 
  
  </script>
  
  @include('partials.footer')
  
  @stop



