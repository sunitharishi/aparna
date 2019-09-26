
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
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="http://testing.rreg.in/quickadmin/css/tablesawres.css">-->

	<!--<link rel="stylesheet" href="/dist/tablesaw.css">-->
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	.manjeera table tr th 
	{
	padding:5px;
	text-align:center;
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	font-size:11px;
	}
 	.manjeera
	{
	font-size:11px;
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
	 font-size:11px;
 	}
	
 	.tablesaw-bar
	{
	height:30px;
	}
	.manjeera span
	{
	color:#041586;
	font-weight:bold;
	}
	.x_panel.housesco221
	{
	 border:0px;
	 padding:0px;
	}
	.dlyrep-select.threeemme label
	{
	 color:#ff2518;
	 font-weight:bold;
	 margin-right:4px !important;
	 line-height:30px;
	}
	.dlyrep-select.threeemme select
	{
	 width:200px;
	 float:left;
	}
	.saaahooo
	{
	 height:auto;
	 font-weight:bold;
	 font-size:23px;
	 color:#023F78;
	 margin-top:0px;
	 margin-bottom:10px;
	}
	.manjeera table tr td.text-left
	{
	 text-align:left;
	}
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 mis-indented-viewpage" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 housesco221">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content ">
    
	<div class="docs-main manjeera">
	
	<h3 class="saaahooo">Indented Material Status</h3>
	<?php // echo "<pre>"; print_r($indentrep); echo "</pre>"; ?>
	
                    <!--<h2>Material Indented Status </h2>-->
					  @if (count($indentrep) > 0)
					
					@foreach ($indentrep as $k => $indrec)
					 @if (count($indrec) > 0)
                     
                     <div class="materialindented-viewtable" style="margin-bottom:10px;">
					  <table width="100%" border="1" cellspacing="0" class="tablesaw" data-tablesaw-minimap data-tablesaw-mode='swipe'>
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="15" style="font-size:15px;text-align:center;"> Project Name : <?php echo $sites[$k]; ?> &nbsp;&nbsp;&nbsp; <span style="color:#ffd800;"><?php 
$monthName = date("F", mktime(0, 0, 0, $report_month, 10));
echo $monthName;?> - <?php echo $report_year;?> </span> </th>
                          </tr>
                      <tr style="background-color:#e9c085;"> 
                        <th data-tablesaw-priority='persist' data-tablesaw-sortable-col scope='col'>PR Nos</th>
                        <th data-tablesaw-priority='12' data-tablesaw-sortable-col scope='col'>PR Date </th>
                        <th data-tablesaw-priority='11' data-tablesaw-sortable-col scope='col'>Item Code</th>
                        <th data-tablesaw-priority='10' data-tablesaw-sortable-col scope='col'>Item  Desc</th>
                        <th data-tablesaw-priority='9' data-tablesaw-sortable-col scope='col'>UOM</th>
                        <th data-tablesaw-priority='8' data-tablesaw-sortable-col scope='col'> PR Qty </th>
                        <th data-tablesaw-priority='7' data-tablesaw-sortable-col scope='col'> PO No </th>
                        <th data-tablesaw-priority='6' data-tablesaw-sortable-col scope='col'>PO Date</th>
						  <th data-tablesaw-priority='4' data-tablesaw-sortable-col scope='col'>PO Qty</th>
                        <th data-tablesaw-priority='4' data-tablesaw-sortable-col scope='col'> Lead Time of days </th>
                        <th data-tablesaw-priority='3' data-tablesaw-sortable-col scope='col'> Date of Submission </th>
                        <th data-tablesaw-priority='2' data-tablesaw-sortable-col scope='col'> Date Form Submission </th>
                        <th data-tablesaw-priority='1' data-tablesaw-sortable-col scope='col'> Lagged Time Up to <?php if(isset($laggeddate[$k])) echo $laggeddate[$k]; ?></th>
                      </tr>
                             
						      @if (count($indrec) > 0)

                        @foreach ($indrec as $record)
                             <tr>
								<td class="text-left"><span><?php echo  $record['pr_nos'];?></span></td>
                                <td><span><?php   $x = date("d-m-Y",strtotime($record['pr_date'])); if($x == '01-01-1970') {} else { echo $x; 
								}?> </span></td>
								<td><span><?php echo  $record['item_code'];?></span></td>
								<td class="text-left"><span><?php echo  $record['item_desc'];?></span></td>
								<td><span><?php echo  $record['uom'];?></span></td>
								<td><span><?php echo  $record['pr_qty'];?></span></td>
								<td class="text-left"><span><?php echo  $record['po_no'];?></span></td>
								<td><span><?php   $x = date("d-m-Y",strtotime($record['po_date'])); if($x == '01-01-1970') {} else { echo $x;
								}?> </span></td>
								<td><span><?php echo  $record['po_qty'];?></span></td>
								<td><span><?php echo  $record['lead_time_of_days'];?></span></td>
								<td><span><?php echo  $record['date_of_submission'];?></span></td>
								<td><span><?php echo  $record['days_from_submission'];?></span></td>
								<td><span><?php echo  $record['lagged_time_upto'];?></span></td>
                            </tr>  
                          
						    @endforeach   

                    @else

                        <tr>

                            <td colspan="12">No entries in table</td>

                        </tr>

                    @endif
					
					 </tbody>
                      </table>
					  </div>
					 @endif
					 @endforeach   
					 
					  
 
                    @else
					 <div>No entries in table </div>
					 @endif
					 
					 
					 
					  
					  
     </div>
                        
                </div>
              </div>
            </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript">
	
	$( document ).ready(function() {
	
	  $('select[name="sites"]').on('change', function(){    
    //alert($(this).val());   

	 var val = $(this).val();
	var year = $("#year").val();
	var month = $("#month").val();
	 
	  if(val == "") {  
	  
	   $("#reportblock").css("display", "none");
	//  var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  
	   
	 } else {
	 
	 $("#reportblock").css("display", "block");
	 var thisvalue = $( this ).text();
	  var selectedText = $(this).find("option:selected").text();
            	// alert(selectedText);
				 $("#communityname").html(selectedText);
				 
				 //AJAX CALL
	
	   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getindentviewexport') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				
				$("#validresponse").html(response);
				 //var obj = jQuery.parseJSON( response);
                 //  alert(response); 
			   
			         
				}  
        }); 

	   
	//END AJAX CALL
 
	  }
  // window.location.replace('getdailyreport/'+val);
	//alert(id); 
});
});
</script>
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js'></script>
<script  src="http://testing.rreg.in/quickadmin/js/tablesawres.js"></script>
-->    
    
 @include('partials.footer')
@stop