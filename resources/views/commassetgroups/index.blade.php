@extends('layouts.app')



@section('content')

   
    <div class="panel panel-default smoonity-asstess">

<div class="panel-heading commuities-heading">
	<span> Community Assets</span>
    <div class="community-category">
        {!! Form::open(['method' => 'GET', 'route' => ['assetgroup.assigngroup']]) !!}
        {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
        {!! Form::select('ast', $categories, old('ast')?old('ast'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
        {!! Form::close() !!}
    </div> 
    <div class="assinging-community">
        <div class="assets-groups">
        	<label class="label-control">Group</label>
        	{!! Form::select('assetgroup', $assetsgroups,'', ['class' => 'form-control','id'=>'assetgroup']) !!}
        </div>
    	<div class="assetgroupsection"></div>
    </div>
</div>

        <div class="panel-body communiteis-asset">

            <table id="dTableColSearch" class="table table-bordered table-striped communities-assetss {{ count($assets) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        <th style="width:45px;">S.No</th>
						<th>Asset Name</th>
						  <th>Code</th>
                         <th>Category</th>
                      
						<th >Community</th>
						<th style="width:250px;">Location</th>
                        <th style="width:58px;">Group</th>
                        
                       
                       <!-- <th>Template</th>
                        <th style="width:150px;">Action</th>-->
						
						
					


                    </tr>

                </thead>

                

                <tbody>

                    @if (count($assets) > 0)

                        @foreach ($assets as $client)

                            <tr data-entry-id="{{ $client->id }}">

                                <td></td>
								<td>{{ $sno++ }}</td>
								<td>{{ $client->assetname }}</td>
								 <td>{{ $client->code }}</td>
								 <td>{{ $client->catgname }}</td>
								
<td>{{ $client->sitename }}</td>
                                <td>{{ $client->name }}</td>
                                 <td>{{ $client->asgname }}</td>
                                
                               
                               <!-- <td>{{ ($client->tcode?$client->tname.'('.$client->tcode.')':'') }}</td>
                                <td><a href="{{ route('commassets.show',[$client->id]) }}" class="btn btn-xs btn-success">View</a>
                                    @if($client->template)<a href="{{ route('commassets.template',[$client->id]) }}" class="btn btn-xs btn-primary">Template</a>@endif
                                    <span class="white-space"><a href="{{ route('commassets.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['commassets.destroy', $client->id])) !!}

    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}

    {!! Form::close() !!}</span></td>
-->
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

    
@include('partials.footer')

@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_groupassign = '{{ route('indents.mass_approveassign') }}';
    </script>
@endsection