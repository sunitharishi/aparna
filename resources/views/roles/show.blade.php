@extends('layouts.app')

@section('content')
    <h3 class="page-title">Login Permissions</h3>
    
    <div class="panel panel-default panelmar">
        <div class="panel-heading">
            View
        </div>
         
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                    <td>{{ $role->title }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('roles.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
    @include('partials.footer')
@stop