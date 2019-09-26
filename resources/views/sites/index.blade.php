@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Sites</h3>-->

   
    <div class="panel panel-default panelmar tsas-crseations wordst-best">
        <div class="panel-heading japan-sheriya">
            Communities
        
         <p  class="addd-new-sitess">
        <a href="{{ route('sites.create') }}" class="btn btn-new">Add</a>
       </p>
     </div>

        <div class="panel-body communities-index-page">
            <div class="table-responsive community-index-table">
            <table class="table table-bordered table-striped sitess-vieew {{ count($sites) > 0 ? 'datatable' : '' }} dt-select">
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        <th style="width:200px;text-align:left;">Name</th>
						<th style="width:35px;text-align:left;">Code</th>
                       <!-- <th style="width:35px;text-align:left;">Prefix</th>-->
                       <!-- <th style="width:100px;text-align:left;">No.of Flats</th>-->
                       <!-- <th style="width:89px;text-align:left;">No.of Assets</th>-->
                        <th style="width:111px;text-align:left;">No. of Flats</th>
						<th style="width:111px;text-align:left;">Built-up Area</th>
						
                        <th style="text-align:left;width:45px;">Status</th>
                        <th style="width:235px;text-align:left;">Action</th>
                    </tr> 
                </thead>
                
                <tbody>
                    @if (count($sites) > 0)
                        @foreach ($sites as $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td></td>
                                <td>{{ $client->name }}</td>
								 <td>{{ $client->scode }}</td>
                                <?php /*?> <td>{{ $client->prefix }}</td><?php */?>
                               <?php /*?> <td>{{ $client->flats_num }}</td><?php */?>
                               <!-- <td>{{ $client->assets_num }}</td>-->
                                <td><?php if($client->flat_type == 'flats') { echo $client->num_of_flats; } else if($client->flat_type == 'villas') {echo  $client->num_of_vallas."(Villas)";} else {echo "-"; }?></td>
								 <td>{{ $client->built_up_area }}</td> 
								
                                <td>{{ ($client->status == 1 ?'Active':'Inactive') }}</td> 
                                <td><a href="{{ route('sites.show',[$client->id]) }}" class="btn btn-xs btn-success">View</a><a href="{{ route('sites.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a> @if(getlogperms('edit_task'))<a href="{{ route('sites.enable',[$client->id,$client->status]) }}" class="btn btn-xs btn-disable">{{ ($client->status == 1 ?'Disable':'Enable') }} </a>@endif{!! Form::open(array(
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
    </div>
   @include('partials.footer')
@stop 

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('sites.mass_destroy') }}';
    </script>
@endsection