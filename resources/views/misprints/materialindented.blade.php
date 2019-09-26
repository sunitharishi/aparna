<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Material Indented Status</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
  
    <!-- Font Awesome -->
   
    
    <style>
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
	.manjeera table
	{
	 width:100%;
	}
	.manjeera table tr th 
	{
	padding:2px 2px;
	text-align:center;
	font-size:11px;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:2px 2px;
	text-align:center;
	font-size:11px;
	line-height:18px;
	}
  
	table
	{
	color:black;
	margin-bottom:10px;
	}
	.manjeera
	{
	font-size:11px;
	}
	.saaahooo
	{
	 height:auto;
	 font-weight:bold;
	 font-size:23px;
	 text-align:center;
	 color:#000;
	 margin-top:0px;
	 margin-bottom:0px;
	}
	table tr td p, table tr th p
	{
	 white-space:nowrap;
	 word-break:break-word;
	 margin:0px;
	}
	.manjeera table tr td.text-left
	{
	 text-align:left;
	}
	</style>
     <style type="text/css" media="screen,print">
    .previewprrrr{
      display: inline-block;
      clear: both;
      page-break-after: always;
	  width:100%;
  }
  </style>
  </head>

  <body>
    

<div class="docs-main manjeera">

    <h3 class="saaahooo">Indented Material Status</h3>
    <?php //  echo "<pre>"; print_r($indentrep); echo "</pre>"; 
    
    $rowcount = 0;
    $xcc = 0;
    ?>
    
    <!--<h2>Material Indented Status </h2>-->
    @if (count($indentrep) > 0)
    
    @foreach ($recordcount as $k => $indrec) 
    <?php $indrec = $indentrep[$k]; ?>
    @if (count($indrec) > 0) 
   <?php /*?> <div <?php if($rowcount >= 20) { if($rowcount % 20 == 0 || $rowcount % 20 >= 15) { $xcc = $xcc + 1;?> style="page-break-after:always;" <?php  $rowcount  = $rowcount % 20;} } ?>><?php */?>
    <?php $rowcount = $rowcount + count($indrec); //echo $rowcount?><br>
    <table width="100%" border="1" cellspacing="0"  style="margin-bottom:10px;">
        <thead>
            <tr>
            	<th colspan="13" style="font-size:14px;text-align:left;padding:6px;"> Project Name: <?php echo $sites[$k]; ?> &nbsp;&nbsp;&nbsp; <span><?php /*?><?php 
            $monthName = date("F", mktime(0, 0, 0, $report_month, 10));
            echo $monthName;?> - <?php echo $report_year;?><?php */?> </span> </th>
            </tr>
            <tr> 
                <th>PR Nos</th>
                <th>PR Date </th>
                <th>Item Code</th>
                <th>Item  Desc</th>
                <th>UOM</th>
                <th> PR Qty </th>
                <th> PO No </th>
                <th>PO Date</th>
                <th> PO Qty </th>
                <th> Lead Time of days </th>
                <th> Date of Submission </th>
                <th> Date Form Submission </th>
                <th> Lagged Time Up to <br><p><?php if(isset($laggeddate[$k])) echo $laggeddate[$k]; ?></p></th>
            </tr>
        </thead>
    
        <tbody>
        @if (count($indrec) > 0)
        
        @foreach ($indrec as $record)
        <?php if($record['pr_nos'] == "" && $record['pr_date'] == "" && $record['item_code'] == "" && $record['item_desc'] == "" && $record['uom'] == "" && $record['pr_qty'] == "" && $record['po_no'] == "" && $record['po_date'] == "" && $record['po_qty'] == "" && $record['lead_time_of_days'] == "" && $record['date_of_submission'] == "" && $record['days_from_submission'] == "" && $record['lagged_time_upto'] == "") {} else { ?>
        <tr>
            <td class="text-left"><span><?php echo  $record['pr_nos'];?></span></td>
            <td><p><span><?php   $x = date("d-m-Y",strtotime($record['pr_date'])); if($x == '01-01-1970') {} else { echo $x; 
            }?> </span></p></td>
            <td><span><?php echo  $record['item_code'];?></span></td>
            <td class="text-left"><span><?php echo  $record['item_desc'];?></span></td>
            <td><span><?php echo  $record['uom'];?></span></td>
            <td><span><?php echo  $record['pr_qty'];?></span></td>
            <td class="text-left"><span><?php echo  $record['po_no'];?></span></td>
            <td><p><span><?php   $x = date("d-m-Y",strtotime($record['po_date'])); if($x == '01-01-1970') {} else { echo $x;
            }?> </span></p></td>
            <td><span><?php echo  $record['po_qty'];?></span></td>
            <td><span><?php echo  $record['lead_time_of_days'];?></span></td>
            <td><p><span><?php echo  $record['date_of_submission'];?></span></p></td>
            <td><span><?php echo  $record['days_from_submission'];?></span></td>
            <td><span><?php echo  $record['lagged_time_upto'];?></span></td>
            </tr>
            <?php } ?>
            @endforeach   
            
            @else
        
        <tr>
        
        <td colspan="12">No entries in table</td>
        
        </tr>
        
        @endif
        
        </tbody>
    </table>
<?php /*?></div><?php */?>

@endif
@endforeach   
@else
<div>No entries in table </div>
@endif
</div> 
  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports"; 
});

</script>