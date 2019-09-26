
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

	
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
   
@extends('layouts.app')

@section('content')

 
 <div class="misback-button"> <a href="/mmr/main?y=<?php echo $year; ?>&m=<?php echo $month; ?>&site=<?php echo $site; ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel mmr-wsp-inlet">
        <div class="x_content">
             <h3><b>Metro Test Reports (STP - Inlet) </b>
             </h3>
        </div>
         {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['mmr.storestptestreport'], 'class' => 'for-labelling']) !!}
        {!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
        {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}
        {!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
        <?php if(isset($pbasys['id']) && $pbasys['id']>0) { ?>
		{{ Form::hidden('record', $pbasys['id']) }}
        <?php } else {  ?>
        {{ Form::hidden('record', '') }}
        <?php } ?>
        <div class="content-wrapper">
        	<div class="mmr-wsp-inlet-table">
        		<div class="table-responsive">
        			<table>
        				<caption>TEST REPORT</caption>
        				<thead>
        					<tr>
        						<th colspan="2">Customer Name & Address</th>
        						<th>Test Report No. <input style="color:#000000;" type="text" class="form-control"  value="<?php if(isset($pbasys['test_report_no']) && $pbasys['test_report_no']!="") echo $pbasys['test_report_no']; ?>" name="test_report_no"/></th>
        						<th>VCR- <input style="color:#000000;" type="text" class="form-control"  value="<?php if(isset($pbasys['vcr']) && $pbasys['vcr']!="") echo $pbasys['vcr']; ?>" name="vcr"/></th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td rowspan="4" colspan="2"><b>M/s. Aparna Property Management Services, <br> Hyderabad.</b></td>
        						<td><b>Report Issue Date</b></td>
        						<td><input type="text" class="form-control" value="<?php if(isset($pbasys['report_idate']) && $pbasys['report_idate']!="") echo date("d-m-Y",strtotime($pbasys['report_idate'])); ?>" id="report_idate" name="report_idate"/></td>
        					</tr>
        					<tr>
        						<td><b>Registration No.</b></td>
        						<td><input type="text" class="form-control"  value="<?php if(isset($pbasys['regis_no']) && $pbasys['regis_no']!="") echo $pbasys['regis_no']; ?>" name="regis_no"/></td>
        					</tr>
        					<tr>
        						<td><b>Registration Date</b></td>
        						<td><input type="text" class="form-control"  value="<?php if(isset($pbasys['regis_date']) && $pbasys['regis_date']!="") echo $pbasys['regis_date'];?>"  id="regis_date" name="regis_date"/></td>
        					</tr>
        					<tr>
        						<td><b>Customer Reference</b></td>
        						<td><input type="text" class="form-control" name="cus_ref"  value="<?php if(isset($pbasys['cus_ref']) && $pbasys['cus_ref']!="") echo $pbasys['cus_ref']; ?>"/></td>
        					</tr>
        					<tr>
        						<td rowspan="2"><b>Sample Description</b></td>
        						<td rowspan="2"><b>STP - Inlet</b></td>
        						<td><b>Reference Date</b></td>
        						<td><input type="text" class="form-control" id="ref_date" name="ref_date"  value="<?php if(isset($pbasys['ref_date']) && $pbasys['ref_date']!="") echo $pbasys['ref_date'];?>"/></td>
        					</tr>
        					<tr>
        						<td><b>Analysis Starting Date</b></td>
        						<td><input type="text" class="form-control" id="analy_startdate" name="analy_startdate"  value="<?php if(isset($pbasys['analy_startdate']) && $pbasys['analy_startdate']!="") echo date("d-m-Y",strtotime($pbasys['analy_startdate'])); ?>"/></td>
        					</tr>
        					<tr>
        						<td rowspan="3"><b>Sample Site</b></td>
        						<td rowspan="3"></td>
        						<td><b>Analysis Completion Date</b></td>
        						<td><input type="text" class="form-control" id="analy_compdate" name="analy_compdate"  value="<?php if(isset($pbasys['analy_compdate']) && $pbasys['analy_compdate']!="") echo date("d-m-Y",strtotime($pbasys['analy_compdate'])); ?>"/></td>
        					</tr>
        					<tr>
        						<td><b>Storage Condition</b></td>
        						<td><input type="text" class="form-control" name="stor_cond"  value="<?php if(isset($pbasys['stor_cond']) && $pbasys['stor_cond']!="") echo $pbasys['stor_cond']; ?>"/></td>
                            </tr>
                            <tr>
        						<td><b>Condition Upon Receipt</b></td>
        						<td><input type="text" class="form-control" name="cond_rec"  value="<?php if(isset($pbasys['cond_rec']) && $pbasys['cond_rec']!="") echo $pbasys['cond_rec']; ?>"/></td>
                            </tr>
                            <tr>
                            	<td colspan="2"><b>Quantity Received</b></td>
                            	<td colspan="2"><input type="text" class="form-control" name="qua_rec"  value="<?php if(isset($pbasys['qua_rec']) && $pbasys['qua_rec']!="") echo $pbasys['qua_rec']; ?>"/></td>
                            </tr>
                             <tr>
                            	<td colspan="2"><b>Sample Collected or Submitted</b></td>
                            	<td colspan="2"><input type="text" class="form-control" name="sam_coll"  value="<?php if(isset($pbasys['sam_coll']) && $pbasys['sam_coll']!="") echo $pbasys['sam_coll']; ?>"/></td>
                            </tr>
        				</tbody>
        			</table>
        		</div>

               <div class="table-responsive">
                   <table class="test-report">
                        <caption>TEST REPORT</caption></caption>
                	<thead>
                    	<tr>
                        	<th>S.No</th>
                            <th>Test Parameters</th>
                            <th>Units</th>
                            <th>Results</th>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <tr>
                        	<td colspan="4">Physical & chemical Parameters</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>PH</td>
                           <td>-</td>
                          
                           <td><input type="text" class="form-control" name="ph"  value="<?php if(isset($pbasys['ph']) && $pbasys['ph']!="") echo $pbasys['ph']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Total Dissolved Solids</td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="totdiss_solids"  value="<?php if(isset($pbasys['totdiss_solids']) && $pbasys['totdiss_solids']!="") echo $pbasys['totdiss_solids']; ?>"/></td>
                        </tr>
                         <tr>
                           <td>3</td>
                           <td>Total Suspended Solids</td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="totsus_solids"  value="<?php if(isset($pbasys['totsus_solids']) && $pbasys['totsus_solids']!="") echo $pbasys['totsus_solids']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Chemical Oxygen Demand</td>
                            <td>mg / l</td>
                           <td><input type="text" class="form-control" name="cheoxy_demand"  value="<?php if(isset($pbasys['cheoxy_demand']) && $pbasys['cheoxy_demand']!="") echo $pbasys['cheoxy_demand']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>Biological Oxygen Demand (3 Days @ 27<sup>&deg;</sup>C)</td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="biooxy_demand"  value="<?php if(isset($pbasys['biooxy_demand']) && $pbasys['biooxy_demand']!="") echo $pbasys['biooxy_demand']; ?>"/></td>
                        </tr>
                         <tr>
                           <td>6</td>
                           <td>Chlorides as Cl</td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="chloridescl"  value="<?php if(isset($pbasys['chloridescl']) && $pbasys['chloridescl']!="") echo $pbasys['chloridescl']; ?>"/></td>
                        </tr>
                          <tr>
                           <td>7</td>
                           <td>Sulphates as So<sub>4</sub></td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="sulphatesso"  value="<?php if(isset($pbasys['sulphatesso']) && $pbasys['sulphatesso']!="") echo $pbasys['sulphatesso']; ?>"/></td>
                        </tr>
                         <tr>
                           <td>8</td>
                           <td>oil & grease</td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="oil_grease"  value="<?php if(isset($pbasys['oil_grease']) && $pbasys['oil_grease']!="") echo $pbasys['oil_grease']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>9</td>
                           <td>Total Hardness as Caco<sub>3</sub></td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="hardnesscaco"  value="<?php if(isset($pbasys['hardnesscaco']) && $pbasys['hardnesscaco']!="") echo $pbasys['hardnesscaco']; ?>"/></td>
                        </tr>
                         <tr>
                           <td>10</td>
                           <td>Calcium as Ca</td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="calciumca"  value="<?php if(isset($pbasys['calciumca']) && $pbasys['calciumca']!="") echo $pbasys['sam_coll']; ?>"/></td>
                        </tr>
                          <tr>
                           <td>11</td>
                           <td>Total Alaklinity as Caco<sub>3</sub></td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="alaklinitycaco"  value="<?php if(isset($pbasys['alaklinitycaco']) && $pbasys['alaklinitycaco']!="") echo $pbasys['alaklinitycaco']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>12</td>
                           <td>Nitrates as No<sub>3</sub></td>
                           <td>mg / l</td>
                           <td><input type="text" class="form-control" name="nitratesno"  value="<?php if(isset($pbasys['nitratesno']) && $pbasys['nitratesno']!="") echo $pbasys['nitratesno']; ?>"/></td>
                        </tr>
                         <tr>
                           <td>13</td>
                           <td>Color</td>
                           <td>-</td>
                           <td><input type="text" class="form-control" name="color"  value="<?php if(isset($pbasys['color']) && $pbasys['color']!="") echo $pbasys['color']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>14</td>
                           <td>Odour</td>
                           <td>-</td>
                           <td><input type="text" class="form-control" name="odour"  value="<?php if(isset($pbasys['odour']) && $pbasys['odour']!="") echo $pbasys['odour']; ?>"/></td>
                        </tr>
                        <tr>
                           <td>15</td>
                           <td>Turbidity</td>
                           <td>NTU</td>
                           <td><input type="text" class="form-control" name="turbidity"  value="<?php if(isset($pbasys['turbidity']) && $pbasys['turbidity']!="") echo $pbasys['turbidity']; ?>"/></td>
                        </tr>
                    </tbody>
                </table>
                </div>
       			<div class="table-responsive" style="width:660px; margin:15px auto;">
                	<div style="float:left;"><b>Upload Image</b></div>
                    <div style="float:left; margin-left:20px;"><input type="file" name="stpinlet_pic" /></div>
                    <?php if(isset($pbasys['stpinlet_pic']) && $pbasys['stpinlet_pic']!="") { ?>
					<div id="delete_<?php echo  $pbasys['id']; ?>"><a href="/<?php echo $pbasys['stpinlet_pic']; ?>" target="_blank">View Image</a> &nbsp; | &nbsp;  <a href="javasript:void(0)" onclick="deleteImage(<?php echo $pbasys['id']; ?>,'','stpinlet','<?php echo $pbasys['stpinlet_pic']; ?>')">Delete</a></div>
                    <?php } ?>
                </div>
        	</div>
        </div>
        <div class="col-sm-12 mmr-housekeeping-submission"  style="text-align:center;">
        {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
        </div>                
          {!! Form::close() !!}                    
   	  </div>
    </div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
			$('#report_idate').datepicker({ dateFormat: "dd-mm-yy" });
			$('#regis_date').datepicker({ dateFormat: "dd-mm-yy" });
			//$('#ref_date').datepicker({ dateFormat: "dd-mm-yy" });
			$('#analy_startdate').datepicker({ dateFormat: "dd-mm-yy" });
			$('#analy_compdate').datepicker({ dateFormat: "dd-mm-yy" });
        });
		function deleteImage(id,type,tablename,filename)
		{
			var r = confirm("Are you sure you want to delete this image?");	
			if (r == true) {
				$.ajax({
				type: "get",
				cache:false,
				url: '{{ route('mmr.deleteppmImage') }}',
				data: { imageId: id, type: type, tablename: tablename, fileName: filename},
				success: function( response ) {
					$("#delete_"+id).remove();
				}  
			 });
			 
			} else {
			  return false;
			}
		}
    </script>		
    <?php /*?><script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script><?php */?>
    
   
   @include('partials.footer')
@stop