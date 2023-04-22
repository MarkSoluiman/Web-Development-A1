<?php 

require "about.html";

require_once "config/sqlSettings.php";

//try to connect to database:
$dbConnect = @mysqli_connect($host, $user, $pswd, $dbName)
or die("<p> The database server is not available </p>");

echo "<p> Successfully connected to the database server </p>";

//Try to open the drk3695 database after a successful connection:

@mysqli_select_db($dbConnect, $dbName)
or  die ("<p> The database is not available </p>");

echo "<p> Successfully opened the database.</p>";

if ($_POST["droptable"]){


$sqlString= "drop table $table";
$dropped=@ mysqli_query($dbConnect,$sqlString)
or die( "<p>table $table has not been deleted</p>") ;
echo "<p>table $table has been deleted </p>";




 

}


?>