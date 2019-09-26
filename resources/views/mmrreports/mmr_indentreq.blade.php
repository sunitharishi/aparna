     

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
	margin-top:-8px;
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
 font-size:18px;
 text-decoration:underline;
 vertical-align:top;
}
.aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:0px;
 top:-20px;
 padding:4px;
 width:120px;
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
 bottom:-30px;
 right:0px;
}

</style>


<div class="mmrreport-eading">
    <h2>MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
     <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
    	<h4>4. Requistion</h4>
        <table width="100%" border="0">
        
            <tbody>
               <?php $i = 0; ?> 
            @if(count($resval) > 0)
             @foreach($resval as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                  
                	<td style="vertical-align:top;"><b>Description:</b><?php if(isset($val->title)) echo $val->title; ?></td>
                    <td style="text-align:center;width:150px;"><?php if(isset($val->before_image)) { if($val->before_image) { ?><img src="<?php  echo url('/')."/".$val->before_image;?>" style="width:100px; height:100px";><?php }} ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:0px;"><hr></td>
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


