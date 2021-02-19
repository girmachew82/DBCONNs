<?php
try{
    $conn = new PDO("mysql:host=localhost;dbname=bid;",'root','');
    $conn->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Connected";
   
   }
catch(PDOException $e)
{
    echo "Error ".$e->getMessage();
}
?>