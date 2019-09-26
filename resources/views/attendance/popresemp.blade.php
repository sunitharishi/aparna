 <table cellpadding="0" cellspacing="0" border="1" class="employee-proedent">
		    @if (count($presentemps) > 0)
            <thead>
			 <tr>
			  <th> S.No</th>
			  <th> Emp Code </th>
			  <th> Emp Name </th>
			 </tr>
             </thead>
                <tbody>
			 	<?php  $i = 0; 
				
				 ?>
			  @foreach($presentemps as $kk => $pemp)  
			  <?php  $i = $i + 1; ?>
             
		    <tr>
			<td> 
			    <?php echo $i;?>
			  </td>
			
			   <td> 
			    <?php if(isset($pemp['ecode'])) { echo  $pemp['ecode']; }?>
			  </td>
			  <td> 
			       <?php if(isset($pemp['name'])) { echo  $pemp['name']; }?>  
			  </td>
			  
			</tr>
                  @endforeach
				    @else

                        <tr>

                            <td colspan="11">No entries in table</td>

                        </tr>

                    @endif
			   </tbody>
		   </table>