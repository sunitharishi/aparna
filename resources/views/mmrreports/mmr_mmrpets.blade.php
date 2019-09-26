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
table tr td hr
{
    border-top:0.5px solid #000;
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
 margin-top:9px;
}
.incident-summary
{
 font-size:17px;
 clear:both;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
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
.incident-summary
{
 font-size:17px;
 clear:both;
font-weight:600;
 margin-top:4px;
}
img.img-thumbnail
{
    border:1px solid #000;
    padding:4px;
    border-radius:3px;
    margin-bottom:6px;
}
</style>


<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
     <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
    	<div class="incident-summary">Pest Control</div>
        <table width="100%" border="0">
        	
            <tbody>
               <?php $i = 0; ?> 
            @if(count($resval) > 0)
             @foreach($resval as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                    
                     <td class="cate-loc" style="vertical-align: top; line-height:25px;">
                      
                         <?php if(isset($val->type)) { ?> <b>Type:</b><?php echo $val->type; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->location)) { ?> <b>Location:</b><?php echo $val->location; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->description)) { ?> <b>Description:</b><?php echo $val->description; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->report_date)) { ?> <b>Date:</b><?php echo date("d-m-Y",strtotime($val->report_date)); ?> <br> <?php } ?>
                      </td>
                      
                	 <?php if(isset($val->before_image)) { if($val->before_image) { ?>
                	<td style="width:150px;">
                	   
                	    <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->before_image;?>" style="width:150px; height:150px"; class="img-thumbnail">
                	   
                	</td>
                	 <?php }} ?>
                </tr>
                <tr>
                     <?php  if($val->before_image) { ?>
                    <td colspan="2" style="padding:0px;"><hr></td>
                     <?php } else { ?>
                     <td colspan="2" style="padding:0px;"><hr></td>
                     <?php } ?>
                </tr>
                @endforeach
            @endif     
            </tbody>
        </table>
      
    </div>	
      <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	 		 	 
</div>
					   
</html>					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

