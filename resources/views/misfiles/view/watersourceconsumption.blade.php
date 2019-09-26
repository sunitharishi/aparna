
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
     <link href="/build/css/fixedheadertable.css" rel="stylesheet" media="screen" />
     <link href="/build/css/fixed.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" href="/dist/tablesaw.css">
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
	 font-size:12px;
 	}
	.docs-main h3
	{
    margin-top:10px;
	margin-bottom:25px;
	text-align:center;
	}
	.tablesaw-bar
	{
	height:30px;
	}
    .tablesaw tr th 
	{
	text-align:center;
	}
	.manjeera span
	{
	color:#041586;
	font-weight:bold;
	}
	.x_panel.consumpationkl
	{
	 border:0px;
	 padding-left:0px;
	 padding-right:0px;
	 padding-top:0px;
	}
	.x_content.housesco
	{
	 margin-top:0px;
	 padding-left:0px;
	 padding-top:0px;
	}
	.consumpationkl23
	{
	 padding-left:0px !important;
	 padding-right:0px !important;
	}
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 consumpationkl23">
              <div class="x_panel tile fixed_height_400 consumpationkl">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    <div class="watersource-consumptionreports">
	<div class="manjeera communitywise-viewtable table-wrap table-responsive" id="table-scroll">

                      <table width="100%" border="1" cellspacing="0"  class="bluetable" id="myDemoTable">
                        <tbody>
                          <tr>
                           <th colspan="16" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;">Community Wise Water Source & Consumption for <span style="color:#ffd800;"><?php echo $report_on; ?></span></th>
                          </tr>
                      <tr style="background-color:#e9c085;"> 
                        <th rowspan="3">S.No</th>
                        <th rowspan="3">Community </th>
                        <th rowspan="3">Total<br> Units </th>
                        <th rowspan="3">Occupancy<br> (Avg) </th>
                        <th colspan="2" rowspan="2">Borewells</th>
                        <th colspan="2">Metro Water</th>
                        <th  colspan="8">Consumption in KL</th>
                      </tr>
                          
                        <tr style="background-color:#e9c085;">
                         <th  rowspan="2">Contracted <br>Qty (KL)</th>
                         <th  rowspan="2">Water <br>supplied : % on<br>contracted <br>quantity</th>
                         <th colspan="2">Metro </th>
                         <th  colspan="2" >Borewells</th>
                         <th colspan="2">Tankers</th>
                         <th colspan="2">Total</th>
                        </tr>
                          
                       <tr style="background-color:#e9c085;">
                         <th >Total </th>
                         <th >No.of<br> bores: Not <br>Working</th>
                         <th>Avg per<br> day  (Kl)</th>
                         <th>% on total <br>consumption</th>
                         <th>Avg per day(kl)</th>
                         <th>% on total <br>consumption</th>
                         <th>Avg per<br>day(kl)</th>
                         <th>% on total <br>consumption</th>
                         <th>Avg Water <br>consumpti<br>on per <br>day(kl)</th>
                         <th>Avg Water <br>consumpti<br>on per unit per day(kl)</th>
                         </tr>
                           
                             @if (count($sites) > 0) <?php $i = 1; ?>
                        @foreach ($sites as $key => $site)
                        		@if($key!=95)
                              <tr>  
                        <td><b><?php echo $i++; ?></b>   </td>   
                        <td style="text-align:left;" class="secondcol"><b><?php  echo $site;   ?></b></td>
                        <td><b> <?php    if(isset($flats[$key])) echo $flats[$key]; ?></b></td> 
                       
                        <td><span><?php if(isset($occupancy[$key])) echo $occupancy[$key];  else echo "0"; ?></span> </td>
                        <td><span><?php if(isset($borewellsnum[$key])) echo $borewellsnum[$key]; else echo "0"; ?></span> </td>
                        <td><span><?php  if(isset($nwbrwnum[$key]))echo $nwbrwnum[$key]; else echo "0"; ?></span></td> 
                        <td><span><?php  if(isset($concentrated[$key])) echo $concentrated[$key]; ?></span></td>
                         <?php  if( (float)$endoftheday != 0) $m1 = (float)((float)$average[$key]/(float)$endoftheday);
						       if( (float)$endoftheday != 0) $b1 = (float)((float)$boresavg[$key]/(float)$endoftheday);
							   if( (float)$endoftheday != 0) $t1 = (float)((float)$tankdavg[$key]/(float)$endoftheday);
						?>
                        <td> <b><?php if(isset($concentrated[$key])) { if((float)$concentrated[$key] != 0) echo round((($m1 * 100)/(float)$concentrated[$key]) , 2); else echo "0"; } else echo "-";?></b></td>
                       
                        <td><span><?php echo  round($m1, 2); ?></span></td>
                        <td><span><?php  if((float)($m1 + $b1 + $t1) >0) echo round(((float)($m1 * 100)/($m1 + $b1 + $t1)), 2); else echo "0";  ?></span> </td>
                        <td><span><?php echo round($b1, 2); ?></span></td>
                        <td><span><?php  if((float)($m1 + $b1 + $t1) >0) echo round(((float)($b1 * 100)/($m1 + $b1 + $t1)), 2); else echo "0"; ?></span></td>
                       <td><span><?php echo round($t1,2); ?></span></td>
                        <td><span><?php  if((float)($m1 + $b1 + $t1) >0) echo round(((float)($t1 * 100)/($m1 + $b1 + $t1)), 2); else echo "0";?></span></td>
                        <td><span><?php echo round(((float)($m1 + $b1 + $t1)),2); ?></span></td>
						<td><span><?php if(isset($occupancy[$key])) { if($occupancy[$key] > 0) {$xv = ($m1 + $b1 + $t1)/$occupancy[$key]; 
						//echo round($xv,2);
						echo number_format((float)$xv, 2, '.', '');
						} } //  round((($m1 + $b1 + $t1)/ $flats[$key]), 2);
						
						
						?></span></td>
                          </tr>
                            @endif
                           @endforeach
							     
							 @endif
                             
                           
                          
                        </tbody>
                      </table>
                     </div>
					  <?php if(isset($additionalinfo)) { if($additionalinfo) echo $additionalinfo; }  ?>
                      
              <!--  <p style="padding-top:3px;margin-bottom:5px;">Note: 1.Above consumption includes clubhouse, swimming pool refilling, carwash & public rest rooms.</p>  
                        <p class="borewell">2.Treated water recycled for flushing not included above .</p>
                        <p class="borewell">  3. Refer page 3 for Borewells not working status.</p>
                        <p class="borewell">  4. Refer pages 30,32,34,36,38,39  for STP treated water details. </p>-->
                     
                   
    
                        
                </div>
              </div>
            </div>
	<script   
   src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
    </script>	
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     <script src="/build/js/jquery.fixedheadertable.js"></script>
       <script type="text/javascript">
            /* <![CDATA[ */
            $(document).ready(function() {
                $('#myDemoTable').fixedHeaderTable({
                    altClass : 'odd',
                    footer : true,
                    fixedColumns : 1
                });
            });
            /* ]]> */
        </script>	
    <script>
	  $(document).ready(function() {
  $('tbody').scroll(function(e) { //detect a scroll event on the tbody
  	/*
    Setting the thead left value to the negative valule of tbody.scrollLeft will make it track the movement
    of the tbody element. Setting an elements left value to that of the tbody.scrollLeft left makes it maintain 			it's relative position at the left of the table.    
    */
    $('thead').css("left", -$("tbody").scrollLeft()); //fix the thead relative to the body scrolling
    $('thead th:nth-child(1)').css("left", $("tbody").scrollLeft()); //fix the first cell of the header
    $('tbody td:nth-child(1)').css("left", $("tbody").scrollLeft()); //fix the first column of tdbody
  });
});
	</script>
     <script>
	   jQuery(document).ready(function() {
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
     });
    </script>
    @include('partials.footer')
@stop