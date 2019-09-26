<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Borewell not working</title>

    <!-- Bootstrap -->
  
    
    <style> 
	body
	{
	  font-family:Arial, Helvetica, sans-serif;
	} 
	.manjeera table tr th 
	{
	padding:7px 5px;
	text-align:center;
	font-size:11px;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:7px 5px;
	text-align:center;
	font-size:11px;
	}
	.lastrowcolo
	{
	 height:20px;
	}
	.boreten tbody tr td.lastrowcolo
	{
	 height:35px !important;
	}
	
	table tr td.sarlef
	{
	text-align:left;
	}
	table tr td 
	{
	color:black;
	}
	table tr th
	{
	color:black;
	}
	@media print {

    html, body {
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
    }

}
	</style>
  </head>

<body>                    
    <div class="manjeera">
        <table width="100%" border="1" cellspacing="0" <?php if(count($sites) == 10) { echo 'class="boreten"';} ?><?php if(count($sites) > 10) { echo 'class="boremoreten"';} ?>>
            <tbody>
                <tr>
                	<th colspan="15" style="font-size:14px;padding:6px 0px;">Borewells not working status as on <?php echo $report_on; ?></th>
                </tr>
                <tr>
                    <th rowspan="2">S.No</th>
                    <th rowspan="2">Community </th>
                    <!-- <th rowspan="3">Total<br> Units </th>  
                    <th rowspan="3">Occupancy<br> (Avg) </th>-->
                    <th colspan="2" >Borewells</th>
                    <th  colspan="11">Reasons for Failure</th>
                </tr>
                
                <tr>
                    <th >Total</th>
                    <th>No. of<br> Bores: Not<br> working </th>
                    <th  >No <br>Ground<br> Water </th>
                    <th >Over<br>Load</th>
                    <th >Motor<br> burnt</th>
                    <th >Cable <br>Problem</th>
                    <th >Pump / Motor <br>wear & tear</th>
                    <th >Others</th>
                    <th >Dry Run <br>Protection</th>
                    <th >Flow Meter </th>  
                    <th colspan="3" > Remarks</th>
                
                </tr>
            
                @if (count($sites) > 0) <?php $i = 1;?>
                @foreach ($sites as $key => $site)
                
                <tr>
                    <td><b><?php echo $i++; ?></b></td>
                    <td style="text-align:left;"><b><?php  echo $site;   ?></b></td>
                    <td> <?php  if(isset($borewellsnum[$key])) {  echo  $borewellsnum[$key]; } ?></td> 
                    <td><span><?php if(isset($existing[$key]['nw_bores_num'])) { echo $existing[$key]['nw_bores_num']; } ?></span> </td>
                    <td><span><?php if(isset($existing[$key]['no_ground_water'])) { echo $existing[$key]['no_ground_water']; } ?></span> </td>
                    <td><span><?php if(isset($existing[$key]['over_load'])) { echo $existing[$key]['over_load']; } ?></span></td>
                    <td><span><?php if(isset($existing[$key]['motor_brunt'])) { echo $existing[$key]['motor_brunt']; } ?></span></td>
                    <td><span><?php if(isset($existing[$key]['cable_prblm'])) { echo $existing[$key]['cable_prblm']; } ?></span></td>
                    <td><span><?php if(isset($existing[$key]['pumpormotorwear'])) { echo $existing[$key]['pumpormotorwear']; } ?></span> </td>
                    <td><span><?php if(isset($existing[$key]['others'])) { echo $existing[$key]['others']; } ?></span></td>
                    <td><span><?php if(isset($existing[$key]['dry_run_protectn'])) { echo $existing[$key]['dry_run_protectn']; } ?></span></td>
                    <td><span><?php if(isset($existing[$key]['flow_meter'])) { echo $existing[$key]['flow_meter']; } ?></span></td>
                    <td colspan="3" class="lastrowcolo"><span><?php if(isset($existing[$key]['remarks'])) { echo $existing[$key]['remarks']; } ?></span></td>
                </tr>
                
                @endforeach
                
                @endif
            
            </tbody>
        </table>
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