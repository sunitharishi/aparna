@extends('layouts.app')



@section('content')

   <!-- <h3 class="page-title">Vendors</h3>-->



   



    <div class="panel panel-default respositroy-view">

        <div class="panel-heading">

           Vendors
   <p class="ptag">

        <a href="{{ route('vendors.create') }}" class="btn btn-new">Add</a>

    </p>
  
  
        </div>



        <div class="panel-body vendors-section">

            <table class="table table-bordered table-striped view-vensors {{ count($vendors) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Name</th>

						<th>Code</th>

                       <!-- <th>Designation</th>-->

                        <th>Phone</th>

                        <!--<th>Email</th>-->

                       <!-- <th>Location</th>-->

                        <th>Action</th>

                    </tr> 

                </thead>

                

                <tbody>

                    @if (count($vendors) > 0)

                        @foreach ($vendors as $client)

                            <tr data-entry-id="{{ $client->id }}">

                                <td></td>

                                <td>{{ $client->name }}</td>

								 <td>{{ $client->vcode }}</td>

                               <!-- <td>{{ $client->designation }}</td>-->

                                <td>{{ $client->phone }}</td>

                               <!-- <td>{{ $client->email }}</td>-->

                               <!-- <td>{{ $client->location }}</td>-->

                                <td><a href="{{ route('vendors.show',[$client->id]) }}" class="btn btn-xs btn-success">View</a><a href="{{ route('vendors.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(

                'style' => 'display: inline-block;',

                'method' => 'DELETE', 

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['vendors.destroy', $client->id])) !!}

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
@include('partials.footer')
@stop



@section('javascript')

    <script>

        window.route_mass_crud_entries_destroy = '{{ route('vendors.mass_destroy') }}';

    </script>

@endsection