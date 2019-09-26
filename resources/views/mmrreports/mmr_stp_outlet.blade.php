 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMR Index</title>
    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   <!-- <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
     <!--<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>
*
{
 font-family:Arial, Helvetica, sans-serif;
}
.mmrreport-eading
{
    margin-bottom:20px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
text-transform:uppercase;
}

.incident-summary
{
 font-size:17px;
 clear:both;
 font-weight:600;

}
.soft-services
{
 font-weight:600;
 font-size:17px;
}
.aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:0px;
 top:-20px;
 padding:4px;
 width:110px;
 height:auto;
}

 

.footer
{
 font-weight:100;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-80px;
 right:0px;
vertical-align:bottom;
}
body
{
 position:relative;
height:100%;
}
.test-results
{
 clear:both;
}
.test-reports h5, .test-results h5
{
 margin:6px 0px 6px 0px;
 text-align:center;
}
.test-reports table, .test-results table
{
 border:1px solid #000;
 width:100%;
 border-collapse:collapse;
}
.test-reports table tr th, .test-reports table tr td, .test-results tr th, .test-results tr td
{
 border:1px solid #000;
 padding:3px;
 font-size:13px;
 vertical-align:middle;
}
.note
{
 width:100%;
 clear:both;
 font-size:13px;
 display:block;
 margin-top:6px;
}
.note .note-heading
{
 width:5%;
 float:left;
 font-weight:bold;
 margin=:20px 20px 0px 0px;
 vertical-align:bottom;
 overflow:hidden;
}
.note .note-content
{
 width:94%;
 float:left;
 vertical-align:top;
 overflow:hidden;
}
.note .note-content, .note .note-content *
{
 padding:0px;
 margin:0px;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
}
.main-heading
{
    margin:-8px 0px 10px 0px;
}
</style>
</head>
<body>
<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $report_year }}</h2>
    <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
        
          
    	<div class="soft-services">STP-Outlet Water Test Report </div>
    	
      
        
        
        <div class="metro-test-reports">
             <div class="test-reports">
             	<h5>TEST REPORT</h5>
                <table class="test-report">
                	<thead>
                    	<tr>
                        	<th colspan="2">Customer Name & Address</th>
                            <th>Test Report No.<?php if(isset($pbasys1['test_report_no']) && $pbasys1['test_report_no']!="") echo $pbasys1['test_report_no']; ?></th>
                            <th>VCR-<?php if(isset($pbasys1['vcr']) && $pbasys1['vcr']!="") echo $pbasys1['vcr']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                        	<td rowspan="4" colspan="2" align="center">M/s. Aparna Property Management Services, <br /> Hyderabad.</td>
                            <td>Report Issue Date</td>
                            <td><?php if(isset($pbasys1['report_idate']) && $pbasys1['report_idate']!="") echo date("d-m-Y",strtotime($pbasys1['report_idate'])); ?></td>
                        </tr>
                        <tr>
                            <td>Registration No.</td>
                            <td><?php if(isset($pbasys1['regis_no']) && $pbasys1['regis_no']!="") echo $pbasys1['regis_no']; ?></td>
                        </tr>
                        <tr>
                            <td>Registration Date</td>
                            <td><?php if(isset($pbasys1['regis_date']) && $pbasys1['regis_date']!="") echo $pbasys1['regis_date'];?></td>
                        </tr>
                         <tr>
                            <td>Customer Reference</td>
                            <td><?php if(isset($pbasys1['cus_ref']) && $pbasys1['cus_ref']!="") echo $pbasys1['cus_ref']; ?></td>
                        </tr>
                        <tr>
                        	<td rowspan="2">Sample Description</td>
                            <td rowspan="2">STP - Outlet</td>
                            <td>Reference Date</td>
                            <td><?php if(isset($pbasys1['ref_date']) && $pbasys1['ref_date']!="") echo $pbasys1['ref_date'];?></td>
                        </tr>
                        <tr>
                        	<td>Analysis Starting Date</td>
                            <td><?php if(isset($pbasys1['analy_startdate']) && $pbasys1['analy_startdate']!="") echo date("d-m-Y",strtotime($pbasys1['analy_startdate'])); ?></td>
                        </tr>
                          <tr>
                        	<td rowspan="3">Sample Site</td>
                            <td rowspan="3"><?php echo $sitename; ?></td>
                            <td>Analysis Completion Date</td>
                            <td><?php if(isset($pbasys1['analy_compdate']) && $pbasys1['analy_compdate']!="") echo date("d-m-Y",strtotime($pbasys1['analy_compdate'])); ?></td>
                        </tr>
                          <tr>
                        	<td>Storage Condition</td>
                            <td><?php if(isset($pbasys1['stor_cond']) && $pbasys1['stor_cond']!="") echo $pbasys1['stor_cond']; ?></td>
                        </tr>
                         <tr>
                        	<td>Condition Upon Receipt</td>
                            <td><?php if(isset($pbasys1['cond_rec']) && $pbasys1['cond_rec']!="") echo $pbasys1['cond_rec']; ?></td>
                        </tr>
                        <tr>
                        	<td colspan="2">Quantity Received</td>
                            <td colspan="2"><?php if(isset($pbasys1['qua_rec']) && $pbasys1['qua_rec']!="") echo $pbasys1['qua_rec']; ?></td>
                        </tr>
                         <tr>
                        	<td colspan="2">Sample Collected or Submitted</td>
                            <td colspan="2"><?php if(isset($pbasys1['sam_coll']) && $pbasys1['sam_coll']!="") echo $pbasys1['sam_coll']; ?></td>
                        </tr>
                    </tbody>
                </table>
             </div>
             
              <div class="test-results">
             	<h5>TEST RESULT</h5>
                <table class="test-report">
                	<thead>
                    	<tr>
                        	<th>S.No</th>
                            <th>Test Parameters</th>
                            <th>Units</th>
                            <th>Results</th>
                            <th>CPCB NORMS (land for irrigation)</th>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <tr>
                        	<td colspan="5">Physical & chemical Parameters</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>pH</td>
                           <td>-</td>
                           <td>5.5 - 9.0</td>                          
                           <td><?php if(isset($pbasys1['ph']) && $pbasys1['ph']!="") echo $pbasys1['ph']; ?></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Total Dissolved Solids</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['totdiss_solids']) && $pbasys1['totdiss_solids']!="") echo $pbasys1['totdiss_solids']; ?></td>
                           <td>&lt;21.00</td>
                        </tr>
                         <tr>
                           <td>3</td>
                           <td>Total Suspended Solids</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['totsus_solids']) && $pbasys1['totsus_solids']!="") echo $pbasys1['totsus_solids']; ?></td>
                           <td>&lt;200</td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Chemical Oxygen Demand</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['cheoxy_demand']) && $pbasys1['cheoxy_demand']!="") echo $pbasys1['cheoxy_demand']; ?></td>
                           <td>&lt;250</td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>Biological Oxygen Demand (3 Days @ 27<sup>&deg;</sup>C)</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['biooxy_demand']) && $pbasys1['biooxy_demand']!="") echo $pbasys1['biooxy_demand']; ?></td>
                           <td>&lt;100</td>
                        </tr>
                         <tr>
                           <td>6</td>
                           <td>Chlorides as Cl</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['chloridescl']) && $pbasys1['chloridescl']!="") echo $pbasys1['chloridescl']; ?></td>
                           <td>&lt;600</td>
                        </tr>
                          <tr>
                           <td>7</td>
                           <td>Sulphates as So<sub>4</sub></td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['sulphatesso']) && $pbasys1['sulphatesso']!="") echo $pbasys1['sulphatesso']; ?></td>
                           <td>&lt;1000</td>
                        </tr>
                         <tr>
                           <td>8</td>
                           <td>oil & grease</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['oil_grease']) && $pbasys1['oil_grease']!="") echo $pbasys1['oil_grease']; ?></td>
                           <td>&lt;10</td>
                        </tr>
                        <tr>
                           <td>9</td>
                           <td>Total Hardness as Caco<sub>3</sub></td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['hardnesscaco']) && $pbasys1['hardnesscaco']!="") echo $pbasys1['hardnesscaco']; ?></td>
                           <td>Not specified</td>
                        </tr>
                         <tr>
                           <td>10</td>
                           <td>Calcium as Ca</td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['calciumca']) && $pbasys1['calciumca']!="") echo $pbasys1['sam_coll']; ?></td>
                           <td>Not specified</td>
                        </tr>
                        <tr>
                           <td>11</td>
                           <td>Total Alaklinity as Caco<sub>3</sub></td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['alaklinitycaco']) && $pbasys1['alaklinitycaco']!="") echo $pbasys1['alaklinitycaco']; ?></td>
                           <td>Not specified</td>
                        </tr>
                        <tr>
                           <td>12</td>
                           <td>Nitrates as No<sub>3</sub></td>
                           <td>mg / l</td>
                           <td><?php if(isset($pbasys1['nitratesno']) && $pbasys1['nitratesno']!="") echo $pbasys1['nitratesno']; ?></td>
                           <td>Not specified</td>
                        </tr>
                         <tr>
                           <td>13</td>
                           <td>Color</td>
                           <td>-</td>
                           <td><?php if(isset($pbasys1['color']) && $pbasys1['color']!="") echo $pbasys1['color']; ?></td>
                           <td>Not specified</td>
                        </tr>
                        <tr>
                           <td>14</td>
                           <td>Odour</td>
                           <td>-</td>
                           <td><?php if(isset($pbasys1['odour']) && $pbasys1['odour']!="") echo $pbasys1['odour']; ?></td>
                           <td>Not specified</td>
                        </tr>
                        <tr>
                           <td>15</td>
                           <td>Turbidity</td>
                           <td>NTU</td>
                           <td><?php if(isset($pbasys1['turbidity']) && $pbasys1['turbidity']!="") echo $pbasys1['turbidity']; ?></td>
                           <td>Not specified</td>
                        </tr>
                    </tbody>
                </table>
             </div>
             <?php /*?><div class="table-responsive" style="width:660px; margin:15px auto; text-align:center;">
				<?php if(isset($pbasys1['stpoutlet_pic']) && $pbasys1['stpoutlet_pic']!="") { ?>
					<img src="<?php  echo url('/')."/".$pbasys1['stpoutlet_pic']; ?>" border="0"/>
               <?php } ?>
            </div><?php */?>
           </div>
    </div>	
    <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	 		 	 
</div>
</body>					   
</html>					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

