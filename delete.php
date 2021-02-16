<?php
require_once'config.php';

if($_GET['id'])
{
    $sql_delete = mysqli_query($conn,"DELETE FROM tbluser WHERE id ='".$_GET['id']."'");
    if($sql_delete)
    {
        header('location:index.php');
    }
    else{
        echo mysqli_error($conn);
    }
}
?>