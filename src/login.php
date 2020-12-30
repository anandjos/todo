<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($link,$_POST['username']);
    $password = mysqli_real_escape_string($link,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($link,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            session_start();

            $_SESSION["loggedin"] = "true";
            $_SESSION['uname'] = $uname;
            header('Location: main.php');
        }else{
            echo "<h2>Invalid username and/or password</h2>";
        }

    }
    else{
        header('Location: index.html');
    }

}