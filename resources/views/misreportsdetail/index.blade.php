    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
	<link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
    
    <style>
	.numerror
   {
	border-color: red !important;
	border-width: 1.5px !important;
   } 
	.manjeera table tr th 
	{
	padding:5px;
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	}
 	.manjeera
	{
	font-size:12px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:12px;
	}
	.communityinpu tr td input.board
	{
	 width:40%;
	 float:left;
	}
	.communityinpu tr td input.boardblack
	{
	 width:50%;
	 float:left;
	 margin-left:8px;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.tablcomu tr th
	{
	text-align:center;
	}
	.docs-main h3
	{
	margin-bottom:25px;
	margin-top:10px;
	}
	.x_panel
	{
	border:0px solid white;
	}
	.page-title.fire-sfty
	{
	 height:auto;
	 color:#023F78 !important;
	 font-weight:bold;
	 font-size:23px;
	}
	.sub-hydrant
	{
	 margin-bottom:0px !important;
	}
	.sub-hydrant .sub-ordinate
	{
	 margin-bottom:0px !important;
	}
	.sub-hydrant .dlyrep-select.sub-ordinate label
	{
	 font-weight:bold;
	 color:#ff2518;
	 line-height:16px;
	 width:40px;
	 font-size:14px;
	}
	.suupply
	{
	 padding-left:0px !important;
	 padding-right:0px !important;
	}
	.god-sake
	{
	 padding-left:0px;
	 padding-right:0px;
	}
	.description-issue
	{
	 overflow:hidden;
	 width:70%;
	 margin:0 auto;
	}
	.description-issue .col-sm-4
	{
	 margin-bottom:10px;
	}
	.description-issue .col-sm-8
	{
	
	 margin-bottom:10px;
	}
	.description-issue .col-sm-8 input
	{
	 border: 1px solid #949393;
	}
	.description-issue .col-sm-6
	{
	 margin-bottom: 10px;
    margin-top: 10px;
	}
	.description-issue .col-sm-6 input
	{
	 border: 1px solid #949393;
	}
	.textname
	{
	 margin-top:10px;
	 padding-left: 15px;
    font-weight: bold;
	}
	.docs-main input[type=checkbox]
	{
	 margin-right: 4px;
     margin-left: 2px;
	}
	.housesco212
	{
	 padding-left:0px;
	}
	.save-button input[type="submit"]
	{
	 text-shadow: 0px -1px 0px rgba(0,0,0,.5);
    color: #ffffff;
    padding: 7px 30px;
    background-color: #B22E2E;
    background-image: -moz-linear-gradient(top, #E95D5D, #E40304);
    background-image: -ms-linear-gradient(top, #E95D5D, #E40304);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#E95D5D), to(#E40304));
    background-image: -webkit-linear-gradient(top, #E95D5D, #E40304);
    background-image: -o-linear-gradient(top, #E95D5D, #E40304);
    background-image: linear-gradient(top, #E95D5D, #E40304);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#E95D5D', endColorstr='#E40304', GradientType=0);
    border-color: #C00;
    border-color: rgba(0, 0, 0, 0.15);
	width:100px;
	}
	.save-button input[type="submit"]:hover
	{
	 background-color:#003087;
	}
	.tablesaw.tablesaw-swipe
	{
	 width:70%;
	 margin:0 auto;
	}
	.accippt-report
	{
	 width:70%;
	 margin:0 auto;
	}
	.eeight
	{
	border: 1px solid #8a8787;
    border-radius: 5px;
    overflow: hidden;
    margin: 18px 0px;
    background-color: #f7f6f6;
	}
	.ddescrrriptioon
	{
	 margin-top:10px;
	}
	</style>
@extends('layouts.app')

@section('content')

  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
   
	<div class="dailyreports">
    <h3 class="page-title fire-sfty">MIS Reports   >>   Fire Safety Status</h3>

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
		{!! Form::open(['method' => 'POST', 'route' => ['misreports.storemisfiresafe'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
	<div class="row">
                <div class="col-xs-12 form-group sub-hydrant">
			
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All', 
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					<div class="dlyrep-select sub-ordinate">
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>
					
                     {!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
					 
			
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
                </div>
            </div>
            
            
          <div id="reportblock" style="display:none">  
            <div class="col-md-12 col-sm-12 col-xs-12 suupply">
              <div class="x_panel tile fixed_height_400 god-sake">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
    
	           <div class="docs-main"><div id="validresponse" class="firesafety-editpage">
    
	    
       <!--   <h3>  Fire Safety Equipment Status </h3>    -->
       
      
                      </div> 
    
  
     <?php  $n=0; ?>  
           <div class="accippt-report"><div><input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="color:#1a816f;font-weight:bold;">Save as</span> <span style="color:#c22804;font-weight:bold;"> Draft</span></div>
        <div><input type="checkbox" value="1" class=""  name="report_status"><span style="color:#520990;font-weight:bold;">I accept given data period of overall month </span></div></div>
        <div class="col-sm-12 col-xs-12 submit-button save-button">
         <input type="hidden" id="id" value="<?php echo ++$n; ?>">
            
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
            
           
            
        </div>

		

	
	</div>
    
                        
                </div>
              </div>
            </div>
            </div>
			 {!! Form::close() !!}
	
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>
	 </div>  

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

  $('#additional_info').summernote({

              height:200,

            });

$("#fire_mock_drill_next").datepicker({
 dateFormat: "dd-mm-yy",
});
$("#fire_mock_drill").datepicker({
 dateFormat: "dd-mm-yy",
});  

  $('select[name="sites"]').on('change', function(){    
    //alert($(this).val());   

	 var val = $(this).val();
	var year = $("#year").val();
	var month = $("#month").val();
	 
	  if(val == "") {
	  
	   $("#reportblock").css("display", "none");
	//  var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  
	   
	 } else {
	 
	 $("#reportblock").css("display", "block");
	 var thisvalue = $( this ).text();
	  var selectedText = $(this).find("option:selected").text();
            	// alert(selectedText);
				 $("#communityname").html(selectedText);
				 
				 //AJAX CALL
	
	   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getfiresafemsvalues') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				
				$("#validresponse").html(response);
				 //var obj = jQuery.parseJSON( response);
                 //  alert(response); 
				$("#fire_mock_drill_next").datepicker({
					dateFormat: "dd-mm-yy",
				});
				$("#fire_mock_drill").datepicker({
					dateFormat: "dd-mm-yy",
				}); 
				
				$('#additional_info').summernote({

              height:200,

            });
			   
			         
				}  
        }); 

	   
	//END AJAX CALL
 
	  }
  // window.location.replace('getdailyreport/'+val);
	//alert(id); 
});


/*$( "#jk_pump_nw" ).change(function() {
  alert( "Handler for .change() called." );
   var jkn = $("#jk_pump_nw").val();
   alert(jkn);
   var jv = 0;
 if(jkn != ""){
     jv = parseFloat(jkn);
	 alert(jv);
	 if(jv > 0){
	 	addFormField(); 
	 }
 }
});*/  

$("#jk_pump_nw").change(function(){
   
 }); 


});
  
  
  function subform()

 {

	var flag = true;

	$(".required" ).each(function() {
		//  alert($(this).val());
		  if($(this).val() == ""){

		//if(($( this ).val().length <= 0)){   
               flag = false;
			   // alert($(this).val().length);
				 //alert(flag);
		   $(this).addClass("numerror");
		//}   
		}
		 else{
			    $(this).removeClass("numerror"); 
			 }
	});
	
	
	if ($('.confirmed:checked').length == 0) {

	

	 alert("Please confirm given data period of overall month")

	 flag = false;

	} 


if(flag == true){

  return true; 

}

else{
return false;    
}

 }
 
 
 function addFormField(dis,text) {

	/*	var id = document.getElementById("id").value;
		var val = dis;
		var text = text;  
        
		$("#divTxt").append("<div id='row" + dis + "' class='row" + dis + " eeight'><div class='textname'>"+val+": "+text+"</div><input type='hidden' name='category[]' value='"+val+"'><div class='col-sm-4 ddescrrriptioon'><label>Description of Issue</label></div><div class='col-sm-8 ddescrrriptioon'><input type='text' class='form-control' placeholder=' ' name='issue_des[]'/></div><div class='col-sm-4'><label>Root Cause</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='root_cause[]'/></div><div class='col-sm-4'><label>Action Required/Planned</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='act_req_plan[]'/></div><div class='col-sm-4'><label>Pending From Days</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='pendingfromdays[]'/></div><div class='col-sm-4'><label>Responsibility</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='reponsibility[]'/></div><div class='col-sm-4'><label>Notified to the Concern</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]'/></div></div>"); */
		var id = document.getElementById("id").value;
		var val = dis;
		var text = text;
		 var len = $(".foressssissue").length;
		 
		 var addtext = "<div id='row" + dis + "' class='row" + dis + " foressssissue'><div class='col-sm-12 col-xs-12 alwayyya'>"+val+": "+text+"</div><div class='col-sm-4 col-xs-4 adddformfiles'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8 adddformfiles'><input type='hidden' name='category[]' value='"+val+"'><input type='text' class='form-control' placeholder='' name='issue_des[]'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='root_cause[]'/></div><div class='col-sm-4 col-xs-4'><label>Action Required/Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='act_req_plan[]'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='reponsibility[]'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concern</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]'/></div><div class='col-sm-4 col-xs-4'><label>Estimation Time</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]'/></div></div>";
		
		if(len > 0){
			var cn = 0; 
			$( ".foressssissue" ).each(function( index ) {
				cn++;
				console.log( index + ": " + $( this ).text() );
				var xx = $( this ).attr("id");
				//alert(xx); 
				var res = xx.replace("row", "");
				var rowid = parseInt(res);
				if(dis < rowid){
					$(this).before(addtext);
					return false; 
				}
				else if(cn == len){
				 $(this).after(addtext);
				 
				}
			
			});
		   
		} 
		
		else{
		   $("#divTxt").append(addtext);
		}
  
  
	}
	  
	 function addFormFieldnew(dis,text) {

		var id = document.getElementById("id").value;
		var val = dis;
		var text = text;
        
		$("#divTxt").append("<div id='row" + dis + "' class='row" + dis + " eeight'><input type='hidden' name='category[]' value='"+val+"'><div class='col-sm-4 col-xs-4 ddescrrriptioon'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8 ddescrrriptioon'><input type='text' class='form-control' placeholder=' ' name='issue_des[]'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='root_cause[]'/></div><div class='col-sm-4 col-xs-4'><label>Action Required/Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='act_req_plan[]'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='pendingfromdays[]'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='reponsibility[]'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concern</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]'/></div><div class='col-sm-4 col-xs-4'><label>Estimation Time</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]'/></div></div>");
  
	}
	
	
	
function reportinfo(val,id,text) {
   if(parseInt(val) > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
   else{
    $("#row"+id).remove();
   }
};

function reportinfonew(val,id,text) {

if(id== 1 || id == 2 || id == 3 || id == 4 || id == 5){


 if(id== 1){
 var setvaone = 0;
   var manu = 0;
   var off = 0;
   var nw = 0;
   var auto = 0;
   
    if(parseFloat($("#jk_pump_nw").val()) > 0){ nw = parseFloat($("#jk_pump_nw").val());}
	  if($("#jk_pump_nw").val() == ""){
     nw = 0;
   }   
    if(parseFloat($("#jk_pump_manual").val()) > 0){ manu = parseFloat($("#jk_pump_manual").val());}
	  if($("#jk_pump_manual").val() == ""){
     manu = 0;
   }   
   
    if(parseFloat($("#jk_pump_off").val()) > 0){ off = parseFloat($("#jk_pump_off").val());}
	  if($("#jk_pump_off").val() == ""){
     off = 0;
   }   
    if(parseFloat($("#jk_pump_auto").val()) > 0){ auto = parseFloat($("#jk_pump_auto").val());}
	  if($("#jk_pump_auto").val() == ""){
     auto = 0;
   }   
   
   setvaone = parseFloat(nw + manu + off);
   if(setvaone > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
    else{
    $("#row"+id).remove();
   }
   }
    if(id== 2){
	var setvatw = 0;
   var manu = 0;
   var off = 0;
   var nw = 0;
   var auto = 0;
   
    if(parseFloat($("#main_pump_nw").val()) > 0){ nw = parseFloat($("#main_pump_nw").val());}
	  if($("#main_pump_nw").val() == ""){
     nw = 0;
   }   
    if(parseFloat($("#main_pump_manual").val()) > 0){ manu = parseFloat($("#main_pump_manual").val());}
	  if($("#main_pump_manual").val() == ""){
     manu = 0;
   }   
   
    if(parseFloat($("#main_pump_off").val()) > 0){ off = parseFloat($("#main_pump_off").val());}
	  if($("#main_pump_off").val() == ""){
     off = 0;
   }   
    if(parseFloat($("#main_pump_auto").val()) > 0){ auto = parseFloat($("#main_pump_auto").val());}
	  if($("#main_pump_auto").val() == ""){
     auto = 0;
   }   
   
   setvatw = parseFloat(nw + manu + off);
   if(setvatw > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
    else{
    $("#row"+id).remove();
   }
   
   }
    if(id== 3){
	var setvath = 0;

	
   var manu = 0;
   var off = 0;
   var nw = 0;
   var auto = 0;
   
    if(parseFloat($("#dg_pump_nw").val()) > 0){ nw = parseFloat($("#dg_pump_nw").val());}
	  if($("#dg_pump_nw").val() == ""){
     nw = 0;
   }   
    if(parseFloat($("#dg_pump_manual").val()) > 0){ manu = parseFloat($("#dg_pump_manual").val());}
	  if($("#dg_pump_manual").val() == ""){
     manu = 0;
   }   
   
    if(parseFloat($("#dg_pump_off").val()) > 0){ off = parseFloat($("#dg_pump_off").val());}
	  if($("#dg_pump_off").val() == ""){
     off = 0;
   }   
    if(parseFloat($("#dg_pump_auto").val()) > 0){ auto = parseFloat($("#dg_pump_auto").val());}
	  if($("#dg_pump_auto").val() == ""){
     auto = 0;
   }   
   
   setvath = parseFloat(nw + manu + off);
   if(setvath > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
    else{
    $("#row"+id).remove();
   }
   
   
   }
     if(id== 4){
	var setvafr = 0;

	
   var manu = 0;
   var off = 0;
   var nw = 0;
   var auto = 0;
   
    if(parseFloat($("#boostr_pump_nw").val()) > 0){ nw = parseFloat($("#boostr_pump_nw").val());}
	  if($("#boostr_pump_nw").val() == ""){
     nw = 0;
   }   
    if(parseFloat($("#boostr_pump_manual").val()) > 0){ manu = parseFloat($("#boostr_pump_manual").val());}
	  if($("#boostr_pump_manual").val() == ""){
     manu = 0;
   }   
   
    if(parseFloat($("#boostr_pump_off").val()) > 0){ off = parseFloat($("#boostr_pump_off").val());}
	  if($("#boostr_pump_off").val() == ""){
     off = 0;
   }   
    if(parseFloat($("#boostr_pump_auto").val()) > 0){ auto = parseFloat($("#boostr_pump_auto").val());}
	  if($("#boostr_pump_auto").val() == ""){
     auto = 0;
   }   
   
   setvafr = parseFloat(nw + manu + off);
   if(setvafr > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
    else{
    $("#row"+id).remove();
   }
   
   
   }
   
   
  if(id== 5){
	var setvafv = 0;

	
   var manu = 0;
   var off = 0;
   var nw = 0;
   var auto = 0;
   
    if(parseFloat($("#dewatr_pump_nw").val()) > 0){ nw = parseFloat($("#dewatr_pump_nw").val());}
	  if($("#dewatr_pump_nw").val() == ""){
     nw = 0;
   }   
    if(parseFloat($("#dewatr_pump_manual").val()) > 0){ manu = parseFloat($("#dewatr_pump_manual").val());}
	  if($("#dewatr_pump_manual").val() == ""){
     manu = 0;
   }   
   
    if(parseFloat($("#dewatr_pump_off").val()) > 0){ off = parseFloat($("#dewatr_pump_off").val());}
	  if($("#dewatr_pump_off").val() == ""){
     off = 0;
   }   
    if(parseFloat($("#dewatr_pump_auto").val()) > 0){ auto = parseFloat($("#dewatr_pump_auto").val());}
	  if($("#dewatr_pump_auto").val() == ""){
     auto = 0;
   }   
   
   setvafv = parseFloat(nw + manu + off);
   if(setvafv > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
    else{
    $("#row"+id).remove();
   }
   
   
   }
   
}else
{
   if(parseInt(val) > 0){
     var $myDiv = $('#row'+id);

    if ( $myDiv.length){
    }else{
       addFormField(id,text);
   }
   }
   else{
    $("#row"+id).remove();
   }
   }
};


function boxinfo(val,id,text) {
 $(".row"+id).remove();
	if(parseInt(val) > 0){
		var $myDiv = $('#row'+id);
	   $(".row"+id).remove();
		var i;
		for (i = 0; i < val; i++) {
		if(i==0){
		addFormField(id,text);
		}else{
		addFormFieldnew(id,text);
		}
		 
	}
	}   
	else{
	$(".row"+id).remove();
	}
};



  </script>
   @include('partials.footer')
@stop