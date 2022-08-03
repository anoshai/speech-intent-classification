<!--form page one-->

<?php
session_start();
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
        function ReadmeFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>
</head>

<body>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="text-center">
            <h11><img src="../resources/img/title.PNG" alt="upload" width="75%" height="75%"></h11>
            <p class="text-style">Help us build a Tamil speech dataset</p>
            </br>
        </div>
        <p class="text-disclaimer">Data collected in this study will be used only for research purposes and in ways that will not reveal who you are.</p>
        </br>
        <form name="voiceProviderDataForm" method="post" action="/voice-in-tamil/views/voiceRecord.php">
            <fieldset>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label class="text-label" for="username">Name:</label>
                        <br/>
                        <input type="text" placeholder="Your Name" class="form-control" id="username" name="username"
                               required>
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label class="text-label" for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option selected disabled value="">Your Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label class="text-label" for="age">Age:</label>
                        <input type="number" min="1" max="120" placeholder="Your Age" class="form-control" id="age" name="age" required>
                        <br/>
                    </div>
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary " id="btnNext">Agree and Continue &raquo;</button>
                </div>
                <div class="popup" onclick="ReadmeFunction()">Read me
                    <span class="popuptext" id="myPopup">If you agree to participate in voice data collection, provide your name, gender, and age on the first page and continue.
                        </br>
                        </br>
                        On the following pages, sentences describing a set of symptoms are displayed.
                        </br>
                        </br>
                        Click Record and read the displayed sentence in your own language expressing the meaning of the given sentence. If you don’t want to read a particular sentence, you can skip it.
                        </br>
                        </br>
                        When the recording is completed, click Stop and the recorded file will appear below. You can listen to the audio and re-record if you think it doesn’t sound right.
                        </br>
                        </br>
                        Finally, click Select under the recording you want to upload and then tap Submit. Click Next and repeat the above procedure. You can record as many sentences as you can by clicking Next.
                        </br>
                        </br>
                        When you are done, tap Exit.
                    </span>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

</body>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="../resources/js/app.js"></script>
<script src="../resources/js/form.js"></script>

</html>
