		<div class="scan-table">
		    @if (count($categories) > 0)
			
			   	
                       	<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                        <tr style="background:#334454; color:#FFFFFF;">
					     <th> Category</th>
						 <th> Total </th>
						 <th> Uploaded </th>
						 <th> Not Yet </th>
						 <th> Present </th>
						 <th> Absent </th>
                         </tr>
					   

                        @foreach ($categories as $kk => $asset)  
						
						  <tr>
                            <td> 
						    {{ $asset }}  
						    </td>
                             <td>
						    {{ $empcount[$kk] }} 
                             </td>
                             <td> 
							{{ $uploadedcn[$kk] }} 
                             </td>
                            <td onclick="notenteredcount(<?php echo $kk; ?>);">
							{{ $notenteredcn[$kk] }} 
                             </td>
                             <td onclick="getpresentcount(<?php echo $kk; ?>);">
							{{ $presentcn[$kk] }} 
                             </td>
                             <td onclick="getabsentcount(<?php echo $kk; ?>);"> 
							{{ $absentcn[$kk] }}  
						  </td>
                          </tr>
                          
						
						    @endforeach

                    @else

                        <tr>

                            <td colspan="11">No entries in table</td>

                        </tr>

                    @endif
                    </table>
		</div>
	<div class="modal fade" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content popup-employee-present">
          <div class="modal-header">
            <button type="button" class="close remedies" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title presen-label" 
            id="favoritesModalLabel">Status - Present List</h4>
          </div>
          <div class="modal-body more-notenteredlost">
          
            <div class="row" id="popes">
          
			
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sectionModal2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close remedies" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title presen-label" 
            id="favoritesModalLabel">Status - Absent List</h4>
          </div>
          <div class="modal-body more-notenteredlost">
          
            <div class="row" id="popes2">
           
		  
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sectionModal3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close remedies" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title presen-label" 
            id="favoritesModalLabel">Status - Not Entered List</h4>
          </div>
          <div class="modal-body more-notenteredlost">
          
            <div class="row" id="popes3">
           
		  
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
          </div>
        </div>
    </div>
</div>