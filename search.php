<?php
require_once'config.php';
if(isset($_POST['parameter']))
{

    $param = $_POST['parameter'];
    echo $param;
    $sql_select = mysqli_query($conn,"SELECT * FROM tbluser WHERE name ='$param' OR pass ='$param'");
    if(mysqli_num_rows($sql_select)>0)
    {
    ?>


<table border=1 > <thead> <tr> <th>NO</th> <th>Name</th> <th>Password</th> <th>Action</th> </tr> </thead>
<tbody>
<?php

$i=0;
while($row= mysqli_fetch_array($sql_select))
{
    $name = $row['name'];
    $pass = $row['pass'];
    $id = $row['id'];
    $i++;
    ?>
    <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $name;?></td>
    <td><?php echo $pass;?></td>
    <td><?php echo"<a href ='edit.php?id=$id&name=$name&pass=$pass'>Edit"?>|
    
    <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure to delete !'); " >Delete</a>
    </td>
    </tr>
    <?php
}
  mysqli_close($conn);
?>
</tbody>
</table>
<?php
}
}
?>