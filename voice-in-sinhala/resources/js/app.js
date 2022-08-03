//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb.
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");

recordButton.style.visibility = 'visible';
stopButton.style.visibility = 'hidden';
pauseButton.style.visibility = 'hidden';

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
	console.log("recordButton clicked");
    var constraints = { audio: true, video:false }
	recordButton.style.visibility = 'hidden';
	stopButton.style.visibility = 'visible';
	pauseButton.style.visibility = 'visible';


	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
		audioContext = new AudioContext();
		document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"
		gumStream = stream;

		input = audioContext.createMediaStreamSource(stream);
		rec = new Recorder(input,{numChannels:1})
		rec.record()

		console.log("Recording started");

	}).catch(function(err) {
    		recordButton.style.visibility = 'visible';
       		stopButton.style.visibility = 'hidden';
        	pauseButton.style.visibility = 'hidden';
	});
}

function pauseRecording(){
	console.log("pauseButton clicked rec.recording=",rec.recording );
	if (rec.recording){
		//pause
		rec.stop();
		pauseButton.innerHTML="Resume";
	}else{
		//resume
		rec.record()
		pauseButton.innerHTML="Pause";

	}
}

function stopRecording() {
	console.log("stopButton clicked");

	//disable the stop button, enable the record too allow for new recordings
    	recordButton.style.visibility = 'visible';
   	stopButton.style.visibility = 'hidden';
    	pauseButton.style.visibility = 'hidden';

	//reset button just in case the recording is stopped while paused
	pauseButton.innerHTML="Pause";

	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();
	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var li = document.createElement('li');
	var link = document.createElement('a');

	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();
    //oFormObject.elements["voiceFileName"].value = 'Some Value';

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;

	//save to disk link
	link.href = url;
	link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	// link.innerHTML = "Download";
	// link.innerHTML = " ";
	link.innerHTML = '<span style="margin-right: 5.25em;">&nbsp;</span>';

	// //add the new audio element to li
	li.appendChild(au);

	// //add the filename to the li
	li.appendChild(document.createTextNode(filename+".wav "))

	// //add the save to disk link to li
	li.appendChild(link);

	//filename to send to server without extension 
	//upload link 
	var upload = document.createElement('a');
	// var upload = document.createElement('button');
	upload.href = "#";
	// upload.innerHTML = "Upload";
	upload.innerHTML ='<span style="color:olivedrab; font-weight: bolder">Select</span>'
	// upload.innerHTML ='<span style="color:white; font-size: small">Select</span>'
	// upload.style.backgroundColor = 'olivedrab';
	// upload.style.borderRadius = '7px';
	// upload.style.padding = '4px 2px';
	// upload.style.float = 'right';

	upload.addEventListener("click", function(event) {
		// var xhr = new XMLHttpRequest();
		// xhr.onload = function(e) {
		// 	if (this.readyState === 4) {
		// 		console.log("Server returned: ", e.target.responseText);
		// 	}
		// };
		
		var fd = new FormData();
		fd.append("fileToUpload", blob, filename);
		// xhr.open("POST", "../resources/js/voice.php", true);
		// xhr.send(fd);

		$.ajax({
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = ((evt.loaded / evt.total) * 100);
						$(".progress-bar").width(percentComplete + '%');
						$(".progress-bar").html(percentComplete+'%');
					}
				}, false);
				return xhr;
			},
			type: 'POST',
			url: "../resources/js/voice.php",
			data: fd,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$(".progress-bar").width('0%');            
			},
			error:function(){
				$('.error-message').slideDown().html("Try Again!");
				setTimeout(function(){ $('.error-message').slideUp(); }, 2000);
			},
			success: function(msg){
				if(msg == 'OK'){  				  
				  	$(".progress-bar").html("Success");					
				}
				else{
					$('.error-message').slideDown().html(msg);
					setTimeout(function(){ $('.error-message').slideUp(); }, 2000);
				}
			}
		});
	})
	li.appendChild(document.createTextNode(" ")) //add a space in between
	li.appendChild(upload) //add the upload link to li

	// //add the li element to the ol
	recordingsList.appendChild(li);
	
}


