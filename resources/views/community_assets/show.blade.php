@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Community Asset</h3>-->
<style>
#contain-table_scroll {
  height: 100px;
  overflow-y: hidden;
}
#table_scroll
{
  width: 100%;
  margin-top: 100px;
  margin-bottom: 100px;
  border-collapse: collapse;
}
#table_scroll thead tr
{
	top:0px;
	width:100%;
	/*display:table;
	position:fixed;*/
}
#table_scroll thead th {
  padding: 10px;
  text-align:center;
  background-color: #ea922c;
  color: #fff;
}
#table_scroll tbody td {
  padding: 10px;
  text-align:center;
  background-color: #ed3a86;
  color: #fff;
}
</style>    
    <div class="panel panel-default conummity-heading community-assets-view-page">
        <div class="panel-heading">
            Community Asset<pre style="display:none;"></pre>
            <p class="pull-right">
                <a href="javascript:void(0)" class="btn aturl green-back" data-toggle="modal" data-target="#summary2">Maintenance</a>
				<a href="{{ route('commbreakdown.edit', $comm_asset->id) }}" class="btn green-back">Break Down</a>
				<a href="{{ route('commincident.edit', $comm_asset->id) }}" class="btn green-back">Incident</a>
				<a href="{{ route('commjobcard.edit', $comm_asset->id) }}" class="btn green-back">Job Card</a>
				<a href="{{ route('commassets.index') }}" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body lase-vieepage">
            <div class="row">
                <div class="col-sm-12">
                	<div class="table-responsive">
                    <table class="table table-bordered table-striped table-sarvour">
					 <tr><th>Community</th><td>{{ $sitename }}</td><th>Category</th><td>{{ $catgname }}</td></tr>
                     <tr><th>Location</th><td>{{ $comm_asset->name }}</td><th>Code</th><td>{{ $assetcode }}</td></tr>
                     <tr><th>Template</th><td colspan="3">{{ $template->code }} - {{ $template->name }}</td></tr>
                    </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hillpark">
                     
                     <tr style="display: none;"><th>Location</th><td>{{ $comm_asset->location }}</td></tr>
                     <tr><th>AMC Interval Duration</th><td>{{ $comm_asset->amc_interval?$amc_intervals[$comm_asset->amc_interval]:'' }}</td>
                        <th>AMC Start Date</th><td>{{ ((int)$comm_asset->amc_startdate?date("d-m-Y",strtotime($comm_asset->amc_startdate)):'') }}</td></tr>
                     <tr><th>Vendor</th><td>{{ $vendorname }}</td><th>SOP</th><td>{{ $comm_asset->sop }}</td></tr>
                     <tr><th>Service Report</th><td>{{ $comm_asset->service_report }}</td>
                        <th>Name Plate</th><td>{{ $comm_asset->name_plate }}</td></tr>
                        @if($comm_asset->asset_image)
                       <tr>
                            <td>Asset Image</td>
                            <td>
                            <a href="/uploads/template/{{ $comm_asset->asset_image }}" target="_blank"><img src="/uploads/template/{{ $comm_asset->asset_image }}" width="100px" /></a>
                            </td>
                       </tr>
                       @endif
                    </table>
                    </div>
                </div>

                <div class="col-sm-12 community-assets-viewdynamic">
                    <?php 
                        if(isset($sections) && $sections) {
                            foreach($sections as $sv) {
                                $n=1;
                                $cols = $sv['cols'];
                                $cw = 12/$cols;
                        ?>
                            @if(isset($sv['head']) && $sv['head'])
                            <div>
                                <strong><u>{{ $sv['head'] }}:</u></strong>
                            </div>
                            @endif                
                                
                            @if(isset($sv['fields']) && $sv['fields']) 
                            <div class="row"> 
                                @foreach($sv['fields'] as $fval)
                                <?php 
                                    $vreq = $fval->required=='Y'?' erequired':'';
                                    $ireq = $fval->ivalids<>'0'?$fval->ivalids:'';
                                    $ioptions = array();
                                    if($fval->itype=='2' || $fval->itype=='3' || $fval->itype=='4') {                            
                                        if($fval->itype=='2') $ioptions = array(''=>"Select");
                                        if($fval->ioptions) {
                                            $iopts = explode("\n", $fval->ioptions);
                                            foreach($iopts as $iov) {
                                                $iov = trim($iov);
                                                $iov = str_replace("\n", "", $iov);
                                                if(empty($iov)) continue;
                                                $ioptions["$iov"]=$iov;
                                            }
                                        }
                                    }
                                    $aftvalue = isset($asset_template[$fval->id])?$asset_template[$fval->id]:'';
                                    if(!$asset_template && ($fval->itype=='1' || $fval->itype=='2' || $fval->itype=='3' || $fval->itype=='4' || $fval->itype=='5' || $fval->itype=='8') && $fval->idefault) 
                                        $aftvalue = $fval->idefault;
                                    $aftvalDate = array('','');
                                    if($fval->itype=='7' && $aftvalue) $aftvalDate = explode(" ", $aftvalue);
                                    if($fval->itype=='3' && $aftvalue) $aftvalDate = explode(",", $aftvalue);
                                    $aftvalfile = array('file'=>'','name'=>'');
                                    if($fval->itype=='9' && $aftvalue) {
                                        $affile = explode("_", $aftvalue);
                                        $filepath = '/uploads/template/'.$aftvalue;
                                        unset($affile[0]);
                                        $affile = implode("", $affile);
                                        $aftvalfile = array('file'=>$filepath,'name'=>$affile);
                                        $vreq = '';
                                    }
                                ?>

                                <div class="col-xs-{{ $cw }} form-group dynamic-textareaa">
                                    {!! Form::label('', $fval->label, ['class' => 'control-label']) !!}
                                    {!! Form::hidden('atfid['.$fval->id.']', $fval->id) !!}
                                    {!! Form::hidden('atftype['.$fval->id.']', $fval->itype) !!}
                                    {!! Form::hidden('atrequired['.$fval->id.']', ($vreq?$fval->required:'')) !!}
                                    {!! Form::hidden('ativalids['.$fval->id.']', $fval->itype) !!}
                                    {!! Form::hidden('attitle['.$fval->id.']', $fval->label) !!}


                                    @if($fval->itype=='1')
                                    <div class="textbox">{{ $aftvalue }}</div>

                                    @elseif ($fval->itype=='2')
                                    <div class="selectbox">
                                    {{ $aftvalue }}
                                    </div>

                                    @elseif ($fval->itype=='3')
                                    <div class="checkbox">
                                        {{ $aftvalDate?implode(",",$aftvalDate):'' }}
                                    </div>

                                    @elseif ($fval->itype=='4')
                                    <div class="radiobox">
                                    {{ $aftvalue }}
                                    </div>

                                    @elseif ($fval->itype=='5')
                                    <div class="textareabox">
                                    {{ $aftvalue }}
                                    </div>

                                    @elseif($fval->itype=='6')
                                    <div class="datebox">
                                    {{ ((int)$aftvalue?date("d-m-Y",strtotime($aftvalue)):'') }}
                                    </div>

                                    @elseif($fval->itype=='7')
                                    <div class="datetimebox">
                                    {{ ((int)$aftvalue?date("d-m-Y h:i A",strtotime($aftvalue)):'') }}
                                    </div>

                                    @elseif ($fval->itype=='8')
                                    <div class="texteditorbox">
                                    {!! $aftvalue !!}
                                    </div>

                                    @elseif($fval->itype=='9')
                                    @if($aftvalfile['file'])
                                    <a href="{{ $aftvalfile['file'] }}" target="_blank">{{ $aftvalfile['name'] }}</a>
                                    @endif
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif                                        
                            
                        <?php 
                            }
                        }
                        ?>
                </div>
            </div>

    
	 	 @if (count($cassets) > 0)
		<div class="inner-title">
			<h4 class="card-details"><span><b>Maintenance</b></span></h4>
		</div>
		<table class="table table-hover community-carsssss" style="margin-bottom:0px;">
			<thead class="thead-dark">
				<tr style="background-color:#f5565a;">
					<th>Type</th>
					<th>Community</th>
					<th>Start Date</th>					
					<th>End Date</th>
					<th>Alert Date</th>
					<th>Action</th>
				</tr>
			</thead>
        </table>
		<div class="table-responsive" id="contain-table_scroll">
		<table class="table table-hover community-carsssss" id="table_scroll">            	                
			<tbody>
				@foreach ($cassets as $row)
			   <tr>
					 <td><?php echo strtoupper($row->amc_type); ?></td>
					<td>{{ $row->sitename }}</td>
					<td><?php if($row->amc_type=='amc') { ?>{{ $row->amc_startdate }} <?php } else if($row->amc_type=='waranty') { ?>{{ $row->waranty_startdate }} <?php }  ?></td>
					<td><?php if($row->amc_type=='amc') { ?>{{ $row->amc_enddate }} <?php } else if($row->amc_type=='waranty') { ?>{{ $row->waranty_enddate }} <?php }  ?></td>
				    <td><?php if($row->status==1) { ?>{{ $row->alert_date }} <?php } else echo "Completed"; ?></td>
                    <td><?php if($row->status==1) { ?><a href="javascript:void(0)" class="btn aturl green-back"  class="btn btn-primary" onclick="EditComAsset(<?php echo $row->id; ?>)">Edit</a><?php } ?></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
		</div>
		
	
	 @if (count($jobcards) > 0)
    <div class="inner-title">
        <h4 class="card-details"><span><b>Job Cards</b></span></h4>
    </div>
    <div class="table-responsive">
    <table class="table table-hover community-carsssss">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Community</th>
                <th>ID</th>
                
                <th>Job Card Type</th>
                <th>Vendor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobcards as $row)
           <tr>
                 <td>{{ date("d.m.Y",strtotime($row->jdate)) }}</td>
                <td>{{ $row->sitename }}</td>
                <td><a href="{{ route('jobcard.view',[$row->id]) }}">{{ $row->refid }}</a></td>
             
              <td>{{ $jbtypes[$row->jctype] }}</td>
              
              <td>{{ $row->vendorname }}</td>
              <td>{{ $row->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
    @if($incidents)
    <div class="inner-title">
        <h4 class="card-details"><span><b>Incident Cards</b></span></h4>
    </div>
    <div class="table-responsive">
    <table class="table table-hover community-carsssss">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Community</th>
                <th>ID</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($incidents as $ival)
            <tr>
                <td>{{ date("d.m.Y",strtotime($ival->idate)) }}</td>
                <td>{{ $ival->sitename }}</td>
                <td><a href="{{ route('incident.view',[$ival->id]) }}">{{ $ival->refid }}</a></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
    @if($breakdowns)
    <div class="inner-title">
        <h4 class="card-details"><span><b>Breakdown Report</b></span></h4>
    </div>
    <div class="table-responsive">
    <table class="table table-hover community-carsssss">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Title</th>
                 <th>ID</th>
                <th>Community</th>
            </tr>
        </thead>
        <tbody>
            @foreach($breakdowns as $bval)
            <tr>
                 <td>{{ date("d.m.Y",strtotime($bval->bdate)) }}</td>
                  <td><a href="{{ route('breakdown.view',[$bval->id]) }}">{{ $bval->title }}</a></td>
                  <td>{{ $bval->refid }}</td>
                <td>{{ $bval->sitename }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
    @if (count($historycards) > 0)
    <div class="inner-title">
        <h4 class="card-details"><span><b>History Cards</b></span></h4>
    </div>
    <div class="table-responsive">
    <table class="table table-hover community-carsssss">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Type</th>
                <th>Reference No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historycards as $row)
           <tr>
                    <td>{{ date("d.m.Y",strtotime($row->updated_at)) }}</td>
                  <td>{{ date("h:i A",strtotime($row->updated_at)) }}</td>
                  <td>{{ $hctypes[$row->htype] }}</td>
                  <td>
                    
                    @if($row->htype=='1')
                    <a href="{{ route('breakdown.view',[$row->refid]) }}">{{ $row->ref_idno }}</a>
                    @elseif($row->htype=='2')
                    <a href="{{ route('incident.view',[$row->refid]) }}">{{ $row->ref_idno }}</a>
                    @else
                    <a href="{{ route('jobcard.view',[$row->refid]) }}">{{ $row->ref_idno }}</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
    </div>                                      
  </div>
@include('partials.footer')
@stop
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
		$( document ).ready(function() {
			$('#sfromdate').datepicker({ dateFormat: "dd-mm-yy" });
			$('#stodate').datepicker({ dateFormat: "dd-mm-yy" });
			
			$('#sfromdate2').datepicker({ dateFormat: "dd-mm-yy" });
			$('#stodate2').datepicker({ dateFormat: "dd-mm-yy" });
		 });
		function EditComAsset(id)
		{
			$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('commassets.cassetedit') }}',
			data: { cassetId: id},
			dataType: 'json',
			success: function( response ) {
				console.log(response.enddate);
				$("#amc_type option:selected").val(response.amc_type);
				$("#sfromdate").val(response.startdate);
				$("#stodate").val(response.enddate);
				$("#asset_id").val(response.id);
				$("#cam_id").val(response.cam_id);
				$('#summary').modal('show');
			}}); 
		}
		function submitMaintenance()
		{
			
			var asset_id = $("#asset_id").val();
			var cam_id = $("#cam_id").val();
			var amc_type = $("#amc_type").val();
			var sfromdate = $("#sfromdate").val();
			var stodate = $("#stodate").val();
			$.ajax({
				type: "get",
				cache:false,
				url: '{{ route('commassets.maintenanceupdate') }}',
				data: { asset_id: asset_id, amc_type: amc_type, sfromdate: sfromdate, stodate: stodate},
				success: function( response ) 
				{
					alert("Asset Updated Successfully");
					location.replace("/commassets/"+cam_id);
				}  
			 });
		}
		
		function submitMaintenance2()
		{
			
			var asset_id = $("#asset_id2").val();
			var amc_type = $("#amc_type2").val();
			var sfromdate = $("#sfromdate2").val();
			var stodate = $("#stodate2").val();
			$.ajax({
				type: "get",
				cache:false,
				url: '{{ route('commassets.maintenance') }}',
				data: { asset_id: asset_id, amc_type: amc_type, sfromdate: sfromdate, stodate: stodate},
				success: function( response ) 
				{
					if(response=="Success")
					{
						alert("Maintenance Created Successfully");
						location.replace("/commassets/"+asset_id);
					}
				}  
			 });
		 }
</script>
<div class="modal fade snag-modal" id="summary" role="dialog">
    <div class="modal-dialog" style="width:800px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>Maintenance</h4>
        </div>
        <div class="modal-body" style="text-align: center;">	
			 <input type="hidden" name="asset_id" id="asset_id" value="" />	
			 <input type="hidden" name="cam_id" id="cam_id" value="" />	
			 <div class="form-group tran" style="width:100%;">	
			 	<div class="individual-reportfrom" style="width:33%; float:left;">
                   <label class="label-individual-from" style="float:left;">Type<span>:</span></label>
                    <select style="width:75%;" class="form-control erequired" onChange="gettimeblock(this.value)"
                     id="amc_type" name="amc_type">
                        <option value="amc" selected="selected">AMC</option>
                        <option value="waranty">Waranty</option>
                        <option value="na">N/A</option>
                    </select>
                    <p class="help-block"></p>
                </div>		 	
				<div class="individual-reportfrom waraty_amc" style="width:33%; float:left;">
					<label class="label-individual-from" style="float:left;">Start Date<span>:</span></label>
					<input type="text" name="sfromdate" id="sfromdate"  class="hasDatePicker form-control index-date1" style="float:left; width:135px;"/>
				</div>
				<div class="individual-reportto waraty_amc" style="width:33%; float:left;">
				   <label class="label-individual-to"  style="float:left;">End Date<span>:</span></label>
				   <input type="text" name="stodate" id="stodate" class="hasDatePicker form-control index-date1" style="float:left; width:135px;"/>
				</div>
			</div>
			<div class="desibtn" style="margin-top:20px; width:100%; overflow:hidden;">
			  	<button  type="button" class="btn btn-primary"  onclick="submitMaintenance()">
					Submit
				</button>
			</div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade snag-modal" id="summary2" role="dialog">
    <div class="modal-dialog" style="width:800px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>Maintenance</h4>
        </div>
        <div class="modal-body" style="text-align: center;">	
			 <input type="hidden" name="asset_id" id="asset_id2" value="<?php echo $comm_asset->id; ?>" />	
			 <div class="form-group tran" style="width:100%;">	
			 	<div class="individual-reportfrom" style="width:30%; float:left;">
                   <label class="label-individual-from" style="float:left;">Type<span>:</span></label>
                    <select style="width:75%;" class="form-control erequired" onChange="gettimeblock(this.value)" id="amc_type2" name="amc_type"><option value="amc" selected="selected">AMC</option><option value="waranty">Waranty</option><option value="na">N/A</option></select>
                    <p class="help-block"></p>
                </div>		 	
				<div class="individual-reportfrom waraty_amc" style="width:30%; float:left;">
					<label class="label-individual-from" style="float:left;">Start Date<span>:</span></label>
					<input type="text" name="sfromdate" id="sfromdate2"  class="hasDatePicker form-control index-date1" style="float:left; width:135px; margin-right:0px;"/>
				</div>
				<div class="individual-reportto waraty_amc" style="width:40%; float:left;">
				   <label class="label-individual-to"  style="float:left;">End Date<span>:</span></label>
				   <input type="text" name="stodate" id="stodate2" class="hasDatePicker form-control index-date1" style="float:left; width:135px;"/>
                    <button  type="button" class="btn btn-primary"  onclick="submitMaintenance2()">
                        Submit
                    </button>
				</div>
			</div>
			<div class="desibtn" style="margin-top:20px; width:100%; overflow:hidden;">
			</div>
        </div>
      </div>
    </div>
  </div>
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> 
<script>
var my_time;
$(document).ready(function() {
  pageScroll();
  $("#contain-table_scroll").mouseover(function() {
    clearTimeout(my_time);
  }).mouseout(function() {
    pageScroll();
  });
});

function pageScroll() {  
    var objDiv = document.getElementById("contain-table_scroll");
  objDiv.scrollTop = objDiv.scrollTop + 1;  
  //$('p:nth-of-type(1)').html('scrollTop : '+ objDiv.scrollTop);
 // $('p:nth-of-type(2)').html('scrollHeight : ' + objDiv.scrollHeight);
 $('pre:nth-of-type(1)').html('scrollTop : '+ objDiv.scrollTop);
  $('pre:nth-of-type(2)').html('scrollHeight : ' + objDiv.scrollHeight);
  if (objDiv.scrollTop == (objDiv.scrollHeight - 100)) {
    objDiv.scrollTop = 0;
  }
  my_time = setTimeout('pageScroll()', 25);
}
</script>