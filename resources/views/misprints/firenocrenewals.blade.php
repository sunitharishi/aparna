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
	padding:5px;
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
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
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.manjeera table tr td.text-left
	{
	text-align:left;
	}
	table
	{
	 margin-bottom:10px;
	}
	/*@media print {

    html, body {
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
    }

}*/
	
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
					  @if (count($sites) > 0)

                        @foreach ($sites as $kk => $site)   
						
						<?php if(count($nocres[$kk]) > 0 ) {
						  // echo "<pre>"; print_r($nocres[$kk]); echo "</pre>";
						 ?>    
                       <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="4" style="font-size:15px;"> <?php echo $site; ?> Fire NOC Details</th>
                          </tr>
						   
                      <tr>
                        <th style="width:50px;">S.No </th>
                        <th style="width:200px;">Block </th>
                        <th style="width:200px;">Valid up to</th>
                        <th>Name Changed to Society  </th>
                         </tr>
                        
						<?php $i =1; foreach($nocres[$kk] as $nocdata) {?>
                        <tr>
                        
						<td><span><?php echo $i; ?></span></td>
						<td><span><?php echo  $nocdata['blockname'];?></span></td>
						<td><span><?php echo $nocdata['valid_upto'];?></span></td>
						<td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                      
					    </tr>     
						<?php $i = $i + 1; } ?>
							    
						
                          
                        </tbody>
                      </table>
					   <?php } ?>
					    @endforeach

                    @endif
                      
                      
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
/*$( document ).ready(function() {
    window.print(); 
	close();
	
	window.location.href = "/misreports"; 
});*/

</script>