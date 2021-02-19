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
        $sql_update = mysqli_query($conn,"UPDATE tbluser SET name ='".$_POST['name']."',
        pass='".$_POST['pass']."' WHERE id ='".$_GET['id']."'
        ");
if($sql_update)
{
    
    header('location:index.php');
}
else{
    echo mysqli_error($conn);
}

    }

}
?>