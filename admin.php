
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Add New Borrowed</title>
    <link rel="stylesheet" href="../CSS/mycss.css">
    
        <style>
table {
    border-collapse: collapse;
    width: 100%;
    
}        
table, td, th {
    border-collapse: collapse;
    border: 1px solid black;
    text-align: left;
    padding: 20px;
    text-align: center;
}

th{
    background-color: #660000;
    color: white;
}


tr:hover {background-color: #b3b3b3} 
        
</style> 
</head>
<body>	

<div class="header">
  <center>
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

    <h3>University of Southeastern Philippines</h3><br>
    <h3>Books Added
        <right><a href="../listofbooks/create.php"><input type="submit" value="Back" ></a>
            <a href="../listofbooks/main/login.php"><input type="submit" value="Log out" ></a></right>
            </h3></h3>
      
   
    </center>
    </body>
    
</html>
<?php
session_start();
require_once 'config.php';

$sql = "SELECT ID, College, booksname, Count, dateborrowed, datereturned FROM bookslist";
$result = mysqli_query($con, $sql);


mysqli_close($con);
    
?>
<br><br><br>
<table>
<thread>
    <tr>
    <th>ID</th>
    <th>College</th>
    <th>Books Name</th>
    <th>Count</th>
    <th>Date Borrowed</th>
    <th>Date To Return</th>
        
   
    </tr>
    </thread>
    <tbody>
<?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['College']; ?></td>
            <td><?php echo $row['booksname']; ?></td>
            <td><?php echo $row['Count']; ?></td>
            <td><?php echo $row['dateborrowed']; ?></td>
            <td><?php echo $row['datereturned']; ?></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>
    
    </tbody>
</table>

        
