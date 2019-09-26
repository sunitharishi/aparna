<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Electo M</title>

    
    
    <style>
	body
	{
	 font-family: "Open Sans", sans-serif;
	}
	.primary-table1
	{
	 border-collapse:collapse;
	}
    .primary-table1 tr td
	{
	 font-size:11px;
	text-align:center;
	 padding:1.5px;
	}
	.primary-table1 tr th
	{
	 font-size:11px;
	text-align:center;
	 padding:1.5px;
	 vertical-align:middle;
	}
	.equadditionin tbody tr th
	{
	 padding:1px !important;
	}
	.equadditionin tbody tr td
	{
	 padding:1px !important;
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
	
	table tr td.sarlef 
	{
	text-align:left;
	}
	table tr th.sarlef 
	{
	text-align:left;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.description-root-cause
	{
	 border-collapse:collapse;
	}
	.description-root-cause tr td.text-center
	{
	 text-align:center;
	}
	.description-root-cause tbody tr td:nth-child(1)
	{
	 padding-left:5px;
	}
	.description-root-cause1 tbody tr td:nth-child(1)
	{
	 padding-left:5px;
	}
	.description-root-cause
	{
	 padding:3px 2px;
	 font-size:13px;
	}
	.description-root-cause tbody tr th
	{
	 padding:12px 2px;
	 font-size:14px;
	 text-align:center;
	 vertical-align:middle;
	}
	.description-root-cause tbody tr td
	{
	 padding:12px 2px;
	 font-size:14px;
	 text-align:center;
	}
	.description-root-cause1
	{
	 border-collapse:collapse;
	}
	.description-root-cause1 tbody tr th
	{
	 padding:12px 2px;
	 font-size:14px;
	 text-align:center;
	 vertical-align:middle;
	}
	.description-root-cause1 tbody tr td
	{
	 padding:12px 2px;
	 font-size:14px;
	 text-align:center;
	}
	.codel-infoirmation
	{
	 margin-top:2px;
	 font-size:12px;
	}
	.codel-infoirmation b
	{
	 float:left;
	 margin-right:4px;
	 font-size:11.5px;
	}
	.codel-infoirmation p
	{
	 font-size:12px;
	 margin-top:0px;
	}
	.codel-infoirmation p span
	{
	 font-size:12px !important;
	}
	.equadditionin tbody tr th
	{
	 padding:1.5px !important;
	}
	.equadditionin tbody tr td
	{
	 padding:1.5px !important;
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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;padding:0px;border:0px;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title" style="border:0px;">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
        
          <?php $keysarray =array("1"=>"3 Panel","2"=>"4 Panel","3"=>"CTPT","4"=>"5 Panel","5"=>"Transformers","6"=>"Main Pcc Panel","7"=>"APFCR","8"=>"Common Supply Panel","9"=>"Bus Duct","10"=>"Distrbution Board","11"=>"VCB","12"=>"ACB","13"=>"Landscape Lighting Panel","14"=>"Club House Panel","15"=>"Lighting Arrestor","16"=>"Total No. Of Lights","17"=>"Lifts","18"=>"ARD Batteries","19"=>"DG Sets","20"=>"Partial Backup","21"=>"Borewells","22"=>"HMWS&SB Meter","23"=>"Water Distribution System","24"=>"FWS","25"=>"PRVs","26"=>"Sewerage System","27"=>"Irrigation Pumps","28"=>"Irrigation Pump Panels","29"=>"Irrigation Sprinkler Automation System","30"=>"Water Body Pumps","31"=>"Mist Fountain","32"=>"Storm Water Pump","33"=>"Oozing Pumps","34"=>"Excess Rain Water Pump","35"=>"Rain Water Harvesting Pits","36"=>"Indoor Pool Pumps","37"=>"Outdoor Pool Pumps","38"=>"Baby Pool","39"=>"Boom Barrier","40"=>"Solar Fencing","41"=>"CCTV","42"=>"Gas Bank & Chambers","43"=>"Fresh Air","44"=>"STP AHU"); ?>
         
          @if (count($issuecount) > 0) <?php $xc = 0; ?>
                        @foreach ($issuecount as $ikey => $issuecn) 
                        <?php $xc = $xc + 1;; ?>
                      <div <?php if($xc == count($issuecount) && $issuecn == 0) {} else { ?>style=" page-break-after: always;" class="previewprrrr" <?php } ?>>
                      
                      <table width="100%" border="1" cellspacing="0" class="primary-table1  <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo 'equadditionin'; } } ?>">
                        <tbody>
                          <tr>
                           <th colspan="9" style="font-size:15px;text-align:center;padding:5px;"> <span><?php echo get_sitename($ikey); ?> </span> Equipment Status as on <span><?php echo  $report_on ?></span></th>
                          </tr>
                      <tr>
                        <th rowspan="2">Category </th>
                        <th rowspan="2">S.No </th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Total</th>
                         <th rowspan="2">Not Working</th>
                        <th colspan="3">Pumps Status</th>
                        <th rowspan="2">Total downtime (Hrs/days) of all Equipment </th>
                       </tr>
                       <tr>
                          <th>Auto</th>
                         <th>Manual</th>
                         <th>Off</th>
                       </tr>
                       
                        
                             <tr>
                         <td rowspan="4"><b>Electrical Distribution System (HT)</b></td>
                        <td><b>1</b></td>
                        <td class="sarlef"><b>3 Panel</b> </td>
                       <td><span><?php if(isset($validation[$ikey]['mis3panel'])) echo $validation[$ikey]['mis3panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['3panel_nw'])) echo $misres[$ikey]['3panel_nw']; ?><?php if(isset($misprevious[$ikey]['3panel_nw'])) { if((int)$misprevious[$ikey]['3panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['3panel_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['3panel_dtm'])) echo $misres[$ikey]['3panel_dtm']; ?></span> </td>
                       
                             </tr>
                          
                            <tr>
                        <td><b>2</b></td>
                        <td class="sarlef"><b>4 Panel</b></td>
                        <td><span><?php if(isset($validation[$ikey]['mis4panel'])) echo $validation[$ikey]['mis4panel']; ?></span> </td>
                       <td><span><?php if(isset($misres[$ikey]['4panel_nw'])) echo $misres[$ikey]['4panel_nw']; ?><?php if(isset($misprevious[$ikey]['4panel_nw'])) { if((int)$misprevious[$ikey]['4panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['4panel_nw'].")"; } ?></span> </td>
                       <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['4panel_dtm'])) echo $misres[$ikey]['4panel_dtm']; ?></span> </td>
                       
                             </tr>
                              
                           <tr>
                        <td><b>3</b></td>
                        <td class="sarlef"><b>CTPT</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misctpt'])) echo $validation[$ikey]['misctpt']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['ctpt_nw'])) echo $misres[$ikey]['ctpt_nw']; ?><?php if(isset($misprevious[$ikey]['ctpt_nw'])) { if((int)$misprevious[$ikey]['ctpt_nw'] > 0 ) echo  "(".$misprevious[$ikey]['ctpt_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['ctpt_dtm'])) echo $misres[$ikey]['ctpt_dtm']; ?></span> </td>
                      
                             </tr>
                            <tr>
                        <td><b>4</b></td>
                        <td class="sarlef"><b>5 Panel</b> </td>
                         <td><span><?php if(isset($validation[$ikey]['mis5panel'])) echo $validation[$ikey]['mis5panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['5panel_nw'])) echo $misres[$ikey]['5panel_nw']; ?><?php if(isset($misprevious[$ikey]['5panel_nw'])) { if((int)$misprevious[$ikey]['5panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['5panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['5panel_dtm'])) echo $misres[$ikey]['5panel_dtm']; ?></span> </td>
                        
                             </tr>
                          
                             <tr>
                             <td rowspan="12"><b>Electrical Distribution System(LT)</b></td>
                           <td><b>5</b></td>
                        <td class="sarlef"><b>Transformers</b> </td>
                         <td><span><?php if(isset($validation[$ikey]['mistransformers'])) echo $validation[$ikey]['mistransformers']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['transformer_nw'])) echo $misres[$ikey]['transformer_nw']; ?><?php if(isset($misprevious[$ikey]['transformer_nw'])) { if((int)$misprevious[$ikey]['transformer_nw'] > 0 ) echo  "(".$misprevious[$ikey]['transformer_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['transformer_dtm'])) echo $misres[$ikey]['transformer_dtm']; ?></span> </td>
                       
                          </tr>
                          
                              <tr>
                              <td><b>6</b></td>
                        <td class="sarlef"><b>Main Pcc Panel</b></td>
                         <td><span><?php if(isset($validation[$ikey]['mismainpccpanel'])) echo $validation[$ikey]['mismainpccpanel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['mainpcc_nw'])) echo $misres[$ikey]['mainpcc_nw']; ?><?php if(isset($misprevious[$ikey]['mainpcc_nw'])) { if((int)$misprevious[$ikey]['mainpcc_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mainpcc_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['mainpcc_dtm'])) echo $misres[$ikey]['mainpcc_dtm']; ?></span> </td>
                       
                          </tr>
                          
                          
                         
                             <tr>
                             <td><b>7</b></td>
                         <td class="sarlef"><b>APFCR</b></td>
                         <td><span><?php if(isset($validation[$ikey]['misapfcr'])) echo $validation[$ikey]['misapfcr']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['apfcr_nw'])) echo $misres[$ikey]['apfcr_nw']; ?><?php if(isset($misprevious[$ikey]['apfcr_nw'])) { if((int)$misprevious[$ikey]['apfcr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['apfcr_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['apfcr_dtm'])) echo $misres[$ikey]['apfcr_dtm']; ?></span> </td>
                        
                          </tr>
                          
                           <tr>
                         <td><b>8</b></td>
                        <td class="sarlef"><b>Common Supply Panel</b></td>
                        <td><span><?php if(isset($validation[$ikey]['miscommsuppanel'])) echo $validation[$ikey]['miscommsuppanel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['common_supply_nw'])) echo $misres[$ikey]['common_supply_nw']; ?><?php if(isset($misprevious[$ikey]['common_supply_nw'])) { if((int)$misprevious[$ikey]['common_supply_nw'] > 0 ) echo  "(".$misprevious[$ikey]['common_supply_nw'].")"; } ?></span> </td>
                          <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['common_supply_dtm'])) echo $misres[$ikey]['common_supply_dtm']; ?></span> </td>
                    
                          </tr>
                          
                           <tr>
                         <td><b>9</b></td>
                        <td class="sarlef"><b>Bus Duct</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misbusduct'])) echo $validation[$ikey]['misbusduct']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['bus_duct_nw'])) echo $misres[$ikey]['bus_duct_nw']; ?><?php if(isset($misprevious[$ikey]['bus_duct_nw'])) { if((int)$misprevious[$ikey]['bus_duct_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bus_duct_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['bus_duct_dtm'])) echo $misres[$ikey]['bus_duct_dtm']; ?></span> </td>
                        
                          </tr>
                          
                           <tr>
                         <td><b>10</b></td>
                        <td class="sarlef"><b>Distribution Board</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misdistriboard'])) echo $validation[$ikey]['misdistriboard']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['distribu_board_nw'])) echo $misres[$ikey]['distribu_board_nw']; ?><?php if(isset($misprevious[$ikey]['distribu_board_nw'])) { if((int)$misprevious[$ikey]['distribu_board_nw'] > 0 ) echo  "(".$misprevious[$ikey]['distribu_board_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['distribu_board_dtm'])) echo $misres[$ikey]['distribu_board_dtm']; ?></span> </td>
                        
                          </tr>

                           
                           <tr>
                         <td><b>11</b></td>
                        <td class="sarlef"><b>VCB</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misvcb'])) echo $validation[$ikey]['misvcb']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['vcb_nw'])) echo $misres[$ikey]['vcb_nw']; ?><?php if(isset($misprevious[$ikey]['vcb_nw'])) { if((int)$misprevious[$ikey]['vcb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['vcb_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['vcb_dtm'])) echo $misres[$ikey]['vcb_dtm']; ?></span> </td>
                       
                       
                          </tr>
                          
                           
                           <tr>
                         <td><b>12</b></td>
                        <td class="sarlef"><b>ACB</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misacb'])) echo $validation[$ikey]['misacb']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['acb_nw'])) echo $misres[$ikey]['acb_nw']; ?><?php if(isset($misprevious[$ikey]['acb_nw'])) { if((int)$misprevious[$ikey]['acb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['acb_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['acb_dtm'])) echo $misres[$ikey]['acb_dtm']; ?></span> </td>
                       
                       
                          </tr>
                          
                           <tr>
                         <td><b>13</b></td>
                        <td class="sarlef"><b>Landscape Lighting Panel</b></td>
                        <td><span><?php if(isset($validation[$ikey]['mislandpanel'])) echo $validation[$ikey]['mislandpanel']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['landscape_lpanel_nw'])) echo $misres[$ikey]['landscape_lpanel_nw']; ?><?php if(isset($misprevious[$ikey]['landscape_lpanel_nw'])) { if((int)$misprevious[$ikey]['landscape_lpanel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['landscape_lpanel_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['landscape_lpanel_dtm'])) echo $misres[$ikey]['landscape_lpanel_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                         <td><b>14</b></td>
                        <td class="sarlef"><b>Club House Panel</b></td>
                        <td><span><?php if(isset($validation[$ikey]['ch_panel'])) echo $validation[$ikey]['ch_panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['club_house_panel_nw'])) echo $misres[$ikey]['club_house_panel_nw']; ?><?php if(isset($misprevious[$ikey]['club_house_panel_nw'])) { if((int)$misprevious[$ikey]['club_house_panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['club_house_panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['club_house_panel_dtm'])) echo $misres[$ikey]['club_house_panel_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                         <td><b>15</b></td>
                        <td class="sarlef"><b>Lighting Arrestor</b></td>
                        <td><span><?php if(isset($validation[$ikey]['mislightarestr'])) echo $validation[$ikey]['mislightarestr']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['lighting_arrestor_nw'])) echo $misres[$ikey]['lighting_arrestor_nw']; ?><?php if(isset($misprevious[$ikey]['lighting_arrestor_nw'])) { if((int)$misprevious[$ikey]['lighting_arrestor_nw'] > 0 ) echo  "(".$misprevious[$ikey]['lighting_arrestor_nw'].")"; } ?></span> </td>
                          <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['lighting_arrestor_dtm'])) echo $misres[$ikey]['lighting_arrestor_dtm']; ?></span> </td>
                      
                          </tr>
                           <tr>
                         <td><b>16</b></td>
                        <td class="sarlef"><b>Total No. Of Lights</b></td>
                       <td><span><?php if(isset($validation[$ikey]['mistotlightsnum'])) echo $validation[$ikey]['mistotlightsnum']; ?></span> </td>
                       <td><span><?php if(isset($misres[$ikey]['tot_no_lights_nw'])) echo $misres[$ikey]['tot_no_lights_nw']; ?><?php if(isset($misprevious[$ikey]['tot_no_lights_nw'])) { if((int)$misprevious[$ikey]['tot_no_lights_nw'] > 0 ) echo  "(".$misprevious[$ikey]['tot_no_lights_nw'].")"; } ?></span> </td>
                       <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['tot_no_lights_dtm'])) echo $misres[$ikey]['tot_no_lights_dtm']; ?></span> </td>
                        
                          </tr>
                          <tr>
                          <td rowspan="4"><b>Elevators & Backup Power</b></td>
                         <td><b>17</b></td>
                        <td class="sarlef"><b>Lifts</b></td>
                       <td><span><?php if(isset($validation[$ikey]['lifsnum'])) echo $validation[$ikey]['lifsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['lifts_nw'])) echo $misres[$ikey]['lifts_nw']; ?><?php if(isset($misprevious[$ikey]['lifts_nw'])) { if((int)$misprevious[$ikey]['lifts_nw'] > 0 ) echo  "(".$misprevious[$ikey]['lifts_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['lifts_dtm'])) echo $misres[$ikey]['lifts_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <td><b>18</b></td>
                        <td class="sarlef"><b>ARD Batteries</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misfullbkp'])) echo $validation[$ikey]['misfullbkp']; ?></span> </td>
                       <td><span><?php if(isset($misres[$ikey]['misfull_nw'])) echo $misres[$ikey]['misfull_nw']; ?><?php if(isset($misprevious[$ikey]['misfull_nw'])) { if((int)$misprevious[$ikey]['misfull_nw'] > 0 ) echo  "(".$misprevious[$ikey]['misfull_nw'].")"; } ?></td>
                       <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['full_bkp_dtm'])) echo $misres[$ikey]['full_bkp_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <tr>
                          <td><b>19</b></td>
                        <td class="sarlef"><b>DG Sets</b></td>
                       <td><span><?php if(isset($validation[$ikey]['dgsetsnum'])) echo $validation[$ikey]['dgsetsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['dg_sets_nw'])) echo $misres[$ikey]['dg_sets_nw']; ?><?php if(isset($misprevious[$ikey]['dg_sets_nw'])) { if((int)$misprevious[$ikey]['dg_sets_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dg_sets_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['dg_sets_dtm'])) echo $misres[$ikey]['dg_sets_dtm']; ?></span> </td>
                      
                          </tr>
                          <td><b>20</b></td>
                        <td class="sarlef"><b>Partial / Full Backup</b></td>
                        <td><span><?php if(isset($validation[$ikey]['mispartialbkp'])) echo $validation[$ikey]['mispartialbkp']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['partia_nw'])) echo $misres[$ikey]['partia_nw']; ?><?php if(isset($misprevious[$ikey]['partia_nw'])) { if((int)$misprevious[$ikey]['partia_nw'] > 0 ) echo  "(".$misprevious[$ikey]['partia_nw'].")"; } ?></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['partial_bkp_dtm'])) echo $misres[$ikey]['partial_bkp_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <th>Ground Water Source</th>
                          <td><b>21</b></td>
                        <td class="sarlef"><b>Borewells</b></td>
                       <td><span><?php if(isset($validation[$ikey]['borewellsnum'])) echo $validation[$ikey]['borewellsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['bore_wells_nw'])) echo $misres[$ikey]['bore_wells_nw']; ?><?php if(isset($misprevious[$ikey]['bore_wells_nw'])) { if((int)$misprevious[$ikey]['bore_wells_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bore_wells_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['bore_wells_dtm'])) echo $misres[$ikey]['bore_wells_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <th>Metro Water Supply</th>
                          <td><b>22</b></td>
                        <td class="sarlef"><b>HMWS & SB Meter</b></td>
                       <td><span><?php if(isset($validation[$ikey]['mishmws'])) echo $validation[$ikey]['mishmws']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['hmws_nw'])) echo $misres[$ikey]['hmws_nw']; ?><?php if(isset($misprevious[$ikey]['hmws_nw'])) { if((int)$misprevious[$ikey]['hmws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['hmws_nw'].")"; } ?></span> </td>
                          <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['hmws_dtm'])) echo $misres[$ikey]['hmws_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <td rowspan="4"><b>Water Distribution System</b></td>
                          <td><b>23</b></td>
                        <td class="sarlef"><b>DWS</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misdws'])) echo $validation[$ikey]['misdws']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['dws_nw'])) echo $misres[$ikey]['dws_nw']; ?><?php if(isset($misprevious[$ikey]['dws_nw'])) { if((int)$misprevious[$ikey]['dws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dws_nw'].")"; } ?></td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['water_ds_dtm'])) echo $misres[$ikey]['water_ds_dtm']; ?></span> </td>
                        
                          </tr>
                          <tr>
                          <td><b>24</b></td>
                        <td class="sarlef"><b>FWS</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misfws'])) echo $validation[$ikey]['misfws']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['fws_nw'])) echo $misres[$ikey]['fws_nw']; ?><?php if(isset($misprevious[$ikey]['fws_nw'])) { if((int)$misprevious[$ikey]['fws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['fws_nw'].")"; } ?></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['fws_dtm'])) echo $misres[$ikey]['fws_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <td><b>25</b></td>
                        <td class="sarlef"><b>PRV's</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misprv'])) echo $validation[$ikey]['misprv']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['prvs_nw'])) echo $misres[$ikey]['prvs_nw']; ?><?php if(isset($misprevious[$ikey]['prvs_nw'])) { if((int)$misprevious[$ikey]['prvs_nw'] > 0 ) echo  "(".$misprevious[$ikey]['prvs_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['prvs_dtm'])) echo $misres[$ikey]['prvs_dtm']; ?></span> </td>
                        
                          </tr>
                           <tr>
                          <td><b>26</b></td>
                        <td class="sarlef"><b>Sewerage System</b></td>
                        <td><span><?php if(isset($validation[$ikey]['missewaragesys'])) echo $validation[$ikey]['missewaragesys']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['sewerage_nw'])) echo $misres[$ikey]['sewerage_nw']; ?><?php if(isset($misprevious[$ikey]['sewerage_nw'])) { if((int)$misprevious[$ikey]['sewerage_nw'] > 0 ) echo  "(".$misprevious[$ikey]['sewerage_nw'].")"; } ?></td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['sewerage_dtm'])) echo $misres[$ikey]['sewerage_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                           <td rowspan="3"><b>Landscape Water Distribution</b></td>
                          <td><b>27</b></td>
                        <td class="sarlef"><b>Irrigation Pumps</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misirrigationpumps'])) echo $validation[$ikey]['misirrigationpumps']; ?></span> </td>
                       <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_nw'])) echo $misres[$ikey]['irrigatn_pmp_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_pmp_nw'])) { if((int)$misprevious[$ikey]['irrigatn_pmp_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_pmp_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_dtm'])) echo $misres[$ikey]['irrigatn_pmp_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td><b>28</b></td>
                        <td class="sarlef"><b>Irrigation Pump Panels</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misirrigationpmppan'])) echo $validation[$ikey]['misirrigationpmppan']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_panel_nw'])) echo $misres[$ikey]['irrigatn_pmp_panel_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_pmp_panel_nw'])) { if((int)$misprevious[$ikey]['irrigatn_pmp_panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_pmp_panel_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_panel_dtm'])) echo $misres[$ikey]['irrigatn_pmp_panel_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td><b>29</b></td>
                        <td class="sarlef"><b>Irrigation Sprinkler Automation System</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misirrgsprinkautosys'])) echo $validation[$ikey]['misirrgsprinkautosys']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['irrigatn_spr_as_nw'])) echo $misres[$ikey]['irrigatn_spr_as_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_spr_as_nw'])) { if((int)$misprevious[$ikey]['irrigatn_spr_as_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_spr_as_nw'].")"; } ?></td>
                          <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_spr_as_dtm'])) echo $misres[$ikey]['irrigatn_spr_as_dtm']; ?></span> </td>
                     
                          </tr>
                          <tr>
                          <td rowspan="2"><b>Water Features</b> </td>
                          <td><b>30</b></td>
                        <td class="sarlef"><b>Water Body Pumps</b></td>
                       <td><span><?php if(isset($validation[$ikey]['miswatrbodypumps'])) echo $validation[$ikey]['miswatrbodypumps']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['water_body_pumps_nw'])) echo $misres[$ikey]['water_body_pumps_nw']; ?><?php if(isset($misprevious[$ikey]['water_body_pumps_nw'])) { if((int)$misprevious[$ikey]['water_body_pumps_nw'] > 0 ) echo  "(".$misprevious[$ikey]['water_body_pumps_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['water_body_pumps_dtm'])) echo $misres[$ikey]['water_body_pumps_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <td><b>31</b></td>
                        <td class="sarlef"><b>Mist Fountain</b></td>
                       <td><span><?php if(isset($validation[$ikey]['mismistfoun'])) echo $validation[$ikey]['mismistfoun']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['mist_fountain_nw'])) echo $misres[$ikey]['mist_fountain_nw']; ?><?php if(isset($misprevious[$ikey]['mist_fountain_nw'])) { if((int)$misprevious[$ikey]['mist_fountain_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mist_fountain_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['mist_fountain_dtm'])) echo $misres[$ikey]['mist_fountain_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                           <th rowspan="2">De-watering System</th>
                          <td><b>32</b></td>
                        <td class="sarlef"><b>Storm Water Pump</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misstromwaterpump'])) echo $validation[$ikey]['misstromwaterpump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_nw'])) echo $misres[$ikey]['strm_Water_nw']; ?><?php if(isset($misprevious[$ikey]['strm_Water_nw'])) { if((int)$misprevious[$ikey]['strm_Water_nw'] > 0 ) echo  "(".$misprevious[$ikey]['strm_Water_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_auto'])) echo $misres[$ikey]['strm_Water_auto']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_man'])) echo $misres[$ikey]['strm_Water_man']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_off'])) echo $misres[$ikey]['strm_Water_off']; ?></span></td>
                          <?php /*?><td colspan="3"><span><?php if(isset($misres[$ikey]['strm_Water_auto'])) echo $misres[$ikey]['strm_Water_auto']."-A<br>". $misres[$ikey]['strm_Water_man']."-M<br>".$misres[$ikey]['strm_Water_off']."-Off"; ?></span></td><?php */?>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_dtm'])) echo $misres[$ikey]['strm_Water_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td><b>33</b></td>
                        <td class="sarlef"><b>Oozing Pumps</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misoozingpump'])) echo $validation[$ikey]['misoozingpump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_nw'])) echo $misres[$ikey]['oozing_pump_nw']; ?><?php if(isset($misprevious[$ikey]['oozing_pump_nw'])) { if((int)$misprevious[$ikey]['oozing_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['oozing_pump_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_auto'])) echo $misres[$ikey]['oozing_pump_auto']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_man'])) echo $misres[$ikey]['oozing_pump_man']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_off'])) echo $misres[$ikey]['oozing_pump_off']; ?></span></td>
                       <?php /*?>  <td colspan="3"><span><?php if(isset($misres[$ikey]['oozing_pump_auto'])) echo $misres[$ikey]['oozing_pump_auto']."-A<br>". $misres[$ikey]['oozing_pump_man']."-M<br>".$misres[$ikey]['oozing_pump_off']."-Off"; ?></span></td><?php */?>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_dtm'])) echo $misres[$ikey]['oozing_pump_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <th rowspan="2">Rain Water System</th>
                          <td><b>34</b></td>
                        <td class="sarlef"><b>Excess Rain Water Pump</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misexsrainwatpmp'])) echo $validation[$ikey]['misexsrainwatpmp']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['excess_rain_wt_nw'])) echo $misres[$ikey]['excess_rain_wt_nw']; ?><?php if(isset($misprevious[$ikey]['excess_rain_wt_nw'])) { if((int)$misprevious[$ikey]['excess_rain_wt_nw'] > 0 ) echo  "(".$misprevious[$ikey]['excess_rain_wt_nw'].")"; } ?></span> </td> 	
                          <td><span><?php if(isset($misres[$ikey]['excess_rain_wt_auto'])) echo $misres[$ikey]['excess_rain_wt_auto']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['excess_rain_wt_man'])) echo $misres[$ikey]['excess_rain_wt_man']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['excess_rain_wt_off'])) echo $misres[$ikey]['excess_rain_wt_off']; ?></span></td>
                        <td><span><?php if(isset($misres[$ikey]['excess_rain_wt_dtm'])) echo $misres[$ikey]['excess_rain_wt_dtm']; ?></span> </td>
                       <!--<td><span></span></td>-->
                          </tr>
                           <tr>
                          <td><b>35</b></td>
                        <td class="sarlef"><b>Rain Water Harvesting Pits</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misrainharvest'])) echo $validation[$ikey]['misrainharvest']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['rain_water_har_nw'])) echo $misres[$ikey]['rain_water_har_nw']; ?><?php if(isset($misprevious[$ikey]['rain_water_har_nw'])) { if((int)$misprevious[$ikey]['rain_water_har_nw'] > 0 ) echo  "(".$misprevious[$ikey]['rain_water_har_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['rain_water_har_dtm'])) echo $misres[$ikey]['rain_water_har_dtm']; ?></span> </td>
                       
                          </tr> 
                          <tr>
                          <th rowspan="3">Swimming Pool</th>
                          <td><b>36</b></td>
                        <td class="sarlef"><b>Indoor Pool Pumps</b></td> 
                       <td><span><?php if(isset($validation[$ikey]['misindoorpool'])) echo $validation[$ikey]['misindoorpool']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['mis_indoorpool_nw'])) echo $misres[$ikey]['mis_indoorpool_nw']; ?></span></td>
                        <td colspan="3"><span></span></td>
                         <td><span><?php if(isset($misres[$ikey]['indoor_dtm'])) echo $misres[$ikey]['indoor_dtm']; ?></span> </td>
                      
                         
                          </tr>
                          <tr>
                          <td><b>37</b></td>
                        <td class="sarlef"><b>Outdoor Pool Pumps</b></td>
                       <td><span><?php if(isset($validation[$ikey]['misoutdoorpool'])) echo $validation[$ikey]['misoutdoorpool']; ?></span> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['mis_outdoorpool_nw'])) echo $misres[$ikey]['mis_outdoorpool_nw']; ?><?php if(isset($misprevious[$ikey]['mist_fountain_nw'])) { if((int)$misprevious[$ikey]['mis_outdoorpool_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mis_outdoorpool_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['outdoor_dtm'])) echo $misres[$ikey]['outdoor_dtm']; ?></span> </td>
                     
                          </tr>
                          <tr>
                          <td><b>38</b></td>
                        <td class="sarlef"><b>Baby Pool</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misbabypool'])) echo $validation[$ikey]['misbabypool']; ?></span> </td>
                       <td><span><?php if(isset($misres[$ikey]['mis_babypool_nw'])) echo $misres[$ikey]['mis_babypool_nw']; ?><?php if(isset($misprevious[$ikey]['mis_babypool_nw'])) { if((int)$misprevious[$ikey]['mis_babypool_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mis_babypool_nw'].")"; } ?></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['baby_dtm'])) echo $misres[$ikey]['baby_dtm']; ?></span> </td>
                      
                          </tr>
                          
                           <tr>
                           <th rowspan="3">Security</th>
                          <td><b>39</b></td>
                        <td class="sarlef"><b>Boom Barrier</b></td>  
                        <td><span><?php if(isset($validation[$ikey]['misboombarrier'])) echo $validation[$ikey]['misboombarrier']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['boom_bar_nw'])) echo $misres[$ikey]['boom_bar_nw']; ?><?php if(isset($misprevious[$ikey]['boom_bar_nw'])) { if((int)$misprevious[$ikey]['boom_bar_nw'] > 0 ) echo  "(".$misprevious[$ikey]['boom_bar_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['boom_bar_dtm'])) echo $misres[$ikey]['boom_bar_dtm']; ?></span> </td>
                       
                          </tr>
                          
                           <tr>
                          <td><b>40</b></td>
                        <td class="sarlef"><b>Solar Fencing(Zones)</b></td>
                        <td><span><?php if(isset($validation[$ikey]['missolarfencingzone'])) echo $validation[$ikey]['missolarfencingzone']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['solar_fen_nw'])) echo $misres[$ikey]['solar_fen_nw']; ?><?php if(isset($misprevious[$ikey]['solar_fen_nw'])) { if((int)$misprevious[$ikey]['solar_fen_nw'] > 0 ) echo  "(".$misprevious[$ikey]['solar_fen_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['solar_fen_dtm'])) echo $misres[$ikey]['solar_fen_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <td><b>41</b></td>
                        <td class="sarlef"><b>CCTV</b></td>
                        <td><span><?php if(isset($validation[$ikey]['miscctv'])) echo $validation[$ikey]['miscctv']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['cctv_nw'])) echo $misres[$ikey]['cctv_nw']; ?><?php if(isset($misprevious[$ikey]['cctv_nw'])) { if((int)$misprevious[$ikey]['cctv_nw'] > 0 ) echo  "(".$misprevious[$ikey]['cctv_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['cctv_dtm'])) echo $misres[$ikey]['cctv_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                           <th>Reticulated Piped Gas</th>
                          <td><b>42</b></td>
                        <td class="sarlef"><b>Gas Bank & Chambers</b></td>
                      <td><span><?php if(isset($validation[$ikey]['misgasbankcham'])) echo $validation[$ikey]['misgasbankcham']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['gas_bank_chambr_nw'])) echo $misres[$ikey]['gas_bank_chambr_nw']; ?><?php if(isset($misprevious[$ikey]['gas_bank_chambr_nw'])) { if((int)$misprevious[$ikey]['gas_bank_chambr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['gas_bank_chambr_nw'].")"; } ?></td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['gas_bank_chambr_dtm'])) echo $misres[$ikey]['gas_bank_chambr_dtm']; ?></span> </td>
                      
                          </tr>
                          
                           <tr>
                           <th rowspan="3">Air Handling Unit(AHU)</th>
                          <td><b>43</b></td>
                        <td class="sarlef"><b>Fresh Air</b></td>  
                        <td><span><?php if(isset($validation[$ikey]['misfreshair'])) echo $validation[$ikey]['misfreshair']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['fresh_air_nw'])) echo $misres[$ikey]['fresh_air_nw']; ?><?php if(isset($misprevious[$ikey]['fresh_air_nw'])) { if((int)$misprevious[$ikey]['fresh_air_nw'] > 0 ) echo  "(".$misprevious[$ikey]['fresh_air_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['fresh_air_dtm'])) echo $misres[$ikey]['fresh_air_dtm']; ?></span> </td>
                       
                          </tr>
                          
                           <tr>
                          <td><b>44</b></td>
                        <td class="sarlef"><b>STP AHU</b></td>
                        <td><span><?php if(isset($validation[$ikey]['misstpahu'])) echo $validation[$ikey]['misstpahu']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['stp_ahu_nw'])) echo $misres[$ikey]['stp_ahu_nw']; ?><?php if(isset($misprevious[$ikey]['stp_ahu_nw'])) { if((int)$misprevious[$ikey]['stp_ahu_nw'] > 0 ) echo  "(".$misprevious[$ikey]['stp_ahu_nw'].")"; } ?></span> </td>
                         <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['stp_ahu_dtm'])) echo $misres[$ikey]['stp_ahu_dtm']; ?></span> </td>
                       
                          </tr>
                        </tbody>
                      </table>
                       <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div>
                      </div>
                        
                       <?php  if($issuecn > 5) { ?>
						    <?php if(isset($issuetemp[$ikey])) { ?>
                            
                            
                             <div <?php  if($xc == count($issuecount)) {} else { ?>style=" page-break-after: always;" class="previewprrrr" <?php } ?>>
						   <table width="100%" border="1" cellspacing="0" class="description-root-cause">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;padding:5px;"> <span><?php echo get_sitename($ikey); ?> </span> - Equipment Not working Data</th>
                          </tr>
                      
                       <tr>
                        <th style="text-align:left;padding-left:5px;"><b>Category</b></th>
                        
                          
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
						          
                                 <th class="text-center"><b><?php echo $keysarray[$issuer];  ?></b></th>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td style="text-align:left;padding-left:5px;"><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer;   ?></span></td>
                                
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td style="text-align:left;padding-left:5px;"><b>Description of Issue</b></td>
                              
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td style="text-align:left;padding-left:5px;"><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td class="sarlef"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td style="text-align:left;padding-left:5px;"><b>Action Required / Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td style="text-align:left;padding-left:5px;"><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td style="text-align:left;padding-left:5px;"><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                             <td style="text-align:left;padding-left:5px;"><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                      	   <tr>
                                <td class="sarlef"><b>Estimated Date of Completion</b></td>
                                <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                                <td><span><?php echo $issuer; ?></span></td>
                                
                                <?php } ?>
                           </tr>
                        </tbody>
                      </table>
						</div>   
						   
						 
						 <?php  }}else{   if(isset($issuetemp[$ikey])) { if(isset($issuetemp[$ikey]['category'])) { ?>
                          <div <?php if($xc == count($issuecount)) {} else { ?>style=" page-break-after: always;" class="previewprrrr" <?php } ?>>
						       <table width="100%" border="1" cellspacing="0" class="description-root-cause1">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;padding:5px;"> <span><?php echo get_sitename($ikey); ?> </span> - Equipment Not working Data</th>
                          </tr>
                     
                       <tr>
                        <th style="text-align:left;padding-left:5px;"><b>Category</b> </th>
                           
                       
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
						          
                                 <th class="text-center"><b><?php echo $keysarray[$issuer];  $cm = $issuer; ?></b></th>
                                 
                               
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td style="text-align:left;padding-left:5px;"><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) {  ?>

						          
                                 <td><span><?php echo $issuer;  $c = $issuer;?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td style="text-align:left;padding-left:5px;"><b>Description of Issue</b></td>
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td style="text-align:left;padding-left:5px;"><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td style="text-align:left;padding-left:5px;"><b>Action Required / Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td style="text-align:left;padding-left:5px;"><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td style="text-align:left;padding-left:5px;"><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                             <td style="text-align:left;padding-left:5px;"><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                                <td class="sarlef"><b>Estimated Date of Completion</b></td>
                                <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                                <td><span><?php echo $issuer; ?></span></td>
                                
                                <?php } ?>
                            </tr>
                             <?php }  ?>
                        </tbody>
                      </table>
						</div>     
						 <?php  }}
                           
                            ?>
                         @endforeach
                    @else
                        
						<div>No entries in table</div>
                        
                    @endif
                      
                    </div>
                    
                </div>
              </div>
            </div>            
          </div>
          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
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