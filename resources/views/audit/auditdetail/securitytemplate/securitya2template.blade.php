<div class="security-divfor">
<table border="1" class="apms-reporttable">
		<thead>
			  <tr>
			  <th>S.No</th>
			  <th>Project Name</th>
			  <th>Date</th>
			  <th>Maids</th>
			  <th>Drivers</th>
			  <th>Vendors</th>
			  <th>Construction Workers</th>
			  <th>Interiors</th>
			  <th>Others</th>
		</thead>
		<tbody>
			 
			 @if (count($auditresult) > 0)
			@foreach ($auditresult as $kk => $client)
			  @if (count($client) > 0)	
			  <?php  $i = 1; ?>		   
			   @foreach ($client as $tt)
			   <tr>
				  <td><?php echo $i; ?></td>
				  <td>{{ $sites[$kk] }}</td>
				  <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
				  <td><?php if(isset($tt->aw_maid))echo $tt->aw_maid; ?></td> 
				  <td><?php if(isset($tt->aw_dri))echo $tt->aw_dri; ?></td> 
				  <td><?php if(isset($tt->aw_ven))echo $tt->aw_ven; ?></td> 
				  <td><?php if(isset($tt->aw_cons_workers))echo $tt->aw_cons_workers; ?></td> 
				  <td><?php if(isset($tt->aw_inte))echo $tt->aw_inte; ?></td> 
				  <td><?php if(isset($tt->aw_others))echo $tt->aw_others; ?></td>
			   </tr>
		   	   <?php  $i++; ?>
		   	   @endforeach
		     @endif
			@endforeach			
	   	   @else 
				<tr>
					<td colspan="11">No Securityguards found without idcards</td>
				</tr>
			@endif
		</tbody>
	</table>
</div>