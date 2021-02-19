<?php
require_once'session.php';
echo "Welcome ".$_SESSION['username'];
?>
<span align:right><a href="logout.php">Logout</a></span>
<form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="name" id="">
        <label for="">password</label>
        <input type="text" name="pass" id="">
        <input type="submit" value="Register" name='save'>
</form>
<?php 
require_once'config.php';

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $sql_insert = mysqli_query($conn,"INSERT INTO tbluser (name,pass)
                                      VALUES('$name','$pass')
                                    ");
    if($sql_insert)                                
    {
        echo"Registered successfully";
    }
    else{
        echo mysqli_error($conn);
    }
}

//
?>
<h1>Accounts</h1>
Search <input type="search" name="search" id="search">
<div id='result'>

</div>
<table border=1 > <thead> <tr> <th>NO</th> <th>Name</th> <th>Password</th> <th>Action</th> </tr> </thead>
<tbody>
<?php
$sql_select = mysqli_query($conn,"SELECT * FROM tbluser");
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
<script src="jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#search').keyup(function(){
        var parameter = $(this).val();
              // alert(parameter);
                $.ajax({
                    url: 'search.php',
                    type: 'post',
                    data: {parameter:parameter},
                    success:function(result){
                     $('#result').html(result);
                     
                    }
                });
    });
});
</script>

