<?php
require_once '../config.php';

$username = $password = "";
$username_u = $password_u = "";
$privilege = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty(trim($_POST["username"]))){
        $username_u = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST['password']))){
        $password_u = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    if(empty($username_u) && empty($password_u)){
        $sql = "SELECT username, password, privilege FROM usertable WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
           
                mysqli_stmt_store_result($stmt);

              
                if(mysqli_stmt_num_rows($stmt) == 1){
                  
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $privilege);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            $_SESSION['username'] = $username;
                            $_SESSION['privilege'] = $privilege;

                            if($_SESSION['privilege'] == 1){
                            header("location: ../admin.php");
                            }
                            if($_SESSION['privilege'] == 2){
                            header("location: ../create.php");
                            }

                        } else{
                          
                            $password_u = 'The password you entered was not valid.';
                        }
                    }
                } else{
                
                    $username_u = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

      
       mysqli_stmt_close($stmt);
    }

    mysqli_close($con);
}
?>
<html>
    <head>
    <title> List of Books</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
        <style>
        .footer{
            margin-top: 39%;
            padding-right: 14px;
            border-radius: 10px;
            }
            input[type=submit]{
                width: 20%;
                padding: 16px;
            }
            input[type=text]{
                width: 20%;
                padding: 16px;
            }
            input[type=password]{
                width: 20%;
                padding: 16px;
            }
        </style>
    </head>
    
    <body>	
        <center>
            <div class="header">
                <div class="position">
                    <div class="logo">
                        <img src="../photos/usep.png" top-padding=5px height=80 width=80  class="right">
                    </div>
                    <h1 style="color:white">University of Southeastern Philippines</h1> 
                </div>
                <div class="body">
                    
                        <h3><p style="font-family: Tahoma">Please fill in your credentials to login.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div <?php echo (!empty($username_u)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label><br>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span style="color: red"><?php echo $username_u; ?></span>
                </div>
                <div <?php echo (!empty($password_u)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label><br>
                <input type="password" name="password" >
                <span style="color: red"><?php echo $password_u; ?></span>
                </div><br>
                <input type="submit" value="Submit"><br>
                <a style="font-family: Tahoma">Don't have an account? <a href="../register.php">Sign up now</a>.</p>
			    </center>
				<br>
                
                </form>
            </h3>
                <div class="footer">
                    <h5 align="center" style="color:white"><br>Bo. Obrero, Inigo Street Davao City
                    <br>
                    Website: www.usep.edu.ph<br></h5>
                </div>
                </div>
            </div>
        </center>
    </body>
</html>
 
 