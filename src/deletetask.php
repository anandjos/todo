
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
if(isset($_POST["delbutton"]))
{
if(!empty($_POST["task"]))
{
    $task = $_POST["task"];
    $sql_query = "select count(*) as count from tasks where taskname='".$task."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['count'];
    if($count<1){
        echo "Invalid task";
    }
    else{
    $deletesql = "DELETE FROM `tasks` WHERE taskname= '$task'";
    if(mysqli_query($connection,$deletesql)){
        echo"<script> alert('Task deleted'); </script>";
        }
        else{
        echo "error ".mysqli_error($connection);
        }
    }
    }
else{
    $errors = "Enter task name";
}
}
mysqli_close($connection);
?>

<html>
<head>
    <title>Delete task</title>
</head>
<link rel="stylesheet" href="css/options.css">
<body>
    <a href="../todo/main.php" class="home">HOME</a>
    <form action="../todo/deletetask.php" method="POST">
        <div class="loginform">   
        <h2>DELETE TASK</h2>
                <div>
                <input type="text" class="element" name="task" placeholder="Enter taskname">
                <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
    <?php } ?>
                <input id="button" name="delbutton" type="submit" value="DELETE">
                </div>
        </div>
    </form>
</body>
</html>