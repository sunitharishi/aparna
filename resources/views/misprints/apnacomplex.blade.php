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
 
    <link href="/build/css/custom.css" rel="stylesheet">
    
    <style>
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
	.manjeera table tr th 
	{
	padding:5px 5px;
	text-align:center;
	color:black;
	font-size:11px;
	vertical-align:top;
	line-height:20px;
	}
	.manjeera table tr td 
	{
	padding:3.8px 5px;
	text-align:center;
	color:black;
	font-size:11px;
	line-height:20px;
	}
	table
	{
	color:black;
	}
	.manjeera
	{
	font-size:11px;
	}

	.manjeera h3
	{
	text-align:center;
	}
	table tr td.sarlef
	{
	text-align:left;
	}

	.saaahooo
	{
	 font-size:18px;
	 margin:0px;
	}
	/*@media print {

    html, body {
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
    }

}*/
 	</style>
  </head>                   
<div class="manjeera">
    <h3 class="saaahooo">Apna Complex Complaint Report</h3>
    <?php //  echo "<pre>"; print_r($indentrep); echo "</pre>"; 
    
    $rowcount = 0;
    $xcc = 0;
    ?>
    
    @if (count($apnarep) > 0)
    
    @foreach ($recordcount as $k => $indrec)
    
    <?php $indrec = $apnarep[$k]; ?>
    @if (count($indrec) > 0)
   <?php /*?> <div <?php if($rowcount >= 30) { if($rowcount % 30 == 0 || $rowcount % 30 >= 22) { ?> style="page-break-after:always;" <?php  $rowcount  = $rowcount % 30;} } ?>><?php */?>
    <?php $rowcount = $rowcount + count($indrec);
    ?>
    <table width="100%" border="1" cellspacing="0" style="margin-bottom:10px;">
        <thead>
            <tr>
            	<th colspan="8" style="font-size:14px;text-align:center;padding:6px 0px;"><?php echo $sites[$k]; ?></th>
            </tr>
            <tr>            
            <th style="text-align:left;">Complaint Category</th>
                <th >Previous Pending</th>
                <th >Opened</th>
                <th >Resolved</th>
                <th >Total Outstanding </th>
                <th > No Escalation </th>
                <th > Escalated to L2</th> 
                <th > Escalated to L3</th>             
            </tr>
        </thead>
        <tbody>
        
        @if (count($indrec) > 0)
        
        @foreach ($indrec as $record)
        <?php if($record['complaint_category'] == "" && $record['previous_pending'] == "" && $record['opened'] == "" && $record['resolved'] == "" && $record['total_outstanding'] == "" && $record['no_escalation'] == "" && $record['escalated_to_l2'] == "" && $record['escalated_to_l3'] == "" ) {} else { 
			$nesc =  (float) $record['no_escalation'];
			if($nesc > 0)
			{
				 $nesc = $nesc * 100; 
				 $nesc = round($nesc,2).'%';
			}
			else
			{
				$nesc = round($nesc,2);
			}
			$escalated =  (float) $record['escalated_to_l2'];
			if($escalated > 0)
			{
				 $escalated = $escalated * 100; 
				 $escalated = round($escalated,2).'%';
			}
			else
			{
				$escalated = round($escalated,2);
			}
			$escalated2 =  (float) $record['escalated_to_l3'];
			if($escalated2 > 0)
			{
				 $escalated2 = $escalated2 * 100; 
				 $escalated2 = round($escalated2,2).'%';
			}
			else
			{
				$escalated2 = round($escalated2,2);
			}
		?>
        
        <tr>
            <td style="text-align:left;"><span><b><?php echo  $record['complaint_category'];?></b></span></td>
            <td><span><?php echo  $record['previous_pending'];?></span></td>
            <td><span><?php echo  $record['opened'];?></span></td>
            <td><span><?php echo  $record['resolved'];?></span></td>
            <td><span><?php echo  $record['total_outstanding'];?></span></td>
            <td><span><?php //if((float)$record['no_escalation'] > 0) { echo $record['no_escalation']*100; echo " %";} else{ echo round($record['no_escalation'],2);}  
			echo $nesc; ?> </span></td>
            <td><span><?php //if((float)$record['escalated_to_l2'] > 0) { echo  round(($record['escalated_to_l2'] * 100),2); echo " %";} else{ echo  round($record['escalated_to_l2'],2);} 
			echo $escalated; ?> </span></td>
            <td><span><?php //if((float)$record['escalated_to_l3'] > 0) { echo  round(($record['escalated_to_l3'] * 100),2); echo " %";} else{ echo  round($record['escalated_to_l3'],2);} 
			echo $escalated2;?> </span></td>
        
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
   


 </html>

 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports"; 
});

</script>