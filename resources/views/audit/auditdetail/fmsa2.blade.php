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
        <div class="panel-heading fms-ctpt-heading">
          AUDIT -> FMS -  CTPT 
           <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>    
        </div>
         <div class="panel-body">
            <div class="fma-areport">
            <div class="selection-offme">
            <div class="individual-reportsites">
            <label class="label-individual-site">Sites<span>:</span></label> 
             {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control fmsauditreport', 'id' => 'site']) !!}	
             <?php  $year = date("Y");
			        $month = date("m");
			   ?>
              </div>
               
               
              
           	<?php /*?> <select name='audit_year' id="audit_year" class="form-control" onchange="getctptAuditreport();"> 
                         <option value="">Select Year</option>
						 <?php for($i=2018;$i<=2030;$i++){ ?>
						 <option value="<?php echo $i; ?>" <?php if($year == $i) echo 'Selected';?>><?php echo $i; ?></option>
						 <?php } ?>
					</select> 
              <select name='audit_month' id="audit_month" class="form-control" onchange="getctptAuditreport();">  
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
					</select> <?php */?>
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
                      <button onclick="getfmsctptauditreportexport()" class="btn btn-primary">Export..</button>
                 </div>
                
                </div>
                <div id="validresponse" class="table-responsive">
               	
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
				url: '{{ route('auditreport.getctptauditreports') }}',
				data: { fromdate: fromdate, todate: todate, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
			
				}  
        });
  }

   function getfmsctptauditreportexport(){
   var fromdate = $("#fromdate").val();
   var todate = $("#todate").val();
   var site = $("#site").val();
   window.location = "/getfmsctptauditreportexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"";    
     }
  

  
  </script>
@stop

