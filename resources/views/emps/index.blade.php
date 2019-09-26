@extends('layouts.app')



@section('content')

   <!-- <h3 class="page-title">Employees</h3>-->






    <div class="panel panel-default panelmar respositroy-view emploueeeeeas">

        <div class="panel-heading employees-managementheading">

            Employees
             
    <p class="importa-ptag">

        <a href="{{ route('emps.create') }}" class="btn btn-new">Add</a> 
        <a href="{{ route('emps.eimport') }}" class="btn btn-success">Import</a>

    </p>

        </div>



        <div class="panel-body employees-management"> 

             <table id="dTableColSearch" class="table table-bordered table-striped emploiyee-table {{ count($emps) > 0 ? 'dTableColSearch' : '' }} dt-select">  

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        

                        <th style="width:60px;">Code</th>
						
						<th>Name</th>

                        <th>Phone</th>

                        <th>Email</th>

                        <th style="width:155px;">Action</th>

                    </tr>
 
                </thead>
                 <thead>
                    <tr>
                        <td></td>
                        <td><input type="text" placeholder="Search" data-index="1" class="wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="2" class="wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="3" class="wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="4" class="wsearch-input" /></td>
                        <td></th>
                    </tr> 
                </thead>

                

                <tbody>

                    @if (count($emps) > 0)

                        @foreach ($emps as $client)

                            <tr data-entry-id="{{ $client->id }}">

                                <td></td>
								
								 <td>{{ $client->ecode }}</td>

                                <td>{{ $client->name }}</td>

                                <td>{{ $client->phone }}</td>

                                <td>{{ $client->email }}</td>

                                <td><a href="{{ route('emps.show',[$client->id]) }}" class="btn btn-xs btn-success">View</a><a href="{{ route('emps.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['emps.destroy', $client->id])) !!}

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
    
    



@section('javascript')

    <script>

        window.route_mass_crud_entries_destroy = '{{ route('emps.mass_destroy') }}';

    </script>
    

@endsection

@include('partials.footer')

@stop