<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password, $db);
if(isset($_POST['book'])){
    for ($x = 0; $x < $_POST['q']; $x++) {
    $sql2="insert into books (name,cid,status) values ('".$_POST['book']."',0,0);";
    $result = $conn->query($sql2);
    }
    header("location: admin.php");
    exit();
}


?>