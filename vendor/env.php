<?php
$host = "localhost";
$dbName = "project1";
$password = "";
$userName = "root";

try{
    $conn= mysqli_connect($host, $userName, $password, $dbName);
    
}catch(Exception $e) {
    echo "". $e->getMessage();
}
?>