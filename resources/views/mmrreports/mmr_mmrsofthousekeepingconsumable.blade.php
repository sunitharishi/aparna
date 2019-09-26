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
margin-bottom:0px;
}

table
{
 margin:10px 0px;
 border-collapse:collapse;
}
table thead tr th, table tbody tr td
{
 padding:2px 4px;
 font-size:12.6px;
}
table thead tr th p, table tbody tr td p
{
 white-space:nowrap;
 margin:0px;
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
font-weight:600;
 margin-top:20px;
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
 bottom:-40px;
 right:0px;
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
    <div class="scope-nature">
      <?php if($HKMCount == 0 && $HKCount == 0) { ?> <div class="soft-services">SOFT SERVICES</div> <?php } ?>
       <div class="incident-summary"><?php echo $sCount; ?>. Housekeeping Consumables</div>
        <table width="100%" border="1">
        	<thead>
            	<tr>
                	<th>S.no</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
               <?php $i = 0; ?> 
            @if(count($resvalconsume) > 0)
             @foreach($resvalconsume as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                    <td><?php echo $i; ?></td>
                	<td><?php if(isset($val->category)) echo $val->category; ?></td>
                	  <td><?php if(isset($val->location)) echo $val->location; ?></td>
                     <td><?php if(isset($val->description)) echo $val->description; ?></td>
                    <td><?php if(isset($val->qty)) echo $val->qty; ?></td>
                    <td><?php if(isset($val->remarks)) echo $val->remarks; ?></td>
                </tr>
                @endforeach
            @endif     
            </tbody>
            </tbody>
        </table>      
    </div>
     <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	 		 
</div>
					   
</html>					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

