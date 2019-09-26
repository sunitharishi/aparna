@extends('layouts.app')



@section('content')

   
  <!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="http://testing.rreg.in/quickadmin/css/tablesawres.css">-->

    <div class="panel panel-default smoonity-asstess notprint">

        <div class="panel-heading">
          <div style="float:left; margin-right:10px;">Breakdown</div>
           <div class="selectionprocess-jobcards">
           		{!! Form::open(['method' => 'GET', 'route' => ['topics.breakdown']]) !!}
               {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control select2mes erequired','onchange'=>'this.form.submit()']) !!}
               {!! Form::close() !!}
           </div>
           <p class="ptag">

        <a href="/topics/breakdown/edit" class="btn btn-new">Add</a>

    </p>
        </div>



        <div class="panel-body breakdown-indexpage">

            <table class="table table-bordered table-striped tablesaw communities-assetss breakpages {{ count($breakdowns) > 0 ? 'datatable' : '' }} dt-select" data-tablesaw-minimap data-tablesaw-mode='swipe'>
            

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th class='title' data-tablesaw-priority='persist' data-tablesaw-sortable-col scope='col'>S.No</th>
                        
                        <th data-tablesaw-priority='6' data-tablesaw-sortable-col scope='col'>Date</th>
                        <th data-tablesaw-priority='5' data-tablesaw-sortable-col scope='col'>ID.No</th>
                        <th data-tablesaw-priority='4' data-tablesaw-sortable-col scope='col'>Title</th>
                        <th data-tablesaw-priority='3' data-tablesaw-sortable-col scope='col' >Community</th>
                        <th data-tablesaw-priority='2' data-tablesaw-sortable-col scope='col'>Asset</th>

                        <th data-tablesaw-priority='1' data-tablesaw-sortable-col scope='col'>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @if (count($breakdowns) > 0)

                        @foreach ($breakdowns as $row)
                        
                        <?php //secho '<pre>'; print_r($row); echo '</pre>'; exit; ?>
                        <?php if(($row->other)==0) $assetName = $row->comasset; else  $assetName = $row->otherasset;?>
                   <tr data-entry-id="{{ $row->id }}">
                     <td></td>
                     <td>{{ $sno++ }}</td>
                    
                      <td>{{ date("d-m-Y h:i A",strtotime($row->bdate)) }}</td>
                       <td>{{ $row->refid }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->sitename }}</td>
                      <td>{{ $assetName }}</td>
                      <td><a href="{{ route('breakdown.view',[$row->id]) }}" class="btn btn-xs btn-success">View</a>
                        <a href="{{ route('breakdown.edit',[$row->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                            

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['breakdown.delete', $row->id])) !!}

    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}

    {!! Form::close() !!}
    					<a href="javascript:void(0);" onclick="printview(<?php echo $row->id;?>)" class="btn btn-xs btn-print">Print</a>
                        <a href="javascript:void(0);" onclick="pdfdownload(<?php echo $row->id;?>)" class="btn btn-xs btn-download">Download</a>
                      </td>
                    </tr>
                    @endforeach

                    @else

                        <tr>

                            <td colspan="8">No entries in table</td>

                        </tr>

                    @endif

                </tbody>

            </table>

        </div>

    </div>
    <div id="validresponse" class="validprint advanced-misreports"></div>

@section('javascript')
    <script type="text/javascript">
        window.route_mass_crud_entries_destroy = '{{ route('breakdown.mass_destroy') }}';
		function printview(rowId){
		  $.ajax({
				type: "get",
				cache:false,
				url: 'http://testing.rreg.in/getbreakdownprint',
				data: {jcardid: rowId},
				success: function( response ) {
					 
				$("#validresponse").html(response);
					 window.print();
					 
					 close();
				}   
			});
		 }
		 function pdfdownload(rowId){
			window.location.href = 'http://testing.rreg.in/getbreakdowndownload?jcardid='+rowId;	 
			return false;
		 }
    </script>
  <!--   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js'></script>
    <script  src="http://testing.rreg.in/quickadmin/js/tablesawres.js"></script>
-->
  
    
@endsection

@include('partials.footer')

@stop



@section('javascript')

   

@endsection