<div class="security-divfor">
<table border="1" class="apms-reporttable">
		<thead>
			  <tr>
			  <th>S.No</th>
			  <th>Project Name</th>
			  <th>Date</th>
			  <th>Night Bio Checked</th>
		   </tr>
		</thead>
		<tbody>
			 
			 @if (count($auditresult) > 0)
			 <?php  $i = 1; ?>		  
			@foreach ($auditresult as $kk => $client)
			  @if (count($client) > 0)	
			   
			   @foreach ($client as $tt)
			   <tr>
				  <td><?php echo $i; ?></td>
				  <td>{{ $sites[$kk] }}</td>
				  <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
				  <td><?php echo $tt->nbc_chk; ?></td> 
			   </tr>
		   	   <?php  $i++; ?>
		   	   @endforeach
		     @endif
			@endforeach			
	   	   @else 
				<tr>
					<td colspan="11">Security night bio checked not found</td>
				</tr>
			@endif
		</tbody>
	</table>
</div>