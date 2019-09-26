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
    
    <style>
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
	.upload-attendance-form
	{
	width:35%;
	padding:28px;
	border:1px solid #c1c4c7;
	border-radius:5px;
	margin:0 auto;
	background-color:#f5f5f5;
	}
	.dlyrep-select label
	{
	color:#ff2518;
	font-weight:bold;
	}
	.laggedtime label
	{
	 float:left;
	 font-weight:bold;
	 line-height:30px;
	 width:107px;
	}
	.laggedtime
	{
	color:#ff2518;
	font-weight:bold;
	margin-left:0px !important;
	width:100%;
	}
	.dlyrep-select.desi
   {
   width:100% !important;
    margin-bottom:15px !important;
   }
   .dlyrep-select.desi label
   {
   width:25% !important;
   }
   .form-inline .form-control
   {
   width:60% !important;
   }
   .form-group.tran input
   {
   background-color:transparent;
   color:black;
   width:79%;
   float:right;
   }
   .form-group.tran
   {
   float:left;
   margin-left:7%;
   }
   .form-group.tran input:hover:active
   {
   background-color:transparent;
   color:black;
   }
   .desibtn button
   {
   width:auto;
   margin-left:14%;
   background-color:#0b52e9;
   color:white;
   margin-top:6px;
   }
   .desibtn button:active
    {
   background-color:#B22E2E;
   color:white;
   }
   .desibtn button:focus
   {
   background-color:#B22E2E;
   color:white;
   }
   .desibtn button:hover
   {
   background-color:#B22E2E;
   color:white;
   }
   .help-block strong
   {
   color:#ff2518;
   font-weight:bold;
   }
   .help-block a
   {
   color:#1a816f;
   font-weight:bold;
   }
    
   .help-block b 
   {
   color:black !important;
   font-size:12px;
   }
   .desibtn
   {
   width:65%;
   display:inline-block;
   text-align:center;
   }
   .page-title.req
   {
   height:40px;
   color:#023F78;
   font-weight:bold;
   font-size:23px;
   margin-bottom:0px;
   }
	</style>
@extends('layouts.app')

@section('content')
     <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
	<div class="dailyreports material-indentedstatus">
    <h3 class="page-title req" style="text-align:center;">MIS Reports   >>   Material Indented Status</h3>

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
	{!! Form::open(['files' => 'true','route' => 'uploadexcel.saveuploadfile','role' => 'form', 'class'=>'form-inline upload-attendance-form', 'onsubmit' =>"return subform()"]) !!}
	
	<div class="row">
                <div class="col-xs-12 form-group">
				
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					<div class="dlyrep-select desi">
					{!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
					{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			         {!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>  
					  
					
					<div class="laggedtime"><label>Lagged Time:</label> <input type="text" id="laggeddate" name="laggeddate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control"></div>
					
                </div>
            </div>
            
			
			 <div class="form-group tran">

							<label class="sr-only" for="file">Upload File</label>

							<input type="file" name="file" id="file" class="btn btn-info" title="Select File">

						  </div>
                         <div class="desibtn">
						  <button type="submit" class="btn btn-default">Upload file</button>
                         </div>

						  <div class="help-block"><strong>Note!</strong> <b>Only xls or xlsx file is allowed!!</b> <a href="{!! URL::to('/uploads/mis_indent_sample.xlsx') !!}">Click here for Sample File.</a></div>

						{!! Form::close() !!}

            
          
	
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>
	 </div>  

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

$('#laggeddate').datepicker({ dateFormat: "dd-mm-yy" });

 
  $( "#select_id" ).change(function() 
  {
   var val = $(this).val();
  
   var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/"+val;
  // window.location.replace('getdailyreport/'+val);
	

  });
  
  $('select[name="sites"]').on('change', function(){    
    //alert($(this).val());   
	
	 var val = $(this).val();
	 
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
 //  alert(val);
   //var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://report.local/getdailyreportdetail";
    //  window.location.href = "http://aparna.greaterkakinada.com/getmisreportupdatedetailview/"+val; 
	  }
  // window.location.replace('getdailyreport/'+val);
	//alert(id); 
});

});


  function subform()

 {
 
 
  var site = $("#select_id11").val();
  var flag = true;
  
  if(site == ""){
    alert('Please Select Site!');
		   flag = false;
  }

	
	
	
	/*var ext = $('#file').val().split('.').pop().toLowerCase();
	alert(ext);
		if($.inArray(ext, ['xls',' xlsx']) == -1) {
		  alert('invalid extension!');
		   flag = false;
		}*/
		
		 var allowedFiles = [".xls", ".xlsx"];
        var fileUpload = $("#file");
        
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.val().toLowerCase())) {
             alert('invalid extension!');
		   flag = false;
        }
         
	


if(flag == true){

  return true; 

}

else{
return false;    
}

 }
 
  
  </script>
  @include('partials.footer')

@stop