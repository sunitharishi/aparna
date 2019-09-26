@extends('layouts.app')



@section('content')

    <!--<h3 class="page-title">Community Assets</h3>-->



   



    <div class="panel panel-default smoonity-asstess communities-index-pages">

        <div class="panel-heading commuities-heading">

           Aparna Assets
           
          <div class="indloa-incdias communities-click-here">
               <div class="selection-form">
                  {!! Form::open(['method' => 'GET', 'route' => ['aparnaassets.index']]) !!}
                  {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  {!! Form::select('ast', $categories, old('ast')?old('ast'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  
                  {!! Form::close() !!}
              </div>
               <p class="ptag refresingin">

        <span class="add-aadet">Add <span style="color:#bb565b;">Asset</span> in <span style="color:#bb565b;">Aparna</span> <i class="fa fa-arrow-right" aria-hidden="true"></i>
</span> <a href="{{ route('aparnaassets.create') }}" class="blink">Click Here</a>

        <a href="{{ route('aparnaassets.import') }}" class="btn btn-success">Upload</a>

    </p>
            </div>

           
            

        </div>



        <div class="panel-body communiteis-asset">

            <table class="table table-bordered table-striped communities-assetss {{ count($assets) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        <th style="width:41px;">S.No</th>
						<th>Asset Name</th>
						  <th style="width:170px;">Code</th>
                         <th>Category</th>
                      
						<th style="width:95px;">Aparna</th>
						<th>Location</th>
                        
                       
                        <th>Template</th>
                        <th>TYPE</th>
                        <th style="width:150px;">Action</th>
						
						
					


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
                                
                               
                                <td>{{ ($client->tcode?$client->tname.'('.$client->tcode.')':'') }}</td>
                                 <td><?php echo strtoupper($client->amc_type); ?></td>
                                <td><a href="{{ route('aparnaassets.show',[$client->id]) }}" class="btn btn-xs btn-success">View</a>
                                    @if($client->template)<a href="{{ route('aparnaassets.template',[$client->id]) }}" class="btn btn-xs btn-primary">Template</a>@endif
                                    <a href="{{ route('aparnaassets.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['aparnaassets.destroy', $client->id])) !!}

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

        window.route_mass_crud_entries_destroy = '{{ route('aparnaassets.mass_destroy') }}';

    </script>

@endsection