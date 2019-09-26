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



    <div class="body">



      <div class="main_container">



     <?php /*?> <?php include "header.php"; ?><?php */?>



        <!-- /top navigation -->



     



        <!-- page content -->



        <div class="right_col" role="main">



          <div class="models reposive-security">



           



            <div class="row">






                        {!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storedailylock'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}


                           



                                <div class="dailylocktime">



                                  <label class="control-label col-sm-12" for="pwd">Daily Reports Lock Time </label>
                               
                                   

                                   {!! Form::text('daylocktime', $lock_time->daylocktime, ['class' => 'form-control timepickerstart', 'id'=>'daylocktime', 'placeholder' => 'Hrs']) !!}



                               </div> 

                                





								<!--{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
-->


								{!! Form::close() !!}
                          
						  <a href="/lockpermission" class="blink" style=" padding-left: 15px;font-size: 20px;" title="Settings">Remove Lock</a>


          </div>



        </div>



      </div>



    </div>


    </div>




    <!-- Custom Theme Scripts -->



    <script src="build/js/custom.min.js"></script>



	


 
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

	

<script type="text/javascript">



  



$( document ).ready(function() {


  $('.timepicker').datetimepicker({

        format: 'HH:mm'
		

    }); 
	


 $('.timepickerstart').datetimepicker({

        format: 'hh:mm A'
		

    });  


 $('.dgtimepicker').datetimepicker({

         format: 'HH:mm'
		

    });  

         





});








     

  </script>

@include('partials.footer')
  




  







@stop