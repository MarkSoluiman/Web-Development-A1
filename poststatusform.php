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
    
        <form action="poststatusform.php" method="post">
            <label class="statusinput">Status Code:</label>
            <input type="text" name="statuscode"><br>
            <br>
            <label class="statusinput">Status:</label>
            <input type="text" name="status"><br>
   

    <br>
    
    <label id="radiolabel" for="shareradio">Share:</label>

    <input type="radio" value="public" id="public" name="shareoption">
    <label id="radiooption" for="public">Public</label>


    <input type="radio" value="friends" id="friends" name="shareoption">
    <label id="radiooption" for="friends">Friends</label>


    <input type="radio" value="onlyme" id="onlyme" name="shareoption">
    <label id="radiooption" for="onlyme">Only me</label>
    <br><br>
    

    <label class="dateinput" id="dateinput">Date:</label>  
    <input type="date" name="date"> 

    <br><br>
    
    <label class="checkbox" >Permission:</label>
    <input type="checkbox" name="checkboxoption"> Allow Like 
    <input type="checkbox" name="checkboxoption"> Allow Comments 
    <input type="checkbox" name="checkboxoption"> Allow Sahre 
    <br><br>

    <input type="submit" value="Post" >

    <br><br>
    <p><a href="http://drk3695.cmslamp14.aut.ac.nz/assign1/index.html">Return to home page </a></p>


    </form>

</body>


<?php



?>

</html>