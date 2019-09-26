@extends('layouts.appnew')





  





@section('content')



<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">



 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>



  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  







       <!-- Bootstrap -->

  





    <link rel="icon" href="images/ICON.png">







    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">







    <!-- Font Awesome -->







    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">







    <!-- NProgress -->







   







    <!-- iCheck -->







   







    <!-- Datatables -->







    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">















    <!-- Custom Theme Style -->







    <link href="build/css/custom.css" rel="stylesheet">







  <link media="all" type="text/css" rel="stylesheet" href="http://hrms.recurringbillingsystem.com/assets/third/summernote/summernote.css">





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







 font-weight:400;







}



.error
{
	border:2px solid #FF0000 !important;
}



h5







{







 margin-bottom: 10px;







 margin-top: 26px;







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







.especially-heading h4







{







 margin-top:16px;







 font-size:14px;







	color:#fff;







}







.especially-heading







{







 padding-left:0px !important;







}







.for-labelling label







{







 margin-top:7px;







 padding-left:0px;







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







.daily select







{







 width:100%;







 height:30px







}







.briefying







{







 padding-left:0px !important;







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







}







.for-list







{







 padding-left:0px !important;







}







.for-list ul







{







 list-style:none;







 padding-left:0px;







}







.fro-pro-check







{







 padding-left:0px !important;







 margin-top:10px;







}







.for-height







{







 height:47px;







}







.border-color







{







 border-bottom:2px solid #E6E9ED;







 padding-bottom:10px;







 padding-top:8px;







}







.for-violations







{







 padding-top:10px;







}













.additional-information

{

 clear:both;

}









.form-control







{







 border:1px solid #000;







}







.light-back







{







background-color:#ffc10724;







padding-bottom: 2px;







}







.light-back1







{







background-color:#f9f7f7;







padding-bottom: 2px;







}

.back-button

{

 margin-bottom:13px;

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

.night-checked-by, .night-check-duty

{

 width:11%;

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

.security-repooort

{

 margin-bottom:60px;

}

.additional-information textarea.form-control

{

 margin-bottom:5px;

}

.night-checked-by input[type="radio"]

{

 margin-right:4px;

}

	</style>







<div class="body">







      <div class="main_container">







   







        <!-- /top navigation -->















        <!-- page content -->







        <div class="right_col" role="main">







          <div class="models">







            <div class="clearfix"></div>







	

									       <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 



									$sitevv = $uriSegments[2]; ?>





			

            

             <?php if($uriSegments[1] == 'getsecuritydailyreportdetaildate') { ?>

              <div class="back-button pull-right secuirty-back"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>

              <?php }else { ?>

			 <div class="back-button pull-right secuirty-back"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[4];  ?>">Back</a></div> <?php } ?>



	       







            <div class="row">







              <div class="col-md-12 col-sm-12 col-xs-12 security-repooort">







                <div class="x_panel">







             







                  <div class="x_content">



				  



				    <div class="errormsgval" style="display:none" id="errorblk" >



				 



                  <p id="ermsg_cctv"></p>



				  <p id="ermsg_bb"></p>



				  <p id="ermsg_wt"></p>



				  <p id="ermsg_torchs"></p>



				  <p id="ermsg_biomachine"></p>



				  <p id="ermsg_tabs"></p>



				  <p id="ermsg_whistles"></p>



				   <p id="ermsg_batons"></p>



				   <p id="ermsg_rainc"></p>



				   <p id="ermsg_umbrella"></p>



				   <p id="ermsg_idmaid"></p>



				    <p id="ermsg_drivers"></p>



					<p id="ermsg_vendors"></p>



					<p id="ermsg_interior"></p>



					<p id="ermsg_other"></p>



				



				  </div>







<!------------------------------------------------duties---------------------------------------------->







 







					



						{!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storesecurity'], 'class' => 'for-labelling','onsubmit' =>"return subform()"]) !!}







					 







						







						<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 







									$sitevv = $uriSegments[2]; 







									$date = date("d-m-Y");

									 $dateval = date('Y-m-d');

									 $date =  date('d-m-Y', strtotime($dateval .' -1 day'));







									if(isset($uriSegments[3])){







									   if($uriSegments[1] != 'getdailyreport'){







									  $date = $uriSegments[3];







									  }



                                      else{

									     $date = $uriSegments[4];

									  }





									} else{







									 $date = date("d-m-Y");

									  $date = $uriSegments[4]; 







									} 









						?> 







							<div class="row aparnaaura security">	<div class="col-sm-6 col-xs-6 text"><?php echo get_sitename($sitevv);







						?></div>







						<div class="col-sm-6 col-xs-6 box"><span>Date:</span> <input type="text" name="reporton" id="example1" value="<?php echo $date; ?>" class="hasDatePicker form-control"></div></div>



                            <div class="row x_title">







                     <span class="col-sm-12 col-xs-12 secuirty-daily-report">Security Daily Report </span>











                  </div>



                         <input type="hidden" name="user_id" value="<?php  echo Auth::user()->id; ?>">







						 <input type="hidden" name="record_id" value="<?php  echo $res['id'] ?>">







						 <input type="hidden" name="site" value="<?php echo $sitevv ?>" id="site_val"> 







					







                	







						  







                  	<div class="row border-color light-back duties"> 







                    	<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing duties-scheduled" style="padding-left:0px;">Duties Scheduled</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                        {!! Form::text('ds_guard', $res['ds_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                          {!! Form::text('ds_lguard', $res['ds_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head\ Guard </label>







                                          {!! Form::text('ds_hguard', $res['ds_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                        {!! Form::text('ds_sup', $res['ds_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                          {!! Form::text('ds_aso', $res['ds_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                          {!! Form::text('ds_so',$res['ds_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                        {!! Form::text('ds_remarks', $res['ds_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2 duties-performed" style="padding-left:0px;">Duties Performed</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	 <label class="label-guard">Guard</label>







                                          {!! Form::text('dp_guard', $res['dp_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      <label class="label-ladyguard">Lady Guard</label>







                                         {!! Form::text('dp_lguard',$res['dp_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	

                                         <label class="label-headguard">Head\ Guard </label>





                                         {!! Form::text('dp_hguard', $res['dp_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	

                                         <label class="label-sup">SUP</label>





                                         {!! Form::text('dp_sup', $res['dp_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">



                                          <label class="label-aso">A.S.O</label>



                                         {!! Form::text('dp_aso', $res['dp_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">



                                           <label class="label-so">S.O</label>



                                          {!! Form::text('dp_so', $res['dp_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">



                                           <label class="label-remark">Remarks</label>



                                          {!! Form::text('dp_remarks', $res['dp_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2 ph-attnedance" style="padding-left:0px;">Ph Attendance</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	

                                          <label class="label-guard">Guard</label>





                                         {!! Form::text('pha_guard', $res['pha_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                        <label class="label-ladyguard">Lady Guard</label>







                                         {!! Form::text('pha_lguard', $res['pha_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	

                                        <label class="label-headguard">Head\ Guard </label>





                                       {!! Form::text('pha_hguard', $res['pha_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">





                                         <label class="label-sup">SUP</label>

                                      	







                                       {!! Form::text('pha_sup', $res['pha_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label aso">













                                        <label class="label-aso">A.S.O</label>

                                      	







                                       {!! Form::text('pha_aso', $res['pha_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	 <label class="label-so">S.O</label>







                                       {!! Form::text('pha_so', $res['pha_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      <label class="label-remark">Remarks</label>







                                       {!! Form::text('pha_remarks', $res['pha_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>



                               <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2 reserved" style="padding-left:0px;">Reserved</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">





                                        <label class="label-guard">Guard</label>

                                      	







                                       {!! Form::text('rsv_guard', $res['rsv_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('rsv_lguard', $res['rsv_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	 <label class="label-headguard">Head\ Guard </label>







                                       {!! Form::text('rsv_hguard', $res['rsv_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('rsv_sup', $res['rsv_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                          <label class="label-aso">A.S.O</label>





                                       {!! Form::text('rsv_aso',$res['rsv_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	 <label class="label-so">S.O</label>







                                       {!! Form::text('rsv_so', $res['rsv_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">





                                         <label class="label-remark">Remarks</label>

                                      







                                       {!! Form::text('rsv_remarks', $res['rsv_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>



                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2 weekly-off" style="padding-left:0px;">Weekly off</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	

                                          <label class="label-guard">Guard</label>





                                       {!! Form::text('wko_guard', $res['wko_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">





                                         <label class="label-ladyguard">Lady Guard</label>

                                      







                                       {!! Form::text('wko_lguard', $res['wko_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">





                                         <label class="label-headguard">Head\ Guard </label>

                                      	







                                       {!! Form::text('wko_hguard', $res['wko_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('wko_sup', $res['wko_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                         <label class="label-aso">A.S.O</label>





                                       {!! Form::text('wko_aso', $res['wko_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	 <label class="label-so">S.O</label>







                                       {!! Form::text('wko_so',$res['wko_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      <label class="label-remark">Remarks</label>







                                       {!! Form::text('wko_remarks', $res['wko_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2 absent" style="padding-left:0px;">Absent</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	  <label class="label-guard">Guard</label>







                                       {!! Form::text('ab_guard', $res['ab_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">





                                        <label class="label-ladyguard">Lady Guard</label>

                                      







                                       {!! Form::text('ab_lguard', $res['ab_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">





                                          <label class="label-headguard">Head\ Guard </label>

                                      	







                                       {!! Form::text('ab_hguard', $res['ab_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">





                                           <label class="label-sup">SUP</label>

                                      	







                                       {!! Form::text('ab_sup', $res['ab_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                       <label class="label-aso">A.S.O</label>





                                       {!! Form::text('ab_aso', $res['ab_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">





                                            <label class="label-so">S.O</label>

                                      	







                                       {!! Form::text('ab_so', $res['ab_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      <label class="label-remark">Remarks</label>







                                       {!! Form::text('ab_remarks', $res['ab_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1 trsnaformation">







                                  <label class="control-label col-sm-2 col-xs-2 transfer-from-other" style="padding-left:0px;">Transfer from other sites</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	 <label class="label-guard">Guard</label>







                                       {!! Form::text('tfo_guard', $res['tfo_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('tfo_lguard', $res['tfo_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">





                                         <label class="label-headguard">Head\ Guard </label>

                                      	







                                       {!! Form::text('tfo_hguard', $res['tfo_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	

                                        <label class="label-sup">SUP</label>





                                       {!! Form::text('tfo_sup',$res['tfo_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label class="label-aso">A.S.O</label>







                                       {!! Form::text('tfo_aso',$res['tfo_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	 <label class="label-so">S.O</label>







                                       {!! Form::text('tfo_so', $res['tfo_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      <label class="label-remark">Remarks</label>







                                       {!! Form::text('tfo_remarks', $res['tfo_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2 transfer-to-other" style="padding-left:0px;">Transfer to other sites</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	 <label class="label-guard">Guard</label>







                                       {!! Form::text('tto_guard', $res['tto_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('tto_lguard', $res['tto_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	

                                          <label class="label-headguard">Head\ Guard </label>





                                       {!! Form::text('tto_hguard', $res['tto_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('tto_sup', $res['tto_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label class="label-aso">A.S.O</label>







                                       {!! Form::text('tto_aso', $res['tto_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">





                                       <label class="label-so">S.O</label>

                                      	







                                       {!! Form::text('tto_so', $res['tto_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      

                                       <label class="label-remark">Remarks</label>





                                       {!! Form::text('tto_remarks', $res['tto_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                </div>







 <!------------------------------------------------duties---------------------------------------------->                               







 <!------------------------------------------------day-night---------------------------------------------->                               







                                







                                <div class="row border-color light-back1">







                    			<div class="col-sm-12 col-xs-12 fro-pro1 day-night">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Day Shift</label>







                                 <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                       {!! Form::text('dsh_guard', $res['dsh_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                       {!! Form::text('dsh_lguard', $res['dsh_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head\ Guard </label>







                                       {!! Form::text('dsh_hguard', $res['dsh_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                       {!! Form::text('dsh_sup', $res['dsh_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                       {!! Form::text('dsh_aso', $res['dsh_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                       {!! Form::text('dsh_so', $res['dsh_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('dsh_remarks', $res['dsh_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1 for-labelling day-night">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd" style="padding-left:0px;">Night Shift</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label class="label-guard">Guard</label>







                                       {!! Form::text('nsh_guard', $res['nsh_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">





                                         <label class="label-ladyguard">Lady Guard</label>

                                      







                                       {!! Form::text('nsh_lguard', $res['nsh_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	 <label class="label-headguard">Head\ Guard </label>







                                       {!! Form::text('nsh_hguard', $res['nsh_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('nsh_sup', $res['nsh_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">





                                       <label class="label-aso">A.S.O</label>

                                      	







                                       {!! Form::text('nsh_aso', $res['nsh_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	

                                       <label class="label-so">S.O</label>





                                       {!! Form::text('nsh_so', $res['nsh_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      

                                          <label class="label-remark">Remarks</label>





                                       {!! Form::text('nsh_remarks', $res['nsh_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                </div>







  <!------------------------------------------------day-night---------------------------------------------->







   <!------------------------------------------------less-than---------------------------------------------->                               







                             <div class="row border-color light-back less-than">







                    			<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Less than 20 Yrs</label>







                                 <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                       {!! Form::text('lt20_guard', $res['lt20_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                       {!! Form::text('lt20_lguard', $res['lt20_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head\ Guard </label>







                                       {!! Form::text('lt20_hguard', $res['lt20_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                       {!! Form::text('lt20_sup', $res['lt20_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                       {!! Form::text('lt20_aso', $res['lt20_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                       {!! Form::text('lt20_so', $res['lt20_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('lt20_remarks', $res['lt20_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1 for-labelling">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd" style="padding-left:0px;">Less than 50 Kgs</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	

                                      <label class="label-guard">Guard</label>





                                       {!! Form::text('lt50_guard', $res['lt50_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      

                                        <label class="label-ladyguard">Lady Guard</label>





                                       {!! Form::text('lt50_lguard', $res['lt50_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	



                                          <label class="label-headguard">Head\ Guard </label>



                                       {!! Form::text('lt50_hguard', $res['lt50_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	

                                     <label class="label-sup">SUP</label>





                                       {!! Form::text('lt50_sup', $res['lt50_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                       <label class="label-aso">A.S.O</label>





                                       {!! Form::text('lt50_aso', $res['lt50_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	

                                      <label class="label-so">S.O</label>





                                       {!! Form::text('lt50_so', $res['lt50_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                       <label class="label-remark">Remarks</label>







                                       {!! Form::text('lt50_remarks', $res['lt50_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1 for-labelling">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd" style="padding-left:0px;">Less than 5'2"</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">





                                       <label class="label-guard">Guard</label>

                                      	







                                       {!! Form::text('lt52_guard', $res['lt52_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard"> 







                                       <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('lt52_lguard', $res['lt52_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">





                                        <label class="label-headguard">Head\ Guard </label>

                                      	







                                       {!! Form::text('lt52_hguard', $res['lt52_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	



                                          <label class="label-sup">SUP</label>



                                       {!! Form::text('lt52_sup', $res['lt52_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                       <label class="label-aso">A.S.O</label>





                                       {!! Form::text('lt52_aso', $res['lt52_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	

                                       <label class="label-so">S.O</label>





                                       {!! Form::text('lt52_so', $res['lt52_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      

                                         <label class="label-remark">Remarks</label>





                                       {!! Form::text('lt52_remarks', $res['lt52_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                </div>







 <!------------------------------------------------less-than----------------------------------------------> 







  <!------------------------------------------------fire-fighting---------------------------------------------->  







                           <div class="row border-color light-back1 knows-fire">







                    			<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing fire-fighting" style="padding-left:0px;">Knows Fire Fighting</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                       {!! Form::text('kff_guard', $res['kff_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                       {!! Form::text('kff_lguard',$res['kff_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head\ Guard </label>







                                       {!! Form::text('kff_hguard', $res['kff_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                       {!! Form::text('kff_sup', $res['kff_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                       {!! Form::text('kff_aso', $res['kff_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                       {!! Form::text('kff_so', $res['kff_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('kff_remarks', $res['kff_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div> 







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1 for-labelling">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd" style="padding-left:0px;">Day Shift</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label class="label-guard">Guard</label>







                                       {!! Form::text('kdsh_guard', $res['kdsh_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                       <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('kdsh_lguard', $res['kdsh_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	 <label class="label-headguard">Head\ Guard </label>







                                       {!! Form::text('kdsh_hguard', $res['kdsh_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('kdsh_sup', $res['kdsh_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	



                                       <label class="label-aso">A.S.O</label>



                                       {!! Form::text('kdsh_aso', $res['kdsh_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label class="label-so">S.O</label>







                                       {!! Form::text('kdsh_so', $res['kdsh_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                       <label class="label-remark">Remarks</label>







                                       {!! Form::text('kdsh_remarks', $res['kdsh_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                <div class="col-sm-12 col-xs-12 fro-pro1 for-labelling">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd" style="padding-left:0px;">Night Shift</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label class="label-guard">Guard</label>







                                       {!! Form::text('knsh_guard', $res['knsh_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">





                                          <label class="label-ladyguard">Lady Guard</label>

                                      







                                       {!! Form::text('knsh_lguard', $res['knsh_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">





                                          <label class="label-headguard">Head\ Guard </label>

                                      	







                                       {!! Form::text('knsh_hguard', $res['knsh_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('knsh_sup', $res['knsh_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                       <label class="label-aso">A.S.O</label>





                                       {!! Form::text('knsh_aso', $res['knsh_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	

                                        <label class="label-so">S.O</label>





                                       {!! Form::text('knsh_so', $res['knsh_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      

                                         <label class="label-remark">Remarks</label>





                                       {!! Form::text('knsh_remarks', $res['knsh_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                 







                                </div>







<!------------------------------------------------fire-fighting----------------------------------------------> 







<!------------------------------------------------additions---------------------------------------------->         







                                <div class="row border-color light-back addition-deletion">







                    			<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Additions (N.J +TR)</label>







                                 <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                       {!! Form::text('add_guard', $res['add_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                       {!! Form::text('add_lguard', $res['add_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head Guard </label>







                                       {!! Form::text('add_hguard', $res['add_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                       {!! Form::text('add_sup', $res['add_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                       {!! Form::text('add_aso',$res['add_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                       {!! Form::text('add_so', $res['add_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('add_remarks',$res['add_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2" style="padding-left:0px;">Deletions (TR +Left)</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">





                                      

                                      	



                                        <label class="label-guard">Guard</label>



                                       {!! Form::text('del_guard', $res['del_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      

                                       <label class="label-ladyguard">Lady Guard</label>





                                       {!! Form::text('del_lguard', $res['del_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label class="label-headguard">Head\ Guard </label>







                                       {!! Form::text('del_hguard', $res['del_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	

                                           <label class="label-sup">SUP</label>





                                       {!! Form::text('del_sup', $res['del_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	

                                      <label class="label-aso">A.S.O</label>





                                       {!! Form::text('del_aso', $res['del_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	

                                           	<label class="label-so">S.O</label>





                                       {!! Form::text('del_so', $res['del_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      

                                        <label class="label-remark">Remarks</label>





                                       {!! Form::text('del_remarks', $res['del_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                </div>







<!------------------------------------------------additions---------------------------------------------->  







<!------------------------------------------------without---------------------------------------------->                              







                              <div class="row border-color light-back1 uniform-shoes">







                    			<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Without Uniform</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                       {!! Form::text('wu_guard', $res['wu_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                       {!! Form::text('wu_lguard', $res['wu_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head\ Guard </label>







                                       {!! Form::text('wu_hguard', $res['wu_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                       {!! Form::text('wu_sup', $res['wu_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                       {!! Form::text('wu_aso', $res['wu_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                       {!! Form::text('wu_so', $res['wu_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('wu_remarks', $res['wu_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2" style="padding-left:0px;">Without Shoes</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">



                                       <label class="label-guard">Guard</label>



                                      	

                                        





                                       {!! Form::text('ws_guard', $res['ws_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                       <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('ws_lguard', $res['ws_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label class="label-headguard">Head\ Guard </label>







                                         {!! Form::text('ws_hguard', $res['ws_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label class="label-sup">SUP</label>







                                       {!! Form::text('ws_sup', $res['ws_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">





                                          <label class="label-aso">A.S.O</label>

                                      	







                                       {!! Form::text('ws_aso', $res['ws_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      		<label class="label-so">S.O</label>







                                       {!! Form::text('ws_so', $res['ws_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                       <label class="label-remark">Remarks</label>







                                       {!! Form::text('ws_remarks', $res['ws_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                </div>







<!------------------------------------------------without----------------------------------------------> 







<!------------------------------------------------briefing---------------------------------------------->            







                     <div class="row border-color light-back briefing-attended">







                    			<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Briefing  Mor.</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">







                                      	<label>Guard</label>







                                       {!! Form::text('bm_guard', $res['bm_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      	<label>Lady Guard</label>







                                       {!! Form::text('bm_lguard', $res['bm_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">







                                      	<label>Head Guard </label>







                                       {!! Form::text('bm_hguard', $res['bm_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	<label>SUP</label>







                                       {!! Form::text('bm_sup', $res['bm_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label>A.S.O</label>







                                       {!! Form::text('bm_aso', $res['bm_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	<label>S.O</label>







                                       {!! Form::text('bm_so',$res['bm_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('bm_remarks', $res['bm_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2" style="padding-left:0px;">Attended Eve.</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label guard">



                                      



                                      	



                                        <label class="label-guard">Guard</label>



                                       {!! Form::text('ae_guard', $res['ae_guard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label ladyguard">







                                      <label class="label-ladyguard">Lady Guard</label>







                                       {!! Form::text('ae_lguard', $res['ae_lguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label headguard">





                                           <label class="label-headguard">Head\ Guard </label>

                                      	







                                       {!! Form::text('ae_hguard', $res['ae_hguard'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label sup">







                                      	



                                        <label class="label-sup">SUP</label>



                                       {!! Form::text('ae_sup', $res['ae_sup'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label aso">







                                      	<label class="label-aso">A.S.O</label>







                                       {!! Form::text('ae_aso', $res['ae_aso'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label so">







                                      	



                                       	<label class="label-so">S.O</label>



                                       {!! Form::text('ae_so', $res['ae_so'], ['class' => 'form-control number','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-4 col-xs-4 for-margin-label remarks">







                                       <label class="label-remark">Remarks</label>







                                       {!! Form::text('ae_remarks', $res['ae_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                </div>







<!------------------------------------------------briefing---------------------------------------------->







<!------------------------------------------------not-working---------------------------------------------->







                     <div class="row border-color light-back1 cctv-boom">







                    	<div class="col-sm-12 col-xs-12 fro-pro1 nworking">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Not Working</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label cctv">







                                      	<label>CCTV</label>







                                       {!! Form::text('nw_cctv',$res['nw_cctv'], ['class' => 'form-control number', 'id' => 'nw_cctv','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label boom-b">







                                      	<label>Boom.B</label>







                                       {!! Form::text('nw_boom',$res['nw_boom'], ['class' => 'form-control number', 'id' => 'nw_boom','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label wt">







                                      	<label>W.T</label>







                                       {!! Form::text('nw_wt', $res['nw_wt'], ['class' => 'form-control', 'id' => 'nw_wt','placeholder number' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label torches">







                                      	<label>Torches</label>







                                       {!! Form::text('nw_torch', $res['nw_torch'], ['class' => 'form-control number','id' => 'nw_torch','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label bio-m">







                                      	<label>Bio.M.</label>







                                       {!! Form::text('nw_bio', $res['nw_bio'], ['class' => 'form-control number', 'id' => 'nw_bio','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-5 col-xs-5 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('nw_remarks', $res['nw_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <!--<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd">Not Working</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                       {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label">







                                      







                                       {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                       {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                       {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                       {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-5 col-xs-5 for-margin-label">







                                      







                                       {!! Form::text('pwr_ctpt', old('pwr_ctpt'), ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>-->







                                







                                







                                </div>







<!------------------------------------------------not-working---------------------------------------------->







<!------------------------------------------------available----------------------------------------------> 







                     <div class="row border-color light-back tabs-whistles">







                    	<div class="col-sm-12 col-xs-12 fro-pro1 availableno">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Available No's</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label tabs">







                                      	<label>Tabs</label>







                                       {!! Form::text('av_tab', $res['av_tab'], ['class' => 'form-control number','id' => 'av_tab','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label whistles">







                                      	<label>Whistles</label>







                                       {!! Form::text('av_whi', $res['av_whi'], ['class' => 'form-control number', 'id' => 'av_whi','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label batons">







                                      	<label>Batons</label>







                                       {!! Form::text('av_bat', $res['av_bat'], ['class' => 'form-control number', 'id' => 'av_bat','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label rain-c">







                                      	<label>Rain.C</label>







                                       {!! Form::text('av_rai', $res['av_rai'], ['class' => 'form-control number',  'id' => 'av_rai','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label umbrellas">







                                      	<label>Umbrellas</label>







                                       {!! Form::text('av_umb', $res['av_umb'], ['class' => 'form-control number', 'id' => 'av_umb','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-5 col-xs-5 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('av_remarks', $res['av_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                </div>







<!------------------------------------------------available----------------------------------------------> 







<!------------------------------------------------solar-fencing----------------------------------------------> 







                     <div class="row border-color light-back1 zone1-4">







                    	<div class="col-sm-12 col-xs-12 fro-pro1 solar-fencing">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Solar Fencing</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label zone1">







                                      	<label>Zone 1</label>







										<select class="irrigation" name="sf_zone1">















                                        	<option value="Working" <?php if($res['sf_zone1'] == 'Working') echo "selected='selected'"; ?>>Working</option> 















                                            <option value="Not Working" <?php if($res['sf_zone1'] == 'Not Working') echo "selected='selected'"; ?>>Not Working</option>







											 <option value="NA" <?php if($res['sf_zone1'] == 'NA') echo "selected='selected'"; ?>>NA</option>















                                        </select>















                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label zone2">







                                      	<label>Zone 2</label>







										<select class="irrigation" name="sf_zone2">















                                        	<option value="Working" <?php if($res['sf_zone2'] == 'Working') echo "selected='selected'"; ?>>Working</option> 















                                            <option value="Not Working" <?php if($res['sf_zone2'] == 'Not Working') echo "selected='selected'"; ?>>Not Working</option>







											 <option value="NA" <?php if($res['sf_zone2'] == 'NA') echo "selected='selected'"; ?>>NA</option>















                                        </select>















                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label zone3">







                                      	<label>Zone 3</label>







											<select class="irrigation" name="sf_zone3">















                                        	<option value="Working" <?php if($res['sf_zone3'] == 'Working') echo "selected='selected'"; ?>>Working</option> 















                                            <option value="Not Working" <?php if($res['sf_zone3'] == 'Not Working') echo "selected='selected'"; ?>>Not Working</option>







											 <option value="NA" <?php if($res['sf_zone3'] == 'NA') echo "selected='selected'"; ?>>NA</option>















                                        </select>







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label zone4">







                                      	<label>Zone 4</label>







										<select class="irrigation" name="sf_zone4">















                                        	<option value="Working" <?php if($res['sf_zone4'] == 'Working') echo "selected='selected'"; ?>>Working</option> 















                                            <option value="Not Working" <?php if($res['sf_zone4'] == 'Not Working') echo "selected='selected'"; ?>>Not Working</option>







											 <option value="NA" <?php if($res['sf_zone4'] == 'NA') echo "selected='selected'"; ?>>NA</option>















                                        </select>







                                      







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label tkit">







                                      	<label>T.Kit</label>







											<select class="irrigation" name="sf_tkit">















                                        	<option value="Working" <?php if($res['sf_tkit'] == 'Working') echo "selected='selected'"; ?>>Working</option> 















                                            <option value="Not Working" <?php if($res['sf_tkit'] == 'Not Working') echo "selected='selected'"; ?>>Not Working</option>







											 <option value="NA" <?php if($res['sf_tkit'] == 'NA') echo "selected='selected'"; ?>>NA</option>















                                        </select>







                                       







                                      </div>







                                      <div class="col-sm-5 col-xs-5 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('sf_remarks', $res['sf_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                                <!--<div class="col-sm-12 col-xs-12 fro-pro1">







                                  <label class="control-label col-sm-2 col-xs-2" for="pwd">Working Status</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                        <input type="text" class="form-control" >







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label">







                                      







                                        <input type="text" class="form-control">







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                        <input type="text" class="form-control" >







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                        <input type="text" class="form-control" >







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label">







                                      	







                                        <input type="text" class="form-control" >







                                      </div>







                                      <div class="col-sm-5 col-xs-5 for-margin-label">







                                      







                                        <input type="text" class="form-control" >







                                      </div>







                                </div>-->







                                </div>







<!------------------------------------------------solar-fencing---------------------------------------------->                  







<!------------------------------------------------allowed-without----------------------------------------------> 







                     <div class="row border-color light-back maids-drivers">







                    	<div class="col-sm-12 col-xs-12 fro-pro1 allowed-without">







                                  <label class="control-label col-sm-2 col-xs-2  for-spacing" style="padding-left:0px;">Allowed without ID Cards</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label maids">







                                      	<label>Maids</label>







                                       {!! Form::text('aw_maid', $res['aw_maid'], ['class' => 'form-control number', 'id' => 'aw_maid','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label drivers">







                                      	<label>Drivers</label>







                                       {!! Form::text('aw_dri', $res['aw_dri'], ['class' => 'form-control number', 'id' => 'aw_dri','placeholder' => '']) !!}







                                      </div>







                                       <div class="col-sm-1 col-xs-1 for-margin-label vendors">







                                      	<label>Vendors</label>







                                       {!! Form::text('aw_ven', $res['aw_ven'], ['class' => 'form-control number', 'id' => 'aw_ven','placeholder' => '']) !!}







                                      </div>

									  

									   <div class="col-sm-2 col-xs-2 for-margin-label cons others">







                                      	<label>Construction Workers</label>







                                       {!! Form::text('aw_cons_workers', $res['aw_cons_workers'], ['class' => 'form-control number', 'id' =>'aw_cons_workers','placeholder' => '']) !!}







                                      </div>









                                      <div class="col-sm-1 col-xs-1 for-margin-label interiors">







                                      	<label>Interiors</label>







                                       {!! Form::text('aw_inte', $res['aw_inte'], ['class' => 'form-control number', 'id' => 'aw_inte','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-1 col-xs-1 for-margin-label others">







                                      	<label>Others</label>







                                       {!! Form::text('aw_others', $res['aw_others'], ['class' => 'form-control number', 'id' => 'aw_others','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-3 col-xs-3 for-margin-label remarks">







                                      	<label>Remarks</label>







                                       {!! Form::text('aw_remarks', $res['aw_remarks'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                </div>







                                







                                







                              <div class="col-sm-12 col-xs-12 fro-pro1 id-cards">







                                  <label class="control-label col-sm-2 col-xs-2" style="padding-left:0px;">ID Cards.</label>







                                  <div class="col-sm-1 col-xs-1 for-margin-label maids">







                                      	

                                          <label class="label-maids">Maids</label>





                                       {!! Form::text('id_maid', $res['id_maid'], ['class' => 'form-control','placeholder' => '']) !!}





                                      </div>



                                      <div class="col-sm-1 col-xs-1 for-margin-label drivers">

                                            <label class="label-drivers">Drivers</label>



                                       {!! Form::text('id_dri', $res['id_dri'], ['class' => 'form-control','placeholder' => '']) !!}



                                      </div> 







                                       <div class="col-sm-1 col-xs-1 for-margin-label vendors">

                                         <label class="label-vendors">Vendors</label>

                                       {!! Form::text('id_ven', $res['id_ven'], ['class' => 'form-control','placeholder' => '']) !!}

                                      </div>



                                       <div class="col-sm-2 col-xs-2 for-margin-label cons others">

                                          <label class="label-workers">Construction Workers</label>

                                       	  {!! Form::text('id_cons_workers',  $res['id_cons_workers'], ['class' => 'form-control number', 'id' =>'id_cons_workers','placeholder' => '']) !!}

                                       </div>



                                      <div class="col-sm-1 col-xs-1 for-margin-label interiors">

                                          <label class="label-interiors">Interiors</label>

                                       {!! Form::text('id_inte', $res['id_inte'], ['class' => 'form-control','placeholder' => '']) !!}

                                      </div>



                                      <div class="col-sm-1 col-xs-1 for-margin-label others">

                                        <label class="label-others">Others</label>



                                       {!! Form::text('id_others', $res['id_others'], ['class' => 'form-control','placeholder' => '']) !!}







                                      </div>







                                      <div class="col-sm-3 col-xs-3 for-margin-label remarks">

                                          <label class="label-remarks">Remarks</label>

                                       {!! Form::text('id_remarks', $res['id_remarks'], ['class' => 'form-control','placeholder' => '']) !!}





                                      </div>



                                </div>



                                </div>



<!------------------------------------------------allowed-without---------------------------------------------->                    

<!------------------------------------------------data-sheet----------------------------------------------> 

                     <div class="row border-color light-back1 multiple-boxes">

                     	<div class="col-sm-2 col-xs-2 fro-pro1 data-sheet">

                             <label class="control-label col-sm-12" style="padding-left:0px;">Data Sheet Pending</label>

                            {!! Form::text('ds_pending', $res['ds_pending'], ['class' => 'form-control number','placeholder' => '']) !!}

                         </div>

                         <div class="col-sm-2 col-xs-2 fro-pro night-tea-served-at">

                             <label class="control-label col-sm-12" style="padding-left:0px;">Night Tea Served at Time</label>

                            {!! Form::text('nts_time', $res['nts_time'], ['class' => 'form-control','placeholder' => '']) !!}

                         </div>

                         <div class="col-sm-2 col-xs-2 fro-pro night-bio-checked">

                             <label class="control-label col-sm-12" style="padding-left:0px;">Night Bio Checked</label>

											<select class="irrigation" name="nbc_chk">

                                        	<option value="Yes" <?php if($res['nbc_chk'] == 'Yes') echo "selected='selected'"; ?>>Yes</option> 

                                            <option value="No" <?php if($res['nbc_chk'] == 'No') echo "selected='selected'"; ?>>No</option>

                                        </select>

                         </div>



                         <div class="col-sm-2 col-xs-2 fro-pro stickers-2w">

                             <label class="control-label col-sm-12" style="padding-left:0px;">W/O Stickers (2W)</label>

                            {!! Form::text('wo_stick_2w', $res['wo_stick_2w'], ['class' => 'form-control number','placeholder' => '']) !!}

                         </div>





                         <div class="col-sm-2 col-xs-2 fro-pro stickers-4w">

                             <label class="control-label col-sm-12" style="padding-left:0px;">W/O Stickers (4W)</label>

                            {!! Form::text('wo_stick_4w', $res['wo_stick_4w'], ['class' => 'form-control number','placeholder' => '']) !!}

                         </div>

                         <div class="col-sm-2 col-xs-2 fro-pro1 missing-keys">



                             <label class="control-label col-sm-12" style="padding-left:0px;">Missing Keys</label>



                            {!! Form::text('mis_keys', $res['mis_keys'], ['class' => 'form-control number','placeholder' => '']) !!}



                         </div>

						 

						  <div class="col-sm-2 col-xs-2 fro-pro1 missing-keys">

                             <label class="control-label col-sm-12" style="padding-left:0px;"> Lost & Found</label>

                            {!! Form::text('lost_found', $res['lost_found'], ['class' => 'form-control number','placeholder' => '']) !!}

                         </div>

                         

                          <div class="col-sm-2 col-xs-2 fro-pro1 missing-keys">

                             <label class="control-label col-sm-12" style="padding-left:0px;">Sleeping Cases</label>

                            {!! Form::text('sleeping_case', $res['sleeping_case'], ['class' => 'form-control number','placeholder' => '']) !!}

                         </div>

                          

                          <div class="col-sm-2 col-xs-2 fro-pro1 interior-works">

                             <label class="control-label col-sm-12" style="padding-left:0px;">Interior Works</label>

                            {!! Form::text('interior_works', $res['interior_works'], ['class' => 'form-control number','placeholder' => '']) !!}

                         </div>



                      <div class="col-sm-2 col-xs-2 fro-pro night-check-duty">







                       <label class="control-label col-sm-12" style="padding-left:0px;">Night Check Duty</label><br />



                        <?php $fstatus = true; 

						 $nstatus = false;

						if($res['night_check_by']) { $nstatus = false ; $fstatus =true;  }

						if($res['night_check_time']) { $nstatus = false ; $fstatus =true; }

						if(!$res['night_check_by']) { $nstatus = true ; $fstatus =false;  }

						if(!$res['night_check_time']) { $nstatus = true ; $fstatus =false;}

					

						//echo  $nstatus;

						?>

							 

						{{ Form::radio('nightcheck', 'Yes', $fstatus, array('id'=>'nightcheckyyes')) }}Yes

						{{ Form::radio('nightcheck', 'no',  $nstatus, array('id'=>'nightcheckyno')) }}No

						



                           



                         </div>

 <div id="dvnightcheck" style="display:<?php if($fstatus) echo 'block'; else echo 'none'; ?>">



                         <div class="col-sm-2 col-xs-2  night-checked-by">







                             <label class="control-label col-sm-12" style="padding-left:0px;">Night Check By.</label>







										



										{!! Form::text('night_check_by', $res['night_check_by'], ['class' => 'form-control','placeholder' => '', 'id' => 'night_check_by']) !!}





 

                         </div>

						 





              





                         <div class="col-sm-2 col-xs-2  night-check-time">







                             <label class="control-label col-sm-12" style="padding-left:0px;">Night Check Time:</label>







                            {!! Form::text('night_check_time', $res['night_check_time'], ['class' => 'form-control timepickerstart','placeholder' => '', 'id' => 'night_check_time']) !!}







                         </div>







                      </div>

					  

					     </div>







 <!------------------------------------------------data-sheet---------------------------------------------->                    







                      







                     <div class="row light-back violations">







                      <div class="col-sm-12 col-xs-12 for-violations" style="padding-top:5px;padding-bottom:5px;">







                                <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Violations</label>







                                 <input type="text" class="form-control" style="width:100%"  name="violations" value="<?php echo $res['violations'] ?>" />







                            </div>







                        </div>    







                       







                     







                     <div class="row light-back1 occurances">







                     <div class="col-sm-12 col-xs-12 fro-pro1" style="margin-top:10px;">







                                <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Occurances</label>







                                 <input type="text" class="form-control" style="width:100%" name="occurances"  value="<?php echo $res['occurances'] ?>" />







                            </div>







                        </div>    







                              







                              







                           <div class="row light-back drunk-cases">







                            <div class="col-sm-12 col-xs-12 fro-pro1" style="margin-top:10px;">







                                <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Drunk Cases</label>







                                <input type="text" class="form-control" style="width:100%"  name="drunkcase" value="<?php echo $res['drunkcase'] ?>"/>







                            </div>







                          </div>







                            







                            <div class="row light-back1 parades">







                                <div class="col-sm-12 col-xs-12 fro-pro1" style="margin-top:10px;">







                                <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Parades</label>







                                <input type="text" class="form-control" style="width:100%" name="parades" value="<?php echo $res['parades'] ?>" />







                            </div>







                            </div>







                            







                            <div class="row light-back cellphone-abuses">







                            <div class="col-sm-12 col-xs-12 fro-pro1" style="margin-top:10px;">







                                <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Cellphone Abuses</label>







                                 <input type="text" class="form-control" style="width:100%"  name="cellphone_abuses" value="<?php echo $res['cellphone_abuses'] ?>" />







                            </div>







                            </div>







                               





 

                            <div class="row light-back1 staff-visits">







                            <div class="col-sm-12 col-xs-12 fro-pro1" style="margin-top:10px;">







                                <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Sr.Staff Visits</label>







                                <input type="text" class="form-control" style="width:100%"  name="srstaffvisits" value="<?php echo $res['srstaffvisits'] ?>"/>







                            </div>







                            </div>

 <!-------------------------traffic-movement--------------------------->

<div class="row traffic-heading especially-heading">

   <h4><span><b>Traffic Movement</b></span></h4>

</div>

<div class="row light-back traffic-movement">

	<div class="col-sm-3 form-group residents-vehicles">

    	<label>Residents Vehicle (4 & 2 wheelers)</label>

         {!! Form::text('tr_resident_vehicle', $res['tr_resident_vehicle'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

    <div class="col-sm-2 form-group temporary-vendors">

    	<label>Temporary Vendors (persons)</label>

        {!! Form::text('tr_temp_vendors', $res['tr_temp_vendors'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

    <div class="col-sm-3 form-group courier-deliveryboys">

    	<label>Courier / Delivery Boys (Persons)</label>

        {!! Form::text('tr_courier_delivery', $res['tr_courier_delivery'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

    <div class="col-sm-1 form-group visitors">

    	<label>Visitors</label>

        {!! Form::text('tr_visitors', $res['tr_visitors'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

    <div class="col-sm-2 form-group construction-team">

    	<label>Construction Team (persons)</label>

        {!! Form::text('tr_construction', $res['tr_construction'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

     <div class="col-sm-2 form-group interiorworks-flats">

    	<label>Inter Works in flats/Villas</label>

        {!! Form::text('tr_inter_works', $res['tr_inter_works'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

     <div class="col-sm-2 form-group interior-workers">

    	<label>Interior Workers per day</label>

       {!! Form::text('tr_interior_works_perday', $res['tr_interior_works_perday'], ['class' => 'form-control number','placeholder' => '']) !!}

    </div>

</div>

<!-------------------------traffic-movement--------------------------->

  <div class="col-sm-12 col-xs-12 especially-heading">

                                   <h4><span><b>Additional Information:</b></span></h4>

                              </div>



<div class="additional-information">

                                          



<textarea class="form-control summernote-small" placeholder="Enter Description" name="reason" cols="50" rows="10" id="reasontext"><?php echo $res['reason'] ?></textarea>







                           



                                      <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span class="i-confirmed">I Confirmed all the data entered was correct</span>





</div>





                                  <div class="col-sm-12 col-xs-12 submit-button security-button">







                            	{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}







								{!! Form::close() !!}







                            </div>







                            







                           







                               







                     







                     







                  </div>







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























<script type="text/javascript">















/*$( document ).ready(function() {







  $( "#select_id" ).change(function() 







  {







   var val = $(this).val();







   //alert(val);







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







  







   







	 







	$("#example1").datepicker();







});







  */







  







  







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

			

			

			

$("input[name='nightcheck']").click(function () {

            if ($("#nightcheckyno").is(":checked")) {

                $("#dvnightcheck").hide();

				$("#night_check_by").val("");

				$("#night_check_time").val(""); 

				

				

            } else {

                $("#dvnightcheck").show();

            }

        }); 





  

$("#example1").datepicker({







 dateFormat: "dd-mm-yy",
 
 <?php if(pstatus()){ ?> minDate: "-3", <?php } ?>

 maxDate: '-1',







  onSelect: function(dateText) {







    alert("Selected date: " + dateText + "; input's current value: " + this.value);







	







	var site = $("#site_val").val();







	







	 window.location.href = "/getsecuritydailyreportdetaildate/"+site+"/"+dateText; 







	  







  }







});







var site = "<?php  echo $sitevv; ?>";



var erflag = false;



 



 var count = 0;







$("#nw_cctv").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'nw_cctv'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_cctv").html("");



				$("#nw_cctv").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_cctv").html(msg);



				$("#nw_cctv").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 



 $("#nw_boom").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'nw_boom'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_bb").html("");



				$("#nw_boom").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_bb").html(msg);



				$("#nw_boom").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



  $("#nw_wt").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'nw_wt'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_wt").html("");



				$("#nw_wt").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_wt").html(msg);



				$("#nw_wt").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 



   $("#nw_torch").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'nw_torch'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_torchs").html("");



				$("#nw_torch").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_torchs").html(msg);



				$("#nw_torch").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 



   $("#nw_bio").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'nw_bio'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_biomachine").html("");



				$("#nw_bio").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_biomachine").html(msg);



				$("#nw_bio").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 



  



   $("#av_tab").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'av_tab'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_tabs").html("");



				$("#av_tab").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_tabs").html(msg);



				$("#av_tab").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 



 $("#av_tab").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'av_tab'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_tabs").html("");



				$("#av_tab").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_tabs").html(msg);



				$("#av_tab").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 



 $("#av_whi").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'av_whi'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_whistles").html("");



				$("#av_whi").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_whistles").html(msg);



				$("#av_whi").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



  $("#av_bat").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'av_bat'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_batons").html("");



				$("#av_bat").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_batons").html(msg);



				$("#av_bat").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



  $("#av_rai").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'av_rai'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_rainc").html("");



				$("#av_rai").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_rainc").html(msg);



				$("#av_rai").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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











 $("#av_umb").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'av_umb'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_umbrella").html("");



				$("#av_umb").removeClass("errind");



				erflag = false;



				}else{

 

				//alert(msg);



				$("#ermsg_umbrella").html(msg);



				$("#av_umb").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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









/*

 $("#aw_maid").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'aw_maid'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_idmaid").html("");



				$("#aw_maid").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_idmaid").html(msg);



				$("#aw_maid").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



 $("#aw_dri").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'aw_dri'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_drivers").html("");



				$("#aw_dri").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_drivers").html(msg);



				$("#aw_dri").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 */



 



  /*$("#aw_ven").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'aw_ven'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_vendors").html("");



				$("#aw_ven").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_vendors").html(msg);



				$("#aw_ven").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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



 



   $("#aw_inte").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'aw_inte'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_interior").html("");



				$("#aw_inte").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_interior").html(msg);



				$("#aw_inte").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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















   $("#aw_others").change(function(){



	var checkval = $(this).val();		



			 $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('validation.securityvalid') }}',



				data: { checkval: checkval, site: site, field:'aw_others'},



				success: function( msg ) {



				//$("#ajaxResponse").append("<div>"+msg+"</div>");



				



				if(msg == 'suc'){$("#ermsg_other").html("");



				$("#aw_others").removeClass("errind");



				erflag = false;



				}else{



				//alert(msg);



				$("#ermsg_other").html(msg);



				$("#aw_others").addClass("errind");



				erflag = true;



				}



				 if(erflag == true){



					



					count = count + 1;



					} else{



					if(count > 0) {



					count = count - 1;



					}



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

*/













 







});







  



function subform()



 {



    // Name can't be blank
	var flag = true;
	/*$("input").each(function(){
        if (($(this).val())== ""){
              $(this).addClass("error");
              flag = false;
        }
        else
		{
            $(this).removeClass("error");
			flag = true;
        }
      
    });
	
	if ($('input:checkbox', this).is(':checked') &&
        $('input:radio', this).is(':checked')) {
        $(this).removeClass("error");
		flag = true;
    } else {
        $(this).addClass("error");
        flag = false;
    }
	
	if(flag==false) { 
		alert("All Fields Required");
		$("html, body").animate({ scrollTop: 0 }, "slow");
 		return false;
	}
	else return true;*/



	



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





  </script>



@include('partials.footer')



@stop

