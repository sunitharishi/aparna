
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
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ;
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
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
	.tablesaw-bar
	{
	height:30px;
	}
	</style>
@extends('layouts.app')


@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="docs-main">
	 
          <h3>Apna Complex Complaint Report</h3>
          <h3>APARNA SAROVAR (ASOWS)</h3>
          <h3>COMPLAINT REPORT from 15-04-2017 to 10-05-2017</h3>
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Complaint Category</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" >Previous Pending</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" >Opened</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Resolved</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Total Outstanding</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >No Escalation</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Escalated to L2</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Escalated to L3</th>
                      
				</tr>
             
                
                 
                
			</thead>
			<tbody class="communityinpu">
            
 				
                             <tr>
                        <td>Accounts</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                          
                             <tr>
                        <td>Car / Two Wheeler Sticker</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Carpentry</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Carpentery</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                           <tr>
                        <td>CCTV</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Civil</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Club House</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Common Areas</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Electrical</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Elevators</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                        <td>Fire & Safety</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Garbage Disposal</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                        <td>General</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Horticulture</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Housekeeping</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Intercom</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                        <td>Lifts</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>Lost & Found</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>LPG Gas Refill / Repair</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>No Category</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>parking management</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>Parts Replacement ( Minor )</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>Play Area / Courts</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>Play Area / Courts</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                            <td>Plumbing</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>Resident ID Cards</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                            <td>Security</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                            <td>Seepage</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                            <td>Seepage / Civil Works</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                            <td>Sugguestions</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                             <td>Traffic Regulation</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                             <td>Utilities Billing</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            <tr>
                             <td>Vehicle Parking</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                            
                            <tr>
                             <td>Wash Room Slope</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
                             <tr>
                             <td> Total</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                            </tr>
			</tbody>
		</table>

		

	
	</div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@stop