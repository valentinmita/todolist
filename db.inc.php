


  
<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "todolist";
try {
    $connection = mysqli_connect($sName, $uName, $pass, $db_name);
} catch (PDOException $err) {
    die($err->getMessage());
}
