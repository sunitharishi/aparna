@extends('layouts.appnew')



@section('content')


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  




    <!-- Custom Theme Style -->



  <!--  <link href="/build/css/custom.css" rel="stylesheet">-->

	<link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">



    <style>

.numerror
{
	border-color: red !important;
	border-width: 1.5px !important;
}
.x_title h3
{
 color:#31859c;
}
.x_title span
{
 color:#31859c;
 font-size:20px;
}
label
{
 font-weight:100;
}
h5
{
 margin-bottom: 10px;
 margin-top: 26px;
}
.submit-button input[type="submit"]
{
background-color: #F3565D;
    padding: 8px 25px;
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
.especially-heading textarea
{
 width:100%;
 overflow-y:auto;
 overflow-x:hidden;
 border:1px solid #000;
}
.especially-heading1 textarea
{
 width:100%;
 overflow-y:auto;
 overflow-x:hidden;
 border:1px solid #000;
}
.for-labelling label
{
 margin-top:7px;
 padding-left:0px;
 padding-right:0px;
}
.fro-pro
{
 padding-left:0px !important;
 margin-bottom:10px;
}
.fro-pro1, .fro-pro2
{ 
 margin-bottom:10px;
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
.for-spacing
{
 margin-top:20px !important;
}
.irrigation
{
 width: 100%;
    height: 33px;
	border:1px solid #000;
}
.irrigation1
{
 width: 30%;
    height: 33px;
	border:1px solid #000;
}
.solar
{
 width: 44%;
    height: 33px;
	border:1px solid #000;
}
.daily select
{
 width:100%;
 height:30px
}
.briefying
{
 padding-left:0px !important;
}
.especially-heading textarea
{
 margin-top:20px;
 margin-bottom:10px;
}
.especially-heading1 textarea
{
 margin-top:20px;



 margin-bottom:10px;



}



.fro-pro ul



{



 list-style:none;



 padding-left:10px;



}



.for-list ul li input[type="checkbox"]



{



 margin-right:6px;



}



.fro-pro ul li



{



 line-height:20px;



}



.briefying select
{
 width:100%;
 height:33px;
 border:1px solid #000;
}
.for-list ul
{
 list-style:none;
 padding-left:0px;
}
.note-editor
{
 margin-bottom:5px;
}
.fro-pro-check
{
 padding-left:0px !important;
 margin-top:10px;
}
.for-height
{
 height:32px;
}
.for-violations
{
 padding-top:10px;
}
label
{
 font-weight:400;
}
.for-labelling input
{
 border:1px solid #000;
}
.light-back
{
background-color:#ffc10724;
}
.light-back textarea
{
 border:1px solid #000;
}
.light-back1 textarea
{
 border:1px solid #000;
}
.light-text-align label
{
 text-align:right;
 padding-right:6px;
}
.light-back1
{
background-color:#f9f7f7;
}
.text-left 
{
 text-align:left !important;
}
.for-line-label label
{
 line-height: 14px;
 height: 14px;
}
.fro-pro textarea
{
 width:100%;
 resize:none;
 overflow-y:auto;
 overflow-x:hidden;
 border:1px solid #000;
}
.row
{
 clear:both;
}
.pump-status .pumps
{
 padding-left:15px;
}
.pump-status .swp
{
 line-height:27px;
 margin-top:18px;
}
.pump-status .dewatering, .pump-status .oozing, .pump-status .rain-water
{
 line-height:25px;
 margin-top:18px;
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
.awc
{
 padding-left:0px;
 padding-right:0px;
}
.awc h4 span
{
 padding-left:21px;
}
.discussed
{
 padding-left:0px;
 padding-right:0px;
}
.discussed h4 span
{
 padding-left:21px;
}
.x_content 
{
margin-bottom:10%;
}
.swp, .dewatering, .oozing, .rain-water
{
     line-height: 20px;
    height: 22px;
    margin-top: 20px !important;
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
.other-services .water-bodies2 .water
{
 padding-left:20px;
 padding-right:10px;
}
.other-services .swimming-pool-2 .swimmimg
{
 padding-right:10px;
}
.reviews .critically input[type="text"]
{
 margin:27px 0px;
}
.awc .hod-meeting input[type="text"]
{
 margin:15px 0px;
}
.discussed .vists input[type="text"]
{
 margin:15px 0px;
}
.awc .maintenance input[type="text"]
{
 margin:15px 0px;
}
.discussed .break-sown input[type="text"]
{
 margin:15px 0px;
}
.any-communication input[type="text"]
{
 margin:15px 0px;
}
.ph-chlorine .poool
{
 padding-left:10px;
}
.awc .maintenance
{
 padding-left:6px;
}
.awc .hod-meeting
{
 padding-left:6px;
}
.any-communication
{
 padding-left:6px;
}
.reviews
{
 padding-left:6px;
}
.other-services .water-bodies .bodies
{
 padding-left:24px;
}
.other-services .fro-pro.solar-fencing
{
 margin-bottom:15px;
}
.additional-information
{
 clear:both;
}
.bore-wells .borewells
{
 margin-top:24px;
}
@media only screen and (max-width:1366px)
{
.for-response 
{
 font-size:10px !important;
}
}

	</style>
    <div class="body">



      <div class="main_container">



     <?php /*?> <?php include "header.php"; ?><?php */?>



        <!-- /top navigation -->



     



        <!-- page content -->



        <div class="right_col" role="main">



          <div class="models reposive-security">

<h3>TEST ADD FILE </h3>

<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

									$sitevv = $uriSegments[2];  ?>

			
                <?php if($uriSegments[1] == 'getdailyreportdetaildate') { ?>
              <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>
              <?php }else { ?>
			 <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[4];  ?>">Back</a></div> <?php } ?>

           



            <div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">



                <div class="x_panel">



                  <div class="x_title">



                     <span class="col-sm-12 col-xs-12">FMS Daily Report </span>



                    <!-- <div class="col-sm-4 col-xs-4" style="text-align:right;font-size:16px;">Date: <span style="color:#e61318;font-size:16px;"><b>24-01-2018 , </b></span>Time: <span style="color:#e61318;font-size:16px;"><b>06:28Am</b></span></div>-->



                  </div>



                  <div class="x_content fms-dailyreport">

				  <div class="errormsgval" style="display:none" id="errorblk" >

				 

                  <p id="ermsg"></p>

				  <p id="ermsg_residents"></p>

				  <p id="ermsg_club_hs"></p>

				  <p id="ermsg_stp"></p>

				  <p id="ermsg_wsp"></p>

				  <p id="ermsg_lifts"></p>

				  <p id="ermsg_vendor"></p>

				  <p id="ermsg_com_area"></p>

				  <p id="ermsg_metro"></p>

				  <p id="ermsg_avg_tw"></p>

				  <p id="ermsg_swim_ph"></p>

				   <p id="ermsg_wb_ph"></p>

				   <p id="ermsg_tot_water"></p>

				   

				   <p id="ermsg_borewells"></p>

				  <p id="ermsg_lifts"></p>

				   <p id="ermsg_gascy"></p>

				   <p id="ermsg_dgsets"></p>

				  </div>

 

                    	<div class="col-sm-12 col-xs-12 especially-heading">



                        	<h4><span><b>Power Consumption</b></span></h4>



                        </div>



                        {!! Form::open(['method' => 'POST', 'route' => ['dailyreports.store'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}

						

						



						



						<?php 


									//echo "<pre>"; print_r($res); echo "</pre>";



									



									if(isset($uriSegments[3])){



									  if($uriSegments[1] == 'getdailyreportdetaildate') {$date =$uriSegments[3];} else   {$date = $uriSegments[4];}


 
									}elseif($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];} else{



									// $date = date("d-m-Y"); 
									 $dateval = date('Y-m-d');
									 $date =  date('d-m-Y', strtotime($dateval .' -1 day'));



									}  if($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];}   

									

									//$rval = checkFmsdailyStatus($site, ,$date); 

									//echo "<pre>";echo "</pre>"



								 ?>



								<div class="aparnaaura">	<span class="text"><?php echo get_sitename($sitevv);?>



						</span>



						 <span class="box"><input type="text" name="reporton" id="example1" value="<?php echo $date; ?>" class="hasDatePicker form-control"></span> </div>



                         <input type="hidden" name="user_id" value="<?php  echo Auth::user()->id; ?>">



						 <input type="hidden" name="site" value="<?php echo $sitevv ?>" id="site_val">

<!---------------------------------------------------power-consumption---------------------------------------------->



                        <div class="row light-back"> 



                        <div class="col-sm-12 power-consumption"> 



                        	<div class="col-sm-1 col-xs-1 ctpt">



                                  <label class="control-label col-sm-4" for="email">CTPT</label>



								  {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control required number', 'id' =>'pwrctpt', 'placeholder' => '']) !!}



                                </div>



                                <div class="col-sm-1 col-xs-1 fro-pro total-lt">



                                  <label class="control-label col-sm-12" for="pwd">Total LT</label>



                                  {!! Form::text('pwr_tot_lt', old('pwr_tot_lt'), ['class' => 'form-control required number', 'id' =>'pwrtotlt', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro losses">



                                  <label class="control-label col-sm-4" for="pwd">Losses</label>



                                   {!! Form::text('pwr_lossec', old('pwr_lossec'), ['class' => 'form-control required number', 'id' =>'pwrloss', 'placeholder' => '','readonly']) !!}



                               </div> 



                               



                               <div class="col-sm-1 col-xs-1 fro-pro Residents">



                                  <label class="control-label col-sm-4" for="email">Residents</label>



                                   {!! Form::text('pwr_residents', old('pwr_residents'), ['class' => 'form-control required number', 'id' =>'pwr_residents', 'placeholder' => '']) !!}



                                </div>



                                

    

                                <div class="col-sm-1 col-xs-1 fro-pro club-house houses">



                                  <label class="control-label col-sm-4" for="pwd">Club House</label>



                                    {!! Form::text('pwr_club_house', old('pwr_club_house'), ['class' => 'form-control required number', 'id'=>'pwr_club_house', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro stp">



                                  <label class="control-label col-sm-4" for="pwd">STP</label>



                                  {!! Form::text('pwr_stp', old('pwr_stp'), ['class' => 'form-control number', 'id'=>'pwr_stp', 'placeholder' => '']) !!}



                               </div> 



                            



                             <div class="col-sm-1 col-xs-1 fro-pro wsp">



                                  <label class="control-label col-sm-4" for="email">WSP</label>



                                    {!! Form::text('pwr_wsp', old('pwr_wsp'), ['class' => 'form-control number', 'id'=>'pwr_wsp', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro lifts">



                                  <label class="control-label col-sm-4" for="pwd">Lifts</label>



                                    {!! Form::text('pwr_lifts', old('pwr_lifts'), ['class' => 'form-control number', 'id'=>'pwr_lifts', 'placeholder' => '']) !!}



                                </div>



                                



                                



                                



                                <div class="col-sm-1 col-xs-1 fro-pro vendors">



                                  <label class="control-label col-sm-4" for="pwd">Vendors</label>



                                  {!! Form::text('pwr_vendors', old('pwr_vendors'), ['class' => 'form-control number', 'id'=>'pwr_vendors','placeholder' => '']) !!}



                               </div> 



                            



                            <div class="col-sm-2 col-xs-2 fro-pro common-area">



                                  <label class="control-label col-sm-12" for="email">Common Area</label>



                                   {!! Form::text('pwr_common_area', old('pwr_common_area'), ['class' => 'form-control number', 'id'=>'pwr_common_area', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro others">



                                  <label class="control-label col-sm-4" for="pwd">Others</label>



                                   {!! Form::text('pwr_others', old('pwr_others'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 solar-power-units">



                                  <label class="control-label col-sm-12" for="pwd">Solar Power Units</label>



                                  {!! Form::text('pwr_solarpwrunits', old('pwr_solarpwrunits'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                               </div> 



                               



                               <div class="col-sm-1 col-xs-1 fro-pro power-factor">



                                  <label class="control-label col-sm-12" for="email">Power Factor</label>



                                     {!! Form::text('pwr_pwrfactor', old('pwr_pwrfactor'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro recorded-kva">



                                  <label class="control-label col-sm-12" for="pwd">Recorded KVA</label>



                                   {!! Form::text('pwr_recordedkva', old('pwr_recordedkva'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                </div>



                                



                                 <div class="col-sm-7 col-xs-7 fro-pro power-remarks">



                                  <label class="control-label col-sm-12" for="pwd">Remarks</label>



                                   {!! Form::text('pwr_remarks', old('pwr_remarks'), ['class' => 'form-control', 'placeholder' => '']) !!}



                                </div>



                                </div>



                                </div>

<!---------------------------------------------------power-consumption---------------------------------------------->

<!---------------------------------------------------dg-sets-------------------------------------------------------->

                                



                                



                               <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>DG Sets (Total: <?php echo getDgsetsNum($sitevv);?>)</b></span></h4>



                            </div>



                           

                               



                               <div class="row light-back1">



                                <div class="col-sm-12 dg-sets">



                              



                               



                               <div class="col-sm-1 col-xs-1  club-house club-house-working">



                                  <label class="control-label col-sm-12" for="email">Not working</label>



                                   {!! Form::text('dgset_notworking', old('dgset_notworking'), ['class' => 'form-control number', 'id'=>'dgset_notworking', 'placeholder' => '']) !!}



                                </div>

 

                                



                               



                            



                           



                                <div class="col-sm-2 col-xs-2  fro-pro power-failure">



                                  <label class="control-label col-sm-12" for="pwd">Power Failure </label>



                                   {!! Form::text('dgset_pwrfailure', old('dgset_pwrfailure'), ['class' => 'form-control timepicker', 'id'=>'dgset_pwrfailure', 'placeholder' => 'Hrs']) !!}



                               </div> 




                               <div class="col-sm-2 col-xs-2 fro-pro club-house diesel-consume">



                                  <label class="control-label col-sm-12" for="email">Diesel Consumed</label>



								  {!! Form::text('dset_dieselconsume', old('dset_dieselconsume'), ['class' => 'form-control number', 'id' =>'dset_dieselconsume', 'placeholder' => 'Ltrs']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro diesel-stock">



                                  <label class="control-label col-sm-12" for="pwd">Diesel Stock</label>



                                    {!! Form::text('dgset_dieselstock', old('dgset_dieselstock'), ['class' => 'form-control number', 'placeholder' => 'Ltrs']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro diesel-filled">



                                  <label class="control-label col-sm-12" for="pwd">Diesel Filled</label>



                                    {!! Form::text('dgset_dieselfilled', old('dgset_dieselfilled'), ['class' => 'form-control number', 'placeholder' => 'Ltrs']) !!}



                               </div> 



                            



                             <div class="col-sm-2 col-xs-2 fro-pro battery-status">



                                  <label class="control-label col-sm-12" for="email">Battery Status</label>



                              <!--  {!! Form::text('dgset_batterystatus', old('dgset_batterystatus'), ['class' => 'form-control', 'placeholder' => '']) !!}-->
                                    
                                    <select name="dgset_batterystatus" class="irrigation">



                                        	<option value="Ok">Ok</option>



                                            <option value="Not Ok">Not Ok</option>



                                        </select>



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro dg-units">



                                  <label class="control-label col-sm-12" for="pwd">DG Units</label>



                                   {!! Form::text('dgset_dgunits', old('dgset_dgunits'), ['class' => 'form-control number', 'placeholder' => '', 'id' => 'dgset_dgunits']) !!}



                                </div>



                               



                                



                                



                                <div class="col-sm-3 col-xs-3 fro-pro abnormalities">



                                  <label class="control-label col-sm-12" for="pwd">Abnormalities / Servicing</label>



                                  {!! Form::text('dgset_abnormalities', old('dgset_abnormalities'), ['class' => 'form-control', 'placeholder' => '']) !!}



                               </div> 



                            </div>



                            </div>

<!---------------------------------------------------dg-sets-------------------------------------------------------->

<!---------------------------------------------------wsp-dws-------------------------------------------------------->                               



                               



                            <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>WSP DWS Consumption</b></span></h4>



                            </div>



                            



                            <div class="row light-back">



                                   <div class="col-sm-12 wsp-dws">



                                <div class="col-sm-1 col-xs-1 salt">



                                  <label class="control-label col-sm-12" for="pwd">Salt</label>



								    {!! Form::text('wsp_salt', old('wsp_salt'), ['class' => 'form-control number', 'placeholder' => 'Kgs']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro chlorine">



                                  <label class="control-label col-sm-12" for="pwd">Chlorine</label>



								   {!! Form::text('wsp_chlorine', old('wsp_chlorine'), ['class' => 'form-control number', 'placeholder' => 'Ltrs']) !!}



                               </div> 



                            



                             <div class="col-sm-1 col-xs-1 fro-pro metro">



                                  <label class="control-label col-sm-12" for="email">Metro</label>



								   {!! Form::text('wsp_metro', old('wsp_metro'), ['class' => 'form-control number', 'id' =>'wspmetro', 'placeholder' => 'Kl']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro tankers">



                                  <label class="control-label col-sm-12" for="pwd">Tankers</label>



								    {!! Form::text('wsp_tankers', old('wsp_tankers'), ['class' => 'form-control number', 'id' =>'wsptankers', 'placeholder' => 'Kl']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro bores">



                                  <label class="control-label col-sm-12" for="pwd">Bores</label>



                                    {!! Form::text('wsp_bores', old('wsp_bores'), ['class' => 'form-control number', 'id' =>'wspbores', 'placeholder' => 'Kl']) !!}



                               </div> 



                               



                             <div class="col-sm-1 col-xs-1 fro-pro total-water total-ki">



                                  <label class="control-label col-sm-12" for="email">Total Water</label>



                                   {!! Form::text('wsp_tot_water', old('wsp_tot_water'), ['class' => 'form-control number', 'id' =>'totwspwater', 'placeholder' => 'Kl']) !!}



                                </div>



                                



                                <div class="col-sm-1  col-xs-1 fro-pro ppm-rw">



                                  <label class="control-label col-sm-12" for="pwd">PPM - RW</label>



                                  {!! Form::text('wsp_ppm_rw', old('wsp_ppm_rw'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                </div>



                                



                               



                                <div class="col-sm-2 col-xs-2 fro-pro ppm-tw">



                                  <label class="control-label col-sm-12" for="pwd">PPM-TW (Sump)</label>



                                  {!! Form::text('wsp_ppm_tw_sump', old('wsp_ppm_tw_sump'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                 </div>



                                 



                                    <div class="col-sm-2 col-xs-2 fro-pro ppm-tw-flat">



                                    	<label class="control-label col-sm-12" for="pwd">PPM-TW (Flat)</label>







                                        {!! Form::text('wsp_ppm_tw_flat', old('wsp_ppm_tw_flat'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                	</div>


<!--
                                </div>
								
								
								
								<div class="col-sm-12 wsp-dws">-->



                                <div class="col-sm-1 col-xs-1 fro-pro back-wash">



                                  <label class="control-label col-sm-12" for="pwd">Back Wash</label>



								    {!! Form::text('wsp_back_wash_rnhrs', old('wsp_back_wash_rnhrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2  filter-feed-pump">



                                  <label class="control-label col-sm-12" for="pwd">Filter feed pumps</label>



								   {!! Form::text('wsp_filter_feed_pmp_rnhrs', old('wsp_filter_feed_pmp_rnhrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}



                               </div> 



                            



                             <div class="col-sm-2 col-xs-2 fro-pro hydro-pumps">



                                  <label class="control-label col-sm-12" for="email">Hydropnuematic pumps</label>



								   {!! Form::text('wsp_hydro_pmp_sw_rnhrs', old('wsp_hydro_pmp_sw_rnhrs'), ['class' => 'form-control timepicker', 'id' =>'wsp_hydro_pmp_sw_rnhrs', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro dewatering-stpwsp">



                                  <label class="control-label col-sm-12" for="pwd">Dewatering pumps</label>


                             <select name="wsp_dewater_pmp_rnhrns" class="irrigation1">
							 	<option value="Auto">Auto</option>
								<option value="Manual">Manual</option>
								<option value="Off">Off</option>
							 </select>


                                </div>


                                </div>



                           </div>

<!---------------------------------------------------wsp-dws-------------------------------------------------------->  

<!---------------------------------------------------stp-fws-------------------------------------------------------->  

                            



                             <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>STP FWS Consumption</b></span></h4>



                            </div>



                           



                                <div class="row light-back1">



                                 <div class="col-sm-12 for-line-label stp-fws">



                                 



                                



                                <div class="col-sm-2  col-xs-2  avg-inlet-water">



                                  <label class="control-label col-sm-12" for="pwd">Avg Inlet Water</label>



                                   {!! Form::text('stp_avg_inlet_water', old('stp_avg_inlet_water'), ['class' => 'form-control number', 'placeholder' => 'Kl']) !!}



                                </div>



                              



                              <div class="col-sm-2 col-xs-2 fro-pro avg-treated-water">



                                  <label class="control-label col-sm-12" for="email">Avg Treated Water</label>



                                    {!! Form::text('stp_avg_treat_water', old('stp_avg_treat_water'), ['class' => 'form-control number', 'id'=>'stp_avg_treat_water', 'placeholder' => 'Kl']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro avg-water-bypassed">



                                  <label class="control-label col-sm-12" for="pwd">Avg Water Bypassed</label>



                                   {!! Form::text('stp_avg_water_bypass', old('stp_avg_water_bypass'), ['class' => 'form-control number', 'placeholder' => 'Kl']) !!}



                                </div>



                               



                                <div class="col-sm-3 col-xs-3 fro-pro residual-chlorine">



                                  <label class="control-label col-sm-12" for="email">Residual Chlorine</label>



                                   {!! Form::text('stp_residual_chlorine', old('stp_residual_chlorine'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                </div>







                                 <div class="col-sm-1 col-xs-1 fro-pro mlss">



                                  <label class="control-label col-sm-12" for="pwd">MLSS</label>



                                   {!! Form::text('stp_mlss', old('stp_mlss'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                </div>



                                <div class="col-sm-1 col-xs-1 fro-pro chlorine">



                                  <label class="control-label col-sm-12" for="email">Chlorine</label>



								   {!! Form::text('stp_chlorine', old('stp_chlorine'), ['class' => 'form-control number', 'placeholder' => 'Ltrs']) !!}



                                </div>



                                



                                <div class="col-sm-1 col-xs-1 fro-pro sludge">



                                  <label class="control-label col-sm-12" for="pwd">Sludge</label>



								  {!! Form::text('stp_sludge', old('stp_sludge'), ['class' => 'form-control number', 'placeholder' => 'Kgs']) !!}



                                </div>



                                



                                <div class="col-sm-3 col-xs-3 fro-pro abnormalites-pumps-repair">



                                  <label class="control-label col-sm-12" for="pwd">Abnormalities / Pumps Repair / Tanks Cleaning</label>



                                  {!! Form::text('stp_abnormalities', old('stp_abnormalities'), ['class' => 'form-control', 'placeholder' => '']) !!}



                                </div>





                                <div class="col-sm-1 col-xs-1 salt">



                                  <label class="control-label col-sm-12" for="pwd">Back Wash</label>



								    {!! Form::text('stp_back_wash_rnhrs', old('stp_back_wash_rnhrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro chlorine">



                                  <label class="control-label col-sm-12" for="pwd">Filter feed pumps</label>



								   {!! Form::text('stp_filter_feed_pmp_rnhrs', old('stp_filter_feed_pmp_rnhrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}



                               </div> 



                            



                             <div class="col-sm-2 col-xs-2 fro-pro hydropnuematic-pumps">



                                  <label class="control-label col-sm-12" for="email">Hydropnuematic pumps</label>



								   {!! Form::text('stp_hydro_pmp_sw_rnhrs', old('stp_hydro_pmp_sw_rnhrs'), ['class' => 'form-control timepicker', 'id' =>'stp_hydro_pmp_sw_rnhrs', 'placeholder' => '']) !!}



                                </div>



                                



                                <div class="col-sm-2 col-xs-2 fro-pro sewatering-pumps">



                                  <label class="control-label col-sm-12" for="pwd">Dewatering pumps</label>


                             <select name="stp_dewater_pmp_rnhrns" class="irrigation1">
							 	<option value="Auto">Auto</option>
								<option value="Manual">Manual</option>
								<option value="Off">Off</option>
							 </select>


                                </div>


                                </div>



                                </div>



<!---------------------------------------------------stp-fws-------------------------------------------------------->  

<!---------------------------------------------------man-power------------------------------------------------------>                                



                            



                               <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>Man Power</b></span></h4>



                            </div>







                    <div class="row light-back man-power">



                        <div class="col-sm-12 light-text-align" style="padding-top:10px;">

                             <div class="col-sm-3 col-xs-3 man-electricians">
                                  <label class="control-label col-sm-4 col-xs-4 for-spacing text-left" for="email"><b>Electricians</b></label>
                                      <div class="col-sm-4 col-xs-4 for-margin-label actual">
                                      	<label>Actual</label>
                                        {!! Form::text('manpw_elect_actual', old('manpw_elect_actual'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-4 col-xs-4 for-margin-label deployment">
                                      	<label>Deployment </label>
                                        {!! Form::text('manpw_elect_deploy', old('manpw_elect_deploy'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                </div>

                                <div class="col-sm-3 col-xs-3 fro-pro man-plumbers">
                                  <label class="control-label col-sm-4 col-xs-4 for-spacing plunbers" for="pwd"><b>Plumbers</b></label>
                                    <div class="col-sm-4 col-xs-4 for-margin-label actual">
                                      	<label>Actual</label>
                                       {!! Form::text('manpw_plumb_actual', old('manpw_plumb_actual'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-4 col-xs-4 for-margin-label deployment">
                                      	<label>Deployment </label>
                                        {!! Form::text('manpw_plumb_deploy', old('manpw_plumb_deploy'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                </div>

                              <div class="col-sm-3 col-xs-3 fro-pro man-stp-operators">
                                  <label class="control-label col-sm-4 col-xs-4 for-spacing stp" for="email"><b>STP Operators</b></label>
                                      <div class="col-sm-4 col-xs-4 for-margin-label actual">
                                      	<label>Actual</label>
                                       {!! Form::text('manpw_stp_actual', old('manpw_stp_actual'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-4 col-xs-4 for-margin-label deployment">
                                      	<label>Deployment </label>
                                        {!! Form::text('manpw_stp_deploy', old('manpw_stp_deploy'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                </div>





                                



                                



                               


                                <div class="col-sm-3 col-xs-3 man-fire-safety">



                                  <label class="control-label col-sm-4 col-xs-4 for-spacing text-left" for="pwd"><b>Fire and Safety</b></label>



                                 <div class="col-sm-4 col-xs-4 for-margin-label actual">



                                      	<label>Actual</label>



                                        {!! Form::text('manpw_fire_actual', old('manpw_fire_actual'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label deployment">



                                      	<label>Deployment </label>



                                       {!! Form::text('manpw_fire_deploy', old('manpw_fire_deploy'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                </div>



                                



                                <div class="col-sm-3 col-xs-3 man-gas">



                                  <label class="control-label col-sm-4 col-xs-4 for-spacing text-left" for="email"><b>Gas</b></label>



                                     <div class="col-sm-4 col-xs-4 for-margin-label actual">



                                      	<label>Actual</label>



                                       {!! Form::text('manpw_gas_actual', old('manpw_gas_actual'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label deployment">



                                      	<label>Deployment </label>



                                       {!! Form::text('manpw_gas_deploy', old('manpw_gas_deploy'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                </div>



                                <div class="col-sm-3 col-xs-3 fro-pro man-others">



                                  <label class="control-label col-sm-4 col-xs-4  for-spacing others" for="pwd"><b>Others</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label actual">



                                      	<label>Actual</label>



                                       {!! Form::text('manpw_other_actual', old('manpw_other_actual'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label deployment">



                                      	<label>Deployment </label>



                                       {!! Form::text('manpw_other_deploy', old('manpw_other_deploy'), ['class' => 'form-control number', 'placeholder' => '']) !!}



                                      </div>



                                </div>



                                </div>



                                </div>



                                

<!---------------------------------------------------man-power------------------------------------------------------> 

<!---------------------------------------------------other-services-------------------------------------------------> 

                                



                              <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>Other Services</b></span></h4>



                            </div>



                            



                   <div class="row light-back1">



                       <div class="col-sm-12 light-text-align" style="padding-top:12px;">



                          <div class="row other-services">



                             <div class="col-sm-4 col-xs-4 lifts-not-working">



                                  <label class="control-label col-sm-2 col-xs-2 for-spacing text-left" style="padding-left:10px;" for="pwd"><b>Lifts</b></label>



                                      <div class="col-sm-3 col-xs-3 for-margin-label fro-pro not-working">



                                      	<label class="col-sm-12 col-xs-12 text-left" style="padding-right:0px;">Not working </label>



                                        {!! Form::text('othser_lifts_nw', old('othser_lifts_nw'), ['class' => 'form-control liftsClass number','id'=> 'othser_lifts_nw', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-3 col-xs-3 for-margin-label fro-pro">



                                      	<label class="col-sm-12 col-xs-12 text-left">Servicing </label>



                                       {!! Form::text('othser_lifts_ser', old('othser_lifts_ser'), ['class' => 'form-control liftsClass', 'id'=> 'othser_lifts_ser','placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label fro-pro bd-servicing">



                                      	<label class="col-sm-12 col-xs-12 text-left" style="padding-right:0px;">BD Servicing </label>



                                        {!! Form::text('othser_lifts_bdser', old('othser_lifts_bdser'), ['class' => 'form-control liftsClass', 'id'=> 'othser_lifts_bdser', 'placeholder' => '']) !!}



                                      </div>

 

                                     </div>



                                     



                                     <div class="col-sm-5 col-xs-5 fro-pro light-text-align gas-total-consumption">



                                  <label class="control-label col-sm-1 col-xs-1  for-spacing text-left" for="pwd"><b>Gas</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label fro-pro total-consumption">



                                      	<label class="col-sm-12 col-xs-12 text-left" style="padding-right:0px;">Total Consumption</label>



										{!! Form::text('othser_gas_totcons', old('othser_gas_totcons'), ['class' => 'form-control number', 'placeholder' => 'Kgs']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label total-consumption-empty">



                                      	<label>Empty </label>



                                        {!! Form::text('othser_gas_empty', old('othser_gas_empty'), ['class' => 'form-control number gasClass','id' =>'othser_gas_empty', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-2 col-xs-2 for-margin-label total-consumption-full">



                                      	<label>Full </label>



                                        {!! Form::text('othser_gas_full', old('othser_gas_full'), ['class' => 'form-control number gasClass','id' =>'othser_gas_full', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-3 col-xs-3 for-margin-label total-running">



                                      	<label class="col-sm-12 col-xs-12 text-left">Running </label>



                                        {!! Form::text('othser_gas_running', old('othser_gas_running'), ['class' => 'form-control gasClass','id' =>'othser_gas_running', 'placeholder' => '']) !!}



                                      </div>



                                      



                                </div>



                                     



                                      <div class="col-sm-2 col-xs-2 for-margin-label bore-wells">

                                           <label class="col-sm-5 col-xs-5 borewells"><b>Borewells</b></label>
                                             <div class="col-sm-7 col-xs-7">

                                      	 <label class="control-label col-sm-12 col-xs-12 text-left" for="pwd">Not Working</label>



										{!! Form::text('othser_gas_borewells', old('othser_gas_borewells'), ['class' => 'form-control number', 'id'=>'othser_gas_borewells', 'placeholder' => '']) !!}

                                         </div>

                                      </div>



                                   <div class="col-sm-4 col-xs-4 ph-chlorine">
                                      <label class="control-label col-sm-3 col-xs-3  for-spacing text-left poool" for="pwd"><b>Swimming Pool1</b></label>
                                      <div class="col-sm-3 col-xs-3 for-margin-label fro-pro ph">
                                      	<label>PH </label>
                                        {!! Form::text('othser_swim_ph', old('othser_swim_ph'), ['class' => 'form-control number', 'id' =>'othser_swim_ph', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-2 col-xs-2 for-margin-label fro-pro chlorine">
                                      	<label>Chlorine  </label>
                                        {!! Form::text('othser_swim_chlorine', old('othser_swim_chlorine'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                       <div class="col-sm-4 col-xs-4 for-margin-label fro-pro">
                                      	<label class="col-sm-12 col-xs-12 text-left">Running Hrs  </label>
                                       {!! Form::text('othser_swim_runhrs', old('othser_swim_runhrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                                      </div>
                                   </div>
								   
								   
								   <div class="col-sm-4 col-xs-4 swimming-pool-2">
                                      <label class="control-label col-sm-3 col-xs-3  for-spacing text-left swimmimg" for="pwd"><b>Swimming Pool2</b></label>
                                      <div class="col-sm-3 col-xs-3 for-margin-label fro-pro ph">
                                      	<label>PH </label>
                                        {!! Form::text('swim_pool_two_ph', old('swim_pool_two_ph'), ['class' => 'form-control number', 'id' =>'swim_pool_two_ph', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-2 col-xs-2 for-margin-label fro-pro chlorine">
                                      	<label>Chlorine  </label>
                                        {!! Form::text('swim_pool_two_chlr', old('swim_pool_two_chlr'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                       <div class="col-sm-4 col-xs-4 for-margin-label fro-pro running-hrs">
                                      	<label class="col-sm-12 col-xs-12 text-left">Running Hrs  </label>
                                       {!! Form::text('swim_pool_two_rn_hrs', old('swim_pool_two_rn_hrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                                      </div>
                                   </div>

                                    <div class="col-sm-2 col-xs-2 for-margin-label fro-pro solar-fencing">
                                        	<label class="control-label col-sm-12 col-xs-12 text-left">Solar Fencing</label>
                                        	<select class="irrigation" name="othser_solar_fencing">
                                        	<option value="Working">Working</option>
                                            <option value="Not Working">Not Working</option>
                                        </select>
                                      </div>

                                      <div class="col-sm-2 col-xs-2 for-margin-label fro-pro irrigation-sprinkler">
                                  		<label class="control-label col-sm-12 col-xs-12 text-left for-response" for="pwd" >Irrigation Sprinkler Automation</label>
                                      	<select class="solar" name="other_irrigation_spinklr">
                                        	<option value="Yes">Auto</option>
                                            <option value="No">Manual</option>
                                        </select>
                                      </div>

                                    <div class="col-sm-4 col-xs-4 fro-pro water-bodies">
                                         <label class="control-label col-sm-3 col-xs-3  for-spacing text-left bodies" for="pwd"><b>Water Bodies1</b></label>
                                         <div class="col-sm-2 col-xs-2 for-margin-label fro-pro ph">
                                      	<label>PH </label>
                                       {!! Form::text('othser_watbody_ph', old('othser_watbody_ph'), ['class' => 'form-control number', 'id'=>'othser_watbody_ph', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-3 col-xs-3 for-margin-label fro-pro chlorine">
                                      	<label>Chlorine  </label>
                                       {!! Form::text('othser_watbody_chlorine', old('othser_watbody_chlorine'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                       <div class="col-sm-4 col-xs-4 for-margin-label fro-pro running-hrs">
                                      	<label>Running Hrs  </label>
                                        {!! Form::text('othser_watbody_runhrs', old('othser_watbody_runhrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                                    </div>
                                </div>
								
								<div class="col-sm-4 col-xs-4 fro-pro water-bodies2">
                                         <label class="control-label col-sm-3 col-xs-3  for-spacing text-left water" for="pwd"><b>Water Bodies2</b></label>
                                         <div class="col-sm-2 col-xs-2 for-margin-label fro-pro ph">
                                      	<label>PH </label>
                                       {!! Form::text('water_body_two_ph', old('water_body_two_ph'), ['class' => 'form-control number', 'id'=>'water_body_two_ph', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-3 col-xs-3 for-margin-label fro-pro chlorine">
                                      	<label>Chlorine  </label>
                                       {!! Form::text('water_body_two_chlr', old('water_body_two_chlr'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                       <div class="col-sm-4 col-xs-4 for-margin-label fro-pro running-hrs">
                                      	<label>Running Hrs  </label>
                                        {!! Form::text('water_body_two_rn_hrs', old('water_body_two_rn_hrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                                    </div>
                                </div>
								
								<div class="col-sm-4 col-xs-4 fro-pro water-bodies3">
                                         <label class="control-label col-sm-3 col-xs-3  for-spacing text-left" for="pwd"><b>Water Bodies3</b></label>
                                         <div class="col-sm-2 col-xs-2 for-margin-label fro-pro ph">
                                      	<label>PH </label>
                                       {!! Form::text('water_body_three_ph', old('water_body_three_ph'), ['class' => 'form-control number', 'id'=>'water_body_three_ph', 'placeholder' => '']) !!}
                                      </div>
                                      <div class="col-sm-3 col-xs-3 for-margin-label fro-pro chlorine">
                                      	<label>Chlorine  </label>
                                       {!! Form::text('water_body_three_chlr', old('water_body_three_chlr'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                      </div>
                                       <div class="col-sm-4 col-xs-4 for-margin-label fro-pro running-hrs">
                                      	<label>Running Hrs  </label>
                                        {!! Form::text('water_body_three_rn_hrs', old('water_body_three_rn_hrs'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                                    </div>
                                </div>



                           <!--   </div>    -->



                                



                                     



                                   



                                </div> 



                                </div>



                                 </div>



<!---------------------------------------------------other-services------------------------------------------------->

<!---------------------------------------------------complaints----------------------------------------------------->                                



                                 



                             <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>Complaints</b></span></h4> <span>Close/Total:<b><label id="complres"></label></b></span>



                            </div>



                                



                                <div class="row light-back">



                                  <div class="col-sm-12 light-text-align Complaints" style="padding-top:8px;">



                                 <div class="col-sm-3 col-xs-3 electrical">



                                  <label class="control-label col-sm-4 col-xs-4  for-spacing text-left" for="pwd"><b>Electrical</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                       {!! Form::text('comp_electrical_tot', old('comp_electrical_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_electrical_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                       {!! Form::text('comp_electrical_close', old('comp_electrical_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_electrical_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                <div class="col-sm-3 col-xs-3 fro-pro plumbing">



                                  <label class="control-label col-sm-4 col-xs-4  for-spacing plumbing" for="pwd"><b>Plumbing</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                       {!! Form::text('comp_plumbing_tot', old('comp_plumbing_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_plumbing_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                        {!! Form::text('comp_plumbing_close', old('comp_plumbing_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_plumbing_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                



                                 <div class="col-sm-3 col-xs-3 fro-pro lifts">



                                  <label class="control-label col-sm-4 col-xs-4  for-spacing lifts" for="pwd"><b>Lifts</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                       {!! Form::text('comp_lifts_tot', old('comp_lifts_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_lifts_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                        {!! Form::text('comp_lifts_close', old('comp_lifts_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_lifts_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                <div class="col-sm-3 col-xs-3 fro-pro carpentry">



                                  <label class="control-label col-sm-4 col-xs-4 for-spacing car" for="pwd"><b>Carpentry</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                       {!! Form::text('comp_carpentary_tot', old('comp_carpentary_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_carpentary_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                        {!! Form::text('comp_carpentary_close', old('comp_carpentary_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_carpentary_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                



                                 <div class="col-sm-3 col-xs-3 gas">



                                  <label class="control-label col-sm-4 col-xs-4 for-spacing text-left gas" for="pwd"><b>Gas</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                       {!! Form::text('comp_gas_tot', old('comp_gas_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_gas_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                       {!! Form::text('comp_gas_close', old('comp_gas_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_gas_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                <div class="col-sm-3 col-xs-3 fro-pro civil-project">



                                  <label class="control-label col-sm-4 col-xs-4  for-spacing civil" for="pwd"><b>Civil / Project</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                        {!! Form::text('comp_civil_tot', old('comp_civil_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_civil_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                       {!! Form::text('comp_civil_close', old('comp_civil_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_civil_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                



                                 <div class="col-sm-3 col-xs-3 fro-pro society-scope">



                                  <label class="control-label col-sm-4 col-xs-4 for-spacing society-scope" for="pwd"><b>Society Scope</b></label>



                                  <div class="col-sm-4  col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                      {!! Form::text('comp_ss_tot', old('comp_ss_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_ss_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                        {!! Form::text('comp_ss_close', old('comp_ss_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_ss_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                                <div class="col-sm-3 col-xs-3 fro-pro others">



                                  <label class="control-label col-sm-4 col-xs-4  for-spacing others" for="pwd"><b>Others</b></label>



                                  <div class="col-sm-4 col-xs-4 for-margin-label total">



                                      	<label>Total </label>



                                        {!! Form::text('comp_other_tot', old('comp_other_tot'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_other_tot', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                      <div class="col-sm-4 col-xs-4 for-margin-label">



                                      	<label>Close </label>



                                        {!! Form::text('comp_other_close', old('comp_other_close'), ['class' => 'form-control number', 'placeholder' => '', 'id'=>'comp_other_close', 'onchange' =>'getcompsum();']) !!}



                                      </div>



                                </div>



                              </div>



                              </div>

<!---------------------------------------------------complaints-----------------------------------------------------> 

<!---------------------------------------------------check-list-verified--------------------------------------------->                               

                               <div class="col-sm-12 col-xs-12 especially-heading">

                                <h4><span><b>Check Lists Verified</b></span></h4>



                            </div>



                            



                            <div class="row light-back1">



                               <div class="col-sm-12 check-verified">



                              <div class="col-sm-1 col-xs-1 stp">



                                  <label class="control-label col-sm-1 col-xs-1" for="pwd">STP</label>



                                      	<select class="irrigation" name="clveri_stp">



                                        	<option value="Yes">Yes</option>



                                            <option value="No">No</option>



                                        </select>



                               </div>



                                     



                                  <div class="col-sm-1 col-xs-1 fro-pro1 wsp">



                                  	 <label class="col-sm-2 col-xs-2">WSP</label>



                                        	<select class="irrigation" name="clveri_wsp">



                                        	<option value="Yes">Yes</option>



                                            <option value="No">No</option>



                                        </select>



                                  </div>   



                                <div class="col-sm-1 col-xs-1 briefying">
                                    	<label class="col-sm-12 col-xs-12">Daily Briefing</label>
                                        	<select name="clveri_daily_brief">
                                            	<option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                    </div>


                               		<div class="col-sm-1 col-xs-1 briefying start-time">
                                    	<label class="col-sm-12 col-xs-12">Start Time</label>
                                        {!! Form::text('clveri_start_time', old('clveri_start_time'), ['class' => 'form-control timepickerstart', 'placeholder' => '']) !!}
                                    </div>



                               		<div class="col-sm-1 col-xs-1 briefying end-time">
                                    	<label class="col-sm-12 col-xs-12">End Time</label>
                                        {!! Form::text('clveri_end_time', old('clveri_end_time'), ['class' => 'form-control timepickerstart', 'placeholder' => '']) !!}
                                    </div>

                               		<div class="col-sm-2 col-xs-2 briefying no-attendees">
                                    	<label class="col-sm-12 col-xs-12">No. of Attendees</label>
                                       {!! Form::text('clveri_attend_num', old('clveri_attend_num'), ['class' => 'form-control number', 'placeholder' => '']) !!}
                                    </div>




                                



                               



                                <div class="col-sm-12 col-xs-12 fro-pro-check">



                                  <div class="col-sm-3 col-xs-3 for-list irrigation-chambers">



                                  	<ul>



                                        	<li><input type="checkbox" value="Irrigation Chambers"  name="lists_verified[]">Irrigation Chambers</li>



                                            <li><input type="checkbox" value="Surface Drain Chambers"  name="lists_verified[]">Surface Drain Chambers</li>



                                            <li><input type="checkbox" value="Podium Drain Lines"  name="lists_verified[]">Podium Drain Lines</li>



                                            <li><input type="checkbox" value="Soil lines"  name="lists_verified[]">Soil lines</li>



                                     </ul>



                                   </div>



                                   



                                    <div class="col-sm-3 col-xs-3 for-list waste-lines">



                                  	<ul>



                                            <li><input type="checkbox" value="WASTE Lines" name="lists_verified[]">WASTE Lines</li>



                                            <li><input type="checkbox" value="RWH Pits" name="lists_verified[]">RWH Pits</li>



                                            <li><input type="checkbox" value="Solar Fencing" class="verify" name="lists_verified[]">Solar Fencing</li> 



                                     </ul>



                                   </div> 



                                     



                                        <div class="col-sm-3 col-xs-3 for-list capacitor-banks">



                                        <ul>



                                        	



                                            <li><input type="checkbox" value="Capacitor Banks" class="verify" name="lists_verified[]">Capacitor Banks</li>



                                            <li><input type="checkbox" value="DG sets" class="verify" name="lists_verified[]">DG sets</li>



                                            <li><input type="checkbox" value="HT Panels" class="verify" name="lists_verified[]">HT Panels</li>



                                           </ul>



                                       </div> 



                              



                               <div class="col-sm-3 col-xs-3 for-list lt-panels">



                                        <ul>



                                            <li><input type="checkbox" value="LT Panels" class="verify" name="lists_verified[]">LT Panels</li>



                                            <li><input type="checkbox" value="2 Hrs Readings" class="verify" name="lists_verified[]">2 Hrs Readings</li>



                                            <li><input type="checkbox" value="4 Hrs Readings" class="verify" name="lists_verified[]">4 Hrs Readings</li>



                                           </ul>



                                       </div> 



                              </div>




                                </div>



                                </div>



<!---------------------------------------------------check-list-verified--------------------------------------------->

<!---------------------------------------------------assets-critically----------------------------------------------->                                 



                              <div class="col-sm-12 col-xs-12 especially-heading">



                              	 <h4><span><b>Assets Critically Observed:</b></span></h4>



                               </div>



                               



                               <div class="row light-back">



                               <div class="col-sm-12">



                                <div class="col-sm-12 reviews">



                               	<div class="col-sm-10 col-xs-10 especially-heading critically">



                                 <input type="text" class="form-control" name="asset_critical_observe" >



                               



                               </div>



                                <div class="col-sm-2 col-xs-2 local-purchase">



                                <label class="col-sm-12">Local Purchase</label>



								{!! Form::text('local_purchase', old('local_purchase'), ['class' => 'form-control for-height', 'placeholder' => '']) !!}



                                        



                                </div>



                                 </div>



                                 </div>



                            </div>



 <!---------------------------------------------------assets-critically----------------------------------------------->                            



                                



                                



                                <div class="row">

                                	<div class="col-sm-6 col-xs-6 awc">
                                    	<div class="col-sm-12 col-xs-12 especially-heading">
                                           <h4><span><b>Points Discussed in HOD's Meeting:</b></span></h4>
                                       </div>
                                        <div class="col-sm-12 col-xs-12 light-back1">
                                           <div class="col-sm-12 especially-heading1 hod-meeting">
                                             <input type="text" class="form-control" name="points_dis_hod_meeting" >
                                             
                                         </div>
                                     </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-6 discussed">
                                    	<div class="col-sm-12 col-xs-12 especially-heading">
                                           <h4><span><b>AMC Visits:</b></span></h4>
                                        </div>
                                        <div class="col-sm-12 col-xs-12 light-back1">
                                           <div class="col-sm-12 especially-heading1 vists">
                                              <input type="text" class="form-control" name="amc_visits">
                                         </div>
                                      </div> 
                                    </div>

                                </div>






                            



                            <div class="row">

                            	<div class="col-sm-6 col-xs-6 awc">
                                	<div class="col-sm-12 col-xs-12 especially-heading">
                                    	<h4><span><b>Preventive Maintenance:</b></span></h4>
                                  </div>
                                      <div class="col-sm-12 col-xs-12 light-back">
                                         <div class="col-sm-12 especially-heading1 maintenance">
                                          <input type="text" class="form-control" name="preventive_maintain" >
                                          
                                        </div>
                                     </div>
                                </div>
                                <div class="col-sm-6 col-xs-6 discussed">
                                	<div class="col-sm-12 col-xs-12 especially-heading">
                                       <h4><span><b>Break Downs if any:</b></span></h4>
                                   </div>
                                    <div class="col-sm-12 col-xs-12 light-back">
                                      <div class="col-sm-12 especially-heading1 break-sown">
                                          <input type="text" class="form-control" name="break_down_any">
                                         
                                       </div>
                          		  </div>
                                </div>
                            </div>




                            <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>Any Communication from / to MC</b></span></h4>



                             </div>



                             



                              <div class="row light-back1">



                                 <div class="col-sm-12">



                                 <div class="col-sm-12 especially-heading1 any-communication">



                                 <input type="text" class="form-control" name="any_communication">



                             



                            </div>



                            </div>



                           </div> 



                           



                           



                            <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>Pumps Status</b></span></h4>



                            </div>



                           



                     <div class="row light-back pump-status" style="margin-bottom:10px;margin-top:10px;">



                        <div class="col-sm-6 col-xs-6 storm-pump">



                        		



                                  <label class="control-label col-sm-3 col-xs-3 pumps swp">Storm Water Pumps</label>



                                  <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Auto</label>



                                        {!! Form::text('storm_water_auto_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Manual</label>



                                        {!! Form::text('storm_water_manual_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-2 col-xs-2 for-margin-label off">



                                      	<label>OFF</label>



                                        {!! Form::text('storm_water_off_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>

									  

									   <div class="col-sm-3 col-xs-3 for-margin-label">



                                      	<label>Not Working</label> 



                                        {!! Form::text('storm_water_nw_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                      



                                </div>



                                



                                <div class="col-sm-6 col-xs-6 dewatering-pump">



                                  <label class="control-label col-sm-3 col-xs-3 pumps dewatering">Dewatering Pumps</label>



                                  <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Auto</label>



                                        {!! Form::text('de_water_auto_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Manual</label>



                                       {!! Form::text('de_water_manual_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-2 col-xs-2 for-margin-label off">



                                      	<label>OFF</label>



                                       {!! Form::text('de_water_off_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>

									  

									     <div class="col-sm-3 col-xs-3 for-margin-label">



                                      	<label>Not Working</label>



                                       {!! Form::text('de_water_nw_pumps', old('de_water_nw_pumps'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                      



                                </div>



                                

 

                                <div class="col-sm-6 col-xs-6 oozing-pumps">



                                  <label class="control-label col-sm-3 col-xs-3 pumps oozing">Oozing Pumps</label>



                                  <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Auto</label>



                                        {!! Form::text('oozing_water_auto_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Manual</label>



                                        {!! Form::text('oozing_water_manual_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-2 col-xs-2 for-margin-label off">



                                      		<label>OFF</label>



                                        {!! Form::text('oozing_water_off_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>

									  

									   <div class="col-sm-3 col-xs-3 for-margin-label">



                                      		<label>Not Working</label>



                                       {!! Form::text('oozing_water_nw_pumps', old('oozing_water_nw_pumps'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                     



                                </div>



                                



                                



                                <div class="col-sm-6 col-xs-6 rain-water-pumps" style="margin-bottom:13px;">



                                  <label class="control-label col-sm-3 col-xs-3 pumps rain-water">Rain Water Pumps</label>



                                  <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Auto</label>



                                        {!! Form::text('rain_water_auto_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                      <div class="col-sm-2 col-xs-2 for-margin-label">



                                      	<label>Manual</label>



                                       {!! Form::text('rain_water_manual_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>



                                       <div class="col-sm-2 col-xs-2 for-margin-label off">



                                      		<label>OFF</label>



                                        {!! Form::text('rain_water_off_pumps', old('local_purchase'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>

									  

									  <div class="col-sm-3 col-xs-3 for-margin-label">



                                      	<label>Not Working</label>



                                       {!! Form::text('rain_water_nw_pumps', old('rain_water_nw_pumps'), ['class' => 'form-control for-height number', 'placeholder' => '']) !!}



                                      </div>





                                      



                                </div>



                                



                            



                    </div>



                           



                           


<div class="col-sm-12 col-xs-12 especially-heading">
	<h4><span><b>Reporting</b></span></h4>
</div>
<div class="row light-back" style="margin-bottom:10px;margin-top:10px;">

<div class="col-sm-6 reporting">

<div class="col-sm-12 col-xs-12 form-group incident-card">
   <label class="control-label col-sm-3 col-xs-3">Incident Cards</label>
    <div class="col-sm-2 col-xs-2 yes">
        <label><input type="radio" name="incident_report" value="yes"/>Yes</label>
    </div>
    <div class="col-sm-2 col-xs-2 no">
        <label> <input type="radio" name="incident_report" value="no" checked="checked"/>No</label>
    </div>
    <div class="col-sm-2 col-xs-2 textbox" id="incident_count"  style="display:none;">
    	<input type="text" class="form-control" name="incident_count" value="0" id="incident_count_val" readonly="readonly">
   <!-- <a href="/topics/breakdown/edit" target="_blank">Add Break Down</a>-->
    </div>
    <div class="col-sm-1 col-xs-1 adding">
    	 <a href="/topics/incidentcreate/<?php echo $sitevv; ?>" target="_blank" class="btn btn-secondary">Add</a>
    </div>
    <div class="col-sm-2 col-xs-2 update">
    	 <input type="button" onclick="updateincidentval();" value="Update" class="btn btn-primary">
    </div>
</div>


<div class="col-sm-12 col-xs-12 form-group breakdown-card">
  <label class="control-label col-sm-3 col-xs-3">Breakdown Cards</label>
    <div class="col-sm-2 col-xs-2 yes">
        <label><input type="radio" name="break_dwn_report" value="yes"/>Yes</label>
    </div>
    <div class="col-sm-2 col-xs-2 no">
        <label><input type="radio" name="break_dwn_report" value="no" checked="checked"/>No</label>
    </div>
    <div class="col-sm-2 col-xs-2 textbox"  id="breakdown_count" style="display:none;">
    	<input type="text" class="form-control" name="breakdown_count" value="0" id="breakdown_count_val" readonly="readonly">
    </div>
    <div class="col-sm-1 col-xs-1 adding">
    	 <a href="/topics/breakdowncreate/<?php echo $sitevv; ?>" target="_blank" class="btn btn-secondary">Add</a>
    </div>
    <div class="col-sm-2 col-xs-2 update">
    	 <input type="button" onclick="updatebreakdownval();" value="Update" class="btn btn-primary">
    </div>
</div>
    
    <div class="col-sm-12 col-xs-12 form-group job-card">
    	<label class="control-label col-sm-3 col-xs-3">Job Cards</label>
        <div class="col-sm-2 col-xs-2 yes">
            <label><input type="radio" name="job_card_report" value="yes"/>Yes</label>
        </div>
        <div class="col-sm-2 col-xs-2 no">
            <label><input type="radio" name="job_card_report" value="no" checked="checked"/>No</label>
        </div>
    	<div class="col-sm-2 col-xs-2 textbox" id="jobcard_count"  style="display:none;">
        	<input type="text" name="jobcard_count" class="form-control" value="0" id="jobcard_count_val" readonly="readonly">
        </div>
        <div class="col-sm-1 col-xs-1 adding">
        	 <a href="/topics/jobcardcreate/<?php echo $sitevv; ?>" target="_blank" class="btn btn-secondary">Add</a>
        </div>
        <div class="col-sm-2 col-xs-2 update">
        	  <input type="button" onclick="updatejobcardval();" value="Update" class="btn btn-primary">
        </div>
    </div>
</div>

</div>

           <?php // MODEL ?>

                           

    <div class="modal fade editfms-popup" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title grande-dgsetsss" 
            id="favoritesModalLabel"><?php echo get_sitename($sitevv); ?><span><?php echo "DG Sets"; ?></span><span><?php echo $date; ?></span></h4>
          </div>
          <div class="modal-body power-filure-popup">
          
            <div class="row">
            <?php 
			 $blockarr = array("1"=>"A","2"=>"B","3"=>"C","4"=>"D","5"=>"E","6"=>"F","7"=>"G","8"=>"H","9"=>"I","10"=>"J","11"=>"K","12"=>"L","13"=>"M","14"=>"N","15"=>"O","16"=>"P","17"=>"Q","18"=>"R"); ?>
             <div class="row uites-diesel">
                <div class="col-xs-2">
                	 
                </div>
			    <div class="col-xs-4">
                 	<label>No of Running Hours </label>
                </div>
                 <div class="col-xs-3">
                	 <label>Units Generated </label>
                </div>
                  <div class="col-xs-3">
                 	<label>Diesel Consumption</label>
                </div>
                   
			<?php   $cn = getDgsetsNum($sitevv); if( (int)  $cn > 0) { for($i = 1; $i <= $cn; $i++) { ?>
             <div class="col-xs-2 form-group" style="text-align: center;">
                    <b><?php echo  $blockarr[$i]; ?></b>
                    <input type="hidden" name="dgblock[]" value="<?php  echo $blockarr[$i]; ?>">
                </div>
                <div class="col-xs-4 form-group"> 
                    {!! Form::text('dgrun_hr[]', '', ['class' => 'form-control hrsum dgtimepicker',  'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>   
                </div>
                <div class="col-xs-3 form-group">{!! Form::text('dgrun_un_grn[]', '', ['class' => 'form-control dguns','onchange'=>'getfinaltime()', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>
                </div>     
                <div class="col-xs-3 form-group">{!! Form::text('dgrun_die_consump[]', '', ['class' => 'form-control dgsum', 'onchange'=>'getfinalconsump()', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>
                </div>  
                <?php } } ?>
                
                 <div class="col-xs-2 form-group">
                	 
                </div>
			    <div class="col-xs-4 form-group">
                 	<label id="finalhours"></label>
                </div>
                 <div class="col-xs-3 form-group">
                	 <label id="finalunits"> </label>
                </div>
                  <div class="col-xs-3 form-group">
                 	<label id="finalconsump"></label>
                </div>
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn aturl btn-cancell" data-dismiss="modal" style="margin-right:10px;">Close</button>
              <span class="pull-right">
                  <button type="button" class="btn btn-default btn-closse" onclick="getDeiselsum();">Submit</button>
                 
             </span>
          </div>
        </div>
    </div>
</div>

<?php // END MODEL ?>
              



            </div>

                           
          <?php // END MODEL ?>
          
          
          
          <div class="modal fade editfms-popup" id="sectionModal2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title grande-dgsetsss" 
            id="favoritesModalLabel"><?php echo get_sitename($sitevv); ?><span><?php echo "DG Sets"; ?></span><span><?php echo $date; ?></span></h4>
          </div>
          <div class="modal-body power-filure-popup">
          
            <div class="row">
            <?php 
			 $blockarr = array("1"=>"A","2"=>"B","3"=>"C","4"=>"D","5"=>"E","6"=>"F","7"=>"G","8"=>"H","9"=>"I","10"=>"J","11"=>"K","12"=>"L","13"=>"M","14"=>"N","15"=>"O","16"=>"P","17"=>"Q","18"=>"R"); ?>
             <div class="row uites-diesel">
                <div class="col-xs-2">
                	 
                </div>
			    <div class="col-xs-4">
                 	<label>Running Hours Present Reading</label>
                </div>
                 <div class="col-xs-3">
                	 <label>Running Hours Previous Reading</label>
                </div>
                  <div class="col-xs-3">
                 	<label>Running Hours</label>
                </div>
                   
			<?php   $cn = getDgsetsNum($sitevv); if( (int)  $cn > 0) { for($i = 1; $i <= $cn; $i++) { ?>
             <div class="col-xs-2 form-group" style="text-align: center;">
                    <b><?php echo  $blockarr[$i]; ?></b>
                    <input type="hidden" name="dgblock[]" value="<?php  echo $blockarr[$i]; ?>">
                </div>
                <div class="col-xs-4 form-group"> 
                    {!! Form::text('dgrun_hr[]', '', ['class' => 'form-control hrsum dgtimepicker',  'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>   
                </div>
                <div class="col-xs-3 form-group">{!! Form::text('dgrun_un_grn[]', '', ['class' => 'form-control dguns','onchange'=>'getfinaltime()', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>
                </div>     
                <div class="col-xs-3 form-group">{!! Form::text('dgrun_die_consump[]', '', ['class' => 'form-control dgsum', 'onchange'=>'getfinalconsump()', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>
                </div>  
                <?php } } ?>
                
                 <div class="col-xs-2 form-group">
                	 
                </div>
			    <div class="col-xs-4 form-group">
                 	<label id="finalhours"></label>
                </div>
                 <div class="col-xs-3 form-group">
                	 <label id="finalunits"> </label>
                </div>
                  <div class="col-xs-3 form-group">
                 	<label id="finalconsump"></label>
                </div>
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn aturl btn-cancell" data-dismiss="modal" style="margin-right:10px;">Close</button>
              <span class="pull-right">
                  <button type="button" class="btn btn-default btn-closse" onclick="getDeiselsum();">Submit</button>
                 
             </span>
          </div>
        </div>
    </div>
</div>

<?php // END MODEL ?>
              



            </div>


                           






                       <div class="col-sm-12 col-xs-12 especially-heading">



                                <h4><span><b>Additional Information:</b></span></h4>



                            </div>     

  

       <!--	<label>Additional Information:</label><br/><br/>   -->    
       <div class="additional-information">              

<textarea class="form-control summernote-small" placeholder="Enter Description" name="reasontext" cols="50" rows="10" id="reasontext"></textarea>

                                      <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span class="i-confirmed">I Confirmed all the data entered was correct</span>

                           </div>
                           
                         
                           
                               <div class="col-sm-12 col-xs-12 submit-button fms-submitbutton">



                            	<!--<input type="submit" value="Submit" >-->



								{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}

                                 

								{!! Form::close() !!}


                            </div>
                            

                  </div>



                </div>



              </div>




<?php // MODEL ?>
 

          </div>



        </div>



        <!-- /page content -->







       



      </div>



    </div>











 <!-- footer content -->



        <?php /*?> <?php include "footer.php"; ?><?php */?>



        <!-- /footer content -->



 <!-- jQuery -->



    



    <!-- Bootstrap -->







    <!-- FastClick -->



   



    <!-- NProgress -->



    



    <!-- iCheck -->



   



    <!-- Datatables -->



   



   







    <!-- Custom Theme Scripts -->



    <script src="build/js/custom.min.js"></script>



	



	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

	

<script type="text/javascript">



  



$( document ).ready(function() {


  $('.timepicker').datetimepicker({

        format: 'HH:mm'
		

    }); 
	


 $('.timepickerstart').datetimepicker({

        format: 'h:m A'
		

    });  


 $('.dgtimepicker').datetimepicker({

         format: 'HH:mm'
		

    });  

            $('#reasontext').summernote({

              height:300,

            });

  
   /*$('.dgtimepicker').datetimepicker({

        format: 'HH:mm',
		
		changeTime: function() {
		
		alert("dd");

      }
});  */



    $("input[name=incident_report]:radio").click(function () {
        if ($('input[name=incident_report]:checked').val() == "yes") {
            $('#incident_count').show();
			
			var date = $("#example1").val();
			var site = $("#site_val").val();
			
			  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getIncidentcount') }}',
				data: { site: site, date: date},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  $("#incident_count_val").val(response["count"]);    
				}  
        });
		

        } else {
             $('#incident_count').hide();
			 $("#incident_count_val").val("0");
			 
        }
    });
	
	 $("input[name=break_dwn_report]:radio").click(function () {
        if ($('input[name=break_dwn_report]:checked').val() == "yes") {
            $('#breakdown_count').show();
			
			var date = $("#example1").val();
			var site = $("#site_val").val();
			
			  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getbreakdowncount') }}',
				data: { site: site, date: date},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  $("#breakdown_count_val").val(response["count"]);    
				}  
        });
		

        } else {
             $('#breakdown_count').hide();
			 $("#breakdown_count_val").val("0");
			
        }
    });
	
	 $("input[name=job_card_report]:radio").click(function () {
        if ($('input[name=job_card_report]:checked').val() == "yes") {
            $('#jobcard_count').show();
			
			var date = $("#example1").val();
			var site = $("#site_val").val();
			
			  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getjobcardcount') }}',
				data: { site: site, date: date},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  $("#jobcard_count_val").val(response["count"]);    
				}  
        });

        } else {
             $('#jobcard_count').hide();
			  $("#jobcard_count_val").val("0");
        }
    });
 




$("#example1").datepicker({



 dateFormat: "dd-mm-yy",
  maxDate: '-1',



  onSelect: function(dateText) {



    alert("Selected date: " + dateText + "; input's current value: " + this.value);



	



	var site = $("#site_val").val();



	



	 window.location.href = "/getdailyreportdetaildate/"+site+"/"+dateText; 



	  



  }



});







 $("#pwrtotlt").keyup(function(){



           var res = 0;



          var ctpt = $("#pwrctpt").val();



		 var loss = $("#pwrtotlt").val();



		  if(ctpt == ""){ ctpt = 0;



		  }



		  if(loss == ""){ loss = 0;



		  }



		 if(ctpt == "" && loss == "") { res = 0;}



		  res = parseFloat(ctpt) - parseFloat(loss);



       $("#pwrloss").val(parseFloat(res))



    });



	



	 $("#pwrctpt").keyup(function(){



	      var res = 0;



          var ctpt = $("#pwrctpt").val();



		 var loss = $("#pwrtotlt").val();



		  if(ctpt == ""){ ctpt = 0;



		  }



		  if(loss == ""){ loss = 0;



		  }



		  if(ctpt == "" && loss == "") { res = 0;}



		 var res = parseFloat(ctpt) - parseFloat(loss);



        $("#pwrloss").val(parseFloat(res));



    });



	



	

/*

	 $("#wspbores").keyup(function(){



	      var res = 0;



          var br = $("#wspbores").val();



		 var tank = $("#wsptankers").val();



		 var metro = $("#wspmetro").val();



		  if(br == ""){ br = 0;



		  }



		  if(tank == ""){ tank = 0;



		  }



		   if(metro == ""){ metro = 0;



		  }



		  if(br == "" && tank == "" && metro == "") { res = 0;}



		 var res = parseFloat(br) + parseFloat(tank) + parseFloat(metro);



        $("#totwspwater").val(parseFloat(res));



    });



	 $("#wspmetro").keyup(function(){



	      var res = 0;



          var br = $("#wspbores").val();



		 var tank = $("#wsptankers").val();



		 var metro = $("#wspmetro").val();



		  if(br == ""){ br = 0;



		  }



		  if(tank == ""){ tank = 0;



		  }



		   if(metro == ""){ metro = 0;



		  }



		  if(br == "" && tank == "" && metro == "") { res = 0;}



		 var res = parseFloat(br) + parseFloat(tank) + parseFloat(metro);



        $("#totwspwater").val(parseFloat(res));



    });



	 $("#wsptankers").keyup(function(){



	      var res = 0;



          var br = $("#wspbores").val();



		 var tank = $("#wsptankers").val();



		 var metro = $("#wspmetro").val();



		  if(br == ""){ br = 0;



		  }



		  if(tank == ""){ tank = 0;



		  }



		   if(metro == ""){ metro = 0;



		  }



		  if(br == "" && tank == "" && metro == "") { res = 0;}



		 var res = parseFloat(br) + parseFloat(tank) + parseFloat(metro);



        $("#totwspwater").val(parseFloat(res));



    });*/


 $( "#dset_dieselconsume" ).focus(function() {
 var val = $("#dgset_pwrfailure").val();

 if(val == "" || val == "00:00"){
 }
  else {
   $("#sectionModal").modal();
   }
}); 


/*$( "#dgset_pwrfailure" ).focus(function() {
 
   $("#sectionModal2").modal();
});*/ 
	

 var site = "<?php  echo $sitevv; ?>";

 var erflag = false;

 

 var count = 0;

 

 

$("#pwrctpt").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_ctpt'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg").html("");

				$("#pwrctpt").removeClass("errind");

				//$("#errorblk").hide();

				 erflag = false;

				}else{

				//alert(msg);

				$("#ermsg").html(msg);

				$("#pwrctpt").addClass("errind");

				//$("#errorblk").show();

				erflag = true;

				// alert(erflag);

				

				}

					if(erflag == true){

					//$("#errorblk").show();

					count = count + 1;

					} else{

					//$("#errorblk").hide();

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

 





 

 $("#pwr_residents").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_residents'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_residents").html("");

				$("#pwr_residents").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_residents").html(msg);

				$("#pwr_residents").addClass("errind");

				 erflag = true;

				}

				   if(erflag == true){

					//$("#errorblk").show();

					count = count + 1;

					} else{

					//$("#errorblk").hide();

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

 

 $("#pwr_club_house").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_club_house'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_club_hs").html("");

				$("#pwr_club_house").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_club_hs").html(msg);

				$("#pwr_club_house").addClass("errind");

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

 

 

 $("#pwr_stp").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_stp'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_stp").html("");

				$("#pwr_stp").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_stp").html(msg);

				$("#pwr_stp").addClass("errind");

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

 

 $("#pwr_wsp").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_wsp'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_wsp").html("");

				$("#pwr_wsp").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_wsp").html(msg);

				$("#pwr_wsp").addClass("errind");

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

 

 $("#pwr_lifts").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_lifts'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_lifts").html("");

				$("#pwr_lifts").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_lifts").html(msg);

				$("#pwr_lifts").addClass("errind");

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

 

 

 $("#pwr_vendors").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_vendors'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_vendor").html("");

				$("#pwr_vendors").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_vendor").html(msg);

				$("#pwr_vendors").addClass("errind");

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

 

 

 $("#pwr_common_area").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'pwr_common_area'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_com_area").html("");

				$("#pwr_common_area").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_com_area").html(msg);

				$("#pwr_common_area").addClass("errind");

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

	 

	 

	 

	 $("#stp_avg_treat_water").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'stp_avg_treat_water'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_avg_tw").html("");

				$("#stp_avg_treat_water").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_avg_tw").html(msg);

				$("#stp_avg_treat_water").addClass("errind");

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

 

 

  $("#othser_swim_ph").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'othser_swim_ph'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_swim_ph").html("");

				$("#othser_swim_ph").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_swim_ph").html(msg);

				$("#othser_swim_ph").addClass("errind");

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

 

 

  $("#othser_watbody_ph").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'othser_watbody_ph'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_wb_ph").html("");

				$("#othser_watbody_ph").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_wb_ph").html(msg);

				$("#othser_watbody_ph").addClass("errind");

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

 

 

   $("#wspmetro").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'wspmetro'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_metro").html("");

				$("#wspmetro").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_metro").html(msg);

				$("#wspmetro").addClass("errind");

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

 

 

 $("#othser_gas_borewells").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'othser_gas_borewells'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_borewells").html("");

				$("#othser_gas_borewells").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_borewells").html(msg);

				$("#othser_gas_borewells").addClass("errind");

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

 

 

  $("#dgset_notworking").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'dgset_notworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_dgsets").html("");

				$("#dgset_notworking").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_dgsets").html(msg);

				$("#dgset_notworking").addClass("errind");

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

 

 

 

 $("#othser_lifts_nw").change(function(){

  



    var othser_lifts_nw = 0;

	var othser_lifts_ser = 0;

	var othser_lifts_bdser = 0;

	

    if($("#othser_lifts_nw").val() == ""){}else{ othser_lifts_nw = $("#othser_lifts_nw").val()}

	if($("#othser_lifts_ser").val() == ""){}else{ othser_lifts_ser = $("#othser_lifts_ser").val()}

	if($("#othser_lifts_bdser").val() == ""){}else{ othser_lifts_bdser = $("#othser_lifts_bdser").val()}

	



	var res = parseFloat(othser_lifts_nw) +  parseFloat(othser_lifts_ser) + parseFloat(othser_lifts_bdser);

	

			 $.ajax({ 

				type: "get", 

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: res, site: site, field:'othser_lifts_nw'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_lifts").html("");

				$(".liftsClass").removeClass("errind");

				erflag = false; 

				}else{

				//alert(msg);

				$("#ermsg_lifts").html(msg);

				$("#othser_lifts_nw").addClass("errind");

				

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

	

	

	$("#othser_lifts_ser").change(function(){

  



    var othser_lifts_nw = 0;

	var othser_lifts_ser = 0;

	var othser_lifts_bdser = 0;

	

    if($("#othser_lifts_nw").val() == ""){}else{ othser_lifts_nw = $("#othser_lifts_nw").val()}

	if($("#othser_lifts_ser").val() == ""){}else{ othser_lifts_ser = $("#othser_lifts_ser").val()}

	if($("#othser_lifts_bdser").val() == ""){}else{ othser_lifts_bdser = $("#othser_lifts_bdser").val()}

	



	var res = parseFloat(othser_lifts_nw) +  parseFloat(othser_lifts_ser) + parseFloat(othser_lifts_bdser);

	

			 $.ajax({ 

				type: "get", 

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: res, site: site, field:'othser_lifts_ser'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_lifts").html("");

				$(".liftsClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_lifts").html(msg);

				$("#othser_lifts_ser").addClass("errind");

				

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

 

 	$("#othser_lifts_bdser").change(function(){

  



    var othser_lifts_nw = 0;

	var othser_lifts_ser = 0;

	var othser_lifts_bdser = 0;

	

    if($("#othser_lifts_nw").val() == ""){}else{ othser_lifts_nw = $("#othser_lifts_nw").val()}

	if($("#othser_lifts_ser").val() == ""){}else{ othser_lifts_ser = $("#othser_lifts_ser").val()}

	if($("#othser_lifts_bdser").val() == ""){}else{ othser_lifts_bdser = $("#othser_lifts_bdser").val()}

	



	var res = parseFloat(othser_lifts_nw) +  parseFloat(othser_lifts_ser) + parseFloat(othser_lifts_bdser);

	

			 $.ajax({ 

				type: "get", 

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: res, site: site, field:'othser_lifts_bdser'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_lifts").html("");

				$(".liftsClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_lifts").html(msg);

				$("#othser_lifts_bdser").addClass("errind");

				

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

	

	

	

   $("#othser_gas_empty").change(function(){

  



    var othser_gas_empty = 0;

	var othser_gas_full = 0;

	var othser_gas_running = 0;

	

    if($("#othser_gas_empty").val() == ""){}else{ othser_gas_empty = $("#othser_gas_empty").val()}

	if($("#othser_gas_full").val() == ""){}else{ othser_gas_full = $("#othser_gas_full").val()}

	if($("#othser_gas_running").val() == ""){}else{ othser_gas_running = $("#othser_gas_running").val()}

	



	var res = parseFloat(othser_gas_empty) +  parseFloat(othser_gas_full) + parseFloat(othser_gas_running);

	

			 $.ajax({ 

				type: "get", 

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: res, site: site, field:'othser_gas_empty'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_gascy").html("");

				$(".gasClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_gascy").html(msg);

				$("#othser_gas_empty").addClass("errind");

				

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

 

 

  $("#othser_gas_full").change(function(){

  



    var othser_gas_empty = 0;

	var othser_gas_full = 0;

	var othser_gas_running = 0;

	

    if($("#othser_gas_empty").val() == ""){}else{ othser_gas_empty = $("#othser_gas_empty").val()}

	if($("#othser_gas_full").val() == ""){}else{ othser_gas_full = $("#othser_gas_full").val()}

	if($("#othser_gas_running").val() == ""){}else{ othser_gas_running = $("#othser_gas_running").val()}

	



	var res = parseFloat(othser_gas_empty) +  parseFloat(othser_gas_full) + parseFloat(othser_gas_running);

	

			 $.ajax({ 

				type: "get",  

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: res, site: site, field:'othser_gas_full'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_gascy").html("");

				$(".gasClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_gascy").html(msg);

				$("#othser_gas_full").addClass("errind");

				

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

 

 

   $("#othser_gas_running").change(function(){

  



    var othser_gas_empty = 0;

	var othser_gas_full = 0;

	var othser_gas_running = 0;

	

    if($("#othser_gas_empty").val() == ""){}else{ othser_gas_empty = $("#othser_gas_empty").val()}

	if($("#othser_gas_full").val() == ""){}else{ othser_gas_full = $("#othser_gas_full").val()}

	if($("#othser_gas_running").val() == ""){}else{ othser_gas_running = $("#othser_gas_running").val()}

	



	var res = parseFloat(othser_gas_empty) +  parseFloat(othser_gas_full) + parseFloat(othser_gas_running);

	

			 $.ajax({ 

				type: "get",  

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: res, site: site, field:'othser_gas_running'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_gascy").html("");

				$(".gasClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_gascy").html(msg);

				$("#othser_gas_running").addClass("errind");

				

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

 

  

 

    $("#totwspwater").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false, 

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'wsptankers'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_tot_water").html("");

				$("#totwspwater").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_tot_water").html(msg);

				$("#totwspwater").addClass("errind");

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

   

  /* $("#wspbores").change(function(){

	var checkval = $(this).val();		

			 $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.valid') }}',

				data: { checkval: checkval, site: site, field:'wspbores'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_tot_water").html("");

				$("#totwspwater").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_tot_water").html(msg);

				$("#totwspwater").addClass("errind");

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

 	

 });*/

 

 



});



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
	
	 if ($('input[name=incident_report]:checked').val() == "yes") {
			if(parseInt($("#incident_count_val").val()) > 0){}
			else{
			   flag = false;
			   alert("Enter Incident Reports");
			}
		
      }
	  
	   if ($('input[name=break_dwn_report]:checked').val() == "yes") {
			if(parseInt($("#breakdown_count_val").val()) > 0){}
			else{
			   flag = false;
			   alert("Enter Breakdown Reports");
			}
		
      }
	  
	   if ($('input[name=job_card_report]:checked').val() == "yes") {
			if(parseInt($("#jobcard_count_val").val()) > 0){}
			else{
			   flag = false;
			   alert("Enter Jobcard Reports");
			}
		
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

	

	

	

/*	if ($('.verify:checked').length == 0) {

	

	 alert("Please check the required Check Lists")

	 flag = false;

	}*/

	

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
 
 
 

 
function getDeiselsum(){


 var n = 0;
 $( ".dgsum" ).each(function( index ) {
  console.log( index + ": " + $( this ).text() );
  if(parseFloat($( this ).val()) > 0) {
   if(isNaN($( this ).val())){
   } else{
   	 n = parseFloat(n) + parseFloat($( this ).val());
   } 
   }  
   
});    

 $("#dset_dieselconsume").val(n);
 $("#sectionModal").modal('hide');
      
}    

function getfinaltime(){
 
var string =  "";
var thrs = 0;
var tmins = 0;
var fmins= 0; 

 $( ".hrsum" ).each(function( index ) {
  console.log( index + ": " + $( this ).text() );
  
  //alert(index + ": " + $( this ).val() );
   
   if($( this ).val() == ""){}else{
        string = $( this ).val();
      var array = string.split(":");  
	   hr = array[0];
	   mins = array[1];    
	   thrs = parseFloat(thrs) + parseFloat(hr);
	   tmins = parseFloat(tmins) + parseFloat(mins);
	   
	   
	      //alert(index + ": " + tmins);
		    
   }
});


var ffhours = 0;
var ffmin = 0;

 if(parseFloat(thrs) > 0){
 	 fmins = parseFloat(thrs) * 60;
	 fmins = parseFloat(fmins) + parseFloat(tmins);
	 ffhours = Math.floor(fmins / 60);
	 ffmin = parseFloat(fmins) % 60;
 } 

  
  if(parseFloat(ffhours) < 10 || parseFloat(ffhours) == 0) {
  	ffhours = "0"+ffhours;
  }
   if(parseFloat(ffmin) < 10 || parseFloat(ffmin) == 0) {
  	ffmin = "0"+ffmin;
  }
  
  var finaltime = ffhours + ":" +ffmin;
   $("#finalhours").html(finaltime);
   
   var dguns= 0; 

 $( ".dguns" ).each(function( index ) {
  console.log( index + ": " + $( this ).text() );
  
  //alert(index + ": " + $( this ).val() );
   
   if($( this ).val() == ""){}else{
      var  string = $( this ).val();
     
	   dguns = parseFloat(dguns) + parseFloat(string);
   }
});

$("#finalunits").html(dguns);
$("#dgset_dgunits").val(dguns);  
   
} 
      
	  
function getfinalconsump(){
 

var dgun= 0; 

 $( ".dgsum" ).each(function( index ) {
  console.log( index + ": " + $( this ).text() );
  
  //alert(index + ": " + $( this ).val() );
   
   if($( this ).val() == ""){}else{
      var  string = $( this ).val();
     
	   dgun = parseFloat(dgun) + parseFloat(string);
   }
});

   $("#finalconsump").html(dgun);
  
}



function updatebreakdownval(){

  	var date = $("#example1").val();
			var site = $("#site_val").val();
			
			  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getbreakdowncount') }}',
				data: { site: site, date: date},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  $("#breakdown_count_val").val(response["count"]);    
				}  
        });
		
}



function updateincidentval(){

  	var date = $("#example1").val();
			var site = $("#site_val").val();
			
			  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getIncidentcount') }}',
				data: { site: site, date: date},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  $("#incident_count_val").val(response["count"]);    
				}  
        });
		
}


function updatejobcardval(){

  	var date = $("#example1").val();
			var site = $("#site_val").val();
			
			  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getjobcardcount') }}',
				data: { site: site, date: date},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  $("#jobcard_count_val").val(response["count"]);    
				}  
        });
		
}
      
  
  function getcompsum(){
    
    var comp_electrical_tot = 0;
	var comp_electrical_close = 0;
	var comp_plumbing_tot = 0;
	var comp_plumbing_close = 0;
	var comp_lifts_tot = 0;
	var comp_lifts_close = 0;
	var comp_carpentary_tot = 0;
	var comp_carpentary_close = 0;
	var comp_gas_tot = 0;
	var comp_gas_close = 0;
	var comp_civil_tot = 0;
	var comp_civil_close = 0;
	var comp_ss_tot = 0;
	var comp_ss_close = 0;
	var comp_other_tot = 0;
	var comp_other_close = 0;

	

    if($("#comp_electrical_tot").val() == ""){}else{ comp_electrical_tot = $("#comp_electrical_tot").val()}
	if($("#comp_electrical_close").val() == ""){}else{ comp_electrical_close = $("#comp_electrical_close").val()}
	if($("#comp_plumbing_tot").val() == ""){}else{ comp_plumbing_tot = $("#comp_plumbing_tot").val()}
	
	 if($("#comp_plumbing_close").val() == ""){}else{ comp_plumbing_close = $("#comp_plumbing_close").val()}
	if($("#comp_lifts_tot").val() == ""){}else{ comp_lifts_tot = $("#comp_lifts_tot").val()}
	if($("#comp_lifts_close").val() == ""){}else{ comp_lifts_close = $("#comp_lifts_close").val()}
	
	 if($("#comp_carpentary_tot").val() == ""){}else{ comp_carpentary_tot = $("#comp_carpentary_tot").val()}
	if($("#comp_carpentary_close").val() == ""){}else{ comp_carpentary_close = $("#comp_carpentary_close").val()}
	if($("#comp_gas_tot").val() == ""){}else{ comp_gas_tot = $("#comp_gas_tot").val()}
	
	 if($("#comp_gas_close").val() == ""){}else{ comp_gas_close = $("#comp_gas_close").val()}
	if($("#comp_civil_tot").val() == ""){}else{ comp_civil_tot = $("#comp_civil_tot").val()}
	if($("#comp_civil_close").val() == ""){}else{ comp_civil_close = $("#comp_civil_close").val()}

	 if($("#comp_ss_tot").val() == ""){}else{ comp_ss_tot = $("#comp_ss_tot").val()}
	if($("#comp_ss_close").val() == ""){}else{ comp_ss_close = $("#comp_ss_close").val()}
	if($("#comp_other_tot").val() == ""){}else{ comp_other_tot = $("#comp_other_tot").val()}
	if($("#comp_other_close").val() == ""){}else{ comp_other_close = $("#comp_other_close").val()}
	
	var closeval = parseFloat(comp_electrical_close) +  parseFloat(comp_plumbing_close) + parseFloat(comp_lifts_close) + parseFloat(comp_carpentary_close) + parseFloat(comp_gas_close) +   parseFloat(comp_civil_close) + parseFloat(comp_ss_close) + parseFloat(comp_other_close);
	
	var totval = parseFloat(comp_electrical_tot) +  parseFloat(comp_plumbing_tot) + parseFloat(comp_lifts_tot) + parseFloat(comp_carpentary_tot) + parseFloat(comp_civil_tot) +   parseFloat(comp_ss_tot) + parseFloat(comp_gas_tot) + parseFloat(comp_other_tot);
	

	$("#complres").html(closeval+"/"+totval);
	
  } 
     

  </script>

@include('partials.footer')
  



@stop