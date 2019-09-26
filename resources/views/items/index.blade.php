@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Items</h3>-->

   

    <div class="panel panel-default respositroy-view items">
        <div class="panel-heading">
           Items
            <p class="under-ptagh1">
        <a href="{{ route('items.create') }}" class="btn btn-new">Add</a>
        <a href="{{ route('items.import') }}" class="btn btn-new">Import</a>
    </p>
        </div>

        <div class="panel-body item-body">
          <!--  <table class="table table-bordered table-striped items-pages {{ count($vendors) > 0 ? 'datatable' : '' }} dt-select">-->
              <table id="dTableColSearch" class="table datatable table-bordered table-striped emploiyee-table {{ count($vendors) > 0 ? 'dTableColSearch' : '' }} dt-select">  
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                         <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
						<th>UOM</th>
                        <th>Category</th>
                        <th>Sub-Cat</th>
                          
                  <!--      <th>Image</th>-->
                       <!-- <th>Description</th>-->
                        <th>Action</th>
                    </tr> 
               
                  
                </thead>
                
                <tbody>
                      <tr>
                        <td></td>
                        <td><input type="text" placeholder="Search" data-index="1" class="form-control wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="2" class="form-control wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="3" class="form-control wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="4" class="form-control wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="5" class="form-control wsearch-input" /></td>
                        <td><input type="text" placeholder="Search" data-index="6" class="form-control wsearch-input" /></td>
                       <?php /*?>  <td><input type="text" placeholder="Search" data-index="5" class="form-control wsearch-input" /></td><?php */?>
                      
                        <td></th>
                    </tr> 
                    @if (count($vendors) > 0)
                        @foreach ($vendors as $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                 <td>{{ $client->itemcode }}</td>
                                <td>{{ $client->itemname }}</td>
                                 <td>{{ $client->description }}</td>
								 <td>{{ $client->uom }}</td>
                                 <td>{{ $client->asstypename }}</td>
                                 <td>{{ $client->asstcatypename }}</td>
                                 
                                <?php /*?> <td><a href="#"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></td><?php */?>
                                <!-- <td>{{ $client->description }}</td> -->
                              
                                <td><a href="{{ route('items.show',[$client->id]) }}" class="btn btn-xs btn-success">View</a><a href="{{ route('items.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE', 
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['items.destroy', $client->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger btn-delste')) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('items.mass_destroy') }}';
    </script>
@endsection