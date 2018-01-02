<?php
require_once 'config.php';

$username = $password = $confirm_password = "";
$username_u = $password_u = $confirm_password_u = "";
$privilege = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_u = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM usertable WHERE username = ?";

if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = trim($_POST["username"]);

if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
        $username_u = "This username is already taken.";
    } else{
        $username = trim($_POST["username"]);
                }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
if(empty(trim($_POST['password']))){
        $password_u = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_u = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_u = 'Please confirm password.';
} else{
        $confirm_password = trim($_POST['confirm_password']);
if($password != $confirm_password){
            $confirm_password_u = 'Password did not match.';
        }
    }
if(empty($username_u) && empty($password_u) && empty($confirm_password_u)){
        $privilege = $_POST['privilege'];
        $sql = "INSERT INTO usertable (username, password,privilege) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_privilege);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_privilege = $privilege;

        
            if(mysqli_stmt_execute($stmt)){
                header("location: ../listofbooks/register.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }   
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
       <style>
      
        .header{
            width: 70%;
            background-color: #660000;
            margin-left: 15%;
            margin-right: 15%;
            border-radius: 10px;
            
        }
    input[type=text]{
            width: 18%;
            background-color: #ffffff;
            color: black;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
}
           
        input[type=submit]{
            width: 21%;
            background-color: #660000;
            color: aliceblue;
            padding: 13px;
            cursor: pointer;
            border-radius: 5px;
            
        }
           input[type=password]{
            width: 18%;
            background-color: #ffffff;
            color: black;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
           }
        
        .border{
                border-style: groove;
                background-color: #fcf7f7;
                border-radius: 6px;
                padding-bottom: 2%;
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
        .footer{
            margin-top: 2%;
            padding-right: 14px;
            border-radius: 10px;
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
		<center>
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div <?php echo (!empty($username_u)) ? 'has-error' : ''; ?>>
                <label>Username:<sup>*</sup></label><br>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span style="color: red"><?php echo $username_u; ?></span>
            </div>

        
            <div <?php echo (!empty($username_u)) ? 'has-error' : ''; ?>>
                <label>Position:</label><br>
                <select name="privilege">
                    <?php
                    include ('config.php');

                    $sql = "SELECT position,privilege FROM position";

                    if($result = mysqli_query($con, $sql)){
                        
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value = '" .$row['privilege']."'>" .$row['position']."</option>";
                        }

                        } else
                            {
                                echo "Error ." .$sql . "<br>" . 
                                mysqli_error($con);
                            }
                    ?>
                </select>
            </div>

            <div <?php echo (!empty($password_u)) ? 'has-error' : ''; ?>>
                <label>Password:<sup>*</sup></label><br>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span style="color: red"><?php echo $password_u; ?></span>
            </div>

            <div <?php echo (!empty($confirm_password_u)) ? 'has-error' : ''; ?>>
                <label>Confirm Password:<sup>*</sup></label><br>
                <input type="password" name="confirm_password"  value="<?php echo $confirm_password; ?>">
                <span style="color: red"><?php echo $confirm_password_u; ?></span>
            </div>

            <div>
                <br>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
			<br>
            <p>Already have an account? <a href="../listofbooks/main/INDEX.php">Login here</a>.</p>
			
        </form>
    </div>
     <div class="footer">
	<h5 align="center" style="color:white">Bo. Obrero, Inigo Street Davao City
    <br>
        Website: www.usep.edu.ph<br><br></h5>
	</div>	
    </center	
</body>
</html>
