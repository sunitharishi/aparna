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
        <div class="panel-heading">
          AUDIT -> FMS -  LT 
           <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>   
        </div>
         <div class="panel-body">
            <div class="fma-areport">
              <div class="selection-offme">
              <div class="individual-reportsites">
            <label class="label-individual-site">Sites:</label> 
              {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control fmsauditreport', 'id' => 'site']) !!}	
             <?php  $year = date("Y");
			        $month = date("m");
			   ?>
               </div>
                <div class="individual-reportfrom">
                <label class="label-individual-from">From:</label>
               <input type="text" name="fromdate" id="fromdate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
                 </div>
             
               <div class="individual-reportto">
                  <label class="label-individual-to">To:</label>
                     <input type="text" name="todate" id="todate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
                  </div>
              
               <div class="individual-buttons">
                      <button onclick="getctptAuditreport()" class="btn btn-primary">Go..</button>
                 </div>
                      </div>
                      <div id="validresponse" class="table-responsive">
                <?php /*?><table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th> LT</th>
                          <th>Solar Power Units</th>
                          <th>DG Units</th>
                          <th>Residents</th>
                          <th>Club House</th>
                          <th>STP</th>
                          <th>WSP</th>
                          <th>Lifts</th>
                          <th>Vendors</th>
                          <th>Comman Area</th>
                          <th>Others</th>
                          <th>Variance</th>
                          <th>% of Loss</th>
                          <th>Observation</th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><p class="singleline"><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></p></td>
                        <td>{{ $tt->pwr_tot_lt }}</td>
                        <td>{{ $tt->pwr_solarpwrunits }}</td>
                        <td>{{ $tt->dgset_dgunits }}</td>
                        <td>{{ $tt->pwr_residents }}</td>
                        <td>{{ $tt->pwr_club_house }}</td>
                        <td>{{ $tt->pwr_stp }}</td>
                        <td>{{ $tt->pwr_wsp }}</td>
                        <td>{{ $tt->pwr_lifts }}</td>
                        <td>{{ $tt->pwr_vendors }}</td>
                        <td>{{ $tt->pwr_common_area }}</td>
                        <td>{{ $tt->pwr_others }}</td>
                        <td>{{ $tt->pwr_others }}</td>
                        <td>{{ $tt->pwr_others }}</td>
                        <td>{{ $tt->pwr_others }}</td>  
                      <?php $i = $i + 1; ?>
                       @endforeach
                       @endif
                        @endforeach
                          
                    @else 
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table><?php */?>
                    <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th rowspan="2">S.No</th>
                          <th rowspan="2">Project Name</th>
                          <th rowspan="2">Date</th>
                          <th rowspan="2"> LT</th>
                          <th colspan="3" style="text-align:center;">Solar Power Units</th>
                          <th colspan="3" style="text-align:center;">DG Units</th>
                          <th colspan="3" style="text-align:center;">Residents</th>
                          <th colspan="3" style="text-align:center;">Club House</th>
                          <th colspan="3" style="text-align:center;">STP</th>
                          <th colspan="3" style="text-align:center;">WSP</th>
                          <th colspan="3" style="text-align:center;">Lifts</th>
                          <th colspan="3" style="text-align:center;">Vendors</th>
                          <th colspan="3" style="text-align:center;">Comman Area</th>
                          <th colspan="3" style="text-align:center;">Others</th>
                          <th rowspan="2">Variance</th>
                          <th rowspan="2">% of Loss</th>
                       </tr>
                       <tr>
                          <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                          <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                          <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                          <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                         <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                          <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                           <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                           <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                           <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                           <th>Opening</th>
                          <th>Closing Reading</th>
                          <th>Consumption for the day</th>
                       </tr>
                    </thead>
                    <tbody>
                       
                      <tr>
                        <td>1</td>
                        <td>Cyberlife</td>
                        <td>1-Oct-18</td>
                        <td> 1,950 </td>
                        <td>200</td>
                        <td>250</td>
                        <td>50</td>
                        <td>200</td>
                        <td>250</td>
                        <td>50</td>
                        <td>200</td>
                        <td>250</td>
                        <td>50</td>
                        <td>200</td>
                        <td>250</td>
                        <td>50</td>
                         <td>200</td>
                        <td>250</td>
                        <td>50</td>
                         <td>200</td>
                        <td>250</td>
                        <td>50</td>
                         <td>200</td>
                        <td>250</td>
                        <td>50</td>
                         <td>200</td>
                        <td>250</td>
                        <td>50</td> <td>200</td>
                        <td>250</td>
                        <td>50</td>
                         <td>200</td>
                        <td>250</td>
                        <td>50</td> 
                        <td> 1,600 </td>
                        <td>80%</td>
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
				url: '{{ route('auditreport.getfmsltauditreports') }}',
				data: { fromdate: fromdate, todate: todate, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
			
				}  
        });
  }
  </script>

@stop

