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
            <p class="text-style">Thank you for contributing to the Tamil speech dataset !</p>
            </br>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div>
            <form name="voiceProviderDataForm" method="get" action="https://docs.google.com/forms/d/e/1FAIpQLScHfPsz1e37blvYqbPy4Jzv9LqFIAMcD5bHIobiGDIEmpd-gA/viewform?usp=sf_link">
                <div class="text-center mb-3"><button type="submit" class="btn btn-primary" id="contact">Contact Details</button></div>
            </form>
        </div>
        <div>
            <form name="voiceProviderDataForm1" method="post" action="/voice-in-tamil/views/index.php">
                <div class="text-center mb-3"><button type="submit" class="btn btn-primary" id="contribute">Contribute again</button></div>
            </form>
        </div>
    </div>
</div>



</body>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="../resources/js/app.js"></script>
<script src="../resources/js/form.js"></script>


