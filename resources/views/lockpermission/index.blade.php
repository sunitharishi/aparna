@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss">
            <span>Lock Permission</span>
            
       <p class="under-ptagh">
        <!-- <a href="{{ route('dailyreports.createlockpermission') }}" class="btn btn-new" style="float:left;">Add</a>-->
       </p> 
	   <div class="approvesection"></div>

        </div>   
          
        <div class="panel-body">
            <table id="dTableColSearch" class="table table-bordered datatable table-striped ckient-serever insearch {{ count($users) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead>
                    <tr style="background-color:#334454;color:#fff;">
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>S.No</th>
                       <th>User Name</th>
					   <th>Email</th>
					   <th>Lock Status</th>
                       
                    
                    </tr>
                </thead>
                <thead>   
                    <tr class="plachelolder">
                        <td style="border-bottom:0px;"></td>
						 <td style="border-bottom:0px;"></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1" /></td>
						 <td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe1" /></td>
                       
                       
                      
                    </tr> 
                </thead>
                <tbody>  
                    @if (count($users) > 0) <?php $i = 0; ?>
                        @foreach ($users as $client) <?php $i = $i + 1; ?>
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                 <td> <?php echo $i; ?></td>  
                                 
                                 <td>{{ getlogeedname($client->id) }}</td>
								  <td>{{ $client->email }}</td>  
								   <td><?php if($perstatus[$client->id] > 0){ if($lstatus[$client->id]['lockstatus'] == 'approved') {echo "Un Locked";} if($lstatus[$client->id]['lockstatus'] == 'rejected') {echo "Locked";} } else {echo "Locked";}?></td>
                                
                               
								   
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
	
	
   @include('partials.footer')
@stop
@section('javascript')
 

	 <script> 
		window.route_mass_crud_entries_lockapprove = '{{ route('indents.mass_approvepermission') }}';
		window.route_mass_crud_entries_lockreject = '{{ route('indents.mass_rejectpermission') }}';
    </script>
	
	


@endsection
  

