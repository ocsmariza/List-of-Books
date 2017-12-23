<?php 
require_once 'config.php';

if(isset($_POST['addbook'])){
        $stud_id = $_POST['stud_id'];
        $booksname = $_POST['College'];
        $College = $_POST['booksname'];
        $Count = $_POST['Count'];
        $dateborrowed = $_POST['dateborrowed'];
        $datereturned = $_POST['datereturned'];

        $sql="CALL addtobookslist('$stud_id','$College','$booksname',$Count,
        '$dateborrowed','$datereturned')";
      
      
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
    <style>
      
        .header{
            width: 70%;
            background-color: #660000;
            margin-left: 15%;
            margin-right: 15%;
            border-radius: 10px;
            
        }
    input[type=text]{
    margin: 5px;
    width: 20%;
    background-color: #ffffff;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
}
        input[type=date]{
            width: 20%;
            background-color: #ffffff;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type=submit]{
            width: 18%;
            background-color: #660000;
            color: aliceblue;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            
        }
        
        .border{
                border-style: groove;
                background-color: #fcf7f7;
                border-radius: 6px;
            }
        .form-group{
            padding-left: 150px;
        }
        .dates{
            padding-left: 147px;
        }
        .add{
            padding-left: 410px;
        }
        
    </style>
</head>
<body>	

<div class="header">
  <center>
 <img src="photos/usep.png" height=80 width=80  class="left"> 
    <h1 style="color:white">University of Southeastern Philippines</h1>
    </center>
    
        
                <div class="border">
                    <center><a href="../listofbooks/listofbooks.php"><input type="submit" value="List Of Books Borrowed"></a>
                    <a href="../listofbooks/log.php"><input type="submit" value="View Log"></a>
                    <a href="../listofbooks/main/INDEX.php"><input type="submit" value="Log Out" ></a></center>
                    <div id="main">
                    <h2 align="center">ADD New Borrowed Books</h2>
                    <div>
            
                <form action="create.php" method="POST">
                <div class="form-group ">
                <label>Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="stud_id" class="form-control" value="">
   <!--                  <?php echo $stud_id; ?>-->

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>College</label>
                <input type="text" name="College" class="form-control" value="">
   <!--                  <?php echo $College; ?>--><br>
                             
                
                <label>Books Name:</label>
                &nbsp;<input type="text" name="booksname" class="form-control" value="">
  <!--                  <?php echo $booksname; ?>-->
    
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Count </label>
                &nbsp;&nbsp;<input type="text" name="Count" class="form-control" value="">
   <!--                 <?php echo $Count; ?>--><br>
                </div>
                    
                <div class="dates">
                <label>Date Borrowed</label>
                <input type="date" name="dateborrowed" class="form-control" value="">
    <!--               <?php echo $dateborrowed; ?>-->
                
                &nbsp;&nbsp;&nbsp;
                <label>Date To Return</label>
                <input type="date" name="datereturned" class="form-control" value="">
    <!--                <?php echo $datereturned; ?>-->
                </div><br><br>
                    
                <div class="add">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="addbook" value="ADD NEW" ><br><br><br>   
                </div>
                
                
				</form>  
                </div>
                </div>
                
	</div>
        <div class="footer">
	<h5 align="center" style="color:white">Bo. Obrero, Inigo Street Davao City
    <br>
        Website: www.usep.edu.ph<br></h5>
	</div>	
    </center>
    </body>
    </html> 

