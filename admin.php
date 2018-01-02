<!DOCTYPE html>
<html>
    <title>Mini Library System</title>
    <head>
    <style>
    .header {
    position: fixed;
    width: 70%;
    background-color: #660000;
    margin-left: 15%;
    margin-right: 15%;
    border-radius: 10px;
    font-family: "Century Gothic";
}
    .footer{
            background-color: #660000;
            border-radius: 10px;
            
                
        }

    .logo {
    position: relative;
    top: 14px;   
}
    .body{
    height: 380px;
    border-style: groove;
    background-color: #fcf7f7;
    border-radius: 6px;
    border: 1px solid #1d1d1d;
}
    input[type=submit]{
        width: 23%;
        background-color: #660000;
        color: #faecec;
        padding: 16px;
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
                <img src="photos/usep.png" top-padding=5px height=80 width=80 class="right">
                </div>
            <h1 style="color:white">University of Southeastern Philippines</h1></div>
            <div class="body"><br><br>
            <a href="../listofbooks/inventory.php">
                <input type="submit" value="Inventory"></a><br><br>
            <a href="listofbooks.php">
                <input type="submit" value="List of Borrowed Books"></a><br><br>
            <a href="log.php">
                <input type="submit" value="View Log"></a><br><br><br><br><br>
            <a href="../listofbooks/main/INDEX.php" style="text-decoration:none">
                <input type="submit" value="Log Out"></a>
            
            </div>
            <div class="footer">
                    <h5 align="center" style="color:white"><br>Bo. Obrero, Inigo Street Davao City
                    <br>
                    Website: www.usep.edu.ph<br></h5>
                </div>
        </div>
            </center>
    </body>
</html>