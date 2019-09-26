<style>

</style>
 

@extends('layouts.app')

@section('content')
<div class="dieselreport-daily">
    <div class="dailyreports getdailyreport notprint" >
        <h3 class="page-title"><span>Diesel Reports</span></h3>
    </div>
    <div class="notprint">
        <div class="row">  
            <div class="col-xs-12 form-group"> 
                <div class="yeeeeaa">
                    <div class="caategorry communities-selection">
                        {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label main-select']) !!}
                        {!! Form::select('sites', $sites_names, old('category'), ['class' => 'form-control', 'id' => 'select_id11', 'onchange' => 'siteblock(this.value)']) !!}	
                     </div>
                     <div class="caategorry dgset-selection">
                        {!! Form::label('dailycat2', 'DG Sets:', ['class' => 'control-label main-select']) !!}
                        {!! Form::select('dgsets', $dgsets, '', ['class' => 'form-control', 'id' => 'dgset_block']) !!}	
                    </div>
                    <div class="from-date">From Date:</div>
                    <div class="dlyrep-select1">
                        <input type="text" id="fromdate" name="fromdate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control">
                    </div>
                    <div class="to-date">To Date:</div>
                    <div class="dlyrep-select1">
                        <input type="text" id="todate" name="todate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control">
                    </div>  
                    <div class="view-diesel">
                        <button id="viewtarget" onclick="checkselected();" class="btn btn-success btn-sm">View </buttton>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="loader" style="text-align:center;"></div>
    <div id="validresponse" class="validprint"></div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {
$('#fromdate').datepicker({ dateFormat: "dd-mm-yy" });	
$('#todate').datepicker({ dateFormat: "dd-mm-yy" });	
});
function checkselected(){
 $("#validresponse").html('');
 $(".loader").html('<img src="/images/loadinganimation2.gif" width="100px" />');
var fromdate = $('#fromdate').val();
var todate = $('#todate').val();
var siteval = $('#select_id11').val();
var dgval = $("#dgset_block").val();


//alert(fromdate);



   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getdailydieselreports') }}',
				data: { reportdate: fromdate, todate: todate, site: siteval, dgset: dgval},
				success: function( response ) {
				    $(".loader").html(''); 
					$("#validresponse").html(response);
				}   
        });

}

function siteblock(dis)
{
	var siteval = $('#select_id11').val();
	
	 $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getdgsetsites') }}',
				data: {site: siteval},
				success: function( response ) {
				    $(".loader").html(''); 
					$("#dgset_block").html(response);
				}   
        });
}
  </script>

<div class="noprint">
	@include('partials.footer')
</div>
@stop     