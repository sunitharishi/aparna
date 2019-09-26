@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss">
            <span>Indent</span>
            
       <p class="under-ptagh">
         <a href="{{ route('indents.create') }}" class="btn btn-new" style="float:left;">Add</a>
       </p>

        </div>   
          
        <div class="panel-body indents-section">
           <div class="indentreport-table">
            <table id="dTableColSearch" class="table table-bordered datatable table-striped ckient-serever insearch {{ count($assets) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>S.No</th>
						<th>Community</th>
                       <th>Item Code</th>
                       <!-- <th style="width:162px;">Title</th>-->
                        <th>Item Status</th> 
						 <th>Request Status</th>                       
                        <th>Action</th>
						 <th>Last Updated</th>
                    </tr>
                </thead>
                <thead>   
                    <tr class="plachelolder">
                        <td style="border-bottom:0px;"></td>
						 <td style="border-bottom:0px;"></td>
						  <td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1" /></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe1" /></td>
                       <!-- <td class="wkkdd"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>-->
                        <td class="wkkdd"></td>
                        <td style="border-bottom:0px;"></td>
                    </tr> 
                </thead>
                <tbody>  
                    @if (count($assets) > 0) <?php $i = 0; ?>
                        @foreach ($assets as $client) <?php $i = $i + 1; ?>
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                 <td> <?php echo $i; ?></td>
								 
                                 <td>{{ get_sitename($client->site) }}</td>
								 
                                 <td>{{ $client->item_code }}</td>
                                
                               <!-- <td>{{ $client->title }}</td>-->
								 <td>
								<!-- <a href="{{ route('indents.approveIndent',[$client->id]) }}"><i id="fmsstaus" class="fa fa-check" aria-hidden="true"></i></a>
									  <a href="{{ route('indents.rejectIndent',[$client->id]) }}"><i id="fmsstaus" class="fa fa-times" aria-hidden="true"></i></a>-->
								 
								     
								  <i id="fmsstaus" class="fa <?php if($client->item_status == ''){ echo "fa-spinner"; } else if($client->item_status == 'Approved'){echo "fa-check";}else {echo "fa-times";} ?> " aria-hidden="true"> </i>
                               
								 </td> 
								 <td class="spinnerlsl"><button type="button" id="download_firesafe" class="btn btn-download btn-xs"><?php if($client->request_status == '') { echo "Opened"; ?> <?php if((Auth::user()->id == $client->user_id || Auth::user()->id == 1) && ($client->item_status == 'Approved') ) { ?> <i class="fa fa-spinner" onclick="showmodal(<?php echo $client->id;  ?>)"></i> <?php  } ?> <?php } else { ?>{{ $client->request_status }} <?php } ?></button></td>
                                 
                                <td class="show-efittt" style="width:160px;"> 
                                    <a href="{{ route('indents.show',[$client->id]) }}" class="btn btn-xs btn-success"><!--<i class="fa fa-eye" aria-hidden="true"></i>-->View</a>
									 
                                     <?php if(($client->item_status) && getlogperms('approve_permission')){ ?> <a href="{{ route('indents.edit',[$client->id]) }}" class="btn btn-xs btn-inverse"><!--<i class="fa fa-pencil" aria-hidden="true"></i>-->Edit</a> <?php } elseif( Auth::user()->id == '1' || ((Auth::user()->id == $client->user_id) && $client->item_status == '' )) { ?><a href="{{ route('indents.edit',[$client->id]) }}" class="btn btn-xs btn-inverse"><!--<i class="fa fa-pencil" aria-hidden="true"></i>-->Edit</a><?php  } ?>
                                 <?php if(Auth::user()->id == '1' || ((Auth::user()->id == $client->user_id) && $client->item_status == '')) { ?> {!! Form::open(array(  
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE', 
                                                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                                'route' => ['indents.destroy', $client->id])) !!}
                                   <!-- <input type="submit" value="" class="suaria-hidden">-->{{ Form::button('Delete', array('class' => 'btn btn-xs btn-danger', 'type' => 'submit')) }}
                                    {!! Form::close() !!} <?php  } ?> </td>  
									 <?php $old_date_timestamp = strtotime($client->updated_at);
                                          $new_date = date('d-m-Y g:i a', $old_date_timestamp);  ?>     
									 <td>{{ $new_date }}</td>
                            </tr>
                        @endforeach
                    @else 
                        <tr> 
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table> 
           </div>
			
            
        </div>
    </div>
	
	<div class="modal fade" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title light-heading" 
            id="favoritesModalLabel">Request Status</h4>
          </div>
          <div class="modal-body">
		  <div class="view_model" style="display:none">
            <div class="row">
              <!--<div class="col-xs-2 form-group" style="text-align: center;">-->
                    <input type="hidden" name="requestid" value="" id="requestid">
               <!-- </div>-->
				  <div class="col-xs-12 form-group light-descruiotion"> 
				
                 <label>Description:</label>     {!! Form::text('request_description', '', ['class' => 'form-control',  'placeholder' => '', 'id' => 'request_description']) !!}
                    
                </div>
		  
               
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
              <span class="pull-right">
                  <button type="button" class="btn  secsave btn-seconfd" onclick="getDeiselsum();">Save</button>
                 
             </span>
          </div>
		  </div>
		  
        </div>
    </div>
</div>

<?php // END MODEL ?>
              



            </div>
   @include('partials.footer')
@stop 

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('indents.mass_destroy') }}';
    </script>
	 @if(getlogperms('approve_permission'))
	 <script>
		window.route_mass_crud_entries_approve = '{{ route('indents.mass_approve') }}';
    </script>
	
	 <script>
		window.route_mass_crud_entries_reject = '{{ route('indents.mass_reject') }}';
    </script>
	@endif
	<script>
	 function showmodal(id){
	 
	     $.ajax({ 

				type: "get", 

				cache:false,
				
				dataType: "json",

				url: '{{ route('indents.getindentrequest') }}',

				data: { id: id},

				success: function( response ) {
				
				 
				    if(response['editstatus'] == '0'){
					 $(".view_model").show();
					 $("#requestid").val(id);
					 $("#request_description").val(response['request_description']);
				 }
				 
				  if(response['editstatus'] == '1'){
					$(".view_model").show();
					 $("#requestid").val(id);
					 $("#request_description").val(response['request_description']);
					
				 }
				}

        });
		
	   $("#sectionModal").modal();
	 }
	 
	 function getDeiselsum(){
	 
	   var id= $("#requestid").val();
	   var request_description= $("#request_description").val(); 
	   
	   $.ajax({ 

				type: "get", 

				cache:false,
				
				dataType: "json",

				url: '{{ route('indents.updateindentrequest') }}',

				data: { id: id, request_description:request_description},

				success: function( response ) {
				
				 $("#sectionModal").hide();
				 document.location.reload() 
				  
				}

        });
		 
		
	 }
	</script>
@endsection