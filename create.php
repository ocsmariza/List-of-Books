<?php 
    require_once 'config.php';

    if(isset($_POST['addbook'])) {
        $booksname = $_POST['booksname'];
        $Student_name = $_POST['Student_name'];
        $student_id = $_POST['student_id'];
        $College = $_POST['College'];
        $Count = $_POST['Count'];
        $dateborrowed = $_POST['dateborrowed'];
        $datereturned = $_POST['datereturned'];
       

        $sql="CALL addtobookslist('$booksname', '$Student_name', '$student_id','$College',$Count,
        '$dateborrowed','$datereturned')";
            if(mysqli_query($con, $sql)) { 
                echo "<script>alert('New Record Created Successfully');</script>";
                  
            }
            
            else {
                  echo "<script>alert('Please Enter Full Details');</script>";
                      mysqli_error($con);
            }
        }
    mysqli_close($con);
?>
<html>
    <head>
    <title> List of Books</title>
    <link rel="stylesheet" type="text/css" href="css/create.css">
        <style>
        .body{
            height: 430px;
            }
            input[type=text] {
                width: 20%;
                background-color: #ffffff;
                padding: 10px;
                cursor: pointer;
                border-radius: 5px;
            }
        </style>
    </head>
    
    <body>	
        <center>
            <div class="header">
                <div class="position">
                    <div class="logo">
                        <img src="photos/usep.png" top-padding=5px height=80 width=80  class="right">
                    </div>
                    <h1 style="color:white">University of Southeastern Philippines</h1> 
                </div>
                <div class="body">
                    <center>
                        <div class="navigation">
    
                        <a href="../listofbooks/main/INDEX.php" style="text-decoration:none">
                            <input type="submit" value="Log Out" >
                        </a>
                        </div>
                    </center>
                        <h2 align="center">Borrowing Book Form</h2>
                            <form action="create.php" method="POST">
      
                                    <div class="student_name">
                                        <label>Student Name</label>
                                    </div>
                                    <div class="inputname">
                                    <input type="text" name="Student_name" class="form-control" value="" placeholder="Ex: Mariza Ocoy">    
   <!--                                 <?php echo $Student_name; ?>-->    
                                    </div>
                                
                                    
                                    <div class="studentid">
                                        <label>Student ID</label>
                                    </div>
                                    <div class="inputid">
                                        <input type="text" name="student_id" class="form-control" value="" placeholder="Ex: 2015-00999">    
   <!--                                 <?php echo $student_id; ?>-->    
                                    </div>
                                    
                                    <div class="college">
                                        <label>College</label>
                                    </div>
                                    <div class="inputcollege">
                                        <input type="text" name="College" class="form-control" value="" placeholder="Ex: College of Computing">
   <!--                                 <?php echo $College; ?>-->
                                    </div>
                             
                                    <div class="bookname">
                                        <label>Book Name</label>&nbsp;
                                    </div>
                                    <div class="inputbook">
                                        <input type="text" name="booksname" class="form-control" value="" placeholder="Ex: PHP for Dummies">
  <!--                                  <?php echo $booksname; ?>-->
                                    </div>
                                        
                                    <div class="count">
                                        <label>Count </label>&nbsp;&nbsp;
                                    </div>
                                    <div class="inputcount">
                                        <input type="text" name="Count" class="form-control" value="">
   <!--                                 <?php echo $Count; ?>-->
                                    </div>
                                              
                                <div class="dateborrowed">
                                    <label>Date Borrowed</label>
                                </div>
                                <div class="inputborroweddate">
                                    <input type="date" name="dateborrowed" class="form-control" value="">
    <!--                            <?php echo $dateborrowed; ?>-->
                                </div>
                
                                <div class="datetoreturn">
                                    <label>Date To Return</label>
                                </div>
                                <div class="inputreturndate">
                                    <input type="date" name="datereturned" class="form-control" value="">
    <!--                            <?php echo $datereturned; ?>-->
                                </div>
                                
                                   
                                    
                                <div class="add">
                                    <input type="submit" name="addbook" value="ADD NEW" ><br><br><br>   
                                </div>
				            </form>

                </div>
                <div class="footer">
                    <h5 align="center" style="color:white">Bo. Obrero, Inigo Street Davao City
                    <br>
                    Website: www.usep.edu.ph<br></h5>
                </div>
            </div>
        </center>
    </body>
</html>
 
 