
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>List of Books Borrowed</title>  
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
            input[type=submit]{
                width: 17%;
                background-color: #660000;
                color: #faecec;
                padding: 10px;
                cursor: pointer;
                border-radius: 5px;
                
            }
            .header{
            background-color: #660000;
            border-radius: 10px;
            
        }
            input[type=text]{
                width: 20%;
                padding: 10px;

            }   
            .footer{
            background-color: #660000;
            border-radius: 5px;
                padding-bottom: 1px;
                padding-top: 1px;
            }
            
        
</style> 
</head>
<body>	

<div class="header">
  <center>
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

      <h1 style="color:white">University of Southeastern Philippines</h1></div>
    <center><h2>Books Borrowed<br>
        <a href="../listofbooks/main/INDEX.php"><input type="submit" value="Log out" >
        <a href="../listofbooks/admin.php"><input type="submit" value="back" ></a></right>
            </h3></h2>
    

<?php

require_once 'config.php';


$sql = "SELECT a.colleges, COUNT(b.College) AS count_borrowed FROM college_table a LEFT JOIN bookslist b ON a.colleges = b.College GROUP BY a.colleges";
$result = mysqli_query($con, $sql);


mysqli_close($con);
    
?>
<br><br>
<CENTER>
    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search Criminal Case.." title="Type in a name">
    </CENTER>
<br><br>
<table id="myTable">
<thread>
    <tr id="tableHeader">
    <th>Colleges</th>
    <th>Count</th>
        
   
    </tr>
    </thread>
    <tbody>
<?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['colleges']; ?></td>
            <td><?php echo $row['count_borrowed']; ?></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>
    
    </tbody>
</table>

<!--JAVASCRIPT PARA PAG FILTER SA SEARCH-->
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


<html>
<body>
    <div class="footer">
	<h5 align="center" style="color:white">Bo. Obrero, Inigo Street Davao City
    <br>
        Website: www.usep.edu.ph<br></h5>
	</div>	</body></html>

