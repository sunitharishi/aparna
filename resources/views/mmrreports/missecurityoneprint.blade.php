<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daily Security Data</title>

  
    <style>
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
 	.lady-guard
	{
	
	 font-size:12.5px;
	 text-align:center;
	 
	border-collapse:collapse;
	}
	.lady-guard tbody tr:nth-of-type(1) th
	{
	 padding:15.5px 3px;
	 font-size:13px;
	
	 vertical-align:middle;
	}
	.morefive tr:nth-of-type(1) th
	{
	  padding:11px 3px !important;
	  font-size:12.5px !important;
	}
	.morefive tr td
	{
	  padding:11px 3px !important;
	  font-size:12.5px !important;
	}
	
	.lessfive tr:nth-of-type(1) th
	{
	  padding:12px 3px !important;
	  font-size:12.5px !important;
	}
	.lessfive tr td
	{
	  padding:12px 3px !important;
	  font-size:12.5px !important;
	}
	.lady-guard tbody tr th:nth-child(1)
	{
	 padding-left:5px;
	}
	.lady-guard tbody tr td
	{
	 padding:15.5px 3px;
	 font-size:13px;
	 
	}
	.head-guard
	{
	 text-align:center;
	 
	 border-collapse:collapse;
	 
	}
	.head-guard tbody tr th:nth-child(1)
	{
	 padding-left:5px;
	}
	.head-guard tbody tr:nth-of-type(1) th
	{
	 padding:15.5px 3px;
	 font-size:13px;
	
	 vertical-align:middle;
	}
	.head-guard tbody tr td
	{
	 padding:15.5px 3px;
	 font-size:13px;
	 font-weight:500;
	}

	.secuhr hr
	{
	border-color:gray;
    margin-bottom:0px;
    margin-top:0px;
	width:85px;
	text-align:left;
	
	}
	
	.manjeera table tr th.text-left
	{
	 text-align:center;
	}
	.manjeera table tr td.text-left
	{
	 text-align:center;
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
     <style type="text/css" media="screen,print">
    .previewprrrr{
      display: block;
      clear: both;
      page-break-after: always;
  }
  </style>
  </head>

  <body>
   
<div class="manjeera">
<?php if(isset($existsectwo['sites'])) { ?>
    <div style="margin-bottom:10px; page-break-after: always;" class="previewprrrr">
    
        <table width="100%" border="1" cellspacing="0" class="lady-guard break <?php if(count($existsectwo['sites']) >= 5) { echo 'morefive'; }?><?php if(count($existsectwo['sites']) < 5) { echo 'lessfive'; }?>">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($existsectwo['sites']) + 2; ?>" style="font-size:14px;padding:6px 0px;"><b>Daily Security Data</b></th>
                </tr>
                
                <tr>
                    <th colspan="2"><b>Category</b></th>
                    <?php foreach($existsectwo['sites'] as $skey => $siterec) { ?>
                    <td><b> <?php  echo $siterec; ?> </b></td>
                    <?php }?>
                
                </tr>
                
                
                
                <tr>
                    <td rowspan="8" class="text-left"><b>Manpower</b></td>
                    <td class="text-left"><b>Guards</b></td>
                    <?php foreach($existsectwo['guards'] as $skey => $siterec) { ?>
                    <td> <?php echo $siterec; ?> </td>
                    <?php }?>
                    
                </tr>
                
                <tr>
                    <td class="text-left"><b>Lady Guards</b></td>
                    <?php foreach($existsectwo['l_guards'] as $skey => $siterec) { ?>
                    <td><?php echo $siterec; ?> </td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Head guard</b></td>
                    <?php foreach($existsectwo['h_guards'] as $skey => $siterec) { ?>
                    <td> <?php echo $siterec; ?> </td>
                    <?php }?>
                
                </tr>
                
                
                
                <tr>
                    <td class="text-left"><b>Supervisors</b></td>
                    <?php foreach($existsectwo['supervisors'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                
                </tr>
                
                
                
                <tr>
                    <td class="text-left"><b>ASO</b></td>
                    <?php foreach($existsectwo['aso'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                
                </tr>
                
                <tr>
                    <td class="text-left"><b>SO</b></td>
                    <?php foreach($existsectwo['so_num'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Nallagandla - Hub Reserves</b></td>
                    <?php foreach($existsectwo['nalla_gandla_hub'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                
					<?php $tvaltw = 0; foreach($existsectwo['ctotval'] as $skey => $siterec) { $tvaltw = $tvaltw + (int)$siterec; } ?>
                    <td class="text-left"><b>Total-<?php echo $tvaltw; ?></b></td>
                    <?php foreach($existsectwo['ctotval'] as $skey => $siterec) { ?>
                    <td><b> <?php echo $siterec; ?> </b></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Walkie Talkies</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsectwo['wlkt'] as $skey => $siterec) { ?>
                    <td ><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Biometric</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsectwo['biometric'] as $skey => $siterec) { ?>
                    <td ><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Bi-cycle</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsectwo['bicycle'] as $skey => $siterec) { ?>
                    <td ><span> <?php echo $existsectwo['bicycle_num'][$skey]."/".$siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Computers</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsectwo['computer'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $existsectwo['computers_num'][$skey]."/".$siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Internet Connection</b></td>
                    <td class="secuhr text-left"><b>Available / Not</b> </td>
                    <?php foreach($existsectwo['internetcon'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Street Lights</b></td>
                    <td class="secuhr text-left"><b>Status</b></td>
                    <?php foreach($existsectwo['stlights'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Torch Lights</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsectwo['torch'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Batons</b></td>
                    <td class="secuhr text-left"><b>Total</b></td>
                    <?php foreach($existsectwo['batons'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
            
            </tbody>
        </table>
		<?php if(isset($pagenumberval_one)) { if($pagenumberval_one > 0) {echo "page -".$pagenumberval_one; } } ?>
        </div>
    <?php } ?> 

<?php if(isset($existsec['sites'])) { ?>
    <div >
        <table width="100%" border="1" cellspacing="0" style="margin-bottom:10px;" class="head-guard <?php if(count($existsec['sites']) >= 5) { echo 'morefive'; }?><?php if(count($existsec['sites']) < 5) { echo 'lessfive'; }?>">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($existsec['sites']) + 2; ?>" style="font-size:14px;padding:6px 0px;"><b>Daily Security Data</b></th>
                </tr>
                
                <tr>
                    <th colspan="2"><b>Category</b></th>
                    <?php foreach($existsec['sites'] as $skey => $siterec) { ?>
                    <td><b> <?php  echo $siterec; ?> </b></td>
                    <?php }?>
                
                </tr>
                
                
                
                <tr>
                    <td rowspan="8" class="text-left"><b>Manpower</b></td>
                    <td class="text-left"><b>Guards</b></td>
                    <?php foreach($existsec['guards'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                
                </tr>
                
                <tr>
                    <td class="text-left"><b>Lady Guards</b></td>
                    <?php foreach($existsec['l_guards'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Head guard</b></td>
                    <?php foreach($existsec['h_guards'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                
                </tr>
                
                
                
                <tr>
                    <td class="text-left"><b>Supervisors</b></td>
                    <?php foreach($existsec['supervisors'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                
                </tr>
                
                
                
                <tr>
                    <td class="text-left"><b>ASO</b></td>
                    <?php foreach($existsec['aso'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                
                </tr>
                
                <tr>
                    <td class="text-left"><b>SO</b></td>
                    <?php foreach($existsec['so_num'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>HillPark - Hub Reserves</b></td>
                    <?php foreach($existsec['hillpark_hub'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
					<?php $tval = 0; foreach($existsec['ctotval'] as $skey => $siterec) { $tval = $tval + (int)$siterec; } ?>
                    <td class="text-left text-left"><b>Total-<?php echo $tval; ?></b></td>
                    <?php foreach($existsec['ctotval'] as $skey => $siterec) { ?>
                    <td><b><span> <?php echo $siterec; ?> </span></b></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Walkie<br> Talkies</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsec['wlkt'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Biometric</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsec['biometric'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                
                <tr>
                    <td class="text-left"><b>Bi-cycle</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsec['bicycle'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $existsec['bicycle_num'][$skey]."/".$siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Computers</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsec['computer'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $existsec['computers_num'][$skey]."/".$siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Internet <br>Connection</b></td>
                    <td class="secuhr text-left"><b>Available /Not</b> </td>
                    <?php foreach($existsec['internetcon'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Street Lights</b></td>
                    <td class="secuhr text-left"><b>Status</b></td>
                    <?php foreach($existsec['stlights'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Torch Lights</b></td>
                    <td class="secuhr text-left"><b>Not working / Total</b></td>
                    <?php foreach($existsec['torch'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
                <tr>
                    <td class="text-left"><b>Batons</b></td>
                    <td class="secuhr text-left"><b>Total</b></td>
                    <?php foreach($existsec['batons'] as $skey => $siterec) { ?>
                    <td><span> <?php echo $siterec; ?> </span></td>
                    <?php }?>
                </tr>
                
            </tbody>
        </table>
    <?php if(isset($pagenumberval_rwo)) { if($pagenumberval_rwo > 0) {echo "page -".$pagenumberval_rwo; } } ?>
    </div>  <?php } if(!isset($existsectwo['sites']) && !isset($existsec['sites'])) { ?>

<?php echo " NO Data Available"; ?>
<?php }?> 

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