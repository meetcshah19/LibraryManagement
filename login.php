<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password,$db);

if(isset($_POST["username"])&&$_POST["password"]){
    $hash=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $sql2="select password,cid from clients where username='".$_POST['username']."'";
    $result = $conn->query($sql2);
    if($result->num_rows>0){
        $row= $result->fetch_assoc();
        if(password_verify($_POST['password'],$row["password"])){
            $_SESSION['username']=$_POST['username'];
            $_SESSION['cid']=$row['cid'];
            // echo $_SESSION['username'];
            // die();

            header("location: home.php");
            exit();
        }else{
            if($result){
        $_SESSION['e3']="Wrong password";
    }
            header("location: login.php");
            exit();
        }
    }else{
        if($result){
        $_SESSION['e3']="Wrong Username/Password";
    }
        header("location: login.php");
        exit();
    }

}
?>
<html>
   
   <head>
      <title>User Login</title>
   </head>
   
   <body>
   <form action="<?php $_PHP_SELF ?>" method="POST">
   Login <br>
        Username :<input type="text" name="username" required><br>Password:
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <form action="index.php" method="POST">
        <input type="submit" value="Register">
    </form>
    <form action="admin.php" method="POST">
        <input type="submit" value="Admin">
    </form>
    </body>
<?php
if(isset($_SESSION['e3'])){
    echo $_SESSION['e3'];
    $_SESSION['e3']="";
}
?>
</html>