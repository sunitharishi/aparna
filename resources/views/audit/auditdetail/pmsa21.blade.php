@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
   

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading pms-cmdrmd-heading">
            AUDIT -> PMS -  CMD &amp; RMD
             <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>
        </div>
        <div class="panel-body pms-cmdrmd-body">
            <div class="pms-areport">
             <div class="selection-pmsreport">
                <div class="individual-reportsites">
            <label class="label-individual-site">Sites<span>:</span></label>
             {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control pms-auditreport', 'id' => 'site']) !!}	
             <?php  $year = date("Y");
			        $month = date("m");
			   ?>
             </div>
               
               
               <div class="individual-reportfrom">
                <label class="label-individual-from">Year<span>:</span></label>
               	 <select name='mis_year' id="mis_year" class="form-control garbage-selectionyear"> 
                         <option value="">Select Year</option>
						 <?php for($i=2018;$i<=2030;$i++){ ?>
						 <option value="<?php echo $i; ?>" <?php if($year == $i) echo 'Selected';?>><?php echo $i; ?></option>
						 <?php } ?>
					</select>
                   </div>
             
               <div class="individual-reportto">
                  <label class="label-individual-to">Month<span>:</span></label> 
                     <select name='mis_month' id="mis_month" class="form-control garbage-selectionmonth">  
                         <option value="">Select Month</option>
						 <option value="1" <?php if($month == "1") echo 'Selected';?>>Jan</option>
						 <option value="2" <?php if($month == "2") echo 'Selected';?>>Feb</option>
						 <option value="3" <?php if($month == "3") echo 'Selected';?>>Mar</option>
						 <option value="4" <?php if($month == "4") echo 'Selected';?>>April</option>
						 <option value="5" <?php if($month == "5") echo 'Selected';?>>May</option>
						 <option value="6" <?php if($month == "6") echo 'Selected';?>>June</option>
						 <option value="7" <?php if($month == "7") echo 'Selected';?>>July</option>
						 <option value="8" <?php if($month == "8") echo 'Selected';?>>Aug</option>
						 <option value="9" <?php if($month == "9") echo 'Selected';?>>Sept</option>
						 <option value="10" <?php if($month == "10") echo 'Selected';?>>Oct</option>
						 <option value="11" <?php if($month == "11") echo 'Selected';?>>Nov</option>
						 <option value="12" <?php if($month == "12") echo 'Selected';?>>Dec</option>
					</select> 
                  </div>
              
               <div class="individual-buttons">
                      <button onclick="getctptAuditreport()" class="btn btn-primary">Go..</button>
                        <button onclick="getpmsdarAuditreportexport()" class="btn btn-primary">Export..</button>
                 </div>
                      </div>
                         <div id="validresponse">
                             <div class="table-responsive">
               <table width="100%" border="1" cellspacing="0" class="apms-reporttable">
                       <thead>
                          <tr>
                           <th colspan="19" style="font-size:15px;text-align:center;"> Installed capacity Vs Maximum recorded demand (load)<span></span></th>
                          </tr>
                      <tr>
					  
							<th  rowspan="2">S.No</th>
							<th rowspan="2"> Project Name </th>
							<th   rowspan="2">No. of Units</th>
							<th  rowspan="2">Occupancy </th>
							<th   rowspan="2">Occupancy in %</th>
							<th   colspan="2">CMD in KVA</th>
							<th  colspan="2">RMD in KVA</th>
							<th   colspan="3">Transformer Capacity (KVA)</th>
							<th   colspan="4">DG Set Capacity (KVA)</th>
							<th   rowspan="2">Service No.</th>
							<th   rowspan="2">Peak Load recorded in Month</th>
							<th   rowspan="2">Remarks</th>
						  
					</tr>
					<tr>
						<th>Total</th>
						<th>Per Flat</th>
						<th> Total</th>
						<th> Per Flat</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on tranformer</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on DG</th>
						<th>DG Backup</th>
                    </tr>
                    </thead>      
					 <tbody>	
						  @if (count($sites) > 0) <?php $i = 0; ?>
                        @foreach ($sites as $key => $site)
						 <?php $i = $i + 1; ?>
                              <tr>
						 <td style="text-align:center;"><b><?php  echo $i;   ?></b></td>  
                         <td class="sboteheight"><b><?php  echo $site;   ?></b></td> 
                        <td class="text-center"><b> <?php  if(isset($flats[$key])) {  echo  $flats[$key]; }?></b></td> 
						
						<td> <?php  if(isset($occupency[$key]['occupency'])) echo $occupency[$key]['occupency']; ?> </td>
						<td><?php if(isset($occupency[$key]['occupency']) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round(($occupency[$key]['occupency']/$flats[$key]),2) * 100; echo "%";
						} }  ?></td> 
						<td> <?php  if(isset($cmdkva[$key])) echo $cmdkva[$key]; ?> </td>
						<td><?php if(isset($cmdkva[$key]) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round((float)((float)$cmdkva[$key]/(int)$flats[$key]),2);
						} }  ?></td> 
						<td> <?php  if(isset($existing[$key]['total_rmd'])) echo $existing[$key]['total_rmd']; ?> </td>
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($occupency[$key]['occupency'])) {
						    if((float)$occupency[$key]['occupency'] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/$occupency[$key]['occupency']),2);
						} } ?></td> 
						<td> <?php  if(isset($transforkva[$key])) echo $transforkva[$key]; ?> </td> 
						<td> <?php if(isset($transforkva[$key]) && isset($flats[$key])) { if((int)$flats[$key] > 0) {
 						     echo round((float)((float)$transforkva[$key]/(int)$flats[$key]),2);
						} } ?></td>
						<td> <?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) { 
						     if((float)($transforkva[$key]) > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$transforkva[$key]),2) * 100; echo "%";
						} }  ?></td>
						<td> <?php  if(isset($dg_kva[$key])) echo $dg_kva[$key]; ?> </td>
						<td><?php if(isset($dg_kva[$key])  && isset($flats[$key])){  if((int)$flats[$key] > 0) {
						     echo round((float)((float)$dg_kva[$key]/$flats[$key]),2);
						}  } ?></td> 
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) {  if ((float)$dg_kva[$key] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$dg_kva[$key]),2) * 100;echo "%";
						} } ?></td> 
						<td> <?php   if(isset($backup[$key])) { echo  $backup[$key]; }  ?></td> 
						   
						<td> <?php  if(isset($service_numb[$key])) echo $service_numb[$key]; ?> </td>
						<td> <?php  if(isset($existing[$key]['peak_load_record'])) echo $existing[$key]['peak_load_record']; ?> </td>
						<td> <?php  if(isset($existing[$key]['remarks'])) echo $existing[$key]['remarks']; ?> </td>
						
                      
					    </tr>    
							    
							 @endforeach
							   
							 @endif
                              
                          
                        </tbody>
                      </table> 
                      </div>
                </div>
            </div>
        </div> 
    </div>  
    
   
 @include('partials.footer')
 
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

//STATUS REPORTS

$('#fromdate').datepicker({ dateFormat: "dd-mm-yy" });
$('#todate').datepicker({ dateFormat: "dd-mm-yy" });


  $( "#cmdmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/17/"+year+"/"+month; 
		}
	
	});

  });
  
  function getctptAuditreport(){
 	var year = $("#mis_year").val();
    var month = $("#mis_month").val();
    var site = $("#site").val();
   
      $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('auditreport.getpmscmdrmdreports') }}',
				data: { year: year, month: month, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
			
				}  
        });
  }
  
  
  function getpmsdarAuditreportexport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   window.location = "/getgarbageauditreportsexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"";    
   
   
   
     }
  </script>

@stop

