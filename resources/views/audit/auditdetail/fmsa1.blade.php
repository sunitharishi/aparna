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
        <div class="panel-heading fms-darsubmission-heading">
            AUDIT -> FMS -  DAR SUBMISSION
             <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>
        </div>
        <div class="panel-body fms-darsubmission-body">
            <div class="fma-areport">
               <div class="selection-offme">
                <div class="individual-reportsites">
            <label class="label-individual-site">Sites<span>:</span></label>
             {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control fmsauditreport', 'id' => 'site']) !!}	
             <?php  $year = date("Y");
			        $month = date("m");
			   ?>
               </div>
               
               
               <div class="individual-reportfrom">
                <label class="label-individual-from">From<span>:</span></label>
               <input type="text" name="fromdate" id="fromdate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
                 </div>
             
               <div class="individual-reportto">
                  <label class="label-individual-to">To<span>:</span></label>
                     <input type="text" name="todate" id="todate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
                 </div>
              
               <div class="individual-buttons">
                      <button onclick="getctptAuditreport()" class="btn btn-primary">Go..</button>
                      <button onclick="getctptAuditreportexport()" class="btn btn-primary">Export..</button>
                </div>
                    </div>  
                <div id="validresponse" class="table-responsive">
                <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Category</th>
                          <th>Date & Time of Submission</th>
                          <th>Date for which DAR sent</th>
                          <th>Remarks</th>
                       </tr>
                    </thead>
                <tbody>
                    <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                         <?php
						    $rdate = date("d-m-Y", strtotime($tt->reporton)); 
						   $checkval = checkDailyStatus($rdate, $kk);
						 if($checkval[0] == 'yes'){ } else { ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                         <td>FMS</td>
                         <td>{{ date("F j, Y, g:i a",strtotime($tt['created_at'])) }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td><?php
						  $rdate = date("d-m-Y", strtotime($tt->reporton));
						 $checkval = checkDailyStatus($rdate, $kk);
						 if($checkval[0] == 'yes'){ 
						   if($tt->blockflag == 1) { 
						   	  echo "DAR Submitted with Delay";
						   }
						    else{
							   echo "DAR Submitted";
							}
						 } else {
						   echo "DAR Not Submitted";
						 }
						  ?></td>
                      </tr> 
                       <?php $i = $i + 1; ?>
                      <?php } ?>
                     
                       @endforeach
                       @endif
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
        </div>
         
    </div>  
    
   
 @include('partials.footer')
 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

//STATUS REPORTS

$('#fromdate').datepicker({ dateFormat: "dd-mm-yy" });
$('#todate').datepicker({ dateFormat: "dd-mm-yy" });

  });
  
  function getctptAuditreport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   
      $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('auditreport.getfmsdarauditreports') }}', 
				data: { fromdate: fromdate, todate: todate, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
			
				}  
        });
  }
  
  function getctptAuditreportexport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   window.location = "/getfmsdarauditreportsexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"";    

  }
  
  
  </script>

@stop

