@extends('layouts.app')



@section('content')

	<style type="text/css">
			.hide {
				display:none; 
			}
	</style>
    <div class="panel panel-default smoonity-asstess notprint">

        <div class="panel-heading">

           <div style="float:left; margin-right:10px;">Job Cards</div>
           <div class="selectionprocess-jobcards">
           		{!! Form::open(['method' => 'GET', 'route' => ['topics.jobcard']]) !!}
               {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control select2mes erequired','onchange'=>'this.form.submit()']) !!}
               {!! Form::close() !!}
           </div>
           <p class="ptag">

                <a href="/topics/jobcard/edit" class="btn btn-new">Add</a>
        
            </p>
            
        </div>



        <div class="panel-body jobcard-indexpagediv">

            <table class="table happyTable table-bordered table-striped communities-assetss job-card {{ count($jobcards) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Job card Type</th>
                        <th>Community</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Updated On</th>
                        <th>Action</th>

                    </tr>

                </thead>

                

                <tbody   id="jobcard_sites">
                     @if (count($jobcards) > 0)

                        @foreach ($jobcards as $row)
                   <tr data-entry-id="{{ $row->id }}">
                     <td></td>
                     <td>{{ $sno++ }}</td>
                      <td><span class='hide'>{{ date("Ymd",strtotime($row->jdate)) }}</span>{{ date("d/m/Y",strtotime($row->jdate)) }}</td>
                      <td>{{ $jbtypes[$row->jctype] }}</td>
                      <td>{{ $row->sitename }}</td>
                      <td>{{ $row->cname }}</td>
                      <td>{{ $row->status }}</td>
                      <td><span class='hide'>{{ date("Ymd",strtotime($row->updated_at)) }}</span>{{ date("d/m/Y",strtotime($row->updated_at)) }}</td>
                      <td><a href="{{ route('jobcard.view',[$row->id]) }}" class="btn btn-xs btn-success">View</a>
                        <a href="{{ route('jobcard.edit',[$row->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                        'style' => 'display: inline-block;',
        
                        'method' => 'DELETE',
        
                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
        
                        'route' => ['jobcard.delete', $row->id])) !!}
        
                        {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                    
                        {!! Form::close() !!}
                        <a href="javascript:void(0);" onclick="printview(<?php echo $row->id;?>)" class="btn btn-xs btn-print">Print</a>
                        <a href="javascript:void(0);" onclick="pdfdownload(<?php echo $row->id;?>)" class="btn btn-xs btn-download">Download</a>
                      </td>
                    </tr>
                    @endforeach

                    @else

                        <tr>

                            <td colspan="9">No entries in table</td>

                        </tr>

                    @endif
                    

                </tbody>

            </table>

        </div>
       

    </div>
	<div id="validresponse" class="validprint advanced-misreports"></div>
    @section('javascript')
    <script type="text/javascript">
		function jobsiteChanged(siteid)
		{
        window.route_mass_crud_entries_destroy = '{{ route('jobcard.mass_destroy') }}';
		jQuery.extend( jQuery.fn.dataTableExt.oSort, {
		"date-uk-pre": function ( a ) {
			var ukDatea = a.split('/');
			return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
		},
		
		"date-uk-asc": function ( a, b ) {
			return ((a < b) ? -1 : ((a > b) ? 1 : 0));
		},
		
		"date-uk-desc": function ( a, b ) {
			return ((a < b) ? 1 : ((a > b) ? -1 : 0));
		}
	  } );
	  $(document).ready(function() {
		$('#example').dataTable( {
			"aoColumns": [
				null,
				null,
				null,
				null,
				{ "sType": "date-uk" },
				null
			]
		});
    });
	
	function printview(rowId){
  	  $.ajax({
			type: "get",
			cache:false,
			url: 'http://testing.rreg.in/getjcardprint',
			data: {jcardid: rowId},
			success: function( response ) {
				 
			$("#validresponse").html(response);
				 window.print();
				 
				 close();
			}   
        });
	 }
	 function pdfdownload(rowId){
	 	window.location.href = 'http://testing.rreg.in/getjcarddownload?jcardid='+rowId;	 
		return false;
	 }
	</script>
    
@endsection
@include('partials.footer')

@stop



@section('javascript')

   

@endsection