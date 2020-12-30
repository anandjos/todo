<?php

include "config.php";
$errors="";
if(isset($_POST["but_submit"]))
{
if(!empty($_POST["username"]) and !empty($_POST["password"]))
{
    $usr = $_POST["username"];
    $pass = $_POST["password"];
    $insertsql = "INSERT INTO `users` ( `username`, `password`) VALUES ( '$usr', '$pass');";
    if(mysqli_query($link,$insertsql)){
        echo "<script>alert('Account created');</script>";
        $_SESSION['uname'] = $usr;
            header('Location: main.php');
        }
        else{
        echo "error ".mysqli_error($link);
        }
}
else{
    $errors = "Fill in both fields";
}
}
?>

<html lang="en">
<head>
    <title>Create account</title>
</head>
<link rel="stylesheet" href="css/login.css">
<body>
    <div class="wrapper">
        <div class="loginform">
        <form class="form" method="POST" action="account.php">
        <h2>Create Account</h2>
                <input class="element" name="username" type="text" placeholder="Username"><br>
                <input class="element" name="password" type="password" placeholder="Password"><br>
               <!--- <input class="element" name="confirm_password" type="password" placeholder="Reenter Password"><br>-->
               <?php if (isset($errors)) { ?>
	<p><?php echo "$errors"; ?></p>
    <?php } ?>
                <input id="button" type="submit" name="but_submit"value="Create">
        </form>
        </div>
    </div>
    <div>
        <label for="">
            <i></i>
        </label>
    </div>
</body>
</html>