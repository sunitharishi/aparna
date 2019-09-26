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
*
{
    font-family:Arial, Helvetica, sans-serif;
}
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
.mmrreport-eading
{
    margin-bottom:20px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    margin-top:-6px;
    text-align: center;
	text-transform:uppercase;
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
.incident-summary
{
 font-size:18px;
font-weight:600;
}
.footer

{

 font-weight:100;

 font-size:16px !important;

 text-align:right;

 position:absolute;

 bottom:0px;

 right:0px;

}
img.img-thumbnail
{
    border:1px solid #000;
    padding:4px;
    border-radius:3px;
}
</style>  
<div class="mmrreport-eading">
  <h2>MMR REPORT FOR THE MONTH OF {{$monthname }}-{{ $report_year }}</h2>
    <img src="images/apms-logo.png" class="aparna-logo" >
</div>


	<?php if($MICount == 0 && $EQPCOunt == 0 && $AMCCount == 0 && $PPCount == 0 && $PConCount == 0 && $powFailureCount == 0 && $dggeneratedCount == 0 && $MWCount == 0  && $Wspinlet_Count == 0 && $Wspoutlet_Count == 0 && $Stpinlet_Count == 0 && $Stpoutlet_Count == 0 && $Initiative_Count == 0) { ?>
	 <div class="soft-services">TECHNICAL SERVICES</div>
	 <?php } ?>


<div class="incident-summary"><?php echo $tCount; ?><?php if($FiresafetymisreportCount>0 && $FiresafenotworkingissueCount>0 && $MMRNOC_Count>0) echo "(d)"; elseif(($FiresafetymisreportCount>0 && $FiresafenotworkingissueCount>0 && $MMRNOC_Count==0) || ($FiresafenotworkingissueCount==0 && $FiresafetymisreportCount>0 && $MMRNOC_Count>0) || ($MMRNOC_Count==0 && $FiresafetymisreportCount>0 && $FiresafenotworkingissueCount>0)) echo "(c)"; elseif(($FiresafetymisreportCount>0 && $FiresafenotworkingissueCount==0 && $MMRNOC_Count==0) || ($FiresafenotworkingissueCount==0 && $FiresafetymisreportCount==0 && $MMRNOC_Count>0) || ($MMRNOC_Count==0 && $FiresafetymisreportCount==0 && $FiresafenotworkingissueCount>0)) echo "(b)"; else echo "(a)"; ?>. Fire Evacuation &amp; Mock Drills</div>


<?php $cn = 0; ?> 
@if (count($drill) > 0)
@foreach ($drill as $kk => $record)
  <?php if(count($record) > 0) { $cn = $cn + 1; }
  ?>
  
   @endforeach  
    @endif 
   
@if (count($drill) > 0)
<?php  $i = 1;  ?>
@foreach ($drill as $kk => $record)

  <?php if(count($record) > 0) { ;  
  
  foreach($record as $rec) { $conducted = $rec['date_of_conducted']; }
   ?>
       <div style="text-align:center;"><?php if($i < $cn) { ?> <div style="margin-bottom:10px;text-align:center; page-break-after: always;"> <?php } ?>
      <div> <h3 style="text-align:center;"> <?php echo $sites[$kk]; ?> Mock Drill Conducted On <?php echo $conducted; ?></h3></div>
     <?php foreach($record as $rec) {
  ?>   
  <img class="unbelievable img-thumbnail" src="<?php echo "http://testing.rreg.in/".$rec['image_url'];  ?>" style="width:250px"; height="150px" >
  
  <?php } $i = $i + 1; ?> </div> <?php if(isset($initialcn)) echo "PAGE -".($initialcn + $i); ?></div> <?php } ?>
                        
                         @endforeach   

                    @else
                    
                     <div>No entries in table</div>

                    @endif
          
       <!-- </div>-->
        <!-- /page content -->

        <!-- footer content -->
       	<p class="footer">Aparna Property Management Servicers Pvt. Ltd.,</p>	
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