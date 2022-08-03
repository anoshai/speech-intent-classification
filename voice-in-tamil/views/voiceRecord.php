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
            var selectedDescriptionArrayTamil = words_description_in_tamil[indexSelect_symptom];
            var maxNo = selectedDescriptionArrayTamil.length;
            var indexSelect_description = Math.floor(Math.random() * maxNo);
            var description = selectedDescriptionArrayEnglish[indexSelect_description];

            document.getElementById("selectedWordDisplay").innerHTML = " " + selectedDescriptionArrayTamil[indexSelect_description];

            document.getElementById("selectedDisease").value = symptom;
            document.getElementById('selectedDescription').value = description;
        }
        function skip_Function() {
            var indexSelect_symptom = Math.floor(Math.random() * 16);
            var symptom = words_in_english[indexSelect_symptom];
            var selectedDescriptionArrayEnglish = words_description_in_english[indexSelect_symptom];
            var selectedDescriptionArrayTamil = words_description_in_tamil[indexSelect_symptom];
            var maxNo = selectedDescriptionArrayTamil.length;
            var indexSelect_description = Math.floor(Math.random() * maxNo);
            var description = selectedDescriptionArrayEnglish[indexSelect_description];

            document.getElementById("selectedWordDisplay").innerHTML = " " + selectedDescriptionArrayTamil[indexSelect_description];

            document.getElementById("selectedDisease").value = symptom;
            document.getElementById('selectedDescription').value = description;
        }

        // function selectDisease() {
        //     var word = document.getElementById("selectedDisease");
        //     var currentSelection = word.options[word.selectedIndex].value;
        //     var indexSelect = words_in_english.indexOf(currentSelection);
        //     var selectedDescriptionArrayEnglish = words_description_in_english[indexSelect];
        //     var selectedDescriptionArrayTamil = words_description_in_tamil[indexSelect];
        //
        //     var descriptionDropDown = document.getElementById('selectedDescription');
        //     descriptionDropDown.disabled = false;
        //     for (var i = 0; i < selectedDescriptionArrayEnglish.length; i++) {
        //         descriptionDropDown.getElementsByTagName('option')[i+1].value = selectedDescriptionArrayEnglish[i];
        //         descriptionDropDown.getElementsByTagName('option')[i+1].text = selectedDescriptionArrayTamil[i];
        //     }
        //     // var currentDescription = descriptionDropDown.options[descriptionDropDown.selectedIndex].text;
        //     // document.getElementById("selectedWordDisplay").innerHTML = " " + currentDescription;
        // }
        //
        // function selectDescription() {
        //     var descriptionDropDown = document.getElementById('selectedDescription');
        //     var currentDescription = descriptionDropDown.options[descriptionDropDown.selectedIndex].text;
        //     document.getElementById("selectedWordDisplay").innerHTML = " " + currentDescription;
        // }

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

        <form name="voiceProviderDataForm2" method="post" action="/voice-in-tamil/views/upload.php" class="voice-form">
            <fieldset>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="hide_div">
                            <label label class="text-label" for="selectedDisease">Symptom:</label>
                            <!--<select class="form-control" id="selectedDisease" name="selectedDisease"
                                onchange="selectDisease()" >
                                <option value="acne">பருக்கள்</option>
                                <option value="shoulder_pain">தோள்பட்டை வலி</option>
                                <option value="joint_pain">மூட்டு வலி</option>
                                <option value="knee_pain">முழங்கால் வலி</option>
                                <option value="cough">இருமல்</option>
                                <option value="Chest_pain">நெஞ்சு வலி</option>
                                <option value="ear_ache">காது வலி</option>
                                <option value="hair_fall">முடி கொட்டுகிறது</option>
                                <option value="head_ache">தலை வலி</option>
                                <option value="skin_issue">தோல் பிரச்சினை</option>
                                <option value="stomach_ache">வயிற்று வலி</option>
                                <option value="back_pain">முதுகு வலி</option>
                                <option value="neck_pain">கழுத்து வலி</option>
                                <option value="blurry_vision">மங்கலான பார்வை</option>
                                <option value="hard_to_breath">சுவாசிக்க கடினமாக உள்ளது</option>
                                <option value="foot_ache">பாத வலி</option>
                            </select>-->
                            <input type="text" class="form-control" name="selectedDisease" id="selectedDisease">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="hide_div">
                            <label class="text-label" for="selectedDescription">Description:</label>
                            <!--<select class="form-control" id="selectedDescription" name="selectedDescription"
                                onchange="selectDescription()"  >
                                <option id="0"></option>
                                <option id="1"></option>
                                <option id="2"></option>
                                <option id="3"></option>
                                <option id="4"></option>
                                <option id="5"></option>
                                <option id="6"></option>
                                <option id="7"></option>
                                <option id="8"></option>
                                <option id="9"></option>
                            </select>-->
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
                    <p class="text-instruction" style="margin-left:20px;">Record ஐ அழுத்தி மேலுள்ள சொற்றொடரை உங்கள் பேச்சுவழக்கில் வாசியுங்கள்</p>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div id="controls">
                        <label class="rlabel" id="recordButton">Record</label>
                        <label class="rlabel" id="pauseButton">Pause</label>
                        <label class="rlabel" id="stopButton">Stop</label>
                        <!--                        <label class="rlabel" id="recordButton"><img src="../resources/img/record.png" width="75" height="75"></label>-->
                        <!--                        <label class="rlabel" id="pauseButton"><img src="../resources/img/pause.png" width="75" height="75"></label>-->
                        <!--                        <label class="rlabel" id="stopButton"><img src="../resources/img/stop.png" width="75" height="75"></label>-->
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
                    <p class="text-instruction">You can submit only one recording on this page, continue to next page to submit more</p>
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
        <form name="voiceProviderDataForm3" method="post" action="/voice-in-tamil/views/voiceRecord1.php">
            <button type="submit" class="btn btn-primary" id="next1" style="float: right; margin-top: -25px;" disabled>Next &raquo;</button>
        </form>
    </div>
</div>

</body>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="../resources/js/app.js"></script>
<script src="../resources/js/form.js"></script>

</html>
