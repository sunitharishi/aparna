@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Items</h3>-->

   

    <div class="panel panel-default respositroy-view items">
        <div class="panel-heading">
           Snag Locations
            <p class="under-ptagh1">
            <a href="/snagindex" class="btn btn-new">Snag Reports</a>
            <a href="{{ route('snaglocations.create') }}" class="btn btn-new">Add</a>
        </p>
        </div>

        <div class="panel-body item-body">
          <!--  <table class="table table-bordered table-striped items-pages {{ count($vendors) > 0 ? 'datatable' : '' }} dt-select">-->
              <table id="dTableColSearch" class="table datatable table-bordered table-striped emploiyee-table {{ count($vendors) > 0 ? 'dTableColSearch' : '' }}">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center; width:60px;">S.No</th>
                        <th>Community</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr> 
               
                  
                </thead>
                
                <tbody>
                    @if (count($vendors) > 0)
                        @foreach ($vendors as $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td><?php echo $client->id; ?></td>
                                <td>{{ $client->sitename }}</td>  
                                <td>{{ $client->location_name }}</td>                              
                                <td>
                                	<a href="{{ route('snaglocations.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>
                                    {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE', 
                                    'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                    'route' => ['snaglocations.destroy', $client->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger btn-delste')) !!}
                                    {!! Form::close() !!}
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
        </div>
    </div>
     @include('partials.footer')
@stop