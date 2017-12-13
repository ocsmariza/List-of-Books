<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listofbooks";


$con = mysqli_connect($servername, $username, $password, $dbname);


if(!$con){
     die("ERROR: Could not connect. " . mysqli_connect_error());
    
}

        ?>