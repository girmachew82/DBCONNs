<?php
require_once'config.php';

if($_GET['id'])
{
    $sql_delete = $conn->query("DELETE FROM tbluser WHERE id ='".$_GET['id']."'");
    if($sql_delete)
    {
        header('location:index.php');
    }
    else{
        echo $conn->connect_error;
    }
}
$conn->close();
?>