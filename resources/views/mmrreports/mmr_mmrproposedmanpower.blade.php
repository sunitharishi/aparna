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
 font-family: "Open Sans", sans-serif;
}
.mmrreport-eading h2
{
 font-size: 23px;
    font-weight: 600;
    color: #000;
    text-align: center;
}

table
{
 margin:10px 0px;
 border-collapse:collapse;
}
table thead tr th, table tbody tr td
{
 padding:8px;
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
 font-size:18px;
 clear:both;
}
.soft-services
{
 font-weight:600;
 font-size:18px;
 text-decoration:underline;
}
.aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:-20px;
 top:-20px;
 padding:4px;
 width:80px;
 height:60px;
}
.body-tage
{
 position:relative;
}
.footer
{
 font-weight:600;
 font-size:20px !important;
 text-align:right;
 position:absolute;
 bottom:-10px;
 right:0px;
}
</style>


<div class="mmrreport-eading">
    <h2>MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
    <img src="images/logo-new.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
    	<div class="soft-services">SUGGESTIONS</div>
            <table width="100%" border="1">
        	<thead>
            	<tr>
                	<th>S.no</th>
                    <th>Proposed Manpower (as per agreement)</th>
                    <th>Nos</th>
                    <th>Man power  Present days for the Month of {{ $monthname }}</th>
                    <th>In percentage %</th>
                </tr>
            </thead>
            <tbody>
           
            
            <?php $i = 0; ?>
             @if(isset($resar))
              @if(count($resar) > 0)
              	@foreach($resar as $key => $fr)
            	<tr>
                	<td><?php echo $i = $i + 1; ?></td>
                    <td>{{ $flabels[$key] }}</td>
                    <td><?php if(isset($validfrom[$key])) { echo $validfrom[$key]; } ?></td>
                    <td>{{ $fr }}</td>
                    <td>
                      <?php $daycn  = cal_days_in_month(CAL_GREGORIAN, $month, $year);
					   
					     if(isset($validfrom[$key])) { 
						   if(($daycn*$fr)>0){
						   	   echo round(((int)($validfrom[$key])/($daycn*(int)$fr)),2) * 100; 
						     }
						   } 
					  ?>
                    %</td>
                </tr>  
                @endforeach
               @endif
                @endif
            </tbody>
        </table>
      
    </div>
      <p class="footer">Aparna Property Management Servicers Pvt. Ltd.,</p>		 
</div>
					   
</html>					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

