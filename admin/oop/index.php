<?php
require_once'config.php';

if(isset($_POST['save']))
{
    $name = test_data($_POST['name']);
    $pass = test_data($_POST['pass']);
    $sql_insert = $conn->query("INSERT INTO tbluser (name,pass)
    VALUES('$name','$pass')
        ");
if($sql_insert)                                
{
echo"Registered successfully";
}
else{
echo $conn->error();
}
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<label for="">Name</label>
<input type="text" name="name" id="">
<label for="">password</label>
<input type="text" name="pass" id="">
<input type="submit" value="Register" name='save'>
</form>
<h1>Accounts</h1>
Search <input type="search" name="search" id="">
<table>
<thead>
<tr>
<th>NO</th>
<th>Name</th>
<th>Password</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql_select = $conn->query("SELECT * FROM tbluser");
$i=0;
function test_data($data)
{
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
while($rows = $sql_select->fetch_assoc())
{
    $name = $rows['name'];
    $pass = $rows['pass'];
    $id =   $rows['id'];
    $i++;
    ?>
    <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $name;?></td>
    <td><?php echo $pass;?></td>
    <td><?php echo"<a href ='edit.php?id=$id&name=$name&pass=$pass'>Edit"?>|<?php echo"<a href='delete.php?id=$id'>Delete";?></td>
    </tr>
    <?php
}
$conn->close();
?>
</tbody>
</table>