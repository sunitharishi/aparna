@extends('layouts.app')



@section('content')
<style>
 .table-striped1.table
 {
  width:70%;
  margin:0 auto;
 }
 .table-striped1.table tr td
 {
  padding:4px;
 }
 .table-striped1.table tr th
 {
  padding:4px;
 }
 .caategorry
 {
  width:70%;
  margin:0 auto;
 }
 .adddmin-panel
 {
  width:70%;
  margin:0 auto;
 }
</style>

	<div class="dailyreports getdailyreport panelmar">

    <div class="adddmin-panel"><h3 class="page-title"><span>Daily Reports</span></h3></div>



    <?php /*?>{!! Form::open(['method' => 'get']) !!}

    <div class="row">

        <div class="col-xs-6 col-md-4 form-group">

            {!! Form::label('project','Project',['class' => 'control-label']) !!}

            {!! Form::select('project', $projects, old('project',$currentProject), ['class' => 'form-control']) !!}

        </div>

        <div class="col-xs-4">

            <label class="control-label">&nbsp;</label><br>

            {!! Form::submit('Select project',['class' => 'btn btn-info']) !!}

        </div>

    </div>

    {!! Form::close() !!}



    <div class="table-responsive">

        <table class="table table-striped table-hover table-condensed datatable">

            <thead>

            <tr>

                <th>Month</th>

                <th>Income</th>

                <th>Expenses</th>

                <th>Fees</th>

                <th>Total</th>

            </tr>

            </thead>



            <tbody>

            @foreach ($entries as $date => $info)

                @foreach($info as $currency => $row)

                    <td>{{ $date }}</td>

                    <td>{{ number_format($row['income'],2) }} {{ $currency }}</td>

                    <td>{{ number_format($row['expenses'],2) }} {{ $currency }}</td>

                    <td>{{ number_format($row['fees'],2) }} {{ $currency }}</td>

                    <td>{{ number_format($row['total'],2) }} {{ $currency }}</td>

                    </tr>

                    <?php $date = ''; ?>

                @endforeach

            @endforeach

            </tbody>

        </table>

    </div><?php */?>

	

	<div class="row">

                <div class="col-xs-12 form-group">

				

				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}

				   

					{{ Form::select('sites', [

					'0' => 'All',

					'1' => 'Sarovar', 

					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']

					) }} <br/><?php */?>

					<div class="caategorry"><div class="dlyrep-select hillpark">

					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label main-select']) !!}

                    {!! Form::select('sites', $sites_names, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}	
                    
                    <?php $dateval = date('Y-m-d'); ?>
                     <span class="permission-space"><input type="text" id="example1" value="<?php echo date('d-m-Y', strtotime($dateval .' -1 day'));; ?>" class="hasDatePicker form-control"></span>			
  
					</div></div>
                    
                      
                  <div id="validresponse">
					<table class="table-striped1 table">

					<thead class="head-color">

					<tr>

					  <th>Community</th> 

					  <th style="text-align:center;">Fire Safety</th>

					  <th style="text-align:center;">FMS</th>

					  <th style="text-align:center;">PMS</th>
 
					  <th style="text-align:center;">Security</th>

					  <th>Action</th>

					</tr>

					</thead>

                    <tbody>

                    

                     @if (count($sites_attr_names) > 0)



                        @foreach ($sites_attr_names as $sk => $client)

                           <tr>

					  <td><b>{{ $client }}</b></td>   

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					   <!--<th>--><!--<button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>--> <!--<button type="button" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> <!--Print</button>--> <!--<button type="button" class="btn btn-download btn-xs">--><!--<i class="fa fa-download" aria-hidden="true"></i>--> <!--Download</button>--><!--</th>-->
                       <th><button type="button" id="expandarr_{{ $sk }}" class="open" onclick="setval({{ $sk }})"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button></th>

					</tr>
                    
                        <tr style="display:none;" id="row_{{ $sk }}" class="showmore">
                        
                        <?php //echo getlogperms_daily('edit_fms'); ?>
                      
					  <td colspan="3">
                         <table class="intablener">
                           <?php /*?><tbody> 
                               <tr>
                                  <td><b>Fire Safety</b></td>  
					              <td align="center" class="conticons"> @if(getlogperms_daily('edit_firesafety'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" data_id="{{ $sk }}" onclick="getedit_firesafe_val({{ $sk }});"></i>@endif <i class="fa fa-eye" aria-hidden="true" onclick="getview_firesafe_val({{ $sk }});"></i> <i class="fa fa-print" aria-hidden="true" onclick="getprint_firesafe_val({{ $sk }});"></i>  <i class="fa fa-download" aria-hidden="true" onclick="getdownload_firesafe_val({{ $sk }});"></i></span></td>
                               </tr>
                               <tr> 
                                 <td><b>FMS</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_fms'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_fms_val({{ $sk }});"></i>@endif<i class="fa fa-eye" aria-hidden="true" onclick="getview_fms_val({{ $sk }});"></i> <i class="fa fa-print" aria-hidden="true" onclick="getprint_fms_val({{ $sk }});"></i>  <i class="fa fa-download" aria-hidden="true" onclick="getdownload_fms_val({{ $sk }});"></i></span></td>
                               </tr>
                               <tr> 
                                 <td><b>PMS</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_pms'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_pms_val({{ $sk }});"></i>@endif <i class="fa fa-eye" aria-hidden="true" onclick="getview_pms_val({{ $sk }});"></i> <i class="fa fa-print" aria-hidden="true" onclick="getprint_pms_val({{ $sk }});"></i>  <i class="fa fa-download" aria-hidden="true" onclick="getdownload_pms_val({{ $sk }});"></i></span></td>
                               </tr>
                               <tr> 
                                 <td><b>Security</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_security'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_secr_val({{ $sk }});"></i> @endif<i class="fa fa-eye" aria-hidden="true" onclick="getview_secr_val({{ $sk }});"></i> <i class="fa fa-print" aria-hidden="true" onclick="getprint_secr_val({{ $sk }});"></i>  <i class="fa fa-download" aria-hidden="true" onclick="getdownload_secr_val({{ $sk }});"></i></span></td>
                               </tr>
                               <tr> 
                                 <td><b>Horticulture</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_horticulture'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_secr_val({{ $sk }});"></i> @endif<i class="fa fa-eye" aria-hidden="true" onclick="getview_secr_val({{ $sk }});"></i> <i class="fa fa-print" aria-hidden="true" onclick="getprint_secr_val({{ $sk }});"></i>  <i class="fa fa-download" aria-hidden="true" onclick="getdownload_secr_val({{ $sk }});"></i></span></td>
                               </tr>
                            </tbody><?php */?>
                            
                            <tbody> 
                           	   <?php if(getlogperms('edit_firesafety') || getlogperms('view_fire_safety') || getlogperms('print_fire_safety') || getlogperms('download_fire_safety')) { ?>
                               <tr>
                                  <td><b>Fire Safety</b></td>  
								  
					              <td align="center" class="conticons">@if(getlogperms_daily('edit_firesafety'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" data_id="{{ $sk }}" onclick="getedit_firesafe_val({{ $sk }});"></i> @endif @if(getlogperms('view_fire_safety'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_firesafe_val({{ $sk }});"></i>@endif @if(getlogperms('print_fire_safety'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_firesafe_val({{ $sk }});"></i>  @endif @if(getlogperms('download_fire_safety'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_firesafe_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_fms') || getlogperms('view_fms') || getlogperms('print_fms') || getlogperms('download_fms')) { ?>
                               <tr> 
                                 <td><b>FMS</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_fms'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_fms_val({{ $sk }});"></i>@endif @if(getlogperms('view_fms'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_fms_val({{ $sk }});"></i>@endif @if(getlogperms('print_fms'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_fms_val({{ $sk }});"></i>@endif  @if(getlogperms('download_fms'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_fms_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_pms') || getlogperms('view_pms') || getlogperms('print_pms') || getlogperms('download_pms')) { ?>
                               <tr> 
                                 <td><b>PMS</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_pms'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_pms_val({{ $sk }});"></i> @endif @if(getlogperms('view_pms'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_pms_val({{ $sk }});"></i> @endif @if(getlogperms('print_pms'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_pms_val({{ $sk }});"></i>  @endif @if(getlogperms('download_pms'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_pms_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_security') || getlogperms('view_security') || getlogperms('print_security') || getlogperms('download_security')) { ?>
                               <tr> 
                                 <td><b>Security</b></td>
                                 <td align="center" class="conticons">@if(getlogperms_daily('edit_security'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_secr_val({{ $sk }});"></i>@endif @if(getlogperms('view_security'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_secr_val({{ $sk }});"></i>@endif @if(getlogperms('print_security'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_secr_val({{ $sk }});"></i>@endif  @if(getlogperms('download_security'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_secr_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                               <?php if(getlogperms('edit_horticulture') || getlogperms('view_horticulture') || getlogperms('print_horticulture') || getlogperms('download_horticulture')) { ?>
                               <tr> 
                                 <td><b>Horticulture</b></td>
                                  <td align="center" class="conticons">@if(getlogperms_daily('edit_horticulture'))<span><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="getedit_horti_val({{ $sk }});"></i>@endif @if(getlogperms('view_horticulture'))<i class="fa fa-eye" aria-hidden="true" onclick="getview_horti_val({{ $sk }});"></i>@endif @if(getlogperms('print_horticulture'))<i class="fa fa-print" aria-hidden="true" onclick="getprint_horti_val({{ $sk }});"></i>@endif  @if(getlogperms('download_horticulture'))<i class="fa fa-download" aria-hidden="true" onclick="getdownload_horti_val({{ $sk }});"></i>@endif</span></td>
                               </tr>
                               <?php } ?>
                            </tbody>
                         </table>
                      </td> 
                       
                      <td></td>
                      <td></td>
                      <td></td>  
					</tr>

                        

                         @endforeach



                   @endif

                   </tbody>

					</table>

					</div>

					<?php // echo "<pre>"; print_r($sites_attr_names); echo "</pre>"; ?>

					

					

					<?php /*?><tbody>

					 <tr>

					  <td>Sarovar</td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					   <th><!--<button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>--> <button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>

					</tr>

					 <tr>

					  <td>Grande</td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					  <th><!--<button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button> --><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>

					</tr>

					 <tr>

					  <td>CyberZon</td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>

					  <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>

					  <th><!--<button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>--> <button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>

					</tr>

					</tbody>

					</table><?php */?>

					

					

				     

                 <?php /*?>   {!! Form::label('dailycat', 'category', ['class' => 'control-label']) !!}

                    {!! Form::select('category', $client_statuses, old('category'), ['class' => 'form-control', 'id' => 'select_id']) !!}<?php */?>

					

					<?php 

					  // echo "<pre>";  print_r($sites_names);  	echo "</pre>";

					?>

                    

                </div>

            </div>

	

	<?php /*?>   <div>Line1:  Status1 </div>

	   <div>Line2:  Status2 </div>

	   <div>Line3:  Status3 </div> 

	   <div>Line4:  Status4 </div><?php */?>

	 </div>  
  @include('partials.footer')
@stop

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">



$( document ).ready(function() {

 var dateval = $("#example1").val();

                $.ajax({
 
                type: "get",
				cache:false,
				url: '{{ route('validation.checkdailystatus') }}',
				data: { dateval: dateval},
				success: function( response ) {
			       $("#validresponse").html(response);
				}  
        });


  $( "#select_id" ).change(function() 

  {

   var val = $(this).val();

  

   var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/getdailyreport/"+val;

  // window.location.replace('getdailyreport/'+val);

	



  });

  

  $('select[name="sites"]').on('change', function(){    

    //alert($(this).val());   

	

	 var val = $(this).val();

	 

	  if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 //  alert(val);

   var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   //window.location.href = "http://report.local/getdailyreportdetail";

      window.location.href = "/getdailyreportdetail/"+val; 

	  }

  // window.location.replace('getdailyreport/'+val);

	//alert(id); 

});

$("#example1").datepicker({

 dateFormat: "dd-mm-yy",
 maxDate: '-1',

  onSelect: function(dateText) {

  // alert("Selected date: " + dateText + "; input's current value: " + this.value);
	
	 var site = $("#select_id11").val();

	// window.location.href = "/getdailyreportstatusdate/"+site+"/"+dateText; 
	 
	  var dateval = $("#example1").val();

                $.ajax({
 
                type: "get",
				cache:false,
				url: '{{ route('validation.checkdailystatus') }}',
				data: { dateval: dateval},
				success: function( response ) {
			       $("#validresponse").html(response);
				}  
        });

  }

});

 
});

function setval(id){ 
/* $(".showmore").hide();*/

if($("#row_"+id).hasClass('showexpand')){
 $("#row_"+id).removeClass('showexpand'); 
 $("#expandarr_"+id).removeClass('arrdown');
 $("#row_"+id).hide();
 
}else{
  $("#row_"+id).addClass('showexpand');
  $("#expandarr_"+id).addClass('arrdown');
   $("#row_"+id).show();
}
  
}



function getedit_firesafe_val(id){

 var datev = $("#example1").val();

window.location.href = "/getdailyreport/"+id+"/1/"+datev;  
}

function getview_firesafe_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportfiresafeviewdetail/"+id+"/"+datev; 
}

function getprint_firesafe_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportprintfiresafe/"+id+"/"+datev; 
}

function getdownload_firesafe_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/dailyreportdownloadfiresafe/"+id+"/"+datev; 
}

function getedit_fms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreport/"+id+"/2/"+datev; 
}

function getedit_pms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreport/"+id+"/3/"+datev; 
}

function getedit_secr_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreport/"+id+"/4/"+datev; 
}
function getedit_horti_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreport/"+id+"/6/"+datev; 
}


function getview_horti_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreporthortiviewdetail/"+id+"/"+datev; 
}


function getview_fms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportviewdetail/"+id+"/"+datev; 
}
  
function getview_pms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportpmsviewdetail/"+id+"/"+datev; 
}
  
  
function getview_secr_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportsecurityviewdetail/"+id+"/"+datev; 
}


function getprint_fms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportprintfpm/"+id+"/"+datev; 
}

function getprint_pms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportprintpms/"+id+"/"+datev; 
}

function getprint_secr_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/getdailyreportprintsecurity/"+id+"/"+datev; 
}

function getdownload_fms_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/dailyreportdownloadfms/"+id+"/"+datev; 
}

function getdownload_pms_val(id){ 
 
 var datev = $("#example1").val();

window.location.href = "/dailyreportdownloadpms/"+id+"/"+datev;   
}

function getdownload_secr_val(id){ 

 var datev = $("#example1").val();

window.location.href = "/dailyreportdownloadsecure/"+id+"/"+datev; 
}



  

  </script>

