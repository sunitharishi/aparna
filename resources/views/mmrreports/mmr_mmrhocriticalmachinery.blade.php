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
 padding:8px;
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
 margin-top:4px;
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
</style>


<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
     <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
    	 <div class="incident-summary">Horticulture Critical Machinery </div>
        <table width="100%" border="1">
        	<thead>
            	<tr>
                	<th>S.no</th>
                    <th>Name of Equipment</th>
                    <th>Qty</th>
                    <th>Purpose of Use</th>
                    <th>Availability of Equipment</th>
                </tr>
            </thead>
            <tbody>
               <?php $i = 0; ?> 
            @if(count($resval) > 0)
             @foreach($resval as $k => $val)
             
            	<tr>
                     <?php $i = $i + 1; ?>
                    <td><?php echo $i; ?></td>
                	<td><?php if(isset($val->eqp_name)) echo $val->eqp_name; ?></td>
                    <td><?php if(isset($val->qty)) echo $val->qty; ?></td>
                     <td><?php if(isset($val->purpose_of_use)) echo $val->purpose_of_use; ?></td>
                    <td><?php if(isset($val->availability)) echo $val->availability; ?></td>
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

