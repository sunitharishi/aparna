@extends('layouts.app')



@section('content')

    <!--<h3 class="page-title">Community Assets</h3>-->



   



    <div class="panel panel-default smoonity-asstess communities-index-pages">

        <div class="panel-heading commuities-heading">

           Community Assets
           
          <div class="indloa-incdias communities-click-here">
               <div class="selection-form">
                  {!! Form::open(['method' => 'GET', 'route' => ['aparnaassets.report']]) !!}
                  {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  {!! Form::select('ast', $categories, old('ast')?old('ast'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  {!! Form::select('asttype', $types, old('asttype')?old('asttype'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
                  <select name='year' id="year" class="form-control" onchange="this.form.submit();"> 
                     <option value="">Select Year</option>
                     <?php for($i=2018;$i<=2030;$i++){ ?>
                     <option value="<?php echo $i; ?>" <?php if(isset($_GET['year']) && $_GET['year'] == $i) echo 'Selected';?>><?php echo $i; ?></option>
                     <?php } ?>
                  </select> 
                  <select name='month' id="month" class="form-control" onchange="this.form.submit();">  
                         <option value="">Select Month</option>
						 <option value="1" <?php if(isset($_GET['month']) && $_GET['month'] == "1") echo 'Selected';?>>Jan</option>
						 <option value="2" <?php if(isset($_GET['month']) && $_GET['month'] == "2") echo 'Selected';?>>Feb</option>
						 <option value="3" <?php if(isset($_GET['month']) && $_GET['month'] == "3") echo 'Selected';?>>Mar</option>
						 <option value="4" <?php if(isset($_GET['month']) && $_GET['month'] == "4") echo 'Selected';?>>April</option>
						 <option value="5" <?php if(isset($_GET['month']) && $_GET['month'] == "5") echo 'Selected';?>>May</option>
						 <option value="6" <?php if(isset($_GET['month']) && $_GET['month'] == "6") echo 'Selected';?>>June</option>
						 <option value="7" <?php if(isset($_GET['month']) && $_GET['month'] == "7") echo 'Selected';?>>July</option>
						 <option value="8" <?php if(isset($_GET['month']) && $_GET['month'] == "8") echo 'Selected';?>>Aug</option>
						 <option value="9" <?php if(isset($_GET['month']) && $_GET['month'] == "9") echo 'Selected';?>>Sept</option>
						 <option value="10" <?php if(isset($_GET['month']) && $_GET['month'] == "10") echo 'Selected';?>>Oct</option>
						 <option value="11" <?php if(isset($_GET['month']) && $_GET['month'] == "11") echo 'Selected';?>>Nov</option>
						 <option value="12" <?php if(isset($_GET['month']) && $_GET['month'] == "12") echo 'Selected';?>>Dec</option>
					</select> 
                  {!! Form::close() !!}
              </div>
               
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
                      
						<th style="width:95px;">Community</th>
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