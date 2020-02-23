<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password, $db);
if(isset($_POST['bid'])){
    
    $sql2="update books set status=2 where bid='".$_POST['bid']."' and status =1 ORDER BY bid DESC LIMIT 1";
    $result = $conn->query($sql2);
    }
header("location: admin.php");
    exit();


?>