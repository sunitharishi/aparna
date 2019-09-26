<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Mis Reports</title>
<style>

   body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
 .startpage-heading
 {
 text-align:center;
 }
 .startpage-heading h1
 {
  font-size:55px;
 }
 .top-right
 {
  text-align:right;
  font-size:14px;
 }
</style>
    

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    <div class="top-right">
                       <span>MD/CVR/DSP/BVSR/CRR/KVK/GVK/RRK</span>
                    </div>
                    
                    <div class="startpage-heading">
                       <h1 style="margin-top:200px;">MIS REPORT</h1>
                        <h1>FOR</h1>
						<h1><?php echo $monthName = date("F", mktime(0, 0, 0, $month, 10)); ?></h1>
						<h1><?php echo $year; ?></h1>
						<br/><br/><br/><br/><br/><br/><br/>
						<h2 style="margin-top:50px;font-weight:300;"> Aparna Property Management Services Pvt. Ltd.</h2>
						<h4 align="center"><?php if(isset($dateval)) echo $dateval; ?></h4>
               <!-- <p style="padding-top:3px;margin-bottom:5px;">* Dry run protection and single phase preventer is essential to protect the broewell from over load/under load and dry run. </p>-->
                     
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