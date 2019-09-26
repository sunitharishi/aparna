@extends('layouts.appnew')





@section('content')







       <!-- Bootstrap -->


	   
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  





    <link rel="icon" href="images/ICON.png">







<!--    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->







    <!-- Font Awesome -->







    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">







    <!-- NProgress -->







   







    <!-- iCheck -->







   







    <!-- Datatables -->







    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">















    <!-- Custom Theme Style -->







    <link href="build/css/custom.css" rel="stylesheet">







 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">







<style>
.locationmem input{
  width:25%;
  float:left;
  margin-right:8px;
}
.locationmem .memcn {
  width:65%;
  float:left;
  margin-right:8px;
}
.numerror
{
	border-color: red !important;
	border-width: 1.5px !important;
}
.gas h6
{
 padding-left:15px;
} 
.x_title h3 
{
 color:#31859c;
}
.x_title span
{
 color:#31859c;
 font-size:20px;
 padding-left:25px;
}
.note-editor 
{
 margin-bottom:5px;
}

label
{
 font-weight:400;
}
h5
{
 margin-bottom: 10px;
 margin-top: 26px;
}
.total-application
{
 padding-left:0px !important;
}
.total-application p
{
 margin-top:16px;
 font-size:14px;
     background-color: #00CCFF;
    padding: 8px 12px;
	color:#fff;
}
.submit-button input[type="submit"]
{
background-color: #F3565D;
    padding:8px 25px;
    color: #FFFFFF;
    font-size: 14px;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
    border: 1px solid #F3565D;
}
.submit-button input[type="submit"]:hover
{
 background-color:#175363;
  border: 1px solid #175363;
}
.submit-button
{
 text-align:center;
 margin-top:20px;
}
.especially-heading
{
 padding-left:0px !important;
}
.fro-pro
{
 padding-left:0px !important;
}
.club-house label
{
 white-space: nowrap;
    word-break: normal;
}
.for-margin-label label
{
 margin:0px;
 font-size:12px;
}
.irrigation
{
 width: 100%;
    height: 33px;
	border:1px solid #000;
}
.daily select
{
 width:100%;
 height:30px
}
.fro-pro ul
{
 list-style:none;
 padding-left:10px;
}
.fro-pro ul li
{
 line-height:20px;
}
.fro-pro-check
{
padding-left:0px !important;
 margin-top:10px;
}
.for-violations
{
 padding-top:10px;
}
.light-back label
{
 margin-top:6px;
 padding-left:0px;
}
.light-back1 label
{
 padding-left:0px;
}
.text-right
{
 text-align:right;
}
input 
{
 border:1px solid #000;
}
.light-back
{
 background-color:#ffc10724;
 padding-bottom: 8px;
 margin-top:5px;
}
.light-back input
{
 border:1px solid #000;
}
.light-back1
{
background-color:#f9f7f7;
     padding-bottom: 8px;
	  padding-top: 8px;
}
.light-back1 input
{
 border:1px solid #000;
}
.row
{
 clear:both;
}
.spraying-locations h5
{
 margin-top:15px;
}
.weeding-locations h5
{
 margin-top:15px;
}
.mowing-locations h5
{
 margin-top:15px;
}
.application h5
{
 margin-top:15px;
}
.mulching h5
{
 margin-top:15px;
}
.no-of-users .outline
{
 margin-top:35px;
 padding-left:15px;
 width:22%;
}
.apna-complex .complax-help-desk
{
 width:10%;
}
.apna-complex .complex-previous
{
 width:8%;
 padding-right:0px;
}
.apna-complex .complex-login
{
 width:8%;
}
.apna-complex .complex-total
{
 width:8%;
}
.apna-complex .complex-resolved
{
 width:8%;
}
.apna-complex .complex-pending
{
 width:8%;
}
.apna-complex .complex-remarks
{
 width:50%;
}
.apna-project .col-sm-3.col-xs-3
{
 width:10%;
}
.apna-project .previous
{
 padding-right:0px;
}
.apna-project .col-sm-1.col-xs-1
{
 width:8%;
}
.apna-project .col-sm-2.col-xs-2
{
 width:8%;
}
.job-pending input
{
 margin-top:4px;
}
.communication input
{
 margin-top:4px;
}
.club-house-attendance .front-house
{
 margin-top:35px;
 padding-left:15px;
}
.house-keeping .areas-inspected.pest
{
 margin-top: 8px;
}
.pest-remark
{
 margin-top:5px;
}

.back-button
{
     margin-bottom: 13px;
    padding-left: 12px;
}
.back-button a
{
 background-color:#8dbb3c;
 color:white;
padding:4px 10px;
font-weight:600;
border-radius:4px;
text-decoration:none;
}
.back-button a:hover
{
 color:#000;
}
.extra-activities .extra
{
 margin-top:35px;
 margin-bottom:0px;
}
.sprinkler-not-working h6
{
 margin-top:6px;
}
.power-point .power
{
 padding-left:15px;
}
.solonide-values .values
{
 margin-top:35px;
}
.quick-coupling-values .coupling-values
{
 margin-top:35px;
}
.solonide-values .not-working
{
 padding-right:0px;
}
.solonide-values .not-working label
{
 padding-right:0px;
}
.fogging, .debris
{
 margin-top:5px;
}
.house-keeping .garbage
 {
  margin-top:8px;
 }
 .house-keeping .thefts, .house-keeping .violations-noticed, .house-keeping  .areas-inspected
{
 margin-top:8px;
}
.fogging .fog
{
 padding-left:15px;
 margin-top:27px;
}
.sprinkler-not-working .sprinklers
{
 margin-top:33px;
}
.additional-information input[type="checkbox"]
{
 margin-right:4px;
}
.additional-information .i-confirmed
{
 color:#520990;
 font-weight:bold;
}
.pms-blade
{
 margin-bottom:60px;
}
.land-scaping .power-point, .land-scaping .extra-activities, .land-scaping  .sprinkler-not-working
{
 margin-top:6px;
}
.no-of-users, .club-house-remarks
{
 margin-top:6px;
}
.additional-information
{
 clear:both;
}
	</style>



<div class="body">


      <div class="main_container">

      	<?php /*?><?php include "header.php" ?><?php */?>



        <!-- page content -->

        <div class="right_col" role="main">


<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

									$sitevv = $uriSegments[2];  ?>

			<div class="back-button"> <a href="/getdailyreportdetail/<?php echo $sitevv;  ?>">Back</a></div>



          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12 pms-blade">



              <div class="x_panel tile fixed_height_400">


                <div class="row x_title">


                   <span class="col-sm-12 col-xs-12">PMS DAR</span>


                  <!-- <div class="col-sm-4 col-xs-4" style="text-align:right;font-size:16px;">Date: <span style="color:#e61318;font-size:16px;"><b>24-01-2018 , </b></span>Time: <span style="color:#e61318;font-size:16px;"><b>06:28Am</b></span></div>-->

                </div>


                <div class="x_content"> 


				 <div class="errormsgval" style="display:none" id="errorblk" >


                  <p id="ermsg_sprinkler"></p> 



				  <p id="ermsg_landsup"></p>



				  <p id="ermsg_landhelp"></p>



				  <p id="ermsg_hsksup"></p>



				  <p id="ermsg_hskhelp"></p>



				  <p id="ermsg_clhfo"></p>



				  <p id="ermsg_clhhk"></p>



				  <p id="ermsg_clhoth"></p>



				  </div>



<!------------------------------------------------------land-scaping----------------------------------------------->



                	<div class="total-application especially-heading">

                    	<h4><span><b>Land Scaping</b></span></h4>




                    </div>  


					{!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storepms'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}



                	<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 




  


									$sitevv = $uriSegments[2]; 


									//echo "<pre>"; print_r($res); echo "</pre>";





									if(isset($uriSegments[3])){







									  if($uriSegments[1] == 'getpmsdailyreportdetaildate') {$date =$uriSegments[3];} else   {$date = $uriSegments[4];}



									}elseif($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];} else{




									 $date = date("d-m-Y");


									}  if($uriSegments[1] == 'getdailyreport'){ $date = $uriSegments[4];}  




  



								 ?> 




								<div class="aparnaaura">	<span class="text"><?php echo get_sitename($sitevv);



						?></span>


						<span class="box"><input type="text" name="reporton" id="example1" value="<?php echo $date; ?>" class="hasDatePicker form-control"></span> </div>



                         <input type="hidden" name="user_id" value="<?php  echo Auth::user()->id; ?>">


						  <input type="hidden" name="record_id" value="<?php  echo $res['id'] ?>">




						 <input type="hidden" name="site" value="<?php echo $sitevv ?>" id="site_val">




                    <div class="row light-back">



                    <div class="col-sm-12 col-xs-12 land-scaping">
                    	<div class="col-sm-3 col-xs-3 fro-pro land-attendance">

                    		<label class="control-label col-sm-4 col-xs-4" style="margin-top:35px;padding-left:15px;"><b>Attendance:</b></label>


                            <div class="col-sm-4 col-xs-4 fro-pro">


                                  <label class="col-sm-12 col-xs-12">Sup</label>

                                  {!! Form::text('land_atten_sup', $res['land_atten_sup'], ['class' => 'form-control number',  'id'=>'land_atten_sup', 'placeholder' => '']) !!}

                            </div>


                            <div class="col-sm-4 col-xs-4">

                                  <label class="col-sm-12 col-xs-12" for="Helpers">Helper</label>



                                 {!! Form::text('land_atten_helper', $res['land_atten_helper'], ['class' => 'form-control number', 'id'=>'land_atten_helper', 'placeholder' => '']) !!}


                            </div>


                        </div>



                        <div class="col-sm-3 col-xs-3 fro-pro watering-time">


                            <label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Watering:</b></label>

                            <div class="col-sm-4 col-xs-4 watering">


                                  <label class="col-sm-12 col-xs-12" style="width:100px;">Qty.</label>

                                  {!! Form::text('land_water_qty', $res['land_water_qty'], ['class' => 'form-control', 'placeholder' => 'KL']) !!}



                            </div>


                            <div class="col-sm-4 col-xs-4 time">

                                  <label class="col-sm-12 col-xs-12">Time</label>

								  {!! Form::text('land_water_time', $res['land_water_time'], ['class' => 'form-control timepicker', 'placeholder' => '']) !!}


                            </div>

                        </div>
                        
                          <div class="col-sm-6 col-xs-6 fro-pro extra-activities">
                    		<label class="control-label col-sm-3 col-xs-3 text-right extra" style="margin-top:35px;"><b>Extra Activities:</b></label>
                            <div class="col-sm-3 col-xs-3 fro-pro">
                                  <label class="col-sm-12 col-xs-12 loc-time">Multching</label>
                                   {!! Form::text('extra_act_multching', $res['extra_act_multching'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                            <div class="col-sm-3 col-xs-3 cleaning" style="padding-right:0px;">
                                  <label class="col-sm-12 col-xs-12">Gap filling</label>
                                   {!! Form::text('extra_act_gap_filling', $res['extra_act_gap_filling'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

							<div class="col-sm-3 col-xs-3 cleaning" style="padding-right:0px;">
                                  <label class="col-sm-12 col-xs-12">Staking</label>
                                   {!! Form::text('extra_act_gap_staking', $res['extra_act_gap_staking'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>  


                   
					  <div class="col-sm-3 col-xs-3 fro-pro power-point">
                    		<label class="control-label col-sm-6 col-xs-6 power" style="margin-top:35px;"><b>Power point:</b></label>
                            <div class="col-sm-6 col-xs-6 fro-pro">
                                  <label class="col-sm-12 col-xs-12 loc-time">Not Working</label>
                                   {!! Form::text('power_point_nw', $res['power_point_nw'], ['class' => 'form-control','onchange'=>'checknwvalvevalidate(this,this.value,"power_point_nw")', 'placeholder' => '']) !!}
                            </div>
                      </div>
					  
					  
					 



  <!--                      <div class="col-sm-3 col-xs-3 fro-pro cleaning-location">
  
                    		<label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Cleaning:</b></label>
                            <div class="col-sm-4 col-xs-4 fro-pro">
                                  <label class="col-sm-12 col-xs-12 loc-time">Time</label>
                                   {!! Form::text('land_clean_time', $res['land_clean_time'], ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                            </div>
                            <div class="col-sm-4 col-xs-4 cleaning" style="padding-right:0px;">
                                  <label class="col-sm-12 col-xs-12">Location</label>
                                   {!! Form::text('land_clean_location', $res['land_clean_location'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                        </div>


-->

                       <div class="col-sm-3 col-xs-3 fro-pro solonide-values">
                    		<label class="control-label col-sm-6 col-xs-6 text-right values"><b>Solonide Valves:</b></label>
                            <div class="col-sm-4 col-xs-4 fro-pro not-working">
                                  <label class="col-sm-12 col-xs-12 loc-time">Not Working</label>
                                   {!! Form::text('solonide_valve_nw', $res['solonide_valve_nw'], ['class' => 'form-control','onchange'=>'checknwvalvevalidate(this,this.value,"solonide_valve_nw")', 'placeholder' => '']) !!}
                            </div>
                      </div>


                    <div class="col-sm-3 col-xs-3 fro-pro quick-coupling-values">
                    		<label class="control-label col-sm-7 col-xs-7 text-right coupling-values"><b>Quick Coupling valves:</b></label>
                            <div class="col-sm-5 col-xs-5 fro-pro">
                                  <label class="col-sm-12 col-xs-12 loc-time">Not Working</label>
                                   {!! Form::text('quick_couple_nw', $res['quick_couple_nw'], ['class' => 'form-control','onchange'=>'checknwvalvevalidate(this,this.value,"quick_couple_nw")', 'placeholder' => '']) !!}
                            </div>
                      </div>

                        <div class="col-sm-2 col-xs-2 fro-pro sprinkler-not-working">
                            <label class="control-label col-sm-5 col-xs-5 text-right sprinklers"><b>Sprinklers:</b></label>
                            <div class="col-sm-7 col-xs-7 fro-pro">
                                 <label class="control-label col-sm-12 col-xs-12"> Not Working</label>
                                {!! Form::text('land_clean_sprinknw', $res['land_clean_sprinknw'], ['class' => 'form-control number', 'id'=>'land_clean_sprinknw', 'placeholder' => '']) !!}
                            </div>
                         </div>

                        <div class="col-sm-3 col-xs-3 spraying-locations">

                                  <label> Lawn Mowing:</label>

                                  <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_spray_location', $res['land_spray_location'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                  {!! Form::text('land_spray_mem', $res['land_spray_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>


                            </div>


                            <div class="col-sm-3 col-xs-3 fro-pro weeding-locations">


                                  <label>Lawn Edge Cutting: </label>

                                     <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_Weeding_location', $res['land_Weeding_location'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_Weeding_memcn',  $res['land_Weeding_memcn'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>




                            </div>





                           <div class="col-sm-3 col-xs-3 fro-pro mowing-locations">


                                  <label>Pesticide Application:</label>


                               <!--  {!! Form::text('land_mowing_location', $res['land_mowing_location'], ['class' => 'form-control', 'placeholder' => '']) !!}-->

                                     <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_mowing_location', $res['land_mowing_location'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_mowing_memcn', $res['land_mowing_memcn'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>





                            </div>



                             <div class="col-sm-3 col-xs-3 fro-pro application">



                                  <label>Fertilizer Application:</label>


                               <!--   {!! Form::text('land_application', $res['land_application'], ['class' => 'form-control', 'placeholder' => '']) !!}-->
                                  
                                   <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_application', $res['land_application'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_application_mem', $res['land_application_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>


                            </div>



                             <div class="col-sm-3 col-xs-3  mulching">



                                  <label>Manual Watering:</label>

                                 <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_mulching', $res['land_mulching'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_mulching_mem', $res['land_mulching_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>


                            </div>



                             <div class="col-sm-3 col-xs-3 fro-pro trimming">


                                  <label>Weeding:</label>


							 <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_trimming', $res['land_trimming'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_trimming_mem', $res['land_trimming_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>

                            </div>


                             <div class="col-sm-3 col-xs-3  fro-pro cutting">



                                 <label>Hoeing:</label>




                                   <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_cutting', $res['land_cutting'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_cutting_mem', $res['land_cutting_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>

                            </div>



                             <div class="col-sm-3 col-xs-3 fro-pro pruning">

                                  <label>Trimming:</label>

                               <!--   {!! Form::text('land_pruning', $res['land_pruning'], ['class' => 'form-control', 'placeholder' => '']) !!}-->

                              <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_pruning', $res['land_pruning'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_pruning_mem', $res['land_pruning_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>


                            </div>


                             <div class="col-sm-3 col-xs-3  shaping">



                                  <label>Pruning:</label>

                                 <!--{!! Form::text('land_shaping', $res['land_shaping'], ['class' => 'form-control', 'placeholder' => '']) !!}-->
  							<div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_shaping', $res['land_shaping'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_shaping_mem', $res['land_shaping_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>


                            </div>




                             <div class="col-sm-3 col-xs-3 fro-pro hoeing-locations">

                                  <label>Cleaning:</label>

                                 <!-- {!! Form::text('land_hoeing', $res['land_hoeing'], ['class' => 'form-control', 'placeholder' => '']) !!}-->
                                  
                                  <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_hoeing', $res['land_hoeing'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_hoeing_mem', $res['land_hoeing_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>

                            </div>


                           
                            <div class="col-sm-3 col-xs-3 fro-pro garden">
                            	<label class="control-label col-sm-12 col-xs-12">Garden Waste Disposal:</label>
								<!--{!! Form::text('land_garden_waste', $res['land_garden_waste'], ['class' => 'form-control', 'placeholder' => '']) !!}-->
                                
                                 <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_garden_waste', $res['land_garden_waste'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_garden_waste_mem', $res['land_garden_waste_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>
                            </div>
                             
                             
                              <div class="col-sm-3 col-xs-3 fro-pro extra">
                            	<label class="control-label col-sm-12 col-xs-12">Extra Activities:</label>
								<!--{!! Form::text('land_extra_activity', $res['land_extra_activity'], ['class' => 'form-control', 'placeholder' => '']) !!}-->
                                
                                  <div class="locationmem">
                                  
                                  
                                   {!! Form::text('land_extra_activity', $res['land_extra_activity'], ['class' => 'form-control memcn', 'placeholder' => 'Location']) !!}
                                   
                                  
                                   {!! Form::text('land_extra_activity_mem', $res['land_extra_activity_mem'], ['class' => 'form-control', 'placeholder' => 'count']) !!}
                                  </div>
                            </div>

                             </div>

                         </div>


<!------------------------------------------------------land-scaping----------------------------------------------->
<!------------------------------------------------------house-keeping----------------------------------------------->                            
                            <div class="col-sm-12 col-xs-12 total-application especially-heading">
                                  <h4><span><b>House Keeping</b></span></h4>
                                </div>
                              <div class="row light-back1">  
                              <div class="col-sm-12 col-xs-12  fro-pro1 house-keeping">
                                 <div class="col-sm-3 col-xs-3 house-attendance">
                    			 	<label class="control-label col-sm-4 col-xs-4" style="margin-top:28px;"><b>Attendance:</b></label>
                            	   <div class="col-sm-4 col-xs-4 sup">
                                  	  <label for="sup">Sup</label>
                                  	   {!! Form::text('housekp_atten_sup', $res['housekp_atten_sup'], ['class' => 'form-control number', 'id'=>'housekp_atten_sup',  'placeholder' => '']) !!}
                            	  </div>
                                 <div class="col-sm-4 col-xs-4 helper">
                                     <label for="Helpers">Helper</label>
                                     {!! Form::text('housekp_atten_helper', $res['housekp_atten_helper'], ['class' => 'form-control number', 'id'=>'housekp_atten_helper', 'placeholder' => '']) !!}
                                </div>
                           </div>
                           
                          <div class="col-sm-3 col-xs-3 fro-pro house-ride-on">
                    			<label class="control-label col-sm-3 col-xs-3 text-right" style="margin-top:28px;padding-right:6px;"><b>Ride on:</b></label>
                            	 <div class="col-sm-4 col-xs-4 sup hrs-run">
                                  	<label for="sup" >Hrs Run</label>
                                  	 {!! Form::text('housekp_rideon_hrs', $res['housekp_rideon_hrs'], ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                            	</div>
                              <div class="col-sm-5 col-xs-5 location">
                                  <label for="Helpers">Location</label>
                                   {!! Form::text('housekp_location', $res['housekp_location'], ['class' => 'form-control', 'placeholder' => '']) !!}
                              </div>
                        </div>


                     <div class="col-sm-3 col-xs-3 fro-pro Scrubbing">
                    			 	<label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:28px;padding-right:6px;"><b>Scrubbing:</b></label>
                            	 <div class="col-sm-4 col-xs-4 sup hrs-run">
                                  	<label for="sup" >Hrs Run</label>
									{!! Form::text('scrub_hrs_run', $res['scrub_hrs_run'], ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                            	</div>
                                <div class="col-sm-4 col-xs-4 location">
                                  <label for="Helpers">Location</label>
								  {!! Form::text('scrub_location', $res['scrub_location'], ['class' => 'form-control', 'placeholder' => '']) !!}
                              </div>
                        </div>
						
						  <div class="col-sm-3 col-xs-3 fro-pro fogging">
                    			 	<label class="control-label col-sm-4 col-xs-4 fog"><b>Fogging:</b></label>
                            	 <div class="col-sm-4 col-xs-4 sup hrs-run">
                                  	<label for="sup" >Hrs Run</label>
									{!! Form::text('fogg_hrs_run', $res['fogg_hrs_run'], ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                            	</div>
                                <div class="col-sm-4 col-xs-4 location">
                                  <label for="Helpers">Location</label>
								  {!! Form::text('fogg_location', $res['fogg_location'], ['class' => 'form-control', 'placeholder' => '']) !!}
                              </div>
                        </div>
  



                        <div class="col-sm-3 col-xs-3 total-application debris">
                                  <label class="control-label col-sm-3 col-xs-3 text-right" style="margin-top:28px;"><b>Debris:</b></label>
                                  <div class="col-sm-4 col-xs-4 fro-pro total-application">
                                  	<label class="col-sm-12 col-xs-12" style="padding:0px;">No. of Trips </label>
                                  	 {!! Form::text('housekp_debr_tipsnum', $res['housekp_debr_tipsnum'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            	</div>
                            <div class="col-sm-5 col-xs-5" style="padding-right:0px;">
                                <label class="col-sm-12 col-xs-12" style="padding:0px;">Vol (CFT) </label>
                                {!! Form::text('housekp_debr_vol', $res['housekp_debr_vol'], ['class' => 'form-control number', 'placeholder' => '']) !!}
                            </div>
                        </div>


                        <div class="col-sm-3 col-xs-3  garbage">
                            <label class="control-label col-sm-4 col-xs-4" style="margin-top:28px;"><b>Garbage:</b></label>
                            <div class="col-sm-8 col-xs-8 fro-pro out-time">
                                <label class="col-sm-12 col-xs-12">0ut Time</label>
                                {!! Form::text('housekp_debr_garbage', $res['housekp_debr_garbage'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>


                         <div class="col-sm-3 col-xs-3 thefts">
                            <label class="col-sm-12 col-xs-12">Thefts:</label>
                                 {!! Form::text('housekp_thefts', $res['housekp_thefts'], ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>
                         <div class="col-sm-3 col-xs-3 fro-pro violations-noticed">
                            <label>Violations Noticed:</label>
                            <div class="col-sm-12 col-xs-12 fro-pro">
                                  {!! Form::text('housekp_violation_notice', $res['housekp_violation_notice'], ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>




                         <div class="col-sm-3 col-xs-3  areas-inspected">


                            <label>Areas Inspected:</label>


                            <div class="col-sm-12 col-xs-12 fro-pro" style="padding-right:0px;">


                                    {!! Form::text('housekp_area_inspect', $res['housekp_area_inspect'], ['class' => 'form-control', 'placeholder' => '']) !!}


                            </div>


                        </div>



						<div class="col-sm-3 col-xs-3 areas-inspected pest" style="padding-right:0px;">



                            <label>Pest Control:</label>


                            <div class="col-sm-12 col-xs-12 fro-pro" style="padding-right:0px;">



                                    {!! Form::text('housekp_pest', $res['housekp_pest'], ['class' => 'form-control', 'placeholder' => '']) !!}

                            </div>


                        </div>

                        <div class="col-sm-6 col-xs-6 pest-remark">

                            <label>Remarks:</label>

                            <div class="col-sm-12 col-xs-12 fro-pro" style="padding-right:0px;">

									 {!! Form::text('housekp_remarks', $res['housekp_remarks'], ['class' => 'form-control', 'placeholder' => '']) !!}


                            </div>

                        </div>


                         </div>

                  </div>
<!------------------------------------------------------house-keeping----------------------------------------------->   
<!------------------------------------------------------club-house----------------------------------------------->                              

                            <div class="col-sm-12 col-xs-12 total-application especially-heading">

                                  <h4><span><b>Club House</b></span></h4>

                                </div> 


                                <div class="row light-back"> 


                              <div class="col-sm-12 col-xs-12">
                                 <div class="col-sm-6 col-xs-6 fro-pro club-house-attendance">
                    			 	<label class="control-label col-sm-2 col-xs-2 front-house"><b>Attendance:</b></label>
                            	   <div class="col-sm-3 col-xs-3 sup">
                                  	   <label class="col-sm-12 col-xs-12">Front Office </label>
                                  	   {!! Form::text('clbhous_att_frntofc', $res['clbhous_att_frntofc'], ['class' => 'form-control number', 'id'=>'clbhous_att_frntofc', 'placeholder' => '']) !!}
                            	   </div>
                                 <div class="col-sm-3 col-xs-3 house-keeping">
                                  <label class="col-sm-12 col-xs-12">House Keeping</label>
                                   {!! Form::text('clbhous_att_housekp', $res['clbhous_att_frntofc'], ['class' => 'form-control number', 'id'=>'clbhous_att_housekp','placeholder' => '']) !!}
                                </div>
							   <div class="col-sm-2 col-xs-2 cum" style="padding-right:0px;">
                                  <label class="col-sm-12 col-xs-12">Supervisor:</label>
                                  {!! Form::text('supervisor', $res['supervisor'], ['class' => 'form-control number', 'placeholder' => '']) !!}
                            	</div>
                               <div class="col-sm-2 col-xs-2 others">
                                  <label class="col-sm-12 col-xs-12">Others</label>
                                  {!! Form::text('clbhous_att_other', $res['clbhous_att_other'], ['class' => 'form-control number','id'=>'clbhous_att_other', 'placeholder' => '']) !!}
                              </div>
                            </div>



                                 <div class="col-sm-4 col-xs-4 fro-pro revenue">


                    			 	<label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Revenue:</b></label>


                            	    <div class="col-sm-3 col-xs-3 sup day">



                                  		<label class="col-sm-12 col-xs-12">Day: </label>


                                  		 {!! Form::text('clbhous_revenue_day', $res['clbhous_revenue_day'], ['class' => 'form-control number', 'placeholder' => '']) !!}


                            		</div>
									


                            		<!--<div class="col-sm-4 col-xs-4 cum" style="padding-right:0px;">

                                  		<label class="col-sm-12 col-xs-12">Cum:</label>

                                  		 {!! Form::text('clbhous_revenue_cum', $res['clbhous_revenue_cum'], ['class' => 'form-control number', 'placeholder' => '']) !!}

                            		</div> -->
									
									
										<div class="col-sm-5 col-xs-5 cum" style="padding-right:0px;">


                                  		<label class="col-sm-12 col-xs-12">Commercial Activite:</label>


                                  		 {!! Form::text('commercial_activate', $res['commercial_activate'], ['class' => 'form-control', 'placeholder' => '']) !!}


                            		</div> 
                                 </div>

                                 <div class="col-sm-2 col-xs-2 total-application power">




                            	      <label class="control-label col-sm-5 col-xs-5 text-right" style="margin-top:35px;"><b>Power:</b></label>



                                    <div class="col-sm-7 col-xs-7 sup total-application" style="padding-right:0px;">

                                	   <label class="col-sm-12 col-xs-12" style="width:100px;">Units: </label>


                                	   {!! Form::text('clbhous_pwr_units', $res['clbhous_pwr_units'], ['class' => 'form-control number', 'placeholder' => '']) !!}


                                    </div>


                               </div>



                                 <div class="col-sm-5 col-xs-5 fro-pro no-of-users">


                    			 	<label class="control-label col-sm-4 col-xs-4 outline"><b>No. of Users:</b></label>



                            	 <div class="col-sm-2 col-xs-2 sup gym">


                                  	<label for="sup">Gym: </label>


                                  	 {!! Form::text('clbhous_users_gym', $res['clbhous_users_gym'], ['class' => 'form-control number', 'placeholder' => '']) !!}

                            	</div>



                            <div class="col-sm-2 col-xs-2 pool">


                                  <label for="Helpers">Pool:</label>



                                   {!! Form::text('clbhous_users_pool', $res['clbhous_users_pool'], ['class' => 'form-control number', 'placeholder' => '']) !!}


                            </div>


                             <div class="col-sm-2 col-xs-2 tennis">


                                  <label for="Helpers">Tennis:</label>


                                   {!! Form::text('clbhous_users_tennis', $res['clbhous_users_tennis'], ['class' => 'form-control number', 'placeholder' => '']) !!}

                            </div>


							 <div class="col-sm-2 col-xs-2 tennis">


                                  <label for="Helpers">Shuttle:</label>



                                   {!! Form::text('clbhous_shuttle', $res['clbhous_users_tennis'], ['class' => 'form-control number', 'placeholder' => '']) !!}


                            </div>



                        </div>



                         <div class="col-sm-7 col-xs-7 fro-pro club-house-remarks">


                                  <label>Remarks </label>



                                    {!! Form::text('clbhous_users_remarks', $res['clbhous_users_remarks'], ['class' => 'form-control', 'placeholder' => '']) !!}


                            </div>


                            </div>


                           </div>

<!------------------------------------------------------club-house-----------------------------------------------> 
<!------------------------------------------------------apna-complex(apms)--------------------------------------->                             


                            <div class="col-sm-12 col-xs-12 especially-heading">

                                <h4><span><b>Apna Complex (APMS )</b></span></h4>

                            </div>


                            <div class="row light-back1">


                            <div class="col-sm-12 col-xs-12 apna-complex">

                                 <!-- <div class="col-sm-10 col-xs-10">-->



                                  <div class="col-sm-1 col-xs-1 for-margin-label complex-previous">


                                      	<label style="margin-bottom:5px;">Previous </label>



                                        {!! Form::text('apna_apms_previous', $pending_apna_apms, ['class' => 'form-control number', 'id'=>'apna_apms_previous', 'placeholder' => '', 'readonly' => 'true']) !!}

                                      </div>


                                      <div class="col-sm-2 col-xs-2 for-margin-label complax-help-desk">



                                      	<label style="margin-bottom:5px;">Opened</label>


                                       
										 {!! Form::text('apna_apms_opened_help', $res['apna_apms_opened_help'], ['class' => 'form-control number', 'id' =>'apna_apms_opened_help', 'onchange' =>'getvalidsum()' ,'placeholder' => 'Help Desk']) !!}



                                      </div>

                                      <div class="col-sm-1 col-xs-1 for-margin-label complex-login">



                                      	<label style="margin-bottom:5px;">Opened</label>




  {!! Form::text('apna_apms_opened_login', $res['apna_apms_opened_login'], ['class' => 'form-control number', 'id' =>'apna_apms_opened_login', 'onchange' =>'getvalidsum()' ,'placeholder' => 'Login']) !!}


                                      </div>



                                      <div class="col-sm-1 col-xs-1 for-margin-label complex-total">


                                      	<label style="margin-bottom:5px;">Opened</label>


 {!! Form::text('apna_apms_opened_total', $res['apna_apms_opened_total'], ['class' => 'form-control number', 'id' => 'apna_apms_opened_total', 'placeholder' => 'Total','readonly' => 'true']) !!}



                                      </div>


                                      <div class="col-sm-2 col-xs-2 for-margin-label complex-resolved">


                                      	<label style="margin-bottom:5px;"> Resolved</label>



   {!! Form::text('apna_apms_resolved', $res['apna_apms_resolved'], ['class' => 'form-control number', 'id'=>'apna_apms_resolved', 'onchange'=>'apmsresol()', 'placeholder' => '']) !!}

                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label complex-pending">


                                      	<label style="margin-bottom:5px;">Pending </label>



 {!! Form::text('apna_apms_pending',$res['apna_apms_pending'], ['class' => 'form-control number', 'id'=>'apna_apms_pending', 'readonly' => 'true', 'placeholder' => '']) !!}


                                      </div>


                             <!--</div>-->


                             <div class="col-sm-6 col-xs-6 fro-pro complex-remarks">


                                  <label>Remarks </label>


                                  {!! Form::text('apna_apms_remarks', $res['apna_apms_remarks'], ['class' => 'form-control', 'placeholder' => '']) !!}


                               </div>



                           </div>


                           </div>    


<!------------------------------------------------------apna-complex(apms)--------------------------------------->
<!------------------------------------------------------apna-complex(project)------------------------------------>                               


                            <div class="col-sm-12 col-xs-12 especially-heading">


                                <h4><span><b>Apna Complex (Project)</b></span></h4>


                            </div>



                            <div class="row light-back">



                             <div class="col-sm-12 col-xs-12 apna-project">



                                  <!--<div class="col-sm-10 col-xs-10">-->

                                  <div class="col-sm-1 col-xs-1 for-margin-label previous">


                                      	<label style="margin-bottom:5px;">Previous </label>


                                        
 {!! Form::text('apna_project_previous', $pending_apna_project, ['class' => 'form-control number', 'id'=>'apna_project_previous', 'placeholder' => '',  'readonly' => 'true']) !!}


                                      </div>



                                      <div class="col-sm-3 col-xs-3 for-margin-label">


                                      	<label style="margin-bottom:5px;">Opened</label>




{!! Form::text('apna_project_opened_help',  $res['apna_project_opened_help'], ['class' => 'form-control number', 'id' =>'apna_project_opened_help', 'onchange' =>'getvalidsumpro()', 'placeholder' => 'Help Desk']) !!}


                                      </div>


                                      <div class="col-sm-2 col-xs-2 for-margin-label project-login">



                                      	<label style="margin-bottom:5px;">Opened</label>



 {!! Form::text('apna_project_opened_login', $res['apna_project_opened_login'], ['class' => 'form-control number', 'id' =>'apna_project_opened_login', 'onchange' =>'getvalidsumpro()', 'placeholder' => 'Login']) !!}


                                      </div>

                                      <div class="col-sm-2 col-xs-2 for-margin-label project-total">

                                      	<label style="margin-bottom:5px;">Opened</label>

 {!! Form::text('apna_project_opened_total',$res['apna_project_opened_total'], ['class' => 'form-control number', 'id' => 'apna_project_opened_total','placeholder' => 'Total','readonly' => 'true']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label project-resolved">



                                      	<label style="margin-bottom:5px;"> Resolved</label>



    {!! Form::text('apna_project_resolved',  $res['apna_project_resolved'], ['class' => 'form-control number', 'id'=>'apna_project_resolved', 'onchange'=>'proresol()', 'onchange'=>'proresol()', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label project-pending">



                                      	<label style="margin-bottom:5px;">Pending </label>



                                       

 {!! Form::text('apna_project_pending', $res['apna_project_pending'], ['class' => 'form-control number', 'id'=>'apna_project_pending', 'placeholder' => '','readonly' => 'true']) !!}






                                      </div>




                             <div class="col-sm-6 col-xs-6 fro-pro project-remarks">
                                  <label>Remarks </label>
                                   {!! Form::text('apna_project_remarks', $res['apna_project_remarks'], ['class' => 'form-control', 'placeholder' => '']) !!}



                               </div>



                            </div>



                            </div>



<!------------------------------------------------------apna-complex(project)------------------------------------>

<!------------------------------------------------------occupancy------------------------------------------------>



                             <div class="col-sm-12 col-xs-12 especially-heading">



                               <h4><span><b>Occupancy</b></span></h4>



                            </div>



                            <div class="row light-back1">



                             <div class="col-sm-12 col-xs-12 owners">

                            <div class="col-sm-2 col-xs-2 occupancy-moved-in">



                                  <h6><b>Moved in</b></h6>



                                      <div class="col-sm-6 col-xs-6 sup especially-heading">



                                  		<label style="font-size:12px;margin-bottom:0px;">Owners </label>



                                  		 {!! Form::text('occupancy_move_owners', $res['occupancy_move_owners'], ['class' => 'form-control number', 'placeholder' => '']) !!}


                            		</div>




                                      <div class="col-sm-6 col-xs-6 for-margin-label">



                                      	<label>Tenants </label>



                                         {!! Form::text('occupancy_move_tenants', $res['occupancy_move_tenants'], ['class' => 'form-control', 'placeholder' => '']) !!}


                                      </div>


                                </div>



                                <div class="col-sm-2 col-xs-2 fro-pro occupancy-vacated">



                                  <h6><b>Vacated</b></h6>



                                  <div class="col-sm-6 col-xs-6 for-margin-label especially-heading">


                                      	<label>Owners</label>



                                         {!! Form::text('occupancy_vacated_owners', $res['occupancy_vacated_owners'], ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-6 col-xs-6 for-margin-label">



                                      	<label>Tenants </label>


                                        {!! Form::text('occupancy_vacated_tenants', $res['occupancy_vacated_tenants'], ['class' => 'form-control', 'placeholder' => '']) !!}



                                      </div>


                                </div>




                            <div class="col-sm-3 col-xs-3 fro-pro occupancy-as-on-date">


                                  <h6><b>Occupancy as on Date</b></h6>


                                  <div class="col-sm-4 col-xs-4 for-margin-label especially-heading">


                                      	<label>Owners</label>


                                        {!! Form::text('occupancy_asdate_owners', $res['occupancy_asdate_owners'], ['class' => 'form-control number', 'placeholder' => '']) !!}

                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label tenants">



                                      	<label>Tenants </label>



                                         {!! Form::text('occupancy_asdate_tenants', $res['occupancy_asdate_tenants'], ['class' => 'form-control', 'placeholder' => '']) !!}



                                      </div>


                                      <div class="col-sm-4 col-xs-4 for-margin-label vacant">



                                      	<label>Vacant </label>



                                         {!! Form::text('occupancy_asdate_vacant', $res['occupancy_asdate_vacant'], ['class' => 'form-control', 'placeholder' => '']) !!}


                                      </div>



                                </div>




                                 <div class="col-sm-5 col-xs-5 fro-pro occupancy-remarks">


                                  <h6><b>Remarks </b></h6>



                                  <div class="nbsp">&nbsp;</div>


                                    {!! Form::text('occupancy_asdate_remarks', $res['occupancy_asdate_remarks'], ['class' => 'form-control', 'placeholder' => '']) !!}



                            </div>



                          </div>


                       </div>



<!------------------------------------------------------occupancy------------------------------------------------>



<!------------------------------------------------------imprest------------------------------------------------>                            





                             <div class="col-sm-12 col-xs-12 especially-heading">



                               <h4><span><b>Imprest</b></span></h4>


                            </div>




                            <div class="row light-back">




                                  <div class="col-sm-12 col-xs-12">







                                <div class="col-sm-2 col-xs-2 cash-on-hand">







                                  <label class="control-label col-sm-12" for="pwd">Cash on Hand (<i class="fa fa-inr" aria-hidden="true"></i>)</label>







                                 







								 







								    {!! Form::text('imprest_cash_on_hand', $res['imprest_cash_on_hand'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                </div>







                                







                                <div class="col-sm-2 col-xs-2 fro-pro2 bills-on-hands">







                                  <label class="control-label col-sm-12" for="pwd">Bills on Hand (<i class="fa fa-inr" aria-hidden="true"></i>)</label>







                                   {!! Form::text('imprest_bills_on_hand', $res['imprest_bills_on_hand'], ['class' => 'form-control', 'placeholder' => '']) !!}







                               </div> 







                            







                             <div class="col-sm-2 col-xs-2 fro-pro1 date-of-statement">







                                  <label class="control-label col-sm-12" for="email">Date of Statement Sent</label>







                                 <!--  {!! Form::text('imprest_dateof_statement', $res['imprest_dateof_statement'], ['class' => 'form-control', 'placeholder' => '']) !!}-->



								   



								   <input type="text" name="imprest_dateof_statement" id="imprest_dateof_statement" value="<?php echo $res['imprest_dateof_statement']; ?>" class="form-control">







                                </div>

                                  

                                  

                                  <div class="col-sm-1 col-xs-1">

                                  		<label class="control-label col-sm-12">Amount</label>

                                     <!--   <input type="text" class="form-control"  />-->

										 {!! Form::text('dateof_statement_amount', $res['dateof_statement_amount'], ['class' => 'form-control', 'placeholder' => '']) !!}

                                  </div>
								  
								  
								    <div class="col-sm-2 col-xs-2 fro-pro1 date-of-statement">


                                  <label class="control-label col-sm-12" for="email">Date of Statement Sent</label>


                                  <!-- {!! Form::text('imprest_dateof_statement', old('imprest_dateof_statement'), ['class' => 'form-control', 'placeholder' => '']) !!}-->



								   <?php  $dateval = date("d-m-Y"); ?>



								   <input type="text" name="imprest_dateof_statement_2" id="imprest_dateof_statement_2" value="<?php echo $res['imprest_dateof_statement_2']; ?>" class="form-control">


                                </div>



                                 <div class="col-sm-1 col-xs-1">

                                 	  <label class="control-label col-sm-12">Amount</label>

                                      <!--<input type="text" class="form-control"  />-->

									   {!! Form::text('dateof_statement_amount_2', $res['dateof_statement_amount_2'], ['class' => 'form-control', 'placeholder' => '']) !!}

                                 </div>





                                </div>  







                                </div>







                               







<!------------------------------------------------------imprest------------------------------------------------>   



<!------------------------------------------------------gas---------------------------------------------------->                                   







                                <div class="col-sm-12 col-xs-12 especially-heading">







                                <h4><span><b>Gas</b></span></h4>







                            </div>







                            







                            <div class="row light-back1">







                                  <div class="col-sm-12 col-xs-12 gas">



                                  



                                   <h6><b>Transaction Supervised by</b></h6>







                                <div class="col-sm-2 col-xs-2 transaction-by">







                                  <label class="control-label col-sm-12" for="pwd">APMS</label> 







                                  {!! Form::text('gas_transact_supervise_by', $res['gas_transact_supervise_by'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                </div>



								



									<div class="col-sm-1 col-xs-1 transaction-by">







                                  <label class="control-label col-sm-12" for="pwd">Society</label>







                                  {!! Form::text('gas_transact_socity',$res['gas_transact_socity'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                </div>



								



								<div class="col-sm-1 col-xs-1 transaction-by">







                                  <label class="control-label col-sm-12" for="pwd">Security</label>







                                  {!! Form::text('gas_transact_security',$res['gas_transact_security'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                </div>







                                







                                <div class="col-sm-2 col-xs-2 fro-pro2 full-cycle">







                                  <label class="control-label col-sm-12" for="pwd">Full Cyl. Recd</label>







                                   {!! Form::text('gas_transact_full_cyl_recd', $res['gas_transact_full_cyl_recd'], ['class' => 'form-control', 'placeholder' => '']) !!}







                               </div> 







                            







                             <div class="col-sm-2 col-xs-2 fro-pro1 empty-cycle">







                                  <label class="control-label col-sm-12" for="email">Empty Cyl. Taken Out</label>







                                   {!! Form::text('gas_empty_cyl_taken_out', $res['gas_empty_cyl_taken_out'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                </div>







                                </div>







                                </div>







                                



<!------------------------------------------------------gas---------------------------------------------------->



<!------------------------------------------------------information-------------------------------------------->



                                







                                 <div class="col-sm-12 col-xs-12 especially-heading">







                                <h4><span><b>Information</b></span></h4>







                            </div>







                                







                                <div class="row light-back">







                                 <div class="col-sm-12 col-xs-12">







                                <div class="col-sm-12">







                                	 <div class="col-sm-2 col-xs-2 fro-pro attendance-verified">







                                  <label class="control-label col-sm-12" for="pwd">Attendance Verified</label>







											<select class="irrigation" name="info_attend_verified">







												<option value="Yes" <?php if($res['info_attend_verified'] == 'Yes') echo "selected='selected'"; ?>>Yes</option>







												 <option value="No" <?php if($res['info_attend_verified'] == 'No') echo "selected='selected'"; ?>>No</option>







                                               







                                            </select>







                                </div> 







                                







                                <div class="col-sm-2 col-xs-2 fro-pro2 data-sheet-pending">







                                  <label class="control-label col-sm-12" for="pwd">Data Sheets Pending</label>







                                    {!! Form::text('info_attend_datesheet_pend', $res['info_attend_datesheet_pend'], ['class' => 'form-control', 'placeholder' => '']) !!}







                               </div> 







                            







                             <div class="col-sm-2 col-xs-2 fro-pro1 parking-display">







                                  <label class="control-label col-sm-12" for="email">Parking Display Pending</label>







                                    {!! Form::text('info_parking_display', $res['info_parking_display'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                </div>







                                </div>







                            </div>







                            </div>







<!------------------------------------------------------information-------------------------------------------->



<!------------------------------------------------------job-pending-------------------------------------------->                           







                            <div class="col-sm-12 col-xs-12 especially-heading">







                            	<h4><span><b>Jobs Pending:</b></span></h4>







                            </div>







                            







                              <div class="row light-back1">







                                 <div class="col-sm-12 col-xs-12">







                                 	<div class="col-sm-12 col-xs-12 job-pending">







                                		 {!! Form::text('jobs_pending',$res['jobs_pending'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                    </div>







                                </div>







                             </div>



<!------------------------------------------------------job-pending--------------------------------------------> 



<!------------------------------------------------------communication-with--------------------------------------> 



                           



                             <div class="col-sm-12 col-xs-12 especially-heading">







                            	<h4><span><b>Communication with MC:</b></span></h4>







                             </div>







                             







                             <div class="row light-back">







                                 <div class="col-sm-12 col-xs-12 ">







                                 	<div class="col-sm-12 col-xs-12 communication">







                                		 {!! Form::text('comminication_with_mc', $res['comminication_with_mc'], ['class' => 'form-control', 'placeholder' => '']) !!}







                                    </div>







                                </div>







                            </div>



<!------------------------------------------------------communication-with-------------------------------------->



<!------------------------------------------------------additional-information---------------------------------->







       <div class="col-sm-12 col-xs-12 especially-heading">



               <h4><span><b>Additional Information:</b></span></h4>



       </div>



                            

<div class="additional-information">

 	<!--<label>Additional Information:</label><br/><br/> -->                    



<textarea class="form-control summernote-small" placeholder="Enter Description" name="reasontext"  id="reasontext"><?php echo $res['reasontext']; ?></textarea>







                           



                                      <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span class="i-confirmed">I Confirmed all the data entered was correct</span>

</div>





                            







                            <div class="col-sm-12 col-xs-12 submit-button">







                            	{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}







								






                            </div>



<!------------------------------------------------------additional-information---------------------------------->



                

                        {!! Form::close() !!}






                </div>







              </div>  







            </div>            







          </div>







          























          







        </div>







        <!-- /page content -->















        <!-- footer content -->







       







        <!-- /footer content -->







      </div>







    </div>







<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->







<script type="text/javascript">







  







/*$( document ).ready(function() {







  $( "#select_id" ).change(function() 







  {







   var val = $(this).val();







  // alert(val);







   var href = window.location.href;







   //window.location = href.replace(/getdailyreport\/.*$/, "");







   window.location.href = "http://report.local/getdailyreport/"+val;







  // window.location.replace('getdailyreport/'+val);







	//alert(id);















  });







  







  $('select[name="sites"]').on('change', function(){    







    //alert($(this).val());   







	







	 var val = $(this).val();







   //alert(val);







   var href = window.location.href;







   //window.location = href.replace(/getdailyreport\/.*$/, "");







   window.location.href = "http://report.local/getdailyreportdetail/"+val;  







  // window.location.replace('getdailyreport/'+val);







	//alert(id); 







});







  







});*/















 $( document ).ready(function() {




    $('.timepicker').datetimepicker({

        format: 'HH:mm'
		

    }); 

 $('.timepickerstart').datetimepicker({

        format: 'h:m A'
		

    }); 






 $('#reasontext').summernote({



              height:300,



            });











$("#imprest_dateof_statement").datepicker({







 dateFormat: "dd-mm-yy",







});

$("#imprest_dateof_statement_2").datepicker({
 dateFormat: "dd-mm-yy",


}); 



$("#example1").datepicker({







 dateFormat: "dd-mm-yy",







  onSelect: function(dateText) {







    alert("Selected date: " + dateText + "; input's current value: " + this.value);







	







	var site = $("#site_val").val();







	







	 window.location.href = "/getpmsdailyreportdetaildate/"+site+"/"+dateText; 







	  







  }







});







var site = "<?php  echo $sitevv; ?>";



var erflag = false;



 var count = 0;











   $("#land_atten_sup").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'land_atten_sup'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_landsup").html("");



				$("#land_atten_sup").removeClass("errind");



				erflag = false;



				}else{



				alert(msg);



				$("#ermsg_landsup").html(msg);



				$("#land_atten_sup").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });















  $("#land_atten_helper").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'land_atten_helper'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_landhelp").html("");



				$("#land_atten_helper").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_landhelp").html(msg);



				$("#land_atten_helper").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });



 



 



   $("#housekp_atten_sup").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'housekp_atten_sup'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_hsksup").html("");



				$("#housekp_atten_sup").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_hsksup").html(msg);



				$("#housekp_atten_sup").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 }); 



 



    $("#housekp_atten_helper").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'housekp_atten_helper'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_hskhelp").html("");



				$("#housekp_atten_helper").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_hskhelp").html(msg);



				$("#housekp_atten_helper").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });



 



     $("#clbhous_att_frntofc").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'clbhous_att_frntofc'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_clhfo").html("");



				$("#clbhous_att_frntofc").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_clhfo").html(msg);



				$("#clbhous_att_frntofc").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });



 



 



      $("#clbhous_att_housekp").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'clbhous_att_housekp'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_clhhk").html("");



				$("#clbhous_att_housekp").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_clhhk").html(msg);



				$("#clbhous_att_housekp").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });



 



 



  $("#clbhous_att_other").change(function(){ 



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'clbhous_att_other'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				 



				if(msg == 'suc'){$("#ermsg_clhoth").html("");



				$("#clbhous_att_other").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_clhoth").html(msg);



				$("#clbhous_att_other").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });



 



 



 $("#land_clean_sprinknw").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.validtotpms') }}', 



				data: { checkval: checkval, site: site, field:'land_clean_sprinknw'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				  



				if(msg == 'suc'){$("#ermsg_sprinkler").html("");



				$("#land_clean_sprinknw").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_sprinkler").html(msg);



				$("#land_clean_sprinknw").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					



					count = count - 1;



					} 



					if(count > 0) {



					$("#errorblk").show();



					} else



					{



					 $("#errorblk").hide();



					}



				}



				



        });



 	



 });







 







});



function checknwvalvevalidate(dis,val,field){
var site = $("#site_val").val();
			 $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.validtotpms') }}',  
				data: { checkval: val, site: site, field:field},
				success: function( msg ) {
				if(msg == 'suc'){
				$(dis).removeClass("numerror");
				}else{
				$(dis).addClass("numerror");
				}
				}
        });
}




function subform()



 {



    //alert("tetest");



	var flag = true;



	



	$( ".number" ).each(function() {



		if(($( this ).val().length <= 0)){



			//$(this).addClass("numerror");



			



		}



		else{



		 if(isNaN($( this ).val())){



			     flag = false;



				



				 $(this).addClass("numerror");



			 }



			 else{



			    $(this).removeClass("numerror"); 



			 }



		}



	  



	}); 



	 



/*	$( ".required" ).each(function() {



		



		if(($( this ).val().length <= 0)){



			flag = false;



			



			$(this).addClass("numerror");



			



		}



		else{



		 



		  if($(this).hasClass('number')){



		      if(isNaN($( this ).val())){



			     flag = false;



				



				 $(this).addClass("numerror");



			  }



			   else



			   {



			   



			     $(this).removeClass("numerror");



			   }



		  }



		   else{



		   



		      $(this).removeClass("numerror");



		   }



		



		}



	}); */



	



	/*$( ".number" ).each(function() {



		



		if(isNaN($( this ).val())){



			flag = false;



			$(this).addClass("numerror");



			



		}else{



		$(this).removeClass("numerror");



		}



	});*/



	



	



	







	



	if ($('.confirmed:checked').length == 0) {



	



	 alert("Please Confirm data entered was correct")



	 flag = false;



	}



	



	







if(flag == true){



  return true; 



}



else{



return false;    



}



	



 }



 


 
 function getvalidsum (){
 
	 
    var apna_apms_opened_help = 0;

	var apna_apms_opened_login = 0;

    if($("#apna_apms_opened_help").val() == ""){}else{ apna_apms_opened_help = $("#apna_apms_opened_help").val()}

	if($("#apna_apms_opened_login").val() == ""){}else{ apna_apms_opened_login = $("#apna_apms_opened_login").val()}


	var apna_apms_opened_total = parseFloat(apna_apms_opened_help) +  parseFloat(apna_apms_opened_login);

	$("#apna_apms_opened_total").val(apna_apms_opened_total);
 
 }
 
  function getvalidsumpro (){
 
 
    var apna_project_opened_help = 0;

	var apna_project_opened_login = 0;
	
	var apna_project_opened_total = 0;

    if($("#apna_project_opened_help").val() == ""){}else{ apna_project_opened_help = $("#apna_project_opened_help").val()}

	if($("#apna_project_opened_login").val() == ""){}else{ apna_project_opened_login = $("#apna_project_opened_login").val()}


	var apna_project_opened_total = parseFloat(apna_project_opened_help) +  parseFloat(apna_project_opened_login);

	$("#apna_project_opened_total").val(apna_project_opened_total);
 
 }
 
   function apmsresol(){
 
 
    var preveious = 0;

	var resolved = 0;
	
	var total = 0;
	
	var pending = 0;
	//alert($("#apna_apms_previous").val());
	

    if($("#apna_apms_previous").val() == ""){}else{ preveious = $("#apna_apms_previous").val()}

	if($("#apna_apms_opened_total").val() == ""){}else{ total = $("#apna_apms_opened_total").val()}
	
	if($("#apna_apms_resolved").val() == ""){}else{ resolved = $("#apna_apms_resolved").val()}
	


	var pending = parseFloat(preveious) +  parseFloat(total) -  parseFloat(resolved);

	$("#apna_apms_pending").val(pending);
 
 }
 
 
    function proresol(){
 
 
    var preveious = 0;

	var resolved = 0;
	
	var total = 0;
	
	var pending = 0;
	//alert($("#apna_apms_previous").val());
	

    if($("#apna_project_previous").val() == ""){}else{ preveious = $("#apna_project_previous").val()}

	if($("#apna_project_opened_total").val() == ""){}else{ total = $("#apna_project_opened_total").val()}
	
	if($("#apna_project_resolved").val() == ""){}else{ resolved = $("#apna_project_resolved").val()}
	


	var pending = parseFloat(preveious) +  parseFloat(total) -  parseFloat(resolved);

	$("#apna_project_pending").val(pending);
 
 }




  







  </script> 	






@include('partials.footer')
  











  























@stop