<?php
//procedural 
$conn = mysqli_connect('localhost','root','','bid');
if(!$conn)
{
    die(mysqli_error($conn));
}
//else echo "Proceduraly connection is openned <br>";

//oop
/*
$conn = new mysqli('localhost','root','','bid');
if($conn->connect_error)
{
    die($conn->connect_error);

}
else
{
    echo "Connection openned";
}
*/
?>