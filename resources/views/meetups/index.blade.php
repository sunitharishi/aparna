@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss">
            <span>MOM</span>
             @if(getlogperms('add_task'))
       <p class="under-ptagh">
        <a href="{{ route('mom.calview') }}" class="task-calendar" title="Calendar" style="float:left;">Schedule</a> <a href="{{ route('meetups.create') }}" class="btn btn-new" style="float:left;">Add</a>
       </p>
    @endif
        </div>
          
        <div class="panel-body meetups-mom">
            <table id="dTableColSearch" class="table table-bordered table-striped ckient-serever acquiresd {{ count($assets) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <!--<th>Title</th>
                        <th style="width:100px;">Category</th>
                        <th>Code</th>
                        <th>Priority</th>
                        <th>Status</th>                       
                        <th>Action</th>-->
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Code </th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <thead>
                    <tr class="plachelolder">
                        <td></td>
                        <td></td>
                         <td></td>
                        <td class="wkkdd1"><input type="text" placeholder="Search" data-index="1" class="reposnsciefe1"/></td>
                        <td class="wkkdd1"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1" /></td>
                        <td class="wkkdd1"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe" /></td>
                        <td class="wkkdd1"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>
                        <td class="wkkdd1"><input type="text" placeholder="Search" data-index="5" class="reposnsciefe1" /></td>
                        <td></th>
                    </tr> 
                </thead>
                <tbody>
                    @if (count($assets) > 0)
                        @foreach ($assets as $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                <td></td>
                                 <td></td>
                                 <td>{{ $client->tcode }}</td>
                                 <td>{{ (isset($client->catgname)?$client->catgname:'') }}</td>
                                <td class="dekkipsis"><a href="{{ route('meetups.show',[$client->id]) }}">{{ $client->title }}</a></td>
                                
                                <td>{{ $client->priority }}</td>
                                <td>{{ $client->status }}</td>
                                <td class="show-efittt" style="width:160px;">
                                    @if(getlogperms('view_task'))<a href="{{ route('meetups.show',[$client->id]) }}" class="btn btn-xs btn-success"><!--<i class="fa fa-eye" aria-hidden="true"></i>-->View</a>@endif
                                    @if(getlogperms('edit_task'))<a href="{{ route('meetups.edit',[$client->id]) }}" class="btn btn-xs btn-inverse"><!--<i class="fa fa-pencil" aria-hidden="true"></i>-->Edit</a>@endif
                                    @if(getlogperms('delete_task')){!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE', 
                                                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                                'route' => ['meetups.destroy', $client->id])) !!}
                                   <!-- <input type="submit" value="" class="suaria-hidden">-->{{ Form::button('Delete', array('class' => 'btn btn-xs btn-danger', 'type' => 'submit')) }}
                                    {!! Form::close() !!}@endif</td>
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
        window.route_mass_crud_entries_destroy = '{{ route('sites.mass_destroy') }}';
    </script>
@endsection