<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fire Safety</title>


    
    <style>
	@media print
{
.previewprrrr {page-break-after:always !important;
}
}
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}

	
	table tr td.sarlef
	{
	text-align:left;
	}
	
	table tbody tr td p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin:0px;
	}
	.codel-infoirmation b
	{
	 float:left;
	 width:35px;
	}
	.codel-infoirmation
	{
	
	 font-size:10.5px;
	 white-space:normal !important;
	  margin-top:2px;
	}
	 .codel-infoirmation .note-information
	 {
	  width:auto;
	  float:left;
	  display:block;
	 }
	 
	 .codel-infoirmation .note-information p
	  {
	   width:auto;
	   margin-top:0px;
	  }
	  .codel-infoirmation .note-information div
	  {
	   clear:both;
	  }
	  .codel-infoirmation .note-information div.alwayyya
	  {
	  	width:80%;
		display:block;
	  }
	  
	  .codel-infoirmation .note-information div.alwayyya span
	  {
	   
	  }
	 .codel-infoirmation .cote-i b
	 {
	  margin-top:0px;
	  width:35px;
	  float:left;
	 
	 }
	
	.codel-infoirmation table
	{
	 width:80% !important;
	 float:left;
	  
	  font-size:11px;
	}
	.codel-infoirmation table tr td
	{
	 vertical-align:top;
	  width:80% !important;
	  border-right:0px !important;
	  font-size:11px;
	 
	}
	.additionin tbody tr:nth-of-type(2) th, .additionin tbody tr:nth-of-type(3) th
	{
	 padding:0px  !important;
	 padding-left:1px;
	  
	}
	.additionin tbody tr td
	{
	 padding:0px  !important;
	 padding-left:1px;
	  
	}
	.primary-table1 tbody tr td
	{
	 font-size:11px;
	padding:2px 2px;
	padding-left:2px;
	 
	}
	.primary-table1 tbody tr:nth-of-type(2) th, .primary-table1 tbody tr:nth-of-type(3) th
	{
	 font-size:11px;
	  padding:2px 2px;
	  padding-left:2px;
	  text-align:center;
	   line-height:10px !important;
	}
	.primary-table1  tr td.last-child, .equadditionin  tr td.last-child
	{
	 line-height:15px !important;
	}
	.primary-table1 thead tr:nth-of-type(2) th, .primary-table1 thead tr:nth-of-type(3) th
	{
	 font-size:11px;
	 padding:0px;
	 padding-left:1px;
	 text-align:center;
	}
	.equadditionin thead tr th
	{
	 font-size:10px;
	}
	.equadditionin tbody tr td
	{
	 font-size:10px;
	}
	.primary-table1 tbody tr td:nth-child(4)
	{
	 text-align:center;
	}
	.primary-table1 tbody tr td:nth-child(5)
	{
	 text-align:center;
	}
	.primary-table1 tbody tr td:nth-child(6), .primary-table1 tbody tr td:nth-child(7)
	{
	 text-align:center;
	}
	.primary-table1 tbody tr td.text-center
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
		<?php $keysarray =array("1"=>"3 Panel","2"=>"4 Panel","3"=>"CTPT","4"=>"5 Panel","5"=>"Transformers","6"=>"Main Pcc Panel","7"=>"APFCR","8"=>"Common Supply Panel","9"=>"Bus Duct","10"=>"Distrbution Board","11"=>"VCB","12"=>"ACB","13"=>"Landscape Lighting Panel","14"=>"Club House Panel","15"=>"Lighting Arrestor","16"=>"Total No. Of Lights","17"=>"Lifts","18"=>"ARD Batteries","19"=>"DG Sets","20"=>"Partial Backup","21"=>"Borewells","22"=>"HMWS&SB Meter","23"=>"Water Distribution System","24"=>"FWS","25"=>"PRVs","26"=>"Sewerage System","27"=>"Irrigation Pumps","28"=>"Irrigation Pump Panels","29"=>"Irrigation Sprinkler Automation System","30"=>"Water Body Pumps","31"=>"Fountain","32"=>"Storm Water Pump","33"=>"Oozing Pumps","34"=>"Excess Rain Water Pump","35"=>"Rain Water Harvesting Pits","36"=>"Indoor Pool Pumps","37"=>"Outdoor Pool Pumps","38"=>"Baby Pool","39"=>"Boom Barrier","40"=>"Solar Fencing","41"=>"CCTV","42"=>"Gas Bank & Chambers"); ?>
        
        <div class="">
            <table width="100%" border="1" cellspacing="0" class="primary-table1  <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo 'equadditionin'; } } ?>">
                <tbody>
                <tr>
                	<th colspan="9" style="font-size:14px;padding:6px 0px;text-align:center;"> <span><?php echo get_sitename($ikey); ?> - </span> Equipment Status as on <span><?php echo  $report_on ?></span></th>
                </tr>
                <tr>
                    <th rowspan="2">Category </th>
                    <th rowspan="2">S.No </th>
                    <th rowspan="2">Description</th>
                    <th rowspan="2">Total</th>
                    <th rowspan="2">Not Working</th>
                    <th colspan="3" style="text-align:center;">Pumps Status</th>
                    <th rowspan="2">Total Downtime (Hrs). of Equipment </th>
                </tr>
                <tr>
                    <th>Auto</th>
                    <th>Manual</th>
                    <th>Off</th>
                </tr>
                
                
                    <tr>
                        <td rowspan="4"><b>Electrical Distribution System (HT)</b></td>
                        <td class="text-center"><b>1</b></td>
                        <td class="sarlef"><b>3 Panel</b> </td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mis3panel'])) echo $validation[$ikey]['mis3panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['3panel_nw'])) echo $misres[$ikey]['3panel_nw']; ?><?php if(isset($misprevious[$ikey]['3panel_nw'])) { if((int)$misprevious[$ikey]['3panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['3panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['3panel_dtm'])) echo $misres[$ikey]['3panel_dtm']; ?></span> </td>
                        
                    </tr>
                    
                    <tr>
                        <td class="text-center"><b>2</b></td>
                        <td class="sarlef"><b>4 Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mis4panel'])) echo $validation[$ikey]['mis4panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['4panel_nw'])) echo $misres[$ikey]['4panel_nw']; ?><?php if(isset($misprevious[$ikey]['4panel_nw'])) { if((int)$misprevious[$ikey]['4panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['4panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['4panel_dtm'])) echo $misres[$ikey]['4panel_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td class="text-center"><b>3</b></td>
                        <td class="sarlef"><b>CTPT</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misctpt'])) echo $validation[$ikey]['misctpt']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['ctpt_nw'])) echo $misres[$ikey]['ctpt_nw']; ?><?php if(isset($misprevious[$ikey]['ctpt_nw'])) { if((int)$misprevious[$ikey]['ctpt_nw'] > 0 ) echo  "(".$misprevious[$ikey]['ctpt_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['ctpt_dtm'])) echo $misres[$ikey]['ctpt_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>4</b></td>
                        <td class="sarlef"><b>5 Panel</b> </td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mis5panel'])) echo $validation[$ikey]['mis5panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['5panel_nw'])) echo $misres[$ikey]['5panel_nw']; ?><?php if(isset($misprevious[$ikey]['5panel_nw'])) { if((int)$misprevious[$ikey]['5panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['5panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['5panel_dtm'])) echo $misres[$ikey]['5panel_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td rowspan="12"><b>Electrical Distribution System(LT)</b></td>
                        <td class="text-center"><b>5</b></td>
                        <td class="sarlef"><b>Transformers</b> </td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mistransformers'])) echo $validation[$ikey]['mistransformers']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['transformer_nw'])) echo $misres[$ikey]['transformer_nw']; ?><?php if(isset($misprevious[$ikey]['transformer_nw'])) { if((int)$misprevious[$ikey]['transformer_nw'] > 0 ) echo  "(".$misprevious[$ikey]['transformer_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['transformer_dtm'])) echo $misres[$ikey]['transformer_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td class="text-center"><b>6</b></td>
                        <td class="sarlef"><b>Main Pcc Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mismainpccpanel'])) echo $validation[$ikey]['mismainpccpanel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['mainpcc_nw'])) echo $misres[$ikey]['mainpcc_nw']; ?><?php if(isset($misprevious[$ikey]['mainpcc_nw'])) { if((int)$misprevious[$ikey]['mainpcc_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mainpcc_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['mainpcc_dtm'])) echo $misres[$ikey]['mainpcc_dtm']; ?></span> </td>
                        
                    </tr>
                
                
                
                    <tr>
                        <td class="text-center"><b>7</b></td>
                        <td class="sarlef"><b>APFCR</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misapfcr'])) echo $validation[$ikey]['misapfcr']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['apfcr_nw'])) echo $misres[$ikey]['apfcr_nw']; ?><?php if(isset($misprevious[$ikey]['apfcr_nw'])) { if((int)$misprevious[$ikey]['apfcr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['apfcr_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['apfcr_dtm'])) echo $misres[$ikey]['apfcr_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td class="text-center"><b>8</b></td>
                        <td class="sarlef"><b>Common Supply Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['miscommsuppanel'])) echo $validation[$ikey]['miscommsuppanel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['common_supply_nw'])) echo $misres[$ikey]['common_supply_nw']; ?><?php if(isset($misprevious[$ikey]['common_supply_nw'])) { if((int)$misprevious[$ikey]['common_supply_nw'] > 0 ) echo  "(".$misprevious[$ikey]['common_supply_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['common_supply_dtm'])) echo $misres[$ikey]['common_supply_dtm']; ?></span> </td>
                        
                    </tr>
                    
                    <tr>
                        <td class="text-center"><b>9</b></td>
                        <td class="sarlef"><b>Bus Duct</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misbusduct'])) echo $validation[$ikey]['misbusduct']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['bus_duct_nw'])) echo $misres[$ikey]['bus_duct_nw']; ?><?php if(isset($misprevious[$ikey]['bus_duct_nw'])) { if((int)$misprevious[$ikey]['bus_duct_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bus_duct_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['bus_duct_dtm'])) echo $misres[$ikey]['bus_duct_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td class="text-center"><b>10</b></td>
                        <td class="sarlef"><b>Distribution Board</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misdistriboard'])) echo $validation[$ikey]['misdistriboard']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['distribu_board_nw'])) echo $misres[$ikey]['distribu_board_nw']; ?><?php if(isset($misprevious[$ikey]['distribu_board_nw'])) { if((int)$misprevious[$ikey]['distribu_board_nw'] > 0 ) echo  "(".$misprevious[$ikey]['distribu_board_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['distribu_board_dtm'])) echo $misres[$ikey]['distribu_board_dtm']; ?></span> </td>
                        
                    </tr>
                    
                    
                    <tr>
                        <td class="text-center"><b>11</b></td>
                        <td class="sarlef"><b>VCB</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misvcb'])) echo $validation[$ikey]['misvcb']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['vcb_nw'])) echo $misres[$ikey]['vcb_nw']; ?><?php if(isset($misprevious[$ikey]['vcb_nw'])) { if((int)$misprevious[$ikey]['vcb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['vcb_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['vcb_dtm'])) echo $misres[$ikey]['vcb_dtm']; ?></span> </td>
                        
                    
                    </tr>
                
                
                    <tr>
                        <td class="text-center"><b>12</b></td>
                        <td class="sarlef"><b>ACB</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misacb'])) echo $validation[$ikey]['misacb']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['acb_nw'])) echo $misres[$ikey]['acb_nw']; ?><?php if(isset($misprevious[$ikey]['acb_nw'])) { if((int)$misprevious[$ikey]['acb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['acb_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['acb_dtm'])) echo $misres[$ikey]['acb_dtm']; ?></span> </td>
                        
                    
                    </tr>
                    
                    <tr>
                        <td class="text-center"><b>13</b></td>
                        <td class="sarlef"><b>Landscape Lighting Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mislandpanel'])) echo $validation[$ikey]['mislandpanel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['landscape_lpanel_nw'])) echo $misres[$ikey]['landscape_lpanel_nw']; ?><?php if(isset($misprevious[$ikey]['landscape_lpanel_nw'])) { if((int)$misprevious[$ikey]['landscape_lpanel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['landscape_lpanel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['landscape_lpanel_dtm'])) echo $misres[$ikey]['landscape_lpanel_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>14</b></td>
                        <td class="sarlef"><b>Club House Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['ch_panel'])) echo $validation[$ikey]['ch_panel']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['club_house_panel_nw'])) echo $misres[$ikey]['club_house_panel_nw']; ?><?php if(isset($misprevious[$ikey]['club_house_panel_nw'])) { if((int)$misprevious[$ikey]['club_house_panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['club_house_panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['club_house_panel_dtm'])) echo $misres[$ikey]['club_house_panel_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>15</b></td>
                        <td class="sarlef"><b>Lighting Arrestor</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mislightarestr'])) echo $validation[$ikey]['mislightarestr']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['lighting_arrestor_nw'])) echo $misres[$ikey]['lighting_arrestor_nw']; ?><?php if(isset($misprevious[$ikey]['lighting_arrestor_nw'])) { if((int)$misprevious[$ikey]['lighting_arrestor_nw'] > 0 ) echo  "(".$misprevious[$ikey]['lighting_arrestor_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['lighting_arrestor_dtm'])) echo $misres[$ikey]['lighting_arrestor_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>16</b></td>
                        <td class="sarlef"><b>Total No. Of Lights</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mistotlightsnum'])) echo $validation[$ikey]['mistotlightsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['tot_no_lights_nw'])) echo $misres[$ikey]['tot_no_lights_nw']; ?><?php if(isset($misprevious[$ikey]['tot_no_lights_nw'])) { if((int)$misprevious[$ikey]['tot_no_lights_nw'] > 0 ) echo  "(".$misprevious[$ikey]['tot_no_lights_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['tot_no_lights_dtm'])) echo $misres[$ikey]['tot_no_lights_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td rowspan="4"><b>Elevators & Backup Power</b></td>
                        <td class="text-center"><b>17</b></td>
                        <td class="sarlef"><b>Lifts</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['lifsnum'])) echo $validation[$ikey]['lifsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['lifts_nw'])) echo $misres[$ikey]['lifts_nw']; ?><?php if(isset($misprevious[$ikey]['lifts_nw'])) { if((int)$misprevious[$ikey]['lifts_nw'] > 0 ) echo  "(".$misprevious[$ikey]['lifts_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['lifts_dtm'])) echo $misres[$ikey]['lifts_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>18</b></td>
                        <td class="sarlef"><b>DG Sets</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['dgsetsnum'])) echo $validation[$ikey]['dgsetsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['dg_sets_nw'])) echo $misres[$ikey]['dg_sets_nw']; ?><?php if(isset($misprevious[$ikey]['dg_sets_nw'])) { if((int)$misprevious[$ikey]['dg_sets_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dg_sets_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['dg_sets_dtm'])) echo $misres[$ikey]['dg_sets_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>19</b></td>
                        <td class="sarlef"><b>ARD Batteries</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misfullbkp'])) echo $validation[$ikey]['misfullbkp']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['full_bkp_dtm'])) echo $misres[$ikey]['full_bkp_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>20</b></td>
                        <td class="sarlef"><b>Partial / Full Backup</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mispartialbkp'])) echo $validation[$ikey]['mispartialbkp']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['partial_bkp_dtm'])) echo $misres[$ikey]['partial_bkp_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td><b>Ground Water Source</b></td>
                        <td class="text-center"><b>21</b></td>
                        <td class="sarlef"><b>Borewells</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['borewellsnum'])) echo $validation[$ikey]['borewellsnum']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['bore_wells_nw'])) echo $misres[$ikey]['bore_wells_nw']; ?><?php if(isset($misprevious[$ikey]['bore_wells_nw'])) { if((int)$misprevious[$ikey]['bore_wells_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bore_wells_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['bore_wells_dtm'])) echo $misres[$ikey]['bore_wells_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td><b>Metro Water Supply</b></td>
                        <td class="text-center"><b>22</b></td>
                        <td class="sarlef"><b>HMWS & SB Meter</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mishmws'])) echo $validation[$ikey]['mishmws']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['hmws_nw'])) echo $misres[$ikey]['hmws_nw']; ?><?php if(isset($misprevious[$ikey]['hmws_nw'])) { if((int)$misprevious[$ikey]['hmws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['hmws_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['hmws_dtm'])) echo $misres[$ikey]['hmws_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td rowspan="4"><b>Water Distribution System</b></td>
                        <td class="text-center"><b>23</b></td>
                        <td class="sarlef"><b>DWS</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misdws'])) echo $validation[$ikey]['misdws']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['water_ds_dtm'])) echo $misres[$ikey]['water_ds_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>24</b></td>
                        <td class="sarlef"><b>FWS</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misfws'])) echo $validation[$ikey]['misfws']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['fws_dtm'])) echo $misres[$ikey]['fws_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>25</b></td>
                        <td class="sarlef"><b>PRV's</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misprv'])) echo $validation[$ikey]['misprv']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['prvs_nw'])) echo $misres[$ikey]['prvs_nw']; ?><?php if(isset($misprevious[$ikey]['prvs_nw'])) { if((int)$misprevious[$ikey]['prvs_nw'] > 0 ) echo  "(".$misprevious[$ikey]['prvs_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['prvs_dtm'])) echo $misres[$ikey]['prvs_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>26</b></td>
                        <td class="sarlef"><b>Sewerage System</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['missewaragesys'])) echo $validation[$ikey]['missewaragesys']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['sewerage_dtm'])) echo $misres[$ikey]['sewerage_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td rowspan="3"><b>Landscape Water Distribution</b></td>
                        <td class="text-center"><b>27</b></td>
                        <td class="sarlef"><b>Irrigation Pumps</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misirrigationpumps'])) echo $validation[$ikey]['misirrigationpumps']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_nw'])) echo $misres[$ikey]['irrigatn_pmp_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_pmp_nw'])) { if((int)$misprevious[$ikey]['irrigatn_pmp_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_pmp_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_dtm'])) echo $misres[$ikey]['irrigatn_pmp_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>28</b></td>
                        <td class="sarlef"><b>Irrigation Pump Panels</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misirrigationpmppan'])) echo $validation[$ikey]['misirrigationpmppan']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_panel_nw'])) echo $misres[$ikey]['irrigatn_pmp_panel_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_pmp_panel_nw'])) { if((int)$misprevious[$ikey]['irrigatn_pmp_panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_pmp_panel_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_pmp_panel_dtm'])) echo $misres[$ikey]['irrigatn_pmp_panel_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>29</b></td>
                        <td class="sarlef"><b>Irrigation Sprinkler Automation System</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misirrgsprinkautosys'])) echo $validation[$ikey]['misirrgsprinkautosys']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['irrigatn_spr_as_dtm'])) echo $misres[$ikey]['irrigatn_spr_as_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td rowspan="2"><b>Water Features</b> </td>
                        <td class="text-center"><b>30</b></td>
                        <td class="sarlef"><b>Water Body Pumps</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['miswatrbodypumps'])) echo $validation[$ikey]['miswatrbodypumps']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['water_body_pumps_nw'])) echo $misres[$ikey]['water_body_pumps_nw']; ?><?php if(isset($misprevious[$ikey]['water_body_pumps_nw'])) { if((int)$misprevious[$ikey]['water_body_pumps_nw'] > 0 ) echo  "(".$misprevious[$ikey]['water_body_pumps_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['water_body_pumps_dtm'])) echo $misres[$ikey]['water_body_pumps_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>31</b></td>
                        <td class="sarlef"><b>Fountain</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mismistfoun'])) echo $validation[$ikey]['mismistfoun']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['mist_fountain_nw'])) echo $misres[$ikey]['mist_fountain_nw']; ?><?php if(isset($misprevious[$ikey]['mist_fountain_nw'])) { if((int)$misprevious[$ikey]['mist_fountain_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mist_fountain_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['mist_fountain_dtm'])) echo $misres[$ikey]['mist_fountain_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td rowspan="2"><b>De-watering System</b></td>
                        <td class="text-center"><b>32</b></td>
                        <td class="sarlef"><b>Storm Water Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misstromwaterpump'])) echo $validation[$ikey]['misstromwaterpump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_nw'])) echo $misres[$ikey]['strm_Water_nw']; ?><?php if(isset($misprevious[$ikey]['strm_Water_nw'])) { if((int)$misprevious[$ikey]['strm_Water_nw'] > 0 ) echo  "(".$misprevious[$ikey]['strm_Water_nw'].")"; } ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_auto'])) echo $misres[$ikey]['strm_Water_auto']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_man'])) echo $misres[$ikey]['strm_Water_man']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_off'])) echo $misres[$ikey]['strm_Water_off']; ?></span></td>
                        <?php /*?><td colspan="3"><span><?php if(isset($misres[$ikey]['strm_Water_auto'])) echo $misres[$ikey]['strm_Water_auto']."-A<br>". $misres[$ikey]['strm_Water_man']."-M<br>".$misres[$ikey]['strm_Water_off']."-Off"; ?></span></td><?php */?>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_dtm'])) echo $misres[$ikey]['strm_Water_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>33</b></td>
                        <td class="sarlef"><b>Oozing Pumps</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misoozingpump'])) echo $validation[$ikey]['misoozingpump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_nw'])) echo $misres[$ikey]['oozing_pump_nw']; ?><?php if(isset($misprevious[$ikey]['oozing_pump_nw'])) { if((int)$misprevious[$ikey]['oozing_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['oozing_pump_nw'].")"; } ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_auto'])) echo $misres[$ikey]['oozing_pump_auto']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_man'])) echo $misres[$ikey]['oozing_pump_man']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_off'])) echo $misres[$ikey]['oozing_pump_off']; ?></span></td>
                        <?php /*?>  <td colspan="3"><span><?php if(isset($misres[$ikey]['oozing_pump_auto'])) echo $misres[$ikey]['oozing_pump_auto']."-A<br>". $misres[$ikey]['oozing_pump_man']."-M<br>".$misres[$ikey]['oozing_pump_off']."-Off"; ?></span></td><?php */?>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_dtm'])) echo $misres[$ikey]['oozing_pump_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td rowspan="2"><b>Rain Water System</b></td>
                        <td class="text-center"><b>34</b></td>
                        <td class="sarlef"><b>Excess Rain Water Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misexsrainwatpmp'])) echo $validation[$ikey]['misexsrainwatpmp']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['excess_rain_wt_nw'])) echo $misres[$ikey]['excess_rain_wt_nw']; ?><?php if(isset($misprevious[$ikey]['excess_rain_wt_nw'])) { if((int)$misprevious[$ikey]['excess_rain_wt_nw'] > 0 ) echo  "(".$misprevious[$ikey]['excess_rain_wt_nw'].")"; } ?></span> </td> 	
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_auto'])) echo $misres[$ikey]['excess_rain_wt_auto']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_man'])) echo $misres[$ikey]['excess_rain_wt_man']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_off'])) echo $misres[$ikey]['excess_rain_wt_off']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_dtm'])) echo $misres[$ikey]['excess_rain_wt_dtm']; ?></span> </td>
                        <!--<td><span></span></td>-->
                    </tr>
                    <tr>
                        <td class="text-center"><b>35</b></td>
                        <td class="sarlef"><b>Rain Water Harvesting Pits</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misrainharvest'])) echo $validation[$ikey]['misrainharvest']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['rain_water_har_nw'])) echo $misres[$ikey]['rain_water_har_nw']; ?><?php if(isset($misprevious[$ikey]['rain_water_har_nw'])) { if((int)$misprevious[$ikey]['rain_water_har_nw'] > 0 ) echo  "(".$misprevious[$ikey]['rain_water_har_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['rain_water_har_dtm'])) echo $misres[$ikey]['rain_water_har_dtm']; ?></span> </td>
                        
                    </tr> 
                    <tr>
                        <td rowspan="3"><b>Swimming Pool</b></td> 
                        <td class="text-center"><b>36</b></td>
                        <td class="sarlef"><b>Indoor Pool Pumps</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misindoorpool'])) echo $validation[$ikey]['misindoorpool']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['mis_indoorpool_nw'])) echo $misres[$ikey]['mis_indoorpool_nw']; ?></span></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['indoor_dtm'])) echo $misres[$ikey]['indoor_dtm']; ?></span> </td>
                        
                    
                    </tr> 
                    <tr>
                        <td class="text-center"><b>37</b></td>
                        <td class="sarlef"><b>Outdoor Pool Pumps</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misoutdoorpool'])) echo $validation[$ikey]['misoutdoorpool']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['mis_outdoorpool_nw'])) echo $misres[$ikey]['mis_outdoorpool_nw']; ?></span></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['outdoor_dtm'])) echo $misres[$ikey]['outdoor_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>38</b></td>
                        <td class="sarlef"><b>Baby Pool</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misbabypool'])) echo $validation[$ikey]['misbabypool']; ?></span> </td>
                        <td></td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['baby_dtm'])) echo $misres[$ikey]['baby_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td rowspan="3"><b>Security</b></td>
                        <td class="text-center"><b>39</b></td>
                        <td class="sarlef"><b>Boom Barrier</b></td>  
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misboombarrier'])) echo $validation[$ikey]['misboombarrier']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['boom_bar_nw'])) echo $misres[$ikey]['boom_bar_nw']; ?><?php if(isset($misprevious[$ikey]['boom_bar_nw'])) { if((int)$misprevious[$ikey]['boom_bar_nw'] > 0 ) echo  "(".$misprevious[$ikey]['boom_bar_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['boom_bar_dtm'])) echo $misres[$ikey]['boom_bar_dtm']; ?></span> </td>
                        
                    </tr>
                
                    <tr>
                        <td class="text-center"><b>40</b></td>
                        <td class="sarlef"><b>Solar Fencing(Zones)</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['missolarfencingzone'])) echo $validation[$ikey]['missolarfencingzone']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['solar_fen_nw'])) echo $misres[$ikey]['solar_fen_nw']; ?><?php if(isset($misprevious[$ikey]['solar_fen_nw'])) { if((int)$misprevious[$ikey]['solar_fen_nw'] > 0 ) echo  "(".$misprevious[$ikey]['solar_fen_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['solar_fen_dtm'])) echo $misres[$ikey]['solar_fen_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td class="text-center"><b>41</b></td>
                        <td class="sarlef"><b>CCTV</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['miscctv'])) echo $validation[$ikey]['miscctv']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['cctv_nw'])) echo $misres[$ikey]['cctv_nw']; ?><?php if(isset($misprevious[$ikey]['cctv_nw'])) { if((int)$misprevious[$ikey]['cctv_nw'] > 0 ) echo  "(".$misprevious[$ikey]['cctv_nw'].")"; } ?></span> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['cctv_dtm'])) echo $misres[$ikey]['cctv_dtm']; ?></span> </td>
                        
                    </tr>
                    <tr>
                        <td><b>Reticulated Piped Gas</b></td>
                        <td class="text-center"><b>42</b></td>
                        <td class="sarlef"><b>Gas Bank & Chambers</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misgasbankcham'])) echo $validation[$ikey]['misgasbankcham']; ?></span> </td>
                        <td> </td>
                        <td colspan="3"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['gas_bank_chambr_dtm'])) echo $misres[$ikey]['gas_bank_chambr_dtm']; ?></span> </td>
                        
                    </tr>
                
                
                </tbody>
            </table>
        <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<div class='cote-i'><b>Note:</b></div><div class='note-information'>".$misres[$ikey]['additional_info']."</div>"; } } ?></div>
        </div>  
    
    
    
    </div>
                    
      
  </body>
</html>

