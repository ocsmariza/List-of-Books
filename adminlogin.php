
<?php
require_once 'config.php';

$adminid = "";
$adminid_u = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["adminid"]))){
        $adminid_u = 'Please enter your Admin ID.';
    } else{
     echo "<script>alert('You are not the Admin');</script>";
        $adminid = trim($_POST["adminid"]);
    }

   
    if(empty($admin_u)){

        $sql = "SELECT adminid FROM admin WHERE adminid = ?";

        if($stmt = mysqli_prepare($con, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_adminid);
            $param_adminid = $adminid;
            if(mysqli_stmt_execute($stmt)){
            
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    
                    mysqli_stmt_bind_result($stmt, $adminid);
                    if(mysqli_stmt_fetch($stmt)){
                       
                            
                            session_start();
                            $_SESSION['adminid'] = $adminid;
                            header("location: admin.php");
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
    <title>Admin</title>
    <link rel="stylesheet" href="mycss.css">
    
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
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

    <h3>University of Southeastern Philippines</h3>
    
      <a href="../listofbooks/main/login.php">Student</a>
        <div class="dropdown" style="float:center"></div>
    
    </center>
</head>
<body>
    <div class="dis">
	<center>
        <h2>Admin
            </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div "<?php echo (!empty($adminid_u)) ? 'has-error' : ''; ?>">
                <input type="text" name="adminid" value="<?php echo $adminid; ?>">
                <span><?php echo $adminid_u; ?></span>
            </div>
            <input type="submit" value="Submit">
			</center>
				<br>
          
        </form>
    </div>
</body>
</html>
