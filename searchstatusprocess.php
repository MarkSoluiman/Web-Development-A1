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
<h1>Status Information</h1>
<br>
<br>


<?php

require_once "config/sqlSettings.php";
require "searchstatusform.html";

//Variables:

//try to connect to database:
$dbConnect = @mysqli_connect($host, $user, $pswd, $dbName)
or die("<p> The database server is not available </p>");

echo "<p> Successfully connected to the database server </p>";

//Try to open the drk3695 database after a successful connection:

@mysqli_select_db($dbConnect, $dbName)
or die("<p> The database is not available </p>");

echo "<p> Successfully opened the database.</p>";

$searchInput = $_GET["Search"];
//removing any excess white space from search input
$searchInput = trim($searchInput);

// check if search input is valid

if (empty($searchInput)) {
    $validSearch = false;
} else {
    $search = $searchInput;
    $validSearch = true;

}

//check if table exist:

$sqlString = "select * from $table";

$exist = mysqli_query($dbConnect, $sqlString);

//check if the status code entered is valid:
if ($validSearch) {

    //if table already exist:
    if ($exist) {

        //check if the status searched exist:
        $sqlString = "select * from $table where LOWER (Status) LIKE LOWER ('%$search%')";
        $searchResults = mysqli_query($dbConnect, $sqlString);
        $numOfRows = mysqli_num_rows($searchResults);
        $Results = mysqli_fetch_row($searchResults);

        //if a status exist:
        if ($numOfRows > 0) {

            while ($Results) {

                // show status search results if status exist:
                echo "<p>Status: $Results[1] </p>";
                echo "<p>Status Code: $Results[0] </p> <br>";

                echo "<p>Share: $Results[2] </p>";
                echo "<p>Date Posted: $Results[3] </p>";
                echo "<p>Permission: $Results[4] </p> <br><br>";

                $Results = mysqli_fetch_row($searchResults);

            }

        } else {
            echo "<p>No status matches your search was found!</p>";
        }

    } else {
        echo "<p>You didn't post any status yet, please post a new status.</p>";
        echo "<a href='http://drk3695.cmslamp14.aut.ac.nz/assign1/poststatusform.php'>Post a new status</a>";
    }
} else {
    echo "<p>Please enter a word to search for your status.</p>";

}

?>

</body>

<a href="http://drk3695.cmslamp14.aut.ac.nz/assign1/searchstatusform.html">Search for another status</a>

<body>

</div>


</body>


</html>