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
        <div class="panel-heading pms-clubhouse-heading">
            AUDIT -> PMS -  CLUB HOUSE USERS MTD
             <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>
        </div>
        <div class="panel-body pms-clubhouse-body">
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
                      <button onclick="getctptAuditreport()" class="btn btn-primary">Go..</button>
                        <button onclick="getpmsdarAuditreportexport()" class="btn btn-primary">Export..</button>
                </div>
                      </div>
                        <div id="validresponse">
                <?php /*?><table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Occupancy</th>
                          <th>Nof Users(Gym)</th>
                          <th>Nof Users(Badminton)</th>
                          <th>Nof Users(S Pool)</th>
                          <th>Nof Users(Tennis)</th>
                          <th>Total CH Revenue MTD</th>
                       </tr>
                    </thead>
                   <?php  $i = 1; ?>
                    <tbody>
                    @if (count($garbageresult) > 0)
                    @foreach ($garbageresult as $kk => $client)
                      <tr>
                         <td><?php echo $i; ?></td>
                        <td>{{ $client['site'] }}</td>
                        <td>{{ $client['report_on'] }}</td>
                        <td>{{ (float)$client['occupancy_asdate_owners'] +  (float)$client['occupancy_asdate_tenants'] }}</td>
                        <td>{{ $client['clbhous_users_gym'] }}</td>
                        <td>{{ $client['clbhous_shuttle'] }}</td>
                        <td>{{ $client['clbhous_users_pool'] }}</td>
                        <td>{{ $client['clbhous_users_tennis'] }}</td>
                        <td>{{ $client['commercial_activate'] }}</td>
                      </tr>
                       <?php $i = $i + 1; ?>
                     @endforeach 
                      @else 
                        <tr>
                            <td colspan="3">No entries in table</td>
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
  
  function getctptAuditreport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   
      $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('auditreport.getchusermtdauditreports') }}',
				data: { fromdate: fromdate, todate: todate, site: site},
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
   window.location = "/getchusermtdauditreportsexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"";    
     }
  </script>

@stop

