
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
	.x_panel.housesco22
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
	table
	{
	 margin-bottom:10px;
	}
	.manjeera table tr td.text-left
	{
	 text-align:left;
	}
	</style>


<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 housesco22">
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
					  <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="15" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Project Name : <?php echo $sites[$k]; ?> &nbsp;&nbsp;&nbsp; <span style="color:#ffd800;"><?php 
$monthName = date("F", mktime(0, 0, 0, $report_month, 10));
echo $monthName;?> - <?php echo $report_year;?> </span> </th>
                          </tr>
                      <tr style="background-color:#e9c085;"> 
                        <th >PR Nos</th>
                        <th >PR Date </th>
                        <th >Item Code</th>
                        <th >Item  Desc</th>
                        <th >UOM</th>
                        <th > PR Qty </th>
                        <th > PO No </th>
                        <th>PO Date</th>
                        <th > Lead Time of days </th>
                        <th > Date of Submission </th>
                        <th > Date Form Submission </th>
                        <th > Lagged Time Up to <?php if(isset($laggeddate[$k])) echo $laggeddate[$k]; ?></th>
                      </tr>
                             
						      @if (count($indrec) > 0)

                        @foreach ($indrec as $record)
                             <tr>
								<td class="text-left"><span><?php echo  $record['pr_nos'];?></span></td>
								<td><span><?php echo  $record['pr_date'];?></span></td>
								<td><span><?php echo  $record['item_code'];?></span></td>
								<td class="text-left"><span><?php echo  $record['item_desc'];?></span></td>
								<td><span><?php echo  $record['uom'];?></span></td>
								<td><span><?php echo  $record['pr_qty'];?></span></td>
								<td class="text-left"><span><?php echo  $record['po_no'];?></span></td>
								<td><span><?php echo  $record['po_date'];?></span></td>
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
					
					 @endif
					 @endforeach   
					 
					  
 
                    @else
					 <div>No entries in table </div>
					 @endif
					 
					 
					 
					  
					  
     </div>
                        
                </div>
              </div>
            </div>
