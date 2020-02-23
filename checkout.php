<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password, $db);
if(isset($_POST['book'])){

    $sql2="update books set status=0,cid=0 where name='".$_POST['book']."' and cid=".$_SESSION['cid']." and status=2 ORDER BY bid DESC LIMIT 1";
    $result = $conn->query($sql2);
    if(mysqli_affected_rows($conn)==0){
        $_SESSION['e1']="Couldn't checkout";
    }
    header("location:home.php");
    exit;
}


?>