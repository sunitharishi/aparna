@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
   <div class="meetups-createedit">
      <div class="panel panel-default panelmar tsas-crseations">
    {!! Form::open(['method' => 'POST', 'route' => ['tasks.store']]) !!}

   
        <div class="panel-heading">
            MOM
             <p class="ptag">
              <a href="{{ route('meetups.index') }}" class="btn btn-back-list backto-to-list">Back</a>  
           </p>
        </div>
        
        <div class="panel-body">
			<div class="row class-ctration">
                <div class="col-sm-2 form-group category-celections">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $categories, old('category'), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-3 form-group cateforuy-cinnunity">
                    {!! Form::label('site', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site', $sites, '', ['class' => 'form-control select2mes','onchange'=>'getCommunityUsers(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site'))
                        <p class="help-block">
                            {{ $errors->first('site') }}
                        </p>
                    @endif
                </div> 

                 
            </div>

            <div class="row">
              <div class="col-sm-3 form-group empgroup clategoruy-emploayee">
                    {!! Form::label('emp', 'Responsibility', ['class' => 'control-label']) !!}
                    {!! Form::select('emp', $empList, '', ['class' => 'form-control select2mes','id'=>'emp_id','onchange'=>'select_site_emp(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site'))
                        <p class="help-block">
                            {{ $errors->first('site') }}
                        </p>
                    @endif
                </div>
               <!-- {!! Form::label('', 'Task Assigners', ['class' => 'control-label']) !!}-->
                <div class="col-sm-9 form-group empids employee-recuritment">
                    @if (old('empid')) 
                        @foreach(old('empid') as $ui=>$tuval)
                        <div class="empbox empid{{ $tuval }}">
                            <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ old('empname')[$ui] }}
                            {!! Form::hidden('empid[]',$tuval) !!}
                            {!! Form::hidden('empname[]',old('empname')[$ui]) !!}
                        </div> 
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row class-ctration">
              
            
             
            
            
                 <div class="col-sm-3 employee-toiele">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                
                
 
                <div class="col-sm-1 form-group emploauyee-prigfority">
                    {!! Form::label('priority', 'Priority', ['class' => 'control-label']) !!}
                    {!! Form::select('priority', $priorities, old('priority'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-2 form-group emploauee-strsatus">
                    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                    {!! Form::select('status', $statuses, old('status'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
                
                  <div class="col-sm-2 description-toiele">
               		<label class="control-label">Dead Line</label>
                    <input type="text" class="form-control"  />
               </div>

            </div>

           <div class="row aufiorecording">
  <h3 class="audiolaucndl">Audio record and download</h3>

<p><label id="totalTime">
</label>


<div id="min" style="display:none;"><label id="hours">00</label>:<label id="minutes">00</label>:<label id="seconds">00</label> </div>

<div style="display:none;" id="image" class="none1" ><img  src="../images/download.gif" height="100px" width="205px"/></div>

<button id="startRecord" name="startRecord" class="btn btn-start" ><img src="../images/startbutton.png" />Start</button>
<button id="stopRecord"disabled class="btn btn-stoppable"><img src="../images/stopbutton.png" />Stop</button>
<button id="pauseRecord" class="btn btn-pause"><img src="../images/pausebutton.png" />Pause</button>
<button id="resumeRecord" class="btn btn-resume"><img src="../images/resumebutton.png" />Resume</button>
</p>	
<label id="totalTime">
</label>
<p>
<audio id="recordedAudio"></audio><a id="audioDownload"></a>
<audio id="recordingAudio" control autoplay></audio><a id="audioDisplay"></a>
</div>
<div id="waveform"></div>


<!--<div class="wrapper ">
    
  <h3 class="audiolaucndl">Audio record and download</h3>

    <section class="main-controls">
    <div id="min" style="display:none;"><label id="hours">00</label>:<label id="minutes">00</label>:<label id="seconds">00</label> </div>
      <canvas id="image" class="visualizer"></canvas> 
      <button class="startRecord">Record</button>
      <button class="stopRecord" disabled>Stop</button>
     <button class="pauseRecord" disabled>Pause</button>
      <button class="resumeRecord" disabled>Resume</button>
     <!-- <audio id="recordedAudio"></audio><a id="audioDownload"></a>-->
   <!-- </section>

    <section class="sound-clips"  style="width:100%;">-->

      <!-- <article class="clip">
        <audio controls></audio>
        <a href="">Download clip</a>
      </article> -->

  <!--  </section>

  </div>-->





          


             <div class="row">
                <div class="col-sm-12 form-group catrogory-slectioh-descriotp">
                   <label>Action Required</label>
                  <textarea class="form-control summer-note"></textarea>
                   
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 form-group catrogory-slectioh-descriotp">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control summernote', 'placeholder' => 'Enter Details here']) !!}
                    <p class="help-block"></p>
                    
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group conr-corm-pop">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_0" class="attachment-ufilepath">Attachments</div>
                    <div class="statusUploader" id="statusUploader_0"></div>
                    <div class="statusFailed" id="statusFailed_0"></div>
                    <div class="attachment_files">
                        @if (old('ufilepath')) 
                            @foreach(old('ufilepath') as $ai=>$aval)
                            <div class="ufileBox">{!! Form::hidden('ufilepath[]', $aval, ['class'=>'ufilepath']) !!}{!! Form::hidden('ufilename[]', old('empname')[$ai], ['class'=>'ufilename']) !!}<a href="/{{ $aval }}" target="_blank">{{ old('ufilename')[$ai] }}</a> <a href="javascript:void(0)" onclick="delete_uploaded_file(this)"><i class="fa fa-close"></i></a></div>
                            @endforeach
                        @endif
                    </div>
                    <p class="help-block"></p>                    
                    
                </div>
            </div>
           
         
		
            
        </div>
   
   
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
     </div>  
    </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
			</script>
            <script src="../js1/min.js"></script>
            <!--<script src="../js1/install.js"></script>  
            <script src="../js1/app.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
<script>
$(document).ready(function(){

 		var hoursLabel = document.getElementById("hours");
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalTime = document.getElementById("totalTime");
        var totalSeconds = 0;
        var totalMinutes = 0;
        var totalHours = 0;
        var counter;
        var timerOn;
        var htmlResets;
        var totalMills = 0;
		
	navigator.mediaDevices.getUserMedia({audio:true})
		.then(stream => {
			rec = new MediaRecorder(stream);
			rec.ondataavailable = e => {
				audioChunks.push(e.data);
				if (rec.state == "inactive"){
					let blob = new Blob(audioChunks,{type:'audio/mp3'});
					recordedAudio.src = URL.createObjectURL(blob);
					recordedAudio.controls=true;
					recordedAudio.autoplay=true;
					audioDownload.href = recordedAudio.src;
					audioDownload.download = 'mp3';
					audioDownload.innerHTML = 'download';
		 			}						
			}
		})
		.catch(e=>console.log(e));
	  
	  startRecord.onclick = e => {
	   //clearInterval(totalSeconds);
	 
         if (timerOn == 1) {
                return;
            }
            else {
                counter = setInterval(setTime, 10);
                timerOn = 1;
                htmlResets = 0;
            }  
	  document.getElementById("image").style.display = "block";
	  document.getElementById("min").style.display = "block";
		
	  startRecord.disabled = true;
	  stopRecord.disabled=false;
	  pauseRecord.disabled=false;
	  resumeRecord.disabled=true;
	  audioChunks = [];
	   
	  rec.start();
	}
	  stopRecord.onclick = e => {
	  
	  document.getElementById("image").style.display = "none";
	 document.getElementById("min").style.display = "none";
	  totalTime.innerHTML = "Time Recorded: " + hoursLabel.innerHTML + ":" + minutesLabel.innerHTML + ":" + secondsLabel.innerHTML;
            hoursLabel.innerHTML = 00;
            minutesLabel.innerHTML = 00;;
           secondsLabel.innerHTML = 00;
            totalMills = 0;
            totalSeconds = 0;
            totalMinutes = 0;
            totalHours = 0;
           clearInterval(counter);
            timerOn = 0;
	       
	  startRecord.disabled = false;
	  stopRecord.disabled=true;
	  pauseRecord.disabled=true;
	  resumeRecord.disabled=true; 
	  rec.stop();
	 
	}
	pauseRecord.onclick = e => {
	
	 if (timerOn == 1) {
                clearInterval(counter);
               timerOn = 0;
            }
            if (htmlResets == 1) {
                hoursLabel.innerHTML = 00;
                minutesLabel.innerHTML =00;
                secondsLabel.innerHTML = 00;
                totalMills = 0;
                totalSeconds = 0;
                totalMinutes = 0;
                totalHours = 0;
            }
            else {
                htmlResets = 1;
            }
	document.getElementById("image").style.display ="none";	   
	startRecord.disabled =true;
	stopRecord.disabled =true;
	pauseRecord.disabled=true;
	resumeRecord.disabled =false;
	rec.pause();

	}
	resumeRecord.onclick =e => {
	if (timerOn == 1) {
                return;
            }
            else {
                counter = setInterval(setTime, 10);
                timerOn = 1;
                htmlResets = 0;
            }  
	document.getElementById("image").style.display ="block";
	startRecord.disabled =true;
	stopRecord.disabled =false;
	pauseRecord.disabled=false;
	resumeRecord.disabled=true;
	rec.resume();
	}


        function setTime() {
            ++totalMills;
            if (totalHours == 99 & totalMinutes == 59 & totalSeconds == 60) {
                totalHours = 0;
                totalMinutes = 0;
                totalSeconds = 0;
                hoursLabel.innerHTML = 00;
                minutesLabel.innerHTML = 00;
                secondsLabel.innerHTML = 00;
                clearInterval(counter);
            }

            if (totalMills == 100) {
                totalSeconds++;
                secondsLabel.innerHTML = pad(totalSeconds % 60);
                totalMills = 0;
            }
            if (totalSeconds == 60) {
               totalMinutes++;
                minutesLabel.innerHTML = pad(totalMinutes % 60);
                totalSeconds = 0;
            }
            if (totalMinutes == 60) {
                totalHours++;
                hoursLabel.innerHTML = pad(totalHours);
                totalMinutes = 0;
            }
        }
        function pad(val) {
            var valString = val + "";
           if (valString.length < 2) {
                return 0 + valString;
            }
            else {
                return valString;
            }
        }

});

</script>

 @include('partials.footer')

@stop

