<?php

session_start();


if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  
}
?>

<html>
    <head>
    <title> Colleges</title>
        <link rel="stylesheet" href="../CSS/mycss.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
<body>
	

    </body>
</html>

                   