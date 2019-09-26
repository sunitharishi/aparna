<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Occupancy &amp; Rental Details</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    
    <style>
	body
	{
	 font-family: "Open Sans", sans-serif;
	}
	.manjeera table tr th 
	{
	padding:5px 3px;
	text-align:center;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:5px  3px;
	text-align:center;
	}
	.manjeera table tr td:nth-child(2)
	{
	text-align:left;
	}
	.manjeera table tbody tr td.sboteheight
	{
	 height:45px;
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
	.manjeera span 
	{
	color:black;
	}
	.x_panel
	{
	border:none;
	}
	table
	{
	color:black;
	}
	.adinfo tbody tr th 
	{
	padding:3px;
	}
	.adinfo tbody tr td
	{
	padding:3px;
	}
	.adinfo tbody tr td.sboteheight
	{
	 height:40px !important;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.manjeera table tr td.text-left
	{
	text-align:left;
	}
	.manjeera p:first-letter
	{
	 text-transform:capitalize;
	}
	.additional-information p
	{
	 font-size:13px;
	}
	.additional-information .col-sm-6 p
	{
	 margin-top:0px;
	 font-size:13px;
	}
	.additional-information .col-sm-6
	{
	 float:left;
	 padding-right:15px;
	 width:50%;
	}
	@media print {

    html, body {
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
    }

}
	
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"  style="width:100%;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
                                            <table width="100%" border="1" cellspacing="0" <?php if(isset($cmddata['additional_info'])) { if($cmddata['additional_info']) { echo "class='adinfo'"; } }  ?>>
                        <tbody>
                          <tr>
                           <th colspan="19" style="font-size:14px;padding:6px 0px;text-align:center;"> Installed capacity Vs Maximum recorded demand (load) as on <span><?php echo $report_on; ?></span></th>
                          </tr>
                      <tr>
					  
							<th  rowspan="2">S.No</th>
							<th rowspan="2"> Project Name </th>
							<th   rowspan="2">No. of Units</th>
							<th  rowspan="2">Occupancy </th>
							<th   rowspan="2">Occupancy in %</th>
							<th   colspan="2">CMD in KVA</th>
							<th  colspan="2">RMD in KVA</th>
							<th   colspan="3">Transformer Capacity (KVA)</th>
							<th   colspan="4">DG Set Capacity (KVA)</th>
							<th   rowspan="2">Service No.</th>
							<th   rowspan="2">Peak Load recorded in Month</th>
							<th   rowspan="2">Remarks</th>
						  
					</tr>
					<tr>
						<th>Total</th>
						<th>Per Flat</th>
						<th> Total</th>
						<th> Per Flat</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on tranformer</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on DG</th>
						<th>DG Backup</th>
                    </tr>
                          
						
						  @if (count($sites) > 0) <?php $i = 0; ?>
                        @foreach ($sites as $key => $site)
						 <?php $i = $i + 1; ?>
                              <tr>
						 <td style="text-align:center;"><b><?php  echo $i;   ?></b></td>  
                         <td class="sboteheight"><b><?php  echo $site;   ?></b></td> 
                        <td class="text-center"><b> <?php  if(isset($flats[$key])) {  echo  $flats[$key]; }?></b></td> 
						
						<td> <?php  if(isset($occupency[$key]['occupency'])) echo $occupency[$key]['occupency']; ?> </td>
						<td><?php if(isset($occupency[$key]['occupency']) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round(($occupency[$key]['occupency']/$flats[$key]),2) * 100; echo "%";
						} }  ?></td> 
						<td> <?php  if(isset($cmdkva[$key])) echo $cmdkva[$key]; ?> </td>
						<td><?php if(isset($cmdkva[$key]) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round((float)((float)$cmdkva[$key]/(int)$flats[$key]),2);
						} }  ?></td> 
						<td> <?php  if(isset($existing[$key]['total_rmd'])) echo $existing[$key]['total_rmd']; ?> </td>
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($occupency[$key]['occupency'])) {
						    if((float)$occupency[$key]['occupency'] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/$occupency[$key]['occupency']),2);
						} } ?></td> 
						<td> <?php  if(isset($transforkva[$key])) echo $transforkva[$key]; ?> </td> 
						<td> <?php if(isset($transforkva[$key]) && isset($flats[$key])) { if((int)$flats[$key] > 0) {
 						     echo round((float)((float)$transforkva[$key]/(int)$flats[$key]),2);
						} } ?></td>
						<td> <?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) { 
						     if((float)($transforkva[$key]) > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$transforkva[$key]),2) * 100; echo "%";
						} }  ?></td>
						<td> <?php  if(isset($dg_kva[$key])) echo $dg_kva[$key]; ?> </td>
						<td><?php if(isset($dg_kva[$key])  && isset($flats[$key])){  if((int)$flats[$key] > 0) {
						     echo round((float)((float)$dg_kva[$key]/$flats[$key]),2);
						}  } ?></td> 
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) {  if ((float)$dg_kva[$key] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$dg_kva[$key]),2) * 100;echo "%";
						} } ?></td> 
						<td> <?php   if(isset($backup[$key])) { echo  $backup[$key]; }  ?></td> 
						   
						<td> <?php  if(isset($service_numb[$key])) echo $service_numb[$key]; ?> </td>
						<td> <?php  if(isset($existing[$key]['peak_load_record'])) echo $existing[$key]['peak_load_record']; ?> </td>
						<td> <?php  if(isset($existing[$key]['remarks'])) echo $existing[$key]['remarks']; ?> </td>
						
                      
					    </tr>    
							    
							 @endforeach
							   
							 @endif
                              
                          
                        </tbody>
                      </table> 
                      
                          <?php if(isset($cmddata['additional_info'])) echo $cmddata['additional_info'];  ?>
                    </div>
                    
                      <div class="additional-information">
                    	<p>Going by the above data, the capacities of transformers, switch gears, panels and DG sets can be considerably reduced (after analysis of the data in detail by the consultants & MEP) for our ongoing and furture projects resulting in saving in initial capital cost and recurring diesel & maintenance cost.</p>
                        <div class="col-sm-6">
                        	<p>* CMD : Contracted maximum demand</p>
                        </div>
                        <div class="col-sm-6">
                        	<p>* RMD : Recorded maximum demand</p>
                        </div>
                    </div>
                    
                </div>
              </div> 
            </div>            
          </div>
          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>


  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	
	window.location.href = "/misreports"; 
});

</script>