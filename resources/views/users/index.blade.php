@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss users-lock-status">
            <span>Users</span>
            
       <p class="under-ptagh users-add-button">
        <!-- <a href="{{ route('dailyreports.createlockpermission') }}" class="btn btn-new" style="float:left;">Add</a>-->
         <a href="{{ route('users.create') }}" class="btn btn-new" style="float:left;">Add</a>
       </p> 
	   <div class="approvesection"></div>

        </div>   
          
        <div class="panel-body users-login">
            <table id="dTableColSearch" class="table table-bordered datatable table-striped ckient-serever insearch {{ count($users) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                       <th>User Name</th>
					   <th>Email</th>
                       <th>Role</th>
                        <th>Lock Status</th>
					   <th>Action</th>
                    
                    </tr>
                </thead>
                <thead>   
                    <tr class="plachelolder">
                        <td style="border-bottom:0px;"></td>
						 <td style="border-bottom:0px;"><input type="text" placeholder="Search" data-index="1" class="reposnsciefe1" /></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1" /></td>
						 <td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe1" /></td>
                         <td class="wkkdd"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>
                       
                       
                      
                    </tr> 
                </thead>
                <tbody>  
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td> 
                                <td>{{ $user->role->title or '' }}</td>
                                  <td><?php if($perarray[$user->id] > 0){ if($lstatus[$user->id]['lockstatus'] == 'approved') {echo "Un Locked";} if($lstatus[$user->id]['lockstatus'] == 'rejected') {echo "Locked";} } else {echo "Locked";}?></td>
                                
                                <td><a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-success">View</a><a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-inverse">Edit</a>@if($user->id > 1)  {!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['users.destroy', $user->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}@endif </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No entries in table</td>
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
  

