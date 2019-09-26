
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	
	.numerror
   {
	border-color: red !important;
	border-width: 1.5px !important;
   } 
	.errval
   {
	border-color: red !important;
	border-width: 1.5px !important;
   } 
	.manjeera table tr th 
	{
	padding:5px;
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	}   
 	.manjeera
	{
	font-size:12px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
    margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:12px;
 	}
	.docs-main h3
	{
	text-align:left;
	margin-top:0px;
	margin-bottom:10px;
	color:#023F78;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.form-group.padin
	{
	padding-left:0px;
	}
	.tablesaw.borewell-edittable
	{
	width:50%;
	margin-bottom:10px;
	clear:both;
	margin:0 auto;
	}
	.mische
	{
	 width:50%;
	 margin:0 auto;
	 padding-top:6px;
	}
	.mische2
	{
	width:50%;
	margin:0 auto;
	}
	.x_panel
	{
	border:0px solid white;
	}
	.submit-button input[type="submit"]:hover
	{
	 background-color:#003087;
	}
	.mische input[type="checkbox"]
	{
	 margin-right:4px;
	}
	.mische2 input[type="checkbox"]
	{
	 margin-right:4px !important;
	 
	}
	.save-button input[type="submit"]
	{
	 text-shadow: 0px -1px 0px rgba(0,0,0,.5);
    color: #ffffff;
    padding: 7px 30px;
    background-color: #B22E2E;
    background-image: -moz-linear-gradient(top, #E95D5D, #E40304);
    background-image: -ms-linear-gradient(top, #E95D5D, #E40304);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#E95D5D), to(#E40304));
    background-image: -webkit-linear-gradient(top, #E95D5D, #E40304);
    background-image: -o-linear-gradient(top, #E95D5D, #E40304);
    background-image: linear-gradient(top, #E95D5D, #E40304);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#E95D5D', endColorstr='#E40304', GradientType=0);
    border-color: #C00;
    border-color: rgba(0, 0, 0, 0.15);
	width:100px;
	}
	.x_content.housesco2.housellly
	{
	 margin-top:0px;
	 padding-left:0px;
	}
	</style>
    <title>Borewell</title>
@extends('layouts.app')


@section('content')

  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400" style="padding-top:0px;padding-left:0px;padding-right:0px;">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housellly borewellnot-editpage">
    
<div class="docs-main ">
	   
        <h3><b>Borewells not working status as on <span style="color:#ff2518;"><?php echo $report_on; ?></b></h3></span>
        <div class="col-xs-4 form-group padin">
				
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					{!! Form::open(['method' => 'POST', 'route' => ['misreports.storeborewellnw'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
					<div class="dlyrep-select report-bore">
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label main-select']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>
					
                </div>
                  <div id="reportblock" style="display:none"> 
      <div class="borewell-notworking">
		<table class="tablesaw tablesaw-swipe borewell-edittable" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
			<thead class="tablcomu head-color">
            
              
				<tr>
                
					<!--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">S.No</th>
                     <th>1</th>-->
                      <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Community</th>
                     <td class="communityname"><?php  // echo $site;   ?></td>
                 </tr>
                
					
			
                 
                
			</thead>
			<tbody class="communityinpu">
            
 		    {!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
			{!! Form::hidden('record_id','', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
              {{ Form::hidden('site', '',['id' => 'siteid', 'placeholder' => '']) }}
			{!! Form::hidden('flats','', ['class' => '', 'placeholder' => '', 'id' => 'flats_id']) !!}
                  
                   <tr>
                       
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"  colspan="2">Total</th>
                        <td class="borewellnum"> <?php   //echo  $flats[$key]; ?></td> 
                    </tr>
                    
                    
                    <tr>   
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3" colspan="2">NW</th>
                        <td>{!! Form::text('nw_bores_num','', ['class' => 'required', 'placeholder' => '', 'id' => 'nw_bores_num','onchange' => 'getvalidSum(this.value)','readonly']) !!} </td>
                    </tr>
                    
                    <tr>
                       	<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="9">Reasons for Failure</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">No Ground Water</th>
                        <td>{!! Form::text('no_ground_water','', ['class' => 'required', 'placeholder' => '', 'id' => 'no_ground_water']) !!} </td>
                     </tr>
                     
                     <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4"  >Over Load</th>
                        <td>{!! Form::text('over_load','', ['class' => 'required', 'placeholder' => '', 'id' => 'over_load','onchange' => 'getvalidSum(this.value)']) !!} </td>
                     </tr>
                     
                     <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4"  >	Motor burnt</th>
                        <td>{!! Form::text('motor_brunt','', ['class' => 'required', 'placeholder' => '', 'id' => 'motor_brunt','onchange' => 'getvalidSum(this.value)']) !!} </td>
                    </tr>
                    
                    <tr>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Cable Problem</th>
                        <td>{!! Form::text('cable_prblm','', ['class' => 'required', 'placeholder' => '', 'id' => 'cable_prblm']) !!} </td>
                    </tr>
                    
                    <tr>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" style="padding-right:0px;">Pump / Motor wear & tear</th>
                        <td>{!! Form::text('pumpormotorwear','', ['class' => 'required', 'placeholder' => '', 'id' => 'pumpormotorwear']) !!} </td>
                     </tr>
                     
                     <tr>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Others</th>  
                        <td>{!! Form::text('others','', ['class' => 'required', 'placeholder' => '', 'id' => 'others']) !!} </td>
                         
                      </tr>
                      
                      <tr>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Dry Run Protection</th>
                        <td>
                        <select name="dry_run_protectn" id="dry_run_protectn" class=""> 
                           <option value="Available">Available</option>
                           <option value="In Progress">In Progress</option>
                           <option value="NA">NA</option>
                        </select>
                        </td>
                     </tr>
                     
                     <tr> 
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Flow Meter</th>  
                        <td>
                         <select name="flow_meter" id="flow_meter" class="">
                           <option value="Available">Available</option>
                           <option value="NA">NA</option>
                        </select>
                        </td>
                      </tr>
                      
                      <tr>
                          <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" style="width:318px;">Remarks</th>
                         <td style="width:209px;">{!! Form::text('remarks','', ['class' => 'required', 'placeholder' => '', 'id' => 'remarks']) !!} </td>
                      </tr>
                          
                          
                          
			</tbody>
		</table>
          </div>
                
                
       <div class="mische"> <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="color:#1a816f;font-weight:bold;">Save as</span><span style="color:#c22804;font-weight:bold;"> Draft</span></div>
        <div class="mische2"><input type="checkbox" value="1" class=""  name="report_status" id="report_status" style="margin-right:7px;"><span style="color:#520990;font-weight:bold;">I accept given data period of overall month</span></div>
        <div class="col-sm-12 col-xs-12 submit-button save-button">
            
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
            
            {!! Form::close() !!}
            
        </div>
		</div>

	
	</div>
    
                        
                </div>
              </div>
            </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>		
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>	
 $( document ).ready(function() {
 
	$("#report_status").change(function() {
	 if(this.checked) {
	  //  alert("checked");
	 }
	 else{
	  // alert("notchecked");
	 }
	});
  
	$('select[name="sites"]').on('change', function(){    
	var val = $(this).val();
	var year = $("#year").val();
	var month = $("#month").val();
	if(val == "") {
	$("#reportblock").css("display", "none");
	} else {
	$("#reportblock").css("display", "block"); 
	var thisvalue = $( this ).text();
	var selectedText = $(this).find("option:selected").text();
	// alert(selectedText);
	$(".communityname").html(selectedText);
	$("#siteid").val(val);
	
	//AJAX CALL
	
	   $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getbrnwmsvalues') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			   
			  $("#nw_bores_num").val(response["nw_bores_num"]);
			  $(".borewellnum").html(response["borewellsnum"]);
			  $("#no_ground_water").val(response["no_ground_water"]);
			  $("#over_load").val(response["over_load"]);
			  $("#motor_brunt").val(response["motor_brunt"]);
			  $("#record_id").val(response["record_id"]);
			  $("#cable_prblm").val(response["cable_prblm"]);
			  $("#pumpormotorwear").val(response["pumpormotorwear"]);  
			  $("#others").val(response["others"]); 
			  $("#dry_run_protectn").val(response["dry_run_protectn"]); 
			  $("#flow_meter").val(response["flow_meter"]); 
			  $("#remarks").val(response["remarks"]); 
			    
				}  
        });

	 
	//END AJAX CALL
	
	
	}
	
	});
 
 });
 
 function getvalidSum(dis)
 {

  var resocc = 0;
  var totfl = 0;
  
 var  nwbores = $("#nw_bores_num").val();
 var  over_load = $("#over_load").val();
 var motor_brunt = $("#motor_brunt").val();
	/*alert(nwbores);
	alert(over_load);
	alert(motor_brunt);*/
	if(nwbores == "") { nwbores = 0;}
  if(over_load == "") { over_load = 0;}
   if(motor_brunt == "") { motor_brunt = 0;}
   
   totfl = parseFloat(over_load) + parseFloat(motor_brunt);
  
   if(parseFloat(nwbores) < parseFloat(totfl)) {   
	  $("#over_load").addClass('errval');
	  $("#motor_brunt").addClass('errval'); 
   }
    else{
	  $("#over_load").removeClass('errval');
	  $("#motor_brunt").removeClass('errval');
	}
} 

	 
function subform()

 {
	var flag = true;

	//alert(flag);  
		$(".required" ).each(function() {
		//  alert($(this).val());
		  if($(this).val() == ""){

		//if(($( this ).val().length <= 0)){   
               flag = false;
			   // alert($(this).val().length);
				 //alert(flag);
		   $(this).addClass("numerror");
		//}   
		}
		 else{
			    $(this).removeClass("numerror"); 
			 }
	});
	  
	 	
	if ($('.confirmed:checked').length == 0) {

	 alert("Please confirm given data period of overall month")

	 flag = false;

	} 

//alert(flag);

if(flag == true){

//alert(flag);
  return true; 

}

else{ 
//alert(flag);
return false;    
}

 }

  </script>
   @include('partials.footer')
@stop