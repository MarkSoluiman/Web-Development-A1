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

require ("poststatusform.php");
require_once("config/sqlSettings.php");



//try to connect to database:
$dbConnect=@mysqli_connect($host,$user,$pswd,$dbName)
    or die ("<p> The database server is not available </p>");

echo "<p> Successfully connected to the database server </p>";


//Try to open the drk3695 database after a successful connection:

@mysqli_select_db($dbConnect,$dbName)
    or die ("<p> The database is not available </p>");

echo "<p> Successfully opened the database.</p>";






//check if table exist:


    $sqlString= "select * from $table";




    $exist=mysqli_query($dbConnect,$sqlString);
    
    //if table already exist:
    if ($exist){
    $sqlString="insert into $table (Status_Code,Status,Share,Date,Permission)
    values ('$statusCode','$status','$share','$date','$permission');";
    
    
    }
    
    //if table doesn't already exist create a table named vipmember:
    else{
        $sqlString="create table $table (
            Status_Code String NOT NULL ,
            Status varchar (255),
            Share varchar (50),
            Date date,
            Permission varchar (60),
            PRIMARY KEY (Status_Code)
        ); ";
    
        $queryResult=@mysqli_query($dbConnect,$sqlString)
        or die ("<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($dbConnect)
        . ": " . mysqli_error($dbConnect) . "</p>");
    
    
    }
    $sqlString="insert into $table (Status_Code,Status,Share,Date,Permission)
    values ('$statusCode','$status','$share','$date','$permission');";
    
    $queryResult=@mysqli_query($dbConnect,$sqlString)
        or die ("<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($dbConnect)
        . ": " . mysqli_error($dbConnect) . "</p>");
    
    



?>














</div>
    
</body>
</html>