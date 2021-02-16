<?php
require_once'User.php';
require_once'Student.php';
require_once'Staff.php';
require_once'DBCommonMethod.php';
require_once'IRepository.php';
require_once'classs.php';
echo"<h1>Objects of Class </h1>";

echo "<p><b>Student object </b></p>";
$stu1 = new Student('DBU/1212/10',"Abebe Kebede");
echo "Name :".$stu1->getName()." <br> ID :  ".$stu1->getId();

echo "<p> <b>Staff object</b> </p>";
$staff1 = new Staff('DBU013587',"Yonas");
$staff1->setSalary(7853212);
echo "Name : ".$staff1->getName()." <br> Id :".$staff1->getId()." <br> Salary ".$staff1->getSalary();


echo"<p><b>User object</b> </p>";

$user1 = new User("user1","Admin");
echo "User id : ". $user1->getId();
echo "<br>User name :". $user1->getName(); 

$user1->setId('user2');
$user1->setName('officer');
echo "<br>".$user1->getId();
echo "<br>".$user1->getName();
?>
<br>
<br>
<form action="" method="post">
<label for="">Name</label>
<input type="text" name="name" id="">
<label for="">password</label>
<input type="text" name="pass" id="">
<input type="submit" value="Register" name='save'>
</form>

<?php
function test_data($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

$conn = new MySQLRepository('localhost','root','','bid'); 
$conn->db_connect();
$conn->read();
if(isset($_POST['save']))
{
    echo $conn->insert();
}
?>