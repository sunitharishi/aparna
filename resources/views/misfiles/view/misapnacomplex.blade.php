
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
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:5px;
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
	.x_panel.commmplaint
	{
	 border:0px;
	 padding:0px;
	}
	.saaahooo
	{
	 height:auto;
	 font-weight:bold;
	 font-size:23px;
	 color:#023F78;
	 margin-top:0px;
	}
	.dlyrep-select.seee-yoou label
	{
	 width:40px;
	 line-height:28px;
	 font-weight:bold;
	 color:#ff2518;
	 float:left;
	}
	.dlyrep-select.seee-yoou  select
	{
	 width:200px;
	 float:left;
	}
	.text-center
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
<div class="col-md-12 col-sm-12 col-xs-12 mis-apnacomplex-viewpage" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 commmplaint">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="manjeera">
                    <h3 class="saaahooo apna-complexheading">Apna Complex Complaint Report</h3>
                     @if (count($apnarep) > 0)
					
					@foreach ($apnarep as $k => $indrec)
					 @if (count($indrec) > 0)
                     <div class="apnacomplex-viewtable" style="margin-bottom:10px;">
					  <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="8" style="font-size:15px;text-align:center;"><?php echo $sites[$k]; ?></th>
                          </tr>
                          <tr>
                           <th colspan="8" style="font-size:15px;text-align:center;background-color:#e9c085;"><?php 
$monthName = date("F", mktime(0, 0, 0, $report_month, 10));
echo $monthName;?> - <?php echo $report_year;?> </th>
                          </tr>
                      <tr style="background-color:#a99f91;">
                       
                        <th class="text-center">Complaint Category</th>
                        <th class="text-center">Previous Pending</th>
                        <th class="text-center">Opened</th>
                        <th class="text-center">Resolved</th>
                        <th class="text-center">Total Outstanding </th>
                        <th class="text-center"> No Escalation </th>
                        <th class="text-center"> Escalated to L2</th> 
                        <th class="text-center"> Escalated to L3</th> 
                        
                       </tr>
                        
						      @if (count($indrec) > 0)
 
                        @foreach ($indrec as $record)
                          
                             <?php if($record['complaint_category'] == "" && $record['previous_pending'] == "" && $record['opened'] == "" && $record['resolved'] == "" && $record['total_outstanding'] == "" && $record['no_escalation'] == "" && $record['escalated_to_l2'] == "" && $record['escalated_to_l3'] == "" ) {} else { ?>
                          
                             <tr>
                       <td style="text-align:left;"><span><b><?php echo  $record['complaint_category'];?></b></span></td>
                       <td><span><?php echo  $record['previous_pending'];?></span></td>
                       <td><span><?php echo  $record['opened'];?></span></td>
                       <td><span><?php echo  $record['resolved'];?></span></td>
                       <td><span><?php echo  $record['total_outstanding'];?></span></td>
                       <td><span><?php if((float)$record['no_escalation'] > 0) { echo  $record['no_escalation'] * 100; echo " %";} else{ echo  $record['no_escalation'];} ?> </span></td>
                       <td><span><?php if((float)$record['escalated_to_l2'] > 0) { echo  $record['escalated_to_l2'] * 100; echo " %";} else{ echo  $record['escalated_to_l2'];} ?> </span></td>
                       <td><span><?php if((float)$record['escalated_to_l3'] > 0) { echo  $record['escalated_to_l3'] * 100; echo " %";} else{ echo  $record['escalated_to_l3'];} ?> </span></td>
                       
                            </tr>
							<?php } ?>
                          
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
    

          
       <!-- </div>-->
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
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
				url: '{{ route('validation.getapnacomptviewexport') }}',
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
@include('partials.footer')
@stop