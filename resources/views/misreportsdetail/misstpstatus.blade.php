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
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ; 
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
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
	.tablesaw
	{
	width:45%;
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
	table
	{
	margin-bottom:10px;
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
.fireseafmis input[type="checkbox"]
{
 margin-right:4px;
}
.fireseafmis
{
 width:70%;
 margin:0 auto;
 padding-top:6px;
}
.fireseafmis2
{
width:70%;
margin:0 auto;
}
.fireseafmis2 input[type="checkbox"]
{
 margin-right:4px;
}
.page-title.stp-equipment1
{
 height:auto;
 margin-bottom:10px;
 color:#023F78;
 font-size:23px;
}
.dlyrep-select.fire2mis.delay
{
 margin-bottom:0px;
}
.dlyrep-select.fire2mis.delay label
{
 width:40px;
 float:left;
 color:#ff2518;
 font-weight:bold;
 line-height:16px;
}
.dlyrep-select.fire2mis.delay select
{
 width:200px;
 float:left;
}
.form-group.fire-security
{
 margin-bottom:0px;
}
.upset
{
 padding:0px !important;
}
.upset1
{
 padding:0px;
}
.x_content.save-to-dare
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
	.screen-chamber 
	{
	 width:70%;
	 margin:0 auto;
	 overflow:hidden;
	}
    .screeen-label
	{
	 margin-top:10px;
	 font-weight:bold;
	 padding-left:10px;
	}
	.nootifyconcerrrn
	{
	border: 1px solid #8a8787;
    border-radius: 5px;
    overflow: hidden;
    margin: 18px 0px;
    background-color: #f7f6f6;
	}
	.nootifyconcerrrn .col-sm-4
	{
	 margin-bottom:10px;
	}
	.nootifyconcerrrn .col-sm-8
	{
	 margin-bottom:10px;
	}
	.xctuibreqyured
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
    <h3 class="page-title stp-equipment1"><b>MIS Reports   >>   STP Equipment Status</b></h3>

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
	{!! Form::open(['method' => 'POST', 'route' => ['misreports.storemisstp'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
	<div class="row">
                <div class="col-xs-12 form-group fire-security">
				
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					<div class="dlyrep-select fire2mis delay">
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>
					{!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
					  
			
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
					
                </div>
            </div>
            
            
          <div id="reportblock" style="display:none">  
            <div class="col-md-12 col-sm-12 col-xs-12 upset">
              <div class="x_panel tile fixed_height_400 upset1">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content save-to-dare">
    
    
	<div class="docs-main stpequipment">
	<div id="validresponse">
    
	    
       <!--   <h3>  Fire Safety Equipment Status </h3>    -->
       
      
                      </div>  
					    <?php  $n=0; ?>  
            <div class="fireseafmis"><input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="font-weight:bold;color:#1a816f;">Save as</span> <span style="font-weight:bold;color:#c22804;">Draft</span></div>
         <div class="fireseafmis2"><input type="checkbox" value="1" class=""  name="report_status" ><span style="font-weight:bold;color:#520990;">I accept given data period of overall month</span></div>
        <div class="col-sm-12 col-xs-12 submit-button save-button">
         <input type="hidden" id="id" value="<?php echo ++$n; ?>">
            
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
	    
       <!--   <h3>  Fire Safety Equipment Status </h3>    -->
   
		
		

	
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
				url: '{{ route('validation.getstpmsvalues') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				
				$("#validresponse").html(response);
				$('#additional_info').summernote({

              height:200,

            });
			   
				 //var obj = jQuery.parseJSON( response); 
                 //  alert(response); 
			   
			         
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
		  if($(this).val() == ""){
               flag = false;
		   $(this).addClass("numerror");
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

		/*var id = document.getElementById("id").value;
		var val = dis;
		var text = text;
        
		$("#divTxt").append("<div id='row" + dis + "' class='row" + dis + " nootifyconcerrrn'><div class='screeen-label'>"+val+": "+text+"</div><div class='col-sm-4 xctuibreqyured'><label>Description of Issue</label></div><div class='col-sm-8 xctuibreqyured'><input type='hidden' name='category[]' value='"+val+"'><input type='text' class='form-control' placeholder=' ' name='issue_des[]'/></div><div class='col-sm-4'><label>Root Cause</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='root_cause[]'/></div><div class='col-sm-4'><label>Action Required / Planned</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='act_req_plan[]'/></div><div class='col-sm-4'><label>Pending From Days</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]'/></div><div class='col-sm-4'><label>Responsibility</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder='' name='reponsibility[]'/></div><div class='col-sm-4'><label>Notified to the Concerned</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]'/></div></div>"); */
		
		var id = document.getElementById("id").value;
		var val = dis;
		var text = text;
		 var len = $(".foressssissue").length;
		 
		 var addtext = "<div id='row" + dis + "' class='row" + dis + " foressssissue'><div class='col-sm-12 col-xs-12 alwayyya'>"+val+": "+text+"</div><div class='col-sm-4 col-xs-4 adddformfiles'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8 adddformfiles'><input type='hidden' name='category[]' value='"+val+"'><input type='text' class='form-control' placeholder='' name='issue_des[]'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='root_cause[]'/></div><div class='col-sm-4 col-xs-4'><label>Action Required/Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='act_req_plan[]'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='reponsibility[]'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concern</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]'/></div><div class='col-sm-4 col-xs-4'><label>Estimation Date</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]'/></div></div>";
		
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
        
		$("#divTxt").append("<div id='row" + dis + "' class='row" + dis + " nootifyconcerrrn'><div class='col-sm-4 xctuibreqyured'><label>Description of Issue</label></div><div class='col-sm-8 xctuibreqyured'><input type='hidden' name='category[]' value='"+val+"'><input type='text' class='form-control' placeholder='' name='issue_des[]'/></div><div class='col-sm-4'><label>Root Cause</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder='' name='root_cause[]'/></div><div class='col-sm-4'><label>Action Required / Planned</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder='' name='act_req_plan[]'/></div><div class='col-sm-4'><label>Pending From Days</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]'/></div><div class='col-sm-4'><label>Responsibility</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='reponsibility[]'/></div><div class='col-sm-4'><label>Notified to the Concerned</label></div><div class='col-sm-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]'/></div><div class='col-sm-4 col-xs-4'><label>Estimation Date</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]'/></div></div>");
  
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
