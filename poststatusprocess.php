<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="content">

<?php

require "poststatusform.php";
require_once "config/sqlSettings.php";

//try to connect to database:
$dbConnect = @mysqli_connect($host, $user, $pswd, $dbName)
or die("<p> The database server is not available </p>");

echo "<p> Successfully connected to the database server </p>";

//Try to open the drk3695 database after a successful connection:

@mysqli_select_db($dbConnect, $dbName)
or die("<p> The database is not available </p>");

echo "<p> Successfully opened the database.</p>";

$successMessage = "Congratulations! The status has been posted";

//check for validity of user input (Valid status code) :

if (empty($_POST["statuscode"]) || !similar_text(substr($_POST["statuscode"], 0, 1), "S") || !is_numeric(substr($_POST["statuscode"], 1)) || strlen($_POST["statuscode"]) != 5) {

    $validCode = false;

} else {

    $statusCodeInput = $_POST["statuscode"];
    //removing any white space from status code:
    $statusCodeInput = preg_replace('/\s+/', '', $statusCodeInput);
    $statusCode = $statusCodeInput;
    $validCode = true;
}

//check if table exist:

$sqlString = "select * from $table";

$exist = mysqli_query($dbConnect, $sqlString);

//check if the status code entered is valid:
if ($validCode) {

//if table already exist:
    if ($exist) {

        //check if the provided status code already exist:

        $sqlString = "select * from $table where Status_Code = '$statusCode'";
        $rowsCount = mysqli_num_rows(mysqli_query($dbConnect, $sqlString));

        if ($rowsCount > 0) {

            echo "<p>$statusCode already exist </p>";

        } else {

            $sqlString = "insert into $table (Status_Code,Status,Share,Date,Permission)
    values ('$statusCode','$status','$share','$date','$permission');";

        }

    }

//if table doesn't already exist create a table named status:
    else {
        $sqlString = "create table $table (
            Status_Code varchar (5) NOT NULL ,
            Status varchar (255),
            Share varchar (50)  NOT NULL,
            Date date,
            Permission varchar (80)  NOT NULL,
            PRIMARY KEY (Status_Code)
        ); ";

        $queryResult = @mysqli_query($dbConnect, $sqlString)
        or die("<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($dbConnect)
            . ": " . mysqli_error($dbConnect));

    }
    $sqlString = "insert into $table (Status_Code,Status,Share,Date,Permission)
    values ('$statusCode','$status','$share','$date','$permission');";

    $queryResult = @mysqli_query($dbConnect, $sqlString)
    or die("<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($dbConnect)
        . ": " . mysqli_error($dbConnect));
    echo "<p>$successMessage</p>";

} else {
    echo "Invalid status code format,Please enter a valid status code";
}

?>














</div>

</body>
</html>