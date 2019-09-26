
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
	}
	.manjeera table tr td 
	{
	padding:5px;
	}
 	.manjeera
	{
	font-size:12px;
	text-align:center;
	}
	.manjeera h3
	{
	color:#023F78;
	font-weight:bold;
	font-size:23px;
	margin-top:0px;
	margin-bottom:20px;
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
	.manjeera span
	{
	color:#0000FF;
	font-weight:bold;
	}
	.x_panel
	{
	border:none;
	}
	.dlyrep-select.disre
	{
	margin-bottom:30px !important;
	}
	.dlyrep-select.disre label
	{
	color:#ff2518;
	font-weight:bold;
	}
	.page-content-wrapper .page-content
	{
	padding-top:0px !important;
	}
	</style>

<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco212">
    
	<div class="manjeera">
                    <h3 style="text-align:center;">Mock Drill</h3>
                      
<div class="dlyrep-select disre">
					 {!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
					 {!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			         {!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sites, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>  
					  <div id="reportblock" style="display:none">  
                   <div id="validresponse">
				   </div>
                      
                    </div>          
    

          
       <!-- </div>-->
        <!-- /page content -->
 
        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    
                        
                </div>
              </div>
            </div>
