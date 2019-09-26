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

table
{
 margin:10px 0px;
 border-collapse:collapse;
}
table thead tr th, table tbody tr td
{
 padding:8px;
 font-size:12.6px;
}
.note span
{
 width:auto;
 float:left;
 margin-right:6px;
}
.note div
{
 width:auto;
 float:left;
 font-weight:600;
}
.incident-summary
{
 font-size:17px;
font-weight:600;
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
.body-tage
{
 position:relative;
}
.footer
{
 font-weight:100;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-80px;
 right:0px;
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

<div class="mmrreport-eading">
   <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
    <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">
        <?php /*?><div class="incident-summary"><?php echo $tCount; ?>. AMC Tracker</div>
        <table width="100%" border="1">
        	<thead>
            	<tr>
                	<th>Asset</th>
                    <th>Name</th>
                    <th>Vendor</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
             <?php $i = 0; ?> 
            @if(count($resval) > 0)
             @foreach($resval as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                    <td><?php if(isset($val['assetname'])) echo $val['assetname']; ?></td>
                	<td><?php if(isset($val['name'])) echo $val['name']; ?></td>
                    <td><?php if(isset($val['vendorname'])) echo $val['vendorname']; ?></td>
                    <td style="width:80px;"><?php if(isset($val['amc_startdate'])) echo date("d-m-Y",strtotime($val['amc_startdate'])); ?></td>
                    <td style="width:80px;"><?php if(isset($val['amc_enddate'])) echo date("d-m-Y",strtotime($val['amc_enddate'])); ?></td>
                   
                </tr>
                @endforeach
            @endif   
            </tbody>
        </table>
       
    </div>	<?php */?>
    @if(count($wresval) > 0)
    <div class="incident-summary">Warranty/AMC</div>
    <table width="100%" border="1">    		
        	<thead>
            	<tr>
                    <th>Asset Name</th>
                    <th>Vendorname</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Code</th>
                	<th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>					
                    <th>Status</th>
                </tr>
            </thead> 
            <tbody>
             <?php $i = 0; ?> 
             @foreach($wresval as $k => $assets)
			 	<?php
					 if($assets['amc_startdate']!="" && $assets['amc_startdate']!='0000-00-00') $startdate = $assets['amc_startdate'];
					else if($assets['waranty_startdate']!="" && $assets['waranty_startdate']!='0000-00-00') $startdate = $assets['waranty_startdate'];
					else $startdate = "";
					if($assets['amc_enddate']!="" && $assets['amc_enddate']!='0000-00-00') $enddate = $assets['amc_enddate'];
					else if($assets['waranty_enddate']!="" && $assets['waranty_enddate']!='0000-00-00') $enddate = $assets['waranty_enddate'];
					else $enddate = "";
				 ?>
            	<tr>
                     <?php $i = $i + 1; ?>
                    <td><?php if(isset($assets['assetname'])) echo $assets['assetname']; ?></td>
                	<td><?php if(isset($assets['vendorname'])) echo $assets['vendorname']; ?></td>
                    <td><?php if(isset($assets['catgname'])) echo $assets['catgname']; ?></td>
                    <td><?php if(isset($assets['amc_type'])) echo $assets['amc_type']; ?></td>
                    <td><?php if(isset($assets['code'])) echo $assets['code']; ?></td>
                    <td><?php if(isset($assets['name'])) echo $assets['name']; ?></td>
                    <td style="width:80px;text-align:center;"><?php if($startdate!="") echo date("d-m-Y", strtotime($startdate)); else echo ""; ?></td>
                    <td style="width:80px;text-align:center;"><?php if($startdate!="") echo date("d-m-Y", strtotime($enddate)); else echo "";?></td>
                    <td style="width:80px;text-align:center;"><?php if($enddate!="") { if(date("Y-m-d") > $enddate) echo "Expired"; else echo "Active"; } else echo "";?></td>
                   
                </tr>
                @endforeach
				<?php //echo exit; ?>
            </tbody>
        </table>       
    </div>	
    @endif  
    <p class="footer">Aparna Property Management Services Pvt. Ltd.,</p>	 
</div>
					    
					
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

