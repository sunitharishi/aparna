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
    margin-bottom:0px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
text-transform:uppercase;
margin-bottom:0px;
}

.incident-summary
{
 font-size:17px;
 clear:both;
font-weight:600;
padding-top:20px;
margin-bottom:10px;
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
 bottom:-30px;
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
img.img-thumbnail
{
   
    border-radius:3px;
    padding:4px;
    border:1px solid #000;
    margin-bottom:0px;
    margin-right:6px;
   overflow:hidden;
    width:150px;
    height:150px;
}
table
{
    border-collapse:collapse;
}
table tr td
{
    padding:1px;
    font-size: 12px;
}
/*table tr:nth-of-type(odd)
{
    background-color:#ece8e8;
}*/
table tbody tr td div.list
{
    clear:both;
    padding:2px 0px;
}

table tbody tr td div.list.house-img b
{
    font-size:11px;
}
table tbody tr td div.work-completion
{
  padding:0px;
  margin:0px;
}
table tr td div.clear-both
{
    clear:both;
    vertical-align:bottom;
}
table tr td.cate-loc b
{
    font-size: 12px;
}
table tr td.cate-loc 
{
    font-size: 11px;
}
table tr td div.list
{
    width:auto;
    float:left;
    margin-right:10px;
}
.work-completion
{
    padding-top:2px;
    overflow:hidden;
}
</style>

<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
     <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
        <table width="100%" border="0">
            <tbody>
                 <?php $i = 0; ?> 
                @if(count($lresval) > 0)                
                <div class="incident-summary">Planned Preventive Maintenance for last Month</div>
                <div class="incident-summary">Inhouse PPM</div>
                 @foreach($lresval as $k => $val)
                <tr style="padding-bottom:0px;">
                     <?php $i = $i + 1; ?>

                      <td class="cate-loc" style="vertical-align: top; line-height:25px;">
                           <?php if(isset($val->category)) { ?> <b>Category:</b><?php echo $val->category; ?> <br> <?php } ?>
                       
						   <?php if(isset($val->asset_name)) { ?> <b>Asset Name:</b><?php echo $val->asset_name; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->location)) { ?> <b>Location:</b><?php echo $val->location; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->description)) { ?> <b>Description:</b><?php echo $val->description; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->status)) { ?> <b>Status:</b><?php echo $val->status; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->report_on)) { ?> <b>Date:</b><?php echo date("d-m-Y",strtotime($val->report_on)); ?> <br> <?php } ?>
                      </td>

                     <?php if(isset($val->beforeimage)) { if($val->beforeimage) { ?>
                     <td style="width:165px;text-align:center;padding-bottom:4px;">
                        <div class="list house-img">
                           
                          <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->beforeimage;?>" style="display: block;"  class="img-thumbnail">
                           </div>
                          <div class="work-completion"> <b style="padding:0px;margin:0px;font-size:11px;">Before work completion</b></div>
                        
                    </td>
                    <?php }} ?>
					<?php if(isset($val->afterimage)) { if($val->afterimage) { ?>
                    <td style="width:165px;text-align:center;">
                         <div class="list house-img" style="padding-bottom:4px;">
                           
                           <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->afterimage;?>" style="display: block;"  class="img-thumbnail">
                           </div>
                          <div class="work-completion"><b style="padding:0px;margin:0px;font-size:11px;">After work completion</b></div>
                      
                    </td>
                  	<?php }} ?>
                     
                  </tr>
            
                <tr>
                    <td colspan="3" style="padding:0px;"><hr ></td>
                </tr> 
                @endforeach
            @endif   
            </tbody>
        </table>    
        
        <table width="100%" border="0">
            <tbody>
                 <?php $i = 0; ?> 
                @if(count($resval) > 0)                
                <div class="incident-summary">Planned Preventive Maintenance</div>
                <div class="incident-summary">Inhouse PPM</div>
                 @foreach($resval as $k => $val)
                <tr style="padding-bottom:0px;">
                     <?php $i = $i + 1; ?>

                      <td class="cate-loc" style="vertical-align: top; line-height:25px;">
                           <?php if(isset($val->category)) { ?> <b>Category:</b><?php echo $val->category; ?> <br> <?php } ?>
                       
						   <?php if(isset($val->asset_name)) { ?> <b>Asset Name:</b><?php echo $val->asset_name; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->location)) { ?> <b>Location:</b><?php echo $val->location; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->description)) { ?> <b>Description:</b><?php echo $val->description; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->status)) { ?> <b>Status:</b><?php echo $val->status; ?> <br> <?php } ?>
                           
                           <?php if(isset($val->report_on)) { ?> <b>Date:</b><?php echo date("d-m-Y",strtotime($val->report_on)); ?> <br> <?php } ?>
                      </td>

                     <?php if(isset($val->beforeimage)) { if($val->beforeimage) { ?>
                     <td style="width:165px;text-align:center;padding-bottom:4px;">
                        <div class="list house-img">
                           
                          <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->beforeimage;?>" style="display: block;"  class="img-thumbnail">
                           </div>
                          <div class="work-completion"> <b style="padding:0px;margin:0px;font-size:11px;">Before work completion</b></div>
                        
                    </td>
                    <?php }} ?>
					<?php if(isset($val->afterimage)) { if($val->afterimage) { ?>
                    <td style="width:165px;text-align:center;">
                         <div class="list house-img" style="padding-bottom:4px;">
                           
                           <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->afterimage;?>" style="display: block;"  class="img-thumbnail">
                           </div>
                          <div class="work-completion"><b style="padding:0px;margin:0px;font-size:11px;">After work completion</b></div>
                      
                    </td>
                  	<?php }} ?>
                     
                  </tr>
            
                <tr>
                    <td colspan="3" style="padding:0px;"><hr ></td>
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
