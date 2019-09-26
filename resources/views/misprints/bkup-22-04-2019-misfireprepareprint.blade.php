<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apna Complex Complaint Report</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   <!-- <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
     <!--<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    
 
  </head>

    <!-- <div class="container body">-->
      <!--<div class="main_container">-->
      

        <!-- page content -->
       <!-- <div class="right_col" role="main">-->

          <!--<div class="row">-->
            <!--<div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;">-->
              <!--<div class="x_panel tile fixed_height_400">-->
                <!--<div class="x_title">-->
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                <!--</div>-->
                <!--<div class="x_content">-->
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
<style>
.unbelievable
{
    vertical-align: middle;
    border-radius: 3px;
    margin: 10px 20px;
    width: 208px;
    box-shadow: 2px 1px 1px 2px lightgrey;
}
h2
{
 margin:0px;
 text-align:center;
}

</style>  
<h2>Fire Safety Preparedness &amp; Fire Alarm Operation Training</h2>
<?php $cn = 0; ?> 
@if (count($drill) > 0)
@foreach ($drill as $kk => $record)
  <?php if(count($record) > 0 && $kk!=12) { $cn = $cn + 1; }
  ?>
  
   @endforeach  
    @endif 
   
@if (count($drill) > 0 && $kk!=12)
<?php  $i = 1;  ?>
@foreach ($drill as $kk => $record)

  <?php if(count($record) > 0 && $kk!=12) { 
  
  foreach($record as $rec) { $conducted = $rec['date_of_conducted']; }
   ?>
       <div style="text-align:center;"><?php if($i < $cn) { ?> <div style="margin-bottom:10px;text-align:center; page-break-after: always;"> <?php } ?>
      <div> <h3 style="text-align:center;"> <?php echo $sites[$kk]; ?>  <?php echo $conducted; ?></h3></div>
      <div style="width:100%; margin:0px 10px 0px 50px;">
     <?php foreach($record as $rec) {
	 
  ?>   
  <div style="float: left; margin-right:10px; width:250px;">
    <img class="unbelievable" src="<?php echo "http://testing.rreg.in/".$rec['image_url'];  ?>" style="width:90%"; height="150px"><br/>
    <div><?php echo $rec['title']; ?></div>
 </div>
  
  <?php } if($i%3==0) echo "<br clear='all'/>"; $i = $i + 1; ?> </div> </div> <?php if(isset($initialcn)) echo "PAGE -".($initialcn + $i); ?></div> <?php } ?>
                        
                         @endforeach   

                    @else
                    
                     <div>No entries in table</div>

                    @endif
          
       <!-- </div>-->
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    <!--</div>-->


 </html>

 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports"; 
});  

</script>  