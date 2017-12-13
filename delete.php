<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
 
    require_once 'config.php';

    $sql = "DELETE FROM bookslist WHERE id = ?";

    if($stmt = mysqli_prepare($con, $sql)){
       
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_POST["id"]);

      
        if(mysqli_stmt_execute($stmt)){
          
            header("location: showtables.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }


    mysqli_stmt_close($stmt);

    
    mysqli_close($con);
} else{

    if(empty(trim($_GET["id"]))){
     
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Borrowed</title>
    <link rel="stylesheet" href="../CSS/mycss.css">
    
</head>
<body>	

<div class="header">
  <center>
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

    <h3>University of Southeastern Philippines</h3>
    </center>
    <div id="main">
<body>
   
                        <h1>Delete Record</h1>
            
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
        
</body>
</html>
