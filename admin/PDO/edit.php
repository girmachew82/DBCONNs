<?php
require_once'config.php';
if($_GET['name'] && $_GET['pass'] && $_GET['id'])
{
    ?>
             <form action="" method="post">
            <label for="">Name</label>
            <input type="text" name="name" id="" value="<?php echo $_GET['name'];?>">
            <label for="">password</label>
            <input type="text" name="pass" id="" value="<?php echo $_GET['pass'];?>">
            <input type="submit" value="Update" name='update'>
</form>
    <?php
    if(isset($_POST['update']))
    {
       
        try{
            $sql_update = $conn->prepare("UPDATE tbluser SET `name` =:name,`pass`=:pass WHERE `id`=:id");
            $sql_update->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
            $sql_update->bindParam(':pass',$_POST['pass'],PDO::PARAM_STR);
            $sql_update->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
            $sql_update->execute();
            if($sql_update->rowCount()>0)
            {
                header('location:index.php');
            }
            }
            catch(PDOExeception $execption)
            {
                echo "Error ".$execption->getMessage();
            }

    }
             $conn = null;
}
?>