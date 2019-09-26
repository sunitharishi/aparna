@extends('layouts.app')



@section('content')

    <!--<h3 class="page-title">Community Assets</h3>-->



   



    <div class="panel panel-default smoonity-asstess communities-index-pages">

        <div class="panel-heading commuities-heading">

           Other Assets
           
         <?php /*?> <div class="indloa-incdias communities-click-here">
               <div class="selection-form">
                  {!! Form::open(['method' => 'GET', 'route' => ['commassets.index']]) !!}
                  {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  {!! Form::select('ast', $categories, old('ast')?old('ast'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  
                  {!! Form::close() !!}
              </div>
               <p class="ptag refresingin">

        <span class="add-aadet">Add <span style="color:#bb565b;">Asset</span> in <span style="color:#bb565b;">Community</span> <i class="fa fa-arrow-right" aria-hidden="true"></i>
</span> <a href="{{ route('commassets.create') }}" class="blink">Click Here</a>

        <a href="{{ route('commassets.import') }}" class="btn btn-success">Upload</a>

    </p>
            </div><?php */?>

           
            

        </div>



        <div class="panel-body communiteis-asset other-assets-index">

            <table class="table table-bordered table-striped communities-assetss {{ count($assets) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        <th style="width:41px;">S.No</th>
                        <th style="width:95px;">Community</th>
						<th>Asset Name</th>
						<th style="width:170px;">Code</th>
                       <th>Category</th>
                    </tr>
                </thead>

                <tbody>

                    @if (count($assets) > 0)

                        @foreach ($assets as $client)

                            <tr data-entry-id="{{ $client->id }}">

                                <td></td>
								<td>{{ $sno++ }}</td>
                                <td>{{ $client->sitename }}</td>
								<td>{{ $client->name }}</td>
								<td>{{ $client->code }}</td>
								<td>{{ $client->catgname }}</td>
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

        window.route_mass_crud_entries_destroy = '{{ route('commassets.mass_destroy') }}';

    </script>

@endsection