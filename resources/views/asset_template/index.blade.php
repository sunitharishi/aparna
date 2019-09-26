@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Asset Templates</h3>-->

   

    <div class="panel panel-default smoonity-asstess">
        <div class="panel-heading commuities-heading asset-template">
            Asset Templates
             <p class="ptag">
                <a href="{{ route('asset-templates.create') }}" class="btn btn-new">Add</a> 
                <a href="{{ route('asset-templates.import') }}" class="btn btn-success">Import</a>
            </p>
        </div>

        <div class="panel-body new-importas">
            <table class="table table-bordered table-striped zebrea-crosssing {{ count($templates) > 0 ? 'datatable' : '' }} dt-select">
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        <th style="width:50px;">S.No</th>
                        <th style="width:100px;">Code</th>
                        <th>Name</th>
                        <th style="width:190px;">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($templates) > 0)
                        @foreach ($templates as $tval)
                            <tr data-entry-id="{{ $tval->id }}">
                               <td></td>
                                <td>{{ $sno++ }}</td>
                                <td>{{ $tval->code }}</td>
                                <td>{{ $tval->name }}</td>
                                <td>
                                    <a href="{{ route('asset-templates.edit',[$tval->id]) }}" class="btn btn-xs btn-inverse">Edit</a>
                                    <a href="{{ route('asset-templates.view',[$tval->id]) }}" class="btn btn-xs btn-success">View</a>
                                    {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                    'route' => ['asset-templates.destroy', $tval->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No templates</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('asset-templates.mass_destroy') }}';
    </script>
@endsection

@include('partials.footer')  


@stop
