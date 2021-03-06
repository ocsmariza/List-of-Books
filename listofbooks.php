
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

 

<?php
session_start();
require_once 'config.php';

$status = "All";
$college = "All";

$mainsql = "SELECT * FROM showbooks";

if(isset($_POST['searchbtn'])){

    $college = $_POST['searchcollege'];
    $status = $_POST['searchstatus'];

    if($status == 'All' && $college == 'All'){
        $mainsql = "SELECT * FROM bookslist";
    }else if($status == 'All' && $college != 'All'){
        $mainsql = "SELECT * FROM bookslist WHERE College = '$college'";
    }else if($status == 'Not Returned' && $college == 'All'){
        $mainsql = "SELECT * FROM bookslist WHERE STATUS = 'Not Returned'";
    }else if ($status == 'Not Returned' && $college != 'All') {
        $mainsql = "SELECT * FROM bookslist WHERE STATUS = 'Not Returned' && College = '$college'";
    }elseif ($status == 'Returned' && $college == 'All') {
        $mainsql = "SELECT * FROM bookslist WHERE STATUS = 'Returned'";
    }elseif ($status == 'Returned' && $college != 'All') {
        $mainsql = "SELECT * FROM bookslist WHERE STATUS = 'Returned' && College = '$college'";
    }
}

$action = '';
$result = mysqli_query($con, $mainsql);
$where = '';

if(isset($_GET["id"]))
{
    
     $id     = $_GET["id"];   //geting id value which we are passing from table headers
     $action = $_GET["action"]; // geting action value which we are passing from table headers
    
    //we are checking condition if $action value is ASC then $action will set to DESC otherwise it will remain ASC
    if($action == 'ASC')
     { 
        $action='DESC';
     }
     else  
     { 
        $action='ASC';
     }
    if($_GET['id']=='Student_name') 
    {
        $id = "Student_name";
    }
    elseif($_GET['id']=='student_id') 
    {
        $id = "student_id";
    }
    elseif($_GET['id']=='College') 
    {
        $id="College";
    }
    elseif($_GET['id']=='booksname') 
    {
        $id="booksname";
    }
    elseif($_GET['id']=='Count') 
    {
        $id="Count";
    }
    elseif($_GET['id']=='date_borrowed') 
    {
        $id="date_borrowed";
    }
    elseif($_GET['id']=='date_returned') 
    {
        $id="date_returned";
    }
    elseif($_GET['id']=='Status') 
    {
        $id="Status";
    }

        $where = " ORDER BY  $id $action ";
        $sql = $mainsql . $where;
        $result = mysqli_query($con, $sql);
    }

mysqli_close($con);
    
?>

<center>
    
 <img src="photos/usep.png" height=100 width=100  class="left">  

      <h1 style="color:white">University of Southeastern Philippines</h1></div>
    <center><h2>Books Borrowed<br>
        <a href="../listofbooks/main/INDEX.php"><input type="submit" value="Log out" >
        <a href="../listofbooks/admin.php"><input type="submit" value="back" ></a></right>
            </h3></h2>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search .." title="Type in a name">
 </center>

<form action="listofbooks.php" method="post">
    <label>Select the Status to Search: </label>
    <select name="searchstatus">
        <option value="<?php echo $status; ?>" ><?php echo $status; ?></option>
        <option value="All">All</option>
        <option value="Not Returned">Not Returned</option>
        <option value="Returned">Returned</option>
    </select><br>
    <label>Select a College to Search: </label>
    <select name="searchcollege">
        <option value="<?php echo $college; ?>"><?php echo $college; ?></option>
        <option value="All">All</option>
        <option value="Institute of Computing">Institute of Computing</option>
        <option value="College of Engineering">College of Engineering</option>
        <option value="College of Education">College of Education</option>
        <option value="College of Technology">College of Technology</option>
        <option value="College of Art and Sciences">College of Art and Sciences</option>
        <option value="College of Governance and Business">College of Governance and Business</option>
        <option value="School of Applied Economics">School of Applied Economics</option>
    </select><br><br>
    <input type="submit" name="searchbtn" value="Search">
 </form>


<br>
<table id="myTable">
<thread>
    <tr id="tableHeader">
 
    <th><a href="listofbooks.php?id=<?php echo 'Student_name';?>&action=<?php echo $action;?>">Student Name</th>
    <th><a href="listofbooks.php?id=<?php echo 'student_id';?>&action=<?php echo $action;?>">Student ID</th>
    <th><a href="listofbooks.php?id=<?php echo 'College';?>&action=<?php echo $action;?>">College</th>
    <th><a href="listofbooks.php?id=<?php echo 'booksname';?>&action=<?php echo $action;?>">Book's Name</th>
    <th><a href="listofbooks.php?id=<?php echo 'Count';?>&action=<?php echo $action;?>">No. of Books Borrowed</th>
    <th><a href="listofbooks.php?id=<?php echo 'date_borrowed';?>&action=<?php echo $action;?>">Date Borrowed</th>
    <th><a href="listofbooks.php?id=<?php echo 'date_returned';?>&action=<?php echo $action;?>">Date To Return</th>
    <th><a href="listofbooks.php?id=<?php echo 'Status';?>&action=<?php echo $action;?>">Status</th>
    <th>Action</th>
        
   
    </tr>
    </thread>
    <tbody>
<?php while($row = mysqli_fetch_assoc($result)) : ?>
    
            <tr>
            
            <td><?php echo $row['Student_name']; ?></td>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo $row['College']; ?></td>
            <td><?php echo $row['booksname']; ?></td>
            <td><?php echo $row['Count']; ?></td>
            <td><?php echo $row['date_borrowed']; ?></td>
            <td><?php echo $row['date_returned']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td><a href='admineditviewedlist.php'id']}'>EDIT</a></td>

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

    <div class="footer">
	<h5 align="center" style="color:white">Bo. Obrero, Inigo Street Davao City
    <br>
        Website: www.usep.edu.ph<br></h5>
	</div>
</body>
</html>

        
