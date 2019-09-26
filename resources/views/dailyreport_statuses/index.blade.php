@extends('layouts.app')

@section('content')
    <h3 class="page-title">Daily Report Statuses</h3>

    <p>
      <?php /*?>  <a href="{{ route('dailyreport_statuses.create') }}" class="btn btn-success">Add new</a><?php */?>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($client_statuses) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($client_statuses) > 0)
                        @foreach ($client_statuses as $client_status)
                            <tr data-entry-id="{{ $client_status->id }}">
                                <td></td>
                                <td>{{ $client_status->title }}</td>
                                <td><a href="{{ route('dailyreport_statuses.edit',[$client_status->id]) }}" class="btn btn-xs btn-info">Edit</a><?php /*?>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['dailyreport_statuses.destroy', $client_status->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}<?php */?></td> 
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
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('dailyreport_statuses.mass_destroy') }}';
    </script>
@endsection