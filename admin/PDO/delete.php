<?php
require_once'config.php';

if($_GET['id'])
{
    $sql_delete = $conn->prepare("DELETE FROM tbluser WHERE id =:id");
    $sql_delete ->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $sql_delete->execute();
    if($sql_delete)
    {
        header('location:index.php');
    }
    else{
        echo mysqli_error($conn);
    }
}
?>