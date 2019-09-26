@extends('layouts.app')



@section('content')

   <!-- <h3 class="page-title">Assets</h3>-->



  



    <div class="panel panel-default bosy-asstes">

        <div class="panel-heading asset-headings">

            Assets

           <div class="assets-selection-dropdown">
               <div class="aemertnecy-search">
                  {!! Form::open(['method' => 'GET', 'route' => ['assets.index']]) !!}
                  {!! Form::select('c', $categories, old('c')?old('c'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  {!! Form::close() !!}
              </div>
              <p class="add-new-lass">
                <span class="font-reuola"><span style="color:#000;">Create</span> <span style="color:#03437b;">Asset</span> - ></span> <a href="{{ route('assets.create') }}" class="blink">Click Here </a> </p>
            </div>
            
        
      </div>
            


        <div class="panel-body asset-managess lefter-eihg">
        
         

            <table class="table table-bordered table-striped add-edit-rreg {{ count($assets) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        
                        <th>S.No</th>
                        <th style="width:50px;">Code</th>
						
						<th>Name</th>

                        <th>Category</th>

                        <th style="width:175px;">Template</th>

                        

                        <th style="width:150px;">Aciton</th>

                    </tr>

                </thead>

                

                <tbody>

                    @if (count($assets) > 0)

                        @foreach ($assets as $asset)                            
                            <tr data-entry-id="{{ $asset->id }}">

                                <td></td>
								<td>{{ $sno++ }}</td>
								 <td>{{ $asset->acode }}</td>

                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->catgname }}</td>

                                <td>{{ ($asset->tcode?$asset->tname.'('.$asset->tcode.')':'') }}</td>

                                

                                <td><a href="{{ route('assets.show',[$asset->id]) }}" class="btn btn-xs btn-success">View</a>
                                    <a href="{{ route('assets.edit',[$asset->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                            

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['assets.destroy', $asset->id])) !!}

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

        window.route_mass_crud_entries_destroy = '{{ route('assets.mass_destroy') }}';

    </script>

@endsection