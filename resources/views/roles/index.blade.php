@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Login Permissions</h3>-->

   

    <div class="panel panel-default panelmar smoonity-asstess  breautiyqueen">
        <div class="panel-heading users-heading">
            Login Permissions
             <p class="ptag">
        <a href="{{ route('roles.create') }}" class="btn btn-new">Add</a>
    </p>
        </div>

        <div class="panel-body login-permissions">
             <table id="dTableColSearch" class="table table-bordered table-striped ckient-serever beartyuifyl-greto {{ count($roles) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;width:30px;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th style="width:78px;">Action</th>
                    </tr>
                </thead>
                
                 <thead>
                    <tr>
                        <td></td>
                        <td><input type="text" placeholder="Search" data-index="1" /></td>
                        <td></th>
                    </tr> 
                </thead>
                
                <tbody>
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td></td>
                                <td>{{ $role->title }}</td>
                                <td><!--<a href="{{ route('roles.show',[$role->id]) }}" class="btn btn-xs btn-primary">View</a>--><a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['roles.destroy', $role->id])) !!}
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

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
@endsection

    @include('partials.footer')
@stop
