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
            Individual Reports
        </div>  
        <div class="panel-body audit-sample">
		<div class="col-sm-4 fms-requestreports">
           
           <div><b>FMS</b></div>
           <div class="fms-auditreports">
            <ul>
                <li><a href="/auditfms/a1">DAR Submission</a></li>
                <li><a href="/auditfms/a2"> CTPT</a></li><?php /*?>
                <li><a href="/auditfms/a3"> LT</a></li><?php */?>
                <li><a href="/auditfms/a4"> KVA</a></li>
                <li><a href="/auditfms/a5"> Power Factor</a></li>
                <li><a href="/auditfms/a12"> DG Set not working</a></li><?php /*?>
                <li><a href="/auditfms/a23"> DG Set Battery Status</a></li>
                <li><a href="/auditfms/a22"> Metro Water</a></li><?php */?>
                <li><a href="/auditfms/a24">Tankers Water</a></li>
                <li><a href="/auditfms/a26">Power Consumption</a></li>
                <li><a href="/auditfms/a15"> PPM/TW</a></li>
                <li><a href="/auditfms/a16"> PPM/RW</a></li>
                <li><a href="/auditfms/a7"> Sludge(kgs)</a></li>
                <li><a href="/auditfms/a8"> MLSS</a></li>
                <li><a href="/auditfms/a9"> LIFTS</a></li>
                <li><a href="/auditfms/a18"> Swimming Pool PH</a></li>
                <li><a href="/auditfms/a19">Irrigation sprinkler automation</a></li>
                <li><a href="/auditfms/a17">Residual Chroline </a></li>
                <li><a href="/auditfms/a20">Solar fencing</a></li>
                <li><a href="/auditfms/a10"> Borewell not working</a></li>
                <!--<li><a href="/auditfms/a10">STP,WSP </a></li>-->
                <li><a href="/auditfms/a11">Points Discussed in Daily Meeting</a></li><?php /*?>
                <li><a href="/auditfms/a25">MIS</a></li><?php */?>
                
              
               <!-- <li><a href="/auditfms/a13">Diesel Stock</a></li>-->
                 <!--  <li><a href="/auditfms/a14">Metro KL, CMD Data </a></li>-->
              <!--  <li><a href="/auditfms/a6"> PPM/RW</a></li>
                <li><a href="/auditfms/a16">Average Inlet Water Vs Avg Treated Water</a></li>
                <li><a href="/auditfms/a21">Gas</a></li>-->
            </ul>
           </div>
        </div>
		
		
		<div class="col-sm-4 pms-requestreports">
          <div><b>PMS</b></div>
          <div class="pms-auditreports">
          <ul>
            <li><a href="/auditpms/a1"> DAR Submission</a></li>
            <!--<li><a href="/auditpms/a11">Delay in sending DAR</a></li>-->
             <li><a href="/auditpms/a2"> Land Scaping Attendance (Supervisor + Helpers)</a></li>
             <li><a href="/auditpms/a3"> Watering</a></li>
             <li><a href="/auditpms/a12">Cleaning</a></li>
             <li><a href="/auditpms/a13">Spraying/weeding/moving locations</a></li>
             <li><a href="/auditpms/a14">mulching/trimming/cutting/pruning/shaping/hoeing-location</a></li>
             <li><a href="/auditpms/a4"> House Keeping Attendance (Supervisor + Helpers)</a></li>
             <li><a href="/auditpms/a15"> Garbage</a></li>
             <li><a href="/auditpms/a18"> Ride On</a></li>
             <?php /*?><li><a href="/auditpms/a19"> CH No of Users</a></li><?php */?>
             <li><a href="/auditpms/a20"> CH No of Users MTD</a></li>
             <li><a href="/auditpms/a5"> Club House Attendance (F.O + H.K + Others)</a></li>
             <li><a href="/auditpms/a16">Revenue - Cumulative Value </a></li>
             <li><a href="/auditpms/a17">APNA Complex complaints </a></li>
              <li><a href="/auditpms/a8"> Occupancy As on Date</a></li>
             <li><a href="/auditpms/a6"> Imprest Amount</a></li>
              <li><a href="/auditpms/a9"> Attendance Verified - Yes /No</a></li>
             <!--<li><a href="/auditpms/a7"> Signature</a></li>-->
			<li><a href="/auditpms/a10"> Gas</a></li>
			<li><a href="/auditpms/a21"> CMD & RMD</a></li> 
			<li><a href="/auditpms/a22"> Power Report</a></li> 
			<li><a href="/auditpms/a24"> APNA Escalatin OPEN L2 n L3</a></li>
			<li><a href="/auditpms/a26"> House Keeping Attendence</a></li>
          </ul>
          </div>      
        </div>
		
        
        
	<div class="col-sm-4 security-requestreports">
       <div><b>Security</b></div>
       <div class="security-auditreports">
      <ul>
  		  <li><a href="/auditsecurity/a1">DAR Submission</a></li>
        <li><a href="/auditsecurity/a17">Physical Attendance of Guard/Lady Guard/ Head Guard /ASO/SO</a></li>
        <li><a href="/auditsecurity/a16">Less Than 20 years</a></li>
        <li><a href="/auditsecurity/a15">Less Than 50 kgs</a></li>
        <li><a href="/auditsecurity/a14">Less than 5' 2''</a></li>
        <li><a href="/auditsecurity/a13">Knows Fire Fighting</a></li>
        <li><a href="/auditsecurity/a12">Without  Uniform</a></li>
        <li><a href="/auditsecurity/a11">Without  Shoes</a></li>
    		<li><a href="/auditsecurity/a2"> Allowed Without ID Cards (maids/drivers/vendors/interiors/others)</a></li>
    		<li><a href="/auditsecurity/a3"> Not working total no's </a></li>
    		<li><a href="/auditsecurity/a4"> Available (No's)</a></li>
    		<li><a href="/auditsecurity/a5"> Solar Fencing Working Status</a></li>
    		<li><a href="/auditsecurity/a6"> Date Sheets Pending</a></li>
    		<li><a href="/auditsecurity/a8"> Night Bio Checked yes/No</a></li>
    		<li><a href="/auditsecurity/a9"> Violations/Occurences etc</a></li>
        <li><a href="/auditsecurity/a19"> Daily Beriefing Meeting</a></li>
      </ul>
      </div>
    </div>  
  </div> 
  
  
</div> 
 @include('partials.footer')

@stop

