
<form action="" method="post">
                    <label for="">Name</label>
                    <input type="text" name="name" id="">
                    <label for="">password</label>
                    <input type="text" name="pass" id="">
                    <input type="submit" value="Register" name='save'>
</form>

<?php 
require_once'config.php';
function test_data($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
if(isset($_POST['save']))
{
    $name = test_data($_POST['name']);
    $pass = test_data($_POST['pass']);
    $sql_insert = $conn->prepare("INSERT INTO tbluser (`name`,`pass`)
                                   VALUES(:name,:pass)");
            $sql_insert ->bindParam(':name',$name);
            $sql_insert ->bindParam(':pass',$pass);
            $sql_insert->execute();
            $sql_insert = $conn->lastInsertId();
            if($sql_insert >0)
            {
                echo"Registered successfully";
            }
            else{
                echo"Not registered";
              }
  
}
//
?>
<h1>Accounts</h1>
Search <input type="search" name="search" id="">
<table class="table"> <thead> <tr> <th>NO</th> <th>Name</th>  <th>Password</th>  <th>Action</th>   </tr> </thead>
        <tbody>
                <?php
                $sql_select = $conn->prepare("SELECT * FROM tbluser");
                $sql_select->execute();
                $results = $sql_select->fetchAll(PDO::FETCH_OBJ);
                $i=0;
                foreach($results as $result )
                {
                            $i++;
                            ?>
                            <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo  $result ->name;?></td>
                            <td><?php echo $result ->pass;?></td>
                            <td><?php echo"<a href ='edit.php?id=$result->id&name=$result->name&pass=$result->pass'>Edit"?>|<?php echo"<a href='delete.php?id=$result->id'>Delete";?></td>
                            </tr>
                            <?php
                }
                 $conn =null;
            ?>
        </tbody>
    </table>