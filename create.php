<?php 
require_once 'config.php';

if(isset($_POST['addbook'])){

        $booksname = $_POST['College'];
        $College = $_POST['booksname'];
        $Count = $_POST['Count'];
        $dateborrowed = $_POST['dateborrowed'];
        $datereturned = $_POST['datereturned'];
      
        $sql = "INSERT INTO bookslist (College, booksname, Count, dateborrowed, datereturned)
        VALUES ('$College', '$booksname', $Count, '$dateborrowed', '$datereturned')";
       
              if(mysqli_query($con, $sql)){
                   echo "<script>alert('New Record Created Successfully');</script>";
                  
              } else
              {
                  echo "<script>alert('Please Enter Full Details');</script>";
                      mysqli_error($con);
              }
    
    
        }
    
    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Add New Borrowed</title>
    <link rel="stylesheet" href="../CSS/mycss.css">
    <style>
      input[type=text]{
           
            margin: 5px;
            border-radius: 5px;
           
        }</style>
</head>
<body>	

<div class="header">
  <center>
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

    <h3>University of Southeastern Philippines</h3>
    </center>
    <div id="main">
    
	<h2 align="center">ADD New Borrowed Books</h2>  <br><br><br>  
        <div>
        
                <form action="create.php" method="POST">                                                                       <center>       
                <div class="form-group ">
                <label>College</label>
                <input type="text" name="College" class="form-control" value="">
   <!--                  <?php echo $College; ?>-->
                </div><br> 
                             
                <div class="form-group">
                <label>Books Name:</label>
                <input type="text" name="booksname" class="form-control" value="">
  <!--                  <?php echo $booksname; ?>-->
                </div><br>
				
                <div class="form-group">
                <label>Count </label>
                <input type="text" name="Count" class="form-control" value="">
   <!--                 <?php echo $Count; ?>-->
                </div><br>                    
                    
                <div class="form-group">
                <label>Date Borrowed</label>
                <input type="date" name="dateborrowed" class="form-control" value="">
    <!--                <?php echo $dateborrowed; ?>-->
                </div><br>
                    
                <div class="form-group">
                <label>Date To Return</label>
                <input type="date" name="datereturned" class="form-control" value="">
    <!--                <?php echo $datereturned; ?>-->
                    
                <input type="submit" name="addbook" value="ADD NEW" ><br><br>     
                </div>
                </center>
				</form>  
                <center>
                <a href="../listofbooks/userslogin/login.php"><input type="submit" value="Log Out" ></a>
                    <a href="../listofbooks/userslogin/profile.php"><input type="submit" value="Profile"></a>
                </center>
	</div>
	
    </body>
    </html> 

