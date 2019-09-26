@extends('layouts.app')

@section('content')
    <h3 class="page-title">Employees</h3>

    <p>
        <a href="{{ route('employees.create') }}" class="btn btn-success">Add new</a>
    </p>
 
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($employees) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
						<th>Code</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>&nbsp;</th>
                    </tr> 
                </thead>
                 
                <tbody> 
                    @if (count($employees) > 0)
                        @foreach ($employees as $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                <td>{{ $client->name }}</td>
								 <td>{{ $client->ecode }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td><a href="{{ route('employees.show',[$client->id]) }}" class="btn btn-xs btn-primary">View</a><a href="{{ route('employees.edit',[$client->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE', 
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['sites.destroy', $client->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
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
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('employees.mass_destroy') }}';
    </script>
@endsection