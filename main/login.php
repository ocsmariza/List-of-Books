
<?php
require_once '../config.php';

$studentid = "";
$studentid_u = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["studentid"]))){
        $studentid_u = 'Please enter your Student ID.';
    } else{
     echo "<script>alert('You are not Enrolled in this University');</script>";
        $studentid = trim($_POST["studentid"]);
    }

   
    if(empty($studentid_u)){

        $sql = "SELECT studentid FROM users WHERE studentid = ?";

        if($stmt = mysqli_prepare($con, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_studentid);
            $param_studentid = $studentid;
            if(mysqli_stmt_execute($stmt)){
            
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    
                    mysqli_stmt_bind_result($stmt, $studentid);
                    if(mysqli_stmt_fetch($stmt)){
                       
                            
                            session_start();
                            $_SESSION['studentid'] = $studentid;
                            header("location: ../create.php");
                        } 
                    }
                    }
                } 
        

   
       mysqli_stmt_close($stmt);
    }

   
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student</title>
    <link rel="stylesheet" href="../mycss.css">
    
	<style>
      div{
		  background-color: #ffffff;
	  }
        input[type=text]{
            width: 25%;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
           
        }
	input[type=submit]{
    width: 35%;
    background-color: #660000;
    color: white;
    padding: 10px;
    margin: 8px ;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

    </style>
    <center>
    
 <img src="../photos/usep.png" height=100 width=100  class="left">  

    <h3 style="color:white">University of Southeastern Philippines</h3>
    
    
    <div class="menus">
            <a href="../adminlogin.php"><div class="homelink">Admin</div></a>
        <div class="dropdown" style="float:center"></div>
          
        </div>
    </center>
</head>
<body>
    <div class="dis">
	<center>
        <h2>Student Log In
            </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div "<?php echo (!empty($studentid_u)) ? 'has-error' : ''; ?>">
                <input type="text" name="studentid" value="<?php echo $studentid; ?>">
                <span><?php echo $studentid_u; ?></span>
            </div>
            <input type="submit" value="Submit">
			</center>
				<br>
          
        </form>
    </div>
</body>
</html>
