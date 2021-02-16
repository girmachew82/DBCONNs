<?php
session_start();
require_once'config.php';
if($_POST)
{
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $_SESSION['username'] = $user;
    $_SESSION['password'] =$pass;
    $sql_check = mysqli_query($conn,"SELECT * FROM tbluser WHERE name ='$user' AND pass = '$pass'");
    if(mysqli_num_rows($sql_check)>0)
    {
        header('location:adminPage.php');
    }
    else
    {
        header('location:login.php');
    }
}
?>