
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Add New Borrowed</title>
    <link rel="stylesheet" href="mycss.css">
    
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
    <h3>Books Added<br>
            <a href="../listofbooks/main/options.php"><input type="submit" value="Log out" ></a></right>
            </h3></h3>
    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search Complaints .." title="Type in a name">
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
<table id="myTable">
<thread>
    <tr id="tableHeader">
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
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            if (tr[i].id != 'tableHeader'){tr[i].style.display = "none";}
        }
    }
}
</script>


        
