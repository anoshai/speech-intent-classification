<?php
session_start();
$_SESSION['username'] =$_POST['username'];
$_SESSION['gender'] =$_POST['gender'];
$_SESSION['age'] =$_POST['age'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Voice-In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../resources/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
    <script src="../resources/js/data.js"></script>
    <script>
        window.onload = function () {
            var indexSelect_symptom = Math.floor(Math.random() * 16);
            var symptom = words_in_english[indexSelect_symptom];
            var selectedDescriptionArrayEnglish = words_description_in_english[indexSelect_symptom];
            var selectedDescriptionArraySinhala = words_description_in_sinhala[indexSelect_symptom];
            var maxNo = selectedDescriptionArraySinhala.length;
            var indexSelect_description = Math.floor(Math.random() * maxNo);
            var description = selectedDescriptionArrayEnglish[indexSelect_description];

            document.getElementById("selectedWordDisplay").innerHTML = " " + selectedDescriptionArraySinhala[indexSelect_description];

            document.getElementById("selectedDisease").value = symptom;
            document.getElementById('selectedDescription').value = description;
        }
        function skip_Function() {
            var indexSelect_symptom = Math.floor(Math.random() * 16);
            var symptom = words_in_english[indexSelect_symptom];
            var selectedDescriptionArrayEnglish = words_description_in_english[indexSelect_symptom];
            var selectedDescriptionArraySinhala = words_description_in_sinhala[indexSelect_symptom];
            var maxNo = selectedDescriptionArraySinhala.length;
            var indexSelect_description = Math.floor(Math.random() * maxNo);
            var description = selectedDescriptionArrayEnglish[indexSelect_description];

            document.getElementById("selectedWordDisplay").innerHTML = " " + selectedDescriptionArraySinhala[indexSelect_description];

            document.getElementById("selectedDisease").value = symptom;
            document.getElementById('selectedDescription').value = description;
        }

        function btnFunction() {
            document.getElementById("next1").disabled = false;
        }
    </script>
</head>

<body>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h11><img src="../resources/img/title.PNG" alt="upload" width="75%" height="75%"></h11>
        </br>

        <form name="voiceProviderDataForm2" method="post" action="/voice-in-sinhala/views/upload.php" class="voice-form">
            <fieldset>
		<div class="row">

                    <div class="form-group col-md-6">

                        <div class="hide_div">

                            <label label class="text-label" for="selectedDisease">Symptom:</label>

                            <input type="text" class="form-control" name="selectedDisease" id="selectedDisease">

                        </div>

                    </div>

                    <div class="form-group col-md-6">

                        <div class="hide_div">

                            <label class="text-label" for="selectedDescription">Description:</label>

                            <input type="text" class="form-control" name="selectedDescription" id="selectedDescription">

                        </div>

                    </div>

                </div>
		</br>

                <div class="row">
                    <button type="button" class="btn btn-default" id="skip" onclick="skip_Function()" style="float: right;">Skip &raquo;</button>
                    <div id="description" style="text-align: center;">
                        <p class="text-description">
                            <select-word id="selectedWordDisplay">
                            </select-word>
                        </p>
                    </div>
                </div>
                <div class="text-center mb-3">
<!--                    </br>-->
                    <p class="text-instruction" style="margin-left:20px;">Click Record and read the sentence in your own spoken language</p>
		    <p class="text-instruction" style="margin-left:20px;">රෙකෝඩ් ක්ලික් කර ඔබේ කථන භාෂාවෙන් වාක්‍ය කියවන්න</p> 
		</div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div id="controls">
                        <label class="rlabel" id="recordButton">Record</label>
                        <label class="rlabel" id="pauseButton">Pause</label>
                        <label class="rlabel" id="stopButton">Stop</label>
                    </div>
                    <div id="formats"></div>
                    </br>
                    </div>

                </div>
                <div class="row">
                    <p class="recording-label"><strong>Recordings:</strong></p>
                    <ol id="recordingsList"></ol>
                </div>
                <div>
                     <p class="text-instruction">Click Select under the recorded file and then submit (Re-record if needed)</p>
                </div>
                <div class="mb-3 progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="text-center mb-3"><button type="submit" class="btn btn-primary" id="btnSubmit" onclick="btnFunction()">Submit</button></div>
                <div class="">
                    <div class="error-message"></div>
                    <div class="sent-message">Saved Successfully!</div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form name="voiceProviderDataForm3" method="post" action="/voice-in-sinhala/views/voiceRecord1.php">
            <button type="submit" class="btn btn-primary" id="next1" style="float: right; margin-top: -25px;" disabled>Next &raquo;</button>
        </form>
    </div>
</div>

</body>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="../resources/js/app.js"></script>
<script src="../resources/js/form.js"></script>

</html>
