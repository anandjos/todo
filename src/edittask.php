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
if(isset($_POST["editbutton"]))
{
if(!empty($_POST["taskname"]) and !empty($_POST["taskdes"]))
{
    $task = $_POST["taskname"];
    $desc = $_POST["taskdes"];

    $sql_query = "select count(*) as count from tasks where taskname='".$task."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['count'];
    if($count<1){
        echo "Invalid task";
    }
    else{
    $updatesql = "UPDATE `tasks` SET description='$desc' WHERE taskname='$task';";
    if(mysqli_query($connection,$updatesql)){
        echo "<script>alert('Task edited');</script>";
        }
        else{
        echo "error ".mysqli_error($connection);
        }
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
    <title>Edit task</title>
</head>
<link rel="stylesheet" href="css/options.css">
<body>
    <a href="../todo/main.php" class="home">HOME</a>
    <div class="loginform">
        <h2>EDIT TASK</h2>
        <form action="edittask.php" method="POST">
        
            <input name="taskname" class="element" type="text" placeholder="Task name"><br>
            <input name="taskdes" class="description" type="text" placeholder="New Description..."><br>
            <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
    <?php } ?>
            <button id="button" name="editbutton"  class="button">EDIT</button>
            
        </form>
    </div>
</body>
</html>