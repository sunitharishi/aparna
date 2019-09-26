<?php 	
	$editAction = "";
	/*if($userid==1 || $userid==3 ||  $userid==25 || $userid==27 || $userid==61 || $userid==29 || $userid==41 || $userid==47 || $userid==57 || $userid==84 || $userid==93)
	{
		$editAction = "On";
	}
	else
	{
		$editAction = "On";
	}*/
	$role_id = Auth::user()->role_id;
	if($role_id==1 || $role_id==17 || $userid==15 || $userid==11)
	{
		$editAction = "On";
	}
	else
	{
		$editAction = "On";
	}
	//echo $editAction;
 ?>
<table class="table table-striped2 report-status-work zebra-crossingtable">  
					<thead class="thead-dark head-color" > 
					<tr> 
					  <th>Report</th> 
					  <?php /*?><th style="padding-left:0px;">Status</th><?php */?>
					  <th>Action</th> 
					
					</tr> 
					</thead>
                     @if(Auth::user()->id == 1)
					<tbody>
					 <tr> 
					  <td><b>Metro water Report</b></td>
					  <?php /*?><td><!--<i class="fa fa-check" aria-hidden="true"></i>--></td><?php */?>
					   <th class="misadg"><div id="watesedit" class="edt"><button type="button" id="watereditbtn" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt" style="float:left;padding:0px 8px 0px -8px;"><button type="button" style="margin-left:0px !Important;" id="metrowaedit" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs" id="metroprint"> Print</button> <button id="metrowdownload" type="button" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr> 
					 <tr>
					  <td><b>Water source and consumption</b></td>
					  <?php /*?><td><!--<i class="fa fa-times" aria-hidden="true"></i>--></td><?php */?>
					  <th class="misadg"><div id="consedit" class="edt"><button type="button" id="conseditbtn" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt qwwww"><button type="button" id="waterconview" class="btn btn-success btn-xs">View</button></div><button type="button" id="waterconprint" class="btn btn-print btn-xs">Print</button><button type="button" id="watercondownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
                     <tr>
					  <td><b>STP Flush water report</b></td>
					 <?php /*?> <td><!--<i class="fa fa-times" aria-hidden="true"></i>--></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="consedit" class="edt"><button type="button" id="flushseditbtn" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><div id="target2" class="edt qwwww"><button type="button" id="flushview" class="btn btn-success btn-xs">View</button></div><button type="button" id="flushprint" class="btn btn-print btn-xs">Print</button><button type="button" id="flushdownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Borewells not working status</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['borewellsnw'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="borewellnwedt" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="borewellnwview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="borewlnwprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="brewlnwdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>
					 <tr>
					  <td><b>Fire safety status</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['firesafety'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button id="firesafeedit" type="button" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" class="btn btn-success btn-xs" id="firesafemisview">View</button></div><button type="button" id="firesafemisprint" class="btn btn-print btn-xs borewln"> Print</button> <button type="button" id="firesafedownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Electro Mechanical Equipment status</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['euipmendata'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="equipmentedit" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" id="equpmentview" class="btn btn-success btn-xs">View</button><button type="button" id="equipmentprint" class="btn btn-print btn-xs borewln">Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="equpmentdownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>STP Status</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['stpstatus'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="stpedit" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" class="btn btn-success btn-xs" id="stpmisview">View</button></div><button type="button" id="stpprint" class="btn btn-print btn-xs borewln"> Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="stpdownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>WSP Status</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['wspstatus'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="wspedit" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button id="wspmisview" type="button" class="btn btn-success btn-xs">View</button></div><button type="button"  id="wspprint" class="btn btn-print btn-xs borewln"> Print</button><button type="button" class="btn btn-download btn-xs boredow" id="wspdownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>CMD vs RMD</b></td>
					 <?php /*?> <td><i class="fa <?php if((int)$misstatus['cmdstatus'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="cmdedit" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button id="cmdmisview" type="button" class="btn btn-success btn-xs">View</button></div><button type="button"  id="cmdprint" class="btn btn-print btn-xs borewln"> Print</button><button type="button" class="btn btn-download btn-xs boredow" id="cmddownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Security Report</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['security'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="missecureedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2"  class="edt"><button type="button" id="missecureview" class="btn btn-success btn-xs">View</button></div><button type="button" id="secprint" class="btn btn-print btn-xs borewln"> Print</button>  <button type="button" id="securitydownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
                    <tr>
					  <td><b>Traffic Movement</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['traffic'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<div id="target4" class="edt">--><!--<button id="trafficedit" type="button" class="btn btn-inverse btn-xs">Edit</button>--><!--</div>--><div id="target2" class="edt traffic"><button type="button" id="mistrafficview" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs borewln" id="trafficprint"> Print</button> <button type="button" id="trafficdownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Housekeeping Report</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['hskp'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" class="btn btn-inverse btn-xs" id="housekeepedit"> Edit</button></div><div id="target2" class="edt"><button type="button" id="housekeepview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/9" target="_blank">--><button type="button" id="housekeepprint" class="btn btn-print btn-xs borewln"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <button type="button" class="btn btn-download btn-xs boredow" id="hskpdownload"><!--<i class="fa fa-download" aria-hidden="true"></i> -->Download</button></th>
					</tr>
					 <tr>
					  <td><b>Horticulture Report</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['horticulture'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="horticultureedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="horticultureview" class="btn btn-success btn-xs">View</button></div><button type="button" id="horticultureprint" class="btn btn-print btn-xs borewln">Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="horticulturedownload"> Download</button></th>
					</tr>  
					 <tr>
					  <td><b>Club House Utilization Data</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['clubhouse'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<div id="target4" class="edt"><button type="button" id="clubutiledit" class="btn btn-inverse btn-xs"> Edit</button></div>--><div id="target2" class="edt"><button type="button" id="clubutilview" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs borewln" id="clubutilprint"> Print</button> <button type="button" id="clubutilviewdownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Occupancy Data</b></td>
					 <?php /*?> <td><i class="fa <?php if((int)$misstatus['euipmendata'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" id="occupancy_status" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><button type="button" id="occupncview" class="btn btn-success btn-xs occupancy-date">View</button><button type="button" class="btn btn-print btn-xs borewln" id="occupncprint"> Print</button>  <button type="button" id="occupncdownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr> 
					  <td><b>Indented Material Status</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['indented'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="indented" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" id="indentedview" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs borewln" id="indentedprint"> Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="indenteddownload"> Download</button></th>
					</tr>
					 <tr> 
					  <td><b>Apna Complex Complaint Report</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['apnacomplaint'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="apnacompview"  class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" id="apnacompviewde" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs borewln" id="apnacompprint">Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="apnacompdownload">Download</button></th>
					</tr>
					 <tr> 
					  <td><b>Fire Mock Drill</b></td>
					  <?php /*?><td><i class="fa <?php if((int)$misstatus['firemockdrill'] > 0) echo 'fa-times'; else echo 'fa-check'; ?>" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="mocdrilledit" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" id="mockdrillview" class="btn btn-success btn-xs">View</button></div> <button type="button" class="btn btn-print btn-xs borewln" id="mockdrillprint"> Print</button>  <button type="button" class="btn btn-download btn-xs boredow" id="mockdrilldownload">Download</button></th>
					</tr>
                     <tr> 
					  <td><b>Fire Safety Preparedness & Fire Alarm Operation Training</b></td>
					  <?php /*?><td><i class="fa fa-times" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="fireprepareedit" class="btn btn-inverse btn-xs"> Edit</button></div><div id="target2" class="edt"><button type="button" id="fireprepareview" class="btn btn-success btn-xs">View</button></div> <button type="button" class="btn btn-print btn-xs borewln" id="fireprepareprint">Print</button>  <button type="button" class="btn btn-download btn-xs boredow" id="firepreparedownload">Download</button></th>
					</tr>
					</tbody>
                    @else
                    <tbody> 
                    <?php if(getlogperms('print_metro_water_report') != "" || getlogperms('view_metro_water_report') != "" || getlogperms('download_metro_water_report') != "") { ?>
					 <tr> 
                     
					  <td>Metro water Report</td>
					   <th class="misadg"><?php if(getlogperms('print_metro_water_report')){ ?><button type="button" class="btn btn-print btn-xs" id="metroprint"> Print</button> <?php }if(getlogperms('view_metro_water_report')){ ?> <button type="button" id="metrowaedit" class="btn btn-success btn-xs">View</button></div><?php }if(getlogperms('download_metro_water_report')){ ?> <button type="button" id="metrowdownload" class="btn btn-download btn-xs boredow"> Download</button><?php } ?></th>
					</tr> <?php } ?>
                    <?php if(getlogperms('edit_water_source_consump') != "" || getlogperms('view_water_source_consump') != "" || getlogperms('print_water_source_consump') != "" || getlogperms('download_water_source_consump') != "") { ?>
					 <tr>
					  <td>Water source and consumption</td>
					  <?php /*?><td><i class="fa fa-times" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_water_source_consump')){ ?><?php if($editAction=='On'){ ?><div id="consedit" class="edt"><button type="button" id="conseditbtn" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/2"><div id="target2" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div></a>--><?php }if(getlogperms('view_water_source_consump')){ ?><!-- <a href="http://aparna.greaterkakinada.com/getmisreportpreview/2">--><div id="target2" class="edt viewclass"><button type="button" id="waterconview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_water_source_consump')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/2" target="_blank">--><button type="button" id="waterconprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_water_source_consump')){ ?> <button type="button" id="watercondownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                  <?php } if(getlogperms('edit_borewell_not_work_Status') != "" || getlogperms('view_borewell_not_work_Status') != "" || getlogperms('print_borewell_not_work_Status') != "" || getlogperms('download_borewell_not_work_Status')) { ?>
					 <tr>
					  <td>Borewell not working status</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_borewell_not_work_Status')){ ?><?php if($editAction=='On'){ ?><button type="button" id="borewellnwedt" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_borewell_not_work_Status')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/3">--><div id="target2" class="edt"><button type="button" id="borewellnwview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_borewell_not_work_Status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/3" target="_blank">--><button type="button" id="borewlnwprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--><?php }if(getlogperms('download_borewell_not_work_Status')){ ?> <button type="button" id="brewlnwdownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr> 
                       <?php } if(getlogperms('edit_fire_safety_status') != "" || getlogperms('view_fire_safety_status') != "" || getlogperms('print_fire_safety_status') != "" || getlogperms('download_fire_safety_status')) { ?>
					 <tr>
					  <td>Fire safety status</td> 
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_fire_safety_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/4">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="firesafeedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_fire_safety_status')){ ?>  <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/4">--><div id="target2" class="edt"><button type="button" id="firesafemisview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_fire_safety_status')){ ?>  <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/4" target="_blank">--><button type="button" id="firesafemisprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_fire_safety_status')){ ?>  <button type="button" id="firesafedownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>   
					</tr>
                       <?php } if(getlogperms('edit_electro_mech_equip_status') != "" || getlogperms('view_electro_mech_equip_status') != "" || getlogperms('print_electro_mech_equip_status') != "" || getlogperms('download_electro_mech_equip_status')) { ?>
					 <tr>
					  <td>Electro Mechanical Equipment status</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_electro_mech_equip_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/5">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="equipmentedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_electro_mech_equip_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/5">--><div id="target2" class="edt"><button type="button" id="equpmentview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_electro_mech_equip_status')){ ?> <!-- <a href="http://aparna.greaterkakinada.com/getmisreportprint/5" target="_blank">--><button type="button" id="equipmentprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a> --><?php }if(getlogperms('download_electro_mech_equip_status')){ ?> <button type="button" class="btn btn-download btn-xs" id="equpmentdownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                      <?php } if(getlogperms('edit_stp_status') != "" || getlogperms('view_stp_status') != "" || getlogperms('print_stp_status') != "" || getlogperms('download_stp_status')) { ?>
					 <tr>
					  <td>STP Status</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_stp_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/6">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="stpedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_stp_status')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/6">--><div id="target2" class="edt"><button type="button" id="stpmisview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_stp_status')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/6" target="_blank">--><button type="button" id="stpprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_stp_status')){ ?> <button type="button" id="stpdownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                       <?php } if(getlogperms('edit_wasp_status') != "" || getlogperms('view_wasp_status') != "" || getlogperms('print_wasp_status') != "" || getlogperms('download_wasp_status')) { ?>
					 <tr>
					  <td>WSP Status</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_wasp_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/7">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="wspedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->Edit</button></div><?php } ?><!--</a> --><?php }if(getlogperms('view_wasp_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/7">--><div id="target2" class="edt"><button type="button" id="wspmisview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <?php }if(getlogperms('print_wasp_status')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/7" target="_blank">--><button type="button"  id="wspprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_wasp_status')){ ?> <button type="button" class="btn btn-download btn-xs"  id="wspdownload"><!--<i class="fa fa-download" id="wspdownload" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                       <?php } if(getlogperms('edit_security_report') != "" || getlogperms('view_security_report') != "" || getlogperms('print_security_report') != "" || getlogperms('download_security_report')) { ?>
					   
					    <tr>
					  <td><b>CMD vs RMD</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="cmdedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button id="cmdmisview" type="button" class="btn btn-success btn-xs">View</button></div><button type="button"  id="cmdprint" class="btn btn-print btn-xs borewln"> Print</button><button type="button" class="btn btn-download btn-xs boredow" id="cmddownload"> Download</button></th>
					</tr>
					
					 <tr>
					  <td>Security Report</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_security_report')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/8"><div id="target4" class="edt">--><?php if($editAction=='On'){ ?><button type="button" id="missecureedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_security_report')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/8">--><div id="target2" class="edt"><button type="button" id="missecureview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_security_report')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/8" target="_blank">--><button type="button" id="secprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i> -->Print</button><!--</a>--><?php }if(getlogperms('download_security_report')){ ?>  <button type="button" id="securitydownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                     <tr>
					  <td>Traffic Movement</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/16">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button id="trafficedit" type="button" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/16">--><div id="target2" class="edt"><button type="button" id="mistrafficview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/16" target="_blank">--><button type="button" id="trafficprint" class="btn btn-print btn-xs borewln"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button></a>  <button type="button" id="trafficdownload" class="btn btn-download btn-xs boredow"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>
                       <?php } if(getlogperms('edit_housekeeping_report') != "" || getlogperms('view_housekeeping_report') != "" || getlogperms('print_housekeeping_report') != "" || getlogperms('download_housekeeping_report')) { ?>
					 <tr>
					  <td>Housekeeping Report</td> 
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_housekeeping_report')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/9">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="housekeepedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_housekeeping_report')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/9">--><div id="target2" class="edt"><button type="button" id="housekeepview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_housekeeping_report')){ ?><!-- <a href="http://aparna.greaterkakinada.com/getmisreportprint/9" target="_blank">--><button type="button" id="housekeepprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_housekeeping_report')){ ?> <button type="button" class="btn btn-download btn-xs" id="hskpdownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                       <?php } if(getlogperms('edit_horticulture_report') != "" || getlogperms('view_horticulture_report') != "" || getlogperms('print_horticulture_report') != "" || getlogperms('download_horticulture_report')) { ?>
					 <tr>
					  <td>Horticulture Report</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_horticulture_report')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/10">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="horticultureedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a> --><?php }if(getlogperms('view_horticulture_report')){ ?><div id="target2" class="edt"><button type="button" id="horticultureview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><?php }if(getlogperms('print_horticulture_report')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/10" target="_blank">--><button type="button" id="horticultureprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a> --><?php }if(getlogperms('download_horticulture_report')){ ?> <button type="button"  class="btn btn-download btn-xs" id="horticulturedownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                       <?php } if(getlogperms('edit_club_house_util') != "" || getlogperms('view_club_house_util') != "" || getlogperms('print_club_house_util') != "" || getlogperms('download_club_house_util')) { ?>
					 <tr>
					  <td>Club House Utilization Data</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_club_house_util')){ ?><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="clubutiledit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?> <?php }if(getlogperms('view_club_house_util')){ ?> <div id="target2" class="edt"><button type="button" id="clubutilview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div> <?php }if(getlogperms('print_club_house_util')){ ?><!--a href="http://aparna.greaterkakinada.com/getmisreportprint/11" target="_blank">--><button type="button" id="clubutilprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <?php }if(getlogperms('download_club_house_util')){ ?> <button type="button"  id="clubutilviewdownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i> -->Download</button><?php } ?></th>
					</tr>
                      <?php } if(getlogperms('edit_occupancy_data') != "" || getlogperms('view_occupancy_data') != "" || getlogperms('print_occupancy_data') != "" || getlogperms('download_occupancy_data')) { ?>
					 <tr> 
					  <td>Occupancy Data</td>
					  <?php /*?><td><i class="fa fa-times" id="occupancy_status" aria-hidden="true"></i></td>  <?php */?>
					  <th><?php if(getlogperms('edit_occupancy_data')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/12"><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div></a>--><?php }if(getlogperms('view_occupancy_data')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/12">--><div id="target2" class="edt"><button id="occupncview" type="button" class="btn btn-success btn-xs occupancy-date"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_occupancy_data')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/12" target="_blank">--><button type="button" class="btn btn-print btn-xs" id="occupncprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_occupancy_data')){ ?> <button type="button" class="btn btn-download btn-xs" id="occupncdownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                        <?php } if(getlogperms('edit_indented_material') != "" || getlogperms('view_indented_material') != "" || getlogperms('print_indented_material') != "" || getlogperms('download_indented_material')) { ?>
					 <tr> 
					  <td>Indented Material Status</td> 
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_indented_material')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/13">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="indented" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--> <?php }if(getlogperms('view_indented_material')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/13"><div id="target2" class="edt">--><button type="button" id="indentedview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <?php }if(getlogperms('print_indented_material')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/13" target="_blank">--><button type="button" class="btn btn-print btn-xs" id="indentedprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> <?php }if(getlogperms('download_indented_material')){ ?> <button type="button" id="indenteddownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                       <?php } if(getlogperms('edit_apna_complex_compl') != "" || getlogperms('view_apna_complex_compl') != "" || getlogperms('print_apna_complex_compl') != "" || getlogperms('download_apna_complex_compl')) { ?>
					 <tr>
					  <td>Apna Complex Complaint Report</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_apna_complex_compl')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/14">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="apnacompview" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--> <?php }if(getlogperms('view_apna_complex_compl')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/14">--><div id="target2" class="edt"><button type="button"  id="apnacompviewde"class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><?php }if(getlogperms('print_apna_complex_compl')){ ?> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/14" target="_blank">--><button type="button" class="btn btn-print btn-xs" id="apnacompprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--><?php }if(getlogperms('download_apna_complex_compl')){ ?>  <button type="button" id="apnacompdownload" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th>
					</tr>
                       <?php } if(getlogperms('edit_firemock_drill') != "" || getlogperms('view_firemock_drill') != "" || getlogperms('print_firemock_drill') != "" || getlogperms('download_firemock_drill')) { ?>
					 <tr> 
					  <td>Fire Mock Drill</td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th><?php if(getlogperms('edit_firemock_drill')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/15">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="mocdrilledit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><?php }if(getlogperms('view_firemock_drill')){ ?><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/15">--><div id="target2" class="edt"><button type="button" id="mockdrillview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <?php }if(getlogperms('print_firemock_drill')){ ?> <button type="button" class="btn btn-print btn-xs" id="mockdrillprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button> <?php }if(getlogperms('download_firemock_drill')){ ?> <button type="button" class="btn btn-download btn-xs" id="mockdrilldownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button><?php } ?></th> 
					</tr>
                     <tr> 
					  <td><b>Fire Safety Preparedness & Fire Alaram Operation Training</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="fireprepareedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" id="fireprepareview" class="btn btn-success btn-xs">View</button></div> <button type="button" class="btn btn-print btn-xs borewln" id="fireprepareprint">Print</button>  <button type="button" class="btn btn-download btn-xs boredow" id="firepreparedownload">Download</button></th>
					</tr>
                    <?php } ?>
					</tbody> 
                      @endif 
					</table>