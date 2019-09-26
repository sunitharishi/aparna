
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	.manjeera table tr th 
	{
	padding:4px;
	text-align:center;
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:4px;
	text-align:center;
	font-size:11px;
	}
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ;
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
	}
	.manjeera
	{
	font-size:11px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:12px;
 	}
	.docs-main h3
	{
    margin-top:10px;
	margin-bottom:25px;
	text-align:center;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.manjeera span
	{
	color:#041586;
	font-weight:bold;
	}
	.x_panel.commmmm
	{
	  padding-left:0px;
	 padding-top:0px;
	 border:0px;
	 padding-right:0px;
	}
	.x_content.housesco212
	{
	 margin-top:0px;
	 padding-left:0px;
	}
	.commmmm1
	{
	 padding-left:0px !important;
	 padding-right:0px !important;
	}
	table tr th p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-bottom:4px;
	 margin-top:4px;
	}
	
	.fht-table{
	
}

.fht-table th,.fht-table td {
    overflow: hidden;
}

.fht-table-wrapper,
.fht-table-wrapper .fht-thead,
.fht-table-wrapper .fht-fixed-column .fht-tbody,
.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	overflow: hidden;
	position: relative;
}

.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	overflow: auto;
}

.fht-table-wrapper .fht-table .fht-cell {
	overflow: hidden;
	height: 1px;
}

.fht-table-wrapper .fht-fixed-column,
.fht-table-wrapper .fht-fixed-body {
	top: 0;
	left: 0;
	position: absolute;
}

.fht-table-wrapper .fht-fixed-column {
	z-index: 1;
}

.fht-fixed-body .fht-thead table {
	margin-right: 20px;
	border: 0 none;
}

/*For Examples*/

.ContenedorTabla {
	margin: 0 auto;
	overflow-x: scroll;
	position: relative;
}

.header, .main {
    display: inline-block;
    height: auto;
    width: 100%;
}
.titulosHeader {
    border-bottom: 1px solid #e8bb25;
    height: auto;
    margin-bottom: 10px;
    padding-bottom: 8px;
    padding-top: 8px;
    width: 100%;
} 


.celda_encabezado_general {
    background-color:#fff;
	border:1px solid #000;
    font-weight: bold;
    padding: 2px 4px;
}
._Separador{
	background-color: #fff;
	height: 12px;
	border-left: 1px solid #ccc;
	border-right: 1px solid #ccc;
	width: 7px;
}
._Separador div{
	width: 4px;
}
.celda_normal {
    /*background-color: #fff;*/
    border: 1px solid #ccc;
    padding: 2px 4px;
}

/*style excel*/
.excel_cell{
	border: 1px solid #CCC;
	color: #222;
	font-size: 13px
	font-weight:  normal;
	padding: 4px;
	white-space: pre-line;
	empty-cells: show;
}
._cell_header{
	background-color: #EEE;
}
._cell_Default{
	background-color: #FFF;
}

.excel_cell div{
	width: 30px;
	height: 20px;
}
	</style>
@extends('layouts.app')


@section('content') 
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>

<div class="col-md-12 col-sm-12 col-xs-12 commmmm1 mis-metrowater-view">
              <div class="x_panel tile fixed_height_400 commmmm">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                 <div style="font-size:15px;background-color:#2f4050;color:#fff;text-align:center;padding:4px;font-weight:bold;">
                        Metro Water Supply details from <span style="color:#ffd800;"> <?php echo $reportfrom_on."<span style='color:#fff;'> to </span> ".$report_on; ?> </span>
                     </div>
<div class="manjeera metrowater-viewtable ContenedorTabla">
                     <?php // echo "<pre>"; print_r($sitearr); echo "</pre>"; ?>
                     
                      <table  border="1" width="100%" cellspacing="0" id="pruebatabla" class="fht-table">
                        <tbody>
                        <?php /*?>  <tr>
                           <th colspan="<?php echo count($sitearr['community']) + 2; ?>" style="font-size:15px;background-color:#2f4050;color:#fff;text-align:center;">Metro Water Supply details from <span style="color:#ffd800;"> <?php echo $reportfrom_on."<span style='color:#fff;'> to </span> ".$report_on; ?> </span></th>
                          </tr><?php */?> 
                          <tr style="background-color:#e9c085;">
                        <th colspan="2"  class="col1">Community </th>
						<?php foreach($sitearr['community'] as $community) {?>
						 <th><?php echo  $community;?></th>  
						<?php 	}?>
						
                           <tr style="background-color:#a99f91;">
                        <th colspan="2" class="col2">Contracted<br> Quantity in KL</th>
						
						<?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        
						<th><?php echo $contval; ?></th>
						<?php } ?>
                          </tr>
                          
                            <tr>
                             <td rowspan="<?php echo count($sitearr['dateres']) + 1; ?>" class="rotate col3" style="border:0px;"><div style="width:15px;">Date</div></td>
                          </tr>
                       
                           <?php foreach($sitearr['dateres'] as $dateke => $datevalue) {  ?>
                            <tr>
                        <th class="col4"><p><?php
echo date('d-m-Y', strtotime($dateke)); ?></p></th>
						<?php foreach($datevalue as $mk => $val) {  if($mk == 0) continue;?>   <td><span><?php echo $val; ?></span> </td><?php } ?>
                       
                          </tr>
						  
						  <?php  } ?>
                          
                      
                          
                          <tr  style="background-color:#b5a46b;">  
                        <th colspan="2" class="col5">Avg per day	</th>
						 <?php foreach($sitearr['average'] as $avgke => $avgval) { ?>
                        <td><b><?php echo round(((float)$avgval/count($sitearr['dateres']))); ?></b> </td>
                      
						<?php } ?>  
                          </tr>
                          
                           <tr style="background-color:#f9f0b7;">
                        <th colspan="2" class="col6">% on contracted<br> per day</th>
						 <?php foreach($sitearr['persent'] as $perke => $perval) { ?>
						
                        <td><b><?php echo round($perval); ?></b> </td>
                       
						<?php } ?>  
                          </tr>
                          	

                           
                        </tbody>
                      </table>
                      
                      
                      
                     <!-- <p style="padding-top:3px;margin-bottom:10px;">* In Sarovar 'metro water meter' not working</p>-->
                     
                    </div>
    				<?php if(isset($additionalinfo)) { if($additionalinfo) echo $additionalinfo; }  ?>
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="/build/js/jquery.CongelarFilaColumna.js"></script>
    @include('partials.footer')
@stop