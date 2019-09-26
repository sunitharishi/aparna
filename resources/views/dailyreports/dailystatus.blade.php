<table class="table-striped1 table">

					<thead class="thead-dark head-color">

					<tr>

					  <th>Community</th> 

					  <th style="text-align:center;">Fire Safety</th>

					  <th style="text-align:center;">FMS</th>

					  <th style="text-align:center;">PMS</th>

					  <th style="text-align:center;">Security</th>

					  <th>Action</th>

					</tr>
                    
                    

					</thead>

                    <tbody>

                    

                     @if (count($sites_attr_names) > 0)



                        @foreach ($sites_attr_names as $sk => $client)

                           <tr>

					  <td><b>{{ $client }}</b></td>   
                      <?php $resarr =  $res_Status[$sk]; ?>

					  <td align="center"><?php if($sk == '8' || $sk == '14' || $sk == '16' || $sk == '19' || $sk == '17' || $sk == '87') { echo "<b>"."NA"."</b>"; } else  {?><i class="fa <?php if($resarr[0] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" aria-hidden="true"></i> <?php } ?></td>

					  <td align="center"><i class="fa <?php if($resarr[1] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa <?php if($resarr[2] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa <?php if($resarr[3] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" aria-hidden="true"></i></td>

					   <!--<th>--><!--<button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>--> <!--<button type="button" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> <!--Print</button>--> <!--<button type="button" class="btn btn-download btn-xs">--><!--<i class="fa fa-download" aria-hidden="true"></i>--> <!--Download</button>--><!--</th>-->
                      
                       <th><button type="button" id="expandarr_{{ $sk }}" class="open" onclick="setval({{ $sk }})"><i class="fa fa-angle-double-down" aria-hidden="true"></i> <i class="fa fa-angle-double-up" aria-hidden="true" style="display:none;"></i></button></th>

					</tr>
                    
                        <tr style="display:none;" id="row_{{ $sk }}" class="showmore">
                        
					  <td colspan="3">
                         <table class="intablener">
                           <tbody> 
                           	   <?php if(getlogperms('edit_firesafety') || getlogperms('view_fire_safety') || getlogperms('print_fire_safety') || getlogperms('download_fire_safety')) { ?>
                               <tr>
                                  <td><b>Fire Safety</b></td>  
								  
					              <td align="center" class="conticons"><?php if(getlogperms_tdays($chkdate)){ ?>@if(getlogperms_daily('edit_firesafety'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" data_id="{{ $sk }}" onclick="getedit_firesafe_val({{ $sk }});"></i> @endif<?php } else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>@if(getlogperms('view_fire_safety'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_firesafe_val({{ $sk }});"></i>@endif @if(getlogperms('print_fire_safety'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_firesafe_val({{ $sk }});"></i>  @endif @if(getlogperms('download_fire_safety'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_firesafe_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_fms') || getlogperms('view_fms') || getlogperms('print_fms') || getlogperms('download_fms')) { ?>
                               <tr> 
                                 <td><b>FMS</b></td>
                                 <td align="center" class="conticons"><?php if(getlogperms_tdays($chkdate)){ ?>@if(getlogperms_daily('edit_fms'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_fms_val({{ $sk }});"></i>@endif<?php } else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>@if(getlogperms('view_fms'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_fms_val({{ $sk }});"></i>@endif @if(getlogperms('print_fms'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_fms_val({{ $sk }});"></i>@endif  @if(getlogperms('download_fms'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_fms_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_pms') || getlogperms('view_pms') || getlogperms('print_pms') || getlogperms('download_pms')) { ?>
                               <tr> 
                                 <td><b>PMS</b></td>
                                 <td align="center" class="conticons"><?php if(getlogperms_tdays($chkdate)){ ?>@if(getlogperms_daily('edit_pms'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_pms_val({{ $sk }});"></i> @endif<?php } else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>@if(getlogperms('view_pms'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_pms_val({{ $sk }});"></i> @endif @if(getlogperms('print_pms'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_pms_val({{ $sk }});"></i>  @endif @if(getlogperms('download_pms'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_pms_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_security') || getlogperms('view_security') || getlogperms('print_security') || getlogperms('download_security')) { ?>
                               <tr> 
                                 <td><b>Security</b></td>
                                 <td align="center" class="conticons"><?php if(getlogperms_tdays($chkdate)){ ?>@if(getlogperms_daily('edit_security'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_secr_val({{ $sk }});"></i>@endif<?php } else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?> @if(getlogperms('view_security'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_secr_val({{ $sk }});"></i>@endif @if(getlogperms('print_security'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_secr_val({{ $sk }});"></i>@endif  @if(getlogperms('download_security'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_secr_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_horticulture') || getlogperms('view_horticulture') || getlogperms('print_horticulture') || getlogperms('download_horticulture')) { ?>
                               <tr> 
                                 <td><b>Horticulture</b></td>
                                  <td align="center" class="conticons"><?php if(getlogperms_tdays($chkdate)){ ?>@if(getlogperms_daily('edit_horticulture'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_horti_val({{ $sk }});"></i>@endif<?php } else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?> @if(getlogperms('view_horticulture'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_horti_val({{ $sk }});"></i>@endif @if(getlogperms('print_horticulture'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_secr_val({{ $sk }});"></i>@endif  @if(getlogperms('download_horticulture'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_secr_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                            </tbody>
                         </table>
                      </td> 
                      
                      <td></td>
                        <td></td>
                        <td></td>
					</tr>

                        

                         @endforeach



                   @endif

                   </tbody>

					</table>