@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->

   

    <div class="panel panel-default respositroy-view category-frontpage">
        <div class="panel-heading">
            Asset Groups
             <p class="ptag">
             <a href="{{ route('assetgroup.assigngroup') }}" class="btn btn-new">Assign Asset Group</a>
       <a href="{{ route('assetgroup.create') }}" class="btn btn-new">Add</a>
    </p>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped hall-maekee {{ count($category) > 0 ? 'datatable' : '' }} dt-select">
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
						 <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                  
                <tbody>
                    @if (count($category) > 0)
                        @foreach ($category as $client_status)
                            <tr data-entry-id="{{ $client_status->id }}">
                                <td></td>
                                <td>{{ $client_status->name }}</td>
								<td>{{ $client_status->agcode }}</td>
                                <td><a href="{{ route('assetgroup.edit',[$client_status->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['assetgroup.destroy', $client_status->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td> 
                            </tr>
                        @endforeach
                    @else
                        <tr>  
                            <td colspan="3">No entries in table</td>
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
        window.route_mass_crud_entries_destroy = '{{ route('category.mass_destroy') }}';
    </script>
@endsection