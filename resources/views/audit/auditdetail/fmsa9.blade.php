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
        <div class="panel-heading fms-lifts-heading">
          AUDIT -> FMS -  LIFTS
           <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>  
        </div>
         <div class="panel-body fms-lifts-body">
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
                      <button onclick="getfmsliftauditreports()" class="btn btn-primary">Go..</button>
                       <button onclick="getfmsliftauditreportexport()" class="btn btn-primary">Export..</button>
                 </div>
                
               </div>
              <div id="validresponse">
                
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
  
  function getfmsliftauditreports(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();


      $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('auditreport.getfmsliftauditreports') }}',
				data: { fromdate: fromdate, todate: todate, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
			
				}  
        });
  }
  
  function getfmsliftauditreportexport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   window.location = "/getfmsliftauditreportexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"";    
     }
  
  </script> 

@stop

