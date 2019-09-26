<div class="security-solarfencing">
<table border="1" class="apms-reporttable">
		<thead>
			  <tr>
			  <th>S.No</th>
			  <th>Project Name</th>
			  <th>Date</th>
			  <th>Zone1</th>
			  <th>Zone2</th>
			  <th>Zone3</th>
			  <th>Zone4</th>
			  <th>T.Kit</th>
			  <th>Observation</th>
		   </tr>
		</thead>
		<tbody>
			 <?php  $i = 1; ?>
			 @if (count($auditresult) > 0)
			@foreach ($auditresult as $kk => $client)
			  @if (count($client) > 0)
			   @foreach ($client as $tt)
			   <tr>
				  <td><?php echo $i; ?></td>
				  <td>{{ $sites[$kk] }}</td>
				  <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
				  <td><?php echo $tt->sf_zone1; ?></td> 
				  <td><?php echo $tt->sf_zone2; ?></td> 
				  <td><?php echo $tt->sf_zone3; ?></td> 
				  <td><?php echo $tt->sf_zone4; ?></td> 
				  <td><?php echo $tt->sf_tkit; ?></td>
				  <td>Yes</td>
			   </tr>
			   <?php  $i++; ?>
		   	   @endforeach		   	   
		   	   
		     @endif
			@endforeach
		@else 
			<tr>
				<td colspan="11">No Solar fencing notworking status found</td>
			</tr>
		@endif
		</tbody>
	</table>
</div>