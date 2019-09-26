@extends('layouts.appnew')











@section('content')















       <!-- Bootstrap -->

	   

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">



 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>



  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  









    <link rel="icon" href="images/ICON.png">















   <!-- <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->















    <!-- Font Awesome -->















    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">









    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">































    <!-- Custom Theme Style -->















    <link href="build/css/custom.css" rel="stylesheet">





 









 <link media="all" type="text/css" rel="stylesheet" href="http://hrms.recurringbillingsystem.com/assets/third/summernote/summernote.css">















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
.error
{
	border:2px solid #FF0000 !important;
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

.apna-complex .complex-remarks

{

 width:50%;

}

.apna-complex .complex-pending

{

 width:8%;

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

.club-house-attendance .house-keeping label

{

 padding-right:0px;

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































.house-keeping .col-sm-3, .house-keeping .col-sm-6

{

 margin-bottom:6px;

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

.x_content 

{

margin-bottom:10%;

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

.land-scaping .extra-activities

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

.power-point .loc-time

{

 padding-right:0px;

}

.fro-pro.solonide-values

{

 width:11%;

}

.fro-pro.quick-coupling-values

{

 width:14%;

}

.pms-blade {

    margin-bottom: 60px;

}

#land_water_qty_reson
{
    z-index: 100000;
    width: 321px;
    height: 46px;
    border: 1px solid rgb(0, 0, 0);
    margin: 10px 0px 0px;
}

	</style>





<div class="body">







      <div class="main_container dar-daily">





      	<?php /*?><?php include "header.php" ?><?php */?>







        <!-- page content -->







        <div class="right_col" role="main">









		       <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 



									$sitevv = $uriSegments[2]; ?>



		

            

              <?php if($uriSegments[1] == 'getpmsdailyreportdetaildate') { ?>

              <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>

              <?php }else { ?>

			 <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[4];  ?>">Back</a></div> <?php } ?>









          <div class="row">



            <div class="col-md-12 col-sm-12 col-xs-12 pms-blade">



              <div class="x_panel tile fixed_height_400">





               







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





<!-------------------------------------------land-scaping---------------------------------------->





                	







					{!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storepms'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}









                	<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 







									$sitevv = $uriSegments[2]; 











									//echo "<pre>"; print_r($res); echo "</pre>";











									if(isset($uriSegments[3])){







									  if($uriSegments[1] == 'getpmsdailyreportdetaildate') {$date =$uriSegments[3];} else   {$date = $uriSegments[4];}









									}elseif($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];} else{







									 $date = date("d-m-Y");

									  $dateval = date('Y-m-d');

									 $date =  date('d-m-Y', strtotime($dateval .' -1 day'));









									}  if($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];}    









								 ?>







								<div class="row aparnaaura">	<div class="col-sm-6 col-xs-6 text"><?php echo get_sitename($sitevv);









						?></div>







						<div class="col-sm-6 col-xs-6 box"><span>Date:</span> <input type="text" name="reporton" id="example1" value="<?php echo $date; ?>" class="hasDatePicker form-control"></div> </div>

                         

                         

                          <div class="row x_title">







                   <span class="col-sm-12 col-xs-12">PMS DAR</span>









                </div>

                         

                          <div class="total-application especially-heading">





                    	<h4><span><b>Land Scaping</b></span></h4>







                    </div>  





                         <input type="hidden" name="user_id" value="<?php  echo Auth::user()->id; ?>">







						 <input type="hidden" name="site" value="<?php echo $sitevv ?>" id="site_val">





                    <div class="row light-back">





                    <div class="col-sm-12 col-xs-12 land-scaping"> 



                    	<div class="col-sm-3 col-xs-3 fro-pro land-attendance">



                    		<label class="control-label col-sm-4 col-xs-4" style="margin-top:35px;padding-left:15px;"><b>Attendance:</b></label>







                            <div class="col-sm-4 col-xs-4 fro-pro sup">



                                  <label class="col-sm-12 col-xs-12">Sup</label>







                                  {!! Form::text('land_atten_sup', old('land_atten_sup'), ['class' => 'form-control ereq number', 'id'=>'land_atten_sup', 'placeholder' => '']) !!}





                            </div>





                            <div class="col-sm-4 col-xs-4 helper">





                                  <label class="col-sm-12 col-xs-12" for="Helpers">Helper</label>





                                 {!! Form::text('land_atten_helper', old('land_atten_helper'), ['class' => 'form-control ereq number', 'id'=>'land_atten_helper', 'placeholder' => '']) !!}





                            </div>



                        </div>









                        <div class="col-sm-3 col-xs-3 fro-pro watering-time">

                            <label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Watering:</b></label>

                            <div class="col-sm-4 col-xs-4 watering">

                                  <label class="col-sm-12 col-xs-12" style="width:100px;">Qty.</label>

                                  {!! Form::text('land_water_qty', old('land_water_qty'), ['class' => 'form-control ereq number', 'placeholder' => 'KL']) !!}

                            </div>

                            <div class="col-sm-4 col-xs-4 time">

                                  <label class="col-sm-12 col-xs-12">Duration</label>

								  {!! Form::text('land_water_time', old('land_water_time'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}

                            </div>

                        </div>

                         <!-- <div class="col-sm-5 col-xs-5 fro-pro extra-activities">

                    		<label class="control-label col-sm-3 col-xs-3 text-right extra"><b>Extra Activities:</b></label>

                            <div class="col-sm-3 col-xs-3 fro-pro">

                                  <label class="col-sm-12 col-xs-12 loc-time">Multching</label>

                                   {!! Form::text('extra_act_multching', old('extra_act_multching'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            </div>

                            <div class="col-sm-3 col-xs-3 cleaning" style="padding-right:0px;">

                                  <label class="col-sm-12 col-xs-12">Gap filling</label>

                                   {!! Form::text('extra_act_gap_filling', old('extra_act_gap_filling'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            </div>

							<div class="col-sm-3 col-xs-3 cleaning" style="padding-right:0px;">

                                  <label class="col-sm-12 col-xs-12">Staking</label>

                                   {!! Form::text('extra_act_gap_staking', old('extra_act_gap_staking'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            </div>

                        </div>

-->

                  

					  

					  <div class="col-sm-1 col-xs-1 fro-pro power-point">

                    		<!--<label class="control-label col-sm-6 col-xs-6 power" style="margin-top:35px;"></label>

                            <div class="col-sm-6 col-xs-6 fro-pro">-->

                                  <label class="col-sm-12 col-xs-12 loc-time"><b>Power point:</b></label>

                                   {!! Form::text('power_point_nw', old('power_point_nw'), ['class' => 'form-control ereq', 'onchange'=>'checknwvalvevalidate(this,this.value,"power_point_nw")','placeholder' => 'Not Working']) !!}

                           <!-- </div>-->

                      </div>

					  

					   

					       <div class="col-sm-2 col-xs-2 fro-pro solonide-values">

                    		<!--<label class="control-label col-sm-5 col-xs-5 text-right values"></label>

                            <div class="col-sm-4 col-xs-4 fro-pro not-working">-->

                                  <label class="col-sm-12 col-xs-12 loc-time"><b>Solenoid Valves:</b></label>

                                   {!! Form::text('solonide_valve_nw', old('solonide_valve_nw'), ['class' => 'form-control ereq', 'id'=>'solonide_valve_nw', 'onchange'=>'checknwvalvevalidate(this,this.value,"solonide_valve_nw")', 'placeholder' => 'Not Working']) !!}

                           <!-- </div>-->

                      </div>  



                    <div class="col-sm-2 col-xs-2 fro-pro quick-coupling-values">

                    		<!--<label class="control-label col-sm-7 col-xs-7 text-right coupling-values"><b>Quick Coupling valves:</b></label>

                            <div class="col-sm-5 col-xs-5 fro-pro">-->

                                  <label class="col-sm-12 col-xs-12 loc-time"><b>Quick Coupling valves:</b></label>

                                   {!! Form::text('quick_couple_nw', old('quick_couple_nw'), ['class' => 'form-control ereq', 'onchange'=>'checknwvalvevalidate(this,this.value,"quick_couple_nw")', 'placeholder' => 'Not Working']) !!}

                           <!-- </div>-->

                      </div>

 

                      



                        <!--<div class="col-sm-3 col-xs-3 fro-pro cleaning-location">

                    		<label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Cleaning:</b></label>

                            <div class="col-sm-4 col-xs-4 fro-pro">

                                  <label class="col-sm-12 col-xs-12 loc-time">Time</label>

                                   {!! Form::text('land_clean_time', old('land_clean_time'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}

                            </div>

                            <div class="col-sm-4 col-xs-4 cleaning" style="padding-right:0px;">

                                  <label class="col-sm-12 col-xs-12">Location</label>

                                   {!! Form::text('land_clean_location', old('land_clean_location'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            </div>

                        </div>-->







                        <div class="col-sm-1 col-xs-1 fro-pro sprinkler-not-working">

                            <!-- <label class="control-label col-sm-5 col-xs-5 text-right sprinklers"><b>Sprinklers:</b></label>

                            <div class="col-sm-7 col-xs-7 fro-pro not-sprinklers">-->

                                <label class="control-label col-sm-12 col-xs-12"> <b>Sprinklers:</b></label>

                                {!! Form::text('land_clean_sprinknw', old('land_clean_sprinknw'), ['class' => 'form-control ereq number', 'id'=>'land_clean_sprinknw', 'placeholder' => 'Not Working']) !!}

                            <!--</div>-->

                         </div>


						 <div class="col-sm-12 col-xs-12" id="land_water_qty_reson_block" style="width:100%; overflow:hidden;display:none;">
                         	  <div class="col-sm-3 col-xs-3 fro-pro land-attendance">&nbsp;</div>
                              <div class="col-sm-9 col-xs-9 fro-pro land-attendance">
                              		<div style="padding-left:112px;">
                                    <textarea style="display:none;" class="form-control summernote-small" placeholder="Enter Reason" name="land_water_qty_reson" id="land_water_qty_reson"></textarea>
                                    </div>
                              </div>
						</div>


                        <div class="col-sm-3 col-xs-3 spraying-locations">

                                  <label >Lawn Mowing:</label>

                                <div class="locationmem">



                                  {!! Form::text('land_spray_location', old('land_spray_location'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}

                                  {!! Form::text('land_spray_mem', old('land_spray_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                  </div>



                            </div>















                            <div class="col-sm-3 col-xs-3 fro-pro weeding-locations">





                                  <label>Lawn Edge Cutting: </label>



								   <div class="locationmem">

                               

                                   {!! Form::text('land_Weeding_location', old('land_Weeding_location'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}



                                    {!! Form::text('land_Weeding_memcn', old('land_Weeding_memcn'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                  </div>



                            </div>



                           <div class="col-sm-3 col-xs-3 fro-pro mowing-locations">





                                  <label>Pesticide Application:</label>



								<div class="locationmem">

                                 {!! Form::text('land_mowing_location', old('land_mowing_location'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}







								 {!! Form::text('land_mowing_memcn', old('land_mowing_memcn'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}



								</div>



							



                            </div>





                             <div class="col-sm-3 col-xs-3 fro-pro application">







                                  <label> Fertilizer Application:</label>







                                 <div class="locationmem">

                                  {!! Form::text('land_application', old('land_application'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                    {!! Form::text('land_application_mem', old('land_application_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

								  



									</div>



                            </div>







                             <div class="col-sm-3 col-xs-3 mulching">







                                  <label>Manual Watering:</label>







                                <!-- {!! Form::text('land_mulching', old('land_mulching'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->







								    <div class="locationmem">

                                  

                                  {!! Form::text('land_mulching', old('land_mulching'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                    {!! Form::text('land_mulching_mem', old('land_mulching_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

								  



									</div>





                            </div>





                             <div class="col-sm-3 col-xs-3 fro-pro trimming">





                                  <label>Weeding:</label>





                           <!--  {!! Form::text('land_trimming', old('land_trimming'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->





							 <div class="locationmem">

                                  

                                  {!! Form::text('land_trimming', old('land_trimming'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                    {!! Form::text('land_trimming_mem', old('land_trimming_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

								  



									</div>

								  

                            </div>





                             <div class="col-sm-3 col-xs-3 fro-pro cutting">



                                 <label>Hoeing:</label>



 							<div class="locationmem">



                            <!--     {!! Form::text('land_cutting', old('land_cutting'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->





                                  {!! Form::text('land_cutting', old('land_cutting'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                    {!! Form::text('land_cutting_mem', old('land_cutting_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

								 

                            </div>





                            </div>







                             <div class="col-sm-3 col-xs-3 fro-pro pruning">



                                  <label>Trimming:</label>



                                <div class="locationmem">





                                 {!! Form::text('land_pruning', old('land_pruning'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                {!! Form::text('land_pruning_mem', old('land_pruning_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                </div>

								  



                            </div>





                             <div class="col-sm-3 col-xs-3  shaping">





                                  <label>Pruning:</label>





                               <!-- {!! Form::text('land_shaping', old('land_shaping'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->



                                <div class="locationmem">





                                 {!! Form::text('land_shaping', old('land_shaping'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                {!! Form::text('land_shaping_mem', old('land_shaping_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                </div>





                            </div>





                             <div class="col-sm-3 col-xs-3 fro-pro hoeing-locations">



                                  <label>Cleaning:</label>



                                <!--  {!! Form::text('land_hoeing', old('land_hoeing'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->

                                  

                                     <div class="locationmem">





                                 {!! Form::text('land_hoeing', old('land_hoeing'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                {!! Form::text('land_hoeing_mem', old('land_hoeing_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                </div>





                            </div>

                            





                            <div class="col-sm-3 col-xs-3 fro-pro garden">

                            	<label class="control-label col-sm-12 col-xs-12">Garden Waste Disposal:</label>

								<!--{!! Form::text('land_garden_waste', old('land_garden_waste'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->

                                 <div class="locationmem">

                                

                                 {!! Form::text('land_garden_waste', old('land_garden_waste'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                {!! Form::text('land_garden_waste_mem', old('land_garden_waste_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                </div>

                            </div>

                             

                             

                              <div class="col-sm-3 col-xs-3 fro-pro extra">

                            	<label class="control-label col-sm-12 col-xs-12">Extra Activities:</label>

                                 <div class="locationmem">

								<!--{!! Form::text('land_extra_activity', old('land_extra_activity'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->

                                  {!! Form::text('land_extra_activity', old('land_extra_activity'), ['class' => 'form-control ereq memcn', 'placeholder' => 'Location']) !!}





                                {!! Form::text('land_extra_activity_mem', old('land_extra_activity_mem'), ['class' => 'form-control ereq count', 'placeholder' => 'count']) !!}

                                </div>

                               

                            </div>





                             </div>



                         </div>







<!-------------------------------------------land-scaping---------------------------------------->







<!-------------------------------------------house-keeping---------------------------------------->









                            <div class="col-sm-12 col-xs-12 total-application especially-heading">







                                  <h4><span><b>House Keeping</b></span></h4>







                                </div>







                              <div class="row light-back1 house-keeping">  







                              <div class="col-sm-12 col-xs-12  fro-pro1">





                                 <div class="col-sm-3 col-xs-3 house-attendance">

                    			 	<label class="control-label col-sm-4 col-xs-4" style="margin-top:28px;"><b>Attendance:</b></label>

                            	    <div class="col-sm-4 col-xs-4 sup">

                                  	 <label for="sup">Sup</label>

                                  	 {!! Form::text('housekp_atten_sup', old('housekp_atten_sup'), ['class' => 'form-control ereq number', 'id'=>'housekp_atten_sup', 'placeholder' => '']) !!}

                            	  </div>

                                  <div class="col-sm-4 col-xs-4 helper"> 

                                    <label for="Helpers">Helper</label>

                                    {!! Form::text('housekp_atten_helper', old('housekp_atten_helper'), ['class' => 'form-control ereq number', 'id'=>'housekp_atten_helper', 'placeholder' => '']) !!}

                                </div>

                             </div>

                             <div class="col-sm-3 col-xs-3 fro-pro fogging">

                    			 	<label class="control-label col-sm-4 col-xs-4 fog"><b>Fogging:</b></label>

                            	 <div class="col-sm-4 col-xs-4 sup hrs-run">

                                  	<label for="sup" >Hrs Run</label>

									{!! Form::text('fogg_hrs_run', old('fogg_hrs_run'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}

                            	</div>

                                <div class="col-sm-4 col-xs-4 location">

                                  <label for="Helpers">Location</label>

								  {!! Form::text('fogg_location', old('fogg_location'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                              </div>

                        </div>







                        <div class="col-sm-3 col-xs-3 debris">

                                  <label class="control-label col-sm-4 col-xs-4" style="margin-top:28px;"><b>Debris:</b></label>

                                  <div class="col-sm-4 col-xs-4 no-of-trips">

                                  	<label class="col-sm-12 col-xs-12" style="padding:0px;">No. of Trips </label>

                                  	 {!! Form::text('housekp_debr_tipsnum', old('housekp_debr_tipsnum'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            	</div>

                            <div class="col-sm-4 col-xs-4 vol" style="padding-right:0px;">

                                  <label class="col-sm-12 col-xs-12" style="padding:0px;">Vol (CFT) </label>

                                   {!! Form::text('housekp_debr_vol', old('housekp_debr_vol'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}

                            </div>

                        </div>





                        <div class="col-sm-3 col-xs-3  garbage">

                            <label class="control-label col-sm-4 col-xs-4" style="margin-top:28px;"><b>Garbage:</b></label>

                            <div class="col-sm-8 col-xs-8 fro-pro out-time">

                                <label class="col-sm-12 col-xs-12">0ut Time</label>

                                {!! Form::text('housekp_debr_garbage', old('housekp_debr_garbage'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            </div>

                        </div>







                         <div class="col-sm-3 col-xs-3 thefts">

                            <label class="col-sm-12 col-xs-12">Thefts:</label>

                                 {!! Form::text('housekp_thefts', old('housekp_thefts'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                        </div>



                         <div class="col-sm-3 col-xs-3 fro-pro violations-noticed">





                            <label>Violations Noticed:</label>





                            <div class="col-sm-12 col-xs-12 fro-pro">





                                  {!! Form::text('housekp_violation_notice', old('housekp_violation_notice'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                            </div>



                        </div>







                         <div class="col-sm-3 col-xs-3 areas-inspected" style="padding-right:0px;">







                            <label>Areas Inspected:</label>







                            <div class="col-sm-12 col-xs-12 fro-pro">





                                    {!! Form::text('housekp_area_inspect', old('housekp_area_inspect'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                            </div>



                        </div>







						<div class="col-sm-3 col-xs-3 areas-inspected pest">



                            <label>Pest Control:</label>



                            <div class="col-sm-12 col-xs-12 fro-pro" style="padding-right:0px;">





                                    {!! Form::text('housekp_pest', old('housekp_pest'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                            </div>



                        </div>





                       <div class="col-sm-6 col-xs-6 pest-remark">



                            <label>Remarks:</label>



                            <div class="col-sm-12 col-xs-12 fro-pro" style="padding-right:0px;">

                                      {!! Form::text('housekp_remarks', old('housekp_remarks'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                            </div>



                        </div>

                         </div>



                  </div>



<!-------------------------------------------house-keeping---------------------------------------->



<!-------------------------------------------house-keeping---------------------------------------->
                
				
              <?php /*?> <input type="hidden" name="activitiesid" value="0" id="garbageid" />
				<div class="col-sm-12 col-xs-12 total-application especially-heading">
                  	 <h4><span><b>Garbage</b></span></h4>
                </div> 
                <div class="row light-back">
                      <div class="col-sm-12 col-xs-12 land-scaping"> 
                      	   <div class="col-sm-2 col-xs-2">
                                  Waste Type										
                             </div>
                             <div class="col-sm-1 col-xs-1">
                                  Trips										 
                             </div>
                             <div class="col-sm-1 col-xs-1">
                                 Intime								 
                             </div>  
                              <div class="col-sm-1 col-xs-1">
                                 Out time							 
                             </div>  
                              <div class="col-sm-1 col-xs-1">
                                 Vechicle no.							 
                             </div>  
                              <div class="col-sm-2 col-xs-2">
                                 Vechile Type						 
                             </div>  
                              <div class="col-sm-3 col-xs-3">
                                 Waste Disposed per trip (KG)							 
                             </div> 							
                     </div>
                     <div class="col-sm-12 col-xs-12 fro-pro land-attendance">
                         <div class="col-sm-2 col-xs-2">
                              <select name='wtype[]'  class='form-control ereq' style="width:150px;">
                                      <option value="gdwaste">Garbage - Dry Waste</option>
                                      <option value="gwwaste">Garbage - Wet Waste</option>
                                      <option value="gwaste">Green Waste</option>                                      
                                      <option value="debries">Debries</option>
                              </select>						
                         </div>
                         <div class="col-sm-1 col-xs-1">
                             {!! Form::number('trips[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                         </div>
                         <div class="col-sm-1 col-xs-1">
                              {!! Form::number('intime[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                         </div>
                         <div class="col-sm-1 col-xs-1">
                              {!! Form::number('intime[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                         </div>
                         <div class="col-sm-1 col-xs-1">
                              {!! Form::text('vno[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                         </div>
                         <div class="col-sm-2 col-xs-2">
                              {!! Form::text('vtype[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                         </div>
                         <div class="col-sm-3 col-xs-3">
                              {!! Form::number('wdisposed[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}	
                              <div style="float:right;"><a href="#" onclick="addGarbageFormField(); return false;" class="adding-more">+</a></div>								 
                         </div>
                    </div>
                    <div id="divTxtGarbage" class="col-sm-12 col-xs-12 fro-pro land-attendance"></div>   
                </div><?php */?>

<!-------------------------------------------club-house------------------------------------------->                           







                            	<div class="col-sm-12 col-xs-12 total-application especially-heading">

                                  <h4><span><b>Club House</b></span></h4>

                                </div> 

                                <div class="row light-back"> 

									  <div class="col-sm-12 col-xs-12 club-house">
		
		
		
										 <div class="col-sm-6 col-xs-6 fro-pro club-house-attendance">
		
											<label class="control-label col-sm-2 col-xs-2 front-house"><b>Attendance:</b></label>
		
										   <div class="col-sm-3 col-xs-3 sup">
		
											<label class="col-sm-12 col-xs-12">Front Office </label>
		
											 {!! Form::text('clbhous_att_frntofc', old('clbhous_att_frntofc'), ['class' => 'form-control ereq number', 'id'=>'clbhous_att_frntofc', 'placeholder' => '']) !!}
		
										  </div>
		
											<div class="col-sm-3 col-xs-3 house-keeping">
		
												  <label class="col-sm-12 col-xs-12">House Keeping</label>
		
												   {!! Form::text('clbhous_att_housekp', old('clbhous_att_housekp'), ['class' => 'form-control ereq number', 'id'=>'clbhous_att_housekp', 'placeholder' => '']) !!}
		
											</div>
		
											<div class="col-sm-2 col-xs-2 cum" style="padding-right:0px;">
		
												 <label class="col-sm-12 col-xs-12">Supervisor:</label>
		
												  {!! Form::text('supervisor', old('supervisor'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}
		
										   </div>
		
											 <div class="col-sm-2 col-xs-2 others">
		
												 <label class="col-sm-12 col-xs-12">Others</label>
		
												 {!! Form::text('clbhous_att_other', old('clbhous_att_other'), ['class' => 'form-control ereq number', 'id'=>'clbhous_att_other', 'placeholder' => '']) !!}
		
											</div>
		
										</div>
		
		
		
										 <div class="col-sm-4 col-xs-4 fro-pro revenue">
		
											<label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Revenue:</b></label>
		
											<div class="col-sm-3 col-xs-3 sup day">
		
												<label class="col-sm-12 col-xs-12">Day: </label>
		
												 {!! Form::text('clbhous_revenue_day', old('clbhous_revenue_day'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}
		
											</div>
		
											<div class="col-sm-5 col-xs-5 cum" style="padding-right:0px;">
		
												<label class="col-sm-12 col-xs-12">Commercial Activity:</label>
		
												 {!! Form::text('commercial_activate', old('commercial_activate'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
		
											</div>
		
										 </div>
		
										 
		
										 
		
											<!--<div class="col-sm-4 col-xs-4 cum" style="padding-right:0px;">
		
		
		
												<label class="col-sm-12 col-xs-12">Cum:</label>
		
		
		
		
		
												 {!! Form::text('clbhous_revenue_cum', old('clbhous_revenue_cum'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}
		
		
		
											</div>
		
		
		
										 </div>-->
		
		
		
		
		
		
		
		
		
										 <div class="col-sm-2 col-xs-2 total-application power">
		
		
		
											  <label class="control-label col-sm-5 col-xs-5 text-right" style="margin-top:35px;"><b>Power:</b></label>
		
		
		
											<div class="col-sm-7 col-xs-7 sup total-application" style="padding-right:0px;">
		
		
		
											   <label class="col-sm-12 col-xs-12" style="width:100px;">Units: </label>
		
		
		
		
		
											   {!! Form::text('clbhous_pwr_units', old('clbhous_pwr_units'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}
		
		
		
		
		
											</div>
		
		
		
		
		
		
		
									   </div>
		
		
		
		
		
		
		
										<div class="col-sm-12 col-xs-12 fro-pro no-of-users">
	
	
	
	
	
										<label class="control-label col-sm-1 col-xs-1 outline" style="width:auto;"><b>No. of Users:</b></label>
	
	
	
	
	
	
	
									 <div class="col-sm-1 col-xs-1 sup gym">
	
	
	
	
	
										<label for="sup">Gym: </label>
	
	
	
	
										 
										 {!! Form::text('clbhous_users_gym', old('clbhous_users_gym'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
									</div>
	
	
	
	
	
	
	
								<div class="col-sm-1 col-xs-1 pool">
	
	
	
	
	
									  <label for="Helpers">Pool:</label>
	
	
	
	
	
										{!! Form::text('clbhous_users_pool', old('clbhous_users_pool'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
	
								</div>
	
	
	
	
	
								 <div class="col-sm-1 col-xs-1 tennis clubtennis">
	
	
	
	
	
									  <label for="Helpers">Tennis:</label>
	
	
	
									   
									   {!! Form::text('clbhous_users_tennis', old('clbhous_users_tennis'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
								</div>
	
	
	
	
	
								 <div class="col-sm-1 col-xs-1 tennis">
	
	
	
	
	
									  <label for="Helpers">Badminton:</label>
	
	
										{!! Form::text('clbhous_shuttle', old('clbhous_shuttle'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
								</div>
								
								
								
								<div class="col-sm-1 col-xs-1 tennis">
	
	
	
	
	
									  <label for="Helpers">Basket Ball:</label>
	
	
	
	
										{!! Form::text('clbhous_basketball', old('clbhous_basketball'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
	
	
								</div>
								
								
								<div class="col-sm-1 col-xs-1 tennis">
	
	
	
	
	
									  <label for="Helpers">Skatting:</label>
	
	
	
										{!! Form::text('clbhous_skatting', old('clbhous_skatting'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
	
								</div>
	
	
								<div class="col-sm-4 col-xs-4 fro-pro club-house-remarks" style="margin-top:0px;">
	
	
	
	
	
									  <label>Remarks </label>
	
	
	
										{!! Form::text('clbhous_users_remarks', old('clbhous_users_remarks'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
	
	
	
	
	
	
								</div>
	
	
	
	
							</div>
		
		
		
		
		
		
		
		
		
								 
		
		
		
		
		
		
		
									</div>





                           </div>







<!-------------------------------------------club-house------------------------------------------->








<!-------------------------------------------club-house------------------------------------------->  

                            	<div class="col-sm-12 col-xs-12 total-application especially-heading">

                                  <h4><span><b>Equipment</b></span></h4>

                                </div> 
								<div class="row light-back"> 
									  <div class="col-sm-12 col-xs-12 club-house">
										   <label class="control-label col-sm-2 col-xs-2 front-house" 
										   style="width:100px; padding-left:10px;"><b>Ride On<br />Sweeping<br />Machine:</b></label>
		
										   <div class="col-sm-1 col-xs-1 sup" style="margin-left:5px;">
		
											<label class="col-sm-12 col-xs-12">Total </label>
                                             <?php if(isset($validres['rmachine_total']) && $validres['rmachine_total']!='null') { $att =$validres['rmachine_total']; } else { $att = ""; } ?>
										   {!! Form::text('rmachine_total', $att, ['class' => 'form-control number', 'id'=>'rmachine_total', 'placeholder' => '', 'readonly']) !!}
		
		
										  </div>
		
											<div class="col-sm-2 col-xs-2 house-keeping">
		
												  <label class="col-sm-12 col-xs-12">Location</label>
		
												   {!! Form::text('housekp_location', old('housekp_location'), ['class' => 'form-control ereq number', 'id'=>'housekp_location', 'placeholder' => '']) !!}
		
											</div>
		
											<div class="col-sm-2 col-xs-2 cum" style="padding-right:0px;">
		
												 <label class="col-sm-12 col-xs-12">Running Hrs:</label>
		
												  {!! Form::text('housekp_rideon_hrs', old('housekp_rideon_hrs'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}
		
										   </div>		
										   <div class="col-sm-2 col-xs-2 others">
		
												 <label class="col-sm-12 col-xs-12">Area Covered(SFT)</label>
		
												 {!! Form::text('ride_acovered', old('ride_acovered'), ['class' => 'form-control ereq number', 'id'=>'ride_acovered', 'placeholder' => '']) !!}
		
											</div>	
											<div class="col-sm-2 col-xs-2 others">
												&nbsp;
											</div>
		
									</div>
									<div class="col-sm-12 col-xs-12 club-house">
											   <label class="control-label col-sm-2 col-xs-2 front-house" 
											   style="width:100px; padding-left:10px;"></label>
			
											   <div class="col-sm-1 col-xs-1 sup" style="margin-left:5px;">
			
												<label>N/W</label>
			
												 {!! Form::text('ride_nw', old('ride_nw'), ['class' => 'form-control ereq number', 'id'=>'ride_nw', 'placeholder' => '', 'onchange'=>'ridenotworking()']) !!}
			
											  </div>
											  
											  <div class="col-sm-2 col-xs-2 for-margin-label ride_rText" style="display:none;">
												<label>Reason</label>
											   {!! Form::text('ride_reason', old('ride_reason'), ['class' => 'form-control number dgpumpClass', 'id'=>'ride_reason', 'placeholder' => '']) !!}
											  </div>
			
											  <div class="col-sm-2 col-xs-2 cum ride_rText" style="padding-right:0px; display:none;">
			
													 <label class="col-sm-12 col-xs-12">Spares:</label>
			
													  {!! Form::text('ride_spares', '', ['class' => 'form-control ereq number', 'placeholder' => '']) !!}
			
											   </div>	
											   <div class="col-sm-5 col-xs-5 dg-status" style="padding-top:10px;">
											   		
												  <div class="col-sm-3 col-xs-3 for-margin-label dg-auto">
														<label>Battery/Total</label>
													    <?php if(isset($validres['ride_btotal']) && $validres['ride_btotal']!='null') { $att2 =$validres['ride_btotal']; } else { $att2 = ""; } ?>
											  			{!! Form::text('ride_btotal', $att2, ['class' => 'form-control number', 'id'=>'ride_btotal', 'placeholder' => '', 'readonly']) !!}
													  </div>
													  
											   										
													<div class="col-sm-3 col-xs-3 others">
				
														 <label class="col-sm-12 col-xs-12">Bty Charing Hrs</label>
				
														 {!! Form::text('ride_chrs', old('ride_chrs'), ['class' => 'form-control ereq timepicker', 'id'=>'scrub_chrs', 'placeholder' => '']) !!}
				
													</div>	
													  <div class="col-sm-3 col-xs-3 for-margin-label dg-manual">
														<label>Battery/NW</label>
														{!! Form::number('ride_bnw', '', ['class' => 'form-control number dgpumpClass', 'id'=>'ride_bnw', 'placeholder' => '', 'onchange'=>'brnotworking()']) !!}
													  </div>
													  <div class="col-sm-3 col-xs-3 for-margin-label ride_bnrText" style="display:none;">
														<label>Reason</label>
													   {!! Form::text('ride_bnreason', old('ride_bnreason'), ['class' => 'form-control number dgpumpClass', 'id'=>'ride_bnreason', 'placeholder' => '']) !!}
													  </div>
											   </div>
			
										</div>
							    </div>
							   
							   
							    <div class="row light-back"> 
									  <div class="col-sm-12 col-xs-12 club-house">
										   <label class="control-label col-sm-2 col-xs-2 front-house" 
										   style="width:100px; padding-left:10px;"><b>Scrubbing<br />Machine:</b></label>
		
										   <div class="col-sm-1 col-xs-1 sup" style="margin-left:5px;">
		
											<label class="col-sm-12 col-xs-12">Total </label>
											 <?php if(isset($validres['smachine_total']) && $validres['smachine_total']!='null') { $att1 =$validres['smachine_total']; } else { $att1 = ""; } ?>
											  {!! Form::text('smachine_total', $att1, ['class' => 'form-control number', 'id'=>'smachine_total', 'placeholder' => '', 'readonly']) !!}
											
		
										  </div>
		
											<div class="col-sm-2 col-xs-2 house-keeping">
		
												  <label class="col-sm-12 col-xs-12">Location</label>
		
												   {!! Form::text('scrub_location', old('scrub_location'), ['class' => 'form-control ereq number', 'id'=>'scrub_location', 'placeholder' => '']) !!}
		
											</div>
		
											<div class="col-sm-2 col-xs-2 cum" style="padding-right:0px;">
		
												 <label class="col-sm-12 col-xs-12">Running Hrs:</label>
		
												  {!! Form::text('scrub_hrs_run', old('scrub_hrs_run'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}
		
										   </div>		
										   <div class="col-sm-2 col-xs-2 others">
		
												 <label class="col-sm-12 col-xs-12">Area Covered(SFT)</label>
		
												 {!! Form::text('scrub_acovered', old('scrub_acovered'), ['class' => 'form-control ereq number', 'id'=>'scrub_acovered', 'placeholder' => '']) !!}
		
											</div>											
											<div class="col-sm-2 col-xs-2 others">
												&nbsp;
											</div>
											<div class="col-sm-2 col-xs-2 others">
												&nbsp;
											</div>
		
									</div>
										<div class="col-sm-12 col-xs-12 club-house">
											   <label class="control-label col-sm-2 col-xs-2 front-house" 
											   style="width:100px; padding-left:10px;"></label>
			
											   <div class="col-sm-1 col-xs-1 sup" style="margin-left:5px;">
			
												<label>N/W</label>
			
												 {!! Form::text('scrub_nw', old('scrub_nw'), ['class' => 'form-control ereq number', 'id'=>'scrub_nw', 'placeholder' => '', 'onchange'=>'scrubnotworking()']) !!}
			
											  </div>
											  
											  <div class="col-sm-2 col-xs-2 for-margin-label scrub_rText" style="display:none;">
												<label>Reason</label>
											   {!! Form::text('scrub_reason', old('scrub_reason'), ['class' => 'form-control number dgpumpClass', 'id'=>'scrub_reason', 'placeholder' => '']) !!}
											  </div>
			
											  <div class="col-sm-2 col-xs-2 cum scrub_rText" style="padding-right:0px;display:none;">
			
													 <label class="col-sm-12 col-xs-12">Spares:</label>
			
													  {!! Form::text('scrub_spares', '', ['class' => 'form-control ereq number', 'placeholder' => '']) !!}
			
											   </div>		
											   <div class="col-sm-5 col-xs-5 dg-status scrub_rText" style="padding-top:10px;display:none;">
												  	&nbsp;
											   </div>
			
										</div>
							   </div>





<!-------------------------------------------club-house------------------------------------------->




<!-------------------------------------------apna-complex(apms)------------------------------------>









                            <div class="col-sm-12 col-xs-12 especially-heading">





                                <h4><span><b>Apna Complex (APMS )</b></span></h4>







                            </div>





                            <div class="row light-back1">





                            <div class="col-sm-12 col-xs-12 apna-complex">







                                 <!-- <div class="col-sm-10 col-xs-10">-->







                                  <div class="col-sm-1 col-xs-1 for-margin-label complex-previous">







                                      	<label style="margin-bottom:5px;">Previous </label>





                                        {!! Form::text('apna_apms_previous', $pending_apna_apms, ['class' => 'form-control ereq number','id'=>'apna_apms_previous', 'placeholder' => '']) !!}





                                      </div>





                                      <div class="col-sm-2 col-xs-2 for-margin-label complax-help-desk">





                                      	<label style="margin-bottom:5px;">Opened </label>





                                        {!! Form::text('apna_apms_opened_help', old('apna_apms_opened_help'), ['class' => 'form-control ereq number', 'id' =>'apna_apms_opened_help', 'onchange' =>'getvalidsum()' ,'placeholder' => 'Help Desk']) !!}



                                      </div>



                                      <div class="col-sm-1 col-xs-1 for-margin-label complex-login">







                                      	<label style="margin-bottom:5px;">Opened</label>







                                         {!! Form::text('apna_apms_opened_login', old('apna_apms_opened_login'), ['class' => 'form-control ereq number', 'id' =>'apna_apms_opened_login', 'onchange' =>'getvalidsum()' ,'placeholder' => 'Login']) !!}







                                      </div>





                                      <div class="col-sm-2 col-xs-2 for-margin-label complex-total">



                                      	<label style="margin-bottom:5px;">Opened</label>





                          {!! Form::text('apna_apms_opened_total', old('apna_apms_opened_total'), ['class' => 'form-control ereq number', 'id' => 'apna_apms_opened_total', 'placeholder' => 'Total','readonly' => 'true']) !!}







                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label complex-resolved">





                                      	<label style="margin-bottom:5px;"> Resolved</label>







                                        {!! Form::text('apna_apms_resolved', old('apna_apms_resolved'), ['class' => 'form-control ereq number', 'id'=>'apna_apms_resolved', 'onchange'=>'apmsresol()', 'placeholder' => '']) !!}





                                      </div>







                                      <div class="col-sm-2 col-xs-2 for-margin-label complex-pending">







                                      	<label style="margin-bottom:5px;">Pending </label>





                                        {!! Form::text('apna_apms_pending', old('apna_apms_pending'), ['class' => 'form-control ereq number', 'id'=>'apna_apms_pending', 'readonly' => 'true', 'placeholder' => '']) !!}



                                      </div>





                             <!--</div>-->





                             <div class="col-sm-6 col-xs-6 fro-pro complex-remarks">







                                  <label>Remarks </label>





                                  {!! Form::text('apna_apms_remarks', old('apna_apms_remarks'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                               </div>



                           </div>





                           </div>    







<!-------------------------------------------apna-complex(apms)------------------------------------>







<!-------------------------------------------apna-complex(project)---------------------------------->





                            <div class="col-sm-12 col-xs-12 especially-heading">







                                <h4><span><b>Apna Complex (Project)</b></span></h4>



                            </div>





                            <div class="row light-back">



                             <div class="col-sm-12 col-xs-12 apna-project">





                                  <!--<div class="col-sm-10 col-xs-10">-->





                                  <div class="col-sm-1 col-xs-1 for-margin-label previous">





                                      	<label style="margin-bottom:5px;">Previous </label>





                                         {!! Form::text('apna_project_previous', $pending_apna_project, ['class' => 'form-control ereq number', 'id'=>'apna_project_previous', 'placeholder' => '']) !!}





                                      </div>







                                      <div class="col-sm-3 col-xs-3 for-margin-label">





                                      	<label style="margin-bottom:5px;">Opened</label>



                                        {!! Form::text('apna_project_opened_help', old('apna_project_opened_help'), ['class' => 'form-control ereq number', 'id' =>'apna_project_opened_help', 'onchange' =>'getvalidsumpro()', 'placeholder' => 'Help Desk']) !!}





                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label project-login">



                                      	<label style="margin-bottom:5px;">Opened</label>





                                        {!! Form::text('apna_project_opened_login', old('apna_project_opened_login'), ['class' => 'form-control ereq number', 'id' =>'apna_project_opened_login', 'onchange' =>'getvalidsumpro()', 'placeholder' => 'Login']) !!}





                                      </div>





                                      <div class="col-sm-2 col-xs-2 for-margin-label project-total">







                                      	<label style="margin-bottom:5px;">Opened</label>





                                         {!! Form::text('apna_project_opened_total', old('apna_project_opened_total'), ['class' => 'form-control ereq number', 'id' => 'apna_project_opened_total','placeholder' => 'Total','readonly' => 'true']) !!}









                                      </div>







                                      <div class="col-sm-2 col-xs-2 for-margin-label project-resolved">





                                      	<label style="margin-bottom:5px;"> Resolved</label>





                                        {!! Form::text('apna_project_resolved',  old('apna_project_resolved'), ['class' => 'form-control ereq number', 'id'=>'apna_project_resolved', 'onchange'=>'proresol()', 'onchange'=>'proresol()', 'placeholder' => '']) !!}





                                      </div>







                                      <div class="col-sm-2 col-xs-2 for-margin-label project-pending">







                                      	<label style="margin-bottom:5px;">Pending </label>







                                        {!! Form::text('apna_project_pending', old('apna_project_pending'), ['class' => 'form-control ereq number', 'id'=>'apna_project_pending', 'placeholder' => '','readonly' => 'true']) !!}







                                      </div>





                              <!--</div>-->





                             <div class="col-sm-6 col-xs-6 fro-pro project-remarks">





                                  <label>Remarks </label>







                                   {!! Form::text('apna_project_remarks', old('apna_project_remarks'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}







                               </div>







                            </div>





                            </div>







<!-------------------------------------------apna-complex(project)---------------------------------->



<!-------------------------------------------occupancy---------------------------------------------->



                             <div class="col-sm-12 col-xs-12 especially-heading">







                               <h4><span><b>Occupancy</b></span></h4>



                            </div>





                            <div class="row light-back1">





                             <div class="col-sm-12 col-xs-12 owners">





                            <div class="col-sm-2 col-xs-2 occupancy-moved-in">







                                  <h6><b>Moved in</b></h6>







                                      <div class="col-sm-6 col-xs-6 sup especially-heading">



                                  		<label style="font-size:12px;margin-bottom:0px;">Owners </label>







                                  		 {!! Form::text('occupancy_move_owners', old('occupancy_move_owners'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}





                            		</div>









                                      <div class="col-sm-6 col-xs-6 for-margin-label">





                                      	<label>Tenants </label>





                                         {!! Form::text('occupancy_move_tenants', old('occupancy_move_tenants'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                                      </div>



                                </div>







                                <div class="col-sm-2 col-xs-2 fro-pro occupancy-vacated">





                                  <h6><b>Vacated</b></h6>





                                  <div class="col-sm-6 col-xs-6 for-margin-label especially-heading">





                                      	<label>Owners</label>







                                         {!! Form::text('occupancy_vacated_owners', old('occupancy_vacated_owners'), ['class' => 'form-control ereq number', 'placeholder' => '']) !!}





                                      </div>





                                      <div class="col-sm-6 col-xs-6 for-margin-label">



                                      	<label>Tenants </label>





                                        {!! Form::text('occupancy_vacated_tenants', old('occupancy_vacated_tenants'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                                      </div>



                                </div>







                            <div class="col-sm-3 col-xs-3 fro-pro occupancy-as-on-date">



                                  <h6><b>Occupancy as on Date</b></h6>



                                  <div class="col-sm-4 col-xs-4 for-margin-label especially-heading">

									    <input type="hidden" name="flats" id="flats" value="<?php echo $flats; ?>" />

                                      	<label>Owners</label>





                                        {!! Form::text('occupancy_asdate_owners', old('occupancy_asdate_owners'), ['class' => 'form-control ereq number', 'placeholder' => '', 'onchange'=>'checkodate()']) !!}



                                      </div>





                                      <div class="col-sm-4 col-xs-4 for-margin-label tenants">





                                      	<label>Tenants </label>



                                         {!! Form::text('occupancy_asdate_tenants', old('occupancy_asdate_tenants'), ['class' => 'form-control ereq number', 'placeholder' => '',  'onchange'=>'checkodate()']) !!}





                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label vacant">





                                      	<label>Vacant </label>





                                         {!! Form::text('occupancy_asdate_vacant', old('occupancy_asdate_vacant'), ['class' => 'form-control ereq number', 'placeholder' => '',  'onchange'=>'checkodate()']) !!}





                                      </div>





                                </div>









                                 <div class="col-sm-5 col-xs-5 fro-pro occupancy-remarks">







                                  <h6><b>Remarks </b></h6>



                                  <div class="nbsp">&nbsp;</div>





                                    {!! Form::text('occupancy_asdate_remarks', old('occupancy_asdate_remarks'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                            </div>



                          </div>



                       </div>





<!-------------------------------------------occupancy---------------------------------------------->



<!-------------------------------------------imprest---------------------------------------------->                            



                             <div class="col-sm-12 col-xs-12 especially-heading">





                               <h4><span><b>Imprest</b></span></h4>





                            </div>





                            <div class="row light-back">





                                  <div class="col-sm-12 col-xs-12 imprest">



                                <div class="col-sm-2 col-xs-2 cash-on-hand">







                                  <label class="control-label col-sm-12" for="pwd">Cash on Hand (<i class="fa fa-inr" aria-hidden="true"></i>)</label>







								    {!! Form::text('imprest_cash_on_hand', old('imprest_cash_on_hand'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                                </div>







                                <div class="col-sm-2 col-xs-2 fro-pro2 bills-on-hands">







                                  <label class="control-label col-sm-12" for="pwd">Bills on Hand (<i class="fa fa-inr" aria-hidden="true"></i>)</label>







                                   {!! Form::text('imprest_bills_on_hand', old('imprest_bills_on_hand'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                               </div> 



                             <div class="col-sm-2 col-xs-2 fro-pro1 date-of-statement">





                                  <label class="control-label col-sm-12" for="email">Date of Statement Sent</label>





                                  <!-- {!! Form::text('imprest_dateof_statement', old('imprest_dateof_statement'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->







								   <?php  $dateval = date("d-m-Y"); ?>







								   <input type="text" name="imprest_dateof_statement" id="imprest_dateof_statement" value="<?php echo $dateval; ?>" class="form-control">





                                </div>





                                 <div class="col-sm-1 col-xs-1 amount">



                                 	  <label class="control-label col-sm-12">Amount</label>



                                      <!--<input type="text" class="form-control"  />-->



									   {!! Form::text('dateof_statement_amount', old('dateof_statement_amount'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}



                                 </div>

								 

								 

								  <div class="col-sm-2 col-xs-2 fro-pro1 date-of-statement">





                                  <label class="control-label col-sm-12" for="email">Date of Statement Sent</label>





                                  <!-- {!! Form::text('imprest_dateof_statement', old('imprest_dateof_statement'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}-->







								   <?php  $dateval = date("d-m-Y"); ?>







								   <input type="text" name="imprest_dateof_statement_2" id="imprest_dateof_statement_2" value="<?php echo $dateval; ?>" class="form-control">





                                </div>



 



                                 <div class="col-sm-1 col-xs-1 amount">



                                 	  <label class="control-label col-sm-12">Amount</label> 



                                      <!--<input type="text" class="form-control"  />-->



									   {!! Form::text('dateof_statement_amount_2', old('dateof_statement_amount_2'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}



                                 </div>



                                </div>





                                </div>







<!-------------------------------------------imprest---------------------------------------------->  

<!-------------------------------------------gas-------------------------------------------------->  





                                <div class="col-sm-12 col-xs-12 especially-heading">







                                <h4><span><b>Gas</b></span></h4>







                            </div>









                            <div class="row light-back1">





                                  <div class="col-sm-12 col-xs-12 gas">





                                   <h6><b>Transaction Supervised by</b></h6>





                                <div class="col-sm-2 col-xs-2 transaction-by">





                                  <label class="control-label col-sm-12" for="pwd">APMS</label>







                                  {!! Form::text('gas_transact_supervise_by', old('gas_transact_supervise_by'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}



                                </div>





								<div class="col-sm-1 col-xs-1 transaction-by society">





                                  <label class="control-label col-sm-12" for="pwd">Society</label>





                                  {!! Form::text('gas_transact_socity', old('gas_transact_socity'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}





                                </div>





								<div class="col-sm-1 col-xs-1 transaction-by security">







                                  <label class="control-label col-sm-12" for="pwd">Security</label>



                                  {!! Form::text('gas_transact_security', old('gas_transact_security'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}



                                </div>







                                <div class="col-sm-2 col-xs-2 fro-pro2 full-cycle">







                                  <label class="control-label col-sm-12" for="pwd">Full Cyl. Recd</label>





                                   {!! Form::text('gas_transact_full_cyl_recd', old('gas_transact_full_cyl_recd'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}



                               </div> 









                             <div class="col-sm-2 col-xs-2 fro-pro1 empty-cycle">

                                  <label class="control-label col-sm-12" for="email">Empty Cyl. Taken Out</label>

                                   {!! Form::text('gas_empty_cyl_taken_out', old('gas_empty_cyl_taken_out'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                             </div>

                         </div>

                     </div>

<!-------------------------------------------gas-------------------------------------------------->  

<!-------------------------------------------information------------------------------------------>                                  

                                 <div class="col-sm-12 col-xs-12 especially-heading">

                                <h4><span><b>Information</b></span></h4>

                            </div>

                                <div class="row light-back">

                                 <div class="col-sm-12 col-xs-12">

                                <div class="col-sm-12 information">

                                	 <div class="col-sm-2 col-xs-2 fro-pro attendance-verified">

                                  <label class="control-label col-sm-12" for="pwd">Attendance Verified</label>

								   	<select name="info_attend_verified" class="irrigation">

                                            	<option value="Yes">Yes</option>

                                                <option value="No">No</option>

                                            </select>

                                </div>

                                <div class="col-sm-2 col-xs-2 fro-pro2 data-sheet-pending">

                                  <label class="control-label col-sm-12" for="pwd">Data Sheets Pending</label>

                                    {!! Form::text('info_attend_datesheet_pend', old('info_attend_datesheet_pend'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                               </div> 

                             <div class="col-sm-2 col-xs-2 fro-pro1 parking-display">

                                  <label class="control-label col-sm-12" for="email">Parking Display Pending</label>

                                    {!! Form::text('info_parking_display', old('info_parking_display'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                                </div>

                                </div>

                            </div>

                            </div>

<!-------------------------------------------information------------------------------------------>  

<!-------------------------------------------jon-pending------------------------------------------>                             

                            <div class="col-sm-12 col-xs-12 especially-heading">

                            	<h4><span><b>Jobs Pending:</b></span></h4>

                            </div>

                              <div class="row light-back1">

                                 <div class="col-sm-12 col-xs-12">

                                 	<div class="col-sm-12 col-xs-12 job-pending">

                                		 {!! Form::text('jobs_pending', old('jobs_pending'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                                    </div>

                                </div>

                             </div>

<!-------------------------------------------jon-pending------------------------------------------> 

<!-------------------------------------------communication-with-----------------------------------> 

                             <div class="col-sm-12 col-xs-12 especially-heading">

                            	<h4><span><b>Communication with MC:</b></span></h4>

                             </div>

                             <div class="row light-back">

                                 <div class="col-sm-12 col-xs-12 ">

                                 	<div class="col-sm-12 col-xs-12 communication">

                                		 {!! Form::text('comminication_with_mc', old('comminication_with_mc'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}

                                    </div>

                                </div>

                            </div>

<!-------------------------------------------communication-with-----------------------------------> 

<!-------------------------------------------additional-information-------------------------------> 

                            <div class="col-sm-12 col-xs-12 especially-heading">

                            	<h4><span><b>Additional Information:</b></span></h4>

                             </div>

                             <div class="additional-information">

                            	<!--<label>Additional Information:</label><br/><br/> -->                    

<textarea class="form-control summernote-small" placeholder="Enter Description" name="reasontext" cols="50" rows="10" id="reasontext"></textarea>

                                      <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span class="i-confirmed">I Confirmed all the data entered was correct</span>

                                      </div>

                            <div class="col-sm-12 col-xs-12 submit-button pme-sunmit">

                            	{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}

								{!! Form::close() !!}

                            </div>

<!-------------------------------------------additional-information------------------------------->

                    </form>

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












function checkodate()
{
	var flats = $("#flats").val();
	var owners = $("input[name=occupancy_asdate_owners]").val();
	var tenants = $("input[name=occupancy_asdate_tenants]").val();
	var vacant = $("input[name=occupancy_asdate_vacant]").val();
	console.log("Owners:"+owners);
	console.log("Tenants:"+tenants);
	console.log("Vacant:"+vacant);
	if(owners!="" && tenants!="" && vacant!="")
	{
		var alltotals = parseInt(owners)+parseInt(tenants)+parseInt(vacant);
		console.log(alltotals);
		console.log(flats);
		if(alltotals>flats)
		{
			$("input[name = 'occupancy_asdate_owners']").css("border","2px solid red");
			$("input[name = 'occupancy_asdate_tenants']").css("border","2px solid red");
			$("input[name = 'occupancy_asdate_vacant']").css("border","2px solid red");
		}
		else
		{
			$("input[name = 'occupancy_asdate_owners']").css("border","1px solid #000");
			$("input[name = 'occupancy_asdate_tenants']").css("border","1px solid #000");
			$("input[name = 'occupancy_asdate_vacant']").css("border","1px solid #000");
		}
	}
}






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


	$('.land_water_qty').change(function(){
		var qty = $(".land_water_qty").val();
		if(qty==0)
		{
			$("#land_water_qty_reson_block").show();
			$("#land_water_qty_reson").show();
		}
		else
		{
			$("#land_water_qty_reson_block").hide();
			$("#land_water_qty_reson").hide();
		}
	});

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
 <?php if(pstatus()){ ?> minDate: "-3", <?php } ?>
 maxDate: '-1',















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







				//alert(msg);







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


	$( ".number" ).each(function() {
			if(($( this ).val().length <= 0))
			{
				//$(this).addClass("numerror");
			}
			else
			{
				if(isNaN($( this ).val()))
				{
					flag = false;
					$(this).addClass("numerror");
				}
				else
				{
					$(this).removeClass("numerror"); 
				}
			}
	});  

	// Name can't be blank
	var flag = true;
	$("input.ereq").each(function(){
		var s = $(this).attr('name');
		console.log("One"+s);
        if (($(this).val())== "" && ($(this).attr('name')!="files")){
			  var link_name = $(this).attr('name');
    		  if(s=="undefined") $(this).addClass("ssssserror");
			  else $(this).removeClass("ssssserror");
              $(this).addClass("error");
              flag = false;
        }
        else
		{
			console.log("Three"+s);
            $(this).removeClass("error");
			flag = true;
        }
      
    });
	
	
	
	/*if ($('input:checkbox', this).is(':checked') &&
        $('input:radio', this).is(':checked')) {
        $(this).removeClass("error");
		flag = true;
    } else {
        $(this).addClass("error");
        flag = false;
    }*/
	
	
	
	if(flag==false) { 
		alert("All Fields Required");
		$("html, body").animate({ scrollTop: 0 }, "slow");
 		return false;
	}
	else {
		if ($('.confirmed:checked').length == 0) {  
			alert("Please Confirm data entered was correct");
		    return false;
		}
		else return true;
	}
	
	







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







	





	

 }

 

 

 function getvalidsum (){

 

    var apna_apms_opened_help = 0;



	var apna_apms_opened_login = 0;



    if($("#apna_apms_opened_help").val() == ""){}else{ apna_apms_opened_help = $("#apna_apms_opened_help").val()}



	if($("#apna_apms_opened_login").val() == ""){}else{ apna_apms_opened_login = $("#apna_apms_opened_login").val()}





	var apna_apms_opened_total = parseFloat(apna_apms_opened_help) +  parseFloat(apna_apms_opened_login);



	$("#apna_apms_opened_total").val(apna_apms_opened_total);

 

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

 

  function getvalidsumpro (){

  

  

   var apna_project_opened_help = 0;



	var apna_project_opened_login = 0;

	

	var apna_project_opened_total = 0;



    if($("#apna_project_opened_help").val() == ""){}else{ apna_project_opened_help = $("#apna_project_opened_help").val()}



	if($("#apna_project_opened_login").val() == ""){}else{ apna_project_opened_login = $("#apna_project_opened_login").val()}





	var apna_project_opened_total = parseFloat(apna_project_opened_help) +  parseFloat(apna_project_opened_login);



	$("#apna_project_opened_total").val(apna_project_opened_total);

  

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

 	/*function addGarbageFormField() {
		var id = document.getElementById("garbageid").value;
		var lid = parseInt(id) + 1;
		$("#divTxtGarbage").append('<div class="col-sm-12 col-xs-12 fro-pro land-attendance" id="mrow"+id><div class="col-sm-2 col-xs-2"><select name="wtype[]"  class="form-control ereq" style="width:150px;"><option value="gdwaste">Garbage - Dry Waste</option><option value="gwwaste">Garbage - Wet Waste</option><option value="gwaste">Green Waste</option> <option value="debries">Debries</option></select></div><div class="col-sm-1 col-xs-1"><input class="form-control" placeholder="" name="trips[]" type="number" value=""></div><div class="col-sm-1 col-xs-1"><input class="form-control" placeholder="" name="intime[]" type="number" value=""></div><div class="col-sm-1 col-xs-1"><input class="form-control" placeholder="" name="intime[]" type="number" value=""></div><div class="col-sm-1 col-xs-1"><input class="form-control" placeholder="" name="vno[]" type="text" value=""></div><div class="col-sm-2 col-xs-2"><input class="form-control" placeholder="" name="vtype[]" type="text" value=""></div><div class="col-sm-3 col-xs-3"><input class="form-control" placeholder="" name="wdisposed[]" type="number" value=""><div style="float:right;"><a href="#" onClick="removeGarbageFormField("mrow"+id+""); return false;" class="remove removerla">X</a></div></div>');
		id = parseInt(id) + 1;
		console.log('id: ', id);
		document.getElementById("garbageid").value = id;	
	
	} 
	
	
	function removeGarbageFormField(id) 
	{
	
		$(id).remove(); 
	
		var id = document.getElementById("garbageid").value;
	
		id = (id - 1);
	
		document.getElementById("garbageid").value = id;
	
	}
*/
 

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

 function ridenotworking()
 {
	var k = $("#ride_nw").val();
	if(k>0) $(".ride_rText").show();
	else $(".ride_rText").hide();
 } 
 
 function scrubnotworking()
 {
	var k = $("#scrub_nw").val();
	if(k>0) $(".scrub_rText").show();
	else $(".scrub_rText").hide();
 } 
 function brnotworking()
 {
	var k = $("#ride_bnw").val();
	if(k>0) $(".ride_bnrText").show();
	else $(".ride_bnrText").hide();
 }


 



  </script> 	

  @include('partials.footer')



@stop