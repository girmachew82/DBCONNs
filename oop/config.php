<?php
$conn = new mysqli('localhost','root','','bid');
if($conn->connect_error)
{
    die($conn->connect_error);

}
else
{
    //echo "Connection openned";
}
?>