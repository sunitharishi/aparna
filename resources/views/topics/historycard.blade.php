@extends('layouts.app')



@section('content')


    <div class="panel panel-default smoonity-asstess notprint">

        <div class="panel-heading historycard-heading">

           
           
          
          <div style="float:left; margin-right:10px;">History Card</div>
           <div class="selectionprocess-jobcards">
           		{!! Form::open(['method' => 'GET', 'route' => ['historycard']]) !!}
               {!! Form::select('c', $communities, old('c')?old('c'):'', ['class' => 'form-control select2mes erequired','onchange'=>'this.form.submit()']) !!}
               {!! Form::close() !!}
           </div>
          <?php /*?><div  style="float:left;margin-right:6px;">
              {!! Form::open(['method' => 'GET', 'route' => ['historycard']]) !!}
              {!! Form::select('ht', $ddhctypes, old('ht')?old('ht'):'', ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
              {!! Form::close() !!}
          </div>
        
<?php */?>
    </div>
        </div>



        <div class="panel-body">
            <div class="history-cards">
            <table class="table table-bordered table-striped communities-assetss history-card {{ count($historycards) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Type</th>
                        <th>Reference No</th>
                        <th>Community</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($historycards) > 0)

                        @foreach ($historycards as $row)
                       <tr data-entry-id="{{ $row->id }}">
                         <td></td>
                          <td>{{ date("d.m.Y",strtotime($row->updated_at)) }}</td>
                          <td>{{ date("h:i A",strtotime($row->updated_at)) }}</td>
                          <td>{{ $hctypes[$row->htype] }}</td>
                          <td>{{ $row->ref_idno }}</td>
                           <td>{{ get_sitename($row->site_id) }}</td>
                          <td>
                            @if($row->htype=='1')
                            <a href="{{ route('breakdown.view',[$row->refid]) }}" class="btn btn-xs btn-success">View</a>
                            @elseif($row->htype=='2')
                            <a href="{{ route('incident.view',[$row->refid]) }}" class="btn btn-xs btn-success">View</a>
                            @else
                            <a href="{{ route('jobcard.view',[$row->refid]) }}" class="btn btn-xs btn-success">View</a>
                            @endif
                            {!! Form::open(array(
                                          'style' => 'display: inline-block;',
                                          'method' => 'DELETE',
                                          'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                          'route' => ['historycard.delete', $row->id])) !!}
                              {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                              {!! Form::close() !!}
                              
                                <a href="javascript:void(0);" onclick="printview(<?php echo $row->refid;?>)" class="btn btn-xs btn-print">Print</a>
                                <a href="javascript:void(0);" onclick="pdfdownload(<?php echo $row->refid;?>)" class="btn btn-xs btn-download">Download</a>
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
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('historycard.mass_destroy') }}';
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