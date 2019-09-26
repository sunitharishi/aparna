
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
	table
	{
	 margin-bottom:10px;
	}
	.text-center
	{
	text-align:center;
	}
	</style>

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 commmplaint">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco212">
    
	<div class="manjeera">
                    <h3 class="saaahooo">Apna Complex Complaint Report</h3>
                     @if (count($apnarep) > 0)
					
					@foreach ($apnarep as $k => $indrec)
					 @if (count($indrec) > 0)
  
					  <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="8" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"><?php echo $sites[$k]; ?></th>
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
                          
                             <tr>
                       <td><span><?php echo  $record['complaint_category'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['previous_pending'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['opened'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['resolved'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['total_outstanding'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['no_escalation'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['escalated_to_l2'];?></span></td>
                       <td class="text-center"><span><?php echo  $record['escalated_to_l3'];?></span></td>
                       
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
    

          
       <!-- </div>-->
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    
                        
                </div>
              </div>
            </div>
			
