<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password, $db);
if(isset($_POST['book'])){
    
    $sql2="update books set status=1,cid=".$_SESSION['cid']." where name='".$_POST['book']."' and cid=0 and status=0 ORDER BY bid DESC LIMIT 1";
    $result = $conn->query($sql2);

    if(mysqli_affected_rows($conn)==0){
        $_SESSION['e2']="Couldn't request issue";
    }
    header("location: home.php");
    exit();
}


?>