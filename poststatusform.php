<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label.statusinput {
            width: 100px;
            display: inline-block;
        }
        label.dateinput{
            width: 100px;

            display: inline-block;
        }
        label.checkbox{
            width: 100px;
            display: inline-block;
        }



    </style>

</head>

<body>
    <h1>Status Posting System</h1>

        <form action="poststatusprocess.php" method="post">
            <label class="statusinput">Status Code: *</label>
            <input type="text" name="statuscode" required placeholder="e.g S0001"><br>
            <br>
            <label class="statusinput">Status: *</label>
            <input type="text" name="status" required><br>


    <br>

    <!-- //Radio -->

    <label id="radiolabel" for="shareradio">Share:

    <input type="radio" value="public" id="shareradio" name="radiooption">
    <label id="radiooption" for="public">Public</label>


    <input type="radio" value="friends" id="shareradio" name="radiooption">
    <label id="radiooption" for="friends">Friends</label>


    <input type="radio" value="onlyme" id="shareradio" name="radiooption">
    <label id="radiooption" for="onlyme">Only me</label>
    <br><br>
    </label>

    <!-- Date -->


    <label class="dateinput" id="dateinput">Date:</label>
    <input type="date" name="date" value="<?= date('Y-m-d', time()); ?>" />


    <br><br>

    <!-- CheckBox -->

    <label class="checkbox" >Permission:</label>
    <input type="checkbox" name="checkboxoption[]" value="Allow Like"> Allow Like
    <input type="checkbox" name="checkboxoption[]" value="Allow Comments"> Allow Comments
    <input type="checkbox" name="checkboxoption[]" value="Allow Share"> Allow Share
    <br><br>

    <input type="submit" value="Post" >

    <br><br>
    <p><a href="http://drk3695.cmslamp14.aut.ac.nz/assign1/index.html">Return to home page </a></p>


    </form>

</body>


<?php

$statusCodeInput = $_POST["statuscode"];
$status = $_POST["status"];
$share = $_POST["radiooption"];
$date = $_POST["date"];
$permission = $_POST["checkboxoption"];


//removing any white space from status code:
// $statusCodeInput = preg_replace('/\s+/', '', $statusCodeInput);

//Checking for status code validation

?>

</html>