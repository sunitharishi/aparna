@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss">
            <span>Tasks</span>
             @if(getlogperms('add_task'))
       <p class="under-ptagh">
       
        <!--<a href="{{ route('tasks.calview') }}" class="btn-primary task-calendar" title="Calendar" style="float:left;">Schedule</a> <a href="{{ route('tasks.create') }}" class="btn btn-new" style="float:left;">Add</a>-->
        <a href="/tplancalendar" class="btn-primary task-calendar" title="Calendar" style="float:left;">Schedule</a> <a href="{{ route('tasks.create') }}" class="btn btn-new" style="float:left;">Add</a>
       </p>
    @endif
        </div>
          
        <div class="panel-body tasks-section">
            <table id="dTableColSearch" class="table table-bordered table-striped ckient-serever insearch {{ count($assets) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                       <!-- <th style="width:30px;">S.No</th>
                        <th>Date</th>-->
                       <th>Code</th>
                       <th style="width:80px;">Category</th>
                        <th style="width:500px;">Title</th>
                        <th>Priority</th>
                        <th style="width:75px;">Status</th>                       
                        <th>Action</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="plachelolder">
                        <td style="border-bottom:0px;"></td>
                        <!--<td style="border-bottom:0px;"></td>
                        <td style="border-bottom:0px;"></td>-->
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="1" class="reposnsciefe1"/></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1"</td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe" /></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="5" class="reposnsciefe1" /></td>
                        <td style="border-bottom:0px;"></td>
                    </tr> 
                </thead>
                <tbody>
                    @if (count($assets) > 0)
                        @foreach ($assets as $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                <!-- <td></td>
                                 <td></td>-->
                                 <td>{{ $client->tcode }}</td>
                                  <td>{{ (isset($client->catgname)?$client->catgname:'') }}</td>
                                <td class="dekkipsis"><a href="{{ route('tasks.show',[$client->id]) }}">{{ $client->title }}</a></td>
                                <td>{{ $client->priority }}</td>
                                <td>{{ $client->status }}</td>
                                <td class="show-efittt" style="width:160px;">
                                    @if(getlogperms('view_task'))<a href="{{ route('tasks.show',[$client->id]) }}" class="btn btn-xs btn-success"><!--<i class="fa fa-eye" aria-hidden="true"></i>-->View</a>@endif
                                    @if(getlogperms('edit_task'))<a href="{{ route('tasks.edit',[$client->id]) }}" class="btn btn-xs btn-inverse"><!--<i class="fa fa-pencil" aria-hidden="true"></i>-->Edit</a>@endif
                                    @if(getlogperms('delete_task')){!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE', 
                                                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                                'route' => ['tasks.destroy', $client->id])) !!}
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