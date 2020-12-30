<?php

$host = "localhost";
$database = "todolist";
$user = "root";
$password = "";

$errors ="";
$connection = mysqli_connect($host,$user,$password,$database);

session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
        exit;
  }
if(isset($_POST["addbutton"]))
{
if(!empty($_POST["taskname"]) and !empty($_POST["taskdes"]))
{
    $task = $_POST["taskname"];
    $desc = $_POST["taskdes"];
    $insertsql = "INSERT INTO `tasks` ( `taskname`, `description`) VALUES ( '$task', '$desc');";
    if(mysqli_query($connection,$insertsql)){
        echo "<script>alert('Task added');</script>";
        }
        else{
        echo "error ".mysqli_error($connection);
        }
}
else{
    $errors = "Fill in both fields";
}
}
mysqli_close($connection);
?>
<!DOCTYPE>
<html lang="en">
<head>
    <title>Add task</title>
</head>
<link rel="stylesheet" href="css/options.css">
<body>
    <a href="../todo/main.php" class="home">HOME</a>
    <div class="loginform">
        <h2>ADD TASK</h2>
        <form action="addtask.php" method="POST">
        
            <input name="taskname" class="element" type="text" placeholder="Task name"><br>
            <input name="taskdes" class="description" type="text" placeholder="Description..."><br>
            <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
    <?php } ?>
            <button id="button" name="addbutton"  class="button">ADD</button>    
        </form>
    </div>
</body>
</html>