@extends('layouts.app')

@section('content')
    <h3 class="page-title">Vendors</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped">
                        <tr><th>Name</th><td>{{ $client->name }}</td><th>Code</th><td>{{ $client->vcode }}</td></tr>
						<tr><th>Address</th><td>{{ $client->address }}</td><th>Designation</th><td>{{ $client->designation }}</td></tr>
						<tr><th>Phone</th><td>{{ $client->phone }}</td><th>Email</th><td>{{ $client->email }}</td></tr>
						<tr><th>Location</th><td>{{ $client->location }}</td><th>Category</th><td>{{ $client->category }}</td></tr>
						<tr><th>Description</th><td>{{ $client->description }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('vendors.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop