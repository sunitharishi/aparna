<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WSP Equipment Status</title>

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

.attend-table thead tr th
{
 padding:8px;
 font-size:14.5px;
}
.attend-table tbody tr td
{
 padding:8px;
 font-size:14.5px;
}
.attend-table tbody tr td img
{
 margin-left:2px;
}
.table-fixed tr:after {
content: "";
display: block;
visibility: hidden;
clear: both;
}
.table-fixed tbody td,
.table-fixed thead > tr > th {
float: center;
}
.report-headings
{
 margin-top:4px;
 margin-bottom:4px;
 font-size:20px;
}

</style>
 
<div class="dailyreports1 getdailyreport notprint" > 

    <!--<h3 class="page-title"><span>Individual Reports</span></h3> -->
  </div> 
	<div class="notprint">   
	
    <div class="row">       
                <div class="col-xs-12 form-group">  
					<div class="advancedddailyrerport"> 
						
					 	<div id="validresponse">
						<?php echo date("d-m-Y"); ?><br/>
							<h4 class="report-headings">DAR Status Report  <?php echo date('F', mktime(0, 0, 0, $month, 10));?>,<?php echo $year; ?>  <span><?php echo $category; ?></span></h4>
							<table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-striped table-fixed attend-table advdaily-rport" style="vertical-align:top;">
                       <thead class="fixedtr">
                       <tr>
                         <th>Date</th> <?php for($i=1; $i <=$daycount; $i++){
						       echo '<th>'.$i.'</th>';
						 } ?>   
                      </tr>
                      </thead>
                      <tbody class="fixedbodytr">
						@if (count($sites_attr_names) > 0)
							@foreach ($sites_attr_names as $kk => $client)
							<tr>
								<td>{{ $client }}</td> <?php foreach($res_Status[$kk] as $kb => $temp){ ?>
								  <td>
                                  <?php /*?><img src="images/right.png" style="width:12px;height:12px;" ><i class="fa <?php if($temp == 'yes') { echo 'fa-check';} else { echo 'fa-times'; } ?>" aria-hidden="true"></i><?php */?>
                                  
                                   <?php if($temp == 'yes') { if($blockstatus[$kk][$kb] ==  1) { ?> <img src="images/warning-sign.png" style="width:12px;height:12px;" ><?php } else { ?> <img src="images/right.png" style="width:12px;height:12px;" ><?php } } else { ?> <img src="images/wrong.png" style="width:10px;height:10px;" >	<?php } ?>
                                   
                                  </td>
								<?php } ?>
							</tr>
							@endforeach
						@endif
                 </tbody>
              </table>
             
						
						</div>
							
							
					 		
            </div> 
		
		
                            
           
			</div> 
		</div>     
	</div> 
		
  
      
		
 </body>
</html>		
  