<?php

$host = "localhost";
$database = "todolist";
$user = "root";
$password = "";

$connection = mysqli_connect($host,$user,$password,$database);

session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
        exit;
  }
    $selectsql = "SELECT * FROM tasks";
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      
      if ($result = mysqli_query($connection,$selectsql)) {

        /* fetch associative array */
        echo '
            <style>
            h2{
                text-align:center;
                font-size:50px;
                color:orange;
            }
            table, th{
  border: 1px solid black;
}
table{
    margin-left:25%;
    width:50%;
}
.head{
    color:#1293de;
    font-size:30px;
}
th{
    font-weight: normal;
    font-size:20px;
    height:50px;
    padding: 10px 10px;
}
</style>
<h2>TASKS</h2>
<table>
<tr>
    <th class="head">TASKNAME</th>
    <th class="head">DESCRIPTION</th>
  </tr>';
        while ($row = $result->fetch_assoc()) {
           echo ' 
  <tr>
    <th>'.$row["taskname"].'</th>
    <th>'.$row["description"].'</th>
  </tr>';
        }
      } else {
        echo "0 results";
      }
      echo '</table>';

mysqli_close($connection);
?>