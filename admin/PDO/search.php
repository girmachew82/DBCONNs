<?php
require_once'config.php';
if(isset($_POST['parameter']))
{

    $param = $_POST['parameter'];
    echo $param;
    $sql_select = $conn->prepare("SELECT * FROM tbluser  WHERE `name`=:name  OR `pass`=:pass");
    $sql_select->bindParam(':name',$_POST['parameter'],PDO::PARAM_STR);
    $sql_select->bindParam(':pass',$_POST['parameter'],PDO::PARAM_STR);

    $sql_select->execute();
    $results = $sql_select->fetchAll(PDO::FETCH_OBJ);
    if($sql_select->rowCount()>0)
   
    {
    ?>


<table border=1 > <thead> <tr> <th>NO</th> <th>Name</th> <th>Password</th> <th>Action</th> </tr> </thead>
<tbody>
<?php
  $i=0;
  foreach($results as $result )
  {
              $i++;
              ?>
              <tr>
              <td><?php echo $i;?></td>
              <td><?php echo  $result ->name;?></td>
              <td><?php echo $result ->pass;?></td>
              <td><?php echo"<a href ='edit.php?id=$result->id&name=$result->name&pass=$result->pass'>Edit"?>
              |
              
              <a href="delete.php?id=<?php echo $result->id; ?>" onclick="return confirm('Are you sure to delete !'); " >Delete</a>

              </td>
              </tr>
              <?php
  }
   $conn =null;
?>
</tbody>
</table>
<?php
}
}
?>