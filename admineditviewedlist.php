<?php

session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: main/index.php");
  exit;
}
?>
<?php
	require_once 'config.php';

	if(isset($_POST['cancel'])){
		header("location: listofbooks.php");
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * from bookslist where id='$id'";
		$row = mysqli_query($con,$sql);

		$result = mysqli_fetch_array($row);		
	}
	if(isset($_POST['updt'])){
		$id = $_POST['id'];
        $status = $_POST['newstatus'];
       

			$upd = "UPDATE bookslist set status='$status'";
			$rest = mysqli_query($con,$upd);
			header('location: listofbooks.php');

	}
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>List of Books Borrowed</title>  
        <style>

            .header{
            background-color: #660000;
            border-radius: 10px;
            
        }
             
            .footer{
            background-color: #660000;
            border-radius: 5px;
                padding-bottom: 1px;
                padding-top: 1px;
            }
            input[type=submit]{
                width: 17%;
                background-color: #660000;
                color: #faecec;
                padding: 10px;
                cursor: pointer;
                border-radius: 5px;
                
            }
            input[type=text] {
                width: 29%;
                background-color: #ffffff;
                padding: 10px;
                cursor: pointer;
                border-radius: 5px;
            }
            
        
</style> 
</head>
<body>	

<div class="header">
  <center>
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

      <h1 style="color:white">University of Southeastern Philippines</h1></div>
    <center><h2>Books Borrowed<br>
        <a href="../listofbooks/main/INDEX.php"><input type="submit" value="Log out" >
        <a href="listofbooks.php"><input type="submit" value="back" ></a></right>
            </h2>
		<form action="admineditviewedlist.php" method="post">
			<h1>Change Status</h1>
			<tr>
			<td>Status: </td><td><input type="text" name="newstatus"></td>
			</tr><br>
			

			<br>
			<input type="submit" value="Update" id="insert" name="updt">
			<input type="submit" value="Cancel" name="cancel">

		</form>
</center>

   <div class="footer">
	<h5 align="center" style="color:white">Bo. Obrero, Inigo Street Davao City
    <br>
        Website: www.usep.edu.ph<br></h5>
	</div>
</body>
</html>
 