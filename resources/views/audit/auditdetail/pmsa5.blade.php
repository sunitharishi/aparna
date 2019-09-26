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
        <div class="panel-heading club-house-attendance-heading">
          AUDIT -> PMS - CLUB HOUSE ATTENDANCE (F.O + H.K + Others) 
           <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>     
        </div>
         <div class="panel-body clubhouse-attendance-body">
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
                <label class="label-individual-from">From<span>:</span></label>
               <input type="text" name="fromdate" id="fromdate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
            </div>
            
             <div class="individual-reportto">
               <label class="label-individual-to">To<span>:</span></label>
               <input type="text" name="todate" id="todate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
            </div>
            <div class="individual-buttons">
                <button onclick="getpmschasuphelpauditreports()" class="btn btn-primary">Go..</button>
                <button onclick="getpmschaauditreportexport()" class="btn btn-primary">Export..</button>
             </div>
                    </div> 
                      <div id="validresponse">
                <?php /*?><table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Standard Deployment 100%</th>
                          <th>Standard Deployment 80%</th>
                          <th>Actual Deployment</th>
                          <th>Short Deployment</th>
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
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td><?php echo (int)$valid_sup[$kk] + (int)$valid_help[$kk];  ?></td>
                        <td><?php $validval = (int)$valid_sup[$kk] + (int)$valid_help[$kk];
                  echo  $fres = (float)($validval * (80/100));
               ?> </td>
                         <td><?php echo (int)$tt->housekp_atten_sup + (int)$tt->housekp_atten_helper; ?>
                         <td><?php $validval = (int)$tt->housekp_atten_sup + (int)$tt->housekp_atten_helper;
                  echo  $fres = (float)($validval * (80/100));
               ?> </td>
                           <td></td>
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
  
  function getpmschasuphelpauditreports(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();


      $.ajax({
        type: "get",
        cache:false,
        url: '{{ route('auditreport.getpmschasuphelpauditreports') }}',
        data: { fromdate: fromdate, todate: todate, site: site},
        success: function( response ) {
         //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
       //  alert(response[0]);
           $("#validresponse").html(response);
      
        }  
        });
  }
  
  function getpmschaauditreportexport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   window.location = "/getpmschaauditreportexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"";    
     }
  </script>


@stop

