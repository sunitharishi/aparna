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

	*

	{

	 font-family:Arial, Helvetica, sans-serif;

	}

	/*.rotarey td:last-child, .rotarey th:last-child,

	.stpequadditionin td:last-child, .stpequadditionin th:last-child,

	.chlorine-dosing-pump td:last-child, .chlorine-dosing-pump th:last-child

	{

		line-height:14px !important;

	} */

    .rotarey tbody tr th

	{

	 padding:8px 5px;

	text-align:center;

	vertical-align:middle;

	font-size:13px;

	

	}

	.rotarey tbody tr td

	{

	 padding:8px 5px;

	text-align:center;

	font-size:13px;

	

	}

	.stpequadditionin tbody tr th

	{

	 padding:8px 5px;

	 

	}

	 .codel-infoirmation .note-information

	 {

	  width:auto;

	  float:left;

	 }

	 

	.stpequadditionin tbody tr td

	{

	 padding:7.5px 5px;

	 

	}

	

	

	table tr td.sarlef

	{

	text-align:left;

	}

	

	.chlorine-dosing-pump tbody tr td

	{

	 font-size:14px;

	 padding:17px 5px;

	  

	}

	.chlorine-dosing-pump tbody tr td.text-center

	{

	 text-align:center;

	}

	.chlorine-dosing-pump tbody tr:nth-child(2)

	{

	 vertical-align:middle;

	}

	.chlorine-dosing-pump tbody tr th

	{

	 font-size:14px;

	 padding:17px 5px;

	

	}

	.codel-infoirmation

	{

	 font-size:12px;

	 margin-top:2px;

	}

	.codel-infoirmation b

	{

	 float:left;

	 margin-right:4px;

	 font-size:12px;

	 

	}

	.codel-infoirmation .note-information p

	{

	 font-size:12px;

	 margin-top:0px;

	}

	.rotarey tr td.text-left

	{

	 text-align:center;

	 min-height:25px;

	}

	.manjeera table tr td

	{

		line-height:14px;

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

            <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;padding:0px;">

              <div class="x_panel tile fixed_height_400">

                <div class="x_title">

                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->

                </div>

                <div class="x_content">

                	<!--<div class="land-scaping">

                    	<h4><b>Land Scaping</b></h4>

                    </div>  -->

                    

                    <div class="manjeera">

					 <?php $keysarray =array("1"=>"Bar Screen Chamber","2"=>"Raw Sewage Pumps","3"=>"Air Blowers","4"=>"Return Sludge Pumps","5"=>"Filter Feed Pumps","6"=>"Screw / Centrifuge Feed Pumps","7"=>"Centrifuge / Filter Press","8"=>"De-watering Pump","9"=>"Air Handling Unit","10"=>"Chlorine Dosing Pump","11"=>"UV System","12"=>"Hydro Pneumatic Pumps","13"=>"Pneumatic System Panel","14"=>"STP MCC Panel","15"=>"Pressure Sand Filter","16"=>"Activated Carbon Filter"); ?> 

                          

                        <div>

                      <table width="100%" border="1" cellspacing="0" style="font-size:11px;text-align:center;" class="rotarey <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo 'stpequadditionin'; } } ?>">

                                <tbody>
                        <tr>
                            <th colspan="6" style="font-size:14px;padding:6px 0px;text-align:center;">  <span style="font-size:14px;"><?php echo get_sitename($ikey); ?> - </span>STP Equipment Status </th>
                        </tr>
                        <tr>
                            <th style="width:80px;" rowspan="2">Category </th>
                            <th style="width:50px;" rowspan="2">S.No </th>
                            <th rowspan="2">Description </th>
                            <th colspan="2"><?php if(isset($validation[$ikey]['stpmiscapacity'])) echo "Capacity - ".$validation[$ikey]['stpmiscapacity']; ?></th>
                            <th rowspan="2" style="padding:1px;">Total Downtime (Hrs/days) of all Equipment </th>
                        </tr>
                        
                        <tr>
                            <th style="width:65px;">Total  </th>
                            <th>Not Working</th>
                        </tr>
                        
                        
                        <tr>
                            <td rowspan="12"><b>Electro-<br>Mechanical<br> Equipment</b> </td>
                            <td><b>1</b></td>
                            <td class="sarlef"><b>Bar Screen Chamber</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpbarscreencham'])) echo $validation[$ikey]['stpbarscreencham']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['bar_scr_chbr_nw'])) echo $misres[$ikey]['bar_scr_chbr_nw']; ?><?php if(isset($misprevious[$ikey]['bar_scr_chbr_nw'])) { if((int)$misprevious[$ikey]['bar_scr_chbr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bar_scr_chbr_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['bar_scr_chbr_dtm'])) echo $misres[$ikey]['bar_scr_chbr_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>2</b></td>
                            <td class="sarlef"><b>Raw Sewage Pumps</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stprawsewagepump'])) echo $validation[$ikey]['stprawsewagepump']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['raw_sav_pmp_nw'])) echo $misres[$ikey]['raw_sav_pmp_nw']; ?><?php if(isset($misprevious[$ikey]['raw_sav_pmp_nw'])) { if((int)$misprevious[$ikey]['raw_sav_pmp_nw'] > 0 ) echo  "(".$misprevious[$ikey]['raw_sav_pmp_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['raw_sav_pmp_dtm'])) echo $misres[$ikey]['raw_sav_pmp_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        <tr>
                            <td><b>3</b></td>
                            <td class="sarlef"><b>Air Blowers</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpairbowlers'])) echo $validation[$ikey]['stpairbowlers']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['air_blow_nw'])) echo $misres[$ikey]['air_blow_nw']; ?><?php if(isset($misprevious[$ikey]['air_blow_nw'])) { if((int)$misprevious[$ikey]['air_blow_nw'] > 0 ) echo  "(".$misprevious[$ikey]['air_blow_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['air_blow_dtm'])) echo $misres[$ikey]['air_blow_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>4</b></td>
                            <td class="sarlef"><b>Return Sludge Pumps</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpretsludpumps'])) echo $validation[$ikey]['stpretsludpumps']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['retrn_sludge_nw'])) echo $misres[$ikey]['retrn_sludge_nw']; ?><?php if(isset($misprevious[$ikey]['retrn_sludge_nw'])) { if((int)$misprevious[$ikey]['retrn_sludge_nw'] > 0 ) echo  "(".$misprevious[$ikey]['retrn_sludge_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['retrn_sludge_dtm'])) echo $misres[$ikey]['retrn_sludge_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td><b>5</b></td>
                            <td class="sarlef"><b>Filter Feed Pumps</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpfilterfeedpump'])) echo $validation[$ikey]['stpfilterfeedpump']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['filter_feed_nw'])) echo $misres[$ikey]['filter_feed_nw']; ?><?php if(isset($misprevious[$ikey]['filter_feed_nw'])) { if((int)$misprevious[$ikey]['filter_feed_nw'] > 0 ) echo  "(".$misprevious[$ikey]['filter_feed_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['filter_feed_dtm'])) echo $misres[$ikey]['filter_feed_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>6</b></td>
                            <td class="sarlef"><b>Screw / Centrifuge Feed Pumps</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpscrewpumps'])) echo $validation[$ikey]['stpscrewpumps']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['screw_cent_nw'])) echo $misres[$ikey]['screw_cent_nw']; ?><?php if(isset($misprevious[$ikey]['screw_cent_nw'])) { if((int)$misprevious[$ikey]['screw_cent_nw'] > 0 ) echo  "(".$misprevious[$ikey]['screw_cent_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['screw_cent_dtm'])) echo $misres[$ikey]['screw_cent_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>7</b></td>
                            <td class="sarlef"><b>Centrifuge / Filter Press</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpcentrifilpress'])) echo $validation[$ikey]['stpcentrifilpress']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['centri_filter_nw'])) echo $misres[$ikey]['centri_filter_nw']; ?><?php if(isset($misprevious[$ikey]['centri_filter_nw'])) { if((int)$misprevious[$ikey]['centri_filter_nw'] > 0 ) echo  "(".$misprevious[$ikey]['centri_filter_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['centri_filter_dtm'])) echo $misres[$ikey]['centri_filter_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>8</b></td>
                            <td class="sarlef"><b>De-watering Pump</b></td>
                            <td><span><?php if(isset($validation[$ikey]['stpdewaterpump'])) echo $validation[$ikey]['stpdewaterpump']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['de_Water_nw'])) echo $misres[$ikey]['de_Water_nw']; ?><?php if(isset($misprevious[$ikey]['de_Water_nw'])) { if((int)$misprevious[$ikey]['de_Water_nw'] > 0 ) echo  "(".$misprevious[$ikey]['de_Water_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['de_Water_dtm'])) echo $misres[$ikey]['de_Water_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        <tr>
                            <td><b>9</b></td>
                            <td class="sarlef"><b>Air Handling Unit</b> </td>
                            <td><span><?php if(isset($validation[$ikey]['stphairhandunit'])) echo $validation[$ikey]['stphairhandunit']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['air_handling_nw'])) echo $misres[$ikey]['air_handling_nw']; ?><?php if(isset($misprevious[$ikey]['air_handling_nw'])) { if((int)$misprevious[$ikey]['air_handling_nw'] > 0 ) echo  "(".$misprevious[$ikey]['air_handling_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['air_handling_dtm'])) echo $misres[$ikey]['air_handling_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        <tr>
                            <td><b>10</b></td>
                            <td class="sarlef"><b>Chlorine Dosing Pump</b></td>
                            <td><span><?php if(isset($validation[$ikey]['chlorinedosingpump'])) echo $validation[$ikey]['chlorinedosingpump']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['chlorine_dos_nw'])) echo $misres[$ikey]['chlorine_dos_nw']; ?><?php if(isset($misprevious[$ikey]['chlorine_dos_nw'])) { if((int)$misprevious[$ikey]['chlorine_dos_nw'] > 0 ) echo  "(".$misprevious[$ikey]['chlorine_dos_nw'].")"; } ?></span> </td>
                            <td class="text-left"> <span><?php if(isset($misres[$ikey]['chlorine_dos_dtm'])) echo $misres[$ikey]['chlorine_dos_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>11</b></td>
                            <td class="sarlef"><b>UV System </b></td>
                            <td><span><?php if(isset($validation[$ikey]['uvsystem'])) echo $validation[$ikey]['uvsystem']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['uv_sys_nw'])) echo $misres[$ikey]['uv_sys_nw']; ?><?php if(isset($misprevious[$ikey]['uv_sys_nw'])) { if((int)$misprevious[$ikey]['uv_sys_nw'] > 0 ) echo  "(".$misprevious[$ikey]['uv_sys_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['uv_sys_dtm'])) echo $misres[$ikey]['uv_sys_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>12</b></td>
                            <td class="sarlef"><b>Hydro Pneumatic Pumps</b></td>
                            <td><span><?php if(isset($validation[$ikey]['hydronumaticpump'])) echo $validation[$ikey]['hydronumaticpump']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['hydro_numa_nw'])) echo $misres[$ikey]['hydro_numa_nw']; ?><?php if(isset($misprevious[$ikey]['hydro_numa_nw'])) { if((int)$misprevious[$ikey]['hydro_numa_nw'] > 0 ) echo  "(".$misprevious[$ikey]['hydro_numa_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['hydro_numa_dtm'])) echo $misres[$ikey]['hydro_numa_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td rowspan="2"><b>Electrical<br> Panels</b> </td>
                            <td><b>13</b></td>
                            <td class="sarlef"><b>Pneumatic System Panel</b></td>
                            <td><span><?php if(isset($validation[$ikey]['pneumaticsyspanel'])) echo $validation[$ikey]['pneumaticsyspanel']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['pnumatic_sys_nw'])) echo $misres[$ikey]['pnumatic_sys_nw']; ?><?php if(isset($misprevious[$ikey]['pnumatic_sys_nw'])) { if((int)$misprevious[$ikey]['pnumatic_sys_nw'] > 0 ) echo  "(".$misprevious[$ikey]['pnumatic_sys_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['pnumatic_sys_dtm'])) echo $misres[$ikey]['pnumatic_sys_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>14</b></td>
                            <td class="sarlef"><b>STP MCC Panel</b> </td>
                            <td><span><?php if(isset($validation[$ikey]['stpmccpanel'])) echo $validation[$ikey]['stpmccpanel']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['stp_mcc_nw'])) echo $misres[$ikey]['stp_mcc_nw']; ?><?php if(isset($misprevious[$ikey]['stp_mcc_nw'])) { if((int)$misprevious[$ikey]['stp_mcc_nw'] > 0 ) echo  "(".$misprevious[$ikey]['stp_mcc_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['stp_mcc_dtm'])) echo $misres[$ikey]['stp_mcc_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        
                        
                        <tr>
                            <td rowspan="2"><b>Filtration</b></td>
                            <td><b>15</b></td>
                            <td class="sarlef"><b>Pressure Sand Filter</b></td>
                            <td><span><?php if(isset($validation[$ikey]['pressuresandfilter'])) echo $validation[$ikey]['pressuresandfilter']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['pressure_san_nw'])) echo $misres[$ikey]['pressure_san_nw']; ?><?php if(isset($misprevious[$ikey]['pressure_san_nw'])) { if((int)$misprevious[$ikey]['pressure_san_nw'] > 0 ) echo  "(".$misprevious[$ikey]['pressure_san_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['pressure_san_dtm'])) echo $misres[$ikey]['pressure_san_dtm']; ?></span> </td>
                        </tr>
                        
                        <tr>
                            <td><b>16</b></td>
                            <td class="sarlef"><b>Activated Carbon Filter</b> </td>
                            <td><span><?php if(isset($validation[$ikey]['activatedcarbonfilter'])) echo $validation[$ikey]['activatedcarbonfilter']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['act_carb_nw'])) echo $misres[$ikey]['act_carb_nw']; ?><?php if(isset($misprevious[$ikey]['act_carb_nw'])) { if((int)$misprevious[$ikey]['act_carb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['act_carb_nw'].")"; } ?></span> </td>
                            <td class="text-left"><span><?php if(isset($misres[$ikey]['act_carb_dtm'])) echo $misres[$ikey]['act_carb_dtm']; ?></span> </td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td colspan="6"><b>Flow details in Kilo Liters(KL)/Day</b></td>
                            <!-- <th colspan="2"> Sarovar</th>-->
                        </tr>
                        
                        <tr>
                            <td rowspan="5"><b>Flow Details</b></td>
                            <td><b>17</b></td>
                            <td class="sarlef"><b>Average Inflow</b></td>
                            <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_inflow'])) echo $misres[$ikey]['avg_inflow']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['avg_inflow_dtm'])) echo $misres[$ikey]['avg_inflow_dtm']; ?></span> </td>
                            <td class="text-left"><span></span></td>
                        </tr>
                        
                        <tr>
                            <td><b>18</b></td>
                            <td class="sarlef"><b>Average Outflow to garden / fire / flush</b></td>
                            <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_out_flow'])) echo $misres[$ikey]['avg_out_flow']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['avg_out_flow_dtm'])) echo $misres[$ikey]['avg_out_flow_dtm']; ?></span> </td>
                            <td class="text-left"><span></span></td>
                        </tr>
                        
                        <tr>
                            <td><b>19</b></td>
                            <td class="sarlef"><b>Surplus Treated Water Outlet</b> </td>
                            <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_bypass'])) echo $misres[$ikey]['avg_bypass']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['avg_bypass_dtm'])) echo $misres[$ikey]['avg_bypass_dtm']; ?></span> </td>
                            <td class="text-left"><span></span></td>
                        </tr>
                        
                        <tr>  
                            <td><b>20</b></td>
                            <td class="sarlef"><b>Average Outflow to other sites</b> </td>
                            <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_outflow_other'])) echo $misres[$ikey]['avg_outflow_other']; ?></span> </td>
                            <td><span><?php if(isset($misres[$ikey]['avg_outflow_other_dtm'])) echo $misres[$ikey]['avg_outflow_other_dtm']; ?></span> </td>
                            <td class="text-left"><span></span></td>
                        </tr>
                        <tr>   
                            <td><b>21</b></td>
                            <td class="sarlef"><b>Sludge Extracted(Kgs)</b> </td>
                            <td>
                                <?php echo getmtdfms($report_on,$ikey,'stp_sludge'); ?>
                            </td>
                            <td></td>
                            <!--  <td>{!! Form::text('avg_outflow_other_dtm',(isset($res['avg_outflow_other_dtm'])) ? $res['avg_outflow_other_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>-->
                            <td class="text-left"></td>
                        </tr>  
                        
                        
                        <tr>
                            <td colspan="3" class="sarlef"><b>Next filter media replacement date</b></td>
                            <td><span><?php if(isset($validation[$ikey]['nextfilterreplacement'])) echo $validation[$ikey]['nextfilterreplacement']; ?></span> </td>
                            <td></td>
                            <td class="text-left"><span></span></td>
                        </tr>
                        
                    </tbody>

                      </table>

                       <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div>
                       </div>
                       
                       
                       <?php /*?><?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); ?>	
                       <div class="codel-infoirmation" style="display:flex;"><span style="position:absolute; left:0px;"><b>Note:</b></span> <span style="position:absolute;margin-left:80px; padding-left:80px;"><?php if($te) { echo $misres[$ikey]['additional_info']; } ?></span></div>

                      </div>  
						<?php } ?><?php */?>

						

						<?php //echo "page -".$pagenumberval; ?>

                       	

                        

                     

                      

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



