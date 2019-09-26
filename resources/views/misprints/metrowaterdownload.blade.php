<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manjeera Water</title>

    <style>
	*
	{
	font-family:Arial, Helvetica, sans-serif;
	}
	table 
	{
	color:#000000;
	margin-top:0px !important;
	padding-top:0px !important;
	}
	
	.leapyear  tr th 
	{
	padding:5px 2px !important;
 	}
	.leapyear  tr td 
	{
	padding:5px 2px !important;
 	}
	.advancedcls  tr th 
	{
	padding:5px 2px !important;
 	}
	.advancedcls  tr td 
	{
	padding:5px 2px !important;
 	}
	.manjeera table tr th 
	{
	padding:4px 2px;
	text-align:center;
	color:#000000;
	font-size:11px;
	font-weight:600;
	vertical-align:middle;
 	}
	.manjeera table tr td 
	{
	padding:4px 2px;
	text-align:center;
	color:#000000;
	font-size:11px;
	}
	.manjeera table tr th p, table tr th p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-top:0px;
	 margin-bottom:0px;
	}

	@media print {

    html, body {
	color:#000000;
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
     }

}
  
 @supports (-moz-appearance:none) {
       line-height:1;
    }

	</style>
  </head>

<body>
    <div class="row">
        <div class="manjeera">
            <table width="100%" border="1" cellspacing="0"  <?php if(count($sitearr['dateres']) == 28) {  echo "class='leapyear'"; } if(count($sitearr['dateres']) > 28) {  echo "class='notleapyear'"; } if(count($sitearr['dateres']) < 23 || count($sitearr['dateres']) > 21) {  echo "class='advancedcls'";}?>>
                <tbody>
                    <tr>
                        <th colspan="<?php echo count($sitearr['community']) + 3; ?>" style="font-size:15px;">Metro Water Supply details from  <?php echo $reportfrom_on." to ".$report_on; ?> </th>
                    </tr> 
                    <tr>
                        <th colspan="3"><span>Community</span></th>
                        <?php foreach($sitearr['community'] as $community) {?>
                        <td><b><?php echo  $community;?></b></td>
                        <?php 	}?>
                    <tr>
                        <th colspan="3"><span>Contracted<br> Quantity in KL</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
                        <?php $i= 1; foreach($sitearr['dateres'] as $dateke => $datevalue) { ?>
                    <tr>
                        <?php  if($i == 1) { ?>  <th rowspan="<?php echo count($sitearr['dateres']); ?>"><img src="images/date.png" ></th> <?php } ?>
                        <th colspan="2"><p><?php // echo $dateke;
                        $i = $i + 1;
                        echo date('d-m-Y', strtotime($dateke)); ?></p></th>
                        <?php foreach($datevalue as $val) { ?>   <td><?php echo $val; ?> </td><?php } ?>
                    </tr>
                        <?php  } ?>
                    <tr>
                        <th colspan="3"><span>Avg per day	</span></th>
                        <?php foreach($sitearr['average'] as $avgke => $avgval) { ?>
                        <td><?php echo round(((float)$avgval/count($sitearr['dateres']))); ?></td>
                        <?php } ?>  
                    </tr>
                    <tr>
                        <th colspan="3"><span>% on contracted<br> per day</span></th>
                        <?php foreach($sitearr['persent'] as $perke => $perval) { ?>
                        <td><?php echo round($perval); ?></td>
                        <?php } ?>  
                    </tr>
                </tbody>
            </table>
            <div class="additional-info"> <?php if(isset($additionalinfo)) { if($additionalinfo) echo $additionalinfo; }  ?> </div>
        </div>
    </div>
</body>
</html>
  
 
