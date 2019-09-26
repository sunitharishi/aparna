// JavaScript Document
// fork getUserMedia for multiple browser versions, for the future
// when more browsers support MediaRecorder

navigator.getUserMedia = ( navigator.getUserMedia ||
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);

// set up basic variables for app
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
		
var record = document.querySelector('.record');
var stop = document.querySelector('.stop');
var pause= document.querySelector('.pause');
var resume=document.querySelector('.resume');
var soundClips = document.querySelector('.sound-clips');
var canvas = document.querySelector('.visualizer');

// visualiser setup - create web audio api context and canvas

stop.disabled = true;

var audioCtx = new (window.AudioContext || webkitAudioContext)();
var canvasCtx = canvas.getContext("2d");

//main block for doing the audio recording

if (navigator.mediaDevices.getUserMedia) {
   console.log('getUserMedia supported.');
   var constraints = { audio: true };
   var chunks = [];
   
   
    var onSuccess = function(stream) {
    var mediaRecorder = new MediaRecorder(stream);

    visualize(stream);
      // Success callback

      	 record.onclick = function() {
			 
				 if (timerOn == 1) {
					return;
				}
				else {
					counter = setInterval(setTime, 10);
					timerOn = 1;
					htmlResets = 0;
				}  
				document.getElementById("min").style.display = "block";
			    document.getElementById("image").style.display = "block";
				
				mediaRecorder.start();
				console.log(mediaRecorder.state);
				console.log("recorder started");
				record.disabled = true;
				stop.disabled=false;
				pause.disabled=false;
				resume.disabled=true;
      	 }

      	 stop.onclick = function() {
			 
				hoursLabel.innerHTML = 00;
				minutesLabel.innerHTML = 00;;
				secondsLabel.innerHTML = 00;
				totalMills = 0;
				totalSeconds = 0;
				totalMinutes = 0;
				totalHours = 0;
				clearInterval(counter);
				timerOn = 0;
				
			    document.getElementById("image").style.display = "none";
				mediaRecorder.stop();
				console.log(mediaRecorder.state);
				console.log("recorder stopped");
			    record.style.background="";
				
				record.disabled = false;
			    stop.disabled=true;
			    pause.disabled=true;
			    resume.disabled=true;
      	 	
      	 }
		 pause.onclick=function() {
			 
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
			     document.getElementById("image").style.display = "none";
				 mediaRecorder.pause();
				 console.log(mediaRecorder.state);
				 console.log("recorder paused");
				 
				 record.disabled = true;
				 stop.disabled==true;
				 pause.disabled=true;
				 resume.disabled=false;
				 
		 }
		 resume.onclick=function() {
			 
				if (timerOn == 1) {
					return;
				}
				else {
					counter = setInterval(setTime, 10);
					timerOn = 1;
					htmlResets = 0;
				}
			     document.getElementById("image").style.display = "block";
				 mediaRecorder.resume();
				 console.log(mediaRecorder.state);
				 console.log("recorder resumed");
				 
				 
				 record.disabled = true;
				 stop.disabled=false;
				 pause.disabled=false;
				 resume.disabled=true;
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
           

        //   var chunks = [];
  mediaRecorder.onstop = function(e) {
      console.log("data available after MediaRecorder.stop() called.");

      var clipName = prompt('Enter a name for your sound clip?','My unnamed clip');
      console.log(clipName);
      var clipContainer = document.createElement('article');
      var clipLabel = document.createElement('p');
      var audio = document.createElement('audio');
      var deleteButton = document.createElement('button');
     
      clipContainer.classList.add('clip');
      audio.setAttribute('controls', '');
      deleteButton.textContent = 'Delete';
      deleteButton.className = 'delete';

      if(clipName === null) {
        clipLabel.textContent = 'My unnamed clip';
      } else {
        clipLabel.textContent = clipName;
      }

      clipContainer.appendChild(audio);
      clipContainer.appendChild(clipLabel);
      clipContainer.appendChild(deleteButton);
      soundClips.appendChild(clipContainer);

      audio.controls = true;
      var blob = new Blob(chunks, { 'type' : 'audio/m4a'});
      chunks = [];
      var audioURL = window.URL.createObjectURL(blob);
      audio.src = audioURL;
      console.log("recorder stopped");

      deleteButton.onclick = function(e) {
        evtTgt = e.target;
        evtTgt.parentNode.parentNode.removeChild(evtTgt.parentNode);
      }

      clipLabel.onclick = function() {
        var existingName = clipLabel.textContent;
        var newClipName = prompt('Enter a new name for your sound clip?');
        if(newClipName === null) {
          clipLabel.textContent = existingName;
        } else {
          clipLabel.textContent = newClipName;
        }
      }
    }

    mediaRecorder.ondataavailable = function(e) {
      chunks.push(e.data);
    }
  }

  var onError = function(err) {
    console.log('The following error occured: ' + err);
  }

  navigator.mediaDevices.getUserMedia(constraints).then(onSuccess, onError);

  } else {
   console.log('getUserMedia not supported on your browser!');
}

function visualize(stream) {
  var source = audioCtx.createMediaStreamSource(stream);

  var analyser = audioCtx.createAnalyser();
  analyser.fftSize = 2048;
  var bufferLength = analyser.frequencyBinCount;
  var dataArray = new Uint8Array(bufferLength);

  source.connect(analyser);
  //analyser.connect(audioCtx.destination);

  draw()

  function draw() {
    WIDTH = canvas.width
    HEIGHT = canvas.height;

    requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(200, 200, 200)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);

    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(0, 0, 0)';

    canvasCtx.beginPath();

    var sliceWidth = WIDTH * 1.0 / bufferLength;
    var x = 0;


    for(var i = 0; i < bufferLength; i++) {
 
      var v = dataArray[i] / 128.0;
      var y = v * HEIGHT/2;

      if(i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }

    canvasCtx.lineTo(canvas.width, canvas.height/2);
    canvasCtx.stroke();

  }
}

window.onresize = function() {
  canvas.width = mainSection.offsetWidth;
}

window.onresize();