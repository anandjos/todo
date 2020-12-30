<?php
include "config.php";

session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
        exit;
  }

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.html');
}
?>

<html>
<head>
    <title>to-do app</title>
</head>
<link rel="stylesheet" href="css/styles.css">
<body>
    <div class="heading">
    <form method='POST' action="">
        <input type="submit" class="logout" value="Logout" name="but_logout">
    </form>
    <h1>TO-DO-LIST</h1></div>
    <div class="wrapper">
        <div class="option1"><a href="../todo/view.php">VIEW</a></div>
        <div class="option2"><a href="../todo/addtask.php">ADD</a></div>
        <div class="option3"><a href="../todo/deletetask.php">DELETE</a></div>
        <div class="option4"><a href="../todo/edittask.php">EDIT</a></div>
    </div>
</body>
</html>