<div  class="daily-brieftying-meeting">
<table border="1" class="apms-reporttable">
		<thead>
			  <tr>
			  		<th colspan="4">&nbsp;
			  			
			  		</th>
			  		<th colspan="6" align="center">
			  			<b>Morning</b>
			  		</th>
			  		<th colspan="6" align="center">
			  			<b>Evening</b>
			  		</th>
			  </tr>
			  <tr>
			  <th>S.No</th>
			  <th>Project Name</th>
			  <th>Date</th>
			  <th>Total no of Physical attendance</th>
			  <th>Guard</th>
			  <th>Lady Guard</th>
			  <th>Head Guard</th>
			  <th>Sec Sup</th>
			  <th>ASO</th>
			  <th>SO</th>
			  <th>Guard</th>
			  <th>Lady Guard</th>
			  <th>Head Guard</th>
			  <th>Sec Sup</th>
			  <th>ASO</th>
			  <th>SO</th>
		</thead>
		<tbody>
			 
			 @if (count($auditresult) > 0)
			<?php  $i = 1; $pattendance = 0; ?>		   
			@foreach ($auditresult as $kk => $client)
			  @if (count($client) > 0)	
			   @foreach ($client as $tt)
			   <?php 
			   		$pha_guard = (int)$tt->pha_guard;
					$pha_lguard = (int)$tt->pha_lguard;
					$pha_hguard = (int)$tt->pha_hguard;
					$pha_sup = (int)$tt->pha_sup;
					$pha_aso = (int)$tt->pha_aso;
					$pha_so = (int)$tt->pha_so;
					
					if($pha_guard>0) $pattendance = $pattendance+$pha_guard;
					if($pha_lguard>0) $pattendance = $pattendance+$pha_lguard;
					if($pha_hguard>0) $pattendance = $pattendance+$pha_hguard;
					if($pha_sup>0) $pattendance = $pattendance+$pha_sup;
					if($pha_aso>0) $pattendance = $pattendance+$pha_aso;
					if($pha_so>0) $pattendance = $pattendance+$pha_so; 
			   ?>
			   <tr>
				  <td><?php echo $i; ?></td>
				  <td>{{ $sites[$kk] }}</td>
				  <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
				  <td><?php echo $pattendance; ?></td>
				  <td><?php if(isset($tt->bm_guard)) echo $tt->bm_guard; ?></td> 
				  <td><?php if(isset($tt->bm_lguard))echo $tt->bm_lguard; ?></td> 
				  <td><?php if(isset($tt->bm_hguard))echo $tt->bm_hguard; ?></td> 
				  <td><?php if(isset($tt->bm_sup))echo $tt->bm_sup; ?></td> 
				  <td><?php if(isset($tt->bm_aso))echo $tt->bm_aso; ?></td> 
				  <td><?php if(isset($tt->bm_so))echo $tt->bm_so; ?></td>
				  <td><?php if(isset($tt->ae_guard))echo $tt->ae_guard; ?></td> 
				  <td><?php if(isset($tt->ae_lguard))echo $tt->ae_lguard; ?></td> 
				  <td><?php if(isset($tt->ae_hguard))echo $tt->ae_hguard; ?></td> 
				  <td><?php if(isset($tt->ae_sup))echo $tt->ae_sup; ?></td> 
				  <td><?php if(isset($tt->ae_aso))echo $tt->ae_aso; ?></td> 
				  <td><?php if(isset($tt->ae_so))echo $tt->ae_so; ?></td>
			   </tr>
		   	   <?php  $i++; ?>
		   	   @endforeach
		     @endif
			@endforeach			
	   	   @else 
				<tr>
					<td colspan="16">No Securityguards found without idcards</td>
				</tr>
			@endif
		</tbody>
	</table>
  </div>