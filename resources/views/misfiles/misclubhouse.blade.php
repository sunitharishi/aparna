
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
	 font-size:12px;
 	}
	.docs-main h3
	{
	text-align:left;
	margin-top:0px;
	margin-bottom:10px;
	font-weight:bold;
	height:auto;
	color:#023F78;
	font-size:23px;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.tablcomu tr th
	{
	text-align:center;
	}
.x_panel
 {
 border:0px solid white;
 }
 .weelcomme
 {
  padding-left:0px;
  padding-top:0px;
 }
 .weelcomme1
 {
  padding-left:0px !important;
 }
 .simplllly
	{
	 width:37%;
	 margin:0 auto;
	}
 .dlyrep-select.house-utilizastion label
 {
  width:40px;
  font-weight:bold;
  line-height:16px;
  float:left;
  color:#ff2518;
 }
 .dlyrep-select.house-utilizastion select
 {
  width:200px;
  float:left;
 }
 .tablesaw.tablesaw-swipe
 {
  width:37%;
  margin:0 auto;
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
	.save-button input[type="submit"]:hover
	{
	 background-color:#003087;
	}
	
	.fireseafmis input[type="checkbox"]
	{
	 margin-right:4px;
	}
	
	.fireseafmis2 input[type="checkbox"]
	{
	 margin-right:4px;
	 
	}
	.communityinpu tr td input
	{
	 width:40%;
	}
	table tr td.cneter-pool
	{
	 text-align:center;
	}
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 weelcomme1">
              <div class="x_panel tile fixed_height_400 weelcomme">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco212">
    
	<div class="docs-main">
	    
          <h3> Club House Utilization Data</h3>    
          <div class="col-xs-8 form-group" style="padding-left:0px;">
				
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					{!! Form::open(['method' => 'POST', 'route' => ['misreports.storeclubhouse'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
					<div class="dlyrep-select sie-view house-utilizastion">
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>
					
                </div>
                {{ Form::hidden('site', '',['id' => 'siteid', 'placeholder' => '']) }}
						{!! Form::hidden('flats','', ['class' => '', 'placeholder' => '', 'id' => 'flats_id']) !!}
                
                 <div id="reportblock" style="display:none"> 
   
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu">
            
             {!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
			{!! Form::hidden('record_id','', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
            
            
				<tr style="background-color:#416a7b;color:#fff;">
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" colspan="2" style="width:154px;">Community</th>
                    <th class="communityname"><?php  // echo $site;   ?></th>
                </tr>
                
                <tr>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Total Flats / Villas </th>
                     <td class="flatsnum"> <?php   //echo  $flats[$key]; ?></td> 
                </tr>
					
                
			</thead>
			<tbody class="communityinpu">
             
 				
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Avg  Occupancy</th>
                        <td class="cneter-pool">{!! Form::text('avg_occupancy','', ['class' => 'pooook-water', 'placeholder' => '', 'id' => 'avg_occupancy','readonly']) !!} </td>
                    </tr>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="2">Average Daily Usage </th>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Swimming Pool</th>
                        <td class="cneter-pool">{!! Form::text('avg_daily_swim','', ['class' => 'pooook-water', 'placeholder' => '', 'id' => 'avg_daily_swim', 'onkeyup' => 'getswimpl()']) !!} </td>
                    </tr>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi">Gym</th>
                        <td class="cneter-pool">{!! Form::text('avg_daily_gym','', ['class' => 'pooook-water', 'placeholder' => '', 'id' => 'avg_daily_gym', 'onkeyup' => 'getgymavg()']) !!} </td>
                     </tr>
                     <tr>
                      <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="2">% Against Occupied Flats</th>
                       <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Swimming Pool</th>
                        <td class="cneter-pool">{!! Form::text('occ_flat_swim','', ['class' => 'pooook-water', 'placeholder' => '', 'id' => 'occ_flat_swim','readonly']) !!} </td>
                     </tr>
                     <tr>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi">Gym</th>
                        <td class="cneter-pool">{!! Form::text('occ_gym_swim','', ['class' => 'pooook-water', 'placeholder' => '', 'id' => 'occ_gym_swim','readonly']) !!} </td>
                     </tr>
                          
                          
			</tbody> 
		</table>
          <div class="simplllly"><div class="fireseafmis"><input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="color:#1a816f;font-weight:bold;">Save as</span><span style="color:#c22804;font-weight:bold;"> Draft</span></div>
              <div class="fireseafmis2"> <input type="checkbox" value="1" class=""  name="report_status"><span style="color:#520990;font-weight:bold;">I accept given data period of overall month</span></div>
           
        </div>
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
				url: '{{ route('validation.getclubhousemsvalues') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			          
			  $("#flats_id").val(response["flats"]);
			  $(".flatsnum").html(response["flats"]);
			  $("#avg_occupancy").val(response["avg_occupancy"]);
			  $("#avg_daily_swim").val(response["avg_daily_swim"]);
			  $("#avg_daily_gym").val(response["avg_daily_gym"]);
			  $("#record_id").val(response["record_id"]);
			  $("#occ_flat_swim").val(response["occ_flat_swim"]);
			   $("#occ_gym_swim").val(response["occ_gym_swim"]);
		
			    
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

  
var   owners = $("#owners_id").val();
 var  tenants = $("#tenants_id").val();
  var flats = $("#flats_id").val();
  var vacant = $("#vacant_id").val();
 
  if(parseFloat(flats) > 0)
  {
  if(owners == "") { owners = 0;}
  if(tenants == "") { tenants = 0;}
   if(vacant == "") { vacant = 0;}

  
    if(owners == "" && owners == "") { resocc = 0;}
   
  resocc = parseFloat(owners) + parseFloat(tenants);
  
//  alert(parseFloat(resocc));
  
   $("#occupied_id").val(parseFloat(resocc));
   
   totfl = parseFloat(owners) + parseFloat(tenants) + parseFloat(vacant);
   
   if(parseFloat(totfl) !=  parseFloat(flats)){
      $("#owners_id").addClass('errval');
	  $("#tenants_id").addClass('errval');
	  $("#vacant_id").addClass('errval'); 
   }
    else{
	  $("#owners_id").removeClass('errval');
	  $("#tenants_id").removeClass('errval');
	  $("#vacant_id").removeClass('errval'); 
	}
	}
	else{
	
	    $("#owners_id").val('0');
	  $("#tenants_id").val('0');
	  $("#vacant_id").val('0'); 
	}

} 

	
function subform()

 {

	var flag = true;

	$( ".number" ).each(function() {

		if(($( this ).val().length <= 0)){


		}

		else{
		 if(isNaN($( this ).val())){

			     flag = false;


				 $(this).addClass("numerror");

			 }

			 else{

			    $(this).removeClass("numerror"); 
			 }

		}

	}); 
	
	
	if ($('.confirmed:checked').length == 0) {

	

	 alert("Please confirm given data period of overall month")

	 flag = false;

	} 


if(flag == true){

  return true; 

}

else{
return false;    
}

 }

function getswimpl(){
  var swim =  $("#avg_daily_swim").val();
  var persent = 0;
      if(isNaN(swim)) {
	    swim = 0;
	  } else{
	 var avgocc =  $("#avg_occupancy").val();
	    if(avgocc == ""){
			avgocc = 0;
		}
		if(parseFloat(avgocc) > 0){
		 persent = parseFloat(parseFloat(swim * 100)/parseFloat(avgocc));
		}
	  }  
	  $("#occ_flat_swim").val(Math.round(persent));
   
}

function getgymavg(){
  var swim =  $("#avg_daily_gym").val();
  var persent = 0;
      if(isNaN(swim)) {
	    swim = 0;
	  } else{
	 var avgocc =  $("#avg_occupancy").val();
	    if(avgocc == ""){
			avgocc = 0;
		}
		if(parseFloat(avgocc) > 0){
		 persent = parseFloat(parseFloat(swim * 100)/parseFloat(avgocc));
		}
	  }  
	  $("#occ_gym_swim").val(Math.round(persent));
    
}
   
   
  </script> 	
 @include('partials.footer')
@stop