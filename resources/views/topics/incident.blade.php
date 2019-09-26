@extends('layouts.app')



@section('content')


    <div class="panel panel-default smoonity-asstess notprint">

        <div class="panel-heading">

           
           <div style="float:left; margin-right:10px;">Incident</div>
           <div class="selectionprocess-jobcards">
               {!! Form::open(['method' => 'GET', 'route' => ['topics.incident']]) !!}
               {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control select2mes erequired','onchange'=>'this.form.submit()']) !!}
               {!! Form::close() !!}
           </div>
           <p class="ptag">

        <a href="/topics/incident/edit" class="btn btn-new">Add</a>

    </p>
        </div>



        <div class="panel-body">
          
           <div class="incident-table" id="incidents_sites">
            <table class="table table-bordered table-striped communities-assetss incident-page {{ count($incidents) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>S.No</th>
                        <th>Date</th>
                         <th>ID.No</th>
                        <th>Community</th>
                        <th>Asset</th>
                        <th>Action</th>

                    </tr>

                </thead>
                <tbody>
                   @if (count($incidents) > 0)

                        @foreach ($incidents as $row)
                         <?php if(($row->other)==0) $assetName = $row->comasset; else  $assetName = $row->otherasset;?>
                   <tr data-entry-id="{{ $row->id }}">
                     <td></td>
                     <td>{{ $sno++ }}</td>
                      <td>{{ date("d-m-Y h:i A",strtotime($row->idate)) }}</td>
                       <td>{{ $row->refid }}</td>
                     <td>{{ $row->sitename }}</td>
                      <td>{{ $assetName }}</td>
                    
                     
                      <td><a href="{{ route('incident.view',[$row->id]) }}" class="btn btn-xs btn-success">View</a>
                        <a href="{{ route('incident.edit',[$row->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                            

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['incident.delete', $row->id])) !!}

    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}

    {!! Form::close() !!}
    					<a href="javascript:void(0);" onclick="printview(<?php echo $row->id;?>)" class="btn btn-xs btn-print">Print</a>
                        <a href="javascript:void(0);" onclick="pdfdownload(<?php echo $row->id;?>)" class="btn btn-xs btn-download">Download</a>
                      </td>
                    </tr>
                    @endforeach

                    @else

                        <tr>

                            <td colspan="7">No entries in table</td>

                        </tr>

                    @endif
                    

                </tbody>

            </table>
           </div>
        </div>

    </div>
	<div id="validresponse" class="validprint advanced-misreports"></div>
@section('javascript')
    <script type="text/javascript">
        window.route_mass_crud_entries_destroy = '{{ route('incident.mass_destroy') }}';
		function printview(rowId){
		  $.ajax({
				type: "get",
				cache:false,
				url: 'http://testing.rreg.in/getincidentcardprint',
				data: {jcardid: rowId},
				success: function( response ) {
					 
				$("#validresponse").html(response);
					 window.print();
					 
					 close();
				}   
			});
		 }
		 function pdfdownload(rowId){
			window.location.href = 'http://testing.rreg.in/getincidentdownload?jcardid='+rowId;	 
			return false;
		 }
    </script>
@endsection

@include('partials.footer')

@stop



@section('javascript')

   

@endsection